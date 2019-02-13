<?php

require_once ('credential.php');

function dataConnect() {
    $connection = mysqli_connect(dbhost, dbuser, dbpw, dbname);
    return $connection;

}

function dataDisconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

$db = dataConnect();

?>