<?php

# include de benodigde bestanden
require('inc/template.inc.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Encryptie');

# maak een tekst om te versleutelen en geef deze weer
$teVersleutelenTekst = "Dit is een testje!";
echo "Onversleutelde tekst: ".$teVersleutelenTekst." <br />";

# maak een md5 hash van de string en geef deze weer, gebruik dit niet voor wachtwoorden
$md5Hash = md5($teVersleutelenTekst);
echo "md5 versleutelde tekst: ".$md5Hash." <br />";

# maak een sha1 hash van de string en geef deze weer, gebruik dit niet voor wachtwoorden
$sha1Hash = sha1($teVersleutelenTekst);
echo "sha1 versleutelde tekst: ".$sha1Hash." <br />";

# maak een crypt hash van de string en geef deze weer, dit is de enige veilige manier
$cryptHash = crypt($teVersleutelenTekst, 'salt, een geheime zin die niemand weet');
echo "crypt versleutelde tekst met salt: ".$cryptHash." <br />";

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();

?>