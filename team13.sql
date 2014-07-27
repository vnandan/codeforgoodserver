-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2014 at 10:57 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(40) NOT NULL,
  `post_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `word`, `post_id`) VALUES
(8, 'excel', 37),
(9, 'discussion', 37),
(10, 'excel', 39),
(11, 'ms', 39),
(12, 'discussion', 40),
(13, 'excel', 40);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `post_id` int(32) NOT NULL,
  `time` datetime NOT NULL,
  `venue` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `post_id`, `time`, `venue`) VALUES
(4, 37, '0000-00-00 00:00:00', ''),
(5, 37, '0000-00-00 00:00:00', ''),
(6, 0, '2014-07-27 06:36:00', 'FB');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `user_id` int(7) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `post_id`, `user_id`, `message`) VALUES
(1, 40, 4, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `mentor_id` int(32) NOT NULL,
  `statement` text NOT NULL,
  `description` text NOT NULL,
  `plan` text NOT NULL,
  `objective` text NOT NULL,
  `duration` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `mentor_id`, `statement`, `description`, `plan`, `objective`, `duration`, `active`, `complete`, `created`, `modified`) VALUES
(40, 3, 4, 'group discussion', 'excel', '', '', '', 1, 0, '2014-07-27 06:35:27', '2014-07-27 06:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `refkeywords`
--

CREATE TABLE IF NOT EXISTS `refkeywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `refkeywords`
--

INSERT INTO `refkeywords` (`id`, `word`) VALUES
(63, 'speaking'),
(64, 'communication'),
(65, 'writing'),
(66, 'expressing'),
(67, 'ideasgroup'),
(68, 'discussion'),
(69, 'interviewing'),
(70, 'editing'),
(71, 'research'),
(72, 'planning'),
(73, 'problemssetting'),
(74, 'goals'),
(75, 'listening'),
(76, 'conveying'),
(77, 'feelings'),
(78, 'motivating'),
(79, 'counseling'),
(80, 'cooperating'),
(81, 'team'),
(82, 'workmanagement'),
(83, 'leadership'),
(84, 'managing'),
(85, 'groups'),
(86, 'teaching'),
(87, 'cooperating'),
(88, 'time'),
(89, 'management'),
(90, 'auditing'),
(91, 'c++'),
(92, 'c'),
(93, 'ms'),
(94, 'excel'),
(95, 'java'),
(96, 'python'),
(97, 'php'),
(98, 'html'),
(99, 'javascript'),
(100, 'ruby'),
(101, 'microso'),
(102, 'service'),
(103, 'electronic'),
(104, 'repair'),
(105, 'lan'),
(106, 'administration'),
(107, 'ms'),
(108, 'word'),
(109, 'operation'),
(110, 'public'),
(111, 'speaking'),
(112, 'scheduling'),
(113, 'telemarketing'),
(114, 'typing'),
(115, 'creative'),
(116, 'decisive'),
(117, 'dependable'),
(118, 'enthusiastic'),
(119, 'motivation'),
(120, 'persistent'),
(121, 'results-oriented'),
(122, 'self-motivated'),
(123, 'sensitive'),
(124, 'sociable');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_id` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `user_id`) VALUES
(1, 'dkgm', 1),
(2, 'dfmkd', 1),
(3, 'excel', 4),
(4, 'discussion', 4),
(5, 'q', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mob` int(10) NOT NULL,
  `dob` date NOT NULL,
  `profession` varchar(200) NOT NULL,
  `role` varchar(30) NOT NULL,
  `language` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mob`, `dob`, `profession`, `role`, `language`, `active`, `created`, `modified`) VALUES
(3, 'v', 'v@v.com', 'f2bc79ae5952f8251bb32953fbea4b50c1915a7e9d4d257275facbcf4137955b', 2, '2014-07-27', '', 'mentee', 'e', 0, '2014-07-27 01:10:09', '2014-07-27 01:10:09'),
(4, 'v', 'v1@v1.com', 'dd9fa0f37c2e626b4701b0318ab94ab24bb8d441cebcdfa4a38b2b403d7af02d', 13245, '2014-07-27', 'dfj', 'mentor', '0', 0, '2014-07-27 04:00:56', '2014-07-27 04:01:07'),
(5, 'q', 'q@q.com', '5b09ccc1fb6d18898c98fbff74166685b081f9a3389602e37341200405fc6a36', 1, '2014-07-27', 'q', 'mentor', '1', 0, '2014-07-27 10:13:13', '2014-07-27 10:13:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
