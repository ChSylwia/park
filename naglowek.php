<div class="menu">
  <ul>
    <li class="ogloszenia"><a href="ogloszenia.php">Ogłoszenia</a></li>
    <li class="opinie"><a href="opinie.php">Opinie</a></li>
    <?php if (isset($_COOKIE['session_id'])): ?>
      <li class="logowanie">
        <a href="profil.php">
          <?php
            $user = get_first_row($conn, "SELECT name, surname, session.user_id FROM user JOIN session ON user.id = session.user_id WHERE session.id = $_COOKIE[session_id]");
            $name = $user[0];
            $surname = $user[1];
            $user_id=$user[2];
            $full_name = "$name $surname";
            $initials = "$name[0]$surname[0]";
            echo $initials;
          ?>
        </a>
      </li>
    <?php else: ?>
      <li class="logowanie"><a href="logowanie.php">Zaloguj się</a></li>
    <?php endif ?>
  </ul>
</div>