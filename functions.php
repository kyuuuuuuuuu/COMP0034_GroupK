<?php
//Define variables to collect from form. Initial value is blank.
$email = $fname = $lname = $pw =$pw2 =$phone = $school = $accType = "";
$email_empty = $fname_empty = $lname_empty = $pw_empty = $pw2_empty = $school_empty = $accType_empty = "";

//Create a function to test user input, encode special HTMl characters, remove unnecessary space, tab, backsplashes etc.
function test_input($user_input) {
    $user_input = trim($user_input);
    $user_input = stripslashes($user_input);
    $user_input = htmlspecialchars($user_input);
    return $user_input;
};

//Validation of user input :)
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["email"])) {
        $email_empty = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
    };

    if(empty($_POST["last_name"])) {
        $lname_empty = "Last Name is required";
    } else{
        $lname = test_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
            $lname_empty = "Only letters and white space allowed";
        };
    };

    if(empty($_POST["first_name"])) {
        $fname_empty = "First name is required";
    } else{
        $fname = test_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $fname_empty = "Only letters and white space allowed";
        };
    };

    if(empty($_POST["pw"])) {
        $pw_empty = "Password is required";
    } else{
        $pw = test_input($_POST["pw"]);
    };

    if(empty($_POST["pw2"] && $_POST["pw2"] == $_POST["pw"])) {
        $pw2_empty = "Password confirmation need to be exactly the same as your Password";
    } else{
        $pw2 = test_input($_POST["pw2"]);
    };

    if(empty($_POST["school"])) {
        $school_empty = "School is required";
    } else{
        $school = test_input($_POST["school"]);
    };

    if(empty($_POST["acc_type"])) {
        $accType_empty = "<br>Account type is required";
    } else{
        $accType = test_input($_POST["acc_type"]);
    };
};

?>

