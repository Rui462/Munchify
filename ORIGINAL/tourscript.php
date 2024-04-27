
<?php 


if(isset($_POST['submit'])){
session_start();

$file = $_FILES['file'];
move_uploaded_file($file['tmp_name'], 'food_imgs/' . $file['name']);
echo $file['name'];




$php_var;
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");

$lol = mysqli_real_escape_string($conn,$_POST['nev']);
$lol2 = mysqli_real_escape_string($conn,$_POST['ar']);
$lol3=$file['name'];

    $sql="INSERT INTO etelek(etel_nev,etel_ar,etel_kep_url) VALUES ('$lol','$lol2','food_imgs/$lol3')";

$conn->query($sql);
  
    ;

$conn->close();

#if($_SESSION['atvitel']=="x"){header("Location: ifaecok.php");}


}
?>