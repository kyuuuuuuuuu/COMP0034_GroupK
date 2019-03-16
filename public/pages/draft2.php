<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
require_once('../../private/shared/pages_header.php');?>

<?php


echo $_SESSION['user_id'] . $_SESSION['id_field'] . "<br><br>";

if(check_student_avail($db, 'student@ucl.ac.uk')) {
    echo "true";
}else {
    echo "false";
}
?>

<?php require_once('../../private/shared/pages_footer.php');?>