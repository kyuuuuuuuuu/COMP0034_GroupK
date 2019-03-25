<?php //Connect the page to the database

//Get the credential for database connection
require_once('credential.php');

//Function to connect to the database
function dataConnect() {
    $connection = mysqli_connect(dbhost, dbuser, dbpw, dbname);
    return $connection;

}

//Function to disconnect the connection
function dataDisconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

//Create a database connection variable call $db
$db = dataConnect();

?>