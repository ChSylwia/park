<?php
  include 'polaczenie.php';

  function get_first_row($conn, $query) {
    return mysqli_fetch_row(mysqli_query($conn, $query));
  }

  function get_first_value($conn, $query) {
    $array = get_first_row($conn, $query);
    return is_array($array) ? $array[0] : null;
  }

  function create_session($conn, $user_id) {
    $session = get_first_value($conn, "SELECT id FROM session WHERE user_id = $user_id");
    if (!$session) {
      mysqli_query($conn, "INSERT INTO session VALUES (NULL, $user_id)");
    }
    $row = get_first_row($conn, "SELECT session.id, name, surname, email FROM user JOIN session ON user.id = session.user_id WHERE user.id = $user_id");
    setcookie('session_id', $row[0]);
    header('Location: profil.php');
    die();
    /*
    if ($row[1] || $row[2]) {
      echo "Witaj $row[1] $row[2]<br>";
    } else {
      echo "Witaj $row[3]! (nie znamy jeszcze Twojego imienia i nazwiska)<br>";
    }
    echo "Sesja nr $row[0]"; // debug
    */
  }

  function login_or_register($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email); // obsługa ' i \
    $password = mysqli_real_escape_string($conn, $password);
    $user = get_first_row($conn, "SELECT id, password FROM user WHERE email = '$email'");
    if ($user) { // użytkownik istnieje
      if ($password === $user[1]) { // === w celu poprawnego porównywania ciągów znaków
        create_session($conn, $user[0]);
      }
    } else { // użytkownik nie istnieje, zarejestruj go
      mysqli_query($conn, "INSERT INTO user VALUES (NULL, '', '', '$email', '$password', 0)");
      create_session($conn, get_first_value($conn, "SELECT id FROM user WHERE email = '$email'"));
    }
  }

  $form_filled = true;
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
  if ($form_filled) {
    login_or_register($conn, $_REQUEST['email'], $_REQUEST['password']);
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
        <li class="ogloszenia"><a href="ogloszenia.html">Ogłoszenia</a></li>
        <li class="opinie"><a href="opinie.html">Opinie</a></li>
        <?php if (isset($_COOKIE['session_id'])): ?>
          <li class="logowanie">
            <a href="profil.php">
              <?php
                $user = get_first_row($conn, "SELECT name, surname FROM user JOIN session ON user.id = session.user_id WHERE session.id = $_COOKIE[session_id]");
                echo "$user[0] $user[1]";
              ?>
            </a>
          </li>
        <?php else: ?>
          <li class="logowanie"><a href="logowanie.html">Zaloguj się</a></li>
        <?php endif ?>
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