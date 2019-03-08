<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DinnersDirect</title>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dinnersDirect.css');?>">
<!--    <link rel="stylesheet" href="css/testingYJ.css">-->
    <script src="<?php echo url_for('/js/slideShow.js');?>" defer></script>
    <script src="<?php echo url_for('js/emptyfield.js');?>" defer></script>
    <script src="<?php echo url_for('js/form.js');?>" defer></script>
    <script src="<?php echo url_for('js/order.js');?>" defer></script>

    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.css');?>">

</head>
<body>
<!--<h4>DinnersDirect</h4>-->
<div class="navbar navbar-light bg-light">
    <!-- Logo image attached to Nav Bar -->
    <a href="<?php echo url_for('/pages/index.php'); ?>" class="a">
        <img src="../../public/img/logo.jpg" alt="DinnersDirect Logo" height="100" />
    </a>
<!--    <a href="index.php" class="a">HOME</a>-->
    <a href="<?php echo url_for('/pages/order.php'); ?>">ORDER</a>
    <a href="<?php echo url_for('/pages/login.php'); ?>" class="a">LOGIN</a>
    <a href="<?php echo url_for('/pages/signup.php'); ?>" class="a">SIGN UP</a>
    <a href="<?php echo url_for('/pages/myaccount.php'); ?>" class="a">MY ACCOUNT</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>