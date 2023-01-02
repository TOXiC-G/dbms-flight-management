<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
  <link rel = "stylesheet" href = "table-pages.css">
  <link rel = "stylesheet" href = "admin.css">
</head>
<body>

  <?php
    $id= $_POST['id'];
    include 'config.php';
    $test = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conn,$test);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$active = $row['active'];

    $count = mysqli_num_rows($result);


if ($count == 0) {
  $error = "User ID NOT FOUND!!!<br><br>";
  echo $error;
  header("Refresh:2; url=updateUsers.html");
}
else{
  $sql= "SELECT * FROM users WHERE user_id = $id";
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
        <li><a href="admin_users.php">Users</a></li>
        <li><a href="delete_users.html">Delete Users</a></li>
        <li><a class = "active" href="updateUsers.html">Update Users</a></li>
        <li id = "header-logo-li"><a href="welcome.php"> <img id = "header-logo" src="images/header-logo.png"></a></li>
      </ul>
    </nav>
  </header>


  <div class="wrapper">
    </form>

    <form action="updateusers3.php" method="post">

        User ID: <input type="text" name="user_id" value="<?php echo $row['user_id']; ?>" readonly = "readonly" required></input><br><br>
        Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required></input><br><br>
        Password: <input type="password" name="password" value="<?php echo $row['password']; ?>" required></input><br><br>
        First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required></input><br><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required></input><br><br>
        Email: <input type="text" name="Email" value="<?php echo $row['Email']; ?>" required></input><br><br>

    <input type="submit" value="Update"></input>


  </form>
  </div>


</body>
</html>
