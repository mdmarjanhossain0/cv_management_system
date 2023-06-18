<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="css/cv_style_r43.css">
    <script src="https://kit.fontawesome.com/55cbe1267c.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    // include "middleware/subdomain_authentication.php";
    if (!$authenticated) {
        header("location: login.php");
    }
    $user_id = $user["id"];
    $educations = getQuery($conn, "select * from education where account_id = $user_id");
    $experiences = getQuery($conn, "select * from experience where account_id = $user_id");
    $contacts = getQuery($conn, "select * from contact where account_id = $user_id");
    $references = getQuery($conn, "select * from reference where account_id = $user_id");
    ?>
    <div class="full">
        <div class="left">
            <div class="image">
                <img id="HeaderImage" src="<?php echo $user["profile_image"]; ?>" alt="Sumit Das" style="width:250px; height:250px;">
            </div>
            <div class="Contact">
                <h2>Contact</h2>
                <p><i class="fa-solid fa-envelope"></i>&ensp;<?php echo $user["email"]; ?></p>
                <p><i class="fa-solid fa-phone"></i>&ensp;<?php echo $user["contact_number"]; ?></p>
                <p><i class="fa-sharp fa-solid fa-location-dot"></i>&ensp;Dhaka, Bangladesh</p><br>

                <a class="links" href="https://www.facebook.com/Mar4KoV/" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                <a class="links" href="https://www.instagram.com/su._.mit_____/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a class="links" href="https://www.linkedin.com/in/sumitdas77/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a class="links" href="https://github.com/SumitDas44" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a class="links" href="https://steamcommunity.com" target="_blank"><i class="fa-brands fa-steam"></i></a>
                <a class="links" href="https://discord.com/channels/@me" target="_blank"><i class="fa-brands fa-discord"></i></a>
                <a class="links" href="https://twitter.com/_su_mit_77" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            </div>
            <!-- <div class="Skills">
                <h2>Skills</h2>
                <ul>
                    <li><b>Programming Languages :
                            C++, Python</b></li>
                    <li><b>Frontend : HTML5, CSS3,
                            JavaScript</b></li>
                    <li><b>Backend : Node.js</b></li>
                    <li><b>Google Workspace</b></li>
                    <li><b>Adobe Illustrator</b></li>
                </ul>
            </div>
            <div class="Language">
                <h2>Language</h2>
                <ul>
                    <li>Bangla</li>
                    <li>English</li>
                    <li>Hindi</li>
                </ul>
            </div>
            <div class="Hobbies">
                <h2>Hobbies</h2>
                <ul>
                    <li>Playing Video Games</li>
                    <li>Watch Football</li>
                </ul>
            </div> -->
        </div>
        <div class="right">
            <div class="name">
                <h1><?php echo $user["username"]; ?></h1>
            </div>
            <div class="title">
                <p>
                <h3>- <?php echo $user["title"]; ?></h3>
                </p>
            </div>
            <div class="Summary">
                <h2>Profile</h2>
                <p>
                    <?php echo $user["about"]; ?>
                </p>
            </div>
            <div class="Education">
                <h2>Educational Qualifications</h2>
                <table border="1px" style="border-color: blue; border-radius: 5px;">
                    <tr>
                        <th>University/college </th>
                        <th>Exam </th>
                        <th>Passing year </th>
                        <th>Result</th>
                    </tr>
                    <?php foreach ($educations as $item) { ?>
                        <tr>
                            <td><?php echo $item["institution"]; ?></td>
                            <td><?php echo $item["course"]; ?></td>
                            <td><?php echo $item["duration"]; ?></td>
                            <td><?php echo $item["description"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <div class="Experience">
                <h2>Co-curricular Activities</h2>
                <?php foreach ($experiences as $item) { ?>
                    <h3><?php echo $item["institution"]; ?></h3>
                    <p>&nbsp;&nbsp;- <?php echo $item["duration"]; ?></p>
                    <ul>
                        <?php echo $item["description"]; ?>
                    </ul>
                    <br>
                <?php } ?>
            </div>
            <div class="Experience">
                <h2>Contacts</h2>
                <?php foreach ($contacts as $item) { ?>
                    <span><b><?php echo $item["title"]; ?></b></span>
                    <span>&nbsp;&nbsp;- <?php echo $item["value"]; ?></span>
                    <br>
                <?php } ?>
            </div>

            <div class="Experience">
                <h2>References</h2>
                <?php foreach ($references as $item) { ?>
                    <span><b><?php echo $item["name"]; ?></b></span>
                    <p>&nbsp;&nbsp;- <?php echo $item["description"]; ?></p>
                    <br>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>