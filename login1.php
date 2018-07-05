<?php

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>DOCTOR - Responsive HTML &amp; Bootstrap Template</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div id="login1" class="container">
			<form class="form-horizontal" action="login.php" method="GET">
				<h2 align="center" >LOGIN HERE</h2>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
			    </div>
			  </div>
			 <!-- <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label" >ROLE</label>
			    <div class="col-sm-10">
			     	<div class="form-group">
				    	<div class="col-sm-10">
				      		<select class="form-control" name="role">
  								<option>ADMINISTRATOR</option>
 								<option>INSTITUTE</option>
							</select>
				   	 	</div>
			  		</div>
			    </div>
			  </div>-->
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-danger" name="submit">Sign in</button>
				  <a href="signup.html"> Sign Up</a>
			    </div>
			  </div>
			</form>
		</div></body>
</html>
