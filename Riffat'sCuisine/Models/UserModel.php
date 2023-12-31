<?php

include_once "database.php";

class UserModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function createUser($fname, $lname, $email, $username, $password, $isAdmin)
    {
        $hashedPassword = md5($password);
        $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_username, user_pass, user_isAdmin) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $fname, $lname, $email, $username, $hashedPassword, $isAdmin);
        return $stmt->execute();
    }

    public function getUser($userId)
    {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }

    public function updateUser($userId, $fname, $lname, $email, $username, $isAdmin)
    {
        $sql = "UPDATE users SET user_fname=?, user_lname=?, user_email=?, user_username=?, user_isAdmin=? WHERE user_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssii", $fname, $lname, $email, $username, $isAdmin, $userId);
        return $stmt->execute();
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE user_username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE user_username = '$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_hash = $row['user_pass'];

            if (md5($password) == $stored_hash) {
                return $row;
            }
        }

        return null;
    }

    public function registerUser($fname, $lname, $email, $username, $password)
    {
        if ($this->isUsernameExists($username)) {
            return false; 
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_username, user_pass) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $fname, $lname, $email, $username, $hashedPassword);

        return $stmt->execute();
    }

    public function isUsernameExists($username)
    {
        $sql = "SELECT * FROM users WHERE user_username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }

    public function updateUserDetails($userId, $fname, $lname, $email, $username)
    {
        $sql = "UPDATE users SET user_fname=?, user_lname=?, user_email=?, user_username=? WHERE user_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $fname, $lname, $email, $username, $userId);
        return $stmt->execute();
    }

    public function updatePassword($userId, $newPassword)
    {
        $hashedPassword = md5($newPassword);

        $sql = "UPDATE users SET user_pass=? WHERE user_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $userId);
        return $stmt->execute();
    }
    public function getUserInfo($userId)
    {
        $sql = "SELECT * FROM user_info WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUserInfo($userId, $phone_number, $address, $postal_code, $second_email)
    {
        $sql = "INSERT INTO user_info (user_id, phone_number, address, postal_code, second_email) VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE phone_number = VALUES(phone_number), address = VALUES(address),
            postal_code = VALUES(postal_code), second_email = VALUES(second_email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $userId, $phone_number, $address, $postal_code, $second_email);
        return $stmt->execute();
    }
}
