<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');

if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['accType'];
    $data = get_data($db, $user_email, $acc_type,"email_address");
    if ($acc_type == 'student') {
        $id_list = get_student($db, $user_email, 'email_address');
    }elseif ($acc_type == 'administrator') {
        $id_list = get_admin($db, $user_email, 'email_address');
    }elseif ($acc_type == 'parent') {
        $id_list = get_parent($db, $user_email, 'email_address');
    }
    $address = find_school_address($db, $id_list[0]['school_id']);
}else {
    redirect_to(url_for("/pages/login.php"));
}
?>

    <div class="card-header text-center" >
        <h1>Order Summary</h1>
    </div>


    <div class="container-fluid">
        <br>
        Review your order and select "Place order" button at the end of the page.
        <br><hr>
        <b>Delivery Details: </b>
        <p>
            <?php echo $address . " on " . $_SESSION['delivery_date'];?>
        </p><br><br>

        <h4>Items: </h4><hr>
        <br>
<!--        <div class="col-md-8">-->
            <div class="row">
                <?php
                if (isset($_SESSION['customer_basket'])) { $basket = $_SESSION['customer_basket']; ?>
                <table class='table table-striped text-center col-md-8' id="margin_three">
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
                <div class="col-md-3 text-center">

                    Order Subtotal: £<label id="subTotal"><td><?php echo number_format($_SESSION['grand_total'], 2, '.', ' ');?></td></label><br>
                    Tax (included): £<label id="tax"></label><?php $tax = $_SESSION['grand_total'] * 0.11111111111;
                    echo number_format($tax, 2, '.', ' ');?><br>
                    Shipping: £1.00<br><br>
                    <b>Order Total: </b>£<label id="orderTotal"><?php echo number_format($_SESSION['grand_total'] + 1 , 2, '.', ' ') ;?></label>
                    <br><br>
                    <a href="order_confirmation.php"><button class="button1">Place Order</button></a>
                    <a href="order.php"><button class="button1">Back</button></a>
                </div>
            </div>
        <br>
                    <?php } ?>
    </div>
</body>
<?php require_once('../../private/shared/pages_footer.php');?>