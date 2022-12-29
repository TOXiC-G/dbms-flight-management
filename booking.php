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
            <li><a class="active" href="booking.php">Bookings</a></li>
            <li><a href="cancelbooking.html">Cancel Booking</a></li>
            <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>
    
    <span class = "table-heading">Bookings</span><br>
    <?php

    include 'config.php';

      $sql = "SELECT * FROM bookings";

      $result = mysqli_query($conn,$sql);

      echo"<table border ='1'>";
      echo "<tr>
      <th>Booking ID</th>
      <th>User ID</th>
      <th>Flight ID</th>
      <th>Seats Booked</th>
      <th>Total Cost</th>
      </tr>";

      while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
          <td>{$row['b_id']}</td>
          <td>{$row['user_id']}</td>
          <td>{$row['f_id']}</td>
          <td>{$row['seats_booked']}</td>
          <td>{$row['total_cost']}</td>
        </tr>";

      }
      echo "</table>";

      mysqli_close($conn);

    ?>
</body>
</html>