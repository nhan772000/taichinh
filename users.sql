-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 18, 2020 lúc 07:19 AM
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
  `user_type` int(1) NOT NULL,
  `user_active_email` tinyint(4) NOT NULL DEFAULT '0',
  `user_active_phone` tinyint(4) NOT NULL DEFAULT '0',
  `user_active_identify` tinyint(4) NOT NULL DEFAULT '0',
  `user_active_address` tinyint(4) NOT NULL DEFAULT '0',
  `user_active_GPKD` tinyint(4) NOT NULL DEFAULT '0',
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

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified`, `password`, `user_current_address`, `user_password_pay`, `user_level`, `user_phone`, `user_status`, `user_type`, `user_active_email`, `user_active_phone`, `user_active_identify`, `user_active_address`, `user_active_GPKD`, `user_introduction`, `user_ownerbank`, `user_numbank`, `user_bankname`, `user_nation`, `user_description`, `user_name_identity`, `user_number_identity`, `user_identity_image`, `user_identity_image_a`, `user_identity_image_body`, `user_address_USDT`, `user_qrcode_image`, `user_address_image`, `user_name_GPKD`, `user_MST`, `user_GPKD_image`, `remember_token`, `transfer_status`, `pttt_status`, `user_point_everyday`, `user_day_old`, `created_at`, `updated_at`) VALUES
(1, 'Lhson', 'phucnhan', 'phucnhan@gmail.com', NULL, '$2y$10$TEY9mtHYRJ4G9oW.6n9D9.5.eHfae7I1po7iNVE8cNMsEORxtzv0m', NULL, '', 1, '868896944', 1, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', 'jFFpU4F9xl8TLtjS6DPBiI8qWugcLLXQWMtRSWx9UtBoB3TrjGpx66X8xMMh', 0, 0, 50, NULL, '2020-09-09 09:46:02', '2020-09-09 09:46:02'),
(2, 'viet', 'viethoang', 'viet@test.com', NULL, '$2y$10$l1kbe4s6eABtFVZqe5UpIese0vCemAMafuRjEPBanY8VIhZJgMUU2', NULL, '', 1, '868896944', 1, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', NULL, 0, 0, 50, NULL, '2020-09-09 09:47:52', '2020-09-09 09:47:52'),
(3, 'phucnhan', 'phucnhan', 'nhan772000@gmail.com', NULL, '$2y$10$Ao0RzcipMZF2goZxbEsUGelvsEgH20dTZA07Wupel.hM4M7qfwrh2', NULL, '', 1, '707070444', 1, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '3V1xAL8xD9vnF95d9s3T6Oop5swTxStdOlTWOvw544L3UR2vG3JTLawkLW9D', 0, 0, 50, NULL, '2020-09-09 09:49:09', '2020-09-09 09:49:09'),
(4, 'mevivu', 'mevivu', 'mevivu@gmail.com', NULL, '$2y$10$yjcpYfnb.F92O5IHyxS7vu6fJ9otj5HzJykj.c8/OENYpkw.3tOai', '954 Quang Trung, Phường 8, Gò Vấp, TP.HCM, Việt Nam.', '25d55ad283aa400af464c76d713c07ad', 0, '123456789', 0, 0, 0, 0, 0, 0, 0, 0, 'Truong', '123456789', 'VietComBank', 'VN', NULL, '21563214276', '12346', 'identy_default.png', 'identy_default.png', 'identy_default.png', '124', 'identy_default.png', 'identy_default.png', 'abc', '123125412', 'identy_default.png', '97YqAvtfSfFyctYjxwcvTztwT3uJPvkMXcLbtcR1r7ppd9IAHJ25WpROCUTc', 1, 0, 50, NULL, '2020-09-09 03:42:20', '2020-09-16 03:38:33'),
(5, 'riddler', 'riddler', 'riddler@gmail.com', NULL, '$2y$10$PnE5T/DxUaUHWaCZDatcuu8554xSizXm5/vxJUp0qV7W15bP2X2rC', NULL, '$2y$10$eON.MSEsOK8VO4.PLJn4Teb69rRGJySaik6tzKA8F66gSiTVqnw0W', 0, '0123987789', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1221:00:276103543251738558188', 0, 0, 50, NULL, '2020-09-12 14:00:27', '2020-09-12 14:00:27'),
(6, 'riddler123', 'Darkder', 'riddler21@gmail.com', NULL, '$2y$10$dUev2OfTxQ0BZuBOoZSgkOtx1AxxQeQrJTzR31I74522BSgKKH2kC', NULL, '$2y$10$f9n7EPrjviaW1BsB2CROM.HQs4YFeUqwwX6mXzY4aPMabxnVIUBsK', 0, '0123333789', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '5ldCSOLDXvnvSqh4urbfyisEcNcerpA7qtwfvDpgfrTDQOn5NiIcdYp1J5GB', 0, 0, 50, NULL, '2020-09-12 14:06:49', '2020-09-13 23:24:57'),
(7, 'thinh', 'thinh01165', 'thinh0914@gmail.com', NULL, '$2y$10$NzlMEAq3iUf6D5u1m6p3KujzZiw51pCpGF7aHmY4uZJfut2RLVy3G', NULL, '$2y$10$TaGK7mc2LxJBQHZKbaoqG.LFyYHS1uHL85lhc/xVuWvxGhrMcLCdm', 0, '0123522777', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1303:58:2514803205641887833493', 0, 0, 50, NULL, '2020-09-12 20:58:25', '2020-09-12 20:58:25'),
(8, 'daddy', 'daddy', 'thinh123@gmail.com', NULL, '$2y$10$AwtBRUjv7AdgXhqTYj8CKeyTzk04Ri2o41kah38GmPq9A3VVDbw3S', NULL, '$2y$10$ZLZT3KuBQG0TbgiehNCrSuJEJwkJzlOTfYnQeLs8MlUM.5hURtfwm', 0, '0917888999', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:03:3119644289361547838465', 0, 0, 50, NULL, '2020-09-12 21:03:31', '2020-09-12 21:03:31'),
(9, 'thinh123456', 'thinh nguyen', 'abcdefgh@gmail.com', NULL, '$2y$10$1YCTWWAo9FyQnWCI1gwuIuRO0nud1g2eExOr1LTFm91U.t6j0Z4eC', NULL, '$2y$10$pTpqXL/JcwyOCp2Z1irVQuUr.fe.EI7yuZxVC2frbuvtODrqBfHgC', 0, '0123477577', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:26:109631774681934721008', 0, 0, 50, NULL, '2020-09-12 21:26:10', '2020-09-12 21:26:10'),
(11, 'rip123', 'riddler abc', 'abcrep@gmail.com', NULL, '$2y$10$9zoP62GSQXBZSExhCfN67OQ/brmUgnz5xyQTaddbmqIQw2Xyd70/G', NULL, '$2y$10$5ViwRk.I32UNvCUiHKe0PebkTDxwDd58KUyNvZRfBecD/U3BcaOie', 0, '0144446789', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', '2020-09-1304:33:012122142083745306620', 1, 0, 50, NULL, '2020-09-12 21:33:01', '2020-09-12 21:36:18'),
(12, 'truong', 'truong', 'tranvantruongptvtro123@gmail.com', NULL, '$2y$10$l9CqCASxLK.Ra4hd01ac2OivJmZHu7xJDl6SCZyyzHmJJIouxMi5G', NULL, '$2y$10$BCSgMv8nx1IuqPMVO/ld0uCM6Ka6fPUneR4uqD2cpw8rw8SpePz3e', 0, '0342909557', 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 'VN', NULL, NULL, NULL, 'identy_default.png', 'identy_default.png', 'identy_default.png', NULL, 'identy_default.png', 'identy_default.png', NULL, NULL, 'identy_default.png', 'lRx5KK6jeTsgn33ttDLftKK9p1fvXhWOi62o5tCOrrpj7D52CE38hWWengIW', 0, 0, 50, NULL, '2020-09-13 23:26:31', '2020-09-14 00:48:32'),
(13, 'trantruong', 'Trần Văn Trường', 'tranvantruongpro12345@gmail.com', NULL, '$2y$10$w7LkLEVcYTuOOoPV67lgnO6/39.8mz5NFDET/OTZqYvPNPJ3ZoWt6', NULL, '$2y$10$CwdWCgIzE4.Ax4XbiIqzRO5yns09jGMZxbyzmtgRbBz3KzbN/JWXO', 0, '03497739372', 0, 1, 0, 0, 0, 0, 0, 8, 'Trần văn trường', '23432432423', 'Agrilbank', 'EN', NULL, 'Trần Văn Trường', '6867464554', '13999961367.png', '131099091275.png', '13718251997.JPG', 'erwerwe', '13609661484.JPG', 'identy_default.png', NULL, NULL, 'identy_default.png', 'QsjUqECw5cr8lBjXNWPX0agy8id2Dl8aMZszEm6cHEGxy4mrZSBrxVMEn6bd', 0, 0, 300, 18, '2020-09-16 03:40:04', '2020-09-17 21:18:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
