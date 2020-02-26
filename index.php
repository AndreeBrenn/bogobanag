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
        <div class="leftside col">
          <p>leftside col</p>
        </div>

        <div class="contents col-8">
          <p>m </p>
          <?php
          $file = fopen("text.txt", "r");
          echo fread($file, filesize("text.txt"));
          fclose($file);
          ?>
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
