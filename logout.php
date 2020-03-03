<?php
  session_start();
  unset($_SESSION["id"]);
  unset($_SESSION["uname"]);
  unset($_SESSION["email"]);
  unset($_SESSION["fname"]);
  header ('location: login.php');
 ?>
