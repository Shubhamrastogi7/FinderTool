-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2020 at 09:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TyreSizes`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_manufacturer`
--

CREATE TABLE `car_manufacturer` (
  `id` int(11) NOT NULL,
  `car_manufacturer_name` varchar(500) NOT NULL,
  `manufacturer_logo` longblob NOT NULL,
  `created_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `car_models_suv`
--

CREATE TABLE `car_models_suv` (
  `id` int(4) NOT NULL,
  `make_id` int(2) DEFAULT NULL,
  `model` varchar(18) DEFAULT NULL,
  `variant` varchar(40) DEFAULT NULL,
  `year` varchar(7) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `size` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_model_pv`
--

CREATE TABLE `car_model_pv` (
  `id` int(5) NOT NULL,
  `make_id` int(2) DEFAULT NULL,
  `model` varchar(19) DEFAULT NULL,
  `variant` varchar(45) DEFAULT NULL,
  `year` varchar(7) DEFAULT NULL,
  `position` varchar(11) DEFAULT NULL,
  `size` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_size`
--

CREATE TABLE `tyre_size` (
  `id` int(11) NOT NULL,
  `ts_size` varchar(12) DEFAULT NULL,
  `ts_width` varchar(5) DEFAULT NULL,
  `ts_profile` decimal(3,1) DEFAULT NULL,
  `ts_rim` int(2) DEFAULT NULL,
  `ts_liss` varchar(6) DEFAULT NULL,
  `ts_pattern1` varchar(14) DEFAULT NULL,
  `ts_pattern2` varchar(14) DEFAULT NULL,
  `ts_pattern3` varchar(14) DEFAULT NULL,
  `ts_pattern4` varchar(14) DEFAULT NULL,
  `ts_created_on` date DEFAULT NULL,
  `ts_modified_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_manufacturer`
--
ALTER TABLE `car_manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models_suv`
--
ALTER TABLE `car_models_suv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `make_id` (`make_id`);

--
-- Indexes for table `car_model_pv`
--
ALTER TABLE `car_model_pv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `make_id` (`make_id`);

--
-- Indexes for table `tyre_size`
--
ALTER TABLE `tyre_size`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_manufacturer`
--
ALTER TABLE `car_manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyre_size`
--
ALTER TABLE `tyre_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_models_suv`
--
ALTER TABLE `car_models_suv`
  ADD CONSTRAINT `car_models_suv_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `car_manufacturer` (`id`);

--
-- Constraints for table `car_model_pv`
--
ALTER TABLE `car_model_pv`
  ADD CONSTRAINT `car_model_pv_ibfk_1` FOREIGN KEY (`make_id`) REFERENCES `car_manufacturer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
