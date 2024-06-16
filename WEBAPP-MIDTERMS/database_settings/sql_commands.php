<?php

function createDATABASE($conn, $db){
    $sql = "CREATE DATABASE $db";
    $conn->exec($sql);
}
function createTABLE($conn, $var1, $var2, $db){
    $sql = "CREATE TABLE $var1 ($var2)";
    $conn->exec("USE $db; $sql");
}
function insertINTO($conn, $var1, $var2, $var3, $db){
    $sql = "INSERT INTO $var1 ($var2) VALUES $var3";
    $conn->exec("USE $db; $sql");
}
function deleteFROM($conn, $var1, $var2, $var3, $db){
    $sql = "DELETE FROM $var1 WHERE $var2 = $var3";
    $conn->exec("USE $db; $sql");
}

function trialerror($conn, $db){
    $sql = "DROP DATABASE $db";
    $conn->exec($sql);
}

?>