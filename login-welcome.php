<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
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
          <h1>WELCOME TO TITLE</h1>
          <?php
          $name = $_POST["username"];
          $password = $_POST["password"];
          echo "welcome " . $name . "<br>";
          echo "yourpw: " . $password;
           ?>
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
