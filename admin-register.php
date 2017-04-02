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
		<title>Lion Computers - Servis</title>
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
				<div class="form-area">
					<form action="admin-register-s.php" method="POST">
						<h1>REGISTRUJ NOVOG ADMINISTRATORA</h1>
						<input type="text" name="ime" value="" class="reg-user" placeholder="Ime" autofocus/>
						<input type="text" name="prezime" value="" class="reg-user" placeholder="Prezime" autofocus/>
						<input type="text" name="telefon" value="" class="reg-user" placeholder="Broj telefona" autofocus/>
						<input type="text" name="email" value="" class="reg-user" placeholder="Email adresa" autofocus/>
						<input type="text" name="username" value="" class="reg-user" placeholder="Korisnicko ime"/>
						<input type="password" name="password" value="" class="reg-user" placeholder="Lozinka"/>
						<input type="submit" value="Potvrdi" class="login-submit">
					</form>
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