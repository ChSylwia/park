<?php
  function get_first_row($conn, $query) {
    return mysqli_fetch_row(mysqli_query($conn, $query));
  }

  function get_first_value($conn, $query) {
    $array = get_first_row($conn, $query);
    return is_array($array) ? $array[0] : null;
  }

  function redirect($address, $conn = null) {
    if ($conn) {
      mysqli_close($conn);
    }
    header("Location: $address");
    exit; // zapobieganie wykonywaniu dalszych instrukcji
  }

  function create_session($conn, $user_id) {
    $session = get_first_value($conn, "SELECT id FROM session WHERE user_id = $user_id");
    if (!$session) { // nie twórz nowej sesji jeśli użytkownik jest już zalogowany gdzie indziej
      mysqli_query($conn, "INSERT INTO session VALUES (NULL, $user_id)");
      $session = get_first_value($conn, "SELECT id FROM session WHERE user_id = $user_id");
    }
    setcookie('session_id', $session);
    redirect('profil.php', $conn);
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
      session_start(); // tworzenie sesji w celu przekazania parametrów między stronami
      $_SESSION['email'] = $_REQUEST['email'];
      $_SESSION['password'] = $_REQUEST['password'];
      // redirect("rejestracja.php?email=$email&password=$password");
      redirect('rejestracja.php');
    }
  }
?>