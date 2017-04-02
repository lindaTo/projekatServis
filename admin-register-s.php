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

					$error = false;

					$ime = trim($_POST['ime']);
					$ime = strip_tags($ime);
					$ime = htmlspecialchars($ime);
					
					$prezime = trim($_POST['prezime']);
					$prezime = strip_tags($prezime);
					$prezime = htmlspecialchars($prezime);
		
					$telefon = trim($_POST['telefon']);
					$telefon = strip_tags($telefon);
					$telefon = htmlspecialchars($telefon);
					
					$email = trim($_POST['email']);
					$email = strip_tags($email);
					$email = htmlspecialchars($email);
					
					$username = trim($_POST['username']);
					$username = strip_tags($username);
					$username = htmlspecialchars($username);
					
					$password = trim($_POST['password']);
					$password = strip_tags($password);
					$password = htmlspecialchars($password);
					
					if (empty($ime)) {
						$error = true;
						$nameError = "Ime nije uneto.";
					} else if (strlen($ime) < 2) {
						$error = true;
						$nameError = "Ime mora da ima bar 2 karaktera.";
					} else if (!preg_match("/^[a-zA-Z ]+$/",$ime)) {
						$error = true;
						$nameError = "Ime sme sadrzati zamo slova.";
					}
					
					if (empty($prezime)) {
						$error = true;
						$prezError = "Prezime nije uneto.";
					} else if (strlen($prezime) < 2) {
						$error = true;
						$prezError = "Prezime mora da ima bar 2 karaktera.";
					} else if (!preg_match("/^[a-zA-Z ]+$/",$prezime)) {
						$error = true;
						$prezError = "Prezime sme sadrzati zamo slova.";
					}
					
					if (empty($telefon)) {
						$error = true;
						$telError = "Broj telefona nije unet.";
					} else if (strlen($telefon) < 9) {
						$error = true;
						$telError = "Broj telefona mora da sadrzi bar 9 brojeva.";
					} else if (!preg_match("/^[0-9]*$/",$telefon)) {
						$error = true;
						$telError = "Broj telefona sme sadrzati zamo brojeve.";
					}
					
					if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
						$error = true;
						$emailError = "Unesite ispravnu adresu.";
					} else {
						// check email exist or not
						$query = "SELECT email FROM admini WHERE email='$email'";
						$result = mysqli_query($conn, $query);
						$count = mysqli_num_rows($result);
						if($count!=0){
							$error = true;
							$emailError = "Unesena email adresa vec postoji.";
						}
					}
					
					if (empty($username)){
						$error = true;
						$userError = "Niste uneli korisnicko ime.";
					} else if(strlen($username) < 3) {
						$error = true;
						$userError = "Korisnicko ime mora sadrzati najmanje 3 karaktera.";
					} else {
						$query = "SELECT username FROM admini WHERE username='$username'";
						$result = mysqli_query($conn, $query);
						$count = mysqli_num_rows($result);
						if($count!=0){
							$error = true;
							$emailError = "Korisnicko ime je zauzeto.";
						}
					}	
					
					if (empty($password)){
						$error = true;
						$passError = "Niste uneli lozinku.";
					} else if(strlen($password) < 6) {
						$error = true;
						$passError = "Lozinka mora sadrzati najmanje 6 karaktera.";
					}
					
					$passwordE = hash('sha256', $password);
					
					if( !$error ) {
			
						$query = "INSERT INTO admini (ime, prezime, telefon, email, username, password) VALUES ('$ime', '$prezime', '$telefon','$email', '$username', '$passwordE');";
						$res = mysqli_query($conn, $query);
				
						if ($res) {
							$errTyp = "Uspesno";
							$errMSG = "Registracija uspesna";
							unset($ime);
							unset($prezime);
							unset($telefon);
							unset($email);
							unset($username);
							unset($password);
						} else {
							$errTyp = "Greska";
							$errMSG = "Nesto nije uredu. Pokusajte ponovo";	
						}	
				
					}

					if($error==true) {
						echo "<div class='greska'><p>Greska:<br>$nameError $prezError $telError $emailError $userError $passError</p><br/>";
						echo "<a href='admin-register.php'>Nazad</a></div>";
						exit;
					}
					
					echo "<div class='uspesno'><p>Uspesno ste registrovali novog administratora.</p><br/>";
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
