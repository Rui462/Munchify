<?php 
    include 'navbar_elado.php';
    include 'termekfeltoltes.php';
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!--Google fonts import-->
    <!--Quicksand-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <!--Lemonada-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300..700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">



    <link rel="stylesheet" href="/css/home.css">
    <title>Munchify | Termékkezelés</title>
</head>
<body id='body'>
<div class="ertesites_container" id="ertesites_container"></div>	
    <!--Carousel-->
<div id='betoltokepernyo' class='betoltokepernyo' style='z-index:999;'> 
	<div>
		<div style='position: absolute; top:50%; left: 50%; transform: translate(-50%, -50%);'  id="betoltokep" >
			<span class='d-flex justify-content-center'><img style='max-width: 10em;' src="/img/munchify_logo1.png" alt=""></span><br>
			<center><div class='d-flex justify-content-center spinner-grow text-light'role='status'><span class='sr-only'>Betöltés</span></div></center>
		</div>
	</div> 
	</div>
	<div style='padding-top: 4.5em;'></div>
  <div id='ablak' style='opacity: 0; visibility: hidden; z-index: 999; background: rgba(0,0,0,0.6);'>
  </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/szenya1.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3vw;'>Termékkezelés</h1>
              </div>
          </div>
        </div>
      </div>
    <!--Felkapottak-->
    <div class="container">
        <div class="row">
              <div class="col-sm">
                <p class="felkapottak">Aktív termékek kezelése</p>
                <div style='border: 1px solid #c7c7c7; padding: 1em; border-radius: 1em; height: 15em; overflow: scroll;' id='termekek'>

                </div>
                <div style='padding-top: 0.5em;'></div>
                <input type='text' id='termeknevkeres' placeholder='Termék neve...' style='padding: 0.3em; outline: none;'/><button onClick='termekkeres()' style='border: 1px solid #306e21; outline: none; background-color: #306e21; color: white; padding: 0.3em;'>Keresés</button>
              </div>
            </div>
        <hr>
        <div class="row">
          <div class="col-sm">
            <p class="felkapottak">Új termék hozzáadása</p>
            <form enctype="multipart/form-data" method='POST'>
                <input type='text' name='termeknev' placeholder='Termék neve...' maxlength="20" style='padding: 0.3em; width: 100%; box-sizing: border-box;'/><br>
                <div style='padding-top: 0.3em;'></div>
                <input type='text' name='termekar' placeholder='Termék ára... (CSAK SZÁM)' style='padding: 0.3em; width: 100%; box-sizing: border-box;'/><br>
                <div style='padding-top: 0.3em;'></div>
                <select id='kategoriavalaszto' name='kategoria' class="form-select" aria-label="Default select example" style='padding: 0.3em; width: 100%; box-sizing: border-box;'>
                    <option value='0' selected>Kategória kiválasztása...</option>
                </select>
                <div style='padding-top: 0.3em;'></div>
                <div class="custom-file">
                    <input name='file' type="file" class="custom-file-input" id="customFile" onchange="feltoltveszoveg();">
                    <label class="custom-file-label"  id='feltoltesszoveg' for="customFile">Válassz ki egy képet...</label>
                </div>
                <div style='padding-top: 0.3em;'></div>
                <input type='submit' name='feltoltve' style='border: 1px solid #306e21; outline: none; background-color: #306e21; color: white; padding: 0.3em; width: 100%; box-sizing: border-box;'/>
            </form>  
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm">
            <p class="felkapottak">Termékkategóriák kezelése</p>
            <div style='border: 1px solid #c7c7c7; padding: 1em; border-radius: 1em; height: 10em; overflow: scroll;' id='termekkategoriak'>

            </div>
            <div style='padding-top: 0.5em;'></div>
            <input type='text' id='kategorianev' placeholder='Termékkategória neve...' style='padding: 0.3em; outline: none;'/><button onClick='kategoriahozzaadas()' style='border: 1px solid #306e21; outline: none; background-color: #306e21; color: white; padding: 0.3em;'>+ Termékkategória hozzáadása</button>
          </div>
        </div>
        <hr>
        <div class="row">
          <div id='szunetedit' class="col-sm">
            <p class="felkapottak">Rendelésszámok szerkesztése (Max rendelésszám egy szünetben)</p>
            
            </div>
        </div>
    </div>

    <!--Toast-->
    
    <center>
      <!--LÁTTAM, HOGY EZ KI LETT TÖRÖLVE, IDEIGLENESEN VISSZATETTEM HOGY MEGNEZZEM H MUKODIK-E A LISTAZAS- MERT NEM TUDOM HOGY MUKODIK EGYELORE A KOSARBA TETEL!!!!!!!!!!!!!-->
    <div class="container" id="FelkapottContainer">
        <div id='termekkartyak' class="row Cardrow">

        </div>

    <!--BS-->
	<script src='js/kep_ellenorzes.js'></script>
    <script src="js/termek_kezeles.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>