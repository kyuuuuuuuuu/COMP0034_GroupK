<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {require_once('staff_header.php');
$total_number_of_items = 9;
$all_items_sql = get_all($db, 'item');
$all_items = array();
while($item = mysqli_fetch_assoc($all_items_sql)) {
    array_push($all_items,$item);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["menu_name"])) {
    $successful = true;
    $message = "";
    if (!empty($_POST["menu_name"])) {
        $new_menu_name = test_input($_POST["menu_name"]);
    }else {
        $message .= "You need to enter the Menu name!<br>";
        $successful = false;
    }
    if (!empty($_POST["menu_description"])) {
        $new_menu_description = test_input($_POST["menu_description"]);
    }else {
        $message .= "You need to enter the Menu description!<br>";
        $successful = false;
    }

    if ($successful) {
        $query = "INSERT INTO list_of_menus (menu_name, menu_description) VALUES ('$new_menu_name', '$new_menu_description')";
        mysqli_query($db, $query);


        $new_menu_id = mysqli_insert_id($db);
        if ($new_menu_id) {
            for ($j = 0; $j < $total_number_of_items; $j++) {
                $display_slot = $j + 1;
                echo $display_slot ."display slot<br>";
                $item_id = $_POST["display_slot" . $display_slot];
                echo $item_id ."item id<br>";
                $query_to_save_id = "INSERT INTO display_menu (menu_id, display_id, item_id) VALUES ('$new_menu_id', '$display_slot', '$item_id')";
                if (!submit_query($db, $query_to_save_id)) {
                    $successful = false;
                }
            }
        }
        redirect_to(url_for('/staff/menu.php'));

    }



}
?>

<div class="container text-center">
    <header><strong>New Menu</strong></header>
    <div class="text-danger">
        <p><?php echo $message ?? '';?></p>
    </div>
    <form id="add_new_menu" method="post" action="">
        <div class="form-group row">
            <div class="col-md-4">
                <div class="row">
                    <label class="col-md-4">Menu name: </label>
                    <input name="menu_name" type="text" class="form-control col-md-8">
                </div>

            </div>
            <div class="col-md-8">
                <div class="row">
                    <label class="col-md-3">Menu description: </label>
                    <input name="menu_description" type="text" class="form-control col-md-8">
                </div>

            </div>
        </div>
        <table class="col-md-12 table table-striped">
            <tr>
                <th class='font-weight-bolder'>Display slot</th>
                <th class='font-weight-bolder'>Type of item</th>
                <th class='font-weight-bolder'>Choose Item</th>
            </tr>
            <?php for ($i = 0; $i < $total_number_of_items; $i++) {?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?php if ($i < 3) {echo "Main";}elseif ($i < 6) {echo "Dessert";}else {echo "Drink";} ?></td>
                <td>
                    <select  name="display_slot<?= $i+1;?>" class="form-control">
                        <?php for($j = 0; $j < count($all_items); $j++) {?>
                                <option value="<?= $all_items[$j]['item_id'];?>">
                                    <?php echo "Item ID=" . $all_items[$j]['item_id'] . ": " . $all_items[$j]['item_name'];?>
                                </option>
                        <?php }?>
                    </select>
                </td>
            </tr>

            <?php }?>
        </table>
        <br>
        <div class="form-group">
            <button class="btn-block button2" type="submit">Submit change</button>
        </div>

    </form>

</div>


<?php require_once('staff_footer.php');}?>
