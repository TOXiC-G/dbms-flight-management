<!DOCTYPE html>
<html>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "table-pages.css">
<head>

</head>
<body>

<header class = "main-header">
    <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="user_welcome.php">Home</a></li>
        <li><a class="active" href="website.php">Search Flights</a></li>
        <li><a href="cancelbooking_u.html">Cancel Booking</a></li>
        <li id = "header-logo-li"><a href="user_welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


<?php

include 'config.php';
/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $arrival = null;
  $source = $_POST["source"];
  $destination = $_POST["destination"];
  $departure = $_POST["departdate"];
  $trip = $_POST["trip"];
  if ($trip == 'RETURN') {
    $arrival = $_POST["arrivedate"];
  }
  $adults = $_POST["adults"];
  $childrens = $_POST["childrens"];
  $trip_class = $_POST['travel_class'];
  $total_passengers = (int)$adults + (int)$childrens;

}
if($trip == 'ONEWAY'){
$sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure'>=Departure AND Available_seats>0 ";
$result = mysqli_query($conn,$sql);
}
else {
  $sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure'>=Departure AND '$arrival'<=Arrival AND Available_seats>0 ";
  $result = mysqli_query($conn,$sql);
}

echo"<table border ='1'>";
echo "<tr><th>Flight ID</th><th>Aicraft ID</th><th>Source</th><th>Destination</th><th>Fare</th><th>Action</th></tr>";
if ($trip_class == 'economic') {

  if ($trip == 'ONEWAY') {

  while ($row = mysqli_fetch_assoc($result)) {
    $price = (int)$row['Fare_Economic']*(int)$adults+(1/2)*(int)$row['Fare_Economic']*(int)$childrens;
    $id = $row['f_id'];

  echo "<tr>
    <td>{$row['f_id']}</td>
    <td>{$row['a_id']}</td>
    <td>{$row['Source']}</td>
    <td>{$row['Destination']}</td>
    <td>{$price}</td><td>
      <form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
        <input name=\"Id\" type=\"hidden\" value=\"$id\">
        <input name=\"price\" type=\"hidden\" value=\"$price\">
        <input name=\"total_passengers\" type=\"hidden\" value=\"$total_passengers\">
        <input class =\"book-button\"name=\"submit\" type=\"submit\" value=\"Book\">
      </form>
    </td>
  </tr>";

    }

  }
  else {
    while ($row = mysqli_fetch_assoc($result)) {
      $price_temp = (int)$row['Fare_Economic']*(int)$adults+(1/2)*(int)$row['Fare_Economic']*(int)$childrens;
      $price = $price_temp*2;
      $id = $row['f_id'];

    echo "<tr>
        <td>{$row['f_id']}</td>
        <td>{$row['a_id']}</td>
        <td>{$row['Source']}</td>
        <td>{$row['Destination']}</td>
        <td>{$price}</td><td>
          <form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
            <input name=\"Id\" type=\"hidden\" value=\"$id\">
            <input name=\"price\" type=\"hidden\" value=\"$price\">
            <input name=\"total_passengers\" type=\"hidden\" value=\"$total_passengers\">
            <input class =\"book-button\"name=\"submit\" type=\"submit\" value=\"Book\">
          </form>
      </td>
    </tr>";

      }

  }
}
else {

  if ($trip == 'oneway') {

  while ($row = mysqli_fetch_assoc($result)) {
    $price = (int)$row['Fare_Business']*(int)$adults+(1/2)*(int)$row['Fare_Business']*(int)$childrens;
    $id = $row['f_id'];
    echo "<tr>
      <td>{$row['f_id']}</td>
      <td>{$row['a_id']}</td>
      <td>{$row['Source']}</td>
      <td>{$row['Destination']}</td>
      <td>{$price}</td>
      <td>
        <form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
          <input name=\"Id\" type=\"hidden\" value=\"$id\">
          <input name=\"price\" type=\"hidden\" value=\"$price\">
          <input name=\"total_passengers\" type=\"hidden\" value=\"$total_passengers\">
          <input class =\"book-button\"name=\"submit\" type=\"submit\" value=\"Book\">
        </form></td>
    </tr>";
    }
  }
  else {
    while ($row = mysqli_fetch_assoc($result)) {
      $price_temp = (int)$row['Fare_Business']*(int)$adults+(1/2)*(int)$row['Fare_Business']*(int)$childrens;
      $price = $price_temp*2;
      $id = $row['f_id'];
      echo "<tr>
        <td>{$row['f_id']}</td>
        <td>{$row['a_id']}</td>
        <td>{$row['Source']}</td>
        <td>{$row['Destination']}</td>
        <td>{$price}</td><td>
          <form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
            <input name=\"Id\" type=\"hidden\" value=\"$id\">
            <input name=\"price\" type=\"hidden\" value=\"$price\">
            <input name=\"total_passengers\" type=\"hidden\" value=\"$total_passengers\">
            <input class =\"book-button\"name=\"submit\" type=\"submit\" value=\"Book\">
        </form></td>
      </tr>";
      }
  }
}
echo "</table>";

mysqli_close($conn);

 ?>

</body>
</html>
