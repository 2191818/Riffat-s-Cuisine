<?php


include_once 'Models/UserModel.php';

class SignupController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        include 'Views/signup.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdmin = 0; 

            if ($this->userModel->isUsernameExists($username)) {
                header("Location: index.php?controller=signup&action=index&error=username_exists");
                exit();
            }

            $success = $this->userModel->createUser($fname, $lname, $email, $username, $password, $isAdmin);

            if ($success) {
                header("Location: index.php?controller=login&action=login");
            } else {
                header("Location: index.php?controller=signup&action=index&error=registration_failed");
            }
        } else {
            header("Location: index.php?controller=signup&action=index");
        }
    }
}
