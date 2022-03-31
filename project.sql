-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 01:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `email`, `start_date`, `start_time`, `end_time`) VALUES
(6, 'work@gmail.com', '2022-03-15', '05:11:56', '00:00:00'),
(7, 'register@gmail.com', '2022-03-15', '05:16:33', '06:17:40'),
(8, 'register@gmail.com', '2022-04-11', '05:17:35', '00:00:00'),
(12, 'work@gmail.com', '2022-03-16', '03:36:33', '03:36:33'),
(13, 'register@gmail.com', '2022-03-16', '11:14:24', '11:14:24'),
(15, 'reshma.zeoner@gmail.com', '2022-03-17', '11:28:25', '11:28:44'),
(16, 'work@gmail.com', '2022-03-17', '11:51:00', '12:32:56'),
(17, 'register@gmail.com', '2022-03-17', '01:55:54', '01:58:47'),
(18, 'register@gmail.com', '2022-03-18', '11:35:05', '00:00:00'),
(19, 'rajakumari@gmail.com', '2022-03-18', '03:32:08', '03:32:28'),
(20, 'refer@gmail.com', '2022-03-19', '03:54:57', '03:55:38'),
(21, 'work@gmail.com', '2022-03-19', '05:29:50', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joining` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` double NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`email`, `date_of_birth`, `date_of_joining`, `gender`, `address`, `phone`, `id`) VALUES
('steve@gmail.com', '2022-03-17', '0000-00-00', 'Male', 'Palakad', 9988918828, 6),
('work@gmail.com', '2022-03-11', '2022-03-18', 'Female', 'test sample work address', 8282829204, 7),
('register@gmail.com', '2022-03-12', '2022-03-12', 'Male', 'Bangaloreunlimited', 9943361237, 8),
('reshma.zeoner@gmail.com', '1995-09-08', '2022-03-11', 'Female', 'Salem, Tamil Nadu', 9943361237, 9),
('rajakumari@gmail.com', '2000-02-18', '2022-03-09', 'Female', 'Palakkad, Kerala', 9494949393, 16),
('refer@gmail.com', '2022-03-26', '2022-03-11', 'Female', 'Palakad', 9988918828, 17);

-- --------------------------------------------------------

--
-- Table structure for table `leave_submit`
--

CREATE TABLE `leave_submit` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_submit`
--

INSERT INTO `leave_submit` (`id`, `email`, `start_date`, `end_date`, `total_days`, `reason`, `status`) VALUES
(41, 'work@gmail.com', '2022-03-12', '2022-03-12', 5, 'Eye test', 'Approved'),
(42, 'register@gmail.com', '2022-03-12', '2022-03-12', 1, 'Hospital checkup', 'Leave Applied'),
(43, 'register@gmail.com', '2022-03-17', '2022-03-17', 1, 'temple visit', 'Approved'),
(44, 'reshma.zeoner@gmail.com', '2022-03-26', '2022-03-26', 1, 'Need Break', 'Approved'),
(45, 'work@gmail.com', '2022-03-18', '2022-03-18', 1, 'Hospital checkup', 'Leave Applied'),
(47, 'rajakumari@gmail.com', '2022-03-12', '2022-03-12', 1, 'fever', 'Leave Applied'),
(48, 'rajakumari@gmail.com', '2022-03-05', '2022-03-05', 1, 'temple visit', 'Leave Applied'),
(51, 'refer@gmail.com', '2022-03-12', '2022-03-12', 1, 'Fever', 'Approved'),
(52, 'refer@gmail.com', '2022-03-05', '2022-03-12', 1, 'Hospital checkup', 'Leave Applied');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `role`) VALUES
(7, 'Reshma', 'priyareshu29@gmail.com', 'priya', 'Admin'),
(8, 'sample', 'sample@gmail.com', 'sample', 'Employee'),
(17, 'priya', 'steve@gmail.com', 'password', 'Employee'),
(19, 'work', 'work@gmail.com', 'work', 'Employee'),
(21, 'Register', 'register@gmail.com', 'register', 'Employee'),
(22, 'ReshmaRangaraj', 'reshma.zeoner@gmail.com', 'reshmazeoner', 'Employee'),
(36, 'Rajakumari', 'rajakumari@gmail.com', 'rajakumari', 'Employee'),
(37, 'refer', 'refer@gmail.com', 'refer', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_submit`
--
ALTER TABLE `leave_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `leave_submit`
--
ALTER TABLE `leave_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
