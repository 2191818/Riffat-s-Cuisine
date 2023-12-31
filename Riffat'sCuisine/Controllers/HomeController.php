<?php
session_start();

class HomeController {
    public function route() {
        $action = (isset($_GET['action'])) ? $_GET['action'] : "index";

        switch ($action) {
            case "index":
                $this->index();
                break;
            case "logout":
                $this->logout();
                break;
            default:
                // Handle invalid action
                echo "Invalid action.";
        }
    }

    public function index() {
        if (isset($_SESSION['user_id'])) {
            include 'Views/home.php';
        } else {
            header("Location: index.php?controller=login&action=login");
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: index.php?controller=login&action=login");
    }
}
