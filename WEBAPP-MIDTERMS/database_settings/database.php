<?php
include "database_pdo.php";
include "sql_commands.php";
include "tables.php";
include "fixed_tb_values.php";

try{
    // Create Database Here.
    createDATABASE($conn, $db);

    // Create Tables Here.
    createTABLE($conn, $tableFLEXROOM[0], $tableFLEXROOM[1], $db);
    createTABLE($conn, $tableSTUDENTSTAFF[0], $tableSTUDENTSTAFF[1], $db);
    createTABLE($conn, $tableRESTIMESLOTS[0], $tableRESTIMESLOTS[1], $db);
    createTABLE($conn, $tablePURPOSE[0], $tablePURPOSE[1], $db);
    createTABLE($conn, $tableRESERVATION[0], $tableRESERVATION[1], $db);

    // Create Table Values Here.
    insertINTO($conn, $insertFLEXROOM[0], $insertFLEXROOM[1], $insertFLEXROOM[2], $db);
    insertINTO($conn, $insertRESTIMESLOTS[0], $insertRESTIMESLOTS[1], $insertRESTIMESLOTS[2], $db);
    insertINTO($conn, $insertPURPOSE[0], $insertPURPOSE[1], $insertPURPOSE[2], $db);
    insertINTO($conn, $insertSTUDENTSTAFF[0], $insertSTUDENTSTAFF[1], $insertSTUDENTSTAFF[2], $db);


    $conn = null;
}
catch (Exception $e){
    $conn = null;
}

// trialerror($conn);


?>