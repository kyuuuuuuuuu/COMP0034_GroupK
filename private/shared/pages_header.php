<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $page_title;?></title>

<!--    Link to External Stylesheets-->
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dinnersDirect.css');?>">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.css');?>">

<!--    Link to Jquery files-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous" defer></script>

    <!--    Link to Our Javascript files-->
    <script src="<?php echo url_for('/js/slideShow.js');?>" defer></script>
    <script src="<?php echo url_for('js/form.js');?>" defer></script>
    <script src="<?php echo url_for('js/order.js');?>" defer></script>
    <?php if ($page_title == "Search Function") {?>
    <script src="<?php echo url_for('js/search_food.js');?>" defer></script>
    <?php }?>


</head>
<body>
<div class="main_body">
<!--<h4>DinnersDirect</h4>-->
    <div class="navbar navbar-light bg-light">
        <!-- Logo image attached to Nav Bar -->
        <a href="<?php echo url_for('/pages/index.php'); ?>" class="a">
            <img src="<?php echo url_for('/img/logo.jpg'); ?>" alt="DinnersDirect Logo" height="100" />
        </a>
        <a href="<?php echo url_for('/pages/order/index.php'); ?>">ORDER</a>
        <?php if($not_log_in) { ?>
            <a href="<?php echo url_for('/pages/log_in/index.php'); ?>">LOGIN</a>
            <a href="<?php echo url_for('/pages/sign_up/index.php'); ?>">SIGN UP</a>
        <?php }else {?>
            <a href="<?php echo url_for('/pages/my_account/index.php'); ?>">MY ACCOUNT</a>
            <a href="<?php echo url_for('/pages/log_out.php'); ?>">LOG OUT</a>
        <?php }?>
        <form class="form-inline my-2 my-lg-0" method="get" action="<?php echo url_for('/pages/search.php'); ?>">
            <input class="form-control mr-sm-2" type="search" placeholder="Search for food..." aria-label="Search" name="key_word">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>