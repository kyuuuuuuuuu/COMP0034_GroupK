<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php");
if (isset($_POST['hide_menu'])) {
    $menu_id = $_POST['hide_menu'];
    $query = "UPDATE list_of_menus SET visibility = '0' WHERE menu_id = '$menu_id'";
    submit_query($db,$query);
}elseif (isset($_POST['show_menu'])) {
    $menu_id = $_POST['show_menu'];
    $query = "UPDATE list_of_menus SET visibility = '1' WHERE menu_id = '$menu_id'";
    submit_query($db,$query);
}
?>

<?php require_once('staff_header.php');

$data = get_all($db, 'list_of_menus');
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}?>
    <div class="container">
        <div>
            <a class="action" href="<?php echo url_for('/staff/menu_new.php'); ?>">Add new menu</a>
        </div>
        <div class="col-md-12 text-center">
            <table class="table table-responsive">
                <tr>
                    <th class='font-weight-bolder'>Menu ID</th>
                    <th class='font-weight-bolder'>Menu Name</th>
                    <th class='font-weight-bolder'>Menu Description</th>
                    <th class='font-weight-bolder'>Edit</th>
                    <th class='font-weight-bolder'>Visibility</th>
                    <th class='font-weight-bolder'>Action</th>
                </tr>
                <?php while($menu = mysqli_fetch_assoc($data)) {?>
                    <tr>
                        <td><?php echo $menu['menu_id'];?></td>
                        <td><?php echo $menu['menu_name'];?></td>
                        <td><?php echo $menu['menu_description'];?></td>
                        <td><a class="action" href="<?php echo url_for('/staff/menu_edit.php?id=' . test_input($menu['menu_id'])); ?>">Edit</td>
                        <?php if ($menu['visibility'] == 1) {?>
                            <td>Visible</td>
                            <td>
                                <form method="post" action="">
                                    <button name="hide_menu" type="submit" value="<?php echo $menu['menu_id'];?>">Hide this</button>
                                </form>
                            </td>
                        <?php }elseif ($menu['visibility'] == 0) {?>
                            <td>Hidden</td>
                            <td>
                                <form method="post" action="">
                                    <button name="show_menu" type="submit" value="<?php echo $menu['menu_id'];?>">Show this</button>
                                </form>
                            </td>
                        <?php }?>
                    </tr>
                <?php }?>

            </table>
        </div>

    </div>
<?php require_once('staff_footer.php');