<?php require_once ('dinners_direct_header.php');?>

    <div class="card-header text-center">
        <h1>Welcome to DinnersDirect</h1>
    </div>
    <div class="container">
        <div class="text-center">
            <h2>
                Please log in to see your account details and order.<br> Haven't got an account yet? Sign up
                <a href="dinners_direct_signup.php">here.</a>
            </h2>
        </div>
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
                <h6 style="text-align:center"> <a href="#">Forgot your password?</a></h6><br>
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