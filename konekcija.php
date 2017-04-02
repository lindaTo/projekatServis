<?php

$servername = "localhost";
$db_username = "root";
$db_password = ""; 

$db = "servis";

$conn = new mysqli($servername, $db_username, $db_password, $db);

if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

?>
