<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Edit User</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <?php include 'Includes/navbar.php'; ?>
    <div style="display: flex; align-items: baseline; justify-content: center;">
        <h2>Edit - </h2>
        <h3>&nbsp;<?php echo $user['user_username']; ?></h3>
    </div>
    <div class="container">
        <form action="index.php?controller=users&action=update" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <label for="user_fname" style="font-weight: bold;">First Name</label>
            <input type="text" id="user_fname" name="user_fname" value="<?php echo $user['user_fname']; ?>" required>

            <label for="user_lname" style="font-weight: bold;">Last Name</label>
            <input type="text" id="user_lname" name="user_lname" value="<?php echo $user['user_lname']; ?>" required>

            <label for="user_email" style="font-weight: bold;">Email</label>
            <input type="email" id="user_email" name="user_email" value="<?php echo $user['user_email']; ?>" required>

            <label for="user_username" style="font-weight: bold;">Username</label>
            <input type="text" id="user_username" name="user_username" value="<?php echo $user['user_username']; ?>" required>

            <label for="user_isAdmin" style="font-weight: bold;">Is Admin</label>
            <input type="checkbox" id="user_isAdmin" name="user_isAdmin" value="1" <?php echo ($user['user_isAdmin'] == 1) ? 'checked' : ''; ?>>

            <button class="hero-btn" type="submit">Update User</button>
        </form>
        <br>
        <button class="hero-btn" onclick="location.href='index.php?controller=users&action=password'">Change Password</button>
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