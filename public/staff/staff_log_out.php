<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/COMP0034_GroupK/private/initialize.php");
session_unset();
session_destroy();
session_start();
redirect_to(url_for('staff/index.php'));
?>