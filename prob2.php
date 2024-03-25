<?php 
if(ISSET($_GET["k"])){
    $kerdes=$_GET["k"];
if(isset($_POST['submit'])){
    
$conn = mysqli_connect("mysql.omega", "wexemm", "Asdman123", "wexemm");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($kerdes==""){
$sql = "SELECT * FROM sze";
}
else {
$sql = "SELECT * FROM sze where kerdes RLIKE('$kerdes')";
}
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {

echo 
"<tr><td>" . $row["kerdes"].
"</td><td>". $row["megoldas"].
"</td><td>" . $row["tantargy"] .
"</td><td>". $row["ID"].
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

}}
?>

