<?php
 $con = mysqli_connect('hostname','username','password','database');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['Browser', 'Visits'],
 <?php 
 $query = "SELECT count(id) AS count, first FROM ubiq GROUP BY ubiq";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['browser']."',".$row['count']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Browser wise visits'
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>