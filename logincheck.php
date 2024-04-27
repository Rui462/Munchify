<?php
	SESSION_START();
	if(isset($_SESSION["felhasznalonev"]) and isset($_SESSION["email"]) and isset($_SESSION["userid"])){
		$felhasznalonev = $_SESSION["felhasznalonev"];
		$email = $_SESSION["email"];
		$userid = $_SESSION["userid"];
		$jogosultsag = $_SESSION["jogosultsag"];
		$conn = mysqli_connect("mysql.rackhost.hu", "c64772munchify", "MunchifyProject24", "c64772munchifydb");

		$sql = "SELECT ban FROM users WHERE id='$userid'";
		$query = mysqli_query($conn, $sql);
		$banallapot = mysqli_Fetch_All($query);

		if($banallapot[0][0]=='1'){
			echo "<script>alert('Probléma lépett fel! Jelentkezz be újra!');</script>";
			header("Location: logout");
		}
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