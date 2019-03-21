<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
$page_title = "My Account";
require_once('../../private/shared/pages_header.php');
if (!$not_log_in) {
    to_myAccount($acc_type);
}
?>

<div class="card-header text-center">
    <h1>Welcome to My Account</h1>

</div class="container">
    <div class="text-center">
        <br><h4>
            If you have an account, Log in
            <a href="login.php">here.</a>
        </h4>
        <h4>
            Not a member? Sign up
            <a href="signup.php">here.</a><br>
        </h4>
    </div>
<div>

</div>

<?php
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $data = get_data($db,$user_email,"parent","email_address");
}else {
    $data = array("email_address"=>"default@email.com", "first_name"=>"default_fn", "last_name"=>"default_ln");
}
?>


<?php require_once('../../private/shared/pages_footer.php');?>
