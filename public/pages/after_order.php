<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['acc_type'];
    $data = get_data($db, $user_email, $acc_type,"email_address");
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['basket_length'])) {
        $basket = [];
        for ($i = 0; $i < $_POST['basket_length']; $i++) {
            $row = array("item_name" => $_POST['item_name_' . $i],
                         "item_quantity" => $_POST['item_quantity_' . $i],
                         "item_price" => $_POST['item_price_' . $i]);
            array_push($basket, $row);
        }
        $_SESSION['customer_basket'] = $basket;
        $_SESSION['grand_total'] = $_POST['grand_total'];
        $_SESSION['delivery_date'] = $_POST['delivery_date'];
    }
}

?>

<?php require_once('../../private/shared/pages_footer.php');?>