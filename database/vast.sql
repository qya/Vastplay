-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 06:42 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vast`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Media #',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vidurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `name`, `user_id`, `vidurl`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Media #', 'DIRECT', 1, 'https://cdn-std.dprcdn.net/files/acc_860066/4xWUlx', 1, '2019-07-06 16:00:00', '2018-07-03 08:47:05'),
(2, 'Media #', 'DIRECT', 1, 'https://cdn-std.dprcdn.net/files/acc_860066/4xWUlx', 1, '2019-07-06 16:00:00', '2018-07-03 08:47:05'),
(3, 'Media #', 'DIRECT', 1, 'https://d2z8db3msekzfc.cloudfront.net/items/2P063D2R2V3Q0z2s0A3I/woahaha.mp4', 1, '2019-09-01 21:27:06', '2019-09-01 21:27:06'),
(4, 'Media #', 'DIRECT', 1, 'https://cdn-std.dprcdn.net/files/acc_860066/4xWUlx', 1, '2019-09-01 21:28:03', '2019-09-01 21:28:03'),
(5, 'Chou cho', 'DIRECT', 1, 'https://cdn-std.dprcdn.net/files/acc_765186/ktKYLj', 1, '2019-09-02 00:19:55', '2019-09-02 00:19:55'),
(6, 'Drive', 'DRIVE', 1, 'https://drive.google.com/file/d/15U0e3O54eCNNHpbkP5BFfl5CYPACtJGI/edit', 1, '2019-09-02 00:28:23', '2019-09-02 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `media_vast`
--

CREATE TABLE `media_vast` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vast_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_02_011841_create_media_table', 1),
(4, '2019_09_02_011916_create_vasts_table', 1),
(5, '2019_09_02_014836_media_vast', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin', NULL, '$2y$10$7kMi5d.vk56x.2WiVh2R0ehVZTJEcHhIMQY5S.XKQyNc0FlusrXEK', NULL, '2019-09-01 17:56:11', '2019-09-01 17:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `vasts`
--

CREATE TABLE `vasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Hello world',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vasts`
--

INSERT INTO `vasts` (`id`, `title`, `name`, `url`, `media_data`, `user_id`, `duration`, `status`, `type`, `counter`, `created_at`, `updated_at`) VALUES
(8, 'Hello world', '918a252a65821184c966dde43c', 'https://google.com', '1', 1, '22', 1, 'Mid-roll', 0, '2019-09-01 21:18:22', '2019-09-01 21:18:22'),
(9, 'Hello world', 'a60069a6b736f5417e8a1d0190', 'https://fais.tech', '3', 1, '20', 1, 'Pre-roll', 0, '2019-09-01 23:54:18', '2019-09-01 23:54:18'),
(10, 'Drive Data', '193f9dda26cab30c76ff8ada0e', 'https://berkas.id', '6', 1, '20', 1, 'Pre-roll', 0, '2019-09-02 00:28:45', '2019-09-02 00:28:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_user_id_foreign` (`user_id`);

--
-- Indexes for table `media_vast`
--
ALTER TABLE `media_vast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_vast_media_id_foreign` (`media_id`),
  ADD KEY `media_vast_vast_id_foreign` (`vast_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vasts`
--
ALTER TABLE `vasts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vasts_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media_vast`
--
ALTER TABLE `media_vast`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vasts`
--
ALTER TABLE `vasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `media_vast`
--
ALTER TABLE `media_vast`
  ADD CONSTRAINT `media_vast_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `media_vast_vast_id_foreign` FOREIGN KEY (`vast_id`) REFERENCES `vasts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vasts`
--
ALTER TABLE `vasts`
  ADD CONSTRAINT `vasts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
