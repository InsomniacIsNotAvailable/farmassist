<?php 
include 'config.php';



// Retrieve form data
$username = $_POST['signup_username'];
$email = $_POST['signup_email'];
$contactno = $_POST['signup_contactno'];
$password = $_POST['signup_rawpassword'];

// Insert data into the database
$sql = "INSERT INTO users (UserName, ContactNo, Email, password) 
VALUES ('$username', '$contactno', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>