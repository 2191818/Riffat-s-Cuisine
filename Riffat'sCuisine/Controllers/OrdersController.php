<?php
include("Models\OrderModel.php");
include("Models\MenuModel.php");
session_start();

class OrdersController
{
    private $orderModel;
    private $menuModel;

    public function __construct()
    {

        $this->orderModel = new OrderModel();
        $this->menuModel = new MenuModel();
    }
    public function index()
    {
        $orderDetails = $this->orderModel->getAllOrderDetails();
        include 'Views/Orders.php';
    }
    public function orders()
    {
        $orderDetails = $this->orderModel->getAllOrderDetails();
        include 'Views/UserOrders.php';
    }

    public function cart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->checkout();
        } else {
            include 'Views/cart.php';
        }
    }

    public function checkout()
    {
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        $orderDate = date('Y-m-d');
        date_default_timezone_set('America/New_York');
        $orderTime = date('h:i a');
        $orderStatus = 'Pending';

        $totalCost = isset($_POST['total_cost']) ? $_POST['total_cost'] : 0;
        $orderNote = isset($_POST['order_notes']) ? $_POST['order_notes'] : '';

        $orderId = $this->orderModel->createOrder($userId, $orderDate, $orderTime, $orderStatus, $totalCost, $orderNote);

        foreach ($_SESSION['cart'] as $cartItem) {
            $foodId = $cartItem['food_id'];
            $this->orderModel->createOrderItem($orderId, $foodId);
        }

        unset($_SESSION['cart']);

        header("Location: index.php?controller=orders&action=orders");
    }

    public function addToCart()
    {
        if (isset($_GET['id'])) {
            $foodId = $_GET['id'];

            $this->addToCartSession($foodId);

            echo '<script>window.history.back();</script>';
            exit();
        } else {
            echo "Invalid request.";
        }
    }

    private function addToCartSession($foodId)
    {
        session_start();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $isDuplicate = false;
        foreach ($_SESSION['cart'] as $existingItem) {
            if ($existingItem['food_id'] == $foodId) {
                $isDuplicate = true;
                break;
            }
        }

        if ($isDuplicate) {
            echo "<script>
                    alert('This item is already in your cart!');
                  </script>";
        } else {
            $_SESSION['cart'][] = ['food_id' => $foodId, 'quantity' => 1];
        }
    }



    public function removeFromCart()
    {
        if (isset($_GET['id'])) {
            $foodIdToRemove = $_GET['id'];

            $this->removeFromCartSession($foodIdToRemove);

            header("Location: index.php?controller=orders&action=cart");
        } else {
            echo "Invalid request.";
        }
    }

    private function removeFromCartSession($foodIdToRemove)
    {
        session_start();

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['food_id'] == $foodIdToRemove) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }


    public function view()
    {
        if (isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];

            $orderDetails = $this->orderModel->getOrderDetailsById($order_id);
            $orderDetails['order_items'] = $this->orderModel->getOrderItems($order_id);

            if ($orderDetails) {
                include 'Views/view_order.php';
            } else {
                echo "Order not found!";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function edit()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $order = $this->orderModel->getOrder($orderId);
            $order['order_items'] = $this->orderModel->getOrderItems($orderId);

            if ($order) {
                include 'Views/edit_order.php';
            } else {
                echo "Order not found.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function cancel()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $result = $this->orderModel->updateOrderStatus($orderId, 'Cancelled');

            if ($result) {
                header("Location: index.php?controller=orders&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }
    public function cancelUser()
    {
        if (isset($_GET['order_id'])) {
            $orderId = $_GET['order_id'];
            $result = $this->orderModel->updateOrderStatus($orderId, 'Cancelled');

            if ($result) {
                header("Location: index.php?controller=orders&action=orders");
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
            $result = $this->orderModel->updateOrderStatus($orderId, 'Pending');

            if ($result) {
                header("Location: index.php?controller=orders&action=index");
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
            $result = $this->orderModel->updateOrderStatus($orderId, 'Preparing');

            if ($result) {
                header("Location: index.php?controller=orders&action=index");
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
            $result = $this->orderModel->updateOrderStatus($orderId, 'Approved');

            if ($result) {
                header("Location: index.php?controller=orders&action=index");
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
            $result = $this->orderModel->updateOrderStatus($orderId, 'Completed');

            if ($result) {
                header("Location: index.php?controller=orders&action=index");
            } else {
                echo "Failed to cancel order.";
            }
        } else {
            echo "Invalid request.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $foodName = $_POST['food_name'];
            $foodQuantity = $_POST['food_quantity'];
            $foodPrice = $_POST['food_price'];
            $totalCost = $_POST['total_cost'];

            if ($this->orderModel->updateOrder($orderId, $username, $email, $firstName, $lastName, $foodName, $foodQuantity, $foodPrice, $totalCost)) {
                echo "Failed to update order.";
            } else {
                header("Location: index.php?controller=orders&action=index");
            }
        } else {
            echo "Invalid request.";
        }
    }
}
