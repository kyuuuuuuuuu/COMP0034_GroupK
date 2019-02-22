<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');


$public_end=strpos($_SERVER['SCRIPT_NAME'], '/public')+7;
//echo "public end here: ". $public_end;
//echo "<br>";
$doc_root = substr($_SERVER['SCRIPT_NAME'],0, $public_end);
//echo $_SERVER['SCRIPT_NAME'];
//echo $doc_root . "";
define("WWW_ROOT", $doc_root);
//echo "<br>echo not cecho";
//echo "<br>WWW ROOT here: " . WWW_ROOT;

include ('functions.php');



?>