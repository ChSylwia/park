<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "projekt";
 $conn = mysqli_connect($servername,$username,$password,$database);
  
 // Check connection
 if($conn === false){
     die("ERROR: Nie można się zalogować. ". mysqli_connect_error());
 }
?>