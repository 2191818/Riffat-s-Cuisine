<!DOCTYPE html>

<head>
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
    <title>Riffat's Cuisine | Users</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">

    <script>
        function confirmDelete() {
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {} else {
                alert("Deletion canceled.");
            }
        }
    </script>
</head>

<body>

    <?php include 'Includes/navbar.php'; ?>

    <h1>User Management</h1>
    <div class="admin-only">
        <a href="index.php?controller=users&action=add"><i class="fa-solid fa-user-plus"></i> Add User</a>
    </div>
    <br>

    <div>
        <div class="search-container">
            <div class="search-bar">
                <input type="text" class="search-input" id="searchInput" placeholder="Search users" onkeypress="searchOnEnter(event)">
                <button class="search-button" onclick="searchUsers()">Search</button>
            </div>
        </div>
        <br><br>
        <div class="grid-container">
            <?php foreach ($users as $user) : ?>
                <div class="user-container">
                    <p><strong><?php echo $user['user_fname']; ?>, <?php echo $user['user_lname']; ?></strong></p>
                    <br>
                    <p><strong>Email:</strong></p>
                    <p></strong> <?php echo $user['user_email']; ?></p>
                    <p><strong>Username:</strong></p>
                    <p></strong> <?php echo $user['user_username']; ?></p>
                    <p><strong>Is Admin:</strong> <?php echo ($user['user_isAdmin'] == 1) ? 'Yes' : 'No'; ?></p>
                    <br>
                    <div class="user-icons">
                        <p><a href="index.php?controller=users&action=edit&id=<?php echo $user['user_id']; ?>"><i class="fa-solid fa-user-pen"></i></a></p>
                        <p><a href="index.php?controller=users&action=delete&id=<?php echo $user['user_id']; ?>" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i></a></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
</body>

</html>
<script>
    function searchOnEnter(event) {
        if (event.key === 'Enter') {
            searchUsers();
        }
    }

    function searchUsers() {
        var input, filter, containers, user;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        containers = document.querySelectorAll('.grid-container .user-container');

        containers.forEach(function(container) {
            var name = container.querySelector('p:first-child').innerText.toUpperCase();
            var email = container.querySelector('p:nth-child(4)').innerText.toUpperCase();
            var username = container.querySelector('p:nth-child(6)').innerText.toUpperCase();

            if (name.includes(filter) || email.includes(filter) || username.includes(filter)) {
                container.style.display = '';
            } else {
                container.style.display = 'none';
            }
        });
    }
</script>

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

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: firebrick;
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .user-container {
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: white;
    }

    .user-container a {
        text-decoration: none;
        color: black;
        padding: 5px 10px;
        border-radius: 5px;
        margin-top: 10px;
        display: inline-block;
        font-size: 20px;
    }

    .user-container a:hover {
        color: darkred;
        transition: 0.5s;
    }

    h1 {
        font-family: pac;
        color: firebrick;
        font-size: 110px;
        text-align: center;
    }

    .admin-only {
        display: flex;
        justify-content: space-around;
        margin-top: 0.5rem;
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

    .user-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80px;
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
</style>