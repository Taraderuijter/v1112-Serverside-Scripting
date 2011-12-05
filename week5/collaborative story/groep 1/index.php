<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../../inc/config.inc.php');
require('../../inc/functions.inc.php');
require('../../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Collaborative story');

# begin het verhaal
$verhaal = "Er was eens een pindarotsje. ";
$verhaal = preg_replace('/pindarotsje/', 'kanibaal', $verhaal);
$verhaal .= " Deze kanibaal woonde op een onbewoond eiland. ";

# Carolien
$verhaal .= " wat hij alleen niet wist, ";

#Bram
$verhaal = ucwords($verhaal);
$verhaal .= " was dat hij niet alleen was....";

# Titus
$verhaal = preg_replace('/niet/', '', $verhaal);
$verhaal .= "dus Bert, want zo heette de kanibaal, was heel verdrietig";

# Carolien
$verhaal .= str_repeat (" hij huilde,", 6);

#JP
$verhaal = preg_replace('/kanibaal/', 'Kannibaal', $verhaal);
$verhaal = preg_replace('/Kanibaal/', 'Kannibaal', $verhaal);
$verhaal .= " om zijn moeder";

#ju5tu5
$verhaal = preg_replace('/huilde/', 'lachte', $verhaal);
$verhaal .= ". Deze kannibaal kickt op alleen zijn. ";

# Martijn
$verhaal = preg_replace('/alleen zijn/', 'rare namen', $verhaal);
$verhaal .= "Zijn vader heette Esteban";

#Joep
$verhaal .= strrev ('leetsakdnaz nee edwuob jih nE ');

# Carolien
$verhaal = wordwrap ($verhaal , 22, "<br/>\n");

# Stuur de output naar de browser
echo $verhaal;

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>