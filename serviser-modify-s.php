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
					
					$id = $_GET['id'];

					$ime = $_POST['ime'];
					$prezime = $_POST['prezime'];
					$telefon = $_POST['telefon'];
					$email = $_POST['email'];
					$sat = $_POST['cenaradnogsata'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					
					$nastavak = true;
					

					if($ime != "") {
						$qIme="UPDATE serviseri SET ime='$ime' WHERE id=$id;";
						$rIme = mysqli_query($conn, $qIme);
					}else {
						$nastavak == false;
					}
					
					if($prezime != "") {
						$qPrezime="UPDATE serviseri SET prezime='$prezime' WHERE id=$id;";
						$rPrezime = mysqli_query($conn, $qPrezime);
					}else {
						$nastavak == false;
					}
					
					if($telefon != "") {
						$qTelefon="UPDATE serviseri SET telefon='$telefon' WHERE id=$id;";
						$rTelefon = mysqli_query($conn, $qTelefon);
					}else {
						$nastavak == false;
					}
					
					if($email != "") {
						$qEmail="UPDATE serviseri SET email='$email' WHERE id=$id;";
						$rEmail = mysqli_query($conn, $qEmail);
					}else {
						$nastavak == false;
					}
					
					if($sat != "") {
						$qSat="UPDATE serviseri SET cenaradnogsata='$sat' WHERE id=$id;";
						$rSat = mysqli_query($conn, $qSat);
					}else {
						$nastavak == false;
					}
					
					if($username != "") {
						$qUsername="UPDATE serviseri SET username='$username' WHERE id=$id;";
						$rUsername = mysqli_query($conn, $qUsername);
					}else {
						$nastavak == false;
					}
					
					if($password != "") {
						$qPassword="UPDATE serviseri SET password='$password' WHERE id=$id;";
						$rPassword = mysqli_query($conn, $qPassword);
					}else {
						$nastavak == false;
					}

					if($nastavak==false) {
						echo "<div class='greska'><p>Niste popunili sva polja!</p><br/>";
						echo "<a href='serviser-modify.php'>Nazad</a></div>";
						exit;
					}
					
					echo "<div class='uspesno'><p>Uspesno ste izmenili administratora.</p><br/>";
					echo "<a href='serviser-pregled.php'>Pregled administratora</a></div>";
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
