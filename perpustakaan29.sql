-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Generation Time: Sep 17, 2026
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
-- Database: `perpustakaan29`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rack` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `cover_image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) NOT NULL DEFAULT 0.0,
  `popularity_score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `rack`, `stock`, `cover_image_url`, `rating`, `popularity_score`, `created_at`, `updated_at`) VALUES
(1, 'Fisika Kuantum Populer: Menembus Batas Realitas', 'Prof. Dr. Aris Danuarta • Balai Pustaka', '530.12 / FISIKA', 'Rak 4A', 3, 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=150&q=80', 4.9, 20, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(2, 'Bumi Manusia', 'Pramoedya Ananta Toer • Hasta Mitra', '813.01 / NOVEL', 'Rak 2B', 0, 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=150&q=80', 5.0, 50, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(3, 'Kimia Dasar Farmasi', 'Prof. Dr. apt. Haris Setiawan • 2022', '540 / KIMIA', 'RAK C-04', 2, 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=150&q=80', 4.5, 15, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(4, 'Filosofi Teras', 'Henry Manampiring • Non-Fiksi', '100 / FILSAFAT', 'RAK A-02', 1, 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=150&q=80', 4.8, 40, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(5, 'Atomic Habits', 'James Clear • Self Development', '158.1 / CLE', 'Rak 158.1 CLE', 5, 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=100&q=80', 4.9, 48, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(6, 'Matematika Peminatan', 'Kemendikbudristek • Sains & Tek', '510 / KEM', 'Rak 510 KEM', 10, 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&w=100&q=80', 4.2, 39, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(7, 'Laut Bercerita', 'Leila S. Chudori • Sastra Fiksi', '899.2 / CHU', 'Rak 899.2 CHU', 2, 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=100&q=80', 4.7, 35, '2026-09-17 04:10:00', '2026-09-17 04:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Siswa',
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMAN 1 GARUDAPURA',
  `level` int(11) NOT NULL DEFAULT 1,
  `level_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pembaca Pemula',
  `xp` int(11) NOT NULL DEFAULT 0,
  `max_xp` int(11) NOT NULL DEFAULT 1000,
  `streak` int(11) NOT NULL DEFAULT 0,
  `books_read` int(11) NOT NULL DEFAULT 0,
  `total_hours_read` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nis_unique` (`nis`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nis`, `role`, `school_name`, `level`, `level_name`, `xp`, `max_xp`, `streak`, `books_read`, `total_hours_read`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nadia Amanda Putri', '2024108827', 'Siswa', 'SMAN 1 GARUDAPURA', 14, 'Kutu Buku Legendaris', 2850, 3000, 18, 32, 148, NULL, '$2y$12$fT7M3rR7r8G01d2R2r/2qOb8d423uJ9k8.uM0H1yK2c34rQW0o862', NULL, '2026-09-17 04:10:00', '2026-09-17 04:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrowed_at` date NOT NULL,
  `due_date` date NOT NULL,
  `returned_at` date DEFAULT NULL,
  `renew_count` int(11) NOT NULL DEFAULT 0,
  `fine_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `borrowings_user_id_foreign` (`user_id`),
  KEY `borrowings_book_id_foreign` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`id`, `user_id`, `book_id`, `borrowed_at`, `due_date`, `returned_at`, `renew_count`, `fine_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2026-09-12', '2026-09-19', NULL, 0, 0, '2026-09-17 04:10:00', '2026-09-17 04:10:00'),
(2, 1, 4, '2026-08-31', '2026-09-14', NULL, 1, 3000, '2026-09-17 04:10:00', '2026-09-17 04:10:00');

--
-- Constraints for dumped tables
--

ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
