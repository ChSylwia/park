<?php
        include 'polaczenie.php';
        //$wyszukaj = $_REQUEST['wyszukaj'];
        $wildcard = $_GET['wildcard'];
        //$id=$_GET['id'] ?? '';
        $sql = "SELECT announcement.id,title, park.name, date, description FROM announcement INNER JOIN park ON announcement.park=park.id WHERE (park.name LIKE '%$wildcard%' or park.id like '%$wildcard%') and announcement.date>=now()";
        //SELECT announcement.id,title, park.name, date, description FROM announcement INNER JOIN park ON announcement.park=park.id WHERE park.name LIKE '%$wildcard%' or park.id like ''
            $result = mysqli_query($conn, $sql);
            //echo $result;
           $json = mysqli_fetch_all ($result,MYSQLI_ASSOC);
           echo json_encode($json);
        
?>