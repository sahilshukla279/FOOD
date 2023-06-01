-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 07:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--
CREATE DATABASE IF NOT EXISTS `food` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `food`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

DROP TABLE IF EXISTS `admin_tb`;
CREATE TABLE `admin_tb` (
  `Email` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Confirm Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`Email`, `Password`,`Confirm Password`) VALUES
('admin@gmail.com', 'admin','admin');

-- --------------------------------------------------------

--
-- Table structure for table `donation_tb`
--

DROP TABLE IF EXISTS `donation_tb`;
CREATE TABLE `donation_tb` (
  `Dnid` int(11) NOT NULL,
  `Did` int(11) DEFAULT NULL,
  `First Name` varchar(50) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Address 1` varchar(50) NOT NULL,
  `Address 2` varchar(50) NOT NULL,
  `Town` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Pincode` int(7) NOT NULL,
  `Donation Type` varchar(50) NOT NULL,
  `Weight` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donor_tb`
--

DROP TABLE IF EXISTS `donor_tb`;
CREATE TABLE `donor_tb` (
  `Did` int(3) NOT NULL,
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone Number` int(13) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Confirm Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_tb`
--

INSERT INTO `donor_tb` (`Did`, `First Name`, `Last Name`, `Email`, `Phone Number`, `Password`, `Confirm Password`) VALUES
(1, 'Vivek', 'Gupta', 'vivek@gmail.com', 111, '111', '111'),
(2, 'Saahil', 'Shukla', 'sahilshukla279@gmail.com', 222, '222', '222'),
(3, 'Team', 'Food', 'foodofferingsandotherdonations@gmail.com', 333, 'food', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `reg_tb`
--

DROP TABLE IF EXISTS `reg_tb`;
CREATE TABLE `reg_tb` (
  `Rid` int(10) NOT NULL,
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `Address 1` varchar(30) NOT NULL,
  `Address 2` varchar(30) NOT NULL,
  `Town` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone Number` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_tb`
--

INSERT INTO `reg_tb` (`Rid`, `First Name`, `Last Name`, `Address 1`, `Address 2`, `Town`, `City`, `State`, `Pincode`, `Email`, `Phone Number`) VALUES
(1001, 'Ram', 'Sharma [Registered]', 'Ram mandir', 'On Babri Masjid', 'Ayodhya', 'Prayagraj', 'Uttar Pradesh', 500308, 'ram@gmail.com', 666),
(1002, 'Lakshman', 'Sharma [Registered]', 'Ram mandir', 'On Babri Masjid', 'Ayodhya', 'Prayagraj', 'Uttar Pradesh', 400070, 'lakshman@gmail.com', 222),
(1003, 'Sita', 'Janak [Registered]', '302', 'Underground', 'Mithila', 'Prayagraj', 'Uttar Pradesh', 400030, 'sita@gmail.com', 888),
(1004, 'Bharat', 'Sharma [Registered]', 'Ram mandir', 'On Babri Masjid', 'Ayodhya', 'Prayagraj', 'Uttar Pradesh', 400080, 'bharat@gmail.com', 777),
(1005, 'Shatrugan', 'Sharma [Registered]', 'Ram mandir', 'On Babri Masjid', 'Ayodhya', 'Prayagraj', 'Uttar Pradesh', 500080, 'shatrugan@gmail.com', 999);

-- --------------------------------------------------------

--
-- Table structure for table `vassign_tb`
--

DROP TABLE IF EXISTS `vassign_tb`;
CREATE TABLE `vassign_tb` (
  `Dnid` int(3) DEFAULT NULL,
  `Did` int(3) DEFAULT NULL,
  `Vid` int(3) DEFAULT NULL,
  `First Name` varchar(20) DEFAULT NULL,
  `Last Name` varchar(20) DEFAULT NULL,
  `Phone` int(13) DEFAULT NULL,
  `Address 1` varchar(30) DEFAULT NULL,
  `Address 2` varchar(30) DEFAULT NULL,
  `Town` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `State` varchar(20) DEFAULT NULL,
  `Pincode` int(10) DEFAULT NULL,
  `Donation Type` varchar(20) DEFAULT NULL,
  `Weight` int(5) DEFAULT NULL,
  `Task Assigned` varchar(10) DEFAULT NULL,
  `Received` varchar(10) DEFAULT NULL,
  `Donated` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vassign_tb`
--

INSERT INTO `vassign_tb` (`Dnid`, `Did`, `Vid`, `First Name`, `Last Name`, `Phone`, `Address 1`, `Address 2`, `Town`, `City`, `State`, `Pincode`, `Donation Type`, `Weight`, `Task Assigned`, `Received`, `Donated`) VALUES
(42, 1, 1, 'Zeel', 'Shetty', 111, 'address 1', 'address 2', 'lalbaug', 'Mumbai', 'Maharashtra', 400074, 'Food', 5, 'Accepted', 'Received', 'Donated'),
(45, 1, 1, 'Rahul', 'Sinha', 555, 'address 1', 'address 2', 'kalyan', 'Mumbai', 'Maharashtra', 400074, 'Food', 5, 'Accepted', 'Discard', '-'),
(49, 1, 1004, 'Aayush', 'Shetty', 222, 'address 1', 'address 2', 'kalyan', 'Mumbai', 'Maharashtra', 400082, 'Food', 5, 'Accepted', '-', '-'),
(50, 1, 1, 'Vivek', 'Gupta', 555, 'address 1', 'address 2', 'chembur', 'Mumbai', 'Maharashtra', 400074, 'Food', 5, 'Accepted', 'Received', '-'),
(51, 1, 1, 'Hemil', 'Tripathi', 888, 'address 1', 'address 2', 'kalyan', 'Mumbai', 'Maharashtra', 400074, 'Food', 5, 'Accepted', 'Received', 'Donated'),
(52, 1, 1, 'Saahil', 'Gupta', 888, 'address 1', 'address 2', 'chembur', 'Mumbai', 'Maharashtra', 400074, 'Food', 5, 'Accepted', 'Received', '-');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_tb`
--

DROP TABLE IF EXISTS `volunteer_tb`;
CREATE TABLE `volunteer_tb` (
  `Vid` int(3) NOT NULL,
  `First Name` varchar(20) NOT NULL,
  `Last Name` varchar(20) NOT NULL,
  `Address 1` varchar(30) NOT NULL,
  `Address 2` varchar(30) NOT NULL,
  `Town` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Pincode` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone Number` int(13) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Confirm Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer_tb`
--

INSERT INTO `volunteer_tb` (`Vid`, `First Name`, `Last Name`, `Address 1`, `Address 2`, `Town`, `City`, `State`, `Pincode`, `Email`, `Phone Number`, `Password`, `Confirm Password`) VALUES
(1, 'Vivek ', 'Gupta', '102', 'vasinaka', 'chembur', 'mumbai', 'Maharashtra', 400074, 'vivek@gmail.com', 111, '111', '111'),
(2, 'Saahil', 'Shukla', '201', 'shree sai leela', 'badlapur', 'mumbai', 'Maharashtra', 421503, 'sahilshukla279@gmail.com', 222, '222', '222'),
(3, 'Ananya', 'Tripathi', '201', 'Om tower', 'chembur', 'mumbai', 'Maharashtra', 400074, 'ananya@gmail.com', 333, '333', '333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation_tb`
--
ALTER TABLE `donation_tb`
  ADD PRIMARY KEY (`Dnid`);

--
-- Indexes for table `donor_tb`
--
ALTER TABLE `donor_tb`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `reg_tb`
--
ALTER TABLE `reg_tb`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `volunteer_tb`
--
ALTER TABLE `volunteer_tb`
  ADD PRIMARY KEY (`Vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation_tb`
--
ALTER TABLE `donation_tb`
  MODIFY `Dnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `donor_tb`
--
ALTER TABLE `donor_tb`
  MODIFY `Did` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reg_tb`
--
ALTER TABLE `reg_tb`
  MODIFY `Rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `volunteer_tb`
--
ALTER TABLE `volunteer_tb`
  MODIFY `Vid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
