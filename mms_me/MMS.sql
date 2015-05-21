-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2013 at 09:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `empcode` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `address` text NOT NULL,
  `emailid` varchar(50) NOT NULL,
  PRIMARY KEY (`empcode`),
  UNIQUE KEY `username` (`username`,`phoneno`,`emailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `friday`
--

CREATE TABLE IF NOT EXISTS `friday` (
  `messid` int(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE IF NOT EXISTS `mess` (
  `messid` varchar(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE IF NOT EXISTS `misc` (
  `attribute` varchar(10) NOT NULL,
  `value` int(3) NOT NULL,
  PRIMARY KEY (`attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monday`
--

CREATE TABLE IF NOT EXISTS `monday` (
  `messid` varchar(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saturday`
--

CREATE TABLE IF NOT EXISTS `saturday` (
  `messid` int(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `rollno` varchar(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `hallno` int(1) NOT NULL,
  `roomno` varchar(5) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `mailid` varchar(30) NOT NULL,
  PRIMARY KEY (`rollno`),
  UNIQUE KEY `phoneno` (`phoneno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE IF NOT EXISTS `sunday` (
  `messid` varchar(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thursday`
--

CREATE TABLE IF NOT EXISTS `thursday` (
  `messid` int(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tuesday`
--

CREATE TABLE IF NOT EXISTS `tuesday` (
  `messid` varchar(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wednesday`
--

CREATE TABLE IF NOT EXISTS `wednesday` (
  `messid` int(6) NOT NULL,
  `breakfast` text NOT NULL,
  `lunch` text NOT NULL,
  `snacks` text NOT NULL,
  `dinner` text NOT NULL,
  `cost` int(5) NOT NULL,
  PRIMARY KEY (`messid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
