<?php
include "../database_settings/database_pdo.php";
include "../database_settings/sql_commands.php";
include "var_fk.php";
include '../static/connector.php';

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $name = 1;
    $flexroom = htmlspecialchars($_POST["flxroom"]);
    $resdate = htmlspecialchars($_POST["resdate"]);
    $restime = htmlspecialchars($_POST["restime"]);
    $purpose = htmlspecialchars($_POST["purpose"]);

    $values = "($flexroom_fk[$flexroom], $name, DATE '$resdate', $restime_fk[$restime], $purpose_fk[$purpose])";

    insertINTO($conn, "reservation", "room, user, res_date, res_time, purpose", $values, $db);	

};

echo "
<form action='http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=theflex&table=reservation'>
    <button class='btn' type='submit'>Check Here</button>
</form>
<form action='../reserve.php'>
    <button class='btn' type='submit'>Back to Main Menu</button>
</form>";

?>