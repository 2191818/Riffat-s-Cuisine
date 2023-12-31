<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Create Menu Items</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <div class="container">
        <h1>Create Menu Item</h1>
        <br>
        <form action="index.php?controller=menu&action=create" method="post">
            <input type="text" id="food_name" name="food_name" required placeholder="Name">
            <br>
            <input type="text" id="food_type" name="food_type" required placeholder="Type">
            <br>
            <input type="text" id="food_price" name="food_price" required placeholder="Price">
            <br>
            <input type="text" id="food_size" name="food_size" required placeholder="Size">
            <br>
            <button class="hero-btn" type="submit">Add Item</button>
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

    h1 {
        font-family: pac;
        font-size: 110px;
        color: firebrick;
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