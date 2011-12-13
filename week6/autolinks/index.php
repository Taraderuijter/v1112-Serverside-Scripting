<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Upload formulier');

$tekstMetLink = 'Leest vooral http://intra.iam.hva.nl omdat daarop berichten worden gepost omtrend het onderwijs.';

$aantalLinks = 'Kan de functie ook omgaan met een serie links? http://www.ju5tu5.nl http://www.stackoverflow.com http://www.reddit.com http://intra.iam.hva.nl';

#echo maak_hyperlinks($tekstMetLink);

echo maak_hyperlinks($aantalLinks);

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>