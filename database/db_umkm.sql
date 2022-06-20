-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2022 at 05:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_owner` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `shopee` varchar(255) DEFAULT NULL,
  `tokopedia` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `user_id`, `business_owner`, `business_name`, `shopee`, `tokopedia`, `instagram`, `facebook`, `img_url`, `created_at`, `updated_at`, `website`) VALUES
(1, 2, 'Ocumps Ecosystem', 'Ocumps Groups', '', '', 'ocumps.eco', '', 'template.jpg', '2022-02-04', '2022-02-04', 'https://ocumps.com'),
(3, 1, 'Ilham', 'Ham Design', '', '', 'https://www.instagram.com', '', 'ilham.jpg', '2022-05-06', '2022-05-06', 'https://ilham.com'),
(6, 1, 'Ocumps Ecosystem', 'ocumps', '', '', 'https://www.instagram.com', 'fb.com', '5676375776294d765d8277.jpg', '2022-05-24', '2022-05-24', 'https://arahin.ocumps.com'),
(12, 1, 'Ocumps Ecosystem', 'Arahin', '', '', 'https://www.instagram.com', '', '2677691136294c09d34380.jpg', '2022-05-30', '2022-05-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'dev', '$2y$10$pQlz1JCxKVTLk10cwkB80usHX07yT8d1yABr2CtxNOc3/dPUN3KAu'),
(2, 'kritim', '$2y$10$5kCldYNDULREhI.1TlLqLuOOGufu/8p8rjJeLc.MQyUZ5RzJudzTm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
