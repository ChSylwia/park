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
    $id=$_GET['id'];
    $miasto=$_GET['miasto'];
    if($id==0){
      $sql2="SELECT id FROM park WHERE city=${miasto} limit 1";
      $result2 = mysqli_query($conn,$sql2);
      $row2 =  mysqli_fetch_array($result2); 

      $id=$row2['id'];
    }
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
        <div class="wypelnienie">
        </div>
      </div>
      <div class="prawy">
        <p class='nazwa'>
            <?php
            $nazwa=$row['name'];
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
                echo "<img title='Dostosowane do zwierząt' src='svg/zwierzak.svg'/> ";
            }
            $przyjazne2= $row['suitable_for_children'];
            if($przyjazne2==1){
                echo "<img title='Przystosowane dla dzieci' src='svg/dziecko.svg'/> ";
            }
              ?>
        </div>
        <div class="linki">
          <p><?php echo "<a class='link_ogl' href='ogloszenia.html?nazwa=${nazwa}'>Ogłoszenia</a>" ?></p>
          </div>
      </div>
    </div>
    <div class="pasek_dolny"></div>

    <script>
      const parametr = new URLSearchParams(window.location.search);
      var miasto = parametr.get("miasto");
      console.log(miasto);
      var wyszukaj = document.getElementById("wyszukaj");

      var adres = `http://localhost/projekt/park_wypisz.php?miasto=${miasto}`;
      async function pobierz_dla_tekstu(tekst) {
        console.log(adres + tekst);
        $adres_caly = adres + tekst;
        const a = await fetch($adres_caly);
        const response = await a.json();
        console.log(response);

        response.forEach((element, index, self) => {
          var option = document.createElement("div");
          option.innerHTML = `<a href="parki.php?miasto=${miasto}&id=${element.id}"><p>${element.name}</p></a>`;
          var value = document.querySelector(".wypelnienie");
          console.log(value);

          value.appendChild(option);
          //document.getElementById("parks").appendChild(option);
          //console.log(element);
        });
      }
      pobierz_dla_tekstu('');
    </script>
  </body>
</html>
