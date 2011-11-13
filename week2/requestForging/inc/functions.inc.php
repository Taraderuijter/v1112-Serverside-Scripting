<?php

function dbConnect(){
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	return $mysqli;
}

function dbClose($mysqli){
	$mysqli->close();
}

function getClientInfo(){
	$clientArray = Array();
	$clientArray['host'] = isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:$_SERVER['REMOTE_ADDR']; 
	$clientArray['browser'] = $_SERVER['HTTP_USER_AGENT'];
	$clientArray['date'] = date("F jS Y, h:iA");
	return $clientArray;
}

?>