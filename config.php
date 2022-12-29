<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "flight_db1";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/* echo "Connected successfully<br>"; */
?>
