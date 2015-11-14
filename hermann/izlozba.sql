-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2015 at 05:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `izlozba`
--

-- --------------------------------------------------------

--
-- Table structure for table `expositions`
--

CREATE TABLE IF NOT EXISTS `expositions` (
  `exposition_id` int(11) NOT NULL AUTO_INCREMENT,
  `exposition_title` varchar(100) NOT NULL,
  `exposition_description` text NOT NULL,
  `exposition_image` varchar(100) NOT NULL,
  `exposition_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`exposition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `expositions`
--

INSERT INTO `expositions` (`exposition_id`, `exposition_title`, `exposition_description`, `exposition_image`, `exposition_status`) VALUES
(1, 'Expositions of Paintings', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'uploads/Expositions of Paintings.jpg', 'inactive'),
(2, 'Expositions of figures', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!\r\n', 'uploads/Expositions of figures.jpg', 'active'),
(3, 'Expositions items', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!\r\n', 'uploads/Expositions items.jpg', 'inactive'),
(5, 'Expositions of flowers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'uploads/Expositions of flowers.jpg', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1444603304);

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `object_id` int(11) NOT NULL AUTO_INCREMENT,
  `object_title` varchar(100) NOT NULL,
  `object_description` text NOT NULL,
  `object_link` varchar(100) NOT NULL,
  `object_image` varchar(100) NOT NULL,
  `expositions_exposition_id` int(11) NOT NULL,
  `object_created_date` datetime NOT NULL,
  PRIMARY KEY (`object_id`),
  KEY `expositions_exposition_id` (`expositions_exposition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`object_id`, `object_title`, `object_description`, `object_link`, `object_image`, `expositions_exposition_id`, `object_created_date`) VALUES
(4, 'Picture 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!\r\n', 'www.gdezavikend.rs', 'uploads/Picture 3.jpg', 3, '2015-10-12 03:10:00'),
(10, 'Picture 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!\r\n', 'www.gdezavikend.rs', 'uploads/Picture 4.jpg', 1, '2015-10-12 09:10:05'),
(14, 'Skulpture 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Skulpture 1.jpg', 2, '2015-10-19 02:10:07'),
(15, 'Skulpture 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Skulpture 2.jpg', 2, '2015-10-19 03:10:01'),
(16, 'Skulpture 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Skulpture 3.jpg', 2, '2015-10-19 04:10:55'),
(17, 'Flower 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Flower 1.jpg', 5, '2015-10-19 04:10:02'),
(18, 'Flower 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Flower 2.jpg', 5, '2015-10-19 04:10:20'),
(19, 'Flower 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus natus minima facere delectus quo molestias explicabo nisi labore corporis reprehenderit tenetur quia, velit quibusdam necessitatibus officia provident architecto quisquam consequatur!', 'www.gdezavikend.rs', 'uploads/Flower 3.jpg', 5, '2015-10-19 04:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'xq6s3pK7yBBailIB_iPZRtHAD0r0ifNz', '$2y$13$C/YCtc3ix/3//NNvemkhReVHbrxFTf9wou5NA6esXzvwSakZJsdeW', NULL, 'admin@gmail.com', 10, 1444590699, 1444590699);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `objects_ibfk_1` FOREIGN KEY (`expositions_exposition_id`) REFERENCES `expositions` (`exposition_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
