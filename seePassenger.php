<?php
include 'connectdb.php';
$query = "SELECT * FROM passenger, passport WHERE passenger.passportNumber=passport.passportNumber ORDER BY lastName";
$result = mysqli_query($connection,$query);
if(!$result)
{
	die(mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result))
{
	echo "<li>";
	echo $row["passengerID"]." ".$row["firstName"]." ".$row["lastName"]." ".$row["passportNumber"]." ".$row["citizenship"]." ".$row["expiryDate"]." ".$row["birthDate"];
	echo "</li>";
}
mysqli_free_result($result);
?>

