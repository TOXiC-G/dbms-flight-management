<?php

$u_id = $_POST['id'];

$sql2 = "DELETE FROM users WHERE user_id = $u_id";



if(!mysqli_query($conn,$sql2)){
  echo "Not Deleted!!!";
}
else {
  $sql3 = "SELECT MAX( `a_id` ) FROM `users`";
  $result = mysqli_query($conn, $sql3);
  $max = mysqli_fetch_array($result);
  $auto = "ALTER TABLE `users` AUTO_INCREMENT = $max[0]";
  mysqli_query($conn, $auto);
  echo "User Deleted!!!";
}


header("Refresh:3; url=admin_users.php");

mysqli_close($conn);



 ?>
