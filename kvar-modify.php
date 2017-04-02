<?php

	session_start();

	require_once('auth.php');
	require_once('header.php');


?>

			<div class="content">
			<?php

				include("konekcija.php");

				$id = $_GET['id'];

				$query = "SELECT * from kvarovi where id=$id;";

				$result = mysqli_query($conn, $query);

				echo "<div class='form-area'>";

					while($red=mysqli_fetch_array($result)) {

						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$vreme = $red['vreme'];
						$cena = $red['cenapop'];

						echo "<form action='kvar-modify-s.php?id=$id' method='POST'>
						<h1>Izmeni kvar</h1>
						<input type='text' name='naziv' class='reg-user' value='$naziv'/>
						<input type='text' name='opis' class='reg-user' value='$opis'/>
						<input type='text' name='vreme' class='reg-user' value='$vreme'/>
						<input type='text' name='cena' class='reg-user' value='$cena'/>
						<input type='submit' value='Potvrdi' class='login-submit'>
						</form>";
					}

				echo "</div>";
			?>
			</div>

<?php require_once('footer.php'); ?>
