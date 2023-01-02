<?php
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
  <title></title>
  <script>
    function date(){
    let date_picker = document.getElementById("dept");
    date_picker.addEventListener('change', findDate);

    function findDate(event)
    {
      let dept_date = event.target.value;
      document.getElementById("arrive").setAttribute("min", dept_date);
    } 
  }
  </script>
</head>

<body onload="date()">
  
<header class = "main-header">
    <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="user_welcome.php">Home</a></li>
        <li><a class="active"  href="#">Search Flights</a></li>
        <li><a href="cancelbooking_u.html">Cancel Booking</a></li>
        <li id = "header-logo-li"><a href="user_welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


<div class="wrapper">
<h1 id = "heading"class = "sign-up-text" style="font-family: raleway;">Search Flights</h1><br>
<form action="search_flight.php" method="post">
  <div class = "button-container">
    <input type = "radio" class="arr-button" onclick="document.getElementById('arrive').disabled = true;
      document.getElementById('return').classList.remove('selected')
      document.getElementById('oneway').classList.add('selected')"
      value="ONEWAY" id="oneway" name="trip">
    <label class = "trip-text" name="trip">ONEWAY</label>
    <input type = "radio" class="arr-button" onclick="document.getElementById('arrive').disabled = false;
      document.getElementById('oneway').classList.remove('selected')
      document.getElementById('return').classList.add('selected')"
      value="RETURN" id="return" name="trip">
    <label class = "trip-text" name="trip">RETURN</label>
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

  Departure: <input id="dept" type="date" name="departdate" required></input><br><br>
  Arrival:   <input type="date" name="arrivedate" id="arrive" required></input><br><br>
  Adults: <input type="number" min="0" name="adults"></input><br><br>
  Childrens: <input type="number" min="0" name="childrens" placeholder="Above 3yrs"></input><br><br>
  Class:   <select name="travel_class">
      <option value="economic">Economic</option>
      <option value="business">Business</option>
    </select><br><br>

  <input type="submit" name = "Submit" value="Search Flights"></input>


</form>
</div>
</body>
</html>
