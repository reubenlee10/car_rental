-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:09 PM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `number_plate` varchar(255) NOT NULL,
  `model` varchar(25) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `number_plate`, `model`, `colour`, `capacity`) VALUES
(1, 'VDK 6431', 'Proton Persona', 'Red', 5),
(2, 'QWE213', 'Perodua Myvi', 'Blue', 4),
(3, 'WDS4123', 'Honda City', 'White', 5),
(4, 'WEA123', 'Perodua Alza', 'Grey', 7);

-- --------------------------------------------------------

--
-- Table structure for table `customer_credentials`
--

CREATE TABLE `customer_credentials` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `license_number` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_credentials`
--

INSERT INTO `customer_credentials` (`customer_id`, `full_name`, `email`, `phone_number`, `license_number`, `password`) VALUES
(4, 'Reuben Lee Suppiah', 'reuben@gmail.com', '0105433274', 'C917239A', '$2y$10$lgCEfTnoskeogjv26VnKEuo/Sg98r//dwL71tVBH9nKkBiHbwHDma'),
(5, 'Fawzul Bari Bin A A Naina Mohamed', 'fawzul@gmail.com', '012461823', 'C12830712A', '$2y$10$lgCEfTnoskeogjv26VnKEuo/Sg98r//dwL71tVBH9nKkBiHbwHDma'),
(6, 'Ong Kam Boh', 'ong@gmail.com', '012351724', 'C12', '$2y$10$lgCEfTnoskeogjv26VnKEuo/Sg98r//dwL71tVBH9nKkBiHbwHDma');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `cardholder_name` text NOT NULL,
  `card_number` text NOT NULL,
  `ccv_number` text NOT NULL,
  `expiry_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `customer_id`, `reservation_id`, `cardholder_name`, `card_number`, `ccv_number`, `expiry_date`) VALUES
(8, 1, 10, 'SEV2cHV4YldCNGxsaHFTb1g4a2hLTzJ0SEttbkxKY21CZUJVZWtLMnZsWT06OhFFD45H3Kn5WXVAl2igxns=', 'T2JtR1BocTVqZ0FjejRlZW42a0V4Zz09OjqUjVxvf+bMUsp2SGBXJdDA', 'Vk40ZUpNNXBzR1lNcU1GSEJTY3lRQT09OjpLkItPsS/eZFvGweXh5KIa', 'OEh3YVNPZ2owaXNlMlloa2wxcXB5UT09OjqrUdX1rQS06W1dm4xQnGz1'),
(9, 3, 11, 'VjRUcjRzdCs1Y3crVTdpSE5xa0E1M0kyWjlDQ1dwQjhJRnR5SlAzWDhJTT06OjMLbEwbycK0fSO67ne9pFk=', 'dTBiWkVMZXZ1Rldvd0IvaEZFdGN1dz09Ojqdwx3O6MIeBd0cyqzduDNI', 'Q3orM1U3bGVIWFREbnRJMFRDS1JRUT09Ojofs4BWEwOix0ssPsIkN2LJ', 'a01oZWtUc0lya0wzT0Y2OERUWUFoUT09Ojrd96YYqiaF9Fhe/bId7Xr1'),
(10, 1, 12, 'VGVaeW5adGcvR3lqOVFGdkh5eWxYSC8wTXBVbUNGNjMwMlVOUEhCbVdmdz06Ot0JMCOq4J7nIntxss9Iqtk=', 'dno1RXFVTlVRUVpJcC81Y1R4QVM4QT09Ojrda/c1fyAwyXRMDos0b5xT', 'Wk5aK1lFT1V4bUErYzNQcVV2cGJ4QT09OjqdffOp+WIxZytfaaUK4j5h', 'QzdZWHRrOW10SkNVSnpNY1NIVXVLZz09OjqQAlRczdIyjIzrfXRnVueR'),
(11, 4, 15, 'cUR1bEY4ak9oRGVoOUl2Tk9kUUhVYjZxeHBoVy8yMzBLWEpsNVExYXFKOD06OvEh/o3giJSib52cvJjv3TQ=', 'SzRtOTJHM3JKZHozUjVyaW5DSUJSUT09OjpS1Lk83xAuL1dnh6W0IioQ', 'V0RtckhnM3VoblNOSWJUVWF0enhXdz09OjonoWwU5XOnT09iQZ3E1Tmz', 'dU1zbHpGMzE2eVdvaTNkZDBRQ3VOUT09Ojq7dMeIwo35cNtEioBrYf21'),
(12, 5, 16, 'M0NYY28vOHFlZTg1d1NZT2x2VU5oZz09Ojql9Nht3bXj3Ntk9JDaoGXn', 'VG1kRG1NQTVQYXdPa0xGRXNueCs2dz09OjpLOzFnRIr9YAIy/GDRxb7z', 'aFNmYWlVWDB3Q3ZiYkw4OCtpUFQ1dz09OjrulgQX1do/cZ/Kl4CsMBw0', 'ZjhlY0k1dThqSGpNSGI3TUZvL095dz09OjqXuoXt6QOu0fUMqbVCpylf'),
(13, 6, 17, 'TDRWSTJqbVRBa0NST2xEWDg0dW1xZz09OjrnjSw5iSPf5yjfPEFqPMAo', 'SC9RVThFWWJtYnRQTlJLSkpYRHgrZz09Ojo58r2xn0mJJGkFCMlRWOkm', 'b0g2U1o1MHRWM2I2QWoxTnh5UXRHQT09Ojrc4gwW9jxOBXZzMPf01KPS', 'UjF3TnRNY3RxKzlaVHV4STM4UkhsUT09Ojq1AKaSormZfN+EQPwo3080');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `customer_id`, `date`, `car_id`, `period`) VALUES
(15, 4, '2023-12-12', 3, 2),
(16, 5, '2023-12-31', 2, 2),
(17, 6, '2023-12-31', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer_credentials`
--
ALTER TABLE `customer_credentials`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_credentials`
--
ALTER TABLE `customer_credentials`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `payment_method_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_credentials` (`customer_id`),
  ADD CONSTRAINT `payment_method_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_credentials` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
