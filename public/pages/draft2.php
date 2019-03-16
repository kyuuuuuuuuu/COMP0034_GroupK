<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php


echo $_SESSION['user_id'] . $_SESSION['id_field'] . "<br><br>";


$abc = get_order_details ($db, 2, 'student_id', 'student_order', '2019-03-21');
print_r($abc);
?>

<?php require_once('../../private/shared/pages_footer.php');?>