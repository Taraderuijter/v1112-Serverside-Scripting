<?php
ini_set('session.use_trans_sid', 0);
ini_set('session.use_only_cookies', 1);

session_start();

// Set some global vars
define('LANGUAGE', 'nl');

// Local
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'www');
define('MYSQL_PASS', 'serverside');
define('MYSQL_PORT', '3306');
define('MYSQL_DB', 'test');
define('BASE_URL', 'http://localhost');
// */

define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
?>