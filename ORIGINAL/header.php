<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/x-icon" href="/img/munchify_m.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
</head>
<style>
    body {
        margin: 0;
    }

    .header {
        background-color: #3a3a99;
        color: white;
        font-family: Open Sans;
        font-size: 1em;
        display: flex;
    }

    .header a {
        display: inline-block;
        color: white;
        text-decoration: none;
        padding-bottom: 0.7em;
		padding-left: 1em;
		padding-right: 1em;
		padding-top: 1em;
    }

    .headercontainer {
        position: fixed;
        z-index: 999;
        width: 100%;
    }

    .header a:hover {
        background-color: #2c2c73;
    }

    .header .fiok {
        margin-left: auto;
    }
	.fiokinfok{
		float: right; 
		display: inline-block; 
		padding-top: 1em; 
		padding-bottom: 1em;
		padding-right: 1.4em;
		padding-left: 1.4em;
		background-color: white;
	}
	.fiokinfok a{
		text-decoration: none; 
		color: black; 
		font-family: Open Sans;
		font-size: 1em;
	}
</style>
<body>
<div class='headercontainer'>
    <div class='header'>
        <a href='h'><img style='width: 2em; margin-top: -6px;' src='/img/munchify_m.png'/></a>
        <a class='rendelesgomb' href='https://www.facebook.com'>Rendelés</a>
        <a href='https://www.kurvaanyad.com'>Korábbi rendelések</a>
        <a href='kajak'>Ételek listázása(ideiglenes)</a>
        <a href='feltolt'>Ételek feltöltése(ideiglenes)</a>
        <a class='fiok' onmouseover='fiokinfok_on()'>Fiók</a>
    </div>
	<div onmouseover='fiokinfok_on()' style='position: relative; visibility: hidden; opacity: 0;z-index: 1000;'id='finfok' class='fiokinfok'>
			<div>
				<span style='font-family: Open Sans; font-size: 1em;'>Üdvözlünk, <?php echo $_SESSION["nev"]; ?>!</span><br><span style='font-family: Open Sans; font-size: 0.8em;'>Bejelentkezve mint: </a> <?php echo $_SESSION["felhasznalonev"]; ?></span>
			</div>
			<hr>
			<table style='width: 100%;  border-collapse: collapse; display: inline;'>
			<tr style='width: 100%;'>
				<td style='display: inline; width: 50%; border-right: solid 1px black; padding-right: 1em;'><a href='elozmenyek' style='font-family: Open Sans; font-size: 1em;'>Korábbi rendelések</a></td> 
				<td style='display: inline; width: 50%; padding-left: 1em;'><a href='https://www.google.com' style='font-family: Open Sans; font-size: 1em;'>Fiókbeállítások</a></td>
			</tr>
			</table>
			<hr>
			<div style='display: inline-block; width: 100%;'><div style='padding-bottom: 0.3em;'></div>
				<a style='color: white; background-color: #962927; font-family: Open Sans; font-size: 1em; border-radius: 0.5em; padding: 0.4em;' href='logout'>Kijelentkezés</a>
			</div>
	</div>
	<div style='position: fixed; width: 100%; height: 100%; z-index: 997; visibility: hidden; opacity: 0;' onmouseover='fiokinfok_off()' id='fiok_infok'>
	</div>
</div>
</body>
</html>
<script>
	function fiokinfok_on(){
		document.getElementById("fiok_infok").style.visibility = 'visible';
		document.getElementById("fiok_infok").style.opacity = '1';
		document.getElementById("finfok").style.visibility = 'visible';
		document.getElementById("finfok").style.opacity = '1';
	}
	function fiokinfok_off(){
		document.getElementById("fiok_infok").style.visibility = 'hidden';
		document.getElementById("fiok_infok").style.opacity = '0';
		document.getElementById("finfok").style.visibility = 'hidden';
		document.getElementById("finfok").style.opacity = '0';
	}
</script>