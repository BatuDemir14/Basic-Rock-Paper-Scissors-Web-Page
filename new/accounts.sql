-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 11:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `username`, `text`, `date`, `pic`) VALUES
(35, 'admin', 'hi\r\n', '2023-05-12', 0),
(36, 'alexi', 'hi\r\n', '2023-05-12', 0),
(37, 'Emrecan', 'emrecan', '2023-05-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `dataid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT 0,
  `losses` int(11) NOT NULL DEFAULT 0,
  `draws` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`dataid`, `username`, `wins`, `losses`, `draws`) VALUES
(2, 'admin', 30, 30, 30),
(5, 'alexi', 1, 1, 0),
(3, 'alexis', 8, 8, 6),
(6, 'Emrecan', 5, 7, 7),
(4, 'wasd', 10, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(27, 'admin', '$2y$10$O8UqP6FJq/WZPzVWqgVJweM3JuzdmrWmldxq8yb7VzG7UlBer7hbS', 'test@gmail.com'),
(31, 'baba', '$2y$10$vXhA83YUQ3D6dntaP0jNs.JTOUcFUA0IZjOlFtU3b/2TCcMxf66Me', 'baba@gm.c'),
(32, 'alexis', '$2y$10$i.hj8xhnt4vccw.fDKC81uZxxiJuPHCVutm7QhI3.COhO9xEN942y', 'ab@gg.co'),
(33, 'wasd', '$2y$10$T2gyA5/GEO1l33FsylPoX.YHnX/1KRSXBiUHWi2zpBwhZHXCs8tM2', 'wasd@gmail.com'),
(36, 'alexi', '$2y$10$ib/f2TG0yMW6YFYVkzAh2uFT5vy5X0Q4RaTB04YcSb3pAWSF6sTBq', 'baba2@gm.c'),
(37, 'Emrecan', '$2y$10$YFMDnjoBCHeZLsaTtgNeRuiApe4Z7Gbwajbj1n2bQo1pmNNz5BlDq', 'emrecan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `dataid` (`dataid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `dataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
