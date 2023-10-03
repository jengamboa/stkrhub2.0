-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 06:24 PM
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
-- Table structure for table `added_game_components`
--

CREATE TABLE `added_game_components` (
  `added_component_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `component_id` int(11) NOT NULL,
  `is_custom_design` tinyint(1) NOT NULL,
  `custom_design_file_path` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `added_game_components`
--

INSERT INTO `added_game_components` (`added_component_id`, `game_id`, `component_id`, `is_custom_design`, `custom_design_file_path`, `quantity`, `color_id`, `size`, `user_id`) VALUES
(458, 128, 1, 0, '', 1, NULL, '7x7', 10),
(459, 129, 3, 0, NULL, 1, 1, '7x7', 10),
(460, 130, 3, 0, NULL, 1, 1, '7x7', 3),
(461, NULL, 3, 0, NULL, 1, 1, '7x7', 3),
(462, NULL, 1, 0, '', 1, NULL, '7x7', 3),
(463, NULL, 1, 0, '', 1, NULL, '7x7', 3);

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `user_id`, `fullname`, `number`, `region`, `province`, `city`, `barangay`, `zip`, `street`, `is_default`, `created_at`) VALUES
(7, 3, 'Denzel Go', 'qwe', 'Metro Manila', 'dasd', 'Valenzuela City', 'asd', 'asd', '8 Doneza St. Balubaran Malinta', 0, '2023-09-03 06:23:40'),
(16, 10, 'Denzel Go', '', 'Luzon ', '', 'Valenzuela City', '', '', '8 Doneza St. Balubaran Malinta', 0, '2023-09-27 19:58:48'),
(17, 10, '', '', 'Metro Manila', '', '', '', '', '', 1, '2023-09-27 19:59:00'),
(18, 3, 'Denzel Go', '', 'Visayas', '', 'Valenzuela City', '', '', '8 Doneza St. Balubaran Malinta', 1, '2023-09-29 11:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `created_at`, `avatar`) VALUES
(1, 'admin', 'admin@gmail.com', '123', '2023-09-28 15:05:44', NULL),
(2, 'admin2', 'denzelgo@plv.edu.ph', '$2y$10$.YjvhRu54LmdlJxM42P9jemL6XyxomD/qKppQSjKMnu9BNcC4Ij5O', '2023-09-28 15:32:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`log_id`, `admin_id`, `event_type`, `timestamp`) VALUES
(1, 2, 'login', '2023-09-28 15:33:37'),
(2, 2, 'login', '2023-09-28 15:34:17'),
(3, 0, 'logout', '2023-09-28 15:39:31'),
(4, 2, 'login', '2023-09-28 15:39:43'),
(5, 2, 'login', '2023-09-29 03:11:24'),
(6, 2, 'login', '2023-09-29 07:47:02'),
(7, 0, 'logout', '2023-09-29 09:10:41'),
(8, 2, 'login', '2023-10-02 14:02:46'),
(9, 0, 'logout', '2023-10-02 14:03:16'),
(10, 2, 'login', '2023-10-02 14:03:36'),
(11, 0, 'logout', '2023-10-02 14:04:19'),
(12, 2, 'login', '2023-10-02 14:04:49'),
(13, 0, 'logout', '2023-10-02 14:05:00'),
(14, 2, 'login', '2023-10-02 14:05:44'),
(15, 2, 'login', '2023-10-02 16:50:58'),
(16, 2, 'login', '2023-10-02 16:50:58'),
(17, 2, 'login', '2023-10-02 16:51:12'),
(18, 2, 'login', '2023-10-03 13:42:36'),
(19, 0, 'logout', '2023-10-03 13:43:32'),
(20, 2, 'login', '2023-10-03 13:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_review_response`
--

CREATE TABLE `admin_review_response` (
  `admin_review_response_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `admin_file_upload` varchar(255) DEFAULT NULL,
  `admin_text_response` text DEFAULT NULL,
  `response_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE `age` (
  `age_id` int(11) NOT NULL,
  `age_value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`age_id`, `age_value`) VALUES
(1, '2+'),
(2, '8+'),
(3, '16+'),
(4, '18+');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`log_id`, `user_id`, `action`, `details`, `timestamp`) VALUES
(1, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 18', '2023-10-01 12:08:08'),
(2, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-01 12:08:08'),
(3, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-01 12:08:08'),
(4, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 18', '2023-10-01 12:09:53'),
(5, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-01 12:09:53'),
(6, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-01 12:09:53'),
(7, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 26', '2023-10-02 16:04:55'),
(8, 10, 'PAY USING PAYPAL', 'Purchase ticket_id: 27', '2023-10-02 16:29:19'),
(9, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(10, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(11, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 16:40:01'),
(12, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 16:40:01'),
(13, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-02 16:40:01'),
(14, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-02 16:40:01'),
(15, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 28', '2023-10-02 17:12:53'),
(16, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-02 17:12:53'),
(17, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 17:12:53'),
(18, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-02 17:12:53'),
(19, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-02 17:12:53'),
(20, 3, 'PAY USING PAYPAL', 'Purchase added_component_id: 463', '2023-10-02 17:42:45'),
(21, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-03 13:44:24'),
(22, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-03 14:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `built_games`
--

CREATE TABLE `built_games` (
  `built_game_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `build_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_pending` tinyint(4) DEFAULT 0,
  `is_canceled` tinyint(4) DEFAULT 0,
  `is_approved` tinyint(4) DEFAULT 0,
  `is_purchased` tinyint(4) DEFAULT 0,
  `is_pending_published` tinyint(4) NOT NULL DEFAULT 0,
  `is_request_denied` tinyint(4) NOT NULL DEFAULT 0,
  `is_published` tinyint(4) DEFAULT 0,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games`
--

INSERT INTO `built_games` (`built_game_id`, `game_id`, `name`, `description`, `creator_id`, `build_date`, `is_pending`, `is_canceled`, `is_approved`, `is_purchased`, `is_pending_published`, `is_request_denied`, `is_published`, `price`) VALUES
(106, 0, 'ne', '', 3, '2023-09-27 12:34:08', 0, 0, 0, 0, 0, 0, 0, 7.00),
(108, 102, 'adsasd67', '', 3, '2023-09-27 13:01:16', 0, 0, 1, 0, 0, 0, 0, 0.00),
(109, 0, 'bago', '', 3, '2023-09-27 13:07:23', 0, 0, 0, 0, 0, 0, 0, 140.00),
(112, 107, 'nicolecole', '', 10, '2023-09-28 04:28:06', 0, 0, 0, 0, 0, 0, 0, 21.00),
(114, 0, 'asdda', 'asds', 10, '2023-09-28 20:09:00', 0, 0, 1, 0, 0, 0, 0, 55.00);

-- --------------------------------------------------------

--
-- Table structure for table `built_games_added_game_components`
--

CREATE TABLE `built_games_added_game_components` (
  `added_component_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  `is_custom_design` tinyint(4) DEFAULT NULL,
  `custom_design_file_path` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games_added_game_components`
--

INSERT INTO `built_games_added_game_components` (`added_component_id`, `built_game_id`, `game_id`, `component_id`, `is_custom_design`, `custom_design_file_path`, `quantity`, `color_id`, `size`) VALUES
(380, 114, 0, 2, 1, 'uploads/6515149b84c05_1740712.jpg', 5, 0, '7x7');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `published_game_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `published_game_id`, `game_id`, `built_game_id`, `added_component_id`, `ticket_id`, `quantity`, `price`, `is_active`, `is_visible`) VALUES
(276, 10, 131, NULL, NULL, NULL, NULL, 20, 65.00, 1, 0),
(277, 10, 174, NULL, NULL, NULL, NULL, 3, 1526.00, 1, 0),
(295, 3, 3, NULL, NULL, NULL, NULL, 2, 80.00, 1, 0),
(297, 3, 176, NULL, NULL, NULL, NULL, 12, 1093.00, 1, 0),
(331, 10, NULL, 116, NULL, NULL, 18, 1, 1.20, 1, 0),
(332, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(333, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(342, 10, NULL, 128, NULL, NULL, 26, 1, 1.20, 1, 0),
(343, 10, NULL, 129, NULL, NULL, 27, 1, 0.70, 1, 0),
(344, 10, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(345, 10, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(346, 10, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(347, 10, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(348, 10, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(349, 10, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(350, 3, NULL, 130, NULL, NULL, 28, 1, 0.70, 1, 0),
(355, 3, NULL, NULL, NULL, 463, NULL, 1, 12.00, 1, 0),
(356, 10, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(357, 10, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Board Games'),
(2, 'Card Games'),
(3, 'Dice Games'),
(4, 'Promotional'),
(5, 'RPGs'),
(6, 'War Games');

-- --------------------------------------------------------

--
-- Table structure for table `component_assets`
--

CREATE TABLE `component_assets` (
  `asset_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `asset_path` varchar(255) DEFAULT NULL,
  `is_thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_assets`
--

INSERT INTO `component_assets` (`asset_id`, `component_id`, `asset_path`, `is_thumbnail`) VALUES
(1, 1, 'assets/component_assets/asset1.jpg', NULL),
(2, 2, 'assets/component_assets/asset2.jpg', '1'),
(3, 3, 'assets/component_assets/asset3.jpg', NULL),
(17, 4, 'assets/component_assets/asset2.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `component_colors`
--

CREATE TABLE `component_colors` (
  `color_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_colors`
--

INSERT INTO `component_colors` (`color_id`, `component_id`, `color_name`, `color_code`) VALUES
(1, 3, 'red', '#FF0000'),
(2, 3, 'blue', ' #0000FF'),
(3, 3, 'white', '#FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `component_templates`
--

CREATE TABLE `component_templates` (
  `template_id` int(11) NOT NULL,
  `component_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_templates`
--

INSERT INTO `component_templates` (`template_id`, `component_id`, `template_name`, `template_file_path`) VALUES
(1, 1, 'side 1', 'assets\\component_templates/template1.bin'),
(2, 1, 'side 2', 'assets\\component_templates/template2.png'),
(3, 2, 'side 3', 'assets\\component_templates/template3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `constants`
--

CREATE TABLE `constants` (
  `constant_id` int(11) NOT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `constants`
--

INSERT INTO `constants` (`constant_id`, `classification`, `image_path`, `text`, `percentage`) VALUES
(1, 'thumbnail_built_game', 'img/1x1.jpg', NULL, NULL),
(2, 'approving_ticket_percentage', NULL, NULL, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `courier_name` varchar(255) NOT NULL,
  `courier_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `courier_name`, `courier_logo`) VALUES
(1, 'J&T Express', NULL),
(2, 'Flash Express', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `denied_publish_requests`
--

CREATE TABLE `denied_publish_requests` (
  `denied_publish_request_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `denied_update_publish_requests`
--

CREATE TABLE `denied_update_publish_requests` (
  `denied_update_publish_request_id` int(11) NOT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denied_update_publish_requests`
--

INSERT INTO `denied_update_publish_requests` (`denied_update_publish_request_id`, `published_built_game_id`, `reason`, `file_path`) VALUES
(6, 176, 'zpanget', '0');

-- --------------------------------------------------------

--
-- Table structure for table `destination_rates`
--

CREATE TABLE `destination_rates` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(50) NOT NULL,
  `weight_price_1` decimal(6,2) NOT NULL,
  `weight_price_2` decimal(6,2) NOT NULL,
  `weight_price_3` decimal(6,2) NOT NULL,
  `weight_price_4` decimal(6,2) NOT NULL,
  `weight_price_5` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination_rates`
--

INSERT INTO `destination_rates` (`destination_id`, `destination_name`, `weight_price_1`, `weight_price_2`, `weight_price_3`, `weight_price_4`, `weight_price_5`) VALUES
(1, 'Metro Manila', 85.00, 115.00, 155.00, 225.00, 305.00),
(2, 'Luzon', 95.00, 165.00, 190.00, 280.00, 370.00),
(3, 'Visayas', 100.00, 180.00, 200.00, 300.00, 400.00),
(4, 'Mindanao', 105.00, 195.00, 220.00, 330.00, 440.00),
(5, 'Island', 115.00, 205.00, 230.00, 340.00, 450.00);

-- --------------------------------------------------------

--
-- Table structure for table `dropzone_published_uploads`
--

CREATE TABLE `dropzone_published_uploads` (
  `upload_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `unique_file_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dropzone_published_uploads`
--

INSERT INTO `dropzone_published_uploads` (`upload_id`, `creator_id`, `built_game_id`, `file_name`, `file_path`, `unique_file_name`, `date_added`) VALUES
(1, 123, 456, 'peakpx.jpg', 'uploads/64e7720f7366a_peakpx.jpg', '64e7720f7366a_peakpx.jpg', '2023-08-24 23:06:55'),
(2, 123, 456, 'pxfuel.jpg', 'uploads/64e772102b574_pxfuel.jpg', '64e772102b574_pxfuel.jpg', '2023-08-24 23:06:56'),
(3, 123, 456, '364230412_107425115781751_3994915381724451657_n.jpg', 'uploads/64e7725501e9a_364230412_107425115781751_3994915381724451657_n.jpg', '64e7725501e9a_364230412_107425115781751_3994915381724451657_n.jpg', '2023-08-24 23:08:05'),
(4, 123, 456, '364230412_107425115781751_3994915381724451657_n.jpg', 'uploads/64e7727326fa4_364230412_107425115781751_3994915381724451657_n.jpg', '64e7727326fa4_364230412_107425115781751_3994915381724451657_n.jpg', '2023-08-24 23:08:35'),
(5, 123, 456, 'peakpx.jpg', 'uploads/64e77290d7095_peakpx.jpg', '64e77290d7095_peakpx.jpg', '2023-08-24 23:09:04'),
(6, 123, 456, 'desktop-1920x1080.jpg', 'uploads/64e77385847d3_desktop-1920x1080.jpg', '64e77385847d3_desktop-1920x1080.jpg', '2023-08-24 23:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_built` tinyint(4) DEFAULT 0,
  `is_pending` tinyint(1) DEFAULT 0,
  `to_approve` tinyint(1) NOT NULL DEFAULT 0,
  `is_denied` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `description`, `user_id`, `created_at`, `is_built`, `is_pending`, `to_approve`, `is_denied`, `is_approved`, `is_visible`) VALUES
(116, 'ggs', 'ahaha', 10, '2023-10-01 19:54:54', 0, 0, 1, 0, 0, 0),
(117, 'gamesgame', 'games\n', 3, '2023-10-02 22:26:39', 0, 0, 0, 0, 0, 1),
(118, 'games', 'games\n', 3, '2023-10-02 22:26:44', 0, 0, 0, 0, 0, 1),
(119, 'games ', 'hmm', 10, '2023-10-02 22:53:48', 0, 1, 0, 0, 0, 0),
(120, 'asd', 'asd', 10, '2023-10-02 23:02:34', 0, 0, 0, 0, 0, 0),
(121, 'Z', '', 10, '2023-10-02 23:24:17', 0, 0, 0, 0, 0, 0),
(122, 'a', '', 10, '2023-10-02 23:24:19', 0, 0, 0, 0, 0, 0),
(123, 'create', '', 10, '2023-10-02 23:30:46', 0, 1, 0, 0, 0, 0),
(124, 'game', '', 10, '2023-10-02 23:38:07', 0, 0, 0, 0, 0, 0),
(125, 'asd', '', 10, '2023-10-02 23:43:23', 0, 1, 0, 0, 0, 0),
(126, 'asdasd', 'asd', 10, '2023-10-02 23:45:43', 0, 1, 0, 0, 0, 0),
(127, 'asd', '', 10, '2023-10-02 23:49:21', 0, 1, 0, 0, 0, 0),
(128, 'asdasd', '', 10, '2023-10-02 23:55:19', 0, 0, 1, 0, 0, 1),
(129, 'new game', 'asd', 10, '2023-10-02 23:57:19', 0, 0, 1, 0, 0, 1),
(130, 'asd', '', 3, '2023-10-03 01:12:17', 0, 0, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `games_reasons`
--

CREATE TABLE `games_reasons` (
  `games_reason_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_components`
--

CREATE TABLE `game_components` (
  `component_id` int(11) NOT NULL,
  `component_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `assets` varchar(255) DEFAULT NULL,
  `has_colors` tinyint(1) DEFAULT 0,
  `is_upload_only` tinyint(1) DEFAULT 0,
  `size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_components`
--

INSERT INTO `game_components` (`component_id`, `component_name`, `description`, `price`, `category`, `assets`, `has_colors`, `is_upload_only`, `size`) VALUES
(1, 'Tarrot Cards', 'sd2', 12.00, 'game card', NULL, 0, 0, '7x7'),
(2, 'Box', 'box box', 11.00, 'box', NULL, 0, 1, '7x7'),
(3, 'Dice 2', 'asd', 7.00, 'game piece', NULL, 1, 0, '7x7'),
(4, 'Tarrot Card 2jkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'desc', 14.00, 'game card', NULL, 0, 0, '10x10');

-- --------------------------------------------------------

--
-- Table structure for table `index_banner`
--

CREATE TABLE `index_banner` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_banner`
--

INSERT INTO `index_banner` (`id`, `image_path`) VALUES
(1, 'img/banner/banner2.png'),
(5, 'img/banner/banner1.png');

-- --------------------------------------------------------

--
-- Table structure for table `markup_percentage`
--

CREATE TABLE `markup_percentage` (
  `id` int(11) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markup_percentage`
--

INSERT INTO `markup_percentage` (`id`, `percentage`) VALUES
(1, 20.00);

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
  `ticket_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `in_production` tinyint(1) DEFAULT 0,
  `to_ship` tinyint(1) DEFAULT 0,
  `to_deliver` tinyint(1) DEFAULT 0,
  `is_received` tinyint(1) DEFAULT 0,
  `is_canceled` tinyint(1) DEFAULT 0,
  `is_completely_canceled` int(11) DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp(),
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_rated` tinyint(1) DEFAULT 0,
  `fullname` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `total_payment` decimal(10,2) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_id`, `published_game_id`, `built_game_id`, `added_component_id`, `ticket_id`, `quantity`, `price`, `is_pending`, `in_production`, `to_ship`, `to_deliver`, `is_received`, `is_canceled`, `is_completely_canceled`, `order_date`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_rated`, `fullname`, `number`, `region`, `province`, `city`, `barangay`, `zip`, `street`, `total_payment`, `payment_id`, `paypal_transaction_id`, `payer_id`) VALUES
(97, 356, 10, 175, NULL, NULL, NULL, 1, 115.00, 0, 0, 0, 1, 0, 0, 0, '2023-10-03 21:44:24', 45.00, 9.00, 36.00, 115.00, 0, '', '', 'Metro Manila', '', '', '', '', '', 200.00, 2, '84786509A2110294U', 'S9QZENZKTVY9A'),
(98, 357, 10, 175, NULL, NULL, NULL, 1, 115.00, 0, 0, 0, 1, 0, 0, 0, '2023-10-03 22:24:31', 45.00, 9.00, 36.00, 115.00, 0, '', '', 'Metro Manila', '', '', '', '', '', 200.00, 79423108, '6D1273863G664982K', 'S9QZENZKTVY9A');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_transactions`
--

CREATE TABLE `paypal_transactions` (
  `payment_id` int(11) NOT NULL,
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `order_data_intent` varchar(255) DEFAULT NULL,
  `order_data_status` varchar(255) DEFAULT NULL,
  `order_data_currency_code` varchar(255) DEFAULT NULL,
  `order_data_amount` decimal(10,2) DEFAULT NULL,
  `order_data_payee_email` varchar(255) DEFAULT NULL,
  `order_data_payee_merchant_id` varchar(255) DEFAULT NULL,
  `order_data_capture_id` varchar(255) DEFAULT NULL,
  `order_data_capture_status` varchar(255) DEFAULT NULL,
  `order_data_capture_currency_code` varchar(255) DEFAULT NULL,
  `order_data_capture_amount` decimal(10,2) DEFAULT NULL,
  `order_data_capture_final_capture` tinyint(1) DEFAULT NULL,
  `order_data_capture_seller_protection_status` varchar(255) DEFAULT NULL,
  `order_data_capture_dispute_categories` varchar(255) DEFAULT NULL,
  `order_data_capture_create_time` datetime DEFAULT NULL,
  `order_data_capture_update_time` datetime DEFAULT NULL,
  `payer_given_name` varchar(255) DEFAULT NULL,
  `payer_surname` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL,
  `payer_country_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_transactions`
--

INSERT INTO `paypal_transactions` (`payment_id`, `paypal_transaction_id`, `order_data_intent`, `order_data_status`, `order_data_currency_code`, `order_data_amount`, `order_data_payee_email`, `order_data_payee_merchant_id`, `order_data_capture_id`, `order_data_capture_status`, `order_data_capture_currency_code`, `order_data_capture_amount`, `order_data_capture_final_capture`, `order_data_capture_seller_protection_status`, `order_data_capture_dispute_categories`, `order_data_capture_create_time`, `order_data_capture_update_time`, `payer_given_name`, `payer_surname`, `payer_email`, `payer_id`, `payer_country_code`) VALUES
(2, '84786509A2110294U', 'CAPTURE', 'COMPLETED', 'PHP', 200.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2UN20534FX9019004', 'COMPLETED', 'PHP', 200.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-03 13:44:23', '2023-10-03 13:44:23', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(3, '8EW426394M6551643', 'CAPTURE', 'COMPLETED', 'PHP', 5974.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '3XG15091K8440251M', 'COMPLETED', 'PHP', 5974.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-01 12:08:06', '2023-10-01 12:08:06', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(5, '6EW63364D71231728', 'CAPTURE', 'COMPLETED', 'PHP', 95.70, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '5MJ1266810575313Y', 'COMPLETED', 'PHP', 95.70, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-02 16:29:18', '2023-10-02 16:29:18', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(7, '8PD59691KJ792791F', 'CAPTURE', 'COMPLETED', 'PHP', 96.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '7NV15103UB100752V', 'COMPLETED', 'PHP', 96.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-02 16:04:54', '2023-10-02 16:04:54', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(47, '556267742C0064743', 'CAPTURE', 'COMPLETED', 'PHP', 5974.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '47W65631W4577405Y', 'COMPLETED', 'PHP', 5974.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-01 12:09:51', '2023-10-01 12:09:51', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(56, '7V204696VT8452042', 'CAPTURE', 'COMPLETED', 'PHP', 3914.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '56D99159MT574012Y', 'COMPLETED', 'PHP', 3914.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-02 16:40:00', '2023-10-02 16:40:00', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(62339834, '20J74113HE0678917', 'CAPTURE', 'COMPLETED', 'PHP', 14584.70, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '62339834US3057154', 'COMPLETED', 'PHP', 14584.70, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-02 17:12:52', '2023-10-02 17:12:52', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(79423108, '6D1273863G664982K', 'CAPTURE', 'COMPLETED', 'PHP', 200.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '79423108KC697971U', 'COMPLETED', 'PHP', 200.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-03 14:24:30', '2023-10-03 14:24:30', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(2147483647, '5JL43382WN6342207', 'CAPTURE', 'COMPLETED', 'PHP', 112.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '24E42326KC931612J', 'COMPLETED', 'PHP', 112.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-02 17:42:44', '2023-10-02 17:42:44', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `pending_published_built_games`
--

CREATE TABLE `pending_published_built_games` (
  `pending_published_built_game_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `has_pending_update` tinyint(1) DEFAULT NULL,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_published_multiple_files`
--

CREATE TABLE `pending_published_multiple_files` (
  `pending_published_file_id` int(11) NOT NULL,
  `pending_published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_update_published_built_games`
--

CREATE TABLE `pending_update_published_built_games` (
  `pending_update_published_built_games_id` int(11) NOT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `published_date` date DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_update_published_multiple_files`
--

CREATE TABLE `pending_update_published_multiple_files` (
  `pending_update_published_multiple_files_id` int(11) NOT NULL,
  `pending_update_published_built_game_id` int(11) DEFAULT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `published_built_games`
--

CREATE TABLE `published_built_games` (
  `published_game_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `category` text DEFAULT NULL,
  `edition` varchar(255) NOT NULL,
  `published_date` datetime NOT NULL DEFAULT current_timestamp(),
  `creator_id` int(11) NOT NULL,
  `age_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) NOT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_playtime` int(11) DEFAULT NULL,
  `max_playtime` int(11) DEFAULT NULL,
  `has_pending_update` tinyint(1) DEFAULT 0,
  `is_update_request_denied` tinyint(1) NOT NULL DEFAULT 0,
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_built_games`
--

INSERT INTO `published_built_games` (`published_game_id`, `built_game_id`, `game_name`, `category`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `has_pending_update`, `is_update_request_denied`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_hidden`) VALUES
(3, 3, 'Game 3', 'Board Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(128, 48, 'The HUHU and the HAHA (First Edition)', 'Board Games', 'huhu', '2023-08-31 00:00:00', 10, 1, '77', '77', 'https://www.figma.com/file/DjBLsWy8ezwSHS3rPOj9Es/STKR-HUB?type=design&node-id=2-811&mode=design&t=4vXOGWFOjXgzU5bl-0', 'uploads/64f04b866fd71_old published multiple files.png', 77, 77, 77, 77, 0, 0, 1000.00, 200.00, 800.00, 2500.00, 0),
(130, 48, 'bago', 'Board Games', 'bago', '2023-09-03 00:00:00', 3, 3, 'sad', 'asd', 'https://facebook.com', 'uploads/64f4a19c89462_Untitled.png', 123, 123, 123, 123, 0, 0, 1000.00, 200.00, 800.00, 2500.00, 0),
(131, 4, 'Game 2', 'Board Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(132, 5, 'Game 3', 'Board Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(133, 4, 'Game 2', 'Card Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(134, 5, 'Game 3', 'Card Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(135, 4, 'Game 2', 'Card Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(136, 5, 'Game 3', 'Card Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(137, 4, 'Game 2', 'Card Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(138, 5, 'Game 3', 'Dice Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(139, 4, 'Game 2', 'War Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(140, 5, 'Game 3', 'Dice Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(141, 4, 'Game 2', 'Dice Games', 'Deluxe', '2023-09-05 00:00:00', 2, 2, 'Short Desc 2', 'Long Desc 2', 'https://example.com/game2', 'uploads/64f4a19c89462_Untitled.png', 1, 6, 15, 90, 1, 0, 25.00, 15.00, 7.00, 65.00, 0),
(142, 5, 'Game 3', 'Dice Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(143, 3, 'Game 3', 'War Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(144, 3, 'Game 3', 'dice games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(145, 3, 'Game 3', 'War Games', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(146, 3, 'Game 3', 'RPGs', 'Collector\'s', '2023-09-05 00:00:00', 3, 3, 'Short Desc 3', 'Long Desc 3', 'https://example.com/game3', 'uploads/64f4a19c89462_Untitled.png', 2, 8, 45, 120, 0, 0, 30.00, 20.00, 10.00, 80.00, 0),
(174, 73, '777bagong bagooooooo', '6', '890890890', '2023-09-27 00:00:00', 3, 2, 'awdafwaefaefaef', 'asdaweaqwdawdf', 'https://facebook.com', 'uploads/65135ba115178_656464.jpg', 890890, 2147483647, 2147483647, 2147483647, 0, 0, 700.00, 140.00, 560.00, 1526.00, 0),
(175, 74, 'haha', '2', 'first', '2023-09-27 00:00:00', 3, 3, '34', '34', 'https://facebook.comopo7', 'uploads/65136bb9a73e4_1577032.jpg', 34, 34, 34, 34, 0, 0, 45.00, 9.00, 36.00, 115.00, 1),
(176, 94, 'dfg', '2', 'dfg', '2023-09-27 00:00:00', 3, 1, '234', '234', 'https://facebook.comopo7', 'uploads/651382263257f_2021-2022 2nd sem card.jpg', 234, 234, 234, 234, 0, 1, 1000.00, 200.00, 800.00, 1093.00, 0),
(177, 107, 'dsf', '3', '123', '2023-09-27 00:00:00', 10, 1, '123', '123', 'https://facebook.com', 'uploads/6513bff2151e3_2021-2022 2nd sem card.jpg', 123, 123, 123, 123, 0, 0, 500.00, 100.00, 400.00, 855.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `published_multiple_files`
--

CREATE TABLE `published_multiple_files` (
  `published_file_id` int(11) NOT NULL,
  `published_built_game_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_multiple_files`
--

INSERT INTO `published_multiple_files` (`published_file_id`, `published_built_game_id`, `built_game_id`, `creator_id`, `file_path`) VALUES
(194, 174, 73, 3, 'uploads/65135ba11607d_656464.jpg'),
(195, 174, 73, 3, 'uploads/65135ba11637c_970588.jpg'),
(196, 174, 73, 3, 'uploads/65135ba116669_1162247.jpg'),
(197, 174, 73, 3, 'uploads/65135ba11687b_1232917.jpg'),
(198, 174, 73, 3, 'uploads/65135ba116ab1_1263728.png'),
(199, 174, 73, 3, 'uploads/65135ba118838_1577032.jpg'),
(200, 174, 73, 3, 'uploads/65135ba118a3c_1740712.jpg'),
(201, 174, 73, 3, 'uploads/65135ba118c70_1740717.png'),
(203, 176, 94, 3, 'uploads/6513822633ec3_2021-2022 2nd sem card.jpg'),
(204, 176, 94, 3, 'uploads/6513822634113_656464.jpg'),
(205, 176, 94, 3, 'uploads/65138226342ef_970588.jpg'),
(206, 176, 94, 3, 'uploads/6513822634508_1162247.jpg'),
(207, 176, 94, 3, 'uploads/6513822634707_1232917.jpg'),
(208, 176, 94, 3, 'uploads/6513822634955_1263728.png'),
(209, 176, 94, 3, 'uploads/6513822634b23_1577032.jpg'),
(210, 176, 94, 3, 'uploads/6513822634d2c_1740712.jpg'),
(211, 176, 94, 3, 'uploads/6513822634f17_1740717.png'),
(212, 177, 107, 10, 'uploads/6513bff216358_2021-2022 2nd sem card.jpg'),
(213, 177, 107, 10, 'uploads/6513bff21660b_656464.jpg'),
(214, 177, 107, 10, 'uploads/6513bff216a88_970588.jpg'),
(215, 177, 107, 10, 'uploads/6513bff216d35_1162247.jpg'),
(216, 177, 107, 10, 'uploads/6513bff21718f_1232917.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `published_game_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) NOT NULL,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_denied` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_at_cart` tinyint(1) DEFAULT 0,
  `is_purchased` tinyint(1) DEFAULT 0,
  `is_accepted` tinyint(1) DEFAULT 0,
  `is_canceled` tinyint(1) DEFAULT 0,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `ticket_price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `user_id`, `game_id`, `is_approved`, `is_denied`, `created_at`, `is_at_cart`, `is_purchased`, `is_accepted`, `is_canceled`, `total_price`, `ticket_price`) VALUES
(25, 10, 129, 0, 0, '2023-10-02 15:57:40', 1, 0, 0, 0, 7.00, 0.70),
(27, 10, 129, 0, 0, '2023-10-02 16:21:38', 0, 1, 0, 0, 7.00, 0.70),
(28, 3, 130, 0, 0, '2023-10-02 17:12:29', 0, 1, 0, 0, 7.00, 0.70);

-- --------------------------------------------------------

--
-- Table structure for table `to_deliver`
--

CREATE TABLE `to_deliver` (
  `to_deliver_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `courier` varchar(255) NOT NULL,
  `date_time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `to_deliver`
--

INSERT INTO `to_deliver` (`to_deliver_id`, `order_id`, `tracking_number`, `courier`, `date_time_stamp`) VALUES
(5, 97, '', '', '2023-10-03 15:26:26'),
(6, 97, '1234', '', '2023-10-03 15:26:53'),
(7, 97, 'a', 'J&T Express', '2023-10-03 15:27:37'),
(8, 98, '', 'J&T Express', '2023-10-03 15:28:37'),
(9, 97, '123', 'J&T Express', '2023-10-03 15:29:43'),
(10, 97, '7', 'Flash Express', '2023-10-03 15:31:46'),
(11, 97, '7', 'J&T Express', '2023-10-03 15:34:13'),
(12, 97, '6', 'J&T Express', '2023-10-03 15:35:07'),
(13, 97, '0', 'J&T Express', '2023-10-03 15:37:12'),
(14, 97, '8', 'J&T Express', '2023-10-03 15:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `tutorial_id` int(11) NOT NULL,
  `tutorial_title` varchar(255) DEFAULT NULL,
  `tutorial_description` text DEFAULT NULL,
  `tutorial_link` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `time_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`tutorial_id`, `tutorial_title`, `tutorial_description`, `tutorial_link`, `is_primary`, `time_added`) VALUES
(1, 'How to Create a Game ', 'asdasdasd asdasdasd asdasd asdasd asd asd asd asd asd asd asd asd d as d asd as dasd asdasda sd asd asd asd asd  a  ds asd asd a sd asd aasdasd', 'https://www.youtube-nocookie.com/embed/dSPh9fqZiHc?si=v9Gkjb1kk0JBdr2S', 1, '2023-09-12 21:31:52'),
(2, 'Kisame', 'asdasdads asd as dasd as asd', 'https://www.youtube-nocookie.com/embed/NmFwemHybNE?si=H4IEN0-q4oSaIWgh', 1, '2023-09-22 21:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipping_address` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`, `shipping_address`, `avatar`) VALUES
(3, 'denzel', 'denzelgo17@gmail.com', '$2y$10$ARZ0Q6SNMcoKJIvaaiGwZeb/T0EtfPk9HMj.XvGnVgdcMYL8ZkwKa', '2023-08-02 09:11:37', 'asd', 'avatars/8173e568598f81410724842698d17181.jpg'),
(4, 'jerrick', 'jerrick@gmail.com', '$2y$10$GLMUnEDCDln02y6c/zMR9O2W78THngXnkxL06sair.wT5gt9Bx7Ya', '2023-08-02 09:14:19', NULL, NULL),
(5, 'jp', 'jp@gmail.com', '$2y$10$4B39cJlUoie9r2lN65LRbu.1YdKsDgMdfuIPUJECdFlgsUBNSWQn.', '2023-08-03 05:09:20', NULL, NULL),
(6, 'berns', 'berns@gmail.com', '$2y$10$cGi0jPeiwD62dxv/vk7WMePFmV4ro0rAut7dAQscujTptnGXnPTte', '2023-08-10 08:46:14', NULL, NULL),
(7, 'fauline', 'fauline_knipz@yahoo.com', '$2y$10$tgbZZGb7jph4SJ3xKpF8Au5Rr74McPWqsUdqpoY/uR2VE2j/s/qJe', '2023-08-30 03:04:24', NULL, NULL),
(8, 'jennica', 'jennica@gmail.com', '$2y$10$WJlhPmUz0xTn8wUpTbDB/eVIbApu/Pnz8m8.Ypk6XCFROFCjw.xZ6', '2023-08-30 05:19:12', NULL, NULL),
(9, 'Kenmar', 'kenmar@gmail.com', '$2y$10$AIAMKryRhZ7viSqRnxrdHexrA2TMDiAaqwLTK0QzKla6OEH6nXgkS', '2023-08-30 06:34:05', NULL, NULL),
(10, 'nicole', 'nicole@gmail.com', '$2y$10$P7TNqwoCy7jqry07RZOiye1j3lzNocu5d1e1NDR89BM8fpsmYgOGi', '2023-09-27 04:35:55', NULL, NULL),
(11, 'admin', 'denzelgo17@gmail.com', '123', '2023-09-28 14:57:02', NULL, NULL),
(12, 'admin1', 'admin@gmail.com', '$2y$10$GKrIa619rJuXVRSjWtLoLOvssAnsM7wGkdgyyem6UCbDJym3ixaEO', '2023-09-28 15:01:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` enum('login','logout') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `event_type`, `timestamp`) VALUES
(1, 1, 'login', '2023-08-01 03:39:23'),
(2, 1, 'login', '2023-08-01 03:56:32'),
(3, 1, 'login', '2023-08-01 03:59:24'),
(4, 2, 'login', '2023-08-01 05:14:59'),
(5, 1, 'login', '2023-08-01 05:15:36'),
(6, 1, 'login', '2023-08-02 07:25:23'),
(7, 1, 'login', '2023-08-02 07:46:59'),
(8, 2, 'login', '2023-08-02 09:09:55'),
(9, 1, 'login', '2023-08-02 09:10:23'),
(10, 3, 'login', '2023-08-02 09:11:40'),
(11, 4, 'login', '2023-08-02 09:14:24'),
(12, 3, 'login', '2023-08-02 10:03:19'),
(13, 3, 'logout', '2023-08-02 10:04:34'),
(14, 4, 'login', '2023-08-02 10:04:56'),
(15, 4, 'logout', '2023-08-02 10:15:42'),
(16, 3, 'login', '2023-08-02 10:15:49'),
(17, 3, 'login', '2023-08-02 10:28:09'),
(18, 5, 'login', '2023-08-03 05:09:24'),
(19, 3, 'login', '2023-08-03 12:21:02'),
(20, 3, 'login', '2023-08-03 23:51:06'),
(21, 3, 'login', '2023-08-07 00:02:46'),
(22, 3, 'login', '2023-08-07 06:55:28'),
(23, 3, 'logout', '2023-08-07 08:06:42'),
(24, 4, 'login', '2023-08-07 08:06:45'),
(25, 4, 'logout', '2023-08-07 08:07:34'),
(26, 3, 'login', '2023-08-07 08:07:39'),
(27, 3, 'login', '2023-08-07 09:49:50'),
(28, 3, 'login', '2023-08-08 03:29:35'),
(29, 3, 'login', '2023-08-08 23:09:00'),
(30, 3, 'login', '2023-08-10 00:16:07'),
(31, 3, 'login', '2023-08-10 03:53:35'),
(32, 3, 'logout', '2023-08-10 03:53:51'),
(33, 4, 'login', '2023-08-10 03:53:54'),
(34, 3, 'logout', '2023-08-10 08:46:03'),
(35, 6, 'login', '2023-08-10 08:46:17'),
(36, 3, 'login', '2023-08-11 00:27:28'),
(37, 3, 'logout', '2023-08-11 08:30:35'),
(38, 3, 'login', '2023-08-12 05:13:49'),
(39, 3, 'login', '2023-08-12 07:42:35'),
(40, 3, 'login', '2023-08-12 12:10:50'),
(41, 3, 'login', '2023-08-13 03:03:52'),
(42, 3, 'login', '2023-08-13 04:39:49'),
(43, 3, 'login', '2023-08-13 05:58:21'),
(44, 3, 'login', '2023-08-14 14:37:29'),
(45, 3, 'login', '2023-08-14 14:37:43'),
(46, 4, 'login', '2023-08-14 14:38:02'),
(47, 4, 'login', '2023-08-14 14:55:54'),
(48, 3, 'login', '2023-08-14 16:40:55'),
(49, 3, 'login', '2023-08-14 22:43:00'),
(50, 3, 'login', '2023-08-15 14:26:35'),
(51, 3, 'login', '2023-08-16 01:41:54'),
(52, 3, 'login', '2023-08-16 01:46:08'),
(53, 3, 'login', '2023-08-16 07:09:19'),
(54, 4, 'login', '2023-08-16 07:09:54'),
(55, 4, 'login', '2023-08-16 07:12:54'),
(56, 4, 'login', '2023-08-16 07:26:02'),
(57, 3, 'login', '2023-08-16 12:03:59'),
(58, 4, 'login', '2023-08-16 12:36:02'),
(59, 3, 'login', '2023-08-16 13:26:54'),
(60, 3, 'login', '2023-08-17 13:48:15'),
(61, 3, 'login', '2023-08-19 04:41:59'),
(62, 3, 'login', '2023-08-21 13:09:20'),
(63, 3, 'login', '2023-08-23 06:53:31'),
(64, 3, 'login', '2023-08-23 12:32:19'),
(65, 3, 'login', '2023-08-24 12:50:36'),
(66, 3, 'login', '2023-08-24 14:35:32'),
(67, 3, 'login', '2023-08-25 12:53:11'),
(68, 4, 'login', '2023-08-25 13:44:10'),
(69, 3, 'login', '2023-08-25 15:47:41'),
(70, 3, 'login', '2023-08-27 05:13:43'),
(71, 4, 'login', '2023-08-27 13:16:51'),
(72, 4, 'login', '2023-08-28 05:47:08'),
(73, 3, 'login', '2023-08-28 14:09:30'),
(74, 3, 'login', '2023-08-28 14:10:33'),
(75, 3, 'login', '2023-08-28 14:49:32'),
(76, 3, 'login', '2023-08-28 22:08:01'),
(77, 7, 'login', '2023-08-30 03:05:03'),
(78, 8, 'login', '2023-08-30 05:19:26'),
(79, 8, 'login', '2023-08-30 05:33:04'),
(80, 8, 'login', '2023-08-30 05:33:18'),
(81, 9, 'login', '2023-08-30 06:34:39'),
(82, 7, 'login', '2023-08-30 14:50:42'),
(83, 3, 'login', '2023-08-31 03:13:38'),
(84, 7, 'login', '2023-08-31 09:36:13'),
(85, 3, 'login', '2023-08-31 12:15:28'),
(86, 3, 'login', '2023-08-31 13:58:38'),
(87, 3, 'login', '2023-09-02 09:37:17'),
(88, 3, 'login', '2023-09-02 12:14:12'),
(89, 3, 'login', '2023-09-03 05:40:21'),
(90, 3, 'login', '2023-09-03 14:37:32'),
(91, 3, 'login', '2023-09-03 22:25:17'),
(92, 3, 'login', '2023-09-04 12:51:57'),
(93, 3, 'login', '2023-09-04 18:51:30'),
(94, 3, 'login', '2023-09-08 12:32:41'),
(95, 3, 'login', '2023-09-09 14:50:59'),
(96, 3, 'login', '2023-09-10 04:17:19'),
(97, 3, 'login', '2023-09-10 04:17:48'),
(98, 7, 'login', '2023-09-10 04:18:07'),
(99, 3, 'login', '2023-09-11 15:02:00'),
(100, 3, 'login', '2023-09-11 15:42:05'),
(101, 7, 'login', '2023-09-11 15:49:57'),
(102, 3, 'login', '2023-09-11 15:50:37'),
(103, 3, 'login', '2023-09-11 22:33:30'),
(104, 3, 'login', '2023-09-13 03:39:41'),
(105, 3, 'login', '2023-09-13 07:16:10'),
(106, 3, 'login', '2023-09-13 10:01:01'),
(107, 3, 'login', '2023-09-13 10:02:09'),
(108, 3, 'login', '2023-09-13 10:02:48'),
(109, 3, 'login', '2023-09-13 10:03:14'),
(110, 3, 'login', '2023-09-13 10:03:53'),
(111, 3, 'login', '2023-09-13 10:06:03'),
(112, 3, 'login', '2023-09-13 10:23:29'),
(113, 3, 'login', '2023-09-13 11:00:17'),
(114, 3, 'login', '2023-09-13 11:27:55'),
(115, 3, 'login', '2023-09-13 11:28:03'),
(116, 3, 'login', '2023-09-13 11:32:20'),
(117, 3, 'login', '2023-09-13 11:32:51'),
(118, 3, 'login', '2023-09-13 11:38:04'),
(119, 3, 'login', '2023-09-13 11:38:28'),
(120, 3, 'login', '2023-09-13 12:15:26'),
(121, 3, 'login', '2023-09-14 05:24:08'),
(122, 7, 'login', '2023-09-14 05:24:33'),
(123, 3, 'login', '2023-09-14 05:26:55'),
(124, 7, 'login', '2023-09-14 05:36:57'),
(125, 3, 'login', '2023-09-14 05:38:18'),
(126, 7, 'login', '2023-09-14 05:40:35'),
(127, 3, 'login', '2023-09-14 05:49:43'),
(128, 7, 'login', '2023-09-14 05:49:49'),
(129, 3, 'login', '2023-09-14 05:59:21'),
(130, 4, 'login', '2023-09-14 05:59:44'),
(131, 3, 'login', '2023-09-14 09:40:20'),
(132, 3, 'login', '2023-09-14 13:33:33'),
(133, 3, 'login', '2023-09-18 13:15:20'),
(134, 3, 'login', '2023-09-19 15:07:44'),
(135, 3, 'login', '2023-09-20 00:10:30'),
(136, 3, 'login', '2023-09-20 01:29:23'),
(137, 3, 'login', '2023-09-21 04:13:37'),
(138, 3, 'login', '2023-09-21 08:08:50'),
(139, 3, 'login', '2023-09-21 12:06:12'),
(140, 3, 'login', '2023-09-22 01:58:42'),
(141, 3, 'login', '2023-09-23 14:54:43'),
(142, 3, 'login', '2023-09-24 05:29:12'),
(143, 3, 'login', '2023-09-25 12:47:41'),
(144, 3, 'login', '2023-09-26 09:46:20'),
(145, 3, 'login', '2023-09-26 22:28:20'),
(146, 8, 'login', '2023-09-26 23:44:26'),
(147, 3, 'login', '2023-09-26 23:46:38'),
(148, 8, 'login', '2023-09-26 23:48:00'),
(149, 3, 'login', '2023-09-26 23:54:59'),
(150, 8, 'login', '2023-09-27 00:31:20'),
(151, 3, 'login', '2023-09-27 00:32:17'),
(152, 4, 'login', '2023-09-27 03:11:57'),
(153, 3, 'login', '2023-09-27 03:21:04'),
(154, 3, 'login', '2023-09-27 03:39:05'),
(155, 7, 'login', '2023-09-27 04:35:42'),
(156, 10, 'login', '2023-09-27 04:35:58'),
(157, 3, 'login', '2023-09-27 04:54:36'),
(158, 10, 'login', '2023-09-27 04:54:52'),
(159, 3, 'login', '2023-09-27 05:01:01'),
(160, 10, 'login', '2023-09-27 05:14:31'),
(161, 3, 'login', '2023-09-27 05:20:39'),
(162, 10, 'login', '2023-09-27 05:21:36'),
(163, 3, 'login', '2023-09-27 07:09:45'),
(164, 3, 'login', '2023-09-27 11:28:54'),
(165, 10, 'login', '2023-09-27 19:35:28'),
(166, 3, 'login', '2023-09-27 19:42:36'),
(167, 10, 'login', '2023-09-27 19:58:27'),
(168, 3, 'login', '2023-09-29 07:11:26'),
(169, 3, 'login', '2023-09-29 09:10:49'),
(170, 10, 'login', '2023-10-01 11:48:48'),
(171, 3, 'login', '2023-10-01 11:49:08'),
(172, 10, 'login', '2023-10-01 11:49:17'),
(173, 3, 'login', '2023-10-02 14:03:08'),
(174, 3, 'login', '2023-10-02 14:03:47'),
(175, 3, 'login', '2023-10-02 14:04:29'),
(176, 3, 'login', '2023-10-02 14:05:21'),
(177, 10, 'login', '2023-10-02 14:35:26'),
(178, 3, 'login', '2023-10-02 17:12:11'),
(179, 3, 'login', '2023-10-03 09:03:56'),
(180, 10, 'login', '2023-10-03 09:15:21'),
(181, 3, 'login', '2023-10-03 13:43:42'),
(182, 10, 'login', '2023-10-03 13:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_review_response`
--

CREATE TABLE `user_review_response` (
  `user_review_response_id` int(11) NOT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `user_file_upload` varchar(255) DEFAULT NULL,
  `user_text_response` text DEFAULT NULL,
  `response_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_review_response`
--

INSERT INTO `user_review_response` (`user_review_response_id`, `built_game_id`, `user_file_upload`, `user_text_response`, `response_date`) VALUES
(10, 45, 'uploads/response/user/old published multiple files.png', 'baket mo hindi inapprubaha.. eto ung patunay ko', '2023-08-30 05:37:36'),
(11, 46, 'uploads/response/user/stkrhub_db.sql', 'bakit cinancel,, ehh eto ung patunay na hinid ko ninakaw', '2023-08-30 06:40:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_game_components`
--
ALTER TABLE `added_game_components`
  ADD PRIMARY KEY (`added_component_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `component_id` (`component_id`),
  ADD KEY `FK_added_game_components_color` (`color_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  ADD PRIMARY KEY (`admin_review_response_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `age`
--
ALTER TABLE `age`
  ADD PRIMARY KEY (`age_id`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `built_games`
--
ALTER TABLE `built_games`
  ADD PRIMARY KEY (`built_game_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD PRIMARY KEY (`added_component_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `FK_cart_added_game_components` (`added_component_id`),
  ADD KEY `FK_cart_games` (`game_id`),
  ADD KEY `FK_cart_users` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `component_assets`
--
ALTER TABLE `component_assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `component_colors`
--
ALTER TABLE `component_colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `component_templates`
--
ALTER TABLE `component_templates`
  ADD PRIMARY KEY (`template_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `constants`
--
ALTER TABLE `constants`
  ADD PRIMARY KEY (`constant_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `denied_publish_requests`
--
ALTER TABLE `denied_publish_requests`
  ADD PRIMARY KEY (`denied_publish_request_id`);

--
-- Indexes for table `denied_update_publish_requests`
--
ALTER TABLE `denied_update_publish_requests`
  ADD PRIMARY KEY (`denied_update_publish_request_id`);

--
-- Indexes for table `destination_rates`
--
ALTER TABLE `destination_rates`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `dropzone_published_uploads`
--
ALTER TABLE `dropzone_published_uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `games_reasons`
--
ALTER TABLE `games_reasons`
  ADD PRIMARY KEY (`games_reason_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `game_components`
--
ALTER TABLE `game_components`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `index_banner`
--
ALTER TABLE `index_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markup_percentage`
--
ALTER TABLE `markup_percentage`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_published_built_games`
--
ALTER TABLE `pending_published_built_games`
  ADD PRIMARY KEY (`pending_published_built_game_id`);

--
-- Indexes for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  ADD PRIMARY KEY (`pending_published_file_id`),
  ADD KEY `pending_published_built_game_id` (`pending_published_built_game_id`);

--
-- Indexes for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  ADD PRIMARY KEY (`pending_update_published_built_games_id`);

--
-- Indexes for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  ADD PRIMARY KEY (`pending_update_published_multiple_files_id`);

--
-- Indexes for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD PRIMARY KEY (`published_game_id`),
  ADD KEY `age_id` (`age_id`);

--
-- Indexes for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  ADD PRIMARY KEY (`published_file_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `published_game_id` (`published_game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `to_deliver`
--
ALTER TABLE `to_deliver`
  ADD PRIMARY KEY (`to_deliver_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_review_response`
--
ALTER TABLE `user_review_response`
  ADD PRIMARY KEY (`user_review_response_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_game_components`
--
ALTER TABLE `added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  MODIFY `admin_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `age`
--
ALTER TABLE `age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `built_games`
--
ALTER TABLE `built_games`
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `component_assets`
--
ALTER TABLE `component_assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `component_colors`
--
ALTER TABLE `component_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `component_templates`
--
ALTER TABLE `component_templates`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `constants`
--
ALTER TABLE `constants`
  MODIFY `constant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `denied_publish_requests`
--
ALTER TABLE `denied_publish_requests`
  MODIFY `denied_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `denied_update_publish_requests`
--
ALTER TABLE `denied_update_publish_requests`
  MODIFY `denied_update_publish_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destination_rates`
--
ALTER TABLE `destination_rates`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dropzone_published_uploads`
--
ALTER TABLE `dropzone_published_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `games_reasons`
--
ALTER TABLE `games_reasons`
  MODIFY `games_reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `index_banner`
--
ALTER TABLE `index_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `markup_percentage`
--
ALTER TABLE `markup_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `pending_published_built_games`
--
ALTER TABLE `pending_published_built_games`
  MODIFY `pending_published_built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  MODIFY `pending_published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  MODIFY `pending_update_published_built_games_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  MODIFY `pending_update_published_multiple_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `published_built_games`
--
ALTER TABLE `published_built_games`
  MODIFY `published_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  MODIFY `published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `to_deliver`
--
ALTER TABLE `to_deliver`
  MODIFY `to_deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `user_review_response`
--
ALTER TABLE `user_review_response`
  MODIFY `user_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `added_game_components`
--
ALTER TABLE `added_game_components`
  ADD CONSTRAINT `FK_added_game_components_color` FOREIGN KEY (`color_id`) REFERENCES `component_colors` (`color_id`),
  ADD CONSTRAINT `added_game_components_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `added_game_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  ADD CONSTRAINT `admin_review_response_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `admin_review_response_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `built_games`
--
ALTER TABLE `built_games`
  ADD CONSTRAINT `built_games_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD CONSTRAINT `built_games_added_game_components_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `built_games_added_game_components_ibfk_3` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart_added_game_components` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_cart_games` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_cart_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`) ON DELETE CASCADE;

--
-- Constraints for table `component_assets`
--
ALTER TABLE `component_assets`
  ADD CONSTRAINT `component_assets_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `component_colors`
--
ALTER TABLE `component_colors`
  ADD CONSTRAINT `component_colors_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `component_templates`
--
ALTER TABLE `component_templates`
  ADD CONSTRAINT `component_templates_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `game_components` (`component_id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `games_reasons`
--
ALTER TABLE `games_reasons`
  ADD CONSTRAINT `games_reasons_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`);

--
-- Constraints for table `pending_published_multiple_files`
--
ALTER TABLE `pending_published_multiple_files`
  ADD CONSTRAINT `pending_published_multiple_files_ibfk_1` FOREIGN KEY (`pending_published_built_game_id`) REFERENCES `pending_published_built_games` (`pending_published_built_game_id`);

--
-- Constraints for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD CONSTRAINT `published_built_games_ibfk_1` FOREIGN KEY (`age_id`) REFERENCES `age` (`age_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`published_game_id`) REFERENCES `published_built_games` (`published_game_id`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
