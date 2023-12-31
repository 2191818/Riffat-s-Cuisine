<?php
session_start();

include "Models/UserModel.php";

class ProfileController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function view()
    {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $user = $this->userModel->getUser($userId);
            $userInfo = $this->userModel->getUserInfo($userId);

            include 'Views/profile.php';
        } else {
            header("Location: index.php?controller=login&action=login");
            exit();
        }
    }

    public function updateAccount()
    {
        if (isset($_POST['user_id'], $_POST['user_fname'], $_POST['user_lname'], $_POST['user_email'], $_POST['user_username'])) {
            $userId = $_POST['user_id'];
            $fname = $_POST['user_fname'];
            $lname = $_POST['user_lname'];
            $email = $_POST['user_email'];
            $username = $_POST['user_username'];

            $this->userModel->updateUserDetails($userId, $fname, $lname, $email, $username);

            header("Location: index.php?controller=profile&action=view");
        } else {
            echo "Invalid request.";
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
    public function updateInfo()
    {
        if (isset($_POST['user_id'], $_POST['phone_number'], $_POST['address'], $_POST['postal_code'], $_POST['second_email'])) {
            $userId = $_POST['user_id'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $postal_code = $_POST['postal_code'];
            $second_email = $_POST['second_email'];

            $this->userModel->updateUserInfo($userId, $phone_number, $address, $postal_code, $second_email);

            // Redirect to the profile page after updating additional user info
            header("Location: index.php?controller=profile&action=view");
        } else {
            echo "Invalid request.";
        }
    }
}
