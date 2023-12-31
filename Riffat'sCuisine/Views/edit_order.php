<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riffat's Cuisine | Edit Order</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <div class="receipt-container">
        <div class="receipt-header">Edit Order - <?php echo $order['order_id']; ?></div>
        <div class="receipt-details" style="background-color: <?php echo $statusColor; ?>">
            <br>
            <form action="index.php?controller=orders&action=update" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                <label for="username"><strong>Username</strong></label>
                <input type="text" id="username" name="username" value="<?php echo $order['user_username']; ?>"><br>
                <br>
                <label for="email"><strong>Email</strong></label>
                <input type="email" id="email" name="email" value="<?php echo $order['user_email']; ?>"><br>
                <br>
                <label for="first_name"><strong>First Name</strong></label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $order['user_fname']; ?>"><br>
                <br>
                <label for="last_name"><strong>Last Name</strong></label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $order['user_lname']; ?>"><br>
                <br>
                <?php if (isset($order['order_items']) && is_array($order['order_items']) && !empty($order['order_items'])) : ?>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        <?php foreach ($order['order_items'] as $item) : ?>
                            <tr>
                                <td>
                                    <input type="text" name="food_name[]" value="<?php echo $item['food_name']; ?>">
                                </td>
                                <td>
                                    <input type="text" name="food_quantity[]" value="<?php echo $item['food_size']; ?>">
                                </td>
                                <td>
                                    <input type="text" name="food_price[]" value="<?php echo $item['food_price']; ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else : ?>
                    <p>No food items in this order.</p>
                <?php endif; ?>
                <br><br><br>
                <label for="total_cost"><strong>Total Cost</strong></label>
                <input type="text" id="total_cost" name="total_cost" value="<?php echo $order['food_price']; ?>"><br>
                <br>
                <input class="hero-btn" type="submit" value="Update Order">
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