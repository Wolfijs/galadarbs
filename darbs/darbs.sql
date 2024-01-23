-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 08:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:55:29'),
(2, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:57:45'),
(3, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:57:47'),
(4, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:57:53'),
(5, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:58:12'),
(6, 'eqw', 'eqw@eq', 'qwe', '2024-01-23 06:58:15'),
(7, 'ewq', 'e@e', 'iuhii', '2024-01-23 06:58:21'),
(8, 'ewq', 'ewq@qqq', 'eqwe', '2024-01-23 06:58:33'),
(9, 'eq', 'e@e', 'ee', '2024-01-23 07:00:43'),
(10, 'ewq', 'ewq@eqweqeq', 'eqw', '2024-01-23 07:01:06'),
(11, 'ewq', 'ewq@eqweqeq', 'eqw', '2024-01-23 07:01:41'),
(12, 'EE', 'eE@FF', 'FF', '2024-01-23 07:04:26'),
(13, 'EE', 'EE@EE', 'EEE', '2024-01-23 07:05:56'),
(14, 'EE', 'EEE@EEEEE', 'EEEEEEEEE', '2024-01-23 07:06:40'),
(15, 'VGJvjvv', 'ewqewe@gaw', 'ewqe', '2024-01-23 07:11:28'),
(16, 'ewq', 'ewqe@ewqe', 'qwe', '2024-01-23 07:11:56'),
(17, 'ewqqw', 'valters@gmail.com', 'ewq', '2024-01-23 07:20:11'),
(18, 'ralfs', 'ralfs@gmail.com', 'ralfsralfsralfs', '2024-01-23 07:34:22'),
(19, 'ralfs', 'ralfs@gmail.com', 'ewqeqweqw', '2024-01-23 07:34:31'),
(20, 'ewqeqw', 'eqweqw@inbox.lv', 'eqwewqeqw', '2024-01-23 07:36:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
