<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = htmlspecialchars($_POST["id"]);
    $first_name = htmlspecialchars($_POST["first_name"]);
    $middle_name = htmlspecialchars($_POST["middle_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $program = htmlspecialchars($_POST["program"]);
    $rank = htmlspecialchars($_POST["rank"]);
    $ama_id = htmlspecialchars($_POST["ama_id"]);
    $email = htmlspecialchars($_POST["email"]);

    CALLPROCEDURE($conn, "EditUser", "$id, '$first_name', '$middle_name', '$last_name', $program, $rank, '$ama_id', '$email'");

    header("location: ../../templates/pages/user_list.php");
    exit();

}