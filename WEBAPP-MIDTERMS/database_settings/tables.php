<?php
// To create a table in SQL.

// SAMPLE:
// $table<TABLENAME> = [
// "<TABLE NAME>",
// "<TABLE COLUMNS WITH DATATYPES>"
// ]

$tableFLEXROOM = [
    "flexroom", 
    "room_id INT AUTO_INCREMENT PRIMARY KEY, 
    room_name VARCHAR(50) NOT NULL UNIQUE, 
    room_description VARCHAR(255) NOT NULL"
];

$tableSTUDENTSTAFF = [
    "studentstaff",
    "user_id INT AUTO_INCREMENT PRIMARY KEY,
    usn BIGINT,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    year_level INT NOT NULL,
    program VARCHAR(9)"
];

$tableRESTIMESLOTS = [
    "res_timeslots",
    "res_time_id INT AUTO_INCREMENT PRIMARY KEY,
    res_time_start TIME,
    res_time_end TIME"
];

$tablePURPOSE = [
    "purpose",
    "purpose_id INT AUTO_INCREMENT PRIMARY KEY,
    purpose_name VARCHAR(255)"
];

$tableRESERVATION = [
    "reservation",
    "res_id INT AUTO_INCREMENT PRIMARY KEY,
    room INT,
    user INT,
    res_date DATE,
    res_time INT,
    purpose INT,
    FOREIGN KEY (room) REFERENCES $tableFLEXROOM[0](room_id),
    FOREIGN KEY (user) REFERENCES $tableSTUDENTSTAFF[0](user_id),
    FOREIGN KEY (res_time) REFERENCES $tableRESTIMESLOTS[0](res_time_id),
    FOREIGN KEY (purpose) REFERENCES $tablePURPOSE[0](purpose_id)"
];
?>