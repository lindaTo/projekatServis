<?php

include("konekcija.php");

  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
  $name=$_POST['search'];
  
  
  $sql="SELECT  naziv FROM kvarovi WHERE naziv LIKE '%" . $name .  "%'";
  
  
  $result=mysqli_query($sql);
  
  while($row=mysql_fetch_array($result)){
          $ime  =$row['ime'];
          $LastName=$row['LastName'];
          $ID=$row['ID'];
		  
  echo "<ul>\n";
  echo "<li>" . "<a  href=\"pretraga.php?id=$ID\">"   .$ime . "</a></li>\n";
  echo "</ul>";
  }
  }
  else{
  echo  "<p>Niste uneli nista</p>";
  }
  }
  }
?>
