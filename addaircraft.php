<?php

include 'config.php';

$model = $_POST['model'];

$sql = "INSERT INTO aircraft_details(a_id, model) VALUES (NULL, '$model')";



if((!mysqli_query($conn,$sql))){
  echo "Not Added!!!, Please check that the details are entered correctly";
}
else {
  echo "Aircraft Added!!!";

}

header("Refresh:3; url=aircrafts.php");

mysqli_close($conn);



?>





