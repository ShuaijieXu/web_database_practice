<?php
$query = "SELECT * FROM busTrip";
$result = mysqli_query($connection,$query);
if (!$result) 
{
    die(mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($result)) 
{
     echo "<li>";
     echo $row["tripID"]." ".$row["tripName"]." ".$row["startDate"]." ".$row["endDate"]." ".$row["countryVisit"]." ".$row["licensePlateNumber"]."</li>";
}

mysqli_free_result($result);
?>
