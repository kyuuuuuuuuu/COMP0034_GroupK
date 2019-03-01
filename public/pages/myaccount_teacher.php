<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $data = get_data($db,$user_email,"administrator","email_address");
}else {
//    $data = array("email_address"=>"default@email.com", "first_name"=>"default_fn", "last_name"=>"default_ln");
    redirect_to(url_for('/pages/myaccount.php'));
}
$result = get_admin ($db, $user_email, 'email_address');
//print_r($result);

$student_a = [];
$school_a = [];
$parent_a = [];
for ($i = 0; $i < count($result); $i++) {
    $student_a[$i] = get_data($db, $result[$i]['student_id'], 'student', 'student_id');
    $school_a[$i] = get_data($db, $result[$i]['school_id'], 'school', 'school_id');
}

//print_r($student_a);
//echo "<br>";
//print_r($school_a);
//echo "<br>";
?>

<header class="card-header text-center">
    <h1>Welcome to your Teacher's Account!</h1>
</header>


<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="img-profile rounded-circle" src="../img/kien.jpg" style="width:200px;height:200px;"><br>
            <h2 class="text-left"><?php echo $data['first_name'] . " " . $data['last_name'];?> </h2>
            <!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
        <div class="col-md-7">
            <br><br>
            <h3 >Xin Chao <?php echo $data['first_name'];?>. From your account dashboard, you can view your student's details, approve students, edit your password and account details. </h3>
        </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center text-uppercase">
                <a class="nav-link list-group-item" onclick="selectTeacherTab(0)">Profile</a>
                <a class="nav-link list-group-item" onclick="selectTeacherTab(1)">Approve Students</a>
                <a class="nav-link list-group-item" onclick="selectTeacherTab(2)">View Students' Records</a>
                <a class="nav-link list-group-item" onclick="selectTeacherTab(3)">Edit Account</a>
                <a class="nav-link list-group-item" href="log_out.php">Logout</a>
            </div>

        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="col-lg-8">
            <h3 class="text-danger">
                <strong>
                    <?php if(isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }?>
                </strong>
            </h3>
            <div name="abc" style="display: none" class="tab-content">
                <h1>Teacher Profile</h1>
                <p>
                    School: <?php echo $school_a[0]['school_name'];?><br>
                    Address: <?php echo $school_a[0]['school_address'];?><br><br>
                    <?php
                    for ($i = 0; $i < count($result); $i++) {?>
                        Student: <?php echo $student_a[$i]['first_name'] . " " . $student_a[$i]['last_name'];?><br>
                        Status: <?php if($student_a[$i]['status'] == 0) {
                            echo "Not verified";
                        }else {
                            echo "Verified";
                        }?><br>
                    <?php } ?>
                </p>

            </div>
            <div name="abc" style="display: none" class="tab-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Approve Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $k = 0;
                    for ($j = 0; $j < count($result); $j++) {
                        if($student_a[$j]['status'] == 0) {
                            $k++?>
                        <tr>
                            <form method="post" action="verify_student.php">
                                <th scope="row"><?php echo $k;?></th>
                                <td><?php echo $student_a[$j]['first_name'];?></td>
                                <td><?php echo $student_a[$j]['last_name'];?></td>
                                <td><?php echo $student_a[$j]['email_address'];?></td>
                                <td><button class="btn btn-primary btn-block" name="submit" type="submit" value="<?php echo $student_a[$j]['student_id']?>">Approve</button></td>
                            </form>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>

            </div>
            <div name="abc" style="display: none" class="tab-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Order ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Trung Kien</td>
                        <td>Nguyen</td>
                        <td>zcectkn@ucl.ac.uk</td>
                        <td>a123c</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Yeo Jin</td>
                        <td>Lee</td>
                        <td>zcecyjl@ucl.ac.uk</td>
                        <td>b234d</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Koon Yew</td>
                        <td>Ling</td>
                        <td>zceckyl@ucl.ac.uk</td>
                        <td>c345e</td>
                    </tr>
                    </tbody>
                </table>

            </div>

            <div name="abc" style="display: none" class="tab-content">
                <form name="change_password_form" method="post" action="change_password.php" onsubmit="return true;">
                    <label>Email Address:</label>
                    <input name="user_email" type="email" class="form-control" placeholder="Enter your email"><br>
                    <label>Current Password:</label>
                    <input name="old_password" type="password" class="form-control" placeholder="Enter your current password"><br>
                    <label>New Password:</label>
                    <input name="new_password" type="password" class="form-control" placeholder="Enter your new password">
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>




<!---->
<!--<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">-->
<!--<div class="container-fluid">-->
<!--    <div class="row navbar">-->
<!--        <div class="col-md-9 card-header text-center">-->
<!--            <h1>Welcome to My Account</h1>-->
<!--        </div>-->
<!--        <div class="col-md-3">-->
<!--           <ul class="navbar-nav ml-auto align-content-center">-->
<!--                <li class="nav-item dropdown no-arrow">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Trung Kien Nguyen</span>-->
<!--                        <img class="img-profile rounded-circle" src="img/kien.jpg" style="width:100px;height:100px;">-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Profile-->
<!--                        </a>-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Settings-->
<!--                        </a>-->
<!--                        <a class="dropdown-item" href="#">-->
<!--                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Activity Log-->
<!--                        </a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">-->
<!--                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>-->
<!--                            Logout-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </li>-->
<!---->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--</nav>-->

<?php require_once('../../private/shared/pages_footer.php');?>

