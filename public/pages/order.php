<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');
if (isset($_SESSION['credential'])) {
    $user_email = $_SESSION['credential'];
    $accType = $_SESSION['accType'];
    $data = get_data($db, $user_email, $accType,"email_address");
    $welcome_message = "Welcome " . $data['first_name'] . " " . $data['last_name'] ."<br>Place your order";
}else {
    $welcome_message = "Before placing an order, Please log in <a href=\"login.php\">here.</a>";
}
?>
<!--///////////////////////////////////////////////////////////////-->
<!--<style>-->
<!--    @media (max-width: 767.98px) {-->
<!--        .orderOutline1, .orderOutline2, .orderOutline3 {-->
<!--            width: 50vw;-->
<!--        }-->
<!--    }-->
<!--</style>-->
<!--///////////////////////////////////////////////////////////////-->


    <div class="card-header text-center">
        <h1><?php echo $welcome_message;?></h1>
    </div>
    <div class="container-fluid">
        <div id="step1">
            <br><br>
            <form action="" method="get" onsubmit="">
                <h2>STEP 1: Choose date</h2><br>
                <input type="date" id="thisdate" required><br><br>
                    <button class="btn-secondary rounded btn-lg" onclick="datevalidation();" type="button">OK</button></a>
            </form>
            <br><br><hr><br>
        </div>
        <div id="menuitem" style="display: none" >

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
                             class="orderOutline<?php if ($i < 3) {echo "1";}elseif ($i<6) {echo "2";}else {echo "3";}?>" data-toggle="modal"
                             data-target="#Modal<?php echo $i;?>"/>
                        <?php
                        $title= $menu[$i]['item_name'];
                        $price= $menu[$i]['item_price'];
                        $des= $menu[$i]['item_description'];
                        $modal_id = $i;
                        include("modal.php"); ?>
                    </div>
                    <?php if($i == 2 || $i == 5 || $i == 8) {echo '</div>';}else {echo '<br>';} }?>

                <!--                <div class="col-md-4">-->
                <!--                    <h3>MAIN</h3>-->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/burger.jpeg" alt="Burger Image" class="orderOutline1" data-toggle="modal" data-target="#Modal0"/>-->
                <!--                        --><?php
                //                        $title="Beef burger with chips";
                //                        $price=3.59;
                //                        $des="This is a description of Burger.";
                //                        $foodID="burgerQuantity";
                //                        $modal_id = 0;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/koleno.jpeg" alt="Koleno Image" class="orderOutline1" data-toggle="modal" data-target="#Modal1"/>-->
                <!--                        --><?php
                //                        $title="Koleno";
                //                        $price=2.69;
                //                        $des="This is a description of Koleno.";
                //                        $foodID="kolenoQuantity";
                //                        $modal_id = 1;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/lamb.jpeg" alt="Lamb Image" class="orderOutline1" data-toggle="modal" data-target="#Modal2"/>-->
                <!--                        --><?php
                //                        $title="Lamb";
                //                        $price=2.55;
                //                        $des="This is a description of Lamb.";
                //                        $foodID="lambQuantity";
                //                        $modal_id = 2;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                </div>-->
                <!---->
                <!---->
                <!---->
                <!--                <div class="col-md-4">-->
                <!--                    <h3>DESSERTS</h3>-->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/fruit.jpg" alt="Fruit Snack Image" class="orderOutline2" data-toggle="modal" data-target="#Modal3"/>-->
                <!--                        --><?php
                //                        $title="Fruit Snack (80g)";
                //                        $price=1.89;
                //                        $des="This is a description of Fruit Snack.";
                //                        $foodID="fruitQuantity";
                //                        $modal_id = 3;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/rvCake.jpeg" alt="rvCake Image" class="orderOutline2" data-toggle="modal" data-target="#Modal4"/>-->
                <!--                        --><?php
                //                        $title="Red velvet Cake";
                //                        $price=2.29;
                //                        $des="This is a description of rvCake.";
                //                        $foodID="rvQuantity";
                //                        $modal_id = 4;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/cake.jpeg" alt="Cake Image" class="orderOutline2" data-toggle="modal" data-target="#Modal5"/>-->
                <!--                        --><?php
                //                        $title="Strawberry cake";
                //                        $price=2.05;
                //                        $des="This is a description of Cake.";
                //                        $foodID="cakeQuantity";
                //                        $modal_id = 5;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                </div>-->
                <!---->
                <!---->
                <!---->
                <!--                <div class="col-md-4">-->
                <!--                    <h3>DRINK</h3>-->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/water.jpg" alt="Water Image" class="orderOutline3" data-toggle="modal" data-target="#Modal6"/>-->
                <!--                        --><?php
                //                        $title="Water (100ml)";
                //                        $price=0.75;
                //                        $des="This is a description of Water.";
                //                        $modal_id = 6;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/AppleJuice.jpeg" alt="Apple Juice Image" class="orderOutline3" data-toggle="modal" data-target="#Modal7"/>-->
                <!--                        --><?php
                //                        $title="Innocent Apple juice (100ml)";
                //                        $price=1.25;
                //                        $des="This is a description of Apple Juice.";
                //                        $modal_id = 7;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!---->
                <!---->
                <!--                    <div>-->
                <!--                        <img name="item_image" src="../img/coke.jpg" alt="Coke Image" class="orderOutline3" data-toggle="modal" data-target="#Modal8"/>-->
                <!--                        --><?php
                //                        $title="Coke (330ml)";
                //                        $price=1.25;
                //                        $des="This is a description of Coke.";
                //                        $modal_id = 8;
                //                        include("modal.php"); ?>
                <!--                    </div>-->
                <!--                    <br>-->
                <!--                </div>-->
            </div>
            <br><br><hr><br>



            <!--            <form action="" method="post" onsubmit="getdata()">-->
            <div id="step3">

                <h2>STEP 3: View Basket</h2><br><br>

                <p id="shopping_basket"></p><br>

                <p id="grandtotal"></p>
            </div>


            <!--                    <table id="orderTable">-->
            <!--                        <tr style="font-size:2.5rem; background-color: lightgrey">-->
            <!--                            <th style="padding: 15px; text-align: center">DATE</th>-->
            <!--                            <th style="padding: 15px; text-align: center">ITEMS</th>-->
            <!--                            <th style="padding: 15px; text-align: center">QUANTITY</th>-->
            <!--                        </tr>-->
            <!--                        <tr style="font-size:2.0rem; text-align: center ; border-bottom: 1px solid darkgrey">-->
            <!--                            <td style="padding: 15px">aaa</td>-->
            <!--                            <td style="padding: 15px">bbb</td>-->
            <!--                            <td style="padding: 15px">ccc</td>-->
            <!--                        </tr>-->
            <!--                    </table>-->

            <br><br><br>


            <div>
                <button action="order_summary.php" onclick="getdata()" id="toPayment">Proceed payment</button>
                <br><br><br><br><br>
            </div>
            <!--        </form>-->

        </div>

    </div>
<?php require_once('../../private/shared/pages_footer.php');?>