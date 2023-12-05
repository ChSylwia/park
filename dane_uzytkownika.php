<?php
  include_once 'funkcje_pomocnicze.php';

  $user = get_first_row($conn, "SELECT name, surname, session.user_id, is_admin FROM user JOIN session ON user.id = session.user_id WHERE session.id = $_COOKIE[session_id]");
  $name = $user[0] ?? null;
  $surname = $user[1] ?? null;
  $user_id = $user[2] ?? null;
  $is_admin = $user[3] ?? null;
  $full_name = $user ? "$name $surname" : null;
  $initials = $user ? "$name[0]$surname[0]" : null;
?>