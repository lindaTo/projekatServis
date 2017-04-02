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

					$naziv = $_POST['naziv'];
					$opis = $_POST['opis'];
					$vreme = $_POST['vreme'];
					$cena = $_POST['cena'];
					
					$nastavak = true;
					

					if($naziv != "") {
						$qnaziv="UPDATE kvarovi SET naziv='$naziv' WHERE id=$id;";
						$rnaziv = mysqli_query($conn, $qnaziv);
					}else {
						$nastavak == false;
					}
					
					if($opis != "") {
						$qopis="UPDATE kvarovi SET opis='$opis' WHERE id=$id;";
						$ropis = mysqli_query($conn, $qopis);
					}else {
						$nastavak == false;
					}
					
					if($vreme != "") {
						$qvreme="UPDATE kvarovi SET vreme='$vreme' WHERE id=$id;";
						$rvreme = mysqli_query($conn, $qvreme);
					}else {
						$nastavak == false;
					}
					
					if($cena != "") {
						$qcena="UPDATE kvarovi SET cenapop='$cena' WHERE id=$id;";
						$rcena = mysqli_query($conn, $qcena);
					}else {
						$nastavak == false;
					}
					

					if($nastavak==false) {
						echo "<div class='greska'><p>Niste popunili sva polja!</p><br/>";
						echo "<a href='kvar-modify-ser.php'>Nazad</a></div>";
						exit;
					}
					
					echo "<div class='uspesno'><p>Uspesno ste izmenili kvar.</p><br/>";
					
					if(isset($_SESSION['adminUser'])){
						echo "<a href='kvar-pregled-admin.php'>Nazad</a></div>";
					}else if(isset($_SESSION['serviserUser'])){
						echo "<a href='kvar-pregled-serviser.php'>Nazad</a></div>";
					}
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
