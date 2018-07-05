<?php
session_start();
include("connection.php");
$id=$_GET["qid"];
$ans=$_GET["newans"];

	
		$query1="DELETE FROM answers where id='".$id."' and answer='no answers yet'";
		$res=mysql_query($query1) or die("Query failed...".mysql_error());
		$query="INSERT INTO answers values(".$id.",'".$ans."','".$_SESSION['logged_in']."')";
		$res=mysql_query($query) or die("Query failed...".mysql_error());
		if($res==1)
		{
			header('location:forum.php');
		}
		
	
	else
		echo "Invalid";

?> 