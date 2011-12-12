<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('./inc/config.inc.php');
require('./inc/functions.inc.php');
require('./inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Upload formulier');

echo '
	<div id="uploadForm">
	<form action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data">
		<label for="plaatje">Plaatje:</label>
			<input type="file" name="plaatje" id="plaatje" /><br />
		<label for="submit"></label>
			<input type="submit" name="submit" id="submit" value="Verstuur email!" /><br />
	</form>
	</div>
';

# Controleer of het formulier verstuurd is
if(isset($_POST['submit']) && isset($_FILES['plaatje']) && $_FILES['plaatje']['type']=="image/jpeg"){
	
	move_uploaded_file($_FILES['plaatje']['tmp_name'], './upload/'.mktime().''.$_FILES['plaatje']['name']);

}elseif(isset($_FILES['plaatje']) && $_FILES['plaatje']['type']!="image/jpeg"){
	
	echo '<span id="warning">Het bestand is van een onjuist type, er mogen enkel jpeg bestanden ge&uuml;ploaded worden.</span>';
	
}

# Lees de inhoud van de map uit
$bestandenRij = scandir('./upload');
$bestandenRij = array_reverse($bestandenRij);

# Loop de bestandenrij af
foreach($bestandenRij as $bestand){
	# Toon alle bestanden anders dan . (localdir) en .. (magic escalator)
	if($bestand != '.' && $bestand != '..'){
		echo "\t<img src=\"./upload/".$bestand."\" width=\"200\"/><br />\r\n";
	}
}

#/* debug code *delete on live server*
echo '<pre>';
print_r($_POST);
echo '</pre><pre>';
print_r($_FILES);
echo '</pre>';
# */

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>