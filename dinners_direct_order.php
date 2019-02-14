<?php require_once ('dinners_direct_header.php');?>

    <div class="card-header text-center">
        <h1>Place your order</h1>
    </div>
    <div class="container">
        <div class="text-center">
            <br><br>
            <h2>STEP 1: Choose date</h2><br>
            <input type="date" name="orderDate_"><br><br>
            <a href="#section_">
                <button class="btn-secondary rounded btn-lg" type="submit">OK</button></a>
            </a>
<!--            validate date-->
<!--            today - two months from today-->
            <br><br>
        </div>
    </div>
<!--<div style="background-color: #f8d7da">-->
        <div class="container">
        <hr>
        <div id="section_"><br>
            <div class="text-center">
                <h2> STEP 2: Choose items</h2>
                <h4 style="color: darkred">Click items for more information and to choose quantity</h4><br>
            </div>
        <div class="row">
        <div class="col-md-4 text-center">
        <h3>MAIN</h3>
            <div>
<!--                PUT STYLE UNDER CSS -->
<!--                TRIGGER THE MODAL WHEN CLICK THE IMAGE-->
                <img src="img/burger.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#firstModal"/>
                <br>
                <a data-toggle="modal" data-target="#firstModal">Beef burger with chips</a>
                <br><br>

<!--                Modal -->
                <div id="firstModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
<!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Beef burger with chips</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                                <div class="modal-body">
                                    <b>Price: £3.50</b>/unit<br>
                                    <b>Description: </b>This is a description of this item.<br>
                                </div>
                                <div class="modal-footer" action="">
                                    <h4>Quantity: <input type="number" name="burgerQuantity" min="1" max="5"></h4>
                                    <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div>
                <img src="img/koleno.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" />
                <br>Koleno<br>
                <b>£2.70</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="kolenoQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
            <br>

            <div>
                <img src="img/lamb.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" />
                <br>Lamb (100g)<br>
                <b>£2.50</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="lampQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
        </div>

        <div class="col-md-4 text-center">
            <h3>DESSERTS</h3>
            <div>
                <img src="img/fruit.jpg" style=" border:10px solid darkslateblue; border-radius: 50%" width="250"/>
                <br>Fruit Snack(80g)<br>
                <b>£1.80</b>/unit<br>
<!--                *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="fruitQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
                <!--                put final one later??-->
            </div>
            <br>

            <div>
                <img src="img/rvCake.jpeg" style=" border:10px solid darkslateblue; border-radius: 50%" width="250"/>
                <br>Red velvet Cake<br>
                <b>£2.00</b>/slice<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="rvQuantity" min="1" max="5">
<!--                put final one later??-->
                <button class="btn-secondary rounded" type="submit">Add</button>
            </div>
            <br>

            <div>
                <img src="img/cake.jpeg" style=" border:10px solid darkslateblue; border-radius: 50%" width="250"/>
<!--                check if (height) works-->
                <br>(what) Cake<br>
                <b>£2.00</b>/slice<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="cupQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
        </div>

        <div class="col-md-4 text-center">
            <h3>DRINK</h3>
            <div>
                <img src="img/water.jpg" style=" border:10px solid slategrey; border-radius: 50%" width="250"/>
                <br>Water(100ml)<br>
                <b>£0.70</b>/unit<br>
<!--                *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="waterQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
            <br>

            <div>
                <img src="img/Apple%20juice.jpeg" style=" border:10px solid slategrey; border-radius: 50%" width="250"/>
                <br>Innocent Apple juice(100ml)<br>
                <b>£1.20</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="juiceQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
            <br>

            <div>
                <img src="img/coke.jpg" style=" border:10px solid slategrey; border-radius: 50%" width="250"/>
                <br>Coke(100ml)<br>
                <b>£1.00</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="cokeQuantity" min="1" max="5">
                <button class="btn-secondary rounded" type="submit">Add</button>
<!--                put final one later??-->
            </div>
        </div>
        </div>
        <br><br>
        <button class="btn-block btn-lg btn-secondary rounded" type="submit" data-toggle="modal" data-target="#secondModal">Add to basket</button><br><br>
            <!--                Modal -->
            <div id="secondModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Success!</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Order on (date) has successfully added to basket!</p>
                        </div>
                        <div class="modal-footer" action="">
                            <button type="button" class="btn-primary rounded" data-dismiss="modal">Order More</button>
                            <button type="button" class="btn-secondary rounded" data-dismiss="modal">View Basket</button>
                        </div>
                    </div>
                </div>
            </div>
<!--    </div>-->
<!--        </div>-->
</div>

<?php require_once ('dinners_direct_footer.php');?>