<!doctype html>
<?php
session_start();
?>

<html lang="en">
  <head>
    <title>Hello, world!</title>
	  <?php include 'header.php' ?>
  </head>

  <body>

    <?php
      $chat = "";
      $print = false;
      if (!empty($_POST["chat"]) && !empty($_SESSION["user_id"])) {
        require 'chatprocess.php';
      }
    ?>

    <div class="menu">
        <?php include 'navbar.php' ?>
    </div>

    <div class="container-proj">
      <div class="row">
        <div class="leftside col">
          <p>leftside col</p>

        </div>

        <div class="contents container-scroll col-8">
          <div class="scroll-bar" style="">
            <div class="">
              <?php
                require 'connect_db_oop.php';

                $sql = "SELECT * FROM world_chat_db";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                  echo $row["fname"]. ": " . $row["message"] . "<br>";
                }

                $conn->close();
              ?>
            </div>
          </div>
          <div class="container-fluid">
            <form class="text-right" action="#chatbox" method="post">
              message <input id="chatbox" type="text" name="chat" value="" style="width: 80%"> <input type="submit" name="submit" value="Enter">
            </form>
          </div>
        </div>

        <div class="rightside col">
          <p>rightside col</p>

        </div>
      </div>
    </div>


    <div class="footer">
      <?php include 'footer.php' ?>
    </div>
  </body>
</html>
