<?php
include_once 'Models/UserModel.php';
session_start();

class UsersController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getAllUsers();
        include 'Views/users.php';
    }

    public function password()
    {
        // Load the password update page
        include 'Views/password.php';
    }

    public function updatePassword()
    {
        session_start(); // Make sure to start the session

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword !== $confirmPassword) {
                    echo "New password and confirm password do not match. Please try again.";
                    return;
                }

                $result = $this->userModel->updatePassword($userId, $newPassword);

                if ($result) {
                    header("Location: index.php?controller=users&action=index");
                } else {
                    echo "Failed to update password. Please try again.";
                }
            } else {
                echo "User not logged in.";
            }
        } else {
            echo "Invalid request method.";
        }
    }


    public function add()
    {
        include 'Views/add_user.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['user_fname'];
            $lastName = $_POST['user_lname'];
            $email = $_POST['user_email'];
            $username = $_POST['user_username'];
            $password = $_POST['user_pass']; // Assuming you have a field for password
            $isAdmin = isset($_POST['user_isAdmin']) ? 1 : 0;

            if ($this->userModel->createUser($firstName, $lastName, $email, $username, $password, $isAdmin)) {
                header("Location: index.php?controller=users&action=index");
            } else {
                echo "Failed to create user.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $user = $this->userModel->getUser($userId);

            if ($user) {
                include 'Views/edit_user.php';
            } else {
                echo "User not found.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function update()
    {
        if (isset($_POST['user_id'])) {
            $userId = $_POST['user_id'];
            $fname = $_POST['user_fname'];
            $lname = $_POST['user_lname'];
            $email = $_POST['user_email'];
            $username = $_POST['user_username'];
            $isAdmin = isset($_POST['user_isAdmin']) ? 1 : 0;

            $this->userModel->updateUser($userId, $fname, $lname, $email, $username, $isAdmin);
            header("Location: index.php?controller=users&action=index");
            exit();
        } else {
            echo "Invalid request.";
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];

            if ($this->userModel->deleteUser($userId)) {
                header("Location: index.php?controller=users&action=index");
            } else {
                echo "Failed to delete user.";
            }
        } else {
            echo "Invalid request.";
        }
    }
}
