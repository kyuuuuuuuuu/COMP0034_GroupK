<?php require_once ('data_base_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DinnersDirect</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dinnersDirect.css">
<!--    <link rel="stylesheet" href="css/testingYJ.css">-->
    <script src="js/slideShow.js" defer></script>
    <script src="js/emptyfield.js" defer></script>
    <script src="js/form.js" defer></script>
    <script src="js/order_date.js" defer></script>
    <script src="js/order_aftersubmit.js" defer></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
<!--<h4>DinnersDirect</h4>-->
<div class="navbar navbar-light bg-light">
    <!-- Logo image attached to Nav Bar -->
    <a href="index.php" class="a">
        <img src="img/logo.jpg" alt="DinnersDirect Logo" height="60" />
    </a>
<!--    <a href="index.php" class="a">HOME</a>-->
    <a href="dinners_direct_order.php" class="a">ORDER</a>
    <a href="dinners_direct_login.php" class="a">LOGIN</a>
    <a href="dinners_direct_signup.php" class="a">SIGN UP</a>
    <a href="dinners_direct_myAccount.php" class="a">MY ACCOUNT</a>
    <a href="dinners_direct_basket.php" class="a">BASKET</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>