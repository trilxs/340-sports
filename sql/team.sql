-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Dec 05, 2017 at 07:47 PM
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
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL,
  `teamName` varchar(25) NOT NULL,
  `totalScore` int(11) NOT NULL,
  `userBetNum` int(11) DEFAULT NULL,
  `betMultiplier` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `teamName`, `totalScore`, `userBetNum`, `betMultiplier`) VALUES
(1, 'Arizona Cardinals', 251, 29838, '2.50'),
(2, 'Atlanta Falcons', 321, 29838, '1.00'),
(3, 'Baltimore Ravens', 185, 29838, '1.50'),
(4, 'Buffalo Bills', 215, 29838, '2.00'),
(5, 'Carolina Panthers', 215, 29838, '1.50'),
(6, 'Chicago Bears', 327, 29838, '1.50'),
(7, 'Cincinnati Bengals', 167, 29838, '2.50'),
(8, 'Cleveland Browns', 242, 29838, '2.50'),
(9, 'Dallas Cowboys', 220, 29838, '2.50'),
(10, 'Denver Broncos', 348, 29838, '2.50'),
(11, 'Detroit Lions', 246, 29838, '1.00'),
(12, 'Green Bay Packers', 326, 29838, '1.00'),
(13, 'Houston Texans', 233, 29838, '1.50'),
(14, 'Indianapolis Colts', 318, 29838, '1.00'),
(15, 'Jacksonville Jaguars', 313, 29838, '1.50'),
(16, 'Kansas City Chiefs', 177, 29838, '3.00'),
(17, 'Los Angeles Chargers', 322, 29838, '3.00'),
(18, 'Los Angeles Rams', 256, 29838, '2.50'),
(19, 'Miami Dolphins', 234, 29838, '2.50'),
(20, 'Minnesota Vikings', 249, 29838, '2.50'),
(21, 'New England Patriots', 347, 29838, '1.00'),
(22, 'New Orleans Saints', 323, 29838, '1.50'),
(23, 'New York Giants', 278, 29838, '3.00'),
(24, 'New York Jets', 184, 29838, '3.50'),
(25, 'Oakland Raiders', 284, 29838, '3.00'),
(26, 'Philadelphia Eagles', 350, 29838, '1.00'),
(27, 'Pittsburgh Steelers', 338, 29838, '2.50'),
(28, 'San Francisco 49ers', 118, 29838, '3.00'),
(29, 'Seattle Seahawks', 335, 29838, '2.00'),
(30, 'Tampa Bay Buccaneers', 220, 29838, '2.50'),
(31, 'Tennessee Titans', 206, 29838, '3.00'),
(32, 'Washington Redskins', 245, 29838, '3.00'),
(1234, 'Bobblers', 2, 2, '1.50'),
(3924, 'Fire Guys', 3, 1, '1.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`),
  ADD UNIQUE KEY `teamID` (`teamID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
