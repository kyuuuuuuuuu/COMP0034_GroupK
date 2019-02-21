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
    header($_SERVER["$SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
}

function error_500() {
    header($_SERVER["$SERVER_PROTOCOL"] . " 500 Internal Error");
    exit();
}

function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}
?>

