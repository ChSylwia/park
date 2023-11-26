<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';

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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="style_profil.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.php"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <p>Witaj, <?= $full_name ?></p>
        <a class="opcja" href="profil_edycja_imie_nazwisko.php">Zmień imię/nazwisko</a>
        <a class="opcja" href="profil_edycja_email.php">Zmień e-mail</a>
        <a class="opcja" href="profil_edycja_haslo.php">Zmień hasło</a>
        <a class="opcja" href="wyloguj.php">Wyloguj się</a>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>