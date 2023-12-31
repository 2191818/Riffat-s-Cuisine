<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Update Password</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <?php include 'Includes/navbar.php'; ?>
    <h2>Update Password</h2>
    <div class="container">
        <form action="index.php?controller=users&action=updatePassword" method="post">
            <label for="new_password" style="font-weight: bold;">New Password</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="confirm_password" style="font-weight: bold;">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button class="hero-btn" type="submit">Update Password</button>
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

    h2 {
        text-align: center;
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

    h3 {
        font-family: pac;
        text-align: center;
        font-size: 64px;
    }
</style>