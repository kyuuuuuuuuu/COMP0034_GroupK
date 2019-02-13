<?php require_once ('data_base_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DinnersDirect</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dinnersDirect.css">
    <script src="js/slideShow.js" defer></script>
    <script src="js/emptyfield.js" defer></script>
    <script src="js/validation.js" defer></script>

</head>
<body>
<div class="navbar navbar-light bg-light">
    <!-- Logo image attached to Nav Bar -->
    <img src="img/DinnersDirectLogo.jpeg" alt="DinnersDirect Logo" height="60" width="58"/>

    <a href="index.php" class="a">Home</a>
    <a href="dinners_direct_order.php" class="a">Order</a>
    <a href="dinners_direct_login.php" class="a">Login</a>
    <a href="dinners_direct_signup.php" class="a">Sign Up</a>
    <a href="dinners_direct_myAccount.php" class="a">My Account</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>