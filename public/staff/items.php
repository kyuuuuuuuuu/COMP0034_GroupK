<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {

require_once('staff_header.php');

$data = get_all($db, 'item');
 if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}?>
<div class="container">
    <div>
        <a class="action" href="<?php echo url_for('/staff/items_new.php'); ?>">Add new item</a>
        <a class="action" href="<?php echo url_for('/staff/menu.php'); ?>">Alter menu item</a>
    </div>
    <table class="table table-responsive">
        <tr>
            <th class='font-weight-bolder'>Item ID</th>
            <th class='font-weight-bolder'>Item Name</th>
            <th class='font-weight-bolder'>Item Price</th>
            <th class='font-weight-bolder'>Item Image</th>
            <th class='font-weight-bolder'>Item Description</th>
            <th class='font-weight-bolder'>Edit</th>
            <th class='font-weight-bolder'>Delete</th>
        </tr>
        <?php while($item = mysqli_fetch_assoc($data)) {?>
            <tr>
                <td><?php echo $item['item_id'];?></td>
                <td><?php echo $item['item_name'];?></td>
                <td><?php echo $item['item_price'];?></td>
                <td><?php echo $item['item_image'];?></td>
                <td><?php echo $item['item_description'];?></td>
                <td><a class="action" href="<?php echo url_for('/staff/items_edit.php?id=' . test_input($item['item_id'])); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/item_delete.php?id=' . test_input($item['item_id'])); ?>">Delete</a></td>
            </tr>
        <?php }?>

    </table>
</div>
<?php require_once('staff_footer.php'); }