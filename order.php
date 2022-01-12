<!DOCTYPE html.
<html>
<head>
<meta charset="utf-8">
<title>Order Bus Trip</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">
</head>
<body>
<h3>Orginal Bus Trip Database</h3>
<?php
include 'connectdb.php';
include 'getData.php';
?>
<h3>Ordered Bus Trip Database</h3>
<?php
$orderType=$_POST["orderType"];
$orderColumn=$_POST["orderColumn"];
if($orderType =="ascending")
{
	$query ="SELECT * FROM busTrip ORDER BY $orderColumn;";
}
else 
{
	$query ="SELECT * FROM busTrip ORDER BY $orderColumn DESC;";
}
$result = mysqli_query($connection,$query);
if(!$result)
{	
	die(mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result))
{
	echo "<li>";
	echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"]." "."</li>";
}
?>
</body>
</html>
