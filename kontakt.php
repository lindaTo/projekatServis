<?php
	
	session_start();

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
					<?php
						if(isset($_SESSION['adminUser'])){
							require_once('poz-admin.php');
						}else if(isset($_SESSION['serviserUser'])){
							require_once('poz-serviser.php');
						}else {
							echo " ";
						}
					?>
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
					<form action="kontakt-s.php" method="POST">
						<h1>KONTAKT</h1>
						<input type="text" name="ime" value="" class="reg-user" placeholder="Ime i prezime" autofocus/>
						<input type="text" name="email" value="" class="reg-user" placeholder="Email adresa"/>
						<input type="text" name="naslov" value="" class="reg-user" placeholder="Naslov poruke"/>
						<textarea name="poruka" rows="10" cols="40" class="reg-user-t" placeholder="Vasa poruka"></textarea>
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