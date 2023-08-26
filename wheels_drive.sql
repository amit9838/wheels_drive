-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 10:38 AM
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
-- Database: `wheels_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `class` varchar(100) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `sitting_capacity` int(11) NOT NULL,
  `fuel_economy` int(11) NOT NULL,
  `specs` text DEFAULT NULL,
  `rent_per_day` int(11) NOT NULL,
  `date_added` date NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `is_on_rent` int(2) NOT NULL,
  `rent_start_date` date DEFAULT NULL,
  `rent_end_date` date DEFAULT NULL,
  `rented_by_customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `brand`, `model`, `class`, `vehicle_no`, `sitting_capacity`, `fuel_economy`, `specs`, `rent_per_day`, `date_added`, `location`, `tags`, `is_on_rent`, `rent_start_date`, `rent_end_date`, `rented_by_customer_id`) VALUES
(8, 'hyundai', 'Verna', 'sedan', 'dl23ac2312', 5, 13, '', 4000, '0000-00-00', 'delhi', 'Safety Feature,High Performance', 0, '0000-00-00', '2023-08-27', NULL),
(9, 'honda', 'city', 'sedan', 'up55sd2132', 5, 13, 'airbag', 5000, '0000-00-00', 'delhi', 'Airbag,Safety Features,High Rated', 1, '2023-08-26', '2023-08-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Amit Chudhary', 'amit@gmail.com', '$2y$10$iusedsomecrazystring2u8y4UXBHVc9csYrJ04j5DACLjwYn/Zn2', 'customer'),
(4, 'Vishal', 'v@gmail.com', '$2y$10$iusedsomecrazystring2uICYZt1MbxZurFKOuQdxIOeJWz54oOAq', 'admin'),
(5, 'Amit', 'a@gmail.com', '$2y$10$iusedsomecrazystring2uICYZt1MbxZurFKOuQdxIOeJWz54oOAq', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
