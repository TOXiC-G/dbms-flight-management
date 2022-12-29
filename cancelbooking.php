<?php

include 'config.php';

$b_id = $_POST['id'];
$test = "SELECT * FROM bookings WHERE b_id = $b_id";
$result = mysqli_query($conn,$test);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);


if ($count == 0) {
$error = "Booking ID NOT FOUND!!!<br><br>";
echo $error;
header("Refresh:2; url=cancelbooking.html");
}
else{
$sql = "DELETE FROM bookings WHERE b_id = $b_id";
$sql2 = "SELECT Available_seats FROM flights WHERE f_id  = (SELECT f_id FROM BOOKINGS WHERE b_id = $b_id)";
$sqlf_id = "SELECT f_id FROM BOOKINGS WHERE b_id = $b_id";
$sql4 = "SELECT seats_booked FROM bookings where b_id = $b_id";

$result1 = mysqli_query($conn,$sql2);
$result2 = mysqli_query($conn,$sql4);
$result3 = mysqli_query($conn,$sqlf_id);
$available_seats = mysqli_fetch_array($result1);
$seats_booked = mysqli_fetch_array($result2);
$f_id = mysqli_fetch_array($result3);

(int)$updated_seats = (int)$available_seats[0] + (int)$seats_booked[0];

if((!mysqli_query($conn,$sql))){
  echo "Not Canceled!!!";
}
else {
  $sql5 = "UPDATE flights SET Available_seats = $updated_seats WHERE f_id = $f_id[0]";
  $sql3 = "SELECT MAX( `b_id` ) FROM `bookings`";
  $result = mysqli_query($conn, $sql3);
  $max = mysqli_fetch_array($result);
  $auto = "ALTER TABLE `bookings` AUTO_INCREMENT = $max[0]";
  mysqli_query($conn, $auto);
  mysqli_query($conn, $sql5);
  echo "Flight Canceled Successfully!!!";

}

header("Refresh:2; url=booking.php");

mysqli_close($conn);

}

 ?>
