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
        <li><a class="active" href="website.php">Home</a></li>
        <li><a href="signup.html">Sign Up</a></li>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="about.html">About</a></li>
        <li id = "c-name"><a id = "c-text" href = "website.php"><img id = "c-img" src = "images/airplane1.png">IndiGo</a></li>  
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
  $total_passengers = $adults + $childrens;

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
echo "<tr><th>Id</th><th>Name</th><th>Source</th><th>Destination</th><th>Fare</th><th>Action</th></tr>";
if ($trip_class == 'economic') {

  if ($trip == 'ONEWAY') {

  while ($row = mysqli_fetch_assoc($result)) {
    $price = $row['Fair_Economic']*$adults+0.5*$row['Fair_Economic']*$childrens;
    $id = $row['Id'];

  echo "<tr>
    <td>{$row['Id']}</td>
    <td>{$row['Name']}</td>
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
      $price_temp = $row['Fair_Economic']*$adults+0.5*$row['Fair_Economic']*$childrens;
      $price = $price_temp*2;
      $id = $row['Id'];

    echo "<tr>
      <td>{$row['Id']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Source']}</td>
        <td>{$row['Destination']}</td>
        <td>{$price}</td>
        <td>
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
    $price = $row['Fair_Business']*$adults+0.5*$row['Fair_Business']*$childrens;
    $id = $row['Id'];
    echo "<tr>
      <td>{$row['Id']}</td>
      <td>{$row['Name']}</td>
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
      $price_temp = $row['Fair_Business']*$adults+0.5*$row['Fair_Business']*$childrens;
      $price = $price_temp*2;
      $id = $row['Id'];
      echo "<tr>
      <td>{$row['Id']}</td>
        <td>{$row['Name']}</td>
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
