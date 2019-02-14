<!--MAKE BOX AROUND EACH ITEM-->
<!--MENU TO APPEAR AFTER CHOOSING DATE-->
<!--*CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
<!--null 0 if quantity is not chosen-->

<?php require_once ('dinners_direct_header.php');?>


    <div class="card-header text-center">
        <h1>Place your order</h1>
    </div>

    <div class="container">
        <h3>Choose date</h3>
        <input type="date" id="orderDate" name="orderDate_">
        <br><br>
        <hr>
        <br>
        <p>Click items to choose quantity</p>
        <div class="row">
        <div class="col-md-4 text-center">
        <h3>Main</h3>
            <div class="border">
<!--               <fieldset class="border">-->
<!--               <img src="img/pasta.jpg" alt="Pasta" width="200" onclick="alert('Choose quantity')"/>-->
                <img src="img/burger.jpeg" width="200" />
                <br>Beef burger with chips<br>
                <b>£3.50</b>/unit<br>
<!--               *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="burgerQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
<!--                </fieldset>-->

            </div>
            <br>

            <div class="border">
                <img src="img/koleno.jpeg" width="200"/>
                <br>Koleno<br>
                <b>£2.70</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="kolenoQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
            <br>

            <div class="border">
                <img src="img/lamp.jpeg" width="200"/>
                <br>Lamp (100g)<br>
                <b>£2.50</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="lampQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
        </div>

        <div class="col-md-4 text-center">
            <h3>Desserts</h3>
            <div class="border">
                <img src="img/fruit.jpg" width="200" onclick="alert('Choose quantity')"/>
                <br>Fruit Snack(80g)<br>
                <b>£0.80</b>/unit<br>
<!--                *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="fruitQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
                <!--                put final one later??-->
            </div>
            <br>

            <div class="border">
                <img src="img/rvCake.jpeg" width="200"/>
                <br>Red velvet Cake<br>
                <b>£2.00</b>/slice<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="rvQuantity" min="1" max="5">
<!--                put final one later??-->
                <button class="btn-secondary" type="submit">OK</button>
            </div>
            <br>

            <div class="border">
                <img src="img/cake.jpeg" height="200"/>
<!--                check if (height) works-->
                <br>(what) Cake<br>
                <b>£2.00</b>/slice<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="cupQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
        </div>

        <div class="col-md-4 text-center">
            <h3>Drink</h3>
            <div class="border">
                <img src="img/water.jpg" width="200" onclick="alert('Choose quantity')"/>
                <br>Water(100ml)<br>
                <b>£0.70</b>/unit<br>
<!--                *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="waterQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
            <br>

            <div class="border">
                <img src="img/Apple%20juice.jpeg" width="200"/>
                <br>Innocent Apple juice(100ml)<br>
                <b>£1.20</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="juiceQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
            <br>

            <div class="border">
                <img src="img/coke.jpg" width="200"/>
                <br>Coke(100ml)<br>
                <b>£1.00</b>/unit<br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="cokeQuantity" min="1" max="5">
                <button class="btn-secondary" type="submit">OK</button>
<!--                put final one later??-->
            </div>
        </div>
        </div>
        <br><br>
        <button class="btn-block btn-lg btn-secondary" type="submit">Add to basket</button><br><br>
    </div>

<?php require_once ('dinners_direct_footer.php');?>