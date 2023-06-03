<?php
function isEmailExist($conn, $email)
{
    $sql = "select * from account where email = '$email'";
    $result = getQuery($conn, $sql);
    $dataLen = count($result);
    if ($dataLen > 0) {
        return true;
    } else {
        return false;
    }
}


function isSubDomainExist($conn, $sub_domain)
{
    $sql = "select * from account where sub_domain = '$sub_domain'";
    $result = getQuery($conn, $sql);
    $dataLen = count($result);
    if ($dataLen > 0) {
        return true;
    } else {
        return false;
    }
}
