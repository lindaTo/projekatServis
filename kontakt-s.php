<?php

	session_start();
	require_once('header.php');
?>



<div class="content">
			<?php
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

<?php
		require_once('footer.php');
 ?>
