-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 05:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roy_car_workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_order`
--

CREATE TABLE `client_order` (
  `oid` int(11) NOT NULL,
  `client_email` varchar(45) NOT NULL,
  `mechanic_name` varchar(45) NOT NULL,
  `date_of_appointment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_order`
--

INSERT INTO `client_order` (`oid`, `client_email`, `mechanic_name`, `date_of_appointment`) VALUES
(1, 'apurba@gmail.com', 'Asif', '2022-01-20'),
(2, 'shuvro@gmail.com', 'Anzum', '2022-03-16'),
(3, 'fahim@gmail.com', 'Farhan', '2022-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics`
--

CREATE TABLE `mechanics` (
  `mid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics`
--

INSERT INTO `mechanics` (`mid`, `name`) VALUES
(5, 'Anzum'),
(4, 'Asif'),
(2, 'Farhan'),
(3, 'Junayed'),
(1, 'Samin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `carLicense` varchar(45) NOT NULL,
  `carEngine` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `name`, `address`, `phone`, `carLicense`, `carEngine`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'Admin', 'Default', '000', '000', '000', '18301028', 1),
(2, 'apurba@gmail.com', 'Apurba', 'Mohamammadpur', '1234', '1246', '3535', 'apurba', 0),
(3, 'shuvro@gmail.com', 'Shuvro', 'Mohamammadpur', '1234', '12246', '53535', 'shuvro', 0),
(4, 'fahim@gmail.com', 'Fahim', 'Mohakhali', '24123', '233546', '46454545', 'fahim', 0),
(5, 'tahmid@gmail.com', 'Tahmid', 'Lalmatia', '24245', '233535', '5353434', 'tahmid', 0),
(8, 'alsaba@gmail.com', 'Al Saba', 'Shyamoli', '1234', '1424', '53435', 'alsaba', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_order`
--
ALTER TABLE `client_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `mechanics`
--
ALTER TABLE `mechanics`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `carLicense` (`carLicense`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_order`
--
ALTER TABLE `client_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mechanics`
--
ALTER TABLE `mechanics`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
