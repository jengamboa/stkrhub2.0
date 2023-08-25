-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 05:29 PM
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
(314, 36, 3, 0, NULL, 2, 3, '7x7', 3),
(315, NULL, 3, 0, NULL, 4, 2, '7x7', 3),
(316, NULL, 3, 0, NULL, 7, 2, '7x7', 3),
(317, 34, 3, 0, NULL, 21, 3, '7x7', 3),
(318, NULL, 3, 0, NULL, 22, 1, '7x7', 3),
(319, 38, 3, 0, NULL, 7, 3, '7x7', 3),
(320, 38, 1, 1, 'uploads/AUTHORS', 25, NULL, '7x7', 3),
(324, 35, 1, 0, '', 2, NULL, '7x7', 4),
(325, 37, 2, 0, '', 3, NULL, '7x7', 4);

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
-- Table structure for table `built_games`
--

CREATE TABLE `built_games` (
  `built_game_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `build_date` datetime NOT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `is_canceled` tinyint(4) DEFAULT 0,
  `is_approved` tinyint(4) DEFAULT 0,
  `is_purchased` tinyint(4) DEFAULT 0,
  `is_published` tinyint(4) DEFAULT 0,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games`
--

INSERT INTO `built_games` (`built_game_id`, `game_id`, `name`, `description`, `creator_id`, `build_date`, `is_pending`, `is_canceled`, `is_approved`, `is_purchased`, `is_published`, `price`) VALUES
(27, 34, 'game 1', 'desc', 3, '2023-08-12 20:59:20', 0, 0, 1, 0, 0, 0.00),
(28, 34, 'game 1', 'desc', 3, '2023-08-12 20:59:51', 0, 0, 1, 0, 0, 0.00),
(29, 34, 'game 1', 'desc', 3, '2023-08-12 21:00:33', 0, 0, 0, 0, 0, 12.00),
(30, 34, 'game 1', 'desc', 3, '2023-08-12 21:01:01', 0, 0, 0, 0, 0, 12.00),
(31, 34, 'game 1', 'desc', 3, '2023-08-12 21:05:05', 0, 0, 0, 0, 0, 12.00),
(32, 34, 'game 1', 'desc', 3, '2023-08-12 21:06:02', 0, 0, 0, 0, 0, 12.00),
(33, 34, 'game 1', 'desc', 3, '2023-08-12 21:08:32', 0, 0, 0, 0, 0, 23.00),
(34, 34, 'game 1', 'desc', 3, '2023-08-12 21:13:29', 0, 0, 1, 1, 1, 23.00),
(35, 35, 'jeric', 'asd', 4, '2023-08-14 22:56:10', 0, 0, 1, 0, 0, 0.00),
(36, 36, 'hehe', 'hehe', 3, '2023-08-15 06:51:35', 0, 0, 1, 1, 1, 0.00),
(37, 38, 'dice game', 'action', 3, '2023-08-19 13:31:19', 0, 0, 0, 0, 0, 7.00),
(38, 38, 'dice game', 'action', 3, '2023-08-19 13:37:47', 0, 0, 0, 0, 0, 19.00),
(39, 38, 'dice game', 'action', 3, '2023-08-19 14:35:48', 0, 0, 1, 1, 0, 19.00),
(40, 35, 'jeric', 'asd', 4, '2023-08-25 22:01:40', 0, 0, 1, 1, 1, 24.00),
(41, 37, 'hehe', 'hehe', 4, '2023-08-25 22:17:18', 0, 0, 1, 1, 1, 33.00);

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
(236, 29, 34, 1, 0, '', 1, 0, '7x7'),
(237, 32, 34, 1, 0, '', 1, 0, '7x7'),
(238, 33, 34, 1, 0, '', 1, 0, '7x7'),
(239, 33, 34, 2, 1, 'uploads/.ci.yaml', 1, 0, '7x7'),
(240, 33, 34, 1, 0, '', 1, 0, '7x7'),
(241, 33, 34, 2, 1, 'uploads/.ci.yaml', 1, 0, '7x7'),
(242, 34, 34, 1, 0, '', 1, 0, '7x7'),
(243, 34, 34, 2, 1, 'uploads/.chahahahai.yaml', 1, 0, '7x7'),
(244, 37, 38, 3, 0, '', 7, 3, '7x7'),
(245, 38, 38, 3, 0, '', 7, 3, '7x7'),
(246, 38, 38, 1, 1, 'uploads/AUTHORS', 25, 0, '7x7'),
(247, 39, 38, 3, 0, '', 7, 3, '7x7'),
(248, 39, 38, 1, 1, 'uploads/AUTHORS', 25, 0, '7x7'),
(249, 40, 35, 1, 0, '', 2, 0, '7x7'),
(250, 41, 37, 2, 0, '', 3, 0, '7x7');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `game_id`, `built_game_id`, `added_component_id`, `quantity`, `price`, `is_active`) VALUES
(29, 3, 34, 34, NULL, 1, 23.00, 0),
(30, 3, 34, 34, NULL, 1, 23.00, 0),
(32, 3, 36, 36, NULL, 1, 0.00, 0),
(33, 3, 36, 36, NULL, 1, 0.00, 0),
(34, 3, 34, 34, NULL, 1, 23.00, 0),
(39, 3, 34, 34, NULL, 2, 23.00, 0),
(51, 4, 34, 34, NULL, 1, 23.00, 1),
(77, 3, 38, 39, NULL, 1, 19.00, 0),
(78, 4, 35, 35, NULL, 1, 0.00, 1),
(79, 4, 35, 40, NULL, 2, 24.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `component_assets`
--

CREATE TABLE `component_assets` (
  `asset_id` int(11) NOT NULL,
  `component_id` int(11) DEFAULT NULL,
  `asset_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_assets`
--

INSERT INTO `component_assets` (`asset_id`, `component_id`, `asset_path`) VALUES
(1, 2, 'assets\\component_assets/asset1.jpg'),
(2, 2, 'assets\\component_assets/asset2.jpg'),
(3, 2, 'assets\\component_assets/asset3.jpg'),
(4, 1, 'assets\\component_assets/asset4.jpg'),
(5, 1, 'assets\\component_assets/asset5.jpg');

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
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_built` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `description`, `category`, `user_id`, `created_at`, `is_built`) VALUES
(34, 'game 1', 'desc', 'action', 3, '2023-08-12 20:59:18', 0),
(35, 'jeric', 'asd', 'asd', 4, '2023-08-14 22:38:12', 0),
(36, 'hehe', 'hehe', 'hehe', 3, '2023-08-15 06:51:33', 0),
(37, 'hehe', 'hehe', 'hehe', 4, '2023-08-16 15:10:01', 0),
(38, 'dice game', 'action', 'action', 3, '2023-08-19 13:30:55', 0);

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
  `size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_components`
--

INSERT INTO `game_components` (`component_id`, `component_name`, `description`, `price`, `category`, `assets`, `has_colors`, `size`) VALUES
(1, 'Tarrot Cards', NULL, 12.00, 'card', NULL, 0, '7x7'),
(2, 'Box', 'box box', 11.00, 'box', NULL, 0, '7x7'),
(3, 'Dice', 'dice desc', 7.00, 'game piece', NULL, 1, '7x7'),
(4, 'Tarrot Card 2', 'desc', 14.00, 'card', NULL, 0, '10x10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `added_component_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `is_ready` tinyint(4) DEFAULT 0,
  `is_shipped` tinyint(4) DEFAULT 0,
  `is_completed` tinyint(4) DEFAULT 0,
  `is_canceled` tinyint(4) DEFAULT 0,
  `is_preparing` tinyint(4) NOT NULL DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_id`, `built_game_id`, `added_component_id`, `quantity`, `price`, `is_pending`, `is_ready`, `is_shipped`, `is_completed`, `is_canceled`, `is_preparing`, `order_date`) VALUES
(8, 29, 3, 34, NULL, 1, 23.00, 0, 0, 0, 0, 0, 0, '2023-08-12 21:54:16'),
(9, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 1, '2023-08-12 22:00:25'),
(10, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 1, '2023-08-12 22:00:41'),
(11, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-12 22:06:24'),
(12, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-12 22:16:20'),
(13, 30, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 22:40:49'),
(14, 30, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 22:41:06'),
(15, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 22:41:41'),
(16, 30, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 22:41:41'),
(17, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 22:47:08'),
(18, 29, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 23:03:02'),
(19, 30, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-14 23:03:11'),
(20, 32, 3, 36, NULL, 1, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-15 06:52:28'),
(21, 33, 3, 36, NULL, 1, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-15 06:56:33'),
(22, 34, 3, 34, NULL, 1, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-15 23:17:51'),
(23, 39, 3, 34, NULL, 2, 23.00, 1, 0, 0, 0, 0, 0, '2023-08-19 14:34:42'),
(24, 77, 3, 39, NULL, 1, 19.00, 1, 0, 0, 0, 0, 0, '2023-08-19 14:36:29'),
(25, 79, 4, 40, NULL, 2, 24.00, 1, 0, 0, 0, 0, 0, '2023-08-25 22:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `published_built_games`
--

CREATE TABLE `published_built_games` (
  `published_game_id` int(11) NOT NULL,
  `built_game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
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
  `max_playtime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_built_games`
--

INSERT INTO `published_built_games` (`published_game_id`, `built_game_id`, `game_name`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`) VALUES
(50, 39, 'f', 'f', '2023-08-24 00:00:00', 3, 1, 'f', 'f', 'https://facebook.com', 'uploads/pxfuel.jpg', 12, 123, 1233, 122),
(51, 39, 'f', 'f', '2023-08-24 00:00:00', 3, 1, 'f', 'f', 'https://facebook.com', 'uploads/pxfuel.jpg', 12, 123, 1233, 122),
(52, 39, 'f', 'f', '2023-08-24 00:00:00', 3, 1, 'f', 'f', 'https://facebook.com', 'uploads/peakpx.jpg', 12, 123, 1233, 122),
(53, 39, 'df', 'df', '2023-08-24 00:00:00', 3, 1, '9', '0', 'https://facebook.com', 'uploads/64e76fa2397c0_desktop-1920x1080.jpg', 123, 4, 5, 7),
(54, 39, 'df', 'df', '2023-08-24 00:00:00', 3, 1, '9', '0', 'https://facebook.com', 'uploads/published_built_games/logos/64e76ff3d6dd3_desktop-1920x1080.jpg', 123, 4, 5, 7),
(55, 39, '123', '345', '2023-08-25 00:00:00', 3, 1, 'gg', 'g', 'https://facebook.com', 'uploads/364230412_107425115781751_3994915381724451657_n.jpg', 567, 789, 90, 5),
(56, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/desktop-1920x1080.jpg', 235, 4567, 7, 78),
(57, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/desktop-1920x1080.jpg', 235, 4567, 7, 78),
(58, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/desktop-1920x1080.jpg', 235, 4567, 7, 78),
(59, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/desktop-1920x1080.jpg', 235, 4567, 7, 78),
(60, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/64e8a84581bde_1692969029.jpg', 235, 4567, 7, 78),
(61, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/64e8a853f0a9e_1692969043.jpg', 235, 4567, 7, 78),
(62, 39, 'f', '123', '2023-08-25 00:00:00', 3, 1, '8', '9', 'https://facebook.com', 'uploads/published_built_games/logos/64e8a85998761_1692969049.jpg', 235, 4567, 7, 78),
(63, 39, '7', '567', '2023-08-25 00:00:00', 3, 1, '13', '134', 'https://facebook.com', 'uploads/published_built_games/logos/64e8ab6960c83_1692969833.jpg', 356, 123, 134, 134),
(64, 39, '7', '567', '2023-08-25 00:00:00', 3, 1, '13', '134', 'https://facebook.com', 'uploads/published_built_games/logos/64e8abb972fe3_1692969913.jpg', 356, 123, 134, 134),
(65, 39, 'f', 'asd', '2023-08-25 00:00:00', 3, 1, 'dsvg', 'dfs', 'https://facebook.com', 'uploads/published_built_games/logos/64e8ac3497bf5_1692970036.jpg', 34, 2543, 234, 24),
(66, 39, 'afs', 'asf', '2023-08-25 00:00:00', 3, 1, 'df', 'df', 'https://facebook.com', 'uploads/published_built_games/logos/64e8acc3b60fd_1692970179.jpg', 4, 12, 124, 124),
(67, 39, 'asd', 'asd', '2023-08-25 00:00:00', 3, 1, 'asdf', 'asd', 'https://facebook.com', 'uploads/published_built_games/logos/64e8ad86c2ebe_1692970374.jpg', 777, 888, 999, 14),
(68, 40, 'jericjerickl', 'jericjerickl', '2023-08-25 00:00:00', 4, 4, 'jericjerickl', 'jericjerickl', 'https://facebook.com', 'uploads/published_built_games/logos/64e8b4f0b1e43_1692972272.jpg', 777, 777, 777, 777),
(69, 40, 'asf', 'asf', '2023-08-25 00:00:00', 4, 1, '24', '24', 'https://facebook.com', 'uploads/published_built_games/logos/64e8b6e12af48_1692972769.jpg', 41, 124, 124, 124),
(70, 41, 'HEHEEHE', 'hehee first edition', '2023-08-25 00:00:00', 4, 1, 'dsf', 'sdf', 'https://facebook.com', 'uploads/published_built_games/logos/64e8b82dc6b04_1692973101.jpg', 123, 123, 123, 123),
(71, 41, 'HIHIHIHIH', 'HIHIHI edition', '2023-08-25 00:00:00', 4, 1, '12', '123', 'https://facebook.com', 'uploads/published_built_games/logos/64e8b889a2fde_1692973193.jpg', 12, 123, 12, 123),
(72, 41, 'HIHIHIHIH', 'HIHIHI edition', '2023-08-25 00:00:00', 4, 1, '12', '123', 'https://facebook.com', 'uploads/published_built_games/logos/64e8b9992422f_1692973465.jpg', 12, 123, 12, 123);

-- --------------------------------------------------------

--
-- Table structure for table `published_multiple_files`
--

CREATE TABLE `published_multiple_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `published_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_multiple_files`
--

INSERT INTO `published_multiple_files` (`id`, `file_name`, `file_path`, `creator_id`, `upload_date`, `published_game_id`, `built_game_id`) VALUES
(1, '64e8ad86cbbc1_364230412_107425115781751_3994915381724451657_n.jpg', 'uploads/64e8ad86cbbc1_364230412_107425115781751_3994915381724451657_n.jpg', 3, '2023-08-25 13:32:54', NULL, NULL),
(2, '64e8ad86dcd4e_pxfuel.jpg', 'uploads/64e8ad86dcd4e_pxfuel.jpg', 3, '2023-08-25 13:32:54', NULL, NULL),
(3, '64e8b4f113ff6_pxfuel.jpg', 'uploads/64e8b4f113ff6_pxfuel.jpg', 4, '2023-08-25 14:04:33', NULL, NULL),
(4, '64e8b4f128a26_peakpx.jpg', 'uploads/64e8b4f128a26_peakpx.jpg', 4, '2023-08-25 14:04:33', NULL, NULL),
(5, '64e8b4f134bcb_desktop-1920x1080.jpg', 'uploads/64e8b4f134bcb_desktop-1920x1080.jpg', 4, '2023-08-25 14:04:33', NULL, NULL),
(6, '64e8b6e1410f2_pxfuel.jpg', 'uploads/64e8b6e1410f2_pxfuel.jpg', 4, '2023-08-25 14:12:49', NULL, NULL),
(7, '64e8b6e14a175_peakpx.jpg', 'uploads/64e8b6e14a175_peakpx.jpg', 4, '2023-08-25 14:12:49', NULL, NULL),
(8, '64e8b6e15e536_desktop-1920x1080.jpg', 'uploads/64e8b6e15e536_desktop-1920x1080.jpg', 4, '2023-08-25 14:12:49', NULL, NULL),
(9, '64e8b889aa42e_pxfuel.jpg', 'uploads/64e8b889aa42e_pxfuel.jpg', 4, '2023-08-25 14:19:53', 0, 41),
(10, '64e8b889b7427_peakpx.jpg', 'uploads/64e8b889b7427_peakpx.jpg', 4, '2023-08-25 14:19:53', 0, 41),
(11, '64e8b889c56c0_desktop-1920x1080.jpg', 'uploads/64e8b889c56c0_desktop-1920x1080.jpg', 4, '2023-08-25 14:19:53', 0, 41),
(12, '64e8b9992f6ce_pxfuel.jpg', 'uploads/64e8b9992f6ce_pxfuel.jpg', 4, '2023-08-25 14:24:25', 72, 41),
(13, '64e8b99938776_peakpx.jpg', 'uploads/64e8b99938776_peakpx.jpg', 4, '2023-08-25 14:24:25', 72, 41),
(14, '64e8b999438f0_desktop-1920x1080.jpg', 'uploads/64e8b999438f0_desktop-1920x1080.jpg', 4, '2023-08-25 14:24:25', 72, 41);

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
(6, 'berns', 'berns@gmail.com', '$2y$10$cGi0jPeiwD62dxv/vk7WMePFmV4ro0rAut7dAQscujTptnGXnPTte', '2023-08-10 08:46:14', NULL, NULL);

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
(68, 4, 'login', '2023-08-25 13:44:10');

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
-- Indexes for table `built_games`
--
ALTER TABLE `built_games`
  ADD PRIMARY KEY (`built_game_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD PRIMARY KEY (`added_component_id`),
  ADD KEY `built_game_id` (`built_game_id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `component_id` (`component_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_cart_users` (`user_id`),
  ADD KEY `FK_cart_games` (`game_id`),
  ADD KEY `FK_cart_added_game_components` (`added_component_id`),
  ADD KEY `built_game_id` (`built_game_id`);

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
-- Indexes for table `game_components`
--
ALTER TABLE `game_components`
  ADD PRIMARY KEY (`component_id`);

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
-- Indexes for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD PRIMARY KEY (`published_game_id`),
  ADD KEY `age_id` (`age_id`);

--
-- Indexes for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_name` (`file_name`);

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
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

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
-- AUTO_INCREMENT for table `built_games`
--
ALTER TABLE `built_games`
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `component_assets`
--
ALTER TABLE `component_assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `dropzone_published_uploads`
--
ALTER TABLE `dropzone_published_uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `published_built_games`
--
ALTER TABLE `published_built_games`
  MODIFY `published_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_review_response`
--
ALTER TABLE `user_review_response`
  MODIFY `user_review_response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `admin_review_response`
--
ALTER TABLE `admin_review_response`
  ADD CONSTRAINT `admin_review_response_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `admin_review_response_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`);

--
-- Constraints for table `built_games`
--
ALTER TABLE `built_games`
  ADD CONSTRAINT `built_games_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `built_games_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  ADD CONSTRAINT `built_games_added_game_components_ibfk_1` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `built_games_added_game_components_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`built_game_id`) REFERENCES `built_games` (`built_game_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`added_component_id`) REFERENCES `added_game_components` (`added_component_id`);

--
-- Constraints for table `published_built_games`
--
ALTER TABLE `published_built_games`
  ADD CONSTRAINT `published_built_games_ibfk_1` FOREIGN KEY (`age_id`) REFERENCES `age` (`age_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
