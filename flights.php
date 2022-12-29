<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "table-pages.css">
    <link rel = "stylesheet" href = "styles.css">
    <title>Document</title>
</head>
<body>
    <header class = "main-header">
        <nav class = "nav main-nav">
          <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="welcome.php">Home</a></li>
            <li><a class="active" href="flights.php">Flights</a></li>
            <li><a href="addflighthtml.php">Add Flight</a></li>
            <li><a href="deleteflight.html">Delete Flight</a></li>
            <li><a href="updateflight.html">Update Flight</a></li>
            <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>


  <span class = table-heading>FLIGHTS</span><br>

  <?php

  include 'config.php';

  $sql = "SELECT * FROM flights";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>Id</th>
  <th>Aircraft ID</th>
  <th>Source</th>
  <th>Destination</th>
  <th>Departure</th>
  <th>Arrival</th>
  <th>Economic Fare</th>
  <th>Business Fare</th>
  <th>Available_seats</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
      <td>{$row['f_id']}</td>
      <td>{$row['a_id']}</td>
      <td>{$row['Source']}</td>
      <td>{$row['Destination']}</td>
      <td>{$row['Departure']}</td>
      <td>{$row['Arrival']}</td>
      <td>{$row['Fare_Economic']}</td>
      <td>{$row['Fare_Business']}</td>
      <td>{$row['Available_seats']}</td>
    </tr>";
  }
  echo "</table>";


  mysqli_close($conn);

  ?>
</body>
</html>