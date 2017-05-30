-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 апр 2017 в 09:28
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Структура на таблица `game_results`
--

CREATE TABLE `game_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `result` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `game_results`
--

INSERT INTO `game_results` (`id`, `user_id`, `result`) VALUES
(16, 1, 1),
(17, 1, 0),
(18, 1, 2),
(19, 1, 1),
(20, 1, 2),
(21, 1, 2),
(22, 1, 0),
(23, 1, 2),
(24, 1, 1),
(25, 1, 1),
(26, 1, 1),
(27, 1, 2),
(28, 1, 0),
(29, 1, 2),
(30, 1, 2),
(31, 1, 2),
(32, 0, 1),
(33, 1, 1),
(34, 1, 0),
(35, 1, 0),
(36, 1, 1),
(37, 1, 2),
(38, 1, 1),
(39, 1, 2),
(40, 1, 2),
(41, 1, 0),
(42, 1, 2),
(43, 1, 1),
(44, 1, 0),
(45, 1, 1),
(46, 1, 1),
(47, 1, 1),
(48, 1, 2),
(49, 1, 1),
(50, 1, 1),
(51, 1, 2),
(52, 1, 1),
(53, 1, 1),
(54, 1, 2),
(55, 1, 1),
(56, 1, 1),
(57, 1, 1),
(58, 1, 1),
(59, 1, 2),
(60, 1, 1),
(61, 1, 1),
(62, 1, 2),
(63, 1, 1),
(64, 1, 1),
(65, 1, 2),
(66, 1, 1),
(67, 1, 1),
(68, 1, 1),
(69, 1, 2),
(70, 1, 1),
(71, 1, 1),
(72, 1, 2),
(73, 8, 2),
(74, 9, 2),
(75, 9, 2),
(76, 8, 2),
(77, 8, 2),
(78, 8, 1),
(79, 8, 2),
(80, 8, 1),
(81, 8, 1),
(82, 8, 2),
(83, 8, 1),
(84, 8, 1),
(85, 8, 2),
(86, 8, 2),
(87, 8, 2),
(88, 8, 0),
(89, 8, 2),
(90, 8, 0),
(91, 8, 2),
(92, 8, 2),
(93, 8, 2),
(94, 8, 2),
(95, 8, 2),
(96, 8, 1),
(97, 8, 0),
(98, 8, 2),
(99, 8, 2),
(100, 8, 2),
(101, 8, 2),
(102, 8, 0),
(103, 8, 2),
(104, 8, 2),
(105, 8, 2),
(106, 8, 0),
(107, 8, 2),
(108, 8, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'user1', '123456', 'tsa@abv.bg'),
(2, 'user2', '123456', 'mail@mail.bg'),
(3, 'ivan', '98765', 'ivan'),
(4, 'user12', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tsa1@abv.bg'),
(5, 'user3', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'tsa1@com.bg'),
(6, 'user31', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'tsa1@com.bg'),
(7, 'user4', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tsa@abv.bg'),
(8, 'testuser', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'test@mail.com'),
(9, 'usertest', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'test@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_results`
--
ALTER TABLE `game_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_results`
--
ALTER TABLE `game_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
