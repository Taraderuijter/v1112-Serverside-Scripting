<?php

# Geef de HTML openen code weer
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Email formulier</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<div id="wrapper">
';

# Als het formulier verstuurd is bestaat de variabele submit in de POST array
if(isset($_POST['submit'])) {
	# Laad de via het formulier verstuurde waarden over in bruikbare variabelen
	$subject = $_POST['naam'].' stuurde een mail via PHP!';
	$email = $_POST['email'];
	$bericht = wordwrap($_POST['bericht'], 70);
	
	# Probeer de email te versturen, stop de return waarde in een variabele
	$versturen_gelukt = mail($email, $subject, $bericht);
	
	# Controleer de variabele, geef een melding aan de gebruiker over het al dan niet slagen van het versturen
	if($versturen_gelukt) {
		echo '		<p>De email is verstuurd! <a href="'.$_SERVER['PHP_SELF'].'">Nog een mail sturen</a>.</p>'."\r\n";
	} else {
		echo '		<p>Er is iets mis gegaan, <a href="'.$_SERVER['PHP_SELF'].'">probeer het opnieuw</a>.</p>'."\r\n";
	}

# Het formulier is nog niet verstuurd, laat het formulier zien
} else {
	# Geef de HTML voor het formulier weer, geef de naam van dit script door als doelbestand
	echo '
	<form action="'.$_SERVER['PHP_SELF'].'" method="POST" type="text/plain">

		<label for="name">Naam</label>
			<input type="naam" name="naam" id="naam" />
			
		<label for="email">Email</label>
			<input type="email" name="email" id="email" />
			
		<label for="bericht">Bericht</label>
			<textarea name="bericht" id="bericht"></textarea>
			
		<label for="submit"></label>
			<input type="submit" name="submit" id="submit" value="Stuur bericht!" />
			
	</form>
	';
}

# Geef de HTML voor het afsluiten van de pagina
echo '
	</div>

</body>
</html>
';

?>