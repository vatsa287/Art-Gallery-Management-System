-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2020 at 06:20 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `product`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getOrder`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getOrder` ()  select sum(product_price),count(order_id) from table_order$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

DROP TABLE IF EXISTS `table_admin`;
CREATE TABLE IF NOT EXISTS `table_admin` (
  `admin_Name` varchar(100) NOT NULL,
  `admin_Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `table_client`
--

DROP TABLE IF EXISTS `table_client`;
CREATE TABLE IF NOT EXISTS `table_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_Name` varchar(100) NOT NULL,
  `client_Email` varchar(100) NOT NULL,
  `client_Password` varchar(100) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Triggers `table_client`
--
DROP TRIGGER IF EXISTS `insertedUserTrigger`;
DELIMITER $$
CREATE TRIGGER `insertedUserTrigger` AFTER INSERT ON `table_client` FOR EACH ROW insert into user_log VALUES (null,NEW.client_id,'INSERTED',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

DROP TABLE IF EXISTS `table_order`;
CREATE TABLE IF NOT EXISTS `table_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_picture` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_name` (`product_name`),
  KEY `product_price` (`product_price`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `table_payement`
--

DROP TABLE IF EXISTS `table_payement`;
CREATE TABLE IF NOT EXISTS `table_payement` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(100) NOT NULL,
  `experience` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

DROP TABLE IF EXISTS `table_product`;
CREATE TABLE IF NOT EXISTS `table_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_picture` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
CREATE TABLE IF NOT EXISTS `user_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
