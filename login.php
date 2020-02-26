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

          <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            USERNAME: <input type="text" name="username" value=""> <br>
            PASSWORD: <input type="password" name="password" value=""> <br>
            <input type="submit" name="" value="LOGIN">
          </form>
          <?php

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
