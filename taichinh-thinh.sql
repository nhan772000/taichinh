-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 16, 2020 lúc 06:46 PM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `taichinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_users`
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
-- Đang đổ dữ liệu cho bảng `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SupperAdmin', 'admin@gmail.com', '$2y$10$q3UFgqoa.mt5Yx1dVEBT.ee6CZkLk7p7U4Y.kbYQh6PLJ/mxgenJm', '100', 'S5lelwVnqEi8i5HZZKr77EE1jKEIweuKX3NBIfnS0vTFe3T71c5r25aGzl0T', '2016-12-05 00:38:38', '2020-07-30 00:21:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eco_wallet`
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
-- Đang đổ dữ liệu cho bảng `eco_wallet`
--

INSERT INTO `eco_wallet` (`eco_wallet_id`, `eco_wallet_point`, `eco_wallet_rate`, `eco_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 12050, 1, 3, '2020-09-10 04:25:06', '2020-09-10 04:25:06'),
(4, 5769, 1, 4, '2020-09-10 04:25:06', '2020-09-12 13:47:44'),
(8, 0, 1, 7, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(9, 62.3, 1, 8, '2020-09-12 21:03:31', '2020-09-16 08:48:44'),
(10, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 4000, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(12, 41000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:36:18'),
(13, 163.8, 1, 12, '2020-09-13 23:26:31', '2020-09-15 22:08:17'),
(14, 34320.9, 1, 13, '2020-09-16 03:40:05', '2020-09-16 08:48:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ext_wallet`
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
-- Đang đổ dữ liệu cho bảng `ext_wallet`
--

INSERT INTO `ext_wallet` (`ext_wallet_id`, `ext_wallet_point`, `ext_wallet_rate`, `ext_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 200, 1, 3, '2020-09-10 04:30:37', '2020-09-10 04:30:37'),
(4, 850, 1, 4, '2020-09-10 04:30:37', '2020-09-10 04:30:37'),
(8, 0, 1, 7, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(9, 0, 1, 8, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(10, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 3000, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(12, 40000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(13, 0, 1, 12, '2020-09-13 23:26:32', '2020-09-13 23:26:32'),
(14, 23430, 1, 13, '2020-09-16 03:40:05', '2020-09-16 03:40:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hm_wallet`
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
-- Đang đổ dữ liệu cho bảng `hm_wallet`
--

INSERT INTO `hm_wallet` (`hm_wallet_id`, `hm_wallet_point`, `hm_wallet_rate`, `hm_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(3, 20800, 1, 3, '2020-09-10 04:31:09', '2020-09-10 04:31:09'),
(4, 900, 1, 4, '2020-09-10 04:31:09', '2020-09-10 04:31:09'),
(8, 560.7, 1, 8, '2020-09-12 21:03:31', '2020-09-16 08:48:44'),
(9, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(10, 0, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(11, 2000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(12, 1454, 1, 12, '2020-09-13 23:26:32', '2020-09-15 22:08:17'),
(13, 34420, 1, 13, '2020-09-16 03:40:05', '2020-09-16 08:48:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `main_wallet`
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
-- Đang đổ dữ liệu cho bảng `main_wallet`
--

INSERT INTO `main_wallet` (`main_wallet_id`, `main_wallet_point`, `main_wallet_rate`, `main_wallet_ofuser`, `created_at`, `updated_at`) VALUES
(2, 1110.7, 1, 2, '2020-09-10 04:15:31', '2020-09-14 01:12:46'),
(3, 20000, 1, 3, '2020-09-10 04:24:13', '2020-09-10 04:24:13'),
(4, 10200, 1, 4, '2020-09-10 04:24:13', '2020-09-12 21:42:45'),
(8, 0, 1, 7, '2020-09-12 20:58:26', '2020-09-12 20:58:26'),
(9, 560.7, 1, 8, '2020-09-12 21:03:31', '2020-09-16 08:48:44'),
(10, 0, 1, 9, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 40000, 1, 10, '2020-09-12 21:28:59', '2020-09-12 21:28:59'),
(12, -1000, 1, 11, '2020-09-12 21:33:01', '2020-09-12 21:41:29'),
(13, 99448.54, 1, 12, '2020-09-13 23:26:31', '2020-09-15 22:08:17'),
(14, 100603.77, 1, 13, '2020-09-16 03:40:05', '2020-09-16 08:48:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_hoanve`
--

CREATE TABLE `setting_hoanve` (
  `setting_hoanve_id` int(9) UNSIGNED NOT NULL,
  `setting_hoanve_status` tinyint(1) NOT NULL,
  `setting_hoanve_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_mlm`
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
-- Cấu trúc bảng cho bảng `setting_naprut`
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
-- Cấu trúc bảng cho bảng `setting_rate`
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
-- Cấu trúc bảng cho bảng `setting_tanghm`
--

CREATE TABLE `setting_tanghm` (
  `setting_tanghm_id` int(9) UNSIGNED NOT NULL,
  `setting_tanghm_rate` double NOT NULL DEFAULT '0.1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_transfer_point`
--

CREATE TABLE `setting_transfer_point` (
  `setting_id` int(9) UNSIGNED NOT NULL,
  `setting_type` tinyint(4) NOT NULL DEFAULT '0',
  `setting_ofuser` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `setting_transfer_point`
--

INSERT INTO `setting_transfer_point` (`setting_id`, `setting_type`, `setting_ofuser`, `created_at`, `updated_at`) VALUES
(1, 0, 11, '2020-09-12 21:33:01', '2020-09-12 21:33:01'),
(2, 0, 12, '2020-09-13 23:26:32', '2020-09-13 23:26:32'),
(3, 0, 13, '2020-09-16 03:40:05', '2020-09-16 03:40:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) UNSIGNED NOT NULL,
  `transaction_typecurrency` varchar(255) DEFAULT NULL,
  `transaction_fromuser` int(9) UNSIGNED NOT NULL,
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
-- Đang đổ dữ liệu cho bảng `transaction`
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
(82, NULL, 11, 11, '0', '0000-00-00 00:00:00', 6, 1000, 0, 1, NULL, NULL, 'Transfer cong tien vi tiet kiem', '2020-09-12 21:36:18', '2020-09-12 21:36:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified` varchar(10) DEFAULT NULL,
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
  `user_identity_image_a` varchar(255) DEFAULT 'identy_default.png',
  `user_identity_image_body` varchar(255) DEFAULT 'identy_default.png',
  `user_address_USDT` text,
  `user_qrcode_image` varchar(255) DEFAULT 'identy_default.png',
  `user_address_image` varchar(255) DEFAULT 'identy_default.png',
  `user_name_GPKD` varchar(255) DEFAULT NULL,
  `user_MST` varchar(255) DEFAULT NULL,
  `user_GPKD_image` varchar(255) DEFAULT 'identy_default.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `transfer_status` int(1) NOT NULL DEFAULT '0',
  `pttt_status` int(1) NOT NULL,
  `user_point_everyday` double DEFAULT '50',
  `user_day_old` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified`, `password`, `user_current_address`, `user_password_pay`, `user_level`, `user_phone`, `user_status`, `user_type`, `user_introduction`, `user_ownerbank`, `user_numbank`, `user_bankname`, `user_nation`, `user_description`, `user_name_identity`, `user_number_identity`, `user_identity_image`, `user_identity_image_a`, `user_identity_image_body`, `user_address_USDT`, `user_qrcode_image`, `user_address_image`, `user_name_GPKD`, `user_MST`, `user_GPKD_image`, `remember_token`, `transfer_status`, `pttt_status`, `user_point_everyday`, `user_day_old`, `created_at`, `updated_at`) VALUES
(1, 'Lhson', 'phucnhan', 'phucnhan@gmail.com', NULL, '$2y$10$TEY9mtHYRJ4G9oW.6n9D9.5.eHfae7I1po7iNVE8cNMsEORxtzv0m', NULL, '', 1, '868896944', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', 'jFFpU4F9xl8TLtjS6DPBiI8qWugcLLXQWMtRSWx9UtBoB3TrjGpx66X8xMMh', 0, 0, 50, NULL, '2020-09-09 09:46:02', '2020-09-09 09:46:02'),
(2, 'viet', 'viethoang', 'viet@test.com', NULL, '$2y$10$l1kbe4s6eABtFVZqe5UpIese0vCemAMafuRjEPBanY8VIhZJgMUU2', NULL, '', 1, '868896944', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', NULL, 0, 0, 50, NULL, '2020-09-09 09:47:52', '2020-09-09 09:47:52'),
(3, 'phucnhan', 'phucnhan', 'nhan772000@gmail.com', NULL, '$2y$10$Ao0RzcipMZF2goZxbEsUGelvsEgH20dTZA07Wupel.hM4M7qfwrh2', NULL, '', 1, '707070444', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '3V1xAL8xD9vnF95d9s3T6Oop5swTxStdOlTWOvw544L3UR2vG3JTLawkLW9D', 0, 0, 50, NULL, '2020-09-09 09:49:09', '2020-09-09 09:49:09'),
(4, 'mevivu', 'mevivu', 'mevivu@gmail.com', NULL, '$2y$10$yjcpYfnb.F92O5IHyxS7vu6fJ9otj5HzJykj.c8/OENYpkw.3tOai', '954 Quang Trung, Phường 8, Gò Vấp, TP.HCM, Việt Nam.', '25d55ad283aa400af464c76d713c07ad', 0, '123456789', 0, 0, 0, 'Truong', '123456789', 'VietComBank', 'VN', NULL, '21563214276', '12346', 'identy_default.png', 'identy_default.png', 'identy_default.png', '124', 'identy_default.png', 'identy_default.png', 'abc', '123125412', 'identy_default.png', '97YqAvtfSfFyctYjxwcvTztwT3uJPvkMXcLbtcR1r7ppd9IAHJ25WpROCUTc', 1, 0, 50, NULL, '2020-09-09 03:42:20', '2020-09-16 03:38:33'),
(5, 'riddler', 'riddler', 'riddler@gmail.com', NULL, '$2y$10$PnE5T/DxUaUHWaCZDatcuu8554xSizXm5/vxJUp0qV7W15bP2X2rC', NULL, '$2y$10$eON.MSEsOK8VO4.PLJn4Teb69rRGJySaik6tzKA8F66gSiTVqnw0W', 0, '0123987789', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1221:00:276103543251738558188', 0, 0, 50, NULL, '2020-09-12 14:00:27', '2020-09-12 14:00:27'),
(6, 'riddler123', 'Darkder', 'riddler21@gmail.com', NULL, '$2y$10$dUev2OfTxQ0BZuBOoZSgkOtx1AxxQeQrJTzR31I74522BSgKKH2kC', NULL, '$2y$10$f9n7EPrjviaW1BsB2CROM.HQs4YFeUqwwX6mXzY4aPMabxnVIUBsK', 0, '0123333789', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '5ldCSOLDXvnvSqh4urbfyisEcNcerpA7qtwfvDpgfrTDQOn5NiIcdYp1J5GB', 0, 0, 50, NULL, '2020-09-12 14:06:49', '2020-09-13 23:24:57'),
(7, 'thinh', 'thinh01165', 'thinh0914@gmail.com', NULL, '$2y$10$NzlMEAq3iUf6D5u1m6p3KujzZiw51pCpGF7aHmY4uZJfut2RLVy3G', NULL, '$2y$10$TaGK7mc2LxJBQHZKbaoqG.LFyYHS1uHL85lhc/xVuWvxGhrMcLCdm', 0, '0123522777', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1303:58:2514803205641887833493', 0, 0, 50, NULL, '2020-09-12 20:58:25', '2020-09-12 20:58:25'),
(8, 'daddy', 'daddy', 'thinh123@gmail.com', NULL, '$2y$10$AwtBRUjv7AdgXhqTYj8CKeyTzk04Ri2o41kah38GmPq9A3VVDbw3S', NULL, '$2y$10$ZLZT3KuBQG0TbgiehNCrSuJEJwkJzlOTfYnQeLs8MlUM.5hURtfwm', 0, '0917888999', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:03:3119644289361547838465', 0, 0, 50, NULL, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(9, 'thinh123456', 'thinh nguyen', 'abcdefgh@gmail.com', NULL, '$2y$10$1YCTWWAo9FyQnWCI1gwuIuRO0nud1g2eExOr1LTFm91U.t6j0Z4eC', NULL, '$2y$10$pTpqXL/JcwyOCp2Z1irVQuUr.fe.EI7yuZxVC2frbuvtODrqBfHgC', 0, '0123477577', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:26:109631774681934721008', 0, 0, 50, NULL, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 'rip123', 'riddler abc', 'abcrep@gmail.com', NULL, '$2y$10$9zoP62GSQXBZSExhCfN67OQ/brmUgnz5xyQTaddbmqIQw2Xyd70/G', NULL, '$2y$10$5ViwRk.I32UNvCUiHKe0PebkTDxwDd58KUyNvZRfBecD/U3BcaOie', 0, '0144446789', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:33:012122142083745306620', 1, 0, 50, NULL, '2020-09-12 21:33:01', '2020-09-12 21:36:18'),
(12, 'truong', 'truong', 'tranvantruongptvtro123@gmail.com', NULL, '$2y$10$l9CqCASxLK.Ra4hd01ac2OivJmZHu7xJDl6SCZyyzHmJJIouxMi5G', NULL, '$2y$10$BCSgMv8nx1IuqPMVO/ld0uCM6Ka6fPUneR4uqD2cpw8rw8SpePz3e', 0, '0342909557', 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', 'lRx5KK6jeTsgn33ttDLftKK9p1fvXhWOi62o5tCOrrpj7D52CE38hWWengIW', 0, 0, 50, NULL, '2020-09-13 23:26:31', '2020-09-14 00:48:32'),
(13, 'trantruong', 'Trần Văn Trường', 'tranvantruongpro12345@gmail.com', NULL, '$2y$10$w7LkLEVcYTuOOoPV67lgnO6/39.8mz5NFDET/OTZqYvPNPJ3ZoWt6', NULL, '$2y$10$CwdWCgIzE4.Ax4XbiIqzRO5yns09jGMZxbyzmtgRbBz3KzbN/JWXO', 0, '03497739372', 0, 0, 8, 'Trần văn trường', '23432432423', 'Agrilbank', 'EN', NULL, 'Trần Văn Trường', '6867464554', '13999961367.png', '131099091275.png', '13718251997.JPG', 'erwerwe', '13609661484.JPG', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1610:40:04677780780927810934', 0, 0, 1800, 16, '2020-09-16 03:40:04', '2020-09-16 08:48:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_history`
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
-- Đang đổ dữ liệu cho bảng `wallet_history`
--

INSERT INTO `wallet_history` (`wallet_history_id`, `wallet_history_typeorder`, `wallet_history_type`, `wallet_history_typewallet`, `wallet_history_ofwallet`, `wallet_history_point`, `wallet_history_fromuser`, `wallet_history_touser`, `created_at`, `updated_at`) VALUES
(21, 2, 1, 0, 13, 100, 12, 8, '2020-09-15 22:08:18', '2020-09-15 22:08:18'),
(22, 2, 0, 0, 13, 100, 12, 8, '2020-09-15 22:08:18', '2020-09-15 22:08:18'),
(23, 2, 1, 0, 14, 123, 13, 8, '2020-09-16 03:41:47', '2020-09-16 03:41:47'),
(24, 2, 0, 0, 14, 123, 13, 8, '2020-09-16 03:41:48', '2020-09-16 03:41:48'),
(25, 2, 1, 0, 14, 100, 13, 8, '2020-09-16 08:31:40', '2020-09-16 08:31:40'),
(26, 2, 0, 0, 14, 100, 13, 8, '2020-09-16 08:31:40', '2020-09-16 08:31:40'),
(27, 2, 1, 0, 14, 100, 13, 8, '2020-09-16 08:48:44', '2020-09-16 08:48:44'),
(28, 2, 0, 0, 14, 100, 13, 8, '2020-09-16 08:48:44', '2020-09-16 08:48:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD PRIMARY KEY (`eco_wallet_id`);

--
-- Chỉ mục cho bảng `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD PRIMARY KEY (`ext_wallet_id`);

--
-- Chỉ mục cho bảng `hm_wallet`
--
ALTER TABLE `hm_wallet`
  ADD PRIMARY KEY (`hm_wallet_id`);

--
-- Chỉ mục cho bảng `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD PRIMARY KEY (`main_wallet_id`);

--
-- Chỉ mục cho bảng `setting_hoanve`
--
ALTER TABLE `setting_hoanve`
  ADD PRIMARY KEY (`setting_hoanve_id`);

--
-- Chỉ mục cho bảng `setting_mlm`
--
ALTER TABLE `setting_mlm`
  ADD PRIMARY KEY (`setting_mlm_id`);

--
-- Chỉ mục cho bảng `setting_naprut`
--
ALTER TABLE `setting_naprut`
  ADD PRIMARY KEY (`setting_naprut_id`);

--
-- Chỉ mục cho bảng `setting_rate`
--
ALTER TABLE `setting_rate`
  ADD PRIMARY KEY (`setting_rate_id`);

--
-- Chỉ mục cho bảng `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  ADD PRIMARY KEY (`setting_tanghm_id`);

--
-- Chỉ mục cho bảng `setting_transfer_point`
--
ALTER TABLE `setting_transfer_point`
  ADD PRIMARY KEY (`setting_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`wallet_history_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `eco_wallet`
--
ALTER TABLE `eco_wallet`
  MODIFY `eco_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `ext_wallet`
--
ALTER TABLE `ext_wallet`
  MODIFY `ext_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `hm_wallet`
--
ALTER TABLE `hm_wallet`
  MODIFY `hm_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `main_wallet`
--
ALTER TABLE `main_wallet`
  MODIFY `main_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `setting_hoanve`
--
ALTER TABLE `setting_hoanve`
  MODIFY `setting_hoanve_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_mlm`
--
ALTER TABLE `setting_mlm`
  MODIFY `setting_mlm_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_naprut`
--
ALTER TABLE `setting_naprut`
  MODIFY `setting_naprut_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_rate`
--
ALTER TABLE `setting_rate`
  MODIFY `setting_rate_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  MODIFY `setting_tanghm_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting_transfer_point`
--
ALTER TABLE `setting_transfer_point`
  MODIFY `setting_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_history_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
