-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 12:05 PM
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
-- Database: `grv`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(100) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `total_bill` decimal(10,2) NOT NULL,
  `received_amount` decimal(10,2) NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_date` date NOT NULL,
  `sales_type` varchar(10) NOT NULL DEFAULT '1',
  `comments` varchar(500) NOT NULL DEFAULT 'Counter-1 Online-2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `comments` varchar(500) NOT NULL DEFAULT 'admin-1 counter-2 user-3 UserOpenViaCounter-4 active-1 deactive-2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `full_name`, `email`, `mobile`, `password`, `account_type`, `status`, `comments`) VALUES
(1, 'Counter 01', 'grvcc@grvh.com', '12345678912', '123456', 2, 1, 'admin-1 counter-2 user-3 active-1 deactive-2'),
(2, 'Arifur Rahman', 'it.manager.arifbd@gmail.com', '01911946693', '123456', 3, 1, 'admin-1 counter-2 user-3 active-1 deactive-2');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `id` int(11) NOT NULL,
  `poster` varchar(500) NOT NULL,
  `Show_Name` varchar(100) NOT NULL,
  `Show_Date` varchar(50) NOT NULL,
  `Show_Time` varchar(100) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `poster`, `Show_Name`, `Show_Date`, `Show_Time`, `Status`) VALUES
(1, 'Assets/Add1.jpg', 'DUNKI', 'Ended', '03:00 PM, 06:00 PM, 09:00PM', 2),
(2, 'Assets/Add2.jpg', 'ANIMAL', 'Ended', '03:00 PM, 06:00 PM, 09:00PM', 2),
(3, 'Assets/Add3.jpg', 'HUBBA', 'Running', '04:00 PM, 07:00 PM', 1),
(4, 'Assets/Add4.jpg', 'FIGHTER', 'Coming on 25-01-2024', '04:00 PM, 07:00 PM', 3);

-- --------------------------------------------------------

--
-- Table structure for table `moviename`
--

CREATE TABLE `moviename` (
  `id` int(11) NOT NULL,
  `MovieName` varchar(100) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT 1,
  `comments` varchar(500) NOT NULL DEFAULT 'Active-1 Inactive-2 Future-3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moviename`
--

INSERT INTO `moviename` (`id`, `MovieName`, `Status`, `comments`) VALUES
(1, 'DUNKI', 2, 'Active-1 Inactivve-2 Future-3'),
(2, 'ANIMAL', 2, 'Active-1 Inactivve-2 Future-3'),
(3, 'HUBBA', 1, 'Active-1 Inactivve-2 Future-3'),
(4, 'FIGHTER', 3, 'Active-1 Inactivve-2 Future-3');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `show_time` varchar(100) NOT NULL,
  `reserve_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `sit_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `id` int(11) NOT NULL,
  `ShowTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`id`, `ShowTime`) VALUES
(1, '04:00 PM'),
(2, '07:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `sitcategory`
--

CREATE TABLE `sitcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(100) NOT NULL,
  `TicketPrice` decimal(10,2) NOT NULL,
  `rowname` varchar(100) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitcategory`
--

INSERT INTO `sitcategory` (`id`, `CategoryName`, `TicketPrice`, `rowname`, `Status`) VALUES
(1, 'VIP', 700.00, 'VIP', 1),
(2, 'Business', 400.00, 'A', 1),
(3, 'Business', 400.00, 'B', 1),
(4, 'Business', 400.00, 'C', 1),
(5, 'Business', 400.00, 'D', 1),
(6, 'Business', 400.00, 'E', 1),
(7, 'Business', 400.00, 'F', 1),
(8, 'Business', 400.00, 'G', 1),
(9, 'Business', 400.00, 'H', 1),
(10, 'Business', 400.00, 'I', 1),
(11, 'Economy', 350.00, 'J', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moviename`
--
ALTER TABLE `moviename`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitcategory`
--
ALTER TABLE `sitcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `moviename`
--
ALTER TABLE `moviename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sitcategory`
--
ALTER TABLE `sitcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
