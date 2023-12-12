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

  $name = get_first_value($conn, "SELECT name FROM park WHERE id = $_REQUEST[id]");
  if (empty($name)) {
    redirect('panel_administracyjny_parki.php', $conn);
  }

  if (isset($_REQUEST['confirm'])) {
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    if (get_first_value($conn, "SELECT id FROM user WHERE id = $user_id AND password = '$password'")) { // potwierdzenie hasła
      mysqli_query($conn, "DELETE FROM park WHERE id = $_REQUEST[id]");
      redirect('panel_administracyjny_parki.php', $conn);
    } else {
      $error = 'Błędne hasło!';
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
    <link rel="stylesheet" type="text/css" href="style_parki_dodaj.css" />
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
        <p>Potwierdź usunięcie parku "<?= $name ?>"</p>
        <p style="color: red">UWAGA: ta operacja jest nieodwracalna!</p>
        <p><?= isset($error) ? $error : null ?></p>
        <form name="formularz_dodawanie" method="post" action="panel_administracyjny_parki_usun.php">
          <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>"/>
          <input type="password" name="password" required placeholder="Hasło" />
          <input type="hidden" name="confirm" />
          <input type="submit" value="Potwierdź usunięcie" />
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>

<?php mysqli_close($conn) ?>