<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Book Table</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">
</head>

<body>
<?php
include 'connectdb.php';
echo "<h1>Booking Table</h1>";
$query0 = "SELECT * FROM book;";
$result0 = mysqli_query($connection,$query0);
if(!$result0)
{
	die(mysqli_error($connection));
}
while($row0 = mysqli_fetch_assoc($result0))
{
	echo $row0["tripID"]." ".$row0["passengerID"]." "."$". $row0["paid"];
	echo "<br>";
}
mysqli_free_result($result0);

$tmp = $_POST["booking"];
$array = explode(",",$tmp);
$tripID = $array[0];
$passengerID = $array[1];
$query = "DELETE FROM book WHERE tripID = $tripID AND passengerID = $passengerID;";
$result = mysqli_query($connection,$query);
if(!$result)
{
        die(mysqli_error($connection));
}
echo "<h1>New Booking Table</h1>";
$result = mysqli_query($connection,$query0);
if(!$result)
{
	die(mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result))
{
	echo $row["tripID"]." ".$row["passengerID"]." "."$".$row["paid"];
	echo "<br>";
}
mysqli_free_result($result);
?>
</body>
</html>

