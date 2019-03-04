<?php if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $data = get_data($db,$user_email,"parent","email_address");
}else {
    //$data = array("email_address"=>"default@email.com", "first_name"=>"default_fn", "last_name"=>"default_ln");
    redirect_to(url_for('/pages/myaccount.php'));
}