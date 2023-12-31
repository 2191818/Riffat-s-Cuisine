<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Add User</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <?php include 'Includes/navbar.php'; ?>
    <h1>Add User</h1>

    <div class="container">

        <form action="index.php?controller=users&action=create" method="post">
            <input type="text" id="user_fname" name="user_fname" required placeholder="First Name">
            <br>
            <input type="text" id="user_lname" name="user_lname" required placeholder="Last Name">
            <br>
            <input type="email" id="user_email" name="user_email" required placeholder="Email">
            <br>
            <input type="text" id="user_username" name="user_username" required placeholder="Username">
            <br>
            <input type="password" id="user_pass" name="user_pass" required placeholder="Password">
            <br>
            <label for="user_isAdmin">Is Admin:</label>
            <input type="checkbox" id="user_isAdmin" name="user_isAdmin" value="1">

            <button class="hero-btn" type="submit">Add User</button>
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

    button {
        padding: 10px;
        cursor: pointer;
        background-color: firebrick;
        color: white;
        border: none;
        border-radius: 5px;
    }

    button:hover {
        background-color: darkred;
    }

    h1 {
        font-family: pac;
        color: firebrick;
        font-size: 110px;
        text-align: center;
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
</style>