-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 12:15 PM
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
-- Database: `flight_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(4) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Username`, `Password`) VALUES
(100, 'Nathan', 'yeet');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Name`) VALUES
('Banglore'),
('Delhi'),
('Dubai'),
('Goa'),
('Iceland'),
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
  `F_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`F_id`, `Name`, `Contact`, `Email`, `Message`) VALUES
(1, 'Nathan Henriques', 21321455125, 'nathan532009@gmail.c', 'Test feedback');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Source` text NOT NULL,
  `Destination` text NOT NULL,
  `Departure` date NOT NULL,
  `Arrival` date NOT NULL,
  `Fair_Economic` int(11) NOT NULL,
  `Fair_Business` int(11) NOT NULL,
  `Available_seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`Id`, `Name`, `Source`, `Destination`, `Departure`, `Arrival`, `Fair_Economic`, `Fair_Business`, `Available_seats`) VALUES
(101, 'A320CEO', 'Mumbai', 'Goa', '2022-12-24', '2022-12-24', 6700, 10000, 58),
(103, 'A320NEO', 'Delhi', 'Banglore', '2022-12-29', '2022-12-29', 4000, 8000, 60),
(104, 'A321NEO', 'Delhi', 'Mumbai', '2022-11-25', '2022-11-30', 7500, 11000, 53),
(105, 'ATR 72-600', 'Mumbai', 'Rajasthan', '2022-12-15', '2022-12-20', 4500, 7500, 60),
(106, 'A320CEO', 'Goa', 'Mumbai', '2022-12-23', '2022-12-23', 5000, 7500, 60),
(455, 'A320CEO', 'Delhi', 'Iceland', '2022-11-01', '2022-11-05', 35000, 60000, 50),
(1001, 'A320CEO', 'Bangalore', 'Dubai', '2022-12-14', '2022-12-25', 12000, 24000, 25),
(2120, 'A321NEO', 'Delhi', 'New York', '2022-12-20', '2022-12-28', 10000, 30000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(4) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Flight_Id` int(11) NOT NULL,
  `Seats_booked` int(11) NOT NULL,
  `Total_Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `MobileNo`, `Email`, `Flight_Id`, `Seats_booked`, `Total_Cost`) VALUES
(100, 'Nathan', 'Henriques', 2321415512, 'nathan532009@gmail.com', 101, 2, 20100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Flight_Id` (`Flight_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Flight_Id`) REFERENCES `flights` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
