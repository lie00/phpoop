-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 02:13 AM
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
-- Database: `loginmethod`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `username`, `password`, `firstname`, `lastname`, `birthday`, `sex`) VALUES
(1, 'Mickey', 'Mouse', '', '', NULL, ''),
(2, 'Cheese', 'Hotdog', '', '', NULL, ''),
(3, 'Foot', 'Long', '', '', NULL, ''),
(12, 'Rey', 'pass', 'Rey', 'Malicse', '2002-03-03', 'male'),
(14, 'anakniluka', 'mavs', 'dj', 'aquino', '2003-09-27', 'male'),
(15, 'reyw', 'pass', 'willarddd', 'malicse', '2002-03-03', 'Select Sex'),
(16, 'john', 'doe', 'John', 'Doe', '2032-03-03', 'Select Sex'),
(17, 'jane', 'doe', 'jane', 'Doe', '2332-01-01', 'Female'),
(18, 'update Uname', 'password', 'firstname', 'lastname', '1000-01-01', 'Select Sex'),
(20, 'roze', 'roze', 'jei', 'roze', '1002-01-01', 'Select Sex');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `user_add_id` int(11) NOT NULL,
  `User_Id` int(11) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`user_add_id`, `User_Id`, `street`, `barangay`, `city`, `province`) VALUES
(1, 15, 'sico', 'sico', 'lipa', 'batangas'),
(2, 16, 'new street', 'violeta', 'New York', 'USA'),
(3, 17, 'street', 'sico', 'New York', 'USA'),
(4, 18, 'updated street', 'barangay', 'city', 'province'),
(6, 20, 'street', 'roze', 'roze', 'roze');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`user_add_id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
