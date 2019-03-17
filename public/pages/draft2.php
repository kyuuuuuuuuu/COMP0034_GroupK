<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');?>

<?php

$br = "<br>";
echo $_SESSION['user_id'] . $_SESSION['id_field'] . "<br><br>";
//dhl141195@gmail.com
$user_input = "dhl141195@gmail.com";

$query = "SELECT * FROM student_parent JOIN student s on student_parent.student_id = s.student_id WHERE s.email_address = '$user_input'";

$result = mysqli_query($db, $query);

if (check_student_avail($db, $user_input)) {
    echo "co available ". $br;
}else {
    echo "deo available " .$br;
}


echo $br;
if(check_email_student($db, $user_input)) {echo $br;
    echo "true2";
}else {echo $br;
    echo "false2";
}
?>

<?php require_once('../../private/shared/pages_footer.php');?>