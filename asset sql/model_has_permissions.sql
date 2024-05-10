-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 12:57 PM
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
-- Database: `cohiva_backup`
--

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(62, 'App\\Models\\User', 42),
(63, 'App\\Models\\User', 42),
(64, 'App\\Models\\User', 42),
(65, 'App\\Models\\User', 42),
(66, 'App\\Models\\User', 42),
(67, 'App\\Models\\User', 42),
(68, 'App\\Models\\User', 42),
(69, 'App\\Models\\User', 42),
(70, 'App\\Models\\User', 42),
(71, 'App\\Models\\User', 42),
(72, 'App\\Models\\User', 42),
(72, 'App\\Models\\User', 43),
(73, 'App\\Models\\User', 42),
(73, 'App\\Models\\User', 43),
(74, 'App\\Models\\User', 42),
(74, 'App\\Models\\User', 43),
(75, 'App\\Models\\User', 42),
(75, 'App\\Models\\User', 43),
(76, 'App\\Models\\User', 42),
(76, 'App\\Models\\User', 43),
(77, 'App\\Models\\User', 42),
(77, 'App\\Models\\User', 43),
(78, 'App\\Models\\User', 42),
(78, 'App\\Models\\User', 43),
(79, 'App\\Models\\User', 42),
(79, 'App\\Models\\User', 43),
(80, 'App\\Models\\User', 42),
(80, 'App\\Models\\User', 43),
(81, 'App\\Models\\User', 42),
(81, 'App\\Models\\User', 43),
(82, 'App\\Models\\User', 42),
(82, 'App\\Models\\User', 43),
(83, 'App\\Models\\User', 42),
(84, 'App\\Models\\User', 42),
(85, 'App\\Models\\User', 42),
(86, 'App\\Models\\User', 42),
(87, 'App\\Models\\User', 42),
(88, 'App\\Models\\User', 42),
(89, 'App\\Models\\User', 42),
(90, 'App\\Models\\User', 42),
(91, 'App\\Models\\User', 42),
(92, 'App\\Models\\User', 42),
(93, 'App\\Models\\User', 42),
(94, 'App\\Models\\User', 42),
(95, 'App\\Models\\User', 42),
(96, 'App\\Models\\User', 42),
(97, 'App\\Models\\User', 42),
(97, 'App\\Models\\User', 44),
(98, 'App\\Models\\User', 42),
(98, 'App\\Models\\User', 44),
(99, 'App\\Models\\User', 42),
(99, 'App\\Models\\User', 44),
(100, 'App\\Models\\User', 42),
(100, 'App\\Models\\User', 44),
(101, 'App\\Models\\User', 42),
(101, 'App\\Models\\User', 44),
(102, 'App\\Models\\User', 42),
(102, 'App\\Models\\User', 44),
(103, 'App\\Models\\User', 42),
(103, 'App\\Models\\User', 44),
(104, 'App\\Models\\User', 42),
(104, 'App\\Models\\User', 44),
(105, 'App\\Models\\User', 42),
(105, 'App\\Models\\User', 43),
(106, 'App\\Models\\User', 42),
(106, 'App\\Models\\User', 43),
(107, 'App\\Models\\User', 42),
(107, 'App\\Models\\User', 43),
(108, 'App\\Models\\User', 42),
(108, 'App\\Models\\User', 43),
(109, 'App\\Models\\User', 42),
(109, 'App\\Models\\User', 43),
(110, 'App\\Models\\User', 42),
(110, 'App\\Models\\User', 43),
(111, 'App\\Models\\User', 42),
(111, 'App\\Models\\User', 43),
(112, 'App\\Models\\User', 42),
(112, 'App\\Models\\User', 43),
(113, 'App\\Models\\User', 42),
(114, 'App\\Models\\User', 42),
(115, 'App\\Models\\User', 42),
(116, 'App\\Models\\User', 42),
(117, 'App\\Models\\User', 42),
(118, 'App\\Models\\User', 42),
(119, 'App\\Models\\User', 42),
(120, 'App\\Models\\User', 42),
(121, 'App\\Models\\User', 42),
(122, 'App\\Models\\User', 42),
(123, 'App\\Models\\User', 44);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
