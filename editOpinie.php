<?php 
    include("polaczenie.php");
    $id = $_POST["id"];
    $opinia = $_POST["tresc"];
    $sql = "UPDATE opinie set opinia = '".$opinia."' WHERE id =".$id;
    $res = mysqli_query($conn, $sql);
?>