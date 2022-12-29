<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

include 'config.php';
$username = $_SESSION["login_user"];
$b_id = $_POST['id'];
$user = "SELECT user_id FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $user);
$user_id = mysqli_fetch_array($result);
$test = "SELECT * FROM bookings WHERE b_id = $b_id AND user_id = $user_id[0]";
$result = mysqli_query($conn,$test);
$row = mysqli_fetch_array($result);

$count = mysqli_num_rows($result);


if ($count == 0) {
$error = "Booking ID Does not exist OR Does not belong to Username : $username<br><br>";
echo $error;
header("Refresh:2; url=cancelbooking_u.html");
}
else{
$sql = "DELETE FROM bookings WHERE b_id = $b_id AND user_id = $user_id[0]";
if((!mysqli_query($conn,$sql))){
  echo "Not Canceled!!!";
}
else {
  $sql3 = "SELECT MAX( `b_id` ) FROM `bookings`";
  $result = mysqli_query($conn, $sql3);
  $max = mysqli_fetch_array($result);
  $auto = "ALTER TABLE `bookings` AUTO_INCREMENT = $max[0]";
  mysqli_query($conn, $auto);
  echo "Flight Cancelled Successfully!!!";

}

header("Refresh:2; url=user_welcome.php");

mysqli_close($conn);

}

 ?>
