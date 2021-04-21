-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 06:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `reciver_user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `sender_user_id`, `reciver_user_id`, `amount`, `timestamp`) VALUES
(1, 1, 2, 5000, '2021-04-20 19:48:32'),
(2, 2, 1, 10000, '2021-04-20 19:54:48'),
(3, 11, 9, 2000, '2021-04-20 20:05:58'),
(4, 3, 4, 1500, '2021-04-20 20:06:26'),
(5, 12, 1, 2000, '2021-04-20 20:08:08'),
(6, 6, 7, 1800, '2021-04-20 20:08:33'),
(7, 9, 5, 2350, '2021-04-20 20:09:04'),
(8, 10, 7, 1200, '2021-04-20 20:09:50'),
(9, 12, 2, 2000, '2021-04-20 20:10:10'),
(10, 11, 3, 500, '2021-04-20 20:10:31'),
(11, 5, 1, 1350, '2021-04-20 20:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `balance`) VALUES
(1, 'ANIKET', 'KURKUTE', 'aniketk@gmail.com', 33350),
(2, 'rohan', 'bhoite', 'rb786@gmail.com', 27000),
(3, 'sahil', 'nare', 'snare@gmail.com', 24000),
(4, 'raj ', 'nare', 'rnare@gmail.com', 21500),
(5, 'shubham ', 'kale', 'skale@gmail.com', 36000),
(6, 'amar ', 'shinde', 'ashinde@gmail.com', 28200),
(7, 'swaraj ', 'balsaraf', 'sbalsaraf@gmail.com', 33000),
(8, 'abhi', 'navale', 'abhi@gmail.com', 32000),
(9, 'sachin', 'pawar', 'spawar@gmail.com', 19650),
(10, 'omkar', 'navale', 'ominavle@gmail.com', 28800),
(11, 'rohan', 'kadam', 'kadamr@gmail.com', 37500),
(12, 'ajay', 'kurkute', 'ajayk@gmail.com', 46000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `reciver_user_id` (`reciver_user_id`),
  ADD KEY `sender_user_id` (`sender_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`reciver_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`sender_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
