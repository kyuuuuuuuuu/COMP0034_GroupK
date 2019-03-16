<?php if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $data = get_data($db,$user_email,"parent","email_address");
    $acc_type = $_SESSION['acc_type'];
    $user_id = $_SESSION['user_id'];
    $id_field = $_SESSION['id_field'];
    $not_log_in = false;
}else {
    $not_log_in = true;
}