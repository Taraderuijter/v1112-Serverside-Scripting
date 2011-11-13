<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Overzicht van GET en POST vars</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<div id="wrapper">

		<a href="?getTest=wauw het werkt echt!!">Verstuur een variabele via GET</a><br /><br />
		
		<form action="showVars.php" method="post">
			<label for="postTest">of via POST</label>
				<input type="text" name="postTest" id="postTest" />
			<label for="verstuurKnop"></label>
				<input type="submit" name="verstuurKnop" id="verstuurKnop" value="Stuur!" />
		</form>
		<br /><br />
		<br /><br />
<?php

# Toon de inhoud van de volledige POST en GET array
echo '<pre style="clear: both;">';
echo "Overzicht van ingestelde GET variabelen: \r\n\$_GET = ";
print_r($_GET);
echo "\r\n\r\nOverzicht van ingestelde POST variabelen: \r\n\$_POST = ";
print_r($_POST);
echo '</pre>';

?>
	</div>
</body>
</html>