-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 06:23 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalresturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/avatars/default.png',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Resturant Admin', 'uploads/avatars/KJXWRWOCHJY1zDfwILp3H3NliHbwrQJjPmQJ8gZK.jpeg', 'resturant@gmail.com', NULL, '$2y$10$W8T6nzQtATTDn/.vEu7tx.9iSZypB0gkZrlopoQv0OmHQ9KjAyZEW', '9RSnCpf1jn9vQEEmEZTRdoXKQouly5nXPxS9fzFgddfwUxSeCK606xnV68Aq', '2019-10-23 19:32:12', '2019-10-26 19:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Chicken', NULL, NULL, '2019-10-23 19:33:23', '2019-10-23 19:33:23'),
(2, 'Fish Food', NULL, NULL, '2019-10-23 19:33:28', '2019-10-23 19:33:28'),
(3, 'Ice Cream', NULL, NULL, '2019-10-23 21:34:23', '2019-10-23 21:34:23'),
(4, 'Meat', NULL, NULL, '2019-10-24 19:32:25', '2019-10-24 19:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `food_id`, `created_at`, `updated_at`) VALUES
(10, 'Fresh Fish Excellent Food', 11, 1, '2019-10-28 01:03:41', '2019-10-28 01:03:41'),
(11, 'Good Ice Creame', 11, 2, '2019-10-28 01:04:04', '2019-10-28 01:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `desc`, `image`, `price`, `discount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Fish Plate Fresh', 'Fish Plate Fresh', 'uploads/foods/yR8E15o9RlkZLzEAiqv7Ir6VXgz5sVV2uDH7HMXn.jpeg', 50.00, 5.00, 2, '2019-10-23 19:33:52', '2019-10-23 19:34:09'),
(2, 'Mango Ice creame', 'Mango Ice creame Mango Ice creame Mango Ice creame Mango Ice creame Mango Ice creame Mango Ice creame', 'uploads/foods/GjAYTdpcOnQt84cugAG0r213kEDhQTb8Hh8q28Bd.jpeg', 50.00, 10.00, 3, '2019-10-23 21:35:23', '2019-10-26 19:38:55'),
(3, 'KFC Chicken', 'KFC Chicken KFC Chicken KFC Chicken  KFC Chicken KFC Chicken KFC Chicken KFC Chicken KFC Chicken', 'uploads/foods/JnkMXK9EavYh7hSqdbLWCh6ao4dzlEgvjbIWhhXv.jpeg', 80.00, 10.00, 1, '2019-10-24 17:31:11', '2019-10-24 17:31:11'),
(4, 'Fresh Meat For Launch', 'Fresh Meat For Launch Fresh Meat For Launch Fresh Meat For Launch Fresh Meat For Launch', 'uploads/foods/akg22QJ4cSNZtAc49lYiY5qjDtypytnDoJHkMRbs.jpeg', 120.00, 10.00, 4, '2019-10-24 19:32:56', '2019-10-24 19:32:56'),
(5, 'asdasd', 'asdasdasdasdasdasd', 'uploads/foods/OFauD6odmnx4bB6ufOcSpS9j1aL0HA5KcErDmXKx.jpeg', 20.00, 5.00, 1, '2019-10-24 20:31:36', '2019-10-27 16:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_13_045721_create_admins_table', 1),
(4, '2019_10_13_072043_create_categories_table', 1),
(5, '2019_10_13_112309_create_foods_table', 1),
(6, '2019_10_16_124233_create_comments_table', 1),
(7, '2019_10_18_122446_create_settings_table', 1),
(8, '2019_10_19_124501_create_messages_table', 1),
(9, '2019_10_19_130036_create_sliders_table', 1),
(10, '2019_10_21_113132_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `food_id`, `active`, `created_at`, `updated_at`) VALUES
(4, 10, 2, 0, '2019-10-28 19:57:40', '2019-10-28 19:57:40'),
(5, 10, 1, 0, '2019-10-28 20:03:41', '2019-10-28 20:03:41'),
(6, 10, 1, 0, '2019-10-28 20:04:37', '2019-10-28 20:04:37'),
(7, 12, 3, 1, '2019-10-28 20:07:23', '2019-10-28 20:08:09'),
(8, 10, 4, 0, '2019-10-29 20:40:25', '2019-10-29 20:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stop_comments` int(11) NOT NULL DEFAULT '0',
  `stop_register` int(11) NOT NULL DEFAULT '0',
  `stop_website` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_logo`, `website_email`, `website_phone`, `website_address`, `website_desc`, `stop_comments`, `stop_register`, `stop_website`, `created_at`, `updated_at`) VALUES
(1, 'Resturant', 'uploads/website/riOY4I8HMLZyZNV1nYtAh4vALw3Q2cF3mpJZOpEO.jpeg', 'resturant@gmail.com', '01145987854', 'Abdelsalam Aref', 'Welcome To Resturant Management System', 0, 1, 0, '2019-10-23 19:32:12', '2019-10-28 00:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'uploads/sliders/VvNDOoT6jbpLf4ZEGqYY8fsLHUZhehZgBDfZ1bL4.jpeg', 'asdasdasd', NULL, '2019-10-23 22:26:32', '2019-10-23 22:26:32'),
(2, 'uploads/sliders/609xuD1cohOooPSTgNde0t8JYwJxU8TMaaBTuJyD.jpeg', 'asdasdasd', NULL, '2019-10-23 22:26:52', '2019-10-23 22:26:52'),
(3, 'uploads/sliders/PGPWzYUU3peCD8PQ2gFnfKpdVddVV8MNiNRZuJLZ.jpeg', 'asdasdasd', NULL, '2019-10-23 22:29:06', '2019-10-23 22:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/avatars/default.png',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `address`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Ahmed Ayman', 'uploads/avatars/default.png', 'Abdelsalam Aref , BaneSuef', '01096217092', 'ahmed@gmail.com', NULL, '$2y$10$3ubCQmjIgVqztFRnOCRm/e5Wneo2VkdDnNyFmifaIa7HCroT3LjFC', 'vz064rQD7R5lXa0X691j1OshPaSh1p1PYSu1aQViBnCWL7zfKdtrEi0a4p2E', '2019-10-27 17:40:07', '2019-10-27 17:42:04'),
(11, 'Mohamed Ahmed', 'uploads/avatars/GknkIfoX6qqyy9moykSMfxgRhG3jnhzHeb9s0xby.png', 'El Sharq , BaneSuef , Egypt', '01145879654', 'mohamed@gmail.com', NULL, '$2y$10$dhjQvo19Qen9raovkHEVPuw1bEXPANtm6qIxHal8D68Yf9Q01KBAi', 'RMHTwZ84OobDUMwzIELmnshAffR3fVXoVunTGs3djYdSnHH078v6lnCNNzZe', '2019-10-27 17:44:38', '2019-10-28 00:51:28'),
(12, 'Developer Here', 'uploads/avatars/default.png', 'Abdelsalam Aref , BaneSuef', '010124578965', 'developer@gmail.com', NULL, '$2y$10$mMit5JTPFAc7cySeQjEpueuF.zmB8JrthT0CIuFtN3J3tLTAeJpU2', 'Dpq2r6SNgFPsWz1Kanm3iTdL3y0vj74HhFr9x4VHWrucEM81LEUdUdX8AJWD', '2019-10-28 20:07:16', '2019-10-28 20:07:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_food_id_foreign` (`food_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_category_id_foreign` (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_food_id_foreign` (`food_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
