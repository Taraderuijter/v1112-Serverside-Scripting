<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Leeftijd uitrekenen');

# Stel je geboortedatum in
$geboorteDatum = strtotime('26 November 2011 16:06');

echo $geboorteDatum." ";

# geef de geboortedatum weer
echo 'Je bent geboren op '.date('l d/m/Y', $geboorteDatum).' <br />';

# Kijk hoe laat de zon op ging op je geboortedag
echo 'Op jouw verjaardag ging de zon op om '.date_sunrise($geboorteDatum).' uur, en onder om '.date_sunset($geboorteDatum).' uur<br />';

# Bereken hoe lang geleden je geboren bent
$verschil = diff($geboorteDatum);
echo 'Je bent '.$verschil['year'].' jaar, '.$verschil['month'].' maanden, '.$verschil['day'].' dagen, '.$verschil['hour'].' uur, '.$verschil['min'].' minuten en '.$verschil['sec'].' seconden oud.';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>