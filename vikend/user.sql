-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2015 at 06:50 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vikend`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `fname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `pswd` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `fname`, `lname`, `email`, `pswd`, `added`) VALUES
(1, 3, 'Milos', 'Dodic', 'losmi@live.com', '$2y$13$zY1iox1eP3xztR87snE0V.5z6Q..1289Hb7oachjwN95Kp.7JdeZ2', '2015-05-18 00:00:00'),
(2, 3, 'Stefan', 'Veljkovic', 'stefanveljkovicvr@gmail.com', '$2y$13$zY1iox1eP3xztR87snE0V.5z6Q..1289Hb7oachjwN95Kp.7JdeZ2', '2015-06-14 18:37:07'),
(3, 3, 'Aleksa', 'Vranic', 'avranicgrf@gmail.com', '$2y$13$zY1iox1eP3xztR87snE0V.5z6Q..1289Hb7oachjwN95Kp.7JdeZ2', '2015-06-14 18:38:37'),
(4, 3, 'Aleksandar', 'Tasic', 'aleksandar@gmail.com', '$2y$13$zY1iox1eP3xztR87snE0V.5z6Q..1289Hb7oachjwN95Kp.7JdeZ2', '2015-06-14 18:38:59'),
(5, 2, 'Jana', 'Zivaljevic', 'zjana@gmail.com', '$2y$13$zY1iox1eP3xztR87snE0V.5z6Q..1289Hb7oachjwN95Kp.7JdeZ2', '2015-08-23 09:55:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
