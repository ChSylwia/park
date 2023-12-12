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
    <link rel="stylesheet" type="text/css" href="style_profil.css" />
    <link rel="stylesheet" type="text/css" href="style_panel_administracyjny.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.php"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <p>Zarządzanie parkami</p>
        <a class="opcja" href="panel_administracyjny_parki_dodaj.php">Dodaj park</a>
        <p>Usuń park</p>
        <ol class="wypelnienie">
          <?php
            $parks = mysqli_query($conn, "SELECT id, name FROM park");
            while ($park = mysqli_fetch_row($parks)) {
              echo "<a href='panel_administracyjny_parki_usun.php?id=$park[0]'><div>$park[1]</div></a>";
            }
          ?>
        </ol>
        <div class="pasek_dolny" style="position: static; opacity: 0"></div>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>