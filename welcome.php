<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "table-pages.css">
</head>
<body>
  <header class = "main-header">
    <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a class="active" href="welcome.php">Home</a></li>
        <li><a href="addflight.html">Add Flight</a></li>
        <li><a href="deleteflight.html">Delete Flight</a></li>
        <li><a href="updateflight.html">Update Flight</a></li>
        <li><a href="cancelbooking.html">Cancel Booking</a></li>
        <li id = "c-name"><img id = "c-img" src = "images/airplane1.png">IndiGo</li>
      </ul>
    </nav>
  </header>

  <span class = table-heading>FLIGHTS</span><br>


  <<?php

  include 'config.php';

  $sql = "SELECT * FROM flights";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>Id</th>
  <th>Name</th>
  <th>Source</th>
  <th>Destination</th>
  <th>Departure</th>
  <th>Arrival</th>
  <th>Fair_Economic</th>
  <th>Fair_Business</th>
  <th>Available_seats</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['Id']}</td>
    <td>{$row['Name']}</td>
    <td>{$row['Source']}</td>
    <td>{$row['Destination']}</td>
    <td>{$row['Departure']}</td>
    <td>{$row['Arrival']}</td>
    <td>{$row['Fair_Economic']}</td>
    <td>{$row['Fair_Business']}</td>
    <td>{$row['Available_seats']}</td>
    </tr>";

  }
  echo "</table>";


  mysqli_close($conn);

  ?>

  <span class = "table-heading">USERS</span><br>
  <<?php

  include 'config.php';

  $sql = "SELECT * FROM users";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>UserId</th>
  <th>FirstName</th>
  <th>LastName</th>
  <th>MobileNo</th>
  <th>Email</th>
  <th>Flight_Id</th>
  <th>Seats_booked</th>
  <th>Total_Cost</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['UserId']}</td>
    <td>{$row['FirstName']}</td>
    <td>{$row['LastName']}</td>
    <td>{$row['MobileNo']}</td>
    <td>{$row['Email']}</td>
    <td>{$row['Flight_Id']}</td>
    <td>{$row['Seats_booked']}</td>
    <td>{$row['Total_Cost']}</td>
    </tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>

</body>
</html>
