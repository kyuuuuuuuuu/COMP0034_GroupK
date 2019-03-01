<?php
//Define variables to collect from form. Initial value is blank.
$email = $fname = $lname = $user_pw = $pw2 =$phone = $school = $accType = $reference = "";
$email_empty = $fname_empty = $lname_empty = $pw_empty = $pw2_empty = $school_empty = $accType_empty = $reference_empty = "";
//$br = "<br>";

//Create a function to test user input, encode special HTMl characters, remove unnecessary space, tab, backsplashes etc.
function test_input($user_input) {
    $user_input = trim($user_input);
    $user_input = stripslashes($user_input);
    $user_input = htmlspecialchars($user_input);
    return $user_input;
};

function error_404() {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found!!!");
    exit();
}

function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Error!!!");
    exit();
}

function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function redirect_to($url) {
    header('Location: ' . $url);
    exit;
}

function submit_query($db, $query) { //Still need to deal with error!!!
    //submit a SQL query to the database
    if (mysqli_query($db, $query)) {
        echo "<br>Data is saved succesfully";
        return true;
    } else {
        echo"<br>Error occurs in saving process!";
        return false;
    }
}

function get_all($db, $table_name) { //get all data from a table
    $query = "SELECT * FROM $table_name";
    $data = mysqli_query($db, $query);
    return $data;
}

function get_data($db, $user_input, $table_name, $field_name) {
    //Get all data from the database given the table name and column name
    //db is database connection
    $user_input = test_input($user_input);
    $query = "SELECT * FROM $table_name WHERE $field_name = '$user_input'";
    $result = mysqli_query($db, $query);
    //echo $data;
    if (mysqli_num_rows($result) == 1) {
        //echo "1 result" . "<br>";
        $data = mysqli_fetch_assoc($result);
        //print_r($data);
    }
    elseif (mysqli_num_rows($result) > 1){
        //echo "more than 1 result" . "<br>";
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            array_push($data,$row);
        }
        //echo "<br>";
        //print_r($data);
    } else {
        //echo "0 results" . "<br>";
        $data = false;
    }

//    while ($row = mysqli_fetch_assoc($table_data)) {
//        if ($user_input == $row[$field_name]) {
//            $data = $row;
//            break;
//        }
//    }

    return $data;
}

function to_myAccount ($accType) {
    //Get a parameter of 'account type' - 'table name'
    //redirect user to the corresponding myAccount page.
    switch ($accType) {
        case "administrator":
            redirect_to(url_for('/pages/myaccount_teacher.php'));
            break;
        case "student":
            redirect_to(url_for('/pages/myaccount_student.php'));
            break;
        case "parent":
            redirect_to(url_for('/pages/myaccount_parent.php'));
            break;
        default:
            break;
    }
}

function check_email_student ($db,$user_input) {
    $existence = false;
    //$table_student_query = "SELECT * FROM student";
    $result_student_table = get_all($db, 'student');

    while (!$existence && $result = mysqli_fetch_assoc($result_student_table)) {
        if ($user_input == $result['email_address']) {
            $existence = true;
            echo $user_input . " is found in student table<br>";
        }
    }
    return $existence;
}

function check_email_parent ($db,$user_input) {
    $existence = false;
    //$table_parent_query = "SELECT * FROM parent";
    $result_parent_table = get_all($db, 'parent');

    while (!$existence && $result = mysqli_fetch_assoc($result_parent_table)) {
        if ($user_input == $result['email_address']) {
            $existence = true;
            echo $user_input . " is found in parent table<br>";
        }
    }
    return $existence;
}

function check_email_admin ($db,$user_input) {
    $existence = false;
//    $table_admin_query = "SELECT * FROM administrator";
    $result_admin_table = get_all($db, 'administrator');

    while (!$existence && $result = mysqli_fetch_assoc($result_admin_table)) {
        if ($user_input == $result['email_address']) {
            $existence = true;
            echo $user_input . " is found in admin table<br>";
        }
    }
    return $existence;
}

function check_email($db, $user_input) {
    $existence = false;
    if (!$existence) {
        $existence = check_email_student($db,$user_input);
    }
    if (!$existence) {
        $existence = check_email_admin($db,$user_input);
    }
    if (!$existence) {
        $existence = check_email_parent($db,$user_input);
    }
    return $existence;
}

function get_pair_id ($db, $user_input, $table_name, $input_field, $result_field) {
    $user_input = test_input($user_input);
    $data = get_all($db,$table_name);
    $id_set = array();
    while ($result = mysqli_fetch_assoc($data)){
        if ($user_input == $result[$input_field]) {
            array_push($id_set,$result[$result_field]);
        }
    }
    return $id_set;
}

function get_from_3_tables ($db, $user_input, $table_name, $input_field, $table_name2, $field_id1, $table_name3, $field_id2) {
    $query = "SELECT * FROM $table_name JOIN $table_name2 USING ($field_id1) JOIN $table_name3 USING ($field_id2) " .
        "WHERE $table_name.$input_field = '$user_input'";
    //echo $query . "<br>";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
        //echo "1 result" . "<br>";
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
        //print_r($data);
        //echo "<br>";
    }
    elseif (mysqli_num_rows($result) > 1){
        //echo "more than 1 result" . "<br>";
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            array_push($data,$row);
        }
        //print_r($data);
        //echo "<br>";
    } else {
        //echo "0 results" . "<br>";
        $data = false;
    }
    //echo "<br>";
    return $data;
}

function get_admin_school ($db, $user_input, $input_field) {
    $data = get_from_3_tables($db, $user_input, 'administrator', $input_field, 'school_admin', 'admin_id', 'school', 'school_id');
    return $data;
}

function get_admin_student ($db, $user_input, $input_field) {
    $data = get_from_3_tables($db, $user_input, 'administrator', $input_field, 'admin_student', 'admin_id', 'student', 'student_id');
    return $data;
}

function get_student_admin ($db, $user_input, $input_field) {
    $data = get_from_3_tables($db, $user_input, 'student', $input_field, 'admin_student', 'student_id', 'administrator', 'admin_id');
    return $data;
}

function get_student_parent ($db, $user_input, $input_field) {
    $data = get_from_3_tables($db, $user_input, 'student', $input_field, 'student_parent', 'student_id', 'parent', 'parent_id');
    return $data;
}

function get_parent_student ($db, $user_input, $input_field) {
    $data = get_from_3_tables($db, $user_input, 'parent', $input_field, 'student_parent', 'parent_id', 'student', 'student_id');
    return $data;
}

function get_parent ($db, $user_input, $input_field) {
    $query = "SELECT * FROM parent JOIN student_parent USING (parent_id) JOIN admin_student USING (student_id) JOIN school_admin USING (admin_id) " .
        "WHERE parent.$input_field = '$user_input'";
//    echo $query . "<br>";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
//        echo "1 result" . "<br>";
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
//        print_r($data);
//        echo "<br>";
    }
    elseif (mysqli_num_rows($result) > 1){
//        echo "more than 1 result" . "<br>";
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            array_push($data,$row);
        }
//        print_r($data);
//        echo "<br>";
    } else {
        //echo "0 results" . "<br>";
        $data = false;
    }
//    echo "<br>";
    return $data;
}

function get_student ($db, $user_input, $input_field) {
    $query = "SELECT * FROM student JOIN admin_student USING (student_id) JOIN school_admin USING (admin_id) " .
        "WHERE student.$input_field = '$user_input'";
//    echo $query . "<br>";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
//        echo "1 result" . "<br>";
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
//        print_r($data);
//        echo "<br>";
    }
    elseif (mysqli_num_rows($result) > 1){
//        echo "more than 1 result" . "<br>";
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
//            print_r($row);
            array_push($data,$row);
        }
//        print_r($data);
//        echo "<br>";
    } else {
//        echo "0 results" . "<br>";
        $data = false;
    }
//    echo "<br>";
    return $data;
}

function get_admin ($db, $user_input, $input_field) {
    $query = "SELECT * FROM administrator JOIN admin_student USING (admin_id) JOIN school_admin USING (admin_id) " .
        "WHERE administrator.$input_field = '$user_input'";
//    echo $query . "<br>";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
//        echo "1 result" . "<br>";
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
//        print_r($data);
//        echo "<br>";
    }
    elseif (mysqli_num_rows($result) > 1){
//        echo "more than 1 result" . "<br>";
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            array_push($data,$row);
        }
//        print_r($data);
//        echo "<br>";
    } else {
//        echo "0 results" . "<br>";
        $data = false;
    }
//    echo "<br>";
    return $data;
}


?>

