-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2019 at 06:00 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `androidp_parisprivatecabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `destination` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `destination`) VALUES
(1, 'Charles De Gaulle Airport'),
(2, 'Beauvais Airport'),
(3, 'Orly Airport'),
(4, 'Paris'),
(5, 'Disneyland'),
(7, 'Gare du Nord'),
(8, 'Gare d\'Austerlitz'),
(9, 'Gare de Bercy'),
(10, 'Gare de Paris-Est'),
(11, 'Gare Montparnasse'),
(12, 'Gare Saint Lazarre'),
(13, 'Gare de Lyon');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `pickup` varchar(50) NOT NULL,
  `drop` varchar(50) NOT NULL,
  `standard_rate` varchar(10) NOT NULL,
  `feature_order` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `pickup`, `drop`, `standard_rate`, `feature_order`) VALUES
(1, 'Beauvais Airport', 'Charles De Gaulle Airport', '110', 9),
(2, 'Beauvais Airport', 'Disneyland', '120', 3),
(3, 'Beauvais Airport', 'Orly Airport', '135', 6),
(4, 'Beauvais Airport', 'Paris', '110', 8),
(5, 'Charles De Gaulle Airport', 'Disneyland', '60', 1),
(6, 'Charles De Gaulle Airport', 'Orly Airport', '85', 9),
(7, 'Charles De Gaulle Airport', 'Paris', '55', 5),
(8, 'Orly Airport', 'Disneyland', '65', 2),
(9, 'Disneyland', 'Paris', '70', 4),
(10, 'Orly Airport', 'Paris', '55', 7),
(11, 'Paris', 'Paris', '45', 9),
(12, 'Beauvais Airport', 'Charles De Gaulle Airport', '110', 9),
(13, 'Paris', 'La Valée Village -Outlet', '70', 4);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_new`
--

DROP TABLE IF EXISTS `reservation_new`;
CREATE TABLE IF NOT EXISTS `reservation_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `journeytype` varchar(10) NOT NULL,
  `passengers` varchar(5) NOT NULL,
  `j1pickup` varchar(30) NOT NULL,
  `j1pickupaddress` varchar(100) DEFAULT NULL,
  `j1pickupdate` varchar(12) NOT NULL,
  `j1pickuptime` varchar(10) NOT NULL,
  `j1flightno` varchar(10) DEFAULT NULL,
  `j1origin` varchar(20) DEFAULT NULL,
  `j1drop` varchar(30) DEFAULT NULL,
  `j1dropaddress` varchar(100) DEFAULT NULL,
  `j2pickup` varchar(30) DEFAULT NULL,
  `j2pickupaddress` varchar(100) DEFAULT NULL,
  `j2pickupdate` varchar(12) DEFAULT NULL,
  `j2pickuptime` varchar(10) DEFAULT NULL,
  `j2flightno` varchar(10) DEFAULT NULL,
  `j2origin` varchar(20) DEFAULT NULL,
  `j2drop` varchar(30) DEFAULT NULL,
  `j2dropaddress` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `extranotes` varchar(250) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `j1price` int(10) DEFAULT NULL,
  `j2price` int(10) DEFAULT NULL,
  `journey_status` varchar(20) DEFAULT NULL,
  `office_notes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
