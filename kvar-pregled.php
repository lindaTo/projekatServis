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
					
					$sql="SELECT * FROM kvarovi";
					
					$result=mysqli_query($conn, $sql);
					
					echo "<h1 class='naslov' align='center'>Pregled kvarova</h1>";
					
					echo "<table><tr class='tdhead'><td>Naziv</td><td>Opis</td><td>Status</td></tr>";

					while($red=mysqli_fetch_array($result)) {
						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$status = $red['status'];
						$id = $red['id'];
						
						$br_rezultata = 1;
						
						echo "<tr>";
						
						echo "<td>$naziv</a></td>";
						echo "<td>$opis</td>";
						
						if($status == "Nepopravljeno"){
							echo "<td class='nep'>$status</td>";
						}else{
							echo "<td  class='pop'>$status</td>";
						}
					}
					echo "</tr>";
					
					if ($result == false) {
						echo "<td colspan='4'>Nema rezultata<br><a href='index.php'>Probajte ponovo</a></td>";
					}
					
					echo "</table>";
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