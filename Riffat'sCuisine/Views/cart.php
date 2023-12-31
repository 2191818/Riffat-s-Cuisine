<!DOCTYPE html>
<html lang="en">

<head>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <title>Riffat's Cuisine | Your Cart</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
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
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        nav {
            width: 180%;
        }

        h1 {
            color: firebrick;
            font-family: pac;
            font-size: 110px;
            margin-bottom: 20px;
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }

        .left-side {
            flex: 3;
            margin-right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: firebrick;
            color: oldlace;
        }

        .right-side {
            flex: 1;
        }

        .container {
            background-color: white;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .sidebar-buttons {
            text-align: center;
        }

        .hero-btn {
            display: block;
            margin-bottom: 10px;
            padding: 8px 16px;
            text-decoration: none;
            color: oldlace;
            background-color: firebrick;
            border: 1px solid firebrick;
            border-radius: 5px;
        }

        .hero-btn:hover {
            border: 1px solid green;
            background-color: green;
            transition: 0.5s;
            color: oldlace;
            cursor: pointer;
        }

        p {
            text-align: center;
        }

        .hero-btn {
            font-size: 13px;
            font-weight: 600;
            position: relative;
        }

        h3 {
            font-family: pac;
            text-align: center;
            font-size: 64px;
        }

        h1,
        h2 {
            text-align: center;
            font-family: pac;
            font-size: 64px;
            color: firebrick;
        }

        textarea {
            width: 100%;
        }

        .fa-solid.fa-trash {
            color: black;
            font-size: 20px;
            cursor: pointer;
            display: block;
            margin: auto;
            text-align: center;
        }


        .fa-solid.fa-trash:hover {
            transition: 0.5s;
            color: darkred;
        }
    </style>
</head>

<body>
    <nav>
        <?php include 'Includes/navbar.php'; ?>
    </nav>
    <nav>
        <h1>Your Order</h1>
    </nav>

    <div class="left-side">
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

            echo "<table>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Serving Size</th>";
            echo "<th>Price</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            $totalCost = 0;

            foreach ($_SESSION['cart'] as $cartItem) {
                $foodId = $cartItem['food_id'];
                $item = $this->menuModel->getItem($foodId);

                if ($item) {
                    echo "<tr>";
                    echo "<td>{$item['food_name']}</td>";
                    echo "<td>{$item['food_size']}</td>";
                    echo "<td>$ {$item['food_price']}</td>";
                    echo "<td><a href='index.php?controller=orders&action=removeFromCart&id={$cartItem['food_id']}' 
                    title='Remove from order'><i class='fa-solid fa-trash'></i></a></td>";
                    echo "</tr>";

                    $totalCost += $item['food_price'] * $cartItem['quantity'];
                }
            }

            echo "</table>";
        } else {
            echo "<p style=\"font-family: pac; font-size: 110px; color: firebrick;\">Your cart is empty.</p>";
        }

        if (isset($_GET['cartEmpty']) && $_GET['cartEmpty'] == 'true') {
            echo "<p>Your cart is empty after removing items.</p>";
        }
        ?>
    </div>

    <?php
    date_default_timezone_set('America/New_York');
    ?>

    <div class="right-side">
        <div class="container">
            <div class="sidebar-buttons">
                <a class="hero-btn" href='index.php?controller=menu&action=index'>Continue Shopping</a>
                <div class="container">
                    <p>Order Date: <?php echo date('Y-m-d'); ?></p>
                    <br>
                    <p>Order Time: <?php echo date('h:i A'); ?></p>
                    <BR></BR>
                    <div style="display: flex; align-items: baseline; justify-content: center;">
                        <h2>Total Cost | </h2>
                        <h3>&nbsp;$ <?php echo isset($totalCost) ? $totalCost : 0; ?></h3>
                    </div>
                </div>
                <form action='index.php?controller=orders&action=checkout' method='post'>
                    <input type="hidden" name="total_cost" value="<?php echo isset($totalCost) ? $totalCost : 0; ?>">
                    <textarea name="order_notes" id="order_notes" cols="30" rows="10" placeholder="Leave a note..."></textarea>
                    <button type='submit' class='hero-btn'>
                        <i class="fa-solid fa-cart-shopping"></i> Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    function showPopup() {
        alert('Thank you for your order!');
    }
</script>

<?php
function findItemDetails($items, $itemId)
{
    foreach ($items as $item) {
        if ($item['food_id'] == $itemId) {
            return $item;
        }
    }

    return null;
}

function calculateTotalPrice($cart, $items)
{
    $totalPrice = 0;

    foreach ($cart as $cartItem) {
        $itemDetails = findItemDetails($items, $cartItem['food_id']);
        if ($itemDetails) {
            $totalPrice += $itemDetails['food_price'] * $cartItem['quantity'];
        }
    }

    return $totalPrice;
}
?>