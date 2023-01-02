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
            <li><a href="welcome.php">Home</a></li>
            <li><a class="active" href="aircrafts.php">Aircraft</a></li>
            <li><a href="addaircrafthtml.php">Add Aircraft</a></li>
            <li><a href="deleteaircraft.html">Delete Aircraft</a></li>
            <li><a href="updateaircraft.html">Update Aircraft</a></li>
            <li id = "header-logo-li"><a href="aircrafts.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>


  <span class = "table-heading">AIRCRAFT</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM aircraft_details";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>Aircraft ID</th>
  <th>Aircraft Model</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "
    <tr>
      <td>{$row['a_id']}</td>
      <td>{$row['model']}</td>
    </tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>
</body>
</html>