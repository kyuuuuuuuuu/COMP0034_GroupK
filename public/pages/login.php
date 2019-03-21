<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
if (!$not_log_in) {
    to_myAccount($acc_type);
}
$page_title = "DinnersDirect-Log in";
require_once('../../private/shared/pages_header.php');?>

    <div class="card-header text-center">
        <h1>Welcome to DinnersDirect</h1>
    </div>

    <div class="container">
        <div class="text-center">
         <br><h4>
                Not a member? Sign up
                <a href="signup.php">here.</a><br>
            </h4>
            <h5 class="text-danger">
                <strong>
                    <?php if(isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }?>
                </strong>
            </h5>
        </div>

    <div class="col-lg-12 align-content-lg-center">

        <form method="post" action="after_login.php" onsubmit="return validate();">
            <h6 class="text-center">Fields with * are required.</h6><br>

                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <label> Email Address*</label>
                        <input id="email_user" name="email" type="email" class="form-control" placeholder="Enter your email" value="">
                        <p class="text-danger" id="error_para_email"></p>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <label>Password*</label>
                        <input id="password_user" name="pw" type="password" class="form-control" placeholder="Password" value="">
                        <p class="text-danger" id="error_para_pw"></p>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div>

                <h6 class="text-center"> <a href="#">Forgot your password?</a></h6><br>
                <div class="form-row">
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-8">
                        <button class="btn-block button2" type="submit">Login</button>
                    </div>
                    <div class="form-group col-md-2"></div>
                </div><br>
            </form>

    </div>
    </div>


<?php require_once('../../private/shared/pages_footer.php');?>