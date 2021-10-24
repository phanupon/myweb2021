-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2021 at 06:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(9) NOT NULL,
  `department` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `department`) VALUES
(1111, 'การตลาด'),
(2222, 'R&D'),
(3333, 'คลังสินค้า'),
(4444, 'บัญชีการเงิน');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(9) NOT NULL,
  `name` varchar(100) COLLATE utf8_thai_520_w2 NOT NULL,
  `job` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `departmentID` int(9) NOT NULL,
  `picture` varchar(50) COLLATE utf8_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`, `picture`) VALUES
(5555, 'นาย วัชระ น้อยศรี', '3333', '20000.00', 1111, 'm4.png'),
(5556, 'นาย วิชัย เจริญลาภ', '1111', '20000.00', 3333, 'm6.png'),
(5557, 'ภาณุภณ พสุชัยสกุล', '1111', '30000.00', 2222, 'm7.png'),
(5558, 'นายสำรวย ลืมคำ', '3333', '20000.00', 3333, 'm30.png'),
(5559, 'นางสาววิจิตรา สุทาศรี', '1111', '50000.00', 1111, 'w20.png'),
(5560, 'นายยส ชื่นมื่น', '3333', '40000.00', 3333, 'm10.png'),
(5561, 'นางสาววิจิตรา สุทาศรี', '3333', '20000.00', 4444, 'w10.png'),
(5562, 'นางโสภา ละครไชย', '1111', '30000.00', 4444, 'w3.png'),
(5563, 'ถามตอบQ&A', '1111', '20000.00', 1111, 'm2.png'),
(5564, 'นางโสภา ละครไชย', '1111', '30000.00', 3333, 'w4.png');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(10) NOT NULL,
  `job_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`) VALUES
(1111, 'ผู้จัดการ'),
(2222, 'รองผู้จัดการ'),
(3333, 'พนักงานลูกจ้าง'),
(4444, 'ลูกจ้างสัญญา');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('ADMIN','USER') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `email`, `Status`) VALUES
(001, 'wutthichai', 'wut1234', 'Wutthichai Sukkasem', '', 'USER'),
(002, 'phanupon', 'phanupon1234', 'Phanupon Phasuchaisakul', '', 'ADMIN'),
(003, 'admin', 'admin1234', 'admin', 'admin@gmail.com', 'USER'),
(005, 'root', 'user01', 'user01 userlastname', 'phanupon.p@gmail.com', 'USER'),
(006, 'user02', 'user02', 'user02', 'phanupon.p@gmail.com', 'USER'),
(007, 'user03', 'user03', 'user03', 'phanupon.p@gmail.com', 'USER'),
(008, 'user06', '29a4b79bd438555382de11012a82136e', 'user06', 'user06@mail.com', 'USER'),
(009, 'user10', '990d67a9f94696b1abe2dccf06900322', 'user10', 'user10@mail.com', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
