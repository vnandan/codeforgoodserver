-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2014 at 11:45 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team13`
--

-- --------------------------------------------------------

--
-- Table structure for table `refkeywords`
--

CREATE TABLE IF NOT EXISTS `refkeywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `refkeywords`
--

INSERT INTO `refkeywords` (`id`, `word`) VALUES
(1, 'speaking'),
(2, 'communication writing'),
(3, 'expressing'),
(4, 'ideas group'),
(5, 'discussion interviewing editing research planning '),
(6, 'problems setting'),
(7, 'goals listening conveying'),
(8, 'feelings motivating counseling cooperating team'),
(9, 'work management leadership managing'),
(10, 'groups teaching cooperating time'),
(11, 'management auditing'),
(12, 'c++ c ms'),
(13, 'excel java python php html javascript ruby microso'),
(14, 'service'),
(15, 'electronic'),
(16, 'repair'),
(17, 'lan'),
(18, 'administration'),
(19, ''),
(20, 'ms'),
(21, 'word'),
(22, 'operation'),
(23, 'public'),
(24, 'speaking'),
(25, 'scheduling'),
(26, ''),
(27, 'telemarketing'),
(28, 'typing'),
(29, ''),
(30, 'creative'),
(31, 'decisive'),
(32, 'dependable'),
(33, 'enthusiastic'),
(34, 'motivation'),
(35, 'persistent'),
(36, 'results-oriented'),
(37, 'self-motivated'),
(38, ''),
(39, 'sensitive'),
(40, 'sociable'),
(41, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
