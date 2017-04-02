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

					include("konekcija.php");
					
					$sql="SELECT * FROM kvarovi";
		
					$result=mysqli_query($conn, $sql);
					
					echo "<table><tr class='tdhead'><td>Naziv</td><td>Opis</td><td>Status</td><td>Trajanje</td><td>Cena</td><td>Radnje</td></tr>";
					
					while($red=mysqli_fetch_array($result)) {
						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$status = $red['status'];
						$vreme = $red['vreme'];
						$cena = $red['cenapop'];
						$id = $red['id'];
						
						echo "<tr>";
						
						echo "<td>$naziv</td>";
						echo "<td>$opis</td>";
						
						if($status == "Nepopravljeno"){
							echo "<td class='nep'><a href='kvar-status-adm.php?id=$id'>$status</a></td>";
						}else{
							echo "<td  class='pop'><a href='kvar-status2-adm.php?id=$id'>$status</a></td>";
						}
						echo "<td>$vreme h</td>";
						echo "<td>$cena RSD</td>";
						echo "<td><a href='kvar-delete.php?id=$id'><img src='slike/delete.png' /></a><a href='kvar-modify.php?id=$id'><img src='slike/edit.png' /></a><a href='kvar-pregled-detaljno.php?id=$id'><img src='slike/info.png' /></td>";
					}
					echo "</tr>";
					
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