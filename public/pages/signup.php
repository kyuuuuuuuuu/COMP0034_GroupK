<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<div class="card-header text-center">
    <h1>Welcome to DinnersDirect</h1>
</div>
<div class="container">
    <div class="text-center">
        <br><h4>
            Let's set up your account. Already have one? Log in
            <a href="login.php">here.</a>
        </h4><br>
        <h3 class="text-danger">
            <strong>
                <?php if(isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }?>
            </strong>
        </h3>
    </div>

    <div class="btn-group btn-group container-fluid align-items-center" role="group" aria-label="...">
        <button type="button" class="btn" id="signup_btn1" onclick="selectForm(0)">Student</button>
        <button type="button" class="btn" id="signup_btn2" onclick="selectForm(1)">Administrator</button>
        <button type="button" class="btn" id="signup_btn3" onclick="selectForm(2)">Parent</button>
    </div>


    <!--Sign up form-->
    <div class="col-lg-12 align-content-lg-center signup-form">
        <form class="display_none" name="registerForm" method="post" action="after_signup.php" onsubmit="return validate('Student');">
            <h6>Fields with * are required.</h6>
            <!--Sign up information required from user -->
            <div class="form-group">
                <label>Email address*</label>
                <input id="emailStudent" name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php if (isset($_SESSION['POST']['email'])) {echo $_SESSION['POST']['email'];}?>">
                <p class="text-danger" id="emailStudent_error"></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password*</label>
                    <input id="passwordStudent" name="pw" type="password" class="form-control" placeholder="Password">
                    <p class="text-danger" id="passwordStudent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Password confirmation*</label>
                    <input id="password2Student" name="pw2" type="password" class="form-control" placeholder="Password confirmation">
                    <p class="text-danger" id="password2Student_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First name*</label>
                    <input id="firstNameStudent" name="first_name" type="text" class="form-control" placeholder="First name" value="<?php if (isset($_SESSION['POST']['first_name'])) {echo $_SESSION['POST']['first_name'];}?>">
                    <p class="text-danger" id="firstNameStudent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name*</label>
                    <input id="lastNameStudent" name="last_name" type="text" class="form-control" placeholder="Last name" value="<?php if (isset($_SESSION['POST']['last_name'])) {echo $_SESSION['POST']['last_name'];}?>">
                    <p class="text-danger" id="lastNameStudent_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input id="phoneStudent" name="phone_UK" type="number" class="form-control" placeholder="Phone number" value="<?php if (isset($_SESSION['POST']['phone_UK'])) {echo $_SESSION['POST']['phone_UK'];}?>">
                    <p class="text-danger" id="phoneStudent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Admin's Email*</label>
                    <input id="referenceStudent" name="reference" type="email" class="form-control" placeholder="Enter your admin's email">
                    <p class="text-danger" id="referenceStudent_error"></p>
                </div>
            </div>
            <button class="btn-block button2" name="submit" value="student" type="submit">Sign Up</button>
        </form>

        <form class="display_none" name="registerForm" method="post" action="after_signup.php" onsubmit="return validate('Admin');">
            <h6>Fields with * are required.</h6>
            <!--Sign up information required from user -->
            <div class="form-group">
                <label>Admin Email address*</label>
                <input id="emailAdmin" name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php if (isset($_SESSION['POST']['email'])) {echo $_SESSION['POST']['email'];}?>">
                <p class="text-danger" id="emailAdmin_error"></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password*</label>
                    <input id="passwordAdmin" name="pw" type="password" class="form-control" placeholder="Password">
                    <p class="text-danger" id="passwordAdmin_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Password confirmation*</label>
                    <input id="password2Admin" name="pw2" type="password" class="form-control" placeholder="Password confirmation">
                    <p class="text-danger" id="password2Admin_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First name*</label>
                    <input id="firstNameAdmin" name="first_name" type="text" class="form-control" placeholder="First name" value="<?php if (isset($_SESSION['POST']['first_name'])) {echo $_SESSION['POST']['first_name'];}?>">
                    <p class="text-danger" id="firstNameAdmin_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name*</label>
                    <input id="lastNameAdmin" name="last_name" type="text" class="form-control" placeholder="Last name" value="<?php if (isset($_SESSION['POST']['last_name'])) {echo $_SESSION['POST']['last_name'];}?>">
                    <p class="text-danger" id="lastNameAdmin_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input id="phoneAdmin" name="phone_UK" type="number" class="form-control" placeholder="Phone number" value="<?php if (isset($_SESSION['POST']['phone_UK'])) {echo $_SESSION['POST']['phone_UK'];}?>">
                    <p class="text-danger" id="phoneAdmin_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>School*</label>
                    <select id="referenceAdmin" name="reference" class="form-control">
                        <option>UCL</option>
                        <option>LSE</option>
                        <option>King</option>
                        <option>City</option>
                        <option>QMUL</option>
                    </select>
                    <p class="text-danger" id="referenceAdmin_error"></p>
                </div>
            </div>
            <button class="btn-block button2" name="submit" value="administrator" type="submit">Sign Up</button>
        </form>

        <form class="display_none" name="registerForm" method="post" action="after_signup.php" onsubmit="return validate('Parent');">
            <h6>Fields with * are required.</h6>
            <!--Sign up information required from user -->
            <div class="form-group">
                <label>Email address*</label>
                <input id="emailParent" name="email" type="email" class="form-control" placeholder="Enter your email" value="<?php if (isset($_SESSION['POST']['email'])) {echo $_SESSION['POST']['email'];}?>">
                <p class="text-danger" id="emailParent_error"></p>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Password*</label>
                    <input id="passwordParent" name="pw" type="password" class="form-control" placeholder="Password">
                    <p class="text-danger" id="passwordParent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Password confirmation*</label>
                    <input id="password2Parent" name="pw2" type="password" class="form-control" placeholder="Password confirmation">
                    <p class="text-danger" id="password2Parent_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First name*</label>
                    <input id="firstNameParent" name="first_name" type="text" class="form-control" placeholder="First name" value="<?php if (isset($_SESSION['POST']['first_name'])) {echo $_SESSION['POST']['first_name'];}?>">
                    <p class="text-danger" id="firstNameParent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Last name*</label>
                    <input id="lastNameParent" name="last_name" type="text" class="form-control" placeholder="Last name" value="<?php if (isset($_SESSION['POST']['last_name'])) {echo $_SESSION['POST']['last_name'];}?>">
                    <p class="text-danger" id="lastNameParent_error"></p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phone Number</label>
                    <input id="phoneParent" name="phone_UK" type="number" class="form-control" placeholder="Phone number"value="<?php if (isset($_SESSION['POST']['phone_UK'])) {echo $_SESSION['POST']['phone_UK'];}?>">
                    <p class="text-danger" id="phoneParent_error"></p>
                </div>
                <div class="form-group col-md-6">
                    <label>Your children's email*</label>
                    <input id="referenceParent" name="reference" type="email" class="form-control" placeholder="Enter your children's email">
                    <p class="text-danger" id="referenceParent_error"></p>
                </div>
            </div>
            <button class="btn-block button2"  name="submit" value="parent" type="submit">Sign Up</button>
        </form>
        <br><br>
    </div>
</div>


<?php unset($_SESSION['POST']);
require_once('../../private/shared/pages_footer.php');?>


