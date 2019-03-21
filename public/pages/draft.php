<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');
$key_word = "bee";
$query = "SELECT DISTINCT item.item_name, item.item_description, item.item_price, list_of_menus.menu_name, list_of_menus.visibility FROM item ";
$query .= "INNER JOIN display_menu USING (item_id) ";
$query .= "INNER JOIN list_of_menus USING (menu_id) ";
$query .= "WHERE item.item_name LIKE '%" . $key_word . "%' ";
$query .= "OR item.item_description LIKE '%" . $key_word . "%' ";
$query .= "ORDER BY item.item_name LIMIT 10";

if ($result = mysqli_query($db, $query)) { ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Item Name</th>
            <th scope="col">Item Price</th>
            <th scope="col">Item Description</th>
            <th scope="col">Menu</th>
            <th scope="col">Availability</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?php echo $row['item_name'];?></td>
                <td><?php echo $row['item_price'];?></td>
                <td><?php echo $row['item_description'];?></td>
                <td><?php echo $row['menu_name'];?></td>
                <td><?php if($row['visibility'] == 1) {echo "Available";} elseif ($row['visibility'] == 1) {echo "Temporary Unavailable";}?></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
<?php }else { ?>
    <p>There is no result that match your search</p>
<?php }?>




<?php require_once('../../private/shared/pages_footer.php');?>
