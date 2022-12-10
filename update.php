<?php
include 'config.php';

$flight_id = $_POST['flight_id'];
$total_cost = $_POST['price'];
$total_passengers = $_POST['total_passengers'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mob_no = $_POST['mob_no'];
$email = $_POST['email'];

$sql = "INSERT INTO users (FirstName,LastName, MobileNo, Email, Flight_Id, Seats_booked ,Total_Cost) VALUES ('$firstname','$lastname','$mob_no','$email','$flight_id','$total_passengers','$total_cost')";

$result = mysqli_query($conn,$sql);

$sql = "SELECT Available_seats FROM flights WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
$updated_seats = $row['Available_seats'] - $total_passengers;

$sql = "UPDATE flights SET Available_seats= $updated_seats WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);
echo "<span class =\"content\">Table Updated<br><br></span>";

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <link rel = "stylesheet" href = "styles.css">
<style>
.button {
    border:none;
    text-align: center;
    background-color:rgb(37, 64, 153);
    color:white;
    text-decoration: none;
    display:flex;
    justify-content:center;
    font-family:raleway;
    padding: 10px;
    font-size: 16px;
    margin-left:40%;
    margin-right:40%;
    border-radius: 6px;
}

.content{
    font-family:raleway;
    size:5rem;
    color:white;
    display:flex;
    justify-content:center;
    text-shadow: 2px 2px rgba(0,0,0,.6);
}
</style>
</head>
<body>
<!-- <span class = "content">Updated Succesfully</span> -->
<a href="website.php" class="button">Home</a>


</body>
</html>
