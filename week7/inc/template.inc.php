<?php

# Public: Echo de HTML code voor het openen van de pagina
#
# $titel	- Een tekst die tussen de <title> en </title> tags wordt geplaatst
#
# Examples:
#
#	htmlOpenen('pagina titel');
#	# => geeft onderstaande html weer
function htmlOpenen($titel){
	# Geef de HTML openen code weer
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>'.$titel.'</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>	
	<div id="wrapper">
	';
}

# Public: Echo de HTML code voor het sluiten van de pagina
#
# Examples:
#
#	htmlSluiten();
#	# => geeft onderstaande html weer
function htmlSluiten(){
	# Geef de HTML voor het afsluiten van de pagina
	echo '
	</div>
</body>
</html>
	';
}

# Public: Echo de HTML code voor de login pagina
#
# $bericht	- Een bericht wat tussen <span class="error"> en </span> boven het formulier wordt geplaatst
#
# Examples:
#
#	loginFormulier();
#	# => geeft onderstaande html weer
function loginFormulier($bericht=null){
	# geef de HTML code voor het openen van de pagina weer
	htmlOpenen('Inloggen');
	
	
	# geef de HTML code voor het login formulier weer
	echo '
		<div id="login">
			'.( !empty($bericht) ? '<span class="error">'.$bericht.'</span>' : '' ).'
			<form action="'.$_SERVER['PHP_SELF'].'" method="post">
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" />
				
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" />
				
				<label for="login"></login>
				<input type="submit" name="login" id="login" value="Login" />
			</form>
		</div>
	';
	
	# geef de HTML code voor het sluiten van de pagina weer
	htmlSluiten();
} 


?>