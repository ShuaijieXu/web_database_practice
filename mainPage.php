<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<title>CS3319 Assignment#3</title>
<link rel="stylesheet" type="text/css" href="3319StyleSheet.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poller+One&family=Press+Start+2P&family=Wallpoet&display=swap" rel="stylesheet">
</head>
<body>
<h2>Bus Tipe Table:</h2>
<?php
include 'connectdb.php';
include 'getData.php';
?>
<h3>Order Bus Trip Table</h3>
<h5>Please select the column:</h5>
<form action="order.php" method="post"><!--it will post parameter to order.php when button is pressed-->
<?-- radio button for user option-->
<input type="radio" name="orderColumn" value="tripName">Trip Name<br>
<input type="radio" name="orderColumn" value="countryVisit">Country<br>
<h5>Please select the order type:</h5>
<input type="radio" name="orderType" value="ascending">Ascending<br>
<input type="radio" name="orderType" value="descending">Descending<br>
<br><input type="submit" value="START ORDER">
</form>
<h3>Update Bus Trip Table</h3>
<form action="update.php" method="post" enctype="multipart/form-data"><!--it will post parameter to update.php when button is pressed-->
<?php
//this php code here is to create the drop list box to let the user to select the current exit trip id in database, so it must be done by php to connect to database
$query = "SELECT tripID FROM busTrip";
$result = mysqli_query($connection,$query);
if (!$result)
{
        die("databases query failed.");
}
echo "Trip ID:";
echo '<select name = "tripid" id="tripid">';//create the drop box list
while($row = mysqli_fetch_assoc($result))
{
        echo "<option value='".$row['tripID']."'>".$row['tripID']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<!--create three text regions to let user input text-->
<label>Trip Name: </label><input type="text" name="tripName"><br>
<label>Start Date: </label><input type="text" name="startDate"><br>
<label>End Date: </label><input type="text" name="endDate"><br>
<laebl>Upload a picture </label><input type="file" name="file" id="file"><br>
<br><input type="submit" value="START UPDATE">
</form>
<h3>Delete Bus Trip Table</h3>
<form action="delete.php" method="post"><!--it will post parameter to delte.php when button is pressed-->
<?php
//this php code here is to create the drop list box to let the user to select the current exit trip id in the database, so it must be done by php to connect to database
$query = "SELECT tripID FROM busTrip;";
$result = mysqli_query($connection,$query);
if (!$result)
{
        die("databases query failed.");
}
echo "Trip ID:";
echo '<select name = "tripid" id="tripid">';
while($row = mysqli_fetch_assoc($result))
{
        echo "<option value='".$row['tripID']."'>".$row['tripID']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<br><input type="submit" value="START DELETE">
</form>
<h3>Add New Bus Trip</h3>
<form action="addNewTrip.php" method="post" enctype="multipart/form-data">
<label>Trip ID: </label><input type="text" name="tripID"><br>
<label>Trip Name: </label><input type="text" name="tripName"><br>
<label>Start Date: </label><input type="text" name="startDate"><br>
<label>End Date: </label><input type="text" name="endDate"><br>
<label>Country Visit: </label><input type="text" name="countryVisit"><br>
<?php
$query = "SELECT licensePlateNumber FROM bus";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die("database query failed");
}
echo "<label>License Plate Number: </label>";
echo '<select name="licenseplatenumber" id="licenseplatenumber">';
while($row = mysqli_fetch_assoc($result))
{
	echo "<option value='".$row['licensePlateNumber']."'>".$row['licensePlateNumber']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<label>Uplod a picture: </label><input type="file" name="file" id="file"><br>
<br><input type="submit" value="START ADD">
</form>
<h3>See Bus Trip By Country</h3>
<form action="seeBusTrip.php" method="post">
<?php
$query = "SELECT DISTINCT countryVisit FROM busTrip";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die("database query failed");
}
echo "<label>Country: </label>";
echo '<select name="countryvisit" id="countryvisit">';
while($row = mysqli_fetch_assoc($result))
{
	echo "<option value='".$row['countryVisit']."'>".$row['countryVisit']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<br><input type="submit" value="START TO SEE">
</form>
<h3>Add New booking</h3>
<form action="addNewBooking.php" method="post">
<?php
$query = "SELECT * FROM passenger";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die("database query failed");
}
echo "<label>Passenger: </label>";
echo '<select name="passenger" id="passenger">';
while($row = mysqli_fetch_assoc($result))
{
	echo "<option value='".$row['passengerID']."'>".$row['firstName']." ".$row['lastName']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
$query = "SELECT * FROM busTrip";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die("database query failed");
}
echo "<label>Trip Name: </label>";
echo '<select name="tripname" id="tripname">';
while($row = mysqli_fetch_assoc($result))
{
	echo "<option value='".$row['tripID']."'>".$row['tripName']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<label>Price: </label><input type="text" name="price"><br>
<br><input type="submit" value="START TO ADD">
</form>
<h3>Information about the passengers and passport in order by last name</h3>
<?php
include 'seePassenger.php';
?>
<h3>See passenger bookings</h3>
<form action="seePassengerBooking.php" method="post">
<?php
$query = "SELECT * FROM passenger";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die("database query failed");
}
echo "<label>Passenger: </label>";
echo '<select name="passenger" id="passenger">';
while($row = mysqli_fetch_assoc($result))
{
	echo "<option value='".$row['passengerID']."'>".$row['firstName']." ".$row['lastName']."</option>";
}
echo '</select>';
echo '<br>';
mysqli_free_result($result);
?>
<br><input type="submit" value="START TO SEE">
</form>
<h3>Delete a booking</h3>
<form action="deleteBooking.php" method="post"">
<?php
$query = "SELECT book.tripID,book.passengerID,firstName, lastName, tripName FROM book,passenger,busTrip WHERE book.passengerID = passenger.passengerID AND book.tripID = busTrip.tripID;";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(mysqli_error($connection));
}
echo "<label>Bookings:  </label>";
echo '<select name="booking" id="booking">';
while($row = mysqli_fetch_assoc($result))
{
	echo '<option value="'.$row['tripID'].','.$row['passengerID'].'">'.$row['firstName']." ".$row['lastName']." book ".$row['tripName'].'</option>';
}
echo '</select>';
mysqli_free_result($result);
echo '<br>';
?>
<br><input type="submit" value="START DELETE">
</form>
<h3>All bus trips don't have any bookings yet</h3>
<?php
$query = "SELECT tripName FROM busTrip WHERE tripID NOT IN (SELECT tripID FROM book);";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(myqli_error($connection));
}
while($row = mysqli_fetch_assoc($result))
{
	echo "<li>";
	echo $row["tripName"];
	echo "</li>";
}
mysqli_free_result($result);
?>
<?php
mysqli_close($connection);
?>
</body>
</html>

