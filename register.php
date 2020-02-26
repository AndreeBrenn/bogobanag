<!doctype html>
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
            $fname = $username = $password = $passwordv = $email = "";
            $fnameerr = $usernameerr = $passworderr = $passwordverr = $emailerr = "";

            if (empty($_POST["fname"])) {
              echo $fnameerr = "*Full name required!<br>";
            }
            else {
              if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
                echo $fnameerr = "*Full name: Only letters and white space allowed<br>";
              }
              else {
                $fname = test_input($_POST["fname"]);
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
              echo $usernamerr = "*Username required!<br>";
            }
            else {
              $username = test_input($_POST["username"]);
            }

            if (empty($_POST["password"])) {
              echo $passworderr = "*Password required!<br>";
            }
            else {
              $password = test_input($_POST["password"]);
            }

            if (empty($_POST["passwordv"])) {
              echo $passwordverr = "*Retype your password!<br><br>";
            }
            else {
              $passwordv = test_input($_POST["passwordv"]);
              if ($password != $passwordv) {
                echo $passwordverr = "please write the same password!";
              }
            }

            if (empty($fnameerr . $usernameerr . $emailerr . $passworderr . $passwordverr)) {
              echo "Good job!";
              header ("location: login.php");
            }

            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
           ?>

          <form class="text-right" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Full Name: <input type="text" name="fname" value="<?php echo $fname; ?>"> <br>
            Username: <input type="text" name="username" value="<?php echo $username; ?>"> <br>
            Email: <input type="text" name="email" value="<?php echo $email; ?>"> <br>
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
