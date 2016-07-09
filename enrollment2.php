<!DOCTYPE html>
<html lang="en">
  <head>
  
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style type="text/css">
		body { padding-top: 20px;
			 	background: url(back.jpg);
				color:maroon;	}
		h1 {text-align:center;}
		p {text-align:justify;}
		.btn {align:center;}
	</style>
  </head>
  <body>
	  <body>
	<nav class="navbar navbar-default navbar-fixed">
	
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Samridhdhi Trust</a>
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
       </button>
    </div>
	
    <ul class="nav navbar-nav nav-pills navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
      <li class="active"><a href=""> Enrollment</a></li>
      <li><a href="http://localhost/planit/tasks.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Analysis</a></li> 
      <li><a href="http://localhost/planit/diary.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Login/SignUp</a></li>
   </ul>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="category col-sm-1"></div>
  <div class="category col-sm-8">
	<div class="jumbotron">
				
<?php
  require_once('dbConnect.php');
  $con=mysqli_connect($host,$user,$pass,$database);
  if($con)
  echo 'Connected successfully to mydb database';
  
  $q="";

  echo "<form role='form' style='color:rgb(140,140,140)' action='diaryFINAL.php' onsubmit='' method='get'>
	<table border='border' class='t' width='600' align='center'> 
    <tr><th class='dth' width='100' >Student's Name</th>
    <th class='dth' width='400''>Father's Name</th>
	<th class='dth' width='400''>Mother's Name</th></tr>";

while($k=mysqli_fetch_array($q,MYSQLI_ASSOC))

{ 
$_SESSION['dsub']=$k['dsub'];
$_SESSION['ddate']=$k['ddat'];
$_SESSION['dloc']=$k['dloc'];
$_SESSION['dtext']=$k['dtxt'];
$_SESSION["tsub"]=$k["dsub"];
echo "<tr><td class='dtd' width='400'>".$k["ddat"]."</td> ";
$a=$k["dsub"];
echo "<td  class='dtd' width='400' ><a href='diarydisplay2.php?dsubject=$a'>".$k["dsub"]."</td> </tr>";

}

echo "<input type='submit' style='margin-top:-20px;margin-right:175px;padding:5px;font-weight:bold;' value='Enrolled' onclick='yesenrolled.php'></input></form>"

//mysqli_close($dbh);
?>
				
				</div>
	</div>
 </div>
</div>





	
	<div class="navbar-xs">
   <div class="navbar-primary">
	<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    	<div class="container">
    		<div class="navbar-text navbar-center">
				Education is the most powerful weapon which you can use to change the world! - Nelson Mandela
			</div>
    	</div>
    </div>
	</div>
	</div>
</body>
</html>