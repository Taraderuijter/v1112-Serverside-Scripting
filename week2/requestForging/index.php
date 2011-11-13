<?php

# THIS IS A STUPID WAY TO INCLUDE FILES, DO NOT USE IN PRODUCTION
require('passwords.php');
require('inc/config.inc.php');
require('inc/functions.inc.php');
require('inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Request forging');

# geef een superbasic menu weer
echo '
	<div id="menu">
		<ul>
			<li><a href="index.php?page=eentekst.php">Een tekst</a></li>
		</ul>
	</div>
';

# als de GET variabele page bestaat
if(isset($_GET['page'])){
	# laad de variabele over in een bruikbare variabele
	$page = $_GET['page'];
	# lees de inhoud van de opgevraagde pagina
	$content = file_get_contents($page);
	# en geef de inhoud weer
	echo $content;
}

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
	
?>