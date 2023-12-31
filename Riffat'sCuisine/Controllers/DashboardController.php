<?php
session_start();
include("Models\OrderModel.php");

class DashboardController
{
    // public function index()
    // {
    //     $orderModel = new OrderModel();

    //     $firstDayLastMonth = date('Y-m-01', strtotime('-1 month'));
    //     $lastDayLastMonth = date('Y-m-t', strtotime('-1 month'));

    //     $orderDetails = $orderModel->getOrdersByDateRange($firstDayLastMonth, $lastDayLastMonth);

    //     include 'Views/dashboard.php';
    // }
    public function index()
    {
        // Logic to fetch and display orders
        $orderModel = new OrderModel();
        $orderDetails = $orderModel->getAllOrderDetails();

        include 'Views/dashboard.php';
    }
    public function cancel()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

            $orderModel = new OrderModel();
            $result = $orderModel->updateOrderStatus($orderId, 'Cancelled');

            if ($result) {
                header("Location: index.php?controller=dashboard&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function approve()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

            $orderModel = new OrderModel();
            $result = $orderModel->updateOrderStatus($orderId, 'Approved');

            if ($result) {
                header("Location: index.php?controller=dashboard&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function pending()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

            $orderModel = new OrderModel();
            $result = $orderModel->updateOrderStatus($orderId, 'Pending');

            if ($result) {
                header("Location: index.php?controller=dashboard&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function preparing()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

            $orderModel = new OrderModel();
            $result = $orderModel->updateOrderStatus($orderId, 'Preparing');

            if ($result) {
                header("Location: index.php?controller=dashboard&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function complete()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];

            $orderModel = new OrderModel();
            $result = $orderModel->updateOrderStatus($orderId, 'Completed');

            if ($result) {
                header("Location: index.php?controller=dashboard&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
}
