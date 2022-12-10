<<?php
include 'config.php';
$sql = "SELECT * FROM cities";
$result = mysqli_query($conn,$sql);
$result2 = mysqli_query($conn,$sql);


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
        <li><a class="active" href="website.php">Home</a></li>
        <li><a href="signup.html">Sign Up</a></li>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id = "c-name"><img id = "c-img" src = "images/airplane1.png">IndiGo</li>
        <li><a href="about.html">About</a></li>
      </ul>
    </nav>
  </header>


<div class="wrapper">
<h1 class = "sign-up-text" style="font-family: raleway;">Search Flights</h1><br>
<form action="search_flight.php" method="post">
  <div class = "button-container">
    <button class="arr-button" onclick="document.getElementById('arrive').disabled = true;
      document.getElementById('return').classList.remove('selected')
      document.getElementById('oneway').classList.add('selected')"
      name="trip" value="oneway" id="oneway">ONEWAY
    <button class="arr-button" onclick="document.getElementById('arrive').disabled = false;
      document.getElementById('oneway').classList.remove('selected')
      document.getElementById('return').classList.add('selected')" 
      name="trip" value="return" id="return">RETURN
  </div>
  <br>
  
  Source:
  <select name="source">
    <?php
    while ($row = mysqli_fetch_array($result))
    {
        echo "<option class = \"options\" value='".$row['Name']."'>".$row['Name']."</option>";
    }
    ?>
  </select><br><br>
  Destination:
  <select name="destination">
    <?php
    while ($test = mysqli_fetch_array($result2))
    {
        echo "<option value='".$test['Name']."'>".$test['Name']."</option>";
    }
    ?>
  </select><br><br>

  Departure: <input type="date" name="departdate" id="dept" required></input><br><br>
  Arrival:   <input type="date" name="arrivedate" id="arrive" required></input><br><br>
  Adults: <input type="number" min="0" name="adults"></input><br><br>
  Childrens: <input type="number" min="0" name="childrens" placeholder="Above 3yrs"></input><br><br>
  Class:   <select name="travel_class">
      <option value="economic">Economic</option>
      <option value="business">Business</option>
    </select><br><br>

  <input type="submit" value="Search Flights"></input>


</form>
</div>
</body>
</html>
