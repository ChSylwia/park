<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';

  session_start(); // "rozpoczęcie" (wzięcie) sesji ze strony logowanie.php
  if (isset($_SESSION['email'])) {
    $_REQUEST['email'] = $_SESSION['email'];
  }
  if (isset($_SESSION['password'])) {
    $_REQUEST['password'] = $_SESSION['password'];
  }

  if (empty($_REQUEST['email']) || empty($_REQUEST['password'])) {
    redirect('logowanie.php', $conn); // brak danych - przejdź do głównego formularza logowania
  }

  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  
  $_SESSION = [];
  session_destroy();
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
        <li class="logowanie"><?= $email ?></li>
      </ul>
    </div>
    <div class="srodek">
      <div class="lewy">
        <?php if (empty($_REQUEST['name']) || empty($_REQUEST['surname'])): ?>
          <p><?= "Dokończ rejestrację użytkownika $_REQUEST[email]" ?></p>
          <form method="post">
            <input type="hidden" name="email" value="<?= $email ?>" />
            <input type="hidden" name="password" value="<?= $password ?>" />
            <input type="text" name="name" required placeholder="Imię" />
            <input type="text" name="surname" required placeholder="Nazwisko" />
            <input type="submit" id="zaloguj" value="Zarejestruj się" />
          </form>
        <?php else: ?>
          <?php
            $email = mysqli_real_escape_string($conn, $_REQUEST['email']); // obsługa ' i \
            $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
            $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
            $surname = mysqli_real_escape_string($conn, $_REQUEST['surname']);
            mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$name', '$surname', '$email', '$password', 0)");
            create_session($conn, get_first_value($conn, "SELECT id FROM user WHERE email = '$email'"));
          ?>
        <?php endif ?>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>