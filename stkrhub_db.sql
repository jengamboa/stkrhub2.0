-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 05:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(529, 207, 3, 0, NULL, 3, 1, '7x7', 3),
(530, 207, 1, 1, 'uploads/652633e394390_Screenshot 2023-09-30 184804.png', 1, NULL, '7x7', 3);

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
(7, 3, 'Luzon', '09770257461', 'Luzon', '', '', '', 'asd', '8 Doneza St. Balubaran Malinta', 0, '2023-09-03 06:23:40'),
(16, 10, 'Denzel Go', '', 'Luzon ', '', 'Valenzuela City', '', '', '8 Doneza St. Balubaran Malinta', 0, '2023-09-27 19:58:48'),
(17, 10, '', '', 'Metro Manila', '', '', '', '', '', 1, '2023-09-27 19:59:00'),
(18, 3, 'Metro M', '09770257461', 'Metro Manila', '', '', '', '', '8 Doneza St. Balubaran Malinta', 0, '2023-09-29 11:30:48'),
(19, 3, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 1, '2023-10-09 14:36:20');

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
(20, 2, 'login', '2023-10-03 13:44:38'),
(21, 2, 'login', '2023-10-08 19:07:39'),
(22, 2, 'login', '2023-10-09 04:46:31'),
(23, 2, 'login', '2023-10-10 14:33:55'),
(24, 2, 'login', '2023-10-10 16:18:32'),
(25, 2, 'login', '2023-10-11 02:27:39'),
(26, 2, 'login', '2023-10-11 05:07:55'),
(27, 2, 'login', '2023-10-11 06:38:07'),
(28, 2, 'login', '2023-10-12 09:51:11'),
(29, 2, 'login', '2023-10-12 14:31:49');

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
(22, 10, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-03 14:24:31'),
(23, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-05 01:53:47'),
(24, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-05 01:53:47'),
(25, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 33', '2023-10-08 17:27:55'),
(26, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:27:55'),
(27, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:27:55'),
(28, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:27:55'),
(29, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-08 17:27:55'),
(30, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-08 17:27:55'),
(31, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-08 17:27:55'),
(32, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-08 17:27:55'),
(33, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-08 17:27:55'),
(34, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-08 17:27:55'),
(35, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:32:46'),
(36, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:36:50'),
(37, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:37:58'),
(38, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:37:58'),
(39, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-08 17:57:56'),
(40, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-08 17:57:56'),
(41, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-08 17:57:56'),
(42, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 36', '2023-10-08 19:10:59'),
(43, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 37', '2023-10-09 06:43:30'),
(44, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 38', '2023-10-09 06:46:27'),
(45, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 58', '2023-10-09 08:28:10'),
(46, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 60', '2023-10-09 08:58:42'),
(47, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 64', '2023-10-09 10:50:25'),
(48, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 67', '2023-10-09 11:08:28'),
(49, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 70', '2023-10-09 11:26:44'),
(50, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 73', '2023-10-09 11:41:47'),
(51, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 76', '2023-10-09 13:19:01'),
(52, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 77', '2023-10-09 13:23:40'),
(53, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 78', '2023-10-09 13:25:53'),
(54, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 80', '2023-10-09 13:32:55'),
(55, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 82', '2023-10-09 13:34:57'),
(56, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 83', '2023-10-09 13:36:53'),
(57, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 14:57:52'),
(58, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 14:57:52'),
(59, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 14:57:52'),
(60, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 14:57:52'),
(61, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:08:15'),
(62, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:08:15'),
(63, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:08:15'),
(64, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:12:47'),
(65, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:12:48'),
(66, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:12:48'),
(67, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:17:42'),
(68, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:25:04'),
(69, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:25:04'),
(70, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:27:33'),
(71, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:27:33'),
(72, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:33:14'),
(73, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:33:14'),
(74, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:33:14'),
(75, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:37:25'),
(76, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:37:25'),
(77, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:38:45'),
(78, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:40:06'),
(79, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:41:02'),
(80, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:41:43'),
(81, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:41:43'),
(82, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:43:42'),
(83, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:44:34'),
(84, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:45:44'),
(85, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:46:43'),
(86, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:46:43'),
(87, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:46:43'),
(88, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:46:43'),
(89, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:46:43'),
(90, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:46:43'),
(91, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:46:43'),
(92, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:50:09'),
(93, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:50:09'),
(94, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:50:09'),
(95, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:52:15'),
(96, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:52:15'),
(97, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:52:15'),
(98, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:52:15'),
(99, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:52:15'),
(100, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:53:01'),
(101, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:53:01'),
(102, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:53:01'),
(103, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:53:01'),
(104, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:53:01'),
(105, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:56:15'),
(106, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:56:15'),
(107, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:56:55'),
(108, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:56:55'),
(109, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:57:43'),
(110, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:57:43'),
(111, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:57:43'),
(112, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:57:43'),
(113, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:57:43'),
(114, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:57:43'),
(115, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:58:35'),
(116, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:58:35'),
(117, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 15:59:36'),
(118, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 15:59:36'),
(119, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 15:59:36'),
(120, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 15:59:36'),
(121, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 15:59:36'),
(122, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 15:59:36'),
(123, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 15:59:36'),
(124, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 15:59:36'),
(125, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 15:59:36'),
(126, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:02:24'),
(127, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:02:24'),
(128, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:02:24'),
(129, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:03:40'),
(130, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:03:40'),
(131, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 16:04:22'),
(132, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 16:04:22'),
(133, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 16:04:22'),
(134, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:06:05'),
(135, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:06:06'),
(136, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:06:06'),
(137, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:07:31'),
(138, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:07:31'),
(139, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:07:31'),
(140, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:07:31'),
(141, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:11:04'),
(142, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:11:04'),
(143, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:11:04'),
(144, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:12:31'),
(145, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:12:31'),
(146, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:13:19'),
(147, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:13:19'),
(148, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:15:40'),
(149, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:15:40'),
(150, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:16:38'),
(151, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 16:16:38'),
(152, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 16:17:13'),
(153, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 16:17:13'),
(154, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 16:32:05'),
(155, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 16:32:26'),
(156, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:34:54'),
(157, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-10 16:56:50'),
(158, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-10 16:56:50'),
(159, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-10 16:56:50'),
(160, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 17:24:32'),
(161, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 17:24:32'),
(162, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 17:25:12'),
(163, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 17:25:12'),
(164, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 134', '2023-10-10 17:38:48'),
(165, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-10 17:38:48'),
(166, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-10 17:38:48'),
(167, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 86', '2023-10-10 17:39:38'),
(168, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 87', '2023-10-10 17:53:34'),
(169, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-10 17:53:34'),
(170, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-10 17:53:34'),
(171, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-10 17:53:34'),
(172, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 02:25:35'),
(173, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-11 02:25:35'),
(174, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-11 02:25:35'),
(175, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 88', '2023-10-11 02:53:10'),
(176, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-11 02:53:10'),
(177, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-11 02:53:10'),
(178, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 176', '2023-10-11 02:54:37'),
(179, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 175', '2023-10-11 02:54:37'),
(180, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 02:54:37'),
(181, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 89', '2023-10-11 02:54:37'),
(182, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-11 02:59:49'),
(183, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-11 02:59:49'),
(184, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 90', '2023-10-11 05:32:06'),
(185, 3, 'PAY USING PAYPAL', 'Purchase ticket_id: 91', '2023-10-11 05:35:16'),
(186, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 174', '2023-10-11 06:45:09'),
(187, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 177', '2023-10-11 06:45:09'),
(188, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(189, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(190, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(191, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(192, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(193, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(194, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(195, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(196, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(197, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(198, 3, 'PAY USING PAYPAL', 'Purchase built_game_id: 127', '2023-10-11 06:45:09'),
(199, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 131', '2023-10-12 09:50:31'),
(200, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 3', '2023-10-12 09:50:31'),
(201, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 133', '2023-10-12 09:54:14'),
(202, 3, 'PAY USING PAYPAL', 'Purchase published_game_id: 132', '2023-10-12 09:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `id` int(11) NOT NULL,
  `barangay_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`id`, `barangay_name`, `city_id`) VALUES
(1, 'Barangay 287', 2),
(2, 'Barangay 1', 2),
(3, 'Barangay 2', 2),
(4, 'Barangay 3', 2),
(5, 'Barangay 4', 2),
(6, 'Barangay 5', 2),
(7, 'Bagong Barrio', 3),
(8, 'Barangay 12', 3),
(9, 'Barangay 14', 3),
(10, 'Barangay 15', 3),
(11, 'Barangay 16', 3),
(12, 'CAA/BF International', 4),
(13, 'Daniel Fajardo', 4),
(14, 'Elias Aldana', 4),
(15, 'Ilaya', 4),
(16, 'Manuyo', 4),
(17, 'Bangkal', 5),
(18, 'Bel-Air', 5),
(19, 'Carmona', 5),
(20, 'Dasmariñas', 5),
(21, 'Forbes Park', 5),
(22, 'Acacia', 6),
(23, 'Baritan', 6),
(24, 'Bayan-bayanan', 6),
(25, 'Catmon', 6),
(26, 'Concepcion', 6),
(27, 'Addition Hills', 7),
(28, 'Bagong Silang', 7),
(29, 'Barangka Drive', 7),
(30, 'Buayang Bato', 7),
(31, 'Daang Bakal', 7),
(32, '28th Street', 8),
(33, '49th Street', 8),
(34, 'Last Barangay', 8),
(35, 'Barangay 1', 9),
(36, 'Barangay 2', 9),
(37, 'Barangay 3', 9),
(38, 'Barangay 4', 9),
(39, 'Barangay 5', 9),
(40, 'Barangay 1', 10),
(41, 'Barangay 2', 10),
(42, 'Barangay 3', 10),
(43, 'Barangay 4', 10),
(44, 'Barangay 5', 10),
(45, 'Barangay 1', 11),
(46, 'Barangay 2', 11),
(47, 'Barangay 3', 11),
(48, 'Barangay 4', 11),
(49, 'Barangay 5', 11),
(50, 'Barangay 1', 12),
(51, 'Barangay 2', 12),
(52, 'Barangay 3', 12),
(53, 'Barangay 4', 12),
(54, 'Barangay 5', 12),
(55, 'Barangay 1', 13),
(56, 'Barangay 2', 13),
(57, 'Barangay 3', 13),
(58, 'Barangay 4', 13),
(59, 'Barangay 5', 13),
(60, 'Barangay 1', 14),
(61, 'Barangay 2', 14),
(62, 'Barangay 3', 14),
(63, 'Barangay 4', 14),
(64, 'Barangay 5', 14),
(65, 'Barangay 1', 15),
(66, 'Barangay 2', 15),
(67, 'Barangay 3', 15),
(68, 'Barangay 4', 15),
(69, 'Barangay 5', 15),
(70, 'Barangay 1', 16),
(71, 'Barangay 2', 16),
(72, 'Barangay 3', 16),
(73, 'Barangay 4', 16),
(74, 'Barangay 5', 16),
(75, 'Barangay 1', 17),
(76, 'Barangay 2', 17),
(77, 'Barangay 3', 17),
(78, 'Barangay 4', 17),
(79, 'Barangay 5', 17),
(80, 'Barangay 1', 18),
(81, 'Barangay 2', 18),
(82, 'Barangay 3', 18),
(83, 'Barangay 4', 18),
(84, 'Barangay 5', 18),
(85, 'Barangay 1', 19),
(86, 'Barangay 2', 19),
(87, 'Barangay 3', 19),
(88, 'Barangay 4', 19),
(89, 'Barangay 5', 19);

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
  `price` decimal(10,2) NOT NULL,
  `ticket_cost` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `built_games`
--

INSERT INTO `built_games` (`built_game_id`, `game_id`, `name`, `description`, `creator_id`, `build_date`, `is_pending`, `is_canceled`, `is_approved`, `is_purchased`, `is_pending_published`, `is_request_denied`, `is_published`, `price`, `ticket_cost`) VALUES
(123, 199, 'coli8', '', 3, '2023-10-09 19:19:24', 0, 0, 1, 0, 0, 0, 0, 7.40, 0.74),
(124, 199, 'coli8', '', 3, '2023-10-09 19:40:52', 0, 0, 1, 0, 0, 0, 0, 35.40, 0.74),
(125, 199, 'coli8', '', 3, '2023-10-09 21:26:14', 0, 0, 1, 0, 0, 0, 0, 190.80, 19.08),
(126, 0, 'f', '', 3, '2023-10-09 21:37:15', 0, 0, 1, 0, 0, 0, 0, 33.40, 3.34),
(127, 207, 'game 1', '', 3, '2023-10-11 13:35:44', 0, 0, 1, 0, 0, 0, 0, 34.20, 3.42);

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
(415, 126, 0, 3, 0, '', 1, 3, '7x7'),
(416, 126, 0, 4, 1, 'uploads/65240162a03de_5.png', 1, 0, '10x10'),
(417, 126, 0, 1, 1, 'uploads/652401d74082c_The Good Planet_Promo Banner.jpg', 1, 0, '7x7'),
(418, 127, 207, 3, 0, '', 3, 1, '7x7'),
(419, 127, 207, 1, 1, 'uploads/652633e394390_Screenshot 2023-09-30 184804.png', 1, 0, '7x7');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_order_reasons`
--

CREATE TABLE `cancel_order_reasons` (
  `reason_id` int(11) NOT NULL,
  `reason_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancel_order_reasons`
--

INSERT INTO `cancel_order_reasons` (`reason_id`, `reason_text`) VALUES
(1, 'Need to change delivery address'),
(2, 'Need to modify order (size, color, quantity, etc.)'),
(3, 'Don\'t want to buy anymore'),
(4, 'Others');

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
(501, 3, NULL, 200, NULL, NULL, 80, 1, 0.74, 1, 0),
(503, 3, NULL, 200, NULL, NULL, 82, 1, 2.14, 1, 0),
(504, 3, NULL, 200, NULL, NULL, 83, 1, 3.34, 1, 0),
(507, 3, 177, NULL, NULL, NULL, NULL, 2, 855.00, 1, 0),
(508, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(509, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(510, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(511, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(512, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(513, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(514, 3, 174, NULL, NULL, NULL, NULL, 2, 1526.00, 1, 0),
(515, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(516, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(517, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(518, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(519, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(520, 3, 3, NULL, NULL, NULL, NULL, 2, 80.00, 1, 0),
(521, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(522, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(523, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(524, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(525, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(526, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(527, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(528, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(529, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(530, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(531, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(532, 3, 174, NULL, NULL, NULL, NULL, 9, 1526.00, 1, 0),
(533, 3, 174, NULL, NULL, NULL, NULL, 8, 1526.00, 1, 0),
(534, 3, 174, NULL, NULL, NULL, NULL, 2, 1526.00, 1, 0),
(535, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(536, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(537, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(538, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(539, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(540, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(541, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(542, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(543, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(544, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(545, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(546, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(547, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(548, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(549, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(550, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(551, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(552, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(553, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(554, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(555, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(556, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(557, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(558, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(559, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(560, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(561, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(562, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(563, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(564, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(565, 3, 132, NULL, NULL, NULL, NULL, 3, 80.00, 1, 0),
(566, 3, 177, NULL, NULL, NULL, NULL, 4, 855.00, 1, 0),
(567, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(568, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(569, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(570, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(571, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(572, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(573, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(574, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(575, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(576, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(577, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(578, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(579, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(581, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(583, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(584, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(585, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(586, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(587, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(588, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(589, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(590, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(591, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(592, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(593, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(594, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(595, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(596, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(597, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(598, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(599, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(600, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(601, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(602, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(603, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(604, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(605, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(606, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(607, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(608, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(609, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(610, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(611, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(612, 3, 132, NULL, NULL, NULL, NULL, 3, 80.00, 1, 0),
(613, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(614, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(615, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(616, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(617, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(618, 3, 134, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(620, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(621, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(622, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(624, 3, 175, NULL, NULL, NULL, NULL, 2, 115.00, 1, 0),
(625, 3, 176, NULL, NULL, NULL, NULL, 2, 1093.00, 1, 0),
(626, 3, 174, NULL, NULL, NULL, NULL, 3, 1526.00, 1, 0),
(627, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(628, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(630, 3, NULL, 206, NULL, NULL, 89, 1, 1.20, 1, 0),
(631, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(632, 3, 175, NULL, NULL, NULL, NULL, 1, 115.00, 1, 0),
(633, 3, 176, NULL, NULL, NULL, NULL, 1, 1093.00, 1, 0),
(634, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(635, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(636, 3, NULL, 207, NULL, NULL, 90, 1, 3.42, 1, 0),
(637, 3, NULL, 207, NULL, NULL, 91, 1, 3.42, 1, 0),
(638, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(639, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(640, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(641, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(642, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(643, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(644, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(645, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(646, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(647, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(648, 3, NULL, 207, 127, NULL, NULL, 1, 34.20, 1, 0),
(649, 3, 177, NULL, NULL, NULL, NULL, 1, 855.00, 1, 0),
(650, 3, 174, NULL, NULL, NULL, NULL, 1, 1526.00, 1, 0),
(651, 3, 3, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(652, 3, 131, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(653, 3, 132, NULL, NULL, NULL, NULL, 1, 80.00, 1, 0),
(654, 3, 133, NULL, NULL, NULL, NULL, 1, 65.00, 1, 0),
(655, 3, NULL, 207, NULL, NULL, 92, 1, 3.42, 1, 1);

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
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `province_id`) VALUES
(2, 'Binondo', 1),
(3, 'Caloocan', 1),
(4, 'Las Piñas', 1),
(5, 'Makati', 1),
(6, 'Malabon', 1),
(7, 'Mandaluyong', 1),
(8, 'Manila', 1),
(9, 'Marikina', 1),
(10, 'Muntinlupa', 1),
(11, 'Navotas', 1),
(12, 'Parañaque', 1),
(13, 'Pasay', 1),
(14, 'Pasig', 1),
(15, 'Pateros', 1),
(16, 'Quezon City', 1),
(17, 'San Juan', 1),
(18, 'Taguig', 1),
(19, 'Valenzuela', 1),
(20, 'Butuan City', 2),
(21, 'Cabadbaran', 2),
(22, 'Bayugan', 3),
(23, 'Prosperidad', 3),
(24, 'San Francisco', 3),
(25, 'Talacogon', 3),
(26, 'Trento', 3),
(27, 'Veruela', 3),
(28, 'Basilan', 4),
(29, 'Isabela City', 4),
(30, 'Malaybalay', 5),
(31, 'Valencia', 5),
(32, 'Mambajao', 6),
(33, 'Nabunturan', 7),
(34, 'Tagum', 7),
(35, 'Kidapawan', 8),
(36, 'Panabo', 9),
(37, 'Tagum', 9),
(38, 'Digos', 10),
(39, 'Matanao', 10),
(40, 'Mati', 11),
(41, 'Basilisa', 12),
(42, 'Cagdianao', 12),
(43, 'Dinagat', 12),
(44, 'Libjo', 12),
(45, 'Loreto', 12),
(46, 'San Jose', 12),
(47, 'Tubajon', 12),
(48, 'Iligan', 13),
(49, 'Linamon', 13),
(50, 'Matungao', 13),
(51, 'Pantao Ragat', 13),
(52, 'Pantar', 13),
(53, 'Sapad', 13),
(54, 'Sultan Naga Dimaporo', 13),
(55, 'Tagoloan', 13),
(56, 'Tangcal', 13),
(57, 'Tubod', 13),
(58, 'Marawi', 14),
(59, 'Buldon', 15),
(60, 'Datu Paglas', 15),
(61, 'Datu Saudi Ampatuan', 15),
(62, 'Mamasapano', 15),
(63, 'Mangudadatu', 15),
(64, 'Pagalungan', 15),
(65, 'Paglat', 15),
(66, 'Pandag', 15),
(67, 'Rajah Buayan', 15),
(68, 'Shariff Aguak', 15),
(69, 'South Upi', 15),
(70, 'Sultan Kudarat', 15),
(71, 'Sultan Mastura', 15),
(72, 'Sultan Sa Barongis', 15),
(73, 'Talayan', 15),
(74, 'Upi', 15),
(75, 'Oroquieta', 16),
(76, 'Ozamiz', 16),
(77, 'Tangub', 16),
(78, 'Cagayan de Oro', 17),
(79, 'Gingoog', 17),
(80, 'Kidapawan', 18),
(81, 'Alabel', 19),
(82, 'General Santos', 20),
(83, 'Koronadal', 20),
(84, 'Isulan', 21),
(85, 'Jolo', 22),
(86, 'Siasi', 22),
(87, 'Surigao City', 23),
(88, 'Tandag', 24),
(89, 'Bongao', 25),
(90, 'Dapitan', 26),
(91, 'Dipolog', 26),
(92, 'Pagadian', 27),
(93, 'Ipil', 28),
(94, 'Bangued', 32),
(95, 'Boliney', 32),
(96, 'Bucay', 32),
(97, 'Bucloc', 32),
(98, 'Daguioman', 32),
(99, 'Danglas', 32),
(100, 'Dolores', 32),
(101, 'La Paz', 32),
(102, 'Lacub', 32),
(103, 'Lagangilang', 32),
(104, 'Lagayan', 32),
(105, 'Langiden', 32),
(106, 'Licuan-Baay', 32),
(107, 'Luba', 32),
(108, 'Malibcong', 32),
(109, 'Manabo', 32),
(110, 'Penarrubia', 32),
(111, 'Pidigan', 32),
(112, 'Pilar', 32),
(113, 'Sallapadan', 32),
(114, 'San Isidro', 32),
(115, 'San Juan', 32),
(116, 'San Quintin', 32),
(117, 'Tayum', 32),
(118, 'Tineg', 32),
(119, 'Tubo', 32),
(120, 'Villaviciosa', 32),
(121, 'Bangued', 32),
(122, 'Boliney', 32),
(123, 'Bucay', 32),
(124, 'Bucloc', 32),
(125, 'Daguioman', 32),
(126, 'Danglas', 32),
(127, 'Dolores', 32),
(128, 'La Paz', 32),
(129, 'Lacub', 32),
(130, 'Lagangilang', 32),
(131, 'Lagayan', 32),
(132, 'Langiden', 32),
(133, 'Licuan-Baay', 32),
(134, 'Luba', 32),
(135, 'Malibcong', 32),
(136, 'Manabo', 32),
(137, 'Penarrubia', 32),
(138, 'Pidigan', 32),
(139, 'Pilar', 32),
(140, 'Sallapadan', 32),
(141, 'San Isidro', 32),
(142, 'San Juan', 32),
(143, 'San Quintin', 32),
(144, 'Tayum', 32),
(145, 'Tineg', 32),
(146, 'Tubo', 32),
(147, 'Villaviciosa', 32),
(148, 'Calanasan', 33),
(149, 'Conner', 33),
(150, 'Flora', 33),
(151, 'Kabugao', 33),
(152, 'Luna', 33),
(153, 'Pudtol', 33),
(154, 'Santa Marcela', 33),
(155, 'Atok', 34),
(156, 'Baguio', 34),
(157, 'Bakun', 34),
(158, 'Bokod', 34),
(159, 'Buguias', 34),
(160, 'Itogon', 34),
(161, 'Kabayan', 34),
(162, 'Kapangan', 34),
(163, 'Kibungan', 34),
(164, 'La Trinidad', 34),
(165, 'Mankayan', 34),
(166, 'Sablan', 34),
(167, 'Tuba', 34),
(168, 'Tublay', 34),
(169, 'Abulug', 35),
(170, 'Alcala', 35),
(171, 'Allacapan', 35),
(172, 'Amulung', 35),
(173, 'Aparri', 35),
(174, 'Baggao', 35),
(175, 'Ballesteros', 35),
(176, 'Buguey', 35),
(177, 'Calayan', 35),
(178, 'Camalaniugan', 35),
(179, 'Claveria', 35),
(180, 'Enrile', 35),
(181, 'Gattaran', 35),
(182, 'Gonzaga', 35),
(183, 'Iguig', 35),
(184, 'Lal-lo', 35),
(185, 'Lasam', 35),
(186, 'Pamplona', 35),
(187, 'Peñablanca', 35),
(188, 'Piat', 35),
(189, 'Rizal', 35),
(190, 'Sanchez-Mira', 35),
(191, 'Santa Ana', 35),
(192, 'Santa Praxedes', 35),
(193, 'Santa Teresita', 35),
(194, 'Santo Niño', 35),
(195, 'Solana', 35),
(196, 'Tuao', 35),
(197, 'Tuguegarao', 35),
(198, 'Aguinaldo', 36),
(199, 'Alfonso Lista', 36),
(200, 'Asipulo', 36),
(201, 'Banaue', 36),
(202, 'Hingyon', 36),
(203, 'Hungduan', 36),
(204, 'Kiangan', 36),
(205, 'Lagawe', 36),
(206, 'Lamut', 36),
(207, 'Mayoyao', 36),
(208, 'Tinoc', 36),
(209, 'Adams', 37),
(210, 'Bacarra', 37),
(211, 'Badoc', 37),
(212, 'Bangui', 37),
(213, 'Banna', 37),
(214, 'Batac', 37),
(215, 'Burgos', 37),
(216, 'Carasi', 37),
(217, 'Currimao', 37),
(218, 'Dingras', 37),
(219, 'Dumalneg', 37),
(220, 'Marcos', 37),
(221, 'Nueva Era', 37),
(222, 'Pagudpud', 37),
(223, 'Paoay', 37),
(224, 'Pasuquin', 37),
(225, 'Piddig', 37),
(226, 'Pinili', 37),
(227, 'San Nicolas', 37),
(228, 'Sarrat', 37),
(229, 'Solsona', 37),
(230, 'Vintar', 37),
(231, 'Alilem', 38),
(232, 'Banayoyo', 38),
(233, 'Bantay', 38),
(234, 'Burgos', 38),
(235, 'Cabugao', 38),
(236, 'Candon', 38),
(237, 'Caoayan', 38),
(238, 'Cervantes', 38),
(239, 'Galimuyod', 38),
(240, 'Gregorio Del Pilar', 38),
(241, 'Lidlidda', 38),
(242, 'Magsingal', 38),
(243, 'Nagbukel', 38),
(244, 'Narvacan', 38),
(245, 'Quirino', 38),
(246, 'Salcedo', 38),
(247, 'San Emilio', 38),
(248, 'San Esteban', 38),
(249, 'San Ildefonso', 38),
(250, 'San Juan', 38),
(251, 'San Vicente', 38),
(252, 'Santa', 38),
(253, 'Santa Catalina', 38),
(254, 'Santa Cruz', 38),
(255, 'Santa Lucia', 38),
(256, 'Santa Maria', 38),
(257, 'Santiago', 38),
(258, 'Santo Domingo', 38),
(259, 'Sigay', 38),
(260, 'Sinait', 38),
(261, 'Sugpon', 38),
(262, 'Suyo', 38),
(263, 'Tagudin', 38),
(264, 'Vigan', 38),
(265, 'Alicia', 39),
(266, 'Angadanan', 39),
(267, 'Aurora', 39),
(268, 'Benito Soliven', 39),
(269, 'Burgos', 39),
(270, 'Cabagan', 39),
(271, 'Cabatuan', 39),
(272, 'Cauayan', 39),
(273, 'Cordon', 39),
(274, 'Delfin Albano', 39),
(275, 'Dinapigue', 39),
(276, 'Divilacan', 39),
(277, 'Echague', 39),
(278, 'Gamu', 39),
(279, 'Ilagan', 39),
(280, 'Jones', 39),
(281, 'Luna', 39),
(282, 'Maconacon', 39),
(283, 'Mallig', 39),
(284, 'Naguilian', 39),
(285, 'Palanan', 39),
(286, 'Quezon', 39),
(287, 'Quirino', 39),
(288, 'Ramon', 39),
(289, 'Reina Mercedes', 39),
(290, 'Roxas', 39),
(291, 'San Agustin', 39),
(292, 'San Guillermo', 39),
(293, 'San Isidro', 39),
(294, 'San Manuel', 39),
(295, 'San Mariano', 39),
(296, 'San Mateo', 39),
(297, 'San Pablo', 39),
(298, 'Santa Maria', 39),
(299, 'Santiago', 39),
(300, 'Santo Tomas', 39),
(301, 'Tumauini', 39),
(302, 'Balbalan', 40),
(303, 'Lubuagan', 40),
(304, 'Pasil', 40),
(305, 'Pinukpuk', 40),
(306, 'Rizal', 40),
(307, 'Tabuk', 40),
(308, 'Tanudan', 40),
(309, 'Tinglayan', 40),
(310, 'Agoo', 41),
(311, 'Aringay', 41),
(312, 'Bacnotan', 41),
(313, 'Bagulin', 41),
(314, 'Balaoan', 41),
(315, 'Bangar', 41),
(316, 'Bauang', 41),
(317, 'Burgos', 41),
(318, 'Caba', 41),
(319, 'Luna', 41),
(320, 'Naguilian', 41),
(321, 'Pugo', 41),
(322, 'Rosario', 41),
(323, 'San Fernando', 41),
(324, 'San Gabriel', 41),
(325, 'San Juan', 41),
(326, 'Santo Tomas', 41),
(327, 'Santol', 41),
(328, 'Sudipen', 41),
(329, 'Tubao', 41),
(330, 'Alfonso Castaneda', 42),
(331, 'Ambaguio', 42),
(332, 'Aritao', 42),
(333, 'Bagabag', 42),
(334, 'Bambang', 42),
(335, 'Bayombong', 42),
(336, 'Diadi', 42),
(337, 'Dupax Del Norte', 42),
(338, 'Dupax Del Sur', 42),
(339, 'Kasibu', 42),
(340, 'Kayapa', 42),
(341, 'Quezon', 42),
(342, 'Santa Fe', 42),
(343, 'Solano', 42),
(344, 'Villaverde', 42),
(345, 'Agno', 43),
(346, 'Aguilar', 43),
(347, 'Alaminos', 43),
(348, 'Alcala', 43),
(349, 'Anda', 43),
(350, 'Asingan', 43),
(351, 'Balungao', 43),
(352, 'Bani', 43),
(353, 'Basista', 43),
(354, 'Bautista', 43),
(355, 'Bayambang', 43),
(356, 'Binalonan', 43),
(357, 'Binmaley', 43),
(358, 'Bolinao', 43),
(359, 'Bugallon', 43),
(360, 'Burgos', 43),
(361, 'Calasiao', 43),
(362, 'Dagupan', 43),
(363, 'Dasol', 43),
(364, 'Infanta', 43),
(365, 'Labrador', 43),
(366, 'Laoac', 43),
(367, 'Lingayen', 43),
(368, 'Mabini', 43),
(369, 'Malasiqui', 43),
(370, 'Manaoag', 43),
(371, 'Mangaldan', 43),
(372, 'Mangatarem', 43),
(373, 'Mapandan', 43),
(374, 'Natividad', 43),
(375, 'Pozorrubio', 43),
(376, 'Rosales', 43),
(377, 'San Carlos', 43),
(378, 'San Fabian', 43),
(379, 'San Jacinto', 43),
(380, 'San Manuel', 43),
(381, 'San Nicolas', 43),
(382, 'San Quintin', 43),
(383, 'Santa Barbara', 43),
(384, 'Santa Maria', 43),
(385, 'Santo Tomas', 43),
(386, 'Sison', 43),
(387, 'Sual', 43),
(388, 'Tayug', 43),
(389, 'Umingan', 43),
(390, 'Urbiztondo', 43),
(391, 'Urdaneta', 43),
(392, 'Villasis', 43),
(393, 'Aglipay', 44),
(394, 'Cabarroguis', 44),
(395, 'Diffun', 44),
(396, 'Maddela', 44),
(397, 'Nagtipunan', 44),
(398, 'Saguday', 44),
(399, 'Bacacay', 45),
(400, 'Camalig', 45),
(401, 'Daraga', 45),
(402, 'Guinobatan', 45),
(403, 'Jovellar', 45),
(404, 'Legazpi', 45),
(405, 'Libon', 45),
(406, 'Ligao', 45),
(407, 'Malilipot', 45),
(408, 'Malinao', 45),
(409, 'Manito', 45),
(410, 'Oas', 45),
(411, 'Pio Duran', 45),
(412, 'Polangui', 45),
(413, 'Rapu-Rapu', 45),
(414, 'Santo Domingo', 45),
(415, 'Tiwi', 45),
(416, 'Agoncillo', 46),
(417, 'Alitagtag', 46),
(418, 'Balayan', 46),
(419, 'Balete', 46),
(420, 'Bauan', 46),
(421, 'Calaca', 46),
(422, 'Calatagan', 46),
(423, 'Cuenca', 46),
(424, 'Ibaan', 46),
(425, 'Laurel', 46),
(426, 'Lemery', 46),
(427, 'Lian', 46),
(428, 'Lipa', 46),
(429, 'Lobo', 46),
(430, 'Mabini', 46),
(431, 'Malvar', 46),
(432, 'Mataasnakahoy', 46),
(433, 'Nasugbu', 46),
(434, 'Padre Garcia', 46),
(435, 'Rosario', 46),
(436, 'San Jose', 46),
(437, 'San Juan', 46),
(438, 'San Luis', 46),
(439, 'San Nicolas', 46),
(440, 'San Pascual', 46),
(441, 'Santa Teresita', 46),
(442, 'Santo Tomas', 46),
(443, 'Taal', 46),
(444, 'Talisay', 46),
(445, 'Tanauan', 46),
(446, 'Taysan', 46),
(447, 'Tingloy', 46),
(448, 'Tuy', 46),
(449, 'Basud', 47),
(450, 'Capalonga', 47),
(451, 'Daet', 47),
(452, 'Jose Panganiban', 47),
(453, 'Labo', 47),
(454, 'Mercedes', 47),
(455, 'Paracale', 47),
(456, 'San Lorenzo Ruiz', 47),
(457, 'San Vicente', 47),
(458, 'Santa Elena', 47),
(459, 'Talisay', 47),
(460, 'Vinzons', 47),
(461, 'Baao', 48),
(462, 'Balatan', 48),
(463, 'Bato', 48),
(464, 'Bombon', 48),
(465, 'Buhi', 48),
(466, 'Bula', 48),
(467, 'Cabusao', 48),
(468, 'Calabanga', 48),
(469, 'Camaligan', 48),
(470, 'Canaman', 48),
(471, 'Caramoan', 48),
(472, 'Del Gallego', 48),
(473, 'Gainza', 48),
(474, 'Garchitorena', 48),
(475, 'Goa', 48),
(476, 'Iriga', 48),
(477, 'Lagonoy', 48),
(478, 'Libmanan', 48),
(479, 'Lupi', 48),
(480, 'Magarao', 48),
(481, 'Milaor', 48),
(482, 'Minalabac', 48),
(483, 'Nabua', 48),
(484, 'Naga', 48),
(485, 'Ocampo', 48),
(486, 'Pamplona', 48),
(487, 'Pasacao', 48),
(488, 'Pili', 48),
(489, 'Presentacion', 48),
(490, 'Ragay', 48),
(491, 'Sagnay', 48),
(492, 'San Fernando', 48),
(493, 'San Jose', 48),
(494, 'Sipocot', 48),
(495, 'Siruma', 48),
(496, 'Tigaon', 48),
(497, 'Tinambac', 48),
(498, 'Bagamanoc', 49),
(499, 'Baras', 49),
(500, 'Bato', 49),
(501, 'Caramoran', 49),
(502, 'Gigmoto', 49),
(503, 'Pandan', 49),
(504, 'Panganiban', 49),
(505, 'San Andres', 49),
(506, 'San Miguel', 49),
(507, 'Viga', 49),
(508, 'Virac', 49),
(509, 'Alfonso', 50),
(510, 'Amadeo', 50),
(511, 'Bacoor', 50),
(512, 'Carmona', 50),
(513, 'Cavite City', 50),
(514, 'Dasmariñas', 50),
(515, 'General Emilio Aguinaldo', 50),
(516, 'General Mariano Alvarez', 50),
(517, 'General Trias', 50),
(518, 'Imus', 50),
(519, 'Indang', 50),
(520, 'Kawit', 50),
(521, 'Magallanes', 50),
(522, 'Maragondon', 50),
(523, 'Mendez', 50),
(524, 'Naic', 50),
(525, 'Noveleta', 50),
(526, 'Rosario', 50),
(527, 'Silang', 50),
(528, 'Tagaytay', 50),
(529, 'Tanza', 50),
(530, 'Ternate', 50),
(531, 'Trece Martires', 50),
(532, 'Alaminos', 51),
(533, 'Bay', 51),
(534, 'Biñan', 51),
(535, 'Cabuyao', 51),
(536, 'Calamba', 51),
(537, 'Calauan', 51),
(538, 'Cavinti', 51),
(539, 'Famy', 51),
(540, 'Kalayaan', 51),
(541, 'Liliw', 51),
(542, 'Los Baños', 51),
(543, 'Luisiana', 51),
(544, 'Lumban', 51),
(545, 'Mabitac', 51),
(546, 'Magdalena', 51),
(547, 'Majayjay', 51),
(548, 'Nagcarlan', 51),
(549, 'Paete', 51),
(550, 'Pagsanjan', 51),
(551, 'Pakil', 51),
(552, 'Pangil', 51),
(553, 'Pila', 51),
(554, 'Rizal', 51),
(555, 'San Pablo', 51),
(556, 'San Pedro', 51),
(557, 'Santa Cruz', 51),
(558, 'Santa Maria', 51),
(559, 'Santa Rosa', 51),
(560, 'Siniloan', 51),
(561, 'Victoria', 51),
(562, 'Boac', 52),
(563, 'Buenavista', 52),
(564, 'Gasan', 52),
(565, 'Mogpog', 52),
(566, 'Santa Cruz', 52),
(567, 'Torrijos', 52),
(568, 'Aroroy', 53),
(569, 'Baleno', 53),
(570, 'Balud', 53),
(571, 'Batuan', 53),
(572, 'Cataingan', 53),
(573, 'Cawayan', 53),
(574, 'Claveria', 53),
(575, 'Dimasalang', 53),
(576, 'Esperanza', 53),
(577, 'Mandaon', 53),
(578, 'Masbate City', 53),
(579, 'Milagros', 53),
(580, 'Mobo', 53),
(581, 'Monreal', 53),
(582, 'Palanas', 53),
(583, 'Pio V. Corpuz', 53),
(584, 'Placer', 53),
(585, 'San Fernando', 53),
(586, 'San Jacinto', 53),
(587, 'San Pascual', 53),
(588, 'Uson', 53),
(589, 'Abra de Ilog', 54),
(590, 'Calintaan', 54),
(591, 'Looc', 54),
(592, 'Lubang', 54),
(593, 'Magsaysay', 54),
(594, 'Mamburao', 54),
(595, 'Paluan', 54),
(596, 'Rizal', 54),
(597, 'Sablayan', 54),
(598, 'San Jose', 54),
(599, 'Santa Cruz', 54),
(600, 'Baco', 55),
(601, 'Bansud', 55),
(602, 'Bongabong', 55),
(603, 'Bulalacao', 55),
(604, 'Calapan', 55),
(605, 'Gloria', 55),
(606, 'Mansalay', 55),
(607, 'Naujan', 55),
(608, 'Pinamalayan', 55),
(609, 'Pola', 55),
(610, 'Puerto Galera', 55),
(611, 'Roxas', 55),
(612, 'San Teodoro', 55),
(613, 'Socorro', 55),
(614, 'Victoria', 55),
(615, 'Aborlan', 56),
(616, 'Agutaya', 56),
(617, 'Araceli', 56),
(618, 'Balabac', 56),
(619, 'Bataraza', 56),
(620, 'Brooke\'s Point', 56),
(621, 'Busuanga', 56),
(622, 'Cagayancillo', 56),
(623, 'Coron', 56),
(624, 'Culion', 56),
(625, 'Cuyo', 56),
(626, 'Dumaran', 56),
(627, 'El Nido', 56),
(628, 'Kalayaan', 56),
(629, 'Linapacan', 56),
(630, 'Magsaysay', 56),
(631, 'Narra', 56),
(632, 'Puerto Princesa', 56),
(633, 'Quezon', 56),
(634, 'Rizal', 56),
(635, 'Roxas', 56),
(636, 'San Vicente', 56),
(637, 'Sofronio Española', 56),
(638, 'Taytay', 56),
(639, 'Agdangan', 57),
(640, 'Alabat', 57),
(641, 'Atimonan', 57),
(642, 'Buenavista', 57),
(643, 'Burdeos', 57),
(644, 'Calauag', 57),
(645, 'Candelaria', 57),
(646, 'Catanauan', 57),
(647, 'Dolores', 57),
(648, 'General Luna', 57),
(649, 'General Nakar', 57),
(650, 'Guinayangan', 57),
(651, 'Gumaca', 57),
(652, 'Infanta', 57),
(653, 'Jomalig', 57),
(654, 'Lopez', 57),
(655, 'Lucban', 57),
(656, 'Lucena', 57),
(657, 'Macalelon', 57),
(658, 'Mauban', 57),
(659, 'Mulanay', 57),
(660, 'Padre Burgos', 57),
(661, 'Pagbilao', 57),
(662, 'Panukulan', 57),
(663, 'Patnanungan', 57),
(664, 'Perez', 57),
(665, 'Pitogo', 57),
(666, 'Plaridel', 57),
(667, 'Polillo', 57),
(668, 'Real', 57),
(669, 'Sampaloc', 57),
(670, 'San Andres', 57),
(671, 'San Antonio', 57),
(672, 'San Francisco', 57),
(673, 'San Narciso', 57),
(674, 'Sariaya', 57),
(675, 'Tagkawayan', 57),
(676, 'Tayabas', 57),
(677, 'Tiaong', 57),
(678, 'Unisan', 57),
(679, 'Angono', 58),
(680, 'Antipolo', 58),
(681, 'Baras', 58),
(682, 'Binangonan', 58),
(683, 'Cainta', 58),
(684, 'Cardona', 58),
(685, 'Jalajala', 58),
(686, 'Morong', 58),
(687, 'Pililla', 58),
(688, 'Rodriguez', 58),
(689, 'San Mateo', 58),
(690, 'Tanay', 58),
(691, 'Taytay', 58),
(692, 'Teresa', 58),
(693, 'Alcantara', 59),
(694, 'Banton', 59),
(695, 'Cajidiocan', 59),
(696, 'Calatrava', 59),
(697, 'Concepcion', 59),
(698, 'Corcuera', 59),
(699, 'Ferrol', 59),
(700, 'Looc', 59),
(701, 'Magdiwang', 59),
(702, 'Odiongan', 59),
(703, 'Romblon', 59),
(704, 'San Agustin', 59),
(705, 'San Andres', 59),
(706, 'San Fernando', 59),
(707, 'San Jose', 59),
(708, 'Santa Fe', 59),
(709, 'Barcelona', 60),
(710, 'Bulan', 60),
(711, 'Bulusan', 60),
(712, 'Casiguran', 60),
(713, 'Castilla', 60),
(714, 'Donsol', 60),
(715, 'Gubat', 60),
(716, 'Irosin', 60),
(717, 'Juban', 60),
(718, 'Magallanes', 60),
(719, 'Matnog', 60),
(720, 'Pilar', 60),
(721, 'Prieto Diaz', 60),
(722, 'Santa Magdalena', 60),
(723, 'Sorsogon City', 60),
(724, 'Altavas', 61),
(725, 'Balete', 61),
(726, 'Banga', 61),
(727, 'Batan', 61),
(728, 'Buruanga', 61),
(729, 'Ibajay', 61),
(730, 'Kalibo', 61),
(731, 'Lezo', 61),
(732, 'Libacao', 61),
(733, 'Madalag', 61),
(734, 'Makato', 61),
(735, 'Malay', 61),
(736, 'Malinao', 61),
(737, 'Nabas', 61),
(738, 'New Washington', 61),
(739, 'Numancia', 61),
(740, 'Tangalan', 61),
(741, 'Anini-y', 62),
(742, 'Barbaza', 62),
(743, 'Belison', 62),
(744, 'Bugasong', 62),
(745, 'Caluya', 62),
(746, 'Culasi', 62),
(747, 'Hamtic', 62),
(748, 'Laua-an', 62),
(749, 'Libertad', 62),
(750, 'Pandan', 62),
(751, 'Patnongon', 62),
(752, 'San Jose', 62),
(753, 'San Remigio', 62),
(754, 'Sebaste', 62),
(755, 'Sibalom', 62),
(756, 'Tibiao', 62),
(757, 'Tobias Fornier', 62),
(758, 'Valderrama', 62),
(759, 'Almeria', 63),
(760, 'Biliran', 63),
(761, 'Cabucgayan', 63),
(762, 'Caibiran', 63),
(763, 'Culaba', 63),
(764, 'Kawayan', 63),
(765, 'Maripipi', 63),
(766, 'Naval', 63),
(767, 'Alburquerque', 64),
(768, 'Alicia', 64),
(769, 'Anda', 64),
(770, 'Antequera', 64),
(771, 'Baclayon', 64),
(772, 'Balilihan', 64),
(773, 'Batuan', 64),
(774, 'Bien Unido', 64),
(775, 'Bilar', 64),
(776, 'Buenavista', 64),
(777, 'Calape', 64),
(778, 'Candijay', 64),
(779, 'Carmen', 64),
(780, 'Catigbian', 64),
(781, 'Clarin', 64),
(782, 'Corella', 64),
(783, 'Cortes', 64),
(784, 'Dagohoy', 64),
(785, 'Danao', 64),
(786, 'Dauis', 64),
(787, 'Dimiao', 64),
(788, 'Duero', 64),
(789, 'Garcia Hernandez', 64),
(790, 'Getafe', 64),
(791, 'Guindulman', 64),
(792, 'Inabanga', 64),
(793, 'Jagna', 64),
(794, 'Lila', 64),
(795, 'Loay', 64),
(796, 'Loboc', 64),
(797, 'Loon', 64),
(798, 'Mabini', 64),
(799, 'Maribojoc', 64),
(800, 'Panglao', 64),
(801, 'Pilar', 64),
(802, 'Pres. Carlos P. Garcia', 64),
(803, 'Sagbayan', 64),
(804, 'San Isidro', 64),
(805, 'San Miguel', 64),
(806, 'Sevilla', 64),
(807, 'Sierra Bullones', 64),
(808, 'Sikatuna', 64),
(809, 'Tagbilaran', 64),
(810, 'Talibon', 64),
(811, 'Trinidad', 64),
(812, 'Tubigon', 64),
(813, 'Ubay', 64),
(814, 'Valencia', 64),
(815, 'Alcantara', 65),
(816, 'Alcoy', 65),
(817, 'Alegria', 65),
(818, 'Aloguinsan', 65),
(819, 'Argao', 65),
(820, 'Asturias', 65),
(821, 'Badian', 65),
(822, 'Balamban', 65),
(823, 'Bantayan', 65),
(824, 'Barili', 65),
(825, 'Bogo', 65),
(826, 'Boljoon', 65),
(827, 'Borbon', 65),
(828, 'Carcar', 65),
(829, 'Carmen', 65),
(830, 'Catmon', 65),
(831, 'Cebu City', 65),
(832, 'Compostela', 65),
(833, 'Consolacion', 65),
(834, 'Cordova', 65),
(835, 'Daanbantayan', 65),
(836, 'Dalaguete', 65),
(837, 'Danao', 65),
(838, 'Dumanjug', 65),
(839, 'Ginatilan', 65),
(840, 'Lapu-Lapu', 65),
(841, 'Liloan', 65),
(842, 'Madridejos', 65),
(843, 'Malabuyoc', 65),
(844, 'Mandaue', 65),
(845, 'Medellin', 65),
(846, 'Minglanilla', 65),
(847, 'Moalboal', 65),
(848, 'Naga', 65),
(849, 'Oslob', 65),
(850, 'Pilar', 65),
(851, 'Pinamungajan', 65),
(852, 'Poro', 65),
(853, 'Ronda', 65),
(854, 'Samboan', 65),
(855, 'San Fernando', 65),
(856, 'San Francisco', 65),
(857, 'San Remigio', 65),
(858, 'Santa Fe', 65),
(859, 'Santander', 65),
(860, 'Sibonga', 65),
(861, 'Sogod', 65),
(862, 'Tabogon', 65),
(863, 'Tabuelan', 65),
(864, 'Talisay', 65),
(865, 'Toledo', 65),
(866, 'Tuburan', 65),
(867, 'Tudela', 65),
(868, 'Arteche', 66),
(869, 'Balangiga', 66),
(870, 'Balangkayan', 66),
(871, 'Borongan', 66),
(872, 'Can-avid', 66),
(873, 'Dolores', 66),
(874, 'General MacArthur', 66),
(875, 'Giporlos', 66),
(876, 'Guiuan', 66),
(877, 'Hernani', 66),
(878, 'Jipapad', 66),
(879, 'Lawaan', 66),
(880, 'Llorente', 66),
(881, 'Maslog', 66),
(882, 'Maydolong', 66),
(883, 'Mercedes', 66),
(884, 'Oras', 66),
(885, 'Quinapondan', 66),
(886, 'Salcedo', 66),
(887, 'San Julian', 66),
(888, 'San Policarpo', 66),
(889, 'Sulat', 66),
(890, 'Taft', 66),
(891, 'Buenavista', 67),
(892, 'Jordan', 67),
(893, 'Nueva Valencia', 67),
(894, 'San Lorenzo', 67),
(895, 'Sibunag', 67),
(896, 'Ajuy', 68),
(897, 'Alimodian', 68),
(898, 'Anilao', 68),
(899, 'Badiangan', 68),
(900, 'Balasan', 68),
(901, 'Banate', 68),
(902, 'Barotac Nuevo', 68),
(903, 'Barotac Viejo', 68),
(904, 'Batad', 68),
(905, 'Bingawan', 68),
(906, 'Cabatuan', 68),
(907, 'Calinog', 68),
(908, 'Carles', 68),
(909, 'Concepcion', 68),
(910, 'Dingle', 68),
(911, 'Dueñas', 68),
(912, 'Dumangas', 68),
(913, 'Estancia', 68),
(914, 'Guimbal', 68),
(915, 'Igbaras', 68),
(916, 'Iloilo City', 68),
(917, 'Janiuay', 68),
(918, 'Lambunao', 68),
(919, 'Leganes', 68),
(920, 'Lemery', 68),
(921, 'Leon', 68),
(922, 'Maasin', 68),
(923, 'Miagao', 68),
(924, 'Mina', 68),
(925, 'New Lucena', 68),
(926, 'Oton', 68),
(927, 'Pavia', 68),
(928, 'Pototan', 68),
(929, 'San Dionisio', 68),
(930, 'San Enrique', 68),
(931, 'San Joaquin', 68),
(932, 'San Miguel', 68),
(933, 'San Rafael', 68),
(934, 'Santa Barbara', 68),
(935, 'Sara', 68),
(936, 'Tigbauan', 68),
(937, 'Tubungan', 68),
(938, 'Zarraga', 68),
(939, 'Abuyog', 69),
(940, 'Alangalang', 69),
(941, 'Albuera', 69),
(942, 'Babatngon', 69),
(943, 'Barugo', 69),
(944, 'Bato', 69),
(945, 'Baybay', 69),
(946, 'Burauen', 69),
(947, 'Calubian', 69),
(948, 'Capoocan', 69),
(949, 'Carigara', 69),
(950, 'Dagami', 69),
(951, 'Dulag', 69),
(952, 'Hilongos', 69),
(953, 'Hindang', 69),
(954, 'Inopacan', 69),
(955, 'Isabel', 69),
(956, 'Jaro', 69),
(957, 'Javier', 69),
(958, 'Julita', 69),
(959, 'Kananga', 69),
(960, 'La Paz', 69),
(961, 'Leyte', 69),
(962, 'MacArthur', 69),
(963, 'Mahaplag', 69),
(964, 'Matag-ob', 69),
(965, 'Matalom', 69),
(966, 'Mayorga', 69),
(967, 'Merida', 69),
(968, 'Ormoc', 69),
(969, 'Palo', 69),
(970, 'Palompon', 69),
(971, 'Pastrana', 69),
(972, 'San Isidro', 69),
(973, 'San Miguel', 69),
(974, 'Santa Fe', 69),
(975, 'Sogod', 69),
(976, 'Tabango', 69),
(977, 'Tabontabon', 69),
(978, 'Tacloban', 69),
(979, 'Tanauan', 69),
(980, 'Tolosa', 69),
(981, 'Tunga', 69),
(982, 'Villaba', 69),
(983, 'Bacolod', 70),
(984, 'Bago', 70),
(985, 'Binalbagan', 70),
(986, 'Cadiz', 70),
(987, 'Calatrava', 70),
(988, 'Candoni', 70),
(989, 'Cauayan', 70),
(990, 'Enrique B. Magalona', 70),
(991, 'Escalante', 70),
(992, 'Himamaylan', 70),
(993, 'Hinigaran', 70),
(994, 'Hinoba-an', 70),
(995, 'Ilog', 70),
(996, 'Isabela', 70),
(997, 'Kabankalan', 70),
(998, 'La Carlota', 70),
(999, 'La Castellana', 70),
(1000, 'Manapla', 70),
(1001, 'Moises Padilla', 70),
(1002, 'Murcia', 70),
(1003, 'Pontevedra', 70),
(1004, 'Pulupandan', 70),
(1005, 'Sagay', 70),
(1006, 'Salvador Benedicto', 70),
(1007, 'San Carlos', 70),
(1008, 'San Enrique', 70),
(1009, 'Silay', 70),
(1010, 'Sipalay', 70),
(1011, 'Talisay', 70),
(1012, 'Toboso', 70),
(1013, 'Valladolid', 70),
(1014, 'Victorias', 70),
(1015, 'Amlan', 71),
(1016, 'Ayungon', 71),
(1017, 'Bacong', 71),
(1018, 'Bais', 71),
(1019, 'Basay', 71),
(1020, 'Bayawan', 71),
(1021, 'Bindoy', 71),
(1022, 'Canlaon', 71),
(1023, 'Dauin', 71),
(1024, 'Dumaguete', 71),
(1025, 'Guihulngan', 71),
(1026, 'Jimalalud', 71),
(1027, 'La Libertad', 71),
(1028, 'Mabinay', 71),
(1029, 'Manjuyod', 71),
(1030, 'Pamplona', 71),
(1031, 'San Jose', 71),
(1032, 'Santa Catalina', 71),
(1033, 'Siaton', 71),
(1034, 'Sibulan', 71),
(1035, 'Tanjay', 71),
(1036, 'Tayasan', 71),
(1037, 'Valencia', 71),
(1038, 'Vallehermoso', 71),
(1039, 'Zamboanguita', 71),
(1040, 'Allen', 72),
(1041, 'Biri', 72),
(1042, 'Bobon', 72),
(1043, 'Capul', 72),
(1044, 'Catarman', 72),
(1045, 'Catubig', 72),
(1046, 'Gamay', 72),
(1047, 'Laoang', 72),
(1048, 'Lapinig', 72),
(1049, 'Las Navas', 72),
(1050, 'Lavezares', 72),
(1051, 'Lope de Vega', 72),
(1052, 'Mapanas', 72),
(1053, 'Mondragon', 72),
(1054, 'Palapag', 72),
(1055, 'Pambujan', 72),
(1056, 'Rosales', 72),
(1057, 'San Antonio', 72),
(1058, 'San Isidro', 72),
(1059, 'San Jose', 72),
(1060, 'San Roque', 72),
(1061, 'San Vicente', 72),
(1062, 'Silvino Lobos', 72),
(1063, 'Victoria', 72),
(1064, 'Almagro', 73),
(1065, 'Basey', 73),
(1066, 'Calbayog', 73),
(1067, 'Calbiga', 73),
(1068, 'Catbalogan', 73),
(1069, 'Daram', 73),
(1070, 'Gandara', 73),
(1071, 'Hinabangan', 73),
(1072, 'Jiabong', 73),
(1073, 'Marabut', 73),
(1074, 'Matuguinao', 73),
(1075, 'Motiong', 73),
(1076, 'Pagsanghan', 73),
(1077, 'Paranas', 73),
(1078, 'Pinabacdao', 73),
(1079, 'San Jorge', 73),
(1080, 'San Jose de Buan', 73),
(1081, 'San Sebastian', 73),
(1082, 'Santa Margarita', 73),
(1083, 'Santa Rita', 73),
(1084, 'Santo Niño', 73),
(1085, 'Tagapul-an', 73),
(1086, 'Talalora', 73),
(1087, 'Tarangnan', 73),
(1088, 'Villareal', 73),
(1089, 'Zumarraga', 73),
(1090, 'Enrique Villanueva', 74),
(1091, 'Larena', 74),
(1092, 'Lazi', 74),
(1093, 'Maria', 74),
(1094, 'San Juan', 74),
(1095, 'Siquijor', 74);

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
(1, 1, 'assets/component_assets/asset1.jpg', '1'),
(2, 2, 'assets/component_assets/asset2.jpg', '1'),
(3, 3, 'assets/component_assets/asset3.jpg', '1'),
(17, 4, 'assets/component_assets/asset2.jpg', '1');

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
(1, 'thumbnail_built_game', 'img/i3.jpg', NULL, NULL),
(2, 'approving_ticket_percentage', NULL, NULL, 10.00),
(3, 'thumbnail_ticket', 'img/i1.jpg', NULL, NULL);

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
-- Table structure for table `denied_approve_game_requests`
--

CREATE TABLE `denied_approve_game_requests` (
  `denied_approve_game_request_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denied_approve_game_requests`
--

INSERT INTO `denied_approve_game_requests` (`denied_approve_game_request_id`, `game_id`, `reason`, `file_path`, `timestamp`) VALUES
(6, 200, 'palitan mo lng ung ano mo okay na', '../uploads/denied_approve_game_requests/6524013a1a397_5.png', '2023-10-09 13:33:46'),
(7, 200, 'opop', '0', '2023-10-09 13:35:17'),
(8, 207, 'plagiarized', '../uploads/denied_approve_game_requests/652633bff3287_rufus-4.2.exe', '2023-10-11 05:33:51');

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
  `date_modified` timestamp NULL DEFAULT NULL,
  `is_built` tinyint(4) DEFAULT 0,
  `is_pending` tinyint(1) DEFAULT 0,
  `is_purchased` tinyint(1) DEFAULT 0,
  `to_approve` tinyint(1) NOT NULL DEFAULT 0,
  `is_denied` tinyint(1) DEFAULT 0,
  `is_approved` tinyint(1) DEFAULT 0,
  `is_visible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `name`, `description`, `user_id`, `created_at`, `date_modified`, `is_built`, `is_pending`, `is_purchased`, `to_approve`, `is_denied`, `is_approved`, `is_visible`) VALUES
(200, 'f', '', 3, '2023-10-09 21:32:17', '2023-10-09 13:36:15', 1, 0, 0, 0, 0, 1, 0),
(201, '89', '', 3, '2023-10-09 21:42:57', '2023-10-09 13:43:07', 0, 1, 0, 0, 0, 0, 0),
(202, 'f', '', 3, '2023-10-09 21:44:05', '2023-10-09 13:44:13', 0, 1, 0, 0, 0, 0, 0),
(203, 'asd', '', 3, '2023-10-11 01:38:29', '2023-10-10 17:38:36', 0, 0, 1, 1, 0, 0, 0),
(204, '89', '', 3, '2023-10-11 01:53:09', '2023-10-10 17:53:16', 0, 0, 1, 1, 0, 0, 0),
(205, 'op', '', 3, '2023-10-11 10:52:35', '2023-10-11 02:52:48', 0, 0, 1, 1, 0, 0, 0),
(206, 'hello', '', 3, '2023-10-11 10:54:05', '2023-10-11 02:54:10', 0, 0, 1, 1, 0, 0, 0),
(207, 'game 1', '', 3, '2023-10-11 13:28:57', '2023-10-11 05:29:30', 1, 1, 0, 0, 0, 1, 1);

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
(3, 'Dice 2', 'asd', 7.40, 'game piece', NULL, 1, 0, '7x7'),
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
  `unique_order_id` varchar(255) DEFAULT NULL,
  `unique_order_group_id` varchar(255) DEFAULT NULL,
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
  `paypal_transaction_id` varchar(255) DEFAULT NULL,
  `payer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `unique_order_id`, `unique_order_group_id`, `cart_id`, `user_id`, `published_game_id`, `built_game_id`, `added_component_id`, `ticket_id`, `quantity`, `price`, `is_pending`, `in_production`, `to_ship`, `to_deliver`, `is_received`, `is_canceled`, `is_completely_canceled`, `order_date`, `desired_markup`, `manufacturer_profit`, `creator_profit`, `marketplace_price`, `is_rated`, `fullname`, `number`, `region`, `province`, `city`, `barangay`, `zip`, `street`, `total_payment`, `paypal_transaction_id`, `payer_id`) VALUES
(255, '17665260e6d2a227', '20231011045437', 633, 3, 176, NULL, NULL, NULL, 1, 1093.00, 0, 0, 1, 0, 0, 0, 0, '2023-10-11 10:54:37', 1000.00, 200.00, 800.00, 1093.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2820.20, '96G80548V80593116', '5HGF7ZREXPDNG'),
(256, '17565260e6d2c98c', '20231011045437', 632, 3, 175, NULL, NULL, NULL, 1, 115.00, 0, 0, 1, 0, 0, 0, 0, '2023-10-11 10:54:37', 45.00, 9.00, 36.00, 115.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2820.20, '96G80548V80593116', '5HGF7ZREXPDNG'),
(257, '17465260e6d2fea0', '20231011045437', 631, 3, 174, NULL, NULL, NULL, 1, 1526.00, 0, 0, 1, 0, 0, 0, 0, '2023-10-11 10:54:37', 700.00, 140.00, 560.00, 1526.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2820.20, '96G80548V80593116', '5HGF7ZREXPDNG'),
(258, '8965260e6d337a7', '20231011045437', 630, 3, NULL, NULL, NULL, 89, 1, 1.20, 0, 0, 0, 0, 1, 0, 0, '2023-10-11 10:54:37', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2820.20, '96G80548V80593116', '5HGF7ZREXPDNG'),
(259, '13365260fa52ed1a', '20231011045949', 635, 3, 133, NULL, NULL, NULL, 1, 65.00, 0, 1, 0, 0, 0, 0, 0, '2023-10-11 10:59:49', 25.00, 15.00, 7.00, 65.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '2ST519846Y7253518', '5HGF7ZREXPDNG'),
(260, '13265260fa531314', '20231011045949', 634, 3, 132, NULL, NULL, NULL, 1, 80.00, 0, 1, 0, 0, 0, 0, 0, '2023-10-11 10:59:49', 30.00, 20.00, 10.00, 80.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '2ST519846Y7253518', '5HGF7ZREXPDNG'),
(261, '906526335648686', '20231011073206', 636, 3, NULL, NULL, NULL, 90, 1, 3.42, 0, 0, 0, 0, 1, 0, 0, '2023-10-11 13:32:06', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 3.42, '1WS47672PW213404N', 'S9QZENZKTVY9A'),
(262, '91652634146c89b', '20231011073516', 637, 3, NULL, NULL, NULL, 91, 1, 3.42, 0, 0, 0, 0, 1, 0, 0, '2023-10-11 13:35:16', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 3.42, '9JJ68231EC736405B', 'S9QZENZKTVY9A'),
(263, '1746526447567452', '20231011084509', 650, 3, 174, NULL, NULL, NULL, 1, 1526.00, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 700.00, 140.00, 560.00, 1526.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(264, '177652644757049d', '20231011084509', 649, 3, 177, NULL, NULL, NULL, 1, 855.00, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 500.00, 100.00, 400.00, 855.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(265, '1276526447574e95', '20231011084509', 648, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(266, '12765264475796c5', '20231011084509', 647, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(267, '127652644757d53f', '20231011084509', 646, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(268, '12765264475815ed', '20231011084509', 645, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(269, '12765264475857b2', '20231011084509', 644, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(270, '1276526447589bde', '20231011084509', 643, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(271, '127652644758fa6a', '20231011084509', 642, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(272, '127652644759429f', '20231011084509', 641, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(273, '12765264475988e7', '20231011084509', 640, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(274, '127652644759d903', '20231011084509', 639, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(275, '12765264475b0c56', '20231011084509', 638, 3, NULL, 127, NULL, NULL, 1, 34.20, 1, 0, 0, 0, 0, 0, 0, '2023-10-11 14:45:09', 0.00, 0.00, 0.00, 0.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 2872.20, '55B63409V2397680S', 'S9QZENZKTVY9A'),
(276, '1316527c16784c36', '20231012115031', 652, 3, 131, NULL, NULL, NULL, 1, 65.00, 0, 1, 0, 0, 0, 0, 0, '2023-10-12 17:50:31', 25.00, 15.00, 7.00, 65.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '6BF87699EP2973230', 'S9QZENZKTVY9A'),
(277, '36527c1678ab54', '20231012115031', 651, 3, 3, NULL, NULL, NULL, 1, 80.00, 0, 1, 0, 0, 0, 0, 0, '2023-10-12 17:50:31', 30.00, 20.00, 10.00, 80.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '6BF87699EP2973230', 'S9QZENZKTVY9A'),
(278, '1336527c246d51d9', '20231012115414', 654, 3, 133, NULL, NULL, NULL, 1, 65.00, 1, 0, 0, 0, 0, 0, 0, '2023-10-12 17:54:14', 25.00, 15.00, 7.00, 65.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '1VU449386K345473N', 'S9QZENZKTVY9A'),
(279, '1326527c246da4f0', '20231012115414', 653, 3, 132, NULL, NULL, NULL, 1, 80.00, 1, 0, 0, 0, 0, 0, 0, '2023-10-12 17:54:14', 30.00, 20.00, 10.00, 80.00, 0, 'Denzel Go', '09770257461', 'Metro Manila', 'Metro Manila', 'Valenzuela', 'Barangay 5', '1440', '8 Doneza St. Balubaran Malinta', 230.00, '1VU449386K345473N', 'S9QZENZKTVY9A');

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
(11, '1RC89732SP822820P', 'CAPTURE', 'COMPLETED', 'PHP', 1020.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '4BL05298WN067111A', 'COMPLETED', 'PHP', 1020.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:37:28', '2023-10-10 15:37:28', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(12, '3WD98492HP297450F', 'CAPTURE', 'COMPLETED', 'PHP', 1178.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2GC3740466523721M', 'COMPLETED', 'PHP', 1178.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:38:48', '2023-10-10 15:38:48', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(13, '42S02517YN593892G', 'CAPTURE', 'COMPLETED', 'PHP', 1178.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '45B15054KE8864122', 'COMPLETED', 'PHP', 1178.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:40:09', '2023-10-10 15:40:09', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(14, '68V05160T3967922T', 'CAPTURE', 'COMPLETED', 'PHP', 150.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0F837456YL240214W', 'COMPLETED', 'PHP', 150.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:41:05', '2023-10-10 15:41:05', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(15, '2UY6018476989792U', 'CAPTURE', 'COMPLETED', 'PHP', 1293.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '4TC83959MA6863723', 'COMPLETED', 'PHP', 1293.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:41:46', '2023-10-10 15:41:46', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(16, '21829947U4509782X', 'CAPTURE', 'COMPLETED', 'PHP', 13819.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '1SG5247318406582X', 'COMPLETED', 'PHP', 13819.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:43:46', '2023-10-10 15:43:46', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(17, '70964530JV970133N', 'CAPTURE', 'COMPLETED', 'PHP', 12293.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2GD34429FT090890H', 'COMPLETED', 'PHP', 12293.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:44:38', '2023-10-10 15:44:38', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(18, '52979944L87922315', 'CAPTURE', 'COMPLETED', 'PHP', 3137.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '82C60244DA173624P', 'COMPLETED', 'PHP', 3137.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:45:47', '2023-10-10 15:45:47', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(19, '7YW12528SV8156202', 'CAPTURE', 'COMPLETED', 'PHP', 3899.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '46V384485W270843G', 'COMPLETED', 'PHP', 3899.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:46:47', '2023-10-10 15:46:47', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(20, '5WT19079J30656040', 'CAPTURE', 'COMPLETED', 'PHP', 1806.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '6HX09392J9250194V', 'COMPLETED', 'PHP', 1806.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:50:12', '2023-10-10 15:50:12', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(21, '8EW79618G24811003', 'CAPTURE', 'COMPLETED', 'PHP', 455.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '14K12013H2881771K', 'COMPLETED', 'PHP', 455.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:52:19', '2023-10-10 15:52:19', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(22, '2BG81773VB499120C', 'CAPTURE', 'COMPLETED', 'PHP', 2964.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0VL223038U082501N', 'COMPLETED', 'PHP', 2964.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:53:04', '2023-10-10 15:53:04', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(23, '4VD09321WK7912205', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '6R474127SS887824B', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:56:18', '2023-10-10 15:56:18', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(24, '2WM85378Y9273940X', 'CAPTURE', 'COMPLETED', 'PHP', 1243.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '82S050260S3981323', 'COMPLETED', 'PHP', 1243.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:56:59', '2023-10-10 15:56:59', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(25, '9U44540048165903K', 'CAPTURE', 'COMPLETED', 'PHP', 3029.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '8P2566484B5744938', 'COMPLETED', 'PHP', 3029.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:57:47', '2023-10-10 15:57:47', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(26, '2TM323053N626240H', 'CAPTURE', 'COMPLETED', 'PHP', 3745.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '1WG94169YA773490F', 'COMPLETED', 'PHP', 3745.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:58:38', '2023-10-10 15:58:38', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(27, '61Y57994DR977681D', 'CAPTURE', 'COMPLETED', 'PHP', 4044.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '3ST19273KB511944L', 'COMPLETED', 'PHP', 4044.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 15:59:40', '2023-10-10 15:59:40', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(28, '52L87503BB6067706', 'CAPTURE', 'COMPLETED', 'PHP', 1085.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '6AL68247KM023645J', 'COMPLETED', 'PHP', 1085.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:02:28', '2023-10-10 16:02:28', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(29, '50V35385CY7061336', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '98859969MF817800A', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:03:44', '2023-10-10 16:03:44', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(30, '5VN90354LJ735452M', 'CAPTURE', 'COMPLETED', 'PHP', 310.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0UU88050GN756981B', 'COMPLETED', 'PHP', 310.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:04:26', '2023-10-10 16:04:26', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(31, '0L771423RJ352171J', 'CAPTURE', 'COMPLETED', 'PHP', 2819.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '1BH481111D8326044', 'COMPLETED', 'PHP', 2819.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:06:09', '2023-10-10 16:06:09', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(32, '4A033607MN1466349', 'CAPTURE', 'COMPLETED', 'PHP', 2178.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '06M31245X00391322', 'COMPLETED', 'PHP', 2178.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:07:34', '2023-10-10 16:07:34', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(33, '0019074920941820T', 'CAPTURE', 'COMPLETED', 'PHP', 2819.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '46N95340TC931235D', 'COMPLETED', 'PHP', 2819.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:11:07', '2023-10-10 16:11:07', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(34, '9RH86877VE124430S', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '14495144G64295004', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:12:34', '2023-10-10 16:12:34', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(35, '2BA89255B5376952R', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '08P13062YM488982B', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:13:23', '2023-10-10 16:13:23', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(36, '68G6887875312963N', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2T768748PE513764D', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:15:44', '2023-10-10 16:15:44', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(37, '5FP82039RT332405G', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '9DB86883EP838824F', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:16:42', '2023-10-10 16:16:42', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(38, '6HT23096BY433532G', 'CAPTURE', 'COMPLETED', 'PHP', 1293.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '7VH6660822992322L', 'COMPLETED', 'PHP', 1293.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:17:17', '2023-10-10 16:17:17', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(39, '1CU97099PE535271C', 'CAPTURE', 'COMPLETED', 'PHP', 165.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '38365990S4507552L', 'COMPLETED', 'PHP', 165.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:32:08', '2023-10-10 16:32:08', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(40, '47L72661VF7519541', 'CAPTURE', 'COMPLETED', 'PHP', 165.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '02327645V1309941R', 'COMPLETED', 'PHP', 165.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:32:29', '2023-10-10 16:32:29', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(41, '5XS04301VD230080B', 'CAPTURE', 'COMPLETED', 'PHP', 165.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '51411517TH976300V', 'COMPLETED', 'PHP', 165.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:34:58', '2023-10-10 16:34:58', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(42, '84M29830R7923662H', 'CAPTURE', 'COMPLETED', 'PHP', 1085.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '12N260876T822984X', 'COMPLETED', 'PHP', 1085.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 16:56:54', '2023-10-10 16:56:54', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(43, '2WY97470MN2606734', 'CAPTURE', 'COMPLETED', 'PHP', 390.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '78107475VL078321R', 'COMPLETED', 'PHP', 390.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 17:24:35', '2023-10-10 17:24:35', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(44, '28C83424CD4271927', 'CAPTURE', 'COMPLETED', 'PHP', 1726.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '8RS14450DS689414G', 'COMPLETED', 'PHP', 1726.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 17:25:16', '2023-10-10 17:25:16', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(45, '8EK11306EW0782640', 'CAPTURE', 'COMPLETED', 'PHP', 310.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0YH19620MY947145G', 'COMPLETED', 'PHP', 310.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 17:38:52', '2023-10-10 17:38:52', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(46, '8N258961BL084532K', 'CAPTURE', 'COMPLETED', 'PHP', 0.74, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2HG41759118627044', 'COMPLETED', 'PHP', 0.74, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 17:39:42', '2023-10-10 17:39:42', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(47, '9SF77879FJ517193T', 'CAPTURE', 'COMPLETED', 'PHP', 2820.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '5HX78573N34457840', 'COMPLETED', 'PHP', 2820.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-10 17:53:33', '2023-10-10 17:53:33', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(48, '4B3008588P242410F', 'CAPTURE', 'COMPLETED', 'PHP', 7079.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '9VC31447YR075823K', 'COMPLETED', 'PHP', 7079.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 02:25:34', '2023-10-11 02:25:34', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(49, '5HU22145DY619500W', 'CAPTURE', 'COMPLETED', 'PHP', 1020.74, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '63F94410W65963206', 'COMPLETED', 'PHP', 1020.74, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 02:53:09', '2023-10-11 02:53:09', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(50, '96G80548V80593116', 'CAPTURE', 'COMPLETED', 'PHP', 2820.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '5CH33912WF769135M', 'COMPLETED', 'PHP', 2820.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 02:54:36', '2023-10-11 02:54:36', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(51, '2ST519846Y7253518', 'CAPTURE', 'COMPLETED', 'PHP', 230.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '8KA350448S913303X', 'COMPLETED', 'PHP', 230.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 02:59:48', '2023-10-11 02:59:48', 'John', 'Doe', 'sb-tzxms27587820@business.example.com', '5HGF7ZREXPDNG', 'US'),
(52, '1WS47672PW213404N', 'CAPTURE', 'COMPLETED', 'PHP', 3.42, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '0TR29335UY6408217', 'COMPLETED', 'PHP', 3.42, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 05:32:05', '2023-10-11 05:32:05', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(53, '9JJ68231EC736405B', 'CAPTURE', 'COMPLETED', 'PHP', 3.42, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '2M622180RA7466640', 'COMPLETED', 'PHP', 3.42, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 05:35:15', '2023-10-11 05:35:15', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(54, '55B63409V2397680S', 'CAPTURE', 'COMPLETED', 'PHP', 2872.20, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '43R59615U25542451', 'COMPLETED', 'PHP', 2872.20, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-11 06:45:08', '2023-10-11 06:45:08', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(55, '6BF87699EP2973230', 'CAPTURE', 'COMPLETED', 'PHP', 230.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '1RN13390KW156792E', 'COMPLETED', 'PHP', 230.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-12 09:50:29', '2023-10-12 09:50:29', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US'),
(56, '1VU449386K345473N', 'CAPTURE', 'COMPLETED', 'PHP', 230.00, 'sb-i4hyn27575086@business.example.com', 'QNTT33YWSCXP4', '7F1170627L1963601', 'COMPLETED', 'PHP', 230.00, 0, 'ELIGIBLE', 'ITEM_NOT_RECEIVED, UNAUTHORIZED_TRANSACTION', '2023-10-12 09:54:12', '2023-10-12 09:54:12', 'Denzel', 'Go', 'sb-ihj6x27602776@personal.example.com', 'S9QZENZKTVY9A', 'US');

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
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province_name`, `region_id`) VALUES
(1, 'Metro Manila', 1),
(2, 'Agusan Del Norte', 2),
(3, 'Agusan Del Sur', 2),
(7, 'Basilan', 2),
(8, 'Bukidnon', 2),
(9, 'Camiguin', 2),
(10, 'Compostela Valley', 2),
(11, 'Cotabato', 2),
(12, 'Davao Del Norte', 2),
(13, 'Davao Del Sur', 2),
(14, 'Davao Oriental', 2),
(15, 'Dinagat Islands', 2),
(16, 'Lanao Del Norte', 2),
(17, 'Lanao Del Sur', 2),
(18, 'Maguindanao', 2),
(19, 'Misamis Occidental', 2),
(20, 'Misamis Oriental', 2),
(21, 'North Cotabato', 2),
(22, 'Sarangani', 2),
(23, 'South Cotabato', 2),
(24, 'Sultan Kudarat', 2),
(25, 'Sulu', 2),
(26, 'Surigao Del Norte', 2),
(27, 'Surigao Del Sur', 2),
(28, 'Tawi-Tawi', 2),
(29, 'Zamboanga Del Norte', 2),
(30, 'Zamboanga Del Sur', 2),
(31, 'Zamboanga Sibugay', 2),
(32, 'Abra', 3),
(33, 'Apayao', 3),
(34, 'Benguet', 3),
(35, 'Cagayan', 3),
(36, 'Ifugao', 3),
(37, 'Ilocos Norte', 3),
(38, 'Ilocos Sur', 3),
(39, 'Isabela', 3),
(40, 'Kalinga', 3),
(41, 'La Union', 3),
(42, 'Nueva Vizcaya', 3),
(43, 'Pangasinan', 3),
(44, 'Quirino', 3),
(45, 'Albay', 4),
(46, 'Batangas', 4),
(47, 'Camarines Norte', 4),
(48, 'Camarines Sur', 4),
(49, 'Catanduanes', 4),
(50, 'Cavite', 4),
(51, 'Laguna', 4),
(52, 'Marinduque', 4),
(53, 'Masbate', 4),
(54, 'Occidental Mindoro', 4),
(55, 'Oriental Mindoro', 4),
(56, 'Palawan', 4),
(57, 'Quezon', 4),
(58, 'Rizal', 4),
(59, 'Romblon', 4),
(60, 'Sorsogon', 4),
(61, 'Aklan', 5),
(62, 'Antique', 5),
(63, 'Biliran', 5),
(64, 'Bohol', 5),
(65, 'Cebu', 5),
(66, 'Eastern Samar', 5),
(67, 'Guimaras', 5),
(68, 'Iloilo', 5),
(69, 'Leyte', 5),
(70, 'Negros Occidental', 5),
(71, 'Negros Oriental', 5),
(72, 'Northern Samar', 5),
(73, 'Samar', 5),
(74, 'Siquijor', 5);

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
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_name`) VALUES
(1, 'Metro Manila'),
(2, 'Mindanao'),
(3, 'North Luzon'),
(4, 'South Luzon'),
(5, 'Visayas');

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
  `ticket_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `denied_approve_game_request_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `user_id`, `game_id`, `is_approved`, `is_denied`, `created_at`, `is_at_cart`, `is_purchased`, `is_accepted`, `is_canceled`, `total_price`, `ticket_price`, `denied_approve_game_request_id`) VALUES
(90, 3, 207, 0, 1, '2023-10-11 05:31:24', 0, 1, 1, 0, 34.20, 3.42, 8),
(91, 3, 207, 1, 0, '2023-10-11 05:34:35', 0, 1, 1, 0, 34.20, 3.42, NULL),
(92, 3, 207, 0, 0, '2023-10-12 14:37:01', 1, 0, 0, 0, 34.20, 3.42, NULL);

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
(14, 97, '8', 'J&T Express', '2023-10-03 15:39:20'),
(15, 121, '90', 'J&T Express', '2023-10-09 06:47:03');

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
  `time_added` datetime DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`tutorial_id`, `tutorial_title`, `tutorial_description`, `tutorial_link`, `is_primary`, `time_added`, `designation`) VALUES
(1, 'How to Create a Game ', 'asdasdasd asdasdasd asdasd asdasd asd asd asd asd asd asd asd asd d as d asd as dasd asdasda sd asd asd asd asd  a  ds asd asd a sd asd aasdasd', 'https://www.youtube-nocookie.com/embed/dSPh9fqZiHc?si=v9Gkjb1kk0JBdr2S', 1, '2023-09-12 21:31:52', 'create_game'),
(2, 'Kisame', 'asdasdads asd as dasd as asd', 'https://www.youtube-nocookie.com/embed/NmFwemHybNE?si=H4IEN0-q4oSaIWgh', 1, '2023-09-22 21:49:30', NULL);

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
(3, 'denzel', 'denzelgo17@gmail.com', '$2y$10$ARZ0Q6SNMcoKJIvaaiGwZeb/T0EtfPk9HMj.XvGnVgdcMYL8ZkwKa', '2023-08-02 09:11:37', 'asd', 'uploads/avatars/6527ba3224590_Screenshot 2023-10-06 194548.png'),
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
(182, 10, 'login', '2023-10-03 13:43:52'),
(183, 3, 'login', '2023-10-05 00:08:44'),
(184, 3, 'login', '2023-10-07 14:59:51'),
(185, 3, 'login', '2023-10-08 08:23:09'),
(186, 3, 'login', '2023-10-09 04:46:20'),
(187, 3, 'login', '2023-10-10 14:33:48'),
(188, 3, 'login', '2023-10-11 02:24:47'),
(189, 3, 'login', '2023-10-11 06:37:04'),
(190, 3, 'login', '2023-10-12 09:19:22'),
(191, 3, 'login', '2023-10-12 09:46:21'),
(192, 3, 'login', '2023-10-12 14:25:33');

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
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `cancel_order_reasons`
--
ALTER TABLE `cancel_order_reasons`
  ADD PRIMARY KEY (`reason_id`);

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `denied_approve_game_requests`
--
ALTER TABLE `denied_approve_game_requests`
  ADD PRIMARY KEY (`denied_approve_game_request_id`);

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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `built_games`
--
ALTER TABLE `built_games`
  MODIFY `built_game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `built_games_added_game_components`
--
ALTER TABLE `built_games_added_game_components`
  MODIFY `added_component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `cancel_order_reasons`
--
ALTER TABLE `cancel_order_reasons`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1096;

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
  MODIFY `constant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `denied_approve_game_requests`
--
ALTER TABLE `denied_approve_game_requests`
  MODIFY `denied_approve_game_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `to_deliver`
--
ALTER TABLE `to_deliver`
  MODIFY `to_deliver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

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
