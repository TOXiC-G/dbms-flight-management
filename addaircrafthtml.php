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
</head>
<body>

    <header class = "main-header">
        <nav class = "nav main-nav">
          <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="aircrafts.php">Aircraft</a></li>
            <li><a class="active" href="addaircrafthtml.php">Add Aircraft</a></li>
            <li><a href="deleteaircraft.html">Delete Aircraft</a></li>
            <li><a href="updateaircraft.html">Update Aircraft</a></li>
            <li id = "header-logo-li"><a href="website.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>


  <div class="wrapper">
    <form action="addaircraft.php" method="post">
        <?php
            include 'config.php';
            $sql = 'SELECT MAX(a_id) FROM aircraft_details';
            $result = mysqli_query($conn, $sql);
            $max = mysqli_fetch_array($result);
            $length = count($max);
            $max[0] += 1;
            echo "Aircraft ID: <input type= \"text\" name= \"a_id\" disabled value = \"$max[0]\"></input><br><br>";
        ?>
        Aircraft Model:  <input type="text"  name="model" required></input><br><br>
      <input type="submit" value="Add Aircraft"></input>
    </form>
  </div>


</body>
</html>
