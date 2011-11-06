<?php

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

if(isset($_POST['submit'])) {

	$subject = $_POST['naam'].' stuurde een mail via PHP!';
	$email = $_POST['email'];
	$bericht = wordwrap($_POST['bericht'], 70);
	
	$versturen_gelukt = mail($email, $subject, $bericht);
	
	if($versturen_gelukt) {
		echo '		<p>De email is verstuurd! <a href="'.$_SERVER['PHP_SELF'].'">Nog een mail sturen</a>.</p>'."\r\n";
	} else {
		echo '		<p>Er is iets mis gegaan, <a href="'.$_SERVER['PHP_SELF'].'">probeer het opnieuw</a>.</p>'."\r\n";
	}

} else {

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

echo '
	</div>

</body>
</html>
';

?>