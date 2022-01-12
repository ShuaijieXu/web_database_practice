<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Trip</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">
</head>
<body>
<?php
include 'upload_file.php';
include 'connectdb.php';
echo "<h1>Bus Trip Database</h1>";
include 'getData.php';
echo "<h1>New Bus Tirp Database</h1>";
$tripID = $_POST["tripID"];
$tripName = $_POST["tripName"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$countryVisit = $_POST["countryVisit"];
$licensePlateNumber = $_POST["licenseplatenumber"];
if(!isset($tripID) || empty($tripID))
{
	die("Error: please enter a trip ID");
}
else if(!isset($tripName) || empty($tripName))
{
	die("Error: please enter a trip name");
}
else if(!isset($startDate) || empty($startDate))
{
	die("Error: please enter a start date");
}
else if(!isset($endDate) || empty($endDate))
{
	die("Error: please enter a end date");
}
else if(!isset($countryVisit) || empty($countryVisit))
{
	die("Error: please enter a country");
}
$query0 = "SELECT tripID FROM busTrip WHERE tripID = $tripID";
$result0 = mysqli_query($connection,$query0);
if(!$result0)
{
	die(mysqli_error($connection));
}
else
{
	$row = mysqli_fetch_assoc($result0);
	if($row["tripID"] == $tripID)
	{	
		echo "<br>";
		die("Warning: Already exist trip");
	}
}
$query1 = "INSERT INTO busTrip (tripID,tripName,startDate,endDate,countryVisit,licensePlateNumber) VALUES($tripID,'$tripName','$startDate','$endDate','$countryVisit','$licensePlateNumber');";
$result1 = mysqli_query($connection,$query1);
if(!$result1)
{
	die(mysqli_error($connection));
}
if(isset($petpic))
{
        $query2 = "SELECT urlImage FROM busTrip WHERE tripID = $tripID;";
        $result2 = mysqli_query($connection,$query2);
        if(!$result2)
        {
                die(mysqli_error($connection));
        }
	$row = mysqli_fetch_assoc(result2);
        if(is_null($row["urlIamge"]))
        {
                $query3 ="UPDATE busTrip SET urlImage = '$petpic' WHERE tripID = $tripID;";
                if(!mysqli_query($connection,$query3))
                {
                        die(mysqli_error($connection));
                }
        }
}
echo "<h1>After addition</h3>";
$query3 = "SELECT * FROM busTrip";
$result3 = mysqli_query($connection,$query3);
while($row = mysqli_fetch_assoc($result3))
{
	echo "<li>";
        echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"];
        echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        echo "</li>";
}
?>
</body>
</html>
