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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userID` int(11) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(20) NOT NULL,
  `currencyAmount` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `salt` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `password`, `email`, `currencyAmount`, `username`, `firstName`, `lastName`, `middleName`, `age`, `salt`) VALUES
(29838, 'password', 'emailtestr@gmail.com', 394932, 'emailguy', 'Email', 'Man', NULL, 43, '12312312erwfr43f3r2'),
(30294, 'password', 'testman@gmail.com', 0, 'testman2011', 'Test', 'Man', NULL, 58, '1293819238129WI1293819'),
(94382, 'password', 'coolman@gmail.com', 20, 'coolman49', 'Cool', 'Man', 'Billy', 20, '912845jDF293339E3193'),
(130431, 'db5e6f6316882ec1', 'billyjoel@gmail.com', 10000, 'username5', 'Billy', 'Joel', '', 98, 'VxG3iFeozNTBKuP5'),
(139451, '563d8b75f52287fd', 'test@gmail.com', 10000, 'dood', 'dood', 'man', '', 20, 'Mz7AgUFEZQ29P1sZ'),
(204425, 'cda2c39a6bbdd3d3', 'tm@gmail.com', 10000, 'test5', 'jim', 'bobby', '', 39, 'WTutd3KRlrZ6o4U2'),
(274202, '51cdf3e44095162a', 'fireman@gmail.com', 10000, 'fireman', 'fire', 'man', '', 123, 'foDTa2FFbnB7310Q'),
(436314, '098f6bcd4621d373', 'prevgames@gmail.com', 9960, 'prevgames', 'Previous', 'Gamers', '', 12, 'zaFHh2jYsuAlfidt'),
(476495, '5a105e8b9d40e132', 'trilxs20@gmail.com', 9800, 'trilxs', 'Tam', 'Lu', '', 20, 'KU8rpw1i0kK1IMeK'),
(510668, '3eaf6c984c18d143', 'tamlu@gmail.com', 10000, 'tamm', 'tam', 'lu', '', 20, '0TgKgnJhFR2nQxtS'),
(978767, '098f6bcd4621d373', 'test@mail.com', 10000, 'test', 'test', 'test', '', 2, 'KwVlmov9U5/4xad5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
