<?php
$host = "localhost";  
$user = "root";       
$pass = "";           
$dbname = "neski_gifts"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
