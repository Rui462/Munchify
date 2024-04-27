<?php 
include 'navbar_elado.php';

if(isset($_POST['submit'])){


$file = $_FILES['file'];
move_uploaded_file($file['tmp_name'], 'food_imgs/' . $file['name']);
echo "Sikeres feltöltés!";




$php_var;
$conn = mysqli_connect("88.132.223.56", "Frankfurt", "Frankfurt123", "munchify_termekek");

$lol = mysqli_real_escape_string($conn,$_POST['nev']);
$lol2 = mysqli_real_escape_string($conn,$_POST['ar']);
$lol3=$file['name'];

    $sql="INSERT INTO etelek(etel_nev,etel_ar,etel_kep_url) VALUES ('$lol','$lol2','food_imgs/$lol3')";

$conn->query($sql);
  
    

$conn->close();




}
?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="floating.css">
	<head>
		<title>Munchify | Bejelentkezés</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	 	<link rel="stylesheet" href="./css/stylesajat.css">
	</head>
	<style>
		
		
	</style>
	
	
	<body>
		<div class="ertesites_container" id="ertesites_container"></div>
		<div id='bejelentkezes' class='bejelentkezes'>
		<div class="kep">
			<img src='img/munchify3.png' id="logo"/>
		</div>
		
		
			<div class='bejelentkezes_al'>
			<form id="uploadbanner" enctype="multipart/form-data" method="post" action="feltolt.php">
			<span id="bejelentkezes_szoveg" >Termék feltöltése</span><br>
			<div class="form">
					<input type='text' placeholder='Termék név' id="bejelentkezes_fnev" name='nev' /><br>
					
					<input type='text' placeholder='Termék ár' id="bejelentkezes_fnev" name='ar' /><br><br>
					<div id="bejelentkezes_fnev">
					<input id="file" name="file" type="file" /><br>
</div>
				<input class='regisztracio_gomb' type="submit" name="submit" value="ok" id="submit"></input>
</form>
			</div>
			
			
			
		</div>
		</div>
			
			
		
	
	</body>
</html>