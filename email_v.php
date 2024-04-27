<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <title>Munchify | Ellenőrzés</title>
</head>
<body style='background-color: #3096d1;'>
<input hidden id='emailid' value='<?php echo $_GET["id"];?>' />
<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; font-family: Open Sans; font-size: 1em; padding: 1em; border-radius: 1em;'>
	<center><img src='img/munchify3.png' style='width: 20%;'></img>
		<hr>
			<span id='email_ellenorzes_info' style='font-family: Open Sans;'></span>
	</center>
</div>
</body>
</html>
<script src="./js/email_ellenorzes.js"></script>