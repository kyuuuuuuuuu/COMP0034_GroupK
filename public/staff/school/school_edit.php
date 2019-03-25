<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>


<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {
    require_once('../staff_header.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $message = "";
        $edited = false;
        $editing_id = $_POST["submit"];
        $school_info = get_data($db,$editing_id, 'school', 'school_id');

        if (!empty($_POST['school_name'])) {
            $new_school_name = test_input($_POST["school_name"]);
            if ($new_school_name != $school_info["school_name"]) {
                $query = "UPDATE school SET school_name = '$new_school_name' WHERE school_id = '$editing_id'";
                if (submit_query($db, $query)) {
                    $edited = true;
                }else {
                    error_500("SQL query error");
                }
            }


        }

        if (!empty($_POST['school_address'])) {
            $new_school_address = test_input($_POST["school_address"]);
            if ($new_school_address != $school_info["school_address"]) {
                $query = "UPDATE school SET school_address = '$new_school_address' WHERE school_id = '$editing_id'";
                if (submit_query($db, $query)) {
                    $edited = true;
                }else {
                    error_500("SQL query error");
                }
            }
        }

        if (!empty($_POST['school_password'])) {
            $new_school_password = test_input($_POST["school_password"]);
            if ($new_school_password != $school_info["school_password"]) {
                $query = "UPDATE school SET school_password = '$new_school_password' WHERE school_id = '$editing_id'";
                if (submit_query($db, $query)) {
                    $edited = true;
                }else {
                    error_500("SQL query error");
                }
            }
        }

        if ($edited) {
            $_SESSION["message"] = "Edit school information successfully!";
        }else {
            $_SESSION["message"] = "There is no change saved!";
        }
        redirect_to(url_for('/staff/school/index.php'));

    }

    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["school_id"])) {
        $school_id = test_input($_GET["school_id"]);

        $school_info = get_data($db, $school_id, 'school', 'school_id');

        ?>

    <div class="container text-center">
        <header><strong>Edit School with ID: <?= $school_info['school_id']?></strong></header>
        <div class="text-danger">
            <p><?php echo $message ?? '';?></p>
        </div>
        <form id="edit_school_form" method="post" action="">
            <div class="form-row">
                <label class="col-md-3">School name: </label>
                <input  class="form-control col-md-8" name="school_name" type="text" value="<?= $school_info['school_name']?>">
            </div>
            <br>
            <div class="form-row">
                <label class="col-md-3">School address: </label>
                <input class="form-control col-md-8" name="school_address" type="text" value="<?= $school_info['school_address']?>">
            </div>
            <br>
            <div class="form-row">
                <label class="col-md-3">School Password: </label>
                <input class="form-control col-md-8" name="school_password" type="text" value="<?= $school_info['school_password']?>">
            </div>
            <br>
            <div class="form-row">
                <button class="btn btn-primary btn-block" name="submit" type="submit" value="<?= $school_info['school_id']?>">Edit this school</button>
            </div>
        </form>


    </div>





<?php }
    require_once('../staff_footer.php');}?>