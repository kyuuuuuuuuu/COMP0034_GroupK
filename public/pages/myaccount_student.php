<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');
if (!isset($_SESSION['credential'])) {
    redirect_to(url_for('/pages/myaccount.php'));
}else {
    $user_email = $_SESSION['credential'];
    $data = get_data($db, $user_email, "student", "email_address");


    $result = get_student($db, $user_email, 'email_address');
//print_r($result);

    if (count($result) === 1) {
//    echo "count is 1<br>";
        $number_of_children = 1;
    } elseif (count($result) > 1) {
//    echo "more than 1<br>" . count($result) . "<br>";
        $number_of_children = count($result);
    } else {
        echo "empty result";
    }
    $admin_s = [];
    $school_s = [];
    for ($i = 0; $i < count($result); $i++) {
        $admin_s[$i] = get_data($db, $result[$i]['admin_id'], 'administrator', 'admin_id');
        $school_s[$i] = get_data($db, $result[$i]['school_id'], 'school', 'school_id');
    }

    $student_orders = get_order_of_student($db, $_SESSION['user_id']);

//print_r($admin_s);
//echo "<br>";
//print_r($school_s);
//echo "<br>";
}
?>

<header class="card-header text-center">
    <h1>Welcome to your student account!</h1>
</header>

<body>
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <img class="profile rounded-circle" src="../img/kien.jpg"><br><br>
           <h2><?php echo $data['first_name'] . " " . $data['last_name'];?> </h2>
<!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
    <div class="col-md-7">
        <br><br>
        <h3 >Xin Chao <?php echo $data['first_name'];?>. </h3>
        <h5>From your account dashboard, you can view your recent orders, edit your password and account details.</h5>
    </div>
    </div>


    <br><hr><br><br>

    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center">
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(0)">Profile</button>
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(1)">View Orders</button>
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(2)">Edit Account</button>
                <button class="nav-link list-group-item myaccount-logout" href="log_out.php">LOGOUT</button>
            </div>

        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="col-lg-8">
            <div class="tab-content">

                <h3 class="text-danger">
                    <strong>
                        <?php if(isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }?>
                    </strong>
                </h3>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <h1>Student Profile</h1>
                        <p>
                            <?php
                            for ($i = 0; $i < $number_of_children; $i++) {?>
                                Teacher: <?php echo $admin_s[$i]['first_name'] . " " . $admin_s[$i]['last_name'];?><br>
                                School: <?php echo $school_s[$i]['school_name'];?><br>
                                Address: <?php echo $school_s[$i]['school_address'];?><br>
                            <?php } ?>
                        </p>

                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <h1>View Order</h1>
                        <div class="tab-content">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Delivery Date</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">View</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i = 0; $i < count($student_orders); $i++) {?>

                                    <tr>
                                        <th scope="row"><?php echo $student_orders[$i]['order_id'];?></th>
                                        <td><?php echo $student_orders[$i]['delivery_date'];?></td>
                                        <td><?php echo $student_orders[$i]['total_price'];?></td>
                                        <td><button data-toggle="modal" data-target="#Modal<?php echo $i;?>">View</button></td>
                                    </tr>

                                <?php }?>
                                </tbody>
                            </table>

                            <?php for ($k = 0; $k < count($student_orders); $k++) {
                                $modal_id = $k;
                                $this_order_id = $student_orders[$k]['order_id'];
                                $this_delivery_date = $student_orders[$k]['delivery_date'];
                                $this_total_price = $student_orders[$k]['total_price'];
                                include("modal_view_item.php");
                            }
                            ?>

                        </div>
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
<?php require_once('../../private/shared/pages_footer.php');?>

