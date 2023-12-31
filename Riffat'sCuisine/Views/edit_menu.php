<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Edit Menu Item</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <?php include 'Includes/navbar.php'; ?>
    <div style="display: flex; align-items: baseline; justify-content: center;">
        <h2>Edit - </h2>
        <h3>&nbsp;<?php echo $item['food_name']; ?></h3>
    </div>
    <br>
    <div class="container">
        <form action="index.php?controller=menu&action=update" method="post">
            <input type="hidden" name="food_id" value="<?php echo $item['food_id']; ?>">
            <label for="food_name" style="font-weight: bold;">Name</label>
            <input type="text" id="food_name" name="food_name" value="<?php echo $item['food_name']; ?>" required>
            <br>
            <label for="food_type" style="font-weight: bold;">Type</label>
            <input type="text" id="food_type" name="food_type" value="<?php echo $item['food_type']; ?>" required>
            <br>
            <label for="food_price" style="font-weight: bold;">Price</label>
            <input type="text" id="food_price" name="food_price" value="<?php echo $item['food_price']; ?>" required>
            <br>
            <label for="food_size" style="font-weight: bold;">Size</label>
            <input type="text" id="food_size" name="food_size" value="<?php echo $item['food_size']; ?>" required>
            <br>
            <button class="hero-btn" type="submit">Update</button>
        </form>
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

    .container {
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: auto;
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
    }

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
</style>