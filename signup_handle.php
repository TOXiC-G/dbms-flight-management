<?php

// initializing variables
$username = "";
$errors = array();

 include 'config.php';

  $username = $_POST['username'];
  $password_1 = $_POST['password1'];
  $password_2 = $_POST['password2'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");

  }
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE Username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, password, first_name, last_name, email)
  			  VALUES('$username','$password', '$first_name', '$last_name', '$email')";
  	mysqli_query($conn, $query);

    echo "Account Created. Please login again.";

    header("Refresh:2; url= user.html");
  }
  else {
    $arrlength = count($errors);

    for($x = 0; $x < $arrlength; $x++) {
        echo $errors[$x];
        echo "<br>";
        header("Refresh:2; url= signup.html");
      }

    }
// ...
