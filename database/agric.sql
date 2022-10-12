-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 12:52 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agric`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminfullname` varchar(50) NOT NULL,
  `adminusername` varchar(20) NOT NULL,
  `adminpassword` varchar(20) NOT NULL,
  `adminphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminfullname`, `adminusername`, `adminpassword`, `adminphone`) VALUES
(1, 'UWERA Chantal', 'admin', 'admin', '0789921100'),
(2, 'Ntwari Justin', 'admin2', 'admin2', '07859921100');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(10) NOT NULL,
  `OrderID` int(10) DEFAULT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `FarmerID` int(10) DEFAULT NULL,
  `customername` varchar(50) DEFAULT NULL,
  `customedistrict` varchar(50) DEFAULT NULL,
  `customesector` varchar(50) DEFAULT NULL,
  `customecell` varchar(50) DEFAULT NULL,
  `customevillage` varchar(50) DEFAULT NULL,
  `custometelephone` varchar(50) DEFAULT NULL,
  `customeidnumber` varchar(50) DEFAULT NULL,
  `orderCommodity` varchar(50) NOT NULL,
  `OrderUnittype` varchar(10) DEFAULT NULL,
  `OrderQuantity` int(20) DEFAULT NULL,
  `Totalamount` int(10) DEFAULT NULL,
  `orderDay` int(10) NOT NULL,
  `orderMonth` int(10) NOT NULL,
  `orderYear` int(10) NOT NULL,
  `orderChecked` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmerID` int(10) NOT NULL,
  `farmername` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sector` varchar(50) DEFAULT NULL,
  `cell` varchar(50) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `idnumber` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farmerupload`
--

CREATE TABLE `farmerupload` (
  `uploadID` int(10) NOT NULL,
  `productID` int(10) DEFAULT NULL,
  `farmerID` int(10) DEFAULT NULL,
  `unittype` varchar(50) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `priceperunit` int(20) DEFAULT NULL,
  `uploadday` int(4) DEFAULT NULL,
  `uploadmonth` int(4) DEFAULT NULL,
  `uploadyear` int(4) DEFAULT NULL,
  `prodchechecked` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodid` int(10) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `prodtype` varchar(50) NOT NULL,
  `prodimage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodid`, `prodname`, `prodtype`, `prodimage`) VALUES
(1, 'Carrots', 'Vegetables', 0x2e2e2f75706c6f6164732f30332e6a7067),
(2, 'Tomatoes', 'Vegetables', 0x2e2e2f75706c6f6164732f30342e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD KEY `xf` (`OrderID`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmerID`);

--
-- Indexes for table `farmerupload`
--
ALTER TABLE `farmerupload`
  ADD PRIMARY KEY (`uploadID`),
  ADD KEY `fk` (`productID`),
  ADD KEY `fk2` (`farmerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmerID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmerupload`
--
ALTER TABLE `farmerupload`
  MODIFY `uploadID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `xf` FOREIGN KEY (`OrderID`) REFERENCES `farmerupload` (`uploadID`);

--
-- Constraints for table `farmerupload`
--
ALTER TABLE `farmerupload`
  ADD CONSTRAINT `fk` FOREIGN KEY (`productID`) REFERENCES `product` (`prodid`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`farmerID`) REFERENCES `farmers` (`farmerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
