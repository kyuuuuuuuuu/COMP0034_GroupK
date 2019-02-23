<?php require_once('../../private/shared/pages_header.php');?>

    <div class="card-header text-center">
        <h1>Place your order</h1>
    </div>
    <div class="container">
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
        <div>
            <div id="step2">
                <h2> STEP 2: Choose items</h2>
                <h4 id="redcolour">Click items for more information and to choose quantity</h4><br>
            </div>
        <div class="row">
        <div class="col-md-4">
        <h3>MAIN</h3>
            <div>
                <img src="../img/burger.jpeg" alt="Burger Image" class="orderOutline1" data-toggle="modal" data-target="#Modal0"/>
                <?php
                $title="Beef burger with chips";
                $price=3.50;
                $des="This is a description of Burger.";
                $foodID="burgerQuantity";
                $modal_id = 0;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/koleno.jpeg" alt="Koleno Image" class="orderOutline1" data-toggle="modal" data-target="#Modal1"/>
                <?php
                $title="Koleno";
                $price=2.70;
                $des="This is a description of Koleno.";
                $foodID="kolenoQuantity";
                $modal_id = 1;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/lamb.jpeg" alt="Lamb Image" class="orderOutline1" data-toggle="modal" data-target="#Modal2"/>
                <?php
                $title="Lamb";
                $price=2.50;
                $des="This is a description of Lamb.";
                $foodID="lambQuantity";
                $modal_id = 2;
                include("modal.php"); ?>
            </div>
        </div>



        <div class="col-md-4">
            <h3>DESSERTS</h3>
            <div>
                <img src="../img/fruit.jpg" alt="Fruit Snack Image" class="orderOutline2" data-toggle="modal" data-target="#Modal3"/>
                <?php
                $title="Fruit Snack (80g)";
                $price=1.80;
                $des="This is a description of Fruit Snack.";
                $foodID="fruitQuantity";
                $modal_id = 3;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/rvCake.jpeg" alt="rvCake Image" class="orderOutline2" data-toggle="modal" data-target="#Modal4"/>
                <?php
                $title="Red velvet Cake";
                $price=2.00;
                $des="This is a description of rvCake.";
                $foodID="rvQuantity";
                $modal_id = 4;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/cake.jpeg" alt="Cake Image" class="orderOutline2" data-toggle="modal" data-target="#Modal5"/>
                <?php
                $title="Strawberry cake";
                $price=2.00;
                $des="This is a description of Cake.";
                $foodID="cakeQuantity";
                $modal_id = 5;
                include("modal.php"); ?>
            </div>
        </div>



        <div class="col-md-4">
            <h3>DRINK</h3>
            <div>
                <img src="../img/water.jpg" alt="Water Image" class="orderOutline3" data-toggle="modal" data-target="#Modal6"/>
                <?php
                $title="Water (100ml)";
                $price=0.70;
                $des="This is a description of Water.";
                $modal_id = 6;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/AppleJuice.jpeg" alt="Apple Juice Image" class="orderOutline3" data-toggle="modal" data-target="#Modal7"/>
                <?php
                $title="Innocent Apple juice (100ml)";
                $price=1.20;
                $des="This is a description of Apple Juice.";
                $modal_id = 7;
                include("modal.php"); ?>
            </div>
            <br>


            <div>
                <img src="../img/coke.jpg" alt="Coke Image" class="orderOutline3" data-toggle="modal" data-target="#Modal8"/>
                <?php
                $title="Coke (330ml)";
                $price=1.20;
                $des="This is a description of Coke.";
                $modal_id = 8;
                include("modal.php"); ?>
            </div>
            <br>
        </div>
        </div>

            <br><br><hr><br>

        </div>


        <div>
            <div id="step3">
                <form action="" method="get" onsubmit="">
                    <h2>STEP 3: View Basket</h2><br><br>

                    <table id="orderTable">
                        <tr style="font-size:2.5rem; background-color: lightgrey">
                            <th style="padding: 15px; text-align: center">DATE</th>
                            <th style="padding: 15px; text-align: center">ITEMS</th>
                            <th style="padding: 15px; text-align: center">QUANTITY</th>
                        </tr>
                        <tr style="font-size:2.0rem; text-align: center ; border-bottom: 1px solid darkgrey">
                            <td style="padding: 15px">aaa</td>
                            <td style="padding: 15px">bbb</td>
                            <td style="padding: 15px">ccc</td>
                        </tr>
                    </table>
                </form>
                <br><br><br>
            </div>

            <div>
                <button id="toPayment" type="submit">Proceed payment</button>
                <br><br><br><br><br>
            </div>
        </div>
    </div>
    </div>
<?php require_once('../../private/shared/pages_footer.php');?>