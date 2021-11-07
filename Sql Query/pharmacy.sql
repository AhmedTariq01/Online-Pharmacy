-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 12:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`) VALUES
(1, 'Rizwan Shabbir', 'Pakistan', 'Lahore'),
(2, 'Rizwana', 'Model town ', 'Lahore'),
(3, 'Hooria', 'Johar Town', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `cnic` int(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `doj` date NOT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `dob`, `address`, `cnic`, `phone`, `qualification`, `doj`, `salary`) VALUES
(3, 'omer', 'male', '1999-05-27', 'Mustafa Town, Lahore', 123456789, 987654321, 'BS', '2020-07-06', 60000),
(4, 'Rizwan', 'male', '1989-06-08', 'Kareem block, Lahore', 123456789, 590050064, 'BS', '2016-04-12', 10000),
(5, 'Maham', 'female', '1999-12-05', 'Lahore', 123456789, 68746874, 'BS', '2019-04-05', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Mg` varchar(50) NOT NULL,
  `Retail_Price` varchar(1000) NOT NULL,
  `Used_for` varchar(200) NOT NULL,
  `Side_Effects` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `Name`, `Mg`, `Retail_Price`, `Used_for`, `Side_Effects`) VALUES
(38, 'Aspirin', '2mg', '10', 'Fever', 'allergic'),
(39, 'Panadol', '500', '200', 'painkiller', 'stomach'),
(40, 'Panadol', '12', '254', 'nausea', 'skin'),
(41, 'Reham Khan', '1000', '2000', 'Imran Khan', 'Boht zyada');

-- --------------------------------------------------------

--
-- Table structure for table `po_details`
--

CREATE TABLE `po_details` (
  `mid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_details`
--

INSERT INTO `po_details` (`mid`, `pid`) VALUES
(38, 17),
(39, 18),
(40, 19),
(40, 20);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `pid` int(11) NOT NULL,
  `po_date` date NOT NULL,
  `toat_amount` varchar(200) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`pid`, `po_date`, `toat_amount`, `quantity`, `mid`) VALUES
(17, '2020-06-11', '5486', '14', 38),
(18, '2020-06-11', '1200', '1450', 39),
(19, '2020-06-11', '1200', '1450', 40),
(20, '2020-07-10', '4321', '65', 40);

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `so_id` int(11) NOT NULL,
  `Total_amount` int(11) NOT NULL,
  `quantity` int(30) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`so_id`, `Total_amount`, `quantity`, `cid`, `eid`) VALUES
(11, 670, 21, 1, 3),
(12, 8765, 654, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `so_details`
--

CREATE TABLE `so_details` (
  `so_id` int(11) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `so_details`
--

INSERT INTO `so_details` (`so_id`, `mid`) VALUES
(12, 40);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `phone`, `address`, `mid`) VALUES
(45, 'Omer Mehboob', '0322555225', 'umt hostel', 38),
(46, 'omer', '032176536', 'kunt', 39),
(47, 'Ahmed', '032545554', 'DHA lahore', 40),
(48, 'Humaima', '03336765432', 'London', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_details`
--
ALTER TABLE `po_details`
  ADD KEY `mid` (`mid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`so_id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `so_details`
--
ALTER TABLE `so_details`
  ADD KEY `mid` (`mid`),
  ADD KEY `so_id` (`so_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `po_details`
--
ALTER TABLE `po_details`
  ADD CONSTRAINT `po_details_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `po_details_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `purchaseorder` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD CONSTRAINT `purchaseorder_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `salesorder_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salesorder_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `so_details`
--
ALTER TABLE `so_details`
  ADD CONSTRAINT `so_details_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `so_details_ibfk_2` FOREIGN KEY (`so_id`) REFERENCES `salesorder` (`so_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `medicine` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
