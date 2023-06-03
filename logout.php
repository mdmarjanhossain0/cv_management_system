<?php
session_start();
session_destroy();
$_SESSION["authenticated"] = false;
$_SESSION = null;
header('location:home.php');
