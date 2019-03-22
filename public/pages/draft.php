<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
$page_title = "Draft 1";
require_once('../../private/shared/pages_header.php');
$key_word = "bee";
$query = "SELECT DISTINCT item.item_name, item.item_description, item.item_price, list_of_menus.menu_name, list_of_menus.visibility FROM item ";
$query .= "INNER JOIN display_menu USING (item_id) ";
$query .= "INNER JOIN list_of_menus USING (menu_id) ";
$query .= "WHERE item.item_name LIKE '%" . $key_word . "%' ";
$query .= "OR item.item_description LIKE '%" . $key_word . "%' ";
$query .= "ORDER BY item.item_name LIMIT 10";

print_r(get_data($db, '11','student', 'student_id')) ; ?>



<?php require_once('../../private/shared/pages_footer.php');?>
