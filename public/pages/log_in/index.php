<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../check_log_in_status.php');
if (!$not_log_in) {
    to_myAccount($acc_type);
}
$page_title = "DinnersDirect-Log in";
require_once('../../../private/shared/pages_header.php');?>

    <div class="card-header text-center">
        <h1>Welcome to DinnersDirect</h1>
    </div>

    <div class="container">
        <?php if (isset($_COOKIE["user_email"])) {?> <!-- If there is a cookie show welcome back form-->
        <div name="log_in" class="display_block text-center"><br>
            <h3>Welcome back, <?= $_COOKIE["user_name"]?></h3>
            <h5>Let sign in now</h5><br>
            <button class="button2" onclick="show_log_in(1)">Sign in</button>
        </div>
        <?php }?>
        <div name="log_in" class="<?php if(isset($_COOKIE["user_email"])) {echo "display_none";}?>">
            <div class="text-center">
                <br><h4>
                    Not a member? Sign up
                    <a href="../sign_up/index.php">here.</a><br>
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

                <form method="post" action="after_login.php" onsubmit="return validate('LogIn');">
                    <h6 class="text-center">Fields with * are required.</h6><br>

                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label> Email Address*</label>
                            <input id="emailLogIn" name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_COOKIE["user_email"])) {echo $_COOKIE["user_email"];}?>">
                            <p class="text-danger" id="emailLogIn_error"></p>
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-8">
                            <label>Password*</label>
                            <input id="passwordLogIn" name="pw" type="password" class="form-control" placeholder="Password" value="">
                            <p class="text-danger" id="passwordLogIn_error"></p>
                        </div>
                        <div class="form-group col-md-2"></div>
                    </div>

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

    </div>


<?php require_once('../../../private/shared/pages_footer.php');?>