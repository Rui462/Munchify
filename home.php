<!DOCTYPE html>
<?php
	include 'navbar.php';
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
    <!--Lexend-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/css/home.css">
    <title>Munchify</title>
</head>
<body>
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
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/szenya1.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3vw;'>Üdvözlünk <?php echo $_SESSION["felhasznalonev"];?>!<br>Rendelj a <img class="logokicsi" src="/img/munchify_logo1.png" alt="">-ról!</h1>
              </div>
          </div>
          <div class="carousel-item">
            <img src="./img/szenya2.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3vw;'>Megéheztél?<br>Próbáld ki a szendvicseinket!</h1>
              </div>
          </div>
          <div class="carousel-item">
            <img src="./img/szenya3.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3vw;'>A szendvicsed mellé<br>rendelj hűsítő üdítőt is!</h1>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    <!--Felkapottak-->
    <div class="container">
        
    </div>

    <!--Toast-->
    
    <center>
      <!--LÁTTAM, HOGY EZ KI LETT TÖRÖLVE, IDEIGLENESEN VISSZATETTEM HOGY MEGNEZZEM H MUKODIK-E A LISTAZAS- MERT NEM TUDOM HOGY MUKODIK EGYELORE A KOSARBA TETEL!!!!!!!!!!!!!-->
    <div class="container" id="FelkapottContainer">
        <div id='termekkartyak' class="row Cardrow">

        </div>
</div>
<footer class="w-100 py-4 flex-shrink-0" style='background-color: #2a373b;'>
        <div class="container py-4">
            <div class="row gy-4 gx-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="h1 text-white"><img src='img/munchify_m.png' style='width: 2em;'></img></h5>
                    <p class="small text-muted">Munchify</p>
                    <p class="small text-muted">By: "A" Csapat</p>
                </div>
                <div class="col-lg-4 col-md-6">
                </div>
                <div class="col-lg-4 col-md-6">
                    <p class="small text-muted">Tátrai Péter</p>
                    <p class="small text-muted">Kucserka Szabolcs</p>
                    <p class="small text-muted">Szabó Áron</p>
                    <p class="small text-muted">Tátrai Bence</p>
                    <p class="small text-muted"><a href='rolunk'>Rólunk</a></p>
                </div>
            </div>
            
        </div>
    </footer>
    <!--BS-->
	<script src='js/kep_ellenorzes.js'></script>
	<script src="js/kosar.js"></script>
	<script src="js/listazas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>

<script>
	function $(id){
		return document.getElementById(id);
	}
</script>