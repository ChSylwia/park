<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';
  include 'dane_uzytkownika.php';

  if (empty($_COOKIE['session_id'])) {
    redirect('logowanie.php', $conn);
  }
  if (!$is_admin) {
    redirect('profil.php', $conn);
  }

  if (isset($_REQUEST['confirm'])) {
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $city = mysqli_real_escape_string($conn, $_REQUEST['city']);
    $surface = mysqli_real_escape_string($conn, $_REQUEST['surface']);
    $creation_date = mysqli_real_escape_string($conn, $_REQUEST['creation_date']);
    $attractions = mysqli_real_escape_string($conn, $_REQUEST['attractions']);
    $link = mysqli_real_escape_string($conn, $_REQUEST['link']);
    $pet_friendly = isset($_REQUEST['pet_friendly']) ? 1 : 'NULL';
    $suitable_for_children = isset($_REQUEST['suitable_for_children']) ? 1 : 'NULL';
    mysqli_query($conn, "INSERT INTO park VALUES (NULL, '$name', '$city', '$surface', '$creation_date', '$attractions', '$link', $pet_friendly, $suitable_for_children)");
    redirect('panel_administracyjny_parki.php', $conn);
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
    <link rel="stylesheet" type="text/css" href="style_parki_dodaj.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.php"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <p>Dodawanie parku</p>
        <form name="formularz_dodawanie" method="post" action="panel_administracyjny_parki_dodaj.php">
          <datalist id="cities" required>
            <?php
              $cities = mysqli_query($conn, "SELECT id, name FROM city");
              while ($city = mysqli_fetch_row($cities)) {
                echo "<option value='$city[0]'>$city[1]</option>";
              }
            ?>
          </datalist>
          <input type="text" name="name" required placeholder="Nazwa" />
          <input list="cities" name="city" required placeholder="Miasto" />
          <input type="number" name="surface" required min="0" step="0.01" placeholder="Powierzchnia (km&sup2;)" />
          <input type="date" name="creation_date" max="<?= date('Y-m-d') ?>" placeholder="Data powstania" />
          <textarea name="attractions" required rows="10" cols="30" placeholder="Atrakcje"></textarea>
          <input type="url" name="link" placeholder="Adres URL" />
          <label><input type="checkbox" name="pet_friendly" checked /> Dostosowane do zwierząt</label>
          <label><input type="checkbox" name="suitable_for_children" checked /> Przystosowane dla dzieci</label>
          <input type="hidden" name="confirm" />
          <input type="submit" value="Dodaj" />
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>