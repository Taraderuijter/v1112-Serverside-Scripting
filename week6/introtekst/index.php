<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/functions.inc.php');
require('../inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Upload formulier');

# eerste zin: /(.*?[?.!])(.*)/
# aantal tekens, afbreken op woord: /^.{0,100}(?:.*?)\b/iu

$langeTekst = "Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula porta felis euismod semper. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.";

preg_match('/(.*?[?.!])(.*)/', $langeTekst, $resultaten);

echo $langeTekst."<br /><hr />";

echo $resultaten[1];

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>