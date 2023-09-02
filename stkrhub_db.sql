-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 08:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stkrhub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `published_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `in_production` tinyint(1) DEFAULT 0,
  `is_finished` tinyint(1) DEFAULT 0,
  `to_ship` tinyint(1) DEFAULT 0,
  `to_deliver` tinyint(1) DEFAULT 0,
  `is_received` tinyint(1) DEFAULT 0,
  `is_canceled` tinyint(1) DEFAULT 0,
  `is_completely_canceled` int(11) DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp(),
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_id`, `published_game_id`, `built_game_id`, `added_component_id`, `quantity`, `price`, `is_pending`, `in_production`, `is_finished`, `to_ship`, `to_deliver`, `is_received`, `is_canceled`, `is_completely_canceled`, `order_date`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`) VALUES
(32, 105, 7, NULL, NULL, 340, 1, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 17:44:14', NULL, NULL, NULL, NULL),
(33, 106, 7, NULL, NULL, 341, 12, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 18:03:24', NULL, NULL, NULL, NULL),
(34, 113, 7, NULL, 43, NULL, 2, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(35, 114, 7, NULL, NULL, 344, 3, 12.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(36, 115, 7, 128, NULL, NULL, 4, 2500.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(37, 100, 3, NULL, NULL, 339, 2, 11.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', NULL, NULL, NULL, NULL),
(38, 101, 3, NULL, 27, NULL, 1, 0.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', NULL, NULL, NULL, NULL),
(39, 102, 3, 128, NULL, NULL, 1, 2500.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', 1000.00, 200.00, 800.00, 2500.00),
(40, 116, 3, 128, NULL, NULL, 1, 2500.00, 1, 0, 0, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', 1000.00, 200.00, 800.00, 2500.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `added_component_id` (`added_component_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
