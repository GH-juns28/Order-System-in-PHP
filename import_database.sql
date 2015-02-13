-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2015 at 07:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alvin_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_division`
--

CREATE TABLE IF NOT EXISTS `company_division` (
  `Company_Division_Id` bigint(20) NOT NULL,
  `Division_Name` varchar(255) DEFAULT NULL,
  `Division_Description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`Company_Division_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_division`
--

INSERT INTO `company_division` (`Company_Division_Id`, `Division_Name`, `Division_Description`) VALUES
(0, 'DOTA', 'Dota');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `User_id` bigint(20) DEFAULT NULL,
  `Middle_Inital` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Customer_Id`),
  KEY `FK_Customer_` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `Order_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `User_Id` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `Total_Price` bigint(20) DEFAULT NULL,
  `Product_Id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `FK_Order_` (`Product_Id`),
  KEY `FK_Order_User_Id` (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_Id`, `User_Id`, `Quantity`, `Total_Price`, `Product_Id`) VALUES
(42, 1, 0, 0, 32),
(43, 1, 23, 529, 32);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Product_Description` varchar(255) DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Customer_Id` bigint(20) DEFAULT NULL,
  `Company_Division_Id` bigint(20) DEFAULT NULL,
  `Product_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Product_Id`),
  KEY `FK_Product_` (`Customer_Id`),
  KEY `FK_Product_Division` (`Company_Division_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Description`, `Price`, `Customer_Id`, `Company_Division_Id`, `Product_Name`) VALUES
(32, 'rex', 23, 1, 0, 'rex'),
(33, 'be', 12, 1, 0, 'be'),
(34, 'rex', 12, 1, 0, 'rex'),
(35, 'rex', 2, 1, 0, 'rexxx'),
(36, 'rex', 21, 1, 0, 'rex'),
(37, '3', 2, 1, 0, '23'),
(38, '3', 2, 1, 0, '23'),
(39, 'asdasd', 0, 1, 0, 'asd'),
(40, 'rex', 23, 1, 0, 'rex');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Email`, `Password`, `Username`) VALUES
(1, 'a@a.com', 'a', 'a');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_Customer_` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_Order_` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`),
  ADD CONSTRAINT `FK_Order_User_Id` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_` FOREIGN KEY (`Customer_Id`) REFERENCES `users` (`User_Id`),
  ADD CONSTRAINT `FK_Product_Division` FOREIGN KEY (`Company_Division_Id`) REFERENCES `company_division` (`Company_Division_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
