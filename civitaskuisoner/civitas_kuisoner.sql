-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2025 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `civitas_kuisoner`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `kuisoner_id` int(11) DEFAULT NULL,
  `jawaban` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuisoner`
--

CREATE TABLE `kuisoner` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `google_form_link` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuisoner`
--

INSERT INTO `kuisoner` (`id`, `judul`, `deskripsi`, `created_by`, `google_form_link`, `created_at`) VALUES
(1, 'Kepuasan pengguna shopee pay ', 'Survey ini untuk mengetahui bagaimana kepuasan pengguna saat menggunakan shopee Pay', 1, 'https://www.google.com', '2025-01-24 15:54:42'),
(3, 'Kepuasan pengguna shopee', 'Kepuasan pengguna shopee', 2, 'https://forms.gle/your-google-form-link', '2025-01-24 15:54:42'),
(4, 'Kepuasan pengguna dana', 'Kpuasaan', 2, 'https://forms.gle/your-google-form-link', '2025-01-24 16:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `profile_picture` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `profile_picture`) VALUES
(1, 'affani', '$2y$10$DCIsfpkqVEe5pDuLBlh.ZeY3IE85QmzcOedGupleuCzqDTNYE6QDG', 'admin', 'default.jpg'),
(2, 'admin', '$2y$10$UeH83AEq.mZOI0JG0gnujewaaypgPQ0Tck1QIOJifNlHBH0Apnrpe', 'admin', 'default.jpg'),
(3, 'user', '$2y$10$DrZK4ZuDfH2mK/eyFhopnO50z3eqicVQJd.0blkGNp8xMCaoCWIVu', 'user', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuisoner_id` (`kuisoner_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kuisoner`
--
ALTER TABLE `kuisoner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

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
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisoner`
--
ALTER TABLE `kuisoner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`kuisoner_id`) REFERENCES `kuisoner` (`id`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `kuisoner`
--
ALTER TABLE `kuisoner`
  ADD CONSTRAINT `kuisoner_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
