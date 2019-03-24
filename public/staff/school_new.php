<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>


<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $allow_to_add = true;
        if (!empty($_POST['school_name'])) {
            $new_school_name = test_input($_POST["school_name"]);
        }else {
            $allow_to_add = false;
        }

        if (!empty($_POST['school_address'])) {
            $new_school_address = test_input($_POST["school_address"]);
        }else {
            $allow_to_add = false;
        }

        if (!empty($_POST['school_password'])) {
            $new_school_password = test_input($_POST["school_password"]);
        }else {
            $allow_to_add = false;
        }

        if ($allow_to_add) {
            $query = "INSERT INTO school (school_password, school_name, school_address) VALUE ('$new_school_password', '$new_school_name', '$new_school_address')";
            if (submit_query($db, $query)) {
                $_SESSION['message'] = "New school is added successfully!";
                redirect_to(url_for("/staff/school.php"));
            }else {
                error_500("SQL Query error!!!");
            }

        }
    }


    require_once('staff_header.php'); ?>
    <div class="container text-center">
        <header><strong>New School</strong></header>
        <div class="text-danger">
            <p><?php echo $message ?? '';?></p>
        </div>
        <form id="new_school_form" method="post" action="">
            <div class="form-row">
                <label class="col-md-3">School name: </label>
                <input  class="form-control col-md-8" name="school_name" type="text">
            </div>
            <br>
            <div class="form-row">
                <label class="col-md-3">School address: </label>
                <input class="form-control col-md-8" name="school_address" type="text">
            </div>
            <br>
            <div class="form-row">
                <label class="col-md-3">School Password: </label>
                <input class="form-control col-md-8" name="school_password" type="text">
            </div>
            <br>
            <div class="form-row">
                <button class="btn btn-primary btn-block" name="submit" type="submit">Add this school</button>
            </div>
        </form>


    </div>




<?php require_once('staff_footer.php');}?>