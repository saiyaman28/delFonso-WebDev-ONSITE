<?php

$VIEWSreservations = [
    "reservations",
    "res_id, flexroom.room_name AS room, res_date, 
    res_time.res_time_start, res_time.res_time_end, 
    CONCAT(users.first_name, ' ', users.last_name) AS user, 
    user_program.program_name AS program, user_rank.rank_name AS rank",
    "INNER JOIN flexroom ON reservation.room = flexroom.room_id 
    INNER JOIN users ON reservation.user = users.user_id 
    INNER JOIN res_time ON reservation.res_time = res_time.res_time_id
    INNER JOIN user_program ON users.program = user_program.program_id
    INNER JOIN user_rank ON users.rank = user_rank.rank_id
    ORDER BY res_id ASC"
];

$VIEWSreservationsBA = [
    "reservations_backend_only",
    "res_id, flexroom.room_id, flexroom.room_name AS room, res_date, 
    res_time.res_time_id, res_time.res_time_start, res_time.res_time_end, 
    users.user_id, CONCAT(users.first_name, ' ', users.last_name) AS user, 
    user_program.program_name AS program, user_rank.rank_name AS rank",
    "INNER JOIN flexroom ON reservation.room = flexroom.room_id 
    INNER JOIN users ON reservation.user = users.user_id 
    INNER JOIN res_time ON reservation.res_time = res_time.res_time_id
    INNER JOIN user_program ON users.program = user_program.program_id
    INNER JOIN user_rank ON users.rank = user_rank.rank_id
    ORDER BY res_id ASC"
];



?>