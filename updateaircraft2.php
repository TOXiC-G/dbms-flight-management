<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "table-pages.css">
  <link rel = "stylesheet" href = "admin.css">
</head>
<body>

  <?php
    $a_id= $_POST['id'];
    include 'config.php';
    $test = "SELECT * FROM aircraft_details WHERE a_id = $a_id";
    $result = mysqli_query($conn,$test);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$active = $row['active'];

    $count = mysqli_num_rows($result);


if ($count == 0) {
  $error = "Aircraft ID NOT FOUND!!!<br><br>";
  echo $error;
  header("Refresh:2; url=updateaircraft.html");
}
else{
  $sql= "SELECT a_id, model  FROM aircraft_details WHERE a_id = $a_id";
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
            <li><a href="aircrafts.php">Aircraft</a></li>
            <li><a href="addaircrafthtml.php">Add Aircraft</a></li>
            <li><a href="deleteaircraft.html">Delete Aircraft</a></li>
            <li><a class="active" href="updateaircraft.html">Update Aircraft</a></li>
            <li id = "header-logo-li"><a href="aircrafts.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>


  <div class="wrapper">
    <form action="updateaircraft3.php" method="post">
      Aircraft ID: <input type="text" readonly= "readonly" name="a_id" value="<?php echo $row['a_id']; ?>" required></input><br><br>
      Model: <input type="text" name="model" value="<?php echo $row['model']; ?>" required></input><br><br>
      <input type="submit" value="Update Flight"></input>



    </form>
  </div>


</body>
</html>
