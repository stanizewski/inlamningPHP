<?php

// PHP SETTINGS
$host = "localhost";
$user = "root";
$pass = "";
$db = "api";

// MAKE CONNECTION
try {
    $dsn = "mysql:host=$host;dbname=$db;";
    $database_handler = new PDO($dsn, $user, $pass);

} catch(PDOException $e) {
    // ON ERROR
    echo "Error! ". $e->getMessage() ."<br />";
    die;
}


?>