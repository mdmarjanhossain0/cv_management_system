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
    if ($authenticated) {
        header("location: profile.php");
    }
    $login_error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "select * from account where email = '$email' and password = '$password'";
        $result = getQuery($conn, $sql);
        $dataLen = count($result);
        if ($dataLen == 1) {
            $result = $result[0];
            $_SESSION["authenticated"] = true;
            $_SESSION["id"] = $result["id"];
            header("location: profile.php");
        } else {
            $_SESSION["authenticated"] = false;
            $login_error_message = "Please correct email and password";
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
                <button><a href="register.php" style="color: white; text-decoration: none;">Register</a></button>
            </div>
            <div class="login-card">
                <div class="title">
                    <h3>Sign in</h3>
                </div>
                <form method="POST" action="login.php">
                    <input type="text" placeholder="Email" id="login_email" name="email" />
                    <input type="password" placeholder="password" name="password" />
                    <label for="" style="color: red; font-weight: bold;"><?php echo $login_error_message ?></label>
                    <a href="">Forgot Password</a>
                    <button id="login_sub" name="login">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>