-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 10:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pranav`
--

-- --------------------------------------------------------

--
-- Table structure for table `devloper`
--

CREATE TABLE `devloper` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devloper`
--

INSERT INTO `devloper` (`id`, `fname`, `uname`, `pass`) VALUES
(1, 'Pranav', 'pr@n@v2004', '15042003');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `pass` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `fname`, `uname`, `pass`) VALUES
(1, 'Gyanganga Vidhyalaya', 'gyanganga', 1587),
(2, 'Akhandanand Vidhyalaya', 'akh', 1542),
(3, 'Maruti Vidhyalaya', 'm@ruti', 15487);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(200) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `standard` varchar(10) DEFAULT NULL,
  `mob` varchar(10) DEFAULT NULL,
  `cschool` varchar(200) DEFAULT NULL,
  `grno` int(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `marksheet1` varchar(40) DEFAULT NULL,
  `marksheet2` varchar(40) DEFAULT NULL,
  `marksheet3` varchar(40) DEFAULT NULL,
  `marksheet4` varchar(40) DEFAULT NULL,
  `marksheet5` varchar(40) DEFAULT NULL,
  `marksheet6` varchar(40) DEFAULT NULL,
  `marksheet7` varchar(40) DEFAULT NULL,
  `marksheet8` varchar(40) DEFAULT NULL,
  `marksheet9` varchar(40) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `mname`, `lname`, `standard`, `mob`, `cschool`, `grno`, `email`, `pname`, `marksheet1`, `marksheet2`, `marksheet3`, `marksheet4`, `marksheet5`, `marksheet6`, `marksheet7`, `marksheet8`, `marksheet9`, `uname`, `pass`) VALUES
(7, 'Pranav', 'Pramodbhai', 'Shinde', '10', '2147483647', 'Gyanganga vidhyalaya', 457, 'pranavshindevidhyadeep2526@gmail.com', 'school-boy-vector-illustration_38694-902.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', '9sheet.jpg', 'pranav', 'pranav2004'),
(8, 'smrutishikha', 'suresh', 'patra', '10', '2147483647', 'Gyanganga vidhyalaya', 875, 'smrutishikha@gmail.com', 'school-boy-vector-illustration_38694-902.jpg', '1sheet.jpg', '2sheet.jpg', '3sheet.jpg', '4sheet.jpg', '5sheet.jpg', '6sheet.jpg', '7sheet.jpg', '8sheet.jpg', '9sheet.jpg', 'smrutishikha', 'smrutishikha2003'),
(12, 'Jay', 'suresh', 'Raval', '10', '8547456528', 'Gyanganga vidhyalaya', 457, 'jay@gmail.com', 'school-boy-vector-illustration_38694-902.jpg', '1sheet.jpg', '2sheet.jpg', '3sheet.jpg', '4sheet.jpg', '5sheet.jpg', '6sheet.jpg', '7sheet.jpg', '8sheet.jpg', '9sheet.jpg', 'jayraval', 'jayraval2003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devloper`
--
ALTER TABLE `devloper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devloper`
--
ALTER TABLE `devloper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
