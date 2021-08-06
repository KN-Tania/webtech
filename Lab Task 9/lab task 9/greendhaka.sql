-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2021 at 04:21 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greendhaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `Admin_Name` varchar(70) NOT NULL,
  `Admin_Email` varchar(70) NOT NULL,
  `Admin_User_Name` varchar(70) NOT NULL,
  `Admin_Password` varchar(70) NOT NULL,
  `Admin_Dob` date NOT NULL,
  `Admin_Gender` varchar(70) NOT NULL,
  `Admin_Picture` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auditor_info`
--

DROP TABLE IF EXISTS `auditor_info`;
CREATE TABLE IF NOT EXISTS `auditor_info` (
  `Audi_Name` varchar(70) NOT NULL,
  `Audi_Email` varchar(70) NOT NULL,
  `Audi_User_Name` varchar(70) NOT NULL,
  `Audi_Password` varchar(70) NOT NULL,
  `Audi_Dob` date NOT NULL,
  `Audi_Gender` varchar(70) NOT NULL,
  `Audi_Picture` text,
  PRIMARY KEY (`Audi_User_Name`),
  UNIQUE KEY `Audi_User_Name` (`Audi_User_Name`),
  UNIQUE KEY `Audi_Email` (`Audi_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor_info`
--

INSERT INTO `auditor_info` (`Audi_Name`, `Audi_Email`, `Audi_User_Name`, `Audi_Password`, `Audi_Dob`, `Audi_Gender`, `Audi_Picture`) VALUES
('Kamrun Tania', 'tania@hotmail.com', 'tania', '6ea21082327bb6639672df569fab1780', '1998-08-11', 'female', 'tania.png');

-- --------------------------------------------------------

--
-- Table structure for table `complain_details`
--

DROP TABLE IF EXISTS `complain_details`;
CREATE TABLE IF NOT EXISTS `complain_details` (
  `User_Name` varchar(70) NOT NULL,
  `Complain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
CREATE TABLE IF NOT EXISTS `employee_info` (
  `Emp_Name` varchar(70) NOT NULL,
  `Emp_Email` varchar(70) NOT NULL,
  `Emp_User_Name` varchar(70) NOT NULL,
  `Emp_Password` varchar(70) NOT NULL,
  `Emp_Dob` date NOT NULL,
  `Emp_Gender` varchar(70) NOT NULL,
  `Emp_Picture` text,
  PRIMARY KEY (`Emp_User_Name`),
  UNIQUE KEY `Emp_User_Name` (`Emp_User_Name`),
  UNIQUE KEY `Emp_Email` (`Emp_Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_info`
--

DROP TABLE IF EXISTS `role_info`;
CREATE TABLE IF NOT EXISTS `role_info` (
  `User_Name` varchar(70) NOT NULL,
  `Role` varchar(70) NOT NULL,
  PRIMARY KEY (`User_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

DROP TABLE IF EXISTS `transaction_history`;
CREATE TABLE IF NOT EXISTS `transaction_history` (
  `User_Name` varchar(70) NOT NULL,
  `Ticket_Quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `Purchase_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL,
  `Balance` int(20) NOT NULL,
  `Picture` text,
  PRIMARY KEY (`User_Name`),
  UNIQUE KEY `Email` (`Email`),
  KEY `User_Name` (`User_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`, `Balance`, `Picture`) VALUES
('Arfanul Kabir', 'apurbo6@gmail.com', 'Apurbo123', 'Apurbo123', '1997-07-06', 'Male', 13, NULL),
('sdsdasdd', 'sdsdsadsd@cfgfgf.com', 'dfdcdcdcd', 'dcdcdcdcdcd', '2000-02-03', 'male', 7, NULL),
('Abbas', 'gachoo@gmail.com', 'gachoo123', 'gachoo123', '1997-07-07', 'Male', 20, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
