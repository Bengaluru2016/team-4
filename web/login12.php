
<?php
require_once('dbConnect.php');
$username= $_GET["username"];
$password=$_GET["password"];
$sql="select * from regdata where Username='$username' and Password='$password'";
$res=mysqli_query($con,$sql);
$check=mysqli_fetch_array($res);
if(isset($check))	{
		session_start();
		$_SESSION['login_user']= $username;  // Initializing Session with value of PHP Variable
echo "welcome:" .$_SESSION['login_user'];
header("location: enrollment.html");
		
		}
    
?>