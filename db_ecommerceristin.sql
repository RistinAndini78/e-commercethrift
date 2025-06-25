-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 07:23 AM
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
-- Database: `db_ecommerceristin`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_26_235841_create_products_table', 1),
(7, '2024_02_26_235858_create_carts_table', 1),
(8, '2024_02_26_235912_create_orders_table', 1),
(9, '2024_02_26_235945_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_receipt` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(50) NOT NULL DEFAULT 'bank',
  `delivery` varchar(45) NOT NULL DEFAULT 'delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `is_paid`, `payment_receipt`, `user_id`, `bank`, `delivery`, `created_at`, `updated_at`) VALUES
(1, 1, '1709692114_3.jpg', 2, 'bank', 'delivery', '2024-03-05 19:26:55', '2024-03-05 20:20:35'),
(2, 1, '1709694183_7.jpg', 2, 'bank', 'delivery', '2024-03-05 20:02:29', '2024-03-05 20:20:37'),
(8, 1, '1709700389_8.jpg', 2, 'bank', 'delivery', '2024-03-05 20:03:44', '2024-03-05 23:02:36'),
(9, 1, '1709697193_9.jpg', 2, 'bank', 'delivery', '2024-03-05 20:52:03', '2024-03-05 20:53:31'),
(10, 0, '1709701091_10.jpg', 2, 'bank', 'delivery', '2024-03-05 20:55:45', '2024-03-05 21:58:11'),
(11, 0, '1709700582_11.jpg', 2, 'bank', 'delivery', '2024-03-05 21:49:26', '2024-03-05 21:49:42'),
(12, 1, '1709701132_12.jpg', 2, 'bank', 'delivery', '2024-03-05 21:58:40', '2024-03-05 23:02:41'),
(13, 0, '1709701179_13.jpg', 2, 'bank', 'delivery', '2024-03-05 21:59:27', '2024-03-05 21:59:39'),
(14, 1, '1709701254_14.jpg', 2, 'bank', 'delivery', '2024-03-05 22:00:42', '2024-03-05 23:02:39'),
(15, 0, '1709701512_15.jpg', 2, 'bank', 'delivery', '2024-03-05 22:04:47', '2024-03-05 22:05:12'),
(16, 0, '1709703685_16.jpg', 2, 'bank', 'delivery', '2024-03-05 22:21:27', '2024-03-05 22:41:25'),
(17, 0, '1709703763_17.jpg', 2, 'bank', 'delivery', '2024-03-05 22:42:28', '2024-03-05 22:42:43'),
(18, 0, '1709705748_18.jpg', 2, 'bank', 'delivery', '2024-03-05 22:45:15', '2024-03-05 23:15:48'),
(19, 0, '1709704777_19.jpg', 2, 'bank', 'delivery', '2024-03-05 22:59:17', '2024-03-05 22:59:37'),
(20, 1, '1709704919_20.jpg', 2, 'bank', 'delivery', '2024-03-05 23:01:24', '2024-03-05 23:02:33'),
(21, 0, '1709709442_21.jpg', 2, 'Mandiri', 'GrabEkspress', '2024-03-06 00:17:04', '2024-03-06 00:17:23'),
(22, 1, '1714089851_22.jpg', 3, 'BRI', 'J&T', '2024-04-25 16:57:46', '2024-04-25 17:04:33'),
(23, 1, '1714105042_23.jpg', 2, 'BRI', 'J&T', '2024-04-25 21:16:53', '2024-04-25 21:17:46');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Oversize T-Shirt ireally', 67000, 'Cutton Combed', '1709704718_Oversize T-Shirt ireally.jpeg', 41, '2024-03-05 16:56:05', '2024-04-25 21:16:53'),
(2, 'Oversize T-Shirt Elevendays', 56000, 'Cutton Combed', '1709683083_Oversize T-Shirt Elevendays.jpeg', 79, '2024-03-05 16:58:03', '2024-03-06 00:17:04'),
(3, 'Oversize T-Shirt Not First', 79000, 'Cutton Combed', '1709683135_Oversize T-Shirt Not First.jpeg', 65, '2024-03-05 16:58:55', '2024-03-05 22:42:28'),
(4, 'Oversize T-Shirt Space', 56000, 'Cutton Combed', '1709683187_Oversize T-Shirt Space.jpeg', 86, '2024-03-05 16:59:47', '2024-04-25 21:16:53'),
(5, 'Oversize T-Shirt Happyness Black', 79900, 'Cutton Combed', '1709683249_Oversize T-Shirt Happyness Black.jpg', 78, '2024-03-05 17:00:49', '2024-03-05 17:00:49'),
(6, 'Oversize T-Shirt Kupu-Kupu', 53600, 'Cutton Combed', '1709683309_Oversize T-Shirt Kupu-Kupu.jpeg', 78, '2024-03-05 17:01:49', '2024-03-05 17:01:49'),
(7, 'Oversize T-Shirt Longlang', 75500, 'Cutton Combed', '1709683343_Oversize T-Shirt Longlang.jpeg', 87, '2024-03-05 17:02:23', '2024-03-06 00:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 1, '2024-03-05 19:26:55', '2024-03-05 19:26:55'),
(7, 5, 1, 2, '2024-03-05 20:02:29', '2024-03-05 20:02:29'),
(8, 2, 3, 8, '2024-03-05 20:03:44', '2024-03-05 20:03:44'),
(9, 2, 1, 9, '2024-03-05 20:52:03', '2024-03-05 20:52:03'),
(10, 3, 2, 9, '2024-03-05 20:52:03', '2024-03-05 20:52:03'),
(11, 2, 3, 9, '2024-03-05 20:52:03', '2024-03-05 20:52:03'),
(13, 1, 2, 11, '2024-03-05 21:49:26', '2024-03-05 21:49:26'),
(14, 1, 3, 12, '2024-03-05 21:58:40', '2024-03-05 21:58:40'),
(15, 1, 3, 13, '2024-03-05 21:59:27', '2024-03-05 21:59:27'),
(16, 1, 3, 14, '2024-03-05 22:00:42', '2024-03-05 22:00:42'),
(17, 1, 4, 15, '2024-03-05 22:04:47', '2024-03-05 22:04:47'),
(18, 1, 4, 16, '2024-03-05 22:21:27', '2024-03-05 22:21:27'),
(19, 1, 3, 17, '2024-03-05 22:42:28', '2024-03-05 22:42:28'),
(21, 5, 1, 19, '2024-03-05 22:59:17', '2024-03-05 22:59:17'),
(22, 3, 1, 20, '2024-03-05 23:01:24', '2024-03-05 23:01:24'),
(23, 1, 7, 21, '2024-03-06 00:17:04', '2024-03-06 00:17:04'),
(24, 3, 2, 21, '2024-03-06 00:17:04', '2024-03-06 00:17:04'),
(25, 4, 1, 22, '2024-04-25 16:57:46', '2024-04-25 16:57:46'),
(26, 3, 1, 23, '2024-04-25 21:16:53', '2024-04-25 21:16:53'),
(27, 2, 4, 23, '2024-04-25 21:16:54', '2024-04-25 21:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, '$2y$12$3ICYuRfa/c4ePTFR.jXCiupTZUV.V8XDW5lBGDWo7OTGX9bw5CZay', NULL, NULL, NULL),
(2, 0, 'Ristin', 'ristin@gmail.com', NULL, '$2y$12$el.9pw4KlTassPJAUmEmweEgGPvFKxq7.p6Q3O.fC3KMsrZiXVdyO', NULL, '2024-03-05 16:53:38', '2024-03-05 16:53:38'),
(3, 0, 'Ristin Iman Andini', 'iman@gmail.com', NULL, '$2y$12$XjYF7xUZJkfA4Qbk6x3MveY4BOhImJrsQQtUh2zSIAKUa98Rlxh3C', NULL, '2024-04-24 20:16:38', '2024-04-24 20:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
