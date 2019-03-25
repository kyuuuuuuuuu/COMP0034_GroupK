<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../check_log_in_status.php');
$page_title = "Order Summary";
require_once('../../../private/shared/pages_header.php');
$show_summary = false;
if ($not_log_in) {
    redirect_to(url_for("/pages/log_in/index.php"));
}elseif (!isset($_SESSION['customer_basket'])) {
    redirect_to(url_for("/pages/order/index.php"));
}else {
    $show_summary = true;
}

$chosen_child_id = "";
if ($acc_type == "parent" && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["choose_children"])) {
    $chosen_child_id = test_input($_POST["choose_children"]);
    $children_info = get_data($db, $chosen_child_id,'student', 'student_id');
    $_SESSION["ordering_user_id"] = $children_info['student_id'];
    $_SESSION["ordering_user_email"] = $children_info['email_address'];
    $_SESSION["ordering_id_field"] = 'student_id';
    $_SESSION["allowed_to_order"] = check_student_verification_status ($db, $children_info['email_address']);
    $show_summary = true;
}

if (!isset($_SESSION["ordering_user_id"])) {
    if ($acc_type != "parent") { // you are student or admin
        $_SESSION["ordering_user_id"] = $user_id;
        $_SESSION["ordering_id_field"] = $_SESSION["id_field"];
        $_SESSION["ordering_user_email"] = $user_email;

        if ($acc_type == "administrator") {
            $_SESSION["allowed_to_order"] = true;

        }elseif ($acc_type == "student") {
            $_SESSION["allowed_to_order"] = check_student_verification_status ($db, $user_email);
        }
        $show_summary = true;
    }
}
?>
    <div class="card-header text-center" >
        <h1>Order Summary</h1>
    </div>
<?php
if ($acc_type == "parent") {
    require('../get_children_info.php');?>
    <div class="text-center">
        <form method="post">
            <br><label for="choose_children">Choose the child that you are ordering for.</label>
            <select name="choose_children" id="choose_children">
                <?php for ($i = 0; $i < $number_of_children; $i++) {?>
                    <option value="<?php echo $children_p[$i]['student_id'];?>"
                        <?php if ($children_p[$i]['student_id'] == $chosen_child_id) {?>
                            selected="selected"
                        <?php }?>>
                        <?php echo $children_p[$i]['first_name'] . " " . $children_p[$i]['last_name'] . " at " . $school_p[$i]['school_name']; ?>
                    </option>
                <?php }?>
            </select>
            <button class="button2" type="submit">Choose</button>
        </form>
    </div>

    <?php

}
if (isset($_SESSION["allowed_to_order"])) {
    if ($_SESSION["allowed_to_order"] && $show_summary) {
        $address = find_school_address($db, $_SESSION["ordering_user_email"])
        ?>

        <div class="container">
            <br>
            Review your order and select "Place order" button at the end of the page.
            <br>
        </div>

        <div class="container-fluid">
            <hr>
        </div>

        <div class="container">
            <b>Delivery Details: </b>
            <p>
                <?php echo $address . " on " . $_SESSION['delivery_date'];?>
            </p><br><br>

            <h4>Items: </h4>
        </div>

        <div class="container-fluid">
            <hr>
        </div>

        <div class="container">
            <br>
            <!--        <div class="col-md-8">-->
            <div class="row">
                <?php
                if (isset($_SESSION['customer_basket'])) { $basket = $_SESSION['customer_basket']; ?>
                <table class='table table-striped text-center col-md-8' id="">
                    <tr>
                        <td class='font-weight-bolder'>Item Name</td>
                        <td class='font-weight-bolder'>Quantity</td>
                        <td class='font-weight-bolder'>Item Price (£)</td>
                        <td class='font-weight-bolder'>Total Price (£)</td>
                    </tr>
                    <?php for ($i = 0; $i < count($basket); $i++) { ?>
                        <tr>
                            <td><?php echo $basket[$i]['item_name'];?></td>
                            <td><?php echo $basket[$i]['item_quantity'];?></td>
                            <td><?php echo $basket[$i]['item_price'];?></td>
                            <td><?php echo $basket[$i]['item_price'] * $basket[$i]['item_quantity'];?></td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <div class="col-md-4 text-center">

                    Order Subtotal: £<label id="subTotal"><td><?php echo number_format($_SESSION['grand_total'], 2, '.', ' ');?></td></label><br>
                    Tax: £<label id="tax"></label><?php $tax = $_SESSION['grand_total'] * 0.11111111111;
                    echo number_format($tax, 2, '.', ' ');?><br>
                    Shipping: £1.00<br><br>
                    <b>Order Total: </b>£<label id="orderTotal"><?php echo number_format($_SESSION['grand_total'] + 1 , 2, '.', ' ') ;?></label>
                    <br><br>
                    <a href="index.php"><button class="button1 rounded">Back</button></a>
                    <a href="order_confirmation.php"><button class="button1 rounded">Place Order</button></a>
                </div>
            </div>
            <br>
            <?php } ?>
        </div>
        </body>
    <?php }else {?>
        <br><h5 class="text-center"> <?= get_person_name($db, $_SESSION["ordering_user_email"], 'student', 'email_address')?> is <strong>not verified</strong>, therefore, not allowed to place the order. Contact the school admin for verification.</h5>
    <?php } }
require_once('../../../private/shared/pages_footer.php');?>