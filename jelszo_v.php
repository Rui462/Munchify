<?php
    if(empty($_GET["id"])){
        header("Location: index.php");
    }
    else{
        $id=$_GET["id"];
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Munchify | Jelszó változtatás</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="./css/jelszo_v.css">
	</head>
<body>
    <div class="ertesites_container" id="ertesites_container"></div>

    <input hidden id='jid' value='<?php echo $id; ?>'></input>
	<div id='jelszovaltoztatas' class='jelszovaltoztatas'>
			
		</div>
</body>
</html>
<script src='./js/jelszo_valtoztatas.js'></script>