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

# ju5tu5
$verhaal .= " Deze kannibaal woont op een eiland. ";

#Tom, Bas, Omar
$verhaal .= "Op het eiland woonde geen apen.";
$verhaal = preg_replace('/apen/', 'mensen', $verhaal);

#Sven

$verhaal.= "en daar vierden ze geen kerst";
$verhaal = preg_replace('/kerst/', 'sinterklaas', $verhaal);

#Evan en Peter
$verhaal.= ucfirst("die kannibaal sprak de taal ");
$verhaal.= ucfirst(strrev("duits"));

#Erik en Chris
$verhaal.= strtoupper(strrev(" Das ist toll "));

#dennis en jeroen
$verhaal.= "schreeuwde hij zonder te stoppen";
//$verhaal = preg_replace("/\s+/", '', $verhaal);
$verhaal = strtoupper($verhaal);

#jordy en stefan
$verhaal .= "`de kannibaal wordt in een paralelle dimensie gezogen, waar schreeuwen niet wordt getolereerd";
$verhaal = strtolower($verhaal);

#marielle en stephanie
$verhaal .="Hij was eigenwijs en schreeuwde in een put:";

$i=1;
while($i<=100)
{$verhaal .= 'echo ';
$i++;}

#Steffan en Pascal
$verhaal .="Zo schrijft hij in het Duits 'Ik hou van mensenvlees': ";
$verhaal .= str_shuffle("Ik hou van mensenvlees");

#ye jun , jonna, david

$verhaal .=" Deze kannibaal vindt edele delen het lekkerst en beschouwt ze als een delicatesse. ";
$verhaal = preg_replace ('/kannibaal/', 'Serversidescripting leraar', $verhaal);
$verhaal = preg_replace ('/woonde/', 'woonden', $verhaal);

$shuffled = str_shuffle ($verhaal);
# Stuur de output naar de browser
echo $verhaal;
echo $shuffled;
# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>