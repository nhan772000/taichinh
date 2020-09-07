-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 09:16 AM
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
-- Database: `vidientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(9) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(3) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eco_wallet`
--

CREATE TABLE `eco_wallet` (
  `eco_wallet_id` int(9) UNSIGNED NOT NULL,
  `eco_wallet_point` int(20) NOT NULL,
  `eco_wallet_rate` int(10) NOT NULL,
  `level_ofuser` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ext_wallet`
--

CREATE TABLE `ext_wallet` (
  `ext_wallet_id` int(9) UNSIGNED NOT NULL,
  `ext_wallet_point` int(20) NOT NULL,
  `ext_wallet_rate` int(10) NOT NULL,
  `level_ofuser` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(9) UNSIGNED NOT NULL,
  `level_point` int(20) NOT NULL,
  `level_rate` int(10) NOT NULL,
  `level_ofuser` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_wallet`
--

CREATE TABLE `level_wallet` (
  `level_wallet_id` int(9) UNSIGNED NOT NULL,
  `level_wallet_point` int(20) NOT NULL,
  `level_wallet_rate` int(10) NOT NULL,
  `level_ofuser` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `main_wallet_id` int(9) UNSIGNED NOT NULL,
  `main_wallet_point` int(20) NOT NULL,
  `main_wallet_rate` int(10) NOT NULL,
  `level_ofuser` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `password_reset_id` int(9) UNSIGNED NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_pay` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_point`
--

CREATE TABLE `payment_point` (
  `payment_point_id` int(9) UNSIGNED NOT NULL,
  `payment_point_from` int(9) DEFAULT NULL,
  `payment_point_to` int(9) DEFAULT NULL,
  `payment_point_of_transaction` varchar(30) DEFAULT NULL,
  `payment_point_description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(9) UNSIGNED NOT NULL,
  `setting_rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) UNSIGNED NOT NULL,
  `transaction_teller` varchar(20) DEFAULT NULL,
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
  `user_id` int(9) UNSIGNED NOT NULL,
  `user_level` int(2) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_password_pay` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` int(20) NOT NULL,
  `user_introduction` int(10) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_ownerbank` varchar(50) DEFAULT NULL,
  `user_numbank` int(30) DEFAULT NULL,
  `user_bankname` varchar(20) DEFAULT NULL,
  `user_nation` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `wallet_history_id` int(9) UNSIGNED NOT NULL,
  `wallet_history_datetime` datetime NOT NULL,
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD PRIMARY KEY (`level_wallet_id`);

--
-- Indexes for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD PRIMARY KEY (`main_wallet_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`password_reset_id`);

--
-- Indexes for table `payment_point`
--
ALTER TABLE `payment_point`
  ADD PRIMARY KEY (`payment_point_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
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
  ADD PRIMARY KEY (`user_id`);

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
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_wallet`
--
ALTER TABLE `level_wallet`
  MODIFY `level_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_wallet`
--
ALTER TABLE `main_wallet`
  MODIFY `main_wallet_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `password_reset_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_point`
--
ALTER TABLE `payment_point`
  MODIFY `payment_point_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_history_id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD CONSTRAINT `eco_id_fk` FOREIGN KEY (`eco_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD CONSTRAINT `ext_wallet_id_fk` FOREIGN KEY (`ext_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_id_fk` FOREIGN KEY (`level_id`) REFERENCES `level_wallet` (`level_wallet_id`);

--
-- Constraints for table `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD CONSTRAINT `level_wallet_id_fk` FOREIGN KEY (`level_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`main_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_id_fk` FOREIGN KEY (`password_reset_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payment_point`
--
ALTER TABLE `payment_point`
  ADD CONSTRAINT `payment_point_id_fk` FOREIGN KEY (`payment_point_id`) REFERENCES `transaction` (`transaction_id`);

--
-- Constraints for table `setting`
--
ALTER TABLE `setting`
  ADD CONSTRAINT `setting_id_user_fk` FOREIGN KEY (`setting_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_id_fk` FOREIGN KEY (`transaction_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD CONSTRAINT `wallet_history_eco_id_fk` FOREIGN KEY (`wallet_history_id`) REFERENCES `eco_wallet` (`eco_wallet_id`),
  ADD CONSTRAINT `wallet_history_ext_id_fk` FOREIGN KEY (`wallet_history_id`) REFERENCES `ext_wallet` (`ext_wallet_id`),
  ADD CONSTRAINT `wallet_history_id_fk` FOREIGN KEY (`wallet_history_id`) REFERENCES `main_wallet` (`main_wallet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
