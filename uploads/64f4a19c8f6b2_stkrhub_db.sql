-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 04:16 AM
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
(317, 34, 3, 0, NULL, 3, 1, '7x7', 3),
(318, NULL, 3, 0, NULL, 22, 1, '7x7', 3),
(319, 38, 3, 0, NULL, 7, 3, '7x7', 3),
(320, 38, 1, 1, 'uploads/AUTHORS', 25, NULL, '7x7', 3),
(324, 35, 1, 0, '', 2, NULL, '7x7', 4),
(325, 37, 2, 0, '', 3, NULL, '7x7', 4),
(326, 39, 3, 0, NULL, 3, 1, '7x7', 3),
(327, NULL, 1, 0, '', 1, NULL, '7x7', 7),
(328, NULL, 4, 0, '', 1, NULL, '10x10', 7),
(329, 41, 2, 1, 'uploads/Moises.docx', 99, NULL, '7x7', 8),
(330, NULL, 2, 0, '', 1, NULL, '7x7', 8),
(331, NULL, 4, 1, 'uploads/old published multiple files.png', 1, NULL, '10x10', 8),
(332, 42, 3, 0, NULL, 7, 1, '7x7', 9),
(333, 42, 1, 1, 'uploads/Moises.docx', 7, NULL, '7x7', 9),
(334, NULL, 1, 0, '', 1, NULL, '7x7', 9),
(335, 34, 4, 0, '', 2, NULL, '10x10', 3),
(336, 34, 1, 0, '', 1, NULL, '7x7', 3),
(337, 43, 4, 0, '', 14, NULL, '10x10', 3),
(338, NULL, 3, 0, NULL, 7, 1, '7x7', 3),
(339, NULL, 2, 0, '', 1, NULL, '7x7', 3),
(340, NULL, 3, 0, NULL, 1, 1, '7x7', 7),
(341, NULL, 2, 0, '', 1, NULL, '7x7', 7),
(342, NULL, 4, 0, '', 1, NULL, '10x10', 7),
(343, NULL, 4, 0, '', 1, NULL, '10x10', 7),
(344, NULL, 1, 1, 'uploads/stkrhub_db.sql', 1, NULL, '7x7', 7);

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
(35, 35, 'jeric', 'asd', 4, '2023-08-14 22:56:10', 0, 0, 1, 1, 1, 0.00),
(36, 36, 'hehe', 'hehe', 3, '2023-08-15 06:51:35', 0, 0, 1, 1, 1, 0.00),
(37, 38, 'dice game', 'action', 3, '2023-08-19 13:31:19', 0, 0, 0, 0, 0, 7.00),
(38, 38, 'dice game', 'action', 3, '2023-08-19 13:37:47', 0, 0, 0, 0, 0, 19.00),
(39, 38, 'dice game', 'action', 3, '2023-08-19 14:35:48', 0, 0, 1, 1, 1, 19.00),
(40, 35, 'jeric', 'asd', 4, '2023-08-25 22:01:40', 0, 0, 1, 1, 1, 24.00),
(41, 37, 'hehe', 'hehe', 4, '2023-08-25 22:17:18', 0, 0, 1, 1, 1, 33.00),
(42, 39, 'frielle', 'frielles game', 3, '2023-08-27 13:40:36', 0, 0, 1, 1, 1, 21.00),
(43, 40, 'fau\'s game', 'wala lng', 7, '2023-08-30 11:08:43', 0, 0, 1, 1, 0, 0.00),
(45, 41, 'jennica\'s Game', 'aksjdkasjd', 8, '2023-08-30 13:36:20', 0, 0, 1, 1, 0, 1089.00),
(46, 42, 'Snake and Ladders', 'jashdjasd', 9, '2023-08-30 14:38:33', 0, 0, 1, 1, 0, 133.00),
(47, 43, 'blah balh game', 'aksdjasd', 3, '2023-08-31 13:42:41', 0, 0, 1, 1, 0, 0.00),
(48, 43, 'blah balh game', 'aksdjasd', 3, '2023-08-31 14:00:07', 0, 0, 1, 1, 0, 1500.00);

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
(250, 41, 37, 2, 0, '', 3, 0, '7x7'),
(251, 42, 39, 3, 0, '', 3, 1, '7x7'),
(252, 45, 41, 2, 1, 'uploads/Moises.docx', 99, 0, '7x7'),
(253, 46, 42, 3, 0, '', 7, 3, '7x7'),
(254, 46, 42, 1, 1, 'uploads/Moises.docx', 7, 0, '7x7'),
(255, 48, 43, 4, 0, '', 14, 0, '10x10');

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
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `published_game_id`, `game_id`, `built_game_id`, `added_component_id`, `quantity`, `price`, `is_active`) VALUES
(29, 3, NULL, 34, 34, NULL, 1, 23.00, 0),
(30, 3, NULL, 34, 34, NULL, 1, 23.00, 0),
(32, 3, NULL, 36, 36, NULL, 1, 0.00, 0),
(33, 3, NULL, 36, 36, NULL, 1, 0.00, 0),
(34, 3, NULL, 34, 34, NULL, 1, 23.00, 0),
(39, 3, NULL, 34, 34, NULL, 2, 23.00, 0),
(51, 4, NULL, 34, 34, NULL, 1, 23.00, 0),
(77, 3, NULL, 38, 39, NULL, 1, 19.00, 0),
(78, 4, NULL, 35, 35, NULL, 1, 0.00, 0),
(79, 4, NULL, 35, 40, NULL, 2, 24.00, 0),
(80, 3, NULL, 39, 42, NULL, 1, 21.00, 0),
(81, 4, NULL, 35, 35, NULL, 1, 0.00, 0),
(86, 8, NULL, 41, 45, NULL, 1, 1089.00, 0),
(88, 8, NULL, NULL, NULL, 331, 1, 14.00, 1),
(89, 9, NULL, 42, 46, NULL, 1, 133.00, 0),
(90, 9, NULL, NULL, NULL, 334, 1, 12.00, 1),
(100, 3, NULL, NULL, NULL, 339, 2, 11.00, 0),
(101, 3, NULL, 34, 27, NULL, 1, 0.00, 0),
(102, 3, 128, NULL, NULL, NULL, 1, 2500.00, 0),
(105, 7, NULL, NULL, NULL, 340, 1, 7.00, 0),
(106, 7, NULL, NULL, NULL, 341, 12, 11.00, 0),
(113, 7, NULL, 40, 43, NULL, 2, 0.00, 0),
(114, 7, NULL, NULL, NULL, 344, 3, 12.00, 0),
(115, 7, 128, NULL, NULL, NULL, 4, 2500.00, 0),
(116, 3, 128, NULL, NULL, NULL, 1, 2500.00, 0),
(117, 3, 128, NULL, NULL, NULL, 3, 2500.00, 1);

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
(38, 'dice game', 'action', 'action', 3, '2023-08-19 13:30:55', 0),
(39, 'frielle', 'frielles game', 'kids', 3, '2023-08-27 13:40:14', 0),
(40, 'fau\'s game', 'wala lng', 'haha', 7, '2023-08-30 11:07:16', 0),
(41, 'jennica\'s Game', 'aksjdkasjd', 'action', 8, '2023-08-30 13:21:54', 0),
(42, 'Snake and Ladders', 'jashdjasd', 'kids', 9, '2023-08-30 14:36:49', 0),
(43, 'blah balh game', 'aksdjasd', 'action', 3, '2023-08-31 13:42:16', 0);

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
-- Table structure for table `index_banner`
--

CREATE TABLE `index_banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_banner`
--

INSERT INTO `index_banner` (`id`, `title`, `content`, `image_path`) VALUES
(1, 'Ito ay isang Title', 'ito ay isang mahabnggggggggggggggggggggggggggggggggggggggggggggggggggg contenttttttttttttttttttttt', 'img/banner/banner-bg.jpg'),
(5, 'STKR HUBHUB', 'asdhashdjasdasdjasdasdasdkjasd', 'img/banner/banner-bg.jpg');

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
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_pending` tinyint(4) DEFAULT 0,
  `is_ready` tinyint(4) DEFAULT 0,
  `is_shipped` tinyint(4) DEFAULT 0,
  `is_completed` tinyint(4) DEFAULT 0,
  `is_canceled` tinyint(4) DEFAULT 0,
  `is_preparing` tinyint(4) NOT NULL DEFAULT 0,
  `order_date` datetime DEFAULT current_timestamp(),
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cart_id`, `user_id`, `published_game_id`, `built_game_id`, `added_component_id`, `quantity`, `price`, `is_pending`, `is_ready`, `is_shipped`, `is_completed`, `is_canceled`, `is_preparing`, `order_date`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`) VALUES
(32, 105, 7, NULL, NULL, 340, 1, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-31 17:44:14', NULL, NULL, NULL, NULL),
(33, 106, 7, NULL, NULL, 341, 12, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-31 18:03:24', NULL, NULL, NULL, NULL),
(34, 113, 7, NULL, 43, NULL, 2, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(35, 114, 7, NULL, NULL, 344, 3, 12.00, 1, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(36, 115, 7, 128, NULL, NULL, 4, 2500.00, 1, 0, 0, 0, 0, 0, '2023-08-31 20:03:59', NULL, NULL, NULL, NULL),
(37, 100, 3, NULL, NULL, 339, 2, 11.00, 1, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', NULL, NULL, NULL, NULL),
(38, 101, 3, NULL, 27, NULL, 1, 0.00, 1, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', NULL, NULL, NULL, NULL),
(39, 102, 3, 128, NULL, NULL, 1, 2500.00, 1, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', 1000.00, 200.00, 800.00, 2500.00),
(40, 116, 3, 128, NULL, NULL, 1, 2500.00, 1, 0, 0, 0, 0, 0, '2023-08-31 22:33:33', 1000.00, 200.00, 800.00, 2500.00);

-- --------------------------------------------------------

--
-- Table structure for table `pending_update_published_built_games`
--

CREATE TABLE `pending_update_published_built_games` (
  `pending_update_published_built_games_id` int(11) NOT NULL,
  `published_built_game_id` int(11) DEFAULT NULL,
  `built_game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
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
  `desired_markup` decimal(10,2) DEFAULT NULL,
  `manufacturer_profit` decimal(10,2) DEFAULT NULL,
  `creator_profit` decimal(10,2) DEFAULT NULL,
  `marketplace_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `published_built_games`
--

INSERT INTO `published_built_games` (`published_game_id`, `built_game_id`, `game_name`, `edition`, `published_date`, `creator_id`, `age_id`, `short_description`, `long_description`, `website`, `logo_path`, `min_players`, `max_players`, `min_playtime`, `max_playtime`, `has_pending_update`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`) VALUES
(126, 43, '4444', '4444', '2023-08-30 00:00:00', 7, 3, '444', '444', 'https://youtube.com', 'uploads/64ef5fed12c57_old published multiple files.png', 444, 444, 44, 44, 0, NULL, NULL, NULL, NULL),
(128, 48, 'huhu', 'huhu', '2023-08-31 00:00:00', 3, 1, '77', '77', 'https://www.figma.com/file/DjBLsWy8ezwSHS3rPOj9Es/STKR-HUB?type=design&node-id=2-811&mode=design&t=4vXOGWFOjXgzU5bl-0', 'uploads/64f04b866fd71_old published multiple files.png', 77, 7777, 77, 777, 0, 1000.00, 200.00, 800.00, 2500.00);

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
(149, 126, 43, 0, 'uploads/64ef5fed1653f_The Good Planet_Photo Booth.jpg'),
(150, 126, 43, 0, 'uploads/64ef5fed18fcb_The Good Planet_Name Tag.jpg'),
(159, 128, 48, 0, 'uploads/64f04b867282b_364353604_1415770232322177_2196495488147212945_n.jpg'),
(160, 128, 48, 0, 'uploads/64f04b8672d65_364348955_822568686038268_9047415702064368025_n.jpg'),
(161, 128, 48, 0, 'uploads/64f04b8673211_364357856_264667576337088_261786029898253528_n.jpg'),
(162, 128, 48, 0, 'uploads/64f04b867367c_359269401_680584827253160_1374356000048144840_n.jpg');

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
(9, 'Kenmar', 'kenmar@gmail.com', '$2y$10$AIAMKryRhZ7viSqRnxrdHexrA2TMDiAaqwLTK0QzKla6OEH6nXgkS', '2023-08-30 06:34:05', NULL, NULL);

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
(86, 3, 'login', '2023-08-31 13:58:38');

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
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

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
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

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
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `game_components`
--
ALTER TABLE `game_components`
  MODIFY `component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pending_update_published_built_games`
--
ALTER TABLE `pending_update_published_built_games`
  MODIFY `pending_update_published_built_games_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pending_update_published_multiple_files`
--
ALTER TABLE `pending_update_published_multiple_files`
  MODIFY `pending_update_published_multiple_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `published_built_games`
--
ALTER TABLE `published_built_games`
  MODIFY `published_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `published_multiple_files`
--
ALTER TABLE `published_multiple_files`
  MODIFY `published_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
