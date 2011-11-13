<?php

# include de benodigde bestanden
require('inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Mail-form-hijacking');

# Als het formulier verstuurd is bestaat de variabele submit in de POST array


if(isset($_POST['submit']) && !preg_match( "/[\r\n]/", $_POST['email'] ) ){
	
	# Laad de via het formulier verstuurde waarden over in bruikbare variabelen
	$subject = $_POST['naam'].' stuurde een mail via PHP!';
	$bericht = wordwrap($_POST['bericht'], 70);
	$headers = 'From: '.$_POST['email']; # dit is bewust onveilig, kwetsbaar voor een injection attack!
	
	# Probeer de email te versturen, stop de return waarde in een variabele
	$versturen_gelukt = mail('j.p.sturkenboom@hva.nl', $subject, $bericht, $headers);
	
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

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();

?>