<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('staff_header.php');
$menu_id = test_input($_GET['id'] ?? '1');
$menu_info = get_data($db, $menu_id, 'list_of_menus', 'menu_id');
$menu_data = get_menu($db, $menu_id);
$total_number_of_items = 9;
$all_items_sql = get_all($db, 'item');
$all_items = array();
while($item = mysqli_fetch_assoc($all_items_sql)) {
    array_push($all_items,$item);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $there_is_changes = false;
    for ($i = 1; $i <= $total_number_of_items; $i++) {
        if ($_POST["display_slot" . $i] != $menu_data[$i - 1]['item_id']) {
            $new_item_id = $_POST["display_slot" . $i];
            $query = "UPDATE display_menu SET item_id = '$new_item_id' WHERE menu_id = '$menu_id' AND display_id = '$i'";

            if (submit_query($db,$query)) {
                $there_is_changes = true;
                $message = "Menu is updated!!!";
            }
        }


    }

    if (!empty($_POST["menu_description"])) {
        $new_menu_desc = $_POST["menu_description"];
        if ($new_menu_desc != $menu_info['menu_description']) {
            $query = "UPDATE list_of_menus SET menu_description = '$new_menu_desc' WHERE menu_id = '$menu_id'";
            if (submit_query($db,$query)) {
                $there_is_changes = true;
                $message = "Menu is updated!!!";
            }
        }
    }
    if ($there_is_changes) {
        $menu_info = get_data($db, $menu_id, 'list_of_menus', 'menu_id');
        $menu_data = get_menu($db, $menu_id);
    }
}
?>

<div class="container text-center">
    <header><strong>Edit Menu</strong> with ID: <?php echo $menu_id;?></header>
    <div class="text-danger">
        <h5><?php echo $message ?? '';?></h5>
    </div>
    <form method="post" action="">
        <div class="form-group row">
            <label class="col-md-2 col-form-label"><strong>Description</strong></label>
            <input name="menu_description" id="menu_description" type="text" class="form-control col-md-9" value="<?php echo $menu_info['menu_description'];?>">
        </div>
        <table class="table table-responsive">
            <tr>
                <th class='font-weight-bolder'>Display slot</th>
                <th class='font-weight-bolder'>Item ID</th>
                <th class='font-weight-bolder'>Item Name</th>
                <th class='font-weight-bolder'>Item Description</th>
                <th class='font-weight-bolder'>Price</th>
                <th class='font-weight-bolder'>Change item</th>
            </tr>
            <?php for ($i = 0; $i < count($menu_data); $i++) {?>
                <tr>
                    <td><?php echo $menu_data[$i]['display_id'];?></td>
                    <td><?php echo $menu_data[$i]['item_id'];?></td>
                    <td><?php echo $menu_data[$i]['item_name'];?></td>
                    <td><?php echo $menu_data[$i]['item_description'];?></td>
                    <td><?php echo $menu_data[$i]['item_price'];?></td>
                    <td>
                        <select  name="display_slot<?php echo $menu_data[$i]['display_id'];?>" class="form-control">
                            <?php for($j = 0; $j < count($all_items); $j++) {
                                if($all_items[$j]['item_id'] == $menu_data[$i]['item_id']) {?>
                                    <option selected="selected" value="<?php echo $all_items[$j]['item_id'];?>"><?php echo "Item ID=" . $all_items[$j]['item_id'] . ": " . $all_items[$j]['item_name'];?></option>
                                <?php }else { ?>
                                    <option value="<?php echo $all_items[$j]['item_id'];?>"><?php echo "Item ID=" . $all_items[$j]['item_id'] . ": " . $all_items[$j]['item_name'];?></option>
                                <?php } ?>
                            <?php }?>
                        </select>
                    </td>
                </tr>
            <?php }?>
        </table>
        <div class="form-group">
            <button class="btn-block button2" type="submit">Submit change</button>
        </div>
    </form>



</div>


<?php require_once('staff_footer.php');?>
