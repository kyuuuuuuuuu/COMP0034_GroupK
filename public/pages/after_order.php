<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $accType = $_SESSION['accType'];
    $data = get_data($db, $user_email, $accType,"email_address");
    $welcome_message = "Welcome " . $data['first_name'] . " " . $data['last_name'] ."<br>Place your order";
}else {
    $welcome_message = "Before placing an order, Please log in <a href=\"login.php\">here.</a>";
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['basket_length'])) {
        $basket = [];
        for ($i = 0; $i < $_POST['basket_length']; $i++) {
            echo "item name is  " . $_POST['item_name_' . $i];
            echo "<br>";
            echo "quantity is " . $_POST['item_quantity_' . $i];
            echo "<br>";
            echo "price is" . $_POST['item_price_' . $i];
            echo "<br>";
            $row = array("item_name"=>$_POST['item_name_' . $i],
                "item_quantity"=>$_POST['item_quantity_' . $i],
                "item_price"=>$_POST['item_price_' . $i]);
            array_push($basket,$row);
        }
        $_SESSION['customer_basket'] = $basket;
        $grand_total = $_POST['grand_total'];
        $_SESSION['grand_total'] = $grand_total;
    }else {
        echo "empty POST";
    }
}
//if($_SERVER["REQUEST_METHOD"] == "POST") {
//    echo "method is post<br>";
//    //print_r($data);
//    $check_array = array_filter($_POST);
//
//    if (!empty($_POST['basket_length'])) {
////        echo "not empty";
//        //print_r($_POST);
////    echo "item name is  " . $_POST['itemname'] . "quantity is " . $_POST['itemquantity'];
//        $basket = [];
//        for ($i = 0; $i < $_POST['basket_length']; $i++) {
////        echo "item name is  " . $_POST['item_name_' . $i];
////        echo "<br>";
////        echo "quantity is " . $_POST['item_quantity_' . $i];
////        echo "<br>";
////        echo "price is" . $_POST['item_price_' . $i];
////        echo "<br>";
//            $row = array("item_name"=>$_POST['item_name_' . $i],
//                "item_quantity"=>$_POST['item_quantity_' . $i],
//                "item_price"=>$_POST['item_price_' . $i]);
//            array_push($basket,$row);
//        }
////    print_r($basket);
//        $grand_total = $_POST['grand_total'];
//    $query = "INSERT INTO order_detail (total_price) "
//        ."VALUES ('$grand_total')";
//    submit_query($db, $query);
//    $order_id = mysqli_insert_id($db);
//    $_SESSION['order_id'] = $order_id;
//    for ($i = 0; $i < count($basket); $i++) {
//        $item_name = $basket[$i]['item_name'];
//        $item_quantity = $basket[$i]['item_quantity'];
//        $item = get_specific_data($db, 'item_id', $item_name, 'item', 'item_name');
//        $item_id = $item['item_id'];
//        $query = "INSERT INTO order_detail_item (order_id, item_id, quantity) "
//            ."VALUES ('$order_id', '$item_id', '$item_quantity')";
//        submit_query($db, $query);
//    }
//    }else {
//        echo "empty POST";
//    }
//}
?>

<?php require_once('../../private/shared/pages_footer.php');?>