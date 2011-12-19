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

# Public: Berekend het verschil tussen twee data
#
# $start - De begindatum
# $end - Optioneel, de einddatum
#
# Examples:
#	
#	$datum1 = strtotime('26 November 2011 16:06');
#	$verschil = diff($datum1);
#	# => Een array met de verstreken tijd sinds het opgegeven moment
#
#	$datum1 = strtotime('20 November 1978 04:00');
#	$datum2 = strtotime('26 November 2011 16:06');
#	$verschil = diff($datum1, $datum2);
#	# => Een array met het verschil in tijd tussen de 2 momenten
#
# Returns: Een array met het verschil in 
function diff($start,$end = false) {
	# Controleer of $end is meegegeven
    if(!$end) {
		$end = time(); 
	}
    # Controleer of start en end wel numeriek zijn (om hacks te voorkomen)
	if(!is_numeric($start) || !is_numeric($end)) {
		return false;
	}
	
	# Converteer $start en $end naar het gewenste formaat
    $start	= date('Y-m-d H:i:s',$start);
    $end	= date('Y-m-d H:i:s',$end);
    $d_start= new DateTime($start);
    $d_end	= new DateTime($end);
    $diff	= $d_start->diff($d_end);
	
	# Geef de gewenste data terug
    $list['year']	= $diff->format('%y');
    $list['month']	= $diff->format('%m');
    $list['day']	= $diff->format('%d');
    $list['hour']	= $diff->format('%h');
    $list['min']	= $diff->format('%i');
    $list['sec']	= $diff->format('%s');
    return $list;
}

# Public: Converteert kale tekst naar HTML-compliant tekst
#
#
function text_to_html($plainText, $makeLineBreaks = true) {
	# Just to make things a little easier, pad the end.
	$output = $plainText."\n";
	$output = preg_replace('|<br />\s*<br />|', "\n\n", $output);
	
	# Space things out a little.
	$output = preg_replace('!(<(?:table|ul|ol|li|pre|form|blockquote|h[1-6])[^>]*>)!', "\n$1", $output);
	$output = preg_replace('!(</(?:table|ul|ol|li|pre|form|blockquote|h[1-6])>)!', "$1\n", $output); // Space things out a little.
	
	# Cross-platform newlines.
	$output = preg_replace("/(\r\n|\r)/", "\n", $output);
	
	# Take care of duplicates.
	$output = preg_replace("/\n\n+/", "\n\n", $output); 
	$output = preg_replace('/\n?(.+?)(?:\n\s*\n|\z)/s', "\t<p>$1</p>\n", $output);
	
	# Make paragraphs, including one at the end.
	# Under certain strange conditions, it could create a P of entirely whitespace.
	$output = preg_replace('|<p>\s*?</p>|', '', $output);
	
	# Problem with nested lists
	$output = preg_replace("|<p>(<li.+?)</p>|", "$1", $output);
	$output = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>",	$output);
	$output = str_replace('</blockquote></p>', '</p></blockquote>', $output);
	$output = preg_replace('!<p>\s*(</?(?:table|tr|td|th|div|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)!', "$1", $output);
	$output = preg_replace('!(</?(?:table|tr|td|th|div|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)\s*</p>!', "$1", $output);
	
	# Optionally make line breaks.
	if ($makeLineBreaks){
		$output = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $output);
	}
	
	$output = preg_replace('!(</?(?:table|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)\s*<br />!', "$1", $output);
	$output = preg_replace('!<br />(\s*</?(?:p|li|div|th|pre|td|ul|ol)>)!', '$1', $output);
	$output = preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $output);
	return $output;
}

# Public: Maak hyperlinks van kale tekst links
#
#
function maak_hyperlinks($plainText){
	$output = preg_replace('|(?<!href=")(https?://[A-Za-z0-9+\-=._/*(),@\'$:;&!?%]+)|i', '<a href="$1">$1</a>', $plainText);
	return $output;
}

# Public: sla het klikpad van de gebruiker op
#
# Examples:
#
#	saveClickPath();
#	# => Het klikpad van de gebruiker word opgeslagen
function saveClickPath(){
	if(!isset($_SESSION['step'])){
		$_SESSION['step'] = 0;
	}

	# Tel 1 op bij de stappenteller in de sessie array
	$_SESSION['step']++;

	# Connectie maken met de database
	$link = dbConnect();
	$link->query("INSERT INTO clickpath (sessionID, step, requesturl) VALUES ('".session_id()."', '".$_SESSION['step']."', '".$_SERVER['REQUEST_URI']."');");
	dbClose($link);
}


# Public: Vraag om login gegevens als er niet is ingelogd, toon een formulier en bied
#	de gebruiker de mogelijkheid om in te loggen. Als er is ingelogd gebeurt er niets!
#	Als er via danwel POST danwel GET een variabele logout = true is meegestuurd wordt
#	er automatisch uitgelogd. Dit script haalt gegevens uit een array $users welke
#	door het keyword global de scope van de functie wordt binnen gehaald.
#
# Examples:
#
#	authenticatie();
#	# => Het login systeem is in werking.
#
function authenticatie(){
	global $users; # dit is erg smerig, getver, maar er zijn geen arrays in define() land
	
	# Controleer of er uitgelogd moet worden
	if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == true){
		# Reset alle waarden in de sessie array
		$_SESSION = array();
		
		# Overschrijf de cookie waar de sessie in opgeslagen is (vrij rigide)
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
		}
		# Vernietig de sessie
		session_destroy();
		# Start een nieuwe sessie
		session_start();
	}
	
	# Controleer of er is ingelogd
	if(!isset($_SESSION['geauthenticeerd']) || $_SESSION['geauthenticeerd'] == false){
		# Niet ingelogd, controleer of het formulier verstuurd is
		if(isset($_POST['login'])){
			# Het form is verstuurd, controleer de gegevens
			if(array_key_exists($_POST['username'], $users)){
				# De gebruiker is bekend, controleer het wachtwoord
				if($users[ $_POST['username'] ]==$_POST['password']){
					# Het wachtwoord is juist, de gebruiker is ingelogd
						$_SESSION['geauthenticeerd'] = true;
						$_SESSION['gebruiker'] = $_POST['username'];
				}else{
					# Dit wachtwoord is onjuist, toon het form en sterf :)
					die( loginFormulier('Dit wachtwoord is onjuist..') );
				}
			}else{
				# Deze login kennen we niet, toon het form en sterf :)
				die( loginFormulier('Deze gebruiker kennen we niet..') );
			}
			
		}else{
			# Het form is niet verstuurd, toon het form en sterf :)
			die( loginFormulier() );
		}
	}
}
			
?>