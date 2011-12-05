<?php
# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('inc/config.inc.php');
require('inc/functions.inc.php');
require('inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Script Injection');

# Maak connectie met de database op de MySQLI manier
$link = dbConnect();

# Als het formulier verstuurd is
if(isset($_POST['submit'])){
	
	# Maak een SQL statement klaar voor toevoegen
	$statement = $link->prepare('INSERT INTO webtekst (tekst) VALUES (?)');
	
	# Koppel de variabele $tekst aan het SQL toevoegen statement
	$statement->bind_param('s', $tekst);
	$tekst = transform_HTML($_POST['tekst']);
	
	# Voer het SQL statement uit en sluit het
	$statement->execute();
	$statement->close();
}

# Selecteer alle teksten en geef ze weer
$result = $link->query('SELECT * FROM webtekst');

while($record = $result->fetch_array()){
	echo '
		<div class="webtekst">
			'.$record['tekst'].'
		</div><hr />
	';	
}

# Geef een formulier weer om teksten toe te voegen
echo '
	<form action="'.$_SERVER['PHP_SELF'].'" method="POST" type="text/plain">
		<label for="tekst">Tekst</label>
			<textarea name="tekst" id="tekst"></textarea>
			
		<label for="submit"></label>
			<input type="submit" name="submit" id="submit" value="Stuur tekst!" />
	</form>
';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();

?>