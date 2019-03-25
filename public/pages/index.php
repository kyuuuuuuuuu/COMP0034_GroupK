<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>

<?php require_once('check_log_in_status.php');
$page_title = "DinnersDirect";
require_once('../../private/shared/pages_header.php');?>

<div class="container-fluid">
    <br><br>
    <!-- Slide Show code -->
    <div class="slideshow-container">

        <div class="hideByDefault">
            <div class="numbertext">1 / 3</div>
            <img class="slideshow-image" alt="slide show 1"  src="../img/slideshow1.jpg">
            <div class="text">This is slide show 1</div>
        </div>

        <div class="hideByDefault">
            <div class="numbertext">2 / 3</div>
            <img class="slideshow-image" alt="slide show 2"  src="../img/slideshow2.jpeg">
            <div class="text">This is slide show 2</div>
        </div>

        <div class="hideByDefault">
            <div class="numbertext">3 / 3</div>
            <img class="slideshow-image"  alt="slide show 3"  src="../img/slideshow3.jpeg">
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

<?php require_once('../../private/shared/pages_footer.php');?>