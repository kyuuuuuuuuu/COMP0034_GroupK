<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DinnersDirect-Staff</title>
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/dinnersDirect.css');?>">
    <!--    <link rel="stylesheet" href="css/testingYJ.css">-->
    <script src="<?php echo url_for('js/form.js');?>" defer></script>

    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.css');?>">

</head>
<body>
<!--<h4>DinnersDirect</h4>-->
<div class="navbar navbar-light bg-light">

    <!-- Logo image attached to Nav Bar -->
    <a href="<?php echo url_for('/pages/index.php'); ?>" class="a">
        <img src="<?php echo url_for('/img/logo.jpg'); ?>" alt="DinnersDirect Logo" height="100" />
    </a>
    <a href="<?php echo url_for('/staff/item/index.php'); ?>">Items</a>
    <a href="<?php echo url_for('/staff/menu/index.php'); ?>">Menu</a>
    <a href="<?php echo url_for('/staff/school/index.php'); ?>">School</a>
    <a href="<?php echo url_for('/staff/staff_log_out.php'); ?>">Log out</a>
</div>


<header class="card-header text-center font-weight-bolder">
    DinnersDirect Staff Area
</header>
<br><br>
<div class="main_body">