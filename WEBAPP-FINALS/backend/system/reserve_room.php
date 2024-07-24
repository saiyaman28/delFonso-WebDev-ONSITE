<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $room = htmlspecialchars($_POST["room"]);
    $res_date = htmlspecialchars($_POST["res_date"]);
    $res_time = htmlspecialchars($_POST["res_time"]);
    $user = $_SESSION['username'];

    CALLPROCEDURE($conn, "AddReservation", "$room, $user, DATE'$res_date', $res_time");

    header("location: ../../templates/pages/reserved_list.php");
    exit();

}