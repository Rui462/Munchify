<?php
	SESSION_START();
	OB_START();
?>
<?php
	$dbhost = '88.132.223.56';
	$dbuser = 'Frankfurt';
	$dbpass = 'Frankfurt123';
	$dbbase = 'munchify_userdat';
	
	try{
		$userdb_conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbbase); //Megpróbál csatlakozni a szerverhez
		$userdb_conn -> set_charset('utf8');
		$_SESSION["database_hiba"] = 0;
	}
	catch (mysqli_sql_exception $err){  //Ha nem sikerül csatlakozni a szerverhez akkor bedobja Session változóba a hibát, aztán létrehozza a log filet a hibáról a 'log' mappába.
		$_SESSION["database_hiba"] = 1;
		$most = date("Y-m-d-H-i-s");
		$nev = "userdat-dberr-$most.txt";
		$file_e = fopen($_SERVER['DOCUMENT_ROOT'] . "munchify/log/$nev","w+");
		fwrite($file_e, $err);
		fclose($file_e);
		header("Location: uzemenkivul.php");
	}
	
?>