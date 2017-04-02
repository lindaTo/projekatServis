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
				
				$id = $_GET['id'];
				
				$query = "SELECT * from admini where id=$id;";

				$result = mysqli_query($conn, $query);

				echo "<div class='form-area'>";
				
					while($red=mysqli_fetch_array($result)) {
						
						$ime = $red['ime'];
						$prezime = $red['prezime'];
						$telefon = $red['telefon'];
						$email = $red['email'];
						$username = $red['username'];
						$password = $red['password'];

						echo "<form action='admin-modify-s.php?id=$id' method='POST'>
						<h1>UREDI ADMINISTRATORA</h1>
						<input type='text' name='ime' class='reg-user' value='$ime'/>
						<input type='text' name='prezime' class='reg-user' value='$prezime'/>
						<input type='text' name='telefon' class='reg-user' value='$telefon'/>
						<input type='text' name='email' class='reg-user' value='$email'/>
						<input type='text' name='username' class='reg-user' value='$username'/>
						<input type='text' name='password' class='reg-user' value='$password'/>
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