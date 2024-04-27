<?php
	SESSION_START();
	OB_START();
	include_once 'header.php';
	if((isset($_SESSION["session_id"])) or (isset($_SESSION["felhasznalonev"]))){
		$felhasznalonev = $_SESSION["felhasznalonev"];
	}
	else{
		header("Location: index");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/x-icon" href="/img/munchify_m.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Protest+Revolution">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Permanent+Marker">
<title>Munchify | Irányítópult</title>
</head>
<style>
	html, body {
	  height: 100%;
	  margin: 0;
	}
	.wrapper {
	  padding-top: 3.5em;
	  min-height: 100%;
	  margin-bottom: -50px;
	}
	.footer {
	  width: 100%;
	  padding: 1em;
	  background-color: #e6e6e6;
	  box-sizing: border-box;
	}
	.felsokep{
		position: relative; 
		justify-content: center;
		padding-top: 4em;
		padding-bottom: 4em;
		
	}
	.felsokep::after{
		content:'';
		position: absolute;
		top:0px;
		background: url('img/kajakep.png');
		left: 0px;
		width:100%;
		height:100%;
		z-index:-1;
	}
	.rendelekgomb{
		font-family: Open Sans;
		font-size: 0.3em;
		color: white;
		background-color: #227533;
		padding-left: 1em;
		padding-right: 1em;
		padding-top: 0.5em;
		padding-bottom: 0.5em;
		text-decoration: none;
		border-radius: 0.5em;
	}
	.rendelekgomb:hover{
		background-color: #195725;
	}
	.betoltes{
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: 1000;
		background-color: #162263;
	}
	@font-face {
	  font-family: naturebeauty;
	  src: url(naturebeauty.ttf);
	}
	.betoltes_logo{
		animation-name: betolteslogo;
		animation-duration: 3s;
		animation-iteration-count: infinite;
	}
	@keyframes betolteslogo{
		0%{opacity:1}
		40%{opacity:1}
		50%{opacity: 0.7}
		60%{opacity: 1;}
		100%{opacity: 1;}
	}
	@keyframes megjelen{
		0%{opacity: 0;}
		100%{opacity: 1;}
	}
	@keyframes fellapoz{
		0%{top:0%; opacity: 1; visibility: visible;}
		50%{top:0%;  opacity: 1; visibility: visible;}
		90%{top: -150%; opacity: 1; visibility: visible;}
		100%{top: -150%; opacity: 0; visibility: hidden;}
	}
</style>
<script>
	function logobetoltve(){
		document.getElementById("betoltologo").style.animationName = 'megjelen';
		document.getElementById("betoltologo").style.animationDuration = '0.5s';
		document.getElementById("betoltologo").style.animationFillMode = 'both';
	}
	
	function betolt(){
		document.getElementById("betoltes").style.animationName = 'fellapoz';
	   document.getElementById("betoltes").style.animationDuration = '3s';
	   document.getElementById("betoltes").style.animationFillMode = 'both';
	}
	
	function load(src) {
		return new Promise((resolve, reject) => {
			const image = new Image();
			image.addEventListener('load', resolve);
			image.addEventListener('error', reject);
			image.src = src;
		});
	}

	const image = 'img/kajakep.jpg';
	load(image).then(() => {
	   betolt();
	});

</script>
<body style='overflow-y: hidden;' id='body'>	
	<div id='betoltes' class='betoltes'>
	<div id='betoltologo' style='opacity: 0; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
		<center><img onload='logobetoltve()' class='betoltes_logo' src='img/munchify3.png' style='width: 25%;'></img></center>
	</div>
	</div>
	<div class="wrapper">
	<div id='felsokep' class='felsokep'>
		<center><span style='font-family: Protest Revolution; font-size: 4em; color: white;'>
		Megéheztél?<br>Rendelj a Munchify-ról!<br><a href='rendeles.php' class='rendelekgomb'>Rendelek!</a>
		</span></center>
	</div>
    <div class="push" style='padding: 2em;'></div>
  </div>
  <footer class="footer">asd</footer>
</body>
</html>