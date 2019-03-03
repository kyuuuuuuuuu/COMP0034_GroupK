<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
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
        $_SESSION['grand_total'] = $_POST['grand_total'];
        $_SESSION['delivery_date'] = $_POST['delivery_date'];
        echo $_SESSION['delivery_date'];
    }else {
        echo "empty POST";
    }
}

?>

<?php require_once('../../private/shared/pages_footer.php');?>