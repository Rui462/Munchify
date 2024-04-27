<?php 
    include '/navbar_elado.php';

$conn = mysqli_connect("mysql.rackhost.hu", "c64772munchify", "MunchifyProject24", "c64772munchifydb");


session_start();

    if(ISSET($_GET["k"])&&($_SESSION["jogosultsag"]==1)){
$id=$_GET["k"];
    
if ($id!=""){
    $sql = "UPDATE users SET jogosultsag='1' WHERE id=$id";
}
$result = $conn->query($sql);
}
header('location: /admin.php');
?>