<?php
require_once('dbConnect.php');
$suveryer_name = $_GET['suveryer_name'];
$survey_locality = $_GET['survey_locality'];
if($con)
 echo 'Connected successfully to mydb database';
 
$sql="SELECT name, fatname FROM student WHERE suveryer_name =$suveryer_name  AND locality = $survey_locality ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
/*
$results=mysqli_query($con,$sql);
if(mysqli_query($con,$sql)){
while ( $row = mysql_fetch_assoc( $results ) ) {
  echo $row['name'] . ' | '. "\n";
				}else{
					echo 'oops! Please try again!';
				}
*/

?>