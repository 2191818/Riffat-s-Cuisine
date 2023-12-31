<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riffat's Cuisine | Account</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">


</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <div style="display: flex; align-items: baseline; justify-content: center;">
        <h2>User Account -</h2>
        <h3>&nbsp;<?php echo $_SESSION['user_username']; ?></h3>
    </div>

    <div id="container">
        <div id="sidebar">
            <button onclick="showForm('userDetailsForm')">User Details</button>
            <button onclick="showForm('changePasswordForm')">Change Password</button>
            <button onclick="showForm('additionalDetailsForm')">Additional Details</button>

        </div>

        <div id="formContainer">

            <section id="userDetailsForm" class="active">
                <form action="index.php?controller=profile&action=updateAccount" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <label for="user_fname">First Name:</label>
                    <input type="text" id="user_fname" name="user_fname" value="<?php echo $user['user_fname']; ?>" required>
                    <br><br>
                    <label for="user_lname">Last Name:</label>
                    <input type="text" id="user_lname" name="user_lname" value="<?php echo $user['user_lname']; ?>" required>
                    <br><br>
                    <label for="user_email">Email:</label>
                    <input type="email" id="user_email" name="user_email" value="<?php echo $user['user_email']; ?>" required>
                    <br><br>
                    <label for="user_username">Username:</label>
                    <input type="text" id="user_username" name="user_username" value="<?php echo $user['user_username']; ?>" required>
                    <br><br>
                    <button class="hero-btn" type="submit">Update User Details</button>
                </form>
            </section>


            <section id="changePasswordForm">
                <form action="index.php?controller=profile&action=updatePassword" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" value="<?php echo $user['user_pass']; ?>" required>
                    <button class="hero-btn" type="submit">Change Password</button>
                </form>
            </section>

            <section id="additionalDetailsForm">
                <form action="index.php?controller=profile&action=updateInfo" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" id="phone_number" name="phone_number" value="<?php echo isset($userInfo['phone_number']) ? $userInfo['phone_number'] : ''; ?>">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo isset($userInfo['address']) ? $userInfo['address'] : ''; ?>">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" id="postal_code" name="postal_code" value="<?php echo isset($userInfo['postal_code']) ? $userInfo['postal_code'] : ''; ?>">
                    <label for="second_email">Second Email:</label>
                    <input type="email" id="second_email" name="second_email" value="<?php echo isset($userInfo['second_email']) ? $userInfo['second_email'] : ''; ?>">
                    <button class="hero-btn" type="submit">Update Additional Details</button>
                </form>
            </section>


        </div>
    </div>

    <script>
        function showForm(formId) {
            // Hide all sections
            var sections = document.querySelectorAll('section');
            sections.forEach(function(section) {
                section.classList.remove('active');
            });

            // Show the selected section
            var selectedForm = document.getElementById(formId);
            selectedForm.classList.add('active');
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
        overflow-x: hidden;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1,
    h2 {
        text-align: center;
        font-family: pac;
        font-size: 110px;
        color: firebrick;
    }

    #container {
        display: flex;
        width: 80%;
        margin-top: 20px;
        overflow: hidden;
        height: 600px;
    }

    #sidebar {
        width: 20%;
        background-color: firebrick;
        padding: 20px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
    }

    #formContainer {
        width: 80%;
        padding: 20px;
        box-sizing: border-box;
        background-color: white;
    }

    section {
        display: none;
    }

    .active {
        display: block;
    }

    h3 {
        font-family: pac;
        text-align: center;
        font-size: 64px;
    }

    button {
        margin-bottom: 10px;
        background-color: firebrick;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 5px;
        border: 2px solid darkred;
    }

    button:hover {
        background-color: black;
        transition: 0.5s;
        border: 2px solid black;

    }

    .logout-btn {
        background-color: oldlace;
        color: firebrick;
        font-weight: bold;
        border: 2px solid darkred;
    }

    .logout-btn:hover {
        background-color: black;
        color: white;
    }

    input {
        margin-bottom: 10px;
        padding: 8px;
        box-sizing: border-box;
        width: 100%;
        border: 2px solid black;
    }
</style>