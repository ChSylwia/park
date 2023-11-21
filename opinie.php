<?php
include('polaczenie.php');
function getOpinia($conn){
    $sql = "SELECT * FROM opinie inner join park on park.id = opinie.id_park";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
      echo "<div class='opiniaa'><p>";
      echo $row['user']."<br>";
      echo $row['date']."<br>";
      echo nl2br($row['opinia']);
      echo "</p></div>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="style_opinie.css" />
    <link rel="stylesheet" type="text/css" href="style_opinie_dodaj.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>


  <body>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <div class="menu">
      <ul>
        <li class="ogloszenia"><a href="ogloszenia.html">Ogłoszenia</a></li>
        <li class="opinie"><a href="opinie.php">Opinie</a></li>
        <li class="logowanie"><a href="logowanie.html">Zaloguj się</a></li>
      </ul>
    </div>

    <div class="srodek">
      <div class="lewy">
        <div class="pasek_gora">
          <p>Opinie</p>
          <button class="dodaj">
            <a href="opiniee_dodaj.php">Dodaj</a>
          </button>
          <div>
           <select id="drop" name="park">
                  <?php
                        include('polaczenie.php');
                        $parki = mysqli_query($conn, "SELECT * from park");
                        while($c = mysqli_fetch_array($parki)){
                      ?>
                      <option value="<?php echo $c['id'] ?>"><?php echo $c['name']?></option>
                 <?php }?>
              </select>
          </div>
        </div>
      </div>
    </div>

<br></br>
<br></br>
<br></br>
<br></br>



<?php getOpinia($conn); ?>





  </body>
</html>