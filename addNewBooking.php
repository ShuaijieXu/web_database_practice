<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Booking</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">

</head>
<body>
<?php
include 'connectdb.php';
$query0 = "SELECT * FROM book";
$result0 = mysqli_query($connection,$query0);
if(!$result0)
{
	die(mysqli_error($connection));
}
echo "<h1>Booking Database</h1>";
while($row = mysqli_fetch_assoc($result0))
{
	echo "<li>";
	echo $row["tripID"]." ".$row["passengerID"]." ".$row["paid"];
	echo "</li>";
}
mysqli_free_result($result0);
echo "<h1>New Booking Database</h1>";
$passengerID = $_POST["passenger"];
$tripID = $_POST["tripname"];
$price = $_POST["price"];
if(!isset($price) || empty($price))
{
	die("Error: please enter a price for the booking");
}
$query = "INSERT INTO book (tripID,passengerID,paid) VALUES($tripID,$passengerID,$price);";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(mysqli_error($connection));
}
$query1 = "SELECT * FROM book";
$result1 = mysqli_query($connection,$query1);
if(!$result1)
{
	die(mysqli_error($connection));
}
echo "<h1>After add new booking</h1>";
while($row = mysqli_fetch_assoc($result1))
{
	echo "<li>";
	echo $row["tripID"]." ".$row["passengerID"]." ".$row["paid"];
	echo "</li>";
}
mysqli_free_result($result1);
?>
</body>
</html>
