<?php

	session_start();
	require_once('header.php');
?>

		<div class="content">
		<?php
			include("konekcija.php");
			$loggedIn = isset($_SESSION['serviserUser']) || isset($_SESSION['adminUser']);
			$sql="SELECT * FROM kvarovi";

			$result=mysqli_query($conn, $sql);

			echo "<h1 class='naslov' align='center'>Pregled kvarova</h1>";

			echo "<table><tr class='tdhead'><td>Naziv</td><td>Opis</td><td>Status</td>";

			if($loggedIn){
				echo "<td>Trajanje</td><td>Cena</td><td>Radnje</td></tr>";
			}

			while($red=mysqli_fetch_array($result)) {
				$naziv = $red['naziv'];
				$opis = $red['opis'];
				$status = $red['status'];
				$id = $red['id'];
				if($loggedIn){
					$vreme = $red['vreme'];
					$cena = $red['cenapop'];
				}


				echo "<tr>";

				echo "<td>$naziv</a></td>";
				echo "<td>$opis</td>";

				if($status == "Nepopravljeno"){
					if($loggedIn){
						echo "<td class='nep'><a href='kvar-status.php?id=$id'>$status</a></td>";
					}else{
						echo "<td class='nep'>$status</td>";
					}
				}else{
					if($loggedIn){
						echo "<td class='pop'><a href='kvar-status.php?id=$id'>$status</a></td>";
					}else{
						echo "<td class='pop'>$status</td>";
					}
				}
				if($loggedIn){
					echo "<td>$vreme h</td>";
					echo "<td>$cena RSD</td>";
					echo "<td><a href='kvar-delete	.php?id=$id'><img src='slike/delete.png' /></a><a href='kvar-modify.php?id=$id'><img src='slike/edit.png' /></a><a href='kvar-pregled-detaljno.php?id=$id'><img src='slike/info.png' /></td>";
				}
			}
			echo "</tr>";

			if ($result == false) {
				echo "<td colspan='4'>Nema rezultata<br><a href='index.php'>Probajte ponovo</a></td>";
			}

			echo "</table>";
	?>
</div>
<?php require_once('footer.php'); ?>
