-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 30, 2021 at 02:48 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haarlemdb`
--

use haarlemdb;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
     `id` int(11) NOT NULL,
     `username` varchar(255) NOT NULL,
     `email` varchar(255) NOT NULL,
     `password` varchar(1000) NOT NULL,
     `first_name` varchar(255) NULL,
     `last_name` varchar(255) NULL,
     `date_created` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `date_created`) VALUES
    (1, 'Admin', 'admin@gmail.com', 'admin', 'Admin','Administrator', default),
    (2, 'User', 'user@gmail.com', 'user', 'User','Customer', '2022-11-30 13:09:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Table structure for table `restaurantCategory`
--

CREATE TABLE `restaurantCategory` (
                         `id` int(11) NOT NULL,
                         `category` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurantCategory`
--

INSERT INTO `restaurantCategory` (`id`, `category`) VALUES
    (1, 'From The Sea'),
    (2, 'International Cuisine');

--
-- Indexes for table `restaurantCategory`
--
ALTER TABLE `restaurantCategory`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `restaurantCategory`
--
ALTER TABLE `restaurantCategory`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
