<?php
# include de benodigde bestanden (require geeft fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/template.inc.php');
require('../inc/functions.inc.php');

# dwing een login af
authenticatie();

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Informatie afschermen met een login');

echo '
<div>
	<h1>Deze info is zo geheim dat het pijn doet.. aaaaarrrgghg</h1>
	<p>Cras mattis consectetur purus sit amet fermentum. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
</div>
';
	
echo '<pre>Session-';
print_r($_SESSION);
echo '</pre>';
	
echo '<a href="'.$_SERVER['PHP_SELF'].'?logout=true">Uitloggen</a>';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>
