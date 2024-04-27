<?php
	SESSION_START();
	OB_START();
	include_once 'header.php';
	if((isset($_SESSION["session_id"])) or (isset($_SESSION["felhasznalonev"]))){
		$felhasznalonev = $_SESSION["felhasznalonev"];
	}
	else{
		header("Location: index");
	}
?>
<!DOCTYPE html>
<html>
<link rel="icon" type="image/x-icon" href="/img/munchify_m.png">
<title>Munchify | Rendelési előzmények</title>

<head>
    

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
th {
background-color: #282c44;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
    <br><br><br>
<table>
<tr>
<th>Állapot</th>
<th>Termék</th>
<th>Ár</th>
<th>Dátum</th>

</tr>
<?php 


    
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$fnev=$_SESSION["felhasznalonev"];
$sql = "SELECT * FROM rendelesek where felhasznalonev='$fnev'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

echo 
"<tr><td>" . $row["allapot"].
"</td><td>". $row["termek"].
"</td><td>". $row["ar"].
"</td><td>" . $row["date"] .
"</td></tr>" 
 ;
}
echo "</table>";
} else { 
    echo "Nincs találat";
    
}




$conn->close();


?>

</table>
</body>
</html>