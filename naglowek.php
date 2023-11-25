<div class="menu">
  <ul>
    <li class="ogloszenia"><a href="ogloszenia.html">Ogłoszenia</a></li>
    <li class="opinie"><a href="opinie.html">Opinie</a></li>
    <?php if (isset($_COOKIE['session_id'])): ?>
      <li class="logowanie">
        <a href="profil.php">
          <?php
            $user = get_first_row($conn, "SELECT name, surname FROM user JOIN session ON user.id = session.user_id WHERE session.id = $_COOKIE[session_id]");
            $name = $user[0];
            $surname = $user[1];
            $full_name = "$name $surname";
            echo $full_name;
          ?>
        </a>
      </li>
    <?php else: ?>
      <li class="logowanie"><a href="logowanie.php">Zaloguj się</a></li>
    <?php endif ?>
  </ul>
</div>