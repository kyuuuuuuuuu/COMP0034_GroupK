<?php
//Define variables to collect from form. Initial value is blank.
$email = $fname = $lname = $pw = $pw2 =$phone = $school = $accType = "";
$email_empty = $fname_empty = $lname_empty = $pw_empty = $pw2_empty = $school_empty = $accType_empty = "";

//Create a function to test user input, encode special HTMl characters, remove unnecessary space, tab, backsplashes etc.
function test_input($user_input) {
    $user_input = trim($user_input);
    $user_input = stripslashes($user_input);
    $user_input = htmlspecialchars($user_input);
    return $user_input;
};

?>

