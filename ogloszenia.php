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

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.php"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <div class="pasek_opcji">
          <p>Wyszukiwarka ogłoszeń</p>
          <button class="dodaj">
            <a href="ogloszenia_dodaj.html">Dodaj</a>
          </button>
        </div>
        <form method="post" action="form_wyszukaj.php">
          <input
            id="wyszukaj"
            name="wyszukaj"
            placeholder="Wpisz nazwę parku"
          />
          <datalist id="wyszukaj_park" required></datalist>
          <div class="odpowiedz_select" id="odpowiedz_select">
            <div>
              <p></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
    <div class="tlo">
      <img class="lisc" src="svg/leaf.svg" />
    </div>
    <script>
      var wyszukaj = document.getElementById("wyszukaj");
      const parametr = new URLSearchParams(window.location.search);
      var nazwa = parametr.get("nazwa");
      var adres = "http://localhost/projekt/form_wyszukaj.php?wildcard=";
      async function pobierz_dla_tekstu(tekst) {
        console.log(adres + tekst);
        $adres_caly = adres + tekst;
        const a = await fetch($adres_caly);
        const response = await a.json();
        //console.log(response);

        var value = document.getElementById("odpowiedz_select");
        if (value != null) {
          while (value.lastElementChild) {
            value.removeChild(value.lastElementChild);
          }
        }
        response.forEach((element, index, self) => {
          var option = document.createElement("div");
          option.onclick = () => {
            window.location.href = `http://localhost/projekt/ogloszenia_informacja.html?id=${element.id}`;
          };
          option.innerHTML = `${element.title} (${element.name})`;

          var value = document.getElementById("odpowiedz_select");
          value.appendChild(option);
          //document.getElementById("parks").appendChild(option);
          //console.log(element);
        });
      }
      pobierz_dla_tekstu(nazwa);
      wyszukaj.addEventListener("keyup", async (wypisz) => {
        pobierz_dla_tekstu(wyszukaj.value);
      });
    </script>
  </body>
</html>
