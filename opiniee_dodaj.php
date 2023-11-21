<?php
    include('polaczenie.php');
    if(isset($_POST['submit'])){
      $opis = $_POST['opis'];
      $park = $_POST['park'];
      $date = date('Y-m-d H:i:s');
      $query = mysqli_query($conn, "Insert into opinie(opinia, id_park, date) Value ('$opis', '$park', '$date')");
      if($query){
        echo "<script> alert('Opinia dodana pomyślnie')  </script>";
      } else {
        echo "<script> alert('Błąd')  </script>";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

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
          
          <form method="post">

                    <select id="drop" name="park">
                      <?php
                        include('polaczenie.php');
                        $parki = mysqli_query($conn, "SELECT * from park");
                        while($c = mysqli_fetch_array($parki)){
                      ?>
                      <option value="<?php echo $c['id'] ?>"><?php echo $c['name']?></option>
                      <?php }?>
                    </select>

            <textarea
              type="text"
              id="opis"
              name="opis"
              required
              cols="30"
              placeholder=" Opinia"
            ></textarea>


            <button id="input_dodawanie" type="submit" name="submit">Dodaj</button>
          </form>
        </div>
      </div>


      <div class="pasek_dolny"></div>
      <div class="tlo">
        <img class="lisc" src="svg/leaf.svg" />
      </div>



  </body>
</html>