<?php

include 'config.php';

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$Email = $_POST['Email'];

$sql = "UPDATE users SET username = '$username', password = '$password', first_name = '$first_name', last_name = '$last_name', Email = '$Email' WHERE user_id = '$user_id'";



if((!mysqli_query($conn,$sql))){
  echo "Not Updated!!!";
}
else {
  echo "User Updated Successfully!!!";

}

header("Refresh:2; url=updateUsers.html");

mysqli_close($conn);



 ?>
