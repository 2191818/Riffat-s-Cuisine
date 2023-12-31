<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riffat's Cuisine | All Orders</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <h1>All Orders</h1>
    <br>
    <table>
        <tr>
            <th>Order ID</th>
            <th>User Name</th>
            <th>Order Date</th>
            <th>Order Time</th>
            <th>Order Status</th>
            <th>Change Status</th>
            <th>Actions</th>
        </tr>
        <?php
        $displayedOrderIds = array(); // Track displayed orders

        foreach ($orderDetails as $order) :
            if (!in_array($order['order_id'], $displayedOrderIds)) : // Check if order is already displayed
                $displayedOrderIds[] = $order['order_id']; // Mark order as displayed
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
                    <td><?php echo $order['user_fname'] . ' ' . $order['user_lname']; ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['order_time']; ?></td>
                    <td>
                        <div style="text-align: center;">
                            <span style="color: <?php echo $statusColor; ?>;"><strong><?php echo $order['order_status']; ?></strong></span>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <a href="index.php?controller=orders&action=cancel&order_id=<?php echo $order['order_id']; ?>" class="cancel-btn" title="Cancel Order"><i class="fa-solid fa-circle-xmark" alt="Cancel"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=approve&order_id=<?php echo $order['order_id']; ?>" class="approve-btn" title="Approve Order"><i class="fa-solid fa-thumbs-up" alt="Approve"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=pending&order_id=<?php echo $order['order_id']; ?>" class="pending-btn" title="Pend Order"><i class="fa-solid fa-spinner" alt="Pending"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=preparing&order_id=<?php echo $order['order_id']; ?>" class="prepare-btn" title="Prepare Order"><i class="fa-solid fa-utensils" alt="Preparing"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=complete&order_id=<?php echo $order['order_id']; ?>" class="action-btn" title="Complete Order"><i class="fa-solid fa-circle-check" alt="Complete"></i></a>
                    </td>
                    <td style="text-align: center;">
                        <a href="index.php?controller=orders&action=view&order_id=<?php echo $order['order_id']; ?>" class="action-btn" title="View Order"><i class="fa-solid fa-eye" alt="View"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=orders&action=edit&order_id=<?php echo $order['order_id']; ?>" class="action-btn" title="Edit Order"><i class="fa-solid fa-pen-to-square" alt="Edit"></i></a>
                    </td>
                </tr>
        <?php
            endif;
        endforeach;
        ?>

    </table>

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

    .cancel-btn,
    .approve-btn,
    .pending-btn,
    .prepare-btn,
    .action-btn {
        display: inline-block;
        color: black;
        font-size: 20px;
    }

    .cancel-btn:hover {
        color: #640000;
    }

    .approve-btn:hover {
        color: #097969;
    }

    .pending-btn:hover {
        color: #043F98;
    }

    .prepare-btn:hover {
        color: #D19D00;
    }

    .action-btn:hover {
        color: black;
    }
</style>