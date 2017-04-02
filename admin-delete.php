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

				if (!isset($_SESSION['adminUser'])){
					header ('Location: logout.php');
					exit;
				}
			
				include("konekcija.php");
				
				$id = $_GET['id'];
				
				$query = "DELETE FROM admini WHERE id=$id;";

				$result = mysqli_query($conn, $query);
				
				if($result) {
					echo "<div class='uspesno'><p>Uspesno ste obrisali administratora.</p><br/>";
					echo "<a href='admin-pregled.php'>Pregled administratora</a></div>";
					exit;
				}else {
					echo "<div class='greska'><p>Greska pri brisanju!</p><br/>";
					echo "<a href='admin-pregled.php'>Nazad</a></div>";
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