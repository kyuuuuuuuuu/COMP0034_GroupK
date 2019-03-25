<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../check_log_in_status.php');
$page_title = "Student Account";
require_once('../../../private/shared/pages_header.php');
if ($not_log_in) {
    redirect_to(url_for('/pages/my_account/index.php'));
}else {
    $data = get_data($db, $user_email, "student", "email_address");
    $student_orders = get_order_of_student($db, $user_id);
    $school_address = find_school_address($db, $user_email);
    $related_id = get_student($db, $user_email, 'email_address');
    $admin_name = get_person_name($db,$related_id[0]['admin_id'],'administrator','admin_id');
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

            <img class="profile rounded-circle" src="../../img/default_profile_pic.png"><br><br>
           <h2><?php echo $data['first_name'] . " " . $data['last_name'];?> </h2>
<!--            <div class="name"><small>Trung Kien Nguyen</small></div><br><br>-->
        </div>
    <div class="col-md-7">
        <br><br>
        <h3>Hello <?php echo $data['first_name'];?>! </h3>
        <h5>From your account dashboard, you can: </h5>
        <ul>
            <li>View orders that you have made</li>
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
                <br><br>
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
                            Admin: <?php echo $admin_name;?><br>
                            School: <?php echo $school_address;?><br>
                        </p>
                        <?php if(check_student_avail($db, $user_email)) {?>
                        <div id="registration_code_info">
                            <button class="button2" data-toggle="modal" data-target="#modal_reg_code">View your registration code</button>
                            <div id="modal_reg_code" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Your Registration code</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Here is your registration code: <strong><?php echo $data['registration_code'];?></strong>
                                                <br>
                                                Give this code to your parent so they can link their accounts with yours!.
                                                <br>
                                                Remember: Only <u><strong>1</strong></u> parent account can be linked with this account!
                                                <br>
                                                Once your account is linked with a parent account, This button will disappear.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>


                    </div>
                </div>

                <div name="my_account_tab" class="display_none">
                    <div class="tab-content">
                        <h1>View Order</h1>
                        <div class="tab-content">
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
                            <p>You have not placed any order yet! <br>Click <a href="../order/index.php">here</a> to make an order.</p>
                            <?php }?>

                        </div>
                    </div>
                </div>

                <div name="my_account_tab" class="<?php if(isset($_SESSION['pw_message'])) {echo "display_block";}else {echo "display_none";}?>">
                    <div class="tab-content">
                        <h4 class="text-danger">
                            <strong>
                                <?php if(isset($_SESSION['pw_message'])) {
                                    echo $_SESSION['pw_message'];
                                    unset($_SESSION['pw_message']);
                                }?>
                            </strong>
                        </h4>
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

            </div>
        </div>
    </div>


</div>
</body>
<?php require_once('../../../private/shared/pages_footer.php');?>

