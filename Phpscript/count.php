<?php

require_once('dbConnect.php');

$sql="SELECT COUNT(*) AS enrolled FROM student WHERE enrolled = 'yes'";
$sql1="SELECT COUNT(*) AS notenrolled FROM student WHERE enrolled = 'no'";

$check = mysqli_query($con,$sql);
$check1 = mysqli_query($con,$sql1);

if($check && $check1){

	$values = mysqli_fetch_assoc($check);
        $values1 = mysqli_fetch_assoc($check1);

	$yes = $values['enrolled']; 
$no = $values1['notenrolled']; 
	
	echo $yes.' '.$no;
}
else{
	echo 'failure';

}

mysqli_close($con);

?>