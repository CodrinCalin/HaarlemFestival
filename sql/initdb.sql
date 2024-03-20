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

--
-- Database: `haarlemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
                           `artist_id` int(11) NOT NULL,
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
                          `event_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `username` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(1000) NOT NULL,
                         `first_name` varchar(255) DEFAULT NULL,
                         `last_name` varchar(255) DEFAULT NULL,
                         `permissions` int(11) DEFAULT 1,
                         `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `permissions`, `date_created`) VALUES
    (1, 'DanceUser', 'dance@gmail.com', '$2y$10$T2uFA95ANVdFhRp6W8Ay5O9K/Nt/jGxko.SJk.FyJozsCcEp/B1aO', NULL, NULL, 2, '2024-03-20 12:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
                          `venue_id` int(11) NOT NULL,
                          `name` varchar(255) DEFAULT NULL,
                          `address` varchar(255) DEFAULT NULL,
                          `venue_img_url` varchar(255) DEFAULT NULL,
                          `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `name`, `address`, `venue_img_url`, `description`) VALUES
                                                                                         (1, 'Lichtfabriek', 'Minckelersweg 2, 2031 EM Haarlem', 'img\\danceimages\\delichfabriek.png', 'De Lichtfabriek in Haarlem is an industrial heritage site with a rich past and a bright future. Located at Energieplein 73, 2031 TC Haarlem, it offers a unique space for events, combining historical charm with modern amenities. \r\n\r\nThe venue includes distinctive areas such as the Turbinehal, Oliehuis, and Energiehuis, making it an ideal location for a diverse range of cultural and corporate events'),
                                                                                         (2, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem', 'img\\danceimages\\clubstalker.png', 'Club Stalker was a well-known nightclub in Haarlem, situated at Kromme Elleboogsteeg 20 in the city\'s old center. \r\n\r\nThe venue, which operated from 1983 until its closure in 2019, was once a warehouse and became known for playing a wide range of electronic music genres, from New Wave and Postpunk to House, Hip-hop, UK Garage, Drum-\'n-bass, Minimal, and Techno. \r\n\r\nIt was considered one of the better nightclubs in the Netherlands and was one of the country\'s oldest. The space that housed Club Stalker is set to be transformed into apartments​'),
(3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'img\\danceimages\\jopenkerk.png', 'Jopenkerk Haarlem is a unique venue located in the heart of the city at Gedempte Voldersgracht 2, 2011 WD Haarlem, Netherlands.\r\n\r\nThis historic church has been transformed into a brewery and restaurant, offering a taste of local Jopen beers paired with an extensive menu. Visitors can enjoy beer tastings and a view of the brewing process while dining. \r\n\r\nIt\'s an excellent choice for a cultural and culinary experience, blending the best of Haarlem\'s hospitality and brewing traditions​'),
(4, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem', 'img\\danceimages\\clubruis.png', 'Club Ruis in Haarlem represented a space for freedom and tolerance, offering an exclusive and international atmosphere. It was a place that promised a break from the everyday with a mix of innovative electronic music and a free-spirited vibe. \r\n\r\nLocated at Smedestraat 31, 2011 RE Haarlem, Netherlands, Club Ruis embraced prosperity and aimed to enhance the quality of nightlife.'),
(5, 'XO the Club', 'Grote Markt 8, 2011 RD Haarlem', 'img\\danceimages\\xotheclub.png', '\"XO the Club\" in Haarlem is a vibrant nightlife spot where every Friday and Saturday evening, guests are invited to dance the night away to various DJs or live acts. \r\n\r\nThe club opens at 23:00 and keeps the party going until 4:00 in the morning, offering a lively atmosphere for those 21 and older on Fridays and 23+ on Saturdays. \r\n\r\nThe location of the “XO The Club” is Grote Markt 8, 2011 RD Haarlem\r\n'),
(6, 'Caprera Openluchttheater', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal', 'img\\danceimages\\capreraopenluchttheater.png', 'Nestled between the dunes and the forest of Zuid Kennemerland, Caprera Openluchttheater is a beautiful open-air theatre in Bloemendaal, offering a unique ambiance for summer performances. \r\n\r\nIt\'s a place where you can enjoy a variety of shows including pop, cabaret, dance, and classical concerts under the stars. \r\n\r\nThe venue, with grandstands that seat 1,100 guests and additional standing room for large events, is located at Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal​');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
