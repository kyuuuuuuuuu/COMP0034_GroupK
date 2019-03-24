<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php");


    if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {
        require_once('staff_header.php');
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password_staff"])) {
            if (check_staff_credential ($db, $_SESSION["staff_credential"], $_POST["password_staff"])) {
                $item_id = $_GET["item_id"];
                $delete_query = "DELETE FROM item WHERE item_id = '$item_id'";
                if (submit_query($db, $delete_query)) {
                    $_SESSION['message'] = "Successfully delete item with ID: " . $_GET["item_id"];
                    redirect_to(url_for('/staff/items.php'));
                }else {
                    error_500("Delete Query fails!!!");
                }

            }else {
                $_SESSION['message'] = "Wrong password.";
                redirect_to(url_for('/staff/items.php'));
            }
        }

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["item_id"])){
        $item_id = test_input($_GET["item_id"]);

        $item_info = get_data($db, $item_id, 'item', 'item_id');

        $result = get_all($db, "display_menu");


        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($item_id == $row["item_id"]) {
                    $allow_to_delete = false;
                    break;
                }else {
                    $allow_to_delete = true;
                }
            }
        }
    if ($allow_to_delete && $item_info) {
        ?>
        <div class="container">
            <form method="post" action="" onsubmit="return validate('Staff');">
                <h3 class="text-center">Enter your password to confirm the action</h3><br>
                <h4 class="text-center text-danger">You are deleting <u><?= $item_info["item_name"]?></u></h4><br>

                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <label>Password*</label>
                        <input id="passwordStaff" name="password_staff" type="password" class="form-control" placeholder="Password" value="">
                        <p class="text-danger" id="passwordStaff_error"></p>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <button class="btn-block button2" type="submit">Confirm to delete</button>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div><br>
            </form>
        </div>

<?php }else { ?>
        <div class="container text-center">

                <h3>You are not allow to delete this item<br>
                You have to remove it from the menu first!
                </h3><br>
                <h4 class="text-danger">You are deleting item with ID:<u><?= $_GET["item_id"]?></u></h4>
            <a class="action" href="<?php echo url_for('/staff/items.php'); ?>">Go back to item list!</a>
        </div>
    <?php } }
        require_once('staff_footer.php');
    }?>