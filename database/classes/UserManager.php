<?php
class UserManager {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function fetchAllUsers() {
        $sql = "SELECT id, username, firstname, lastname, email, contact_number, user_status FROM users";
        $result = $this->conn->query($sql);

        if ($result) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            throw new Exception("Error fetching users: " . $this->conn->error);
        }
    }

    public function addUser($username, $firstname, $lastname, $email, $contactno, $password, $user_status) {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (username, firstname, lastname, email, contact_number, password, user_status) 
                VALUES ('$username', '$firstname', '$lastname', '$email', '$contactno', '$passwordHash', '$user_status')";

        if ($this->conn->query($sql)) {
            return "User added successfully.";
        } else {
            throw new Exception("Error adding user: " . $this->conn->error);
        }
    }

    public function editUser($id, $username, $firstname, $lastname, $email, $contactno, $user_status) {
        $sql = "UPDATE users SET 
                    username = '$username', 
                    firstname = '$firstname', 
                    lastname = '$lastname', 
                    email = '$email', 
                    contact_number = '$contactno', 
                    user_status = '$user_status' 
                WHERE id = $id";

        if ($this->conn->query($sql)) {
            return "User updated successfully.";
        } else {
            throw new Exception("Error updating user: " . $this->conn->error);
        }
    }
}
?>