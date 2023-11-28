 <?php
        include 'polaczenie.php';

        $tytul = $_REQUEST['tytul'];
        $park = $_REQUEST['parks'];
        $data = $_REQUEST['data'];
        $opis = $_REQUEST['opis'];
        $uzytkownik = $_REQUEST['uzytkownik'];
        $sql = "INSERT INTO announcement(`title`, `park`, `date`, `description`, `user_id`) VALUES ('$tytul',$park,'$data','$opis','$uzytkownik') ";
        $sql2 = "SELECT park FROM `announcement` WHERE title='$tytul' && park='$park' && date='$data'";
        $result = mysqli_query($conn, $sql2);
        $row =  mysqli_fetch_array($result); 
       
        if($row=='' && mysqli_query($conn, $sql) ){
            header("Location:ogloszenia.html");
            echo "<div><p>Dane zostały dodane do bazy danych. </p></div></br>"; 
 
            echo("\n$tytul\n$park\n$data\n$opis");
        } else{
            echo "ERROR: $sql2. ". mysqli_error($conn);
            print_r ($row);
            echo "Dane już istnieją";
        }
        mysqli_close($conn);
    ?>