<?php 
    include 'navbar_elado.php';
    
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
    button{border-radius:5px;text-align:center;background-color:#39a7cc;margin:1px;border:0px;}
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

<center>

    <div class="container" id="FelkapottContainer">
        <div id='termekkartyak' class="row Cardrow">
        <p class="felkapottak">Felhasználók listája</p>
        <table>
<tr>
<th>Id</th>
<th>felhasználónév</th>
<th>Email cím</th>
<th>Vezetéknév</th>
<th>Keresztnév</th>
<!--<th>Törlés</th>-->
<th>Tiltás/engedélyezés</th>
<th>Kitilva-e?</th>
<th>Eladóvá tétel</th>
<th>Eladó-e?</th>
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
"</td><td>"."<button style='color:white;background-color:#9c6262; ' onclick='ban($id)' >Fiók kitiltása</button>"." <button style='color:white;background-color:#629c72;' onclick='unban($id)'>Engedélyezés</button>".
"</td><td>". $row["ban"].
"</td><td>"."<button style='color:white;background-color:#629c72;' onclick='make_admin($id)' >Jog adás</button>"." <button style='color:white;background-color:#9c6262;' onclick='delete_admin($id)'>Elvétel</button>".
"</td><td>". $row["jogosultsag"].
"</td></tr>" 
 ;
}
echo "</table>";
} else { echo "Nincs találat"; }
$conn->close();
?>
</table>
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
    </center>
    
</body>
<script>
    function torles(userid) {
        let result = confirm("Biztos törölni szeretnéd?");
            if (result === true) {

  window.location = 'admin_funkciok/torles.php?k='+userid;
            }
  }
  function ban(userid) {
        let result = confirm("Biztos ki szeretnéd a felhasználót tiltani?");
            if (result === true) {
  window.location = 'admin_funkciok/ban.php?k='+userid;
            }
  }
  function unban(userid) {
        let result = confirm("Biztos visszaengeded a felhasználót?");
            if (result === true) {
  window.location = 'admin_funkciok/unban.php?k='+userid;
            }
  }
function make_admin(userid) {
        let result = confirm("Biztos eladóvá szeretnéd tenni a felhasználót?");
            if (result === true) {

  window.location = 'admin_funkciok/make_admin.php?k='+userid;
            }
  }
  function delete_admin(userid) {
        let result = confirm("Biztos el akarod venni felhasználó eladó jogát?");
            if (result === true) {

  window.location = 'admin_funkciok/remove_admin.php?k='+userid;
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>