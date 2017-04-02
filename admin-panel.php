<?php

	session_start();

	if (!isset($_SESSION['adminUser'])){
		header ('Location: logout.php');
		exit;
	}

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Lion Computers - Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="stilovi.css"/>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="logo-area">
					<a href="index.php"><img src="slike/logo.png" alt="Lion Computers"></a>
					<div class="userinfo">
						<p>Pozdrav <strong><?php echo $_SESSION['adminUser'];?></strong></p>
						<a href="logout.php">Izloguj se</a>
					</div>
				</div>
			</div>
			<div class="content">
			<?php
				
				if(isset($_SESSION['adminUser'])){
					require_once('menu-admin.php');
				}else if(isset($_SESSION['serviserUser'])){
					require_once('menu-serviser.php');
				}else {
					require_once('menu.php');
				}
				
			?>
				<div class="panel">
					<a href="kvar-pregled-admin.php">Pregled svih kvarova</a><br>
					<a href="kvar-register.php">Prijavi novi kvar</a><br>
					<a href="serviser-pregled.php">Pregled svih servisera</a><br>
					<a href="serviser-register.php">Registruj novog servisera</a><br>
					<a href="admin-pregled.php">Pregled svih administratora</a><br>
					<a href="admin-register.php">Unesi novog administratora</a><br>
				</div>
			</div>
			<div class="footer">
				<p class="cr">2017 &copy; Lion Computers</p>
				<p class="links">
					<a href="admin-login.php">Admin Login</a>
					 | 
					<a href="serviser-login.php">Serviser Login</a>
				</p>
			</div>
		</div>
	</body>
</html>