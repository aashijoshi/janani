<?php
include("connection.php");
$name=$_GET["name"];
$age=$_GET["age"];
$email=$_GET["email"];
$pass=$_GET["pass"];

	
	
		$query="INSERT INTO logindetails (name,age,email,password) values('".$name."','".$age."','".$email."','".$pass."');";
		$res=mysql_query($query) or die("Query failed...".mysql_error());
		if($res==1)
		{
			echo "done";
		}
		
	
	else
		echo "Invalid";

?> 
	