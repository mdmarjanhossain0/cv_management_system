<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Add Work Experience</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/create_form.css">
</head>

<body>
    <?php

    include "middleware/authentication.php";
    if (!$authenticated) {
        header("location: login.php");
    }
    $user_id = $user['id'];
    $institution = "";
    $description = "";
    $duration = "";
    $extra_info = "";
    $edit_id = 0;
    $edit_item = null;
    if (isset($_GET["id"])) {
        $edit_id = $_GET["id"];
        $edit_item = getQuery($conn, "select * from experience where id = $edit_id");
        $dataLen = count($edit_item);
        if ($dataLen == 1) {
            $edit_item = $edit_item[0];

            $institution = $edit_item["institution"];
            $description = $edit_item["description"];
            $duration = $edit_item["duration"];
            $extra_info = $edit_item["extra_info"];
        }
    } else {
        header("location: home.php");
    }
    $error_message = null;
    $message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["type"]) && $_POST["type"] == "delete") {
            if (isset($_POST["delete_id"])) {
                $delete_id = $_POST["delete_id"];
                if (isset($_POST["table"]) && $_POST["table"] == "education") {
                    $sql = "DELETE FROM education where id = $delete_id";
                } else if (isset($_POST["table"]) && $_POST["table"] == "experience") {
                    $sql = "DELETE FROM experience where id = $delete_id";
                } else if (isset($_POST["table"]) && $_POST["table"] == "contact") {
                    $sql = "DELETE FROM contact where id = $delete_id";
                } else if (isset($_POST["table"]) && $_POST["table"] == "reference") {
                    $sql = "DELETE FROM reference where id = $delete_id";
                } else {
                }

                if (isset($sql)) {
                    if (deleteQuery($conn, $sql)) {
                        $message = "Successfully deleted";
                    } else {
                        $message = "Delete error";
                    }
                }
            }
        } else {
            $institution = $_POST["institution"];
            $extra_info = $_POST["extra_info"];
            $duration = $_POST["duration"];
            $description = $_POST["description"];
            $sql = "UPDATE experience SET institution = '$institution', extra_info = '$extra_info', duration = '$duration', description = '$description' where id = $edit_id";
            $result = updateQuery($conn, $sql);
            if ($result) {
                $message = "Successfully updated";
            } else {
                $error_message = "Error";
            }
        }
    }

    $experiences = getQuery($conn, "select * from experience where account_id = $user_id");
    include "snippets/header.php";
    dbClose($conn);
    ?>
    <?php if ($message != null) { ?>
        <div class="alert alert-success" role="alert" style="text-align: center">
            <?php echo $message ?>
        </div>
    <?php } ?>
    <div class="main-container">
        <div class="data-table">
            <h1>Work Experience List</h1>
            <div class="table-container">
                <table class="table table-striped mb-0">
                    <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">Institution</th>
                            <th scope="col">Descrition</th>
                            <th scope="col">Duration</th>
                            <th scope="col">extra_info</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($experiences as $item) {
                        ?>
                            <tr>
                                <td><?php echo $item["institution"] ?></td>
                                <td><?php echo $item["description"] ?></td>
                                <td><?php echo $item["duration"] ?></td>
                                <td><?php echo $item["extra_info"] ?></td>
                                <td>
                                    <a href="edit_experience_info.php?id=<?php echo $item['id']; ?>"><i class="fa-solid fa-pen"></i></a>
                                    <form action="add_work_experience.php" method="POST" style="display: inline;">
                                        <input type="text" name="type" value="delete" style="display: none;">
                                        <input type="text" name="table" value="experience" style="display: none;">
                                        <input type="text" name="delete_id" value="<?php echo $item['id']; ?>" style="display: none;">
                                        <button type="submit" class="fa-solid fa-trash" style="color: #FF726F; border: none" onclick="return confirm('Are you sure?')"></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="data-form">
            <h1>Work Experience Form</h1>
            <form method="POST" action="edit_experience_info.php?id=<?php echo $edit_id; ?>">
                <label for="institution_name">Institution Name*</label>
                <br>
                <input type="text" placeholder="Institution Name" name="institution" id="institution_name" value="<?php echo  $institution; ?>" required>
                <br>
                <label for="duration">Duration*</label>
                <br>
                <input type="text" placeholder="Duration" name="duration" id="duration" value="<?php echo  $duration; ?>" required>
                <br>
                <label for="extra_info">Extra Info</label>
                <br>
                <input type="text" placeholder="Extra Info" name="extra_info" id="extra_info" value="<?php echo  $extra_info; ?>">
                <br>
                <label for="institution_name">Descrption</label>
                <br>
                <textarea name="description" id="description"><?php echo  $description; ?></textarea>
                <label style="color: red; font-weight: bold;"><?php echo $error_message; ?></label>
                <div class="submit-button-container">
                    <button type="submit">Submit</button>
                </div>
            </form>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
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