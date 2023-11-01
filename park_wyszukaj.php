<?php
include 'polaczenie.php';
$wildcard=$_GET['wildcard'];
$sql="SELECT id, name FROM park WHERE name LIKE '%$wildcard%'";
// $arr = array ();
 $result = mysqli_query($conn, $sql);
 //$row = mysqli_fetch_row($result);
// print $row[2];

$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json);
//echo json_encode($arr); // {"a":1,"b":2,"c":3,"d":4,"e":5}
?>