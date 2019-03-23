<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>


<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $login_email = test_input($_POST['email']);
    $login_password = test_input($_POST['pw']);
    $table_name = NULL;


    if (!check_email($db,$login_email)) {
        $_SESSION['error'] = "Email does not exist";
        redirect_to(url_for('/pages/login.php')); //wrong email redirect back to log in
    }elseif (check_email_admin($db,$login_email)) {
        $table_name = "administrator";
        $id_field = "admin_id";
    }elseif (check_email_student($db,$login_email)) {
        $table_name = "student";
        $id_field = "student_id";
    }elseif (check_email_parent($db,$login_email)) {
        $table_name = "parent";
        $id_field = "parent_id";
    }

    if (!is_null($table_name)) {
        $data = get_data($db,$login_email,$table_name,"email_address");
        if (password_verify($login_password,$data['password'])) {
            $_SESSION['credential'] = $login_email;
            $_SESSION['acc_type'] = $table_name;
            $_SESSION['id_field'] = $id_field;
            $_SESSION['user_id'] = $data[$id_field];

            if (isset($_SESSION['customer_basket'])) {
                redirect_to(url_for('/pages/order_summary.php')); //if ordering redirect to order summary
            }else {
                to_myAccount($table_name); //redirect to correct my account page
            }
        }else {
            $_SESSION['error'] = "Your Password is wrong";
            redirect_to(url_for('/pages/login.php')); // wrong password redirect to sign in
        }
    }

}



?>

