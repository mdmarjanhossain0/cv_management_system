<?php

include "middleware/subdomain_authentication.php";

if (!$authenticated) {
    header("location: login.php");
}
echo $user["seleted_template"];
if ($user["seleted_template"] == "") {
    include "design2.php";
} else {
    include "design43.php";
}
