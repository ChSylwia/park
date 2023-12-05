<?php include_once 'funkcje_pomocnicze.php' ?>

<div class="menu">
  <ul>
    <li class="ogloszenia"><a href="ogloszenia.php">Ogłoszenia</a></li>
    <li class="opinie"><a href="opinie.php">Opinie</a></li>
    <?php if (isset($_COOKIE['session_id'])): ?>
      <li class="logowanie">
        <a href="profil.php">
          <?php
            include_once 'dane_uzytkownika.php';
            echo $initials;
          ?>
        </a>
      </li>
    <?php else: ?>
      <li class="logowanie"><a href="logowanie.php">Zaloguj się</a></li>
    <?php endif ?>
  </ul>
</div>