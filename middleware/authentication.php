<?php
include "config/config.php";
session_start();
$conn =  dbConnection();
$authenticated = false;
$user = null;
if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    $authenticated = true;
    $id = $_SESSION["id"];
    $user_query = "select * from account where id = $id";
    $user_query_result = getQuery($conn, $user_query);
    $dataLen = count($user_query_result);
    if ($dataLen == 1) {
        $user = $user_query_result[0];
    }
}