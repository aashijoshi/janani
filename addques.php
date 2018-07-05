<?php
session_start();
include("connection.php");
$ques=$_GET['ques'];



		$query="INSERT INTO question (ques,postedby) values('".$ques."','".$_SESSION['logged_in']."')";
		$res=mysql_query($query) or die("Query failed...".mysql_error());
		$q="SELECT qid from question where ques='".$ques."'";
		$qr=mysql_query($q) or die("Query failed...".mysql_error());
		$qe=mysql_fetch_array($qr);
		$query1="INSERT INTO answers values('".$qe[0]."','no answers yet','-')";
		$res1=mysql_query($query1) or die("Query failed...".mysql_error());
		if($res==1 && $res1==1)
		{
			header('location:forum.php');
			
		}
		
	
		else
echo "Invalid";

?>