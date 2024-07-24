<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = htmlspecialchars($_POST["id"]);

    CALLPROCEDURE($conn, "DeleteUser", "$id");

    header("location: ../../templates/pages/user_list.php");
    exit();

}