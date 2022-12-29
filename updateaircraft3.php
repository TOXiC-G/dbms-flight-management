<?php

include 'config.php';

$a_id = $_POST['a_id'];
$model = $_POST['model'];

$sql = "UPDATE aircraft_details SET model = '$model' WHERE a_id = '$a_id'";



if((!mysqli_query($conn,$sql))){
  echo "Not Updated!!!";
}
else {
  echo "Aircraft Updated Successfully!!!";

}

header("Refresh:2; url=updateaircraft.html");

mysqli_close($conn);



 ?>
