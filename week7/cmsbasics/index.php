<?php
# include de benodigde bestanden (require geeft fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/template.inc.php');
require('../inc/functions.inc.php');

//authenticeer();
//saveClickPath();

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('CMS Basics');

# Maak connectie met de database op de MySQLI manier
$link = dbConnect();

# Er is een GET variabele actie waar de waarde 'toevoegen' in staat
if(isset($_GET['actie']) && $_GET['actie'] == "toevoegen"){
	# Toon het formulier om een nieuw artikel toe te voegen
	echo '
		<div id="form">
			<form action="'.$_SERVER['PHP_SELF'].'" method="POST" type="text/plain">
				<label for="titel">Titel</label>
				<input type="text" name="titel" id="titel" />
				
				<label for="inhoud">Inhoud</label>
				<textarea name="inhoud" id="inhoud"></textarea>
			
				<label for="submit"></label>
				<input type="submit" name="submit" id="submit" value="Voeg toe" />
			</form>
		</div>
	';
}

# Er is een POST variabele 'submit' met de waarde 'Voeg toe', dit betekend dat het formulier is verstuurd
if(isset($_POST['submit']) && $_POST['submit'] == "Voeg toe"){
	# Voeg de via POST verstuurde gegevens samen met een query en voer deze uit
	$link->query("INSERT INTO artikel (titel, inhoud) VALUES ('".$_POST['titel']."', '".$_POST['inhoud']."');");
}

# Er is een GET variabele actie waar de waarde 'aanpassen' in staat
if(isset($_GET['actie']) && $_GET['actie'] == "aanpassen"){
	# Selecteer de benodigde gegevens uit de database, let op, dit is een onveilige query
	$result = $link->query('SELECT * FROM artikel WHERE artikelID='.$_GET['artikelID'].';');
	$record = $result->fetch_array();
	
	# Toon het formulier om een artikel aan te passen
	echo '
		<div id="form">
			<form action="'.$_SERVER['PHP_SELF'].'" method="POST" type="text/plain">
				<input type="hidden" name="artikelID" id="artikelID" value="'.$record['artikelID'].'" />
				
				<label for="titel">Titel</label>
				<input type="text" name="titel" id="titel" value="'.$record['titel'].'" />
				
				<label for="inhoud">Inhoud</label>
				<textarea name="inhoud" id="inhoud">'.$record['inhoud'].'</textarea>
			
				<label for="submit"></label>
				<input type="submit" name="submit" id="submit" value="Pas aan" />
			</form>
		</div>
	';

}

# Er is een POST variabele 'submit' met de waarde 'Pas aan', dit betekend dat het formulier is verstuurd
if(isset($_POST['submit']) && $_POST['submit'] == "Pas aan"){
	# Pas het artikel aan met behulp van het meegestuurde ID, let op, dit is een onveilige query
	$link->query("UPDATE artikel SET titel = '".$_POST['titel']."', inhoud = '".$_POST['inhoud']."' WHERE artikelID=".$_POST['artikelID'].";");	
}
	
# Er is een GET variabele actie waar de waarde 'verwijderen' in staat
if(isset($_GET['actie']) && $_GET['actie'] == "verwijderen"){
	# Verwijder het artikel met behulp van het meegestuurde ID, let op, dit is een onveilige query
	$link->query('DELETE FROM artikel WHERE artikelID='.$_GET['artikelID'].';');
}

# Geef de link om een artikel toe te voegen
echo '<div style="clear: both;"><a href="?actie=toevoegen">Toevoegen</a></div>';

# Selecteer alles uit de tabel artikel en loop door de records heen
$result = $link->query('SELECT * FROM artikel');
while($record = $result->fetch_array()){
	# Toon voor elk artikel een HTML opgemaakte versie van dat artikel, voeg links toe voor aanpassen en verwijderen
	echo '
		<div class="artikel" style="clear: both;">
			<h1>'.$record['titel'].'</h1>
			<p>'.$record['inhoud'].'</p>
			<a href="?actie=aanpassen&artikelID='.$record['artikelID'].'">Aanpassen</a>
			<a href="?actie=verwijderen&artikelID='.$record['artikelID'].'">Verwijderen</a>
		</div>
	';	
}

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>