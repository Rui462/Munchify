<?php
SESSION_START();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munchify</title>
</head>
<body>  
    <?php
        echo $_SESSION["felhasznalonev"];
		echo "<br>";
		echo $_SESSION["email"];
		echo "<br>";
		echo $_SESSION["userid"];
		echo "<br>";
		
    ?>
</body>
</html>