-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2023 at 07:52 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

DROP TABLE IF EXISTS `temp`;
CREATE TABLE IF NOT EXISTS `temp` (
  `username` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `level_auth` int NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
CREATE TABLE IF NOT EXISTS `thesis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `author` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `abstract` varchar(60000) COLLATE latin1_general_cs NOT NULL,
  `date` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `location` varchar(255) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `author`, `abstract`, `date`, `location`) VALUES
(1, 'Learning With Technology: The Impact of Laptop Use on Student Achievement', 'James Cengiz Gulek, Hakan Demirtas', 'sparked educational practitioners’ interest in utilizing laptops as an instructional tool to improve student learning. There is substantial evidence that using technology as an instructional tool enhances student learning and educational outcomes. Past research suggests that compared to their non-laptop counterparts, students in classrooms that provide all students with their own laptops spend more time involved in collaborative work, participate in more project-based instruction, produce writing of higher quality and greater length, gain increased access to information, improve research analysis skills, and spend more time doing homework on computers. Research has also shown that these students direct their own learning, report a greater reliance on active learning strategies, readily engage in problem solving and critical thinking, and consistently show deeper and more flexible uses of technology than students without individual laptops. The study presented here examined the impact of participation in a laptop program on student achievement. A total of 259 middle school students were followed via cohorts. The data collection measures included students’ overall cumulative grade point averages (GPAs), end-of-course grades, writing test scores, and state-mandated norm- and criterion-referenced standardized test scores. The baseline data for all measures showed that there was no statistically significant difference in English language arts, mathematics, writing, and overall grade point average achievement between laptop and non-laptop students prior to enrollment in the program. However, laptop students showed significantly higher achievement in nearly all measures after one year in the program. Cross-sectional analyses in Year 2 and Year 3 concurred with the results from the Year 1. Longitudinal analysis also proved to be an independent verification of the substantial impact of laptop use on student learning outcomes.', '2005-01-01', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `student_no` int NOT NULL,
  `f_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `m_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `l_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `level_auth` int NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `student_no`, `f_name`, `m_name`, `l_name`, `password`, `level_auth`) VALUES
('admin', 0, '', '', '', 'webdev_thesis', 2),
('Guest', 0, '', '', '', 'webdev_thesis_database_guest', 0),
('edsierabs', 202114223, 'Edrian', 'Borinaga', 'Rabena', 'Naruto341', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
