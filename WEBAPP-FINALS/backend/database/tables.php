<?php

$TABLEflexroom = [
    "flexroom",
    "room_id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(50) NOT NULL,
    room_description VARCHAR(999) NOT NULL"
];

$TABLEprogram = [
    "user_program",
    "program_id INT AUTO_INCREMENT PRIMARY KEY,
    program_name VARCHAR(50) NOT NULL"
];

$TABLEranks = [
    "user_rank",
    "rank_id INT AUTO_INCREMENT PRIMARY KEY,
    rank_name VARCHAR(50) NOT NULL"
];

// $TABLEusers = [
//     "users",
//     "user_id INT AUTO_INCREMENT PRIMARY KEY,
//     first_name VARCHAR(50) NOT NULL,
//     middle_name VARCHAR(50),
//     last_name VARCHAR(50) NOT NULL,
//     program INT NOT NULL,
//     rank INT NOT NULL,
//     stu_emp_num BIGINT NOT NULL UNIQUE,
//     email VARCHAR(50) NOT NULL,
//     password VARCHAR(50) NOT NULL,
//     FOREIGN KEY (program) REFERENCES user_program(program_id),
//     FOREIGN KEY (rank) REFERENCES user_rank(rank_id)"
// ];

$TABLErestime = [
    "res_time",
    "res_time_id INT AUTO_INCREMENT PRIMARY KEY,
    res_time_start TIME NOT NULL,
    res_time_end TIME NOT NULL"
];

$TABLEreservation = [
    "reservation",
    "res_id INT AUTO_INCREMENT PRIMARY KEY,
    room INT,
    user INT,
    res_date DATE,
    res_time INT,
    FOREIGN KEY (room) REFERENCES flexroom(room_id),
    FOREIGN KEY (user) REFERENCES users(user_id),
    FOREIGN KEY (res_time) REFERENCES res_time(res_time_id)"
];

?>