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
					<div class="userinfo">
						<p>Pozdrav <strong><?php echo $_SESSION['serviserUser'];?></strong></p>
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
					<form action="kvar-register-s-ser.php" method="POST">
						<h1>REGISTRUJ NOVI KVAR</h1>
						<input type="text" name="naziv" value="" class="reg-user" placeholder="Naziv"/>
						<input type="text" name="opis" value="" class="reg-user" placeholder="Opis"/>
						<input type="text" name="trajanje" value="" class="reg-user" placeholder="Predvidjeno trajanje popravke"/>
						<input type="text" name="cena" value="" class="reg-user" placeholder="Cena popravke"/>
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