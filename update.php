<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Database</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">

</head>
<body>
<h3>Bus Trip Database</h3>
<?php
include 'upload_file.php';
include 'connectdb.php';
include 'getData.php';
?>
<h3>Update Bus Trip Database</h3>
<?php
$tripID = $_POST["tripid"];
$tripName = $_POST["tripName"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
if(!isset($tripName) || empty($tripName))
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
if(isset($tripName))
{
	$query1 = "UPDATE busTrip set tripName = '$tripName' WHERE tripID = $tripID;";
}
else if (isset($startDate))
{
	$query1 = "UPDATE busTrip set startDate = '$startDate' WHERE tripID = $tripID;";
}
else if(isset($endDate))
{
	$query1 = "UPDATE busTrip set endDate = '$endDate' WHERE tripID = $tripID;";
}
if(isset($query1))
{
	$result1 = mysqli_query($connection,$query1);
	if(!$result1)
	{
		die(mysqli_error($connection));
	}
}
if(isset($petpic))
{
        $query2 = "SELECT urlImage FROM busTrip WHERE tripID = $tripID;";
        $result2 = mysqli_query($connection,$query2);
        if(!$result2)
        {
                die(mysqli_error($connection));
        }
        $row = mysqli_fetch_assoc($result2);
        if(is_null($row["urlIamge"]))
        {
                $query3 ="UPDATE busTrip SET urlImage = '$petpic' WHERE tripID = $tripID;";
                if(!mysqli_query($connection,$query3))
                {
                        die(mysqli_error($connection));
                }
        }
}
$query4 = "SELECT * FROM busTrip;";
$result4 = mysqli_query($connection,$query4);
if(!$result4)
{
        die(mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($result4))
{
        echo "<li>";
        echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"];
        echo '<img src="' . $row["urlImage"] . '" height="60" width="60">';
        echo "</li>";
}
?>
</body>
</html>

