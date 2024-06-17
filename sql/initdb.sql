-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 45.32.235.205
-- Generation Time: Jun 17, 2024 at 02:55 PM
-- Server version: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ignas_haarlemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
                           `artist_id` int(11) NOT NULL,
                           `name` varchar(255) DEFAULT NULL,
                           `style` varchar(255) DEFAULT NULL,
                           `card_image_url` varchar(255) DEFAULT NULL,
                           `title` varchar(255) DEFAULT NULL,
                           `artist_main_img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `name`, `style`, `card_image_url`, `title`, `artist_main_img_url`) VALUES
                                                                                                           (1, 'Hardwell', 'dance and house', 'img/danceimages/hardwell (2).png', NULL, NULL),
                                                                                                           (2, 'Armin van Buuren', 'trance and techno', 'img/danceimages/armin.png', 'Trance Titan', 'img\\danceimages\\dancedetail\\Main_image_armin.png'),
                                                                                                           (3, 'Martin Garrix', 'dance / electronic', 'img/danceimages/martin.png', 'Dance Maestro', 'img\\danceimages\\dancedetail\\BackroundMartin.png'),
                                                                                                           (4, 'Tiësto', 'trance, techno, minimal, house en electro', 'img/danceimages/tiesto1.png', NULL, NULL),
                                                                                                           (5, 'Nicky Romero', 'electrohouse/ progressive house', 'img/danceimages/nicky.png', NULL, NULL),
                                                                                                           (6, 'Afrojack', 'house', 'img/danceimages/afrojack.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `danceContentDetail`
--

CREATE TABLE `danceContentDetail` (
                                      `id` int(11) NOT NULL,
                                      `artist_id` int(11) DEFAULT NULL,
                                      `description_image` varchar(255) DEFAULT NULL,
                                      `description_body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danceContentDetail`
--

INSERT INTO `danceContentDetail` (`id`, `artist_id`, `description_image`, `description_body`) VALUES
                                                                                                  (1, 2, 'img/danceimages/dancedetail/description_1_armin.png', 'Armin van Buuren, a name synonymous with the evolution of trance and electronic music, was born on December 25, 1976, in Leiden, Netherlands. Growing up in a musical family, Armin found his passion for music early on. He was inspired by the electronic sounds of the \'80s and started making music of his own with a computer when he was just 14 years old.\r\n\r\nArmin\'s dedication to his craft led him to study law at Leiden University, but his love for music never waned. His DJ career began to take off while he was still in school, and he quickly realized that his true calling was in music. In 1999, he scored his first major success with \"Communication,\" which became a hit in the dance music charts worldwide.\r\n\r\nKnown for his uplifting trance productions, Armin van Buuren has become an iconic figure in the EDM scene. His radio show, \"A State of Trance,\" has been instrumental in bringing trance music to a global audience, broadcasting to millions of listeners in over 84 countries. This show has been a launching pad for many tracks that have become staples in the trance community.'),
                                                                                                  (2, 2, 'img/danceimages/dancedetail/description_2_armin.png', 'Armin\'s consistency and presence in the scene are unmatched, with a career spanning over two decades filled with original tracks, remixes, and collaborations with artists like Nadia Ali, Sophie Ellis-Bextor, and Trevor Guthrie. His discography includes hits like \"In and Out of Love,\" \"This Is What It Feels Like,\" and \"Blah Blah Blah,\" showcasing his ability to blend emotive melodies with driving beats.\r\n\r\nArmin van Buuren has been recognized with numerous awards and accolades, including multiple DJ Mag Top 100 DJs poll victories, showcasing his enduring appeal and influence in the world of electronic music. He has performed at the world\'s biggest festivals, including Tomorrowland and Ultra Music Festival, and has headlined countless shows and tours, sharing his love for trance music with a passionate global fanbase.\r\n\r\nAs a producer, DJ, label owner, and ambassador for trance, Armin van Buuren continues to set the standard for what it means to be at the forefront of electronic music. His visionary approach to DJing and music production ensures that his legacy will resonate for generations to come.');

-- --------------------------------------------------------

--
-- Table structure for table `dancecontenthome`
--

                                                                                                   CREATE TABLE `dancecontenthome` (
                                                                                                   `id` int(11) NOT NULL,
                                                                                                   `main_image_url` varchar(255) NOT NULL,
                                                                                                   `introduction_title` varchar(255) NOT NULL,
                                                                                                   `introduction_subtitle` varchar(255) NOT NULL,
                                                                                                   `introduction_text` text NOT NULL
                                                                                                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dancecontenthome`
--

INSERT INTO `dancecontenthome` (`id`, `main_image_url`, `introduction_title`, `introduction_subtitle`, `introduction_text`) VALUES
    (1, 'http://example.com/images/main.jpg', 'Welcome to Haarlem Dance Festival', 'The Ultimate Dance Experience', 'Join us for an unforgettable adventure into the world of dance. Enjoy performances from top artists, workshops, and immersive experiences that will make your summer truly spectacular.');

-- --------------------------------------------------------

--
-- Table structure for table `danceEvents`
--

CREATE TABLE `danceEvents` (
                               `event_id` int(11) NOT NULL,
                               `date` date DEFAULT NULL,
                               `time` time DEFAULT NULL,
                               `session_type` varchar(255) DEFAULT NULL,
                               `duration` int(11) DEFAULT NULL,
                               `tickets_available` int(11) DEFAULT NULL,
                               `price` decimal(10,2) DEFAULT NULL,
                               `venue_name` varchar(255) DEFAULT NULL,
                               `artist_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danceEvents`
--

INSERT INTO `danceEvents` (`event_id`, `date`, `time`, `session_type`, `duration`, `tickets_available`, `price`, `venue_name`, `artist_name`) VALUES
                                                                                                                                                  (1, '2024-07-26', '20:00:00', 'Back2Back', 360, 1500, 75.00, 'Lichtfabriek', 'Nicky Romero, Afrojack'),
                                                                                                                                                  (2, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, 'Club Stalker', 'Tiësto'),
                                                                                                                                                  (3, '2024-07-26', '23:00:00', 'Club', 90, 300, 60.00, 'Jopenkerk', 'Hardwell'),
                                                                                                                                                  (4, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, 'XO the Club', 'Armin van Buuren'),
                                                                                                                                                  (5, '2024-07-26', '22:00:00', 'Club', 90, 200, 60.00, 'Club Ruis', 'Martin Garrix'),
                                                                                                                                                  (6, '2024-07-27', '14:00:00', 'Back2Back', 540, 2000, 110.00, 'Caprera Openluchttheater', 'Hardwell/Martin Garrix/Armin Van Buuren'),
                                                                                                                                                  (7, '2024-07-27', '22:00:00', NULL, 90, 300, 60.00, 'Jopenkerk', 'Afrojack'),
                                                                                                                                                  (8, '2024-07-27', '21:00:00', NULL, 240, 1500, 75.00, 'Lichtfabriek', 'Tiësto'),
                                                                                                                                                  (9, '2024-07-27', '23:00:00', NULL, 90, 200, 60.00, 'Club Stalker', 'Nicky Romero'),
                                                                                                                                                  (10, '2024-07-28', '14:00:00', 'Day Pass', 540, 2000, 110.00, 'Caprera Openluchttheater', 'Afrojack/Tiësto/Nicky Romero'),
                                                                                                                                                  (11, '2024-07-28', '19:00:00', NULL, 90, 300, 60.00, 'Jopenkerk', 'Armin Van Buuren'),
                                                                                                                                                  (12, '2024-07-28', '21:00:00', NULL, 90, 1500, 90.00, 'XO the Club', 'Hardwell'),
                                                                                                                                                  (13, '2024-07-28', '18:00:00', NULL, 90, 200, 60.00, 'Club Stalker', 'Martin Garrix');

-- --------------------------------------------------------

--
-- Table structure for table `festivalEvents`
--

CREATE TABLE `festivalEvents` (
                                  `id` int(11) NOT NULL,
                                  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivalEvents`
--

INSERT INTO `festivalEvents` (`id`, `name`) VALUES
                                                (1, 'DANCE!'),
                                                (2, 'Yummy!'),
                                                (3, 'Stroll Through History'),
                                                (4, 'The Secret Of Professor Teyler');

-- --------------------------------------------------------

--
-- Table structure for table `festivalSchedule`
--

CREATE TABLE `festivalSchedule` (
                                    `id` int(11) NOT NULL,
                                    `event` int(11) NOT NULL,
                                    `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festivalSchedule`
--

INSERT INTO `festivalSchedule` (`id`, `event`, `date`) VALUES
                                                           (1, 1, '2024-07-26 00:00:00'),
                                                           (2, 1, '2024-07-27 00:00:00'),
                                                           (3, 1, '2024-07-28 00:00:00'),
                                                           (4, 2, '2024-07-25 00:00:00'),
                                                           (5, 2, '2024-07-26 00:00:00'),
                                                           (6, 2, '2024-07-27 00:00:00'),
                                                           (7, 2, '2024-07-28 00:00:00'),
                                                           (8, 3, '2024-07-25 00:00:00'),
                                                           (9, 3, '2024-07-26 00:00:00'),
                                                           (10, 3, '2024-07-27 00:00:00'),
                                                           (11, 3, '2024-07-28 00:00:00'),
                                                           (12, 4, '2024-07-25 00:00:00'),
                                                           (13, 4, '2024-07-26 00:00:00'),
                                                           (14, 4, '2024-07-27 00:00:00'),
                                                           (15, 4, '2024-07-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `historyContent`
--

CREATE TABLE `historyContent` (
                                  `id` int(11) NOT NULL,
                                  `category` varchar(255) DEFAULT NULL,
                                  `content` mediumtext NOT NULL,
                                  `addition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historyContent`
--

INSERT INTO `historyContent` (`id`, `category`, `content`, `addition`) VALUES
                                                                           (1, '', '   The city of Haarlem boast a profoundly rich and captivating history. Therefore we will be offering a guided tour through Haarlem, visiting buildings and places that offered an important contribution to Haarlem’s history. During the event stroll through history we will visit nine of Haarlem’s historic landmarks, by foot. Haarlem is a very old city with turbulent history and great sites to see. We want to invite people to come to Haarlem and feast their eyes on the splendour of old and new.', ''),
                                                                           (2, 'practicalInformation', 'Duration:\r\n2.5 hours.', '\\img\\history\\duration_icon.png'),
                                                                           (3, 'practicalInformation', 'When:\r\nThursday 25th of July 2024 to Sunday 28 July 2024.', '\\img\\history\\when_icon.png'),
                                                                           (4, 'practicalInformation', 'Break:\r\n15 minutes, including one free drink per person.', '\\img\\history\\break_icon.png'),
                                                                           (5, 'practicalInformation', 'Group size:\r\n12 participants and 1 tour guide.', '\\img\\history\\groupsize_icon.png'),
                                                                           (6, 'practicalInformation', 'Price:\r\n€ 17,50 per person. Or € 60,- for a group of 4.', '\\img\\history\\price_icon.png'),
                                                                           (7, '', 'We host the tour in 3 different languages, below you’ll find the schedule for each language.  ', ''),
                                                                           (8, '', 'Church of St. Bavo', ''),
                                                                           (9, '', 'Grote Markt 22, 2011 RD Haarlem', ''),
                                                                           (10, '', 'The tour will start at the Church of St. Bavo, at the Grote Markt, in the centre of Haarlem. The exact location will be marked with a big flag.', ''),
                                                                           (11, 'faq', 'Where do we gather?', 'The tour starts near the Church of St. Bavo at the Grote Markt, in the centre of Haarlem. A giant flag will mark the exact starting location.'),
                                                                           (12, 'faq', 'How long does the event last?', 'The duration of the walking tour is approximately 2,5 hours.'),
                                                                           (13, 'faq', 'Is there a break during the event?', 'During the tour, there will be a 15 minute break, including one free drink per person.'),
                                                                           (14, 'faq', 'Is the event free?', 'No. Participating in the event costs € 17,50 per person, or € 60,- for a group of 4.'),
                                                                           (15, 'faq', 'How old do I need to be to participate?', 'You need to be at least 12 years old to participate.'),
                                                                           (16, 'faq', 'Can I bring a stroller?', 'No. Sadly bringing a stroller is not allowed during the event. '),
                                                                           (17, 'faq', 'Is the event wheelchair friendly?', 'We don’t recommend attending with a wheelchair. Not all location we will be entering are wheelchair accessible, so you will be missing out on some things, if you do wish to attend on a wheelchair.'),
                                                                           (18, 'faq', 'How much walking is involved during the tour?', 'We will walk approximately.'),
                                                                           (19, 'faq', 'How big is each tour group?', 'The group size of each tour is 12 participants and 1 tour guide.'),
                                                                           (20, 'location1', 'Church of St. Bavo', 'title'),
                                                                           (21, 'location1', 'The St. Bavo Church stands as a testament to the rich history and architectural grandeur of Haarlem. The church is officially named the Grote Kerk, meaning \"Great Church,\" and is dedicated to Saint Bavo, a 7th-century Flemish saint. It is one of the most significant landmarks in the city and a masterpiece of Gothic architecture.', 'description'),
                                                                           (22, 'location1', 'The Church of St. Bavo is the first location we will be visiting during the tour. The Church of St. Bavo, also knows as the Grote Kerk (Great Church), is dedicated to Saint Bavo, a 7th-century Flemish saint. The Church is the main Protestant Church in Haarlem. It is one of the most significant landmarks in the city and a masterpiece of Gothic architecture.', 'text1'),
                                                                           (23, 'location1', 'Grote Markt 22, 2011 RD Haarlem', 'address'),
                                                                           (24, 'location1', 'The church has a rich history that dates back to the 14th century. Construction of the church began in the mid-14th century and continued over several centuries, with various architectural styles represented in its structure.\r\n\r\nThe church is known for its impressive Gothic architecture and features such as the towering steeple, which stands as one of the tallest in the Netherlands.\r\n\r\nThe Church of St. Bavo is a symbol of Haarlem\'s cultural heritage and religious history. Its architecture and interior reflect the changing styles and artistic achievements of different periods.\r\n', 'text2'),
(25, 'location1', 'Inside the Church of St. Bavo, visitors can find numerous works of art, including the famous Muller organ, built by Christian Müller in the 18th century. This organ is renowned for its size and musical quality.\r\nThe church houses several notable artworks, including the tomb of Frans Hals, the renowned Dutch Golden Age painter. Hals was buried in the church in 1666.\r\nThe aforementioned Muller organ is a masterpiece of organ building and is a major draw for music enthusiasts and tourists alike.\r\n', 'text3'),
(26, 'location1', 'It is a place of worship and holds regular religious services.\r\n\r\nAdditionally, the church is a venue for concerts and cultural events due to its impressive acoustics and historical significance.\r\n', 'text4'),
(27, 'location1', 'In summary, the Church of St. Bavo in Haarlem is not only a place of worship but also a historical and cultural treasure that contributes significantly to the identity and heritage of the city. Its architecture, artworks, and cultural events make it a central element in Haarlem\'s vibrant cultural landscape.', 'text5'),
                                                                           (28, 'faq', 'Hello', 'Test Test');

-- --------------------------------------------------------

--
-- Table structure for table `historyLocation`
--

CREATE TABLE `historyLocation` (
                                   `id` int(11) NOT NULL,
                                   `name` varchar(255) NOT NULL,
                                   `description` mediumtext NOT NULL,
                                   `address` varchar(255) NOT NULL,
                                   `latitude` double NOT NULL,
                                   `longitude` double NOT NULL,
                                   `text1` mediumtext NOT NULL,
                                   `text2` mediumtext NOT NULL,
                                   `text3` mediumtext NOT NULL,
                                   `text4` mediumtext NOT NULL,
                                   `text5` mediumtext NOT NULL,
                                   `img1` varchar(255) NOT NULL,
                                   `img2` varchar(255) NOT NULL,
                                   `img3` varchar(255) NOT NULL,
                                   `img4` varchar(255) NOT NULL,
                                   `img5` varchar(255) NOT NULL,
                                   `img6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historyLocation`
--

INSERT INTO `historyLocation` (`id`, `name`, `description`, `address`, `latitude`, `longitude`, `text1`, `text2`, `text3`, `text4`, `text5`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES
                                                                                                                                                                                                 (1, 'Church Of St. Bavo', 'The St. Bavo Church stands as a testament to the rich history \r\nand architectural grandeur of Haarlem. The church is officially named the Grote Kerk, \r\nmeaning \"Great Church,\" and is dedicated to Saint Bavo, a 7th-century Flemish saint. \r\nIt is one of the most significant landmarks in the city and a masterpiece of Gothic \r\narchitecture.', 'Grote Markt 22, 2011 RD Haarlem', 52.38119025306136, 4.637248966612672, '\r\nThe Church of St. Bavo is the first location we will be visiting during the tour. T\r\nhe Church of St. Bavo, also knows as the Grote Kerk (Great Church), is dedicated to \r\nSaint Bavo, a 7th-century Flemish saint. The Church is the main Protestant Church in \r\nHaarlem. It is one of the most significant landmarks in the city and a masterpiece of \r\nGothic architecture.', 'The church has a rich history that dates back to the 14th c\r\nentury. Construction of the church began in the mid-14th century and continued \r\nover several centuries, with various architectural styles represented in its structure.\r\n\r\nThe church is known for its impressive Gothic architecture and features such as the towering steeple, which stands as one of the tallest in the Netherlands.\r\n\r\nThe Church of St. Bavo is a symbol of Haarlem\'s cultural heritage and religious history. Its architecture and interior reflect the changing styles and artistic achievements of different periods.\r\n', 'Inside the Church of St. Bavo, visitors can find numerous works of art, including the famous Muller organ, built by Christian Müller in the 18th century. This organ is renowned for its size and musical quality.\r\nThe church houses several notable artworks, including the tomb of Frans Hals, the renowned Dutch Golden Age painter. Hals was buried in the church in 1666.\r\nThe aforementioned Muller organ is a masterpiece of organ building and is a major draw for music enthusiasts and tourists alike.\r\n', 'It is a place of worship and holds regular religious services.\r\n\r\nAdditionally, the church is a venue for concerts and cultural events due to its impressive acoustics and historical significance.\r\n', 'In summary, the Church of St. Bavo in Haarlem is not only a place of worship but also a historical and cultural treasure that contributes significantly to the identity and heritage of the city. Its architecture, artworks, and cultural events make it a central element in Haarlem\'s vibrant cultural landscape.', '', '', '', '', '', ''),
                                                                                                                                                                                                 (2, 'Grote Markt', 'The St. Bavo Church stands as a testament to the rich history and architectural grandeur of Haarlem. The church is officially named the Grote Kerk, meaning \"Great Church,\" and is dedicated to Saint Bavo, a 7th-century Flemish saint. It is one of the most significant landmarks in the city and a masterpiece of Gothic architecture.', '2011 RD Haarlem', 52.3814882227086, 4.635871561225856, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (3, 'De Hallen', 'De Hallen Haarlem is situated in a former industrial complex, which adds to its unique character. The complex, dating back to the 19th century, was originally a locomotive factory. De Hallen Haarlem serves as a multifunctional space that encompasses various cultural activities. It includes exhibition spaces, a museum, a library, and facilities for events and performances.', 'Grote Markt 16, 2011 RD Haarlem', 52.38120761829213, 4.636029708666626, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (4, 'Proveniershof', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Grote Houtstraat 142D, 2011 SV Haarlem', 52.37745451451081, 4.630803339621782, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (5, 'Jopenkerk', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 52.381345450512995, 4.629710039621986, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (6, 'Waalse kerk', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Begijnhof 28, 2011 HE Haarlem', 52.38264354163614, 4.639110981952301, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (7, 'Molen de Adriaan', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Papentorenvest 1A, 2011 AV Haarlem', 52.38392946323394, 4.64274817030115, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (8, 'Amsterdamse poort', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', '2011 BZ Haarlem', 52.38058821138203, 4.646577339621939, '', '', '', '', '', '', '', '', '', '', ''),
                                                                                                                                                                                                 (9, 'Hof van bakenes', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Wijde Appelaarsteeg 11F, 2011 HB Haarlem', 52.38168600509787, 4.639780497291783, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `historySchedule`
--

CREATE TABLE `historySchedule` (
                                   `id` int(11) NOT NULL,
                                   `language` varchar(255) NOT NULL,
                                   `startTime` datetime NOT NULL,
                                   `endTime` datetime NOT NULL,
                                   `tourGuide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `historySchedule`
--

INSERT INTO `historySchedule` (`id`, `language`, `startTime`, `endTime`, `tourGuide`) VALUES
                                                                                          (1, 'english', '2024-07-25 10:00:00', '2024-07-25 12:30:00', 'Frederic'),
                                                                                          (2, 'english', '2024-07-25 13:00:00', '2024-07-25 15:30:00', 'Frederic'),
                                                                                          (3, 'english', '2024-07-25 16:00:00', '2024-07-25 18:30:00', 'Frederic'),
                                                                                          (4, 'english', '2024-07-26 10:00:00', '2024-07-26 12:30:00', 'William'),
                                                                                          (5, 'english', '2024-07-26 13:00:00', '2024-07-26 15:30:00', 'William'),
                                                                                          (6, 'english', '2024-07-26 16:00:00', '2024-07-26 18:30:00', 'William'),
                                                                                          (7, 'english', '2024-07-27 10:00:00', '2024-07-27 12:30:00', 'Frederic & William'),
                                                                                          (8, 'english', '2024-07-27 13:00:00', '2024-07-27 15:30:00', 'Frederic & William'),
                                                                                          (9, 'english', '2024-07-27 16:00:00', '2024-07-27 18:30:00', 'Frederic'),
                                                                                          (10, 'english', '2024-07-28 10:00:00', '2024-07-28 12:30:00', 'Deindre & Frederic'),
                                                                                          (11, 'english', '2024-07-28 13:00:00', '2024-07-28 15:30:00', 'Deindre, Frederic & William'),
                                                                                          (12, 'english', '2024-07-28 16:00:00', '2024-07-28 18:30:00', 'Deindre'),
                                                                                          (13, 'dutch', '2024-07-25 10:00:00', '2024-07-25 12:30:00', 'Jan-Willem'),
                                                                                          (14, 'dutch', '2024-07-25 13:00:00', '2024-07-25 15:30:00', 'Jan-Willem'),
                                                                                          (15, 'dutch', '2024-07-25 16:00:00', '2024-07-25 18:30:00', 'Jan-Willem'),
                                                                                          (16, 'dutch', '2024-07-26 10:00:00', '2024-07-26 12:30:00', 'Annet'),
                                                                                          (17, 'dutch', '2024-07-26 13:00:00', '2024-07-26 15:30:00', 'Annet'),
                                                                                          (18, 'dutch', '2024-07-26 16:00:00', '2024-07-26 18:30:00', 'Annet'),
                                                                                          (19, 'dutch', '2024-07-27 10:00:00', '2024-07-27 12:30:00', 'Annet & Jan-Willem'),
                                                                                          (20, 'dutch', '2024-07-27 13:00:00', '2024-07-27 15:30:00', 'Annet & Jan-Willem'),
                                                                                          (21, 'dutch', '2024-07-27 16:00:00', '2024-07-27 18:30:00', 'Annet'),
                                                                                          (22, 'dutch', '2024-07-28 10:00:00', '2024-07-28 12:30:00', 'Lisa & Annet'),
                                                                                          (23, 'dutch', '2024-07-28 13:00:00', '2024-07-28 15:30:00', 'Lisa, Annet & Jan-Willem'),
                                                                                          (24, 'dutch', '2024-07-28 16:00:00', '2024-07-28 18:30:00', 'Lisa'),
                                                                                          (25, 'mandarin', '2024-07-26 13:00:00', '2024-07-26 15:30:00', 'Kim'),
                                                                                          (26, 'mandarin', '2024-07-27 13:00:00', '2024-07-27 15:30:00', 'Kim'),
                                                                                          (27, 'mandarin', '2024-07-27 16:00:00', '2024-07-27 18:30:00', 'Kim'),
                                                                                          (28, 'mandarin', '2024-07-28 10:00:00', '2024-07-28 12:30:00', 'Kim'),
                                                                                          (29, 'mandarin', '2024-07-28 13:00:00', '2024-07-28 15:30:00', 'Kim & Susan');

-- --------------------------------------------------------

--
-- Table structure for table `notableTracks`
--

CREATE TABLE `notableTracks` (
                                 `id` int(11) NOT NULL,
                                 `artist_id` int(11) DEFAULT NULL,
                                 `track_image` varchar(255) DEFAULT NULL,
                                 `track_title` varchar(255) DEFAULT NULL,
                                 `track_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notableTracks`
--

INSERT INTO `notableTracks` (`id`, `artist_id`, `track_image`, `track_title`, `track_url`) VALUES
                                                                                               (1, 2, 'img\\danceimages\\dancedetail\\BlahArmin.png', 'Blah Blah Blah', 'https://open.spotify.com/track/2xkrujtSjZz7EKAYGbIIzH'),
                                                                                               (2, 2, 'img\\danceimages\\dancedetail\\FeelSomethingArmin.png', 'Feel Something', 'https://open.spotify.com/track/5VNcKdmfAAsfbxbuo1Y7Vl'),
                                                                                               (3, 2, 'img\\danceimages\\dancedetail\\ThisIsWhatItFeelsLikeArmin.png', 'This Is What It Feel Like', 'https://open.spotify.com/track/5GjnIpUlLGEIYk052ISOw9');

-- --------------------------------------------------------

--
-- Table structure for table `resetTokens`
--

CREATE TABLE `resetTokens` (
                               `id` int(11) NOT NULL,
                               `email` varchar(255) NOT NULL,
                               `token` varchar(255) NOT NULL,
                               `expiration` datetime NOT NULL,
                               `date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resetTokens`
--

INSERT INTO `resetTokens` (`id`, `email`, `token`, `expiration`, `date_created`) VALUES
                                                                                     (5, 'htwusbhw@sharklasers.com', '7858f61654ae1b8b9d38781cd0ee5879b795ac77dae36a096479736ea89f82ec', '2024-04-17 20:56:18', '2024-04-16 20:56:19'),
                                                                                     (6, 'system@haarlem-festival.nl', '1f8fa302499359621e1d55cc00c8be76c570166df6bac2d563bbc7abbd95b03f', '2024-06-15 20:05:14', '2024-06-14 20:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
                              `id` int(11) NOT NULL,
                              `name` varchar(50) NOT NULL,
                              `tags` varchar(65) NOT NULL,
                              `rating` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `tags`, `rating`, `address`, `phoneNumber`, `menuLink`, `menuText`, `description`, `adultPrice`, `childPrice`, `previewImage`, `frontPageImage`, `displayImageOne`, `displayImageTwo`, `category`) VALUES
(1, 'Ratatouille', 'French,Fish and Seafood,European', 4, 'Spaarne 96, 2011 CL Haarlem', '(31)023 542 7270', 'https://ratatouillefoodandwine.nl/menukaart/', 'Our menus reflect the diversity of flavors and textures, with each dish carefully crafted to provide a harmonious culinary adventure. Whether you are enjoying an intimate dinner, a business lunch or celebrating a special occasion, our menu promises a gastronomic experience that will exceed your expectations.', 'Welcome to Ratatouille, where we strive not only for gastronomic perfection, but also for an unforgettable wine experience. Our carefully selected wine list invites you to take a journey of discovery through different flavor profiles, matching the refined culinary creations that our kitchen has to offer. Let yourself be taken on a journey through the vineyards of the world as you enjoy the unique flavor combinations that Ratatouille has to offer.<br>\r\n\r\nAt Ratatouille we strive for excellence not only in our cuisine, but also in our hospitality. Our dedicated team is ready to welcome you and provide an unforgettable dining experience, where your comfort and enjoyment come first.\r\n', 10, 10, 'frontPage.jpg', 'frontPage1.jpg', 'displayImage1.jpg', 'displayImage2.png', 1),
(2, 'ML', 'Dutch,Fish and Seafood,European', 4, 'Kleine Houtstraat 70, 2011 DR Haarlem', '+31 23 512 3910', 'https://www.mlinhaarlem.nl/upload/files/Menu%20van%20de%20chef%20-APRIL%20%202024%20(5,%206%20&%207-gangen)%20.pdf', 'The kitchen of restaurant ML uses fresh and exclusive products. Every day we cook with love and search for surprising flavor combinations. Chef Mark Gratama\'s style stands out for its wide palette of flavors. His cuisine is playful and pushes the boundaries between tradition and innovation.', '\r\nRestaurant ML is located in the heart of the attractive national monument on Klokhuisplein. The restaurant is located in the courtyard of former printer Johan Enschedé and in the old period room of the former home of the Enschedé family. Chef Mark Gratama\'s elegant cuisine is daring with its exciting combination of flavors.<br>\r\n\r\nThe decor is sleek and modern and provides an excellent backdrop for the culinary sensations that chef Mark Gratama and his kitchen team present. From the restaurant you have a good view of the open kitchen and you can clearly see how much passion and attention the dishes are prepared with.', 10, 10, 'frontdisplaypreview.png', 'frontdisplaypreview1.png', 'display1.jpg', 'display2.jpg', 1),
(3, 'Fris', 'Dutch,French,European', 4, 'Twijnderslaan 7, 2012 BG Haarlem', '023 531 0717', 'https://www.restaurantfris.nl/menu', 'The atmosphere at Fris is warm and inviting, with a sleek and modern interior that provides the perfect setting for a romantic dinner, festive meal with friends or business lunch. Come by and be surprised with our unique French cuisine with Asian influences.', 'Welcome to Restaurant Fris, a culinary jewel located in the heart of Haarlem.<br>\r\n\r\nOur award-winning restaurant is known for exquisite cuisine that is both innovative and delicious to the taste buds. Chef Eddie Meijboom creates dishes with the freshest, locally sourced ingredients and combines the best of Dutch cuisine with international flavors. Maître Julius Wever is happy to guide you in choosing the right wine for your meal.', 10, 10, 'frisDisplayFront.png', 'frisDisplay.png', 'display11.jpg', 'display21.jpg', 2),
(4, 'Specktakel', 'Asian,International,European', 3, 'Spekstraat 4, 2011 HM Haarlem', '023 - 532 38 41', 'https://specktakel.nl/menu/', 'At Specktakel we cook with worldly and honest ingredients. Everything comes from our own kitchen, we take animals and nature intensively into account. Our menu changes every quarter based on available seasonal ingredients. We also serve frequently changing surprise menus based on the 5th flavor UMAMI…', 'Specktakel is a unique World Restaurant centrally located in the heart of Haarlem. With a special covered courtyard and a terrace overlooking the historic Vleeshal and the centuries-old Bavo church. In the world kitchen, true works of art are created that stimulate every sense.<br>\r\n\r\nAt Specktakel it is about the experience, an experience that we create together, each in his or her own role. The world wines have been carefully selected so that the wine is in harmony with the aromas and spices of the dish. The colours, aromas and flavors create a wonderful interplay that deserves to be talked about...', 10, 10, 'previewImage.png', 'frontpage.png', 'display1.png', 'display2.png', 2),
(5, 'Café de Roemer', 'Dutch,Fish and Seafood,European', 4, 'Botermarkt 17, 2011 XL Haarlem', '023 532 5267', 'https://www.cafederoemer.nl/menu', 'Enjoy the sun on our spacious and sunny terrace, or experience the outdoors all year round in our beautiful glass conservatory. Whatever the weather, at Café de Roemer we always offer a warm welcome and a cozy atmosphere.', 'Welcome to Café de Roemer, an iconic place located on the Botermarkt in the heart of Haarlem. A household name in Haarlem for over 30 years and now in the hands of two enthusiastic entrepreneurs who continue the Roemer heritage with new energy.<br>\r\n\r\nStep inside and discover our diverse menu, where classics come together with surprising new flavors. Whether it concerns a tasty lunch, an extensive dinner or just a nice drink, you will always find something to suit your taste.', 10, 10, 'displayFront.png', 'displayFront1.png', 'display1.jpeg', 'display2.jpeg', 1),
(6, 'Frency Bistro Toujours', 'Dutch,Fish and Seafood,European', 3, 'Oude Groenmarkt 10-12, 2011 HL Haarlem', '023 - 532 1699', 'https://restauranttoujours.nl/menus/', 'Our kitchen is a treasure trove of flavors, where ingredients such as caviar, truffle and Wagyu form the basis of dishes that are both innovative and traditional. The extensive sushi selection highlights our passion for refined freshness and artistic presentation.', 'Discover Restaurant Toujours, a culinary oasis in the center of Haarlem, where every dinner tells a story of luxury and refinement. Located in the heart of the city, Toujours offers a dining experience that embodies the essence of Haarlem\'s rich gastronomic culture. With an atmospheric setting under our glittering domes, you will feel the magic of dining under a starry sky.', 10, 10, 'previewFront.png', 'previewFront1.png', 'display12.jpg', 'display24.jpg', 1),
(7, 'Cafe Brinkman', 'Dutch,European,Modern', 3, 'Grote Markt 13, 2011 RC Haarlem', '023 532 3111', 'https://www.grandcafebrinkmann.nl/menu', 'Our menu features a spread of modern Dutch and international European food, with many great options to choose from.', 'Welcome to Grand Cafe Brinkman, our cozy atmosphere is the perfect place to eat lunch or dinner with our varied foods you\'re sure to find something you like!', 10, 10, 'displayFrontPreview.png', 'displayFrontPreview1.png', 'display13.jpg', 'display25.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantCategory`
--

CREATE TABLE `restaurantCategory` (
    `id` int(11) NOT NULL,
    `category` varchar(21) NOT NULL,
    `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurantCategory`
--

INSERT INTO `restaurantCategory` (`id`, `category`, `order`) VALUES
    (1, 'From The Sea', 1),
    (2, 'International Cuisine', 2);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantSession`
--

CREATE TABLE `restaurantSession` (
    `id` int(11) NOT NULL,
    `timeslot` datetime NOT NULL,
    `availableSeats` int(11) NOT NULL,
    `restaurant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialTickets`
--

CREATE TABLE `specialTickets` (
    `id` int(11) NOT NULL,
    `ticket_price` decimal(10,2) NOT NULL,
    `ticket_name` varchar(255) NOT NULL,
    `ticket_information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialTickets`
--

INSERT INTO `specialTickets` (`id`, `ticket_price`, `ticket_name`, `ticket_information`) VALUES
    (1, 125.00, 'Day 1 Pass', 'Access to all events on the 26th of July'),
    (2, 125.00, 'Day 2 Pass', 'Access to all events on the 27th of July'),
    (3, 125.00, 'Day 3 Pass', 'Access to all events on the 28th of July'),
    (4, 250.00, 'Full Festival Pass', 'Access to all events for the entire festival duration from 26th to 28th of July');

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
    (1, '', 'July 2024'),
    (2, '', "Immerse yourself in the vibrant beats of Haarlem Dance! Join us for an electrifying showcase featuring the finest DJs, where each set promises to transport you through the realms of electronic music. From pulsating bass lines to soaring melodies, get ready to dance the night away in an unforgettable atmosphere. Don\'t miss out on this rhythmic extravaganza!\r\n\r\n\r\n\r\nThe event will take place on the 26, 27 and 28th of July"),
    (3, '', 'Browse through 7 different unique restaurants in the Yummy! event, each restaurant featuring delicious cuisine so you’re guaranteed to find something you like. \r\n\r\nThe 7 different restaurants are categorized with restaurants featuring more seafood and others featuring a more international cuisine, quickly learn more about each different restaurant and make a reservation directly on the same page.\r\n\r\nThe event will take place on the 25, 26, 27, and 28th of July.'),
    (4, '', 'Stroll Through History is a walking tour, where we will visit nine of Haarlem’s historic landmarks and learn more about them.\r\n\r\nThe city of Haarlem boast a profoundly rich and captivating history. Haarlem is a very old city with turbulent history and great sites to see. We want to invite people to come to Haarlem and feast their eyes on the splendour of old and new.\r\n\r\nThe event will take place on the 25, 26, 27 and 28th of July.\r\n\r\nThe tour is offered in three languages: English, Dutch and Mandarin.'),
    (5, '', "Explore the wonders of art and history with the Teyler Museum\'s Children Puzzle App! With its engaging historical material and fascinating puzzles, this interactive program is perfect for young brains as it combines education and fun. It gives kids an enjoyable approach to discover the wonders of art."),
    (6, '', 'The city of Haarlem boast a profoundly rich and captivating history. Therefore we will be offering a guided tour through Haarlem, visiting buildings and places that offered an important contribution to Haarlem’s history. During the event stroll through history we will visit nine of Haarlem’s historic landmarks, by foot. Haarlem is a very old city with turbulent history and great sites to see. We want to invite people to come to Haarlem and feast their eyes on the splendour of old and new.'),
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
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `category` enum('DANCE','HISTORY','YUMMY') NOT NULL,
    `type` varchar(255) DEFAULT NULL,
    `quantity_available` int(11) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `location` varchar(255) NOT NULL,
    `duration` int(11) NOT NULL,
    `date_time` datetime NOT NULL,
    `restaurant_name` varchar(255) DEFAULT NULL,
    `star` int(11) DEFAULT NULL,
    `food_type` varchar(255) DEFAULT NULL,
    `language` varchar(255) DEFAULT NULL,
    `guide` varchar(255) DEFAULT NULL,
    `artist` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `category`, `type`, `quantity_available`, `price`, `location`, `duration`, `date_time`, `restaurant_name`, `star`, `food_type`, `language`, `guide`, `artist`) VALUES
    (1, 'Dance Ticket', 'DANCE', 'Single', 1500, 75.00, 'Lichtfabriek', 360, '2024-07-27 20:00:00', NULL, NULL, NULL, NULL, NULL, 'Nicky Romero / Afrojack'),
    (2, 'Dance Ticket', 'DANCE', 'Single', 200, 60.00, 'Club Stalker', 90, '2024-07-27 22:00:00', NULL, NULL, NULL, NULL, NULL, 'Tiësto'),
    (3, 'Dance Ticket', 'DANCE', 'Single', 300, 60.00, 'Jopenkerk', 90, '2024-07-27 23:00:00', NULL, NULL, NULL, NULL, NULL, 'Hardwell'),
    (4, 'Dance Ticket', 'DANCE', 'Single', 200, 60.00, 'XO the Club', 90, '2024-07-27 22:00:00', NULL, NULL, NULL, NULL, NULL, 'Armin van Buuren'),
    (5, 'Dance Ticket', 'DANCE', 'Single', 200, 60.00, 'Club Ruis', 90, '2024-07-27 22:00:00', NULL, NULL, NULL, NULL, NULL, 'Martin Garrix'),
    (6, 'Dance Ticket', 'DANCE', 'Single', 2000, 110.00, 'Caprera Openluchttheater ', 540, '2024-07-28 14:00:00', NULL, NULL, NULL, NULL, NULL, 'Hardwell / Martin Garrix / Armin van Buuren'),
    (7, 'Dance Ticket', 'DANCE', 'Single', 300, 60.00, 'Jopenkerk', 90, '2024-07-28 22:00:00', NULL, NULL, NULL, NULL, NULL, 'Afrojack'),
    (8, 'Dance Ticket', 'DANCE', 'Single', 1500, 75.00, 'Lichtfabriek', 240, '2024-07-28 21:00:00', NULL, NULL, NULL, NULL, NULL, 'Tiësto'),
    (9, 'Dance Ticket', 'DANCE', 'Single', 200, 60.00, 'Club Stalker', 90, '2024-07-28 23:00:00', NULL, NULL, NULL, NULL, NULL, 'Nicky Romero'),
    (10, 'Dance Ticket', 'DANCE', 'Single', 2000, 110.00, 'Caprera Openluchttheater ', 540, '2024-07-29 14:00:00', NULL, NULL, NULL, NULL, NULL, 'Afrojack / Tiësto / Nicky Romero'),
    (11, 'Dance Ticket', 'DANCE', 'Single', 300, 60.00, 'Jopenkerk', 90, '2024-07-29 19:00:00', NULL, NULL, NULL, NULL, NULL, 'Armin van Buuren'),
    (12, 'Dance Ticket', 'DANCE', 'Single', 1500, 90.00, 'XO the Club', 90, '2024-07-29 21:00:00', NULL, NULL, NULL, NULL, NULL, 'Hardwell'),
    (13, 'Dance Ticket', 'DANCE', 'Single', 200, 60.00, 'Club Stalker', 90, '2024-07-29 18:00:00', NULL, NULL, NULL, NULL, NULL, 'Martin Garrix'),
    (14, 'Dance Ticket', 'DANCE', 'Day 1 Pass', 100, 125.00, 'Lichtfabriek/Club Stalker/Jopenkerk/XO the Club/Club Ruis', 0, '2024-07-27 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Nicky Romero/Afrojack/Tiësto/Hardwell/Armin van Buuren/Martin Garrix'),
    (15, 'Dance Ticket', 'DANCE', 'Day 2 Pass', 100, 150.00, 'Caprera Openluchttheater/Jopenkerk/Lichtfabriek/Club Stalker', 0, '2024-07-28 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Harwell/Martin Garrix/Armin van Buuren/Afrojack/Tiësto/Nicky Romero'),
    (16, 'Dance Ticket', 'DANCE', 'Day 3 Pass', 100, 150.00, 'Jopenkerk', 0, '2024-07-29 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Hardwell'),
    (17, 'Dance Ticket', 'DANCE', 'Full Access Pass', 100, 250.00, 'Caprera Openluchttheater/Jopenkerk/XO the Club/Club Stalker', 0, '2024-07-27 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Afrojack/Tiësto/Nicky Romero/Armin van Buuren/Hardwell/Martin Garrix'),
    (18, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (19, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (20, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (21, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (22, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (23, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (24, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-26 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (25, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-26 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (26, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (27, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (28, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (29, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (30, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (31, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (32, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (33, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (34, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (35, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (36, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (37, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (38, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (39, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (40, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-26 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (41, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (42, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (43, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-26 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (44, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-26 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (45, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-26 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (46, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (47, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (48, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (49, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (50, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (51, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (52, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (53, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (54, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (55, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (56, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (57, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-26 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (58, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (59, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (60, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (61, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (62, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (63, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (64, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-27 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (65, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-27 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (66, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (67, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (68, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (69, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (70, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (71, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (72, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (73, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (74, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (75, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (76, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (77, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (78, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (79, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (80, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-27 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (81, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (82, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (83, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-27 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (84, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-27 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (85, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-27 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (86, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (87, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (88, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (89, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (90, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (91, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (92, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (93, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (94, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (95, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (96, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (97, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-27 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (98, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (99, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (100, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (101, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (102, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (103, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (104, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-28 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (105, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-28 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (106, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (107, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (108, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (109, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (110, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (111, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (112, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (113, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (114, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (115, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (116, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (117, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (118, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (119, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (120, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-28 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (121, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (122, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (123, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-28 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (124, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-28 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (125, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-28 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (126, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (127, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (128, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (129, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (130, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (131, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (132, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (133, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (134, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (135, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (136, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (137, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-28 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (138, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (139, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (140, 'Restaurant Ticket', 'YUMMY', 'Single', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (141, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (142, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (143, 'Restaurant Ticket', 'YUMMY', 'Single', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (144, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-29 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (145, 'Restaurant Ticket', 'YUMMY', 'Single', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-29 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (146, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (147, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (148, 'Restaurant Ticket', 'YUMMY', 'Single', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (149, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (150, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (151, 'Restaurant Ticket', 'YUMMY', 'Single', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (152, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (153, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (154, 'Restaurant Ticket', 'YUMMY', 'Single', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (155, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (156, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (157, 'Restaurant Ticket', 'YUMMY', 'Single', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (158, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 18:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (159, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 19:30:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (160, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 35, 35.00, 'Botermarkt 17, 2011 XL Haarlem', 90, '2024-07-29 21:00:00', 'Café de Roemer', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (161, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 17:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (162, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 19:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (163, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 52, 45.00, 'Spaarne 96, 2011 CL Haarlem, Nederland', 120, '2024-07-29 21:00:00', 'Ratatouille', 4, 'French/Fish and seafood/European', NULL, NULL, NULL),
    (164, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-29 17:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (165, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 60, 45.00, 'Kleine Houtstraat 70, 2011 DR Haarlem, Nederland', 120, '2024-07-29 19:00:00', 'Restaurant ML', 4, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (166, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (167, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (168, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 45, 45.00, 'Twijnderslaan 7, 2012 BG Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Restaurant Fris', 4, 'Dutch/French/European', NULL, NULL, NULL),
    (169, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (170, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (171, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 36, 35.00, 'Spekstraat 4, 2011 HM Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Specktakel', 3, 'European/International/Asian', NULL, NULL, NULL),
    (172, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (173, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (174, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 100, 35.00, 'Grote Markt 13, 2011 RC Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Grand Cafe Brinkman', 3, 'Dutch/European/Modern', NULL, NULL, NULL),
    (175, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 17:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (176, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 19:00:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (177, 'Restaurant Ticket', 'YUMMY', 'Single (Child)', 48, 35.00, 'Oude Groenmarkt 10-12, 2011 HL Haarlem, Nederland', 90, '2024-07-29 20:30:00', 'Urban Frenchy Bistro Toujours', 3, 'Dutch/Fish and seafood/European', NULL, NULL, NULL),
    (178, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 10:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (179, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 13:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (180, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 16:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (181, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 10:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (182, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (183, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-26 16:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (184, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 10:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (185, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (186, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 16:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (187, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 10:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (188, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (189, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 16:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (190, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (191, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 10:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (192, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (193, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (194, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 10:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (195, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (196, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (197, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (198, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (199, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (200, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (201, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 16:00:00', NULL, NULL, NULL, 'English', 'Deirdre', NULL),
    (202, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (203, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (204, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 16:00:00', NULL, NULL, NULL, 'Dutch', 'Lisa', NULL),
    (205, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (206, 'History Ticket', 'HISTORY', 'Single', 12, 17.50, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'Chinese', 'Susan', NULL),
    (207, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 10:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (208, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 13:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (209, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 16:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (210, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 10:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (211, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (212, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-26 16:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (213, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 10:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (214, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (215, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 16:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (216, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 10:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (217, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (218, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 16:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (219, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-27 13:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (220, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 10:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (221, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (222, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (223, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 10:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (224, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (225, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (226, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 13:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (227, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-28 16:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (228, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'English', 'Frederic', NULL),
    (229, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'English', 'Williams', NULL),
    (230, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 16:00:00', NULL, NULL, NULL, 'English', 'Deirdre', NULL),
    (231, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'Dutch', 'Annet', NULL),
    (232, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'Dutch', 'Jan-Willem', NULL),
    (233, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 16:00:00', NULL, NULL, NULL, 'Dutch', 'Lisa', NULL),
    (234, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 10:00:00', NULL, NULL, NULL, 'Chinese', 'Kim', NULL),
    (235, 'History Ticket', 'HISTORY', 'Family', 12, 60.00, 'Bavo Church', 180, '2024-07-29 13:00:00', NULL, NULL, NULL, 'Chinese', 'Susan', NULL);

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
    (1, 'system', 'system@haarlem-festival.nl', '$2y$10$PPUquDQo/Hd3GYL7CVyfVeJoY5FXQZMVpBXTFAuB6nZFRpGu3rpBC', NULL, NULL, 0, '2024-03-01 18:04:59'),
    (2, 'admin', 'admin@haarlem-festival.nl', '$2y$10$yhMvogSFkxkJu8FPfuhs5up6EO9qRL05Nqjzrywc2x0TDA0aiFLSy', NULL, NULL, 1, '2024-03-01 18:02:29'),
    (3, 'hu', 'yixovzup@sharklasers.com', '$2y$10$9DLzu7fENOtAKj5PUHZVp.mgvms/N3W5PCECiQXMbrkFL7BbISedi', NULL, NULL, 2, '2024-03-25 11:40:52'),
    (5, 'hello', 'htwusbhw@sharklasers.com', '$2y$10$9UTnF5crOVy.3XKi/dWf0Otur9nCeDJ4ujeI02FpCjPgMGKMVvRSO', NULL, NULL, 2, '2024-04-16 20:45:11'),
    (6, 'someone', 'sss@adf.com', '$2y$10$t9nkNqeMve42OFvmIq1XLuNrri0JR276GJUauaU5SPhB/KEE922Sm', NULL, NULL, 2, '2024-06-12 19:20:42'),
    (7, 'tester', 'itaaktel@sharklasers.com', '$2y$10$2Z7R8FTVGdBQIDxn5Naj9OGMVX7AzqcsTf3ligQvRR29msomM6J.O', NULL, NULL, 2, '2024-06-14 20:06:05'),
    (8, 'tester1', 'tester1@test.com', '$2y$10$2J.O61HU6ZBA1mfZWFUl9e8utB1rm9KgwXx4M563r9W45e8Wonn0S', 'testerre', 'testeris', 2, '2024-06-15 12:31:21');

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
(2, 'Club Stalker', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem', 'img\\danceimages\\clubstalker.png', "Club Stalker was a well-known nightclub in Haarlem, situated at Kromme Elleboogsteeg 20 in the city\'s old center. \r\n\r\nThe venue, which operated from 1983 until its closure in 2019, was once a warehouse and became known for playing a wide range of electronic music genres, from New Wave and Postpunk to House, Hip-hop, UK Garage, Drum-\'n-bass, Minimal, and Techno. \r\n\r\nIt was considered one of the better nightclubs in the Netherlands and was one of the country\'s oldest. The space that housed Club Stalker is set to be transformed into apartments​"),
(3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'img\\danceimages\\jopenkerk.png', "Jopenkerk Haarlem is a unique venue located in the heart of the city at Gedempte Voldersgracht 2, 2011 WD Haarlem, Netherlands.\r\n\r\nThis historic church has been transformed into a brewery and restaurant, offering a taste of local Jopen beers paired with an extensive menu. Visitors can enjoy beer tastings and a view of the brewing process while dining. \r\n\r\nIt\'s an excellent choice for a cultural and culinary experience, blending the best of Haarlem\'s hospitality and brewing traditions​"),
(4, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem', 'img\\danceimages\\clubruis.png', 'Club Ruis in Haarlem represented a space for freedom and tolerance, offering an exclusive and international atmosphere. It was a place that promised a break from the everyday with a mix of innovative electronic music and a free-spirited vibe. \r\n\r\nLocated at Smedestraat 31, 2011 RE Haarlem, Netherlands, Club Ruis embraced prosperity and aimed to enhance the quality of nightlife.'),
(5, 'XO the Club', 'Grote Markt 8, 2011 RD Haarlem', 'img\\danceimages\\xotheclub.png', '\"XO the Club\" in Haarlem is a vibrant nightlife spot where every Friday and Saturday evening, guests are invited to dance the night away to various DJs or live acts. \r\n\r\nThe club opens at 23:00 and keeps the party going until 4:00 in the morning, offering a lively atmosphere for those 21 and older on Fridays and 23+ on Saturdays. \r\n\r\nThe location of the “XO The Club” is Grote Markt 8, 2011 RD Haarlem\r\n'),
(6, 'Caprera Openluchttheater', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal', 'img\\danceimages\\capreraopenluchttheater.png', "Nestled between the dunes and the forest of Zuid Kennemerland, Caprera Openluchttheater is a beautiful open-air theatre in Bloemendaal, offering a unique ambiance for summer performances. \r\n\r\nIt\'s a place where you can enjoy a variety of shows including pop, cabaret, dance, and classical concerts under the stars. \r\n\r\nThe venue, with grandstands that seat 1,100 guests and additional standing room for large events, is located at Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal​");

-- --------------------------------------------------------

--
-- Table structure for table `yummyDetails`
--

CREATE TABLE `yummyDetails` (
  `id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `reminder` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yummyDetails`
--

INSERT INTO `yummyDetails` (`id`, `date`, `description`, `reminder`) VALUES
(1, 'July 25th-28th', "Come and see the participating restaurants at our very own food event at the Haarlem Festival. Featuring all sorts of different cuisines you\'re sure to find something you that fits your tastes! Take a quick look at each restaurant and easily find out more about any restaurant and book your very own reservation by clicking \"Learn More\".", 'A reservation is mandatory to dine at participating restaurants, remember to book before you wish to dine!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
    ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `danceContentDetail`
--
ALTER TABLE `danceContentDetail`
    ADD PRIMARY KEY (`id`),
    ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `dancecontenthome`
--
ALTER TABLE `dancecontenthome`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danceEvents`
--
ALTER TABLE `danceEvents`
    ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `festivalEvents`
--
ALTER TABLE `festivalEvents`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festivalSchedule`
--
ALTER TABLE `festivalSchedule`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historyContent`
--
ALTER TABLE `historyContent`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historyLocation`
--
ALTER TABLE `historyLocation`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historySchedule`
--
ALTER TABLE `historySchedule`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notableTracks`
--
ALTER TABLE `notableTracks`
    ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `resetTokens`
--
ALTER TABLE `resetTokens`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CATEGORY_ID` (`category`);

--
-- Indexes for table `restaurantCategory`
--
ALTER TABLE `restaurantCategory`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurantSession`
--
ALTER TABLE `restaurantSession`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RESTAURANT_ID` (`restaurant`);

--
-- Indexes for table `specialTickets`
--
ALTER TABLE `specialTickets`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `username` (`username`),
    ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
    ADD PRIMARY KEY (`venue_id`);

--
-- Indexes for table `yummyDetails`
--
ALTER TABLE `yummyDetails`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
    MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `danceContentDetail`
--
ALTER TABLE `danceContentDetail`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dancecontenthome`
--
ALTER TABLE `dancecontenthome`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danceEvents`
--
ALTER TABLE `danceEvents`
    MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `festivalEvents`
--
ALTER TABLE `festivalEvents`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `festivalSchedule`
--
ALTER TABLE `festivalSchedule`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `historyContent`
--
ALTER TABLE `historyContent`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `historyLocation`
--
ALTER TABLE `historyLocation`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `historySchedule`
--
ALTER TABLE `historySchedule`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notableTracks`
--
ALTER TABLE `notableTracks`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resetTokens`
--
ALTER TABLE `resetTokens`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `restaurantCategory`
--
ALTER TABLE `restaurantCategory`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurantSession`
--
ALTER TABLE `restaurantSession`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialTickets`
--
ALTER TABLE `specialTickets`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
    MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danceContentDetail`
--
ALTER TABLE `danceContentDetail`
    ADD CONSTRAINT `danceContentDetail_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);

--
-- Constraints for table `notableTracks`
--
ALTER TABLE `notableTracks`
    ADD CONSTRAINT `notableTracks_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
    ADD CONSTRAINT `FK_CATEGORY_ID` FOREIGN KEY (`category`) REFERENCES `restaurantCategory` (`id`);

--
-- Constraints for table `restaurantSession`
--
ALTER TABLE `restaurantSession`
    ADD CONSTRAINT `FK_RESTAURANT_ID` FOREIGN KEY (`restaurant`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
