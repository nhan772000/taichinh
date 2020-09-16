-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 10:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

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
-- Table structure for table `eco_wallet`
--

CREATE TABLE `eco_wallet` (
  `eco_wallet_id` int(9) NOT NULL,
  `eco_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eco_wallet_history`
--

CREATE TABLE `eco_wallet_history` (
  `eco_wallet_history_id` int(9) NOT NULL,
  `eco_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ext_wallet`
--

CREATE TABLE `ext_wallet` (
  `ext_wallet_id` int(9) NOT NULL,
  `ext_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ext_wallet_history`
--

CREATE TABLE `ext_wallet_history` (
  `ext_wallet_history_id` int(9) NOT NULL,
  `ext_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_wallet`
--

CREATE TABLE `level_wallet` (
  `level_wallet_id` int(9) NOT NULL,
  `level_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_wallet_history`
--

CREATE TABLE `level_wallet_history` (
  `level_wallet_history_id` int(9) NOT NULL,
  `level_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet`
--

CREATE TABLE `main_wallet` (
  `main_wallet_id` int(9) NOT NULL,
  `main_wallet_amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_wallet_history`
--

CREATE TABLE `main_wallet_history` (
  `main_wallet_history_id` int(9) NOT NULL,
  `main_wallet_history_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(9) NOT NULL,
  `transaction_teller` varchar(20) DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_type` int(1) NOT NULL,
  `transaction_amount` int(20) NOT NULL,
  `transaction_decription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_from`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(9) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_password_pay` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` int(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_decription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD PRIMARY KEY (`eco_wallet_id`);

--
-- Indexes for table `eco_wallet_history`
--
ALTER TABLE `eco_wallet_history`
  ADD PRIMARY KEY (`eco_wallet_history_id`);

--
-- Indexes for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD PRIMARY KEY (`ext_wallet_id`);

--
-- Indexes for table `ext_wallet_history`
--
ALTER TABLE `ext_wallet_history`
  ADD PRIMARY KEY (`ext_wallet_history_id`);

--
-- Indexes for table `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD PRIMARY KEY (`level_wallet_id`);

--
-- Indexes for table `level_wallet_history`
--
ALTER TABLE `level_wallet_history`
  ADD PRIMARY KEY (`level_wallet_history_id`);

--
-- Indexes for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD PRIMARY KEY (`main_wallet_id`);

--
-- Indexes for table `main_wallet_history`
--
ALTER TABLE `main_wallet_history`
  ADD PRIMARY KEY (`main_wallet_history_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_from`
--
ALTER TABLE `transaction_from`
  ADD PRIMARY KEY (`transaction_from_id`),
  ADD KEY `transaction_from_from_id_fk` (`transaction_from_from`),
  ADD KEY `transaction_from_to_id_fk` (`transaction_from_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eco_wallet`
--
ALTER TABLE `eco_wallet`
  ADD CONSTRAINT `eco_id_fk` FOREIGN KEY (`eco_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `eco_wallet_history`
--
ALTER TABLE `eco_wallet_history`
  ADD CONSTRAINT `eco_wallet_history_id_fk` FOREIGN KEY (`eco_wallet_history_id`) REFERENCES `eco_wallet` (`eco_wallet_id`);

--
-- Constraints for table `ext_wallet`
--
ALTER TABLE `ext_wallet`
  ADD CONSTRAINT `ext_id_fk` FOREIGN KEY (`ext_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ext_wallet_history`
--
ALTER TABLE `ext_wallet_history`
  ADD CONSTRAINT `ext_wallet_history_id_fk` FOREIGN KEY (`ext_wallet_history_id`) REFERENCES `ext_wallet` (`ext_wallet_id`);

--
-- Constraints for table `level_wallet`
--
ALTER TABLE `level_wallet`
  ADD CONSTRAINT `level_id_fk` FOREIGN KEY (`level_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `level_wallet_history`
--
ALTER TABLE `level_wallet_history`
  ADD CONSTRAINT `level_wallet_history_id_fk` FOREIGN KEY (`level_wallet_history_id`) REFERENCES `level_wallet` (`level_wallet_id`);

--
-- Constraints for table `main_wallet`
--
ALTER TABLE `main_wallet`
  ADD CONSTRAINT `users_id_fk` FOREIGN KEY (`main_wallet_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `main_wallet_history`
--
ALTER TABLE `main_wallet_history`
  ADD CONSTRAINT `main_wallet_history_id_fk` FOREIGN KEY (`main_wallet_history_id`) REFERENCES `main_wallet` (`main_wallet_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_id_fk` FOREIGN KEY (`transaction_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `transaction_from`
--
ALTER TABLE `transaction_from`
  ADD CONSTRAINT `transaction_from_from_id_fk` FOREIGN KEY (`transaction_from_from`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `transaction_from_id_fk` FOREIGN KEY (`transaction_from_id`) REFERENCES `transaction` (`transaction_id`),
  ADD CONSTRAINT `transaction_from_to_id_fk` FOREIGN KEY (`transaction_from_to`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
