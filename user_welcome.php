<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'config.php';?>
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
        <li><a class="active" href="#">Home</a></li>
        <li><a href="website.php">Search Flights</a></li>
        <li><a href="cancelbooking_u.html">Cancel Booking</a></li>
        <li id = "header-logo-li"><a href="user_welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>

  <?php
    $username = $_SESSION['login_user'];
    echo "<span class = \"table-heading\">Hello ".$username.",</span><br>";
    echo "<span class = \"table-heading\">YOUR BOOKINGS</span><br>";
    $sql = "SELECT b_id, f_id, seats_booked, total_cost FROM bookings NATURAL JOIN users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);
    echo"
    <table border =none >
    <tr> 
      <th>Booking ID</th> 
      <th>Flight ID</th> 
      <th>Seats Booked</th> 
      <th>Total Cost</th> 
    </tr>
    ";
    while($row = mysqli_fetch_assoc($res))
    {
      echo"
      <tr> 
      <td>{$row['b_id']}</td> 
      <td>{$row['f_id']}</td> 
      <td>{$row['seats_booked']}</td> 
      <td>{$row['total_cost']}</td> 
      </tr>
      ";
    }

    echo "</table>";
  ?>
</body>
</html>