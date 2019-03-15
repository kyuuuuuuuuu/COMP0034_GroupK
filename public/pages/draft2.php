<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php


echo $_SESSION['user_id'] . $_SESSION['id_field'];


$admin_orders = get_order_item ($db, 2);
print_r($admin_orders);

$item_list = get_order_item ($db, 1);
?>

    <table class='table table-striped text-center'>
    <tr>
        <td class='font-weight-bolder'>Item Name</td>
        <td class='font-weight-bolder'>Quantity</td>
        <td class='font-weight-bolder'>Item Price (£)</td>
    </tr>
<?php for ($j = 0; $j < count($item_list); $j++) {?>
    <tr>
        <td><?php echo $item_list[$j]['item_name'];?></td>
        <td><?php echo $item_list[$j]['quantity'];?></td>
        <td><?php echo $item_list[$j]['item_price'];?></td>
    </tr>
<?php }?>
    </table>
<?php require_once('../../private/shared/pages_footer.php');?>