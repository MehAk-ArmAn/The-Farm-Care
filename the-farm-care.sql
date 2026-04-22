-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 04:02 PM
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
(4, 'Castration Plier', 'castration-plier', NULL, 1, '2026-04-22 06:44:53', '2026-04-22 06:44:53'),
(5, 'Drenching Gun', 'drenching-gun', NULL, 1, '2026-04-22 07:43:18', '2026-04-22 07:43:18'),
(6, 'Dehorning equipments', 'dehorning-equipments', NULL, 1, '2026-04-22 07:50:48', '2026-04-22 07:50:48'),
(7, 'Sucking prevention', 'sucking-prevention', NULL, 1, '2026-04-22 07:55:53', '2026-04-22 07:55:53'),
(8, 'Teat Diliators', 'teat-diliators', NULL, 1, '2026-04-22 07:56:12', '2026-04-22 07:56:12'),
(9, 'Bull Nose Rings', 'bull-nose-rings', NULL, 1, '2026-04-22 07:56:24', '2026-04-22 07:56:24'),
(10, 'Artificial insemination', 'artificial-insemination', NULL, 1, '2026-04-22 07:56:38', '2026-04-22 07:56:38'),
(11, 'Syringes', 'syringes', NULL, 1, '2026-04-22 07:56:49', '2026-04-22 07:56:49'),
(12, 'Bolus Gun', 'bolus-gun', NULL, 1, '2026-04-22 07:57:01', '2026-04-22 07:57:01');

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
(1, 'mehakarmaan1@gmail.com', 1, '2026-04-10 07:15:00', '2026-04-10 07:15:00', '2026-04-10 07:15:00'),
(2, 'i@armansabir.com', 1, '2026-04-19 15:31:21', '2026-04-19 15:31:21', '2026-04-19 15:31:21');

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
(18, 4, 'Elastrator for castration and  Tail Dock', 'elastrator-for-castration-and-tail-dock-69e8ad4e4d5a6', NULL, 'Castrator for bloodless castration.\r\n\r\nCastration pliers are designed for labor-saving, comfortable and easy to hold and use.\r\n\r\nWith this tool no need to cut animal scrotum and no bleeding, reduce the risk of injury.\r\n\r\nMade of high quality plastic and metal material, which is durable.', 'Castrator for bloodless castration.\r\n\r\nCastration pliers are designed for labor-saving, comfortable and easy to hold and use.\r\n\r\nWith this tool no need to cut animal scrotum and no bleeding, reduce the risk of injury.\r\n\r\nMade of high quality plastic and metal material, which is durable.', NULL, 0.00, '1776856398_featured_3D.jpg', 1, 1, 1, '2026-04-22 07:13:18', '2026-04-22 07:45:35'),
(19, 5, 'Adjustable Dose DRENCHERS', 'adjustable-dose-drenchers-69e8b4c2a4cfe', NULL, 'Easy to use for cattle and sheep,Goats\r\n\r\nBody is made with durable plastic ,  curved metal drenching nozzle.\r\n\r\nThe drencher is adjustable by 1ML-10ML- increments and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', 'Easy to use for cattle and sheep,Goats\r\n\r\nBody is made with durable plastic ,  curved metal drenching nozzle.\r\n\r\nThe drencher is adjustable by 1ML-10ML- increments and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', NULL, 0.00, '1776858306_featured_1.JPG', 0, 1, 0, '2026-04-22 07:45:07', '2026-04-22 07:46:30'),
(20, 5, 'Manual fix  Dose DRENCHERS', 'manual-fix-dose-drenchers-69e8b56b11300', NULL, 'Easy to use for cattles \r\n\r\nBody is made with durable plastic ,  curved metal drenching nozzle.\r\n\r\nThe drencher is used for fix amount of liquid and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', 'Easy to use for cattles \r\n\r\nBody is made with durable plastic ,  curved metal drenching nozzle.\r\n\r\nThe drencher is used for fix amount of liquid and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', NULL, 0.00, '1776858475_featured_2.JPG', 0, 1, 0, '2026-04-22 07:47:55', '2026-04-22 07:47:55'),
(21, 5, 'Stainless steel Adjustable Dose DRENCHERS', 'stainless-steel-adjustable-dose-drenchers-69e8b5efd7121', NULL, 'Easy to use for small animals pigs,sheep, goats  \r\n\r\nBody is made with durable steel ,  curved metal drenching nozzle.\r\n\r\nThe drencher is used for adjustable liquid and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', 'Easy to use for small animals pigs,sheep, goats  \r\n\r\nBody is made with durable steel ,  curved metal drenching nozzle.\r\n\r\nThe drencher is used for adjustable liquid and has a replaceable o-ring.\r\n\r\nWashable and durable high quality product.', NULL, 0.00, '1776858607_featured_3.jpg', 0, 1, 0, '2026-04-22 07:50:07', '2026-04-22 07:50:07'),
(22, 6, 'ELECTRIC DEHOENER', 'electric-dehoener-69e8b66fe4fc5', NULL, 'comes with interchangeable Extra two copper tips \r\n\r\n(1\" OD and 13/16\" ID)\r\n\r\n(3/4\" OD and 5/8\" ID)\r\n\r\n Dehorn young calves or goats with no loss of blood.', 'comes with interchangeable Extra two copper tips \r\n\r\n(1\" OD and 13/16\" ID)\r\n\r\n(3/4\" OD and 5/8\" ID)\r\n\r\n Dehorn young calves or goats with no loss of blood.', NULL, 0.00, '1776858735_featured_1.JPG', 0, 1, 0, '2026-04-22 07:52:15', '2026-04-22 07:52:15'),
(23, 6, 'ELECTRIC DEHOENER', 'electric-dehoener-69e8b6b585a2e', NULL, 'Dehorn young calves or goats with no loss of blood.\r\n\r\nStandard size \r\n\r\nAvailable in Wooden handle. easy to use .', 'Dehorn young calves or goats with no loss of blood.\r\n\r\nStandard size \r\n\r\nAvailable in Wooden handle. easy to use .', NULL, 0.00, '1776858805_featured_2.JPG', 0, 1, 0, '2026-04-22 07:53:25', '2026-04-22 07:53:25'),
(24, 6, 'BARNES DEHOENER', 'barnes-dehoener-69e8b716592fc', NULL, 'Length:   13\" 17\"\r\n\r\nAvailable in Angled and straight handles.\r\n\r\nStainless Steel cutting edges\r\n\r\nDurable construction wodden and plastic Grips\r\n\r\nBarnes dehorn your cattle quickly with minimum stress,\r\n\r\nHardened steel blades ensure years of trouble free performance', 'Length:   13\" 17\"\r\n\r\nAvailable in Angled and straight handles.\r\n\r\nStainless Steel cutting edges\r\n\r\nDurable construction wodden and plastic Grips\r\n\r\nBarnes dehorn your cattle quickly with minimum stress,\r\n\r\nHardened steel blades ensure years of trouble free performance', NULL, 0.00, '1776858902_featured_3.jpg', 0, 1, 0, '2026-04-22 07:55:02', '2026-04-22 07:55:02'),
(25, 7, 'Milk Preventer', 'milk-preventer-69e8b81769e0f', NULL, 'Plastic milk sucking preventer with butterfly adjustment nut\r\n\r\nUsed to wean a calf from its mother\r\n\r\nEasily attaches to the calf nose. \r\n\r\nPokes the mother when calf tries to nurse\r\n\r\nDifferent colors available on customer demand', 'Plastic milk sucking preventer with butterfly adjustment nut\r\n\r\nUsed to wean a calf from its mother\r\n\r\nEasily attaches to the calf nose. \r\n\r\nPokes the mother when calf tries to nurse\r\n\r\nDifferent colors available on customer demand', NULL, 0.00, '1776859159_featured_1.jpg', 0, 1, 0, '2026-04-22 07:59:19', '2026-04-22 07:59:19'),
(26, 7, 'Milk Preventer silver', 'milk-preventer-silver-69e8b8ab31edc', NULL, 'Easily attaches to the calf nose. \r\n \r\n durable made with silver', 'Easily attaches to the calf nose. \r\n \r\n durable made with silver', NULL, 0.00, '1776859307_featured_4.jpg', 0, 1, 0, '2026-04-22 08:01:47', '2026-04-22 08:01:47'),
(27, 7, 'Milk Preventer', 'milk-preventer-69e8b99745828', NULL, 'Available in copper ,Brass, S.S \r\n\r\nDesigned for calves and young cattle\r\n\r\nFor the Prevention of nursing from the mother\r\n\r\nEncourages the calves switch to feed\r\n\r\nDecreases urine drinking and cross-sucking with other cattle\r\n\r\nRing design makes it impossible for the cow to lose it', 'Available in copper ,Brass, S.S \r\n\r\nDesigned for calves and young cattle\r\n\r\nFor the Prevention of nursing from the mother\r\n\r\nEncourages the calves switch to feed\r\n\r\nDecreases urine drinking and cross-sucking with other cattle\r\n\r\nRing design makes it impossible for the cow to lose it', NULL, 0.00, '1776859543_featured_5.jpg', 0, 1, 0, '2026-04-22 08:05:43', '2026-04-22 08:05:43'),
(28, 8, 'MILK SIPHON', 'milk-siphon-69e8ba624df41', NULL, 'SIZE\r\n\r\n  APPROX \r\n\r\n  Legnth  4\"\r\n\r\n  Dia 2mm-3mm\r\n\r\n  Made from S.S', 'SIZE\r\n\r\n  APPROX \r\n\r\n  Legnth  4\"\r\n\r\n  Dia 2mm-3mm\r\n\r\n  Made from S.S', NULL, 0.00, '1776859746_featured_1.JPG', 0, 1, 0, '2026-04-22 08:09:06', '2026-04-22 08:09:06'),
(29, 8, 'Teat Dilator', 'teat-dilator-69e8ba9e845dc', NULL, 'SIZE\r\n \r\nstandard\r\n\r\nmade from S.S\r\n\r\nwith adjustable screw', 'SIZE\r\n \r\nstandard\r\n\r\nmade from S.S\r\n\r\nwith adjustable screw', NULL, 0.00, '1776859806_featured_2.JPG', 0, 1, 0, '2026-04-22 08:10:06', '2026-04-22 08:10:06'),
(30, 8, 'Teat Tumor Extractor', 'teat-tumor-extractor-69e8bae24b29d', NULL, 'The Teat Tumor Extractor is an effective tool with and without blades.\r\nUsed to remove fibrous tissue to prevent calculi from forming\r\n.Stainless steel. Allows for easy and rapid removal \r\nof calculi formations from the teat canal.', 'The Teat Tumor Extractor is an effective tool with and without blades.\r\nUsed to remove fibrous tissue to prevent calculi from forming\r\n.Stainless steel. Allows for easy and rapid removal \r\nof calculi formations from the teat canal.', NULL, 0.00, '1776859874_featured_3.JPG', 0, 1, 0, '2026-04-22 08:11:14', '2026-04-22 08:11:14'),
(31, 8, 'Teat Dilator', 'teat-dilator-69e8bb34cbf0b', NULL, 'made from S.S', 'made from S.S', NULL, 0.00, '1776859956_featured_4.JPG', 0, 1, 0, '2026-04-22 08:12:36', '2026-04-22 08:12:36'),
(32, 9, 'Bull Nose Ring BRASS', 'bull-nose-ring-brass-69e8bbc5c9d33', NULL, 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', NULL, 0.00, '1776860101_featured_1.JPG', 0, 1, 0, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(33, 9, 'Bull Nose Ring s.s', 'bull-nose-ring-ss-69e8bc58e5590', NULL, 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', NULL, 0.00, '1776860248_featured_2.JPG', 0, 1, 0, '2026-04-22 08:17:28', '2026-04-22 08:17:28'),
(34, 9, 'Bull HOLDER S.S', 'bull-holder-ss-69e8bca7e2310', NULL, 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', 'Made with high quality brass bull nose ring Ideal for bull holding\r\n\r\n Long sharp piercing point ensures a clean cut.\r\n\r\n Nose Ring come with screw. With L key/screw driver \r\n \r\n After application, extra part of the screw breaks off.', NULL, 0.00, '1776860327_featured_2.JPG', 0, 1, 0, '2026-04-22 08:18:47', '2026-04-22 08:18:47'),
(35, 4, 'BURDIZZO CASTRATION PLIER', 'burdizzo-castration-plier-69e8bd5bb0425', NULL, 'Castrator for bloodless castration.\r\n\r\nPlainly crush testicular cords without breaking the skin.\r\n\r\nAvailable in Wooden and Plastic handle', 'Castrator for bloodless castration.\r\n\r\nPlainly crush testicular cords without breaking the skin.\r\n\r\nAvailable in Wooden and Plastic handle', NULL, 0.00, '1776860507_featured_1.JPG', 0, 1, 0, '2026-04-22 08:21:47', '2026-04-22 08:21:47'),
(36, 4, '...', '69e8bddd43a2c', NULL, 'Castrator for bloodless castration.\r\n\r\nPlainly crush testicular cords without breaking the skin.\r\n\r\nAvailable in Wooden and Plastic handle', 'Castrator for bloodless castration.\r\n\r\nPlainly crush testicular cords without breaking the skin.\r\n\r\nAvailable in Wooden and Plastic handle', NULL, 0.00, '1776860669_featured_2.JPG', 0, 1, 0, '2026-04-22 08:23:57', '2026-04-22 08:24:29'),
(37, 10, 'AI Gun - Conical O-Ring', 'ai-gun-conical-o-ring-69e8c8042d87e', NULL, 'Three different models compatible with both 0.5 ml. and 0.25 ml. straws\r\n\r\nLength of Barrel           435 mm. \r\nOuter Diameter of Barrel   3.60 mm.\r\nTotal Length of Plunger    449 mm', 'Three different models compatible with both 0.5 ml. and 0.25 ml. straws\r\n\r\nLength of Barrel           435 mm. \r\nOuter Diameter of Barrel   3.60 mm.\r\nTotal Length of Plunger    449 mm', NULL, 0.00, '1776863236_featured_1.JPG', 0, 1, 0, '2026-04-22 09:07:16', '2026-04-22 09:07:16'),
(38, 10, 'AI Gun Self-Lock', 'ai-gun-self-lock-69e8cb6e26ad0', NULL, 'The Barrel is fitted with an elevated ring (casting)\r\n At the bottom and fits with disposable AI Sheaths seamlessly\r\n. The Plunger is crafted with desirable\r\n Flexibility allowing it to withstand bending, \r\nwithout any loss in shape.', 'The Barrel is fitted with an elevated ring (casting)\r\n At the bottom and fits with disposable AI Sheaths seamlessly\r\n. The Plunger is crafted with desirable\r\n Flexibility allowing it to withstand bending, \r\nwithout any loss in shape.', NULL, 0.00, '1776864110_featured_2.png', 0, 1, 0, '2026-04-22 09:21:50', '2026-04-22 09:21:50'),
(39, 10, 'Universal Auto-Lock', 'universal-auto-lock-69e8cbdd6d210', NULL, 'compatible with both 0.5 ml. and 0.25 ml. straws', 'compatible with both 0.5 ml. and 0.25 ml. straws', NULL, 0.00, '1776864221_featured_3.png', 0, 1, 0, '2026-04-22 09:23:41', '2026-04-22 09:23:41'),
(40, 10, 'Disposable Insemination Gloves', 'disposable-insemination-gloves-69e8cc2be99ea', NULL, 'Gloves mainly used for cattle, buffalo, horses\r\n and asses the rectum palpation, ovaries, pregnancy test,\r\n Obstetric and artificial crown fine, \r\nis to prevent workers suffering from occupational diseases\r\n and the female cross infection reproductive diseases.', 'Gloves mainly used for cattle, buffalo, horses\r\n and asses the rectum palpation, ovaries, pregnancy test,\r\n Obstetric and artificial crown fine, \r\nis to prevent workers suffering from occupational diseases\r\n and the female cross infection reproductive diseases.', NULL, 0.00, '1776864299_featured_4.jpg', 0, 1, 0, '2026-04-22 09:24:59', '2026-04-22 09:24:59'),
(41, 10, 'Straw Cutter', 'straw-cutter-69e8cc9d7f6c9', NULL, 'made with high quality plastic\r\nEasy to use fine quality with sharp edge balde .', 'made with high quality plastic\r\nEasy to use fine quality with sharp edge balde .', NULL, 0.00, '1776864413_featured_5 Straw-Cutter.jpg', 0, 1, 0, '2026-04-22 09:26:53', '2026-04-22 09:26:53'),
(43, 11, 'TPX Syringe', 'tpx-syringe', 'TPX High Temp Syringe', 'High temp resistant syringe with multiple sizes', 'TPX material with high temperature tolerance, acid resistance, alcohol resistance, much longer service time. The syringe fit to needle perfectly for easily and smoothly flowing. It is fit to all kinds of needle too. Inner part is stainless material with clear and durable scale. Sealing gasket is well-sealed, no air and no liquid leakage.', 'SYR-TPX-001', 0.00, '1776866291_featured_1.JPG', 0, 1, 1, '2026-04-22 09:53:38', '2026-04-22 09:58:11'),
(44, 11, 'Plastic Body Transparent Syringe', 'plastic-body-transparent-syringe', 'Transparent Syringe', 'Unbreakable washable syringe', 'Unbreakable washable syringe easy use', 'SYR-PLASTIC-002', 0.00, '1776866221_featured_6.JPG', 0, 1, 2, '2026-04-22 09:54:02', '2026-04-22 09:57:01'),
(45, 12, '...', '69e8d48e43493', NULL, NULL, NULL, NULL, 0.00, '1776866446_featured_39.JPG', 0, 1, 0, '2026-04-22 10:00:46', '2026-04-22 10:00:46'),
(46, 12, '...', '69e8d4a97d4c2', NULL, NULL, NULL, NULL, 0.00, '1776866513_featured_41.JPG', 0, 1, 0, '2026-04-22 10:01:13', '2026-04-22 10:01:53');

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
(26, 18, '1776856398_0_3.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:13:18', '2026-04-22 07:13:18'),
(27, 18, '1776857143_0_3B.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:25:43', '2026-04-22 07:25:43'),
(28, 18, '1776857156_0_3c.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:25:56', '2026-04-22 07:25:56'),
(30, 18, '1776857308_0_4B.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:28:28', '2026-04-22 07:28:28'),
(31, 18, '1776857323_0_4C.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:28:43', '2026-04-22 07:28:43'),
(32, 18, '1776857335_0_4D.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:28:55', '2026-04-22 07:28:55'),
(33, 18, '1776857349_0_4E.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:29:09', '2026-04-22 07:29:09'),
(34, 18, '1776857369_0_4F.jpg', 'Elastrator for castration and  Tail Dock', 0, '2026-04-22 07:29:29', '2026-04-22 07:29:29'),
(35, 19, '1776858307_0_1H.jpg', 'Adjustable Dose DRENCHERS', 0, '2026-04-22 07:45:07', '2026-04-22 07:45:07'),
(36, 20, '1776858475_0_2A.jpg', 'Manual fix  Dose DRENCHERS', 0, '2026-04-22 07:47:55', '2026-04-22 07:47:55'),
(37, 21, '1776858608_0_3.jpg', 'Stainless steel Adjustable Dose DRENCHERS', 0, '2026-04-22 07:50:08', '2026-04-22 07:50:08'),
(38, 22, '1776858736_0_1.JPG', 'ELECTRIC DEHOENER', 0, '2026-04-22 07:52:16', '2026-04-22 07:52:16'),
(39, 23, '1776858805_0_2.JPG', 'ELECTRIC DEHOENER', 0, '2026-04-22 07:53:25', '2026-04-22 07:53:25'),
(40, 24, '1776858902_0_3.jpg', 'BARNES DEHOENER', 0, '2026-04-22 07:55:02', '2026-04-22 07:55:02'),
(41, 25, '1776859159_0_3.JPG', 'Milk Preventer', 0, '2026-04-22 07:59:19', '2026-04-22 07:59:19'),
(42, 26, '1776859307_0_4.jpg', 'Milk Preventer silver', 0, '2026-04-22 08:01:47', '2026-04-22 08:01:47'),
(43, 27, '1776859543_0_5.jpg', 'Milk Preventer', 0, '2026-04-22 08:05:43', '2026-04-22 08:05:43'),
(44, 28, '1776859746_0_1C.JPG', 'MILK SIPHON', 0, '2026-04-22 08:09:06', '2026-04-22 08:09:06'),
(45, 29, '1776859806_0_2.JPG', 'Teat Dilator', 0, '2026-04-22 08:10:06', '2026-04-22 08:10:06'),
(46, 30, '1776859874_0_3A.JPG', 'Teat Tumor Extractor', 0, '2026-04-22 08:11:14', '2026-04-22 08:11:14'),
(47, 30, '1776859892_0_3B.jpg', 'Teat Tumor Extractor', 0, '2026-04-22 08:11:32', '2026-04-22 08:11:32'),
(48, 31, '1776859957_0_4.JPG', 'Teat Dilator', 0, '2026-04-22 08:12:37', '2026-04-22 08:12:37'),
(49, 35, '1776860507_0_1A.JPG', 'BURDIZZO CASTRATION PLIER', 0, '2026-04-22 08:21:47', '2026-04-22 08:21:47'),
(50, 36, '1776860669_0_2A.JPG', '...', 0, '2026-04-22 08:24:29', '2026-04-22 08:24:29'),
(51, 36, '1776860683_0_2B.jpg', '...', 0, '2026-04-22 08:24:43', '2026-04-22 08:24:43'),
(52, 37, '1776863236_0_1A.JPG', 'AI Gun - Conical O-Ring', 0, '2026-04-22 09:07:16', '2026-04-22 09:07:16'),
(53, 37, '1776863252_0_1B.JPG', 'AI Gun - Conical O-Ring', 0, '2026-04-22 09:07:32', '2026-04-22 09:07:32'),
(54, 37, '1776863263_0_1C.JPG', 'AI Gun - Conical O-Ring', 0, '2026-04-22 09:07:43', '2026-04-22 09:07:43'),
(55, 38, '1776864110_0_2.png', 'AI Gun Self-Lock', 0, '2026-04-22 09:21:50', '2026-04-22 09:21:50'),
(56, 39, '1776864221_0_3.png', 'Universal Auto-Lock', 0, '2026-04-22 09:23:41', '2026-04-22 09:23:41'),
(57, 40, '1776864300_0_4A.jpg', 'Disposable Insemination Gloves', 0, '2026-04-22 09:25:00', '2026-04-22 09:25:00'),
(58, 40, '1776864316_0_4B.jpg', 'Disposable Insemination Gloves', 0, '2026-04-22 09:25:16', '2026-04-22 09:25:16'),
(59, 40, '1776864328_0_4C.jpg', 'Disposable Insemination Gloves', 0, '2026-04-22 09:25:28', '2026-04-22 09:25:28'),
(60, 41, '1776864414_0_5 Straw-Cutter.jpg', 'Straw Cutter', 0, '2026-04-22 09:26:54', '2026-04-22 09:26:54'),
(69, 44, '1776866221_0_7.JPG', 'Plastic Body Transparent Syringe', 0, '2026-04-22 09:57:01', '2026-04-22 09:57:01'),
(70, 44, '1776866231_0_8.JPG', 'Plastic Body Transparent Syringe', 0, '2026-04-22 09:57:11', '2026-04-22 09:57:11'),
(71, 43, '1776866291_0_2.JPG', 'TPX Syringe', 0, '2026-04-22 09:58:11', '2026-04-22 09:58:11'),
(72, 43, '1776866303_0_3.JPG', 'TPX Syringe', 0, '2026-04-22 09:58:23', '2026-04-22 09:58:23'),
(73, 45, '1776866487_0_39.JPG', '...', 0, '2026-04-22 10:01:27', '2026-04-22 10:01:27'),
(74, 46, '1776866513_0_41b.JPG', '...', 0, '2026-04-22 10:01:53', '2026-04-22 10:01:53');

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

--
-- Dumping data for table `product_options`
--

INSERT INTO `product_options` (`id`, `product_id`, `option_name`, `sort_order`, `created_at`, `updated_at`) VALUES
(66, 18, 'Standard', 0, '2026-04-22 07:45:35', '2026-04-22 07:45:35'),
(67, 18, 'Large', 1, '2026-04-22 07:45:36', '2026-04-22 07:45:36'),
(68, 18, 'Extra Large', 2, '2026-04-22 07:45:36', '2026-04-22 07:45:36'),
(69, 19, '20 ML', 0, '2026-04-22 07:46:30', '2026-04-22 07:46:30'),
(70, 19, '30 ML', 1, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(71, 19, '50 ML', 2, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(72, 19, '60 ML', 3, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(73, 19, '120 ML', 4, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(74, 19, '150 ML', 5, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(75, 19, '200 ML', 6, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(76, 19, '300 ML', 7, '2026-04-22 07:46:31', '2026-04-22 07:46:31'),
(77, 20, '250 ML', 0, '2026-04-22 07:47:55', '2026-04-22 07:47:55'),
(78, 20, '400 ML', 1, '2026-04-22 07:47:55', '2026-04-22 07:47:55'),
(79, 21, '10 ML', 0, '2026-04-22 07:50:08', '2026-04-22 07:50:08'),
(80, 21, '20 ML', 1, '2026-04-22 07:50:08', '2026-04-22 07:50:08'),
(81, 21, '30 ML', 2, '2026-04-22 07:50:09', '2026-04-22 07:50:09'),
(82, 22, 'L Shape Standard size', 0, '2026-04-22 07:52:16', '2026-04-22 07:52:16'),
(83, 24, '13\"', 0, '2026-04-22 07:55:02', '2026-04-22 07:55:02'),
(84, 24, '17\"', 1, '2026-04-22 07:55:03', '2026-04-22 07:55:03'),
(85, 25, 'Small', 0, '2026-04-22 07:59:19', '2026-04-22 07:59:19'),
(86, 25, 'Medium', 1, '2026-04-22 07:59:19', '2026-04-22 07:59:19'),
(87, 25, 'Large', 2, '2026-04-22 07:59:19', '2026-04-22 07:59:19'),
(88, 26, 'Standard', 0, '2026-04-22 08:01:47', '2026-04-22 08:01:47'),
(89, 27, '2.0  inch', 0, '2026-04-22 08:05:43', '2026-04-22 08:05:43'),
(90, 27, '2.5 inch', 1, '2026-04-22 08:05:43', '2026-04-22 08:05:43'),
(91, 27, '3.0 inch', 2, '2026-04-22 08:05:44', '2026-04-22 08:05:44'),
(92, 27, '3.50 inch', 3, '2026-04-22 08:05:44', '2026-04-22 08:05:44'),
(94, 30, 'Standard', 0, '2026-04-22 08:11:32', '2026-04-22 08:11:32'),
(95, 31, 'Standard', 0, '2026-04-22 08:12:37', '2026-04-22 08:12:37'),
(96, 32, '2 INCH', 0, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(97, 32, '2.5 INCH', 1, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(98, 32, '3.0 INCH', 2, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(99, 32, '3.5 INCH', 3, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(100, 32, '4.0 INCH', 4, '2026-04-22 08:15:02', '2026-04-22 08:15:02'),
(101, 33, '2 INCH', 0, '2026-04-22 08:17:29', '2026-04-22 08:17:29'),
(102, 33, '2.5 INCH', 1, '2026-04-22 08:17:29', '2026-04-22 08:17:29'),
(103, 33, '3.0 INCH', 2, '2026-04-22 08:17:29', '2026-04-22 08:17:29'),
(104, 33, '3.5 INCH', 3, '2026-04-22 08:17:29', '2026-04-22 08:17:29'),
(105, 33, '4.0 INCH', 4, '2026-04-22 08:17:29', '2026-04-22 08:17:29'),
(106, 35, '9 INCH', 0, '2026-04-22 08:21:47', '2026-04-22 08:21:47'),
(107, 35, '12 INCH', 1, '2026-04-22 08:21:48', '2026-04-22 08:21:48'),
(108, 35, '14 INCH', 2, '2026-04-22 08:21:48', '2026-04-22 08:21:48'),
(109, 35, '16 INCH', 3, '2026-04-22 08:21:48', '2026-04-22 08:21:48'),
(110, 35, '19 INCH', 4, '2026-04-22 08:21:48', '2026-04-22 08:21:48'),
(121, 36, '9 INCH', 0, '2026-04-22 08:24:43', '2026-04-22 08:24:43'),
(122, 36, '12 INCH', 1, '2026-04-22 08:24:44', '2026-04-22 08:24:44'),
(123, 36, '14 INCH', 2, '2026-04-22 08:24:44', '2026-04-22 08:24:44'),
(124, 36, '16 INCH', 3, '2026-04-22 08:24:44', '2026-04-22 08:24:44'),
(125, 36, '19 INCH', 4, '2026-04-22 08:24:44', '2026-04-22 08:24:44'),
(132, 37, '0.50cc', 0, '2026-04-22 09:07:43', '2026-04-22 09:07:43'),
(133, 37, '0.25cc', 1, '2026-04-22 09:07:44', '2026-04-22 09:07:44'),
(134, 37, 'Universal', 2, '2026-04-22 09:07:44', '2026-04-22 09:07:44'),
(135, 39, 'Length of Barrel 440 mm', 0, '2026-04-22 09:23:42', '2026-04-22 09:23:42'),
(136, 39, 'Outer Diameter of Barrel 3.70 mm', 1, '2026-04-22 09:23:42', '2026-04-22 09:23:42'),
(137, 39, 'Total Length of Plunger 450 mm', 2, '2026-04-22 09:23:42', '2026-04-22 09:23:42'),
(138, 39, 'Length and other specifications may be customised for bulk orders', 3, '2026-04-22 09:23:42', '2026-04-22 09:23:42'),
(151, 43, '5 ML', 0, '2026-04-22 09:59:11', '2026-04-22 09:59:11'),
(152, 43, '10 ML', 1, '2026-04-22 09:59:11', '2026-04-22 09:59:11'),
(153, 43, '20 ML', 2, '2026-04-22 09:59:11', '2026-04-22 09:59:11'),
(154, 43, '30 ML', 3, '2026-04-22 09:59:12', '2026-04-22 09:59:12');

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
('6sl0eZhOYhPiKQfDdFCZQzjkzso8RQfxqubGn48O', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVzVFcFVkM2Q5YXE0V1huOU1aZ203WkJrQUtCNHNzZjhDTHp2bXFqNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4ucHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1776866526);

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
(4, 'Admin', 'admin@thefarmcare.com', NULL, '$2y$12$s/vn7wIbbldaFYT5tGcV2.nXFC575ywIqUYewtvoXFsRwgE2jU2.6', 1, 'eKZJ2UFWWJCiqMX1zuvGEft9UmTCqSM6uSClcuGT7KBxGt5t5SDTePLN6n7x', '2026-04-05 07:55:42', '2026-04-05 07:55:42', 'user');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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
