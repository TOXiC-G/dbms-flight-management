<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "admin.css">
  <script>
    function date(){
    let date_picker_arrive = document.getElementById("arrive");
    date_picker_arrive.addEventListener('click', findDate);

    function findDate(event)
    {
      let date_picker = document.getElementById("dept");
      let dept_date = date_picker.value;
      event.target.setAttribute("min", dept_date);
    } 
  }
  </script>
</head>

<body onload="date()">


  <?php
    $flight_id= $_POST['id'];
    include 'config.php';
    $test = "SELECT * FROM flights WHERE f_id = $flight_id";
    $result = mysqli_query($conn,$test);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$active = $row['active'];

    $count = mysqli_num_rows($result);


if ($count == 0) {
  $error = "Flight ID NOT FOUND!!!<br><br>";
  echo $error;
  header("Refresh:2; url=updateflight.html");
}
else{
  $sql= "SELECT f_id, a_id, Source,Destination,Departure,Arrival,Fare_Economic,Fare_Business  FROM flights WHERE f_id = $flight_id";
  $res=mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($res);
  mysqli_close($conn);
}
   ?>

  <header class = "main-header">
  <nav class = "nav main-nav">
      <ul>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="welcome.php">Home</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a href="addflighthtml.php">Add Flight</a></li>
        <li><a href="deleteflight.html">Delete Flight</a></li>
        <li><a class="active" href="updateflight.html">Update Flight</a></li>
        <li id = "header-logo-li"><a href="flights.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


  <div class="wrapper">
    <form action="updateflight3.php" method="post">
      Flight ID:   <input type="text" readonly="readonly" name="f_id" value="<?php echo $row['f_id'];?>"></input><br><br>
      Aircraft ID <input type="text" name="a_id" value="<?php echo $row['a_id']; ?>" required></input><br><br>
      Source <input type="text" name="source" value="<?php echo $row['Source']; ?>" required></input><br><br>
      Destination:  <input type="text"  name="destination" value="<?php echo $row['Destination']; ?>"required></input><br><br>
      Departure:  <input id="dept" type="date"  name="departure" value="<?php echo $row['Departure']; ?>"required></input><br><br>
      Arrival:  <input id="arrive" type="date"  name="arrival" value="<?php echo $row['Arrival']; ?>" required></input><br><br>
      Economic Fair:  <input type="number"  name="Fair_Economic" value="<?php echo $row['Fare_Economic']; ?>" required></input><br><br>
      Business Fair:  <input type="number"  name="Fair_Business" value="<?php echo $row['Fare_Business']; ?>" required></input><br><br>
      <input type="submit" value="Update Flight"></input>



    </form>
  </div>


</body>
</html>
