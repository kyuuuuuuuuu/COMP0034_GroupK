<?php session_start();
require_once('../../private/shared/pages_header.php');?>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_email = test_input($_POST['email']);
    $login_password = test_input($_POST['pw']);

    if (!check_email($db,$login_email)) {
        $_SESSION['error'] = "Email does not exist";
        redirect_to(url_for('/pages/login.php'));
    }else {
        $_SESSION['error'] = "Email  exists";
        redirect_to(url_for('/pages/login.php'));
    }

}



?>

<?php require_once('../../private/shared/pages_footer.php');?>
