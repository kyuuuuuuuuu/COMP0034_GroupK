<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['accType'];
    $data = get_data($db,$user_email, $acc_type,"email_address");
}else {
//    $data = array("email_address"=>"default@email.com", "first_name"=>"default_fn", "last_name"=>"default_ln");
    redirect_to(url_for('/pages/myaccount.php'));
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

    if ($error) {
        $_SESSION['message'] = $error_message;
        to_myAccount($acc_type);
    }else {
        $new_pw_hash = password_hash($new_pw, PASSWORD_BCRYPT);
        $query = "UPDATE $acc_type SET password = '$new_pw_hash' WHERE email_address = '$user_email'";
        echo $query;
        submit_query($db, $query);
    }
}
?>

<?php require_once('../../private/shared/pages_footer.php');?>