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
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameID` int(11) NOT NULL,
  `teamAScore` int(11) NOT NULL,
  `teamBScore` int(11) NOT NULL,
  `teamAID` int(11) NOT NULL,
  `teamBID` int(11) NOT NULL,
  `isLive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameID`, `teamAScore`, `teamBScore`, `teamAID`, `teamBID`, `isLive`) VALUES
(1, 30, 23, 20, 11, 0),
(2, 28, 6, 17, 9, 0),
(3, 10, 20, 23, 32, 0),
(4, 20, 16, 31, 14, 1),
(5, 3, 23, 6, 26, 0),
(6, 24, 27, 5, 24, 1),
(7, 17, 35, 19, 21, 0),
(8, 20, 30, 30, 2, 1),
(9, 16, 30, 8, 7, 0),
(10, 16, 10, 4, 16, 0),
(11, 24, 13, 29, 28, 1),
(12, 20, 26, 22, 18, 0),
(13, 24, 27, 15, 1, 0),
(14, 14, 21, 10, 25, 1),
(15, 28, 31, 12, 27, 0),
(16, 16, 23, 13, 3, 0),
(1234, 2, 3, 1234, 3924, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameID`),
  ADD UNIQUE KEY `gameID` (`gameID`),
  ADD KEY `teamAID` (`teamAID`),
  ADD KEY `teamBID` (`teamBID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`teamAID`) REFERENCES `team` (`teamID`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`teamBID`) REFERENCES `team` (`teamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
