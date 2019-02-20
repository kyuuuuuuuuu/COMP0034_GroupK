<?php require_once ('dinners_direct_header.php');?>

<?php require ('functions.php')?>


<header class="card-header text-center">
    <h1>Welcome to your Teacher's Account!</h1>
</header>


<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="img-profile rounded-circle" src="img/kien.jpg" style="width:200px;height:200px;"><br>
            <h2 class="text-left">Trung Kiên Nguyễn's giáo viên </h2>
            <!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
        <div class="col-md-7">
            <br><br>
            <h3 >Xin Chao Kiên's giáo viên. From your account dashboard, you can view your student's details, approve students, edit your password and account details. </h3>
        </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center text-uppercase">
                <a class="nav-link list-group-item" href="dinners_direct_teacher_MyAccount_Profile.php">Profile</a>
                <a class="nav-link list-group-item" href="dinners_direct_teacher_MyAccount_ApproveStudents.php">Approve Students</a>
                <a class="nav-link list-group-item" href="dinners_direct_teacher_MyAccount_StudentRecords.php">View Students' Records</a>
                <a class="nav-link list-group-item" href="dinners_direct_MyAccount_EditAccount.php">Edit Account</a>
                <a class="nav-link list-group-item" href="index.php">Logout</a>
            </div>

        </div>
<!--        <hr class="sidebar-divider d-none d-md-block">-->
        <div class="col-lg-4">
            <div class="tab-content">
                <label>Email Address:</label>
                <input type="email" class="form-control" placeholder="Enter your email"><br>
                <label>Current Password:</label>
                <input type="password" class="form-control" placeholder="Enter your current password"><br>
                <label>New Password:</label>
                <input type="password" class="form-control" placeholder="Enter your new password">


            </div>
        </div>
    </div>


</div>
<?php require_once ('dinners_direct_footer.php');?>
