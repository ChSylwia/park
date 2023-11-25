<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';

  mysqli_query($conn, "DELETE FROM session WHERE id = $_COOKIE[session_id]");
  setcookie('session_id', null, time()); // usunięcie ciasteczka
  redirect('logowanie.php', $conn);
?>