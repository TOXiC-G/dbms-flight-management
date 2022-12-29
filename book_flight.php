<?php

$id = $_POST['Id'];
$price = $_POST['price'];
$total_passengers = $_POST['total_passengers'];


 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "admin.css">
</head>
<body>


<header class = "main-header">
    <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="user_welcome.php">Home</a></li>
        <li><a class="active" href="website.php">Search Flights</a></li>
        <li><a href="cancelbooking_u.html">Cancel Booking</a></li>
        <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


<div class="wrapper">
<form action="update.php" method="post">
  <input type="hidden" name="flight_id" value="<?php echo "$id"?>"></input>
  <input type="hidden" name="price" value="<?php echo "$price"?>"></input>
  <input type="hidden" name="total_passengers" value="<?php echo "$total_passengers"?>"></input>

  <span id = "sure">Are you sure you want to book this flight?</span>

  <input type="submit" value="Book Flight"></input>
  <button type = "button" onclick="window.open('website.php','_self');" class = "no-button">Return</button>


</form>
</div>









</body>
</html>
