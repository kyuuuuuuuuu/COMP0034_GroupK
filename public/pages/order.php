<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once ('check_log_in_status.php');
require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['acc_type'];
    $data = get_data($db, $user_email, $acc_type,"email_address");
    $welcome_message = "Welcome " . $data['first_name'] . " " . $data['last_name'] ."<br>Place your order";
}else {
    $welcome_message = "Before placing an order, Please log in <a href=\"login.php\">here.</a>";
}

$menu_id = 1;
$menu = get_menu($db, $menu_id);
?>
    <div class="card-header text-center">
        <h1><?php echo $welcome_message;?></h1>
    </div>
    <div class="container-fluid">
        <div id="step1">
            <br>
            <form action="" method="get" onsubmit="">
                <h2>STEP 1: Choose date</h2>
                <h5 class="redcolour">We accept from today to 2 months from today.</h5><br>
                <input type="date" id="select_date" required><br><br>
                    <button class="btn-secondary rounded btn-lg" onclick="date_validation();" type="button">OK</button></a>
            </form>
            <br><br><hr><br><br><br>
        </div>
        <div id="menu_item" style="display: none" >
            <div id="choose_a_menu">
                <?php $list_menus = get_list_of_menus($db);
                for ($i = 0; $i < count($list_menus); $i++) {;?>
                    <button onclick="generate_menu(<?php echo $list_menus[$i]['menu_id'];?>)">Choose <?php echo $list_menus[$i]['menu_name'];?></button>
                <?php }?>
            </div>
            <div id="menu_set_la"> <!--This div is where the menu get printed by AJAX -->
                <?php require('menu_for_order.php');?>
            </div>

            <br><br><hr><br>



            <!--            <form action="" method="post" onsubmit="getdata()">-->
            <div id="step3">

                <h2>STEP 3: View Basket</h2><br><br>

                <p id="shopping_basket"></p><br>

                <p id="grand_total"></p>
            </div>
            <br>


            <div id="proceed_button" class="display_none">
                <button onclick="post_data_xhr();" class="button1 rounded float-right" >Proceed to Summary</button>
                <br><br><br>
            </div>
        </div>

    </div>
<?php require_once('../../private/shared/pages_footer.php');?>