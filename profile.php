<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <?php
    include "middleware/authentication.php";
    if (!$authenticated) {
        header("location: login.php");
    }

    $user_id = $user['id'];
    $educations = getQuery($conn, "select * from education where account_id = $user_id");
    $references = getQuery($conn, "select * from reference where account_id = $user_id");
    $experiences = getQuery($conn, "select * from experience where account_id = $user_id");
    $contacts = getQuery($conn, "select * from contacts where account_id = $user_id");
    include "snippets/header.php";
    dbClose($conn);
    ?>

    <div class="main-container">
        <div class="basic-info">
            <img src="https://imglarger.com/Images/before-after/ai-image-upscaler-2-after.jpg" alt="">
            <h3> <?php echo $user["username"] ?> </h3>
            <p>Email: <?php echo $user["email"] ?> </p>
        </div>
        <div class="resume-info">
            <div class="sub-container">
                <div class="header">
                    <h2>Education Info</h2>
                    <section>
                        <span>Add</span>
                        <i class="fa-solid fa-circle-plus"></i>
                    </section>
                </div>
                <div class="table-container">
                    <table class="table table-striped mb-0">
                        <thead style="background-color: #002d72;">
                            <tr>
                                <th scope="col">Institution</th>
                                <th scope="col">Descrition</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Course</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($educations as $item) {
                            ?>
                            <tr>
                                <td><?php echo $item["institution"] ?></td>
                                <td><?php echo $item["description"] ?></td>
                                <td><?php echo $item["duration"] ?></td>
                                <td><?php echo $item["course"] ?></td>
                                <td><i class="fa-solid fa-pen"></i></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sub-container">
                <div class="header">
                    <h2>Work Experience</h2>
                    <section>
                        <span>Add</span>
                        <i class="fa-solid fa-circle-plus"></i>
                    </section>
                </div>
                <div class="table-container">
                    <table class="table table-striped mb-0">
                        <thead style="background-color: #002d72;">
                            <tr>
                                <th scope="col">Institution</th>
                                <th scope="col">Descrition</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Extra Info</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HSC</td>
                                <td>CPSCS</td>
                                <td>2017-2019</td>
                                <td>You can design your navigation menus just like any other site and use this CSS
                                    effect to
                                    create dynamic sliding animations. Plus all of the results can be altered in the CSS
                                    code which includes easings and total duration.</td>
                                <td><i class="fa-solid fa-pen"></i></td>
                            </tr>
                            <tr>
                                <td>Mind &amp; Body</td>
                                <td>Yoga</td>
                                <td>8:00 AM - 9:00 AM</td>
                                <td>Adam Stewart</td>
                                <td><i class="fa-solid fa-pen"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sub-container">
                <div class="header">
                    <h2>Contact Info</h2>
                    <section>
                        <span>Add</span>
                        <i class="fa-solid fa-circle-plus"></i>
                    </section>
                </div>
                <div class="table-container">
                    <table class="table table-striped mb-0">
                        <thead style="background-color: #002d72;">
                            <tr>
                                <th scope="col">Media</th>
                                <th scope="col">Address</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HSC</td>
                                <td>CPSCS</td>
                                <td><i class="fa-solid fa-pen"></i></td>
                            </tr>
                            <tr>
                                <td>Mind &amp; Body</td>
                                <td>Yoga</td>
                                <td><i class="fa-solid fa-pen"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sub-container">
                <div class="header">
                    <h2>Reference</h2>
                    <section>
                        <span>Add</span>
                        <i class="fa-solid fa-circle-plus"></i>
                    </section>
                </div>
                <div class="table-container">
                    <div class="table-container">
                        <table class="table table-striped mb-0">
                            <thead style="background-color: #002d72;">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Descrition</th>
                                    <th scope="col">Extra Info</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>HSC</td>
                                    <td>2017-2019</td>
                                    <td>You can design your navigation menus just like any other site and use this CSS
                                        effect to
                                        create dynamic sliding animations. Plus all of the results can be altered in the
                                        CSS
                                        code which includes easings and total duration.</td>
                                    <td><i class="fa-solid fa-pen"></i></td>
                                </tr>
                                <tr>
                                    <td>Mind &amp; Body</td>
                                    <td>8:00 AM - 9:00 AM</td>
                                    <td>Adam Stewart</td>
                                    <td><i class="fa-solid fa-pen"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a style="color: white" href="https://educodiv.com">OpenResume.com</a>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script>
    function toggle_button() {
        var checkbox = document.getElementById("toggle_input").checked
        console.log(checkbox)
        if (checkbox == true) {
            document.getElementById("toggle_label").innerHTML = '<i class="fa-solid fa-chevron-down"></i>'
            document.getElementById("nav_ul").style.display = "flex"
        } else {
            document.getElementById("toggle_label").innerHTML = '<i class="fa-solid fa-bars"></i>'
            document.getElementById("nav_ul").style.display = "none"
        }
    }





    window.onresize = (event) => {
        console.log("fkasdjfk")
        if (document.getElementsByTagName("body")[0].clientWidth > 992) {
            document.getElementById("toggle_input").checked = false
            document.getElementById("toggle_label").innerHTML = '<i class="fa-solid fa-bars"></i>'
            document.getElementById("nav_ul").style.display = "flex"
        } else {
            toggle_button()
            console.log("faksdjfklsdfjsdkl")
        }
    }
    </script>
</body>

</html>