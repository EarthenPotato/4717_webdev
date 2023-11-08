-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electroshock`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_name`, `quantity`) VALUES
('AQ1', 0),
('AQ2', 0),
('AQ3', 0),
('CQ1', 0),
('CQ2', 0),
('CQ3', 0),
('TQ1', 0),
('TQ2', 0),
('TQ3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_ID` int(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `postal_code` int(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `name`, `email`, `country`, `address`, `room`, `postal_code`, `phone_number`) VALUES
(1, 'Bob', 'Bob@gmail.com', 'Singapore', '1234 Elm Street', '#01-02', 123123, '12341234'),
(2, 'Alice', 'alice@gmail.com', 'the US', '5678 Oak Avenue', '#02-03', 234234, '23452345'),
(3, 'Charlie', 'charlie@gmail.com', 'China', '9876 Birch Road', '#03-04', 345345, '34563456'),
(4, 'David', 'david@gmail.com', 'Japan', '2468 Cedar Lane', '#04-05', 456456, '45674567'),
(5, 'Eve', 'eve@gmail.com', 'Korea', '1357 Pine Street', '#05-06', 567567, '56785678');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `ID` int(11) NOT NULL,
  `customername` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`ID`, `customername`) VALUES
(1, 'Bob'),
(2, 'Alice'),
(3, 'Charlie'),
(4, 'David'),
(5, 'Eve');

-- --------------------------------------------------------

--
-- Table structure for table `order_list_price`
--

CREATE TABLE `order_list_price` (
  `ID` int(11) NOT NULL,
  `AP1` decimal(10,2) DEFAULT NULL,
  `AP2` decimal(10,2) DEFAULT NULL,
  `AP3` decimal(10,2) DEFAULT NULL,
  `CP1` decimal(10,2) DEFAULT NULL,
  `CP2` decimal(10,2) DEFAULT NULL,
  `CP3` decimal(10,2) DEFAULT NULL,
  `TP1` decimal(10,2) DEFAULT NULL,
  `TP2` decimal(10,2) DEFAULT NULL,
  `TP3` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list_price`
--

INSERT INTO `order_list_price` (`ID`, `AP1`, `AP2`, `AP3`, `CP1`, `CP2`, `CP3`, `TP1`, `TP2`, `TP3`) VALUES
(1, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(2, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(3, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(4, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99),
(5, 120.99, 240.75, 299.99, 1500.50, 1850.75, 1999.99, 25.99, 75.49, 99.99);

-- --------------------------------------------------------

--
-- Table structure for table `order_list_quantity`
--

CREATE TABLE `order_list_quantity` (
  `ID` int(11) NOT NULL,
  `AQ1` int(11) DEFAULT 0,
  `AQ2` int(11) DEFAULT 0,
  `AQ3` int(11) DEFAULT 0,
  `CQ1` int(11) DEFAULT 0,
  `CQ2` int(11) DEFAULT 0,
  `CQ3` int(11) DEFAULT 0,
  `TQ1` int(11) DEFAULT 0,
  `TQ2` int(11) DEFAULT 0,
  `TQ3` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list_quantity`
--

INSERT INTO `order_list_quantity` (`ID`, `AQ1`, `AQ2`, `AQ3`, `CQ1`, `CQ2`, `CQ3`, `TQ1`, `TQ2`, `TQ3`) VALUES
(1, 0, 0, 0, 7, 0, 0, 0, 0, 0),
(2, 3, 1, 2, 3, 1, 2, 3, 1, 2),
(3, 2, 3, 1, 2, 3, 1, 2, 3, 1),
(4, 1, 3, 2, 1, 3, 2, 1, 3, 2),
(5, 2, 1, 3, 2, 1, 3, 2, 1, 3),
(35, 7, 0, 0, 0, 0, 1, 8, 0, 0),
(36, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(37, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 2, 1, 0, 0, 0, 0, 0, 0, 0),
(39, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 1, 0, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item`, `price`) VALUES
('AP1', 120.99),
('AP2', 240.75),
('AP3', 299.99),
('CP1', 1500.50),
('CP2', 1850.75),
('CP3', 1999.99),
('TP1', 25.99),
('TP2', 75.49),
('TP3', 99.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_list_price`
--
ALTER TABLE `order_list_price`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_list_quantity`
--
ALTER TABLE `order_list_quantity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_list_price`
--
ALTER TABLE `order_list_price`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `order_list_quantity`
--
ALTER TABLE `order_list_quantity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
