<?php
session_start();
include("Models\MenuModel.php");
class MenuController {
    private $menuModel;

    public function __construct() {
        $this->menuModel = new MenuModel();
    }

    public function index() {
        $menuItems = $this->menuModel->getAllItems();
        include 'Views/menu.php';
    }
        public function add() {
        include 'Views/add_menu.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['food_name'];
            $type = $_POST['food_type'];
            $price = $_POST['food_price'];
            $size = $_POST['food_size'];

            if ($this->menuModel->createItem($name, $type, $price, $size)) {
                header("Location: index.php?controller=menu&action=index");
            } else {
                echo "Failed to create item.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $itemId = $_GET['id'];
            $item = $this->menuModel->getItem($itemId);

            if ($item) {
                include 'Views/edit_menu.php';
            } else {
                echo "Item not found.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $itemId = $_POST['food_id'];
            $name = $_POST['food_name'];
            $type = $_POST['food_type'];
            $price = $_POST['food_price'];
            $size = $_POST['food_size'];

            if ($this->menuModel->updateItem($itemId, $name, $type, $price, $size)) {
                header("Location: index.php?controller=menu&action=index");
            } else {
                echo "Failed to update item.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $itemId = $_GET['id'];

            if ($this->menuModel->deleteItem($itemId)) {
                header("Location: index.php?controller=menu&action=index");
            } else {
                echo "Failed to delete item.";
            }
        } else {
            echo "Invalid request.";
        }
    }
}
?>
