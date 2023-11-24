<?php
  include 'polaczenie.php';

  function get_first_row($conn, $query) {
    return mysqli_fetch_row(mysqli_query($conn, $query));
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
        <p>W BUDOWIE!!!</p>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>