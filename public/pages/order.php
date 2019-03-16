<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $acc_type = $_SESSION['acc_type'];
    $data = get_data($db, $user_email, $acc_type,"email_address");
    $welcome_message = "Welcome " . $data['first_name'] . " " . $data['last_name'] ."<br>Place your order";
}else {
    $welcome_message = "Before placing an order, Please log in <a href=\"login.php\">here.</a>";
}
?>
    <div class="card-header text-center">
        <h1><?php echo $welcome_message;?></h1>
    </div>
    <div class="container-fluid">
        <div id="step1">
            <br>
            <form action="" method="get" onsubmit="">
                <h2>STEP 1: Choose date</h2><br>
                <input type="date" id="select_date" required><br><br>
                    <button class="btn-secondary rounded btn-lg" onclick="date_validation();" type="button">OK</button></a>
            </form>
            <br><br><hr><br>
        </div>
        <div id="menu_item" style="display: none" >

            <div id="step2">
                <h2> STEP 2: Choose items</h2>
                <h4 id="redcolour">Click items for more information and to choose quantity</h4><br>
            </div>
            <div class="row">
                <?php $menu = get_menu($db);
                for ($i = 0; $i < count($menu); $i++) { if ($i == 0) {echo '<div class="col-md-4">
                    <h3>MAIN</h3>';}elseif ($i == 3) {echo '<div class="col-md-4">
                    <h3>DESSERTS</h3>';} elseif ($i == 6) {echo '<div class="col-md-4">
                    <h3>DRINK</h3>';}?>
                    <div>
                        <img name="item_image" src="<?php echo $menu[$i]['item_image'];?>" alt="<?php echo $menu[$i]['item_name'];?>"
                             class="orderOutline<?php if ($i < 3) {echo "1";}elseif ($i<6) {echo "2";}else {echo "3";}?>"
                             data-toggle="modal" data-target="#Modal<?php echo $i;?>"/>
                        <?php
                        $title= $menu[$i]['item_name'];
                        $price= $menu[$i]['item_price'];
                        $des= $menu[$i]['item_description'];
                        $modal_id = $i;
                        include("modal_menu.php"); ?>
                    </div>
                    <?php if($i == 2 || $i == 5 || $i == 8) {echo '</div>';}else {echo '<br>';} }?>
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
                <button onclick="post_data_xhr();" class="button1 rounded" >Proceed to Summary</button>
                <br><br><br><br><br>
            </div>
        </div>

    </div>
<?php require_once('../../private/shared/pages_footer.php');?>