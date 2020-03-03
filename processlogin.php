<?php
  $username = $password = "";

  require 'connect_db_oop.php';
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);

  $sql = "SELECT username, password FROM users_db";
  $result = $conn->query($sql);

  $bool = false;

  while ($row = $result->fetch_assoc()) {
    if ($row["username"] == $username && $row["password"] == SHA1($password)) {
      header ('location: index.php');
    }
    else {
      $passworderr = "Wrong username/password";
      header ('location: login.php');
    }
  }

  $conn->close();

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>
