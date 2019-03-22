<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
if(!isset($_SESSION['customer_basket']) || $not_log_in){
    redirect_to(url_for('/pages/order.php'));
}else {
    $shipping_fee = 1;
    $basket = $_SESSION['customer_basket'];
    $grand_total = $_SESSION['grand_total'] + $shipping_fee;
    $delivery_date = $_SESSION['delivery_date'];
    $query = "INSERT INTO order_detail (total_price, delivery_date) "
        ."VALUES ('$grand_total', '$delivery_date')";
    submit_query($db, $query);
    $order_id = mysqli_insert_id($db);
    if (save_order_id($db,$order_id, $_SESSION['ordering_id_field'],$_SESSION['ordering_user_id'])) {
        for ($i = 0; $i < count($basket); $i++) {
            $item_name = $basket[$i]['item_name'];
            $item_quantity = $basket[$i]['item_quantity'];
            $item = get_specific_data($db, 'item_id', $item_name, 'item', 'item_name');
            if ($item) {
                $item_id = $item['item_id'];
                $query = "INSERT INTO order_item (order_id, item_id, quantity) "
                    ."VALUES ('$order_id', '$item_id', '$item_quantity')";
                submit_query($db, $query);
            }else {
                error_500('There is an internal problem');
            }
        }
        unset($_SESSION['customer_basket']);
        unset($_SESSION['grand_total']);
        unset($_SESSION['ordering_id_field']);
        unset($_SESSION['ordering_user_id']);

    }else {
        error_500('There is an internal problem');
    }
    $page_title = "Order Confirmation";
    require_once('../../private/shared/pages_header.php');
    ?>
    <br><br>
    <div class="container">
        <div class="text-center">
            <h1>Confirmation</h1>
            <h4>Thank you for ordering.</h4>
            <h4>Your order has been successfully.</h4><br>
            <img alt="confirmation"  src="../img/confirmation.jpg" id="confirmation">
        </div>
    </div>
    <br><br><br>


<?php }?>
<?php require_once('../../private/shared/pages_footer.php');?>