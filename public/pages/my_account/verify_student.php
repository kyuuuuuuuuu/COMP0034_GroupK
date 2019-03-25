<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $id_student = $_POST['submit'];
        $query = "UPDATE student SET status = '1' WHERE student_id = '$id_student'";
        echo $query;
        submit_query($db, $query);
        $_SESSION['approve_message'] = "Student is approved successfully!";
        to_myAccount($_SESSION['acc_type']);
    }
}