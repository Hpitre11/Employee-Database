-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:57 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `directory`
--

CREATE TABLE `directory` (
  `name` varchar(255) NOT NULL,
  `pay_type` varchar(255) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `pay_frequency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory`
--

INSERT INTO `directory` (`name`, `pay_type`, `pay_amount`, `start_date`, `pay_frequency`) VALUES
('Ross Pepe', 'salary', 55000, '2018-03-01', 'bi-weekly'),
('Thomas Leblanc', 'hourly', 25, '2018-03-11', 'weekly'),
('Kolby Caldwell', 'hourly', 50, '2018-03-23', 'bi-weekly'),
('John Casey', 'salary', 62000, '2018-03-20', 'bi-weekly'),
('Jefferson Steelflex', 'hourly', 10, '2018-04-01', 'weekly'),
('Gabriel Baldo', 'salary', 85000, '2018-02-01', 'monthly'),
('Jake Conlin', 'hourly', 17, '2018-02-01', 'monthly');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
