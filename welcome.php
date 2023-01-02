<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "table-pages.css">
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "admin.css">
  <title>Home</title>
</head>
<body>
  <header class = "main-header">
    <!-- <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a class="active" href="welcome.php">Home</a></li>
        <li><a href="addflight.html">Add Flight</a></li>
        <li><a href="deleteflight.html">Delete Flight</a></li>
        <li><a href="updateflight.html">Update Flight</a></li>
        <li><a href="cancelbooking.html">Cancel Booking</a></li>
        <li><a href="addAdmin.html">Add Admin</a></li>
        <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav> -->

    <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a class="active" href="welcome.php">Home</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a href="aircrafts.php">Aircrafts</a></li>
        <li><a href="booking.php">Bookings</a></li>
        <li><a href="admin_users.php">Users</a></li>
        <li><a href="addAdmin.html">Add Admin</a></li>
        <li id = "header-logo-li"><a href="welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>

  <span class = table-heading>FLIGHTS</span><br>

  <?php

  include 'config.php';

  $sql = "SELECT * FROM flights ORDER BY f_id DESC LIMIT 5";

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

  echo"
  <tr>
    <td class=\"last-row\" colspan=\"9\" align=\"center\"> 
      <button onclick = \"window.location.href = 'flights.php'\" class = \"show-more arr-button\" type = \"button\">Show more</button>
    </td>
  </tr>";
  echo "</table>";


  mysqli_close($conn);

  ?>

  <span class = "table-heading">USERS</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT 5";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>UserId</th>
  <th>Username</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['user_id']}</td>
    <td>{$row['username']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['Email']}</td>
    </tr>";

  }
  echo"
  <tr>
    <td class=\"last-row\" colspan=\"9\" align=\"center\"> 
      <button onclick = \"window.location.href = 'admin_users.php'\" class = \"show-more arr-button\" type = \"button\">Show more</button>
    </td>
  </tr>";
  echo "</table>";

  mysqli_close($conn);

  ?>

  <span class = "table-heading">AIRCRAFT</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM aircraft_details ORDER BY a_id DESC LIMIT 5";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>Aircraft ID</th>
  <th>Aircraft Model</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
      <td>{$row['a_id']}</td>
      <td>{$row['model']}</td>
    </tr>";

  }
  echo"
  <tr>
    <td class=\"last-row\" colspan=\"9\" align=\"center\"> 
      <button onclick = \"window.location.href = 'aircrafts.php'\" class = \"show-more arr-button\" type = \"button\">Show more</button>
    </td>
  </tr>";
  echo "</table>";

  mysqli_close($conn);

  ?>

  <span class = "table-heading">BOOKINGS</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM bookings ORDER BY b_id DESC LIMIT 5";

  $result = mysqli_query($conn,$sql);

  echo"<table class = \"last-table\" border ='1'>";
  echo "<tr>
  <th>Booking_ID</th>
  <th>User ID</th>
  <th>Seats Booked</th>
  <th>Total Cost</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
      <td>{$row['b_id']}</td>
      <td>{$row['user_id']}</td>
      <td>{$row['seats_booked']}</td>
      <td>{$row['total_cost']}</td>
    </tr>";

  }
  echo"
  <tr>
    <td class=\"last-row\" colspan=\"9\" align=\"center\"> 
      <button onclick = \"window.location.href = 'booking.php'\" class = \"show-more arr-button\" type = \"button\">Show more</button>
    </td>
  </tr>";
  echo "</table>";

  mysqli_close($conn);

  ?>

</body>
</html>
