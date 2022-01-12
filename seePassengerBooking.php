<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>See passenger booking</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Passenger all bookings</h3>
<?php
$passengerID = $_POST["passenger"];
$query = "SELECT * FROM passenger, book, busTrip WHERE passenger.passengerID = $passengerID AND passenger.passengerID = book.passengerID AND book.tripID = busTrip.tripID;";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(mysqli_error($connection));
}	
if(mysqli_num_rows($result)==0)
{
	die(mysqli_error($connection));
}
while ($row=mysqli_fetch_assoc($result))
{
	echo "<li>";
	echo $row["firstName"]." ".$row["lastName"]." books ".$row["tripName"];
	echo "</li>";
}
mysqli_free_result($result);
?>
</body>
</html>
