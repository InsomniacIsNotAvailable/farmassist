<?php 
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["signup_username"]);
    $firstname = trim($_POST["signup_firstname"]);
    $lastname = trim($_POST["signup_lastname"]);
    $email = trim($_POST["signup_email"]);
    $contactno = trim($_POST["signup_contactno"]);
    $password = trim($_POST["signup_rawpassword"]);
    $confirmPassword = trim($_POST["signup_confirmpassword"]);

    // Validate username
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        die("Invalid username. Only letters, numbers, and underscores are allowed.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Validate contact number
    if (!preg_match("/^\d{11}$/", $contactno)) {
        die("Invalid contact number. It must be 11 digits.");
    }

    // Validate password
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long.");
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save to database (example query)
    $sql = "INSERT INTO users (username, firstname, lastname, email, contact_number, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $username, $firstname, $lastname, $email, $contactno, $hashedPassword);
    $stmt->execute();

    echo "Account created successfully!";
}

// Close the database connection
mysqli_close($conn);
?>