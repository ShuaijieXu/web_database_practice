<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>See Bus Trip</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">

</head>
<body>
<?php
include 'connectdb.php';
$countryVisit = $_POST["countryvisit"];
echo "<h1>All Bus Trip</h1>";
$query = "SELECT * FROM busTrip WHERE countryVisit = '$countryVisit'";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($result))
{
        echo "<li>";
        echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"];
        echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        echo "</li>";
}
mysqli_free_result($result);
?>
</body>
</html>

