<nav class="nav-links">
    <ul>
        <?php
        if ($_SESSION['user_isAdmin']) {
            echo '<li><a href="index.php?controller=dashboard&dashboard=index">Riffat\'s Cuisine</a></li>';
        } else {
            echo '<li><a href="index.php?controller=home&action=index">Riffat\'s Cuisine</a></li>';
        }
        ?>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<li><a href="index.php?controller=menu&action=index">Menu</a></li>';

            if ($_SESSION['user_isAdmin']) {
                echo '<li><a href="index.php?controller=users&action=index">Users</a></li>';
                echo '<li><a href="index.php?controller=orders&action=index">Orders</a></li>';
            } else {
                echo '<li><a href="index.php?controller=orders&action=cart">Cart</a></li>';
                echo '<li><a href="index.php?controller=orders&action=orders">Orders</a></li>';
            }

            echo '<li><a href="index.php?controller=profile&action=view">' . $_SESSION['user_username'] . '</a></li>';
            echo '<li><a href="index.php?controller=home&action=logout">Logout</a></li>';
        } else {
            echo '<li><a href="index.php?controller=login&action=login">Login</a></li>';
        }
        ?>
    </ul>
</nav>
<br>

<br>

<style>
    nav {
        display: flex;
        padding: 2% 6%;
        justify-content: space-between;
        align-items: center;
    }

    .nav-links {
        flex: 1;
        text-align: right;
        font-weight: 600;
        display: flex;
        justify-content: center;
    }

    .nav-links ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
    }

    .nav-links ul li {
        padding: 8px 12px;
        position: relative;
    }

    .nav-links ul li a {
        color: black;
        text-decoration: none;
        font-size: 13px;
    }

    .nav-links ul li::after {
        content: '';
        width: 0%;
        height: 2px;
        background-color: firebrick;
        display: block;
        margin: auto;
        transition: 1s;
    }

    .nav-links ul li:hover::after {
        width: 100%;
    }
</style>