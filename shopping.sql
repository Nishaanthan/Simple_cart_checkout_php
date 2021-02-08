-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 04, 2021 at 05:15 PM
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
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `b_id` int(20) NOT NULL,
  `b_title` varchar(20) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_title`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Sony'),
(4, 'LG'),
(5, 'Batterfly'),
(6, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `sl_no` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`sl_no`, `p_id`, `u_id`, `qty`) VALUES
(49, 4, -1, 1),
(50, 8, -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

DROP TABLE IF EXISTS `catagories`;
CREATE TABLE IF NOT EXISTS `catagories` (
  `cat_id` int(20) NOT NULL,
  `cat_title` varchar(40) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`) VALUES
(1, 'Phones'),
(2, 'Computers'),
(3, 'TV'),
(4, 'Radio');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_cat` varchar(30) NOT NULL,
  `p_brand` varchar(30) NOT NULL,
  `p_title` varchar(30) NOT NULL,
  `p_price` double NOT NULL,
  `p_desp` longtext,
  `p_img` varchar(40) NOT NULL,
  `p_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_cat`, `p_brand`, `p_title`, `p_price`, `p_desp`, `p_img`, `p_qty`) VALUES
(3, '1', '1', 'iphone 10', 120000, NULL, 'uploads/iphoneX.jpg', 3),
(4, '1', '1', 'iphone 7S', 90000, NULL, 'uploads/iphone7S.jpg', 4),
(5, '1', '3', 'iphone 5S', 50000, NULL, 'uploads/iphone5S.png', 3),
(8, '2', '1', 'Acer Laptop', 80000, NULL, 'uploads/acer.png', 10),
(9, '2', '2', 'HP Laptop', 90000, NULL, 'uploads/hp.jpg', 10),
(10, '3', '1', 'Singer 43 inch TV', 50000, NULL, 'uploads/43singer.jpg', 5),
(11, '3', '2', 'LG HD Tv', 55000, NULL, 'uploads/lg.jpg', 5),
(12, '4', '1', 'Yamaha Radio', 60000, NULL, 'uploads/yamaha.jpg', 5),
(13, '4', '1', 'JBL Radio', 10000, NULL, 'uploads/jbl.jpg', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
