-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 08:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobinfo`
--

CREATE TABLE `jobinfo` (
  `bdid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobinfo`
--

INSERT INTO `jobinfo` (`bdid`, `fid`, `bg`) VALUES
(10, 1, 'Cleaning'),
(11, 1, 'Ploughing'),
(12, 4, 'Harvesting'),
(13, 4, 'Cleaning'),
(14, 5, 'Watering'),
(15, 5, 'Cleaning'),
(16, 5, 'Sowing'),
(17, 6, 'Ploughing'),
(19, 6, 'Cleaning'),
(20, 7, 'Watering'),
(23, 7, 'Ploughing'),
(26, 1, 'Sowing');

-- --------------------------------------------------------

--
-- Table structure for table `jobrequest`
--

CREATE TABLE `jobrequest` (
  `donoid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `bg` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `iteminfo`
--

CREATE TABLE `iteminfo` (
  `bid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iteminfo`
--

INSERT INTO `iteminfo` (`bid`, `fid`, `bg`) VALUES
(7, 1, 'Paddy'),
(8, 1, 'Maize'),
(12, 4, 'Corn'),
(13, 4, 'Millets'),
(14, 4, 'Paddy'),
(16, 5, 'Black Gram'),
(17, 5, 'Corn'),
(18, 5, 'Paddy'),
(20, 5, 'Jowar'),
(21, 6, 'Ragi'),
(22, 6, 'Paddy'),
(23, 6, 'Wheat'),
(24, 7, 'Wheat'),
(25, 7, 'Ragi'),
(26, 7, 'Bajra'),
(27, 7, 'Green Gram'),
(31, 1, 'Ragi');

-- --------------------------------------------------------

--
-- Table structure for table `itemrequest`
--

CREATE TABLE `itemrequest` (
  `reqid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bg` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `femail` varchar(100) NOT NULL,
  `fpassword` varchar(100) NOT NULL,
  `fphone` varchar(100) NOT NULL,
  `fcity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `fname`, `femail`, `fpassword`, `fphone`, `fcity`) VALUES
(1, 'Kumar', 'kumar@gmail.com', 'Kumar', '7865376358', 'Samalkota'),
(4, 'Sidarth', 'sidarth@gmail.com', 'Sidarth', '9898988909', 'Ballari'),
(5, 'Raju', 'raju@gmail.com', 'raju', '9704879248', 'Anakapalli'),
(6, 'Ramu', 'ramu@gmail.com', 'ramu', '8977513248', 'Srikakulam'),
(7, 'Kalyan', 'kalyan@gmail.com', 'Kalyan', '09441432567', 'Amaravathi');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `cphone` varchar(100) NOT NULL,
  `cbg` varchar(10) NOT NULL,
  `ccity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cname`, `cemail`, `cpassword`, `cphone`, `cbg`, `ccity`) VALUES
(1, 'Bhargavi', 'bhargavi@gmail.com', 'Bhargavi', '8875643456', 'Sowing', 'lucknow'),
(4, 'Satya', 'satya@gmail.com', 'xyz@47', '9902477355', 'Harvesting', 'Ballari'),
(5, 'Vara', 'vara@gmail.com', 'Vara', '9380073433', 'Ploughing', 'Tirupathi'),
(6, 'Jhansi', 'jhansi@gmail.com', 'Jhansi', '8106298053', 'Cleaning', 'Hyderabad'),
(7, 'Raju', 'raju@gmail.com', 'Raju', '9849492206', 'Watering', 'Bengaluru');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobinfo`
--
ALTER TABLE `jobinfo`
  ADD PRIMARY KEY (`bdid`),
  ADD KEY `jobinfo_ibfk_2` (`fid`);

--
-- Indexes for table `jobrequest`
--
ALTER TABLE `jobrequest`
  ADD PRIMARY KEY (`donoid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `iteminfo`
--
ALTER TABLE `iteminfo`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `itemrequest`
--
ALTER TABLE `itemrequest`
  ADD PRIMARY KEY (`reqid`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobinfo`
--
ALTER TABLE `jobinfo`
  MODIFY `bdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobrequest`
--
ALTER TABLE `jobrequest`
  MODIFY `donoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iteminfo`
--
ALTER TABLE `iteminfo`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `itemrequest`
--
ALTER TABLE `itemrequest`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobinfo`
--
ALTER TABLE `jobinfo`
  ADD CONSTRAINT `jobinfo_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `customers` (`id`);

--
-- Constraints for table `iteminfo`
--
ALTER TABLE `iteminfo`
  ADD CONSTRAINT `iteminfo_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `farmer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
