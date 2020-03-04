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
    <div class="menu">
        <?php include 'navbar.php' ?>
    </div>

    <div class="container-proj">

      <div class="row">
        <div class="leftside col">
          <p>leftside col</p>
        </div>

        <div class="contents col-8">
          <p> <h1>PROJECT CHATTING SYSTEM USING DATABASE<br></h1>
          <h3>DEVELOPERS:</h3> </p>
          FULLSTACK: ASTROLABIO ROUEL <br>
          SALAR ANDREE <br>
          SARCIA JEREMIAH <br>
          AXLE <br>
          AGUNDA <br>
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
