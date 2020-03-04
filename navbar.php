<nav class="navbar navbar-dark bg-dark navbar-expand-lg py-0 mb-4 sticky-top" style="max-height: 60px;">

	<a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<img src="image/menupng.png" alt="menu" width="40px" height="40px">
	</a>

	<a class="navbar-brand p-0" href="index.php"><img src="image/logopng.png" alt="logo" width="auto" height="60"></a>

	<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
		<a class="dropdown-item text-light" href="worldchat.php">World Chat</a>
		<a class="dropdown-item text-light" href="#">List</a>
		<a class="dropdown-item text-light" href="#">Contact</a>
		<a class="dropdown-item text-light" href="#">About</a>
	</div>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="collapse navbar-collapse" id="navbarNav">
		<div class="bg-dark p-1">
			<ul class="navbar-nav">
				<?php if (!isset($_SESSION["user_id"])) { ?>
				<li class="nav-item active">
					<a href="login.php" class="btn btn-info nav-link m-1" role="button">Login</a>
				</li>
				<li class="nav-item active">
					<a href="register.php" class="btn btn-info nav-link m-1" role="button">Register</a>
				</li>
			<?php } else { ?>
				<li class="mx-5">
					USERNAME: <?php echo $_SESSION["username"]?>
				</li>
				<li class="mx-5">
					Fullname: <?php echo $_SESSION["fname"]?>
				</li>
				<li class="mx-5">
					USER ID = <?php echo $_SESSION["user_id"] ?>
				</li>
				<li class="mx-5">
					ROOMTABLE = <?php echo $_SESSION["roomtable"] ?>
				</li>
				<li class="nav-item active">
					<a href="logout.php" class="btn btn-info nav-link m-1" role="button">LOGOUT</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>

</nav>
