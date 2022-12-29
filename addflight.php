<?php

include 'config.php';

$a_id = $_POST['a-id'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$fare_economic = $_POST['fare_economic'];
$fare_business = $_POST['fare_business'];
$Available_seats = $_POST['Available_seats'];

$sql = "INSERT INTO flights(f_id, a_id, Source, Destination, Departure, Arrival, Fare_Economic, Fare_Business, Available_seats) VALUES ('NULL', '$a_id', '$source', '$destination', '$departure', '$arrival', '$fare_economic', '$fare_business', '$Available_seats')";



if((!mysqli_query($conn,$sql))){
  echo "Not Added!!!, Please check that the details are entered correctly";
}
else {
  echo "Flight Added!!!";

}

$sql1 = "INSERT IGNORE INTO cities (Name) VALUES('$source')";
$sql2 = "INSERT IGNORE INTO cities (Name) VALUES('$destination')";
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);

header("Refresh:3; url=flights.php");

mysqli_close($conn);



?>





