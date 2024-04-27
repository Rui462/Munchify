<?php
	if((isset($_SESSION["session_id"])) or (isset($_SESSION["felhasznalonev"]))){
		header("Location: h");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Munchify | Bejelentkezés</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
		<link rel="stylesheet" href="./css/login.css">
	</head>
	<body>
		<div class="ertesites_container" id="ertesites_container"></div>
		<div id='bejelentkezes' class='bejelentkezes'>
		
		<center><img src='img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='bejelentkezes_al'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Bejelentkezés</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Felhasználónév' id="bejelentkezes_fnev" name='bejelentkezes_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó' autocomplete="off" id="bejelentkezes_jelszo" name='bejelentkezes_pw' />
				<div style='padding-top: 3%;'></div>
				<center><span style='font-family: Open Sans; cursor: pointer; font-size: 0.8em;' onClick='elfelejtett();'>Elfelejtett jelszó</span></center>
				<div style='padding-top: 3%;'></div>
				<input class='bejelentkezes_gomb' type='button' id="bejelentkezes_gomb" value='Bejelentkezés' name='bejelentkezes_gomb' />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='regisztracio_gomb' onClick='reg_gomb()'>Regisztráció</button>
			
		</div>
		</div>
		<div id='elfelejtett' class='elfelejtett'>
		
		<center><img src='img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='elfelejtett_al'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Jelszó visszaállítás</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Email cím' id="elfelejtett_email"/><br>
				<div style='padding-top: 5%;'></div>
				<input class='bejelentkezes_gomb' type='button' value='Email küldése' id='elfelejtett_gomb' />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='regisztracio_gomb' onClick='elfelejtett_vissza()'>Vissza a bejelentkezéshez</button>
			
		</div>
		</div>
		<div id='regisztracio' class='regisztracio'>
		<center><img src='img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='regisztracio_al'>
			<center><span style='text-align: center; font-family: Open Sans; font-size: 100%;'><b>Regisztráció</b></span></center><br>
			<form method='POST'>
				<input type='text' id="vnev" placeholder='Vezetéknév' name='regisztracio_vnev'  style='width: 50%;'/><input type='text' id="knev" placeholder='Keresztnév' name='regisztracio_knev' style='width: 50%;'/><br>
				<div style='padding-top: 5%;'></div>
				<input type='text' id="fnev" placeholder='Felhasználónév' name='regisztracio_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='text' placeholder='Email Cím' onchange="return validate()" id="email" name='regisztracio_email' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='password' id="jelszo1" placeholder='Jelszó' autocomplete="off" name='regisztracio_pw' />
				<div style='padding-top: 5%;'></div>
				<input type='password' id="jelszo2" placeholder='Jelszó ismét' autocomplete="off" name='regisztracio_pw_megint' />
				<div style='padding-top: 5%;'></div>
				<input id="regGomb" class='regisztracio_gomb' type='button' value='Regisztráció' name='regisztracio_gomb' />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='bejelentkezes_gomb' onClick='be_gomb()'>Vissza a bejelentkezéshez</button>
			<span id="regValasz"></span>
		</div>
		</div>

        <script src="./js/bejelentkezes.js"></script>
		<script src="./js/login_animaciok.js"></script>
	</body>
</html>