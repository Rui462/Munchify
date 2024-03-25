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