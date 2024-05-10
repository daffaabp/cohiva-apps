-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 10:31 AM
-- Server version: 10.11.5-MariaDB-log
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cohiva5_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_konselor`
--

CREATE TABLE `jadwal_konselor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_konselor` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_konselor`
--

INSERT INTO `jadwal_konselor` (`id`, `id_konselor`, `hari`, `jam`, `status`, `created_at`, `updated_at`) VALUES
(12, 13073, 'Senin', '10:00:00', '1', '2024-05-07 11:26:41', '2024-05-07 11:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `janji_konseling`
--

CREATE TABLE `janji_konseling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwalkonselor` bigint(20) UNSIGNED NOT NULL,
  `nama_konselor` varchar(50) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam` time NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `status_janji` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_janji_konseling` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `janji_konseling`
--

INSERT INTO `janji_konseling` (`id`, `id_jadwalkonselor`, `nama_konselor`, `hari`, `jam`, `id_pasien`, `status_janji`, `created_at`, `updated_at`, `tgl_janji_konseling`) VALUES
(24, 12, 'Dr. Ersa Mahera Rinatri', 'Senin', '10:00:00', 6, 'DIJADWALKAN', '2024-05-07 11:26:58', '2024-05-07 11:26:58', '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `konseling`
--

CREATE TABLE `konseling` (
  `id_konseling` int(11) NOT NULL,
  `tgl_konseling` date NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_konselor` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_pasien` varchar(30) NOT NULL,
  `keluhan` longtext NOT NULL,
  `penilaian` varchar(10) NOT NULL,
  `jenis_konseling` varchar(255) NOT NULL,
  `status_konseling` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konselor`
--

CREATE TABLE `konselor` (
  `id_konselor` int(11) NOT NULL,
  `nama_konselor` varchar(50) NOT NULL,
  `notelpon_konselor` varchar(15) DEFAULT NULL,
  `unit_kerja` varchar(50) DEFAULT NULL,
  `foto_konselor` varchar(50) DEFAULT NULL,
  `is_aktif` int(1) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konselor`
--

INSERT INTO `konselor` (`id_konselor`, `nama_konselor`, `notelpon_konselor`, `unit_kerja`, `foto_konselor`, `is_aktif`, `id_user`) VALUES
(13073, 'Dr. Ersa Mahera Rinatri', '081225001283', 'Universiras Al Irsyad Cilacap', NULL, 1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_29_074158_create_permission_tables', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2024_04_03_014500_tambah_kolom_table_pasien', 4),
(8, '2024_04_03_021902_create_table_jadwal_konseling', 5),
(9, '2024_04_03_100730_janji_konseling', 6),
(10, '2024_04_03_122027_tambah_kolom_tgl_janji', 7),
(11, '2024_04_16_044831_add_column_untuk_jadwal_konselor', 8),
(12, '2024_04_18_130553_add_colum_for_konseling', 9),
(13, '2024_04_18_233927_change_column_tgl_konseling', 10),
(14, '2024_04_14_150833_modify_users_table', 11),
(15, '2024_04_21_062910_add_column_iduser_in_konselor', 12);

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
(122, 'App\\Models\\User', 42);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 42),
(8, 'App\\Models\\User', 43),
(9, 'App\\Models\\User', 44);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `alamat_pasien` text DEFAULT NULL,
  `notelpon_pasien` varchar(15) DEFAULT NULL,
  `id_user` bigint(11) NOT NULL,
  `jk_pasien` enum('L','P') NOT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `berat_badan` varchar(10) DEFAULT NULL,
  `tinggi_badan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `notelpon_pasien`, `id_user`, `jk_pasien`, `usia`, `berat_badan`, `tinggi_badan`) VALUES
(6, 'Rafaela', 'Banjarnegara', '081222555666', 1, 'L', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(62, 'home_new', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(63, 'roles.get-permissions', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(64, 'roles.refresh-delete-permissions', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(65, 'roles.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(66, 'roles.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(67, 'roles.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(68, 'roles.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(69, 'roles.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(70, 'roles.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(71, 'roles.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(72, 'konselors.createuser', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(73, 'konselors.storeusers', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(74, 'konselors.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(75, 'konselors.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(76, 'konselors.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(77, 'konselors.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(78, 'konselors.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(79, 'konselors.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(80, 'konselors.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(81, 'konselors.showResetPasswordForm', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(82, 'konselors.updatePassword', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(83, 'pasiens.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(84, 'pasiens.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(85, 'pasiens.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(86, 'pasiens.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(87, 'pasiens.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(88, 'pasiens.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(89, 'pasiens.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(90, 'users.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(91, 'users.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(92, 'users.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(93, 'users.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(94, 'users.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(95, 'users.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(96, 'users.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(97, 'jadwal-konselors.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(98, 'jadwal-konselors.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(99, 'jadwal-konselors.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(100, 'jadwal-konselors.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(101, 'jadwal-konselors.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(102, 'jadwal-konselors.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(103, 'jadwal-konselors.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(104, 'getjadwal', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(105, 'janji-konselings.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(106, 'janji-konselings.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(107, 'janji-konselings.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(108, 'janji-konselings.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(109, 'janji-konselings.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(110, 'janji-konselings.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(111, 'janji-konseling.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(112, 'janjikonseling.pilihkonselor', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(113, 'konselings.index', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(114, 'konselings.create', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(115, 'konselings.store', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(116, 'konselings.show', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(117, 'konselings.edit', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(118, 'konselings.update', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(119, 'konselings.destroy', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(120, 'info_hiv', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(121, 'daftar_konselor', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15'),
(122, 'jadwalkan_konseling', 'web', '2024-05-07 11:18:15', '2024-05-07 11:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(7, 'Superadmin', 'web', '2024-05-07 11:21:34', '2024-05-07 11:21:34'),
(8, 'Admin', 'web', '2024-05-07 11:22:07', '2024-05-07 11:22:07'),
(9, 'Konselor', 'web', '2024-05-07 11:23:04', '2024-05-07 11:23:04'),
(10, 'Pasien', 'web', '2024-05-07 11:23:15', '2024-05-07 11:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(62, 7),
(63, 7),
(64, 7),
(65, 7),
(66, 7),
(67, 7),
(68, 7),
(69, 7),
(70, 7),
(71, 7),
(72, 7),
(72, 8),
(73, 7),
(73, 8),
(74, 7),
(74, 8),
(75, 7),
(75, 8),
(76, 7),
(76, 8),
(77, 7),
(77, 8),
(78, 7),
(78, 8),
(79, 7),
(79, 8),
(80, 7),
(80, 8),
(81, 7),
(81, 8),
(82, 7),
(82, 8),
(83, 7),
(84, 7),
(85, 7),
(86, 7),
(87, 7),
(88, 7),
(89, 7),
(90, 7),
(91, 7),
(92, 7),
(93, 7),
(94, 7),
(95, 7),
(96, 7),
(97, 7),
(97, 9),
(98, 7),
(98, 9),
(99, 7),
(99, 9),
(100, 7),
(100, 9),
(101, 7),
(101, 9),
(102, 7),
(102, 9),
(103, 7),
(103, 9),
(104, 7),
(104, 9),
(105, 7),
(105, 8),
(106, 7),
(106, 8),
(107, 7),
(107, 8),
(108, 7),
(108, 8),
(109, 7),
(109, 8),
(110, 7),
(110, 8),
(111, 7),
(111, 8),
(112, 7),
(112, 8),
(113, 7),
(114, 7),
(115, 7),
(116, 7),
(117, 7),
(118, 7),
(119, 7),
(120, 7),
(120, 10),
(121, 7),
(121, 10),
(122, 7),
(122, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `isPasien` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `isPasien`) VALUES
(2, 'Daffa Budi Prasetya', 'daffa.budi2003@gmail.com', '2024-04-14 08:11:13', '$2y$10$evMLZdvLJaxXi6i4.TRQHeyQkuCxs88kUQUEKQsbUyHZili7.CyVC', NULL, '2024-04-14 08:10:57', '2024-04-14 08:11:13', 'daffaabp', 1),
(42, 'Gilang Dely Mukti', 'gilang@gmail.com', NULL, '$2y$10$U5MhcWWbuNcLgQcfooAHfeF8UHuXXu.zkUoJjWiltdkgDjS8HZDgK', NULL, '2024-05-07 11:24:48', '2024-05-07 11:24:48', 'gilang', 0),
(43, 'Dwi Maryanti', 'dwimaryanti@gmail.com', NULL, '$2y$10$ylattCOBn4utdS6cqOf.y.NgY/tHp07RAB/RlphwE5bWhjLoN9c3O', NULL, '2024-05-07 11:25:10', '2024-05-07 11:25:10', 'dwimaryanti', 0),
(44, 'Ersa Mahera Rinatri', 'ersa@gmail.com', NULL, '$2y$10$rxNQqptPaU/8.uvYMmN1NOF.mqppyyc9ivW0tyA/0Gl2Rigk/y8YW', NULL, '2024-05-07 11:25:43', '2024-05-07 11:25:43', 'echamhr', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`) USING BTREE;

--
-- Indexes for table `jadwal_konselor`
--
ALTER TABLE `jadwal_konselor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_konselor` (`id_konselor`);

--
-- Indexes for table `janji_konseling`
--
ALTER TABLE `janji_konseling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `janji_konseling_id_jadwalkonselor_foreign` (`id_jadwalkonselor`),
  ADD KEY `janji_konseling_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`id_konseling`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_konselor` (`id_konselor`);

--
-- Indexes for table `konselor`
--
ALTER TABLE `konselor`
  ADD PRIMARY KEY (`id_konselor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`) USING BTREE;

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`) USING BTREE,
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`) USING BTREE;

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`) USING BTREE;

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_konselor`
--
ALTER TABLE `jadwal_konselor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `janji_konseling`
--
ALTER TABLE `janji_konseling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id_konseling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_konselor`
--
ALTER TABLE `jadwal_konselor`
  ADD CONSTRAINT `jadwal_konselor_ibfk_1` FOREIGN KEY (`id_konselor`) REFERENCES `konselor` (`id_konselor`) ON UPDATE CASCADE;

--
-- Constraints for table `janji_konseling`
--
ALTER TABLE `janji_konseling`
  ADD CONSTRAINT `janji_konseling_id_jadwalkonselor_foreign` FOREIGN KEY (`id_jadwalkonselor`) REFERENCES `jadwal_konselor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `janji_konseling_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE;

--
-- Constraints for table `konseling`
--
ALTER TABLE `konseling`
  ADD CONSTRAINT `konseling_ibfk_1` FOREIGN KEY (`id_konselor`) REFERENCES `konselor` (`id_konselor`);

--
-- Constraints for table `konselor`
--
ALTER TABLE `konselor`
  ADD CONSTRAINT `konselor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
