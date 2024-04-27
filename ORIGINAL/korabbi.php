<!DOCTYPE html>
<html>
<link rel="icon" type="image/x-icon" href="kep.png">
<title> rendelesek Moodle okosság </title>
   <script>
    var x=document.getElementById("kerdes").value;
    if(x==""){x=fasz;}
   </script> 
<head>
    <center>
    <h1>rendelesek Moodle adatbank<h1>
        <h3>Python program: hamarosan</h3>
    <form method="post" action="index.php">
    <input type="text" id="kerdes" name="kerdes"></input>

    <button type="submit" id="button" onClick="mutasd()" name="submit" >Keresés kérdésre</button>
    
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
th {
background-color: #282c44;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>Termék</th>
<th>Dátum</th>
<th>Ár</th>
</tr>
<?php 

if(isset($_POST['submit'])){
    
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");
$kerdes = mysqli_real_escape_string($conn,$_POST['kerdes']);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($kerdes==""){
$sql = "SELECT * FROM rendelesek";
}
else {
$sql = "SELECT * FROM rendelesek where kerdes RLIKE('$kerdes')";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

echo 
"<tr><td>" . $row["termek"].
"</td><td>". $row["date"].
"</td><td>" . $row["ar"] .
"</td></tr>" 
 ;
}
echo "</table>";
} else { 
    echo "Nincs találat";
    session_start();
    $kers = mysqli_real_escape_string($conn,$_POST['kerdes']);
    $_SESSION['atvitel']=$kers;
    header("Location: feltolt.php");
    
}




$conn->close();

}
?>

</table>
</body>
</html>