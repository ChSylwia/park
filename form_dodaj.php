 <?php
        include 'polaczenie.php';
        $tytul = $_REQUEST['tytul'];
        $park = $_REQUEST['parks'];
        $data = $_REQUEST['data'];
        $opis = $_REQUEST['opis'];

        $sql = "INSERT INTO announcement(`title`, `park`, `date`, `description`) VALUES ('$tytul',$park,'$data','$opis') ";
        if(mysqli_query($conn, $sql)){
            echo "<div><p>Dane zostały dodane do bazy danych. </p></div></br>"; 
 
            echo("\n$tytul\n$park\n$data\n$opis");
        } else{
            echo "ERROR: $sql. ". mysqli_error($conn);
        }
        mysqli_close($conn);
    ?>