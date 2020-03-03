<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$db = "database123";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
