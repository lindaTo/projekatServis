<?php
			
	session_start();
	
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Lion Computers - Servis</title>
		<link rel="stylesheet" type="text/css" href="stilovi.css"/>
		<script src="js/provera.js" type="text/javascript"></script>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	</head>
	<body>
		<div class="container">
			<div class="header">
				<div class="logo-area">
					<a href="index.php"><img src="slike/logo.png" alt="Lion Computers"></a>
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
					
					include("konekcija.php");
					
					$error = false;

					$username = trim($_POST['username']);
					$username = strip_tags($username);
					$username = htmlspecialchars($username);
					
					$password = trim($_POST['password']);
					$password = strip_tags($password);
					$password = htmlspecialchars($password);

					if(empty($username)){
						$error = true;
						$userError = "Niste uneli korisnicko ime.";
					}
			
					if(empty($password)){
						$error = true;
						$passError = "Niste uneli lozinku.";
					}

					if($error==true) {
						echo "<div class='greska'><p>Greska:<br>$userError $passError</p><br/>";
						echo "<a href='admin-login.php'>Nazad</a></div>";
						exit;
					}
					
					$passwordE = hash('sha256', $password);

					$query = "SELECT * from admini WHERE username='$username' AND password='$password';";

					$result = mysqli_query($conn, $query);
					
					while(mysqli_num_rows($result) < 1) {
						echo "<div class='greska'><p>Niste uneli odgovarajucu kombinaciju korisnickog imena i lozinke!</p><br/>";
						echo "<a href='admin-login.php'>Nazad</a></div>";
						exit;
					}
	
					$_SESSION['adminUser'] = $username;
					header('Location: admin-panel.php');
					exit;

				?>
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
