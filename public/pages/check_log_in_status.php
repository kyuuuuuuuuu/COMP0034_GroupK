<?php if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['acc_type'];
    $user_id = $_SESSION['user_id'];
    $id_field = $_SESSION['id_field'];
    $data = get_data_by_email($db,$user_email);

    $not_log_in = false;
}else {
    $not_log_in = true;
}