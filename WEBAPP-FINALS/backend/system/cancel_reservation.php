<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = htmlspecialchars($_POST["id"]);

    CALLPROCEDURE($conn, "CancelReservation", "$id");

    header("location: ../../templates/pages/reserved_list.php");
    exit();

}