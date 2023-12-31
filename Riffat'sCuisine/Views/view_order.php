<?php

$statusColor = '';

switch ($orderDetails['order_status']) {
    case 'Cancelled':
        $statusColor = 'firebrick';
        break;
    case 'Pending':
        $statusColor = '#043F98';
        break;
    case 'Approved':
        $statusColor = '#097969';
        break;
    case 'Preparing':
        $statusColor = '#D19D00';
        break;
    default:
        $statusColor = 'black';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riffat's Cuisine | View Order</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
</head>

<body>
    <?php include 'Includes/navbar.php'; ?>

    <h1>View Order - #<?php echo $orderDetails['order_id']; ?></h1>
    <br>

    <div class="receipt-container">
        <div class="receipt-header">Order Receipt- #<?php echo $orderDetails['order_id']; ?></div>
        <div class="receipt-details">
            <br>
            <form action="index.php?controller=orders&action=update" method="post">
                <div style="text-align: center;"><strong>Username: </strong><?php echo $orderDetails['user_username']; ?> <strong> | Email: </strong><?php echo $orderDetails['user_email']; ?></div>
                <div style="text-align: center;">
                    <strong>Order Status: </strong>
                    <span style="color: <?php echo $statusColor; ?>;"><strong><?php echo $orderDetails['order_status']; ?></strong></span>
                </div>


                <br>
                <div style="text-align: center; font-family: pac; font-size: 32px;"><?php echo $orderDetails['user_fname'] . ' ' . $orderDetails['user_lname']; ?></div>
                <br><br>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach ($orderDetails['order_items'] as $item) : ?>
                        <tr>
                            <td><?php echo isset($item['food_name']) ? $item['food_name'] : 'Name Error'; ?></td>
                            <td><?php echo isset($item['food_size']) ? $item['food_size'] : 'Size Error'; ?></td>
                            <td><?php echo isset($item['food_price']) ? $item['food_price'] : 'Price Error'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>


                <br><br><br>
                <div style="display: flex; align-items: baseline; justify-content: end;">
                    <h2>Total Cost | </h2>
                    <h3>&nbsp;$<?php echo $orderDetails['food_price']; ?></h3>
                </div>
                <br>
                <div><strong>Date and Time of Order: </strong><?php echo $orderDetails['order_date']; ?> | <?php echo $orderDetails['order_time']; ?></div>
            </form>
        </div>
    </div>
</body>

</html>

<style>
    @font-face {
        src: url(fonts/Peaches\ and\ Cream\ Regular.otf);
        font-family: pac;
    }

    * {
        margin: 0;
        padding: 0;
        font-family: 'SF Pro Display', sans-serif;
    }

    body {
        background-color: oldlace;
    }

    h1 {
        text-align: center;
        font-family: pac;
        color: firebrick;
        font-size: 110px;
    }

    .receipt-container {
        width: 25%;
        margin: 20px auto;
        border: 1px solid #000;
        padding: 10px;
        background-color: white;
        border-radius: 25px;
    }

    .receipt-header {
        text-align: center;
        font-weight: bold;
        font-size: 50px;
        margin-bottom: 10px;
        font-family: pac;
    }

    .receipt-details {
        margin-bottom: 10px;
    }

    .receipt-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .receipt-table th,
    .receipt-table td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    .receipt-actions {
        margin-top: 10px;
    }

    table {
        margin: 0 auto;
        text-align: center;
        width: 75%;
        border-collapse: collapse;
        background-color: white;
    }

    td,
    th {
        padding: 12px;
        text-align: left;
    }

    th {
        color: oldlace;
        background-color: firebrick;
    }

    td:not(:last-child),
    th:not(:last-child) {
        border-right: 1px solid black;
    }

    h2,
    h3 {
        font-family: pac;
        font-size: 50px;
    }

    h3 {
        color: darkred;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .hero-btn {
        display: inline-block;
        text-decoration: none;
        color: oldlace;
        border: 1px solid darkred;
        border-radius: 5px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
        background: firebrick;
        position: relative;
        cursor: pointer;
    }

    .hero-btn:hover {
        border: 1px solid green;
        background-color: green;
        transition: 0.5s;
        color: oldlace;
    }
</style>