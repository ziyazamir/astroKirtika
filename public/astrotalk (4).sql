-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2024 at 05:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrotalk`
--

-- --------------------------------------------------------

--
-- Table structure for table `astrologers`
--

CREATE TABLE `astrologers` (
  `id` bigint UNSIGNED NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_id` int NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `featured` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `astrologers`
--

INSERT INTO `astrologers` (`id`, `phone2`, `user_id`, `profile_image`, `intro_video`, `designation`, `languages`, `total_experience`, `fees`, `visit`, `w_number`, `membership_id`, `country`, `phone_code`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, '2139847', 5, '202404171301.png', '202404171300.mp4', 'master', 'english,hindi', '6', '600', '4', '239897234', 3, 'India', '91', 'active', 1, '2024-04-16 05:59:08', '2024-04-17 07:31:10'),
(2, NULL, 6, '202404162051.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'india', 'new@user.com', 'active', 0, '2024-04-16 13:46:51', '2024-04-23 10:48:28'),
(3, NULL, 7, '202404170654.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'india', '+91', 'active', 1, '2024-04-17 01:05:07', '2024-04-24 12:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `astro_users`
--

CREATE TABLE `astro_users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `link`, `created_at`, `updated_at`) VALUES
(4, '202404181550.jpg', 'https://www.truelancer.com/freelance-project/i-need-to-hire-a-designer-who-can-help-building-my-shopify-shop-uxui-product-design-and-videos-525061', '2024-04-18 10:20:12', '2024-04-18 10:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `astrologer_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `image`, `astrologer_id`, `created_at`, `updated_at`) VALUES
(2, '202404161946.png', 5, '2024-04-16 14:16:45', '2024-04-16 14:16:45'),
(3, '202404162004.png', 5, '2024-04-16 14:34:37', '2024-04-16 14:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `chambers`
--

CREATE TABLE `chambers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chambers`
--

INSERT INTO `chambers` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(0, 'demo', 'demo', NULL, NULL),
(1, 'chamber 2', 'chamber description', '2024-04-16 09:20:25', '2024-04-16 09:28:48'),
(2, 'chamber 3 updated', 'chamber description new', '2024-04-16 09:30:05', '2024-04-16 09:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `chamber_details`
--

CREATE TABLE `chamber_details` (
  `id` bigint UNSIGNED NOT NULL,
  `chamber_id` int NOT NULL,
  `astrologer_id` int NOT NULL,
  `other_chamber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekdays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chamber_details`
--

INSERT INTO `chamber_details` (`id`, `chamber_id`, `astrologer_id`, `other_chamber`, `location`, `city`, `address`, `weekdays`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 0, 5, 'other chamber name', '', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-16 12:12:46', '2024-04-16 12:12:46'),
(2, 1, 5, NULL, '', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-16 12:13:33', '2024-04-16 12:13:33'),
(3, 1, 7, NULL, '', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-17 01:16:22', '2024-04-17 01:16:22'),
(4, 0, 7, NULL, '', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-17 01:17:11', '2024-04-17 01:17:11'),
(5, 0, 7, 'other chamber name', '', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-17 01:17:41', '2024-04-17 01:17:41'),
(6, 1, 5, NULL, 'my location', 'delhi', 'my address', 'weekdays', '12', '10', '2024-04-24 14:13:55', '2024-04-24 14:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `validity`, `price`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Test membership', '30', 200, 'Test description', '2024-04-15 11:25:06', '2024-04-15 11:25:06');

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
(1, '2024_04_03_180758_create_memberships_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(5, '2024_03_15_081932_create_astrologers_table', 3),
(6, '2024_03_16_094711_create_chambers_table', 4),
(7, '2024_04_16_150527_create_chamber_details_table', 5),
(10, '2024_04_16_192516_create_certificates_table', 7),
(11, '2024_04_16_175911_create_paymentsdetails_table', 8),
(13, '2024_04_21_030953_create_ratings_table', 9),
(14, '2024_03_16_123321_create_special_offer_table', 10),
(16, '2024_03_18_095910_create_notifications_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'zsdfg', 'dsfg', 'Astrologer', '2024-04-24 14:30:57', '2024-04-24 14:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentsdetails`
--

CREATE TABLE `paymentsdetails` (
  `id` bigint UNSIGNED NOT NULL,
  `qr_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `astrologer_id` int NOT NULL,
  `googlepay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonepe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentsdetails`
--

INSERT INTO `paymentsdetails` (`id`, `qr_image`, `astrologer_id`, `googlepay`, `paytm`, `phonepe`, `created_at`, `updated_at`) VALUES
(2, '202404171321.png', 5, '123456', '123456', '123456', '2024-04-17 07:51:04', '2024-04-17 09:04:56'),
(3, '202404171433.jpg', 7, '123456', '123456d', '12345', '2024-04-17 09:01:26', '2024-04-17 09:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'AuthToken', '0811541b893339350aeb92969050d1d984017c26f887aee2558b4465c0b99572', '[\"*\"]', NULL, NULL, '2024-03-23 07:04:58', '2024-03-23 07:04:58'),
(2, 'App\\Models\\User', 1, 'AuthToken', '1d7455ff5d5e8e1be72332f27cb74763643ae7a37c119ada8cd5e2cbbe2f0187', '[\"*\"]', NULL, NULL, '2024-04-02 01:07:07', '2024-04-02 01:07:07'),
(3, 'App\\Models\\User', 4, 'AuthToken', 'b4e8a141f76a42cbc4ac7484db31c8e5f536a8d4eccd9fddaa7f51e2140f35d9', '[\"*\"]', NULL, NULL, '2024-04-02 01:56:38', '2024-04-02 01:56:38'),
(4, 'App\\Models\\User', 2, 'AuthToken', '1d373edd3c36496d889e987f240734b9aa78ea806e83d1ffd80e213799ff4a9f', '[\"*\"]', NULL, NULL, '2024-04-02 08:02:24', '2024-04-02 08:02:24'),
(5, 'App\\Models\\User', 4, 'AuthToken', '69af10ae25a9511c68790b73eb1a6ae553c3976215ad80ce25e207f05810bf44', '[\"*\"]', NULL, NULL, '2024-04-02 09:40:50', '2024-04-02 09:40:50'),
(6, 'App\\Models\\User', 2, 'AuthToken', 'f7fc60447e7b8490fe0c592ad530b2207fb0e44b942fb17c0b15508c648421fc', '[\"*\"]', NULL, NULL, '2024-04-02 23:41:10', '2024-04-02 23:41:10'),
(7, 'App\\Models\\User', 1, 'AuthToken', 'fd5c3a6a5da502845f1642b6da5361c6690f07b00959d1e81f582d8d9715306f', '[\"*\"]', NULL, NULL, '2024-04-04 00:19:56', '2024-04-04 00:19:56'),
(8, 'App\\Models\\User', 1, 'AuthToken', '5c3c9b3c333927967a298cf849abe1049f08a657a71ebd26bbbffaddd3ccdda2', '[\"*\"]', NULL, NULL, '2024-04-04 00:25:24', '2024-04-04 00:25:24'),
(9, 'App\\Models\\User', 7, 'AuthToken', 'fdc1c1bcfaa1348463f241f6b4adacd5b1cc1c22f5216fa984a3fdd0ef505308', '[\"*\"]', NULL, NULL, '2024-04-04 01:23:37', '2024-04-04 01:23:37'),
(10, 'App\\Models\\User', 7, 'AuthToken', '907c69350fd4d72bec2fa55679b59f64d0b2938a7297f0bafbb914f515b8a6f3', '[\"*\"]', NULL, NULL, '2024-04-04 01:30:12', '2024-04-04 01:30:12'),
(11, 'App\\Models\\User', 1, 'AuthToken', '1d2c21923f780812ae15cf2d513de67989bad1b57aca2083c746f4c5962c4022', '[\"*\"]', NULL, NULL, '2024-04-10 05:23:42', '2024-04-10 05:23:42'),
(12, 'App\\Models\\User', 8, 'AuthToken', 'e1ca43553a1bbdb0daac9461c373d753961fb9d22b9ea964cf8e315aa09aacb9', '[\"*\"]', NULL, NULL, '2024-04-10 05:26:38', '2024-04-10 05:26:38'),
(13, 'App\\Models\\User', 1, 'AuthToken', 'b7f5b0b4717cdb5268ea0a29d7b48d7c2a68dac4e3e01a21a77bc677f292b5fb', '[\"*\"]', NULL, NULL, '2024-04-11 01:04:19', '2024-04-11 01:04:19'),
(14, 'App\\Models\\User', 8, 'AuthToken', '88f71b374005c3af4a95de6d3aedd8a8fb00ccc98a0485ad6ad00cbbcd3b80db', '[\"*\"]', NULL, NULL, '2024-04-15 11:35:50', '2024-04-15 11:35:50'),
(15, 'App\\Models\\User', 2, 'AuthToken', 'f5503f294029818c56d288b3ed40341718a45298cdb1f1ab5c45554abf17481d', '[\"*\"]', '2024-04-16 05:20:58', NULL, '2024-04-16 04:11:53', '2024-04-16 05:20:58'),
(16, 'App\\Models\\User', 3, 'AuthToken', '7f9f1cfe78d74222ac9bc39f1e2ed5e504f7604821dd3b05120dd89dc4b4886e', '[\"*\"]', NULL, NULL, '2024-04-16 05:00:02', '2024-04-16 05:00:02'),
(17, 'App\\Models\\User', 4, 'AuthToken', '9d9fa5e3c25964a593ca7015618932c29f408b4158e38ebd3515305abdbcce97', '[\"*\"]', '2024-04-16 05:23:08', NULL, '2024-04-16 05:22:52', '2024-04-16 05:23:08'),
(18, 'App\\Models\\User', 5, 'AuthToken', 'ad313744f60e04768c1d484e53dc7a356327f8a5ecb442889fdc0942115a4b52', '[\"*\"]', '2024-04-16 13:45:05', NULL, '2024-04-16 08:26:24', '2024-04-16 13:45:05'),
(19, 'App\\Models\\User', 5, 'AuthToken', '4cf438e2db3ab3536b94eafffd6970b73f01fe105af2bc6b2c9e1174e34cf986', '[\"*\"]', NULL, NULL, '2024-04-16 08:45:42', '2024-04-16 08:45:42'),
(20, 'App\\Models\\User', 6, 'AuthToken', '40fac1a47f65d446040f81807f45d7b3b8c202c0c6bcbd01a9c15175c18a406c', '[\"*\"]', '2024-04-16 13:49:50', NULL, '2024-04-16 13:47:24', '2024-04-16 13:49:50'),
(21, 'App\\Models\\User', 6, 'AuthToken', 'ee9672b6fe5f17de1410f9b81111593a197654c781dbd3a3575cae6c4213c2c7', '[\"*\"]', '2024-04-17 00:58:21', NULL, '2024-04-16 13:49:35', '2024-04-17 00:58:21'),
(22, 'App\\Models\\User', 7, 'AuthToken', '0fb872026d964f79099aec9000c8a1aca6565d6e1c69063eda2e6404fc138d5e', '[\"*\"]', NULL, NULL, '2024-04-17 01:05:29', '2024-04-17 01:05:29'),
(23, 'App\\Models\\User', 7, 'AuthToken', 'f73e275832d61be15b293b4d87881f349b3b34a37205b48b335d3feb22a58a3d', '[\"*\"]', '2024-04-17 09:04:56', NULL, '2024-04-17 01:06:50', '2024-04-17 09:04:56'),
(24, 'App\\Models\\User', 7, 'AuthToken', '3944fc7247f4fc2a47587de8bc805bce45a1a91269bb87ca6a3d7272181b7d94', '[\"*\"]', NULL, NULL, '2024-04-17 01:13:03', '2024-04-17 01:13:03'),
(25, 'App\\Models\\User', 7, 'AuthToken', '8d38658e993fee180e73e5e8f5340047ef1ed08dd80a9a67de15c6c43fc9de6d', '[\"*\"]', NULL, NULL, '2024-04-17 01:28:20', '2024-04-17 01:28:20'),
(26, 'App\\Models\\User', 7, 'AuthToken', '4057474dd074eaef3a6d7c3ad05885bd3063c5ac671628b6539c6ce086d39a08', '[\"*\"]', NULL, NULL, '2024-04-17 01:28:45', '2024-04-17 01:28:45'),
(27, 'App\\Models\\User', 6, 'AuthToken', '9d386d882d22f6db2bbdbf242362cd116e6780544bb803549db94b1998ec5b32', '[\"*\"]', '2024-04-24 15:17:26', NULL, '2024-04-19 12:37:50', '2024-04-24 15:17:26'),
(28, 'App\\Models\\User', 6, 'AuthToken', 'bfd0d7775236590b923f35ac8e89bbebb415f21cff6eb75b10dd18c6b643e333', '[\"*\"]', '2024-04-24 14:37:17', NULL, '2024-04-24 14:06:41', '2024-04-24 14:37:17'),
(29, 'App\\Models\\User', 6, 'AuthToken', '9cb74e975ff63f5a4e121ec70d2f00dfb372a25393ab23c20782879a79d4f8a7', '[\"*\"]', NULL, NULL, '2024-04-24 15:17:26', '2024-04-24 15:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint UNSIGNED NOT NULL,
  `place_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place_image`, `place_heading`, `place_link`, `created_at`, `updated_at`) VALUES
(6, '202404181554.jpg', 'wwer', 'https://www.truelancer.com/freelance-project/i-need-to-hire-a-designer-who-can-help-building-my-shopify-shop-uxui-product-design-and-videos-525061', '2024-04-18 10:24:37', '2024-04-18 10:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `astrologer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `astrologer_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, '8', '6', 5, 'my review', '2024-04-20 21:55:59', '2024-04-20 21:55:59'),
(2, '9', '5', 3, 'my review 2', '2024-04-20 21:55:59', '2024-04-20 21:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, NULL),
(2, 'Astrologer', 'web', NULL, NULL),
(3, 'User', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `special_offers`
--

CREATE TABLE `special_offers` (
  `id` bigint UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `astrologer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_offers`
--

INSERT INTO `special_offers` (`id`, `from_date`, `to_date`, `astrologer_id`, `created_at`, `updated_at`) VALUES
(1, '2024-02-08', '2026-12-12', '7', '2024-04-23 14:12:45', '2024-04-23 14:12:45'),
(2, '2024-04-19', '2024-04-11', '6', '2024-04-23 14:26:57', '2024-04-23 14:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pratik More', 'pratikmore@gmail.com', '7558285177', NULL, '$2y$12$9yASzpDO98TUZGQ.EyujTubt.RxuYgyszC1EON1vH38PUwv6WPLqu', 'admin', 'SecLV8VWYWkRowbBthdYfG2xOyMmPXI55mfZgVHklPCHJfP4TQmOpPo4Uql9', NULL, NULL),
(5, 'ziya zamir', 'ziya1@user.com', '239847', NULL, '$2y$12$6m.pcXw.OBYrpqxiNTHKXeAGy4DUjj4D/MdC0DhtSdVwtU0w6JVqa', 'astrologer', NULL, '2024-04-16 05:59:08', '2024-04-16 08:38:02'),
(6, 'ziya zamir', 'ziya123@user.com', 'new@user.com', NULL, '$2y$12$1l9Y4SNimAsOxWRdQAKhku6h7TsbVONqi/N2L4vPxeGBwYCSxFLDG', 'astrologer', NULL, '2024-04-16 13:46:51', '2024-04-16 13:49:36'),
(7, 'Test Astrologer', 'testastrologer@gmail.com', '1234567890', NULL, '$2y$12$Wo7EK9ZeI3f/B1fljiJdT.a2MnPZSvOtc0srD8rju.BCi5Bm5ztWG', 'astrologer', NULL, '2024-04-17 01:05:07', '2024-04-17 01:28:20'),
(8, 'user1', 'user1@gmail.com', '85875', NULL, 'safer', 'user', NULL, NULL, NULL),
(9, 'user2', 'user2@gmail.com', '345', NULL, '4353', 'user', NULL, NULL, NULL),
(10, 'asdf', 'me@gmail.com', NULL, NULL, NULL, 'user', NULL, '2024-04-24 15:17:26', '2024-04-24 15:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astrologers`
--
ALTER TABLE `astrologers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `astrologers_user_id_foreign` (`user_id`);

--
-- Indexes for table `astro_users`
--
ALTER TABLE `astro_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `astro_users_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chambers`
--
ALTER TABLE `chambers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamber_details`
--
ALTER TABLE `chamber_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `paymentsdetails`
--
ALTER TABLE `paymentsdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_data_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astrologers`
--
ALTER TABLE `astrologers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `astro_users`
--
ALTER TABLE `astro_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chambers`
--
ALTER TABLE `chambers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chamber_details`
--
ALTER TABLE `chamber_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentsdetails`
--
ALTER TABLE `paymentsdetails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `astrologers`
--
ALTER TABLE `astrologers`
  ADD CONSTRAINT `astrologers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
