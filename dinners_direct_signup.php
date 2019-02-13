<?php require_once ('dinners_direct_header.php');?>

<div class="card-header text-center">
    <h1>Welcome to DinnersDirect</h1>
</div>
<div class="container">
    <div class="text-center">
        <h2>
            Let's set up your account. Already have one? Log in
            <a href="dinners_direct_login.php">here.</a>
        </h2>
    </div>
    <!--Sign up form-->
    <div class="col-lg-12 align-content-lg-center">
        <form method="post" action="dinners_direct_myAccount.php" onsubmit="return validation();">
            <h6>Fields with * are required.</h6>
            <!--Check box to indicate type of account-->
            <label>Account type* </label>
            <div class="form-check form-check-inline">
                <input  name="acc_type" class="form-check-input" type="radio" value="School admin" required>
                <label class="form-check-label">School admin</label>
                <input  name="acc_type" class="form-check-input" type="radio" value="Student" required>
                <label class="form-check-label">Student</label>
                <input  name="acc_type" class="form-check-input" type="radio" value="Parent" required>
                <label class="form-check-label">Parent</label>
                <p class="text-danger" id="paraerror_accounttype"></p>
            </div>


            <!--Sign up information required from user -->
            <div class="form-group">
                <label>Email address*</label>
                <input id="email_of_user" name="email" type="email" class="form-control" placeholder="Enter your email">
                <p class="text-danger" id="email_of_user_error"></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password*</label>
                    <input id="password_of_user" name="pw" type="password" class="form-control" placeholder="Password">
                    <p class="text-danger" id="password_of_user_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Password confirmation*</label>
                    <input id="password_of_user2" name="pw2" type="password" class="form-control" placeholder="Password confirmation">
                    <p class="text-danger" id="password_of_user2_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First name*</label>
                    <input id="userfirst_name" name="first_name" type="text" class="form-control" placeholder="First name">
                    <p class="text-danger" id="userfirst_name_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name*</label>
                    <input id="userlast_name" name="last_name" type="text" class="form-control" placeholder="Last name">
                    <p class="text-danger" id="userlast_name_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input id="phone_UK" type="number" class="form-control" placeholder="Phone number">
                    <p class="text-danger" id="phone_UK_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>School*</label>
                    <select id="school_name" name="school" class="form-control">
                        <option>UCL</option>
                        <option>LSE</option>
                        <option>King's</option>
                        <option>City</option>
                        <option>QMUL</option>
                    </select>
                    <p class="text-danger" id="school_name_error"></p>
                </div>
            </div>
            <button class="btn btn-block btn-outline-primary" type="submit">Sign Up</button>
        </form>
    </div>
</div>

<?php require_once ('dinners_direct_footer.php');?>


