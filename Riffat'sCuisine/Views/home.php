<!DOCTYPE html>
<html lang="en">

<head>
    <link href="http://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <title>Riffat's Cuisine</title>
    <link rel="icon" type="image/x-icon" href="images/tablogo.png">
    <script src="https://kit.fontawesome.com/8b75f0d2e8.js" crossorigin="anonymous"></script>
</head>

<body>

    <section class="header">
        <?php include 'Includes/navbar.php'; ?>

        <div class="text-box">
            <h1>The Best Way to Eat</h1>
            <p>Simple and delicious ready-to-cook and ready-to-eat meals.</p>
            <a href="index.php?controller=menu&action=index" class="hero-btn">View Our Menu</a>
        </div>
    </section>

    <br><br>

    <section class="cta">
        <h1> Welcome. Feeling hungry?</h1>
        <a href="index.php?controller=menu&action=index" class="hero-btn">View Our Menu</a>
    </section>

    <h1>Our Specials</h1>
    <br>
    <div class="carousel-container">
        <img src="https://images.pexels.com/photos/2474661/pexels-photo-2474661.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Image 1" class="carousel-image">
        <img src="https://www.seriouseats.com/thmb/PP7w05tkfAuQpj4_PQeMUPRUgQ0=/450x300/filters:no_upscale():max_bytes(150000):strip_icc()/20210909-SAMOSAS-ANDREWJANJIGIAN-86-ca872c2eae8e4e7eb4e7b47cfad8715e.jpg" alt="Image 3" class="carousel-image">
    </div>
    <!-- <footer>
        <div class="footer-column">
            <h3>About Us</h3>
            <br>
            <p>At Riffat's Cuisine, we will continue to operate to high standards, producing food with passion and delivering this to all our new and existing customers within our amazing new space. Looking forward to seeing you soon!</p>
        </div>

        <div class="footer-column">
            <h3>Schedule</h3>
            <br>
            <ul>
                <li>Sunday | 11 AM - 5 PM</li>
                <li>Monday | 10 AM - 6 PM</li>
                <li>Tuesday | 10 AM - 6 PM</li>
                <li>Wednesday | 10 AM - 6 PM</li>
                <li>Thursday | 10 AM - 6 PM</li>
                <li>Friday | 10 AM - 6 PM</li>
                <li>Saturday | 11 AM - 5 PM</li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Contact</h3>
            <br>
            <ul>
                <li>Address: Vanier College</li>
                <li>Phone: (123) 456 - 7890</li>
                <li>Email: riffatscuisine@outlook.com</li>
                <li>Facebook: Riffat's Cuisine</li>
                <li>Created by Muhammad Arslan Saeed</li>
            </ul>
        </div>
    </footer> -->

    <?php include 'Includes/footer.php'; ?>

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
        /* Hide horizontal scrollbar */
    }

    h1,
    h2 {
        text-align: center;
        font-family: pac;
        font-size: 110px;
        color: firebrick;
    }

    .carousel-container {
        width: 25%;
        margin: auto;
        overflow: hidden;
        margin-top: 20px;
        border-radius: 10px;
    }

    .carousel-image {
        width: 100%;
        border-radius: 10px;
        display: none;
    }

    .carousel-image:first-child {
        display: block;
    }

    /* footer {
        display: flex;
        justify-content: space-around;
        padding: 20px 0;
    }

    .footer-column {
        flex: 1;
        margin: 0 20px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 5px;
    } */
    /*footer*/

    h3 {
        font-family: pac;
        text-align: center;
        font-size: 64px;
    }

    .cta {
        margin: 100px auto;
        width: 80%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(images/bg7.jpg);
        background-position: center;
        background-size: cover;
        border-radius: 10px;
        text-align: center;
        padding: 100px 0;
    }

    .cta h1 {
        color: #fff;
        margin-bottom: 40px;
        padding: 0;
    }

    @media (max-width: 700px) {
        .cta h1 {
            font-size: 24px;
        }
    }

    .header {
        min-height: 100vh;
        width: 100%;
        background-image: linear-gradient(to bottom,
                oldlace 0%,
                rgba(4, 9, 30, 0.7) 13%,
                rgba(4, 9, 30, 0.6) 95%,
                oldlace 100%), url(images/bg1.jpg);
        background-position: center;
        position: relative;
    }

    .text-box {
        width: 90%;
        color: oldlace;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .text-box h1 {
        font-size: 110px;
        font-family: pac;
    }

    .text-box p {
        margin: 10px 0 40px;
        font-size: 14px;
        color: #fff;
    }

    .hero-btn {
        display: inline-block;
        text-decoration: none;
        color: oldlace;
        border: 1px solid oldlace;
        border-radius: 5px;
        padding: 12px 34px;
        font-size: 13px;
        background: transparent;
        position: relative;
        cursor: pointer;
    }

    .hero-btn:hover {
        border: 1px solid firebrick;
        background-color: firebrick;
        transition: 1s;
    }

    .navbar {
        color: oldlace;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentImageIndex = 0;
        const images = document.querySelectorAll(".carousel-image");

        function showNextImage() {
            images[currentImageIndex].style.display = "none";
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].style.display = "block";
        }

        setInterval(showNextImage, 3000);
    });
</script>