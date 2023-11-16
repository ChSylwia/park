<?php
include 'polaczenie.php';
$miasto=$_GET['miasto'];
$sql="SELECT park.name, park.id from park INNER JOIN city on park.city=city.id WHERE city.id=$miasto";
 $result = mysqli_query($conn, $sql);
 //$row = mysqli_fetch_row($result);
// print $row[2];

$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json);
//echo json_encode($arr); // {"a":1,"b":2,"c":3,"d":4,"e":5}
?>
