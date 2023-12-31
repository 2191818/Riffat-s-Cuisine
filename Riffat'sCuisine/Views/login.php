<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Login</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

</head>

<body>

    <div class="login-container">
        <img src="images/logo.png" alt="">
        <h1>Login</h1>
        <br>
        <?php if (isset($_GET['error']) && $_GET['error'] === 'username_not_found') : ?>
            <p class="error-message"><strong>Username not found. Please check your username and try again.</strong></p>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') : ?>
            <p class="error-message"><strong>Incorrect password. Please check your password and try again.</strong></p>
        <?php endif; ?>
        <br>


        <form action="index.php?controller=login&action=login" method="post">
            <input type="text" id="username" name="username" required placeholder="Username">
            <input type="password" id="password" name="password" required placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <br>
        <p>Don't have an account? <a id="signup-text" href="index.php?controller=signup&action=index">Sign up here</a>.</p>
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

    .login-container {
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
        color: black;
    }

    button {
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        color: oldlace;
        background-color: firebrick;
        transition: 0.5s;
    }

    #signup-text {
        color: firebrick;
        text-decoration: none;
    }

    .error-message {
        color: firebrick;
        margin-top: 10px;
    }

    h1 {
        font-family: pac;
        font-size: 64px;
        color: firebrick;
    }
</style>