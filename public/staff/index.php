<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('staff_header.php');
?>
<form method="post" action="" onsubmit="return validate('Staff');">
    <h3 class="text-center">Log in as staff</h3><br>

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-8">
            <label> Username*</label>
            <input id="emailStaff" name="email_staff" type="email" class="form-control" placeholder="Enter your username" value="">
            <p class="text-danger" id="emailStaff_error"></p>
        </div>
        <div class="form-group col-md-2"></div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-2"></div>
        <div class="form-group col-md-8">
            <label>Password*</label>
            <input id="passwordStaff" name="password_staff" type="password" class="form-control" placeholder="Password" value="">
            <p class="text-danger" id="passwordStaff_error"></p>
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

<?php require_once('staff_footer.php');?>
