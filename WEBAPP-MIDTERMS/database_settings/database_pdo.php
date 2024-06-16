<?php
$host = "localhost";
$username = "root";
$password = "";
$dsn = "mysql: host=$host";
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$db = "theflex";
?>