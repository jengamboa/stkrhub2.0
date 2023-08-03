-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 06:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cemetery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `deceased_tbl`
--

CREATE TABLE `deceased_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(25) NOT NULL,
  `born_date` date NOT NULL,
  `death_date` date NOT NULL,
  `customer_id` varchar(150) NOT NULL,
  `lot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deceased_tbl`
--

INSERT INTO `deceased_tbl` (`id`, `name`, `gender`, `age`, `born_date`, `death_date`, `customer_id`, `lot_id`) VALUES
(5, 'jelly', 'Male', 18, '2023-05-03', '2023-05-03', '', 0),
(7, 'Mary Jane Lastimosa', 'Male', 18, '2023-05-03', '2023-05-09', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lot`
--

CREATE TABLE `lot` (
  `id` int(11) NOT NULL,
  `letter` varchar(25) NOT NULL,
  `number` int(25) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lot`
--

INSERT INTO `lot` (`id`, `letter`, `number`, `status`, `user_id`) VALUES
(1, 'A', 1, 'available', NULL),
(2, 'A', 2, 'available', NULL),
(3, 'A', 3, 'available', NULL),
(4, 'A', 4, 'available', NULL),
(5, 'A', 5, 'available', NULL),
(6, 'A', 6, 'available', NULL),
(7, 'A', 7, 'available', NULL),
(8, 'A', 8, 'available', NULL),
(9, 'A', 9, 'available', NULL),
(10, 'B', 10, 'available', NULL),
(11, 'A', 11, 'available', NULL),
(12, 'A', 12, 'available', NULL),
(13, 'A', 13, 'available', NULL),
(14, 'A', 14, 'available', NULL),
(15, 'A', 15, 'available', NULL),
(16, 'A', 16, 'available', NULL),
(17, 'A', 17, 'available', NULL),
(18, 'A', 18, 'available', NULL),
(19, 'A', 19, 'available', NULL),
(20, 'A', 20, 'available', NULL),
(21, 'A', 21, 'available', NULL),
(22, 'A', 22, 'available', NULL),
(23, 'A', 23, 'available', NULL),
(24, 'A', 24, 'available', NULL),
(25, 'A', 25, 'available', NULL),
(26, 'A', 26, 'available', NULL),
(27, 'A', 27, 'available', NULL),
(28, 'A', 28, 'available', NULL),
(29, 'A', 29, 'available', NULL),
(30, 'A', 30, 'available', NULL),
(31, 'A', 31, 'available', NULL),
(32, 'A', 32, 'available', NULL),
(33, 'A', 33, 'available', NULL),
(34, 'A', 34, 'available', NULL),
(35, 'A', 35, 'available', NULL),
(36, 'B', 36, 'available', NULL),
(37, 'B', 37, 'available', NULL),
(38, 'B', 38, 'available', NULL),
(39, 'B', 39, 'available', NULL),
(40, 'B', 40, 'available', NULL),
(41, 'B', 41, 'available', NULL),
(42, 'B', 42, 'available', NULL),
(43, 'B', 43, 'available', NULL),
(44, 'B', 44, 'available', NULL),
(45, 'B', 45, 'available', NULL),
(46, 'B', 46, 'available', NULL),
(47, 'B', 47, 'available', NULL),
(48, 'B', 48, 'available', NULL),
(49, 'B', 49, 'available', NULL),
(50, 'B', 50, 'available', NULL),
(51, 'B', 51, 'available', NULL),
(52, 'B', 52, 'available', NULL),
(53, 'B', 53, 'available', NULL),
(54, 'B', 54, 'available', NULL),
(55, 'B', 55, 'available', NULL),
(56, 'B', 56, 'available', NULL),
(57, 'B', 57, 'available', NULL),
(58, 'B', 58, 'available', NULL),
(59, 'B', 59, 'available', NULL),
(60, 'B', 60, 'available', NULL),
(61, 'B', 61, 'available', NULL),
(62, 'B', 62, 'available', NULL),
(63, 'B', 63, 'available', NULL),
(64, 'C', 64, 'available', NULL),
(65, 'C', 65, 'available', NULL),
(66, 'C', 66, 'available', NULL),
(67, 'C', 67, 'available', NULL),
(68, 'C', 68, 'available', NULL),
(69, 'C', 69, 'available', NULL),
(70, 'C', 70, 'available', NULL),
(71, 'C', 71, 'available', NULL),
(72, 'C', 72, 'available', NULL),
(73, 'C', 73, 'available', NULL),
(74, 'C', 74, 'available', NULL),
(75, 'C', 75, 'available', NULL),
(76, 'C', 76, 'available', NULL),
(77, 'C', 77, 'occupied', 49),
(78, 'C', 78, 'available', NULL),
(79, 'C', 79, 'available', NULL),
(80, 'C', 80, 'available', NULL),
(81, 'C', 81, 'available', NULL),
(82, 'C', 82, 'available', NULL),
(83, 'C', 83, 'available', NULL),
(84, 'C', 84, 'available', NULL),
(85, 'D', 85, 'available', NULL),
(86, 'D', 86, 'available', NULL),
(87, 'D', 87, 'available', NULL),
(88, 'D', 88, 'available', NULL),
(89, 'D', 89, 'available', NULL),
(90, 'D', 90, 'available', NULL),
(91, 'D', 91, 'available', NULL),
(92, 'D', 92, 'available', NULL),
(93, 'D', 93, 'available', NULL),
(94, 'D', 94, 'available', NULL),
(95, 'D', 95, 'available', NULL),
(96, 'D', 96, 'available', NULL),
(97, 'D', 97, 'available', NULL),
(98, 'D', 98, 'available', NULL),
(99, 'D', 99, 'available', NULL),
(100, 'D', 100, 'available', NULL),
(101, 'D', 101, 'available', NULL),
(102, 'D', 102, 'available', NULL),
(103, 'D', 103, 'available', NULL),
(104, 'D', 104, 'available', NULL),
(105, 'D', 105, 'available', NULL),
(106, 'E', 106, 'available', NULL),
(107, 'E', 107, 'available', NULL),
(108, 'E', 108, 'available', NULL),
(109, 'E', 109, 'available', NULL),
(110, 'E', 110, 'available', NULL),
(111, 'E', 111, 'available', NULL),
(112, 'E', 112, 'available', NULL),
(113, 'E', 113, 'available', NULL),
(114, 'E', 114, 'available', NULL),
(115, 'E', 115, 'available', NULL),
(116, 'E', 116, 'available', NULL),
(117, 'E', 117, 'available', NULL),
(118, 'E', 118, 'available', NULL),
(119, 'E', 119, 'available', NULL),
(120, 'E', 120, 'available', NULL),
(121, 'E', 121, 'available', NULL),
(122, 'E', 122, 'available', NULL),
(123, 'E', 123, 'available', NULL),
(124, 'E', 124, 'available', NULL),
(125, 'E', 125, 'available', NULL),
(126, 'E', 126, 'available', NULL),
(127, 'E', 127, 'available', NULL),
(128, 'E', 128, 'available', NULL),
(129, 'E', 129, 'available', NULL),
(130, 'E', 130, 'available', NULL),
(131, 'E', 131, 'available', NULL),
(132, 'E', 132, 'available', NULL),
(133, 'E', 133, 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `image` blob NOT NULL,
  `date_paid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `schedule_date` date NOT NULL,
  `paid_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`, `subject`, `message`, `amount`, `image`, `date_paid`, `schedule_date`, `paid_by`) VALUES
(2, 'fullPayment', 'ediwow', 'bayad po', '2500.00', 0x62617961642e706e67, '2023-06-01 10:17:06', '2023-06-15', 'jerim'),
(3, 'fullPayment', 'bayad', 'bayad ko', '1500000.00', 0x6b61702e6a7067, '2023-06-01 22:30:53', '2023-06-21', 'noel_b'),
(4, 'fullPayment', 'bayd ni lebron', 'bayd ko poaaaa', '157797.00', 0x6b61702e6a7067, '2023-06-01 22:33:53', '2023-06-14', 'lebron'),
(5, 'fullPayment', 'bayad po', 'awdfawdasdad', '2500.00', 0x6b61702e6a7067, '2023-06-01 22:36:19', '2023-06-27', 'lebron');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'client'),
(2, 'administrator'),
(3, 'systemadministrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(25) NOT NULL,
  `lot_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `birth_date`, `phone_number`, `user_name`, `email`, `password`, `role`, `lot_id`) VALUES
(21, 'admin', 'admin', '0000-00-00', '0998776567', 'admin', 'admin1234@gmail.com', '$2y$10$Jgp/JjJ8XZ3Pu.IAx9YNbO6fbzEqfSlpOad5rVT43eBQmX03jY47G', 'administrator', NULL),
(24, 'system', 'admin', '0000-00-00', '0983490379023', 'system_admin', 'system_admin@gmail.com', '$2y$10$aClhJeTIu.8Yu4EZ1by1/uKIPwbPziwiIIWe3/zzQGxuLPuKpOqNW', 'systemadministrator', NULL),
(30, 'admin', 'system', '0000-00-00', '09875421', 'adminsystem', 'adminsystem@gmail.com', '$2y$10$QgbyLiJzvyOZfsDlqgd9Qep.7d5wOwPCU.KfF2wB1JOMv4d4THFjq', 'systemadministrator', NULL),
(49, 'Jerrick James', 'Decena', '2001-10-21', '09496062793', 'jerim', 'jerrickjamesdecena@gmail.com', '$2y$10$rmNmuD8dbjBz.jMv3Cp2Qu6eSLZb6D6EmwcfjUsyygE5RoH16yUUu', '', 77);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 25000.00,
  `status` varchar(150) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `payment` int(11) NOT NULL DEFAULT 0,
  `payment_status` varchar(50) NOT NULL DEFAULT 'pending',
  `lot_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `number` varchar(150) NOT NULL,
  `interested_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `lot_block` varchar(20) NOT NULL,
  `lot_number` int(20) NOT NULL,
  `lot_owner` varchar(150) NOT NULL,
  `service_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `name`, `gender`, `age`, `contact_number`, `lot_block`, `lot_number`, `lot_owner`, `service_id`) VALUES
(11, 'ediwow', 'female', 0, '09638352271', 'M', 12, 'jerrick', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deceased_tbl`
--
ALTER TABLE `deceased_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_ibfk_1` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_users_ibfk_1` (`lot_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_ibfk_1` (`lot_id`),
  ADD KEY `transaction_ibfk_2` (`user_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deceased_tbl`
--
ALTER TABLE `deceased_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lot`
--
ALTER TABLE `lot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lot`
--
ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`lot_id`) REFERENCES `lot` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
