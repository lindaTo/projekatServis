<?php

	session_start();

	require_once('auth.php');
	require_once('header.php');
?>

			<div class="content">
				<?php

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
						echo "<a href='kvar-modify.php'>Nazad</a></div>";
						exit;
					}

					echo "<div class='uspesno'><p>Uspesno ste izmenili kvar.</p><br/>";


					echo "<a href='kvar-pregled.php'>Nazad</a></div>";

					exit;

				?>
			</div>
<?php require_once('footer.php'); ?>
