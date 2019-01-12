-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 10:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbecalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cevent`
--

CREATE TABLE `cevent` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `sdate` datetime NOT NULL,
  `edate` datetime NOT NULL,
  `alldayf` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cevent`
--

INSERT INTO `cevent` (`id`, `username`, `subject`, `comment`, `category`, `sdate`, `edate`, `alldayf`) VALUES
(1, 'ado', 'Cuti Tahunan', 'asdasdjwjkdhqjkwhdkqwhdqwudoiqwdjqoidjqwdjqwdjqwdqwdqwd', 'bg-info', '2018-12-03 00:00:00', '2018-12-07 00:00:00', ''),
(2, 'novita', 'Visit AIG', 'sdsadasd wdqwdqww', 'bg-warning', '2018-12-17 00:00:00', '2018-12-17 00:00:00', ''),
(3, 'ado', 'TEST', 'adasd', 'success', '2018-12-02 00:00:00', '2018-12-08 00:00:00', '1'),
(4, 'ado', 'asdasdasd', 'dasdasd', 'success', '2018-12-17 00:29:00', '2018-12-22 00:29:00', '0'),
(5, 'ado', 'TEst', 'asdasd', 'success', '2018-12-10 00:00:00', '2018-12-15 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sysrole`
--

CREATE TABLE `sysrole` (
  `idrole` varchar(2) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysrole`
--

INSERT INTO `sysrole` (`idrole`, `role`) VALUES
('0', 'superadmin'),
('1', 'supervisor'),
('2', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `sysrolemenu`
--

CREATE TABLE `sysrolemenu` (
  `role` varchar(2) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysrolemenu`
--

INSERT INTO `sysrolemenu` (`role`, `menu`) VALUES
('0', 'UAcc'),
('1', 'MCal'),
('2', 'MCal');

-- --------------------------------------------------------

--
-- Table structure for table `sysuser`
--

CREATE TABLE `sysuser` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(2) NOT NULL COMMENT 'see sysrole',
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sysuser`
--

INSERT INTO `sysuser` (`username`, `email`, `password`, `password_`, `cdate`, `role`, `fname`, `lname`, `status`) VALUES
('ado', 'fadho@care.co.id', '$2a$12$c/G8dWyEwljVapesAWD5X.yGRnXL9cxstoZo7v2QbotfCSD59nu2.', 'masuk', '2018-12-04 22:28:05', '2', 'Fadho''il', 'Pamuji', '1'),
('denny', 'denny@mail.com', '$2a$12$rJXYocsb6yKUQ5RloaJhfegMzgI24/yDW7dJwc8gbjyuo7GGkuxMC', 'masuk', '2018-12-05 02:22:34', '2', 'Denny', 'Martin', '1'),
('novita', '', '$2a$12$rJHZ0f6K3lG7rfKY.sqRPOamdVb2S8SDYrkNdu.xOjoNPMkVgkIqm', 'masuk', '2018-12-05 01:07:08', '2', 'Novita', 'Wulandari', '1'),
('superadmin', 'superadmin@mail.com', '$2a$12$0v4W2UwqCiBz6ZQ5AgNnUOwHqwiqywsw1YsrtH9Fxkin9FgUYJA1K', 'masuk', '2018-12-03 22:47:38', '0', 'Superadmin', '', '1'),
('willy', 'willy@care.co.id', '$2a$12$uK/m2OHugp8jHTGCbW4sLOSssbZcquKjrI0zMyS2rfrpNwlwcreQu', 'masuk', '2018-12-04 22:03:28', '1', 'Willy', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cevent`
--
ALTER TABLE `cevent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `sysrole`
--
ALTER TABLE `sysrole`
  ADD UNIQUE KEY `idrole_2` (`idrole`),
  ADD KEY `idrole` (`idrole`);

--
-- Indexes for table `sysrolemenu`
--
ALTER TABLE `sysrolemenu`
  ADD UNIQUE KEY `sysrolemenu_unique_key` (`role`,`menu`),
  ADD KEY `sysrolemenu_fk_1_idx` (`role`);

--
-- Indexes for table `sysuser`
--
ALTER TABLE `sysuser`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cevent`
--
ALTER TABLE `cevent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cevent`
--
ALTER TABLE `cevent`
  ADD CONSTRAINT `cevent_ibfk_1` FOREIGN KEY (`username`) REFERENCES `sysuser` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `sysrolemenu`
--
ALTER TABLE `sysrolemenu`
  ADD CONSTRAINT `sysrolemenu_fk_1` FOREIGN KEY (`role`) REFERENCES `sysrole` (`idrole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sysuser`
--
ALTER TABLE `sysuser`
  ADD CONSTRAINT `sysuser_ibfk_1` FOREIGN KEY (`role`) REFERENCES `sysrole` (`idrole`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
