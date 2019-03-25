<?php session_start();

$last_active = $_SERVER['REQUEST_TIME'];
$timeout_duration = 3600;
if (isset($_SESSION['LAST_ACTIVITY']) &&
    ($last_active - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

$_SESSION['LAST_ACTIVITY'] = $last_active;


ob_start(); //output buffering turned on


//Assign file paths to PHP constants
// __FILE__ returns the current path of this file
//dirname() returns the path of the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

//Assign root URL to a php constant
$public_end=strpos($_SERVER['SCRIPT_NAME'], '/public')+7;
$doc_root = substr($_SERVER['SCRIPT_NAME'],0, $public_end);
define("WWW_ROOT", $doc_root);

require ('functions.php');

require ('password.php');

require ('data_base_connection.php');





?>