-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 10:16 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chathistory`
--

CREATE TABLE `chathistory` (
  `id` int(11) NOT NULL,
  `history` text NOT NULL,
  `sesTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `extra` int(11) NOT NULL,
  `ipaddress` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chathistory`
--

INSERT INTO `chathistory` (`id`, `history`, `sesTime`, `extra`, `ipaddress`) VALUES
(1, 'John Doe', '0000-00-00 00:00:00', 0, ''),
(2, '.hello.', '2020-01-16 06:57:14', 0, ''),
(3, '.hello', '2020-01-16 06:57:41', 0, ''),
(4, 'hello', '2020-01-16 06:57:54', 0, ''),
(5, 'hello', '2020-01-16 06:59:30', 0, '::1'),
(6, 'hi', '2020-01-16 07:00:01', 0, '::1'),
(7, 'how', '2020-01-16 07:01:01', 0, '::1'),
(8, 'hello', '2020-01-16 07:04:19', 0, '::1'),
(9, 'bye', '2020-01-16 07:04:31', 0, '::1'),
(10, 'hello', '2020-01-16 07:19:34', 0, '::1'),
(11, 'thanks', '2020-01-16 07:19:38', 0, '::1'),
(12, 'hello', '2020-01-16 07:27:55', 0, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chathistory`
--
ALTER TABLE `chathistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chathistory`
--
ALTER TABLE `chathistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
