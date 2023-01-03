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
        <li><a href="flights.php">Flights</a></li>
        <li><a href="aircrafts.php">Aircrafts</a></li>
        <li><a href="booking.php">Bookings</a></li>
        <li><a href="admin_users.php">Users</a></li>
        <li><a href="addAdmin.html">Add Admin</a></li>
        <li><a class="active" href="feedback.php">Feedback</a></li>
        <li id = "header-logo-li"><a href="welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>

  <span class = "table-heading">Feedback</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM feedback";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='0'>";
  echo "<tr>
  <th>Feedback ID</th>
  <th>Name</th>
  <th>Contact</th>
  <th>Email</th>
  <th>Feedback</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['fe_id']}</td>
    <td>{$row['Name']}</td>
    <td>{$row['mob_no']}</td>
    <td>{$row['Email']}</td>
    <td>{$row['feedback']}</td>
    </tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>
</body>
</html>