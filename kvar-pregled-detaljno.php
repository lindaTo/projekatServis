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
					
					$sql="SELECT * FROM kvarovi WHERE id='$id';";
		
					$result=mysqli_query($conn, $sql);
					
					echo "<table>";
					
					echo "<tr>";
					
					while($red=mysqli_fetch_array($result)) {
						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$status = $red['status'];
						$vreme = $red['vreme'];
						$cena = $red['cenapop'];
						$id = $red['id'];
						
						echo "<td>Naziv</td>";
						echo "<td>$naziv</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td>Opis kvara</td>";
						echo "<td>$opis</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td>Status</td>";
						if($status == "Nepopravljeno"){
							echo "<td class='nep'>$status</td>";
						}else{
							echo "<td  class='pop'>$status</td>";
						}
						echo "</tr>";
						
						echo "<tr>";
						echo "<td>Trajanje popravke</td>";
						echo "<td>$vreme h</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo "<td>Cena popravke</td>";
						echo "<td>$cena RSD</td>";
						echo "</tr>";
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