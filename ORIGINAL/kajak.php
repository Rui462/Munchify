<!DOCTYPE html>
<html>
<link rel="icon" type="image/x-icon" href="kep.png">
<title> Kaják  </title>
   <script>
    var x=document.getElementById("etel_nev").value;
    if(x==""){x=fasz;}
   </script> 
<head>
    <center>
    <h1>Kaják<h1>
        <h3>ikszdéé</h3>
    <form method="post" action="kajak.php">
    <input type="text" id="etel_nev" name="etel_nev"></input>

    <button type="submit" id="gomb" onClick="mutasd()" name="submit" >Keresés</button>
    
</form>
<title>Felhasználók</title>
<style>
    html{background-color:#abd8ff;}
    input{border-radius:5px;border-color:#282c44;}
    button,select,option{border-radius:5px;border:0px;}
    option,input,button,h1,h3{color:#282c44;font-family:arial;margin-bottom:0px;margin-top:0px}
table {
border-collapse: collapse;
width: 100%;
color: gray;
font-family: monospace;
font-size: 25px;
text-align: left;
}
img{
    height:10%;
}
.hiba{
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius:2vw;
			top: 20%;
width:30%;
			padding: 0.3em;
			animation-name: hibaani;
			animation-duration: 7s;
			animation-fill-mode: both;
			opacity: 1;
            background-color:white;

		}
th {
background-color: #282c44;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>

<?php 


$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");

$sql = "SELECT * FROM etelek";
$result = $conn->query($sql);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

    echo "<div class='hiba'>";
    $kep=$row["etel_kep_url"];
    echo 
    "" . $row["etel_nev"].
    " | ". $row["etel_ar"]." Forint<br>".
    "<img id='kep_design' width='500' height='600' src='$kep'></img>".
    "<br>"
    ;

     echo "</div>";
     echo "<P> </p>";
}

} else { 
    echo "Nincs találat";
    
}




if(isset($_POST['submit'])){

    $etel_nev = mysqli_real_escape_string($conn,$_POST['etel_nev']);   
    
if ($etel_nev==""){
$sql = "SELECT * FROM etelek";
}
else {
$sql = "SELECT * FROM etelek where etel_nev RLIKE('$etel_nev')";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

    echo "<div class='hiba'>";
    $kep=$row["etel_kep_url"];
    echo 
    "" . $row["etel_nev"].
    " | ". $row["etel_ar"]." Forint<br>".
    "<img id='kep_design' width='500' height='600' src='$kep'></img>".
    "<br>"
    ;

     echo "</div>";
     echo "<P> </p>";
}

} else { 
    echo "Nincs találat";
    
}




$conn->close();

}
?>

</table>
</body>
</html>