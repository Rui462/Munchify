<?php 


$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchifydb");




    if(ISSET($_GET["k"])){
$id=$_GET["k"];
    
if ($id!=""){
    $sql = "DELETE FROM users WHERE id = $id";
    
}
$result = $conn->query($sql);






}
header('location: ./adminpanel.php');
?>