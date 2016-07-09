<?php
// Connect to MySQL
require_once('dbConnect.php');
 
$link = mysqli_connect(HOST,USER,PASS,DB);
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

$sql="
  SELECT name
  FROM student
  ORDER BY name ASC";
$query=mysqli_query($con,$sql);
$result = mysql_query( $query );
if($query)

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
while ( $row = mysql_fetch_assoc( $result ) ) {
  echo $row['name'] . ' | ' . $row['value1'] . ' | ' .$row['value2'] . "\n";
}

// Close the connection
mysql_close($link);
?>