<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Leeftijd uitrekenen');

# Stel de target datum in
$worldsEnd = strtotime('21 december 2012');

# Bereken hoe lang geleden je geboren bent
$verschil = diff($worldsEnd);
echo 'De wereld vergaat over '.$verschil['year'].' jaar, '.$verschil['month'].' maanden, '.$verschil['day'].' dagen, '.$verschil['hour'].' uur, '.$verschil['min'].' minuten en '.$verschil['sec'].' seconden.';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>