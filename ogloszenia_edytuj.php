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
    <link rel="stylesheet" type="text/css" href="style_ogloszenia_dodaj.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <?php
        include 'polaczenie.php';
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        parse_str($parts['query'], $query);
        $id=$query['id'];
         $sql="SELECT * FROM announcement WHERE id=${id}";
        $result = mysqli_query($conn,$sql);
        $row =  mysqli_fetch_array($result);

    ?>
    <a href="index.html"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      
      <div class="zawartosc">
        <form name="formularz_dodawanie" method="post" action="form_edytuj.php">
          <input
            type="text"
            id="tytul"
            name="tytul"
            required
            value="<?php echo  $row['title'] ?>"
          />
          <input list="parks" id="park" name="parks" 
          value="<?php echo  $row['park'] ?>"/>
          <datalist id="parks" required></datalist>

          <input type="date" id="data" name="data" required  value="<?php echo  $row['date'] ?>"
/>
          <textarea
            type="text"
            id="opis"
            name="opis"
            required
            cols="80"

          ><?php echo  $row['description'] ?></textarea>
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <input type="submit" id="input_dodawanie" value="Edytuj" />
        </form>
      </div>
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
          var option = document.get("div");
          option.value = "info";
          option.innerHTML = `<p>Tytuł: ${element.title} </p><p>Które odbywać się będzie w: ${element.name} </p><p>Dnia: ${element.date} </p><p>Szczegółowy opis: ${element.description}</p>`;
          var value = document.querySelector(".zawartosc");
          //console.log(value);

          value.appendChild(option);
          //document.getElementById("parks").appendChild(option);
          //console.log(element);
        });
      }
      pobierz_dla_tekstu("");
         
      
    </script>
  </body>
</html>
