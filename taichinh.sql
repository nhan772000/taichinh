-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 25, 2020 lúc 01:48 PM
-- Phiên bản máy phục vụ: 10.1.24-MariaDB
-- Phiên bản PHP: 7.1.6

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
  `eco_wallet_id` int(9) NOT NULL,
  `eco_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `eco_wallet_history`
--

CREATE TABLE `eco_wallet_history` (
  `eco_wallet_history_id` int(9) NOT NULL,
  `eco_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ext_wallet`
--

CREATE TABLE `ext_wallet` (
  `ext_wallet_id` int(9) NOT NULL,
  `ext_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ext_wallet_history`
--

CREATE TABLE `ext_wallet_history` (
  `ext_wallet_history_id` int(9) NOT NULL,
  `ext_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level_wallet`
--

CREATE TABLE `level_wallet` (
  `level_wallet_id` int(9) NOT NULL,
  `level_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level_wallet_history`
--

CREATE TABLE `level_wallet_history` (
  `level_wallet_history_id` int(9) NOT NULL,
  `level_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `main_wallet`
--

CREATE TABLE `main_wallet` (
  `main_wallet_id` int(9) NOT NULL,
  `main_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `main_wallet_history`
--

CREATE TABLE `main_wallet_history` (
  `main_wallet_history_id` int(9) NOT NULL,
  `main_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sp@gmail.com', '4ef83492c9675a69bf1f1660f0965653a0864f47a3b6d161fecba7cb12c131b4', '2016-12-06 03:47:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `payment_id` bigint(20) NOT NULL,
  `payment_amout` int(4) DEFAULT NULL,
  `payment_fromuser` bigint(20) DEFAULT NULL,
  `payment_touser` bigint(20) DEFAULT NULL,
  `payment_status` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) NOT NULL,
  `transaction_teller` varchar(20) DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_type` int(1) NOT NULL,
  `transaction_amount` int(20) NOT NULL,
  `transaction_decription` varchar(100) DEFAULT NULL,
  `transaction_status` tinyint(2) NOT NULL,
  `transaction_duyet` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_from`
--

CREATE TABLE `transaction_from` (
  `transaction_from_id` int(9) NOT NULL,
  `transaction_from_from` int(9) NOT NULL,
  `transaction_from_to` int(9) NOT NULL,
  `transaction_from_of_transaction` varchar(30) DEFAULT NULL,
  `transaction_decription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_pay` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(20) NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `password_pay`, `name`, `phone`, `type`, `status`, `description`, `remember_token`, `created_at`, `updated_at`, `address`) VALUES
(0, 'mevivucom@gmail.com', '$2y$10$6RuQ07.JkKCdi', '', 'Trần Văn A', 123456789, '', 1, NULL, '', '2020-08-20 03:37:00', '2020-08-20 03:37:00', 'sdfdssd sd ds s'),
(1, 'phucnhan@gmail.com', '$2y$10$TEY9mtHYRJ4G9', '', 'Lhson', 868896944, '', 1, NULL, 'jFFpU4F9xl8TLtjS6DPBiI8qWugcLLXQWMtRSWx9UtBoB3TrjGpx66X8xMMh', '2016-11-23 20:44:11', '2016-12-17 02:55:05', 'Ho chi minh'),
(2, 'viet@test.com', '$2y$10$l1kbe4s6eABtF', '', 'viet', 868896944, '', 1, NULL, '', '2016-12-25 21:45:02', '2016-12-25 21:45:02', 'dl'),
(3, 'vccc@gmail.com', '$2y$10$hBerWkOKdjrKz', '', 'asdasd', 0, '', 1, NULL, 'ZO2WZuEBz8sm4MLNRxYCmvYzsknxEWQxk20dwUUpfIqa8McfYM2zomf7WkZr', '2020-07-15 08:06:07', '2020-07-15 08:08:09', 'sss'),
(4, 'nhan772000@gmail.com', '$2y$10$Ao0RzcipMZF2g', '', 'phucnhan', 707070444, '', 1, NULL, '3V1xAL8xD9vnF95d9s3T6Oop5swTxStdOlTWOvw544L3UR2vG3JTLawkLW9D', '2020-07-15 08:08:29', '2020-07-30 00:28:46', 'phuc nhan');

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
-- Chỉ mục cho bảng `eco_wallet_history`
--
ALTER TABLE `eco_wallet_history`
  ADD PRIMARY KEY (`eco_wallet_history_id`);

--
-- Chỉ mục cho bảng `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD PRIMARY KEY (`ext_wallet_id`);

--
-- Chỉ mục cho bảng `ext_wallet_history`
--
ALTER TABLE `ext_wallet_history`
  ADD PRIMARY KEY (`ext_wallet_history_id`);

--
-- Chỉ mục cho bảng `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD PRIMARY KEY (`level_wallet_id`);

--
-- Chỉ mục cho bảng `level_wallet_history`
--
ALTER TABLE `level_wallet_history`
  ADD PRIMARY KEY (`level_wallet_history_id`);

--
-- Chỉ mục cho bảng `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD PRIMARY KEY (`main_wallet_id`);

--
-- Chỉ mục cho bảng `main_wallet_history`
--
ALTER TABLE `main_wallet_history`
  ADD PRIMARY KEY (`main_wallet_history_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Chỉ mục cho bảng `transaction_from`
--
ALTER TABLE `transaction_from`
  ADD PRIMARY KEY (`transaction_from_id`),
  ADD KEY `transaction_from_from_id_fk` (`transaction_from_from`),
  ADD KEY `transaction_from_to_id_fk` (`transaction_from_to`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD CONSTRAINT `eco_id_fk` FOREIGN KEY (`eco_wallet_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `eco_wallet_history`
--
ALTER TABLE `eco_wallet_history`
  ADD CONSTRAINT `eco_wallet_history_id_fk` FOREIGN KEY (`eco_wallet_history_id`) REFERENCES `eco_wallet` (`eco_wallet_id`);

--
-- Các ràng buộc cho bảng `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD CONSTRAINT `ext_id_fk` FOREIGN KEY (`ext_wallet_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `ext_wallet_history`
--
ALTER TABLE `ext_wallet_history`
  ADD CONSTRAINT `ext_wallet_history_id_fk` FOREIGN KEY (`ext_wallet_history_id`) REFERENCES `ext_wallet` (`ext_wallet_id`);

--
-- Các ràng buộc cho bảng `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD CONSTRAINT `level_id_fk` FOREIGN KEY (`level_wallet_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `level_wallet_history`
--
ALTER TABLE `level_wallet_history`
  ADD CONSTRAINT `level_wallet_history_id_fk` FOREIGN KEY (`level_wallet_history_id`) REFERENCES `level_wallet` (`level_wallet_id`);

--
-- Các ràng buộc cho bảng `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`main_wallet_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `main_wallet_history`
--
ALTER TABLE `main_wallet_history`
  ADD CONSTRAINT `main_wallet_history_id_fk` FOREIGN KEY (`main_wallet_history_id`) REFERENCES `main_wallet` (`main_wallet_id`);

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_id_fk` FOREIGN KEY (`transaction_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `transaction_from`
--
ALTER TABLE `transaction_from`
  ADD CONSTRAINT `transaction_from_from_id_fk` FOREIGN KEY (`transaction_from_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaction_from_id_fk` FOREIGN KEY (`transaction_from_id`) REFERENCES `transaction` (`transaction_id`),
  ADD CONSTRAINT `transaction_from_to_id_fk` FOREIGN KEY (`transaction_from_to`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
