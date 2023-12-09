-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2023 at 10:16 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'anas', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'Anas', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `grade` int NOT NULL,
  `section` int NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `grade`, `section`) VALUES
(1, 7, 2),
(2, 1, 1),
(3, 3, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grade_code` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `grade_code`) VALUES
(1, '1', 'G'),
(2, '2', 'G'),
(3, '1', 'KG'),
(4, '2', 'KG'),
(7, '3', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `sender_full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sender_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `sender_full_name`, `sender_email`, `message`, `date_time`) VALUES
(4, 'ANAS ISLAM', '20-42901-1@student.aiub.edu', 'Testing', '2023-12-02 20:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `registrar_office`
--

DROP TABLE IF EXISTS `registrar_office`;
CREATE TABLE IF NOT EXISTS `registrar_office` (
  `r_user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employee_number` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qualification` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`r_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrar_office`
--

INSERT INTO `registrar_office` (`r_user_id`, `username`, `password`, `fname`, `lname`, `address`, `employee_number`, `date_of_birth`, `phone_number`, `qualification`, `gender`, `email_address`, `date_of_joined`) VALUES
(4, 'anas', '$2y$10$e8pWvywTu4xN6XVkYxYUf.CbNcbLDp8ivQJ29gsFgBdsm7OCoUAp.', 'anas', 'islam', '109, college road, dhaka', 100, '2023-12-28', '+1232832', 'BSc in Cse', 'Male', 'anasislam005@gmail.com', '2023-12-04 12:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int NOT NULL AUTO_INCREMENT,
  `section` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(6, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `current_year` int NOT NULL,
  `current_semester` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `school_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slogan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `current_year`, `current_semester`, `school_name`, `slogan`, `about`) VALUES
(1, 2023, 'II', 'Polygon', 'Let the light in', 'The school for wickeds');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grade` int NOT NULL,
  `section` int NOT NULL,
  `address` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_fname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_lname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_phone_number` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `username`, `password`, `fname`, `lname`, `grade`, `section`, `address`, `gender`, `email_address`, `date_of_birth`, `date_of_joining`, `parent_fname`, `parent_lname`, `parent_phone_number`) VALUES
(1, 'john', '$2y$10$xmtROY8efWeORYiuQDE3SO.eZwscao20QNuLky1Qlr88zDzNNq4gm', 'John', 'Doe', 1, 1, 'California,  Los angeles', 'Male', 'abas55@ab.com', '2012-09-12', '2019-12-11 14:16:44', 'Doe', 'Mark', '09393'),
(3, 'abas', '$2y$10$bim5lakGOH5SyanBhFpqo.DgSMLu0LYaTvVbem4OYYW.gYLlQoE6S', 'Abas', 'A.', 2, 1, 'Berlin', 'Male', 'abas@ab.com', '2002-12-03', '2021-12-01 14:16:51', 'dsf', 'dfds', '7979'),
(4, 'jo', '$2y$10$pYyVlWg9jxkT0u/4LrCMS.ztMaOvgyol1hgNt.jqcFEqUC7yZLIYe', 'John3', 'Doe', 1, 1, 'California,  Los angeles', 'Female', 'jo@jo.com', '2013-06-13', '2022-09-10 13:48:49', 'Doe', 'Mark', '074932040'),
(6, 'fuad', '$2y$10$bim5lakGOH5SyanBhFpqo.DgSMLu0LYaTvVbem4OYYW.gYLlQoE6S', 'MD Fuadhul Islam', 'Anas', 3, 3, '87 2/A College Road, Narayangan', 'Male', 'joe@joe.com', '2023-12-15', '2023-12-03 13:22:34', 'MD Fuadhul Islam', 'Anas', '01515672094'),
(7, 'test', '$2y$10$hciORB9JWamSkr7G0QW4wef4ERd6ylJoELE3HL4fZyGxDTsvCZKPC', 'Test', 'test', 1, 1, 'Narayanganj', 'Male', 'test@test.com', '2023-12-04', '2023-12-04 08:15:16', 'test', 'test', 'sffdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `student_score`
--

DROP TABLE IF EXISTS `student_score`;
CREATE TABLE IF NOT EXISTS `student_score` (
  `id` int NOT NULL AUTO_INCREMENT,
  `semester` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` int NOT NULL,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `results` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_score`
--

INSERT INTO `student_score` (`id`, `semester`, `year`, `student_id`, `teacher_id`, `subject_id`, `results`) VALUES
(1, 'II', 2021, 1, 1, 1, '10 15,15 20,10 10,10 20,30 35'),
(2, 'II', 2023, 1, 1, 4, '15 20,4 5'),
(3, 'I', 2022, 1, 1, 5, '10 20,50 50'),
(4, 'II', 2023, 3, 1, 2, '10 15,10 20'),
(5, 'II', 2023, 7, 1, 4, '10 20,20 20'),
(6, 'II', 2023, 7, 1, 3, '15 20,11 20'),
(7, 'II', 2022, 7, 1, 4, '80 100');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subject_code` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grade` int NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`, `grade`) VALUES
(1, 'English', 'En', 1),
(2, 'Physics', 'Phy', 2),
(3, 'Biology', 'Bio-01', 1),
(4, 'Math', 'Math-01', 1),
(5, 'Chemistry', 'ch-01', 3),
(6, 'Programming', 'pro-01', 1),
(7, 'Java', 'java-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subjects` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `employee_number` int NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(31) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qualification` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_joining` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `password`, `class`, `fname`, `lname`, `subjects`, `address`, `employee_number`, `date_of_birth`, `phone_number`, `qualification`, `gender`, `email_address`, `date_of_joining`) VALUES
(1, 'anas', '$2y$10$JruTW/rNZ6CVO4nxYWCrn.GJpiIKMACEPYrK00S7Dk/fkbJIdYau2', '1234', 'Oliver', 'Noah', '123456', 'California,  Los angeles', 6546, '2022-09-12', '0945739', 'BSc', 'Male', 'ol@ab.com', '2022-09-09 05:23:45'),
(5, 'abas', '$2y$10$cMSKcHEJcg3K6wbVcxcXGuksgU39i70aEQVKN7ZHrzqTH9oAc3y5m', '123', 'Abas', 'A.', '12', 'Berlin', 1929, '2003-09-16', '09457396789', 'BSc,', 'Male', 'abas55@ab.com', '2022-09-09 06:42:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
