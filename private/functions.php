<?php
//Define variables to collect from form. Initial value is blank.
$email = $fname = $lname = $pw = $pw2 =$phone = $school = $accType = $reference = "";
$email_empty = $fname_empty = $lname_empty = $pw_empty = $pw2_empty = $school_empty = $accType_empty = $reference_empty = "";

//Create a function to test user input, encode special HTMl characters, remove unnecessary space, tab, backsplashes etc.
function test_input($user_input) {
    $user_input = trim($user_input);
    $user_input = stripslashes($user_input);
    $user_input = htmlspecialchars($user_input);
    return $user_input;
};

function error_404() {
    header($_SERVER["$SERVER_PROTOCOL"] . " 404 Not Found!!!");
    exit();
}

function error_500() {
    header($_SERVER["$SERVER_PROTOCOL"] . " 500 Internal Error!!!");
    exit();
}

function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}



function check_email_student ($db,$user_input) {
    $existence = false;
    $table_student_query = "SELECT * FROM student";
    $result_student_table = mysqli_query($db, $table_student_query);

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
    $table_parent_query = "SELECT * FROM parent";
    $result_parent_table = mysqli_query($db, $table_parent_query);

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
    $table_admin_query = "SELECT * FROM administrator";
    $result_admin_table = mysqli_query($db, $table_admin_query);

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

function redirect_to($url) {
    header('Location: ' . $url);
    exit;
}
?>

