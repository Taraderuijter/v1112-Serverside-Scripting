<?php
# Public: Open een actieve mysqli connectie op basis van constanten
#			welke opgegeven staan in een configuratiebestand, in dit
#			geval inc/config.inc.php
#		  Geef een foutmelding als het niet goed gaat
#
# Examples:
#
#	$link = dbConnect();
#	# => $link bevat een actieve mysqli connectie
#
# Returns: Een actieve mysqli connectie
function dbConnect(){
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	return $mysqli;
}

# Public: Sluit een actieve mysqli connectie
#
# $mysqli - Een actieve mysqli connectie
#
# Examples:
#
#	dbClose($link);
#	# => de connectie $link wordt afgesloten
function dbClose($mysqli){
	$mysqli->close();
}

# Public: Genereer een array met bezoekersgegevens
#
# Examples:
#
#	$array = getClientInfo();
#	# => $array bevat host, browser en datum sleutels met bijbehorende waarden
#
# Returns: Een array met bezoekersgegevens
function getClientInfo(){
	$clientArray = Array();
	$clientArray['host'] = isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:$_SERVER['REMOTE_ADDR']; 
	$clientArray['browser'] = $_SERVER['HTTP_USER_AGENT'];
	$clientArray['date'] = date("F jS Y, h:iA");
	return $clientArray;
}

# Public: Helpt bij de preventie van XSS aanvallen
# (Wicked Cool PHP #20)
#
# $string - De tekst die gecontroleerd moet worden
# $length - Optioneel, de maximale lengte van de tekst
#
# Examples:
#
#	transform_HTML('<evil>#script</evil>');
#	# => &lt;evil&gt;&#35;script&lt;/evil&gt;
#
#	transform_HTML('<evil>#script</evil>', 10);
#	# => &lt;evil&g
#
# Returns: Een veiligere versie van de opgegeven tekst
function transform_HTML($string, $length=null) {
	# Verwijder overbodige spaties aan begin en eind van de regel
	$string = trim($string);
	
	# Voorkom potentiele Unicode codec problemen
	$string = utf8_decode($string);
	
	# HTMLiseer HTML-specifieke karakters
	$string = htmlentities($string, ENT_NOQUOTES);
	$string = str_replace('#', "&#35;", $string);
	$string = str_replace('%', "&#37;", $string);
	
	$length = intval($length);
	if($length > 0) {
		$string = substr($string, 0, $length);
	}
	return $string;
}

?>