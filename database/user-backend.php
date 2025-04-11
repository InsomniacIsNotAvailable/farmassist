<?php
ini_set('display_errors', 1); // Enable error display for debugging
ini_set('log_errors', 1);    // Enable error logging
error_log('c:/xampp/php/logs/php_error.log'); // Set the error log file

include 'config.php'; // Include your SQL connection file

$response = ['users' => [], 'error' => '', 'message' => ''];

try {
    error_log("Request method: " . $_SERVER["REQUEST_METHOD"]); // Log request method

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        error_log("Fetching all users..."); // Debug message
        $sql = "SELECT id, username, firstname, lastname, email, contact_number, user_status FROM users";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $response['users'][] = $row;
            }
            error_log("Users fetched successfully: " . json_encode($response['users'])); // Log fetched users
        } else {
            throw new Exception("Error fetching users: " . $conn->error);
        }
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
        error_log("Handling POST request..."); // Debug message

        if (isset($_POST['add_user'])) {
            error_log("Adding a new user..."); // Debug message
            $username = $conn->real_escape_string($_POST['username']);
            $firstname = $conn->real_escape_string($_POST['firstname']);
            $lastname = $conn->real_escape_string($_POST['lastname']);
            $email = $conn->real_escape_string($_POST['email']);
            $contactno = $conn->real_escape_string($_POST['contactno']);
            $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
            $user_status = $conn->real_escape_string($_POST['user_status']);

            $sql = "INSERT INTO users (username, firstname, lastname, email, contact_number, password, user_status) 
                    VALUES ('$username', '$firstname', '$lastname', '$email', '$contactno', '$password', '$user_status')";

            if ($conn->query($sql)) {
                $response['message'] = "User added successfully.";
                error_log("User added successfully."); // Debug message
            } else {
                throw new Exception("Error adding user: " . $conn->error);
            }
        } elseif (isset($_POST['edit_user'])) {
            error_log("Editing an existing user..."); // Debug message
            $id = intval($_POST['id']);
            $username = $conn->real_escape_string($_POST['username']);
            $firstname = $conn->real_escape_string($_POST['firstname']);
            $lastname = $conn->real_escape_string($_POST['lastname']);
            $email = $conn->real_escape_string($_POST['email']);
            $contactno = $conn->real_escape_string($_POST['contactno']);
            $user_status = $conn->real_escape_string($_POST['user_status']);

            $sql = "UPDATE users SET 
                        username = '$username', 
                        firstname = '$firstname', 
                        lastname = '$lastname', 
                        email = '$email', 
                        contact_number = '$contactno', 
                        user_status = '$user_status' 
                    WHERE id = $id";

            if ($conn->query($sql)) {
                $response['message'] = "User updated successfully.";
                error_log("User updated successfully."); // Debug message
            } else {
                throw new Exception("Error updating user: " . $conn->error);
            }
        }
    }
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
    error_log("Error: " . $e->getMessage()); // Log error
}

// Log the response to a debug file
file_put_contents('debug.log', json_encode($response) . PHP_EOL, FILE_APPEND);
error_log("Response sent: " . json_encode($response)); // Log response

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>