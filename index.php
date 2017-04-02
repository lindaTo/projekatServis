<?php

	session_start();
	require_once('header.php');
?>
			<div class="content">
				<div class="form-area">
					<form action="pret-rez.php" method="POST">
						<h1>
							POGLEDAJTE STATUS VAŠE OPREME<br>
							TAKO ŠTO ĆETE UNETI NAZIV
						</h1>
						<input type="search" name="pretrazi" class="search-field">
						<input type="submit" value="Pretraga" id="button">
					</form>
				</div>
			</div>


<?php require_once('footer.php');?>
