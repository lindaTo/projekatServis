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
				
					$myemail  = "miloshvelich@gmail.com";

					$ime = check_input($_POST['ime'], "Unesite ime i prezime");
					$email  = check_input($_POST['email'], "Unesite email");
					$naslov    = check_input($_POST['naslov'], "Unesite naslov");
					$poruka  = check_input($_POST['poruka'], "Unesite poruku");

					if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
						show_error("Email adresa nije validna");
					}

					$message = "Hello!

					Your contact form has been submitted by:

					Ime i prezime: $ime
					Email: $email

					Poruka:
					$poruka ";

					mail($myemail, $naslov, $message);

					header('Location: poslato.php');
					exit();

					function check_input($data, $problem='') {
						$data = trim($data);
						$data = stripslashes($data);
						$data = htmlspecialchars($data);
						if ($problem && strlen($data) == 0) {
							show_error($problem);
						}
						return $data;
					}

					function show_error($myError) {
						echo "<div class='greska'><p>Greska:<br>$myError</p>><br/>";
						echo "<a href='kontakt.php'>Nazad</a></div>";
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
