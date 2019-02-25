<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php //require_once('../../private/shared/pages_header.php');?>

<?php
//$the_row = get_data($db,'trung.kien@gmail.com','student','email_address');
//
//foreach($the_row as $x => $x_value) {
//    echo "Key=" . $x . ", Value=" . $x_value;
//    echo "<br>";
//}
$data = get_data($db,'admin@ucl.ac.uk','administrator', 'email_address');
$saved_pw = $data['password'];
echo $saved_pw . '<br><br>';

if (password_verify('Default123', $saved_pw)) {
    echo "correct password";
}else {
    echo "incorrect password";
}
$admin_id = 2;
$table_name = 'admin_student';
$input_field = 'admin_id';
$result_field = 'student_id';
$x = 1;
echo "<option value=\'" . $x . "\'>&nbsp&nbsp " . $x . "&nbsp&nbsp</option>";

//$result = check_email_student($db, 'student@ucl.ac.uk');
//echo $result;
$setOfId = get_pair_id($db,$admin_id,$table_name,$input_field,$result_field);
print_r($setOfId);


?>

<?php require_once('../../private/shared/pages_footer.php');?>
