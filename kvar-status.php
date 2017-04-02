<?php

	session_start();
	require_once('auth.php');
	require_once('header.php');
?>

			<div class="content">
				<?php

					include("konekcija.php");

					$id = $_GET['id'];

					$query = "SELECT status FROM kvarovi WHERE id = $id";
					$result = mysqli_query($conn,$query);
					$currentStatus = mysqli_fetch_row($result);
					if($currentStatus[0] == "Popravljeno"){
						$query = "UPDATE kvarovi SET status = 'Nepopravljeno' WHERE id = $id";
					}else{
						$query = "UPDATE kvarovi SET status = 'Popravljeno' WHERE id = $id";
					}

					$result = mysqli_query($conn, $query);

					if ($result == true) {
						echo "<div class='uspesno'><p>Uspesno ste izmenili kvar.</p><br/>";
						echo "<a href='kvar-pregled.php'>Nazad</a></div>";
						exit;
					}else {
						echo "<div class='greska'><p>Izmena nije uspela!</p><br/>";
						echo "<a href='kvar-pregled.php'>Nazad</a></div>";
						exit;
					}


					?>
			</div>

<?php require_once('footer.php'); ?>
