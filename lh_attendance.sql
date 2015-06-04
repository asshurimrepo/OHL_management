-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2013 at 11:57 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lh_attendance`
--

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

--
-- Dumping data for table `allowances`
--


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
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `AttendanceID` bigint(32) NOT NULL AUTO_INCREMENT,
  `EmpID` bigint(32) DEFAULT NULL,
  `TimeIn` time DEFAULT NULL,
  `TimeOut` time DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`AttendanceID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(19, 20, '04:39:42', '04:39:44', '2013-01-14');

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
(20, 21, 'elibo-on', 4, 'Elery Robert', 'Libo-on', 3, 'Male', 'ellibs07@gmail.com', '09053236469', '2012-11-21 15:53:44', '2012-11-28 04:20:55'),
(5, 6, 'ggevero', 2, 'Glenn', 'Gevero', 3, 'Male', 'geveroglenn@gmail.com', '09177040186', '2012-10-23 12:43:36', '2012-11-24 00:58:18'),
(8, 9, 'jedsk8', 3, 'Jed', 'Rosal', 2, 'Male', 'jed_rosal@gmail.com', '09162347485', '2012-10-26 22:00:35', '2012-10-30 22:23:00'),
(18, 19, 'euling', 1, 'Eula Rae', 'Libo-on', 4, 'Female', 'euling@email.com', '09179876543', '2012-10-30 16:30:41', '2012-11-27 12:21:52'),
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

--
-- Dumping data for table `expenses`
--


-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE IF NOT EXISTS `expense_type` (
  `TypeID` bigint(32) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expense_type`
--


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
(21, 'elibo-on', '525e81bc38139f37cb4981b3aa5a2c22', NULL),
(6, 'ggevero', 'a384b6463fc216a5f8ecb6670f86456a', NULL),
(9, 'jedsk8', '8a0a35fb6fa14a9938a63f4383266512', NULL),
(19, 'euling', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(17, 'fiatdyn10', 'f112176d70467c219504f20d88fd0f5c', NULL),
(12, 'nivektrio', '81dc9bdb52d04dc20036dbd8313ed055', NULL);
