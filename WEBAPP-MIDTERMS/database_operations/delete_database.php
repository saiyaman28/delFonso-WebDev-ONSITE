<?php
include "../database_settings/database_pdo.php";
include "../database_settings/sql_commands.php";
include "var_fk.php";
include '../static/connector.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $resid = htmlspecialchars($_POST["resid"]);

    deleteFROM($conn, "reservation", "res_id", $resid, $db);	

};

echo "
<form action='http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=theflex&table=reservation'>
    <button class='btn' type='submit'>Check Here</button>
</form>
<form action='../reserve.php'>
    <button class='btn' type='submit'>Back to Main Menu</button>
</form>";

?>