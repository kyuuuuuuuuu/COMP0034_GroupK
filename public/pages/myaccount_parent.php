<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
$page_title = "Parent Account";
require_once('../../private/shared/pages_header.php');

if ($not_log_in) {
    redirect_to(url_for('/pages/myaccount.php'));
}


$chosen_child_id = "";
if ($acc_type == "parent" && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["choose_children"])) {
    $chosen_child_id = test_input($_GET["choose_children"]);
    $children_info = get_data($db, $chosen_child_id,'student', 'student_id');
    $student_orders = get_order_of_student($db, $chosen_child_id);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new_children_email"])) {
    $new_children_email = test_input($_POST["new_children_email"]);
    $error_message = "";
    if (!check_email_student($db, $new_children_email)) {
        $error_message .= $new_children_email . " is not a valid student's email, please choose another one.<br>";
    }elseif (!check_student_avail($db,$reference)) {
        $error_message .= $new_children_email . " is registered a parent's account!!!<br>";
    }

    if (empty($_POST["registration_code"])) {
        $error_message .= "You must enter your children's reference code<br>";
    }else {
        $registration_code = test_input($_POST["registration_code"]);
        if (!check_student_ref_code($db,$new_children_email,$registration_code)) {
            $error_message .= "The registration code you entered is incorrect.<br>";
        }
    }

    if (strlen((string)$error_message) == 0) {
        $sql_student_id = get_specific_data($db, 'student_id', $new_children_email, 'student', 'email_address');
        $new_student_id = $sql_student_id['student_id'];

        $query = "INSERT INTO student_parent (student_id, parent_id) VALUES ('$new_student_id', '$user_id')";
        if (submit_query($db, $query)) {
            $message = "Add new children successfully!";
        }else {
            $error_message = "Error occurs while adding new children!";
        }
    }
}


require ("get_children_info.php");
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

            <img class="profile rounded-circle" src="../img/kien.jpg"><br><br>
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
</div>
<div class="container-fluid">
    <br><hr><br><br>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4">

            <div class="nav list-group text-center">
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(0)">Profile</button>
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(1)">View Orders</button>
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(2)">Change Password</button>
                <button class="nav-link list-group-item myaccount-nav" onclick="show_selected_tab(3)">Add Children</button>
                <br><br>
            </div>

        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="col-lg-8">
            <div class="tab-content">
                <h3 class="text-danger">
                    <strong>
                        <?php echo $message ?? "";
                        echo $error_message ?? "";
                        $message = "";
                        $error_message = "";?>
                    </strong>
                </h3>
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
                                Admin: <?php echo $admin_p[$i]['first_name'] . " " . $admin_p[$i]['last_name'];?><br>
                                School: <?php echo $school_p[$i]['school_name'];?><br>
                                Address: <?php echo $school_p[$i]['school_address'];?><br><br>
                            <?php } ?>
                        </p>
                    </div>
                </div>

                <div name="my_account_tab" class="<?php if(!isset($children_info)) {echo "display_none";}?>">
                    <div class="tab-content">
                        <div class="text-center">
                            <h1>View your children's orders</h1>
                            <p>First, Please choose which children you want to view orders.</p>
                        </div>

                        <div class="text-center">
                            <form method="get">
                                <select name="choose_children" id="choose_children">
                                    <?php for ($i = 0; $i < $number_of_children; $i++) {?>
                                        <option value="<?php echo $children_p[$i]['student_id'];?>"
                                            <?php if ($children_p[$i]['student_id'] == $chosen_child_id) {?>
                                                selected="selected"
                                            <?php }?>>
                                            <?php echo $children_p[$i]['first_name'] . " " . $children_p[$i]['last_name'] . " at " . $school_p[$i]['school_name']; ?>
                                        </option>
                                    <?php }?>
                                </select>
                                <button class="btn-light btn-outline-dark rounded" type="submit">Choose</button>
                            </form>
                            <p id="chosen_children">
                                <?php if(isset($children_info)) {?><br>
                                Your are viewing orders of <b><?php echo get_person_name($db, $chosen_child_id, 'student', 'student_id');?></b>
                                <?php if ($student_orders) {?>
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
                                        <td><button class="btn btn-block button1" data-toggle="modal" data-target="#Modal<?php echo $i;?>">View</button></td>
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
                            <?php }else {?>
                                <p>There is no order yet! <br>Click <a href="order.php">here</a> to make an order.</p>
                            <?php }?>
                            <?php }?>
                            </p>
                        </div>
                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <form name="change_password_form" method="post" action="change_password.php" onsubmit="return validate('Change');">
                            <h1 class="text-center">Change Password</h1>
                            <label>Email Address:</label>
                            <input name="user_email" id="emailChange" type="email" class="form-control" placeholder="Enter your email">
                            <p class="text-danger" id="emailChange_error"></p><br>

                            <label>Current Password:</label>
                            <input name="old_password" id="oldPasswordChange" type="password" class="form-control" placeholder="Enter your current password">
                            <p class="text-danger" id="oldPasswordChange_error"></p><br>

                            <label>New Password:</label>
                            <input name="new_password" id="passwordChange" type="password" class="form-control" placeholder="Enter your new password">
                            <p class="text-danger" id="passwordChange_error"></p><br>

                            <label>Confirm New Password:</label>
                            <input name="new_password2" id="password2Change" type="password" class="form-control" placeholder="Enter your new password">
                            <p class="text-danger" id="password2Change_error"></p><br>

                            <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                        </form>
                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <form name="add_children_form" method="post" action="">
                            <h1 class="text-center">Add children</h1>
                            <label>Your Chilren's Email Address:</label>
                            <input name="new_children_email" type="email" class="form-control" placeholder="Enter your children's email"><br>
                            <label>Registration Code:</label>
                            <input name="registration_code" type="text" class="form-control" placeholder="Enter your children's registration code.">
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

