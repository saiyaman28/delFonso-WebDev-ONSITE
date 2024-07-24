-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 07:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theflex2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddReservation` (IN `in_room` INT, IN `in_user` INT, IN `in_date` DATE, IN `in_time` INT)   BEGIN
	INSERT INTO reservation (room, user, res_date, res_time)
    VALUES (in_room, in_user, in_date, in_time);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddUser` (IN `in_first_name` VARCHAR(50), IN `in_middle_name` VARCHAR(50), IN `in_last_name` VARCHAR(50), IN `in_program` INT, IN `in_rank` INT, IN `in_ama_number` VARCHAR(14), IN `in_email` VARCHAR(50), IN `in_password` VARCHAR(255))   BEGIN
    INSERT INTO users (first_name, middle_name, last_name, program, rank, ama_number, email, password)
    VALUES (in_first_name, in_middle_name, in_last_name, in_program, in_rank, in_ama_number, in_email, in_password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CancelReservation` (IN `in_id` INT)   BEGIN
	DELETE FROM reservation
    WHERE res_id = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteUser` (IN `in_id` INT)   BEGIN
	DELETE FROM reservation
    WHERE user = in_id;
	DELETE FROM users
    WHERE user_id = in_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditUser` (IN `in_id` INT, IN `in_first_name` VARCHAR(50), IN `in_middle_name` VARCHAR(50), IN `in_last_name` VARCHAR(50), IN `in_program` INT, IN `in_rank` INT, IN `in_ama_number` VARCHAR(14), IN `in_email` VARCHAR(50))   BEGIN
	UPDATE users
    SET first_name = in_first_name, middle_name = in_middle_name, last_name = in_last_name, program = in_program, rank = in_rank, ama_number = in_ama_number, email = in_email
    WHERE user_id = in_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `flexroom`
--

CREATE TABLE `flexroom` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_description` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flexroom`
--

INSERT INTO `flexroom` (`room_id`, `room_name`, `room_description`) VALUES
(1, 'Techflip Learning Studio', ''),
(2, 'Capstone Confluence', ''),
(3, 'Development Prodigy Lab', ''),
(4, 'E-Sport Nexus Chamber', ''),
(5, 'App Development Room', ''),
(6, 'Cyber Conference Room', ''),
(7, 'Multitech Fusion Laboratory', ''),
(8, 'E-Music Innovate Workshop', ''),
(9, 'Tic-Tech Studio Creation', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `room` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `res_date` date DEFAULT NULL,
  `res_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservations`
-- (See below for the actual view)
--
CREATE TABLE `reservations` (
`res_id` int(11)
,`room` varchar(50)
,`res_date` date
,`res_time_start` time
,`res_time_end` time
,`user` varchar(101)
,`program` varchar(50)
,`rank` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservations_backend_only`
-- (See below for the actual view)
--
CREATE TABLE `reservations_backend_only` (
`res_id` int(11)
,`room_id` int(11)
,`room` varchar(50)
,`res_date` date
,`res_time_id` int(11)
,`res_time_start` time
,`res_time_end` time
,`user_id` int(11)
,`user` varchar(101)
,`program` varchar(50)
,`rank` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `res_time`
--

CREATE TABLE `res_time` (
  `res_time_id` int(11) NOT NULL,
  `res_time_start` time NOT NULL,
  `res_time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `res_time`
--

INSERT INTO `res_time` (`res_time_id`, `res_time_start`, `res_time_end`) VALUES
(1, '08:00:00', '10:00:00'),
(2, '10:00:00', '12:00:00'),
(3, '13:00:00', '15:00:00'),
(4, '15:00:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `program` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `ama_number` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_program`
--

CREATE TABLE `user_program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_program`
--

INSERT INTO `user_program` (`program_id`, `program_name`) VALUES
(1, 'Elem/HS'),
(2, 'Professor'),
(3, 'Others'),
(4, 'BS Criminology'),
(5, 'BS Information Technology'),
(6, 'BS Computer Science'),
(7, 'BS Cybersecurity'),
(8, 'BS Artificial Intelligence'),
(9, 'BS Blockchain Technology'),
(10, 'BS Data Science'),
(11, 'BS Computer Engineering'),
(12, 'BS Industrial Engineering'),
(13, 'BS Electronic Engineering'),
(14, 'BS Business Administration'),
(15, 'BS Accountancy'),
(16, 'BS Psychology'),
(17, 'BS Nursing'),
(18, 'BA Education'),
(19, 'BA Political Science'),
(20, 'MS Information Technology'),
(21, 'MS Computer Science'),
(22, 'MS Business Administration'),
(23, 'MA Education'),
(24, 'DS Information Technology'),
(25, 'DS Computer Science'),
(26, 'DS Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `user_rank`
--

CREATE TABLE `user_rank` (
  `rank_id` int(11) NOT NULL,
  `rank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_rank`
--

INSERT INTO `user_rank` (`rank_id`, `rank_name`) VALUES
(1, 'Student'),
(2, 'Professor'),
(3, 'Head Office'),
(4, 'Non-teaching');

-- --------------------------------------------------------

--
-- Structure for view `reservations`
--
DROP TABLE IF EXISTS `reservations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservations`  AS SELECT `reservation`.`res_id` AS `res_id`, `flexroom`.`room_name` AS `room`, `reservation`.`res_date` AS `res_date`, `res_time`.`res_time_start` AS `res_time_start`, `res_time`.`res_time_end` AS `res_time_end`, concat(`users`.`first_name`,' ',`users`.`last_name`) AS `user`, `user_program`.`program_name` AS `program`, `user_rank`.`rank_name` AS `rank` FROM (((((`reservation` join `flexroom` on(`reservation`.`room` = `flexroom`.`room_id`)) join `users` on(`reservation`.`user` = `users`.`user_id`)) join `res_time` on(`reservation`.`res_time` = `res_time`.`res_time_id`)) join `user_program` on(`users`.`program` = `user_program`.`program_id`)) join `user_rank` on(`users`.`rank` = `user_rank`.`rank_id`)) ORDER BY `reservation`.`res_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `reservations_backend_only`
--
DROP TABLE IF EXISTS `reservations_backend_only`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservations_backend_only`  AS SELECT `reservation`.`res_id` AS `res_id`, `flexroom`.`room_id` AS `room_id`, `flexroom`.`room_name` AS `room`, `reservation`.`res_date` AS `res_date`, `res_time`.`res_time_id` AS `res_time_id`, `res_time`.`res_time_start` AS `res_time_start`, `res_time`.`res_time_end` AS `res_time_end`, `users`.`user_id` AS `user_id`, concat(`users`.`first_name`,' ',`users`.`last_name`) AS `user`, `user_program`.`program_name` AS `program`, `user_rank`.`rank_name` AS `rank` FROM (((((`reservation` join `flexroom` on(`reservation`.`room` = `flexroom`.`room_id`)) join `users` on(`reservation`.`user` = `users`.`user_id`)) join `res_time` on(`reservation`.`res_time` = `res_time`.`res_time_id`)) join `user_program` on(`users`.`program` = `user_program`.`program_id`)) join `user_rank` on(`users`.`rank` = `user_rank`.`rank_id`)) ORDER BY `reservation`.`res_id` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flexroom`
--
ALTER TABLE `flexroom`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `room` (`room`),
  ADD KEY `user` (`user`),
  ADD KEY `res_time` (`res_time`);

--
-- Indexes for table `res_time`
--
ALTER TABLE `res_time`
  ADD PRIMARY KEY (`res_time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `ama_number` (`ama_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `program` (`program`),
  ADD KEY `rank` (`rank`);

--
-- Indexes for table `user_program`
--
ALTER TABLE `user_program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `user_rank`
--
ALTER TABLE `user_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flexroom`
--
ALTER TABLE `flexroom`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res_time`
--
ALTER TABLE `res_time`
  MODIFY `res_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_program`
--
ALTER TABLE `user_program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_rank`
--
ALTER TABLE `user_rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room`) REFERENCES `flexroom` (`room_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`res_time`) REFERENCES `res_time` (`res_time_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`program`) REFERENCES `user_program` (`program_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rank`) REFERENCES `user_rank` (`rank_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
