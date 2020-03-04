<!doctype html>
<?php
session_start();
?>
<html lang="en">
  <head>
    <title>Registration</title>
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
          <h1>REGISTRATION</h1>

          <?php
            $fname = $uname = $psword = $pswordv = $email = "";
            $fnameerr = $unameerr = $psworderr = $pswordverr = $emailerr = "";


            require 'connect_db_oop.php';
            $dbcheck = "SELECT* FROM user_db";

            //create one user_db...
            if (!$conn->query($dbcheck)){
              $sql = "CREATE TABLE `database123`.`users_db` (
                 `user_id` INT(0000) NOT NULL AUTO_INCREMENT ,
                 `fname` VARCHAR(50) NOT NULL ,
                 `username` VARCHAR(20) NOT NULL ,
                 `email` VARCHAR(50) NOT NULL ,
                 `password` VARCHAR(50) NOT NULL ,
                 PRIMARY KEY (`user_id`)
               ) ENGINE = InnoDB;";
            //query
            $conn->query($sql);
            }
            $conn->close();

            if (empty($_POST["fname"])) {
              echo $fnameerr = "*Full name required!<br>";
            }
            else {
              if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
                echo $fnameerr = "*Full name: Only letters and white space allowed<br>";
              }
              else {
                $fname = $_POST["fname"];
              }
            }

            if (empty($_POST["email"])) {
              echo $emailerr = "*Required Email!<br>";
            }
            else {
              if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                echo $emailerr = "*Invalid email format<br>";
              }
              else {
                $email = test_input($_POST["email"]);
              }
            }

            if (empty($_POST["username"])) {
              echo $unamerr = "*Username required!<br>";
            }
            else {
              $uname = test_input($_POST["username"]);
            }

            if (empty($_POST["password"]) || strlen($_POST["password"]) < 8) {
              echo $psworderr = "*Password required! / 8+ Character<br>";
            }
            else {
              $psword = test_input($_POST["password"]);
            }

            if (empty($_POST["passwordv"])) {
              echo $pswordverr = "*Retype your password!<br><br>";
            }
            else {
              $pswordv = test_input($_POST["passwordv"]);
              if ($psword != $pswordv) {
                echo $pswordverr = "please write the same password!";
              }
            }

            require 'connect_db_oop.php';

            $useremaildup = "SELECT username, email FROM users_db";
            $result = $conn->query($useremaildup);

            $umbool = false;

            while ($row = $result->fetch_assoc()) {
              if ($row["username"] == $uname || $row["email"] == $email) {
                $umbool = true;
              }
            }
            $conn->close();

            if ($umbool == true) {
              echo $unameerr = "duplicate username or  ";
              echo $emailerr = "email <br>";
            }

            if (empty($fnameerr . $unameerr . $emailerr . $psworderr . $pswordverr)) {
              require 'connect_db_oop.php';

              $sql = "INSERT INTO users_db(user_id, fname, username, email, password)
              VALUES ('', '$fname', '$uname', '$email', SHA1('$psword'))";

              if ($conn->query($sql) == true) {
                echo "new record added!";
                header ('location: login.php');
              }
              else {
                echo "please try again.";
              }
              $conn->close();
            }


            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              $data = preg_replace('/\s+/', '', $data);
              return $data;
            }
           ?>

          <form class="text-right" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Full Name: <input type="text" name="fname" value="<?php echo $fname; ?>"> <br>
            Username: <input type="text" name="username" value="<?php echo $uname ?>"> <br>
            Email: <input type="text" name="email" value="<?php echo $email ?>"> <br>
            Password: <input type="password" name="password" value=""> <br>
            Password: <input type="password" name="passwordv" value=""> <br>
            <input type="submit" name="" value="Register">
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
