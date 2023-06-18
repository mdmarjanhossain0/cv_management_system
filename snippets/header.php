<header>
    <div class="navbar">
        <input type="checkbox" id="toggle_input" value="false" onchange="toggle_button()">
        <div class="header-button">
            <label for="toggle_input" id="toggle_label"><i class="fa-solid fa-bars"></i></label>
            <h1>OpenResume.com</h1>
        </div>
        <ul id="nav_ul">
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="contact.php">Contact</a></li> -->

            <?php if ($authenticated) { ?>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Lougout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php } ?>

        </ul>

    </div>
</header>