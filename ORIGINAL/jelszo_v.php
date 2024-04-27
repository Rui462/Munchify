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
	<head>
		<title>Munchify | Jelszó változtatás</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	</head>
	<style>
		html{
			overflow: hidden;
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
		input[type=password]{
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
		.jelszovaltoztatas{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 25%;
			box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
			background: rgba(255, 255, 255, 0.2);
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			color: white;
			padding: 1vw;
			border-radius: 1vw;
		}
		.oke_gomb{
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
		.oke_gomb:hover{
			background-color: #288240;
			border: 1px solid #288240;
			cursor: pointer;
		}
	</style>
<body>
	<div class='jelszovaltoztatas'>
			<center><span style='text-align: center;font-family: Open Sans; font-size: 100%;'><b>Jelszó változtatás</b></span></center><br>
			<form method='POST'>
				<input type='password' placeholder='Jelszó' autocomplete="off" name='bejelentkezes_pw' />
				<div style='padding-top: 5%;'></div>
				<input type='password' placeholder='Jelszó mégegyszer' autocomplete="off" name='bejelentkezes_pw' />
				<div style='padding-top: 5%;'></div>
				<input class='oke_gomb' type='submit' value='Jelszó megváltoztatása' name='bejelentkezes_gomb' onclick="belepes_check()" />
				<div style='padding-top: 2%;'></div>
			</form>
		</div>
</body>
</html>