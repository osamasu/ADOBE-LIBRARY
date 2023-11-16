-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 05:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adobelibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `bookname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `bookcode` varchar(20) CHARACTER SET latin1 NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 NOT NULL,
  `publisher` longtext CHARACTER SET latin1 NOT NULL,
  `stock` int(10) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookname`, `bookcode`, `author`, `publisher`, `stock`, `doc`) VALUES
(35, 'INTERAHTOS', 'UR2055', 'KHALID ALAWI', 'AHMED ALI', 5, '2023-11-14 20:29:13'),
(36, 'QURAN', 'UR2056', 'GOD', 'AbdulAziz Publishment', 20, '2023-11-14 20:30:24'),
(37, 'Catch Me If You Can', 'UR2057', 'Hobenz', 'KMV Library', 10, '2023-11-14 20:31:10'),
(38, 'FLONAH MANGA', 'UR2058', 'Krioku Kashiba', 'JP Studios', 3, '2023-11-14 20:34:03'),
(39, 'OPERATING SYSTEM ', 'UR2059', 'MALEK ALMAHMODI', 'AHMED JAMEEL', 10, '2023-11-14 20:34:59'),
(40, 'HEART ARCHITUCTURE', 'UR2060', 'HANA KASSEM', 'NOOR ROZA', 8, '2023-11-14 20:35:54'),
(41, 'C++', 'UR2061', 'OSAMA THABIT ', 'UST ', 3, '2023-11-14 20:36:36'),
(42, 'PHP', 'UR2062', 'AREG', 'UST', 100, '2023-11-14 20:55:06'),
(43, 'C#', 'UR2063', 'OSAMA THABIT ', 'MICROSOFT', 249, '2023-11-14 20:56:04'),
(44, 'ASP.NET', 'UR2064', 'OSAMA THABIT ', 'MICROSOFT', 29, '2023-11-14 20:56:50'),
(45, 'ACCOUNTANT FUNDEMENTALS', 'UR2065', 'ROWA AHMED', 'UST', 3, '2023-11-14 20:58:22'),
(46, 'MICATRONECS', 'UR2066', 'HANAN KHALID', 'UST', 5, '2023-11-14 20:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(10) NOT NULL,
  `Student_No` varchar(10) NOT NULL,
  `bookcode` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `Student_No`, `bookcode`, `status`, `doc`) VALUES
(28, 'ST1007', 'UR2063', 0, '2023-11-14 21:08:05'),
(29, 'ST1007', 'UR2064', 0, '2023-11-14 21:08:24'),
(30, 'ST1007', 'UR2063', 1, '2023-11-14 21:09:11'),
(31, 'ST1007', 'UR2064', 0, '2023-11-15 09:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `id` int(10) NOT NULL,
  `Student_No` varchar(10) NOT NULL,
  `bookcode` varchar(20) NOT NULL,
  `issue_date` varchar(15) NOT NULL,
  `fine` varchar(5) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`id`, `Student_No`, `bookcode`, `issue_date`, `fine`, `doc`) VALUES
(2, '1000 ', 'BK2114', '27-12-2021', '3', '2022-01-27 07:15:11'),
(3, '1000 ', 'BK2110', '27-01-2022', '48', '2022-03-14 06:37:24'),
(4, '1003 ', 'BK2101', '25-02-2022', '0', '2022-03-14 07:04:35'),
(5, '1001 ', 'BK2116', '08-02-2022', '99', '2022-04-12 05:00:14'),
(6, '1001 ', 'BK2120', '15-02-2022', '93', '2022-04-17 12:56:52'),
(7, '1005 ', 'BK2120', '27-10-2023', '0', '2023-11-09 12:30:46'),
(8, '1005 ', 'BK2116', '12-10-2023', '0', '2023-11-18 12:30:55'),
(9, 'ST1007 ', 'UR2051', '01-10-2023', '4200', '2023-11-14 18:16:22'),
(10, 'ST1007 ', 'UR2051', '14-11-2023', '0', '2023-11-14 18:44:53'),
(11, 'ST1007 ', 'UR2051', '14-11-2023', '0', '2023-11-14 18:45:20'),
(12, 'ST1007 ', 'UR2051', '14-11-2023', '0', '2023-11-14 18:45:32'),
(13, 'ST1007 ', 'UR2051', '14-11-2023', '0', '2023-11-14 18:46:07'),
(14, 'ST1007 ', 'UR2051', '14-11-2023', '0', '2023-11-14 18:46:39'),
(15, 'ST1007 ', 'BK2112', '14-11-2023', '0', '2023-11-14 18:48:06'),
(16, 'ST1007 ', 'BK2118', '14-11-2023', '0', '2023-11-14 18:49:48'),
(17, 'ST1007 ', 'BK2115', '14-11-2023', '0', '2023-11-14 19:03:44'),
(18, 'ST1007 ', 'BK2117', '14-11-2023', '0', '2023-11-14 19:23:24'),
(19, 'ST1007 ', 'UR2063', '15-11-2023', '0', '2023-11-14 21:08:48'),
(20, 'ST1007 ', 'UR2064', '15-11-2023', '0', '2023-11-15 09:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `Student_No` varchar(10) NOT NULL,
  `bookcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Student_No`, `bookcode`) VALUES
(1, '1017', 2067);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_No` varchar(10) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `Middlename` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `class` varchar(50) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_No`, `studentname`, `Middlename`, `LastName`, `gender`, `dob`, `mobile`, `image`, `class`, `doc`) VALUES
('ST1007', 'OSAMA', 'THABIT', 'MOHAMMED', 'male', '2003-11-29', '714668752', 'ST1007.jpg', 'Information Technology [ IT ]', '2023-11-13 19:41:02'),
('ST1013', 'THABIT', 'TAHER', 'ABDULLAH', 'male', '2023-11-18', '0540855825', 'ST1013.jpg', 'Accountant', '2023-11-13 20:17:28'),
('ST1015', 'AHMED', 'ALI', 'NASSER', 'male', '2003-02-12', '7759965555', 'ST1015.jpg', 'Computer Science [CS]', '2023-11-13 21:08:08'),
('ST1016', 'MLOKY', 'BRHOMY', 'MAHMODI', 'male', '2002-02-22', '7115154151', 'ST1016.jpg', 'Information Technology [IT]', '2023-11-15 09:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `UserID` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UserID`, `Password`, `doc`) VALUES
(1, 'Osamasu', '0000', '2022-01-27 18:34:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_No`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `return`
--
ALTER TABLE `return`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
