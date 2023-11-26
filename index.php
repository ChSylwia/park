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
    <link href="polaczenie.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parki</title>
  </head>
  <body>
    <a href="index.php"><img class="logo" src="svg/logo.svg" /></a>
    <?php include 'naglowek.php' ?>
    <div class="srodek">
      <div class="lewy">
        <p>
          Witamy na stronie parków Mazowsza! Chcemy Ci pomóc znaleźć ciekawe
          tereny zielone do odwiedzenia. Zachęcamy do wystawiania opinii o
          parku, lub ogłoszeń odnośnie ciekawych wydarzeń.
        </p>
      </div>
      <div class="prawy">
        <p>Kliknij w mapkę by znaleźć park</p>
        <svg
          viewBox="0 0 479 499"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            id="mapa"
            d="M408.979 283.813L399.726 291.225L362.617 292.02L336.671 305.133L334.76 324.865L350.549 339.447L336.671 346.859V362.617L319.977 370.039H307.004L301.473 381.976L333.855 393.22L332.045 414.55L325.508 418.251L332.045 422.897L333.855 448.853L320.882 455.34L322.793 492.429L299.562 488.728L279.147 498L269.895 485.942H248.575L234.697 467.398L211.466 473.884L186.425 472.034L150.12 433.094L151.226 421.036L167.015 407.128L140.084 365.403L176.267 367.263L183.709 354.28L167.92 345.008V323.678L149.316 314.406L132.672 311.63L123.4 294.011L129.886 277.317L102.069 260.623V247.65L84.4502 240.228L56.6335 244.864L26.0411 230.956L1 226.319L4.71094 207.775L18.6193 198.503L16.7688 179.033L27.8915 154.002L37.8577 147.505L25.4579 134.945L26.0411 110.416L57.2972 98.3686L57.3576 70.6021L83.525 59.4191L99.5854 72.7744L141.944 68.6914L151.226 50.7804L171.239 51.7358L186.425 36.2385L204.326 35.3636L212.974 22.2799L227.456 24.4521L256.218 12.5652L291.919 1L299.562 22.3302L297.752 52.0074L308.814 72.4023L332.045 77.9636V91.8719L341.297 100.219L343.107 121.539L375.59 123.4L380.216 141.944H394.095L395.1 175.322L417.326 217.047L474.246 225.807L478.47 244.864L459.966 279.167L432.209 270.83L431.506 285.784L408.979 283.813Z"
            fill="#88A47C"
            stroke="#1C315E"
            stroke-width="0.0762"
          />

          <a href="parki.php?id=0&miasto=1" id="link_warszawa">
            <path
              id="warszawa"
              d="M207.571 275.142C214.514 275.142 220.142 269.513 220.142 262.571C220.142 255.628 214.514 250 207.571 250C200.628 250 195 255.628 195 262.571C195 269.513 200.628 275.142 207.571 275.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Warszawa</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=3" id="link_nowy_dwor_mazowiecki">
            <path
              id="nowy_dwor_mazowiecki"
              d="M188.571 220.142C195.514 220.142 201.142 214.513 201.142 207.571C201.142 200.628 195.514 195 188.571 195C181.628 195 176 200.628 176 207.571C176 214.513 181.628 220.142 188.571 220.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Nowy Dwór Mazowiecki</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=8" id="link_ciechanow">
            <path
              id="ciechanow"
              d="M175.571 143.142C182.514 143.142 188.142 137.513 188.142 130.571C188.142 123.628 182.514 118 175.571 118C168.628 118 163 123.628 163 130.571C163 137.513 168.628 143.142 175.571 143.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Ciechanów</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=7" id="link_makow_mazowiecki">
            <path
              id="makow_mazowiecki"
              d="M251.571 148.142C258.514 148.142 264.142 142.513 264.142 135.571C264.142 128.628 258.514 123 251.571 123C244.628 123 239 128.628 239 135.571C239 142.513 244.628 148.142 251.571 148.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Maków Mazowiecki</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=2" id="link_plock">
            <path
              id="plock"
              d="M79.5708 201.142C86.5135 201.142 92.1417 195.513 92.1417 188.571C92.1417 181.628 86.5135 176 79.5708 176C72.6282 176 67 181.628 67 188.571C67 195.513 72.6282 201.142 79.5708 201.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Płock</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=5" id="link_radom">
            <path
              id="radom"
              d="M239.571 411.142C246.514 411.142 252.142 405.513 252.142 398.571C252.142 391.628 246.514 386 239.571 386C232.628 386 227 391.628 227 398.571C227 405.513 232.628 411.142 239.571 411.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Radom</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=4" id="link_siedlce">
            <path
              id="siedlce"
              d="M339.571 275.142C346.514 275.142 352.142 269.513 352.142 262.571C352.142 255.628 346.514 250 339.571 250C332.628 250 327 255.628 327 262.571C327 269.513 332.628 275.142 339.571 275.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Siedlce</title>
            </path>
          </a>
          <a href="parki.php?id=0&miasto=6" id="link_ostroleka">
            <path
              id="ostroleka"
              d="M320.571 168.142C327.514 168.142 333.142 162.513 333.142 155.571C333.142 148.628 327.514 143 320.571 143C313.628 143 308 148.628 308 155.571C308 162.513 313.628 168.142 320.571 168.142Z"
              fill="#E6E2C3"
              stroke="#1C315E"
              stroke-width="0.0762"
            >
              <title>Ostrołęka</title>
            </path>
          </a>
        </svg>
      </div>
    </div>
    <div class="pasek_dolny"></div>
  </body>
</html>
