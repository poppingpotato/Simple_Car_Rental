-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 04:43 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcarrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(30) DEFAULT NULL,
  `apass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `c_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `cartype` varchar(255) NOT NULL,
  `transmission_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `hireprice` int(11) NOT NULL,
  `image` mediumblob NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`c_id`, `car_id`, `cartype`, `transmission_id`, `description`, `hireprice`, `image`, `status`, `created`, `modified`) VALUES
(156, 2, 'CR-V', 1, '5 seaters', 1200, 0x373331613538366133626466313663373038383563356666623936366565336264396566323166362d63722d762e6a7067, 'Available', '2020-05-09 09:09:12', '2020-05-09 07:09:12'),
(157, 1, 'Hiace', 2, '15 seaters', 5000, 0x343863373234643865356563396637636662666333663734383330363666623433303938373635652d68696163652e6a7067, 'Available', '2020-05-09 09:09:32', '2020-05-09 07:09:32'),
(158, 1, 'Fortuner', 1, '7 Seaters', 3500, 0x636334383364663336316536386366346364346633376439636661383331323435353537613961392d666f7274756e65722e6a7067, 'Available', '2020-05-09 09:09:59', '2020-05-09 07:09:59'),
(159, 3, 'Montero', 1, '7 Seaters', 5000, 0x656264393632353535623537333530636336336430356537643265383031396134386362613330392d4d6f6e7465726f322e6a7067, 'N/A', '2020-05-09 09:12:28', '2020-05-09 07:12:28'),
(160, 2, 'Civic', 1, '5 seaters', 2500, 0x613730303762616561613730373039326337646264623566643464326639636565663938616132612d63697669632e6a7067, 'Available', '2020-05-09 09:12:55', '2020-05-09 07:12:55'),
(161, 1, 'Fortuner(old variant)', 2, '5 seaters', 2500, 0x376130366364323465393136353635623339386333323563656534346234323631333030643832342d666f7274756e65722d6f6c642e6a7067, 'Available', '2020-05-09 09:13:35', '2020-05-09 07:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ucar_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(12) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `ub_status` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `m_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `b_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `car_id`, `fname`, `lname`, `email`, `contactno`, `fromDate`, `toDate`, `b_status`) VALUES
(14, 147, 'Test', 'asd', 'dechoamistad@yahoo.com', 924125789, '2020-05-06', '2020-05-19', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `transmission`
--

CREATE TABLE `transmission` (
  `t_id` int(11) NOT NULL,
  `transmissiontype` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transmission`
--

INSERT INTO `transmission` (`t_id`, `transmissiontype`, `created`, `modified`) VALUES
(1, 'AUTOMATIC', '0000-00-00 00:00:00', '2020-03-26 10:52:14'),
(2, 'MANUAL', '0000-00-00 00:00:00', '2020-03-26 10:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`, `phone`) VALUES
(11, 'test', 'test', 'Deco  Tester', 'testtest@gmail.com', 928194993);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `name`, `created`, `modified`) VALUES
(1, 'TOYOTA', '2020-03-26 18:53:36', '2020-03-26 10:53:52'),
(2, 'HONDA', '2020-03-26 18:54:04', '2020-03-26 10:54:49'),
(3, 'MITSUBISHI', '2020-03-26 18:54:04', '2020-03-26 10:54:49'),
(4, 'NISSAN', '2020-03-26 18:54:51', '2020-03-26 10:54:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aname` (`aname`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transmission`
--
ALTER TABLE `transmission`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
