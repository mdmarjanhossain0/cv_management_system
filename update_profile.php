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
    if (!$authenticated) {
        header("location: home.php");
    }
    $user_id = $user["id"];
    $username = $user["username"];
    $email = $user["email"];
    $contact_number = $user["contact_number"];
    $sub_domain = $user["sub_domain"];
    $profile_title = $user["title"];
    $about = $user["about"];
    $error_message = null;
    $message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $contact_number = $_POST["contact_number"];
        $sub_domain = $_POST["sub_domain"];
        $profile_title = $_POST["profile_title"];
        $about = $_POST["about"];
        if ($user["email"] != $email && isEmailExist($conn, $email)) {
            $error_message = "Email already exist";
            $message = "Update Error";
        } else if ($user["sub_domain"] != $sub_domain && isSubDomainExist($conn, $sub_domain)) {
            $error_message = "Sub Domain already exist";
            $message = "Update Error";
        } else {
            $profile_image = $_FILES['profile_image']['name'];
            if (!($profile_image == "")) {
                $expbanner = explode('.', $profile_image);
                $profile_image_exptype = $expbanner[1];
                date_default_timezone_set('Asia/Dhaka');
                $date = date('d/m/Yh:i:sa', time());
                $rand = rand(10000, 99999);
                $encname = $date . $rand;
                $profile_imagename = md5($encname) . '.' . $profile_image_exptype;
                $profile_image_path = "images/profile_image/" . $profile_imagename;
                move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profile_image_path);
                $sql = "UPDATE account SET username = '$username', email = '$email', contact_number = '$contact_number', sub_domain = '$sub_domain', title = '$profile_title', profile_image = '$profile_image_path', about = '$about' where id = $user_id";
            } else {
                $profile_image_path = "images/profile_image/default_profile_image.webp";
                $sql = "UPDATE account SET username = '$username', email = '$email', contact_number = '$contact_number', sub_domain = '$sub_domain', title = '$profile_title', about = '$about' where id = $user_id";
            }
            $result = updateQuery($conn, $sql);
            if ($result) {


                $message = "Successfully updated.";
                // header("location: profile.php");
            } else {
                // $_SESSION["authenticated"] = false;
            }
        }
    }

    dbClose($conn);
    ?>

    <?php
    include "snippets/header.php";
    ?>






    <?php if ($message != null) { ?>
        <div class="alert alert-success" role="alert" style="text-align: center">
            <?php echo $message ?>
        </div>
    <?php } ?>
    <div class="m-container">
        <div class="main-card">
            <div class="select-tab">
                <p>
                    Hello, Friend!
                    <br>
                    Hello, Friend! Update Your Personal Details
                </p>
            </div>
            <div class="login-card">
                <div class="title">
                    <h3>Update Profile</h3>
                </div>
                <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                    <input type="file" accept="imgae/*" name="profile_image">
                    <input type="text" placeholder="Username" id="username" name="username" value="<?php echo  $username; ?>" required />
                    <input type="email" placeholder="Email" id="email" name="email" value="<?php echo  $email; ?>" required />
                    <input type="test" placeholder="Contact Number" id="contact_number" name="contact_number" value="<?php echo  $contact_number; ?>" required />
                    <input type="text" placeholder="Sub Domain" id="sub_domain" name="sub_domain" value="<?php echo  $sub_domain; ?>" required />
                    <input type="text" placeholder="Profile title" id="profile_title" name="profile_title" value="<?php echo  $profile_title; ?>" required />
                    <textarea name="about" placeholder="Write something about you..." id="about" style="min-height: 10rem;"><?php echo  $about; ?></textarea>
                    <label for="" style="color: red; font-weight: bold;"><?php echo $error_message ?></label>
                    <button name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>