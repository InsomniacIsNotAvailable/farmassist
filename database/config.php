<?php 

$servername = "localhost";
$username = "root"; 
$password = ""; // Your database password
$dbname = "farmassist"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

?>