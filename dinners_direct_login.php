<?php require_once ('dinners_direct_header.php');?>

<?php require ('functions.php')?>

    <div class="card-header text-center">
        <h1>Welcome to DinnersDirect</h1>
    </div>

    <div class="container">
        <div class="text-center">
         <br><h2>
                Not a member? Sign up
                <a href="dinners_direct_signup.php">here.</a><br>
            </h2>
        </div>

    <div class="col-lg-12 align-content-lg-center">

        <form method="post" action="">
            <h6 class="text-center">Fields with * are required.</h6><br>

                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                     <label> Email Address*</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php echo $email;?>">
                        <span class="text-danger"><?php echo $email_empty;?></span>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div><br>

                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label>Password*</label>
                        <input name="pw" type="password" class="form-control" placeholder="Password" value="<?php echo $pw;?>">
                        <span class="text-danger"><?php echo $pw_empty;?></span>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div><br>
                <h6 style="text-align:center"> <a href="DinnersDirect_ForgotPassword.php">Forgot your password?</a></h6><br>
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <button class="btn btn-outline-primary btn-block" type="submit">Login</button>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div><br>
            </form>
    </div>
    </div>

<?php require_once ('dinners_direct_footer.php');?>