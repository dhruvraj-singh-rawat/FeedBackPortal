-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 03:09 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `privilage` int(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `privilage`, `email`) VALUES
(NULL, 'Dhruvraj', 1, '15uec022@lnmiit.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `year`, `faculty`, `department`) VALUES
(1, 'ECE-1', 1, 'Sandeep Saini', '2'),
(2, 'Mathematics 1 ', 1, 'Sunil Kumar Gautam', '4');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `department` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `year`, `department`) VALUES
(1, 'Sandeep Saini ', 1, '2'),
(2, 'Sunil Kumar Gautam', 1, '5'),
(3, 'Kapil Jainwal', 2, '2'),
(4, 'Deepak Nair', 3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `course_name` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `from_who` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `feedback` longtext NOT NULL,
  `ack_no` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`course_name`, `faculty`, `from_who`, `subject`, `feedback`, `ack_no`, `year`) VALUES
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', 'disco dancer59a2be626dbaa', ''),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2c429c97fc', '123422'),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2c449b75e8', '123422');

-- --------------------------------------------------------

--
-- Table structure for table `otp_temp`
--

CREATE TABLE `otp_temp` (
  `email` varchar(50) NOT NULL,
  `otp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
