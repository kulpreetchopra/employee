-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.epizy.com
-- Generation Time: Sep 22, 2021 at 07:27 AM
-- Server version: 5.7.34-37
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26253946_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_leave`
--

CREATE TABLE `apply_leave` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `c_leave` int(11) NOT NULL,
  `e_leave` int(11) NOT NULL,
  `s_leave` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `reason` varchar(350) NOT NULL,
  `time` varchar(350) NOT NULL,
  `status` varchar(350) NOT NULL,
  `admin` varchar(350) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_leave`
--

INSERT INTO `apply_leave` (`id`, `name`, `email`, `c_leave`, `e_leave`, `s_leave`, `other`, `leave_from`, `leave_to`, `reason`, `time`, `status`, `admin`, `total`) VALUES
(2, 'Neha Bhadoria', 'neha@gmail.com', 1, 2, 0, 4, '2020-12-22', '2020-12-31', 'sorry', ' 2020-12-22 12:18 PM', 'rejected', 'Kulpreet Chopra', 7),
(3, 'Janhavi Sahu', 'janhavi@gmail.com', 2, 0, 1, 1, '2020-12-30', '2020-12-31', 'out of station', ' 2020-12-22 12:32 PM', 'rejected', 'Kulpreet Chopra', 4),
(4, 'Janhavi Sahu', 'janhavi@gmail.com', 1, 0, 2, 0, '2020-12-22', '2020-12-24', 'Merrige', ' 2020-12-22 01:19 PM', 'approved', 'Saloni Sheikh', 3),
(5, 'Neha Bhadoria', 'neha@gmail.com', 2, 1, 0, 1, '2020-12-22', '2020-12-31', 'Brother Marriage ', ' 2020-12-22 01:39 PM', 'approved', 'Kulpreet Chopra', 4),
(6, 'Gunjan Gupta', 'gunjan@gmail.com', 1, 1, 1, 4, '2021-02-07', '2021-02-09', 'itt hun yar', ' 2021-02-07 08:10 PM', 'approved', 'Kulpreet Chopra', 7);

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `id` int(11) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `e_leave` int(11) NOT NULL,
  `s_leave` int(11) NOT NULL,
  `c_leave` int(11) NOT NULL,
  `assign_by` varchar(350) NOT NULL,
  `assign_to` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `time` varchar(350) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`id`, `valid_from`, `valid_to`, `e_leave`, `s_leave`, `c_leave`, `assign_by`, `assign_to`, `email`, `time`) VALUES
(1, '2020-12-03', '2020-12-10', 2, 5, 4, 'Saloni Sheikh', 'Neha Bhadoria', 'neha@gmail.com', ' 2020-12-21 11:28 AM'),
(2, '2020-12-03', '2020-12-10', 2, 5, 4, 'Saloni Sheikh', 'Ashu Chopra', 'kulpreetchopra0128@gmail.com', ' 2020-12-21 11:28 AM'),
(3, '2021-01-01', '2021-02-28', 3, 2, 4, 'Saloni Sheikh', 'Janhavi Sahu', 'janhavi@gmail.com', ' 2020-12-22 12:31 PM'),
(4, '2021-02-07', '2021-02-25', 3, 1, 6, 'Saloni Sheikh', 'Gunjan Gupta', 'gunjan@gmail.com', ' 2021-02-07 08:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(350) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(350) NOT NULL,
  `department` varchar(350) NOT NULL,
  `password` varchar(350) NOT NULL,
  `forgott_pass` varchar(350) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(350) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `mobile`, `address`, `gender`, `department`, `password`, `forgott_pass`, `image`, `role`, `time`) VALUES
(3, 'Kulpreet Chopra', 'kulpreetsingh0128@gmail.com', '6266060879', 'B-94 NEW FORT VIEW COLONY KOTESHWAR ROAD GWALIOR', 'male', 'hr', 'kulpreet', 'red', '../image/admin.jpg', 'admin', '2021-02-07 14:31:09'),
(18, 'Gunjan Gupta', 'gunjan@gmail.com', '6260848521', 'Gole ka mandir murena mp', 'female', 'frontend', 'gunjan', 'green', '../image/gunjan.jpg', 'employee', '2020-12-17 07:23:03'),
(16, 'Saloni Sheikh', 'saloni@gmail.com', '6266060879', 'B-94 NEW FORT VIEW COLONY KOTESHWAR ROAD GWALIOR', 'female', 'backend', 'saloni', 'red', '../image/â€ª+91 6266 060 879â€¬ 20181022_232710.jpg', 'admin', '2021-06-10 10:39:14'),
(17, 'Neha Bhadoria', 'neha@gmail.com', '9074261533', 'Lashkar Gwalior Mp', 'female', 'pramotion', 'neha123', 'green', '../image/Neha.jpg', 'employee', '2020-12-17 07:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `file` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `name`, `email`, `file`, `time`) VALUES
(2, 'Kulpreet Chopra', 'kulpreetsingh0128@gmail.com', 'file/Resume.pdf', '2020-12-17 07:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(350) NOT NULL,
  `email` varchar(350) NOT NULL,
  `message` text NOT NULL,
  `admin` varchar(350) NOT NULL,
  `status` varchar(350) NOT NULL,
  `time` varchar(350) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `emp_id`, `name`, `email`, `message`, `admin`, `status`, `time`) VALUES
(1, 18, 'Gunjan Gupta', 'gunjan@gmail.com', 'Please add banner at zayaka.ml yes', 'Saloni Sheikh', 'unseen', ' 2021-02-07 08:09 PM'),
(2, 17, 'Neha Bhadoria', 'neha@gmail.com', 'Please add banner at zayaka.ml', 'Saloni Sheikh', 'green', ' 2020-12-17 12:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

CREATE TABLE `task_reply` (
  `r_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `m_id` int(11) NOT NULL,
  `admin` varchar(350) NOT NULL,
  `time` varchar(350) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`r_id`, `e_id`, `reply`, `m_id`, `admin`, `time`) VALUES
(1, 17, 'Ohk i will do', 2, 'Neha Bhadoria', ' 2020-12-17 12:45 PM'),
(2, 16, 'Yahh sure', 2, 'Saloni Sheikh', ' 2020-12-17 12:46 PM'),
(3, 18, 'Okay', 1, 'Gunjan Gupta', ' 2021-02-07 08:01 PM'),
(4, 16, 'thiq hai do fast', 1, 'Saloni Sheikh', ' 2021-02-07 08:09 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_leave`
--
ALTER TABLE `apply_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_reply`
--
ALTER TABLE `task_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_leave`
--
ALTER TABLE `apply_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_reply`
--
ALTER TABLE `task_reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
