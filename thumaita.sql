-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thumaita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'clerk@gmail.com', 'clerk');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `idnumber` int(11) NOT NULL,
  `kilos` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`idnumber`, `kilos`, `date`) VALUES
(1723, 78, '2024-07-06'),
(1723, 900, '2024-07-04'),
(17234, 780, '2024-07-03'),
(9090, 9090, '2024-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `idnumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `idnumber`, `email`, `password`, `user_id`) VALUES
(2, '', '', 'hj@gmail.com', 'ertdts', ''),
(3, 'Dorine', '234567', 'Dorine@gmail.com', 'Dorine', ''),
(6, 'Grace', '56780', 'grace@gmail.com', '7890', ''),
(7, 'Dee', '9090', 'dee@gmail.com', '9090', ''),
(9, 'peter', '1723', 'peter@gmail.com', 'peter', ''),
(11, '', '17234', 'peteer@gmail.com', 'peter', ''),
(12, 'Tiana', '9089', 'tee@gmail', 'peter', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `issue_type` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `priority` varchar(10) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL,
  `admin_response` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `email`, `issue_type`, `description`, `priority`, `submission_date`, `status`, `admin_response`) VALUES
(11, 'Dorine', 'grace@gmail.com', 'technical', 'love', 'medium', '2024-07-02 17:12:48', '', ''),
(12, 'tt', 'ttt@gm', 'technical', 'sss', 'low', '2024-07-03 08:15:23', '', ''),
(13, 'Dorine', 'eee@gmai.com', 'technical', 'hhfhfh', 'low', '2024-07-08 11:49:47', '', ''),
(14, 'Dorine', 'dee@gmail.com', 'technical', 'Pests', 'medium', '2024-07-08 13:05:03', '', ''),
(15, 'Dorine', 'dee@gmail.com', 'technical', 'Pests', 'medium', '2024-07-08 13:07:29', '', ''),
(16, 'Dorine', 'dee@gmail.com', 'technical', 'Pests', 'medium', '2024-07-08 13:09:39', 'Resolved', 'frrr');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `kilos` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idnumber` (`idnumber`,`email`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
