<?php

include_once "database.php";

class MenuModel {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function createItem($name, $type, $price, $size) {
        $sql = "INSERT INTO menu (food_name, food_type, food_price, food_size) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdi", $name, $type, $price, $size);
        return $stmt->execute();
    }

    public function getItem($itemId) {
        $sql = "SELECT * FROM menu WHERE food_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $itemId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllItems() {
        $sql = "SELECT * FROM menu";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllItemsByType($foodType) {
        $sql = "SELECT * FROM menu WHERE food_type = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $foodType);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteItem($itemId) {
        $sql = "DELETE FROM menu WHERE food_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $itemId);
        return $stmt->execute();
    }

    public function updateItem($itemId, $name, $type, $price, $size) {
        $sql = "UPDATE menu SET food_name=?, food_type=?, food_price=?, food_size=? WHERE food_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $type, $price, $size, $itemId);
        return $stmt->execute();
    }
}
?>
