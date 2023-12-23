<?php
    include('polaczenie.php');
    include('funkcje_pomocnicze.php');
  
    if (empty($_COOKIE['session_id'])) {
      redirect('logowanie.php', $conn);
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
    <?php include 'naglowek.php' ?>
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
            <input hidden name="uzytkownik" value=<?php echo $user_id; ?>/>

            <button id="input_dodawanie" type="submit" name="submit">Dodaj</button>
          </form>
        </div>
      </div>

      <?php
    if(isset($_POST['submit'])){
      $opis = $_POST['opis'];
      $park = $_POST['park'];
      $date = date('Y-m-d H:i:s');
      $user = $user_id;
      
      $query = mysqli_query($conn, "Insert into opinie(opinia, id_park, date, id_user) Value ('$opis', '$park', '$date', '$user')");
      if($query){
        echo "<script> alert('Opinia dodana pomyślnie')  </script>";
      } else {
        echo "<script> alert('Błąd')  </script>";
      }
    }
      ?>


      <div class="pasek_dolny"></div>
      <div class="tlo">
        <img class="lisc" src="svg/leaf.svg" />
      </div>


      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>
      <br><br>

      <?php

?>


  </body>
</html>