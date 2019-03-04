<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php


echo $_SESSION['user_id'] . $_SESSION['id_field'];

save_order_id($db,'1',$_SESSION['user_id']);
?>
<?php require_once('../../private/shared/pages_footer.php');?>