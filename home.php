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
    include "snippets/header.php";
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
                <h3>GROW YOUR USERS</h3>
                <p>Geometric sans serif typefaces have been a popular design tool ever since these actors took to the
                    world's stage. Poppins is one of the new comers to this ...</p>

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
            <p class="about-title">A Proven Digital Advertising Platform</p>
            <p>
                Adbreakmedia Powered by Revenue Universe is a digital advertising
                platform that monetizes publishers’ desktop and mobile applications
                using a proprietary, in-application offer wall.
            </p>

            <span>
                Adbreakmedia prides itself on providing dedicated account manager
                support, ensuring that you generate as much revenue as possible from
                your users and get paid promptly each month.
            </span>

            <ul>
                <li>
                    ✅ Average eCPM (with similar performance across both Android & iOS
                    devices)
                </li>
                <li>✅ Advertiser relationships</li>
                <li>✅ Publisher partnerships</li>
                <li>
                    ✅ Users surveyed believe our offerwall is superior to other
                    offerwalls
                </li>
            </ul>
            <button>Get started ➡</button>
        </div>
    </div>

    <script src="./js/sticky.js"></script>
</body>

</html>