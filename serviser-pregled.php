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
				
					if (!isset($_SESSION['adminUser'])){
						header ('Location: logout.php');
						exit;
					}
					
					include("konekcija.php");
					
					$sql="SELECT * FROM serviseri";
					
					$result=mysqli_query($conn, $sql);
					
					echo "<h1 class='naslov' align='center'>Pregled registrovanih servisera</h1>";
					
					echo "<table><tr class='tdhead'><td>ID</td><td>Ime</td><td>Prezime</td><td>Telefon</td><td>Email</td><td>Username</td><td>Cena RS</td><td>Radnje</td></tr>";

					while($red=mysqli_fetch_array($result)) {
						$ime = $red['ime'];
						$prezime = $red['prezime'];
						$telefon = $red['telefon'];
						$id = $red['id'];
						$email = $red['email'];
						$username = $red['username'];
						$sat = $red['cenaradnogsata'];
						
						$br_rezultata = 1;
						
						echo "<tr>";
						
						echo "<td>$id</td>";
						echo "<td>$ime</td>";
						echo "<td>$prezime</td>";
						echo "<td>$telefon</td>";
						echo "<td>$email</td>";
						echo "<td>$username</td>";
						echo "<td>$sat RSD</td>";
						echo "<td><a href='serviser-delete.php?id=$id''><img src='slike/delete.png' /></a><a href='serviser-modify.php?id=$id''><img src='slike/edit.png' /></td>";
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