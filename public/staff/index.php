<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
$data = get_all($db, 'item');
?>

<header class="card-header text-center font-weight-bolder">
    DinnersDirect Staff Area
</header>
<br><br>
<?php if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}?>
<div class="container">
    <div>
        <a class="action" href="<?php echo url_for('/staff/new.php'); ?>">Add new item</a>
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
            <td><a class="action" href="<?php echo url_for('/staff/edit.php?id=' . test_input($item['item_id'])); ?>">Edit</a></td>
            <td><a class="action" href="<?php echo url_for('/staff/delete.php?id=' . test_input($item['item_id'])); ?>">Delete</a></td>
        </tr>
        <?php }?>

    </table>
</div>


<?php require_once('../../private/shared/pages_footer.php');?>
