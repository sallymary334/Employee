-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2021 at 08:54 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employeedb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `deptab`
--

CREATE TABLE IF NOT EXISTS `deptab` (
  `DepId` int(2) NOT NULL AUTO_INCREMENT,
  `DepName` varchar(20) NOT NULL,
  PRIMARY KEY (`DepId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `deptab`
--

INSERT INTO `deptab` (`DepId`, `DepName`) VALUES
(1, 'HR'),
(2, 'IT'),
(3, 'Sales'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `employeetab`
--

CREATE TABLE IF NOT EXISTS `employeetab` (
  `EmpCode` varchar(10) NOT NULL,
  `EmpName` varchar(40) NOT NULL,
  `DepCode` int(2) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `DateOfJoin` date DEFAULT NULL,
  PRIMARY KEY (`EmpCode`),
  KEY `DepCode` (`DepCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetab`
--

INSERT INTO `employeetab` (`EmpCode`, `EmpName`, `DepCode`, `DateOfBirth`, `DateOfJoin`) VALUES
('760', 'Ziz', 2, '1989-02-20', '2020-03-01'),
('761', 'Yiz', 2, '1989-03-20', '2020-03-01'),
('762', 'Xiz', 2, '1989-02-20', '2020-03-01'),
('763', 'Eai', 2, '1989-02-20', '2020-03-01'),
('764', 'Fai', 2, '1989-03-20', '2020-03-01'),
('765', 'Gai', 2, '1989-02-20', '2020-03-01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeetab`
--
ALTER TABLE `employeetab`
  ADD CONSTRAINT `employeetab_ibfk_1` FOREIGN KEY (`DepCode`) REFERENCES `deptab` (`DepId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
