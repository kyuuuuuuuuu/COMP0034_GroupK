<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php
//$the_row = get_data($db,'trung.kien@gmail.com','student','email_address');
//
//foreach($the_row as $x => $x_value) {
//    echo "Key=" . $x . ", Value=" . $x_value;
//    echo "<br>";
//}
$hash = password_hash('trungKien123', PASSWORD_BCRYPT);
echo $hash . '<br><br>';

echo password_verify('trungKien123', $hash);

session_unset();
session_destroy();
session_start();

?>

<?php require_once('../../private/shared/pages_footer.php');?>
