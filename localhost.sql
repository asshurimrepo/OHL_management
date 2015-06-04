-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2013 at 03:38 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ohl_db`
--
CREATE DATABASE `ohl_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ohl_db`;

-- --------------------------------------------------------

--
-- Table structure for table `allowance_type`
--

CREATE TABLE IF NOT EXISTS `allowance_type` (
  `TypeID` bigint(32) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `allowance_type`
--

INSERT INTO `allowance_type` (`TypeID`, `TypeName`) VALUES
(1, 'Food'),
(2, 'Travel'),
(3, 'Housing');

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE IF NOT EXISTS `allowances` (
  `AllID` bigint(32) NOT NULL AUTO_INCREMENT,
  `EmpID` bigint(32) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `Type` bigint(32) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`AllID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `AttendanceID` bigint(32) NOT NULL AUTO_INCREMENT,
  `EmpID` bigint(32) DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`AttendanceID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`AttendanceID`, `EmpID`, `TimeIn`, `TimeOut`, `Date`) VALUES
(1, 1, '22:54:39', '23:59:59', '2012-10-23'),
(2, 5, '22:55:01', '23:59:59', '2012-10-23'),
(3, 1, '12:21:09', '19:51:29', '2012-10-24'),
(4, 1, '11:36:53', '23:59:59', '2012-10-25'),
(5, 1, '00:11:24', '00:43:51', '2012-10-28'),
(6, 1, '12:43:56', '15:15:49', '2012-11-01'),
(7, 1, '16:58:52', '23:59:59', '2012-11-02'),
(8, 18, '17:07:57', '23:59:59', '2012-11-02'),
(9, 1, '05:22:27', '05:22:29', '2012-11-03'),
(10, 18, '00:08:22', '00:08:23', '2012-11-04'),
(11, 1, '00:08:35', '00:08:36', '2012-11-04'),
(12, 1, '06:49:50', '06:49:50', '2012-11-05'),
(13, 1, '02:51:07', '02:53:16', '2012-11-06'),
(14, 1, '01:13:38', '07:41:12', '2012-11-09'),
(15, 1, '01:14:16', NULL, '2012-11-15'),
(16, 20, '22:46:33', '22:47:26', '2012-11-22'),
(17, 5, '08:57:21', '08:57:21', '2012-11-24'),
(18, 20, '12:18:33', '23:59:59', '2012-11-28'),
(19, 20, '04:39:42', '04:39:44', '2013-01-14'),
(20, 20, '02:37:12', '02:37:12', '2013-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_type`
--

CREATE TABLE IF NOT EXISTS `benefit_type` (
  `TypeID` bigint(32) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `benefit_type`
--

INSERT INTO `benefit_type` (`TypeID`, `TypeName`) VALUES
(1, 'SSS'),
(2, 'PhilHealth'),
(3, 'Pag-Ibig');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `BenID` bigint(32) NOT NULL AUTO_INCREMENT,
  `EmpID` bigint(32) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `Type` bigint(32) DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`BenID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`BenID`, `EmpID`, `Amount`, `Type`, `isActive`) VALUES
(1, 5, 100.00, 1, 1),
(3, 5, 200.00, 2, 1),
(4, 5, 150.00, 3, 1),
(5, 8, 100.00, 1, 1),
(6, 20, 100.00, 1, 1),
(7, 11, 150.00, 2, 1),
(8, 11, 120.00, 1, 1),
(9, 8, 120.00, 3, 1),
(10, 8, 120.00, 2, 1),
(11, 11, 500.00, 3, 1),
(12, 20, 150.00, 2, 1),
(13, 20, 120.00, 3, 1),
(22, 16, 220.00, 1, 1),
(23, 16, 123.00, 2, 1),
(24, 16, 456.00, 3, 1),
(25, 18, 150.00, 1, 1),
(26, 18, 312.00, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Address` longtext,
  `Contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `Name`, `Address`, `Contact`) VALUES
(1, 'Customer One', 'Tanjay City', '123456'),
(2, 'Customer Two', 'Bais City', '234567'),
(3, 'Customer Three', 'Bayawan City', '345678');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DepID` bigint(32) NOT NULL AUTO_INCREMENT,
  `DepName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DepID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepID`, `DepName`) VALUES
(1, 'Integration4Us'),
(2, 'PHPVelox'),
(3, 'Sim3Soft'),
(4, 'Template4Me'),
(5, 'W3Designing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `EmpID` bigint(32) NOT NULL AUTO_INCREMENT,
  `UserID` bigint(32) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `DepID` bigint(32) DEFAULT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `RateID` bigint(32) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `ContactNo` varchar(30) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateModified` datetime DEFAULT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpID`, `UserID`, `Username`, `DepID`, `FirstName`, `LastName`, `RateID`, `Gender`, `Email`, `ContactNo`, `DateCreated`, `DateModified`) VALUES
(5, 6, 'ggevero', 2, 'Glenn', 'Gevero', 3, 'Male', 'geveroglenn@gmail.com', '09177040186', '2012-10-23 12:43:36', '2012-11-24 00:58:18'),
(8, 9, 'jedsk8', 3, 'Jed', 'Rosal', 2, 'Male', 'jed_rosal@gmail.com', '09162347485', '2012-10-26 22:00:35', '2012-10-30 22:23:00'),
(11, 12, 'nivektrio', 4, 'Kevin', 'Tenorio', 3, 'Male', 'coders@template4me.com', '09177040185', '2012-10-29 15:37:15', '2012-10-29 15:37:15'),
(16, 17, 'fiatdyn10', 3, 'Marie Dyn', 'Carimat', 2, 'Female', 'sample@email.com', '09191234567', '2012-10-29 16:07:20', '2012-11-02 09:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `employee_rates`
--

CREATE TABLE IF NOT EXISTS `employee_rates` (
  `RateID` bigint(32) NOT NULL AUTO_INCREMENT,
  `Rate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`RateID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee_rates`
--

INSERT INTO `employee_rates` (`RateID`, `Rate`) VALUES
(1, 200.00),
(2, 250.00),
(3, 307.69),
(4, 384.61),
(5, 576.92);

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE IF NOT EXISTS `expense_type` (
  `TypeID` bigint(32) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `ExpID` bigint(32) NOT NULL AUTO_INCREMENT,
  `EmpID` bigint(32) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `Description` longtext,
  `Type` bigint(32) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`ExpID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt`
--

CREATE TABLE IF NOT EXISTS `tbl_receipt` (
  `RecordNumber` int(11) NOT NULL AUTO_INCREMENT,
  `Customer` int(11) NOT NULL,
  `Total_Items` double NOT NULL,
  `Grand_Total` double(10,2) NOT NULL,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`RecordNumber`),
  KEY `RecordNumber` (`RecordNumber`),
  KEY `RecordNumber_2` (`RecordNumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_receipt`
--

INSERT INTO `tbl_receipt` (`RecordNumber`, `Customer`, `Total_Items`, `Grand_Total`, `Date`) VALUES
(1, 1, 50, 64260.00, '2013-03-07 22:14:00'),
(2, 3, 4, 9890.00, '2013-03-08 11:08:41'),
(3, 1, 2, 18000.00, '2013-03-08 11:17:24'),
(4, 0, 12, 792.00, '2013-03-08 11:19:46'),
(5, 3, 20, 120000.00, '2013-03-08 11:22:11'),
(6, 1, 2, 1200.00, '2013-03-08 11:24:21'),
(7, 3, 4, 2800.00, '2013-03-08 17:06:59'),
(8, 1, 10, 30000.00, '2013-03-08 17:07:32'),
(9, 1, 2, 0.00, '2013-03-08 17:09:53'),
(10, 0, 2, 1600.00, '2013-03-08 17:43:48'),
(11, 2, 7, 9000.00, '2013-03-25 18:25:39'),
(12, 0, 8, 7200.00, '2013-03-25 18:27:07'),
(13, 3, 5, 30000.00, '2013-03-25 18:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt_rows`
--

CREATE TABLE IF NOT EXISTS `tbl_receipt_rows` (
  `RecordID` int(11) NOT NULL AUTO_INCREMENT,
  `RecordNumber` int(11) DEFAULT NULL,
  `Customer` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Quantity` double(10,2) DEFAULT NULL,
  `Unit` varchar(100) DEFAULT NULL,
  `Item` varchar(100) DEFAULT NULL,
  `UnitPrice` double(10,2) DEFAULT NULL,
  `Total` double(10,2) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`RecordID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=459 ;

--
-- Dumping data for table `tbl_receipt_rows`
--

INSERT INTO `tbl_receipt_rows` (`RecordID`, `RecordNumber`, `Customer`, `Address`, `Quantity`, `Unit`, `Item`, `UnitPrice`, `Total`, `Date`) VALUES
(435, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Silver Cup Premium', 1350.00, 6750.00, '2013-03-07 22:14:00'),
(434, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Silver Cup Premium', 1350.00, 6750.00, '2013-03-07 22:14:00'),
(433, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Silver Cup Premium', 1350.00, 6750.00, '2013-03-07 22:14:00'),
(432, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Silver Cup Premium', 1350.00, 6750.00, '2013-03-07 22:14:00'),
(431, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'King Star', 1250.00, 6250.00, '2013-03-07 22:14:00'),
(430, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'King Star', 1250.00, 6250.00, '2013-03-07 22:14:00'),
(429, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'King Star', 1250.00, 6250.00, '2013-03-07 22:14:00'),
(428, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Super Lugaw', 1234.00, 6170.00, '2013-03-07 22:14:00'),
(427, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Super Lugaw', 1234.00, 6170.00, '2013-03-07 22:14:00'),
(426, 1, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Super Lugaw', 1234.00, 6170.00, '2013-03-07 22:14:00'),
(436, 2, '3', 'Bayawan City', 2.00, 'Sack(s)', 'Super Lugaw', 445.00, 890.00, '2013-03-08 11:08:41'),
(437, 2, '3', 'Bayawan City', 2.00, 'Sack(s)', 'Silver Cup Premium', 4500.00, 9000.00, '2013-03-08 11:08:41'),
(438, 3, '1', 'Tanjay City', 2.00, 'Sack(s)', 'Silver Cup Premium', 9000.00, 18000.00, '2013-03-08 11:17:24'),
(439, 4, '', '', 3.00, 'Sack(s)', 'King Star', 66.00, 198.00, '2013-03-08 11:19:46'),
(440, 4, '', '', 3.00, 'Sack(s)', 'King Star', 66.00, 198.00, '2013-03-08 11:19:46'),
(441, 4, '', '', 3.00, 'Sack(s)', 'King Star', 66.00, 198.00, '2013-03-08 11:19:46'),
(442, 4, '', '', 3.00, 'Sack(s)', 'King Star', 66.00, 198.00, '2013-03-08 11:19:46'),
(443, 5, '3', 'Bayawan City', 10.00, 'Sack(s)', 'Silver Cup Premium', 6000.00, 60000.00, '2013-03-08 11:22:11'),
(444, 5, '3', 'Bayawan City', 10.00, 'Sack(s)', 'Silver Cup Premium', 6000.00, 60000.00, '2013-03-08 11:22:11'),
(445, 6, '1', 'Tanjay City', 2.00, 'Gallon(s)', 'Super Lugaw', 600.00, 1200.00, '2013-03-08 11:24:21'),
(446, 7, '3', 'Bayawan City', 2.00, 'Sack(s)', 'Super Lugaw', 700.00, 1400.00, '2013-03-08 17:06:59'),
(447, 7, '3', 'Bayawan City', 2.00, 'Sack(s)', 'Super Lugaw', 700.00, 1400.00, '2013-03-08 17:06:59'),
(448, 8, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Super Lugaw', 3000.00, 15000.00, '2013-03-08 17:07:32'),
(449, 8, '1', 'Tanjay City', 5.00, 'Sack(s)', 'Super Lugaw', 3000.00, 15000.00, '2013-03-08 17:07:32'),
(450, 9, '1', 'Tanjay City', 2.00, 'Sack(s)', 'King Star', 0.00, 0.00, '2013-03-08 17:09:53'),
(451, 10, '', '', 2.00, 'Sack(s)', 'Super Lugaw', 800.00, 1600.00, '2013-03-08 17:43:48'),
(452, 11, '2', 'Bais City', 2.00, 'Sack(s)', 'King Star', 2000.00, 4000.00, '2013-03-25 18:25:39'),
(453, 11, '2', 'Bais City', 5.00, 'Sack(s)', 'Silver Cup Premium', 1000.00, 5000.00, '2013-03-25 18:25:39'),
(454, 12, '', '', 2.00, 'Sack(s)', 'Super Lugaw', 900.00, 1800.00, '2013-03-25 18:27:07'),
(455, 12, '', '', 2.00, 'Sack(s)', 'Super Lugaw', 900.00, 1800.00, '2013-03-25 18:27:07'),
(456, 12, '', '', 2.00, 'Sack(s)', 'Super Lugaw', 900.00, 1800.00, '2013-03-25 18:27:07'),
(457, 13, '3', 'Bayawan City', 2.00, 'Sack(s)', 'Super Lugaw', 900.00, 1800.00, '2013-03-25 18:30:39'),
(458, 13, '3', 'Bayawan City', 3.00, 'Sack(s)', 'King Star', 9400.00, 28200.00, '2013-03-25 18:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `isAdmin`) VALUES
(1, 'admin', '9014c6d9f242e59307c675f8d0b191ae', 1),
(6, 'ggevero', 'a384b6463fc216a5f8ecb6670f86456a', NULL),
(9, 'jedsk8', '8a0a35fb6fa14a9938a63f4383266512', NULL),
(17, 'fiatdyn10', 'f112176d70467c219504f20d88fd0f5c', NULL),
(12, 'nivektrio', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
