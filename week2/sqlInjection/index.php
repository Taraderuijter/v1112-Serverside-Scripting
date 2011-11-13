<?php

# include de benodigde bestanden (require geeft een fatale fout als het niet lukt)
require('inc/config.inc.php');
require('inc/functions.inc.php');
require('inc/template.inc.php');

# DON'T EVER USE THIS IN PRODUCTION, UNDERMINES SAFE MODE!!
foreach($_POST as $key=>$value){ $_POST[$key] = stripslashes($value); }
# /DON'T EVER USE THIS IN PRODUCTION, UNDERMINES SAFE MODE!!

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Script Injection');

# Geef een formulier weer om teksten toe te voegen
echo '
	<form action="'.$_SERVER['PHP_SELF'].'" method="POST" type="text/plain">
			<label for="username">Login:</label>
				<input type="text" name="username" id="username" />
			<label for="password">Password:</label>
				<input type="text" name="password" id="password" />
			<label for="submit"></label>
				<input type="submit" name="submit" id="submit" value="Inloggen" />
	</form><br />
';

# Maak connectie met de database op de MySQLI manier
$link = dbConnect();

# Als het formulier verstuurd is
if(isset($_POST['submit'])){
	# Zoek in de database
	# Beveiliging: $username = mysql_real_escape_string($_POST['username']);
	# Beveiliging: $password = mysql_real_escape_string($_POST['password']);
	# Beveiliging: $query = "SELECT * FROM gebruikers WHERE username='".$username."' AND password=MD5('".$password."');";
	$query = "SELECT * FROM gebruikers WHERE username='".$_POST['username']."' AND password=MD5('".$_POST['password']."');";
	$result = $link->query($query);
	echo '<div class="webtekst" style="clear: both; color: blue;">'.$query.'</div><br />';
	
	if ($result->num_rows > 0) {
		echo '
			<div class="webtekst" style="clear: both; color: red;">
				<p>Geheime informatie die enkel getoond mag worden na inloggen!</p>
				<p>Sed posuere consectetur est at lobortis. Etiam porta sem malesuada magna mollis euismod.
				Nulla vitae elit libero, a pharetra augue. Etiam porta sem malesuada magna mollis euismod.</p>
				
				<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa
				justo sit amet risus. Vestibulum id ligula porta felis euismod semper. Vestibulum id ligula porta
				felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec sed odio dui.
				Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
			</div>
		';
	}
} 

echo '
	<div class="webtekst" style="clear: both">
		<p>Algemene informatie die iedereen mag zien!</p>
	</div>
';

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();

?>