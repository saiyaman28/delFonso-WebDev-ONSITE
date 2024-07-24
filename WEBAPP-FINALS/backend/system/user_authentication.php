<?php
include "../database/database.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE ama_number = '$username' OR email = '$username'";
    $check = $conn -> query($sql);

    if ($check->num_rows > 0){
        $authenticated = $check -> fetch_assoc();
        if (password_verify($password, $authenticated['password'])){
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $authenticated['user_id'];
            header("location: ../../templates/pages/home.php");
            exit();
        }
        else {echo "ERROR! PASSWORD INVALID!!!";}
    }
    else {echo "ERROR! USERNAME DOES NOT EXISTS!!!";}

}


?>