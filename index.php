
<?php
	SESSION_START();
	if(isset($_SESSION["felhasznalonev"]) and isset($_SESSION["email"]) and isset($_SESSION["userid"])){
		if($_SESSION["jogosultsag"]==0){
			header("Location: home");
		}
		if($_SESSION["jogosultsag"]==1){
			header("Location: panel");
		}
	}
?>
<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="floating.css">
	<head>
		<title>Munchify | Bejelentkezés</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	 	<link rel="stylesheet" href="./css/stylesajat.css">
		 <link rel="icon" type="image/x-icon" href="/ikon/munchify_m.ico">
	</head>
	<style>
		
		
	</style>
	<script>
		
		function reg_gomb(){
			document.getElementById('bejelentkezes').style.animationName = 'eltunik';
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s';
			document.getElementById('bejelentkezes').style.animationDelay = '0s';
			document.getElementById('bejelentkezes').style.animationFillMode = 'both';
			document.getElementById('regisztracio').style.animationName = 'megjelen';
			document.getElementById('regisztracio').style.animationDelay = '0.3s';
			document.getElementById('regisztracio').style.animationDuration = '0.2s';
			document.getElementById('regisztracio').style.animationFillMode = 'both';
		}
		function be_gomb(){
			document.getElementById('regisztracio').style.animationName = 'eltunik';
			document.getElementById('regisztracio').style.animationDuration = '0.2s';
			document.getElementById('regisztracio').style.animationDelay = '0s';
			document.getElementById('regisztracio').style.animationFillMode = 'both';
			document.getElementById('bejelentkezes').style.animationName = 'megjelen';
			document.getElementById('bejelentkezes').style.animationDelay = '0.3s';
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s;'
			document.getElementById('bejelentkezes').style.animationFillMode = 'both';
		}
		function elfelejtett_g(){
			document.getElementById('bejelentkezes').style.animationName = 'eltunik';
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s';
			document.getElementById('bejelentkezes').style.animationDelay = '0s';
			document.getElementById('bejelentkezes').style.animationFillMode = 'both';
			document.getElementById('elfelejtett').style.animationName = 'megjelen';
			document.getElementById('elfelejtett').style.animationDelay = '0.3s';
			document.getElementById('elfelejtett').style.animationDuration = '0.2s';
			document.getElementById('elfelejtett').style.animationFillMode = 'both';
		}
		function elfelejtett_vissza(){
			document.getElementById('elfelejtett').style.animationName = 'eltunik';
			document.getElementById('elfelejtett').style.animationDuration = '0.2s';
			document.getElementById('elfelejtett').style.animationDelay = '0s';
			document.getElementById('elfelejtett').style.animationFillMode = 'both';
			document.getElementById('bejelentkezes').style.animationName = 'megjelen';
			document.getElementById('bejelentkezes').style.animationDelay = '0.3s';
			document.getElementById('bejelentkezes').style.animationDuration = '0.2s;'
			document.getElementById('bejelentkezes').style.animationFillMode = 'both';
		}
	</script>
	<script>
	// ELLENŐRZI HOGY A MEGADOTT EMAIL HELYES-E
		
		function emailhiba_on(){
			document.getElementById("email").style.backgroundColor = "#a10202";
			
		}
		function emailhiba_off(){
			document.getElementById('email').style.background = 'transparent';
		}

		function validateEmail(val) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(val);
		}
		function validate() {
		var email = document.getElementById("email");
		if (validateEmail(email.value)) {
				emailhiba_off()
		  } else {
				emailhiba_on()
		  }
		}
		
	</script>
	<body>
		<div class="ertesites_container" id="ertesites_container"></div>
		</div>
		<div id='bejelentkezes' class='bejelentkezes'>
		<div class="kep">
			<img src='img/munchify3.png' id="logo"/>
		</div>
		
		<div class='bejelentkezes_al'>
			
			<span id="bejelentkezes_szoveg" >Bejelentkezés</span><br>
			<div class="form">
					<input type='text' autocomplete="off" placeholder='Felhasználónév' id="bejelentkezes_fnev" name='bejelentkezes_fnev' /><br>
					
					<input type='password' placeholder='Jelszó' autocomplete="off" id="bejelentkezes_jelszo" name='bejelentkezes_pw' />
					
					<span id="elfelejtett_jelszo_szoveg"  onClick='elfelejtett_g()'>Elfelejtett jelszó</span>
					
					<input class='bejelentkezes_gomb' type='button' id="bejelentkezes_gomb" value='Bejelentkezés' name='bejelentkezes_gomb' />
				<button class='regisztracio_gomb' value="" onClick='reg_gomb()'>Regisztráció</button>
				
			</div>
			
			
			
		</div>
		</div>
		<div id='elfelejtett' class='elfelejtett'>
		<div class='elfelejtett_al'>
			
			<span  id="jelszovissza_szoveg"><b>Jelszó visszaállítás</b></span><br>
			<div class="form">
				<input type='text' placeholder="Email cím" id='elfelejtett_email' /><br>
				<input id='elfelejtett_gomb' class='bejelentkezes_gomb' type='submit' value='Email küldése' name='elfelejtett_gomb'/>
				<button class='regisztracio_gomb' onClick='elfelejtett_vissza()'>Vissza a bejelentkezéshez</button>
			</div>
			
		</div>
		</div>
		<div id='regisztracio' class='regisztracio'>
		<div class='regisztracio_al'>
			
			<span id="regisztracio_szoveg" >Regisztráció</span><br>
			<div class="form">
				<input type='text' id="vnev" placeholder='Vezetéknév' name='regisztracio_vnev'/><br><input type='text' id="knev" placeholder='Keresztnév' name='regisztracio_knev'/><br>
				
				<input type='text' id="fnev" placeholder='Felhasználónév' name='regisztracio_fnev' /><br>
				
				<input type='text' placeholder='Email Cím' onchange="return validate()" id="email" name='regisztracio_email' /><br>
				
				<input type='password' id="jelszo1" onkeyup='jelszoellenorzes()' placeholder='Jelszó' autocomplete="off" name='regisztracio_pw' />
				
				<input type='password' id="jelszo2" placeholder='Jelszó ismét' autocomplete="off" name='regisztracio_pw_megint' />
				
				<input id="regGomb" class='regisztracio_gomb' type='button' value='Regisztráció' name='regisztracio_gomb' />
				
				<button class='bejelentkezes_gomb' onClick='be_gomb()'>Vissza a bejelentkezéshez</button>
			</div>
			
			<span id="regValasz"></span>
		</div>
		</div>

        <script src="./js/bejelentkezes.js"></script>
		<script src="./js/login_animaciok.js"></script>
	</body>
</html>