<?php
  include 'polaczenie.php';
  include 'funkcje_pomocnicze.php';
  $datetime = new DateTime('tomorrow');
          
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
    <link rel="stylesheet" type="text/css" href="style_ogloszenia_dodaj.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <form name="formularz_dodawanie" method="post" action="form_dodaj.php">
          <input
            type="text"
            id="tytul"
            name="tytul"
            required
            placeholder="Tytuł"
          />
          <input list="parks" id="park" name="parks" placeholder="Park" />
          <datalist id="parks" required></datalist>

          <input type="date" id="data" name="data" min=
          <?php echo $datetime->format('Y-m-d'); ?>
          required placeholder="" />
          <textarea
            type="text"
            id="opis"
            name="opis"
            required
            cols="30"
            placeholder=" Opis wydarzenia"
          ></textarea>
          <input hidden name="uzytkownik" value=<?php echo $user_id; ?>/>
          <input type="submit" id="input_dodawanie" value="Dodaj" />
        </form>
      </div>
    </div>
    <div class="pasek_dolny"></div>
    <div class="tlo">
      <img class="lisc" src="svg/leaf.svg" />
    </div>
    <script>
      var park = document.getElementById("park");

      var adres = "http://localhost/projekt/park_wyszukaj.php?wildcard=";

      park.addEventListener("keyup", async (wypisz) => {
        var adres_caly = adres + park.value;
        const a = await fetch(adres_caly);
        const response = await a.json();
        var value = document.getElementById("parks");
        if (value != null) {
          while (value.lastElementChild) {
            value.removeChild(value.lastElementChild);
          }
        }
        response.forEach((element, index, self) => {
          var option = document.createElement("option");
          option.innerHTML = element["name"];
          option.value = element["id"];
          var value = document.getElementById("parks");
          value.appendChild(option);
          //document.getElementById("parks").appendChild(option);
          //console.log(element["name"] + " " + index + " " + self);
        });
      });
    </script>
  </body>
</html>
