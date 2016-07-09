<?php
require_once('dbConnect.php');
$con=mysqli_connect($host,$user,$pass,$database);
$suveryer_name = $_POST['suveryer_name'];
$survey_locality = $_POST['survey_locality'];
if($con)
 echo 'Connected successfully to mydb database';
 
$sql="SELECT `name`, `fatname`, `motname` FROM `student` WHERE suveryer_name = $_POST['suveryer_name'] && $survey_locality = $_POST['survey_locality']; ";
$results=mysqli_query($con,$sql);
if(mysqli_query($con,$sql)){
					while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $row['name'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "\n";
				}else{
					echo 'oops! Please try again!';
				}

?>