-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 06:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `follower_user`
--

CREATE TABLE `follower_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Hudson Nitzsche Idea', 1, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(2, 'Sherman Lind Idea', 2, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(3, 'Prof. Florence Stroman Idea', 3, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(4, 'Dr. Cassandre Jakubowski DDS Idea', 4, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(5, 'Euna Grady Idea', 5, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(6, 'Leola Schmitt Idea', 6, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(7, 'Dell Hegmann Idea', 7, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(8, 'Prof. Kendra Strosin DVM Idea', 8, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(9, 'Selena Hettinger II Idea', 9, '2024-11-06 14:08:34', '2024-11-06 14:08:34'),
(10, 'Pearline Little Idea', 10, '2024-11-06 14:08:34', '2024-11-06 14:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `idea_like`
--

CREATE TABLE `idea_like` (
  `idea_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(111, '2014_10_12_000000_create_users_table', 1),
(112, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(113, '2019_08_19_000000_create_failed_jobs_table', 1),
(114, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(115, '2024_10_06_063558_create_ideas_table', 1),
(116, '2024_10_06_195322_create_comments_table', 1),
(117, '2024_10_10_200839_add_bio_and_image_to_users', 1),
(118, '2024_10_11_140250_create_follower_user_table', 1),
(119, '2024_10_13_125408_drop_likes_from_ideas', 1),
(120, '2024_10_13_125732_create_idea_like_table', 1),
(121, '2024_10_14_103653_add_is_admin_to_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bio`, `image`, `is_admin`) VALUES
(1, 'Hudson Nitzsche', 'batz.jules@example.net', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Gid9DdqtI9', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Quia eius consequatur voluptate nesciunt odio qui ut dicta. Tempora pariatur nesciunt quia pariatur sed harum necessitatibus. Rerum deleniti eum sint unde ducimus repellat. Optio reiciendis rerum doloribus dolor cupiditate.', NULL, 0),
(2, 'Sherman Lind', 'cassin.dayana@example.com', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZCktAbMMnB', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Ducimus rerum cumque nobis placeat ea quas et. Architecto hic quis sed aperiam sit. Eaque at corrupti qui sunt deleniti id. Quo autem rerum consequatur libero quo.', NULL, 0),
(3, 'Prof. Florence Stroman', 'eddie59@example.com', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4sqBTk04W4', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Nisi velit sed cupiditate est temporibus odio. Optio ut nesciunt dignissimos sed quidem deserunt. Exercitationem et doloribus delectus sequi porro qui.', NULL, 0),
(4, 'Dr. Cassandre Jakubowski DDS', 'barbara88@example.com', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JJwXny1XOS', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Et quia aut fugit nobis. Repellat est excepturi porro rerum magnam at. Eos et libero totam nihil porro. Minus exercitationem et sit dolorem. Excepturi et esse dolor sunt quia eligendi cupiditate.', NULL, 0),
(5, 'Euna Grady', 'rachelle.ruecker@example.net', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vzqTsslz6v', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Rerum dolores mollitia id dolores a dolor. Totam iure adipisci qui fugiat perferendis. Quisquam omnis quia ipsum sequi natus. Deserunt consequatur itaque asperiores voluptates maxime.', NULL, 0),
(6, 'Leola Schmitt', 'eleanora51@example.org', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8I3mjPZiVH', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Minima pariatur nisi hic. A repellendus quod id accusantium et aliquid est. Occaecati accusantium culpa ut quasi.', NULL, 0),
(7, 'Dell Hegmann', 'taylor76@example.com', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cJj8p2mdAu', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Illum saepe consectetur molestiae hic reiciendis nisi. Minima fugiat maxime et id sit non ut. Fuga illo non sequi deleniti quasi delectus voluptate quam. Praesentium rerum facere dolorem qui autem sed cupiditate iusto.', NULL, 0),
(8, 'Prof. Kendra Strosin DVM', 'btoy@example.org', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wWCg7A5e66', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Quo aliquam numquam harum non nobis. Facere sed ratione est totam error eum distinctio. Et aut dolorem omnis et fuga fugit quaerat. Omnis quo reiciendis expedita molestiae voluptas dignissimos atque.', NULL, 0),
(9, 'Selena Hettinger II', 'koepp.emile@example.net', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xhB6x5Y11x', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Atque quis adipisci expedita praesentium quia alias. Inventore consequatur aut ipsa sunt consequuntur. Sunt voluptatum reiciendis quidem est et sint. Optio ratione expedita aut et voluptatem excepturi maiores.', NULL, 0),
(10, 'Pearline Little', 'gaetano40@example.net', '2024-11-06 14:08:34', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TfqlmMNAmC', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Mollitia consequatur libero omnis quod et. Itaque cupiditate odio qui esse dolorem eius dolorum pariatur. Quis non animi temporibus saepe.', NULL, 0),
(11, 'Admin User', 'admin@example.com', '2024-11-06 14:08:34', '$2y$10$eb/dqfzyU3Eys.X/t7hduOLdyXFa4fLVuo9iAMO2Uj1PP3PATgkVG', '9Jlxwe5mbG', '2024-11-06 14:08:34', '2024-11-06 14:08:34', 'Eos a harum non quia minus. Dolor eveniet dolorem iure facilis praesentium ut. Fuga maxime facere doloribus sint eveniet. Voluptatem aut rem sunt cum magnam temporibus consequuntur.', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_idea_id_foreign` (`idea_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follower_user`
--
ALTER TABLE `follower_user`
  ADD KEY `follower_user_user_id_foreign` (`user_id`),
  ADD KEY `follower_user_follower_id_foreign` (`follower_id`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`);

--
-- Indexes for table `idea_like`
--
ALTER TABLE `idea_like`
  ADD KEY `idea_like_idea_id_foreign` (`idea_id`),
  ADD KEY `idea_like_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follower_user`
--
ALTER TABLE `follower_user`
  ADD CONSTRAINT `follower_user_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follower_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_like`
--
ALTER TABLE `idea_like`
  ADD CONSTRAINT `idea_like_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idea_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
