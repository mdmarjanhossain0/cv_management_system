<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/cv_style_r3.css">
    <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>
    <?php
    include "middleware/authentication.php";
    if (!$authenticated) {
        header("location: login.php");
    }
    $user_id = $user["id"];
    $educations = getQuery($conn, "select * from education where account_id = $user_id");
    // print_r($educations);
    $experiences = getQuery($conn, "select * from experience where account_id = $user_id");
    print_r($experiences);
    $contacts = getQuery($conn, "select * from contact where account_id = $user_id");
    // print_r($contacts);
    $references = getQuery($conn, "select * from reference where account_id = $user_id");
    // print_r($references);
    ?>
    <div class="container">
        <div class="left">
            <div class="profile_box">
                <div class="image">
                    <img src="me.png">
                </div>

            </div>
            <div class="contact">
                <h2 class=title>Contact</h2>
                <ul class="personal">
                    <?php foreach ($contacts as $item) { ?>
                        <li>
                            <span><?php echo $item["title"] ?> : </span>
                            <span class="info"><?php echo $item["value"] ?></span>

                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="contact">
                <h2 class=title>Education</h2>
                <ul>
                    <?php foreach ($educations as $item) { ?>
                        <li>
                            <h1 class="year"><?php echo $item["duration"] ?></h1>
                            <h1 class="degree"><?php echo $item["course"] ?></h1>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="contact">
                <h2 class=title>Language</h2>
                <ul>
                    <li>
                        <span class="lang">Bangla</span>
                        <span class="percent">
                            <div style="width: 99%;"></div>
                        </span>
                    </li>

                    <li>
                        <span class="lang">English</span>
                        <span class="percent">
                            <div style="width: 90%;"></div>

                        </span>

                    </li>
                    <li>
                        <span class="lang">Hindi</span>
                        <span class="percent">
                            <div style="width: 80%;"></div>
                        </span>

                    </li>
                </ul>
            </div>

        </div>
        <div class="right">

            <div class="r_divs">
                <div class="name">
                    <h2>
                        <div class="l1"><?php echo $user["username"] ?></div>
                        <div class="l2"><?php echo $user["title"] ?></div>
                        <div class="dwnld">
                            <a href="girl.png" download="pic" target="_blank">Download</a>
                        </div>

                    </h2>
                </div>
                <div class="contact">
                    <div class="title1">
                        About Me </div>
                    <h3 class="about_me">
                        I am fairly new to web design, and haven’t mastered the differences in positioning of elements. I know there is absolute, fixed, and relative. Are there any others. Also, do they majorly differ. And when should you use which.
                    </h3>
                </div>
                <div class="contact">
                    <div class="title1">
                        Experience
                    </div>
                    <h3 class="work">
                        <div class="w_place">
                            <?php foreach ($experiences as $item) { ?>
                                <div class="w1"><?php echo $item["institution"] ?></div>


                            <?php } ?>
                        </div>
                        <div class="w_descrip">
                            <?php foreach ($experiences as $item) { ?>
                                <div class="tata"><?php echo $item["description"] ?></div>
                            <?php } ?>
                        </div>
                    </h3>
                </div>
                <div class="contact">
                    <div class="title1">
                        Awards
                    </div>
                    <ul>
                        <li>
                            <i data-feather="award" class="icon-award"></i>
                            <span class="achieve">2nd runner up</span><br>
                            <span class="place"> Intra-varsity web designing contest</span>

                        </li>
                        <li>

                            <i data-feather="award" class="icon-award"></i>

                            <span class="achieve">1st runner up </span><br>
                            <span class="place"> Spark Data Analyst contest</span>

                        </li>


                    </ul>
                    </p>

                </div>
                <div class="contact">
                    <div class="title1">
                        Skills
                    </div>
                    <ul class="skills">
                        <li>
                            HTML
                        </li>
                        <li>Javascript</li>
                        <li>Photoshop</li>
                        <li>Ms Word</li>
                        <li>Ms Excel</li>





                    </ul>
                    </p>

                </div>



                </h3>
            </div>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
</body>

</html>