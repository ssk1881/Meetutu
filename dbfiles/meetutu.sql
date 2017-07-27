-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 12:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetutu`
--

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_users`
--

INSERT INTO `google_users` (`google_id`, `google_name`, `google_email`, `google_link`, `google_picture_link`) VALUES
('118127903305972677235', 'fantastic kid', 'sreekrishna1881@gmail.com', 'https://plus.google.com/118127903305972677235', 'https://lh3.googleusercontent.com/-4-TCwS3Ov5M/AAAAAAAAAAI/A');

-- --------------------------------------------------------

--
-- Table structure for table `learner_register`
--

CREATE TABLE `learner_register` (
  `sno` int(4) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `learn` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learner_register`
--

INSERT INTO `learner_register` (`sno`, `first_name`, `last_name`, `mobile_number`, `learn`, `email`, `password`) VALUES
(1, 'demo', 'demo', 256, 'demo', 'demo', 'demo'),
(2, 'sree', 'krishna', 8008763118, ',Ruby', 'sreekrishna1881@gmail.com', 'asdfg'),
(3, 'krrish', 'criss', 8080709631, ',Adobe photoshop', 'sree@gmail.com', '123456'),
(4, 'Manoj', 'Rockstar', 7807807801, ',Php', 'manoj@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sno` int(5) NOT NULL,
  `from_user` varchar(30) NOT NULL,
  `to_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sno`, `from_user`, `to_user`) VALUES
(1, 'sree@gmail.com', 'krish@gmail.com'),
(2, 'sree@gmail.com', 'sreekrishna1881@gmail.com'),
(3, 'sree@gmail.com', 'sree@gmail.com'),
(4, 'sreekrishna1881@gmail.com', 'manoj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teach_register`
--

CREATE TABLE `teach_register` (
  `sno` int(4) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile_number` bigint(15) NOT NULL,
  `teach` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach_register`
--

INSERT INTO `teach_register` (`sno`, `first_name`, `last_name`, `mobile_number`, `teach`, `email`, `password`) VALUES
(1, 'sree', 'krishna', 8008763118, '', 'sree@gmail.com', '123456'),
(2, 'sree', 'krishna', 8008763118, ',Ruby,Php', 'sreekrishna1881@gmail.com', '13690025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `google_users`
--
ALTER TABLE `google_users`
  ADD PRIMARY KEY (`google_id`);

--
-- Indexes for table `learner_register`
--
ALTER TABLE `learner_register`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `teach_register`
--
ALTER TABLE `teach_register`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `learner_register`
--
ALTER TABLE `learner_register`
  MODIFY `sno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
