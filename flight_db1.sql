-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 09:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password'),
(2, 'Nathan', 'yeet');

-- --------------------------------------------------------

--
-- Table structure for table `aircraft_details`
--

CREATE TABLE `aircraft_details` (
  `a_id` int(4) NOT NULL,
  `model` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aircraft_details`
--

INSERT INTO `aircraft_details` (`a_id`, `model`) VALUES
(1, 'A320CEO'),
(2, 'A320NEO'),
(3, 'ATR 72-6'),
(4, 'A321NEO'),
(5, 'A220CEO'),
(6, 'A220NEO'),
(7, 'A120CEO'),
(8, 'A130CEO');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_id` int(4) NOT NULL,
  `seats_booked` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `user_id`, `f_id`, `seats_booked`, `total_cost`) VALUES
(1, 1, 100, 1, 6700),
(2, 1, 101, 1, 7500),
(3, 1, 101, 1, 15000),
(4, 2, 100, 1, 6700),
(5, 3, 106, 1, 5000),
(6, 4, 107, 1, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Name`) VALUES
('Bangalore'),
('Delhi'),
('Dubai'),
('Goa'),
('Iceland'),
('Karnataka'),
('Kolkata'),
('London'),
('Miami'),
('Mumbai'),
('Nashik'),
('New York'),
('Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fe_id` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `mob_no` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fe_id`, `Name`, `mob_no`, `Email`, `feedback`) VALUES
(1, 'Nathan', 2147483647, 'nathan532009@gmail.com', 'Test Feedback');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `f_id` int(11) NOT NULL,
  `a_id` int(4) NOT NULL,
  `Source` varchar(25) NOT NULL,
  `Destination` varchar(25) NOT NULL,
  `Departure` date NOT NULL,
  `Arrival` date NOT NULL,
  `Fare_Economic` int(11) NOT NULL,
  `Fare_Business` int(11) NOT NULL,
  `Available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`f_id`, `a_id`, `Source`, `Destination`, `Departure`, `Arrival`, `Fare_Economic`, `Fare_Business`, `Available_seats`) VALUES
(100, 1, 'Mumbai', 'Goa', '2022-12-24', '2022-12-24', 6700, 10001, 55),
(101, 2, 'Bangalore', 'Karnataka', '2022-12-29', '2022-12-30', 7500, 9500, 63),
(102, 1, 'Goa', 'Mumbai', '2022-12-29', '2022-12-30', 6900, 11000, 60),
(103, 2, 'Delhi', 'Bangalore', '2022-12-29', '2022-12-29', 4000, 8000, 60),
(104, 4, 'Delhi', 'Mumbai', '2022-11-25', '2022-11-30', 7500, 11000, 60),
(105, 3, 'Mumbai', 'Rajasthan', '2022-12-25', '2022-12-20', 4500, 7500, 60),
(106, 1, 'Goa', 'Mumbai', '2022-12-23', '2022-12-23', 5000, 7500, 59),
(107, 1, 'Delhi', 'Iceland', '2022-11-01', '2022-11-05', 35000, 40000, 59),
(108, 2, 'Bangalore', 'Dubai', '2022-12-14', '2022-12-28', 12000, 18000, 60),
(109, 3, 'Delhi', 'New York', '2022-12-20', '2022-12-28', 11000, 19000, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `Email`) VALUES
(1, 'Nathan', 'yeet', 'Nathan', 'Henriques', 'nathan532009@gmail.com'),
(2, 'Aravind', 'yeet1', 'Aravind', 'Sagar', 'aravindsagar.mail@gmail.com'),
(3, 'Abhinav', 'pass', 'Abhinav', 'Borde', 'abhinavBorder@gmail.com'),
(4, 'Aryan', 'dbms', 'Aryan', 'Singh', 'aryanSingh@gmail.com'),
(5, 'Jake123', 'pass', 'Jake', 'Benham', 'jakeBenham@gmail.com'),
(6, 'JOpm', 'pass', 'Jarno', 'Opmeer', 'JarnoOpmeer@gmail.com'),
(7, 'K1m1', 'pass', 'Kimi', 'Raikonnen', 'KimiRaik@gmail.com'),
(8, 'Aditi', 'pass', 'Aditi', 'Amonkar', 'aditiAmonkar2003@gmail.com'),
(9, 'M1ke', 'pass', 'Mike', 'Varshavsky', 'mikeV@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aircraft_details`
--
ALTER TABLE `aircraft_details`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `bookings_ibfk_1` (`user_id`),
  ADD KEY `bookings_ibfk_2` (`f_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fe_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aircraft_details`
--
ALTER TABLE `aircraft_details`
  MODIFY `a_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `flights` (`f_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `a_id` FOREIGN KEY (`a_id`) REFERENCES `aircraft_details` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
