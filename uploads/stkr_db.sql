-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 11:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stkr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_components`
--

CREATE TABLE `custom_components` (
  `component_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_description` text COLLATE utf8mb4_unicode_ci,
  `component_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_designs`
--

CREATE TABLE `custom_designs` (
  `design_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_designs`
--

INSERT INTO `custom_designs` (`design_id`, `component_id`, `file_path`, `created_at`) VALUES
(1, 1, 'uploads/CEIT-OJTF-002-Internship-Plan.pdf.docx', '2023-07-28 08:56:19'),
(2, 1, 'uploads/CEIT-OJTF-002-Internship-Plan.pdf.docx', '2023-07-28 08:57:36'),
(3, 1, 'uploads/company (2).sql', '2023-07-28 08:57:42'),
(4, 1, 'uploads/company (2).sql', '2023-07-28 08:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `user_id`, `game_name`, `game_description`, `game_category`, `created_at`) VALUES
(9, 6, 'game name 1', 'game name 1 desc', 'action', '2023-07-28 08:11:43'),
(10, 6, 'game1', 'yt', 'tu', '2023-07-28 08:29:55'),
(11, 6, 'game1', 'yt', 'tu', '2023-07-28 08:30:24'),
(12, 6, 'rt', 'r', 'r', '2023-07-28 08:31:03'),
(13, 6, 'rdg', 'erty', 'dfg', '2023-07-28 08:32:00'),
(14, 6, '1', '1', '1', '2023-07-28 08:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `game_components`
--

CREATE TABLE `game_components` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_component_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_description` text COLLATE utf8mb4_unicode_ci,
  `component_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_components`
--

INSERT INTO `game_components` (`component_id`, `component_name`, `game_component_type`, `component_size`, `component_description`, `component_price`) VALUES
(1, 'Box 1', 'Board Game Box', 'Standard', 'Box for board game', '20.00'),
(2, 'Card 1', 'Card Game Card', 'Poker Size', 'Playing card', '3.50'),
(3, 'Piece 1', 'Game Piece', 'Small', 'Wooden game piece', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `game_prices`
--

CREATE TABLE `game_prices` (
  `price_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `game_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `token_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sdf`
--

CREATE TABLE `sdf` (
  `dsfwa2` int(11) NOT NULL,
  `sdf32` int(11) NOT NULL,
  `sdff` int(11) NOT NULL,
  `sdfh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `hashed_password`, `created_at`, `username`, `shipping_address`, `avatar`) VALUES
(6, 'denzelgo17@gmail.com', '$2y$10$dX2859zskqJdGI27hnmln.x.SrSPRbD4Y1s27F5ihuzWskaiSCLgi', '2023-07-28 08:07:08', 'denzel', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_components`
--
ALTER TABLE `custom_components`
  ADD PRIMARY KEY (`component_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `custom_designs`
--
ALTER TABLE `custom_designs`
  ADD PRIMARY KEY (`design_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `game_components`
--
ALTER TABLE `game_components`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `game_prices`
--
ALTER TABLE `game_prices`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_components`
--
ALTER TABLE `custom_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `custom_designs`
--
ALTER TABLE `custom_designs`
  MODIFY `design_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_prices`
--
ALTER TABLE `game_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custom_components`
--
ALTER TABLE `custom_components`
  ADD CONSTRAINT `custom_components_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE;

--
-- Constraints for table `custom_designs`
--
ALTER TABLE `custom_designs`
  ADD CONSTRAINT `custom_designs_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`) ON DELETE CASCADE;

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `game_prices`
--
ALTER TABLE `game_prices`
  ADD CONSTRAINT `game_prices_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE;

--
-- Constraints for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD CONSTRAINT `password_reset_tokens_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
