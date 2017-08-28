-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2017 at 09:19 PM
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
  `year` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`course_name`, `faculty`, `from_who`, `subject`, `feedback`, `ack_no`, `year`, `id`) VALUES
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', 'disco dancer59a2be626dbaa', '', 1),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2c429c97fc', '123422', 2),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2c449b75e8', '123422', 3),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2cd3bb286f', '123422', 4),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2cd3ca2981', '123422', 5),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a2d4894dc84', '123422', 6),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a30dea35e3c', '123422', 7),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a30e644fc7b', '123422', 8),
('disco dancer', 'baba sehgal', 'upar wala', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a30ea28f650', '123422', 9),
('disco dancer', 'baba sehgal', '15uec022@lnmiit.ac.in', 'dance karoge', 'beusbfuiebf senfjefnenf', '59a30eeb72787', '123422', 10),
('disco dancer', 'baba sehgal', '15uec022@lnmiit.ac.in', 'dance karoge', 'beusbfuiebf senfjefnenf ', '59a463a88fc14', '123422', 11);

-- --------------------------------------------------------

--
-- Table structure for table `otp_temp`
--

CREATE TABLE `otp_temp` (
  `email` varchar(50) NOT NULL,
  `otp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_no` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `start_time` int(50) NOT NULL,
  `end_time` int(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`token_no`, `email`, `start_time`, `end_time`, `id`) VALUES
('f6b58b9ddf7e0c38', '15uec022@lnmiit.ac.in', 1503943261, 1503946861, 8);

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
