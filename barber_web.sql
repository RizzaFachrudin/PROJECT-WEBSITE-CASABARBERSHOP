-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2026 at 01:59 PM
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
-- Database: `barber_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$od.TNFCEP3yBv/vWNrHN7e2LxnKTOnO0882fPXCtSu1lmSPI9KQoC', NULL, NULL),
(2, 'admin', '$2y$12$SH5Ln3L2Uy75bcxTPt7H/OgiCg7rc9mgUuc2pFqUqU/VwoPCXHqKa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `antreans`
--

CREATE TABLE `antreans` (
  `id_antrean` bigint(20) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `ServiceId` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `status_antrean` varchar(255) NOT NULL,
  `nomor_antrean` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antreans`
--

INSERT INTO `antreans` (`id_antrean`, `nama_pelanggan`, `ServiceId`, `total_biaya`, `metode_pembayaran`, `status_pembayaran`, `status_antrean`, `nomor_antrean`) VALUES
(1, 'sass', 1, 15, 'Cash', 'Pending', 'Menunggu', 1),
(2, 'rex', 7, 20, 'Cash', 'Pending', 'Menunggu', 2),
(3, 'Gian', 7, 20, 'Cash', 'Pending', 'Menunggu', 3),
(4, 'Adit', 7, 20, 'Cash', 'Pending', 'Menunggu', 4),
(5, 'Rizza', 11, 100, 'Cash', 'Pending', 'Menunggu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_12_06_131749_create_service_table', 1),
(4, '2025_12_06_143101_create_invoice_table', 1),
(5, '2025_12_06_150221_create_admin_table', 1),
(6, '2025_12_06_150241_create_users_table', 1),
(7, '2025_12_06_150307_create_pages_table', 1),
(8, '2025_12_07_141840_create_sessions_table', 1),
(9, '2025_12_11_082020_create_antreans_table', 1),
(10, '2025_12_29_073747_add_timestamps_to_users_table', 2),
(11, '2025_12_29_102748_alter_tblinvoice_add_queue_fields', 3),
(12, '2025_12_29_120337_add_customer_name_to_tblinvoice_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9HtHJNUNEXuvkVdAPYycFDU72i2sECRMqdyG6sKs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2hBVXZiYjZEZlZiMGhCVHFZb0xuUTlGdm5sV0FkQmNoU256Y2RmQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbnZvaWNlcyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4uaW52b2ljZXMuaW5kZXgiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767019772),
('GQwYLgyImQSonQ6129mGvDoQbcWMqR3N3UYydrk8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclgwc1JGWnhwb1FPSGhpUkFyTjJMalB3cHZ4WnlzVXVRWHJ4S0t0RSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2xvZ2luIjtzOjU6InJvdXRlIjtzOjEwOiJ1c2VyLmxvZ2luIjt9fQ==', 1767030396),
('k7S3rJPw5YZYoLsCoVDroUpwyGGHa3ipQaBjJCV2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczMzNTkzcjlCbmRFdHZPYjBWR0t3REJDeHgxQVl0blU4SEszMThiTCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9fQ==', 1767102341),
('lReU6F1WpX4DRuMdYpMO0AS0xyfSy6Wx4CMvggBu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEcyTG1CNzRxMGQzdGNTcW5waGV0WkNuSzJDOFB4M0xPNFRyZzJITyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zZXJ2aWNlcy83L2VkaXQiO3M6NToicm91dGUiO3M6MTk6ImFkbWluLnNlcnZpY2VzLmVkaXQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767172587),
('rVjLJsqzmIWZDSDYMlSiIOcKrAY8WVEXt9gsQ0Eg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWtOV2hpWHdEWmtienVzSjFVdWlJaXcweFRwdUhQRXRMYkdFTncxVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbnZvaWNlcyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4uaW52b2ljZXMuaW5kZXgiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767118279);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(10) UNSIGNED NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `CustomerName` varchar(100) DEFAULT NULL,
  `BillingId` varchar(50) NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` enum('waiting','process','completed') NOT NULL DEFAULT 'waiting',
  `Paid` tinyint(1) NOT NULL DEFAULT 0,
  `Total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `CustomerName`, `BillingId`, `PostingDate`, `Status`, `Paid`, `Total`, `created_at`, `updated_at`) VALUES
(5, NULL, 11, NULL, 'A001', '2025-12-29 04:49:18', 'completed', 1, 100000, '2025-12-29 04:49:18', '2025-12-29 04:49:18'),
(6, NULL, 7, 'Yudi', 'A002', '2025-12-29 05:14:17', 'completed', 1, 20000, '2025-12-29 05:14:17', '2025-12-29 05:14:17'),
(8, NULL, 8, 'Ahmed', 'A003', '2025-12-29 06:53:35', 'completed', 1, 30000, '2025-12-29 06:53:35', '2025-12-29 06:53:35'),
(9, NULL, 7, 'sopian', 'A004', '2025-12-29 06:55:56', 'completed', 1, 20000, '2025-12-29 06:55:56', '2025-12-29 06:55:56'),
(10, NULL, 9, 'sobri', 'A005', '2025-12-29 07:04:29', 'completed', 1, 35000, '2025-12-29 07:04:29', '2025-12-29 07:04:29'),
(11, NULL, 7, 'Sugandi', 'A006', '2025-12-29 14:41:26', 'completed', 1, 20000, '2025-12-29 14:41:26', '2025-12-29 14:41:26'),
(12, NULL, 7, 'Fian', 'A007', '2025-12-30 18:09:08', 'completed', 1, 20000, '2025-12-30 18:09:08', '2025-12-30 18:09:08'),
(13, NULL, 7, 'Joko', 'A008', '2025-12-31 08:37:07', 'completed', 1, 20000, '2025-12-31 08:37:07', '2025-12-31 08:37:07'),
(14, NULL, 7, 'Rijal', 'A009', '2025-12-31 08:38:25', 'completed', 1, 20000, '2025-12-31 08:38:25', '2025-12-31 08:38:25'),
(15, NULL, 7, 'Bahlil', 'A010', '2025-12-31 09:01:43', 'completed', 1, 20000, '2025-12-31 09:01:43', '2025-12-31 09:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) UNSIGNED NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`) VALUES
(1, 'aboutus', 'About Us', 'kami adalah Barbershop yang telah berdiri sejak tahun 2004, kami memperhatikan kebersihan dan kenyamanan pelanggan kami. Kami selalu menjaga kebersihan dan sanitasi di setiap area di Barbershop kami dan menggunakan peralatan dan perlengkapan yang steril.Kami berkomitmen untuk memberikan pengalaman yang menyenangkan dan memuaskan bagi pelanggan kami setiap kali mengunjungi Barbershop kami. Jadi, jika Anda mencari tempat untuk potong rambut atau perawatan rambut yang berkualitas dengan harga terjangkau, maka Barbershop kami adalah pilihan yang tepat untuk Anda.'),
(2, 'location', 'Lokasi Barber', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7086438866036!2d109.3577829748143!3d-7.386510692623162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655966a1f80157%3A0x392ba1770c1f70c9!2sCASA%20BARBERSHOP!5e0!3m2!1sen!2sid!4v1766995020401!5m2!1sen!2sid\" width=\"450\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(7, 'Men\'s Hair Cut', 'Silahkan request model apa saja!', 20, 'f1e1c9c02ca7a456bc47763d7f16b3b51766994729.jpg', '2025-12-29 07:52:09'),
(8, 'Men\'s Hair Color', 'Basic hair collor', 30, 'ce0d64cf65fb1b419496e6ef6a8885691766994750.jpg', '2025-12-29 07:52:30'),
(9, 'Men\'s Hair Perm', 'Perm', 35, '777326b852d734e532b340ce18c6e6281766994821.jpg', '2025-12-29 07:53:41'),
(10, 'Men\'s Hair Tattoo', 'Hair Tattoos', 15, '031309075dd169afff0ca6ab3b5c13371766994863.jpg', '2025-12-29 07:54:23'),
(11, 'Dreadlock', 'Gimbal', 100, '720c6908727f0a2b3b307f3be229f88d1766994898.jpg', '2025-12-29 07:54:58'),
(12, 'Hair Cornrow', 'Cornrow', 75, '077873d77a26114140cfd070ce9354251766994944.jpg', '2025-12-29 07:55:44'),
(13, 'Potong Gundul', 'Tuyul', 10, 'd88c9a350ead5839bc70f29f9a9b7ea81767171820.jpg', '2025-12-31 09:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `number` bigint(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `verif_code` text NOT NULL,
  `reset_code` varchar(100) DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `number`, `email`, `password`, `RegDate`, `verif_code`, `reset_code`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Rexz Alexander', 8912345, 'badennugraha4@gmail.com', '$2y$12$4nH5MjOiMQVr8pz8bjOUBuWtoWI.PKZ13yAWbmpoPBFxr0eyMOKji', '2025-12-29 07:38:25', 'c984f2af4d9652f88dfb4bc5f705796b', NULL, 1, '2025-12-29 00:38:25', '2025-12-29 02:41:07'),
(2, 'Rizza Fachrudin', NULL, 'rexalexander@gmail.com', '$2y$12$pSTVm2OtIZKYSAAQR8AzGupv9y8h.W63rxyLXxbAMIERMO6se8Zpi', '2025-12-30 13:22:59', '368532', NULL, 0, '2025-12-30 13:22:59', '2025-12-30 13:24:43'),
(3, 'Muhamad Aditya', NULL, 'mhdaditya@gmail.com', '$2y$12$Qbt4Ahh87QsN9wjqrIL7reawM/HT5QsQGIYPjGiZhGklhVVEIM3Qm', '2025-12-30 13:29:19', '284937', NULL, 0, '2025-12-30 13:29:19', '2025-12-30 13:29:19'),
(4, 'Gian Ariel', 8234567890, 'arielgi@gmail.com', '$2y$12$fa5RI.15NqPEWHoEcsFDJ.CL70OBvergWnJ1XaLygFQ3TDV9CiZWO', '2025-12-30 13:31:58', '358221', NULL, 0, '2025-12-30 13:31:58', '2025-12-30 13:31:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antreans`
--
ALTER TABLE `antreans`
  ADD PRIMARY KEY (`id_antrean`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `antreans`
--
ALTER TABLE `antreans`
  MODIFY `id_antrean` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
