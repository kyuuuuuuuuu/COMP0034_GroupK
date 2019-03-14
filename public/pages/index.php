<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('../../private/shared/pages_header.php');?>

<div class="container-fluid">
    <br><br>
    <!-- Slide Show code -->
    <div class="slideshow-container">

        <div class="hideByDefault">
            <div class="numbertext">1 / 3</div>
            <img alt="slide show 1"  src="../img/slideshow1.jpeg" class="slideshow">
            <div class="text">This is slide show 1</div>
        </div>

        <div class="hideByDefault">
            <div class="numbertext">2 / 3</div>
            <img alt="slide show 2"  src="../img/slideshow2.jpeg" class="slideshow">
            <div class="text">This is slide show 2</div>
        </div>

        <div class="hideByDefault">
            <div class="numbertext">3 / 3</div>
            <img alt="slide show 3"  src="../img/slideshow3.jpeg" class="slideshow">
            <div class="text">This is slide show 3</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>

    <br>

    <div class="text-center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <br><br>
    <div id="margin_ten">
        <h4>About DinnersDirect</h4>
        <p>DinnersDirect aims to provide catering services to students and teachers of boarding and independent schools
            around the United Kingdom. We prove a platform to allow our main users (students, parents and teachers) to place orders for their desired meal choices. DinnersDirect
            strives to ensure that every school dinner has access to nutritious, homemade meals at a reasonable and
            affordable cost. The development of a simple user interface allows our main users to browse our menu as well
            as place orders in an effective and efficient manner, without any disturbance.</p><br>

        <h4>Our History</h4>
        <p>DinnersDirect was founded by Yeo Jin Lee in 2017. </p>

    </div>


    <br><br><br><br>
</div>


<!--    <div class="container">-->
<!--        <br><hr>-->
<!--        <main>-->
<!--            <h2 class="text-center"><b>What's New?</b></h2> <br>-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <img alt="Pasta" class="menuimage" height="300" src="img/pasta.jpg" width="355"/>-->
<!--                    <h4 class="text center">Pasta</h4>-->
<!--                    <p class="text-left">This is Pasta.</p>-->
<!--                    <button class="btn btn-block btn-secondary" type="Submit"><i class="fa fa-thumbs-up"> Order Here </i></button><br>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <img alt="Pizza" class="menuimage" height="300" src="img/pizza.jpg" width="355"/>-->
<!--                    <h4 class="text center">Pizza</h4>-->
<!--                    <p class="text-left">This is Pizza.</p>-->
<!--                    <button class="btn btn-block btn-secondary" type="Submit"><i class="fa fa-thumbs-up"> Order Here </i></button><br>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <img alt="lasagna" class="menuimage" height="300" src="img/lasagna.jpg" width="355"/>-->
<!--                    <h4 class="text center">Lasagna</h4>-->
<!--                    <p class="text-left">This is Lasagna.</p>-->
<!--                    <button class="btn btn-block btn-secondary" type="Submit"><i class="fa fa-thumbs-up"> Order Here </i></button><br>-->
<!--                </div>-->
<!--            </div>-->
<!--        </main>-->
<!--    </div>-->


<?php require_once('../../private/shared/pages_footer.php');?>