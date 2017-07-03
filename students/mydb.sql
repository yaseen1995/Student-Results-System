-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 01:40 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_tb`
--

CREATE TABLE `students_tb` (
  `student_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `maths` int(5) NOT NULL,
  `english` int(5) NOT NULL,
  `science` int(5) NOT NULL,
  `avg_mark_all_tests` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_tb`
--

INSERT INTO `students_tb` (`student_id`, `name`, `maths`, `english`, `science`, `avg_mark_all_tests`) VALUES
(123, 'Yaseen Patel', 20, 40, 20, 27),
(124, 'Ben Smith', 70, 75, 50, 65),
(125, 'Joe Lee', 20, 25, 75, 40),
(126, 'Ashley Dillan', 75, 80, 65, 73);

-- --------------------------------------------------------

--
-- Table structure for table `total_tb`
--

CREATE TABLE `total_tb` (
  `class_avg_score` int(10) NOT NULL,
  `no_below_avg` int(10) NOT NULL,
  `avg_english_mark` int(10) NOT NULL,
  `avg_maths_mark` int(10) NOT NULL,
  `avg_science_mark` int(10) NOT NULL,
  `high_avg_mark` varchar(20) NOT NULL,
  `low_avg_mark` varchar(20) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_tb`
--

INSERT INTO `total_tb` (`class_avg_score`, `no_below_avg`, `avg_english_mark`, `avg_maths_mark`, `avg_science_mark`, `high_avg_mark`, `low_avg_mark`, `id`) VALUES
(27, 1, 40, 20, 20, 'Yaseen Patel', 'Yaseen Patel', 65),
(46, 1, 58, 45, 35, 'Ben Smith', 'Yaseen Patel', 66),
(44, 2, 47, 37, 48, 'Ben Smith', 'Yaseen Patel', 67),
(51, 2, 55, 46, 53, 'Ashley Dillan', 'Yaseen Patel', 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_tb`
--
ALTER TABLE `students_tb`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `total_tb`
--
ALTER TABLE `total_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_tb`
--
ALTER TABLE `students_tb`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `total_tb`
--
ALTER TABLE `total_tb`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
