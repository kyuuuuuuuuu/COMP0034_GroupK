<?php require_once ('dinners_direct_header.php');?>

    <div class="container">
        <br><hr>
        <h3 class="headstyle"><b>Welcome to DinnersDirect!</b></h3><hr>
        <main>

            <h6 style="text-align:center">Not a member? Sign up <a href="DinnersDirect_SignUp.html">here</a>.</h6><br>
            <form>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Email Address:
                        <input class="border" name="Email Address" type="email">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Password:
                        <input class="border" name="Password" type="password">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>
                <h6 style="text-align:center"> <a href="DinnersDirect_ForgotPassword.html">Forgot your password?</a></h6><br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <button class="btn btn-secondary btn-block" type="Submit">Login</button>
                    </div>
                    <div class="col-md-3"></div>
                </div><br>
            </form>
        </main>
    </div>

<?php require_once ('dinners_direct_footer.php');?>