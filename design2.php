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
    include "middleware/authentication.php";
    if (!$authenticated) {
        header("location: login.php");
    }
    $user_id = $user["id"];
    $educations = getQuery($conn, "select * from education where account_id = $user_id");
    $contacts = getQuery($conn, "select * from contact where account_id = $user_id");
    $references = getQuery($conn, "select * from reference where account_id = $user_id");
    ?>
    <div id="container">
        <img src="<?php echo $user["profile_image"] ?>" alt="<?php echo $user["username"] ?> Profile Image" id="pic" />
        <div id="contact-info" class="vcard">
            <h1 class="fn"><?php echo $user["username"]; ?></h1>
            <p>
                <i class="fa-solid fa-phone-volume"></i><strong> Cell: </strong><span class="tel">01575033617</span><br />
                <i class="fa-solid fa-envelope"></i><strong> Email: </strong><a class="email" href="mailto:<?php echo $user["email"] ?>"><?php echo $user["email"] ?></a>
            </p>
        </div>
        <div id="aboutMe">
            <p><?php echo $user["about"]; ?></p>
        </div>
        <div class="clear"></div>
        <dl>
            <dd class="clear"></dd>
            <dt>Personal Info</dt>
            <dd>
                <p><strong>Address: </strong>Shenpara Parbata, Mirpur 10, Dhaka</p>
                <p><strong>Date Of Birth: </strong>13 December, 2001</p>
                <p><strong>Nationality: </strong>Bangladeshi</p>
                <p><strong>Marital Status: </strong>Unmarried</p>
            </dd>
            <dd class="clear"></dd>
            <dt>Education</dt>
            <dd>
                <?php foreach ($educations as $item) { ?>
                    <p><strong><?php echo $item["duration"] ?>: </strong><?php echo $item["institution"] ?> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i style="color: #999"><?php echo $item["course"] ?></i></p>
                <?php } ?>
            </dd>
            <dd class="clear"></dd>
            <dt>Programming Skills</dt>
            <dd>
                <ol class="skillList">
                    <li>Python</li>
                    <li>C++</li>
                    <li>Javascript</li>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>PHP</li>
                    <li>Jquery</li>
                    <li>MATLAB</li>
                    <li>C Programming</li>
                </ol>
            </dd>
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
            <dt>Certificates</dt>
            <dd>
                <ol class="skillList">
                    <p><strong>May 31,2020: </strong><a href="Certificates/Python Data Structure.pdf" class="certificateImg">Python Data Structure </a><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: #999">issued by COURSERA</i></p>
                    <p><strong>May 30,2020: </strong><a href="Certificates/Introduction to HTML5.pdf" class="certificateImg">Introduction To HTML5 </a><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: #999">issued by COURSERA</i></p>
                    <p><strong>May 30,2020: </strong><a href="Certificates/Introduction to CSS3.pdf" class="certificateImg">Introduction to CSS </a><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: #999">issued by COURSERA</i></p>
                    <p><strong>June 9,2020: </strong><a href="Certificates/C For Everyone.pdf" class="certificateImg">C For Everyone </a><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color: #999">issued by COURSERA</i></p>
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