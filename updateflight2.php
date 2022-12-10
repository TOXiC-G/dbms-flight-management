<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "table-pages.css">
  <link rel = "stylesheet" href = "admin.css">
</head>
<body>

  <?php
   $flight_id= $_POST['id'];
    include 'config.php';
  $test = "SELECT * FROM flights WHERE Id = $flight_id";
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
  $sql= "SELECT Name,Source,Destination,Departure,Arrival,Fair_Economic,Fair_Business  FROM flights WHERE Id = $flight_id";
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
        <li><a href="addflight.html">Add Flight</a></li>
        <li><a href="deleteflight.html">Delete Flight</a></li>
        <li><a class="active" href="updateflight.html">Update Flight</a></li>
        <li><a href="cancelbooking.html">Cancel Booking</a></li>
        <li id = "c-name"><img id = "c-img" src = "images/airplane1.png">IndiGo</li>
      </ul>
    </nav>
  </header>


  <div class="wrapper">
    <form action="updateflight3.php" method="post">
      <input name="id" type="hidden" value="<?php echo"$flight_id" ?>">

      Flight Name:   <input type="text" name="name" value="<?php echo $row['Name']; ?>" required ></input><br><br>
      Source <input type="text" name="source" value="<?php echo $row['Source']; ?>" required></input><br><br>
      Destination:  <input type="text"  name="destination" value="<?php echo $row['Destination']; ?>"required></input><br><br>
      Departure:  <input type="date"  name="departure" value="<?php echo $row['Departure']; ?>"required></input><br><br>
      Arrival:  <input type="date"  name="arrival" value="<?php echo $row['Arrival']; ?>" required></input><br><br>
      Economic Fair:  <input type="number"  name="Fair_Economic" value="<?php echo $row['Fair_Economic']; ?>" required></input><br><br>
      Business Fair:  <input type="number"  name="Fair_Business" value="<?php echo $row['Fair_Business']; ?>" required></input><br><br>

      <input type="submit" value="Update Flight"></input>



    </form>
  </div>


</body>
</html>
