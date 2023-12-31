<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riffat's Cuisine | Your Orders</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <h1>Your Orders</h1>
    <br>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Order Time</th>
            <th>Order Status</th>
            <th>Actions</th>
        </tr>
        <?php
        $displayedUserOrderIds = array(); // Track displayed user orders

        foreach ($orderDetails as $order) :
            if ($order['user_id'] == $_SESSION['user_id'] && !in_array($order['order_id'], $displayedUserOrderIds)) :
                $displayedUserOrderIds[] = $order['order_id']; // Mark user order as displayed
                $statusColor = '';

                switch ($order['order_status']) {
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
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['order_time']; ?></td>
                    <td><span style="color: <?php echo $statusColor; ?>;"><strong><?php echo $order['order_status']; ?></strong></span></td>
                    <td style="text-align: center;">
                        <a href="index.php?controller=orders&action=view&order_id=<?php echo $order['order_id']; ?>" class="action-btn" title="View Order">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=cancelUser&order_id=<?php echo $order['order_id']; ?>" class="cancel-btn" title="Cancel Order">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </a>
                    </td>
                </tr>
        <?php
            endif;
        endforeach;
        ?>
    </table>



    <script>
        function getStatusColor(status) {
            switch (status) {
                case 'pending':
                    return 'blue';
                case 'approved':
                    return 'green';
                case 'preparing':
                    return 'yellow';
                case 'canceled':
                    return 'red';
                default:
                    return 'white';
            }
        }
    </script>
</body>

</html>
<?php include 'Includes/footer.php'; ?>


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

    table {
        margin: 0 auto;
        text-align: center;
        width: 75%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 5px;
        border: 1px solid black;
    }

    td {
        padding: 12px;
        text-align: left;
        border: 1px solid black;
    }

    th {
        padding: 12px;
        text-align: left;
        border: 1px solid black;
        color: oldlace;
    }

    th {
        background-color: firebrick;
        border: 1px solid black;
    }

    .action-btn,
    .cancel-btn {
        color: black;
        font-size: 20px;
        display: inline-block;

    }

    .action-btn:hover,
    .cancel-btn:hover {
        color: darkred;
        transition: 0.5s;
    }
</style>