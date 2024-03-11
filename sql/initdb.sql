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
     `id` int(11) UNIQUE NOT NULL,
     `username` varchar(255) UNIQUE NOT NULL,
     `email` varchar(255) UNIQUE NOT NULL,
     `password` varchar(1000) NOT NULL,
     `first_name` varchar(255) NULL,
     `last_name` varchar(255) NULL,
     `permissions` int(11) DEFAULT 1,
     `date_created` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--


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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

-- --------------------------------------------------------

--
-- Table structure for table `restaurantCategory`
--

CREATE TABLE `restaurantCategory` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `category` varchar(21) NOT NULL,
    `order` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurantCategory`
--

INSERT INTO `restaurantCategory` (`id`, `category`, `order`) VALUES
    (1, 'From The Sea', 1),
    (2, 'International Cuisine', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantCategory`
--

CREATE TABLE `restaurant` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(50) NOT NULL,
    `tags` varchar(35) NOT NULL,
    `rating` int NOT NULL,
    `address` varchar(100) NOT NULL,
    `phoneNumber` varchar(25) NOT NULL,
    `menuLink` varchar(255) NOT NULL,
    `menuText` text NOT NULL,
    `description` text NOT NULL,
    `adultPrice` float NOT NULL,
    `childPrice` float NOT NULL,
    `previewImage` blob NOT NULL,
    `frontPageImage` blob NOT NULL,
    `displayImageOne` blob NOT NULL,
    `displayImageTwo` blob NOT NULL,
    `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `restaurant`
ADD CONSTRAINT `FK_CATEGORY_ID` FOREIGN KEY (`category`) REFERENCES `restaurantCategory`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (id, name, tags, rating, address, phoneNumber, menuLink, menuText, `description`, adultPrice, childPrice, previewImage, frontPageImage, displayImageOne, displayImageTwo, category) VALUES
    (1, 'Ratatouille', 'French,Fish and Seafood,European', 4, 'Spaarne 96, 2011 CL Haarlem', '123', 'google.com', 'foo', 'foo', 5, 5, 'Ratatouille', 'Ratatouille', 'Ratatouille', 'Ratatouille', 1),
    (2, 'ML', 'Dutch,Fish and Seafood,European', 4, 'Kleine Houtstraat 70, 2011 DR Haarlem', '123', 'google.com', 'foo', 'foo', 5, 5, 'Ratatouille', 'Ratatouille', 'Ratatouille', 'Ratatouille', 1),
    (3, 'Fris', 'Dutch,French,European', 4, 'Twijnderslaan 7, 2012 BG Haarlem', '123', 'google.com', 'foo', 'foo', 5, 5, 'Ratatouille', 'Ratatouille', 'Ratatouille', 'Ratatouille', 2),
    (4, 'Specktakel', 'Asian,International,European', 3, 'Spekstraat 4, 2011 HM Haarlem', '123', 'google.com', 'foo', 'foo', 5, 5, 'Ratatouille', 'Ratatouille', 'Ratatouille', 'Ratatouille', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantSession`
--

CREATE TABLE `restaurantSession` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `timeslot` DATETIME NOT NULL,
    `availableSeats` int NOT NULL,
    `restaurant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `restaurantSession`
ADD CONSTRAINT `FK_RESTAURANT_ID` FOREIGN KEY (`restaurant`) REFERENCES `restaurant`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- --------------------------------------------------------

--
-- Table structure for table `yummyDetails`
--

CREATE TABLE `yummyDetails` (
    `date` varchar(50) NOT NULL PRIMARY KEY,
    `description` text NOT NULL,
    `reminder` text NOT NULL
);

--
-- Dumping data for table `yummyDetails`
--

INSERT INTO `yummyDetails` (`date`, `description`, `reminder`) VALUES
    ('July 25th-28th', 'Come and see the participating restaurants at our very own food event at the Haarlem Festival. Featuring all sorts of different cuisines you''re sure to find something you that fits your tastes! Take a quick look at each restaurant and easily find out more about any restaurant and book your very own reservation by clicking "Learn More".', 'A reservation is mandatory to dine at participating restaurants, remember to book before you wish to dine!');


-- --------------------------------------------------------

--
-- Table structure for table `resetTokens`
--

CREATE TABLE `resetTokens` (
     `id` int(11) AUTO_INCREMENT PRIMARY KEY,
     `email` varchar(255) NOT NULL,
     `token` VARCHAR(255) NOT NULL,
     `expiration` datetime  NOT NULL,
     `date_created` datetime  DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetTokens`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `resetTokens`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resetTokens`
--

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
