-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2025 at 07:52 PM
-- Server version: 8.0.40-0ubuntu0.22.04.1
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Blabber`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_03_28_111609_create_posts_table', 2),
(10, '2024_04_17_123018_create_subscriptions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'my first post!)', 1, '2024-03-29 06:25:37', '2024-04-16 08:30:04'),
(2, 'Remember, the only limit to your potential is the one you set for yourself. Embrace challenges, push your boundaries, and strive for excellence. You are capable of achieving great things!', 1, '2024-03-29 08:42:22', '2024-03-29 08:42:22'),
(3, 'In a world filled with uncertainty and chaos, it is essential to find moments of clarity and peace. One way to achieve this is through the practice of mindfulness. By focusing on the present moment and letting go of distractions, we can cultivate a sense of calm and inner stillness.\r\n\r\nMindfulness is not just about meditation and deep breathing. It is a way of life, a mindset that allows us to fully engage with the world around us. Whether we are taking a walk in nature, savoring a meal, or simply sitting quietly and observing our thoughts, mindfulness can help us connect with our true selves and find meaning in the everyday.\r\n\r\nIn today\'s fast-paced society, it is easy to become overwhelmed by the constant stream of information and demands on our time. But by incorporating mindfulness into our daily routine, we can learn to slow down, listen to our bodies, and appreciate the beauty of the present moment.\r\n\r\nSo let us take a moment to breathe, to be still, and to embrace the power of mindfulness. In doing so, we can find peace amidst the chaos and create a life filled with purpose and joy.', 1, '2024-03-29 08:49:28', '2024-03-29 08:49:28'),
(7, 'it worked!!', 1, '2024-04-05 06:25:10', '2024-04-16 08:22:23'),
(9, 'mew', 2, '2024-04-05 06:32:00', '2024-04-05 06:32:00'),
(10, 'ahahahahahahah', 2, '2024-04-05 06:34:22', '2024-04-05 06:34:22'),
(11, ':))', 2, '2024-04-05 06:54:42', '2024-04-05 06:54:42'),
(21, 'yay!', 2, '2024-04-05 07:15:39', '2024-04-05 07:15:39'),
(27, 'hello', 2, '2024-04-17 11:24:15', '2024-04-17 11:24:15'),
(28, 'Stargazing tonight. The cosmos always leaves me in awe.', 12, '2024-04-17 12:42:56', '2024-04-17 12:42:56'),
(29, 'Just finished reading \'The Hitchhiker\'s Guide to the Galaxy\'. Who else feels like they belong in space?', 12, '2024-04-17 12:43:14', '2024-04-17 12:43:14'),
(30, 'Watching a meteor shower from my backyard. Nature\'s fireworks are the best!', 12, '2024-04-17 12:43:32', '2024-04-17 12:43:32'),
(31, 'Feeling like royalty surrounded by fields of blueberries. Nature\'s crown jewels!', 4, '2024-04-17 12:45:05', '2024-04-17 12:45:05'),
(32, 'Started my day with a delicious blueberry smoothie. The perfect way to reign supreme over breakfast!', 4, '2024-04-17 12:45:18', '2024-04-17 12:45:18'),
(33, 'Trying to dance like nobody\'s watching, but my cat keeps giving me judgmental looks.', 9, '2024-04-17 12:46:53', '2024-04-17 12:46:53'),
(34, 'Accidentally hit \'reply all\' to an email at work and now the entire office knows I\'ve had \'Baby Shark\' stuck in my head all day.', 9, '2024-04-17 12:47:29', '2024-04-17 12:47:29'),
(35, 'Tried to impress my crush by playing guitar, but ended up serenading their cat instead. Guess I\'m more of a cat whisperer than a rock star.', 10, '2024-04-17 12:49:57', '2024-04-17 12:49:57'),
(36, 'Asked Siri to tell me a joke. Got a pun about programming instead. Looks like my phone\'s sense of humor is as nerdy as mine!', 8, '2024-04-17 12:52:57', '2024-04-17 12:52:57'),
(37, 'Attempted to explain the concept of \'cloud computing\' to my grandma. Ended up convincing her that my laptop is powered by actual clouds.', 5, '2024-04-17 12:54:41', '2024-04-17 12:54:41'),
(38, 'hi', 6, '2024-04-18 06:28:01', '2024-04-18 06:28:01'),
(39, 'first post to test', 3, '2024-08-20 09:53:11', '2024-08-20 09:53:11'),
(40, '!!!', 7, '2024-08-22 13:14:21', '2024-08-22 13:14:21'),
(41, '360 on repeat', 7, '2024-08-29 12:44:27', '2024-08-29 12:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `follow` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `follow`, `created_at`, `updated_at`) VALUES
(2, 2, 1, '2024-04-17 12:21:11', '2024-04-17 12:21:11'),
(3, 9, 2, '2024-04-17 12:47:54', '2024-04-17 12:47:54'),
(4, 9, 1, '2024-04-17 12:48:00', '2024-04-17 12:48:00'),
(5, 9, 3, '2024-04-17 12:48:14', '2024-04-17 12:48:14'),
(6, 10, 11, '2024-04-17 12:48:55', '2024-04-17 12:48:55'),
(7, 10, 6, '2024-04-17 12:49:14', '2024-04-17 12:49:14'),
(8, 10, 1, '2024-04-17 12:49:20', '2024-04-17 12:49:20'),
(9, 10, 3, '2024-04-17 12:49:27', '2024-04-17 12:49:27'),
(10, 11, 3, '2024-04-17 12:50:25', '2024-04-17 12:50:25'),
(11, 11, 10, '2024-04-17 12:50:30', '2024-04-17 12:50:30'),
(12, 11, 2, '2024-04-17 12:50:34', '2024-04-17 12:50:34'),
(13, 11, 5, '2024-04-17 12:50:39', '2024-04-17 12:50:39'),
(14, 11, 4, '2024-04-17 12:50:50', '2024-04-17 12:50:50'),
(15, 8, 2, '2024-04-17 12:51:27', '2024-04-17 12:51:27'),
(16, 8, 7, '2024-04-17 12:51:32', '2024-04-17 12:51:32'),
(17, 8, 4, '2024-04-17 12:51:37', '2024-04-17 12:51:37'),
(18, 7, 12, '2024-04-17 12:53:47', '2024-04-17 12:53:47'),
(19, 7, 10, '2024-04-17 12:53:53', '2024-04-17 12:53:53'),
(20, 7, 8, '2024-04-17 12:54:00', '2024-04-17 12:54:00'),
(21, 7, 9, '2024-04-17 12:54:07', '2024-04-17 12:54:07'),
(22, 5, 11, '2024-04-17 12:54:52', '2024-04-17 12:54:52'),
(23, 5, 7, '2024-04-17 12:55:01', '2024-04-17 12:55:01'),
(24, 1, 6, '2024-04-17 12:56:41', '2024-04-17 12:56:41'),
(25, 1, 8, '2024-04-17 12:56:51', '2024-04-17 12:56:51'),
(28, 6, 11, '2024-04-18 06:23:02', '2024-04-18 06:23:02'),
(30, 6, 9, '2024-04-18 07:36:09', '2024-04-18 07:36:09'),
(31, 4, 5, '2024-04-23 07:53:04', '2024-04-23 07:53:04'),
(32, 4, 3, '2024-04-23 08:01:10', '2024-04-23 08:01:10'),
(33, 4, 9, '2024-04-23 08:01:29', '2024-04-23 08:01:29'),
(34, 4, 1, '2024-04-23 08:01:36', '2024-04-23 08:01:36'),
(35, 4, 7, '2024-04-23 08:01:44', '2024-04-23 08:01:44'),
(36, 4, 12, '2024-04-23 08:01:49', '2024-04-23 08:01:49'),
(37, 3, 4, '2024-08-26 10:41:26', '2024-08-26 10:41:26'),
(43, 11, 6, '2024-08-27 11:42:34', '2024-08-27 11:42:34'),
(44, 7, 1, '2024-08-29 11:57:22', '2024-08-29 11:57:22'),
(45, 5, 10, '2024-08-30 12:21:08', '2024-08-30 12:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `table_posts`
--

CREATE TABLE `table_posts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `photo`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dasha1233433', 'Dasha@gmail.com', NULL, '2024032711453cf2882de424d4c52cbd9bc21bb09bca.jpg', '$2y$12$KQ2yMk3PMf9yUUYKHt1NH.CSE1KM3jUYhJ25m6JqQR2i.HzzYEfUG', 'user', NULL, '2024-03-21 07:14:38', '2024-03-28 06:21:17'),
(2, 'CatLover', 'CatLover@meow.com', NULL, '202403271146c80620080795fa75d06ae2e33af7eca3.jpg', '$2y$12$WSU36ZSZhupl7Eh9tEGW8ud3bsjq/I.S.ZsH7yuLnHm1kyEst.ZDy', 'user', NULL, '2024-03-21 08:33:19', '2024-03-27 07:46:22'),
(3, 'cyberninja92', 'cyberninja92@gmail.com', NULL, '202404171624b62a6cd76abc74602ef54c1697c740f1.jpg', '$2y$12$tit8oa0tPTmtJyRnm90e8OCtv1KH6RvA6lqJ3/p8ifkxUN2h15XPu', 'user', NULL, '2024-04-17 12:23:16', '2024-04-17 12:24:17'),
(4, 'blueberry_queen', 'blueberry_queen@gmail.com', NULL, '20240417162569fa11c1b9b12efdc5dc6979b83a887a.jpg', '$2y$12$71dI..3DqzmZ6SQG5QNyNOcmngytV2eGmLF/SIXql6Fx95OqRcHqa', 'user', NULL, '2024-04-17 12:24:51', '2024-04-17 12:25:37'),
(5, 'code_master007', 'code_master007@gmail.com', NULL, '202404171629a8451fc4aa4b4e3c39298fdfe2c3fd4d.jpg', '$2y$12$O.28QzZWtHGFLyZ5rlsM8.CHc9gVBAezpSu9APIVdKhNKFHN..v2C', 'user', NULL, '2024-04-17 12:28:56', '2024-04-17 12:29:08'),
(6, 'star_gazer123', 'star_gazer123@gmail.com', NULL, '20240417163062460266c4e4061e9220bd94a29ef6d1.jpg', '$2y$12$yti44gedNKaZrkCOdXJUDODvbQAy9gcBxDgVTiOd9XWKw0FckHWky', 'user', NULL, '2024-04-17 12:29:41', '2024-04-17 12:30:16'),
(7, 'pixel_pirate', 'pixel_pirate@gmail.com', NULL, '2024041716319e5e5023872687244ccc7cdb046dcb34.jpg', '$2y$12$exONHpUr/fD23DYvmhurNei4hKTBRgnCa4sw9nqo6R6y1y3Oxt8xG', 'user', NULL, '2024-04-17 12:30:51', '2024-04-17 12:31:07'),
(8, 'tech_guru42', 'tech_guru42@gmail.com', NULL, '2024041716314ce3679945fffa9ac0808169ac35866f.jpg', '$2y$12$u/TVIgI4Z4OH1wKGpnF8uONNDRfZ53wiVtfEZjZf2CgOXojHgiMxK', 'user', NULL, '2024-04-17 12:31:35', '2024-04-17 12:31:49'),
(9, 'music_lover88', 'music_lover88@gmail.com', NULL, '2024041716324a950402a31ba3c53b34f46e714cc435.jpg', '$2y$12$o9kNT0CxXdLxZ37AHl7xFOa8FFf8EUcXkR7H0SJ3Wd2qpPqHHVILW', 'user', NULL, '2024-04-17 12:32:22', '2024-04-17 12:32:43'),
(10, 'adventure_seeker55', 'adventure_seeker55@gmail.com', NULL, '2024041716333e9ea128b3016a18787b2c86566a156b.jpg', '$2y$12$rPInoRBE5n2lugux2nTPZOgEqmbn/i0yPZ06LCfvqfECtrufwhTwO', 'user', NULL, '2024-04-17 12:33:37', '2024-04-17 12:33:47'),
(11, 'bookworm_forever', 'bookworm_forever@gmail.com', NULL, '2024041716342f8b7a43e0c4c3f8ecb181e3346124b8.jpg', '$2y$12$gY..X2P.gT3dxbSmT2YSme1oWrTm8UensldDIJMeiaePIqTIyig.W', 'user', NULL, '2024-04-17 12:34:21', '2024-04-17 12:34:57'),
(12, 'dreamer_in_space', 'dreamer_in_space@gmail.com', NULL, '2024041716374fb6b2ff0e81dd083dc33eaf28aa2173.jpg', '$2y$12$dUr3e5PDj20F2KGwnfI8xuscRN3a4YtWY24/YqmDmVo4fCRctB8oe', 'user', NULL, '2024-04-17 12:37:22', '2024-04-17 12:37:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_follow_foreign` (`follow`);

--
-- Indexes for table `table_posts`
--
ALTER TABLE `table_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `table_posts`
--
ALTER TABLE `table_posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_follow_foreign` FOREIGN KEY (`follow`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
