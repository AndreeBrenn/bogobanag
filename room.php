<?php
 session_start();
  $roomsearch = $_POST["room"];

  if ($roomsearch == "world"){
    $roomsearch = "123";
  }

  echo $_POST["room"];
  if ($roomsearch && preg_match("/^[a-zA-Z ]*$/",$roomsearch)) {
    $_SESSION["roomtable"] = test_input($roomsearch);
    $_SESSION["roomname"] = test_input($roomsearch);
  }else{
    $_SESSION["roomtable"] = "world_chat_db";
    $_SESSION["roomname"] = "world_chat_db";
  }

  header ('location: worldchat.php');


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/\s+/', '', $data); //remove whitespaces
    return $data;
  }
 ?>
