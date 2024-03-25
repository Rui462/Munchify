<?php
	SESSION_START();
	if(isset($_SESSION["felhasznalonev"]) and isset($_SESSION["email"]) and isset($_SESSION["userid"])){
		$felhasznalonev = $_SESSION["felhasznalonev"];
		$email = $_SESSION["email"];
		$userid = $_SESSION["userid"];
		$jogosultsag = $_SESSION["jogosultsag"];
	}
	else{
		header("Location: index");
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="icon" type="image/x-icon" href="/ikon/munchify_m.ico">
	</head>
</html>