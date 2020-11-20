-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 11:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newosms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_tb`
--

CREATE TABLE `admin_login_tb` (
  `a_id` int(60) NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_login_tb`
--

INSERT INTO `admin_login_tb` (`a_id`, `a_email`, `a_password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `pid` int(60) NOT NULL,
  `pname` varchar(60) COLLATE utf8_bin NOT NULL,
  `pdop` date NOT NULL,
  `pava` varchar(60) COLLATE utf8_bin NOT NULL,
  `ptotal` int(60) NOT NULL,
  `poriginalcost` int(60) NOT NULL,
  `psellingcost` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`) VALUES
(1, 'Mobile', '2020-08-11', '6', 10, 4000, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(100) NOT NULL,
  `request_id` int(100) NOT NULL,
  `request_info` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `request_desc` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_add1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_add2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_city` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_state` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_zip` int(100) DEFAULT NULL,
  `requester_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `requester_mobile` int(100) DEFAULT NULL,
  `assign_tech` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `assign_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`) VALUES
(11, 7, 'my device', 'lost from house', 'Sachin Singh', 'Nalagarh', 'Dattowal', 'Nalagarh', 'Himachal', 174101, 'sachin@gmail.com', 2147483647, 'Karan grovar', '2020-05-22'),
(12, 8, 'Internet not working', 'wire damage', 'Ravi', 'Baddi', 'Jharmajri', 'Baddi', 'HP', 1234, 'ravi@gmail.com', 123456789, 'Raja Singh', '2020-05-23'),
(13, 7, 'my device', 'lost from house', 'Sachin Singh', 'Nalagarh', 'Dattowal', 'Nalagarh', 'Himachal', 174101, 'sachin@gmail.com', 2147483647, 'Rajni Singh', '2020-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `custid` int(100) NOT NULL,
  `custname` varchar(100) COLLATE utf8_bin NOT NULL,
  `custadd` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpname` varchar(60) COLLATE utf8_bin NOT NULL,
  `cpquant` int(100) NOT NULL,
  `cpeach` int(60) NOT NULL,
  `cptotal` int(60) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`custid`, `custname`, `custadd`, `cpname`, `cpquant`, `cpeach`, `cptotal`, `cdate`) VALUES
(1, 'Ram Kumar', 'Baddi', 'Mobile', 4, 0, 2400, '2020-08-10'),
(2, 'Ram Kumar', 'Baddi', 'Mobile', 4, 0, 2400, '2020-08-10'),
(3, 'Nitish Kumar', 'Jharmajri', 'Mobile', 2, 6000, 12000, '2020-08-12'),
(4, 'Ravi Singh', 'Ramshehar', 'Mobile', 2, 6000, 12000, '2020-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_db`
--

CREATE TABLE `requesterlogin_db` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `r_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_db`
--

INSERT INTO `requesterlogin_db` (`r_login_id`, `r_name`, `r_email`, `r_password`) VALUES
(1, 'Ravi', 'ravi@gmail.com', '1234556'),
(3, 'Sonam ', 'sonam@gmail.com', '234567'),
(4, 'Ram', 'ram@gmail.com', '3456789'),
(5, 'dell', 'dell@gmail.com', '1234'),
(6, 'sikha', 'sikha@gmail.com', 'user'),
(7, 'sumit', 'sumit@gmail.com', 'sumit'),
(8, 'Ram', 'ram@gmail.com', 'ram');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `requester_id` int(100) NOT NULL,
  `request_info` text COLLATE utf8_bin NOT NULL,
  `request_desc` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_add1` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_add2` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_zip` int(100) NOT NULL,
  `requester_email` varchar(100) COLLATE utf8_bin NOT NULL,
  `requester_mobile` int(10) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`requester_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `request_date`) VALUES
(6, 'moblie', 'damage', 'Sachin Singh', 'Nalagarh', 'Dattowal', 'Nalagarh', 'Himachal', 174101, 'sachin@gmail.com', 2147483647, '2020-05-20'),
(7, 'my device', 'lost from house', 'Sachin Singh', 'Nalagarh', 'Dattowal', 'Nalagarh', 'Himachal', 174101, 'sachin@gmail.com', 2147483647, '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `empid` int(100) NOT NULL,
  `empName` varchar(100) COLLATE utf8_bin NOT NULL,
  `empCity` varchar(100) COLLATE utf8_bin NOT NULL,
  `empMobile` int(13) NOT NULL,
  `empEmail` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`empid`, `empName`, `empCity`, `empMobile`, `empEmail`) VALUES
(1, 'Ravi Kishi', 'Karnatka', 12344532, 'ravi@gmail.com'),
(2, 'Rampal', 'Chandigarh', 12334153, 'rampal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_tb`
--
ALTER TABLE `admin_login_tb`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `requesterlogin_db`
--
ALTER TABLE `requesterlogin_db`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`requester_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_tb`
--
ALTER TABLE `admin_login_tb`
  MODIFY `a_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `pid` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `custid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requesterlogin_db`
--
ALTER TABLE `requesterlogin_db`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `requester_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `empid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
