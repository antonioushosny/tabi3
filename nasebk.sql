-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 03:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasebk`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `title`, `disc`, `zip_code`, `mobile`, `country_id`, `city_id`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'my address', 'this is my address', '423253', '35237592759235', 1, 1, 5, NULL, '2019-04-05 23:49:29', '2019-04-05 23:53:27'),
(3, 'my address', 'this is my address', '423253', '35237592759235', 1, 1, 5, NULL, '2019-04-05 23:50:30', '2019-04-05 23:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `image`, `status`, `created_at`, `updated_at`, `link`, `time`) VALUES
(1, '6ea2de042db17f62905f654332169a97.jpg', 'active', '2019-01-19 19:29:59', '2019-04-06 13:01:12', NULL, NULL),
(4, '427a68239f64979af7afb9e0fca00f38.jpg', 'active', '2019-04-06 13:02:24', '2019-04-06 13:02:24', NULL, NULL),
(5, 'bf2100fafd47b483a00dc99e94ca2d02.jpg', 'active', '2019-04-06 13:03:28', '2019-05-20 21:05:01', 'http://localhost/nasebk/advertisement', '2'),
(6, 'ec4c140f158c08cfe46811ff3f6d657d.jpg', 'active', '2019-05-20 20:58:44', '2019-05-20 20:58:44', 'http://localhost/nasebk/advertisements', '5');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title_ar`, `title_en`, `coupons`, `image`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'مكافاة1', 'awrad', '10', 'gsdgsdgsdgs.png', '2019-04-27T13:00', 'active', '2019-01-25 10:39:04', '2019-04-09 21:57:37'),
(2, 'مكافاة', 'awrad', '3', '368d4143faeeb8bcc20c40544b4ce734.jpg', '2019-04-18T18:00', 'active', '2019-01-25 10:39:04', '2019-04-10 18:01:55'),
(3, 'xfdf', 'sdfsdfsd', '232', 'c75d60b7d31e18f6a75e646173eba368.png', '2019-04-17T01:00', 'active', '2019-04-09 21:42:38', '2019-04-09 21:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_ar` text COLLATE utf8mb4_unicode_ci,
  `disc_en` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `disc_ar`, `disc_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'قسم 1', 'category 1', 'قسم 1 قسم 1 قسم 1', 'category 1 category 1 category 1', '1c0bcfc3adb18b475408c4fb19d8b031.jpg', 'active', '2019-01-19 19:29:59', '2019-04-06 15:02:28'),
(2, 'قسم 2', 'category 2', 'قسم 2 قسم 2 قسم 2', 'category 2 category 2 category 2', 'd6669f3bc31dc001e9debd4a2f0ef760.png', 'active', '2019-01-19 19:29:59', '2019-04-06 15:02:18'),
(3, 'sdfsd', 'fsdfsdf', NULL, NULL, '748fd3160df3fccaf9a5fd6cbeefeaab.png', 'active', '2019-04-06 15:02:10', '2019-04-06 15:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `user_name`, `package`, `points`, `package_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'tony', 'باقة 20', '10', 1, 5, '2019-04-04 15:26:57', '2019-04-04 15:26:57'),
(2, 'tony', 'باقة 30', '15', 2, 5, '2019-04-04 15:28:42', '2019-04-04 15:28:42'),
(3, 'tony', 'باقة 30', '15', 2, 5, '2019-04-10 23:43:28', '2019-04-10 23:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_ar`, `name_en`, `image`, `status`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'الكل', 'all', NULL, 'active', 1, '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(2, 'مدينة2', 'city2', NULL, 'active', 3, '2019-02-11 22:00:00', '2019-02-11 22:00:00'),
(3, 'اسوان', 'Aswan', 'fe184c2f9847466340dd3f9a639402f8.png', 'active', 3, '2019-04-06 14:55:41', '2019-04-06 14:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'teto hosny', 'atony.hosny@gmail.com', 'شكر', 'شكرا لتعب كل من يعمل علي هذا التطبيق الرائع', 'new', '2019-04-04 15:35:05', '2019-04-06 15:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'الكل', 'all', '8f6e0b7ea0df53241f49deb3fe384377.png', 'active', '2019-01-19 19:29:59', '2019-04-06 14:38:55'),
(2, 'السعودية', 'Saudi', '2b631ac7a8be2c61571c0f11c983e2ca.png', 'active', '2019-02-11 22:00:00', '2019-05-22 23:06:52'),
(3, 'مصر', 'Egypt', '0e8f97dbbfac3d365337865d3b3d9439.png', 'active', '2019-04-06 14:39:25', '2019-05-22 23:06:15'),
(4, 'الامارات', 'United Arab Emirates', '77ac63b547a50db37460657e575963ce.png', 'active', '2019-05-22 23:03:30', '2019-05-22 23:05:41'),
(5, 'الكويت', 'Kuwait', '11a8cc49ec56a24eba05880a8bef682a.jpg', 'active', '2019-05-22 23:04:17', '2019-05-22 23:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tickets` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_edit_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tender_coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_ar` text COLLATE utf8mb4_unicode_ci,
  `disc_en` text COLLATE utf8mb4_unicode_ci,
  `info_ar` text COLLATE utf8mb4_unicode_ci,
  `info_en` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `images` text COLLATE utf8mb4_unicode_ci,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `title_ar`, `title_en`, `original_price`, `initial_price`, `points`, `tickets`, `tender_cost`, `tender_edit_cost`, `tender_coupon`, `disc_ar`, `disc_en`, `info_ar`, `info_en`, `image`, `images`, `expiry_date`, `expiry_time`, `status`, `category_id`, `sub_id`, `country_id`, `created_at`, `updated_at`, `city_id`) VALUES
(1, 'صفقه1', 'deal1', '23', '12', '4', '0', '5', '1', '2', 'وصف 1', 'disc 1', 'معلومات1', 'information 1', 'c48089ef865f78faf16cce251c3c7e01.jpg', '[\"dsgsdgsgs.png\",\"sdgsdgsdgsdg.png\"]', '2019-04-10T17:00', NULL, 'active', 2, 4, 1, '2019-01-19 19:29:59', '2019-04-10 19:23:54', NULL),
(2, 'صفقه2', 'deal2', '100', '70', '8', '1', '5', '1', '2', 'وصف 2', 'disc 2', 'معلومات2', 'information 2', '05df25082cf94b2e21824deb404230d5.jpg', '[\"dsgsdgsgs.png\",\"sdgsdgsdgsdg.png\"]', '2019-04-11T13:00', NULL, 'active', 2, 4, 1, '2019-01-19 19:29:59', '2019-04-10 21:50:20', NULL),
(3, 'sdfsdf', 'sdfsd', '63', '4346', '43', NULL, '10', '1', '2', 'rttrfdff', 'hghgh', 'gfghghfghghgh', 'ghgf', 'f8b9510f85b73d39487b5185b53072c4.png', NULL, NULL, NULL, 'active', 1, 1, 3, '2019-04-10 19:39:56', '2019-04-10 22:00:50', NULL),
(4, 'klsdlgj', 'sd;gj', '352', '35', '342', NULL, '3', '10', '2', 'ahf fhag sgsdighsdigh g i', 'kdjf sdsdghs gh', 'lhf sdighsogi hghsg', 'jfj fsjgpj', 'cba34d3539d2fe3d4eb462cbaefd9016.jpg', NULL, '2019-05-23', '19:01', 'active', 1, 1, 1, '2019-05-22 22:08:26', '2019-05-22 22:40:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_ar` text COLLATE utf8mb4_unicode_ci,
  `disc_en` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `image`, `title_ar`, `title_en`, `disc_ar`, `disc_en`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'سياسة الخصوصية ', 'policy', 'سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية ', 'policy policy policy policy policy policy', 'policy', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(2, NULL, 'سياسة الخصوصية', 'policy', 'سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية', 'policy policy policy policy policy policy', 'policy', 'active', '2019-01-19 19:29:59', '2019-04-10 21:32:23'),
(3, NULL, 'الشروط والاحكام', 'terms', 'الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام ', 'terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  ', 'terms', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(4, NULL, 'الشروط والاحكام', 'terms', 'الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام ', 'terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  ', 'terms', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(5, NULL, 'الشروط والاحكام', 'terms', 'الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام الشروط والاحكام ', 'terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  terms  ', 'terms', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(6, NULL, 'عن الشركه', 'about company', 'عن الشركهعن الشركهعن الشركهعن الشركهعن الشركهعن الشركهعن الشركهعن الشركه', 'about company about company about company about company about company about company ', 'about', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(7, NULL, 'شرح خطوات المزاد', 'Explain the steps of the auction  ', 'شرح خطوات المزاد شرح خطوات المزاد شرح خطوات المزاد شرح خطوات المزاد شرح خطوات المزاد شرح خطوات المزاد شرح خطوات المزاد ', 'Explain the steps of the auction  Explain the steps of the auction  Explain the steps of the auction  Explain the steps of the auction  Explain the steps of the auction  Explain the steps of the auction  ', 'about', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `deal_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `deal_id`, `created_at`, `updated_at`) VALUES
(9, 5, NULL, '2019-04-05 11:05:26', '2019-04-05 11:05:26'),
(10, 5, NULL, '2019-04-05 11:05:35', '2019-04-05 11:05:35'),
(11, 5, NULL, '2019-04-05 11:05:47', '2019-04-05 11:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `title_ar`, `title_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'موبايلات', 'mobiles', '2b5cfb4334bf6e977da24b35529cf523.jpg', 'active', '2019-04-22 20:43:14', '2019-04-22 20:43:14'),
(5, 'اكسسوارات', 'accessories', '4134be19655c723522b55941c2fd145e.jpg', 'active', '2019-04-22 20:47:47', '2019-04-22 20:47:47'),
(6, 'الرياضة', 'sports', '02b389c87873353cda2aad517c3d947b.jpg', 'active', '2019-04-22 20:48:17', '2019-04-22 20:48:17');

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
(1, '2012_09_13_092222_create_categories_table', 1),
(2, '2013_09_13_092222_create_countries_table', 1),
(3, '2013_09_13_092222_create_sub_categories_table', 1),
(4, '2014_09_13_092222_create_cities_table', 1),
(5, '2014_10_12_000001_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_09_02_085138_create_notifications_table', 1),
(8, '2018_09_13_093130_create_deals_table', 1),
(9, '2018_09_13_121433_create_tickets_table', 1),
(10, '2018_12_11_214501_create_docs_table', 1),
(11, '2018_12_25_192915_create_packages_table', 1),
(12, '2019_01_27_201810_create_permission_tables', 1),
(13, '2019_02_28_223634_create_charges_table', 1),
(14, '2019_02_28_224107_create_favorites_table', 2),
(15, '2019_02_28_224211_create_awards_table', 2),
(16, '2019_03_22_144614_create_list_chats_table', 2),
(17, '2020_02_28_224211_create_my_awards_table', 2),
(18, '2020_10_12_162016_create_contact_us_table', 2),
(19, '2020_10_18_114701_create_terms_table', 2),
(21, '2018_12_25_192915_create_advertisements_table', 3),
(22, '2015_10_12_000001_create_addresses_table', 4),
(23, '2020_02_28_224211_create_interests_table', 5),
(24, '2021_02_28_224211_create_user_interests_table', 5),
(25, '2019_05_20_223535_add_votes_to_advertisements_table', 6),
(26, '2019_05_22_231449_add_votes_to_deals_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `my_awards`
--

CREATE TABLE `my_awards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0d1ca7b3-fda0-4de9-8b97-2a884e2c0cb1', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":\" \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \",\"type\":\"user\"}', '2019-04-06 09:15:59', '2019-04-03 19:44:42', '2019-04-06 09:15:59'),
('13e1d2bc-8134-4e39-ad54-6f243f0e0678', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:22:55', '2019-04-12 11:22:55'),
('18dc70ba-dce0-4e88-a11c-ff3ade48e888', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":\" \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \",\"type\":\"user\"}', '2019-04-06 09:15:59', '2019-04-03 19:48:46', '2019-04-06 09:15:59'),
('22cb14ca-53d1-4cc4-9245-fee3eb9664ba', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637 \\u0644\\u0643\",\"type\":\"message\"}', NULL, '2019-04-12 11:31:21', '2019-04-12 11:31:21'),
('2cbbbd6c-e1be-4ce8-8aec-0ddbd7b520ff', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":\"\\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637\",\"type\":\"message\"}', NULL, '2019-04-12 11:32:51', '2019-04-12 11:32:51'),
('321a4033-5226-4746-80cf-5133d175f033', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":\" \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \",\"type\":\"user\"}', '2019-04-06 09:15:59', '2019-04-03 19:56:18', '2019-04-06 09:15:59'),
('582b0884-dbaf-440b-8980-cd558002878e', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637 \\u0644\\u0643\",\"type\":\"message\"}', NULL, '2019-04-12 11:31:20', '2019-04-12 11:31:20'),
('5d8007f9-0566-4f71-becb-0cfa2cedf9cb', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:22:54', '2019-04-12 11:22:54'),
('6737384b-35de-48c8-9d46-313f2cdd5a0d', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:23:08', '2019-04-12 11:23:08'),
('6f888cf3-025c-46cc-9c0d-5bc9a13b4c29', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":\" \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \",\"type\":\"user\"}', '2019-04-06 09:15:59', '2019-04-04 23:07:20', '2019-04-06 09:15:59'),
('90cd359b-e472-4fd1-aa37-dbc88596aa62', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":\"\\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637\",\"type\":\"message\"}', NULL, '2019-04-12 11:32:51', '2019-04-12 11:32:51'),
('96ab960e-f555-4fd0-9176-15a0bb3f80a9', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":\" \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \",\"type\":\"user\"}', '2019-04-06 09:15:59', '2019-04-03 19:46:36', '2019-04-06 09:15:59'),
('b6a23d1b-595b-4c9d-ae77-cf3e1cab0552', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:23:07', '2019-04-12 11:23:07'),
('c9a72d43-37ed-4b12-bdb4-25f47ecaf69e', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":\"\\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637\",\"type\":\"message\"}', NULL, '2019-04-12 11:32:51', '2019-04-12 11:32:51'),
('d383e9e4-24eb-454d-bd73-943eb582a74f', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:22:55', '2019-04-12 11:22:55'),
('f2cbbb79-94cb-4ae9-826c-0f313c01d949', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":\"\\u062a\\u0645 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u0646\\u0642\\u0627\\u0637 \\u0644\\u0643\",\"type\":\"message\"}', NULL, '2019-04-12 11:31:19', '2019-04-12 11:31:19'),
('fa7ca789-2c4b-49fa-935c-f992eacbb210', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":\"sdfsdf\",\"type\":\"message\"}', NULL, '2019-04-12 11:23:07', '2019-04-12 11:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title_ar`, `title_en`, `cost`, `points`, `coupons`, `status`, `created_at`, `updated_at`) VALUES
(1, 'باقة 20', 'package 20', '20', '10', '3', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(2, 'باقة 30', 'package 30', '30', '15', '5', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(3, 'باقة 40', 'package 40', '40', '20', '7', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(4, 'باقة  50', 'package 50', '50', '25', '10', 'active', '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(5, 'باقة 100', 'package 100', '100', '20', '10', 'active', '2019-04-06 21:53:14', '2019-04-06 21:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'tony@gmail.com', '282230', '2019-04-03 19:56:18', '2019-04-03 20:39:42'),
(2, 'toney@gmail.com', '864992', '2019-04-04 23:07:20', '2019-04-04 23:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_ar` text COLLATE utf8mb4_unicode_ci,
  `disc_en` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name_ar`, `name_en`, `disc_ar`, `disc_en`, `image`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'قسم فرعي', 'sub category', 'تفاصيل قسم فرعي', 'sub category details', 'hkgjhfgjfjf.png', 'active', 1, '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(2, 'قسم فرعي', 'sub category', 'تفاصيل قسم فرعي', 'sub category details', 'hkgjhfgjfjf.png', 'active', 1, '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(4, 'قسم فرعي', 'sub category', 'تفاصيل قسم فرعي', 'sub category details', 'hkgjhfgjfjf.png', 'active', 2, '2019-01-19 19:29:59', '2019-01-19 12:44:43'),
(5, 'قسم فرعي', 'sub category', 'تفاصيل قسم فرعي', 'sub category details', '0f8a4a9167693fbff8629f2def0386ad.png', 'active', 2, '2019-01-19 19:29:59', '2019-04-06 15:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `deal_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `points`, `status`, `user_id`, `deal_id`, `created_at`, `updated_at`) VALUES
(2, 'tony', '45', '1', 5, 2, '2019-04-05 11:14:58', '2019-04-18 19:51:20'),
(3, 'tony', '70', '1', 5, 1, '2019-04-05 11:14:58', '2019-04-11 21:56:27'),
(4, 'tony', '60', '0', 6, 1, '2019-04-05 11:14:58', '2019-04-10 23:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupons` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) DEFAULT NULL,
  `interested` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `name`, `email`, `password`, `mobile`, `birth_date`, `job`, `gender`, `points`, `coupons`, `image`, `device_token`, `role`, `status`, `available`, `interested`, `type`, `country_id`, `city_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', '$2y$10$MyQjgTe4Bu7QYYIIJ1RiLeZLxY1QT1AZw9VjNDAxb.VQUzKC/vZvG', '0120790836', NULL, NULL, NULL, NULL, NULL, '83d1fece50782847e32428eacf2ebc33.png', NULL, 'admin', 'active', NULL, NULL, NULL, NULL, NULL, 'y9SDVMraG3MM9zgOM342KdxKdo1YVypWPhCizhX7ok6q7zuL2WHuxoQzL3ZN', '2019-01-19 19:29:59', '2019-05-22 18:30:41'),
(5, 'tony_hosny', 'atony', 'atony.hosny@gmail.com', '$2y$10$xmPmjm3qSxzVB4c0aZdFIu9BG.ZaZaUyCdQBe48dO0ssba/0n80FO', '0123456789', '1995-03-29', 'developer', 'male', '39', '14', 'jzKpDwwcjW1555802145.png', 'device_token for firbase gsdgsgsgsdsdgsdgsdg', 'user', 'active', NULL, NULL, 1, 1, 1, 'FYpjh4fg2Z4NDl8gwldAY4YTrMdUjFyDjVMccBNy4e8kwiKuWiMNWwxoGj2k', '2019-04-03 19:56:17', '2019-04-20 23:15:45'),
(6, 'tonye_hosny', 'toeny', 'toney@gmail.com', '$2y$10$TVq7j2Xg0aO5qjwBwSgTYegekhSb/Si8TrVxr.brwQfTUiyO5QCOe', '3215698375', '2019-04-18', 'develeoper', 'male', '15', '2', NULL, 'device_token for firbase gsdgsgsgsdsdgsdgsdg', 'user', 'active', NULL, NULL, 1, 1, 1, 'd8arm8APSTrdbILdrfodg3MK5zXtRHHfnupjXhj3C33BRysYf4hAnXF1G4HF', '2019-04-04 23:07:20', '2019-04-22 22:27:41'),
(7, NULL, 'admin2', 'admin@admin.com', '$2y$10$Xl19tIAOeuRNyx6MGkqYnuV9fEd7.X/g8PXIddfSQenKxYgcWdOT.', NULL, NULL, NULL, NULL, NULL, NULL, '6ef580dbb1b394b98643a476c7a5813d.png', NULL, 'admin', 'active', NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-06 12:47:22', '2019-04-06 12:47:52'),
(8, 'sdfsdf dgds sdg', 'sfdf', 'sdfs@fhdf.dgs', '$2y$10$afewqwk.snZNYCppKXx27eWFw7WhXUgqasywCahVoXhsid33C0be2', '5236233725', '1998-06-17', 'fsdgsd sdg gsdg', 'female', '15', '2', NULL, NULL, 'user', 'active', NULL, NULL, NULL, 3, 3, NULL, '2019-04-06 16:21:36', '2019-04-12 11:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `interest_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`id`, `user_id`, `interest_id`, `created_at`, `updated_at`) VALUES
(10, 6, 4, '2019-04-22 23:41:44', '2019-04-22 23:41:44'),
(11, 6, 5, '2019-04-22 23:41:44', '2019-04-22 23:41:44'),
(12, 6, 6, '2019-04-22 23:41:44', '2019-04-22 23:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_country_id_foreign` (`country_id`),
  ADD KEY `addresses_city_id_foreign` (`city_id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charges_package_id_foreign` (`package_id`),
  ADD KEY `charges_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_category_id_foreign` (`category_id`),
  ADD KEY `deals_sub_id_foreign` (`sub_id`),
  ADD KEY `deals_country_id_foreign` (`country_id`),
  ADD KEY `deals_city_id_foreign` (`city_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
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
-- Indexes for table `my_awards`
--
ALTER TABLE `my_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `my_awards_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_country_id_foreign` (`country_id`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_interests_user_id_foreign` (`user_id`),
  ADD KEY `user_interests_interest_id_foreign` (`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `my_awards`
--
ALTER TABLE `my_awards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_interests`
--
ALTER TABLE `user_interests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `charges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `deals_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `deals_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `deals_sub_id_foreign` FOREIGN KEY (`sub_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `my_awards`
--
ALTER TABLE `my_awards`
  ADD CONSTRAINT `my_awards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `user_interests_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
