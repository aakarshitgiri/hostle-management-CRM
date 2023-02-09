-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 07:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel-cmr`
--

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `ID` int(11) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `roomno` varchar(10) NOT NULL,
  `seatno` varchar(10) NOT NULL,
  `seattype` varchar(10) NOT NULL,
  `roomtype` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`ID`, `floor`, `roomno`, `seatno`, `seattype`, `roomtype`, `status`) VALUES
(8, '1', '101', '101A', 'Double', 'AC', 'Filled'),
(9, '1', '101', '101B', 'Double', 'AC', 'Vacant'),
(10, '1', '102', '102A', 'Single', 'Non-AC', 'Vacant'),
(11, '2', '201', '201A', 'Triple', 'AC', 'Vacant'),
(12, '2', '201', '201B', 'Triple', 'AC', 'Vacant'),
(13, '2', '201', '201C', 'Triple', 'AC', 'Vacant'),
(14, '3', '301', '301A', 'Single', 'Non-AC', 'Vacant'),
(15, '3', '302', '302A', 'Single', 'AC', 'Vacant'),
(16, '4', '401', '401A', 'Double', 'Non-AC', 'Vacant'),
(17, '4', '401', '401B', 'Double', 'Non-AC', 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `Registration` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `seatno` varchar(10) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `pendingr` varchar(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `recorddate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`ID`, `Registration`, `Name`, `seatno`, `rent`, `pendingr`, `year`, `month`, `status`, `date`, `recorddate`) VALUES
(5, 1002, 'Aakarshit', '101B', '7000', '0', '2021', 'July', 'Inactive', '29/07/2021', '2021-07-29'),
(6, 1001, 'Aakarshit', '101A', '7000', '0', '2021', 'July', 'Active', '30/07/2021', '2021-07-30');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Registration` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `Scontact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `Fcontact` varchar(20) NOT NULL,
  `Lgaurdian` varchar(30) NOT NULL,
  `Lcontact` varchar(20) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `study` varchar(30) NOT NULL,
  `institute` varchar(40) NOT NULL,
  `adhar` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `roomtype` varchar(20) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `seattype` varchar(10) NOT NULL,
  `roomno` varchar(20) NOT NULL,
  `seatno` varchar(10) NOT NULL,
  `Rent` varchar(10) NOT NULL,
  `Security` varchar(10) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `rentstatus` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `recorddate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `Registration`, `Name`, `fname`, `Scontact`, `email`, `whatsapp`, `Fcontact`, `Lgaurdian`, `Lcontact`, `occupation`, `study`, `institute`, `adhar`, `dob`, `address`, `img`, `roomtype`, `floor`, `seattype`, `roomno`, `seatno`, `Rent`, `Security`, `Date`, `status`, `rentstatus`, `recorddate`) VALUES
(11, 1001, 'Aakarshit Giri', 'Om Prakash Giri', '1234567890', 'aakarshitgiri1998@bbdec.ac.in', '7081543730', '1234567890', 'a', '1234567890', 'a', 'btech', 'bbd', '123456789123', '11/10/2000', 'bbd', 'Untitled design (13).png', 'AC', '1', 'Double', '101', '101A', '7000', '7000', '29/07/2021', 'Active', 'Paid', '2021-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'admin', 'd27b967c4d9a856790f8c72b50936087', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
