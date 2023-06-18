<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/landing_style.css" />
    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/landing_about.css" />
</head>

<body>
<?php
    include "middleware/authentication.php";
    ?>

    <div class="top">
        <header id="navbar">
            <a href="#" class="logo">OpenResume</a>
            <input type="checkbox" id="menu-bar">
            <label for="menu-bar" class="fas fa-bars"></label>
            <nav class="navbar">
            <a href="index.php">Home</a>

            <?php if ($authenticated) { ?>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Lougout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php } ?>

            </nav>
        </header>








        <section class="home">
            <div class="content">
                <h3>Welcome to OpenResume</h3>
                <p>"Welcome to CV Management, where we transform your job search journey into a breeze! Our user-friendly platform is designed to help you create, edit, and optimize your CV effortlessly. Say goodbye to stress and hello to success as you showcase your skills and experience to potential employers. Let's get started!"</p>

                <a href="#" class="btn">Get start</a>
            </div>


            <div class="image">

                <img src="./images/home-img.png" />
            </div>
        </section>
    </div>

    <div class="about">
        <div class="left">
            <img src="./images/about.png" alt="about" class="about-img" />
        </div>
        <div class="right" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-easing="ease-in-out"
            data-aos-mirror="true" data-aos-once="false" data-aos-anchor-placement="top-center">
            <h3>About us</h3>
            <p class="about-title">A proven Resume Management system</p>

            <ul>
                <li>
                    ✅ - Easy-to-use CV creation and editing tools
                </li>
                    <li>
                    ✅ - Professionally designed templates for a polished and impactful CV
                    </li>
                    <li>
                    ✅ - Keyword optimization to enhance your CV's visibility to employers
                    </li>
                    <li>
                    ✅ - Customizable sections for highlighting your skills, education, experience, and more
                    </li>
                    <li>
                    ✅ - Ability to import and export your CV in various formats (PDF, Word, etc.)
                    </li>
                    <li>
                    ✅ - Expert tips and guidance for crafting a standout CV
                    </li>
                    <li>
                    ✅ - Personalized feedback and suggestions for improvement
                    </li>
                    <li>
                    ✅ - Secure storage and access to your CV anytime, anywhere
                    </li>
                    <li>
                    ✅ - Job search assistance and integration with popular job boards
                    </li>
                    <li>
                    ✅ - Collaboration features for sharing and receiving feedback from peers or mentors.
                    </li>
            </ul>
            <button>Get started ➡</button>
        </div>
    </div>
    <footer class="">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a style="color: white" href="https://educodiv.com">OpenResume.com</a>
        </div>
    </footer>

    <script src="./js/sticky.js"></script>
</body>

</html>