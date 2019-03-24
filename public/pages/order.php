<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
$page_title = "DinnersDirect-Order";
require_once('../../private/shared/pages_header.php');
if ($not_log_in) {
    $welcome_message = "Welcome to our order page";
}else {
    $welcome_message = "Welcome " . $data['first_name'] . " " . $data['last_name'] ."<br>Place your order";
    if ($acc_type == "administrator") {
        $_SESSION["ordering_user_id"] = $user_id;
        $_SESSION["ordering_id_field"] = $id_field;
        $_SESSION["ordering_user_email"] = $user_email;
        $_SESSION["allowed_to_order"] = true;
    }elseif ($acc_type == "student") {
        $_SESSION["ordering_user_id"] = $user_id;
        $_SESSION["ordering_id_field"] = $id_field;
        $_SESSION["ordering_user_email"] = $user_email;
        $_SESSION["allowed_to_order"] = check_student_verification_status ($db, $user_email);
    }

    $chosen_child_id = "";
    if ($acc_type == "parent" && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["choose_children"])) {
        $chosen_child_id = test_input($_GET["choose_children"]);
        $children_info = get_data($db, $chosen_child_id,'student', 'student_id');
        $_SESSION["ordering_user_id"] = $children_info['student_id'];
        $_SESSION["ordering_user_email"] = $children_info['email_address'];
        $_SESSION["ordering_id_field"] = 'student_id';
        $_SESSION["allowed_to_order"] = check_student_verification_status ($db, $children_info["email_address"]);
    }
}
?>
    <div class="card-header text-center">
        <h1><?php echo $welcome_message;?></h1>
    </div>
    <div class="container-fluid">
        <div id="step1" class="row">
            <div class="col-md-3">
                <?php if ($not_log_in) {?>
                <br><p>Before placing an order, Please log in <a href="login.php">here.</a></p>
                <?php }elseif ($acc_type == "parent") {
                    require ("get_children_info.php"); ?>
                    <form method="get"><br>
                        <label for="choose_children">Choose the child that you are ordering for.</label>
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
                        <?php if(isset($children_info)) {
                            if ($_SESSION["allowed_to_order"]) {?>
                                <br>
                                Your are ordering for <b><?php echo get_person_name($db, $chosen_child_id, 'student', 'student_id');?></b>
                                <br>
                                Delivered to <?php echo find_school_address($db, $children_info['email_address']);?>
                            <?php }else {?>
                                <br>
                                This child has <strong>not been verified</strong> by the school admin. You <u>won't</u> be able to place order for this one!
                            <?php }?>
                        <?php }?>
                    </p>
                <?php }elseif (!$_SESSION["allowed_to_order"]) {?>
                    <br><p>Your account is <strong>not verified</strong>, you won't be able to place your order.</p>
                <?php }else {?>
                <br><p>Your order will be delivered to <?php echo find_school_address($db, $user_email);?></p>
                <?php }?>
            </div>
            <div class="col-md-6 text-center">
                <br>
                <form action="" method="get" onsubmit="">
                    <h2>STEP 1: Choose date</h2>
                    <h5 class="redcolour">We accept from today to 2 months from today.</h5><br>
                    <input type="date" id="select_date" required><br><br>
                    <button class="btn-secondary rounded btn-lg" onclick="date_validation();" type="button">OK</button>
                </form>
                <br><br>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr><br><br><br>
        <div id="menu_item" class="display_none">
            <div id="step2">
                <h2> STEP 2: Choose items</h2>
                <h4 class="redcolour">Click items for more information and to choose quantity</h4><br>
            </div>
            <div class="row">
                <div id="choose_a_menu" class="col-md-3">
                    <?php $list_menus = get_list_of_menus($db);
                    for ($i = 0; $i < count($list_menus); $i++) {;?>
                        <div>
                            <button class="choose-menu list-group-item" data-tip="<?php echo $list_menus[$i]['menu_description']?>" onclick="generate_menu(<?php echo $list_menus[$i]['menu_id'];?>)"><?php echo $list_menus[$i]['menu_name'];?></button>
                        </div>
                    <?php }?><br><br>
                </div>
                <div id="menu_set_la" class="col-md-9"> <!--This div is where the menu get printed by AJAX -->
<!--                    <h6 class="text-center">Please select a menu on the left-hand side.</h6>-->
                    <?php require('menu_for_order.php');?>
                </div>
            </div>


            <br><br><hr><br>

            <div id="step3">
                <h2>STEP 3: View Basket</h2><br>
                <div class="row">
                    <div class="col-md-3">
                        <p id="delivery_date_message"></p>
                    </div>
                    <div class="col-md-8">

                        <p id="shopping_basket"></p><br>
                        <p id="grand_total"></p>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <br>
            <div id="proceed_button" class="display_none">
                <button onclick="post_data_xhr();" class="button1 rounded float-right" >Proceed to Summary</button>
                <br><br><br>
            </div>
        </div>

    </div>
<?php require_once('../../private/shared/pages_footer.php');?>