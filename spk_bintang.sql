-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2022 at 08:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_bintang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahp`
--

CREATE TABLE `ahp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria1_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria2_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ahp`
--

INSERT INTO `ahp` (`id`, `kriteria1_id`, `kriteria2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 6, 6, '1', '2022-01-06 03:17:23', '2022-01-06 03:17:23'),
(2, 7, 7, '1', '2022-01-06 03:17:54', '2022-01-06 03:17:54'),
(3, 8, 8, '1', '2022-01-06 03:18:03', '2022-01-06 03:18:03'),
(4, 9, 9, '1', '2022-01-06 03:18:12', '2022-01-06 03:18:12'),
(5, 6, 7, '2', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(6, 7, 6, '0.5', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(7, 8, 6, '0.5', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(8, 6, 8, '2', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(9, 9, 6, '0.333', '2022-01-07 02:36:01', '2022-01-07 05:53:04'),
(10, 6, 9, '3', '2022-01-07 02:36:01', '2022-01-07 05:53:04'),
(11, 7, 8, '1', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(12, 8, 7, '1', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(13, 9, 7, '0.5', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(14, 7, 9, '2', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(15, 9, 8, '1', '2022-01-07 02:36:01', '2022-01-07 03:44:46'),
(16, 8, 9, '1', '2022-01-07 02:36:01', '2022-01-07 03:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `menu_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 7, 1, '2022-01-05 21:44:34', '2022-01-05 21:44:34'),
(4, 1, 3, '2022-01-05 21:44:38', '2022-01-05 21:44:38'),
(5, 7, 3, '2022-01-05 21:44:39', '2022-01-05 21:44:39'),
(6, 14, 3, '2022-01-08 23:14:38', '2022-01-08 23:14:38'),
(7, 17, 3, '2022-01-08 23:14:39', '2022-01-08 23:14:39'),
(8, 14, 1, '2022-01-08 23:14:43', '2022-01-08 23:14:43'),
(9, 17, 1, '2022-01-08 23:14:43', '2022-01-08 23:14:43'),
(10, 1, 1, '2022-01-08 23:14:55', '2022-01-08 23:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `label`, `alternatif`, `created_at`, `updated_at`) VALUES
(1, 'Alt. 1', 'Alt. 1', '2022-01-05 23:00:09', '2022-01-05 23:01:19'),
(2, 'Alt. 2', 'Alt. 2', '2022-01-05 23:00:15', '2022-01-05 23:00:15'),
(3, 'Alt. 3', 'Alt. 3', '2022-01-05 23:00:27', '2022-01-05 23:00:27'),
(4, 'Alt. 4', 'Alt. 4', '2022-01-05 23:00:33', '2022-01-05 23:00:33'),
(5, 'Alt. 5', 'Alt. 5', '2022-01-05 23:00:41', '2022-01-05 23:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `label`, `kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(6, 'C1', 'Kondisi Lahan', '0.4254', '2022-01-06 03:17:23', '2022-01-08 22:13:40'),
(7, 'C2', 'Sarana', '0.2306', '2022-01-06 03:17:54', '2022-01-08 22:13:40'),
(8, 'C3', 'Sosial Ekonomi', '0.1949', '2022-01-06 03:18:03', '2022-01-08 22:13:40'),
(9, 'C4', 'Ketersediaan', '0.1492', '2022-01-06 03:18:12', '2022-01-08 22:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  `id_parent` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `icon`, `urutan`, `id_parent`, `created_at`, `updated_at`) VALUES
(1, 'Admin Menu', NULL, 'fas fa-user', 1, 0, '2022-01-03 16:06:54', '2022-01-03 16:06:54'),
(2, 'Manajemen Role', 'role', NULL, 1, 1, NULL, NULL),
(3, 'Manajemen Pengguna', 'user', NULL, 2, 1, NULL, NULL),
(4, 'Manajemen Menu', 'menu', NULL, 3, 1, NULL, NULL),
(5, 'Manajemen Akses', 'akses', NULL, 4, 1, NULL, NULL),
(7, 'SPK Menu', NULL, 'fas fa-code', 2, 0, '2022-01-05 19:45:51', '2022-01-05 19:45:51'),
(9, 'Kriteria', 'kriteria', NULL, 1, 7, '2022-01-05 19:50:44', '2022-01-05 22:06:20'),
(10, 'Alternatif', 'alternatif', NULL, 2, 7, '2022-01-05 21:56:27', '2022-01-05 22:06:47'),
(11, 'Perhitungan AHP', 'ahp', NULL, 3, 7, '2022-01-05 23:21:13', '2022-01-05 23:21:13'),
(12, 'Nilai Alternatif', 'nilai', NULL, 4, 7, '2022-01-07 13:21:30', '2022-01-07 13:21:30'),
(13, 'Perangkingan', 'rangking', NULL, 5, 7, '2022-01-08 18:52:28', '2022-01-08 18:52:28'),
(14, 'Informasi Aplikasi', NULL, 'fas fa-home', 3, 0, '2022-01-08 23:11:47', '2022-01-08 23:11:47'),
(15, 'User Manual', 'manual', NULL, 1, 14, '2022-01-08 23:12:05', '2022-01-08 23:12:05'),
(16, 'Profil Aplikasi', 'profil', NULL, 2, 14, '2022-01-08 23:12:20', '2022-01-08 23:12:20'),
(17, 'Cetak Laporan', 'cetak', 'fas fa-print', 4, 0, '2022-01-08 23:12:48', '2022-01-08 23:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_01_02_153650_create_roles_table', 1),
(4, '2022_01_03_000000_create_users_table', 1),
(5, '2022_01_03_155056_create_menus_table', 1),
(6, '2022_01_03_161003_create_akses_menus_table', 1),
(7, '2022_01_06_060033_create_kriterias_table', 2),
(8, '2022_01_06_064838_create_alternatifs_table', 3),
(9, '2022_01_06_070838_create_ahps_table', 4),
(10, '2022_01_07_213723_create_nilai_alternatifs_table', 5),
(11, '2022_01_08_015402_create_perbandingan_alternatifs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `alternatif_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 9, NULL, NULL),
(2, 1, 7, 8, NULL, NULL),
(3, 1, 8, 8, NULL, NULL),
(4, 1, 9, 8, NULL, NULL),
(5, 2, 6, 8, NULL, NULL),
(6, 2, 7, 8, NULL, NULL),
(7, 2, 8, 7, NULL, NULL),
(8, 2, 9, 8, NULL, NULL),
(9, 3, 6, 7, NULL, NULL),
(10, 3, 7, 7, NULL, NULL),
(11, 3, 8, 9, NULL, NULL),
(12, 3, 9, 7, NULL, NULL),
(13, 4, 6, 9, NULL, NULL),
(14, 4, 7, 8, NULL, NULL),
(15, 4, 8, 7, NULL, NULL),
(16, 4, 9, 7, NULL, NULL),
(17, 5, 6, 8, NULL, NULL),
(18, 5, 7, 7, NULL, NULL),
(19, 5, 8, 7, NULL, NULL),
(20, 5, 9, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_alternatif`
--

CREATE TABLE `perbandingan_alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif1_id` bigint(20) UNSIGNED NOT NULL,
  `alternatif2_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbandingan_alternatif`
--

INSERT INTO `perbandingan_alternatif` (`id`, `alternatif1_id`, `alternatif2_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:41:28'),
(2, 2, 1, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:41:28'),
(3, 1, 3, 6, '3', '2022-01-08 01:40:55', '2022-01-08 01:41:28'),
(4, 3, 1, 6, '0.3333', '2022-01-08 01:40:55', '2022-01-08 17:58:20'),
(5, 1, 4, 6, '1', '2022-01-08 01:40:55', '2022-01-08 01:40:55'),
(6, 4, 1, 6, '1', '2022-01-08 01:40:55', '2022-01-08 01:40:55'),
(7, 1, 5, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:41:28'),
(8, 5, 1, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:41:28'),
(9, 2, 3, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:45:59'),
(10, 3, 2, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:45:59'),
(11, 2, 4, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:45:59'),
(12, 4, 2, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:45:59'),
(13, 2, 5, 6, '1', '2022-01-08 01:40:55', '2022-01-08 01:40:55'),
(14, 5, 2, 6, '1', '2022-01-08 01:40:55', '2022-01-08 01:40:55'),
(15, 3, 4, 6, '0.3333', '2022-01-08 01:40:55', '2022-01-08 17:58:20'),
(16, 4, 3, 6, '3', '2022-01-08 01:40:55', '2022-01-08 01:46:31'),
(17, 3, 5, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:46:31'),
(18, 5, 3, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:46:31'),
(19, 4, 5, 6, '2', '2022-01-08 01:40:55', '2022-01-08 01:46:41'),
(20, 5, 4, 6, '0.5', '2022-01-08 01:40:55', '2022-01-08 01:46:41'),
(21, 1, 2, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(22, 2, 1, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(23, 1, 3, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(24, 3, 1, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(25, 1, 4, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(26, 4, 1, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(27, 1, 5, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(28, 5, 1, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(29, 2, 3, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(30, 3, 2, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(31, 2, 4, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(32, 4, 2, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(33, 2, 5, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(34, 5, 2, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(35, 4, 3, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(36, 3, 4, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(37, 3, 5, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(38, 5, 3, 7, '1', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(39, 4, 5, 7, '2', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(40, 5, 4, 7, '0.5', '2022-01-08 18:40:35', '2022-01-08 18:40:35'),
(41, 1, 2, 8, '2', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(42, 2, 1, 8, '0.5', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(43, 3, 1, 8, '2', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(44, 1, 3, 8, '0.5', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(45, 1, 4, 8, '2', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(46, 4, 1, 8, '0.5', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(47, 1, 5, 8, '2', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(48, 5, 1, 8, '0.5', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(49, 3, 2, 8, '3', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(50, 2, 3, 8, '0.3333', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(51, 2, 4, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(52, 4, 2, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(53, 2, 5, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(54, 5, 2, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(55, 3, 4, 8, '3', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(56, 4, 3, 8, '0.3333', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(57, 3, 5, 8, '3', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(58, 5, 3, 8, '0.3333', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(59, 4, 5, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(60, 5, 4, 8, '1', '2022-01-08 18:43:36', '2022-01-08 18:43:36'),
(61, 1, 2, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(62, 2, 1, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(63, 1, 3, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(64, 3, 1, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(65, 1, 4, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(66, 4, 1, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(67, 1, 5, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(68, 5, 1, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(69, 2, 3, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(70, 3, 2, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(71, 2, 4, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(72, 4, 2, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(73, 2, 5, 9, '2', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(74, 5, 2, 9, '0.5', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(75, 3, 4, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(76, 4, 3, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(77, 3, 5, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(78, 5, 3, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(79, 4, 5, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31'),
(80, 5, 4, 9, '1', '2022-01-08 18:44:31', '2022-01-08 18:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `can_add` tinyint(1) NOT NULL DEFAULT 1,
  `can_edit` tinyint(1) NOT NULL DEFAULT 1,
  `can_delete` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `can_add`, `can_edit`, `can_delete`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 1, 1, '2022-01-03 16:06:54', '2022-01-08 22:10:36'),
(3, 'Developer', 1, 1, 1, '2022-01-04 04:27:18', '2022-01-04 05:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', '$2y$10$9NHsZ3V19dymlh4eUM.c5OJAYym73Tmrh68AGu5ouLP5.7VSBzOLW', 1, NULL, '2022-01-03 16:06:54', '2022-01-03 16:06:54'),
(3, 3, 'Developer', '$2y$10$AlqDDKSr6oBdk2O5uQEzSuPOmz.G/yXvPZpE/27GBPBWJM9/VZ1Si', 1, NULL, '2022-01-08 23:15:24', '2022-01-08 23:15:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahp`
--
ALTER TABLE `ahp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ahp_kriteria1_id_foreign` (`kriteria1_id`),
  ADD KEY `ahp_kriteria2_id_foreign` (`kriteria2_id`);

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akses_menu_menu_id_foreign` (`menu_id`),
  ADD KEY `akses_menu_role_id_foreign` (`role_id`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_title_unique` (`title`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_alternatif_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `nilai_alternatif_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_alternatif_alternatif1_id_foreign` (`alternatif1_id`),
  ADD KEY `perbandingan_alternatif_alternatif2_id_foreign` (`alternatif2_id`),
  ADD KEY `perbandingan_alternatif_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_role_unique` (`role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD KEY `user_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahp`
--
ALTER TABLE `ahp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ahp`
--
ALTER TABLE `ahp`
  ADD CONSTRAINT `ahp_kriteria1_id_foreign` FOREIGN KEY (`kriteria1_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ahp_kriteria2_id_foreign` FOREIGN KEY (`kriteria2_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD CONSTRAINT `akses_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akses_menu_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_alternatif_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perbandingan_alternatif`
--
ALTER TABLE `perbandingan_alternatif`
  ADD CONSTRAINT `perbandingan_alternatif_alternatif1_id_foreign` FOREIGN KEY (`alternatif1_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbandingan_alternatif_alternatif2_id_foreign` FOREIGN KEY (`alternatif2_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perbandingan_alternatif_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
