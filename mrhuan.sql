-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 12:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrhuan`
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
  `eco_wallet_point` double NOT NULL DEFAULT 0,
  `eco_wallet_rate` int(10) NOT NULL DEFAULT 1,
  `eco_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ext_wallet`
--

CREATE TABLE `ext_wallet` (
  `ext_wallet_id` int(9) UNSIGNED NOT NULL,
  `ext_wallet_point` double NOT NULL DEFAULT 0,
  `ext_wallet_rate` int(10) NOT NULL DEFAULT 1,
  `ext_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hm_wallet`
--

CREATE TABLE `hm_wallet` (
  `hm_wallet_id` int(9) UNSIGNED NOT NULL,
  `hm_wallet_point` double NOT NULL DEFAULT 0,
  `hm_wallet_rate` int(10) NOT NULL DEFAULT 1,
  `hm_wallet_ofuser` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `main_wallet_id` int(9) UNSIGNED NOT NULL,
  `main_wallet_point` double NOT NULL DEFAULT 0,
  `main_wallet_rate` int(10) NOT NULL DEFAULT 1,
  `main_wallet_ofuser` int(9) UNSIGNED NOT NULL COMMENT 'user of id',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_mlm`
--

CREATE TABLE `setting_mlm` (
  `setting_mlm_id` int(9) UNSIGNED NOT NULL,
  `F1` double NOT NULL DEFAULT 3,
  `F2` double NOT NULL DEFAULT 0.5,
  `F3` double NOT NULL DEFAULT 0.5,
  `F4` double NOT NULL DEFAULT 0.5,
  `F5` double NOT NULL DEFAULT 0.5,
  `F6` double NOT NULL DEFAULT 0.2,
  `F7` double NOT NULL DEFAULT 0.2,
  `F8` double NOT NULL DEFAULT 0.2,
  `F9` double NOT NULL DEFAULT 0.2,
  `F10` double NOT NULL DEFAULT 0.2,
  `F11` double NOT NULL DEFAULT 0.2,
  `F12` double NOT NULL DEFAULT 0.2,
  `F13` double NOT NULL DEFAULT 0.2,
  `F14` double NOT NULL DEFAULT 0.2,
  `F15` double NOT NULL DEFAULT 0.2,
  `F16` double NOT NULL DEFAULT 0.1,
  `F17` double NOT NULL DEFAULT 0.1,
  `F18` double NOT NULL DEFAULT 0.1,
  `F19` double NOT NULL DEFAULT 0.1,
  `F20` double NOT NULL DEFAULT 0.1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_naprut`
--

CREATE TABLE `setting_naprut` (
  `setting_naprut_id` int(9) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `setting_naprut_phi` double NOT NULL DEFAULT 0.1,
  `setting_naprut_toithieu` double NOT NULL DEFAULT 0,
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
  `setting_rate_vichinh` double NOT NULL DEFAULT 0,
  `setting_rate_vitietkiem` double NOT NULL DEFAULT 0,
  `setting_rate_phigd` double NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting_tanghm`
--

CREATE TABLE `setting_tanghm` (
  `setting_tanghm_id` int(9) UNSIGNED NOT NULL,
  `setting_tanghm_rate` double NOT NULL DEFAULT 0.1,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) UNSIGNED NOT NULL,
  `transaction_order` int(10) NOT NULL,
  `transaction_checker` varchar(20) DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_type` int(1) NOT NULL,
  `transaction_point` int(20) NOT NULL,
  `transaction_rate` int(10) NOT NULL,
  `transaction_status` int(2) NOT NULL,
  `transaction_bill` varchar(255) DEFAULT NULL,
  `transaction_description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) UNSIGNED NOT NULL,
  `id_ref` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_verified` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_password_pay` varchar(255) NOT NULL,
  `user_level` int(2) NOT NULL,
  `user_phone` int(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_introduction` int(10) NOT NULL,
  `user_ownerbank` varchar(50) DEFAULT NULL,
  `user_numbank` int(30) DEFAULT NULL,
  `user_bankname` varchar(20) DEFAULT NULL,
  `user_nation` varchar(50) DEFAULT NULL,
  `user_description` varchar(255) DEFAULT NULL,
  `user_name_identity` varchar(255) DEFAULT NULL,
  `user_number_identity` varchar(255) DEFAULT NULL,
  `user_identity_image` varchar(255) DEFAULT '''identy_default.png''',
  `user_current_address` text DEFAULT NULL,
  `address_USDT` text DEFAULT NULL,
  `user_address_image` varchar(255) DEFAULT '''identy_default.png''',
  `user_name_GPKD` varchar(255) DEFAULT NULL,
  `user_MST` varchar(255) DEFAULT NULL,
  `user_GPKD_image` varchar(255) DEFAULT '''identy_default.png''',
  `remeber_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_ref`, `name`, `user_username`, `email`, `email_verified`, `password`, `user_password_pay`, `user_level`, `user_phone`, `user_status`, `user_type`, `user_introduction`, `user_ownerbank`, `user_numbank`, `user_bankname`, `user_nation`, `user_description`, `user_name_identity`, `user_number_identity`, `user_identity_image`, `user_current_address`, `address_USDT`, `user_address_image`, `user_name_GPKD`, `user_MST`, `user_GPKD_image`, `remeber_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Lhson', 'phucnhan', 'phucnhan@gmail.com', NULL, '$2y$10$TEY9mtHYRJ4G9oW.6n9D9.5.eHfae7I1po7iNVE8cNMsEORxtzv0m', '', 1, 868896944, '1', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', 'jFFpU4F9xl8TLtjS6DPBiI8qWugcLLXQWMtRSWx9UtBoB3TrjGpx66X8xMMh', '2020-09-09 09:46:02', '2020-09-09 09:46:02'),
(2, 0, 'viet', 'viethoang', 'viet@test.com', NULL, '$2y$10$l1kbe4s6eABtFVZqe5UpIese0vCemAMafuRjEPBanY8VIhZJgMUU2', '', 1, 868896944, '1', '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', NULL, '2020-09-09 09:47:52', '2020-09-09 09:47:52'),
(3, 0, 'phucnhan', 'phucnhan', 'nhan772000@gmail.com', NULL, '$2y$10$Ao0RzcipMZF2goZxbEsUGelvsEgH20dTZA07Wupel.hM4M7qfwrh2', '', 1, 707070444, '1', '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', NULL, NULL, '\'identy_default.png\'', '3V1xAL8xD9vnF95d9s3T6Oop5swTxStdOlTWOvw544L3UR2vG3JTLawkLW9D', '2020-09-09 09:49:09', '2020-09-09 09:49:09');

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
  `wallet_history_point` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  ADD PRIMARY KEY (`setting_tanghm_id`);

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
  MODIFY `eco_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  MODIFY `ext_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hm_wallet`
--
ALTER TABLE `hm_wallet`
  MODIFY `hm_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_wallet`
--
ALTER TABLE `main_wallet`
  MODIFY `main_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `setting_tanghm`
--
ALTER TABLE `setting_tanghm`
  MODIFY `setting_tanghm_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_history_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
