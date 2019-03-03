<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php


$data = get_specific_data($db, '*', 'lamb', 'item', 'item_name');
print_r($data);
echo $_SESSION['user_id'] . $_SESSION['id_field'];
?>
<?php require_once('../../private/shared/pages_footer.php');?>