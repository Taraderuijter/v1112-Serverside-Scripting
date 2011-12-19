<?php
# include de benodigde bestanden (require geeft fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('User Tracking met Sessies');

# houd het klikpad van de gebruiker bij
saveClickPath();


# Toon de inhoud van de sessie array
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>
