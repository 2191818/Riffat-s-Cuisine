<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Signup</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">


</head>

<body>

    <div class="signup-container">
        <img src="images/logo.png" alt="">
        <h1>Signup</h1>
        <br>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'username_exists') {
            echo '<p class="error-message"><strong>Username already exists. Please choose a different username.</strong></p';
        }
        ?>
        <br><br>
        <form action="index.php?controller=signup&action=register" method="post">
            <input type="text" id="fname" name="fname" required placeholder="First Name">
            <input type="text" id="lname" name="lname" required placeholder="Last Name">
            <input type="email" id="email" name="email" required placeholder="Email">
            <input type="text" id="username" name="username" required placeholder="Username">
            <input type="password" id="password" name="password" required placeholder="Password">

            <button type="submit">Sign Up</button>
        </form>
        <br>
        <p>Already have an account? <a id="signup-text" href="index.php?controller=login&action=login" style="color: firebrick; text-decoration: none;">Login here</a>.</p>
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
        background: linear-gradient(to bottom, #f9dfb0, #9d6b0d) no-repeat fixed;
        background-size: cover;
    }

    .signup-container {
        margin: auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        max-width: 400px;
        width: 100%;
        background-color: OldLace;
        padding: 50px;
        border: 2px solid black;
        border-radius: 15px;
    }


    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input,
    button {
        border: none;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 8px;
        background-color: white;
    }

    button {
        padding: 10px;
        cursor: pointer;
    }

    button:hover {
        background-color: firebrick;
        color: oldlace;
        transition: 0.5s;
    }

    .error-message {
        color: firebrick;
    }

    #signup-text {
        color: firebrick;
        text-decoration: none;
    }

    h1 {
        font-family: pac;
        font-size: 64px;
        color: firebrick;
    }
</style>