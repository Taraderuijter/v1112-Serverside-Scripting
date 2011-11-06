<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Serverside Scripting Voorbeeldcode</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<div id="wrapper">
		<p>Hieronder vind je een opsomming van de voorbeelden die wekelijks in de hoorcollege's en
		werkgroepen gebruikt wordt. De voorbeelden zijn niet allemaal even duidelijk becommentarieerd
		omdat het regelmatig om on-the-fly voorbeelden gaat die een bepaald principe demonstreren. Ik
		zal trachten de voorbeelden een zo duidelijk mogelijke naam te geven zodat herkenbaar is om welk
		voorbeeld het precies gaat. Maak bij onduidelijkheden een aantekening en vraag me daar in de
		werkgroep nog eens naar.</p>
<?php

// The dir we want to display
$dir = preg_replace('/index.php/', '', $_SERVER['SCRIPT_FILENAME']); 
// Filter these dir's
$noshow = array('.', '..', '.git', 'pics', 'style', '.DS_Store', 'v1112 voorbeeldcode.tmproj', 'index.php');

// Loop the dir!
if (is_dir($dir)) {
	// Open the dir
	if ($dir_handle = opendir($dir)) {
		// Everything a okay.. dump some HTML
		echo '		<ul>'."\r\n".'			<li><span class="filename"><strong>Bestandsnaam</strong></span><strong>Type/Grootte</strong></li>'."\r\n";
				
		// Loop through the dir's contents
		while (($file = readdir($dir_handle)) !== false) {
			// Only print the files that are a dir, put them nicely in a list
			if(is_dir($dir.$file) && !in_array($file, $noshow)){
				$file_url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).$file;
				echo '			<li><span class="filename"><a href="'.$file_url.'">'.$file.'</a></span>directory</li>'."\r\n";
			}
		}
		
		// Close the dir handle (saves mem and we like the sysadmin)
		closedir($dir_handle);
		
		
		// Everything a okay.. dump some HTML again
		echo '		</ul>';
	}
}	

?>				
	</div>

</body>
</html>
