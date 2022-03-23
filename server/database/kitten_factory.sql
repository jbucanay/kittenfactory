-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2022 at 04:16 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitten_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `address`, `username`, `password`, `role`) VALUES
(2, 'Ramona', 'Ali', '200 N 200 W, SLC, UT', 'rali', '12345', ''),
(3, 'Mildred', 'Pace', '300 N 300 W, SLC, UT', 'mpace', '12345', ''),
(4, 'Arlen', 'Green', '400 N 400 W, SLC, UT', 'agreen', '12345', ''),
(5, 'Gordon', 'Wolf', '500 N 500 W, SLC, UT', 'gwolf', '12345', ''),
(6, 'Betty', 'Morton', '600 N 600 W, SLC, UT', 'bmorton', '12345', ''),
(7, 'Lisa', 'Howe', '700 N 700 W, SLC, UT', 'lhowe', '12345', ''),
(9, 'Pat', 'Jones', '123 Main St, SLC, UT 84115', 'pjones', '$2y$10$kCjzVCZE.QbwtrIm828.dO.5gCGqdeDOlz4IMqYUW6b0oBRnTSeHW', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `username`, `password`, `first_name`, `last_name`, `position`, `product_id`) VALUES
(1, 'sbigelow', '12345', 'Stephen', 'Bigelow', 'Web Developer I', NULL),
(2, 'gbaracka', '12345', 'Gilbert', 'Baracka', 'Web Developer II', NULL),
(4, 'pjordan', '12345', 'Peter', 'Jordan', 'Sales Associate', 1),
(5, 'kwilliams', '12345', 'Kaylee', 'Williams', 'Sales Associate', 2),
(6, 'ashleyfarr', '$2y$10$imd0Ft/vDyxqxYVO9kwrTOY2GpldRs7Dwtx1DEO2/YmyVJWJn3tWy', 'Ashley', 'Farr', 'Web Developer I', NULL),
(7, 'bsmith', '$2y$10$j4jmYMALNoj9B4l5ygZVNO.h353G6odldKUrZKnJ0TwyCyIgRJbN.', 'Bob', 'Smith', 'Manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_role`
--

CREATE TABLE `employee_role` (
  `employee_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_role`
--

INSERT INTO `employee_role` (`employee_id`, `role`) VALUES
(4, 'employee'),
(5, 'employee'),
(6, 'admin'),
(7, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `order_id` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ski_size` varchar(100) NOT NULL,
  `quantity_ordered` int(3) NOT NULL,
  `price_paid` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`order_id`, `line_id`, `product_id`, `ski_size`, `quantity_ordered`, `price_paid`) VALUES
(2, 1, 1, '180', 2, '1100.00'),
(2, 2, 2, '180', 1, '450.00'),
(3, 1, 1, '180', 1, '550.00'),
(3, 2, 1, '175', 1, '500.00'),
(3, 3, 2, '175', 2, '800.00'),
(4, 1, 1, '180', 4, '2200.00'),
(5, 1, 2, '175', 1, '400.00'),
(5, 2, 2, '180', 1, '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `order_dttm` datetime NOT NULL,
  `pmt_id` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `customer_id`, `employee_id`, `order_dttm`, `pmt_id`, `ship_id`) VALUES
(2, 9, 1, '2022-03-13 13:42:05', 2, 2),
(3, 3, 2, '2022-03-13 13:42:05', 3, 3),
(4, 4, 2, '2022-03-13 13:42:05', 4, 4),
(5, 9, 2, '2022-03-13 13:42:05', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pmt_id` int(11) NOT NULL,
  `pmt_dttm` datetime NOT NULL,
  `credit_card` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pmt_id`, `pmt_dttm`, `credit_card`) VALUES
(1, '2022-03-13 13:42:05', 12345678902),
(2, '2022-03-13 13:42:05', 12345678903),
(3, '2022-03-13 13:42:05', 12345678904),
(4, '2022-03-13 13:42:05', 12345678905),
(5, '2022-03-13 13:42:05', 12345678906);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `ski_name` varchar(100) NOT NULL,
  `makeup` varchar(30) NOT NULL,
  `description` blob,
  `product_img_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `ski_name`, `makeup`, `description`, `product_img_path`) VALUES
(1, 'Carbon Fiber Skis', 'carbon_fiber', NULL, '../Images/cfskis.png'),
(2, 'Hybrid Skis', 'hybrid', NULL, '../Images/hybridskis.png');

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `return_id` int(11) NOT NULL,
  `return_dttm` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ski_size` varchar(100) NOT NULL,
  `quantity_returned` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_table`
--

INSERT INTO `return_table` (`return_id`, `return_dttm`, `order_id`, `product_id`, `ski_size`, `quantity_returned`) VALUES
(1, '2022-03-13 13:42:05', 2, 1, '180', 1),
(2, '2022-03-13 13:42:05', 4, 1, '180', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(11) NOT NULL,
  `ship_dt` date NOT NULL,
  `delivery_dt` date DEFAULT NULL,
  `ship_cost` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_id`, `ship_dt`, `delivery_dt`, `ship_cost`) VALUES
(1, '2022-03-13', NULL, '10.75'),
(2, '2022-03-13', NULL, '7.23'),
(3, '2022-03-13', NULL, '9.02'),
(4, '2022-03-13', NULL, '8.54'),
(5, '2022-03-13', NULL, '10.89');

-- --------------------------------------------------------

--
-- Table structure for table `ski_size_price_qty`
--

CREATE TABLE `ski_size_price_qty` (
  `product_id` int(11) NOT NULL,
  `ski_size` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity_available` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ski_size_price_qty`
--

INSERT INTO `ski_size_price_qty` (`product_id`, `ski_size`, `price`, `quantity_available`) VALUES
(1, '175', '500.00', 22),
(1, '180', '550.00', 25),
(2, '175', '400.00', 25),
(2, '180', '450.00', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `employee_role`
--
ALTER TABLE `employee_role`
  ADD PRIMARY KEY (`employee_id`,`role`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`order_id`,`line_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `pmt_id` (`pmt_id`),
  ADD KEY `ship_id` (`ship_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pmt_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`,`ski_size`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `ski_size_price_qty`
--
ALTER TABLE `ski_size_price_qty`
  ADD PRIMARY KEY (`product_id`,`ski_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `return_table`
--
ALTER TABLE `return_table`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `employee_role`
--
ALTER TABLE `employee_role`
  ADD CONSTRAINT `employee_role_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`order_id`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `order_table_ibfk_3` FOREIGN KEY (`pmt_id`) REFERENCES `payment` (`pmt_id`),
  ADD CONSTRAINT `order_table_ibfk_4` FOREIGN KEY (`ship_id`) REFERENCES `shipping` (`ship_id`);

--
-- Constraints for table `return_table`
--
ALTER TABLE `return_table`
  ADD CONSTRAINT `return_table_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`order_id`),
  ADD CONSTRAINT `return_table_ibfk_2` FOREIGN KEY (`product_id`,`ski_size`) REFERENCES `ski_size_price_qty` (`product_id`, `ski_size`);

--
-- Constraints for table `ski_size_price_qty`
--
ALTER TABLE `ski_size_price_qty`
  ADD CONSTRAINT `ski_size_price_qty_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
