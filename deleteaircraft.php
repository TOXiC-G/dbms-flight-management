<?php

include 'config.php';

$a_id = $_POST['id'];

$sql2 = "DELETE FROM aircraft_details WHERE a_id = $a_id";



if(!mysqli_query($conn,$sql2)){
  echo "Not Deleted!!!";
}
else {
  $sql3 = "SELECT MAX( `a_id` ) FROM `aircraft_details`";
  $result = mysqli_query($conn, $sql3);
  $max = mysqli_fetch_array($result);
  $auto = "ALTER TABLE `aircraft_details` AUTO_INCREMENT = $max[0]";
  mysqli_query($conn, $auto);
  echo "Aircraft Deleted!!!";
}


header("Refresh:3; url=aircrafts.php");

mysqli_close($conn);



 ?>
