<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {
    require_once('../staff_header.php');

$data = get_all($db, 'item');
 ?>
<div class="container">
    <h5 class="text-center text-danger">
        <?php if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        }?>
    </h5>
    <div>
        <a class="action" href="<?php echo url_for('/staff//item/items_new.php'); ?>">Add new item</a>
        <a class="action" href="<?php echo url_for('/staff/menu/index.php'); ?>">Alter menu item</a>
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
        <?php while($item = mysqli_fetch_assoc($data)) {
            if (!empty($item['item_id'])) {?>
            <tr>
                <td><?php echo $item['item_id'];?></td>
                <td><?php echo $item['item_name'];?></td>
                <td><?php echo $item['item_price'];?></td>
                <td><?php echo $item['item_image'];?></td>
                <td><?php echo $item['item_description'];?></td>
                <td><a class="action" href="<?php echo url_for('/staff/item/items_edit.php?item_id=' . test_input($item['item_id'])); ?>">Edit</a></td>
                <td><a class="action" href="<?php echo url_for('/staff/item/items_delete.php?item_id=' . test_input($item['item_id'])); ?>">Delete</a></td>
            </tr>
        <?php } }?>

    </table>
</div>
<?php require_once('../staff_footer.php'); }