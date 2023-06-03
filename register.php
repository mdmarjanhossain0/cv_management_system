<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Log in</title>
</head>

<body>

    <?php
    include "middleware/authentication.php";
    include "config/validation.php";
    if ($authenticated) {
        header("location: profile.php");
    }
    $username = "";
    $email = "";
    $sub_domain = "";
    $profile_title = "";
    $password = "";
    $confirm_password = "";
    $error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $sub_domain = $_POST["sub_domain"];
        $profile_title = $_POST["profile_title"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        if ($password != $confirm_password) {
            $error_message = "Password not match";
        } else if (isEmailExist($conn, $email)) {
            $error_message = "Email already exist";
        } else if (isSubDomainExist($conn, $sub_domain)) {
            $error_message = "Sub Domain already exist";
        } else {
            $sql = "INSERT INTO account (username, email, sub_domain, title, password) values ('$username', '$email', '$sub_domain', '$profile_title', '$password')";
            $result = insertQuery($conn, $sql);
            if ($result) {
                $_SESSION["authenticated"] = true;
                $_SESSION["id"] = $result;
                header("location: profile.php");
            } else {
                $_SESSION["authenticated"] = false;
            }
        }
    }

    dbClose($conn);
    ?>

    <?php
    include "snippets/header.php";
    ?>
    <div class="m-container">
        <div class="main-card">
            <div class="select-tab">
                <p>
                    Hello, Friend!
                    Enter your personal details and start journey with us
                </p>
                <button><a href="login.php" style="color: white; text-decoration: none;">Log In</a></button>
            </div>
            <div class="login-card">
                <div class="title">
                    <h3>Register</h3>
                </div>
                <form method="POST" action="register.php">
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php echo  $username; ?>" required />
                    <input type="email" placeholder="Email" id="email" name="email" value="<?php echo  $email; ?>" required />
                    <input type="text" placeholder="Sub Domain" id="sub_domain" name="sub_domain" value="<?php echo  $sub_domain; ?>" required />
                    <input type="text" placeholder="Profile title" id="profile_title" name="profile_title" value="<?php echo  $profile_title; ?>" required />
                    <input type="password" placeholder="password" name="password" value="<?php echo  $password; ?>" required />
                    <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo  $confirm_password; ?>" required />
                    <label for="" style="color: red; font-weight: bold;"><?php echo $error_message ?></label>
                    <button name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>