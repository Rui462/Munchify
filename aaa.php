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
                <h1 style='font-size: 3vw;'>Felhasználókezelés</h1>
              </div>
             

          </div>
        </div>
      </div>
      
    <!--Felkapottak-->
    <style>
    td,tr,button{border-radius:0px;text-align:center;margin:0px;}
    button{border-radius:15px;text-align:center;margin:0px;border:0px;box-shadow:1px 1px 5px;}
table {
    border-radius:0px;
border-collapse: collapse;
width: 100%;
color: rgba(61, 132, 184, 1);
font-family: Open Sans;
font-size: 25px;
text-align: left;
}
th {
background-color: rgba(61, 132, 184, 1);
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<p class="felkapottak">Felhasználók</p>
<table>
<tr>
<th>Id</th>
<th>felhasználónév</th>
<th>Email cím</th>
<th>Vezetéknév</th>
<th>Keresztnév</th>
<!--<th>Törlés</th>-->
<th>Tiltás/engedélyezés</th>
<th>Kitilva</th>
</tr>
<?php
$conn = mysqli_connect("mysql.rackhost.hu", "c64772munchify", "MunchifyProject24", "c64772munchifydb");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $id=$row["id"];
echo 

"<tr><td>" . $row["id"].
"</td><td>". $row["felhasznalonev"].
"</td><td>" . $row["email"] .
"</td><td>". $row["vezeteknev"].
"</td><td>". $row["keresztnev"].

//"</td><td>"."<button onclick='torles($id)'>Törlés</button>".
"</td><td>"."<button onclick='ban($id)' >Kitiltás</button>"." <button onclick='unban($id)'>Engedélyezés</button>".
"</td><td>". $row["ban"].
"</td></tr>" 
 ;
}
echo "</table>";
} else { echo "Nincs találat"; }
$conn->close();
?>
</table>
</body>
<script>
    function torles(userid) {
        let result = confirm("Biztos törölni szeretnéd?");
            if (result === true) {

  window.location = 'admin_funkciok/torles.php?k='+userid;
            }
  }
  function ban(userid) {
        let result = confirm("Biztos banolni szeretnéd?");
            if (result === true) {
  window.location = 'admin_funkciok/ban.php?k='+userid;
            }
  }
  function unban(userid) {
        let result = confirm("Biztos unbanolni szeretnéd?");
            if (result === true) {
  window.location = 'admin_funkciok/unban.php?k='+userid;
            }
  }


    </script>

    <!--Toast-->
    
    <center>
      <!--LÁTTAM, HOGY EZ KI LETT TÖRÖLVE, IDEIGLENESEN VISSZATETTEM HOGY MEGNEZZEM H MUKODIK-E A LISTAZAS- MERT NEM TUDOM HOGY MUKODIK EGYELORE A KOSARBA TETEL!!!!!!!!!!!!!-->
    <div class="container" id="FelkapottContainer">
        <div id='termekkartyak' class="row Cardrow">

        </div>

    <!--BS-->
	<script src='js/kep_ellenorzes.js'></script>
	<script src="js/listazas.js"></script>
    <script src="js/termek_kezeles.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>