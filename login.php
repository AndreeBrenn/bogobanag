<!doctype html>
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
            $usernameerr = $passworderr = "";
            $username = $password = "";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["username"])) {
                $usernameerr = "Username is required!";
                echo "*" . $usernameerr . "<br>";
              }
              else {
                $username = input($_POST["username"]);
                echo $username . "<br>";
              }
              if (empty($_POST["password"])) {
                $passworderr = "Password is required!";
                echo "*" . $passworderr . "<br>";
              }
              else {
                $password = input($_POST["password"]);
                echo $password . "<br>";
              }
            }

            function input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
           ?>

          <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            USERNAME: <input type="text" name="username" value="<?php echo $username; ?>"> <br>
            PASSWORD: <input type="password" name="password" value=""> <br>
            <input type="submit" name="" value="LOGIN">
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
