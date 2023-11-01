<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
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
</body>
</html>