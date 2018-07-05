<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="janani";

	//Connection to server
	$con=mysql_connect($host,$user,$pass) or die("Unable to connect to server...".mysql_error());
	
	//Connect to the database after connection to server
	$dbase=mysql_select_db($db,$con) or die("Unable to connect to DB...".mysql_error());

?>
