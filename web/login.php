
<?php

include "dbConnect.php";
$username= $_GET["username"];
$password=$_GET["password"];

if(isset($username) && isset($password))
{
if(!empty($username) && !empty($password))
{
$sql = "select email,password from regdata";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["email"]=="darshan@gmail.com" && $row["password"]=="darshan")
		{
		session_start();
		$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
echo "welcome:" .$_SESSION['login_user'];
header(location: "enrollment.html");
		
		}
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="login.css">   
  <script src="login.js"> </script>
	
  

  </head>
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
      
      <li class="active"><a href="#"><span class="glyphicon glyphicon-log-out aria-hidden="true"></span> Login/SignUp</a></li>
	  	  
   </ul>
   
  </div>
</nav>

<br/> <br/><br/>


<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="login.html" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="register.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
