<<?php

include 'config.php';

$id = $_POST['id'];

$sql2 = "DELETE FROM flights WHERE f_id = $id";



if(!mysqli_query($conn,$sql2)){
  echo "Not Deleted!!!";
}
else {
  $sql3 = "SELECT MAX( `f_id` ) FROM `flights`";
  $result = mysqli_query($conn, $sql3);
  $max = mysqli_fetch_array($result);
  $auto = "ALTER TABLE `flights` AUTO_INCREMENT = $max[0]";
  mysqli_query($conn, $auto);
  echo "Flight Deleted!!!";
}


header("Refresh:3; url=flights.php");

mysqli_close($conn);



 ?>
