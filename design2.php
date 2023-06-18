<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta nam e="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/cv_style_r2.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
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
    <div id="container">
        <img src="<?php echo $user["profile_image"] ?>" alt="<?php echo $user["username"] ?> Profile Image" id="pic" />
        <div id="contact-info" class="vcard">
            <h1 class="fn"><?php echo $user["username"]; ?><sub style="font-size: 20px; color: gray;">&nbsp;&nbsp;&nbsp;-&nbsp; <?php echo $user["title"]; ?></sub></h1>
            <p>
                <i class="fa-solid fa-phone-volume"></i><strong> Cell: </strong><span class="tel"><?php echo $user["contact_number"]; ?></span><br />
                <i class="fa-solid fa-envelope"></i><strong> Email: </strong><a class="email" href="mailto:<?php echo $user["email"] ?>"><?php echo $user["email"] ?></a>
            </p>
        </div>
        <div id="aboutMe">
            <p><?php echo $user["about"]; ?></p>
        </div>
        <div class="clear"></div>
        <dl>

            <dd class="clear"></dd>
            <dt>Education</dt>
            <dd>
                <?php foreach ($educations as $item) { ?>
                    <p><strong><?php echo $item["duration"] ?>: </strong><?php echo $item["institution"] ?> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i style="color: #999"><?php echo $item["course"] ?></i></p>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dt>Work Experience</dt>
            <dd>
                <ol class="skillList">
                    <?php foreach ($experiences as $item) { ?>
                        <p><strong><?php echo $item["duration"]; ?>&nbsp;:&nbsp; </strong><a href="Certificates/Python Data Structure.pdf" class="certificateImg"><?php echo $item["institution"]; ?> </a><br>
                            &nbsp;-&nbsp;<i style="color: #999"><?php echo $item["description"]; ?></i>
                        </p>
                    <?php } ?>
                </ol>
            </dd>
            <dd class="clear"></dd>
            <dd class="clear"></dd>
            <dt>Reference</dt>
            <dd>
                <ol class="skillList">
                    <?php foreach ($references as $item) { ?>
                        <li><?php echo $item["name"]; ?></li>
                    <?php } ?>
                </ol>
            </dd>
            <dd class="clear"></dd>
            <dt>Contacts and Profiles</dt>
            <dd>
                <?php foreach ($contacts as $item) { ?>
                    <p><strong><?php echo $item["title"] ?>: </strong><a href="https://www.linkedin.com/in/nishat-taaha-0571a2216/"><?php echo $item["value"] ?></a></p>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
        </dl>
        <div class="clear"></div>
    </div>
</body>

</html>