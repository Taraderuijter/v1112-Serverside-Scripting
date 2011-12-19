<?php
# include de benodigde bestanden (require geeft fatale fout als het niet lukt)
require('../inc/config.inc.php');
require('../inc/template.inc.php');
require('../inc/functions.inc.php');

# LET OP!
require('../inc/class.phpmailer.php');

# geef de HTML code voor het openen van de pagina weer
htmlOpenen('Spam versturen: SMTP via gmail');

# Stel de tijdszone in
date_default_timezone_set('Europe/Amsterdam');

# Maak een nieuw object aan van het type PHPMailer
$mail = new PHPMailer();

# Maak duidelijk dat we via SMTP willen mailen
$mail->IsSMTP();
# Geef debug informatie (1 = errors, 2 = errors and messages)
$mail->SMTPDebug = 2;

# Geef de instellingen voor gmail authenticatie
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

# Geef je gmail gebruikersnaam en wachtwoord op
$mail->Username   = "serversidescripting@gmail.com";
$mail->Password   = "server_side";

# Stel een afzender en reply-to adres in
$mail->SetFrom('justus@ju5tu5.nl', 'Justus Sturkenboom');
$mail->AddReplyTo('justus@ju5tu5.nl', 'Justus Sturkenboom');

# Stel het onderwerp in
$mail->Subject    = "Spam versturen via gmail!";

# Stel een alternatieve tekst in (voor text only mail clients)
$mail->AltBody    = "Om dit bericht te kunnen lezen moet uw mail programma HTML mail aan kunnen.";

# Haal de inhoud van het bericht op uit een extern html bestand en koppel het
$body = file_get_contents('bericht.html');
$mail->MsgHTML($body);

# Voeg een ontvanger toe (deze regel kan meerdere keren ingevuld worden)
$mail->AddAddress("j.p.sturkenboom@hva.nl", "Justus Sturkenboom");

# Voeg aanhangsels toe, deze afbeelding wordt gebruikt in de email
$mail->AddAttachment("me_ud.png");

if(!$mail->Send()) {
  echo "PHPMailer Error: " . $mail->ErrorInfo;
} else {
  echo "Het bericht is verstuurd!";
}

# geef de HTML code voor het sluiten van de pagina weer
htmlSluiten();
?>
