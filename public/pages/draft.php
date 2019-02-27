<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php
//$the_row = get_data($db,'trung.kien@gmail.com','student','email_address');
//
//foreach($the_row as $x => $x_value) {
//    echo "Key=" . $x . ", Value=" . $x_value;
//    echo "<br>";
//}
//$data = get_data($db,'admin@ucl.ac.uk','administrator', 'email_address');
//$saved_pw = $data['password'];
//echo $saved_pw . '<br><br>';
//
//if (password_verify('Default123', $saved_pw)) {
//    echo "correct password";
//}else {
//    echo "incorrect password";
//}
//$admin_id = 2;
//$table_name = 'admin_student';
//$input_field = 'admin_id';
//$result_field = 'student_id';
//$x = 1;
//echo "<option value=\'" . $x . "\'>&nbsp&nbsp " . $x . "&nbsp&nbsp</option>";
//
////$result = check_email_student($db, 'student@ucl.ac.uk');
////echo $result;
//$setOfId = get_pair_id($db,$admin_id,$table_name,$input_field,$result_field);
//print_r($setOfId);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "post method<br>";
    if (isset($_POST['cake'])) {
        echo "isset<br>";
        echo $_POST['cake'];
    }
}


?>
<form name="basket" method="post" action="">
    <table class='table table-striped text-center'>
        <tr>
            <td class='font-weight-bolder'>Item Image</td>
            <td class='font-weight-bolder'>Item Name</td>
            <td class='font-weight-bolder'>Quantity</td>
            <td class='font-weight-bolder'>Item Price</td>
            <td class='font-weight-bolder'>Total Price</td>
            <td class='font-weight-bolder'>Action</td>
        </tr>
        <tr>
            <td><img src='http://localhost:8888/COMP0034_GroupK/public/img/rvCake.jpeg' style='width:100px; height:100px; border-radius: 50%'></td>
            <td><input name="cake" type="text" value="Red velvet Cake" style="display: none">Red velvet Cake</td>
            <td name="quantity">2</td>
            <td>2</td>
            <td>4.00</td>
            <td>
                <button type='submit' onClick='deductQuantity("Red velvet Cake", this);'/>Deduct Quantity</button>&nbsp
                <button type='submit' onClick='addQuantity("Red velvet Cake", this);'/>Add Quantity</button> &nbsp
                <button type='submit' onClick='deleteItem("Red velvet Cake", this);'/>Delete Item</button>
            </td>
        </tr>
        <tr>
            <td>
                <img src='http://localhost:8888/COMP0034_GroupK/public/img/AppleJuice.jpeg' style='width:100px; height:100px; border-radius: 50%'>
            </td>
            <td name="name">Innocent Apple juice (100ml)</td>
            <td name="quantity">2</td>
            <td>1.2</td>
            <td>2.40</td>
            <td><button type='submit' onClick='deductQuantity("Innocent Apple juice (100ml)", this);'/>Deduct Quantity</button> &nbsp
                <button type='submit' onClick='addQuantity("Innocent Apple juice (100ml)", this);'/>Add Quantity</button> &nbsp
                <button type='submit' onClick='deleteItem("Innocent Apple juice (100ml)", this);'/>Delete Item</button>
            </td>
        </tr>
        <tr>
            <td><img src='http://localhost:8888/COMP0034_GroupK/public/img/water.jpg' style='width:100px; height:100px; border-radius: 50%'></td>
            <td name="name">Water (100ml)</td>
            <td name="quantity">1</td>
            <td>0.7</td>
            <td>0.70</td>
            <td><button type='submit' onClick='deductQuantity("Water (100ml)", this);'/>Deduct Quantity</button> &nbsp
                <button type='submit' onClick='addQuantity("Water (100ml)", this);'/>Add Quantity</button> &nbsp
                <button type='submit' onClick='deleteItem("Water (100ml)", this);'/>Delete Item</button>
            </td>
        </tr>
        <tr>
            <td><img src='http://localhost:8888/COMP0034_GroupK/public/img/fruit.jpg' style='width:100px; height:100px; border-radius: 50%'></td>
            <td name="name">Fruit Snack (80g)</td>
            <td name="quantity">1</td>
            <td>1.8</td>
            <td>1.80</td>
            <td><button type='submit' onClick='deductQuantity("Fruit Snack (80g)", this);'/>Deduct Quantity</button> &nbsp
                <button type='submit' onClick='addQuantity("Fruit Snack (80g)", this);'/>Add Quantity</button> &nbsp
                <button type='submit' onClick='deleteItem("Fruit Snack (80g)", this);'/>Delete Item</button>
            </td>
        </tr>
    </table>
    <button id="toPayment" type="submit">Proceed payment</button>
</form>

<?php require_once('../../private/shared/pages_footer.php');?>
