-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 04:46 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `formdata`
--


CREATE TABLE `formdata` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `fname` VARCHAR(255) NOT NULL,
  `mnumber` VARCHAR(15) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `purpose` TEXT NOT NULL,
  `photo_path` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




If you're looking for the MySQL command-line query to create the table structure for your formdata table, here it is:

-- sql
-- Copy code
-- CREATE TABLE formdata (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     fname VARCHAR(255) NOT NULL,
--     lname VARCHAR(255) NOT NULL,
--     mnumber VARCHAR(255) NOT NULL,
--     email VARCHAR(255) NOT NULL,
--     address VARCHAR(255) NOT NULL,
--     purpose VARCHAR(255) NOT NULL,
--     photo_path VARCHAR(255) NOT NULL
-- );
--
-- Dumping data for table `formdata`
--

INSERT INTO `formdata` (`fname`, `lname`, `mnumber`, `email`, `address`, `purpose`, `photo_path`) VALUES
('', '', '', '', '', '', ''),
('fdgas', 'sdfg', '56465446', 'aaa@gmail.com', 'dfsgg', 'sdfg', 'uploads/65bba8f64385a.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
