<?php
	include 'sql_conn/conn_userdat.php';
	if((isset($_SESSION["session_id"])) or (isset($_SESSION["felhasznalonev"]))){
		header("Location: h");
	}
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'phpmailer/phpmailer/src/Exception.php';
	require 'phpmailer/phpmailer/src/PHPMailer.php';
	require 'phpmailer/phpmailer/src/SMTP.php';
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
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);width: 25%;
		}
		.elfelejtett{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);width: 25%;
			opacity: 0;
			visibility: hidden;
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
			padding: 1vw;
			border-radius: 1vw;
			opacity: 1;
			visibility: visible;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			color: white;
		}
		.elfelejtett_al{
			padding: 1vw;
			border-radius: 1vw;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			color: white;
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
			box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			color: white;
			padding: 1vw;
			border-radius: 1vw;
		}
		input[type=text], input[type=password]{
			padding: 0.5vw;
			font-family: Open Sans;
			font-size: 90%;
			width: 100%;
			box-sizing: border-box;
			border: 1px solid white;
			outline: none;
			background: transparent;
			border: 1px solid white;
			color: white;
			border-radius: 0.5em;
		}
		input[type=text]::placeholder, input[type=password]::placeholder{
			color: white;
			opacity: 1;
		}
		@keyframes focusvalt{
			0%{color: white;}
			100%{color: black;}
		}
		input[type=text]:focus::placeholder, input[type=password]:focus::placeholder{
			color: black;
		}
		@keyframes adatfocus{
			0%{border: 1px solid #a1a1a1; background: transparent;}
			100%{border: 1px solid #072352; background-color: #dbe9ff;}
		}
		input[type=text]:focus, input[type=password]:focus{
			animation-name: adatfocus;
			animation-duration: 0.4s;
			animation-fill-mode: both;
			color: black;
		}
		.bejelentkezes_gomb{
			width: 100%;
			box-sizing: border-box;
			border: 1px solid #37b057;
			background-color: #37b057;
			font-family: Open Sans;
			font-size: 90%;
			color: white;
			padding: 0.5vw;
			border-radius: 0.5em;
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
			font-family: Open Sans;
			font-size: 90%;
			color: white;
			padding: 0.5vw;
			text-align: center;
			border-radius: 0.5em;
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
		function elfelejtett(){
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
		<div id='bejelentkezes' class='bejelentkezes'>
		
		<center><img src='/img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='bejelentkezes_al'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Bejelentkezés</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Felhasználónév' name='bejelentkezes_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó' autocomplete="off" name='bejelentkezes_pw' />
				<div style='padding-top: 3%;'></div>
				<center><span style='font-family: Open Sans; cursor: pointer; font-size: 0.8em;' onClick='elfelejtett();'>Elfelejtett jelszó</span></center>
				<div style='padding-top: 3%;'></div>
				<input class='bejelentkezes_gomb' type='submit' value='Bejelentkezés' name='bejelentkezes_gomb' onclick="belepes_check()" />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='regisztracio_gomb' onClick='reg_gomb()'>Regisztráció</button>
			
		</div>
		</div>
		<div id='elfelejtett' class='elfelejtett'>
		
		<center><img src='/img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='elfelejtett_al'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Jelszó visszaállítás</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Email cím' name='elfelejtett_email' /><br>
				<div style='padding-top: 5%;'></div>
				<input class='bejelentkezes_gomb' type='submit' value='Email küldése' name='elfelejtett_gomb' onclick="belepes_check()" />
				<div style='padding-top: 2%;'></div>
			</form>
			<button class='regisztracio_gomb' onClick='elfelejtett_vissza()'>Vissza a bejelentkezéshez</button>
			
		</div>
		</div>
		<div id='regisztracio' class='regisztracio'>
		<center><img src='/img/munchify3.png' style='width: 250px; animation: float 6s ease-in-out infinite;'/></center>
		<div class='regisztracio_al'>
			<center><span style='text-align: center; font-family: Open Sans; font-size: 100%;'><b>Regisztráció</b></span></center><br>
			<form method='POST'>
				<input type='text' placeholder='Vezetéknév' name='regisztracio_vnev'  style='width: 50%;'/><input type='text' placeholder='Keresztnév' name='regisztracio_knev' style='width: 50%;'/><br>
				<div style='padding-top: 5%;'></div>
				<input type='text' placeholder='Felhasználónév' name='regisztracio_fnev' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='text' placeholder='Email Cím' onchange="return validate()" id="email" name='regisztracio_email' /><br>
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó' autocomplete="off" name='regisztracio_pw' />
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó ismét' autocomplete="off" name='regisztracio_pw_megint' />
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
	function sikeres($szoveg){
		echo "
		<div class='hiba' style='width: 25%;'>
			<div style='padding: 0.7em; background-color: #256b15; color: white; font-family: Open Sans; font-size: 1em; border-radius: 0.5em;'>
				<center><b>Siker!</b></center><hr style='color: white;'>$szoveg<hr style='color: white;'>
			</div>
		</div>
		";
	}
	if($_SESSION["database_hiba"]==1){
		header("Location: uzemenkivul"); //Ha nem működik valamelyik adatbázis akkor átirányítja a felhasználókat egy másik oldalra.
	}
	
	
	// BEJELENTKEZÉS KÓD
	
	
	if(isset($_POST["bejelentkezes_gomb"])){ //Bejelentkezés kezelése
		//megnézi hogy üresek-e a mezők
		$adatok_ok = 1;
	if (empty($_POST['bejelentkezes_fnev'])){
		hiba("Nem adtál meg felhasználónevet!");
		$adatok_ok = 0;
	}
	if (empty($_POST['bejelentkezes_pw'])){
		hiba("Nem adtál meg jelszót!");
		$adatok_ok = 0;
	}
	if($adatok_ok == 1){	
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
			
			if($jelszo==$talalatok[0][4]){
				
				function generateRandomString($length = 30) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[random_int(0, $charactersLength - 1)];
					}
					return $randomString;
				}
				$flag = True;
				
				while ($flag) {
					$session_id = generateRandomString();
					$sql = "SELECT id FROM munkamenetek WHERE id='$session_id'";
					$query = mysqli_query($userdb_conn, $sql);
					$id_talalat = mysqli_fetch_all($query);
					$_SESSION["session_id"] = $session_id;
					$_SESSION["felhasznalonev"] = $fnev;
					$veznev = $talalatok[0][2];
					$kernev = $talalatok[0][3];
					//$rang = $talalatok[0][6];
					//$_SESSION["rank"] = $rang;
					//$_SESSION["nev"] = $kernev;
					$_SESSION["nev"] = $kernev;
					$most = date("Y-m-d H:i:s");
					
					if(count($id_talalat)==0){
						$ip = $_SERVER['REMOTE_ADDR'];
						$sql = "INSERT INTO `munkamenetek`(`id`, `felhasznalo`, `mikor`, `ip`) VALUES ('$session_id','$fnev','$most','$ip')";
						mysqli_query($userdb_conn, $sql);
						echo "sikerült";
						header( "Location: h" );
						$flag=False;
					}
					else{
						$flag=True;
					}
				}
					
				
			}
			else{
				hiba("Hibás felhasználónév vagy jelszó!");
			}
		}
	}
}
	
	
	//REGISZTRÁCIÓ KÓD
	
	
	if(isset($_POST["regisztracio_gomb"])){
		$ok = 0;
		$jelszokodolo_str = "projektmunka2024";
		function generateRandomString($length = 30) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[random_int(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		$emailid = generateRandomString();
		$fnev = $_POST["regisztracio_fnev"];
		$email = $_POST["regisztracio_email"];
		$veznev = $_POST["regisztracio_vnev"];
		$kernev = $_POST["regisztracio_knev"];
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
	if (empty($_POST['regisztracio_knev']) or empty($_POST['regisztracio_vnev']))
	{
	hiba("Nem adtál meg Vezetéknevet / Keresztnevet.");
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
			hiba("A felhasználónév foglalt!");
		}
		else{
			$sql = "SELECT email FROM users WHERE email='$email'"; // Lekéri az email címet az adatbázisból, hátha létezik már. Ha igen, ezt kezeli.
			$query = mysqli_query($userdb_conn,$sql);
			$talalatok = mysqli_fetch_all($query);
			
			if(count($talalatok)!=0){
				hiba("Az email cím már foglalt!");
			}
			else{
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){  //Leellenőrzi hogy az email helyes-e.
						if($jelszo==$jelszomegint){		//Lellenőrzi itt, hogy a jelszavak megegyeznek-e.
							$most = date("Y-m-d H:i:s");
							$sql = "INSERT INTO `regisztracio_email`(`id`, `felhasznalonev`, `jelszo`, `vezeteknev`, `keresztnev`, `email`, `mikor`) VALUES ('$emailid', '$fnev','$jelszo','$veznev', '$kernev', '$email', '$most')";
							mysqli_query($userdb_conn,$sql);
							
									$mail=new PHPMailer(true);

									$mail->isSMTP();
									$mail->Host='smtp.gmail.com';
									$mail->SMTPAuth=true;
									$mail->Username='munchify.system@gmail.com';
									$mail->Password='gshx ukct qpft jspf ';
									$mail->SMTPSecure='ssl';
									$mail->Port = 465;

									$mail->setFrom('munchify.system@gmail.com');
									$mail->addAddress($email);
									$mail->isHTML(true);
									$mail->Subject="Munchify | Regisztracio";
									$url = $_SERVER['HTTP_HOST'];
									$mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia, $kernev!<br><br>A Munchify regisztrációd sikeres!<br>Az alábbi linken tudod jóváhagyni az email címedet!<br><br>http://$url/email_v?id=$emailid<br><br><b>A LINK 24 ÓRÁIG ÉRVÉNYES!<br>A LINKET CSAK EGYSZER LEHET MEGNYITNI!</b><br><br>Munchify</span></div>";
									$mail->send();
							
							sikeres("Sikeres regisztráció! Hitelesítsd az email címed, az emailben kiküldött linken keresztül!");
						}
						else{
							hiba("A két jelszó nem egyezik meg!");
						}
					}
					else{
					hiba("Nem helyes a megadott Email cím!");
				}
				}
				
			}
		}
	}
	
	
	// ELFELEJTETT JELSZÓ GOMB
	
	
	if(isset($_POST["elfelejtett_gomb"])){
		$email = $_POST["elfelejtett_email"];
		
		$sql = "SELECT felhasznalonev,email FROM users WHERE email='$email'";
		$query = mysqli_query($userdb_conn, $sql);
		$ellenorzes = mysqli_fetch_all($query);
		
		if(count($ellenorzes)!=0){
			function generateRandomString($length = 30) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[random_int(0, $charactersLength - 1)];
				}
				return $randomString;
			}
							
			$jelszoid = generateRandomString();
			
			$jelszo_nev = $ellenorzes[0][0];
			$most = date("Y-m-d H:i:s");
			$sql = "INSERT INTO `elfelejtett_jelszo`(`id`, `felhasznalonev`, `email`, `mikor`, `kesz`) VALUES ('$jelszoid','$jelszo_nev','$email','$most','0')";
			mysqli_query($userdb_conn,$sql);
			
			$mail=new PHPMailer(true);

			$mail->isSMTP();
			$mail->Host='smtp.gmail.com';
			$mail->SMTPAuth=true;
			$mail->Username='munchify.system@gmail.com';
			$mail->Password='gshx ukct qpft jspf ';
			$mail->SMTPSecure='ssl';
			$mail->Port = 465;

			$mail->setFrom('munchify.system@gmail.com');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject="Munchify | Elfelejtett jelszo";
			$url = $_SERVER['HTTP_HOST'];
			$mail->Body="<div style='padding-left: 10%; padding-right: 10%;'><span style='font-family: Verdana; font-size: 15px;'><center><img src='http://$url/img/munchify3.png' style='width: 20%;'/></center><hr>Szia!<br><br>Az elfelejtett Munchify jelszavad megváltoztatásához kattints az alábbi linkre!<br><br>http://$url/jelszo_v?id=$jelszoid<br><br><b>A LINK 24 ÓRÁIG ÉRVÉNYES!<br>A LINKET CSAK EGYSZER LEHET MEGNYITNI!</b><br><br>Munchify</span></div>";
			$mail->send();
			
			
		}
		
		sikeres("Amennyiben létezik ilyen email címmel fiók, elküldtük a megerősítő linket az email címre!");
		
	}
	
?>
	</body>
</html>