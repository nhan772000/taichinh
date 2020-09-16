-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2020 at 03:54 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taichinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SupperAdmin', 'admin@gmail.com', '$2y$10$q3UFgqoa.mt5Yx1dVEBT.ee6CZkLk7p7U4Y.kbYQh6PLJ/mxgenJm', '100', 'S5lelwVnqEi8i5HZZKr77EE1jKEIweuKX3NBIfnS0vTFe3T71c5r25aGzl0T', '2016-12-05 00:38:38', '2020-07-30 00:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `eco_wallet`
--

CREATE TABLE `eco_wallet` (
  `eco_wallet_id` int(9) UNSIGNED NOT NULL,
  `eco_wallet_point` double NOT NULL DEFAULT '0',
  `eco_wallet_rate` int(10) NOT NULL DEFAULT '1',
  `eco_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eco_wallet`
--

INSERT INTO `eco_wallet` (`eco_wallet_id`, `eco_wallet_point`, `eco_wallet_rate`, `eco_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 12050, 1, 3, '2020-09-10 04:25:06', '2020-09-10 04:25:06'),
(4, 6081.3, 1, 4, '2020-09-10 04:25:06', '2020-09-14 17:29:34'),
(8, 0, 1, 7, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(9, 0, 1, 8, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(10, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 4000, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(12, 41000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:36:18'),
(13, 0, 1, 12, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(14, 0, 1, 13, '2020-09-13 15:49:59', '2020-09-13 15:49:59'),
(15, 0, 1, 14, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `ext_wallet`
--

CREATE TABLE `ext_wallet` (
  `ext_wallet_id` int(9) UNSIGNED NOT NULL,
  `ext_wallet_point` double NOT NULL DEFAULT '0',
  `ext_wallet_rate` int(10) NOT NULL DEFAULT '1',
  `ext_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ext_wallet`
--

INSERT INTO `ext_wallet` (`ext_wallet_id`, `ext_wallet_point`, `ext_wallet_rate`, `ext_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 200, 1, 3, '2020-09-10 04:30:37', '2020-09-10 04:30:37'),
(4, 850, 1, 4, '2020-09-10 04:30:37', '2020-09-10 04:30:37'),
(8, 0, 1, 7, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(9, 0, 1, 8, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(10, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 3000, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(12, 40000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(13, 0, 1, 12, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(14, 0, 1, 13, '2020-09-13 15:49:59', '2020-09-13 15:49:59'),
(15, 0, 1, 14, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `hm_wallet`
--

CREATE TABLE `hm_wallet` (
  `hm_wallet_id` int(9) UNSIGNED NOT NULL,
  `hm_wallet_point` double NOT NULL DEFAULT '0',
  `hm_wallet_rate` int(10) NOT NULL DEFAULT '1',
  `hm_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hm_wallet`
--

INSERT INTO `hm_wallet` (`hm_wallet_id`, `hm_wallet_point`, `hm_wallet_rate`, `hm_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 20800, 1, 3, '2020-09-10 04:31:09', '2020-09-10 04:31:09'),
(4, 86900, 1, 4, '2020-09-10 04:31:09', '2020-09-10 04:31:09'),
(8, 0, 1, 8, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(9, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(10, 0, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(11, 2000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(12, 0, 1, 12, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(13, 0, 1, 13, '2020-09-13 15:49:59', '2020-09-13 15:49:59'),
(14, 0, 1, 14, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `main_wallet_id` int(9) UNSIGNED NOT NULL,
  `main_wallet_point` double NOT NULL DEFAULT '0',
  `main_wallet_rate` int(10) NOT NULL DEFAULT '1',
  `main_wallet_ofuser` int(9) UNSIGNED NOT NULL COMMENT 'user of id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_wallet`
--

INSERT INTO `main_wallet` (`main_wallet_id`, `main_wallet_point`, `main_wallet_rate`, `main_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(2, 1000, 1, 2, '2020-09-10 04:15:31', '2020-09-10 04:15:31'),
(3, 20000, 1, 3, '2020-09-10 04:24:13', '2020-09-10 04:24:13'),
(4, 39777, 1, 4, '2020-09-10 04:24:13', '2020-09-15 00:35:51'),
(5, 40000, 1, 5, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(6, 40000, 1, 6, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(7, 40000, 1, 7, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(8, 40000, 1, 8, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(9, 40000, 1, 9, '2020-09-12 21:33:01', '2020-09-12 21:41:29'),
(10, 40000, 1, 10, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(11, 40000, 1, 11, '2020-09-13 15:49:59', '2020-09-13 15:49:59'),
(12, 0, 1, 12, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `setting_hoanve`
--

CREATE TABLE `setting_hoanve` (
  `setting_hoanve_id` int(9) UNSIGNED NOT NULL,
  `setting_hoanve_status` tinyint(1) NOT NULL,
  `setting_hoanve_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_info_nap`
--

CREATE TABLE `setting_info_nap` (
  `id` int(11) NOT NULL,
  `type_currency` int(5) NOT NULL,
  `holder_name` varchar(500) NOT NULL,
  `code_bank` varchar(5) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `card_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_info_nap`
--

INSERT INTO `setting_info_nap` (`id`, `type_currency`, `holder_name`, `code_bank`, `bank_name`, `card_number`) VALUES
(1, 0, 'Nguyễn Chính Hưng', 'AGR', 'Agribank - Ngân hàng nông nghiệp và phát triển nông thôn', '5023123123123'),
(2, 1, '', 'MEW', 'myetherwallet', 'KASDABASDASDKA12312JKASKDAS'),
(3, 0, 'Bùi Thế Vũ', 'VCB', 'VCB-VietComBank Ngân hàng ngoại thương', '123123123123123'),
(4, 0, 'Nguyễn Phan Quốc Thịnh', 'VP', 'VP - Ngân hàng gì đó', '12312312312321');

-- --------------------------------------------------------

--
-- Table structure for table `setting_mlm`
--

CREATE TABLE `setting_mlm` (
  `setting_mlm_id` int(9) UNSIGNED NOT NULL,
  `F1` double NOT NULL DEFAULT '3',
  `F2` double NOT NULL DEFAULT '0.5',
  `F3` double NOT NULL DEFAULT '0.5',
  `F4` double NOT NULL DEFAULT '0.5',
  `F5` double NOT NULL DEFAULT '0.5',
  `F6` double NOT NULL DEFAULT '0.2',
  `F7` double NOT NULL DEFAULT '0.2',
  `F8` double NOT NULL DEFAULT '0.2',
  `F9` double NOT NULL DEFAULT '0.2',
  `F10` double NOT NULL DEFAULT '0.2',
  `F11` double NOT NULL DEFAULT '0.2',
  `F12` double NOT NULL DEFAULT '0.2',
  `F13` double NOT NULL DEFAULT '0.2',
  `F14` double NOT NULL DEFAULT '0.2',
  `F15` double NOT NULL DEFAULT '0.2',
  `F16` double NOT NULL DEFAULT '0.1',
  `F17` double NOT NULL DEFAULT '0.1',
  `F18` double NOT NULL DEFAULT '0.1',
  `F19` double NOT NULL DEFAULT '0.1',
  `F20` double NOT NULL DEFAULT '0.1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_naprut`
--

CREATE TABLE `setting_naprut` (
  `setting_naprut_id` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `setting_naprut_phi` double NOT NULL DEFAULT '0.1',
  `setting_naprut_toithieu` double NOT NULL DEFAULT '0',
  `setting_naprut_hm0` int(11) NOT NULL,
  `setting_naprut_hm2` int(11) NOT NULL,
  `setting_naprut_hm4` int(11) NOT NULL,
  `setting_naprut_hm5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_rate`
--

CREATE TABLE `setting_rate` (
  `setting_rate_id` int(9) UNSIGNED NOT NULL,
  `setting_rate_vichinh` double NOT NULL DEFAULT '0',
  `setting_rate_vitietkiem` double NOT NULL DEFAULT '0',
  `setting_rate_phigd` double NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_rate_currency`
--

CREATE TABLE `setting_rate_currency` (
  `id` int(1) NOT NULL,
  `currency_name` varchar(10) NOT NULL,
  `rate_currency` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting_rate_currency`
--

INSERT INTO `setting_rate_currency` (`id`, `currency_name`, `rate_currency`, `created_at`, `updated_at`) VALUES
(1, 'VND', 100, '2020-09-13 11:40:57', '0000-00-00 00:00:00'),
(2, 'USDT', 2, '2020-09-13 13:53:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting_tanghm`
--

CREATE TABLE `setting_tanghm` (
  `setting_tanghm_id` int(9) UNSIGNED NOT NULL,
  `setting_tanghm_rate` double NOT NULL DEFAULT '0.1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_transfer_point`
--

CREATE TABLE `setting_transfer_point` (
  `setting_id` int(9) UNSIGNED NOT NULL,
  `setting_type` tinyint(4) NOT NULL DEFAULT '0',
  `setting_ofuser` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_transfer_point`
--

INSERT INTO `setting_transfer_point` (`setting_id`, `setting_type`, `setting_ofuser`, `created_at`, `updated_at`) VALUES
(1, 0, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(2, 0, 12, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(3, 0, 13, '2020-09-13 15:49:59', '2020-09-13 15:49:59'),
(4, 0, 14, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) UNSIGNED NOT NULL,
  `transaction_typecurrency` varchar(255) DEFAULT NULL,
  `transaction_fromuser` int(9) UNSIGNED DEFAULT NULL,
  `transaction_touser` int(9) UNSIGNED DEFAULT NULL,
  `transaction_checker` varchar(20) DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_typeorder` tinyint(1) NOT NULL,
  `transaction_point` int(20) NOT NULL,
  `transaction_rate` int(10) NOT NULL,
  `transaction_status` int(2) NOT NULL,
  `transaction_bill` varchar(255) DEFAULT 'identy_default.png',
  `transaction_bill2` varchar(255) DEFAULT 'identy_default.png',
  `transaction_description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_typecurrency`, `transaction_fromuser`, `transaction_touser`, `transaction_checker`, `transaction_date`, `transaction_typeorder`, `transaction_point`, `transaction_rate`, `transaction_status`, `transaction_bill`, `transaction_bill2`, `transaction_description`, `created_at`, `updated_at`) VALUES
(56, '1', 4, 3, '1', '2020-09-09 11:31:48', 2, 120, 1, 1, 'identy_default.png', 'identy_default.png', NULL, '2020-09-10 04:32:59', '2020-09-10 04:32:59'),
(58, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 123, 0, 1, NULL, 'identy_default.png', 'Transfer tru tien vi chinh', '2020-09-10 02:37:17', '2020-09-10 02:37:17'),
(59, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 369, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-10 02:37:18', '2020-09-10 02:37:18'),
(60, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 100, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-10 02:47:35', '2020-09-10 02:47:35'),
(61, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 300, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-10 02:47:35', '2020-09-10 02:47:35'),
(62, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 100, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-10 02:54:34', '2020-09-10 02:54:34'),
(63, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 300, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-10 02:54:34', '2020-09-10 02:54:34'),
(64, NULL, 4, 0, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, '', '2020-09-10 05:25:10', '2020-09-11 01:08:41'),
(66, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-10 22:00:34', '2020-09-10 22:00:34'),
(67, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-10 22:00:34', '2020-09-10 22:00:34'),
(68, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, -1000, 0, 1, NULL, NULL, NULL, '2020-09-11 01:12:12', '2020-09-12 21:42:45'),
(69, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 200000000, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-11 01:16:15', '2020-09-11 01:16:15'),
(70, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-11 01:16:15', '2020-09-11 01:16:15'),
(71, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 123, 0, 2, NULL, NULL, NULL, '2020-09-11 03:11:14', '2020-09-12 21:41:38'),
(72, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 1, NULL, NULL, NULL, '2020-09-11 03:24:28', '2020-09-12 21:41:37'),
(73, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 2, NULL, NULL, NULL, '2020-09-11 03:42:51', '2020-09-12 21:41:36'),
(74, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 1, NULL, NULL, NULL, '2020-09-11 04:07:58', '2020-09-12 21:41:36'),
(75, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 2, NULL, NULL, NULL, '2020-09-11 04:13:12', '2020-09-12 21:41:35'),
(76, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 200, 0, 2, NULL, NULL, NULL, '2020-09-12 12:56:22', '2020-09-12 21:41:34'),
(77, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 200, 0, 1, NULL, NULL, NULL, '2020-09-12 13:22:30', '2020-09-12 21:41:33'),
(78, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 100, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-12 13:47:44', '2020-09-12 13:47:44'),
(79, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 300, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-12 13:47:44', '2020-09-12 13:47:44'),
(80, '0', 11, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, NULL, '2020-09-12 21:36:09', '2020-09-12 21:41:29'),
(81, NULL, 11, 11, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-12 21:36:18', '2020-09-12 21:36:18'),
(82, NULL, 11, 11, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-12 21:36:18', '2020-09-12 21:36:18'),
(83, '0', NULL, 4, '1', '0000-00-00 00:00:00', 1, 123, 0, 1, 'uploads/imgChuyenKhoan/haiphong.jpg', NULL, 'mevivu nạp 12300 VNĐ ngày: 14/9/2020. Bạn vui lòng up biên lai lên và xác nhận.', '2020-09-14 14:26:29', '2020-09-14 14:26:45'),
(84, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 1, NULL, NULL, NULL, '2020-09-14 14:28:51', '2020-09-14 14:29:11'),
(85, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 100, 0, 1, NULL, NULL, NULL, '2020-09-14 14:29:03', '2020-09-14 14:29:11'),
(86, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, NULL, '2020-09-14 14:55:32', '2020-09-14 14:56:18'),
(87, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, NULL, '2020-09-14 14:55:41', '2020-09-14 14:56:12'),
(88, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, NULL, '2020-09-14 15:13:23', '2020-09-14 15:13:43'),
(89, '1', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 1, NULL, NULL, NULL, '2020-09-14 15:13:34', '2020-09-14 15:13:43'),
(90, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 2, NULL, NULL, NULL, '2020-09-14 15:17:29', '2020-09-14 15:17:56'),
(91, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 2, NULL, NULL, NULL, '2020-09-14 15:17:39', '2020-09-14 15:17:56'),
(92, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 1000, 0, 2, NULL, NULL, NULL, '2020-09-14 15:19:26', '2020-09-14 15:19:42'),
(93, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 121, 0, 2, NULL, NULL, NULL, '2020-09-14 15:19:34', '2020-09-14 15:19:42'),
(94, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 999, 0, 2, NULL, NULL, NULL, '2020-09-14 15:23:46', '2020-09-14 15:23:56'),
(95, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 999, 0, 2, NULL, NULL, NULL, '2020-09-14 15:29:13', '2020-09-14 15:29:22'),
(96, '0', 4, NULL, '1', '0000-00-00 00:00:00', 0, 999, 0, 1, NULL, NULL, NULL, '2020-09-14 15:30:50', '2020-09-14 15:40:08'),
(97, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 100, 0, 1, NULL, NULL, 'Transfer tru tien vi chinh', '2020-09-14 17:29:34', '2020-09-14 17:29:34'),
(98, NULL, 4, 4, '0', '0000-00-00 00:00:00', 6, 300, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-14 17:29:34', '2020-09-14 17:29:34'),
(99, '-1', 4, NULL, '1', '0000-00-00 00:00:00', 0, 123, 0, 1, NULL, NULL, NULL, '2020-09-15 00:35:08', '2020-09-15 00:35:51'),
(100, '0', 4, NULL, NULL, '0000-00-00 00:00:00', 0, 123, 0, 0, NULL, NULL, NULL, '2020-09-15 01:03:45', '2020-09-15 01:03:45'),
(101, '0', 4, NULL, NULL, '0000-00-00 00:00:00', 0, 132, 0, 0, NULL, NULL, NULL, '2020-09-15 01:14:48', '2020-09-15 01:14:48'),
(102, '0', 4, NULL, NULL, '0000-00-00 00:00:00', 0, 123, 0, 0, NULL, NULL, 'mevivu', '2020-09-15 01:17:37', '2020-09-15 01:17:37'),
(103, '0', 4, NULL, NULL, '0000-00-00 00:00:00', 0, 123, 0, 0, NULL, NULL, 'mevivu', '2020-09-15 01:29:05', '2020-09-15 01:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_current_address` text,
  `user_password_pay` varchar(255) NOT NULL,
  `user_level` int(2) NOT NULL DEFAULT '0',
  `user_phone` varchar(255) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_type` tinyint(1) NOT NULL,
  `user_introduction` int(9) NOT NULL,
  `user_ownerbank` varchar(255) DEFAULT NULL,
  `user_numbank` varchar(255) DEFAULT NULL,
  `user_bankname` varchar(255) DEFAULT NULL,
  `user_nation` varchar(50) DEFAULT NULL,
  `user_description` varchar(255) DEFAULT NULL,
  `user_name_identity` varchar(255) DEFAULT NULL,
  `user_number_identity` varchar(255) DEFAULT NULL,
  `user_identity_image` varchar(255) DEFAULT 'identy_default.png',
  `user_address_USDT` text,
  `user_address_image` varchar(255) DEFAULT 'identy_default.png',
  `user_name_GPKD` varchar(255) DEFAULT NULL,
  `user_MST` varchar(255) DEFAULT NULL,
  `user_GPKD_image` varchar(255) DEFAULT 'identy_default.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `transfer_status` int(1) NOT NULL,
  `pttt_status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified`, `password`, `user_current_address`, `user_password_pay`, `user_level`, `user_phone`, `user_status`, `user_type`, `user_introduction`, `user_ownerbank`, `user_numbank`, `user_bankname`, `user_nation`, `user_description`, `user_name_identity`, `user_number_identity`, `user_identity_image`, `user_address_USDT`, `user_address_image`, `user_name_GPKD`, `user_MST`, `user_GPKD_image`, `remember_token`, `transfer_status`, `pttt_status`, `created_at`, `updated_at`) VALUES
(1, 'Lhson', 'phucnhan', 'phucnhan@gmail.com', NULL, '$2y$10$TEY9mtHYRJ4G9oW.6n9D9.5.eHfae7I1po7iNVE8cNMsEORxtzv0m', NULL, '', 1, '868896944', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', 'jFFpU4F9xl8TLtjS6DPBiI8qWugcLLXQWMtRSWx9UtBoB3TrjGpx66X8xMMh', 0, 0, '2020-09-09 09:46:02', '2020-09-09 09:46:02'),
(2, 'viet', 'viethoang', 'viet@test.com', NULL, '$2y$10$l1kbe4s6eABtFVZqe5UpIese0vCemAMafuRjEPBanY8VIhZJgMUU2', NULL, '', 1, '868896944', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', NULL, 0, 0, '2020-09-09 09:47:52', '2020-09-09 09:47:52'),
(3, 'phucnhan', 'phucnhan', 'nhan772000@gmail.com', NULL, '$2y$10$Ao0RzcipMZF2goZxbEsUGelvsEgH20dTZA07Wupel.hM4M7qfwrh2', NULL, '', 1, '707070444', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '3V1xAL8xD9vnF95d9s3T6Oop5swTxStdOlTWOvw544L3UR2vG3JTLawkLW9D', 0, 0, '2020-09-09 09:49:09', '2020-09-09 09:49:09'),
(4, 'mevivu', 'mevivu', 'mevivu@gmail.com', 'nc.hung0806@gmail.com', '$2y$10$yjcpYfnb.F92O5IHyxS7vu6fJ9otj5HzJykj.c8/OENYpkw.3tOai', '954 Quang Trung, Phường 8, Gò Vấp, TP.HCM, Việt Nam.', '25d55ad283aa400af464c76d713c07ad', 0, '123456789', 0, 0, 0, 'Truong', '123456789', 'VietComBank', 'VN', NULL, '21563214276', '12346', 'identy_default.png', '124', 'identy_default.png', 'abc', '123125412', 'identy_default.png', 'GQOUrBp4JSWbI8M1zb5HRJlmRDpv9W0KBIIJXEQNWIzUyt5eUPHmnXEZhjG0', 1, 0, '2020-09-09 03:42:20', '2020-09-14 17:29:34'),
(5, 'riddler', 'riddler', 'riddler@gmail.com', NULL, '$2y$10$PnE5T/DxUaUHWaCZDatcuu8554xSizXm5/vxJUp0qV7W15bP2X2rC', NULL, '$2y$10$eON.MSEsOK8VO4.PLJn4Teb69rRGJySaik6tzKA8F66gSiTVqnw0W', 0, '0123987789', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1221:00:276103543251738558188', 0, 0, '2020-09-12 14:00:27', '2020-09-12 14:00:27'),
(6, 'riddler123', 'Darkder', 'riddler21@gmail.com', NULL, '$2y$10$dUev2OfTxQ0BZuBOoZSgkOtx1AxxQeQrJTzR31I74522BSgKKH2kC', NULL, '$2y$10$f9n7EPrjviaW1BsB2CROM.HQs4YFeUqwwX6mXzY4aPMabxnVIUBsK', 0, '0123333789', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1221:06:49998486465809026369', 0, 0, '2020-09-12 14:06:49', '2020-09-12 14:06:49'),
(7, 'thinh', 'thinh01165', 'thinh0914@gmail.com', NULL, '$2y$10$NzlMEAq3iUf6D5u1m6p3KujzZiw51pCpGF7aHmY4uZJfut2RLVy3G', NULL, '$2y$10$TaGK7mc2LxJBQHZKbaoqG.LFyYHS1uHL85lhc/xVuWvxGhrMcLCdm', 0, '0123522777', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1303:58:2514803205641887833493', 0, 0, '2020-09-12 20:58:25', '2020-09-12 20:58:25'),
(8, 'daddy', 'daddy', 'thinh123@gmail.com', NULL, '$2y$10$AwtBRUjv7AdgXhqTYj8CKeyTzk04Ri2o41kah38GmPq9A3VVDbw3S', NULL, '$2y$10$ZLZT3KuBQG0TbgiehNCrSuJEJwkJzlOTfYnQeLs8MlUM.5hURtfwm', 0, '0917888999', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:03:3119644289361547838465', 0, 0, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(9, 'thinh123456', 'thinh nguyen', 'abcdefgh@gmail.com', NULL, '$2y$10$1YCTWWAo9FyQnWCI1gwuIuRO0nud1g2eExOr1LTFm91U.t6j0Z4eC', NULL, '$2y$10$pTpqXL/JcwyOCp2Z1irVQuUr.fe.EI7yuZxVC2frbuvtODrqBfHgC', 0, '0123477577', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:26:109631774681934721008', 0, 0, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 'rip123', 'riddler abc', 'abcrep@gmail.com', NULL, '$2y$10$9zoP62GSQXBZSExhCfN67OQ/brmUgnz5xyQTaddbmqIQw2Xyd70/G', NULL, '$2y$10$5ViwRk.I32UNvCUiHKe0PebkTDxwDd58KUyNvZRfBecD/U3BcaOie', 0, '0144446789', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:33:012122142083745306620', 1, 0, '2020-09-12 21:33:01', '2020-09-12 21:36:18'),
(12, 'truonghh', 'Truong', 'abczzz@gmail.com', NULL, '$2y$10$SggZb0BKXELIojE52xpGxusxNkuchQeVHJTv4Viu1WCICD9WwBwYG', NULL, '$2y$10$fu8vPpBLaq23it0CUIoQweQUMmsXtCW7LVH2ZAPqO2cPkjxkdXAdG', 0, '0123522798', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1311:19:156075699351798492808', 0, 0, '2020-09-13 15:19:16', '2020-09-13 15:19:16'),
(13, 'mevivu123', 'Trần văn Trường', 'tranvantruongtvtpro123@gmail.com', NULL, '$2y$10$cVo2r8RPg/CYXVfUOGv.duE1Vm9CrX8zczx/9pdSSchZ1nrOSh9jO', NULL, '$2y$10$4tFnlcCDf1sVtmt6Y9gKGu1CXu6SlnE.wKzmJJFMFtY/nrmXiuhJi', 0, '0342909557', 0, 0, 4, 'Trần văn trường', '123456789', 'Agrilbank', 'VN', NULL, 'Hxhhd', '6468464', '13564262572.png', 'Bxjjd hxjjsbd', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1311:49:582691688931574556294', 0, 0, '2020-09-13 15:49:59', '2020-09-13 15:56:04'),
(14, '009', 'Huan', 'abcd@gmail.com', NULL, '$2y$10$VGiiEgUcwFnqNdQ8w4xw8.dz.3hsB9bYMp5E/IMFEVoY1ANGhFusy', NULL, '$2y$10$phRJO8Kv3watby3uh9NgeOjzDBqvNV9EsZjJkY1WeUAq2Wu36HSla', 0, '09784656459', 0, 0, 4, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', NULL, 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1312:02:324796062441866893714', 0, 0, '2020-09-13 16:02:32', '2020-09-13 16:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `wallet_history_id` int(9) UNSIGNED NOT NULL,
  `wallet_history_typeorder` int(5) NOT NULL,
  `wallet_history_type` tinyint(1) DEFAULT NULL,
  `wallet_history_typewallet` int(50) NOT NULL,
  `wallet_history_ofwallet` int(9) DEFAULT NULL,
  `wallet_history_point` double DEFAULT NULL,
  `wallet_history_fromuser` int(9) UNSIGNED NOT NULL,
  `wallet_history_touser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`wallet_history_id`, `wallet_history_typeorder`, `wallet_history_type`, `wallet_history_typewallet`, `wallet_history_ofwallet`, `wallet_history_point`, `wallet_history_fromuser`, `wallet_history_touser`, `created_at`, `updated_at`) VALUES
(1, 6, 0, 0, 4, 100, 4, 4, '2020-09-10 02:47:36', '2020-09-10 02:47:36'),
(2, 6, 1, 2, 4, 300, 4, 4, '2020-09-10 02:47:36', '2020-09-10 02:47:36'),
(3, 6, 0, 0, 4, 100, 4, 4, '2020-09-10 02:54:34', '2020-09-10 02:54:34'),
(4, 6, 1, 2, 4, 300, 4, 4, '2020-09-10 02:54:34', '2020-09-10 02:54:34'),
(5, 6, 0, 0, 4, 1000, 4, 4, '2020-09-10 22:00:34', '2020-09-10 22:00:34'),
(6, 6, 1, 2, 4, 1000, 4, 4, '2020-09-10 22:00:34', '2020-09-10 22:00:34'),
(7, 0, 0, 0, 4, 1000, 4, 4, '2020-09-11 01:08:41', '2020-09-11 01:08:41'),
(8, 6, 0, 0, 4, 200000000, 4, 4, '2020-09-11 01:16:15', '2020-09-11 01:16:15'),
(9, 6, 1, 2, 4, 1000, 4, 4, '2020-09-11 01:16:15', '2020-09-11 01:16:15'),
(10, 6, 0, 0, 4, 100, 4, 4, '2020-09-12 13:47:44', '2020-09-12 13:47:44'),
(11, 6, 1, 2, 4, 300, 4, 4, '2020-09-12 13:47:44', '2020-09-12 13:47:44'),
(12, 6, 0, 0, 12, 1000, 11, 11, '2020-09-12 21:36:18', '2020-09-12 21:36:18'),
(13, 6, 1, 2, 12, 1000, 11, 11, '2020-09-12 21:36:18', '2020-09-12 21:36:18'),
(14, 0, 0, 0, 12, 1000, 11, 11, '2020-09-12 21:41:29', '2020-09-12 21:41:29'),
(15, 0, 0, 0, 4, 200, 4, 4, '2020-09-12 21:41:33', '2020-09-12 21:41:33'),
(16, 0, 0, 0, 4, 100, 4, 4, '2020-09-12 21:41:36', '2020-09-12 21:41:36'),
(17, 0, 0, 0, 4, 100, 4, 4, '2020-09-12 21:41:37', '2020-09-12 21:41:37'),
(18, 0, 0, 0, 4, -1000, 4, 4, '2020-09-12 21:42:45', '2020-09-12 21:42:45'),
(19, 1, 1, 0, 4, 110.7, 4, 4, '2020-09-14 14:26:45', '2020-09-14 14:26:45'),
(20, 1, 1, 2, 4, 12.3, 4, 4, '2020-09-14 14:26:45', '2020-09-14 14:26:45'),
(21, 0, 0, 0, 4, 100, 4, 4, '2020-09-14 14:29:11', '2020-09-14 14:29:11'),
(22, 0, 0, 0, 4, 100, 4, 4, '2020-09-14 14:29:11', '2020-09-14 14:29:11'),
(23, 0, 0, 0, 4, 1000, 4, 4, '2020-09-14 14:56:13', '2020-09-14 14:56:13'),
(24, 0, 0, 0, 4, 1000, 4, 4, '2020-09-14 14:56:18', '2020-09-14 14:56:18'),
(25, 0, 0, 0, 4, 1000, 4, 4, '2020-09-14 15:13:43', '2020-09-14 15:13:43'),
(26, 0, 0, 0, 4, 1000, 4, 4, '2020-09-14 15:13:43', '2020-09-14 15:13:43'),
(27, 0, 0, 0, 4, 999, 4, 4, '2020-09-14 15:40:08', '2020-09-14 15:40:08'),
(28, 6, 0, 0, 4, 100, 4, 4, '2020-09-14 17:29:34', '2020-09-14 17:29:34'),
(29, 6, 1, 2, 4, 300, 4, 4, '2020-09-14 17:29:34', '2020-09-14 17:29:34'),
(30, 0, 0, 0, 4, 123, 4, 4, '2020-09-15 00:35:51', '2020-09-15 00:35:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD PRIMARY KEY (`eco_wallet_id`);

--
-- Indexes for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD PRIMARY KEY (`ext_wallet_id`);

--
-- Indexes for table `hm_wallet`
--
ALTER TABLE `hm_wallet`
  ADD PRIMARY KEY (`hm_wallet_id`);

--
-- Indexes for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD PRIMARY KEY (`main_wallet_id`);

--
-- Indexes for table `setting_hoanve`
--
ALTER TABLE `setting_hoanve`
  ADD PRIMARY KEY (`setting_hoanve_id`);

--
-- Indexes for table `setting_info_nap`
--
ALTER TABLE `setting_info_nap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_bank` (`code_bank`);

--
-- Indexes for table `setting_mlm`
--
ALTER TABLE `setting_mlm`
  ADD PRIMARY KEY (`setting_mlm_id`);

--
-- Indexes for table `setting_naprut`
--
ALTER TABLE `setting_naprut`
  ADD PRIMARY KEY (`setting_naprut_id`);

--
-- Indexes for table `setting_rate`
--
ALTER TABLE `setting_rate`
  ADD PRIMARY KEY (`setting_rate_id`);

--
-- Indexes for table `setting_rate_currency`
--
ALTER TABLE `setting_rate_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  ADD PRIMARY KEY (`setting_tanghm_id`);

--
-- Indexes for table `setting_transfer_point`
--
ALTER TABLE `setting_transfer_point`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`wallet_history_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eco_wallet`
--
ALTER TABLE `eco_wallet`
  MODIFY `eco_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  MODIFY `ext_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hm_wallet`
--
ALTER TABLE `hm_wallet`
  MODIFY `hm_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `main_wallet`
--
ALTER TABLE `main_wallet`
  MODIFY `main_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `setting_hoanve`
--
ALTER TABLE `setting_hoanve`
  MODIFY `setting_hoanve_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_info_nap`
--
ALTER TABLE `setting_info_nap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting_mlm`
--
ALTER TABLE `setting_mlm`
  MODIFY `setting_mlm_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_naprut`
--
ALTER TABLE `setting_naprut`
  MODIFY `setting_naprut_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_rate`
--
ALTER TABLE `setting_rate`
  MODIFY `setting_rate_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_rate_currency`
--
ALTER TABLE `setting_rate_currency`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  MODIFY `setting_tanghm_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_transfer_point`
--
ALTER TABLE `setting_transfer_point`
  MODIFY `setting_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_history_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
