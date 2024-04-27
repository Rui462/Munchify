<?php
	include 'sql_conn/conn_userdat.php';
	if((isset($_SESSION["session_id"])) or (isset($_SESSION["felhasznalonev"]))){
		header("Location: h");
	}
	else{
		if(empty($_GET["id"])){
			header("Location: index");
		}
		else{
			$id = $_GET["id"];
		}
	}
	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	<title>Munchify | Megerősítés!</title>
	</head>
	<body style='background-color: #3096d1;'>
		<?php
			$sql = "SELECT * FROM regisztracio_email WHERE id = '$id'";
			$query = mysqli_query($userdb_conn, $sql);
			$fetch = mysqli_fetch_all($query);
			
			if(count($fetch)!=0){
				$most = strtotime(date("Y-m-d H:i:s"));
				$keszult = strtotime($fetch[0][6]);
				if($most-86400>=$keszult){
					echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; font-family: Open Sans; font-size: 1em; padding: 1em;'>
					<center><img src='/img/munchify3.png' style='width: 20%;'></img>
					<hr>
					<b>A regisztrációs link lejárt.</b>
					</center>
					</div>";
				}
				else{
					$kesz = $fetch[0][7];
					if($kesz==1){
						echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; font-family: Open Sans; font-size: 1em; padding: 1em;'>
					<center><img src='/img/munchify3.png' style='width: 20%;'></img>
					<hr>
					<b>A regisztrációs link lejárt.</b>
					</center>
					</div>";
					}
					else{
						$sql = "UPDATE `regisztracio_email` SET `kesz`='1' WHERE id='$id'";
						mysqli_query($userdb_conn, $sql);
						
						$felhasznalonev = $fetch[0][1];
						$jelszo = $fetch[0][2];
						$veznev = $fetch[0][3];
						$kernev = $fetch[0][4];
						$email = $fetch[0][5];
						
						$sql = "INSERT INTO `users`(`felhasznalonev`, `vezeteknev`, `keresztnev`, `jelszo`, `email`) VALUES ('$felhasznalonev','$veznev','$kernev','$jelszo','$email')";
						mysqli_query($userdb_conn,$sql);
						
						echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; font-family: Open Sans; font-size: 1em; padding: 1em;'>
					<center><img src='/img/munchify3.png' style='width: 20%;'></img>
					<hr>
					<b>A regisztráció sikeres!</b><br>Visszairányítás a bejelentkezőfelületre.
					</center>
					</div>";
					header( "Refresh:5; url=index");
					}
				}
			}
			else{
				echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; font-family: Open Sans; font-size: 1em; padding: 1em;'>
					<center><img src='/img/munchify3.png' style='width: 20%;'></img>
					<hr>
					<b>A regisztrációs link nem érvényes!</b>
					</center>
					</div>";
			}
		?>
	</body>
</html>