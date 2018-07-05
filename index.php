<?php
require_once('connect.php'); // import page
require_once('checkreminder.php'); // import reminder checker

if(isset($_REQUEST['submit']))
{
	if(!empty($_REQUEST['title']) & !empty($_REQUEST['date']))
	{
		if($_REQUEST['date']<=date('Y-m-d')) // if selected is in future or not?
		{
		$flag = '0'; // if it is today or before, make it expired.
		echo '<script type="text/javascript">
				
								alert("Reminder is set expired.");
								window.location="index.php";	
				
				  		</script>';
		//$Status_message = "Reminder is set expired.";
		}
		else
		{
		$flag = '1'; 
		}
		$title = addslashes(ucwords($_REQUEST['title']));
		$desc = addslashes(ucfirst($_REQUEST['description']));	
	
		$sql->dbQuery("insert into reminders (title,description,date,flag)values('$title','$desc','$_REQUEST[date]','$flag')"); // add reminder
		echo '<script type="text/javascript">
				
								alert("Reminder is set successfully.");
								window.location="index.php";	
				
				  		</script>';
	}
	else
	{

	echo '<script type="text/javascript">
				
								alert("Title or date missing, no reminder added");
								window.location="index.php";	
				
				  		</script>';
							
	}
}
$Result = $sql->dbQuery("select * from reminders order by id desc");
$Reminder_Result = $sql->dbQuery("SELECT * FROM `reminders` WHERE flag = '1' "); // select expired reminders
?>
<!DOCTYPE html>
<html>
<head>
<meta content="charset=UTF-8" />
<title>Janani</title>
<link rel="stylesheet" href="css/style.css" />

		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="css1/font-awesome.min.css">
	<link rel="stylesheet" href="css1/bootstrap.min.css">
	<link rel="stylesheet" href="css1/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.18.custom.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.datepicker.js"></script>
<script src="js/jquery.ui.tabs.js"></script>
<script>			
		$(function() {
					$( "#tabs" ).tabs();
				});
				$(function() {
		$( "#date" ).datepicker();
	});
</script>
</head>
<body>

	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
					<a href="index.html"><img id="logojan" src="img/logo3.png" alt="" class="img-responsive logo"></a>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      
					      <ul class="nav navbar-nav navbar-right">
					        <li><a class="menu active" href="#home" >Home</a></li>
					        <!--<li><a class="menu" href="#about">about us</a></li>
					     
					        <li><a class="menu" href="#team">our team</a></li>
					        <li><a class="menu" href="#contact"> contact us</a></li>-->
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area --><br><br><br><br><br><br><br><br><br>
    
   
	<div class="container">
		<div id="Container">
			<div id="tabs">
			<ul>
			<li><a href="#tabs-1">Reminders</a></li>
			<li><a href="#tabs-2">Add Reminder</a></li>
			<li><a href="#tabs-3">All Reminders</a></li>
			</ul>
		
			<div id="tabs-1">
			<?php if(isset($Status_message)){?><div id="message"><?php echo $Status_message;?></div><?php }
		
			$numRows = $sql->dbNumRows($Reminder_Result);
			if($numRows > 0)
			{	
				while($Reminder = $sql->dbFetchAssoc($Reminder_Result)){?>
				<div id="reminder"  >
				<a href="edit.php?id=<?php echo $Reminder['id']?>"><?php echo $Reminder['title'];?></a>
				<p ><?php echo "set on ".$Reminder['date'];?></p>
				
				</div>
				<?php 	}
			}
			else{
			echo "There are no Reminders set";
			}
			$sql->dbFreeResult($Reminder_Result);?>
		</div>	
		
			
		<div id="tabs-2">		
				<form name="add_reminder" action="" method="post">
					<table width="60%" border="0">
					<tr>
					<td colspan="2" align="center" id="message"></td>
					</tr>
				  <tr>
					<td width="32%">Title</td>
					<td><input type="text" name="title" ></td>
				  </tr>
				  <tr>
					<td>Description</td>
					<td><textarea name="description" cols="30" rows="5" id="description"></textarea></td>
					</tr>
				  <tr>
					<td>Remind me Date</td>
					<td><input type="text" id="date" name="date"></td>
					</tr>
				  <tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Save Reminder" name="submit" /></td>
				  </tr>
				</table>
				</form>
		</div>
		
		<div id="tabs-3">
					<?php 					
			while($row = $sql->dbFetchAssoc($Result)){?>
			<div id="reminder"  >
			<a href="edit.php?id=<?php echo $row['id'];?>" <?php if($row['flag']== 0){?>style="color:#999999;" <?php }?>>
			<?php echo $row['title'];?>
			</a>
			
			<p <?php if($row['flag']== 0){?>style="color:#999999;" <?php }?>>
			<?php if($row['flag']== 1){echo "set on ".$row['date'];}else{ echo "expired on ".$row['date'];}?>
			</p>
			
			</div>
			<?php }
			$sql->dbFreeResult($Result); ?>		
		</div>				
		
	</div>
</div>
</div>
</body>
</html>