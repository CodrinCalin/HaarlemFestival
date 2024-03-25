-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 20, 2024 at 11:33 PM
-- Server version: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Local Database: `haarlemdb`
-- Uncomment use below and comment the server use to switch, and vice versa.
/*use haarlemdb;*/

--
-- Server DB: 'ignas_haarlemdb'
use ignas_haarlemdb;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
     `id` int(11) UNIQUE NOT NULL AUTO_INCREMENT PRIMARY KEY,
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

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `permissions`, `date_created`) VALUES
      (1, 'system', 'system@haarlem-festival.nl', '$2y$10$PPUquDQo/Hd3GYL7CVyfVeJoY5FXQZMVpBXTFAuB6nZFRpGu3rpBC', NULL, NULL, 0, '2024-03-01 18:04:59'),
      (2, 'admin', 'admin@haarlem-festival.nl', '$2y$10$yhMvogSFkxkJu8FPfuhs5up6EO9qRL05Nqjzrywc2x0TDA0aiFLSy', NULL, NULL, 1, '2024-03-01 18:02:29');
      
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
-- Table structure for table `restaurant`
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
    `previewImage` text NOT NULL,
    `frontPageImage` text NOT NULL,
    `displayImageOne` text NOT NULL,
    `displayImageTwo` text NOT NULL,
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
    `id` int(11) NOT NULL PRIMARY KEY,
    `date` varchar(25) NOT NULL,
    `description` text NOT NULL,
    `reminder` text NOT NULL
);

--
-- Dumping data for table `yummyDetails`
--

INSERT INTO `yummyDetails` (`id`, `date`, `description`, `reminder`) VALUES
    (1, 'July 25th-28th', 'Come and see the participating restaurants at our very own food event at the Haarlem Festival. Featuring all sorts of different cuisines you''re sure to find something you that fits your tastes! Take a quick look at each restaurant and easily find out more about any restaurant and book your very own reservation by clicking "Learn More".', 'A reservation is mandatory to dine at participating restaurants, remember to book before you wish to dine!');

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
     `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `venue_img_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `name`, `address`, `venue_img_url`, `description`) VALUES
  (1, 'Lichtfabriek', 'Minckelersweg 2, 2031 EM Haarlem', 'img\\danceimages\\delichfabriek.png', "De Lichtfabriek in Haarlem is an industrial heritage site with a rich past and a bright future. Located at Energieplein 73, 2031 TC Haarlem, it offers a unique space for events, combining historical charm with modern amenities. \r\n\r\nThe venue includes distinctive areas such as the Turbinehal, Oliehuis, and Energiehuis, making it an ideal location for a diverse range of cultural and corporate events"),
  (2, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem', 'img\\danceimages\\clubstalker.png', "Club Stalker was a well-known nightclub in Haarlem, situated at Kromme Elleboogsteeg 20 in the city\'s old center. \r\n\r\nThe venue, which operated from 1983 until its closure in 2019, was once a warehouse and became known for playing a wide range of electronic music genres, from New Wave and Postpunk to House, Hip-hop, UK Garage, Drum-\'n-bass, Minimal, and Techno. \r\n\r\nIt was considered one of the better nightclubs in the Netherlands and was one of the country\'s oldest. The space that housed Club Stalker is set to be transformed into apartments​"),
  (3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'img\\danceimages\\jopenkerk.png', "Jopenkerk Haarlem is a unique venue located in the heart of the city at Gedempte Voldersgracht 2, 2011 WD Haarlem, Netherlands.\r\n\r\nThis historic church has been transformed into a brewery and restaurant, offering a taste of local Jopen beers paired with an extensive menu. Visitors can enjoy beer tastings and a view of the brewing process while dining. \r\n\r\nIt\'s an excellent choice for a cultural and culinary experience, blending the best of Haarlem\'s hospitality and brewing traditions​"),
  (4, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem', 'img\\danceimages\\clubruis.png', "Club Ruis in Haarlem represented a space for freedom and tolerance, offering an exclusive and international atmosphere. It was a place that promised a break from the everyday with a mix of innovative electronic music and a free-spirited vibe. \r\n\r\nLocated at Smedestraat 31, 2011 RE Haarlem, Netherlands, Club Ruis embraced prosperity and aimed to enhance the quality of nightlife."),
  (5, 'XO the Club', 'Grote Markt 8, 2011 RD Haarlem', 'img\\danceimages\\xotheclub.png', "\"XO the Club\" in Haarlem is a vibrant nightlife spot where every Friday and Saturday evening, guests are invited to dance the night away to various DJs or live acts. \r\n\r\nThe club opens at 23:00 and keeps the party going until 4:00 in the morning, offering a lively atmosphere for those 21 and older on Fridays and 23+ on Saturdays. \r\n\r\nThe location of the “XO The Club” is Grote Markt 8, 2011 RD Haarlem\r\n"),
  (6, 'Caprera Openluchttheater', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal', 'img\\danceimages\\capreraopenluchttheater.png', "Nestled between the dunes and the forest of Zuid Kennemerland, Caprera Openluchttheater is a beautiful open-air theatre in Bloemendaal, offering a unique ambiance for summer performances. \r\n\r\nIt\'s a place where you can enjoy a variety of shows including pop, cabaret, dance, and classical concerts under the stars. \r\n\r\nThe venue, with grandstands that seat 1,100 guests and additional standing room for large events, is located at Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal​");


-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `name`, `style`) VALUES
  (1, 'Hardwell', 'dance and house'),
  (2, 'Armin van Buuren', 'trance and techno'),
  (3, 'Martin Garrix', 'dance / electronic'),
  (4, 'Tiësto', 'trance, techno, minimal, house en electro'),
  (5, 'Nicky Romero', 'electrohouse/ progressive house'),
  (6, 'Afrojack', 'house');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `session_type` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `tickets_available` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `venue_name` varchar(255) DEFAULT NULL,
  `artist_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `date`, `time`, `session_type`, `duration`, `tickets_available`, `price`, `remarks`, `venue_name`, `artist_name`) VALUES
  (1, '2024-07-26', '20:00:00', 'Back2Back', 360, 1500, 75.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'Lichtfabriek', 'Nicky Romero, Afrojack'),
  (2, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'Club Stalker', 'Tiësto'),
  (3, '2024-07-26', '23:00:00', 'Club', 90, 300, 60.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'Jopenkerk', 'Hardwell'),
  (4, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'XO the Club', 'Armin van Buuren'),
  (5, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'Club Ruis', 'Martin Garrix'),
  (6, '2024-07-27', '14:00:00', 'Back2Back', 540, 2000, 110.00, '*All-Access pass for this day €125,00, All-Access pass for Fri, Sat, Sun: €250,00.', 'Caprera Openluchttheater', 'Hardwell/Martin Garrix/Armin Van Buuren'),
  (7, '2024-07-27', '22:00:00', NULL, 90, 300, 60.00, NULL, 'Jopenkerk', 'Afrojack'),
  (8, '2024-07-27', '21:00:00', NULL, 240, 1500, 75.00, NULL, 'Lichtfabriek', 'Tiësto'),
  (9, '2024-07-27', '23:00:00', NULL, 90, 200, 60.00, NULL, 'Club Stalker', 'Nicky Romero'),
  (10, '2024-07-28', '14:00:00', 'Day Pass', 540, 2000, 110.00, NULL, 'Caprera Openluchttheater', 'Afrojack/Tiësto/Nicky Romero'),
  (11, '2024-07-28', '19:00:00', NULL, 90, 300, 60.00, NULL, 'Jopenkerk', 'Armin Van Buuren'),
  (12, '2024-07-28', '21:00:00', NULL, 90, 1500, 90.00, NULL, 'XO the Club', 'Hardwell'),
  (13, '2024-07-28', '18:00:00', NULL, 90, 200, 60.00, NULL, 'Club Stalker', 'Martin Garrix');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
