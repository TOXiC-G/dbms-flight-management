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
            <li><a class="active" href="admin_users.php">Users</a></li>
            <li><a href="delete_users.html">Delete Users</a></li>
            <li><a href="updateUsers.html">Update Users</a></li>
            <li id = "header-logo-li"><a href="admin_users.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
          </ul>
        </nav>
    </header>


  <span class = "table-heading">USERS</span><br>
  <?php

  include 'config.php';

  $sql = "SELECT * FROM users";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr>
  <th>UserId</th>
  <th>Username</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email</th>
  </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>{$row['user_id']}</td>
    <td>{$row['username']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['Email']}</td>
    </tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>
</body>
</html>