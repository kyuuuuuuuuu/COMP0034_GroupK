<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['acc_type'];
    $data = get_data($db,$user_email, $acc_type,"email_address");
}else {
    redirect_to(url_for('/pages/my_account/index.php'));
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;
    $error_message = "";
    if(empty($_POST["user_email"])) {
        $email_empty = "Email is required<br>";
        $error_message = $error_message . $email_empty;
        $error = true;
    } elseif ($_POST["user_email"] != $user_email) {
        $email_wrong = "The email you enter is incorrect<br>";
        $error_message = $error_message . $email_wrong;
        $error = true;
    }else {
        $email = test_input($_POST["user_email"]);
    };

    if(empty($_POST["old_password"])) {
        $pw_empty = "Your old password is required<br>";
        $error_message = $error_message . $pw_empty;
        $error = true;
    } elseif (!password_verify($_POST["old_password"],$data['password'])) {
        $pw_wrong = "The old password you entered is not correct<br>";
        $error_message = $error_message . $pw_wrong;
        $error = true;
    }

    if(empty($_POST["new_password"])) {
        $new_pw_empty = "You new password is required<br>";
        $error_message = $error_message . $new_pw_empty;
        $error = true;
    } else{
        $new_pw = test_input($_POST["new_password"]);
    };

    if(empty($_POST["new_password2"])) {
        $new_pw2_empty = "You new password is required<br>";
        $error_message = $error_message . $new_pw2_empty;
        $error = true;
    } else{
        $new_pw2 = test_input($_POST["new_password2"]);
    };

    if($new_pw2 != $new_pw && !empty($new_pw)) {
        $mismatch_error = "Your confirm password need to be the same as you new password";
        $error_message = $error_message . $new_pw2_empty;
        $error = true;
    }

    if($_POST["old_password"] == $new_pw && !empty($new_pw)) {
        $self_plagiarism = "Your new password need to be different to your old one!";
        $error_message = $error_message . $self_plagiarism;
        $error = true;
    }

    if ($error) {
        $_SESSION['pw_message'] = $error_message;
        to_myAccount($acc_type);
    }else {
        $new_pw_hash = password_hash($new_pw, PASSWORD_BCRYPT);
        $query = "UPDATE $acc_type SET password = '$new_pw_hash' WHERE email_address = '$user_email'";
        echo $query;
        if (submit_query($db, $query)) {
            to_myAccount($acc_type);
        }else {
            error_500("Internal Server Error!!!");
        }
    }
}
?>
