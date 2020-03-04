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
      $roomdb = $_SESSION["roomtable"];

      require 'connect_db_oop.php';
      $checkdb = "SELECT * FROM $roomdb";
      //if theres no database auto create one
      if (!$conn->query($checkdb)) {
        echo "table not found creating one...<br>";
        $sql = "CREATE TABLE `database123`.`$roomdb` (
          `user_id` INT NOT NULL ,
          `fname` VARCHAR(50) NOT NULL ,
          `message` VARCHAR(1000) NOT NULL ,
          `date_time` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
          `chat_no` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`chat_no`)
        ) ENGINE = InnoDB;";

        if (!$conn->query($sql)) {
          echo $roomdb . " successfully added";
        }
      }
      $conn->close();

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
          <form class="" action="room.php" method="post">
            <input type="text" name="room" value="">
            <input type="submit" name="submitroom" value="Join Room">
          </form>
        </div>

        <div class="contents container-scroll col-8">
          <div class="scroll-bar" style="">
            <div class="">
              <?php
                require 'connect_db_oop.php';
                $sql = "SELECT * FROM $roomdb";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                  ?>
                  <div class="chat_box">
                  <?php echo "<b>" . $row["fname"]. "</b>:<br>" . $row["message"] . "<br>"; ?>
                  </div>
                  <?php
                }

                $conn->close();
              ?>
            </div>
          </div>
          <div class="container message-box">
            <form class="text-right" action="#chatbox" method="post">
              message <input id="chatbox" type="text" name="chat" value="" style="width: 80%"> <input type="submit" name="submit" value="Enter">
            </form>
          </div>
        </div>

        <div class="rightside col">
          <p>

          </p>

        </div>
      </div>
    </div>


    <div class="footer">
      <?php include 'footer.php' ?>
    </div>
  </body>
</html>
