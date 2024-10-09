-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 07:10 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saith`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(5) NOT NULL,
  `category` varchar(10) NOT NULL,
  `title` varchar(120) NOT NULL,
  `bodytext` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `category`, `title`, `bodytext`, `created`) VALUES
(5, 'home', 'Test', 'yo la famille\r\nsa va ou quoi\r\nyo', '2022-05-06 05:19:27'),
(6, 'home', 'zedz', 'sqdesqe\r\nit\'s weirdeee', '2022-05-06 05:19:32'),
(7, 'home', 'fdce', 'ere\r\nwhat\'s upezdiuoejdqioqsd dddd dddddsssssssssssssssssssssssss ssssssssssssssssssssssss\r\nezq,kdeeeeeeeee eeeeeeeeee eeeeeee\r\nsed,kqqqqqqqqqqqqqqqqqqqq qqqqqqqqqqqqqqqqq qqqqqqqqq qqqqqqqqq qqqqqqqqqqqqqqqqqqqq qqqq qq qqqqqqqqqqqqqqqqqqqqqq qqqqqqqqqqqqqqqqqqqqq qqqqqqqqq ', '2022-05-06 05:35:12'),
(8, 'home', 'YOOO saith seren here', 'What\'s up it\'s my bro here\r\nyo ta mere', '2022-05-06 05:38:47'),
(9, 'yo', 'rdar', 'dqqdeq', '2022-05-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `text` text NOT NULL,
  `color` varchar(7) NOT NULL,
  `organizers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `text`, `color`, `organizers`) VALUES
(7, '2022-05-03 02:02:00', '2022-05-03 10:00:00', 'zeadez', '#e4edff', ''),
(10, '2022-05-04 03:00:00', '2022-05-04 09:02:00', 'zeza', '#e4edff', ''),
(11, '2022-05-10 03:02:00', '2022-05-10 05:03:00', 'ezsa', '#e4edff', 'ezas'),
(12, '2022-05-11 00:00:00', '2022-05-11 00:00:00', 'zeadz', '#e6ffe5', 'qsdsq'),
(13, '2022-05-12 00:00:00', '2022-05-12 00:00:00', 's\r\nsdq\r\nfdfd', '#e4edff', 'c'),
(14, '2022-05-13 00:00:00', '2022-05-13 00:00:00', 'Noson Jam Nig\r\nComedy Night', '#e4edff', 'The Beatles'),
(15, '2022-05-18 01:01:00', '2022-05-19 04:00:00', 'fdgdrsdfsf', '#938425', 'Band');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(10) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(1) UNSIGNED NOT NULL,
  `room_duration` int(3) UNSIGNED NOT NULL DEFAULT '60',
  `price` float UNSIGNED NOT NULL,
  `comments` varchar(1000) COLLATE ascii_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `datetime`, `user_id`, `room_id`, `room_duration`, `price`, `comments`) VALUES
(1, '2022-05-14 10:12:00', 3, 4, 1, 5, 'My charity is named jdqoqijsidj and our goal is dqsjd\r\n+33754832476\r\nthe time is flexible'),
(2, '2022-05-14 12:11:00', 3, 2, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(3, '2022-05-14 07:53:00', 4, 5, 4, 20, 'Apple\r\n54156446546\r\nno comment'),
(4, '2022-05-12 10:38:00', 4, 5, 7, 35, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(5, '2022-05-28 10:45:00', 4, 4, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(6, '2022-05-21 10:46:00', 4, 4, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(7, '2022-05-21 10:48:00', 4, 4, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(8, '2022-05-21 10:49:00', 4, 5, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(9, '2022-06-02 10:50:00', 4, 3, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(10, '2022-05-20 10:53:00', 4, 3, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(11, '2022-05-14 10:54:00', 4, 3, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(12, '2022-05-28 10:55:00', 4, 1, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(13, '2022-05-21 10:56:00', 4, 4, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(14, '2022-05-28 10:58:00', 4, 2, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(15, '2022-05-27 11:00:00', 4, 3, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(16, '2022-05-08 02:51:00', 4, 3, 1, 10, 'Organization name\r\nTelephone number\r\nAdditional comments'),
(17, '2022-05-11 04:20:00', 4, 4, 1, 5, 'Organization name\r\nTelephone number\r\nAdditional comments');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `subscribed`, `admin`, `active`) VALUES
(2, 'alexisvafiadis@gmail.com', '$2y$10$zuGk9KmCUoepoqvZFBWoAeBh3NMHs8F4jpLD3L0p6f4oa.xYvvrB.', 'Alexis', 'Vafiadis', 1, 0, 0),
(3, 'yo@gmail.com', '$2y$10$oYfA8w6EQgBeuAg//ZzPFuAHVTKUIHY.SBSu6iClSVPbxXA0YjLS.', 'ezd', 'ezd', 1, 0, 0),
(4, 'bonjour@gmail.com', '$2y$10$FgfO2b9sGRoA40H3MAko4e8hqcmRqdJh7yLrNv6J4aiQqCz2SI96a', 'sqd', 'qsd', 1, 1, 0),
(6, 'xxmcpvpplayerxx@gmail.com', '$2y$10$MmQ7tYmLrm2hziWFF8x2vO22gnknjHE5zjd5h19A08ONcvmQvVSZq', 'aze', 'azd', 0, 0, 0),
(9, 'zunhduaz@gmail.com', '$2y$10$qeCxDcWO8Vef7iFJ556MLO.5iRXa1dHMzhs7OKWlnhylyNwGlKpN.', 'zedz', 'sdsde', 1, 0, 0),
(10, 'ezrdze@gmail.com', '$2y$10$evj0pUHVuaJ2MupPYcexGunqLmOgDPXJimGQMpJNADELdU4InWsnO', 'erds', 'rsf', 1, 0, 0),
(21, 'zeadazedaz@gmail.com', '$2y$10$GLjXPl5QhPISQr2W.llwAOIkGb73aFG8RWpjM3hFliudLSeE4q.Pe', 'zeadazedaz', 'zeadazedaz', 0, 0, 0),
(20, 'jezdjiaezo@gmail.com', '$2y$10$yaLC/LIuFrXrhyvo753T0O0Pqw64hIzpFjX/ZfGcX07KJKid5zfd6', 'jezdjiaezo', 'jezdjiaezo', 0, 0, 0),
(19, 'whatever@gmail.com', '$2y$10$80gEf5CBK5eXK3R8JfdYUeQy5sbVthSeVn9WNSUoFDAAMRfpgb60i', 'whatever', 'whatever', 0, 0, 0),
(18, 'yolafamille2@gmail.com', '$2y$10$yeZWZZwUEWSjFHwFl8UyZ.qfhkCLmb.NoGRoDmkvFD.raOF5jkcnm', 'yolafamille', 'yolafamille', 1, 0, 0),
(17, 'yolafamille@gmail.com', '$2y$10$zZibXAfWoOIZpgU9xGAFBe3Wxa45VLS79sgdEK7OAISOmUnchX.tC', 'yolafamille', 'yolafamille', 0, 0, 0),
(22, 'ezadzaed@gmail.com', '$2y$10$5YmnqpIRaGlRrivgP5UxDeLjOq17pWTX.GFdISasvDM/98PC22yMa', 'ezadzaed', 'ezadzaed', 0, 0, 0),
(23, 'adezeadaez@gmail.com', '$2y$10$ya95xOhwBncmZozoWY3P5eqhpY7HZZ9QmhJ3e0WvbXf9nNzBh39eS', 'adezeadaez', 'adezeadaez', 0, 0, 0),
(24, 'aezdaz@gmail.com', '$2y$10$4QJ5AjITJ4XWvCRyg7Oi/OkczyObncMdfHP1OecnU2xfTA/txBvRW', 'eazdeza', 'ezad', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evt_start` (`start`),
  ADD KEY `evt_end` (`end`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`user_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
