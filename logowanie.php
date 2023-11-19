<?php
  include 'polaczenie.php';

  function create_session($conn, $user_id) {
    mysqli_query($conn, "INSERT INTO session VALUES (NULL, $user_id)");
    $result = mysqli_query($conn, "SELECT id, name, surname, email FROM user WHERE id = $user_id");
    $row = mysqli_fetch_row($result);
    setcookie('session_id', $row[0]);
    if ($row[1] || $row[2]) {
      echo "Witaj $row[1] $row[2]<br>";
    } else {
      echo "Witaj $row[3]! (nie znamy jeszcze Twojego imienia i nazwiska)<br>";
    }
    echo "Sesja nr $row[0]"; // debug
  }

  function login_or_register($conn, $email, $password) {
    $email = mysqli_real_escape_string($conn, $email); // obsługa ' i \
    $password = mysqli_real_escape_string($conn, $password);
    $result = mysqli_query($conn, "SELECT id, password FROM user WHERE email = '$email'");
    $row = mysqli_fetch_row($result);
    if ($row) { // użytkownik istnieje
      if (password_verify($password, $row[1])) {
        create_session($conn, $row[0]);
      } else {
        die('Błędne hasło!');
      }
    } else { // użytkownik nie istnieje, zarejestruj go
      $password = password_hash($password, PASSWORD_DEFAULT);
      mysqli_query($conn, "INSERT INTO user VALUES (NULL, '', '', '$email', '$password', 0)");
      $result = mysqli_query($conn, "SELECT id FROM user WHERE email = '$email'");
      $row = mysqli_fetch_row($result);
      create_session($conn, $row[0]);
    }
  }

  $email = $_REQUEST['email'];
  $password = $_REQUEST['haslo'];
  if (empty($email)) {
    die('Podaj e-mail!');
  } elseif (empty($password)) {
    die('Podaj hasło!');
  } else {
    login_or_register($conn, $email, $password);
  }

  mysqli_close($conn);
?>