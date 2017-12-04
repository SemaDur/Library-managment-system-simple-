-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2017 at 11:49 PM
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

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_writer`, `user_id`) VALUES
(2, 'The Davinci Code', 'Dan Brown', 0),
(3, 'Harry Potter and the Deathly Hallows', 'J.K. Rowling', 0),
(4, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 0),
(5, 'Harry Potter and the Order of the Phoenix', 'J.K. Rowling', 0),
(6, 'Fifty Shades of Grey', 'E.L. James', 0),
(7, 'Twilight', 'Stephenie Meyer', 0),
(8, 'New Moon', 'Stephenie Meyer', 0);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `date_joined`, `role`) VALUES
(1, 'Semir', 'Durakovic', 'sema@hotmail.com', 'admin', '2017-11-26 16:16:16', 'Admin'),
(2, 'Test', 'Tester', 'test@hotmail.com', '1234', '2017-12-03 19:44:07', 'User'),
(5, 'Test1', 'Tester1', 'test@hotmail.com1', '1234', '2017-12-03 19:48:03', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
