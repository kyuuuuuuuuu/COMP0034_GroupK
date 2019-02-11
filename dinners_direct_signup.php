<?php require_once ('dinners_direct_header.php');?>

    <div class="container">
        <div class="card-header text-center">
            <h1>Welcome to DinnersDirect</h1>
        </div>
        <div class="text-center">
            <h2>
                Let's set up your account. Already have one? Log in
                <a href="dinners_direct_login.php">here.</a>
            </h2>
        </div>
        <div class="col-lg-12 align-content-lg-center">
            <form>
                <!--Check box to indicate type of account-->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="defaultCheck1">School admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="defaultCheck1">Student</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="defaultCheck1">Parent</label>
                </div>
                <!--Sign up information required from user -->
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password confirmation</label>
                        <input type="password" class="form-control" placeholder="Password confirmation">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First name</label>
                        <input type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name</label>
                        <input type="text" class="form-control" placeholder="Last name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" placeholder="Phone number">
                    </div>
                    <div class="form-group col-md-6">
                        <label>School</label>
                        <select class="form-control">
                            <option>UCL</option>
                            <option>LSE</option>
                            <option>King's</option>
                            <option>City</option>
                            <option>QMUL</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php require_once ('dinners_direct_footer.php');?>