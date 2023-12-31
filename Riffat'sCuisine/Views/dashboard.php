<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riffat's Cuisine | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <div style="display: flex; align-items: baseline; justify-content: center;">
        <h2>Welcome, </h2>
        <h3>&nbsp;<?php echo $_SESSION['user_username']; ?></h3>
    </div>

    <div class="cta-container">
        <section class="cta">
            <h1>Need a change of menu?</h1>
            <a href="index.php?controller=menu&action=index" class="hero-btn">Edit Menu</a>
        </section>

        <section class="cta">
            <h1>Want to see users?</h1>
            <a href="index.php?controller=users&action=index" class="hero-btn">View Users</a>
        </section>
    </div>

    <h1>New Orders</h1>
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
        <?php foreach ($orderDetails as $order) : ?>
            <?php
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
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php include 'Includes/footer.php'; ?>

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
        overflow-x: hidden;
        /* Hide horizontal scrollbar */
    }

    h1,
    h2 {
        text-align: center;
        font-family: pac;
        font-size: 110px;
        color: firebrick;
    }

    h3 {
        font-family: pac;
        text-align: center;
        font-size: 64px;
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

    .cta-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .cta {
        flex: 0 0 42%;
        margin: 50px 20px;
        background: linear-gradient(to bottom, #f9dfb0, #9d6b0d) no-repeat fixed;
        background-size: cover;
        border-radius: 10px;
        text-align: center;
        padding: 100px 0;
    }

    .cta h1 {
        color: black;
        margin-bottom: 40px;
        padding: 0;
    }

    .hero-btn {
        display: inline-block;
        text-decoration: none;
        color: black;
        border: 1px solid black;
        border-radius: 5px;
        padding: 12px 34px;
        font-size: 13px;
        background: transparent;
        position: relative;
        cursor: pointer;
    }

    .hero-btn:hover {
        border: 1px solid firebrick;
        background-color: firebrick;
        transition: 0.5s;
        color: oldlace;
    }
</style>