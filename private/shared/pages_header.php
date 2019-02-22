

<?php require_once('data_base_connection.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DinnersDirect</title>
    <link rel="stylesheet" href="../../public/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="../../public/stylesheets/dinnersDirect.css">
<!--    <link rel="stylesheet" href="css/testingYJ.css">-->
    <script src="../../public/js/slideShow.js" defer></script>
    <script src="../../public/js/emptyfield.js" defer></script>
    <script src="../../public/js/form.js" defer></script>
    <script src="../../public/js/order_date.js" defer></script>
    <script src="../../public/js/order_quantity.js" defer></script>
    <script src="../../public/js/order_aftersubmit.js" defer></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
<!--<h4>DinnersDirect</h4>-->
<div class="navbar navbar-light bg-light">
    <!-- Logo image attached to Nav Bar -->
    <a href="../../public/pages/index.php" class="a">
        <img src="../../public/img/logo.jpg" alt="DinnersDirect Logo" height="60" />
    </a>
<!--    <a href="index.php" class="a">HOME</a>-->
    <a href="../../public/pages/order.php">ORDER</a>
    <a href="../../public/pages/login.php" class="a">LOGIN</a>
    <a href="../../public/pages/signup.php" class="a">SIGN UP</a>
    <a href="../../public/pages/myaccount.php" class="a">MY ACCOUNT</a>
    <a href="../../public/pages/basket.php" class="a">BASKET</a>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>