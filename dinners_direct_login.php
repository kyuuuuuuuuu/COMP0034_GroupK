<?php require_once ('dinners_direct_header.php');?>

<?php require ('functions.php')?>


    <div class="card-header text-center">
        <h1>Welcome to DinnersDirect</h1>
    </div>

    <div class="container">
        <div class="text-center">
         <br><h4>
                Not a member? Sign up
                <a href="dinners_direct_signup.php">here.</a><br>
            </h4>
        </div>

    <div class="col-lg-12 align-content-lg-center">

        <form method="post" action="" onsubmit="return validate();">
            <h6 class="text-center">Fields with * are required.</h6><br>

                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label> Email Address*</label>
                        <input id="email_user" name="email" type="email" class="form-control" placeholder="Enter your email" value="">
                        <p class="text-danger" id="error_para_email"></p>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div><br>

                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label>Password*</label>
                        <input id="password_user" name="pw" type="password" class="form-control" placeholder="Password" value="">
                        <p class="text-danger" id="error_para_pw"></p>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div><br>

                <h6 style="text-align:center"> <a href="#">Forgot your password?</a></h6><br>
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