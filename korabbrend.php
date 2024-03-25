<!DOCTYPE html>
<?php
	include 'navbar.php';
  include 'php/felhasznalo.php';
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



    
    <link rel="stylesheet" href="/css/korabbrend.css">

    <title>Munchify</title>
</head>
<body>
<div class="ertesites_container" id="ertesites_container"></div>	
    <!--Carousel-->
	
	<div style='padding-top: 4.5em;'></div>
    
    <div class="container" style=' padding-bottom: 0;' id="korabbrendtartalom">
    
      
        <div class=" kartya">
          <div class="row">
                <div class="col-6 bal">
                  <h5 class="card-title termeknev" id="datum">Rendelés 2023.06.19</h5>
                  <p class="card-text kodszoveg ">Kód:923</p>
                  <ul>
                    <li>coca-cola</li>
                    <li>burger</li>
                  </ul>
                </div>

                <div class="col-6 jobb">
              
                  <p id="ar">1300ft</p>
                </div>
            </div>
                
        </div>

      
    </div>
  
  
</div>
    </div>
    <!--BS-->
  <script src="js/korabbiRendelesek.js"></script>
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