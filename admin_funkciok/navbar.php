<?php
	include 'logincheck.php';
?>
<!DOCTYPE HTML>
<html>
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
		<link rel="stylesheet" href="/css/navbar.css">
	</head>
	<body>
<nav id='main_nav' class="fixed-top navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><img id="navkep" src="/img/munchify_logo1.png" alt=""></a>
  <form method='POST' >
      <input class="form-control mr-sm-2" type="text" placeholder="Keresés" id='keresomezo' name="fos"></input>
	 </form>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">Főoldal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style='color: white;' href="#">Termékek</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" style='color: white;' href="#">Rendelések</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" style='color: white; white-space: nowrap;' href="#">Kosár (<span id='kosardarab'></span>)</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Fiók
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		
        <a class="dropdown-item disabled" href="#"><?php echo "Üdvözlünk, $felhasznalonev";?>!</a>
    <a style="color:#498bf5;"class="dropdown-item disabled" href="#">Rangod: <?php echo $_SESSION["rang"];?></a>
		<div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Fiókbeállítások</a>
          <a class="dropdown-item" href="#">Korábbi rendeléseim</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout" style='color: #691e1e;'>Kijelentkezés</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
	</body>
</html>	
<script src='js/kosar.js'></script>
<?php
  if(isset($_POST["fos"])){
    $kereses = $_POST["fos"];
    header("Location: kajak.php?k=$kereses");
  }
?>