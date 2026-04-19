-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2026 at 05:33 PM
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
-- Database: `the-farm-care`
--

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dental Instruments', 'dental-instruments', NULL, 1, '2026-04-09 14:37:03', '2026-04-09 14:37:03'),
(2, 'Veterinary Instruments', 'veterinary-instruments', NULL, 1, '2026-04-09 14:37:15', '2026-04-09 14:37:15'),
(3, 'Hunting Knife', 'hunting-knife', NULL, 1, '2026-04-09 14:37:26', '2026-04-09 14:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Mehak Arman', 'mehakarmaan1@gmail.com', '988937263672', 'bla bla edaefrdaqWSE', '2026-04-05 08:51:08', '2026-04-05 08:51:08');

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `company`, `country`, `subject`, `message`, `product_name`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Mehak', 'mehakarmaan1@gmail.com', NULL, 'Bla Bla Bla', NULL, NULL, '...', NULL, 0, '2026-03-30 13:33:05', '2026-03-30 13:33:05'),
(2, 'Mehak Arman', 'mehakarmaan1@gmail.com', NULL, 'bla bla lbbba', NULL, NULL, 'bla bla', NULL, 0, '2026-04-05 07:36:47', '2026-04-05 07:36:47'),
(3, 'Mehak Arman', 'mehakarmaan1@gmail.com', NULL, 'bla bla lbbba', NULL, NULL, 'bla bla', NULL, 0, '2026-04-05 07:36:48', '2026-04-05 07:36:48');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_29_121620_create_categories_table', 1),
(5, '2026_03_29_121621_create_inquiries_table', 1),
(6, '2026_03_29_121621_create_products_table', 1),
(7, '2026_03_29_121622_create_product_images_table', 1),
(8, '2026_03_29_121624_create_testimonials_table', 1),
(9, '2026_03_29_125022_add_is_admin_to_users_table', 2),
(10, '2026_03_29_115101_create_products_table', 1),
(11, '2026_04_01_122921_add_flags_to_products_table', 3),
(12, '2026_04_01_124743_add_role_to_users_table', 3),
(13, '2026_04_05_124313_create_contacts_table', 4),
(14, '2026_04_02_121227_add_slug_and_featured_image_to_products_table', 5),
(15, '2026_04_05_115125_add_admin_columns_to_users_table', 6),
(16, '2026_04_05_115343_add_admin_columns_to_users_table', 6),
(17, '2026_04_09_190522_add_price_to_products_table', 6),
(18, '2026_04_09_191718_create_product_options_table', 7),
(19, '2026_04_10_105601_create_newsletter_subscribers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `is_active`, `subscribed_at`, `created_at`, `updated_at`) VALUES
(1, 'mehakarmaan1@gmail.com', 1, '2026-04-10 07:15:00', '2026-04-10 07:15:00', '2026-04-10 07:15:00');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `featured_image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `short_title`, `short_description`, `description`, `sku`, `price`, `featured_image`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hoof Trimming Tool (Rubber Handle)', 'hoof-trimming-tool-rubber-handle-1775760408', NULL, NULL, 'Heavy-duty livestock hoof trimming tool with ergonomic red rubber grips. Designed for strong control and precision cutting. Durable stainless steel body ensures long-term farm use.', NULL, 0.00, 'Hoof Trimming Tool (Rubber Handle).jpg', 1, 1, 0, '2026-04-05 04:34:36', '2026-04-10 06:16:30'),
(2, 1, 'Fig. 23 Lower Molars, Right', 'fig-23-lower-molars-right-1775761997', NULL, NULL, NULL, NULL, 0.00, 'Fig. 23 Lower Molars, Right.jpg', 1, 1, 1, '2026-04-05 04:45:06', '2026-04-10 06:15:59'),
(3, 1, 'MICRO-ADSON', 'micro-adson-1775760178', NULL, NULL, 'Precision dental tweezers with serrated tips for firm grip. Ideal for handling cotton, dressings, and small dental materials during procedures.', NULL, 0.00, 'MICRO-ADSON.jpg', 0, 1, 0, '2026-04-05 04:45:55', '2026-04-09 14:42:58'),
(6, 1, 'Fig. 29S upper roots for children', 'fig-29s-upper-roots-for-children-1775760129', NULL, NULL, 'Slim beak dental forceps designed for incisor and root extraction. Offers enhanced accuracy in tight spaces with strong grip control.', NULL, 0.00, 'Fig. 29S upper roots for children.jpg', 0, 1, 0, '2026-04-05 04:47:19', '2026-04-10 06:21:18'),
(7, 1, 'Fig. 18 Upper Molars, Left', 'fig-18-upper-molars-left-1775760076', NULL, NULL, 'Angled beak design allows better access to difficult areas in the mouth. Ideal for precise tooth extraction with improved visibility.', NULL, 0.00, 'Fig. 18 Upper Molars, Left.jpg', 0, 1, 0, '2026-04-05 04:47:58', '2026-04-09 14:41:16'),
(8, 1, 'SAMII', 'samii-1775759972', NULL, NULL, 'Professional dental measuring forceps with 4mm tip for precise clinical measurements. Strong and lightweight design.', NULL, 0.00, 'SAMII.jpg', 1, 1, 0, '2026-04-05 04:48:40', '2026-04-10 06:15:34'),
(9, 3, 'Art # FC-H-01', 'art-fc-h-01-1775760875', NULL, NULL, NULL, NULL, 0.00, '1775760574_69d7f4be78d99.jpg', 1, 1, 2, '2026-04-09 14:49:34', '2026-04-09 14:54:35'),
(10, 3, 'Art # FC-H-02', 'art-fc-h-02-69d8cd6279e7a', NULL, NULL, NULL, NULL, 0.00, '1775816034_featured_art-fc-h-02.jpg', 0, 1, 0, '2026-04-10 06:13:54', '2026-04-10 06:15:10'),
(11, 2, 'Art # FC-2898', 'art-fc-2898-69d8cecf82722', NULL, NULL, NULL, NULL, 0.00, '1775816399_featured_art-fc-2898.jpg', 0, 1, 0, '2026-04-10 06:19:59', '2026-04-10 06:31:04'),
(12, NULL, 'Castrator for bloodless castration', 'castrator-for-bloodless-castration-69d8d1c125ef2', 'Art # FC-2897', NULL, NULL, NULL, 0.00, '1775817153_featured_Castrator for bloodless castration.jpg', 0, 1, 0, '2026-04-10 06:32:33', '2026-04-10 06:32:33'),
(13, 2, 'Art # FC-2910', 'art-fc-2910-69d8d2ce0f21d', NULL, NULL, NULL, NULL, 0.00, '1775817422_featured_art-fc-2910.jpg', 0, 1, 0, '2026-04-10 06:37:02', '2026-04-10 06:37:02'),
(14, 2, 'Art # FC-2913', 'art-fc-2913-69d8d36f9dc08', NULL, NULL, NULL, NULL, 0.00, '1775817583_featured_art-fc-2913.jpg', 1, 1, 0, '2026-04-10 06:39:43', '2026-04-10 06:39:43'),
(15, 2, 'Art # FC-2912', 'art-fc-2912-69d8d3e9b458d', NULL, NULL, NULL, NULL, 0.00, '1775817705_featured_art-fc-2912.jpg', 0, 1, 0, '2026-04-10 06:41:45', '2026-04-10 06:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'F4jfCxnveMVQIwjq5FWmY1EejWZztaW5280KdBAS.jpg', NULL, 0, '2026-04-05 04:34:39', '2026-04-05 04:34:39'),
(2, 2, 'LSjFvq5EG8l0jDhw64zYO4iVCM8plTu68X5aEz1s.jpg', NULL, 0, '2026-04-05 04:45:06', '2026-04-05 04:45:06'),
(3, 3, 'VMdKQiWHksxxSgk8BfjvTNzIcsL7LaA5kJcE9n1M.jpg', NULL, 0, '2026-04-05 04:45:55', '2026-04-05 04:45:55'),
(5, 6, '5vFNTIsceEiIG4IG1DlF34YEPRCpwY5koaPkxL8f.jpg', NULL, 0, '2026-04-05 04:47:19', '2026-04-05 04:47:19'),
(6, 7, '5OJmCA4JwsNQAhfTmGDcBApjw9Ehpr0Me6NKiqou.jpg', NULL, 0, '2026-04-05 04:47:58', '2026-04-05 04:47:58'),
(7, 8, 'CYAClLAATEW1IOpLxeB3qsf2YwDecw0mEPTYZFlW.jpg', NULL, 0, '2026-04-05 04:48:40', '2026-04-05 04:48:40'),
(8, 8, '1775759972_69d7f2648bf9a.jpg', 'SAMII', 1, '2026-04-09 14:39:32', '2026-04-09 14:39:32'),
(9, 7, '1775760076_69d7f2cc8b2dd.jpg', 'Fig. 18 Upper Molars, Left', 1, '2026-04-09 14:41:16', '2026-04-09 14:41:16'),
(10, 6, '1775760129_69d7f3018db5d.jpg', 'Fig. 29S upper roots for children', 1, '2026-04-09 14:42:09', '2026-04-09 14:42:09'),
(11, 3, '1775760178_69d7f332767f0.jpg', 'MICRO-ADSON', 1, '2026-04-09 14:42:58', '2026-04-09 14:42:58'),
(12, 2, '1775760220_69d7f35c818ad.jpg', 'Fig. 23 Lower Molars, Right', 1, '2026-04-09 14:43:40', '2026-04-09 14:43:40'),
(13, 1, '1775760251_69d7f37b3e6f5.jpg', 'Hoof Trimming Tool (Rubber Handle)', 1, '2026-04-09 14:44:11', '2026-04-09 14:44:11'),
(14, 9, '1775760574_69d7f4be78d99.jpg', 'Art # FC-H-01', 0, '2026-04-09 14:49:34', '2026-04-09 14:49:34'),
(16, 10, '1775816034_0_Art # FC-H-02.jpg', 'Art # FC-H-02', 0, '2026-04-10 06:13:54', '2026-04-10 06:13:54'),
(17, 11, '1775816399_0_Art # FC-2898.jpg', 'Art # FC-2898', 0, '2026-04-10 06:19:59', '2026-04-10 06:19:59'),
(18, 11, '1775816997_0_art-fc-2898.jpg', 'Art # FC-2898', 0, '2026-04-10 06:29:57', '2026-04-10 06:29:57'),
(19, 12, '1775817153_0_Castrator for bloodless castration.jpg', 'Castrator for bloodless castration', 0, '2026-04-10 06:32:33', '2026-04-10 06:32:33'),
(20, 13, '1775817422_0_art-fc-2910.jpg', 'Art # FC-2910', 0, '2026-04-10 06:37:02', '2026-04-10 06:37:02'),
(21, 14, '1775817583_0_art-fc-2913.jpg', 'Art # FC-2913', 0, '2026-04-10 06:39:43', '2026-04-10 06:39:43'),
(22, 15, '1775817705_0_art-fc-2912.jpg', 'Art # FC-2912', 0, '2026-04-10 06:41:45', '2026-04-10 06:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_options`
--

CREATE TABLE `product_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('6cN2bzU0UbmfVaeJDpIkRXxJBtwOfDoFQfcqXaI2', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidU9mVVJ2T0o1c2ZOYWFkbGdtWWNYNFR4OUt5RVREejNQaTJ4Y3VzOSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo1MDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL25ld3NsZXR0ZXItc3Vic2NyaWJlcnMiO3M6NToicm91dGUiO3M6MjI6ImFkbWluLm5ld3NsZXR0ZXIuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjEyOiJpbnF1aXJ5X2NhcnQiO2E6MDp7fX0=', 1775819714),
('NpELwlJ0a79mrbG5FvuCPtTYTZJdMMwI4kVyvQuT', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzJWa3NJZDA0ZzRscjdabW5wN0x2cUNDSVI0NlBBYzc2TnV5UXkwbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1775819945),
('tMCk9yjjpwAFMIk1VXrT2yhojW7n7nkV5VhlTIOG', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFtTTdHMER0dHYxbEZBWXRETlJIamhENWlnSVpOWUdWemVYWUVRYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1775820040);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
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
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@farmcare.com', NULL, '$2y$12$UtcoVzYrTxwtX9t2pjzUb.iGlEcqrS4tYakTQ06AnHYPUhcOd5hOW', 1, 'fijivq8z2gFFLO9Kr1cLotEnZzMFVkHYIsSqbKEwSoHlpVDm6l1KxrGHL9O5', '2026-03-29 08:52:49', '2026-04-05 04:26:35', 'user'),
(4, 'Admin', 'admin@thefarmcare.com', NULL, '$2y$12$s/vn7wIbbldaFYT5tGcV2.nXFC575ywIqUYewtvoXFsRwgE2jU2.6', 1, 'Y8LnuXIdMUEiTBkUpJ2EDDLvo5JzjWFYvTcJEAhEjhLg4dUtWXV2N8qcKs68', '2026-04-05 07:55:42', '2026-04-05 07:55:42', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_options_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
