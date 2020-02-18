-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 07:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` bigint(20) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `answer` varchar(12) DEFAULT NULL,
  `enroll_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `std_id`, `quiz_id`, `answer`, `enroll_id`) VALUES
(12, 1, 1, NULL, 'Hd97uI4IbW'),
(13, 1, 4, '1', 'GvUIlJDZ5n'),
(14, 1, 2, '3', 'GvUIlJDZ5n'),
(15, 1, 2, '1', 'AmkRmSvLUz'),
(16, 1, 3, '2', 'AmkRmSvLUz'),
(17, 1, 3, '1', 'OyUrgYRxMG'),
(18, 1, 2, '1', 'OyUrgYRxMG');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `duration` int(11) NOT NULL,
  `subject` bigint(20) NOT NULL,
  `totalquestion` int(11) NOT NULL,
  `howmuchtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `duration`, `subject`, `totalquestion`, `howmuchtime`) VALUES
(6, 'Electricity', 10, 2, 2, 2),
(7, 'Vector', 2, 2, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `course_cat`
--

CREATE TABLE `course_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_cat`
--

INSERT INTO `course_cat` (`id`, `cat_name`) VALUES
(2, 'Science'),
(3, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `published` varchar(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `enroll_id` varchar(50) NOT NULL,
  `mailstatus` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `course_id`, `status`, `std_id`, `published`, `date`, `enroll_id`, `mailstatus`) VALUES
(77, 7, 'no', 1, 'yes', '23/04/2019', 'ZlGXRCDQ2v', 0),
(78, 7, 'no', 1, 'yes', '23/04/2019', 'Hd97uI4IbW', 0),
(79, 6, 'no', 1, 'yes', '23/04/2019', 'GvUIlJDZ5n', 1),
(80, 6, 'no', 1, '', '24/04/2019', 'AmkRmSvLUz', 0),
(81, 6, 'no', 1, '', '24/04/2019', 'OyUrgYRxMG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `q_id` bigint(20) NOT NULL,
  `lesson_id` bigint(20) NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `answer` varchar(12) NOT NULL,
  `option_1` text CHARACTER SET utf8 NOT NULL,
  `option_2` text CHARACTER SET utf8 NOT NULL,
  `option_3` text CHARACTER SET utf8 NOT NULL,
  `option_4` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer_explain` text CHARACTER SET utf8 NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`q_id`, `lesson_id`, `question`, `answer`, `option_1`, `option_2`, `option_3`, `option_4`, `date`, `answer_explain`, `sub_id`) VALUES
(1, 7, '<p>afsd</p>\r\n', '1', '<p>dfsa</p>\r\n', '<p>dfas</p>\r\n', '<p>dfas</p>\r\n', '<p>adsfafsd</p>\r\n', '2019-04-21 18:08:17', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:1300px; width:1830px\" /></p>\r\n', 2),
(2, 6, '<p>test@test.com</p>\r\n', '2', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:156px; width:220px\" /></p>\r\n', '<p>test</p>\r\n', '<p>dhaka</p>\r\n', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:156px; width:220px\" /></p>\r\n', '2019-04-22 18:21:15', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:156px; width:220px\" /></p>\r\n', 2),
(3, 6, '<p>dd</p>\r\n', '2', '<p>test</p>\r\n', '<p>test</p>\r\n', '<p>dhaka</p>\r\n', '<p>bangladesh</p>\r\n', '2019-04-22 18:20:37', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:156px; width:220px\" /></p>\r\n', 2),
(4, 6, '<p>tt</p>\r\n', '2', '<p>test</p>\r\n', '<p>test</p>\r\n', '<p>dhaka</p>\r\n', '<p>bangladesh</p>\r\n', '2019-04-22 18:20:21', '<p>adfs<img alt=\"\" src=\"https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=650&amp;w=940\" style=\"height:156px; width:220px\" /></p>\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(19) NOT NULL,
  `college` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `address`, `phone`, `email`, `gender`, `dob`, `college`, `password`, `photo`) VALUES
(1, 'Morshed Habib', 'dhaka', '01735254295', '', 'male', '2017-07-25', 'DIU', '12345', '39dda2cd96274679207184b16a488462.jpg'),
(2, 'Morshed Habib sohel', 'dhaka', '01735254295', 'mhsohel018@gmail.com', 'male', '2017-07-25', 'DIU', '12345', '52af50274d93fc1db57faacf887f8e0c.jpg'),
(3, 'sohel', 'dhaka', '013134', 'mhsohel017@gmail.com', 'male', '2017-09-14', 'DIU', '12345', 'b69aa5d57ae822e7a3b2b78a156dee80.jpg'),
(4, 'Morshed Habib', 'Dhaka', '01735254295', 'mhsohel018@gmail.com', 'male', '1988-10-15', 'BPI', '12345', ''),
(5, 'Manik', 'Dhka', '01911608000', 'landcluser1.rms@gmail.com', 'male', '2017-10-16', 'Dkhjka', '12345', ''),
(6, 'S.M.Shafiqul Islam', 'House:25,Road:06,Mohammodpur', '01911776003', 'shafiqulgpi@gmail.com', 'male', '1993-10-10', 'Kalia pilot High school', '123456789', '3236a1d57fd360a906118b77cdd8cd6b.jpg'),
(7, 'Nayem Islam', 'Naria, Shriatpur', '01701876269', 'nayemislamnis@gmail.com', 'male', '1997-08-25', 'Naria Govt. College', '932000', '49d3fc29de1cf41fd42fd88f42803b68.jpg'),
(8, 'Abdulla Al mahmud', 'jajira,Shariatpur', '01791074660', 'mahmudshamim30@gmail.com', 'male', '1997-04-18', 'JAJIRA UNIVERSITY COLLEGE', 'Password', 'cd7a99676ad2b0b5b986ced168d62c07.jpg'),
(9, 'Sadia Akter Sathi', 'Dhaka,Bangladesh', '01784131933', 'sadiaakter.sathi2222@gmail.com', 'female', '1996-02-15', 'Shariatpur government college', 's@dia1996', '92d421f651527770daf21a062f791dc1.jpg'),
(12, 'Md.Salehuddin Mahmud', 'Naria,Shariatpur', '01914468726', 'salehuddinmahmud0156@gmail.com', 'male', '1st july 1988', 'Govt.Bangla College', '159753', '56e86d81e3acff1d02ac8675883d924d.jpg'),
(13, 'MD Barkat Ullah Shuva', 'Naria, Shariatpur', '01988701516', 'barkatullahshuvo@gmail.com', 'male', '1996-12-27', 'Naria Govt. College', 'bus01988701516bus', '5e6062e697b6d7fd28ee2bea2c97c252.jpg'),
(14, 'MD: Manik Mia', 'sherpur twon sherpur', '01904273254', 'maniktube5@gmail.com', 'male', '1996-10-23', 'sherpur govt. college', 'maniktube41', '48ce23fbcda0f6b11028f5aee74907ac.jpg'),
(15, 'Md; Sha poran  ', 'shakipur,sariatpur', '01625273841', 'poranphaki7.63@gmail.com', 'male', '1997-01-03', 'UNIVERSITY', '772674254', '27e2f85dfcf5623228f5712762c26b15.jpg'),
(16, 'SUJAD', 'Village:Joynagor,Upzila:Zazira,Dist:Shariatpur', '01738608621/01', 'evankhansujad@gmail.com', 'male', '1994-03-02', 'Govt.Nazimuddim Univercity College', 'sha174kha', 'd75a795730158ceab2894f51ef4bd3b6.png'),
(17, 'Forhad Hossain', 'Naria, Shariatpur', '019562551011', 'hassanmehadi099@gmail.com', 'male', '1998-11-15', 'Naria Govt college', 'mehadi2211', '1d6d562a768e239ef8f2af989aad1ed4.jpg'),
(18, 'SHOHAG MIA ', 'JAJIRA ,SHARIATPUR', '01772321713', 'bmshohag95@gmail.com', 'male', '1997-05-02', 'JAJIRA UNIVERSITY COLLEGE', '01714554056', '026819626fea72a565155bb0d6445666.jpg'),
(19, 'Sagor Ahmed', 'Shakhipur,Shariatpur', '01957195074', 'bmsagor83@yahoo.com', 'male', '1994-01-21', 'Naria govt.College', 'jannatunnaim', 'bdf59a46ac9d659539294c36fa37904b.png'),
(20, 'Razib Mia', 'Dhaka,Bangladesh', '01966912332', 'Razibahamedm@gmail.com', 'male', '1995-03-02', 'National University of Bangladesh', '01765ortss', '4fb79c0149d7a2a868a34012285d66a6.png'),
(21, 'Rumana Islam Orin', 'Dhaka,Bangladesh', '01770064641', 'rumanaislam.orin1234@gmail.com', 'female', '1998-12-12', 'Shariatpur govt college', 'rumanaislam', '13b1feb7e8e4ed4f2da13b1858ca5183.jpg'),
(22, 'MD.Romzan', 'Sherpur dhaka bangladesh', '01719176536/01', 'Tokiusmany2@gmail.com', 'male', '1995-01-01', 'gov:titumir college dhaka', '01964', 'ccfc592919267753cc35daeec1607814.png'),
(23, 'Hafsa Jaman Hira', 'Dhaka ,Bangladesh', '01782908378', 'hira.bulbuli12@gmail.com', 'female', '1998-09-22', 'National University of Bangladesh', 'iloveupakhi', 'ee93c75ea31f435929c57b05a6c0f5f1.jpg'),
(24, 'MD:TANVIR HASAN', 'Shakhipur   Shariatpur ', '01926212536', 'tanvirhasan6212@gmail.com', 'male', '1997-10-10', 'Mushigonj  gov: haragonga college', 'h2222222', '80340155a498fcc1b7c16a138ef38467.png'),
(25, 'SOHEL-ARMAN', 'DHAKA,BANGLADESH', '01777323510', 'saarman160@gmail.com', 'male', '19-06-1997', 'Naria Govt college', 'arman160', '5372c2635ff58b2da508c7eda6c4abb7.JPG'),
(26, 'Ari fsaial', 'Naria,Shariatpur.', '01737886426', 'arifsaial247@gmail.com', 'male', '1996-02-21', 'UNIVERSITY', '111aaa111', '133ff36728355a79fc4d4d2c358c5f46.jpg'),
(27, 'Salma akter', 'Naria Shariatpur', '01733467356/01', 'SalmaakterBSS@COM', 'female', '11/11/1997', 'Shariatpur gov:Naria', 'shirina', '5cc670b50deced5f15ea1528d60aab18.png'),
(28, 'mithu bain', 'thakurkande,naria,sharitepur', '01855252084', 'mithubain75@gmail.com', 'male', '1993-10-15', 'naria govd university', '552520', 'f824b014722e600d1ffb65d971727a3c.jpg'),
(29, ' Farzana Afrin', 'Sakhipur Shariatpur', '01781915393', 'Farzana.Afrin5393@Gamil.COM', 'female', '14-04-1994', 'Chadpur Govt Mohilla College', 'Farzanaafrin', 'b7df25ed1a2f825930e49ab9dbbdc3c0.jpg'),
(30, 'Zahid', 'Dhaka', '01917495231', 'zahid@youthfireit.com', 'male', '2017-11-13', 'DC', '019174952', '0c347ff2b2d2ccd9a5ad076778cf0f27.jpg'),
(31, 'Taslima Akter', 'bangladash dhaka', '01994224026', 'taslimaislam113@gmail.com', 'female', '1998-06-09', 'national university', 'zsaiathid9raka', '2892cd6afdf3f987b1475c813b978c29.jpg'),
(32, 'tawhid', 'keranigonj dhaka 1310', '01833962498', 'mhsohel017@gmail.com', 'male', '2017-11-16', 'hfj', '12345', 'b9289496fc860b3a788e6f8cf1ad3f70.png'),
(33, 'sajal ahamed', 'dhaka', '01990016667', 'sajal.ahamed95@yandex.com', 'male', '1995-05-01', 'dhaka', '12378912yy', '9dfca654a94a85f58dc2383679614e6d.png'),
(34, 'Sagor Ahmed', 'Shakhipur,Shariatpur', '01957195074', 'bmsagor009@gmail.com', 'male', '1994-01-21', 'Naria govt.college', 'jahidamar', 'cea5d24823be0fb7af9bece708b3e7a9.png'),
(35, 'Md. Shaha alam', 'ss', '234', 'mhsohel_eng@yahoo.com', 'male', '2018-02-06', 'd', '12345', '1e954b1c6d34b82f2ba3d2af86a67d37.jpg'),
(36, 'Habib', 'dhaka', '01735254295', 'info@yft.com', 'male', '2017-12-13', 'DIU', '12345', '60c7156a99fc98280ba5984bb860630a.png'),
(37, 'Sohel', 'dhaka', '0235345', 'mh@gmail.com', 'male', '2018-04-04', 'DIU', '12345', ''),
(38, 'opu', 'df', '017', 'opu@gmail.com', 'male', '2014-04-04', 'dfd', '12345', 'c374512c955e588cceb30d05432692b8.png'),
(39, 'Exam', 'Banasree', '+0991124546', 'info@abc.com', 'male', '2019-10-24', 'Dhaka College', '1', ''),
(40, 'Dipu', 'Daudkandi,Cumilla', '01856663848', 'ork.roney@gmail.com', 'male', '2018-12-05', 'Dhaka College', 'rk123', 'bd67206dfcf054cf262bd5312b9425a7.jpg'),
(41, 'sohel', '123', 'wer2342`', 'mh@gmail.com', 'male', '2018-12-19', 'dhaka', '12345', 'f7cf47af723459d1344691df013f744b.jpg'),
(42, 'sohel', 'dhaka', '2342342', 'mh@gmail.com', 'male', '2019-12-01', 'dhaka', '12345', '5d67c249ec67ed05dc561cf712b6b19b.jpg'),
(43, 'mh@gmail.com', 'jhnbfgvdfsc', '75410', 'admin@admin.com', 'male', '2019-03-21', 'yjhtgfvdcs', '12345', '63395a342472eaae7bc883c29f8818ae.png'),
(44, 'test', '273/c East Nakhalpara, Tejgaon, Dhaka-1215', '188', 'anup12.m@gmail.com', 'male', '2019-04-03', 'Dhaka', '1234', '0d46b872872c4ba3f04cf0438ddef646.png');

-- --------------------------------------------------------

--
-- Table structure for table `studentup`
--

CREATE TABLE `studentup` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `guardian_email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentup`
--

INSERT INTO `studentup` (`id`, `username`, `password`, `email`, `guardian_email`, `first_name`, `surname`, `city`, `country`) VALUES
(1, 'Anup', '12345', 'anup12.m@gmail.com', 'wfkcon@gmail.com', 'Anup', 'Mondal', 'Dhaka', 'Bangladesh'),
(3, 'test', 'test1', 'test@test.com', 'guardian@gmail.com', 'test', 'test', 'dhaka', 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) NOT NULL,
  `cId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `details`, `photo`, `cId`) VALUES
(2, 'Physics', '', '', 2),
(3, 'Chemistry', '<p>dfa</p>\r\n', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL COMMENT 'asm,sale_admin,accounts,gm, wearhouse, super_admin',
  `status` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `photo`) VALUES
(1, 'Anup', 'anup12.m@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'developer', 'active', '2b75560dc78353b21d12790fd5211aba.jpg'),
(2, 'YouthFireIt', 'admin@youthfireit.com', 'd76e0b51934988fe4d45d413d5070971', '', 'active', '');

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
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
(29, 'mhsohel018@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sohel', '1', '2016-11-10 22:03:24', '0000-00-00 00:00:00', '', '10', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `course_cat`
--
ALTER TABLE `course_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentup`
--
ALTER TABLE `studentup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cId` (`cId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wsxq_admin`
--
ALTER TABLE `wsxq_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_cat`
--
ALTER TABLE `course_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `q_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `studentup`
--
ALTER TABLE `studentup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wsxq_admin`
--
ALTER TABLE `wsxq_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`std_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`cId`) REFERENCES `course_cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
