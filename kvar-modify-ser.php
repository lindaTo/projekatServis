<?php
			
	session_start();
	
	if (!isset($_SESSION['serviserUser'])){
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

				if (!isset($_SESSION['adminUser'])){
					header ('Location: logout.php');
					exit;
				}
			
				include("konekcija.php");
				
				$id = $_GET['id'];
				
				$query = "SELECT * from kvarovi where id=$id;";

				$result = mysqli_query($conn, $query);

				echo "<div class='form-area'>";
				
					while($red=mysqli_fetch_array($result)) {
						
						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$vreme = $red['vreme'];
						$cena = $red['cenapop'];

						echo "<form action='kvar-modify-s.php?id=$id' method='POST'>
						<h1>Izmeni kvar</h1>
						<input type='text' name='naziv' class='reg-user' value='$naziv'/>
						<input type='text' name='opis' class='reg-user' value='$opis'/>
						<input type='text' name='vreme' class='reg-user' value='$vreme'/>
						<input type='text' name='cena' class='reg-user' value='$cena'/>
						<input type='submit' value='Potvrdi' class='login-submit'>
						</form>";
					}
				
				echo "</div>";
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