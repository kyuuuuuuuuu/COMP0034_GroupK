<?php require_once ('dinners_direct_header.php');?>

    <div class="card-header text-center">
        <h1>Place your order</h1>
    </div>
    <div class="container">
        <div class="text-center">
            <br><br>
            <form action="" method="get">
                <h2>STEP 1: Choose date</h2><br>
                <input type="date" id="thisdate" required><br><br>

                <a href="#section_">
                    <button class="btn-secondary rounded btn-lg" type="submit">OK</button></a>
                </a>
            </form>
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
                <img src="img/burger.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal1"/>
                <br>
                <a data-toggle="modal" data-target="#Modal1">Beef burger with chips</a>
                <br><br>

<!--                Modal -->
                <div id="Modal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">
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
                <img src="img/koleno.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal2"/>
                <br>
                <a data-toggle="modal" data-target="#Modal2">Koleno</a>
                <br><br>

                <!--                Modal -->
                <div id="Modal2" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Koleno</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £2.70</b>/unit<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="kolenoQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


            <div>
                <img src="img/lamb.jpeg" style=" border:10px solid cornflowerblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal3"/>
                <br>
                <a data-toggle="modal" data-target="#Modal3">Lamb</a>
                <br><br>

                <!--                Modal -->
                <div id="Modal3" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Lamb</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £2.50</b>/unit<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="lambQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-4 text-center">
            <h3>DESSERTS</h3>
            <div>
                <img src="img/fruit.jpg" style="border:10px solid darkslateblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal4"/>
                <br>
                <a data-toggle="modal" data-target="#Modal4">Fruit Snack(80g)</a>
                <br><br>

                <!--                Modal -->
                <div id="Modal4" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Fruit Snack (80g)</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £1.80</b>/unit<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="fruitQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


            <div>
                <img src="img/rvCake.jpeg" style="border:10px solid darkslateblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal5"/>
                <br>
                <a data-toggle="modal" data-target="#Modal5">Red velvet Cake</a>
                <br><br>
                <!--                Modal -->
                <div id="Modal5" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Red velvet Cake</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £2.00</b>/slice<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="rvQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


            <div>
                <img src="img/cake.jpeg" style="border:10px solid darkslateblue; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal6"/>
                <br>
                <a data-toggle="modal" data-target="#Modal6">(what) Cake</a>
                <br><br>
                <!--                Modal -->
                <div id="Modal6" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">(what) Cake</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £2.00</b>/slice<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="cakeQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-4 text-center">
            <h3>DRINK</h3>
            <div>
                <img src="img/water.jpg" style="border:10px solid slategrey; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal7"/>
                <br>
                <a data-toggle="modal" data-target="#Modal7">Water (100ml)</a>
                <br><br>
                <!--                Modal -->
                <div id="Modal7" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Water (100ml)</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £0.70</b>/slice<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="waterQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


            <div>
                <img src="img/Apple%20juice.jpeg" style="border:10px solid slategrey; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal8"/>
                <br>
                <a data-toggle="modal" data-target="#Modal8">Innocent Apple juice (100ml)</a>
                <br><br>
                <!--                Modal -->
                <div id="Modal8" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Innocent Apple juice (100ml)</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £1.20</b>/slice<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="juiceQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


            <div>
                <img src="img/coke.jpg" style="border:10px solid slategrey; border-radius: 50%" width="250" data-toggle="modal" data-target="#Modal9"/>
                <br>
                <a data-toggle="modal" data-target="#Modal9">Coke (330ml)</a>
                <br><br>
                <!--                Modal -->
                <div id="Modal9" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!--                        modal-sm-->
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Coke (330ml)</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <b>Price: £1.20</b>/slice<br>
                                <b>Description: </b>This is a description of this item.<br>
                            </div>
                            <div class="modal-footer" action="">
                                <h4>Quantity: <input type="number" name="cokeQuantity" min="1" max="5"></h4>
                                <button type="button" class="btn-secondary rounded" data-dismiss="modal">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<!--        <br><br><br>-->
<!--        <form action="" method="get"> -->
            <button class="btn-block btn-lg btn-secondary rounded" type="submit" data-toggle="modal" data-target="#secondModal">Add to basket</button>
<!--            <br><br>-->
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
                            <button type="submit" class="btn btn-primary rounded" data-dismiss="modal" id="refresh">Order More</button>
                            <button type="submit" class="btn btn-secondary rounded" data-dismiss="modal" id="toBasket">View Basket</button>

                        </div>
                    </div>
                </div>
            </div>
<!--        </form>-->

</div>

<?php require_once ('dinners_direct_footer.php');?>