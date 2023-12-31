<?php
session_start();

include_once 'Models/UserModel.php';

class LoginController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        include 'Views/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            $user = $this->userModel->login($username, $password);
    
            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_username'] = $user['user_username'];
                $_SESSION['user_isAdmin'] = $user['user_isAdmin'];
    
                if ($_SESSION['user_isAdmin']) {
                    header("Location: index.php?controller=dashboard&action=index");
                } else {
                    header("Location: index.php?controller=home&action=index");
                }
            } else {
                $userByUsername = $this->userModel->getUserByUsername($username);
                if ($userByUsername) {
                    header("Location: index.php?controller=login&action=index&error=incorrect_password");
                } else {
                    header("Location: index.php?controller=login&action=index&error=username_not_found");
                }
            }
        } else {
            if (isset($_SESSION['user_id'])) {
                if ($_SESSION['user_isAdmin']) {
                    header("Location: index.php?controller=dashboard&action=index");
                } else {
                    header("Location: index.php?controller=home&action=index");
                }
            } else {
                header("Location: index.php?controller=login&action=index");
            }
        }
    }
    

    public function updatePassword()
    {
        if (isset($_POST['user_id'], $_POST['new_password'])) {
            $userId = $_POST['user_id'];
            $newPassword = $_POST['new_password'];

            $this->userModel->updatePassword($userId, $newPassword);

            header("Location: index.php?controller=profile&action=view");
        } else {
            echo "Invalid request.";
        }
    }
}
