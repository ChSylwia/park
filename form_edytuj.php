<?php
    include 'polaczenie.php';
    $tytul = $_REQUEST['tytul'];
    $park = $_REQUEST['parks'];
    $data = $_REQUEST['data'];
    $opis = $_REQUEST['opis'];
    $id = $_REQUEST['id'];

    
    $sql="UPDATE announcement SET title ='$tytul', park =$park, date ='$data', description ='$opis' WHERE announcement.id = $id";
    echo $sql;
    if( mysqli_query($conn, $sql) ){
        
        header("Location: ogloszenia_informacja.html?id=$id");
        

    } else{
        header("Location: ogloszenia_informacja.html?id=$id");
    }
    mysqli_close($conn);
?>