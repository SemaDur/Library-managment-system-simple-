-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 09:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_520_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `book_writer` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Truncate table before insert `books`
--

TRUNCATE TABLE `books`;
--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(2, 'The Davinci Code', 'Dan Brown', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(3, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(4, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(5, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(6, 'Fifty Shades of Grey', 'E.L. James', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(7, 'Twilight', 'Stephenie Meyer', 0);
INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES(8, 'New Moon', 'Stephenie Meyer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_520_ci NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) COLLATE utf8_unicode_520_ci NOT NULL DEFAULT 'User',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `date_joined`, `role`) VALUES(1, 'Semir', 'Durakovic', 'sema@hotmail.com', 'admin', '2017-11-26 16:16:16', 'Admin');
INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `date_joined`, `role`) VALUES(2, 'Test', 'Tester', 'test@hotmail.com', '1234', '2017-12-03 19:44:07', 'User');
INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `date_joined`, `role`) VALUES(5, 'Test1', 'Tester1', 'test@hotmail.com1', '1234', '2017-12-03 19:48:03', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
