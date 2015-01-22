<?php  
	//================= identifications for database =================
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db";
	//================= Create connection =================
	$conn = mysqli_connect($servername, $username, $password, $dbname);
/*
	//================= Example=================
	$url = "http://www.developpez.net/forums/d1204062/php/php-sgbd/php-mysql/cacher-code-source-fichiers-php/";
    $homepage = file_get_contents($url);
	 echo $homepage;
	 */
	
	 //================= Function=================

require_once 'zimbra.class.php'; // include the library
$zimbra = new Zimbra('username','prod');
$zimbra->connect(); // make the connection
?>
