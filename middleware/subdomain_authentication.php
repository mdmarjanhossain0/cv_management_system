<?php
include "config/config.php";
session_start();
$conn =  dbConnection();
$domain = $_SERVER["SERVER_NAME"];
$sub_domain = explode('.', $domain)[0];
$authenticated = false;
$user = null;
$user_query = "select * from account where sub_domain = '$sub_domain'";
$user_query_result = getQuery($conn, $user_query);
$dataLen = count($user_query_result);
if ($dataLen == 1) {
    $user = $user_query_result[0];
    $authenticated = true;
}
