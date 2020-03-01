<?php
$servername = "localhost";
$username = "admin";
$password = "admin";

try {
    $conn = new PDO("mysql:host=localhost; dbname=database123", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
