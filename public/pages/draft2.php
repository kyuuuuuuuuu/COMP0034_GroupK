<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');?>

<?php

$br = "<br>";
echo $_SESSION['user_id'] . $_SESSION['id_field'] . "<br><br>";
//dhl141195@gmail.com
$user_input = "dhl141195@gmail.com";

for ($id = 1; $id < 31; $id++) {
    echo "student ID: " . $id;
    echo " code is: ";
    $result = generate_random_string('15', $id);
    echo $result;
    echo $br;
}
?>

<?php require_once('../../private/shared/pages_footer.php');?>