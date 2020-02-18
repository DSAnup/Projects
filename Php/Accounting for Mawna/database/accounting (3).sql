-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 11:17 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE IF NOT EXISTS `bank_deposit` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_deposit`
--

INSERT INTO `bank_deposit` (`id`, `date`, `amount`) VALUES
(1, '2018-09-09', '123');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
  `id` bigint(20) NOT NULL,
  `borrowerID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `cash` varchar(100) NOT NULL,
  `cheque` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `borrowerID`, `date`, `cash`, `cheque`) VALUES
(3, 2, '2018-09-09', '34', '3');

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE IF NOT EXISTS `borrower` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`id`, `name`, `address`, `phone`) VALUES
(2, 'Sohel', 'Dhaka', '01735254295');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_paid`
--

CREATE TABLE IF NOT EXISTS `borrow_paid` (
  `id` bigint(20) NOT NULL,
  `borrowerID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `cash` varchar(100) NOT NULL,
  `cheque` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_paid`
--

INSERT INTO `borrow_paid` (`id`, `borrowerID`, `date`, `cash`, `cheque`) VALUES
(2, 2, '2018-09-09', '23', '5');

-- --------------------------------------------------------

--
-- Table structure for table `dr_fee`
--

CREATE TABLE IF NOT EXISTS `dr_fee` (
  `id` bigint(20) NOT NULL,
  `drID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_fee`
--

INSERT INTO `dr_fee` (`id`, `drID`, `date`, `amount`, `patient`, `type`) VALUES
(1, 2, '2018-09-10', '150', 'Sohel Rana', 'np'),
(2, 2, '2018-09-10', '34', 'Habib', 'op'),
(3, 2, '2018-09-10', '32', 'ss', 'orcn');

-- --------------------------------------------------------

--
-- Table structure for table `dr_list`
--

CREATE TABLE IF NOT EXISTS `dr_list` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` text NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_list`
--

INSERT INTO `dr_list` (`id`, `name`, `designation`, `phone`) VALUES
(2, 'Dr. Aurun Kumer', 'sdfsf', '0128');

-- --------------------------------------------------------

--
-- Table structure for table `due_paid`
--

CREATE TABLE IF NOT EXISTS `due_paid` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `due_paid`
--

INSERT INTO `due_paid` (`id`, `date`, `amount`) VALUES
(1, '2018-09-08', '3');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` bigint(20) NOT NULL,
  `sub_categoryID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `due` varchar(50) NOT NULL,
  `cash` varchar(50) NOT NULL,
  `cheque` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `sub_categoryID`, `date`, `due`, `cash`, `cheque`, `deleted`, `deleted_by`, `updated_by`) VALUES
(3, 5, '2018-08-31', '', '120', '', 0, 0, 19),
(4, 5, '2018-09-09', '', '133', '7', 0, 0, 19),
(5, 18, '2018-09-09', '', '9', '3', 0, 0, 19),
(6, 14, '2018-09-09', '', '45', '', 0, 0, 19),
(7, 19, '2018-09-10', '', '12', '', 0, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE IF NOT EXISTS `expense_category` (
  `id` bigint(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `deleted`, `type`) VALUES
(3, 'Salary', '', 'bill'),
(4, 'Monthly Fixed Expense', '', 'bill'),
(5, 'General Expense', '', ''),
(6, 'Marketing Expense', '', ''),
(7, 'USG ', '', ''),
(8, 'Lab Accessories Expense', '', ''),
(9, 'President Honorium', '', 'bill'),
(10, 'Miscellaneous ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `expense_sub_category`
--

CREATE TABLE IF NOT EXISTS `expense_sub_category` (
  `id` bigint(20) NOT NULL,
  `categoryID` bigint(20) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `deleted` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_sub_category`
--

INSERT INTO `expense_sub_category` (`id`, `categoryID`, `sub_category`, `deleted`) VALUES
(3, 3, 'Advance(Salary)', ''),
(4, 3, 'NS &/or Bonus(Salary)', ''),
(5, 4, 'Electricity Bill', ''),
(6, 4, 'Gas Bill', ''),
(7, 4, 'Generator Bill', ''),
(8, 4, 'Dish Bill', ''),
(9, 4, 'House Rent ', ''),
(10, 4, 'Internet Bill', ''),
(11, 4, 'Paper Bill', ''),
(12, 4, 'Dirty Bill', ''),
(13, 8, 'LAE', ''),
(14, 7, 'Ultra Doctor Fee', ''),
(15, 6, 'ME', ''),
(16, 5, 'GE', ''),
(17, 9, 'BD/H(P)', ''),
(18, 10, 'Bank Deposit', ''),
(19, 10, 'Reciption cash expense', ''),
(20, 10, ' Manager Cash expense', '');

-- --------------------------------------------------------

--
-- Table structure for table `free_product`
--

CREATE TABLE IF NOT EXISTS `free_product` (
  `id` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `price` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `free_product`
--

INSERT INTO `free_product` (`id`, `productID`, `date`, `price`, `patient_name`, `address`, `invoice_id`, `qty`, `total`) VALUES
(3, 1, '2018-09-03', '385', 'sohel', 'dhaka', '1', 1, '385');

-- --------------------------------------------------------

--
-- Table structure for table `lab_reagent`
--

CREATE TABLE IF NOT EXISTS `lab_reagent` (
  `id` bigint(20) NOT NULL,
  `supplierID` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_reagent`
--

INSERT INTO `lab_reagent` (`id`, `supplierID`, `name`, `price`) VALUES
(2, 1, 'Test', '123');

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE IF NOT EXISTS `lend` (
  `id` bigint(20) NOT NULL,
  `personID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend`
--

INSERT INTO `lend` (`id`, `personID`, `date`, `amount`) VALUES
(2, 2, '2018-09-10', '100');

-- --------------------------------------------------------

--
-- Table structure for table `lend_person`
--

CREATE TABLE IF NOT EXISTS `lend_person` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend_person`
--

INSERT INTO `lend_person` (`id`, `name`, `address`, `phone`) VALUES
(2, 'Sohel', 'Dhaka', '018');

-- --------------------------------------------------------

--
-- Table structure for table `lend_return`
--

CREATE TABLE IF NOT EXISTS `lend_return` (
  `id` bigint(20) NOT NULL,
  `personID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend_return`
--

INSERT INTO `lend_return` (`id`, `personID`, `date`, `amount`) VALUES
(1, 2, '2018-09-09', '12');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_receive`
--

CREATE TABLE IF NOT EXISTS `medicine_receive` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_receive`
--

INSERT INTO `medicine_receive` (`id`, `date`, `amount`, `due`) VALUES
(2, '2018-09-09', '1245', '4');

-- --------------------------------------------------------

--
-- Table structure for table `out_lab_pathology`
--

CREATE TABLE IF NOT EXISTS `out_lab_pathology` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_lab_pathology`
--

INSERT INTO `out_lab_pathology` (`id`, `name`, `address`, `deleted`, `deleted_by`) VALUES
(1, 'Al-Hera Hospital	', 'Mawna, Gazipur, Dhaka', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `out_lab_payment`
--

CREATE TABLE IF NOT EXISTS `out_lab_payment` (
  `id` bigint(20) NOT NULL,
  `labID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `cash` varchar(100) NOT NULL,
  `cheque` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_lab_payment`
--

INSERT INTO `out_lab_payment` (`id`, `labID`, `date`, `cash`, `cheque`) VALUES
(1, 1, '2018-09-04', '15', '30'),
(3, 1, '2018-08-31', '0', '60');

-- --------------------------------------------------------

--
-- Table structure for table `out_lab_test`
--

CREATE TABLE IF NOT EXISTS `out_lab_test` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `testID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `labID` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_lab_test`
--

INSERT INTO `out_lab_test` (`id`, `invoice_id`, `testID`, `price`, `total`, `date`, `labID`) VALUES
(6, '1', 6, '100', '200', '2018-09-10', 1),
(7, '1', 5, '100', '200', '2018-09-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_cash_receive`
--

CREATE TABLE IF NOT EXISTS `pharmacy_cash_receive` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_cash_receive`
--

INSERT INTO `pharmacy_cash_receive` (`id`, `date`, `amount`) VALUES
(2, '2018-09-09', '1235');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(9) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL,
  `supplierID` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `profit`, `deleted`, `deleted_by`, `supplierID`) VALUES
(1, 'Maxsulin-30/70-100 10ml-syringe', 'A', '385', '65', 0, 0, 1),
(2, 'Book', 'B', '50', '5', 0, 0, 4),
(3, 'Glucose Pack', 'GP', '50', '5', 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE IF NOT EXISTS `product_purchase` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`id`, `invoice_id`, `productID`, `quantity`, `price`, `total`, `date`) VALUES
(1, '', 1, 2, '385', '770', '2018-08-31'),
(2, '', 1, 3, '385', '1155', '2018-08-31'),
(3, '', 1, 5, '385', '1925', '2018-09-02'),
(4, '', 1, 7, '385', '2695', '2018-09-09'),
(5, '', 1, 5, '385', '1925', '2018-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE IF NOT EXISTS `product_sale` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `consider` varchar(100) NOT NULL,
  `grand_total` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `due` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`id`, `invoice_id`, `customer_name`, `address`, `productID`, `price`, `qty`, `total`, `sub_total`, `discount`, `consider`, `grand_total`, `deleted`, `deleted_by`, `date`, `due`, `paid`) VALUES
(3, '3', 'fg', 'dfg', 1, '385', 1, '385', '385', 0, '0', '385', 0, 0, '2018-09-10', '85', '300'),
(4, '4', 'ss', 'ff', 3, '50', 3, '150', '150', 10, '5', '135', 0, 0, '2018-09-10', '35', '100'),
(5, '5', 'de', 'ff', 2, '50', 3, '150', '150', 15, '5', '130', 0, 0, '2018-09-10', '30', '100');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_sale_view`
--
CREATE TABLE IF NOT EXISTS `product_sale_view` (
`id` bigint(20)
,`invoice_id` varchar(100)
,`customer_name` varchar(100)
,`address` text
,`productID` bigint(20)
,`price` varchar(100)
,`qty` int(11)
,`total` varchar(100)
,`sub_total` varchar(100)
,`discount` int(11)
,`consider` varchar(100)
,`grand_total` varchar(100)
,`deleted` int(11)
,`deleted_by` bigint(20)
,`date` date
,`due` varchar(100)
,`paid` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `product_supplier`
--

CREATE TABLE IF NOT EXISTS `product_supplier` (
  `id` bigint(20) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_supplier`
--

INSERT INTO `product_supplier` (`id`, `supplier`, `deleted`, `deleted_by`) VALUES
(1, 'A Bio-Trade					', 0, 0),
(4, 'Miscellaneous ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reagent_purchase`
--

CREATE TABLE IF NOT EXISTS `reagent_purchase` (
  `id` bigint(20) NOT NULL,
  `reagentID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(12) NOT NULL,
  `total` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `supplierID` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reagent_purchase`
--

INSERT INTO `reagent_purchase` (`id`, `reagentID`, `price`, `quantity`, `total`, `date`, `supplierID`) VALUES
(4, 2, '123', '4', '492', '2018-09-10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reagent_sale`
--

CREATE TABLE IF NOT EXISTS `reagent_sale` (
  `id` bigint(20) NOT NULL,
  `reagentID` bigint(20) NOT NULL,
  `sold` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reagent_sale`
--

INSERT INTO `reagent_sale` (`id`, `reagentID`, `sold`, `date`) VALUES
(1, 1, '2', '2018-09-09'),
(2, 1, '3', '2018-09-09'),
(3, 1, '3', '2018-09-09'),
(4, 2, '1', '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `short_item_purchase`
--

CREATE TABLE IF NOT EXISTS `short_item_purchase` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment`
--

CREATE TABLE IF NOT EXISTS `supplier_payment` (
  `id` bigint(20) NOT NULL,
  `supplierID` bigint(20) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `cheque` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_payment`
--

INSERT INTO `supplier_payment` (`id`, `supplierID`, `cash`, `cheque`, `date`) VALUES
(2, 1, '2', '5', '2018-09-09'),
(3, 1, '400', '0', '2018-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `price`, `discount`, `deleted`, `deleted_by`) VALUES
(2, 'ECG', '100', 0, 0, 0),
(3, 'RF', '100', 0, 0, 0),
(4, 'USG', '100', 0, 0, 0),
(5, 'HbA1c', '100', 0, 0, 0),
(6, 'uMalb', '100', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_sale`
--

CREATE TABLE IF NOT EXISTS `test_sale` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `testID` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `consider` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `paid` varchar(100) NOT NULL,
  `due` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_sale`
--

INSERT INTO `test_sale` (`id`, `invoice_id`, `patient_name`, `address`, `phone`, `testID`, `price`, `sub_total`, `discount`, `consider`, `grand_total`, `deleted`, `deleted_by`, `updated_by`, `date`, `paid`, `due`) VALUES
(8, '2', 'sohel', 'Dhaka', '018', 6, 100, 200, 2, 6, 190, 0, 0, 0, '2018-08-31', '180', '10'),
(9, '2', 'sohel', 'Dhaka', '018', 2, 100, 200, 2, 6, 190, 0, 0, 0, '2018-08-31', '180', '10'),
(10, '3', 'sohel', 'Dhaka', '018', 6, 100, 200, 2, 6, 190, 0, 0, 0, '2018-08-31', '180', '10'),
(11, '3', 'sohel', 'Dhaka', '018', 2, 100, 200, 2, 6, 190, 0, 0, 0, '2018-08-31', '180', '10'),
(12, '4', 'sohel', 'Dhaka', '018', 6, 100, 200, 2, 6, 190, 1, 19, 0, '2018-08-31', '180', '10'),
(13, '4', 'sohel', 'Dhaka', '018', 2, 100, 200, 2, 6, 190, 1, 19, 0, '2018-08-31', '180', '10'),
(14, '5', 'Habib', 'Dhaka', '018', 6, 100, 100, 0, 0, 100, 0, 0, 0, '2018-09-09', '80', '20'),
(15, '6', 'Rana', 'Dhaka', '0174', 6, 100, 100, 2, 3, 95, 0, 0, 0, '2018-09-10', '5', '90');

-- --------------------------------------------------------

--
-- Stand-in structure for view `test_sale_view`
--
CREATE TABLE IF NOT EXISTS `test_sale_view` (
`id` bigint(20)
,`invoice_id` varchar(100)
,`patient_name` varchar(100)
,`address` text
,`phone` varchar(100)
,`testID` bigint(20)
,`price` int(11)
,`sub_total` int(11)
,`discount` int(11)
,`consider` int(11)
,`grand_total` int(11)
,`deleted` int(11)
,`deleted_by` int(11)
,`updated_by` int(11)
,`date` date
,`paid` varchar(100)
,`due` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL COMMENT 'asm,sale_admin,accounts,gm, wearhouse, super_admin',
  `status` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `photo`) VALUES
(18, 'sohel', 'mhsohel017@gmail.com', '12345', 'developer', 'active', ''),
(19, 'Morshed Habib', 'mhsohel018@gmail.com', '12345', 'manager', 'active', '78217e14f576f125653acb04fa769a81.jpg'),
(20, 'Super Admin', 'front@email.com', '12345', 'front', 'active', '3ebfa6f68a890b16b66743a7ec6efd58.jpg'),
(21, 'sujan', 'sujanacca11@gmail.com', 'sujan93274', '', 'active', 'b813cf84443e78884b69320531f203f6.jpg');

-- --------------------------------------------------------

--
-- Structure for view `product_sale_view`
--
DROP TABLE IF EXISTS `product_sale_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_sale_view` AS select `product_sale`.`id` AS `id`,`product_sale`.`invoice_id` AS `invoice_id`,`product_sale`.`customer_name` AS `customer_name`,`product_sale`.`address` AS `address`,`product_sale`.`productID` AS `productID`,`product_sale`.`price` AS `price`,`product_sale`.`qty` AS `qty`,`product_sale`.`total` AS `total`,`product_sale`.`sub_total` AS `sub_total`,`product_sale`.`discount` AS `discount`,`product_sale`.`consider` AS `consider`,`product_sale`.`grand_total` AS `grand_total`,`product_sale`.`deleted` AS `deleted`,`product_sale`.`deleted_by` AS `deleted_by`,`product_sale`.`date` AS `date`,`product_sale`.`due` AS `due`,`product_sale`.`paid` AS `paid` from `product_sale` group by `product_sale`.`invoice_id`;

-- --------------------------------------------------------

--
-- Structure for view `test_sale_view`
--
DROP TABLE IF EXISTS `test_sale_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `test_sale_view` AS select `test_sale`.`id` AS `id`,`test_sale`.`invoice_id` AS `invoice_id`,`test_sale`.`patient_name` AS `patient_name`,`test_sale`.`address` AS `address`,`test_sale`.`phone` AS `phone`,`test_sale`.`testID` AS `testID`,`test_sale`.`price` AS `price`,`test_sale`.`sub_total` AS `sub_total`,`test_sale`.`discount` AS `discount`,`test_sale`.`consider` AS `consider`,`test_sale`.`grand_total` AS `grand_total`,`test_sale`.`deleted` AS `deleted`,`test_sale`.`deleted_by` AS `deleted_by`,`test_sale`.`updated_by` AS `updated_by`,`test_sale`.`date` AS `date`,`test_sale`.`paid` AS `paid`,`test_sale`.`due` AS `due` from `test_sale` group by `test_sale`.`invoice_id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrow_paid`
--
ALTER TABLE `borrow_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dr_fee`
--
ALTER TABLE `dr_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dr_list`
--
ALTER TABLE `dr_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_paid`
--
ALTER TABLE `due_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categoryID` (`sub_categoryID`),
  ADD KEY `deleted_by` (`deleted_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_sub_category`
--
ALTER TABLE `expense_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `free_product`
--
ALTER TABLE `free_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_reagent`
--
ALTER TABLE `lab_reagent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplierID` (`supplierID`);

--
-- Indexes for table `lend`
--
ALTER TABLE `lend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend_person`
--
ALTER TABLE `lend_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lend_return`
--
ALTER TABLE `lend_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_receive`
--
ALTER TABLE `medicine_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_lab_pathology`
--
ALTER TABLE `out_lab_pathology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_lab_payment`
--
ALTER TABLE `out_lab_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labID` (`labID`);

--
-- Indexes for table `out_lab_test`
--
ALTER TABLE `out_lab_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labID` (`labID`);

--
-- Indexes for table `pharmacy_cash_receive`
--
ALTER TABLE `pharmacy_cash_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `product_supplier`
--
ALTER TABLE `product_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagent_purchase`
--
ALTER TABLE `reagent_purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reagentID` (`reagentID`),
  ADD KEY `supplierID` (`supplierID`);

--
-- Indexes for table `reagent_sale`
--
ALTER TABLE `reagent_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_item_purchase`
--
ALTER TABLE `short_item_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_sale`
--
ALTER TABLE `test_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `borrow_paid`
--
ALTER TABLE `borrow_paid`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dr_fee`
--
ALTER TABLE `dr_fee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dr_list`
--
ALTER TABLE `dr_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `due_paid`
--
ALTER TABLE `due_paid`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `expense_sub_category`
--
ALTER TABLE `expense_sub_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `free_product`
--
ALTER TABLE `free_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lab_reagent`
--
ALTER TABLE `lab_reagent`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lend`
--
ALTER TABLE `lend`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lend_person`
--
ALTER TABLE `lend_person`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lend_return`
--
ALTER TABLE `lend_return`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicine_receive`
--
ALTER TABLE `medicine_receive`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `out_lab_pathology`
--
ALTER TABLE `out_lab_pathology`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `out_lab_payment`
--
ALTER TABLE `out_lab_payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `out_lab_test`
--
ALTER TABLE `out_lab_test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pharmacy_cash_receive`
--
ALTER TABLE `pharmacy_cash_receive`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_supplier`
--
ALTER TABLE `product_supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reagent_purchase`
--
ALTER TABLE `reagent_purchase`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reagent_sale`
--
ALTER TABLE `reagent_sale`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `short_item_purchase`
--
ALTER TABLE `short_item_purchase`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier_payment`
--
ALTER TABLE `supplier_payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `test_sale`
--
ALTER TABLE `test_sale`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`sub_categoryID`) REFERENCES `expense_sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense_sub_category`
--
ALTER TABLE `expense_sub_category`
  ADD CONSTRAINT `expense_sub_category_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `expense_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab_reagent`
--
ALTER TABLE `lab_reagent`
  ADD CONSTRAINT `lab_reagent_ibfk_1` FOREIGN KEY (`supplierID`) REFERENCES `product_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_lab_payment`
--
ALTER TABLE `out_lab_payment`
  ADD CONSTRAINT `out_lab_payment_ibfk_1` FOREIGN KEY (`labID`) REFERENCES `out_lab_pathology` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD CONSTRAINT `product_sale_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reagent_purchase`
--
ALTER TABLE `reagent_purchase`
  ADD CONSTRAINT `reagent_purchase_ibfk_1` FOREIGN KEY (`reagentID`) REFERENCES `lab_reagent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
