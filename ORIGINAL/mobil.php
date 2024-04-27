<?php
	include 'sql_conn/conn_userdat.php';
?>

<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="floating.css">
	<head>
		<title>Munchify | Bejelentkezés</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	</head>
	<style>
		html{
			overflow: hidden;
		}
		.bejelentkezes{
			position: absolute;
			top: 20%;
			left: 50%;
			transform: translate(-50%, 0%);width: 100%;

		}
		.hiba{
			position: absolute;
			top: 0%;
			left: 50%;
			transform: translate(-50%, 0%);
			padding: 0.3em;
			animation-name: hibaani;
			animation-duration: 7s;
			animation-fill-mode: both;
			visibility: hidden;
			opacity: 0;
		}
		@keyframes hibaani{
			0%{opacity: 0; visibility: visible;}
			10%{opacity: 1; visibility: visible;}
			90%{opacity: 1; visibility: visible;}
			100%{opacity: 0; visibility: hidden;}	
		}
		.bejelentkezes_al{
			border: 1px solid black;
			padding: 1vw;
			border-radius: 1vw;
			opacity: 1;
			visibility: visible;
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
			background-color: white;
		}
		.regisztracio{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 25%;
			opacity: 0;
			visibility: hidden;
			
		}
		.regisztracio_al{
			border: 1px solid black;
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
			background-color: white;
			padding: 1vw;
			border-radius: 1vw;
		}
		input[type=text], input[type=password]{
			padding: 0.5vw;
			font-family: Open Sans;
			font-size: 400%;
			width: 100%;

			border: 1px solid #a1a1a1;
			outline: none;
		}
		@keyframes adatfocus{
			0%{border: 1px solid #a1a1a1; background-color: white;}
			100%{border: 1px solid #072352; background-color: #dbe9ff;}
		}
		input[type=text]:focus, input[type=password]:focus{
			animation-name: adatfocus;
			animation-duration: 0.3s;
			animation-fill-mode: both;
		}
		.bejelentkezes_gomb{
			width: 100%;
			box-sizing: border-box;
			border: 1px solid #37b057;
			background-color: #37b057;
			font-family: Verdana;
			font-size: 400%;
			color: white;
			padding: 0.5vw;
		}
		.bejelentkezes_gomb:hover{
			background-color: #288240;
			border: 1px solid #288240;
			cursor: pointer;
		}
		.regisztracio_gomb{
			width: 100%;
			box-sizing: border-box;
			border: 1px solid #3765b0;
			background-color: #3765b0;
			font-family: Verdana;
			font-size: 400%;
			color: white;
			padding: 0.5vw;
			text-align: center;
		}
		.regisztracio_gomb:hover{
			background-color: #224173;
			border: 1px solid #224173;
			cursor: pointer;
			
		}
		@keyframes eltunik{
			0%{opacity: 1; visibility: visible;}
			100%{opacity: 0; visibility: hidden;}
		}
		@keyframes megjelen{
			0%{opacity: 0; visibility: visible;}
			100%{opacity: 1; visibility: visible;}
		}
		.kitolteshiba{
			padding: 0.2vw;
			width: 100%;
			background-color: #e83f3f;
			color: white;
			font-family: Verdana;
			font-size: 60%;
			box-sizing: border-box;
			visibility: hidden;
		}
		 @-webkit-keyframes hatter {
			0%{background-position:0% 50%}
			50%{background-position:100% 50%}
			100%{background-position:0% 50%}
		}
		@-moz-keyframes hatter {
			0%{background-position:0% 50%}
			50%{background-position:100% 50%}
			100%{background-position:0% 50%}
		}
		@keyframes hatter {
			0%{background-position:0% 50%}
			50%{background-position:100% 50%}
			100%{background-position:0% 50%}
		}
		body{
			background: linear-gradient(270deg, #00043a, #2d9dc5);
			background-size: 400% 400%;

			-webkit-animation: hatter 30s ease infinite;
			-moz-animation: hatter 30s ease infinite;
			animation: hatter 30s ease infinite;
		}
	</style>
	<script>
		
		function reg_gomb(){
			document.getElementById('bejelentkezes').style.animationName = 'eltunik'
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s'
			document.getElementById('bejelentkezes').style.animationDelay = '0s'
			document.getElementById('bejelentkezes').style.animationFillMode = 'both'
			document.getElementById('regisztracio').style.animationName = 'megjelen'
			document.getElementById('regisztracio').style.animationDelay = '0.3s'
			document.getElementById('regisztracio').style.animationDuration = '0.2s'
			document.getElementById('regisztracio').style.animationFillMode = 'both'
		}
		function be_gomb(){
			document.getElementById('regisztracio').style.animationName = 'eltunik'
			document.getElementById('regisztracio').style.animationDuration = '0.2s'
			document.getElementById('regisztracio').style.animationDelay = '0s'
			document.getElementById('regisztracio').style.animationFillMode = 'both'
			document.getElementById('bejelentkezes').style.animationName = 'megjelen'
			document.getElementById('bejelentkezes').style.animationDelay = '0.3s'
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s'
			document.getElementById('bejelentkezes').style.animationFillMode = 'both'
		}
	</script>
	<body>
		<div id='bejelentkezes' class='bejelentkezes'>
		
		<center><img src='/img/munchify3.png' style='width: 500px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='bejelentkezes_al'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 400%;'><b>Bejelentkezés</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Felhasználónév' name='bejelentkezes_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó' name='bejelentkezes_pw' />
				<div style='padding-top: 5%;'></div>
				
				<input class='bejelentkezes_gomb' type='submit' value='Bejelentkezés' name='bejelentkezes_gomb' onclick="belepes_check()" />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='regisztracio_gomb' onClick='reg_gomb()'>Regisztráció</button>
			
		</div>
		</div>

		<div id='regisztracio' class='regisztracio'>
		<center><img src='/img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='regisztracio_al'>
			<center><span style='text-align: center; font-family: Open Sans; font-size: 100%;'><b>Regisztráció</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Felhasználónév' name='regisztracio_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='text' placeholder='Email Cím' id="email" onchange="return validate()" name='regisztracio_email' /><br>
				<div class='kitolteshiba' id='emailhiba'>
					<b>Az email cím nem megfelelő</b>
				</div>
				
				<input type='text' placeholder='Oktatási Azonosító' maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" id='omazon' onchange="return ellenorzes()" name='regisztracio_om' /><br>
				<div class='kitolteshiba' id='omhiba'>
					<b>Az oktatási azonosító nem megfelelő</b>
				</div>
				<input type='password' placeholder='Jelszó' name='regisztracio_pw' />
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó ismét' name='regisztracio_pw_megint' />
				<div style='padding-top: 5%;'></div>
				<input class='regisztracio_gomb' type='submit' value='Regisztráció' name='regisztracio_gomb' />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='bejelentkezes_gomb' onClick='be_gomb()'>Vissza a bejelentkezéshez</button>
			
		</div>
		</div>
<?php
	function hiba($szoveg){
		echo "
		<div class='hiba' style='width: 25%;'>
			<div style='padding: 0.7em; background-color: #a83232; color: white; font-family: Open Sans; font-size: 1em; border-radius: 0.5em;'>
				<center><b>Sikertelen belépés!</b></center><hr style='color: white;'>$szoveg<hr style='color: white;'>
			</div>
		</div>
		";
	}
	if($_SESSION["database_hiba"]==1){
		header("Location: uzemenkivul"); //Ha nem működik valamelyik adatbázis akkor átirányítja a felhasználókat egy másik oldalra.
	}
	if(isset($_POST["bejelentkezes_gomb"])){ //Bejelentkezés kezelése
		//megnézi hogy üresek-e a mezők
	if (empty($_POST['bejelentkezes_fnev'])){
		hiba("Nem adtál meg felhasználónevet!");
	}
	elseif (empty($_POST['bejelentkezes_pw'])){
		hiba("Nem adtál meg jelszót!");
	}
	else{	
		$jelszokodolo_str = "projektmunka2024";
		$fnev = $_POST["bejelentkezes_fnev"];
		$jelszo = hash_hmac('sha256',$_POST["bejelentkezes_pw"],$jelszokodolo_str);
		
		$sql = "SELECT * FROM users WHERE felhasznalonev='$fnev'"; // Összegyűjti itt azt hogy van-e másik felhasználó ezzel a névvel.
		$query = mysqli_query($userdb_conn,$sql);
		$talalatok = mysqli_fetch_all($query);
		if(count($talalatok)==0){
			hiba("Hibás felhasználónév vagy jelszó!");
		}
		else{
			
			if($jelszo==$talalatok[0][2]){
				header( "Location: h" );
			}
			else{
				hiba("Hibás felhasználónév vagy jelszó!");
			}
		}
	}
}
	
	if(isset($_POST["regisztracio_gomb"])){
		$ok = 0;
		$jelszokodolo_str = "projektmunka2024";
		
		$fnev = $_POST["regisztracio_fnev"];
		$email = $_POST["regisztracio_email"];
		$om = $_POST["regisztracio_om"];
		$jelszo = hash_hmac('sha256',$_POST["regisztracio_pw"],$jelszokodolo_str);
		$jelszomegint = hash_hmac('sha256',$_POST["regisztracio_pw_megint"],$jelszokodolo_str);
		
		$sql = "SELECT felhasznalonev FROM users WHERE felhasznalonev='$fnev'"; // Összegyűjti itt azt hogy van-e másik felhasználó ezzel a névvel.
		$query = mysqli_query($userdb_conn,$sql);
		$talalatok = mysqli_fetch_all($query);

	if (empty($_POST['regisztracio_fnev']))
	{
	hiba("Nem adtál meg felhasználónevet!");
	$ok = 1;
	}
	if (empty($_POST['regisztracio_email']))
	{
	hiba("Nem adtál meg email címet!");
	$ok = 1;
	}
	if (empty($_POST['regisztracio_om']))
	{
	hiba("Nem adtál meg Oktatási Azonosítót!");
	$ok = 1;
	}
	if (empty($_POST['regisztracio_pw']))
	{
	hiba("Nem adtál meg jelszót!");
	$ok = 1;
	}
	if (empty($_POST['regisztracio_pw_megint']))
	{
	hiba("Nem erősítetted meg a jelszavad!");
	$ok = 1;
	}
	if($ok==0){	


		
		if(count($talalatok)!=0){	// Leellenőrzi, hogy ha van ilyen másik felhasználó akkor kidobja a hibát.
			array_push($errors,"Van ilyen felhasználó!");
			include 'hiba.php';
		}
		else{
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){  //Leellenőrzi hogy az email helyes-e.
				if(strlen($om)==11){	// Leellenőrzi, hogy az OM azonosító helyes-e.
					if($jelszo==$jelszomegint){		//Lellenőrzi itt, hogy a jelszavak megegyeznek-e.
						$sql = "INSERT INTO `users`(`felhasznalonev`, `jelszo`, `email`, `om`) VALUES ('$fnev','$jelszo','$email','$om')";
						mysqli_query($userdb_conn,$sql);
						echo "<script>alert('siker')</script>";
					}
					else{
						hiba("A két jelszó nem egyezik meg!");
					}
				}
				else{
					hiba("Az Oktatási Azonosító nem helyes!");
				}
			}
			else{
				hiba("Nem helyes a megadott Email cím!");
			}
		}
	}}
?>
	</body>
</html>
<script>
	// ELLENŐRZI HOGY A MEGADOTT EMAIL HELYES-E
		var email = document.getElementById("email");

		function emailhiba_on(){
			document.getElementById('emailhiba').style.visibility = 'visible'
		}
		function emailhiba_off(){
			document.getElementById('emailhiba').style.visibility = 'hidden'
		}

		function validateEmail(val) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(val);
		}
		function validate() {
		if (validateEmail(email.value)) {
				emailhiba_off()
		  } else {
				emailhiba_on()
		  }
		}
		
		
		//OKTATÁSI AZONOSÍTÓ MEGADÁSI HIBA KEZELÉSE
		
		
		function omhiba_on(){
			document.getElementById('omhiba').style.visibility = 'visible'
		}
		function omhiba_off(){
			document.getElementById('omhiba').style.visibility = 'hidden'
		}
		
		
		var omazon = document.getElementById("omazon");
		function ellenorzes(){
			if(omazon.value.length < 11){
				omhiba_on()
			}
			else{
				omhiba_off()
			}
		}
</script>
