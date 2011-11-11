<?php

# Geef de HTML openen code weer
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<title>Weergeven van de inhoud van een array</title>
	<link href="/style/style_normal.css" rel="Stylesheet" type="text/css" media="all" />
</head>
<body>
	
	<div id="wrapper">
';
# Maak een array bestaande uit arrays
$berichtenRij = array(
	# Maak een array bestaande uit een titel, datum en bericht en de bijbehorende informatie
	array('titel'	=> 'Cheap wireless for microcontrollers',
		  'datum'	=> '29 aug 2009',
		  'bericht'	=> 'Everybody loves microcontrollers, including the Arduino, allowing you to create whatever you imagine. That is unless you want to hack together something wireless. Originally you had to rely on the expensive XBee protocol or other wireless options, but no longer. Hobby Robotics found an extremely cheap transmitter and receiver and wrote a quick guide for wiring them up to an Arduino. Now your wireless projects can come to life, as long as you are within 500 feet and don’t mind 2400bps; minor trade offs compared to the gains of wireless freedom. Final note: You aren’t limited to Arduino, we would love to see someone modify this to work with a PIC or other microcontroller.'),
	
	array('titel'	=> 'Gameboy foot controller',
		  'datum'	=> '31 aug 2009',
		  'bericht'	=> '[Joey] sent us a link to his Gameboy foot controller. In the video above, you can see him using it to control the loops in the background while he plays his guitar through an 8-bit filter. He tells us that several gameboys were used in the construction. At one point, he had to replace the guts because the music was so loud it knocked his equipment over and destroyed it. We can’t help but feel just a tiny bit of excitement as memories of renting a NES cartridge for the weekend fill our heads when we hear these riffs. His music isn’t too bad either. There is a growing crowd of people that support “chip music”. You can see what looks like a decent sized gathering enjoying a show with a little bit of a history lesson after the break.'),
	
	array('titel'	=> 'Lego iPod hacking robot',
		  'datum'	=> '10 aug 2009',
		  'bericht'	=> 'The Linux4nano project has been working to port the Linux kernel onto the iPod Nano along with other iPods in general. Although the iPodLinux project has had luck with some older iPods, newer models protect firmware updates with encryption. One of the ways they plan on running code on the device is through a vulnerability in the notes program; it causes the processor to jump to a specific instruction and execute arbitrary code. To take advantage of this, they first need to figure out where their injected code ends up in the memory. Currently, they are testing every memory location by painstakingly loading in a bogus note and recording its effect. Each note takes about a minute to test and they have tens of thousands of addresses to check over several devices.'),
	
	array('titel'	=> 'Bokode, a new barcode',
		  'datum'	=> '29 aug 2009', 
		  'bericht'	=> 'The MIT Camera Culture Group utilized Bokeh, an effect where the lens is purposely placed out of focus, in order to vastly improve current 2D barcode technology. Dubbed Bokode, the team claims that an off the shelf camera can read data 2.5 microns from a distance of over 4 meters, compared to today’s average barcode reader’s maximum distance of only a foot or so. What looks most interesting is the ability to produce a smoother and more accurate distance and angle calculations (relative to the camera): allowing for a better augmented reality. It also seems to be more secure than traditional 2D barcodes, that is of course until the hacker community gets a hold of it.'),

	array('titel'	=> 'Your music in Rock Band 2',
		  'datum'	=> '15 aug 2009',
		  'bericht'	=> '[Peter Kirn] over at Create Digital Music takes an in depth look at the process of adding your own music to Rock Band 2. This involves using REAPER audio production software, uploading your work via the XNA Creators’ Club, and then playing the fresh track on an Xbox 360. Both REAPER and the XNA Club cost money, and the total price comes out somewhere between $100-$160. The process is now in closed beta but a wider beta is expected in September followed by a full release in October.')
);

# Loop de array af en toon een HTML representatie van elk bericht
foreach($berichtenRij as $bericht) {
	echo '
		<div class="bericht">
			<h1>'.$bericht['titel'].'</h1>
			<span class="datum">'.$bericht['datum'].'</span>
			<p>'.$bericht['bericht'].'</p>
		</div>
	';
}

# Geef de HTML code voor het sluiten van de pagina weer
echo '
	</div>

</body>
</html>
';

?>