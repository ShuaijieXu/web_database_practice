<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Database</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">

</head>
<body>
<h1>Bus Trip Database</h1>
<?php
include 'connectdb.php';
include 'getData.php';
?>
<?php
$tripID=$_POST["tripid"];
$query1 = "DELETE FROM busTrip WHERE tripID = $tripID";
$result1 = mysqli_query($connection,$query1);
if(!$result1)
{
	die(mysqli_error($connection));
}
$query2 = "SELECT * FROM busTrip";
$result2 = mysqli_query($connection,$query2);
if(!$result2)
{
	die(mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result2))
{
	echo "<li>";
        echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"];
        echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        echo "</li>";
}
?>
</body>
</html>
