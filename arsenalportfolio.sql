-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2023 at 09:12 PM
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
-- Database: `arsenalportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `my_name` varchar(100) NOT NULL,
  `about_me` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`my_name`, `about_me`) VALUES
('ars', 'Hi! I am Christopher G. Arsenal Jr, currently taking Bachelor of Science in Information Technology-Information Security at University of Southeastern Philippines. I am the second child out of three of Mr.Christopher D.Arsenal and Mrs.Glory G. Arsenal. I love watching documentaries and reading research papers as it gives me entertainment and knowlegde at the same time, I also love watching anime, movies,sitcoms and k-dramas. I do play sport know as ');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagename` varchar(100) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`name`, `imagename`) VALUES
('Java', 'java.png'),
('CSS', 'css-3.png'),
('Html', 'html.png'),
('MySql', 'logo-mysql-170x115.png'),
('PHP', 'php.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `name` varchar(100) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `mobile_number`, `email`, `subject`, `message`) VALUES
('Christopher Arsenal', '09129094503', 'cjgarsenal@usep.edu.ph', 'Gwapo', 'nganong gwapo man kay ka?');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `project_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`project_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_name`, `project_pic`) VALUES
('Personal Portfolio', 'Screenshot 2023-05-19 061921.jpg'),
('Salunayan HS Enrollment System', 'Screenshot 2023-05-19 062257.jpg'),
('Midsayap Library System', 'Screenshot 2023-05-19 063217.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`Firstname`, `Lastname`, `username`, `password`) VALUES
('Christopher', 'Arsenal', 'cjgarsenal', 'gwapoko123');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

DROP TABLE IF EXISTS `work_experience`;
CREATE TABLE IF NOT EXISTS `work_experience` (
  `year` varchar(100) NOT NULL,
  `job` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`job`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`year`, `job`, `description`) VALUES
('2020', 'Secretary', 'Secretary – I work as a part time secretary of Angkat Construction and Supply, Inc, a construction firm\r\nat Cotabato City. My main job there is mostly consist of encoding, compiling and emailing documents,\r\nreceiving calls and inquiries. I only did work as part time because they only need me when there is an\r\nincoming government projects to bid. My work was satisfying and fulfilling at this company as they\r\nwelcome me as part of their family.'),
('2020', 'Computer Technician', 'Computer Technician – I work as a part time computer technician at St.Paul & Peter Elementary\r\nSchool,Inc, a private school at Cotabato City. My main job was to troubleshoot and fixing computer\r\nhardware’s when an error occur, sometimes replacing parts and rebuilding their setups as their computers\r\ntends to short circuit due to generic parts.'),
('2020', 'Private Tutor', 'Private Tutor – I work as a full time private tutor at Cotabato City for 2 years. I have 5 students at that\r\ntime a 5yrs old kid in which I taught reading and writing, an 8yrs old girl teach every subject available in\r\ntheir curriculum, two grade 7 students and grade 8 student.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
