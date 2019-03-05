<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
$item_id = $_GET['id'] ?? '1';
$item_data = get_data($db, $item_id, 'item', 'item_id');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_item_name = NULL;
    $new_item_price = NULL;
    $new_item_desc = NULL;

    if($_POST['item_name'] != $item_data['item_name']) {
        $new_item_name = $_POST['item_name'];
        echo $new_item_name;
        $query = "UPDATE item SET item_name = '$new_item_name' WHERE item_id = '$item_id'";

        submit_query($db,$query);
    }
    if($_POST['item_price'] != $item_data['item_price']) {
        $new_item_price = $_POST['item_price'];
        echo $new_item_price;
        $query = "UPDATE item SET item_price = '$new_item_price' WHERE item_id = '$item_id'";
        submit_query($db,$query);
    }
    if($_POST['item_description'] != $item_data['item_description']) {
        $new_item_desc = $_POST['item_description'];
        echo $new_item_desc;
        $query = "UPDATE item SET item_description = '$new_item_desc' WHERE item_id = '$item_id'";
        submit_query($db,$query);
    }
    if ($new_item_name != NULL || $new_item_price != NULL || $new_item_desc != NULL) {
        $_SESSION['message'] = "Edit item successfully!";
        redirect_to(url_for('/staff/'));
    }
}

?>
 <header> Edit Item:</header>
<div class="container">
    <form id="edit_item_form" method="post" action="">
        <div class="row">
            <label>Item name: </label>
            <input name="item_name" type="text" class="form" value="<?php echo $item_data['item_name'];?>">
        </div>
        <div class="row">
            <label>Item price: </label>
            <input name="item_price" type="number" step="0.01" class="form" value="<?php echo $item_data['item_price'];?>">
        </div>
        <div class="row">
            <label>Item Description: </label>
            <textarea rows="5" cols="60" name="item_description" form="edit_item_form"><?php echo $item_data['item_description'];?></textarea>
        </div>
        <button class="btn btn-primary" name="submit" type="submit">Edit this item</button>
    </form>

</div>


<?php require_once('../../private/shared/pages_footer.php');?>
