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
        <li><a href="website.php">Home</a></li>
        <li><a href="signup.html">Sign Up</a></li>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="about.html">About</a></li>
        <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


<div class="wrapper">
<form action="update.php" method="post">
  <input type="hidden" name="flight_id" value="<?php echo "$id"?>"></input>
  <input type="hidden" name="price" value="<?php echo "$price"?>"></input>
  <input type="hidden" name="total_passengers" value="<?php echo "$total_passengers"?>"></input>

  First Name:  <input type="text" name="firstname" required></input><br><br>
  Last Name:   <input type="text" name="lastname" required ></input><br><br>
  Mobile No: <input type="number" maxlength="10" name="mob_no" required></input><br><br>
  Email Id:  <input type="email" placeholder="Enter email..." name="email" required></input><br><br>

  <input type="submit" value="Book Flight"></input>


</form>
</div>









</body>
</html>
