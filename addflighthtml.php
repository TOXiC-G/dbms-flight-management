<?php
  include 'config.php';
  $sql = 'SELECT * FROM aircraft_details';
  $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "admin.css">
  <link rel = "stylesheet" href = "styles.css">
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
        <li><a href="welcome.php">Home</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a class="active"  href="addflighthtml.php">Add Flight</a></li>
        <li><a href="deleteflight.html">Delete Flight</a></li>
        <li><a href="updateflight.html">Update Flight</a></li>
        <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
</header>


  <div class="wrapper">
    <form action="addflight.php" method="post">

      Aircraft Id:<select name="a-id" id="a-id" placeholder = "">
        <?php
        while ($row = mysqli_fetch_array($result))
        {
          echo "<option class = \"options\" value='".$row['a_id']."'>".$row['a_id']."</option>";
        }
      ?>
      </select>
      <br><br>
      Source <input type="text" name="source" required></input><br><br>
      Destination:  <input type="text"  name="destination" required></input><br><br>
      Departure:  <input id="dept" type="date"  name="departure" required></input><br><br>
      Arrival:  <input id="arrive" type="date"  name="arrival" required></input><br><br>
      Economic Fair:  <input type="number"  name="fare_economic" required></input><br><br>
      Business Fair:  <input type="number"  name="fare_business" required></input><br><br>
      Available Seats:  <input type="number"  name="Available_seats" required></input><br><br>
      <input type="submit" value="Add Flight"></input>



    </form>
  </div>


</body>
</html>
