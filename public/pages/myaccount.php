<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<?php
if (isset($_SESSION['accType'])) {
    $accType = $_SESSION['accType'];
    to_myAccount($accType);
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
