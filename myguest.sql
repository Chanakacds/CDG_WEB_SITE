-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 13, 2019 at 11:56 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myguest`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Phonenumber` int(15) DEFAULT NULL,
  `pickupdate` date DEFAULT NULL,
  `pickuptime` time(6) NOT NULL,
  `Ordernote` varchar(200) NOT NULL,
  `Passanger` int(10) NOT NULL,
  `luggages` int(20) NOT NULL,
  `reservation` varchar(20) NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `firstname`, `lastname`, `email`, `Phonenumber`, `pickupdate`, `pickuptime`, `Ordernote`, `Passanger`, `luggages`, `reservation`, `subtotal`, `total`) VALUES
(1, '', '', NULL, NULL, NULL, '00:00:00.000000', '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `myguest`
--

DROP TABLE IF EXISTS `myguest`;
CREATE TABLE IF NOT EXISTS `myguest` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

DROP TABLE IF EXISTS `pricelist`;
CREATE TABLE IF NOT EXISTS `pricelist` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Location1` varchar(255) DEFAULT NULL,
  `Location2` varchar(255) DEFAULT NULL,
  `Passenger` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`Id`, `Location1`, `Location2`, `Passenger`, `Price`) VALUES
(1, 'CDG Airport', 'Paris', '3', '55'),
(2, 'CDG Airport', 'Paris', '4', '65'),
(4, 'CDG Airport', 'Paris', '5', '70'),
(5, 'CDG Airport', 'Paris', '6', '75'),
(6, 'CDG Airport', 'Paris', '7', '80'),
(7, 'CDG Airport', 'Paris', '8', '85'),
(8, 'CDG Airport', 'Paris', '9', '135'),
(9, 'CDG Airport', 'Paris', '10', '135'),
(10, 'CDG Airport', 'Paris', '11', '135'),
(11, 'CDG Airport', 'Paris', '12', '140'),
(12, 'CDG Airport', 'Paris', '13', '145'),
(13, 'CDG Airport', 'Paris', '14', '150'),
(14, 'CDG Airport', 'Paris', '15', '155'),
(15, 'CDG Airport', 'Paris', '16', '160'),
(16, 'CDG Airport', 'Paris', '17', '215'),
(17, 'CDG Airport', 'Paris', '18', '215'),
(18, 'CDG Airport', 'Paris', '19', '215'),
(19, 'CDG Airport', 'Paris', '20', '220'),
(20, 'CDG Airport', 'Paris', '21', '225'),
(21, 'CDG Airport', 'Paris', '22', '230'),
(22, 'CDG Airport', 'Paris', '23', '235'),
(23, 'CDG Airport', 'Paris', '24', '240'),
(24, 'Orly Airport', 'CDG Airport', '3', '85'),
(25, 'Orly Airport', 'CDG Airport', '4', '90'),
(26, 'Orly Airport', 'CDG Airport', '5', '95'),
(27, 'Orly Airport', 'CDG Airport', '6', '100'),
(28, 'Orly Airport', 'CDG Airport', '7', '105'),
(29, 'Orly Airport', 'CDG Airport', '8', '110'),
(151, 'CDG Airport', 'Disneyland', '5', '80'),
(46, 'Beauvais Airport', 'CDG Airport', '3', '110'),
(47, 'Beauvais Airport', 'CDG Airport', '4', '115'),
(48, 'Beauvais Airport', 'CDG Airport', '5', '120'),
(49, 'Beauvais Airport', 'CDG Airport', '6', '125'),
(50, 'Beauvais Airport', 'CDG Airport', '7', '130'),
(51, 'Beauvais Airport', 'CDG Airport', '8', '135'),
(52, 'Beauvais Airport', 'CDG Airport', '9', '245'),
(53, 'Beauvais Airport', 'CDG Airport', '10', '245'),
(54, 'Beauvais Airport', 'CDG Airport', '11', '245'),
(55, 'Beauvais Airport', 'CDG Airport', '12', '250'),
(56, 'Beauvais Airport', 'CDG Airport', '13', '255'),
(57, 'Beauvais Airport', 'CDG Airport', '14', '260'),
(58, 'Beauvais Airport', 'CDG Airport', '15', '265'),
(59, 'Beauvais Airport', 'CDG Airport', '16', '270'),
(60, 'Beauvais Airport', 'CDG Airport', '17', '380'),
(61, 'Beauvais Airport', 'CDG Airport', '18', '380'),
(62, 'Beauvais Airport', 'CDG Airport', '19', '380'),
(63, 'Beauvais Airport', 'CDG Airport', '20', '385'),
(152, 'CDG Airport', 'Disneyland', '6', '85'),
(176, 'Orly Airport', 'Disneyland', '13', '115'),
(175, 'Orly Airport', 'Disneyland', '12', '110'),
(174, 'Orly Airport', 'Disneyland', '11', '105'),
(173, 'Orly Airport', 'Disneyland', '10', '100'),
(172, 'Orly Airport', 'Disneyland', '9', '95'),
(171, 'Orly Airport', 'Disneyland', '8', '90'),
(170, 'Orly Airport', 'Disneyland', '7', '85'),
(169, 'Orly Airport', 'Disneyland', '6', '80'),
(168, 'Orly Airport', 'Disneyland', '5', '75'),
(167, 'Orly Airport', 'Disneyland', '4', '70'),
(166, 'CDG Airport', 'Disneyland', '20', '75'),
(165, 'CDG Airport', 'Disneyland', '19', '75'),
(164, 'CDG Airport', 'Disneyland', '18', '75'),
(163, 'CDG Airport', 'Disneyland', '17', '75'),
(162, 'CDG Airport', 'Disneyland', '16', '75'),
(161, 'CDG Airport', 'Disneyland', '15', '75'),
(160, 'CDG Airport', 'Disneyland', '14', '75'),
(159, 'CDG Airport', 'Disneyland', '13', '75'),
(158, 'CDG Airport', 'Disneyland', '12', '75'),
(157, 'CDG Airport', 'Disneyland', '11', '75'),
(156, 'CDG Airport', 'Disneyland', '10', '75'),
(155, 'CDG Airport', 'Disneyland', '9', '75'),
(112, 'Orly Airport', 'Paris', '3', '50'),
(154, 'CDG Airport', 'Disneyland', '8', '95'),
(153, 'CDG Airport', 'Disneyland', '7', '90'),
(150, 'CDG Airport', 'Disneyland', '4', '75'),
(120, 'Orly Airport', 'Paris', '10', '90'),
(119, 'Orly Airport', 'Paris', '9', '85'),
(118, 'Orly Airport', 'Paris', '8', '80'),
(117, 'Orly Airport', 'Paris', '7', '75'),
(116, 'Orly Airport', 'Paris', '6', '70'),
(115, 'Orly Airport', 'Paris', '5', '75'),
(114, 'Orly Airport', 'Paris', '4', '60'),
(113, 'Orly Airport', 'Paris', '3', '50'),
(149, 'CDG Airport', 'Disneyland', '3', '60'),
(121, 'Orly Airport', 'Paris', '11', '95'),
(122, 'Orly Airport', 'Paris', '12', '100'),
(123, 'Orly Airport', 'Paris', '13', '105'),
(124, 'Orly Airport', 'Paris', '14', '110'),
(125, 'Orly Airport', 'Paris', '15', '115'),
(126, 'Orly Airport', 'Paris', '16', '120'),
(127, 'Orly Airport', 'Paris', '17', '125'),
(128, 'Orly Airport', 'Paris', '18', '130'),
(129, 'Orly Airport', 'Paris', '19', '135'),
(130, 'Orly Airport', 'Paris', '20', '140'),
(131, 'Beauvais Airport', 'Paris', '3', '112'),
(132, 'Beauvais Airport', 'Paris', '4', '123'),
(133, 'Beauvais Airport', 'Paris', '5', '129'),
(134, 'Beauvais Airport', 'Paris', '6', '135'),
(135, 'Beauvais Airport', 'Paris', '7', '140'),
(136, 'Beauvais Airport', 'Paris', '8', '145'),
(137, 'Beauvais Airport', 'Paris', '9', '150'),
(138, 'Beauvais Airport', 'Paris', '10', '155'),
(139, 'Beauvais Airport', 'Paris', '11', '160'),
(140, 'Beauvais Airport', 'Paris', '12', '165'),
(141, 'Beauvais Airport', 'Paris', '13', '170'),
(142, 'Beauvais Airport', 'Paris', '14', '175'),
(143, 'Beauvais Airport', 'Paris', '15', '180'),
(144, 'Beauvais Airport', 'Paris', '16', '185'),
(145, 'Beauvais Airport', 'Paris', '17', '190'),
(146, 'Beauvais Airport', 'Paris', '18', '195'),
(147, 'Beauvais Airport', 'Paris', '19', '200'),
(148, 'Beauvais Airport', 'Paris', '20', '205'),
(177, 'Orly Airport', 'Disneyland', '14', '120'),
(178, 'Orly Airport', 'Disneyland', '15', '125'),
(179, 'Orly Airport', 'Disneyland', '16', '130'),
(180, 'Orly Airport', 'Disneyland', '17', '135'),
(181, 'Orly Airport', 'Disneyland', '18', '140'),
(182, 'Orly Airport', 'Disneyland', '19', '145'),
(183, 'Orly Airport', 'Disneyland', '20', '150'),
(184, 'Beauvais Airport', 'Disneyland', '3', '119'),
(185, 'Beauvais Airport', 'Disneyland', '4', '130'),
(186, 'Beauvais Airport', 'Disneyland', '5', '135'),
(187, 'Beauvais Airport', 'Disneyland', '6', '140'),
(188, 'Beauvais Airport', 'Disneyland', '7', '145'),
(189, 'Beauvais Airport', 'Disneyland', '8', '150'),
(190, 'Beauvais Airport', 'Disneyland', '9', '155'),
(191, 'Beauvais Airport', 'Disneyland', '10', '160'),
(192, 'Beauvais Airport', 'Disneyland', '11', '165'),
(193, 'Beauvais Airport', 'Disneyland', '12', '170'),
(194, 'Beauvais Airport', 'Disneyland', '13', '175'),
(195, 'Beauvais Airport', 'Disneyland', '14', '180'),
(196, 'Beauvais Airport', 'Disneyland', '15', '185'),
(197, 'Beauvais Airport', 'Disneyland', '16', '190'),
(198, 'Beauvais Airport', 'Disneyland', '17', '195'),
(199, 'Beauvais Airport', 'Disneyland', '18', '200'),
(200, 'Beauvais Airport', 'Disneyland', '19', '205'),
(201, 'Beauvais Airport', 'Disneyland', '20', '210'),
(202, 'Paris', 'Disneyland', '3', '70'),
(203, 'Paris', 'Disneyland', '4', '80'),
(204, 'Paris', 'Disneyland', '5', '85'),
(205, 'Paris', 'Disneyland', '6', '90'),
(206, 'Paris', 'Disneyland', '7', '95'),
(207, 'Paris', 'Disneyland', '8', '95'),
(208, 'Paris', 'Disneyland', '9', '105'),
(209, 'Paris', 'Disneyland', '10', '110'),
(210, 'Paris', 'Disneyland', '11', '115'),
(211, 'Paris', 'Disneyland', '12', '120'),
(212, 'Paris', 'Disneyland', '13', '125'),
(213, 'Paris', 'Disneyland', '14', '130'),
(214, 'Paris', 'Disneyland', '15', '135'),
(215, 'Paris', 'Disneyland', '16', '140'),
(216, 'Paris', 'Disneyland', '17', '145'),
(217, 'Paris', 'Disneyland', '18', '150'),
(218, 'Paris', 'Disneyland', '19', '155'),
(219, 'Paris', 'Disneyland', '20', '210'),
(220, 'CDG Airport', 'Paris', '25', '295'),
(221, 'CDG Airport', 'Paris', '26', '295'),
(222, 'CDG Airport', 'Paris', '27', '295'),
(223, 'CDG Airport', 'Paris', '28', '300'),
(224, 'CDG Airport', 'Paris', '29', '305'),
(225, 'CDG Airport', 'Paris', '30', '310'),
(226, 'Beauvais Airport', 'CDG Airport', '21', '390'),
(227, 'Beauvais Airport', 'CDG Airport', '22', '395'),
(228, 'Beauvais Airport', 'CDG Airport', '23', '400'),
(229, 'Beauvais Airport', 'CDG Airport', '24', '405'),
(230, 'Beauvais Airport', 'CDG Airport', '25', '515'),
(231, 'Beauvais Airport', 'CDG Airport', '26', '515'),
(232, 'Beauvais Airport', 'CDG Airport', '27', '515'),
(233, 'Beauvais Airport', 'CDG Airport', '28', '520'),
(234, 'Beauvais Airport', 'CDG Airport', '29', '525'),
(235, 'Beauvais Airport', 'CDG Airport', '30', '530'),
(236, 'Orly Airport', 'CDG Airport', '9', '195'),
(237, 'Orly Airport', 'CDG Airport', '10', '195'),
(238, 'Orly Airport', 'CDG Airport', '11', '195'),
(239, 'Orly Airport', 'CDG Airport', '12', '200'),
(240, 'Orly Airport', 'CDG Airport', '13', '205'),
(241, 'Orly Airport', 'CDG Airport', '14', '210'),
(242, 'Orly Airport', 'CDG Airport', '15', '215'),
(243, 'Orly Airport', 'CDG Airport', '16', '220'),
(244, 'Orly Airport', 'CDG Airport', '17', '305'),
(245, 'Orly Airport', 'CDG Airport', '18', '305'),
(246, 'Orly Airport', 'CDG Airport', '19', '305'),
(247, 'Orly Airport', 'CDG Airport', '20', '310'),
(248, 'Orly Airport', 'CDG Airport', '21', '315'),
(249, 'Orly Airport', 'CDG Airport', '22', '320'),
(250, 'Orly Airport', 'CDG Airport', '23', '325'),
(251, 'Orly Airport', 'CDG Airport', '24', '330'),
(252, 'Orly Airport', 'CDG Airport', '25', '415'),
(253, 'Orly Airport', 'CDG Airport', '26', '415'),
(254, 'Orly Airport', 'CDG Airport', '27', '415'),
(255, 'Orly Airport', 'CDG Airport', '28', '420'),
(256, 'Orly Airport', 'CDG Airport', '29', '425'),
(257, 'Orly Airport', 'CDG Airport', '30', '430');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
