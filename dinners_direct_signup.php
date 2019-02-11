<?php require_once ('dinners_direct_header.php');?>

<?php require ('functions.php')?>

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

        <div class="col-lg-12 align-content-lg-center">
            <form method="post" action="">
                <h6>Fields with * are required.</h6>
                <!--Check box to indicate type of account-->
                <label>Account type* </label>
                <div class="form-check form-check-inline">
                    <input name="acc_type" class="form-check-input" type="radio" value="School admin" >
                    <label class="form-check-label" for="acc_type">School admin</label>
                    <input name="acc_type" class="form-check-input" type="radio" value="Student" id="">
                    <label class="form-check-label" for="acc_type">Student</label>
                    <input name="acc_type" class="form-check-input" type="radio" value="Parent" id="">
                    <label class="form-check-label" for="acc_type">Parent</label>
                </div>
                <span class="text-danger"><?php echo $accType_empty;?></span>

                <!--Sign up information required from user -->
                <div class="form-group">
                    <label>Email address*</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php echo $email;?>">
                    <span class="text-danger"><?php echo $email_empty;?></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Password*</label>
                        <input name="pw" type="password" class="form-control" placeholder="Password" value="<?php echo $pw;?>">
                        <span class="text-danger"><?php echo $pw_empty;?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password confirmation*</label>
                        <input name="pw2" type="password" class="form-control" placeholder="Password confirmation" value="<?php echo $pw2;?>">
                        <span class="text-danger"><?php echo $pw2_empty;?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First name*</label>
                        <input name="first_name" type="text" class="form-control" placeholder="First name" value="<?php echo $fname;?>">
                        <span class="text-danger"><?php echo $fname_empty;?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name*</label>
                        <input name="last_name" type="text" class="form-control" placeholder="Last name" value="<?php echo $lname;?>">
                        <span class="text-danger"><?php echo $lname_empty;?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input name="phone" type="number" class="form-control" placeholder="Phone number">
                    </div>
                    <div class="form-group col-md-6">
                        <label>School*</label>
                        <select name="school" class="form-control">
                            <option>UCL</option>
                            <option>LSE</option>
                            <option>King's</option>
                            <option>City</option>
                            <option>QMUL</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-block btn-outline-primary" type="submit">Sign Up</button>
            </form>
        </div>
    </div>

<?php
//echo $email . "<br>" . $fname . "<br>" .$lname . "<br>" . $pw . "<br>" . $pw2 . $school;
?>

<?php require_once ('dinners_direct_footer.php');?>


