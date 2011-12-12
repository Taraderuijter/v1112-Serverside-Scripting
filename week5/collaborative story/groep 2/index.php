<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../../inc/config.inc.php');
require('../../inc/functions.inc.php');
require('../../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Collaborative story');

# begin het verhaal
$verhaal = "Er was eens een pindarotsje. ";
$verhaal = preg_replace('/pindarotsje/', 'kannibaal', $verhaal);
$verhaal .= "Deze kannibaal woonde op een eiland. ";

# Koen
$verhaal .="De kannibaal was geen echte kannibaal, want hij at liever " .str_rot13('tebragr ra sehvg.');

# Imro, Mark, Tim
$verhaal .= 'Hij vertelde mij:';
$verhaal .='"';
$verhaal .= str_repeat("Ik heb Alzheimer...", 12);
$verhaal .='."';

# ju5tu5
$verhaal = preg_replace('/Alzheimer/', 'gifkikkereczeem', $verhaal);
$verhaal .= " Daarna liet hij mij ";

#Robbert & Nick
$verhaal .= "Liet hij mij zijn postzegelverzameling zien. Best indrukwekkend.";
$verhaal = wordwrap($verhaal, 20, "<br />\n");




# Stuur de output naar de browser
echo $verhaal;

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>