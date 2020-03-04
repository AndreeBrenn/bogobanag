<?php
$user_id = $_SESSION["user_id"];
$fname = $_SESSION["fname"];
$chat = $_POST["chat"];

require "connect_db_oop.php";

$roomtable = $_SESSION["roomtable"];

$sql = "INSERT INTO $roomtable(user_id, fname, message, date_time, chat_no)
VALUES ('$user_id', '$fname', '$chat', NOW(), '')";

$conn->query($sql);

$conn->close();
 ?>
