<!DOCTYPE html>
<html lang="en">

<head>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <title>Riffat's Cuisine | Menu</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(event, foodId) {
            var result = confirm("Are you sure you want to delete this item?");
            if (!result) {
                event.preventDefault();
                alert("Deletion canceled.");
            }
        }
    </script>
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <section class="menuPic">
        <h1>Our Menu</h1>
    </section>

    <?php if ($_SESSION['user_isAdmin']) : ?>

        <div class="admin-only">
            <a id="add-item" href="index.php?controller=menu&action=add"><i class="fa-solid fa-plus"></i> Add Item</a>
        </div>
        <br>

    <?php endif; ?>
    <div>
        <div class="search-container">
            <div class="search-bar">
                <input type="text" class="search-input" id="searchInput" placeholder="Search menu" onkeypress="searchOnEnter(event)">
                <button class="search-button" onclick="searchM
                enu()">Search</button>
            </div>
        </div>
        <br>
        <div style="text-align: center;">
            <select id="filterDropdown" onchange="filterMenu()">
                <option value="all">All</option>
                <option value="appetizer">Appetizers</option>
                <option value="main_course">Frozen Appetizers</option>
                <option value="dessert">Boneless Chicken Specials</option>
                <option value="dessert">Rice Specials</option>
                <option value="dessert">Chinese Specials</option>
                <option value="dessert">Soups</option>
                <option value="dessert">Flatbreads</option>
                <option value="dessert">Vegetarian</option>

            </select>
        </div>
    </div>
    <br>
    <br>

    <script>
        function filterMenu() {
            var selectedFilter = document.getElementById('filterDropdown').value.toLowerCase();
            var boxes = document.querySelectorAll('.menulist .box');

            boxes.forEach(function(box) {
                var foodType = box.querySelector('div:nth-child(4)').innerText.trim().toLowerCase();
                if (selectedFilter === 'all' || foodType.includes(selectedFilter)) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        }
    </script>

    <section class="menulist">
        <div class="box-container">
            <?php foreach ($menuItems as $item) : ?>
                <div class="box">
                    <span class="price">$<?php echo $item['food_price']; ?></span>
                    <img src="images/tablogo.png" alt="">
                    <h3><?php echo $item['food_name']; ?></h3>
                    <div><strong></strong> <?php echo $item['food_type']; ?></div>
                    <div><strong>Serving Size:</strong> <?php echo $item['food_size']; ?></div>
                    <br><br>
                    <?php if (!$_SESSION['user_isAdmin']) : ?>
                        <a href="index.php?controller=orders&action=addToCart&id=<?php echo $item['food_id']; ?>" class="hero-btn"> Add to Order</a>
                    <?php endif; ?>
                    <?php if ($_SESSION['user_isAdmin']) : ?>
                        <a href="index.php?controller=menu&action=edit&id=<?php echo $item['food_id']; ?>" class="admin-btn"><i class="fa-solid fa-pen-to-square"></i></a>
                        <span style="margin: 0 10px;"></span>
                        <a href="index.php?controller=menu&action=delete&id=<?php echo $item['food_id']; ?>" class="admin-btn"><i class="fa-solid fa-trash"></i></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include 'Includes/footer.php'; ?>

    <script>
        function searchOnEnter(event) {
            if (event.key === 'Enter') {
                searchMenu();
            }
        }

        function searchMenu() {
            var input, filter, containers, name;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            containers = document.querySelectorAll('.menulist .box-container .box');

            containers.forEach(function(box) {
                name = box.querySelector('h3');
                if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    box.style.display = '';
                } else {
                    box.style.display = 'none';
                }
            });
        }
    </script>

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

    .menulist .box-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
    }

    .menulist .box-container .box {
        flex: 1 1 18rem;
        padding: 1rem;
        background: #fff;
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        border: .1rem solid rgba(0, 0, 0, .3);
        border-radius: .5rem;
        text-align: center;
        position: relative;
        margin: 0.5rem;
    }

    .menulist .box-container .box img {
        height: 15rem;
        object-fit: cover;
        width: 100%;
        border-radius: .5rem;
        border: 2px solid darkred;
    }

    .menulist .box-container .box .price {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background-color: #b22222;
        color: #fff;
        font-size: 16px;
        padding: .5rem 1rem;
        border-radius: .5rem;
    }

    .menulist .box-container .box h3 {
        color: black;
        font-size: 16px;
        padding: 1rem 0;
        background-color: transparent;
    }

    .menulist .box-container .box .admin-only {
        display: flex;
        justify-content: space-around;
        margin-top: 0.5rem;
    }

    .menulist .box-container .box .admin-only a {
        color: black;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        display: inline-block;
    }

    .menulist .box-container .box .admin-only a:hover {
        background-color: darkred;
        transition: 1s;
    }

    .hero-btn {
        display: inline-block;
        text-decoration: none;
        color: black;
        border: 1px solid black;
        border-radius: 5px;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: 600;
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

    .search-bar {
        justify-content: center;
        display: flex;
    }

    .search-input {
        border-radius: 5px 0 0 5px;
        border: 1px solid #ccc;
        padding: 8px;
    }

    .search-button {
        background-color: firebrick;
        color: oldlace;
        border-radius: 0 5px 5px 0;
        border: 1px solid #ccc;
        padding: 8px;
        cursor: pointer;
    }

    h1 {
        font-family: pac;
        color: firebrick;
        font-size: 110px;
    }

    .admin-only {
        display: flex;
        justify-content: space-around;
        margin-top: 0.5rem;
    }

    .admin-only a {
        background-color: firebrick;
        color: #fff;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        display: inline-block;
    }

    .admin-only a:hover {
        background-color: black;
        transition: 1s;
    }

    .menuPic {
        margin: 100px auto;
        width: 80%;
        background-image: url(images/bg3.webp);
        background-position: center;
        background-size: cover;
        border-radius: 10px;
        text-align: center;
        padding: 100px 0;
    }

    .menuPic h1 {
        color: firebrick;
        margin-bottom: 40px;
        padding: 0;
        font-family: pac;
        font-size: 80px;
        background-color: transparent;
    }

    @media (max-width: 700px) {
        .menuPic h1 {
            font-size: 24px;
        }
    }
    .admin-btn{
        color: black;
        font-size: 20px;
    }
    .admin-btn:hover{
        color: darkred;
        transition: 0.5s;
    }
</style>