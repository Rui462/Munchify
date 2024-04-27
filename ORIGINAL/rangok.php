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
<link rel="icon" type="image/x-icon" href="kep.png">
<title>Rendelési előzmények</title>

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

<?php 


    
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$fnev=$_SESSION["felhasznalonev"];
$sql = "SELECT * FROM rendelesek where felhasznalonev='$fnev'";
  
if ($result = mysqli_query($conn, $sql)) { 

// Return the number of rows in result set 
$rowcount = mysqli_num_rows( $result ); 
  
// Display result 
printf("Rendeléseid: %d\n", $rowcount); 
echo "<br>";
$rang=$_SESSION["rank"];

    echo "Rangod: $rang";
    if($rowcount<50){
        $ennyi=50-$rowcount;
        echo "<br>";
        echo "Következő rangig $ennyi-pontot kell szerezned!";
    }
    if($rowcount>=50){
      if($rowcount<100){
        $ennyi=100-$rowcount;
        echo "<br>";
        echo "Következő rangig $ennyi-pontot kell szerezned!";
    }}
    if($rowcount>=100){
        $ennyi=50-$rowcount;
        echo "<br>";
        echo "Legnagyobb rangod van!";
    }



}

// Close the connection 
mysqli_close($conn); 

?> 




</body>
</html>