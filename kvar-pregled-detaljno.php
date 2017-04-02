<?php

	session_start();
	require_once('header.php');
?>

			<div class="content">
				<?php

					include("konekcija.php");

					$id = $_GET['id'];

					$sql="SELECT * FROM kvarovi WHERE id='$id';";

					$result=mysqli_query($conn, $sql);

					echo "<table>";

					echo "<tr>";

					while($red=mysqli_fetch_array($result)) {
						$naziv = $red['naziv'];
						$opis = $red['opis'];
						$status = $red['status'];
						$vreme = $red['vreme'];
						$cena = $red['cenapop'];
						$id = $red['id'];

						echo "<td>Naziv</td>";
						echo "<td>$naziv</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>Opis kvara</td>";
						echo "<td>$opis</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>Status</td>";
						if($status == "Nepopravljeno"){
							echo "<td class='nep'>$status</td>";
						}else{
							echo "<td  class='pop'>$status</td>";
						}
						echo "</tr>";

						echo "<tr>";
						echo "<td>Trajanje popravke</td>";
						echo "<td>$vreme h</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<td>Cena popravke</td>";
						echo "<td>$cena RSD</td>";
						echo "</tr>";
					}


					echo "</table>";
				?>
			</div>
<?php require_once('footer.php'); ?>
