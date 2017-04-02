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

				include("konekcija.php");
				
				$id = $_GET['id'];
				
				$query = "DELETE FROM kvarovi WHERE id=$id;";

				$result = mysqli_query($conn, $query);
				
				if($result) {
					echo "<div class='uspesno'><p>Uspesno ste obrisali kvar.</p><br/>";
					echo "<a href='kvar-pregled.php'>Pregled kvarova</a></div>";
					exit;
				}else {
					echo "<div class='greska'><p>Greska pri brisanju!</p><br/>";
					
					if(isset($_SESSION['adminUser'])){
						echo "<a href='kvar-pregled-admin.php'>Nazad</a></div>";
					}else if(isset($_SESSION['serviserUser'])){
						echo "<a href='kvar-pregled-serviser.php'>Nazad</a></div>";
					}
					
					exit;
				}

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