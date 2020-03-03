<!doctype html>
<?php
session_start();
?>

<html lang="en">
  <head>
    <title>Login</title>
	  <?php include 'header.php' ?>
  </head>

  <body>
    <div class="menu">
        <?php include 'navbar.php' ?>
    </div>

    <div class="container-proj">
      <div class="row">
        <div class="leftside col disablediv">
        </div>

        <div class="contents col-8">
          <h1>LOGIN</h1>
          <p></p>

          <?php
            $uname = $psword = "";
            $err = "";

            if (empty($_POST["username"])) {
                echo $err = "*enter your username<br>";
            }
            else {
              $uname = test_input($_POST["username"]);
            }
            if (empty($_POST["password"])) {
              echo $err = "*enter your password";
            }
            else {
              $psword = test_input($_POST["password"]);
            }

            $bool = false;

            if (empty($err)) {
              require 'connect_db_oop.php';
              $sql = "SELECT * FROM users_db";
              $result = $conn->query($sql);

              while ($row = $result->fetch_assoc()) {
                if ($row["username"] == $uname && $row["password"] == SHA1($psword)) {
                  echo "loginsuccess!";
                  $_SESSION["user_id"] = $row["user_id"];
                  $_SESSION["fname"] = $row["fname"];
                  $_SESSION["email"] = $row["email"];
                  $_SESSION["username"] = $row["username"];
                  $bool = true;
                }
              }
              $conn->close();

              if ($bool == false) {
                echo "wrong username/password";
              }else{
                header ('location: index.php');
              }
            }



            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }

            ?>


          <form class="" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            USERNAME: <input type="text" name="username" value=""> <br>
            PASSWORD: <input type="password" name="password" value=""> <br>
            <input type="submit" name="" value="login">
          </form>
        </div>


        <div class="rightside col disablediv">
        </div>
      </div>
    </div>

    <div class="footer">
      <?php include 'footer.php' ?>
    </div>
  </body>
</html>
