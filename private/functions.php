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
        return true;
    } else {
        return false;
    }
}

function get_all($db, $table_name) { //get all data from a table
    $query = "SELECT * FROM $table_name";
    $data = mysqli_query($db, $query);
    return $data;
}

function get_specific_data ($db, $specific_field, $user_input, $table_name, $field_name) {
    $user_input = test_input($user_input);
    $query = "SELECT $specific_field FROM $table_name WHERE $field_name = '$user_input'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    }
    elseif (mysqli_num_rows($result) > 1){
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($data,$row);
        }
    } else {
        $data = false;
    }
    return $data;
}

//Get all data from the database given the table name and column name
//db is database connection
function get_data($db, $user_input, $table_name, $field_name) {
    $data = get_specific_data($db, '*', $user_input, $table_name, $field_name);
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

function get_parent ($db, $user_input, $input_field) {
    $query = "SELECT * FROM parent JOIN student_parent USING (parent_id) JOIN admin_student USING (student_id) JOIN school_admin USING (admin_id) " .
        "WHERE parent.$input_field = '$user_input'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
    }
    elseif (mysqli_num_rows($result) > 1){
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($data,$row);
        }
    } else {
        $data = false;
    }
    return $data;
}

function get_student ($db, $user_input, $input_field) {
    $query = "SELECT * FROM student JOIN admin_student USING (student_id) JOIN school_admin USING (admin_id) " .
        "WHERE student.$input_field = '$user_input'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
    }
    elseif (mysqli_num_rows($result) > 1){
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($data,$row);
        }
    } else {
        $data = false;
    }
    return $data;
}

function get_admin ($db, $user_input, $input_field) {
    $query = "SELECT * FROM administrator JOIN admin_student USING (admin_id) JOIN school_admin USING (admin_id) " .
        "WHERE administrator.$input_field = '$user_input'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
        $data = array();
        $row = mysqli_fetch_assoc($result);
        array_push($data,$row);
    }
    elseif (mysqli_num_rows($result) > 1){
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($data,$row);
        }
    } else {
        $data = false;
    }
    return $data;
}

function get_menu ($db) {
    $query = "SELECT * FROM display_menu JOIN item USING (item_id)";
    $result = mysqli_query($db, $query);
    $data = [];
    while($row = mysqli_fetch_assoc($result)) {
        array_push($data,$row);
    }
    return $data;
}

function find_school_address ($db, $school_id) {
    $query = "SELECT * FROM school WHERE school_id='$school_id'";
    $result = mysqli_fetch_array(mysqli_query($db, $query));
    $address = "School: " . $result['school_name'] . " at " . $result['school_address'];
    return $address;
}

function save_order_id ($db, $order_id, $user_id_field, $user_id) {
    if ($user_id_field == 'admin_id') {
        $query = "INSERT INTO admin_order_detail (admin_id, order_id) VALUES ('$user_id', '$order_id')";
        echo "return true; <br>";
        return submit_query($db,$query);
    }elseif ($user_id_field == 'student_id') {
        $query = "INSERT INTO student_order_detail (student_id, order_id) VALUES ('$user_id', '$order_id')";
        return submit_query($db,$query);
    }else {
        return false;
    }
}
?>

