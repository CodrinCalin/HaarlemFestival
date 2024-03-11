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
    `tags` varchar(65) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
                         `id` int(11) NOT NULL,
                         `category` varchar(55) NOT NULL,
                         `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `category`, `text`) VALUES
   (1, '', "July 2024"),
   (2, '', "Immerse yourself in the vibrant beats of Haarlem Dance! Join us for an electrifying showcase featuring the finest DJs, where each set promises to transport you through the realms of electronic music. From pulsating bass lines to soaring melodies, get ready to dance the night away in an unforgettable atmosphere. Don\'t miss out on this rhythmic extravaganza!\r\n\r\n\r\n\r\nThe event will take place on the 26, 27 and 28th of July"),
   (3, '', "Browse through 7 different unique restaurants in the Yummy! event, each restaurant featuring delicious cuisine so you’re guaranteed to find something you like. \r\n\r\nThe 7 different restaurants are categorized with restaurants featuring more seafood and others featuring a more international cuisine, quickly learn more about each different restaurant and make a reservation directly on the same page.\r\n\r\nThe event will take place on the 25, 26, 27, and 28th of July."),
   (4, '', "Stroll Through History is a walking tour, where we will visit nine of Haarlem’s historic landmarks and learn more about them.\r\n\r\nThe city of Haarlem boast a profoundly rich and captivating history. Haarlem is a very old city with turbulent history and great sites to see. We want to invite people to come to Haarlem and feast their eyes on the splendour of old and new.\r\n\r\nThe event will take place on the 25, 26, 27 and 28th of July.\r\n\r\nThe tour is offered in three languages: English, Dutch and Mandarin."),
   (5, '', "Explore the wonders of art and history with the Teyler Museum\'s Children Puzzle App! With its engaging historical material and fascinating puzzles, this interactive program is perfect for young brains as it combines education and fun. It gives kids an enjoyable approach to discover the wonders of art."),
   (6, '', "The city of Haarlem boast a profoundly rich and captivating history. Therefore we will be offering a guided tour through Haarlem, visiting buildings and places that offered an important contribution to Haarlem’s history. During the event stroll through history we will visit nine of Haarlem’s historic landmarks, by foot. Haarlem is a very old city with turbulent history and great sites to see. We want to invite people to come to Haarlem and feast their eyes on the splendour of old and new."),
   (7, 'history_practicalInformation', 'Duration:\r\n2.5 hours.'),
   (8, 'history_practicalInformation', 'When:\r\nThursday 25th of July 2024 to Sunday 28 July 2024.'),
   (9, 'history_practicalInformation', 'Break:\r\n15 minutes, including one free drink per person.'),
   (10, 'history_practicalInformation', 'Group size:\r\n12 participants and 1 tour guide.'),
   (11, 'history_practicalInformation', 'Price:\r\n€ 17,50 per person. Or € 60,- for a group of 4.'),
   (12, '', 'We host the tour in 3 different languages, below you’ll find the schedule for each language.  '),
   (13, '', 'Church of St. Bavo'),
   (14, '', 'Grote Markt 22, 2011 RD Haarlem'),
   (15, '', 'The tour will start at the Church of St. Bavo, at the Grote Markt, in the centre of Haarlem. The exact location will be marked with a big flag.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
