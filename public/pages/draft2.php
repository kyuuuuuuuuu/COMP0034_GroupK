<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
$page_title = "Draft 2";
require_once('../../private/shared/pages_header.php');?>

<?php

$br = "<br>";
echo $_SESSION['user_id'] . $_SESSION['id_field'] . "<br><br>";

//dhl141195@gmail.com
$user_input = "dhl141195@gmail.com";
$reference = "student@lse.ac.uk";
$registration_code = "2TfU61FkTiCEbWr";

if (!check_student_ref_code($db,$reference,$registration_code)) {
    $all_correct = false;
    $error_message = "The registration code you entered is incorrect.<br>";
    echo $error_message;
}else {
    echo "correct";
}


?>

<?php require_once('../../private/shared/pages_footer.php');?>