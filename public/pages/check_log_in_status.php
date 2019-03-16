<?php if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $data = get_data($db,$user_email,"parent","email_address");
    $acc_type = $_SESSION['acc_type'];
    $not_log_in = false;
}else {
    $not_log_in = true;
}