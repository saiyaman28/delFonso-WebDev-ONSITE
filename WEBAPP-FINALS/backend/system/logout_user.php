<?php
session_start();

$_SESSION = array();

session_destroy();

header("Location: ../../templates/pages/login.php");
exit;
?>