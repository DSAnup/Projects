-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2019 at 10:15 AM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wapssolution_personalmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_waps`
--

CREATE TABLE `admin_waps` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `register` datetime NOT NULL,
  `type` tinyint(11) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `about` text NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `templink` varchar(100) NOT NULL,
  `requesttime` varchar(50) NOT NULL,
  `validtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_waps`
--

INSERT INTO `admin_waps` (`id`, `name`, `email`, `password`, `status`, `register`, `type`, `image`, `permission`, `lastlogin`, `about`, `education`, `designation`, `location`, `templink`, `requesttime`, `validtime`) VALUES
(1, 'Anup Mondal', 'anup12.m@gmail.com', '3859766560f16da9272879dc90ac29dc', 1, '2018-05-15 23:41:52', 3, 'c87475f9d67dd41fa61a5eee8f618779.jpg', 1, '2019-01-15 18:30:28', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Senior Programmer', 'Dhaka, Bangladesh', '8ceb1f52c309549499f19e40a4cb2eb0', '2019-01-16 12:30:28am', '2019-01-18 12:30:28am'),
(2, 'Piklu', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '0000-00-00 00:00:00', 1, '', 0, '2018-05-18 15:50:57', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(3, 'hello', 'admin2@admin.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '0000-00-00 00:00:00', 2, '', 0, '2018-11-11 18:12:41', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(4, 'sagor', 'sagor@admin.com', '1234', 1, '0000-00-00 00:00:00', 0, '', 0, '2018-05-18 15:42:44', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(7, 'Palas', 'palas@admin.com', 'ec6a6536ca304edf844d1d248a4f08dc', 1, '0000-00-00 00:00:00', 2, '', 0, '2018-05-18 16:13:46', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(8, 'Binoy', 'binoy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00 00:00:00', 1, '', 0, '2018-12-08 19:53:15', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(9, 'palash sarker', 'palashsarker855@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '0000-00-00 00:00:00', 1, '', 0, '2018-12-11 15:25:43', '', '', '', '', '', '0000-00-00 00:00:00', ''),
(10, 'vhum', 'vhumi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1, '0000-00-00 00:00:00', 1, '', 0, '2018-12-11 17:33:10', '', '', '', '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `expenseTotal` int(11) NOT NULL,
  `earnTotal` int(11) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `expenseTotal`, `earnTotal`, `userId`) VALUES
(1, 65381, 1334, 1),
(2, 0, 0, 10),
(3, 5050, 24100, 9);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` bigint(20) NOT NULL,
  `borrowFrom` varchar(255) NOT NULL,
  `bDate` date NOT NULL,
  `bComments` text NOT NULL,
  `bdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `borrowAmount` int(11) NOT NULL,
  `borrowBalance` int(11) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `borrowGive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `borrowFrom`, `bDate`, `bComments`, `bdatetime`, `status`, `borrowAmount`, `borrowBalance`, `userID`, `borrowGive`) VALUES
(1, 'Uttam Kumar ', '2018-10-10', '<p>long time</p>\r\n\r\n<p>* 2017 puja</p>\r\n\r\n<p>* drinks purpose</p>\r\n', '2018-12-17 13:52:50', 0, 3500, 3500, 1, 0),
(2, 'Chayan', '2018-12-16', '<p>* Puja Eat 2018</p>\r\n\r\n<p>* Drinks (17-12)</p>\r\n', '2019-03-20 16:18:27', 0, 1600, 500, 1, 1100),
(3, 'Palash Basa', '2018-12-04', '<p>*</p>\r\n', '2018-12-18 19:11:17', 0, 1000, 0, 1, 1000),
(5, 'Sanjoy Da', '2018-12-14', '', '2018-12-17 15:34:36', 0, 200, 200, 9, 0),
(6, 'Sanjoy ', '2018-12-18', '', '2018-12-18 19:11:01', 0, 100, 0, 1, 100),
(7, 'Sanjoy Da', '2018-12-25', '', '2019-01-11 15:02:56', 0, 100, 0, 1, 100),
(8, 'Palash', '2018-12-26', '', '2019-01-16 14:27:42', 0, 1000, 0, 1, 1000),
(9, 'Palash', '2019-01-23', '<p>* Tour&nbsp;</p>\r\n', '2019-03-10 17:23:13', 0, 5000, 0, 1, 5000),
(10, 'Bikash', '2019-03-21', '<p>pay to next month</p>\r\n', '2019-04-13 17:02:31', 0, 3000, 0, 1, 3000),
(11, 'Sanjoy', '2019-03-31', '', '2019-05-02 14:08:04', 0, 1000, 0, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `borrowlendhistory`
--

CREATE TABLE `borrowlendhistory` (
  `id` bigint(20) NOT NULL,
  `borrowId` bigint(20) NOT NULL,
  `lendId` bigint(20) NOT NULL,
  `hamount` int(11) NOT NULL,
  `hdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrowlendhistory`
--

INSERT INTO `borrowlendhistory` (`id`, `borrowId`, `lendId`, `hamount`, `hdate`, `userId`) VALUES
(2, 0, 2, 46, '2018-12-12 08:00:00', 1),
(3, 4, 0, 50, '2018-12-17 08:00:00', 1),
(4, 0, 6, 100, '2018-12-17 08:00:00', 9),
(5, 6, 0, 100, '2018-12-18 08:00:00', 1),
(6, 3, 0, 1000, '2018-12-18 08:00:00', 1),
(7, 2, 0, 100, '2018-12-16 08:00:00', 1),
(8, 7, 0, 100, '2019-01-11 07:00:00', 1),
(9, 8, 0, 1000, '2019-01-16 07:00:00', 1),
(10, 0, 3, 50, '2019-01-21 07:00:00', 1),
(11, 0, 9, 500, '2019-01-30 07:00:00', 1),
(12, 9, 0, 2000, '2019-02-06 07:00:00', 1),
(13, 0, 8, 200, '2019-02-08 07:00:00', 1),
(14, 9, 0, 3000, '2019-03-10 07:00:00', 1),
(15, 2, 0, 1000, '2019-03-20 07:00:00', 1),
(16, 0, 10, 1000, '2019-03-21 07:00:00', 1),
(17, 10, 0, 3000, '2019-04-13 07:00:00', 1),
(18, 11, 0, 1000, '2019-05-02 07:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` bigint(20) NOT NULL,
  `dDate` date NOT NULL,
  `dTitle` varchar(150) NOT NULL,
  `dBrief` text NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `earn`
--

CREATE TABLE `earn` (
  `id` bigint(20) NOT NULL,
  `eDate` date NOT NULL,
  `purId` int(11) NOT NULL,
  `earnPurpose` varchar(150) NOT NULL,
  `eAmount` int(20) NOT NULL,
  `eTime` varchar(20) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `earn`
--

INSERT INTO `earn` (`id`, `eDate`, `purId`, `earnPurpose`, `eAmount`, `eTime`, `userId`) VALUES
(1, '2018-12-11', 1, '', 4000, '12:04 am', 1),
(2, '2018-12-12', 1, '', 3000, '12:19 am', 1),
(3, '2018-12-17', 1, '', 100, '07:46 pm', 1),
(4, '2018-12-10', 0, 'Revenue', 22000, '09:27 pm', 9),
(5, '2018-12-25', 0, 'Lunch facilities', 2000, '09:38 pm', 9),
(6, '2018-12-18', 1, '', 3000, '01:10 am', 1),
(8, '2018-12-27', 0, 'Adv. Salary', 500, '08:38 pm', 1),
(10, '2018-12-30', 0, 'From Home', 1000, '07:24 pm', 1),
(11, '2019-01-09', 0, 'Adv. Salary', 100, '12:09 am', 1),
(12, '2019-01-10', 1, '', 5000, '07:19 pm', 1),
(13, '2019-01-15', 1, '', 5000, '10:40 pm', 1),
(14, '2019-02-01', 0, 'Mama', 500, '06:55 pm', 1),
(15, '2019-02-01', 0, 'Home', 1000, '06:55 pm', 1),
(16, '2019-02-05', 1, '', 5000, '12:15 am', 1),
(17, '2019-02-18', 1, '', 5000, '10:41 pm', 1),
(18, '2019-03-10', 1, '', 15000, '11:23 pm', 1),
(20, '2019-04-05', 0, 'Home', 1000, '11:36 pm', 1),
(21, '2019-04-11', 0, 'Home', 5000, '09:03 pm', 1),
(22, '2019-04-12', 1, '', 5000, '08:30 pm', 1),
(23, '2019-04-26', 1, '', 4000, '09:16 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` bigint(20) NOT NULL,
  `exDate` date NOT NULL,
  `exPurpose` varchar(150) NOT NULL,
  `exAmount` int(20) NOT NULL,
  `exTime` varchar(20) NOT NULL,
  `purId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `exDate`, `exPurpose`, `exAmount`, `exTime`, `purId`, `userId`) VALUES
(1, '2018-12-10', '', 3169, '08:21 pm', 2, 1),
(2, '2018-12-10', 'Mill Due', 218, '08:20 pm', 0, 1),
(3, '2018-12-09', 'Light For Fish', 75, '12:08 am', 0, 1),
(4, '2018-12-10', 'Borrow Sanjoy Da', 100, '12:13 am', 0, 1),
(5, '2018-12-11', '', 50, '08:21 pm', 3, 1),
(6, '2018-12-11', '', 62, '08:23 pm', 4, 1),
(7, '2018-12-11', '', 25, '08:23 pm', 5, 1),
(10, '2018-12-12', '', 140, '12:27 am', 3, 1),
(11, '2018-12-12', '', 104, '12:31 am', 4, 1),
(12, '2018-12-12', 'Fruits buy for family', 250, '12:31 am', 0, 1),
(13, '2018-12-13', '', 29, '12:35 am', 8, 1),
(14, '2018-12-13', 'Nitto marriage', 1020, '06:43 pm', 0, 1),
(15, '2018-12-14', '', 156, '12:05 am', 4, 1),
(16, '2018-12-14', '', 140, '08:12 pm', 3, 1),
(17, '2018-12-15', '', 50, '12:04 am', 9, 1),
(18, '2018-12-14', '', 75, '12:05 am', 8, 1),
(19, '2018-12-14', '', 306, '12:06 am', 10, 1),
(20, '2018-12-15', '', 45, '07:29 pm', 3, 1),
(21, '2018-12-15', '', 90, '11:13 pm', 4, 1),
(22, '2018-12-15', 'Sampo', 10, '07:30 pm', 0, 1),
(24, '2018-12-15', '', 173, '11:14 pm', 10, 1),
(25, '2018-12-16', '', 398, '07:51 pm', 10, 1),
(26, '2018-12-16', '', 120, '07:40 pm', 4, 1),
(27, '2018-12-16', '', 40, '07:41 pm', 3, 1),
(28, '2018-12-16', 'T-Shirt Buy', 100, '07:42 pm', 0, 1),
(29, '2018-12-17', '', 50, '07:45 pm', 3, 1),
(30, '2018-12-17', '', 58, '07:45 pm', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE `lend` (
  `id` bigint(20) NOT NULL,
  `lendTo` varchar(255) NOT NULL,
  `lDate` date NOT NULL,
  `lComment` text NOT NULL,
  `ldatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `lendAmount` int(11) NOT NULL,
  `lendBalance` int(11) NOT NULL,
  `userID` bigint(20) NOT NULL,
  `lendReturn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lend`
--

INSERT INTO `lend` (`id`, `lendTo`, `lDate`, `lComment`, `ldatetime`, `status`, `lendAmount`, `lendBalance`, `userID`, `lendReturn`) VALUES
(2, 'Bijoy', '2018-12-12', '<p>Office</p>\r\n', '2018-12-12 18:24:10', 0, 100, 54, 1, 46),
(3, 'Mithu', '2018-12-15', '', '2019-01-21 20:01:37', 0, 50, 0, 1, 50),
(4, 'Partho Da', '2018-11-23', '', '2018-12-17 15:32:25', 0, 500, 500, 9, 0),
(5, 'Anup Da', '2018-12-11', '', '2018-12-17 15:33:08', 0, 1000, 1000, 9, 0),
(6, 'Susanto Da', '2018-12-15', '', '2018-12-17 16:04:57', 0, 100, 0, 9, 100),
(7, 'Piklu', '2018-12-19', '<p>*will return 4-5 day&#39;s latter</p>\r\n', '2018-12-19 17:01:09', 0, 510, 510, 1, 0),
(8, 'Aslam', '2018-12-31', '<p>Car Rent</p>\r\n', '2019-02-08 04:53:15', 0, 200, 0, 1, 200),
(9, 'Parvez', '2019-01-16', '<p>should be return next week.</p>\r\n', '2019-01-30 16:28:03', 0, 500, 0, 1, 500),
(10, 'Bikash', '2019-03-18', '<p>Return check</p>\r\n', '2019-03-22 08:28:46', 0, 1100, 100, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE `purpose` (
  `id` bigint(20) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `type` varchar(70) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`id`, `purpose`, `type`, `userId`) VALUES
(1, 'Salary', 'Earn Purpose', 1),
(2, 'House Rent', 'Expense Purpose', 1),
(3, 'Car Rent', 'Expense Purpose', 1),
(4, 'Tea ', 'Expense Purpose', 1),
(5, 'Laundry', 'Expense Purpose', 1),
(6, 'Salary', 'Earn Purpose', 9),
(7, 'House Rent', 'Expense Purpose', 9),
(8, 'Mobile Recharge', 'Expense Purpose', 1),
(9, 'Medicine', 'Expense Purpose', 1),
(10, 'Mill Bazzar', 'Expense Purpose', 1),
(11, 'Entertainment', 'Expense Purpose', 9),
(12, 'Sampo', 'Expense Purpose', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint(20) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `title` varchar(150) NOT NULL,
  `taskBreif` text NOT NULL,
  `emailStatus` tinyint(4) DEFAULT 0,
  `mobileStatus` tinyint(4) NOT NULL DEFAULT 0,
  `taskComplete` varchar(150) NOT NULL,
  `userId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `startDate`, `endDate`, `title`, `taskBreif`, `emailStatus`, `mobileStatus`, `taskComplete`, `userId`) VALUES
(1, '2018-12-11', '2018-12-31', 'Automate The Boring Stuff With Python', '<p>Complete the Book within this 2018.</p>\r\n\r\n<p>*The book is closed 11 Jan, 2019.</p>\r\n\r\n<p>* some excersize was not complete fully.</p>\r\n', 0, 0, 'Completed', 1),
(2, '2018-12-11', '0000-00-00', 'Using Facebook API', '<p>Using facebook for login any website.</p>\r\n', 0, 0, 'On Hold', 1),
(3, '2018-12-11', '0000-00-00', 'SSL service', '<p>SSL service for website secure.</p>\r\n\r\n<p>* Task done for main website and htaccess</p>\r\n\r\n<p>* Try to next time for subfolder and subdomain</p>\r\n\r\n<p>* Everything is done.&nbsp;</p>\r\n', 0, 0, 'Completed', 1),
(4, '2018-12-11', '0000-00-00', 'Automatic email and mobile message', '<p>Automatic email and mobile message by check time scheduling</p>\r\n\r\n<p>*Automatic email is done by cron job (18/01/2019)</p>\r\n\r\n<p>*&nbsp;curl --silent https://wapssolution.com/mymanagement/Admin_panel/corn_job</p>\r\n', 0, 0, 'On Hold', 1),
(5, '2018-12-11', '2018-12-18', 'Automate The Boring Stuff With Python', '<p>ddd</p>\r\n', 0, 0, 'To Do', 9),
(6, '2018-12-11', '0000-00-00', 'Hello', '', 0, 0, 'Completed', 9),
(7, '2018-12-12', '2018-12-20', 'MyManagement', '<p>To Find Debug and Solve and Update New Feature.</p>\r\n\r\n<p>* forget password email verification &amp; link create limited time. (task done)</p>\r\n\r\n<p>* need sticky note in index for today list</p>\r\n', 0, 0, 'On Hold', 1),
(8, '2018-12-12', '0000-00-00', 'Git Version', '<p>* What is GIT</p>\r\n\r\n<p>* how it&#39;s work&nbsp;</p>\r\n', 0, 0, 'Doing', 1),
(9, '2019-01-19', '2019-01-19', 'Phone Call List', '<p>1. Call to Sentu To know about him and his father - Hold, Munim vai, Sabuj for project.</p>\r\n', 0, 0, 'Doing', 1),
(10, '2018-12-14', '0000-00-00', 'Software & web application testing', '<p>Software &amp; web application testing for php and codeigniter, like php unit testing</p>\r\n', 0, 0, 'Doing', 1),
(11, '2018-12-15', '2018-12-16', 'Deshnet Bd', '<p>end tomorrow all requirement</p>\r\n\r\n<p>* now setup everything</p>\r\n', 0, 0, 'Completed', 1),
(13, '2019-01-19', '0000-00-00', 'Udemy Python', '<p>End to as soon as possible. try to this month.</p>\r\n', 0, 0, 'On Hold', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wsxq_admin`
--

CREATE TABLE `wsxq_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastlogon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image` varchar(225) NOT NULL,
  `type` enum('5','10') NOT NULL,
  `permission` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wsxq_admin`
--

INSERT INTO `wsxq_admin` (`id`, `email`, `password`, `u_name`, `status`, `registered`, `lastlogon`, `image`, `type`, `permission`) VALUES
(28, 'mhsohel017@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Morshed Habib', '1', '2016-11-06 01:12:16', '0000-00-00 00:00:00', '', '10', '1'),
(29, 'mhsohel018@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sohel', '1', '2018-09-19 05:28:30', '0000-00-00 00:00:00', '', '10', '1'),
(31, 'anup12.m@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Anup Mondal', '1', '2018-09-03 17:23:05', '0000-00-00 00:00:00', '', '10', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_waps`
--
ALTER TABLE `admin_waps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `borrowlendhistory`
--
ALTER TABLE `borrowlendhistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `earn`
--
ALTER TABLE `earn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `wsxq_admin`
--
ALTER TABLE `wsxq_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_waps`
--
ALTER TABLE `admin_waps`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `borrowlendhistory`
--
ALTER TABLE `borrowlendhistory`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earn`
--
ALTER TABLE `earn`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wsxq_admin`
--
ALTER TABLE `wsxq_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowlendhistory`
--
ALTER TABLE `borrowlendhistory`
  ADD CONSTRAINT `borrowlendhistory_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purpose`
--
ALTER TABLE `purpose`
  ADD CONSTRAINT `purpose_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `admin_waps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
