<?php
include("connection.php");

	
	$id=$_GET["email"];
	$pass=$_GET["password"];
	
	
		$query="SELECT * FROM logindetails where email='".$id."'AND password='".$pass."'";
		$res=mysql_query($query) or die("Query failed...".mysql_error());
		if(mysql_num_rows($res)==1)
		{while($row=mysql_fetch_array($res))
		
			{
				echo "Welcome ".$row['email'];
			session_start();
			$_SESSION['logged_in']=$id;
			header('Location:portfolio.php');
			}
		}
		
	
	else
		echo "Invalid username or password input.Please try again...";

?> 