<?php require_once ('dinners_direct_header.php');?>

    <div class="card-header text-center">
        <h1>Place your order</h1>
    </div>

    <div class="container">
        <h3>Choose date</h3>
        <input type="date" id="orderDate" name="orderDate_">
        <br><br>
<!--        MENU TO APPEAR AFTER CHOOSING DATE-->
        <hr>
        <br>
        <p>Click items to choose</p>
        <div class="row">
        <div class="col-md-4 text-center">
        <h3>Main</h3>
            <div>
                <img src="img/pasta.jpg" alt="Pasta" width="200" onclick="alert('Choose quantity')"/>
                <br>Pasta</br>
<!--                *CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="pastaQuantity" min="1" max="5">
                <input type="submit" name="pastaQ" value="Go">
<!--                put final one later??-->
            </div>
            <br>

            <div>
                <img src="img/pizza.jpg" alt="Pizza" width="200"/>
                <br>Pizza</br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="pizzaQuantity" min="1" max="5">
                <input type="submit" name="pizzaQ" value="Go">
<!--                put final one later??-->
            </div>
            <br>

            <div>
            <img src="img/lasagna.jpg" alt="lasagna" width="200"/>
            <br>Lasagna</br>
<!--                CHANGE* CHOOSE THE QUANTITY WHEN CLICKED-->
                Choose the quantity: <input type="number" name="lasagnaQuantity" min="1" max="5">
                <input type="submit" name="lasagnaQ" value="Go">
<!--                put final one later??-->
            </div>
        </div>

        <div class="col-md-4 text-center">
            <h3>Desserts</h3>
        </div>

        <div class="col-md-4 text-center">
            <h3>Drink</h3>
        </div>
        </div>
        <br><br>
        <button class="btn-block btn-lg btn-secondary" type="submit">Add to basket</button><br><br>
    </div>

<?php require_once ('dinners_direct_footer.php');?>