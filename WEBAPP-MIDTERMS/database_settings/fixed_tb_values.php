<?php
// To insert default values to table in SQL.

// SAMPLE:
// $insert<TABLENAME> = [
// "<TABLE NAME>", "<COLUMNS TO INSERT>",
// "('<COLUMN VALUES>'), ('<IF MULTIPLE VALUES>')"
// ]

$insertFLEXROOM = [
    "flexroom", "room_name",
    "('Techflip Learning Studio'),
    ('Capstone Confluence'),
    ('Development Prodigy Lab'),
    ('E-Sport Nexus Chamber'),
    ('App Development Room'),
    ('Cyber Conference Room'),
    ('Multitech Fusion Laboratory'),
    ('E-Music Innovate Workshop'),
    ('Tic-Tech Studio Creation')"
];

$insertRESTIMESLOTS = [
    "res_timeslots", "res_time_start, res_time_end",
    "(TIME '08:00:00', TIME '10:00:00'),
    (TIME '10:00:00', TIME '12:00:00'),
    (TIME '13:00:00', TIME '15:00:00'),
    (TIME '15:00:00', TIME '17:00:00')"
];

$insertPURPOSE = [
    "purpose", "purpose_name",
    "('Taking Class'),
    ('Meeting'),
    ('Event'),
    ('Defense'),
    ('Others')"
];

$insertSTUDENTSTAFF = [
    "studentstaff", "usn, first_name, middle_name, last_name, year_level, program",
    "(22012297710, 'Micheal Lance Kester', '', 'Li', 2, 'BSIT')"
];

?>