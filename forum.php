<?php
	  session_start();
		  if($_SESSION['logged_in']=='')
			  header('location:login.html');
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
	<link rel="stylesheet" href="css/style1.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<!--header section -->
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
					        <li><a class="menu active" href="loginresult.php" >Home</a></li>
					        <li><a class="menu" href="#ques">Ask a question</a></li>
							<li><a class="menu" href="#myques">My Questions</a></li>
					        <li><a class="menu" href="#allques">show all question</a></li>
						
					      </ul>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area --><br><br><br><br><br>
	<div id="ques" class="container">
    		
			<form name='newques' action='addques.php' method="get">
				<h2 align="center" >Ask a question </h2><br><br>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label" style="font-size:25px;">Question</label>
			    <div class="col-sm-10">
				
                	<textarea type="text" name="ques" placeholder="Type your question here" style="height:100px; width:500px; color:black; font-size:25px; align-content:flex-start; border:solid #000000 ; radius:0.5px;">
                    </textarea> 
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info btn-lg" name="post" style="height:40px; width:110px; font-size:20px;" >Post Question
                  </button>
			    </div>
			  </div>
			</form>
		</div>
        <div id="myques" class="container">
        	<h2 id="text">My Questions</h2>
			<?php
			include ("connection.php");
	
		  $query="SELECT qid,ques,postedby from question where postedby='".$_SESSION['logged_in']."'";
		  
		  $res=mysql_query($query) or die("Query failed...".mysql_error());
		  
		  while($row=mysql_fetch_array($res))
			{
				echo "<div id='recentquestion'>";
				echo "<form name='answer' action='addanswer.php'><input type='text' name='qid' style='display:none;' value='".$row[0]."'><p>".$row[1]."</p><p>Asked By:".$row[2]."</p>";
				$que="SELECT answer, answered_by from answers where id=".$row[0];
				echo "<center><table border='3' style='border-color:white; width:100%; height:100%;'><tr><th>Answer</th><th>Answered By</th>";
				$r=mysql_query($que) or die("Query failed...".mysql_error());
				while($ro=mysql_fetch_array($r))
				{

					echo "<tr><td>".$ro[0]."</td><td>".$ro[1]."</td></tr>";
				}
				echo "</table></center>";
				echo "<p><textarea name='newans' placeholder='Reply...' class='form-control'></textarea><button type='submit' class='btn btn-info btn-lg' name='addans' style='height:40px; width:110px; font-size:20px;'>Reply</p></form>";
				echo "</div>";
			}
		  
            
			?>
		</div>

        <div id="allques" class="container">
        	<h2 id="text">All Questions</h2>
            <?php
			include ("connection.php");
		  if($_SESSION['logged_in']=='')
			  header('location:login.html');
		  $query="SELECT qid,ques,postedby from question";
		  
		  $res=mysql_query($query) or die("Query failed...".mysql_error());
		  
		  while($row=mysql_fetch_array($res))
			{
				echo "<div id='recentquestion'>";
				echo "<form name='answer' action='addanswer.php'><input type='text' name='qid' style='display:none;' value='".$row[0]."'><p>".$row[1]."</p><p>Asked By:".$row[2]."</p>";
				$que="SELECT answer, answered_by from answers where id=".$row[0];
				echo "<center><table border='3' style='border-color:white; width:100%; height:100%;'><tr><th>Answer</th><th>Answered By</th>";
				$r=mysql_query($que) or die("Query failed...".mysql_error());
				while($ro=mysql_fetch_array($r))
				{

					echo "<tr><td>".$ro[0]."</td><td>".$ro[1]."</td></tr>";
				}
				echo "</table></center>";
				echo "<p><textarea name='newans' placeholder='Reply...' class='form-control'></textarea><button type='submit' class='btn btn-info btn-lg' name='addans' style='height:40px; width:110px; font-size:20px;'>Reply</p></form>";
				echo "</div>";
			}
		  
            
			?>
            
			  </div>
			  
    		
		</div>
        <!-- footer starts here -->
	<footer class="footer clearfix">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 footer-para">
					<p>&copy;Mostafizur All right reserved</p>
				</div>
				<div class="col-xs-6 text-right">
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-skype"></i></a>
				</div>
			</div>
		</div>
	</footer>
        </body>
</html>
