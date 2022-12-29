<?php

include 'config.php';

$f_id = $_POST['f_id'];
$a_id = $_POST['a_id'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$fair_economic = $_POST['Fair_Economic'];
$fair_business = $_POST['Fair_Business'];

$sql = "UPDATE flights SET a_id='$a_id',Source='$source',Destination='$destination',Departure='$departure',Arrival='$arrival',Fare_Economic='$fair_economic',Fare_Business='$fair_business' WHERE f_id = '$f_id'";



if((!mysqli_query($conn,$sql))){
  echo "Not Updated!!!";
}
else {
  echo "Flight Updated Successfully!!!";

}

header("Refresh:2; url=updateflight.html");

mysqli_close($conn);



 ?>
