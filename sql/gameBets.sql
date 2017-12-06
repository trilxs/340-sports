-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Dec 05, 2017 at 07:48 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_leed3`
--

-- --------------------------------------------------------

--
-- Table structure for table `gameBets`
--

CREATE TABLE `gameBets` (
  `gameID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `teamID` int(11) NOT NULL,
  `betAmount` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gameBets`
--

INSERT INTO `gameBets` (`gameID`, `userID`, `teamID`, `betAmount`) VALUES
(1234, 30294, 1234, '123.12'),
(1234, 510668, 1234, '32.00'),
(4, 510668, 14, '40.00'),
(16, 436314, 13, '20.00'),
(10, 436314, 4, '30.00'),
(4, 436314, 31, '40.00'),
(4, 476495, 31, '200.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gameBets`
--
ALTER TABLE `gameBets`
  ADD KEY `userID` (`userID`),
  ADD KEY `teamID` (`teamID`),
  ADD KEY `gameID` (`gameID`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gameBets`
--
ALTER TABLE `gameBets`
  ADD CONSTRAINT `gameBets_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `game` (`gameID`),
  ADD CONSTRAINT `gameBets_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `accounts` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `gameBets_ibfk_3` FOREIGN KEY (`teamID`) REFERENCES `team` (`teamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
