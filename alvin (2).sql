-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 03:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_order`
--

CREATE TABLE IF NOT EXISTS `approved_order` (
  `Approved_Order_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Approved_Order_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_division`
--

CREATE TABLE IF NOT EXISTS `company_division` (
  `Company_Division_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Division_Name` varchar(255) DEFAULT NULL,
  `Division_Description` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`Company_Division_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company_division`
--

INSERT INTO `company_division` (`Company_Division_Id`, `Division_Name`, `Division_Description`) VALUES
(1, 'COFI', 'COFI'),
(3, ' PHILFOOD', ' PHILFOOD'),
(5, 'FIBISCO', 'FIBISCO');

-- --------------------------------------------------------

--
-- Table structure for table `customer_product`
--

CREATE TABLE IF NOT EXISTS `customer_product` (
  `Customer_Product_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Product_Id` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `User_Id` bigint(20) DEFAULT NULL,
  `Customer_Order_Date` datetime DEFAULT NULL,
  `salesman_status_order` bigint(20) DEFAULT NULL,
  `admin_status_order` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Customer_Product_Id`),
  KEY `FK_Customer_Product_` (`salesman_status_order`),
  KEY `FK_Customer_Product_Order` (`admin_status_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `customer_product`
--

INSERT INTO `customer_product` (`Customer_Product_Id`, `Product_Id`, `Quantity`, `User_Id`, `Customer_Order_Date`, `salesman_status_order`, `admin_status_order`) VALUES
(23, 34, 2, 71, '2015-03-02 05:52:53', 2, 2),
(24, 34, 2, 71, '2015-03-02 06:21:48', 2, 2),
(25, 34, 2, 71, '2015-03-02 06:22:41', 2, 2),
(26, 34, 4, 71, '2015-03-02 06:24:36', 2, 2),
(27, 34, 4, 71, '2015-03-02 06:24:36', 2, 2),
(28, 35, 1, 71, '2015-03-02 09:39:30', 2, 2),
(29, 35, 3, 71, '2015-03-03 12:08:12', 2, 2),
(30, 42, 23, 67, '2015-03-03 17:43:49', 2, 2),
(31, 40, 4, 67, '2015-03-03 17:45:45', 2, 2),
(32, 42, 3, 71, '2015-03-03 18:13:51', 2, 2),
(33, 39, 6, 71, '2015-03-03 18:13:51', 2, 2),
(34, 40, 4, 71, '2015-03-03 18:13:51', 2, 2),
(35, 42, 4, 67, '2015-03-03 18:54:06', 4, 1),
(36, 39, 20, 71, '2015-03-04 02:39:57', 2, 2),
(37, 42, 30, 71, '2015-03-04 04:19:40', 2, 2),
(38, 39, 10, 71, '2015-03-04 04:19:40', 2, 2),
(39, 43, 23, 67, '2015-03-04 08:58:48', 1, 1),
(40, 40, 30, 67, '2015-03-04 08:58:48', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender_type`
--

CREATE TABLE IF NOT EXISTS `gender_type` (
  `gender_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender_type`
--

INSERT INTO `gender_type` (`gender_id`, `gender_name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `main_office`
--

CREATE TABLE IF NOT EXISTS `main_office` (
  `Company_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Middle_Initial` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Company_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `Order_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Order_Date` datetime DEFAULT NULL,
  `User_Id` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Total` bigint(20) DEFAULT NULL,
  `Product_Id` bigint(20) DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `FK_Order_` (`Product_Id`),
  KEY `FK_Order_User_Id` (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_Id`, `Order_Date`, `User_Id`, `Quantity`, `Price`, `Total`, `Product_Id`, `order_status`) VALUES
(64, '2015-03-04 09:08:36', 67, 30, NULL, 2970, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Product_Description` varchar(255) DEFAULT NULL,
  `Product_Name` varchar(225) DEFAULT NULL,
  `Price` bigint(20) DEFAULT NULL,
  `Company_Division_Id` bigint(20) DEFAULT NULL,
  `Customer_Id` bigint(20) DEFAULT NULL,
  `Quantity` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Product_Id`),
  KEY `FK_Product_` (`Customer_Id`),
  KEY `FK_Product_Division` (`Company_Division_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Description`, `Product_Name`, `Price`, `Company_Division_Id`, `Customer_Id`, `Quantity`) VALUES
(38, 'Cafe Puro in Utility Jar 100 grams', 'Cafe Puro', 80, 1, 71, 300),
(39, '6 pcs/bag', 'Roll-O-Nut', 29, 3, 71, 290),
(40, '24 pcs/box', 'Curly Tops', 16, 3, 71, 270),
(41, '12x500 grams', 'Soda Crackers, Plain', 99, 1, 71, 30),
(43, '100g ', 'Curly tops', 1000, 3, 71, 277),
(44, '100g ', 'Curly tops', 1000, 3, 71, 300);

-- --------------------------------------------------------

--
-- Table structure for table `salesman_status_order`
--

CREATE TABLE IF NOT EXISTS `salesman_status_order` (
  `salesman_status_order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `salesman_status_name` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`salesman_status_order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `salesman_status_order`
--

INSERT INTO `salesman_status_order` (`salesman_status_order_id`, `salesman_status_name`) VALUES
(1, 'pending'),
(2, 'confirmed'),
(3, 'cancelled'),
(4, 'Waiting for admin confirmation'),
(5, 'confirmation from client');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `User_type` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`User_Id`),
  KEY `fk_users_` (`User_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `Email`, `Password`, `Username`, `User_type`) VALUES
(67, 'adrivanrex@gmail.com', 'rexadrivan', 'adrivanrex', 1),
(68, 'test@test', 'test', 'test', 1),
(69, 'rexz@rrexz', 'rexz', 'rexz', 1),
(70, 'kat@gmail.com', 'kat', 'katrina', 1),
(71, 'salesman@gmail.com', 'salesman', 'salesman', 2),
(72, 'testing@testing', 'testing', 'testing', 1),
(73, 'alvin@gmail.com', 'alvin', 'alvin', 1),
(74, 'myaccount@gmail.com', 'myaccount', 'myaccount', 1),
(75, 'testing@test.com', 'testing', 'testing-last', 1),
(76, 'admin@gmail.com', 'admin', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `Customer_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `User_id` bigint(20) DEFAULT NULL,
  `Middle_Inital` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(255) DEFAULT NULL,
  `Company_Id` bigint(20) DEFAULT NULL,
  `Phone_Number` bigint(20) DEFAULT NULL,
  `Gender_Type` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Customer_Id`),
  KEY `FK_Customer_` (`User_id`),
  KEY `FK_Customer_Company_Id` (`Company_Id`),
  KEY `FK_Customer_Gender` (`Gender_Type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Customer_Id`, `First_Name`, `Last_Name`, `User_id`, `Middle_Inital`, `Address`, `Contact_Number`, `Company_Id`, `Phone_Number`, `Gender_Type`) VALUES
(11, 'Rex', 'Adrivan', 67, NULL, 'iligan', '09358661725', NULL, NULL, 1),
(12, 'test', 'test', 68, NULL, 'test', 'test', NULL, NULL, 1),
(13, 'rexz', 'rexz', 69, NULL, 'rexz', 'rexz', NULL, NULL, 1),
(14, 'Katrina', 'Diator', 70, NULL, 'iligan', '09358661725', NULL, NULL, 2),
(15, 'Salesman', 'salesman', 71, NULL, 'salesman', '09358661725', NULL, NULL, 1),
(16, 'testing', 'testing', 72, NULL, 'testing', 'testing', NULL, NULL, 1),
(17, 'alvin', 'alvin', 73, NULL, 'alvin', '23213123', NULL, NULL, 1),
(18, 'myaccount', 'myaccount', 74, NULL, 'balay', '123232131', NULL, NULL, 1),
(19, 'testing-last', 'testing-last', 75, NULL, 'none', '99999999', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `User_Type_Name` varchar(225) NOT NULL,
  PRIMARY KEY (`user_type_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_Id`, `User_Type_Name`) VALUES
(1, 'customer'),
(2, 'salesman'),
(3, 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `FK_Customer_Product_` FOREIGN KEY (`salesman_status_order`) REFERENCES `salesman_status_order` (`salesman_status_order_id`),
  ADD CONSTRAINT `FK_Customer_Product_Order` FOREIGN KEY (`admin_status_order`) REFERENCES `salesman_status_order` (`salesman_status_order_id`);

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_` FOREIGN KEY (`User_type`) REFERENCES `user_type` (`user_type_Id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `FK_Customer_` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_Id`),
  ADD CONSTRAINT `FK_Customer_Company_Id` FOREIGN KEY (`Company_Id`) REFERENCES `main_office` (`Company_Id`),
  ADD CONSTRAINT `FK_Customer_Gender` FOREIGN KEY (`Gender_Type`) REFERENCES `gender_type` (`gender_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
