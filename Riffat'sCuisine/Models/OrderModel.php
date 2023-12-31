<?php

include_once "database.php";


class OrderModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getOrder($order_id)
    {
        $sql = "SELECT * FROM order_details_view WHERE order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getOrderItems($orderId)
    {
        $sql = "SELECT * FROM order_items
                JOIN menu ON order_items.food_id = menu.food_id
                WHERE order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrderDetails()
    {
        $sql = "SELECT * FROM order_details_view";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }
    public function updateOrderStatus($orderId, $status)
    {
        $stmt = $this->conn->prepare("UPDATE order_details_view SET order_status = ? WHERE order_id = ?");
        $stmt->bind_param("si", $status, $orderId);

        return $stmt->execute();
    }

    public function updateOrder($orderId, $username, $email, $firstName, $lastName, $foodName, $foodQuantity, $foodPrice, $totalCost)
    {
        $sqlOrders = "UPDATE order_details_view SET 
                      user_username = ?, 
                      user_email = ?, 
                      user_fname = ?, 
                      user_lname = ?
                      WHERE order_id = ?";
        $stmtOrders = $this->conn->prepare($sqlOrders);

        if (!$stmtOrders) {
            die('Error in prepare statement: ' . $this->conn->error);
        }

        $stmtOrders->bind_param("ssssi", $username, $email, $firstName, $lastName, $orderId);
        $stmtOrders->execute();

        if ($stmtOrders->error) {
            die('Error in execute statement: ' . $stmtOrders->error);
        }

        $sqlItems = "UPDATE order_details_view SET 
                     food_name = ?, 
                     food_size = ?, 
                     food_price = ?
                     WHERE order_id = ?";
        $stmtItems = $this->conn->prepare($sqlItems);

        if (!$stmtItems) {
            die('Error in prepare statement: ' . $this->conn->error);
        }

        $stmtItems->bind_param("sdsi", $foodName, $foodQuantity, $foodPrice, $orderId);
        $stmtItems->execute();

        if ($stmtItems->error) {
            die('Error in execute statement: ' . $stmtItems->error);
        }
        return $stmtOrders->affected_rows > 0 && $stmtItems->affected_rows > 0;
    }


    public function getOrderDetailsById($order_id)
    {
        $query = "SELECT * FROM order_details_view WHERE order_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $orderDetails = $result->fetch_assoc();
        return $orderDetails;
    }

    public function getOrdersByDateRange($startDate, $endDate)
    {
        $sql = "SELECT * FROM orders WHERE order_date BETWEEN ? AND ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $startDate, $endDate);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = array();
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        return $orders;
    }
    public function createOrder($userId, $orderDate, $orderTime, $orderStatus, $totalCost, $orderNote)
    {
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, order_date, order_time, order_status, order_price, order_notes) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssds", $userId, $orderDate, $orderTime, $orderStatus, $totalCost, $orderNote);

        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            return false;
        }
    }

    public function createOrderItem($orderId, $foodId)
    {
        $stmt = $this->conn->prepare("INSERT INTO order_items (order_id, food_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $orderId, $foodId);

        return $stmt->execute();
    }
}
