<?php 
$loggedIn = isset($_SESSION['serviserUser']) || isset($_SESSION['adminUser']);
if (!$loggedIn){
  header ('Location: index.php');
  exit;
}
