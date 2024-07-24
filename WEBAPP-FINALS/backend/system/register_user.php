<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $first_name = htmlspecialchars($_POST["first_name"]);
    $middle_name = htmlspecialchars($_POST["middle_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $program = htmlspecialchars($_POST["program"]);
    $rank = htmlspecialchars($_POST["rank"]);
    $ama_id = htmlspecialchars($_POST["ama_id"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE ama_number = '$ama_id' OR email = '$email'";
    $check = $conn -> query($sql);

    if ($check -> num_rows > 0){
        echo "Username already exists!";
    }
    else {
        CALLPROCEDURE($conn, "AddUser", "'$first_name', '$middle_name', '$last_name', $program, $rank, '$ama_id', '$email', '$password'");
        header("Location: ../../templates/pages/login.php");
        exit();
    }
}