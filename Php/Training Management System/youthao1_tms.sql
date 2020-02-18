-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2019 at 04:59 AM
-- Server version: 5.5.61-38.13-log
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
-- Database: `youthao1_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Morshed Habib', 'mhsohel017@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(10, 'Habib', 'habib@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` bigint(20) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `courseID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch_name`, `courseID`) VALUES
(46, '2nd Batch', 30),
(47, '1st Batch', 31),
(48, '4th', 31);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `category` bigint(20) NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `duration`, `description`, `category`, `photo`) VALUES
(30, 'Professional  Driving with license', '6 Month', 'License application apply After conform admission', 1, '39ca533d47ef5c39bc52dbd29d5ff485.png'),
(31, 'Professional  Driving', '6 Month', 'Professional Driving without licence ', 1, '0087f7b9e92d2a5600ab98797f828fb2.jpg'),
(34, 'Test Course', '5 Month', 'Description ', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` bigint(20) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `category`) VALUES
(1, 'Short Course'),
(2, 'Long Course'),
(3, 'Outsourcing '),
(4, 'Diploma Course');

-- --------------------------------------------------------

--
-- Table structure for table `course_parts`
--

CREATE TABLE `course_parts` (
  `id` bigint(20) NOT NULL,
  `head_id` bigint(20) NOT NULL,
  `parts` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_parts`
--

INSERT INTO `course_parts` (`id`, `head_id`, `parts`) VALUES
(67, 21, 'With License'),
(68, 22, 'Only for Driving Course'),
(69, 23, '1st'),
(70, 24, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` bigint(20) NOT NULL,
  `courseID` varchar(50) NOT NULL,
  `stdID` varchar(20) NOT NULL,
  `date` varchar(32) NOT NULL,
  `approval` varchar(15) NOT NULL,
  `batchID` bigint(20) NOT NULL,
  `price` varchar(50) NOT NULL,
  `certified` varchar(5) NOT NULL DEFAULT 'no',
  `timeSlot` varchar(10) DEFAULT NULL,
  `board` varchar(12) DEFAULT 'BDTA',
  `certificate_id` varchar(20) NOT NULL,
  `finish_date` varchar(20) NOT NULL,
  `enroll_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `courseID`, `stdID`, `date`, `approval`, `batchID`, `price`, `certified`, `timeSlot`, `board`, `certificate_id`, `finish_date`, `enroll_id`) VALUES
(73, '30', 'STD123', '20/07/2017', 'yes', 45, '1345', 'yes', '16', NULL, 'BH3435', '2017-07-20', 'EN12'),
(77, '31', 'STD127', '20/07/2017', 'yes', 48, '1000', 'no', '18', NULL, '', '', ''),
(80, 'ownership_transfer', 'OTF14', '20/07/2017', 'yes', 0, '12224', 'no', NULL, 'BDTA', '', '', ''),
(83, '30', 'STD245', '20/07/2017', 'no', 0, '', 'no', '16', NULL, '', '', 'EN564'),
(84, '30', 'STD435', '20/07/2017', 'no', 0, '', 'no', '15', NULL, '', '', 'EN321'),
(85, '30', 'STD567', '20/07/2017', 'yes', 45, '122', 'yes', '15', NULL, 'BH4345', '2017-07-20', 'EN876'),
(86, '30', 'STD567', '', 'yes', 45, '2134', 'no', '15', 'BDTA', '', '', 'EN1356'),
(87, 'professional_licence', 'DL367', '21/07/2017', 'yes', 0, '1342', 'no', NULL, 'BDTA', '', '', ''),
(88, '30', 'STD1234', '21/07/2017', 'no', 0, '', 'no', '16', NULL, '', '', 'EN3211'),
(90, 'professional_licence', 'DLjfrkejfijf', '22/07/2017', 'yes', 0, '', 'no', NULL, 'BDTA', '', '', ''),
(91, 'ownership_transfer', 'OTF1233', '15/07/2018', 'yes', 0, '', 'no', NULL, 'BDTA', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category`, `photo`) VALUES
(8, 'Photos', '8fa9698c16f841a700d45e4d62c012e7.jpg'),
(14, 'Students', 'a29a94faaf3bde259a2ce30d7c52ef73.jpg'),
(15, 'Students', '8d54d1937dba000d01c30ed4484f8594.jpg'),
(16, 'Students', 'a83435fee0dd888e638007f52a6bbd27.jpg'),
(17, 'Students', 'eff7857e2eb4b5b0ab025db8089be324.JPG'),
(18, 'Campus', 'fad053814864eb5b610502918ba07674.JPG'),
(19, 'Students', '39e30c5900ea5ddcf88c72b62b237a42.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` bigint(20) NOT NULL,
  `post` varchar(100) CHARACTER SET utf8 NOT NULL,
  `vacancy` varchar(15) CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `post`, `vacancy`, `details`, `date`) VALUES
(2, 'PHP trainer', '2', 'Trainer for BTEB course', '21-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `designation`, `photo`) VALUES
(4, 'Md. Anwarul Haque', 'Principal', '3fa09cc870be9a1fad0bc0856ef2ba1d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` bigint(20) NOT NULL,
  `title` varchar(150) CHARACTER SET utf8 NOT NULL,
  `date` varchar(30) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `description`, `photo`, `file`) VALUES
(4, 'Basic Trade 360Hours April - June 2017 BTEB Registration Coming  ', '27-03-2017', 'Basic Trade 360Hours April - June 2017 \r\n           3 month Registration\r\nTrade:\r\n1. Computer Office Application - 3 Month\r\n2. Database programming - 3 Month\r\n3. Refrigeration and Airconditioning -3 Month \r\n\r\n', '', ''),
(6, 'Orientation IGA Programme of mari Stopes bangladesh with SDTI', '16-04-2017', 'Dear Concerned,\r\nGlad to know that, justifying your all documents, we are going to agreement with you purpose of computer office application, Tailoring and Block Batik training course. We will give you 70 students for Office application 30 students for tailoring and 20 students for block batiks day after three month. This agreement will be continue two years from today. \r\n\r\nThanks and best regards\r\nDr. Shah Halimur Rashid\r\nProject Manager - SHOKHI  \r\nMarie Stopes Bangladesh.\r\n', '38b6cbbe16b63c608258b666e891b7ec.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `part_heads`
--

CREATE TABLE `part_heads` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `head` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part_heads`
--

INSERT INTO `part_heads` (`id`, `course_id`, `head`) VALUES
(21, 30, 'Professional Driving'),
(22, 31, 'Driving Course'),
(23, 31, 'php'),
(24, 31, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `enroll_id` bigint(20) NOT NULL,
  `date` varchar(30) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `due` int(11) NOT NULL,
  `fee` varchar(5) NOT NULL,
  `licence` varchar(5) NOT NULL,
  `transfer` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `enroll_id`, `date`, `amount`, `due`, `fee`, `licence`, `transfer`) VALUES
(5, 80, '20/07/2017', '24', 12200, '', '', 'yes'),
(6, 85, '20/07/2017', '22', 100, 'yes', '', ''),
(7, 85, '20/07/2017', '1', 99, 'yes', '', ''),
(8, 86, '20/07/2017', '34', 2100, 'yes', '', ''),
(9, 73, '20/07/2017', '45', 1300, 'yes', '', ''),
(10, 85, '20/07/2017', '3', 96, 'yes', '', ''),
(11, 85, '20/07/2017', '3', 93, 'yes', '', ''),
(12, 73, '22/07/2017', '123445', -122145, 'yes', '', ''),
(13, 73, '22/07/2017', '', -122145, '', '', ''),
(14, 80, '22/07/2017', '', 12200, '', '', ''),
(15, 73, '22/07/2017', '', -122145, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_days`
--

CREATE TABLE `schedule_days` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `days` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_days`
--

INSERT INTO `schedule_days` (`id`, `course_id`, `days`) VALUES
(7, 30, 'Saturday, Monday'),
(8, 31, 'Friday, Sunday'),
(9, 31, '5 days'),
(10, 34, 'saturday');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) NOT NULL,
  `service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`) VALUES
(1, 'Web Development'),
(4, 'Apps Development'),
(5, 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `service_news`
--

CREATE TABLE `service_news` (
  `id` bigint(20) NOT NULL,
  `service_type` bigint(20) NOT NULL,
  `news` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `head` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_news`
--

INSERT INTO `service_news` (`id`, `service_type`, `news`, `photo`, `head`) VALUES
(5, 1, 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis ', 'c172d4ce29fe1225533114444c096010.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis'),
(6, 4, 'nsbsvj hfv,jbfv,jsbej,v', 'd9b97e73ecd0c8f1d667d9028aeed3ed.jpg', 'App development ');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) NOT NULL,
  `main_caption` varchar(100) NOT NULL,
  `sub_caption` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `position` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `main_caption`, `sub_caption`, `description`, `photo`, `position`) VALUES
(6, 'Orientation Programme of IGA By SDTI with Mari Stopes Bangladesh', 'Skill Development & Technical Institute (SDTI)', 'SDTI', '4e9e84caed2ceb8b4f0fb487619f87b6.jpg', '2'),
(7, 'Meeting SDTI with Mari Stopes', 'About Next IGA Orientation Programme ', 'SDTI', 'b7f7c0751806957acf5c59a8125e0abe.jpg', '1'),
(8, 'Seminar ', 'Outsourcing', 'About outsourcing statment', '0924d0c1fed829b5c5cd1c495c6a404a.JPG', '3');

-- --------------------------------------------------------

--
-- Table structure for table `social_link`
--

CREATE TABLE `social_link` (
  `id` bigint(20) NOT NULL,
  `trainerID` bigint(20) NOT NULL,
  `link` varchar(150) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_link`
--

INSERT INTO `social_link` (`id`, `trainerID`, `link`, `icon`) VALUES
(66, 12, 'https://www.facebook.com/habib', 'facebook'),
(68, 11, 'https://www.facebook.com/zahidcse', 'facebook');

-- --------------------------------------------------------

--
-- Table structure for table `std_work`
--

CREATE TABLE `std_work` (
  `id` bigint(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_work`
--

INSERT INTO `std_work` (`id`, `category`, `photo`) VALUES
(2, 'photo', '2fb8b43fe8b4b4a33275a1572497b2d9.jpg'),
(3, 'photo', '514229c247459191c85e6c5f15505f33.JPG'),
(4, 'photo', '39360ad423c05f270083fb6a6b736db2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `mother` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `g_mobile` varchar(15) NOT NULL,
  `p_village` varchar(100) NOT NULL,
  `p_post` varchar(100) NOT NULL,
  `p_upozila` varchar(100) NOT NULL,
  `p_district` varchar(30) NOT NULL,
  `p_zip` varchar(15) NOT NULL,
  `g_village` varchar(100) NOT NULL,
  `g_post` varchar(100) NOT NULL,
  `g_upozila` varchar(100) NOT NULL,
  `g_district` varchar(100) NOT NULL,
  `g_zip` varchar(15) NOT NULL,
  `date_of_birth` varchar(40) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `blood` varchar(15) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `pass_year` varchar(15) NOT NULL,
  `result` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `courseID` varchar(50) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `pr_village` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pr_post` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pr_upozila` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pr_district` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pr_zip` varchar(20) CHARACTER SET utf8 NOT NULL,
  `term` varchar(9) NOT NULL,
  `approval` varchar(3) NOT NULL DEFAULT 'no',
  `slot` varchar(10) NOT NULL,
  `board` varchar(12) NOT NULL DEFAULT 'SDTI',
  `cellular` text NOT NULL,
  `passport_no` text NOT NULL,
  `age` varchar(10) NOT NULL,
  `remarks` text NOT NULL,
  `ssc` varchar(100) NOT NULL,
  `learn_licence_apply_date` varchar(30) NOT NULL,
  `learn_licence_no` varchar(100) NOT NULL,
  `learn_licence_issue` varchar(100) NOT NULL,
  `learn_licence_exp` varchar(30) NOT NULL,
  `learn_licence_exam_date` varchar(30) NOT NULL,
  `learn_licence_result_date` varchar(50) NOT NULL,
  `pv_issu_date` varchar(30) NOT NULL,
  `pv_exp_date` varchar(30) NOT NULL,
  `pv_remarks` text NOT NULL,
  `pr_dl_no` varchar(100) NOT NULL,
  `pr_dl_issu_date` varchar(30) NOT NULL,
  `pr_dl_exp_date` varchar(30) NOT NULL,
  `sm_dl_issu_date` varchar(30) NOT NULL,
  `pr_dl_cellular` varchar(20) NOT NULL,
  `sm_dl_no` varchar(100) NOT NULL,
  `sm_exp_date` varchar(30) NOT NULL,
  `sm_remarks` text NOT NULL,
  `pr_sm_dl_issu_date` varchar(30) NOT NULL,
  `price` varchar(15) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `enroll_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father`, `mother`, `mobile`, `email`, `guardian`, `g_mobile`, `p_village`, `p_post`, `p_upozila`, `p_district`, `p_zip`, `g_village`, `g_post`, `g_upozila`, `g_district`, `g_zip`, `date_of_birth`, `nationality`, `religion`, `blood`, `degree`, `institution`, `pass_year`, `result`, `photo`, `courseID`, `batch`, `pr_village`, `pr_post`, `pr_upozila`, `pr_district`, `pr_zip`, `term`, `approval`, `slot`, `board`, `cellular`, `passport_no`, `age`, `remarks`, `ssc`, `learn_licence_apply_date`, `learn_licence_no`, `learn_licence_issue`, `learn_licence_exp`, `learn_licence_exam_date`, `learn_licence_result_date`, `pv_issu_date`, `pv_exp_date`, `pv_remarks`, `pr_dl_no`, `pr_dl_issu_date`, `pr_dl_exp_date`, `sm_dl_issu_date`, `pr_dl_cellular`, `sm_dl_no`, `sm_exp_date`, `sm_remarks`, `pr_sm_dl_issu_date`, `price`, `serial`, `enroll_id`) VALUES
(81, 'Morshed Habib', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '6eff0fa4a73ce4fd84f84c77477a2fae.jpg', '30', '', '', '', '', '', '', 'ok', 'no', '16', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD123', ''),
(85, 'Morshed Habib', 'Nojrul Islam', 'Bilkis Akter', '12345678', 'jdkdskjed@gmail.com', '', '', 'Rongpur', 'rongpur', 'gaibandha', 'rongpur', '', 'Rongpur', 'gaibandha', 'gaibandha', 'Rongpur', '', '2017-07-22', 'Bangladesh', '', 'B+', 'Rongpur', '', '', '', '035be9d728f9541fff27dd2da15f17fe.jpg', '31', '', '', '', '', '', '', 'ok', 'no', '18', '', '', '3thjfbvuidhrg646777', '28', '', 'Gaibandha', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD127', ''),
(89, 'Morshed Habib update', 'nazrul islam', 'bilkis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '760b65484606ece101c29190261dbc01.jpg', 'ownership_transfer', '', '', '', '', '', '', '', 'no', '', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12224', 'OTF14', ''),
(90, 'Morshed Habib update', 'nazrul islam', 'bilkis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'd566485ef7de1ca10bdb257fcd9a7141.jpg', 'ownership_transfer', '', '', '', '', '', '', '', 'no', '', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1222', '', ''),
(92, 'Morshed Habib', 'nazrul islam', 'bilkis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '857c4a0238afb089133c880167f6d9d9.jpg', '30', '', '', '', '', '', '', 'ok', 'no', '16', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD245', 'EN564'),
(93, 'Morshed Habib', 'nazrul islam', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '474ad8b1076ccb96531cc599b3a12abd.jpg', '30', '', '', '', '', '', '', 'ok', 'no', '15', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD435', 'EN321'),
(94, 'new std', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '5c1b5837ea7c8600760efd38c811be62.jpg', '30', '', '', '', '', '', '', 'ok', 'no', '15', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD567', 'EN876'),
(95, 'Morshed Habib', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '6eff0fa4a73ce4fd84f84c77477a2fae.jpg', 'professional_licence', '', '', '', '', '', '', 'ok', 'no', '', 'SDTI', '', '', '', '', '', 'sddd', '', '2017-07-21', '', '', '', '', '', '', 'dfg', '', '', '', '', '', '', '', '', '1342', 'DL367', ''),
(96, 'frte', 'ghty', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Select Blood Gr', '', '', '', '', '', '30', '', '', '', '', '', '', 'ok', 'no', '16', 'SDTI', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'STD1234', 'EN3211'),
(98, 'morshed habib', 'htkkfgfjknbjgn', 'jdjkksjfjjdhf', '123456789', 'jjkkfjkj@hjj.com', '', '', 'Rongpur', 'rongpur', 'gaibandha', 'Rongpur', '', 'Rongpur', 'gaibandha', 'Rongpur', 'Rongpur', '', '2017-07-22', 'Bangladesh', 'Hindu', 'B-', 'jfjjjjj', '', '', '', '3fa984e4fbb2ed4d0608d9a247774104.jpg', 'professional_licence', '', '', '', '', '', '', 'ok', 'no', '', 'SDTI', '', '24e3nfjkrngkjrke4', '49', '', 'rongpur', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DLjfrkejfijf', ''),
(99, 'jhsaknd', 'kjsajx', 'jhq', '12657329823', 'wajsxi@gmail.com', '', '', 'huhusa', 'hbjs', 'hgsha', 'ushius', '', 'ghwquhqw', 'qwuhqwuh', 'yguyqw', 'huqh', '', '2017-07-22', 'jhbhbidsh', 'hjsdajchds', '', '', '', '', '', '2d499cc3198ca17274e6fad7d7aedaed.jpg', 'ownership_transfer', '', '', '', '', '', '', '', 'no', '', 'SDTI', '', '1234', '26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OTF1233', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `msg` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `designation`, `msg`, `photo`) VALUES
(4, 'Morshed Habib', 'Executive Director, YouthfireIT', 'Even after a full working day I found myself looking forward for the next class! Very interesting, fun and an overall great experience!', '76e680d55830cf57975bb612b188e56a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimunial`
--

CREATE TABLE `testimunial` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `message` text NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` bigint(20) NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `slot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `schedule_id`, `slot`) VALUES
(15, 7, '6am'),
(16, 7, '7am'),
(17, 7, '8am'),
(18, 8, '9:00am'),
(19, 8, '11am'),
(20, 9, '10:00 am-12:00pm'),
(21, 10, '1-2pm');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `experience` text NOT NULL,
  `designation` varchar(100) NOT NULL,
  `contact` text NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `skills` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `name`, `description`, `experience`, `designation`, `contact`, `address`, `skills`, `type`, `photo`) VALUES
(11, 'Zahid Hashan', 'Academic Qualification M.sc in CSE', '5 Years', 'Instructor ', '01917495231', 'Khilgaon, Dhaka 1219', '1. Computer Fundamentals (Word, Excel, Access, Power Point) \r\n2. Adobe Photoshop \r\n3. Adobe Illustrator\r\n 4. Digital Video Editing and Story boarding Basics\r\n 5. Digital Audio Editing \r\n6. 3D Modeling, Texturing and Animation(3ds Max) \r\n7. Outsourcing Comparable', 'Full Time', '85a606a3f06b463a71ba7c9f773f8286.jpg'),
(12, 'Morshed Habib Sohel', 'Academic Qualification MSC', '7 years', 'Sr. Instructor ', '01977113702', 'Mirpur 10 , Dhaka 1216', '1. Computer Fundamentals (Word, Excel, Access, Power Point) 2. Adobe Photoshop 3. Adobe Illustrator 4. Digital Video Editing and Story boarding Basics 5. Digital Audio Editing 6. 3D Modeling, Texturing and Animation(3ds Max) 7. Outsourcing Comparable', 'Full Time', 'faa139fc9788ad2253e3a3d289bf9c85.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `veh_id` bigint(20) NOT NULL,
  `std_id` varchar(20) NOT NULL,
  `vehicle_category` varchar(100) NOT NULL,
  `veh_reg_no` varchar(100) NOT NULL,
  `veh_tax_exp_date` varchar(30) NOT NULL,
  `veh_fitness_date` varchar(30) NOT NULL,
  `veh_ins_exp_date` varchar(30) NOT NULL,
  `veh_eng_no` varchar(30) NOT NULL,
  `veh_chasis_no` varchar(100) NOT NULL,
  `veh_accident_history` text NOT NULL,
  `veh_app_date` varchar(30) NOT NULL,
  `veh_tmp_rc` varchar(30) NOT NULL,
  `veh_bio_date` varchar(30) NOT NULL,
  `veh_rc_date` varchar(30) NOT NULL,
  `existing_owner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`veh_id`, `std_id`, `vehicle_category`, `veh_reg_no`, `veh_tax_exp_date`, `veh_fitness_date`, `veh_ins_exp_date`, `veh_eng_no`, `veh_chasis_no`, `veh_accident_history`, `veh_app_date`, `veh_tmp_rc`, `veh_bio_date`, `veh_rc_date`, `existing_owner`) VALUES
(2, 'OTF14', 'sdfsdf', 'fefer', '2017-07-20', '2017-07-18', '', '', '', '', '', '', '', '', 'sohel'),
(3, '', 'sdfsdf', 'fefer', '2017-07-20', '2017-07-18', '', '', '', '', '', '', '', '', 'sohel'),
(4, 'OTF1233', 'sjhed', 'huhwe', '2017-07-08', '2017-07-11', '2017-07-13', 'guyguqw', 'yguwquhyq', '', '', '', '', '', 'sohel Rana');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `trainer` bigint(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `price` varchar(15) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_parts`
--
ALTER TABLE `course_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `head_id` (`head_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `stdID` (`stdID`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_heads`
--
ALTER TABLE `part_heads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseID` (`enroll_id`),
  ADD KEY `enroll_id` (`enroll_id`);

--
-- Indexes for table `schedule_days`
--
ALTER TABLE `schedule_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_news`
--
ALTER TABLE `service_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_type` (`service_type`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_link`
--
ALTER TABLE `social_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainerID` (`trainerID`);

--
-- Indexes for table `std_work`
--
ALTER TABLE `std_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_2` (`serial`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `courseID_2` (`courseID`),
  ADD KEY `serial` (`serial`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimunial`
--
ALTER TABLE `testimunial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`veh_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainer` (`trainer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `course_parts`
--
ALTER TABLE `course_parts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `part_heads`
--
ALTER TABLE `part_heads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schedule_days`
--
ALTER TABLE `schedule_days`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_news`
--
ALTER TABLE `service_news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_link`
--
ALTER TABLE `social_link`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `std_work`
--
ALTER TABLE `std_work`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimunial`
--
ALTER TABLE `testimunial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `veh_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`category`) REFERENCES `course_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_parts`
--
ALTER TABLE `course_parts`
  ADD CONSTRAINT `course_parts_ibfk_1` FOREIGN KEY (`head_id`) REFERENCES `part_heads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `students` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `part_heads`
--
ALTER TABLE `part_heads`
  ADD CONSTRAINT `part_heads_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`enroll_id`) REFERENCES `enrollment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_days`
--
ALTER TABLE `schedule_days`
  ADD CONSTRAINT `schedule_days_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_news`
--
ALTER TABLE `service_news`
  ADD CONSTRAINT `service_news_ibfk_1` FOREIGN KEY (`service_type`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_link`
--
ALTER TABLE `social_link`
  ADD CONSTRAINT `social_link_ibfk_1` FOREIGN KEY (`trainerID`) REFERENCES `trainer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_days` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD CONSTRAINT `vehicle_info_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`serial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`trainer`) REFERENCES `trainer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
