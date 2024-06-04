-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2023 at 04:16 PM
-- Server version: 10.5.23-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siremake_sirema`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_requests`
--

CREATE TABLE `bentuk_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bentuk_requests`
--

INSERT INTO `bentuk_requests` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Design', NULL, NULL),
(2, 'Liputan', NULL, NULL),
(3, 'Video', NULL, NULL),
(4, 'Kepenulisan', NULL, NULL);

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
-- Table structure for table `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `ket_personil` varchar(255) DEFAULT NULL,
  `konfirmasi_project` enum('Ya','Tidak') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanans`
--

INSERT INTO `layanans` (`id`, `user_id`, `project_id`, `ket_personil`, `konfirmasi_project`, `created_at`, `updated_at`) VALUES
(1, 36, 3, NULL, NULL, '2023-12-30 19:02:59', '2023-12-30 19:02:59');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_09_022602_create_social_accounts_table', 1),
(6, '2023_11_11_041426_create_bentuk_requests_table', 1),
(7, '2023_11_11_041427_create_requests_table', 1),
(8, '2023_11_12_035744_create_projects_table', 1),
(9, '2023_11_12_042522_create_layanans_table', 1),
(10, '2023_11_27_095923_add_user_id_to_projects_table', 1),
(11, '2023_12_05_074358_create_notifikasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `message2` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasis`
--

INSERT INTO `notifikasis` (`id`, `user_id`, `pengajuan_id`, `message`, `message2`, `status`, `created_at`, `updated_at`) VALUES
(5, 37, 3, 'Request Baru Telah Dibuat', 'Request dengan judul \'Liputan Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:01:08', '2023-12-30 19:01:12'),
(6, 34, 3, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Liputan Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:01:08', '2023-12-30 19:02:32'),
(7, 42, 3, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Liputan Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:01:08', '2023-12-31 02:10:46'),
(8, 37, 4, 'Request Baru Telah Dibuat', 'Request dengan judul \'Video Jingle PKL D-IV Angkatan 63\' telah berhasil dibuat', 'read', '2023-12-30 19:01:50', '2023-12-30 19:01:52'),
(9, 34, 4, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Video Jingle PKL D-IV Angkatan 63\' telah berhasil dibuat', 'read', '2023-12-30 19:01:50', '2023-12-30 19:02:32'),
(10, 42, 4, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Video Jingle PKL D-IV Angkatan 63\' telah berhasil dibuat', 'read', '2023-12-30 19:01:50', '2023-12-31 02:10:46'),
(11, 37, 5, 'Request Baru Telah Dibuat', 'Request dengan judul \'Banner Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:02:19', '2023-12-30 19:02:21'),
(12, 34, 5, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Banner Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:02:19', '2023-12-30 19:02:32'),
(13, 42, 5, 'Request Baru Telah Diajukan oleh Irsyad Fadhil', 'Request dengan judul \'Banner Pelatihan EKW 1\' telah berhasil dibuat', 'read', '2023-12-30 19:02:19', '2023-12-31 02:10:46'),
(14, 36, 3, 'Pemberitahuan Project Baru', 'Project dengan judul \'Liputan Pelatihan EKW 1\' telah ditugaskan kepada Anda', 'unread', '2023-12-30 19:02:59', '2023-12-30 19:02:59'),
(15, 37, 3, 'Menunggu Penerimaan Personil', 'Request telah dikirim kepada personil yang dipilih', 'read', '2023-12-30 19:02:59', '2023-12-30 19:04:00'),
(16, 34, 3, 'Menunggu Penerimaan Personil', 'Project telah dikirim kepada personil yang dipilih', 'read', '2023-12-30 19:02:59', '2023-12-30 19:03:02'),
(17, 42, 3, 'Menunggu Penerimaan Personil', 'Project telah dikirim kepada personil yang dipilih', 'read', '2023-12-30 19:02:59', '2023-12-31 02:10:46'),
(18, 37, 4, 'Request ditolak', 'Request project dengan judul \'Video Jingle PKL D-IV Angkatan 63\' ditolak', 'read', '2023-12-30 19:03:31', '2023-12-30 19:04:00'),
(19, 34, 4, 'Request ditolak', 'Request project dengan judul \'Video Jingle PKL D-IV Angkatan 63\' ditolak', 'read', '2023-12-30 19:03:31', '2023-12-30 19:03:34'),
(20, 42, 4, 'Request ditolak', 'Request project dengan judul \'Video Jingle PKL D-IV Angkatan 63\' ditolak', 'read', '2023-12-30 19:03:31', '2023-12-31 02:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `progress` enum('On Going','Selesai','-') NOT NULL DEFAULT '-',
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `progress`, `request_id`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 'On Going', 3, '2023-12-30 19:01:08', '2023-12-30 19:02:59', NULL),
(4, '-', 4, '2023-12-30 19:01:50', '2023-12-30 19:01:50', NULL),
(5, '-', 5, '2023-12-30 19:02:19', '2023-12-30 19:02:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(255) NOT NULL,
  `asal_pengaju` enum('mahasiswa','dosen','bps','lainnya') NOT NULL,
  `nomor_telepon_pengaju` varchar(255) NOT NULL,
  `judul_request` varchar(255) NOT NULL,
  `status` enum('pending','disetujui','ditolak') NOT NULL DEFAULT 'pending',
  `ket_admin` varchar(255) DEFAULT NULL,
  `bentuk_request_id` bigint(20) UNSIGNED NOT NULL,
  `deadline` date NOT NULL,
  `required_personil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `nama_pengaju`, `asal_pengaju`, `nomor_telepon_pengaju`, `judul_request`, `status`, `ket_admin`, `bentuk_request_id`, `deadline`, `required_personil`, `created_at`, `updated_at`) VALUES
(3, 37, 'Icad', 'mahasiswa', '+628820083303', 'Liputan Pelatihan EKW 1', 'disetujui', NULL, 2, '2024-01-04', 1, '2023-12-30 19:01:08', '2023-12-30 19:02:59'),
(4, 37, 'Yoga Pratama', 'mahasiswa', '+62882100833303', 'Video Jingle PKL D-IV Angkatan 63', 'ditolak', 'Karena pada tanggal tersebut ada acara lain sehingga tidak bisa menerima request ini', 3, '2024-01-11', 1, '2023-12-30 19:01:50', '2023-12-30 19:03:31'),
(5, 37, 'Jihan', 'mahasiswa', '+62087771101411', 'Banner Pelatihan EKW 1', 'pending', NULL, 1, '2024-01-06', 1, '2023-12-30 19:02:19', '2023-12-30 19:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `provider_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','personil','user') NOT NULL DEFAULT 'user',
  `divisi` enum('Videografi','Reportase dan Kepenulisan','Fotografi','Design Grafis') DEFAULT NULL,
  `verify_key` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `divisi`, `verify_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(34, 'Admin Sirema', 'adit.widi@gmail.com', '2023-12-30 09:58:54', '$2y$10$R9jhIMoMlVHn.eWCA4LLguq05kRcQHvhJBtHWxMT7Rqwd6r9TvgOm', 'admin', NULL, 'yH21f3fhKp36qHSqkQ3EZ00zxzO5PCTBjpVKh4PuwCgrxaspgjpHRvRg8LppkQ78aHuHrszwtFR7lAe4IBOa6oPAUNQSkd78r5wQ', 'BYUI2e5bKkW0OZbv4pp7hx8ofGQTFa4KEKCjbbHlT56yz5YjDVULV5LdrHcn', '2023-12-30 09:58:26', '2023-12-30 10:05:33'),
(35, 'DDM 63', 'ddm.stis63@gmail.com', '2023-12-30 10:08:55', '$2y$10$GYV1OLKfCb.rZ1qMpJavSOMH3ktRQJAYjNmZvV2UlEbtcVdvu.BJy', 'user', NULL, '2Um4T2Y9Xr0oTCHSDZJRxAVZGNdZWXHib2kJA11Q6StiGbLfr2QSZwVGUrmjtBQxc96Bj3mrRARrqhRXs0LLZJjFSZaqdWzbaAZZ', NULL, '2023-12-30 10:07:43', '2023-12-30 10:08:55'),
(36, 'Aditya Widiyanto', '222111845@stis.ac.id', '2023-12-30 17:35:37', '$2y$10$BE56Iq6AHW4M/Z001bzdlegkogxIva7Os9WSkdL/kXZQxJWTRvoAq', 'personil', 'Videografi', '9YeEiOOoTMZUbcdBGd8T2DvwNMTl66xBfYewynleasVSoebgxS26O18keNsnLlrpa8j9CbEEXDol3reE1qpXhb5XWCg1pCh7jF7M', NULL, '2023-12-30 15:53:10', '2023-12-30 18:18:28'),
(37, 'Irsyad Fadhil', '222112116@stis.ac.id', '2023-12-30 18:32:59', '$2y$10$UxNifLmI03o/Sa/.7Xd3LOK0.iMQBOsABIJyv6pPVnbJbF247zTba', 'user', NULL, '0FwZl9zqFpk1luIIQrxvEaPvKEUDgT5Z277Dl3z7', NULL, '2023-12-30 18:32:59', '2023-12-30 18:32:59'),
(38, 'Fia', '222112162@stis.ac.id', '2023-12-30 18:37:16', '$2y$10$Kuho3O.bC6jw7lYpurQHv.2XaGOSJDBqhZdJS/KlsL54GrRnmpayW', 'personil', 'Design Grafis', '6w8KbKrv33WtRpveETR6DJGurBluHKNQSdikysla', NULL, '2023-12-30 18:37:16', '2023-12-30 18:37:16'),
(39, 'Samuel Maruba', '222112348@stis.ac.id', '2023-12-30 18:38:23', '$2y$10$Sd5OO6kcom6OtdAYSthnkedYbc2g5aaxahX.btQyBrvGh7GeNTQke', 'personil', 'Reportase dan Kepenulisan', 'DrpdbOSi5nVh351qzveUWZ7JZEBfPI1zRKMCjPTf', NULL, '2023-12-30 18:38:23', '2023-12-30 18:38:23'),
(40, 'Jihan Maisaroh', '222112122@stis.ac.id', '2023-12-30 18:39:55', '$2y$10$ygxu8w8EVBUcWogYzyiA3eCWB04FF8zrlEgBJ4KTe9ZOIlPVJMXXq', 'personil', 'Fotografi', 'TqmY3YoGFSA5qE08nVYOAiYW3qZC9WYt7x58Bmks', NULL, '2023-12-30 18:39:55', '2023-12-30 18:39:55'),
(41, 'I Made Yoga', '222112102@stis.ac.id', '2023-12-30 18:44:12', '$2y$10$ZCrFdiP7OdLQn0RvpNgqdOzFW5drQ88ozOxN6Eh51zxLNC7YPKaZy', 'personil', 'Videografi', 'E9OJqRRQqHIvucjx5JMCfdAe9GZcibLGya7tc7bJ', NULL, '2023-12-30 18:44:12', '2023-12-30 18:44:12'),
(42, 'Akma', '222111871@stis.ac.id', '2023-12-30 18:50:54', '$2y$10$2obrMWwJ1NBo0mA8J/I5p.3xd2mKVNEFdGz2hWoET.lZnTmWG0z4C', 'admin', NULL, '6DdwI472zsvqk75ngFn0m3uZwxVgPzUwAp8cB486', NULL, '2023-12-30 18:50:54', '2023-12-30 18:50:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk_requests`
--
ALTER TABLE `bentuk_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanans_user_id_foreign` (`user_id`),
  ADD KEY `layanans_project_id_foreign` (`project_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasis_user_id_foreign` (`user_id`),
  ADD KEY `notifikasis_pengajuan_id_foreign` (`pengajuan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_request_id_foreign` (`request_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_bentuk_request_id_foreign` (`bentuk_request_id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`),
  ADD KEY `social_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bentuk_requests`
--
ALTER TABLE `bentuk_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanans`
--
ALTER TABLE `layanans`
  ADD CONSTRAINT `layanans_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `layanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD CONSTRAINT `notifikasis_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `notifikasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_bentuk_request_id_foreign` FOREIGN KEY (`bentuk_request_id`) REFERENCES `bentuk_requests` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
