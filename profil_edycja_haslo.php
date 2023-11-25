<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';

  if (empty($_COOKIE['session_id'])) {
    redirect('logowanie.php', $conn);
  }

  if (isset($_REQUEST['confirm'])) {
    if ($_REQUEST['new_password'] === $_REQUEST['confirm_password']) {
      $user = get_first_row($conn, "SELECT user.id, password FROM user JOIN session ON user.id = session.user_id WHERE session.id = $_COOKIE[session_id]");
      $user_id = $user[0];
      $password = $user[1];
      if ($_REQUEST['old_password'] === $password) {
        $new_password = mysqli_real_escape_string($conn, $_REQUEST['new_password']);
        mysqli_query($conn, "UPDATE user SET password = '$new_password' WHERE id = $user_id");
        redirect('profil.php', $conn);
      } else {
        $error = 'Błędne hasło!';
      }
    } else {
      $error = 'Hasła się nie zgadzają!';
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
    <link rel="stylesheet" type="text/css" href="style_profil.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <p><?= isset($error) ? $error : 'Zmień hasło' ?></p>
        <form method="post">
          <input type="password" name="old_password" required placeholder="Stare hasło" />
          <input type="password" name="new_password" required placeholder="Nowe hasło" />
          <input type="password" name="confirm_password" required placeholder="Powtórz nowe hasło" />
          <input type="hidden" name="confirm" />
          <input type="submit" id="zaloguj" value="Potwierdź zmianę" />
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>