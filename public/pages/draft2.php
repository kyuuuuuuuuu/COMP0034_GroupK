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


function get_data1($db, $user_input, $table_name, $field_name) {
    $br = "<br>";
    //Get all data from the database given the table name and column name
    //db is database connection
    $user_input = test_input($user_input);
    $query = "SELECT * FROM $table_name JOIN admin_student USING (admin_id) JOIN student USING (student_id) JOIN student_parent USING (student_id) JOIN parent USING (parent_id) WHERE administrator.$field_name = '$user_input'";
    echo $query . $br;
    //$table_data = get_all($db,$table_name);
    $result = mysqli_query($db, $query);
    //echo $data;
    if (mysqli_num_rows($result) == 1) {
        echo "1 result" . $br;
        $data = mysqli_fetch_assoc($result);
        print_r($data);
        }
    elseif (mysqli_num_rows($result) > 1){
        echo "more than 1 result" .$br;
        $data = array();
        while($row = mysqli_fetch_assoc($result)) {
            //print_r($row);
            array_push($data,$row);
        }
        echo $br;
        print_r($data);
    } else {
        echo "0 results" . $br;
        $data = false;
    }

//    while ($row = mysqli_fetch_assoc($table_data)) {
//        if ($user_input == $row[$field_name]) {
//            $data = $row;
//            break;
//        }
//    }

    return $data;
}

$data = get_specific_data($db, 'item_id', 'lamb', 'item', 'item_name');
print_r($data);

//get_data1($db, 'admin@lse.ac.uk', 'administrator', 'email_address');
//$user_input = 'admin@lse.ac.uk';
//$input_field = 'email_address';
//
//get_admin ($db, $user_input, $input_field);
//
//get_student ($db, $user_input, $input_field);
//
//get_parent ($db, $user_input, $input_field);
?>
<?php require_once('../../private/shared/pages_footer.php');?>