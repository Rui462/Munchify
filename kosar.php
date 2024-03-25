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



    <link rel="stylesheet" href="/css/home.css">
	<link rel="stylesheet" href="/css/kosar.css">
    <title>Munchify | Kosár</title>
</head>
<body>
<div class="ertesites_container" id="ertesites_container"></div>	
    <!--Carousel-->
    <input type='hidden' id="FelhID" value="<?php echo $_SESSION['userid']; ?>">
    <input type='hidden' id="felnev" value="<?php 
    $vez = $_SESSION['veznev'];
    $ker = $_SESSION['kernev'];
    $nev = "$vez $ker";
    echo $nev; ?>">
	<div style='padding-top: 4.5em;'></div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/szenya1.jpg" class="topKep d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1 style='font-size: 3em; text-align: left;'>Kosár</h1>
            </div>
          </div>
        </div>
      </div>
    <!--Felkapottak-->
    <center>
    <div class="container" style=' padding-bottom: 0;' id="kosartartalom">

    </div>
</center>
    <div id='megjegyzescontainer' style='padding-top: 1em;' class="container">
    
    </div>
    <div id="rendelesgombDiv">
        <div id="nemRendelhet" style='opacity: 0;'>
            Sajnos a rendelések fogadása csak 08:00 és 14:00 között működik!
        </div>
    <div id='vegosszeg' class='container'>	
	</div>
        <input class="btn col-lg-2 col-md-2 col-sm-12 btn-primary" type="button" id="rendelesgomb" onClick='Rendel()' value="Rendelés">
    </div>
    <!--BS-->
    <script src="js/kosarlistazas.js"></script>
	<script src="js/kosar.js"></script>
    <script src="js/kosarlistazas_akt.js"></script>
    <script src="js/idoszures.js"></script>
    <script src="js/rendeles.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
