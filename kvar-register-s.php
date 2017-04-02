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

					$naziv = $_POST['naziv'];
					$opis = $_POST['opis'];
					$trajanjePopravke = $_POST['trajanje'];
					$cena = $_POST['cena'];
					
					$nastavak = true;

					if($naziv == "") {
						$nastavak = false;
					}
					
					if($opis == "") {
						$nastavak = false;
					}
					
					if($trajanjePopravke == "") {
						$nastavak = false;
					}

					if($nastavak==false) {
						echo "<div class='greska'><p>Niste popunili sva polja!</p><br/>";
						echo "<a href='kvar-register.php'>Nazad</a></div>";
						exit;
					}

					$query = "INSERT INTO kvarovi (naziv, opis, vreme, status, cenapop) VALUES ('$naziv', '$opis', '$trajanjePopravke', 'Nepopravljeno', '$cena');";

					$result = mysqli_query($conn, $query);
					
					echo "<div class='uspesno'><p>Uspesno ste uneli novi kvar.</p><br/>";
					echo "<a href='admin-panel.php'>Nazad</a></div>";
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
