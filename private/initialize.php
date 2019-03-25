<?php session_start();

$last_active = $_SERVER['REQUEST_TIME'];
$timeout_duration = 3600;
if (isset($_SESSION['LAST_ACTIVITY']) &&
    ($last_active - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    //Automatically log out after being inactive for 1 hour!
    session_unset();
    session_destroy();
    session_start();
}

$_SESSION['LAST_ACTIVITY'] = $last_active;


ob_start(); //output buffering turned on



//Assign root URL to a php constant
$public_end=strpos($_SERVER['SCRIPT_NAME'], '/public')+7;
$doc_root = substr($_SERVER['SCRIPT_NAME'],0, $public_end);
define("WWW_ROOT", $doc_root);

require ('functions.php');

require ('password.php');

require ('data_base_connection.php');





?>