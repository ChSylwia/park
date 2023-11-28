<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';

  if (isset($_COOKIE['session_id'])) { // użytkownik jest już zalogowany
    redirect('profil.php');
  }

  $form_filled = true; // czy formularz jest wypełniony w całości
  if (empty($_REQUEST['email'])) {
    $email = '';
    $form_filled = false;
  } else {
    $email = $_REQUEST['email'];
  }
  if (empty($_REQUEST['password'])) {
    $password = '';
    $form_filled = false;
  } else {
    $password = $_REQUEST['password'];
  }
  if ($form_filled) { // wyślij formularz tylko wtedy, gdy żadne z pól nie jest puste
    login_or_register($conn, $email, $password);
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
    <link rel="stylesheet" type="text/css" href="style_logowanie.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <div class="menu">
      <ul>
        <li class="ogloszenia"><a href="ogloszenia.php">Ogłoszenia</a></li>
        <li class="opinie"><a href="opinie.php">Opinie</a></li>
        <li class="logowanie"><a href="logowanie.php">Zaloguj się</a></li>
      </ul>
    </div>
    <div class="srodek">
      <div class="lewy">
        <p><?= $form_filled ? 'Błędne hasło!' : 'Zaloguj lub zarejestruj się' ?></p>
        <form action="logowanie.php" method="post">
          <input type="email" name="email" value="<?= $email ?>" required placeholder="E-mail" />
          <input type="password" name="password" required placeholder="Hasło" />
          <input type="submit" id="zaloguj" value="Zaloguj/Zarejestruj się" />
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>