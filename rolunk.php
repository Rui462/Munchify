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



    <link rel="stylesheet" href="/css/home.css">
    <title>Munchify | Rólunk</title>
</head>
<body id='body'>
<div class="ertesites_container" id="ertesites_container"></div>	
    <!--Carousel-->

	<div style='padding-top: 4.5em;'></div>
  <div id='ablak' style='opacity: 0; visibility: hidden; z-index: 999; background: rgba(0,0,0,0.6);'>
  </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/szenya1.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3vw;'>Rólunk</h1>
              </div>
             

          </div>
        </div>
      </div>
      
    <!--Felkapottak-->
</head>
<body>
    <!--Toast-->
    
    <center>

    <div class="container" id="FelkapottContainer">
        <center>
        <img src='img/IMG_9040.jpg' id='csapatkep' style="border-radius:10px;"><br>
        <span style='font-size: 1em;'><b>A Munchify csapata</b><br>(Balról jobbra) Tátrai Péter, Kucserka Szabolcs, Tátrai Bence, Szabó Áron</span>
        <p style="font-size: 14px; font-style:italic; margin-top:15px;">A projekt egyetemi keretek közt jött létre, mi magunk a magánéletben is jó barátok vagyunk, így a közös munka is könnyen ment.
            Többünk már középsikolai tanulmányai alatt megszerezte a tudást ami ennek a projektnek az elkészítéséhez szükséges volt, de 
            mindenkit új kihívások elé állított ez a feladat.
            A munka végére teljesen magunkénak tudtuk érezni az egész folyamatot, és összegezve rengeteg munkaóra és lelkesedés eredménye a <b>Munchify</b>. 
        </p>
        <img src="img/munchify_logo1.png" style="width:120px;" alt="">
    </center>
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
    </center>
    <!--BS-->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>