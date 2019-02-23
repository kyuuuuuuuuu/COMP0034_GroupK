<?php require_once('../../private/shared/pages_header.php');?>

<?php
$the_row = get_data($db,'trung.kien@gmail.com','student','email_address');

foreach($the_row as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

?>

<?php require_once('../../private/shared/pages_footer.php');?>
