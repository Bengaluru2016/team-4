<?php
	define('HOST','http://ec2-54-169-33-156.ap-southeast-1.compute.amazonaws.com/');
	define('USER','root');
	define('PASS','darshan');
	define('DB','Team4');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>