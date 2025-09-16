-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2025 at 05:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoopark`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `time`, `location`, `description`) VALUES
(1, 'Plantation Day', '2024-09-05', '10:00:00', 'At The Park Area, ZooPark', ' PROGRAMME:\r\n                    10:00am to 10:30am: Registration and welcome kit distribution.\r\n                    10:30am to 11:00am: Opening ceremony.\r\n                    11:00am to 11:30am: Educational session about plantation.\r\n                    11:30am to 12:00pm: Tree plantation activity.\r\n                    12:00pm to 12:30pm: Refreshment break.\r\n                    12:30pm to 1:30pm: Tree plantation continues.\r\n                    1:30pm to 2:00pm: Cultural Programme.\r\n                    2:00pm to 2:30pm: Closing ceremony.\r\n                    2:30pm to 3:00pm: Lunch.'),
(2, 'Adoption Day', '2024-09-11', '09:00:00', 'Auditorium, ZooPark', ' PROGRAMME:\r\n                    9:00am to 9:30am: Registration and Welcome.\r\n                    9:30am to 10:00am: Opening ceremony.\r\n                    10:00am to 10:30am: Pet adoption showcase.\r\n                    10:30am to 11:00am: Educational session.\r\n                    11:00am to 12:00pm: Adoption process.\r\n                    12:00pm to 12:30pm: Refreshment break.\r\n                    12:30pm to 1:00pm: Pet activity zone.\r\n                    1:30pm to 1:30pm: Special activities.\r\n                    1:30pm to 2:00pm: Closing ceremony.\r\n                    2:00pm to 3:00pm: Post event activities.'),
(3, 'Behind The Scene Visit', '2024-09-22', '09:00:00', 'At the ZooPark (Entrance)', '  PROGRAMME:\r\n                    9:00am to 9:30am: Arrival and registration.\r\n                    9:30am to 10:00am: Welcome and introduction.\r\n                    10:00am to 11:00am: Behind The Scene Tour Part-I.\r\n                    11:00am to 11:15am: Refreshment break.\r\n                    11:15am to 12:15pm: Behind The Scene Tour Part-II.\r\n                    12:15pm to 12:45pm: Interactive Workshop.\r\n                    12:45pm to 1:15pm: Special Presentation.\r\n                    1:15pm to 1:45pm: Q&A and networking.\r\n                    1:45pm to 2:00pm: Closing remarks.'),
(13, 'Zoo', '2024-09-06', '18:10:00', 'Auditorium, ZooPark', 'Visiting the zoo');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `message`, `created_at`) VALUES
(1, 'Shevaag', 'shevaagsh@gmail.com', '768220720', 'Great user experience ', '2024-08-27 07:19:18'),
(2, 'Kathur', 'kathurshan2k3@gmail.com', '766094960', 'Very neat and clean interface', '2024-08-28 10:20:23'),
(3, 'Malhar Ahmedh', 'ahmedh@gmail.com', '765489542', 'The homepage design is visually appealing. ', '2024-08-29 10:41:21'),
(4, 'Aarya', 'aarya@gmail.com', '758461254', 'Improving the website’s loading speed by optimizing images and refining code can significantly enhance user satisfaction.', '2024-08-29 10:42:56'),
(5, 'Kesha', 'kesha@gmail.com', '761806112', 'The clear and well-organized navigation menu makes it easy to find information about different exhibits and zoo amenities.', '2024-08-29 10:44:42'),
(6, 'Rillakshana', 'shana@gmail.com', '768954245', 'The high-quality animal photos and videos on the site are captivating and provide a wonderful preview of the zoo experience.\r\n', '2024-08-29 10:47:11'),
(7, 'Vishwa Abishek', 'vishwa@gmail.com', '775469825', 'The clean and modern design enhances readability and makes navigation through the site both intuitive and enjoyable.', '2024-08-29 10:48:04'),
(8, 'Srividhurshanan', 'vidhu@gmail.com', '785412364', 'Ensure that the website is fully optimized for mobile devices to accommodate users who access the site from their phones or tablets.', '2024-08-29 10:49:36'),
(9, 'Pulasthi Perera', 'pulasthiperera@gmail.com', '785496214', 'The events section is informative and well-maintained, offering detailed descriptions and schedules that help visitors plan their trips.', '2024-08-29 10:51:22'),
(10, 'Dimuthu Pramudhitha', 'dimuthu@gmail.com', '789654156', 'The website’s consistent branding and theme create a cohesive and professional look that reflects the zoo’s identity.', '2024-08-29 10:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'shevaag', 'shevaagsh@gmail.com', '$2y$10$OmLypJF9sNTZ63PTfaYOk./oxmg7urQ5ColDlPPfYFf60C3qERZJm', '2024-08-20 15:14:39'),
(2, 'Kathur', 'kathurshan2k3@gmail.com', '$2y$10$2awqhw7BuAn4uxtETDCEde7185rQTXGIcYVVFrn9cs5g7u8U8tub2', '2024-08-28 10:24:16'),
(3, 'Malhar Ahmedh', 'ahmedh@gmail.com', '$2y$10$FbAlVEaJg/WX.avCyC10Y.HJJ.X0sW1fU6V.xeRAUbDIyoQJzU38e', '2024-08-29 10:56:14'),
(4, 'Aarya', 'aarya@gmail.com', '$2y$10$kNIuX0oqFh7s22SW/BFiA.iDVW20x4WdR9l4OExXYRT2nb7h6Rx5G', '2024-08-29 10:57:33'),
(5, 'Kesha', 'kesha@gmail.com', '$2y$10$emCQCIQ8F80BMAPdRjMkAul8zTxz.krPR.wW9QHsZLvcQl5dvfYjS', '2024-08-29 10:58:48'),
(6, 'Rillakshana', 'shana@gmail.com', '$2y$10$rsV4w5tLYWmS3HrH2KPFmeRAKQLxCKLKDDg41pC4WWvhM1ncLXlge', '2024-08-29 10:59:29'),
(7, 'Vishwa Abishek', 'vishwa@gmail.com', '$2y$10$ALRzhjgr0ZztxJ5TW0vITeaUXFGlP1PJoZxEvBG4XqPJkLXOQTw72', '2024-08-29 11:00:18'),
(8, 'Srividhurshanan', 'vidhu@gmail.com', '$2y$10$.WqZdx4jnoB0ed/jtEakreMcZYrTkjTzajM7Quedeme5wPHi1jMUy', '2024-08-29 11:00:45'),
(9, 'Pulasthi Perera', 'pulasthiperera@gmail.com', '$2y$10$RATBQV.mMeufqoNqOu4bAu5mCgfyOXPsk6Hx3SMledGGHl6ixU3ZC', '2024-08-29 11:01:09'),
(10, 'Dimuthu Pramudhitha', 'dimuthu@gmail.com', '$2y$10$1TJWPKALtAms13.c0JJbA..5lXWnkH8VoIjyJvwgaD/r4g/iqMvYu', '2024-08-29 11:01:33'),
(16, 'AKSHIDHAN', 'akshidhan@email.com', '$2y$10$7NEdqB3fQfJwJqo1XAnLoOUx0L3P/6zp7U26TaW1osg5wrazDTpSW', '2024-09-26 07:03:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
