<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>


<?php if (!isset($_SESSION["staff_credential"])) {
    redirect_to(url_for('/staff/index.php'));
}else {
    require_once('../staff_header.php');
$list_of_school = get_all($db, 'school');?>

<div class="container">
    <h5 class="text-center text-danger">
        <?php if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        }?>
    </h5>
    <div>
        <a class="action" href="<?php echo url_for('/staff/school/school_new.php'); ?>">Add new school</a>
    </div>
    <table class="table table-responsive">
        <tr>
            <th class='font-weight-bolder'>School ID</th>
            <th class='font-weight-bolder'>School Name</th>
            <th class='font-weight-bolder'>School Address</th>
            <th class='font-weight-bolder'>School Password</th>
            <th class='font-weight-bolder'>Edit</th>
        </tr>
        <?php while ($school = mysqli_fetch_assoc($list_of_school)) {?>
            <tr>
                <td><?php echo $school['school_id'];?></td>
                <td><?php echo $school['school_name'];?></td>
                <td><?php echo $school['school_address'];?></td>
                <td><?php echo $school['school_password'];?></td>
                <td><a class="action" href="<?php echo url_for('/staff/school/school_edit.php?school_id=' . test_input($school['school_id'])); ?>">Edit</a></td>
            </tr>
        <?php }?>

    </table>
</div>
<?php require_once('../staff_footer.php');}
