<?php
function dbConnection()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "openresume";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function dbClose($conn)
{
    $conn->close();
}


function getQuery($conn, $sql)
{
    $result = $conn->query($sql);

    $rArray = array();
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rArray, $row);
            }
        }
    }
    return $rArray;
}

function insertQuery($conn, $sql)
{
    $insertExecute = $conn->query($sql);
    if ($insertExecute === TRUE) {
        return $conn->insert_id;
    } else {
        return false;
    }
}
