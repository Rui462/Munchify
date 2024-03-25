<?php
	SESSION_START();
	if(isset($_SESSION["felhasznalonev"]) and isset($_SESSION["email"]) and isset($_SESSION["userid"])){
		$felhasznalonev = $_SESSION["felhasznalonev"];
		$email = $_SESSION["email"];
		$userid = $_SESSION["userid"];
	}
	else{
		header("Location: http://www.munchify.nhely.hu/");
	}
?>