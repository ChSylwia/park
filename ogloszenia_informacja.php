<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';
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
    <link rel="stylesheet" type="text/css" href="style_ogloszenia.css" />
    <link rel="stylesheet" type="text/css" href="style_ogloszenia_info.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="pasek_opcji">
        <?php 
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $id=$query['id']; 
        if(isset($_COOKIE['session_id'])){
          $sql_user = "SELECT session.user_id FROM announcement INNER JOIN user on announcement.user_id=user.id JOIN session ON user.id = session.user_id WHERE session.user_id = $user_id";
        $result = mysqli_query($conn,$sql_user);
        $row =  mysqli_fetch_array($result);
        $sql_user_ann="SELECT user_id FROM announcement WHERE id= $id";
        $result_user_ann = mysqli_query($conn,$sql_user_ann);
        $row_user_ann =  mysqli_fetch_array($result_user_ann);
        if($row && $row['user_id']==$row_user_ann['user_id']){
          echo '
          <button class="edytuj" id="button_edytuj" onclick="przejscie()">
            Edytuj
          </button>';
        } 
        }?>
        
      </div>
      <div class="zawartosc"></div>
    </div>
    <div class="pasek_dolny"></div>

    <div class="tlo">
      <img class="lisc" src="svg/leaf.svg" />
    </div>
    <script>
      const parametr = new URLSearchParams(window.location.search);
      var id = parametr.get("id");
      //console.log(id);
      var wyszukaj = document.getElementById("wyszukaj");

      var adres = `http://localhost/projekt/form_wyszukaj_info.php?id=${id}`;
      async function pobierz_dla_tekstu(tekst) {
        console.log(adres + tekst);
        $adres_caly = adres + tekst;
        const a = await fetch($adres_caly);
        const response = await a.json();
        //console.log(response);

        response.forEach((element, index, self) => {
          var option = document.createElement("div");
          option.className = "info";
          option.innerHTML = `<p class="nazwa">${element.title}</p><p><span>Odbędzie się w: </span>${element.name} </p><p><span>Dnia: </span>${element.date} </p><p><span>Szczegółowy opis:</br> </span>${element.description}</p>`;
          var value = document.querySelector(".zawartosc");
          //console.log(value);

          value.appendChild(option);
          //document.getElementById("parks").appendChild(option);
          //console.log(element);
        });
      }
      pobierz_dla_tekstu("");

      function przejscie() {
        
        window.location.href = `http://localhost/projekt/ogloszenia_edytuj.php?id=${id}`;
      }
    </script>
  </body>
</html>
