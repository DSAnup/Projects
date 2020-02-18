-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2018 at 05:43 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_waps`
--

CREATE TABLE IF NOT EXISTS `admin_waps` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `register` datetime NOT NULL,
  `type` tinyint(11) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_waps`
--

INSERT INTO `admin_waps` (`id`, `name`, `email`, `password`, `status`, `register`, `type`, `image`, `permission`, `lastlogin`) VALUES
(1, 'Anup', 'anup12.m@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2018-05-15 23:41:52', 0, '', 1, '2018-05-18 15:50:41'),
(2, 'Piklu', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '0000-00-00 00:00:00', 1, '', 0, '2018-05-18 15:50:57'),
(3, 'hello', 'admin2@admin.com', '1234', 0, '0000-00-00 00:00:00', 2, '', 0, '2018-05-16 16:27:25'),
(4, 'sagor', 'sagor@admin.com', '1234', 1, '0000-00-00 00:00:00', 0, '', 0, '2018-05-18 15:42:44'),
(7, 'Palas', 'palas@admin.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1, '0000-00-00 00:00:00', 2, '', 0, '2018-05-18 16:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_waps`
--
ALTER TABLE `admin_waps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_waps`
--
ALTER TABLE `admin_waps`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
