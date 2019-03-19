<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
if ($not_log_in) {
    redirect_to(url_for('/pages/myaccount.php'));
}
echo $user_email;
$result = get_parent ($db, $user_email, 'email_address');
echo gettype($result);

if (count($result) === 1) {
//    echo "count is 1<br>";
    $number_of_children = 1;
}elseif (count($result) > 1) {
//    echo "more than 1<br>" . count($result) . "<br>";
    $number_of_children = count($result);
}else {
    echo "empty result";
}
$admin_p = [];
$school_p = [];
$children_p = [];
for ($i = 0; $i < count($result); $i++) {
    $admin_p[$i] = get_data($db, $result[$i]['admin_id'], 'administrator', 'admin_id');
    $school_p[$i] = get_data($db, $result[$i]['school_id'], 'school', 'school_id');
    $children_p[$i] = get_data($db, $result[$i]['student_id'], 'student', 'student_id');
}

//print_r($admin_s);
//echo "<br>";
//print_r($school_s);
//echo "<br>";
require_once('../../private/shared/pages_header.php');
?>



<header class="card-header text-center">
    <h1>Welcome to your Parent account!</h1>
</header>

<body>
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="profile rounded-circle" src="../img/kien.jpg"><br>
            <h2><?php echo $data['first_name'] . " " . $data['last_name'];?></h2>
            <!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
        <div class="col-md-7">
            <br><br>
            <h3>Hello <?php echo $data['first_name'] . " " . $data['last_name'];?>! </h3>
            <h5>From your account dashboard, you can: </h5>
            <ul>
                <li>View your child's recent order</li>
                <li>Edit Account</li>
            </ul>
        </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center text-uppercase">
                <a class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(0)">Profile</a>
                <a class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(1)">View Orders</a>
                <a class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(2)">Edit Account</a>
                <a class="nav-link list-group-item myaccount-logout" href="log_out.php">LOGOUT</a>
            </div>

        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="col-lg-8">
            <div class="tab-content">
                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <h1>Parent Profile</h1>
                        <p>
                            <b>
                                You have
                                <?php
                                if ($number_of_children > 1) {
                                    echo $number_of_children . " children";

                                }else {
                                    echo $number_of_children . " child";
                                };
                                ?>
                            </b>
                            <br>
                            <?php
                            for ($i = 0; $i < $number_of_children; $i++) {?>
                                Name: <?php echo $children_p[$i]['first_name'] . " " . $children_p[$i]['last_name'];?><br>
                                Teacher: <?php echo $admin_p[$i]['first_name'] . " " . $admin_p[$i]['last_name'];?><br>
                                School: <?php echo $school_p[$i]['school_name'];?><br>
                                Address: <?php echo $school_p[$i]['school_address'];?><br><br>
                            <?php } ?>
                        </p>
                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <h1>View Order</h1>

                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <form name="change_password_form" method="post" action="change_password.php" onsubmit="return true;">
                            <label>Email Address:</label>
                            <input name="user_email" type="email" class="form-control" placeholder="Enter your email"><br>
                            <label>Current Password:</label>
                            <input name="old_password" type="password" class="form-control" placeholder="Enter your current password"><br>
                            <label>New Password:</label>
                            <input name="new_password" type="password" class="form-control" placeholder="Enter your new password">
                            <br>
                            <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                        </form>
                    </div>
                </div>







            </div>
        </div>
    </div>


</div>
</body>



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

