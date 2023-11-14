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
    <link rel="stylesheet" type="text/css" href="style_parki.css" />
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <?php 
    include 'polaczenie.php';
    $id=4;
     $sql="SELECT * FROM park WHERE id=${id} ";
    $result = mysqli_query($conn,$sql);
    $row =  mysqli_fetch_array($result); 
    ?>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <div class="menu">
      <ul>
        <li class="ogloszenia"><a href="ogloszenia.html">Ogłoszenia</a></li>
        <li class="opinie"><a href="opinie.html">Opinie</a></li>
        <li class="logowanie"><a href="logowanie.html">Zaloguj się</a></li>
      </ul>
    </div>
    <div class="srodek">
      <div class="lewy">
        <a href="parki.php">        
        <img class="mapa" src="svg/map.svg" />
        </a>
      </div>
      <div class="prawy">
        <p class='nazwa'>
            <?php
            echo $row['name'];
              ?>
        </p>
        <p class='data_powstania'> <span>Data powstania:</span>
            <?php
            echo  $row['creation_date'];
              ?>
        </p>
        <p class='atrakcje'><span>Atrakcje:</span> 
            <?php
            echo $row['attractions'];
              ?>
        </p>
        <p class='powierzchnia'><span>Powierzchnia:</span>
            <?php
            echo $row['surface'] ;
              ?>
              ha
        </p>
        <p class='link'><span>Link do strony:</span> <a href="
            <?php
            echo $row['link'];
              ?>"><?php
              echo $row['name'];
                ?></a>
        </p>
        <div class="ikonki">
            <?php
            $przyjazne= $row['pet_friendly'];
            if($przyjazne==1){
                echo "<img src='svg/zwierzak.svg'/> ";
            }
            $przyjazne2= $row['suitable_for_children'];
            if($przyjazne2==1){
                echo "<img src='svg/dziecko.svg'/> ";
            }
              ?>
        </div>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>
