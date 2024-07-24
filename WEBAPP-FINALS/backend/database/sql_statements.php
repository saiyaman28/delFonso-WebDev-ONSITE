<?php

function CREATEDATABASE($conn, $db) {
    $sql = "CREATE DATABASE $db";
    $conn -> query($sql);
}

function USEDATASE($conn, $db) {
    $sql = "USE $db";
    $conn -> query($sql);
}

function CREATETABLE($conn, $tb, $tbcol) {
    $sql = "CREATE TABLE $tb ($tbcol)";
    $conn -> query($sql);
}

function CREATETABLEROW($conn, $tb, $tbcol, $tbrow) {
    $sql = "INSERT INTO $tb $tbcol VALUES $tbrow";
    $conn -> query($sql);
}

function UPDATESTMT($conn, $tb, $tbcol, $con) {
    $sql = "UPDATE $tb SET $tbcol WHERE $con";
    $conn -> query($sql);
}

function DELETEROWSTMT($conn, $tb, $con) {
    $sql = "DELETE FROM $tb WHERE $con";
    $conn -> query($sql);
}

function SELECTSTMT($conn, $tbcol, $tb) {
    $sql = "SELECT $tbcol FROM $tb";
    $stmt = $conn -> query($sql);
    $return = $stmt -> fetch_all(MYSQLI_ASSOC);;
    return $return;
}

function SELECTCNDTNSTMT($conn, $tbcol, $tb, $con) {
    $sql = "SELECT $tbcol FROM $tb WHERE $con";
    $stmt = $conn -> query($sql);
    $return = $stmt -> fetch_all(MYSQLI_ASSOC);;
    return $return;
}

function CREATEVIEW($conn, $vw, $tbcol, $tb, $con){
    $sql = "CREATE OR REPLACE VIEW $vw AS SELECT $tbcol FROM $tb $con";
    $conn -> query($sql);
}

function CALLPROCEDURE($conn, $pro, $val) {
    $sql = "CALL $pro ($val)";
    $conn -> query($sql);
}

function trialerror($conn, $db){
    $sql = "DROP DATABASE $db";
    $conn -> query($sql);
}


function MYSQLiCLOSE($conn) {
    $conn -> close();
}

?>