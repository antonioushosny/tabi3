-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 10:14 PM
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
-- Database: `tabi3`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_messages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_call` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `without_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `republish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `not_disturb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numbers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favorites` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_id` int(10) UNSIGNED DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `area_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `install` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_advertising` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_benefits` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `cost`, `images`, `video`, `allow_messages`, `allow_call`, `without_number`, `republish`, `not_disturb`, `numbers`, `lat`, `lng`, `views`, `favorites`, `star`, `address`, `status`, `category_id`, `sub_id`, `country_id`, `city_id`, `area_id`, `user_id`, `created_at`, `updated_at`, `from`, `to`, `expiry_date`, `install`, `cost_advertising`, `cost_benefits`, `total`, `disc`) VALUES
(7, 'test', '25', '[\"6392a09e292ccddcf9bac85dd723f5fa.jpg\",\"fd585f321bfa1ff6a5c98aa999b75e11.jpg\"]', NULL, '1', '1', '0', '0', '0', '[\"null\"]', '30.6529035', '31.1236021', '7', '1', '0', 'Unnamed Road, مركز بركة السبع، المنوفية، مصر', 'active', 1, NULL, 2, 1, 3, 5, '2019-12-18 07:58:18', '2019-12-29 22:02:26', NULL, NULL, '2019-12-30', '1', '1.5', '1.0', '2.5', NULL),
(8, 'موبايل ابل', '150', '[\"982131d5f70f61554c2479045cebad70.jpg\",\"754eecae2b60f58fb750ab4ceb7e5434.jpg\",\"e1d42ad3abe3cdc5547e67b6d8b86567.jpg\"]', NULL, '1', '1', '0', '0', '0', '[\"null\"]', '30.6493316', '31.1313437', '28', '1', '0', 'Unnamed Road, هورين، مركز بركة السبع، المنوفية، مصر', 'active', 1, NULL, 2, 1, 3, 5, '2019-12-18 16:44:31', '2019-12-27 03:21:30', NULL, NULL, '2019-12-30', '1', '1.5', '0.5', '2.0', NULL),
(13, 'lab', '250', '[\"a637eae44f7ce46a10255d96b6c87f1b.jpg\"]', NULL, '1', '1', '0', '0', '0', '[\"+96555201718\"]', '29.294911', '47.9664499', '6', '0', '0', 'سينما غرناطة، الكويت‎', 'active', 1, NULL, 2, 1, 3, 6, '2019-12-19 19:18:19', '2019-12-29 15:28:00', NULL, NULL, '2019-12-31', '1', '1.5', '0.5', '2.0', 'Grt'),
(19, 'alarabi tv', '30', '[\"a98923e429f65b5809856d05fddba779.jpg\",\"a98923e429f65b5809856d05fddba779.jpg\"]', NULL, '1', '1', '0', '1', '1', '[\"345345343\",\"434343874\"]', '29.36556124644', '31.210236144455', '8', '1', '0', 'ANY ADDRESS', 'active', 2, 36, 2, 1, 3, 5, '2020-01-01 00:49:18', '2020-01-03 23:32:39', '00:00', '06:00', '2020-01-12', '0', '1.5', '0.0', '1.5', NULL),
(20, 'تست', '250', '[\" 35c3724009b92017bb846ac2339ad65d.jpg\",\"a52b7ad19b32b679f422c3d784549bf0.jpg\"]', NULL, '1', '1', '0', '0', '0', '[\"+201030025254\"]', '30.6482823', '31.1317661', '7', '1', '0', 'Unnamed Road, هورين، مركز بركة السبع،، هورين، مركز بركة السبع، المنوفية، مصر', 'active', 2, 91, 2, 1, 3, 5, '2020-01-01 01:02:08', '2020-01-15 20:49:37', NULL, NULL, '2020-01-12', '1', '1.5', '1.5', '3.0', 'تست'),
(21, 'سيارة سبورتاج', '2500', '[\"fe2772136c4754a0f2526d98c90b5895.jpeg\"]', NULL, '1', '1', '0', '0', '0', '[\"+201030025254\"]', '30.6521469', '31.130844', '8', '2', '1', 'هورين، بركة السبع،، هورين، مركز بركة السبع، المنوفية، مصر', 'active', 2, 90, 2, 2, 3, 5, '2020-01-01 01:09:30', '2020-01-15 20:49:33', NULL, NULL, '2020-01-12', '1', '1.5', '3.5', '5.0', 'سيارة مستعملة هونداي سبورتاج'),
(22, 'شركة عقيل العقارية', NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 3, NULL, 2, NULL, NULL, NULL, '2020-01-14 21:39:32', '2020-01-15 19:57:51', NULL, NULL, '2020-01-31', NULL, NULL, NULL, NULL, NULL),
(23, 'جدول اسعار المصاعد', NULL, '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, NULL, 2, NULL, NULL, NULL, '2020-01-14 21:40:22', '2020-01-15 19:54:25', NULL, NULL, '2020-01-31', NULL, NULL, NULL, NULL, NULL),
(24, 'الوردة الشامية', NULL, '[\"bcb0cbe72fa94affe64892de02f53a46.jpeg\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 4, NULL, 2, NULL, NULL, NULL, '2020-01-15 19:57:11', '2020-01-15 19:57:12', NULL, NULL, '2020-01-31', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `country_d` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `title_ar`, `title_en`, `image`, `status`, `country_d`, `city_id`, `created_at`, `updated_at`) VALUES
(3, 'الكويت', 'Kuwait', NULL, 'active', NULL, 1, '2019-12-31 22:00:29', '2019-12-31 22:00:29'),
(4, 'دسمان', 'Dasman', NULL, 'active', NULL, 1, '2019-12-31 22:01:23', '2019-12-31 22:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_ar`, `title_en`, `cost`, `days`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'البيع والشراء', 'Buying and selling', '1.5', '12', 'b0408c81105e60e9f235cff0125f4358.jpg', 'active', '2019-09-06 22:00:00', '2019-12-25 23:50:24'),
(2, 'محركات', 'Engines', '1.5', '12', '88afa0c764f2d11f9c267bfa9d80c7ec.jpg', 'active', '2019-09-16 17:45:14', '2019-11-08 19:15:07'),
(3, 'عقارات', 'Buildings', '1.5', '21', 'ee152c9f380dd25faa282fd9b89e6949.png', 'active', '2019-09-16 17:45:38', '2019-12-24 05:03:51'),
(4, 'الخدمات', 'Services', '1.5', '23', '0dfaea2a3c2880ca207a8c9c11ae5b47.png', 'active', '2019-09-16 17:46:07', '2019-11-08 19:22:32'),
(6, 'الحيوانات', 'animals', '1.5', '31', 'd9d87db60d17749429139626710502bc.jpg', 'active', '2019-09-16 17:47:04', '2019-11-08 19:13:57'),
(8, 'الوظائف', 'jobs', '1.5', '41', '8439db4b7c608387bf823a42b9040554.png', 'active', '2019-09-16 17:47:48', '2019-11-08 19:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 9, 'صباح الفل', '2019-12-27 01:48:12', '2019-12-29 15:29:17'),
(2, 10, 3, 'السلام عليكم ورحمة الله وبركاته', '2019-12-29 05:40:16', '2019-12-29 05:40:16'),
(3, 11, 3, 'Hi', '2019-12-29 13:45:52', '2019-12-29 13:45:52'),
(4, 5, 3, 'هاي', '2019-12-29 15:27:17', '2019-12-29 15:27:17'),
(5, 5, 6, 'مساء الخير', '2019-12-29 15:28:09', '2020-01-01 03:04:46'),
(6, 5, 11, 'السلآم عليكم ورحمة الله وبركاته لقد قرات طلبك و ان شاء الله قادر علي تنفيذه بكل دقة', '2019-12-29 22:02:36', '2020-01-01 02:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title_ar`, `title_en`, `image`, `status`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'مدينة الكويت', 'Kuwait City', NULL, 'active', 2, '2019-09-08 19:20:58', '2019-12-23 20:13:27'),
(2, 'الفروانية', 'Farwaniya', NULL, 'active', 2, '2019-12-23 20:14:47', '2019-12-23 20:14:47'),
(3, 'الجهراء', 'Al Jahra', NULL, 'active', 2, '2019-12-23 20:15:53', '2019-12-23 20:15:53'),
(4, 'حولي', 'Hawally', NULL, 'active', 2, '2019-12-23 20:16:42', '2019-12-23 20:16:42'),
(5, 'الأحمدي', 'Al Ahmadi', NULL, 'active', 2, '2019-12-23 20:17:33', '2019-12-23 20:17:33'),
(6, 'مبارك الكبير', 'Mubarak Al-Kabeer', NULL, 'active', 2, '2019-12-23 20:18:39', '2019-12-23 20:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snapchat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'eng.aboali712@gmail.com', 'test', 'menofia', 'new', '2019-12-19 01:42:11', '2019-12-19 01:42:11'),
(2, 'مشعل', 'fncr79@gmail.com', 'ali', 'asd', 'new', '2019-12-21 05:05:58', '2019-12-21 05:05:58'),
(3, 'فهد', 'fncr79@gmail.com', 'استفسار', 'الاعلانات', 'new', '2020-01-04 10:57:55', '2020-01-04 10:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title_ar`, `title_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'الكويت', 'Kuwait', '191d2267f7d965dbb4eebca31fb25790.jpg', 'active', '2019-09-08 19:02:48', '2019-11-09 19:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `delegates`
--

CREATE TABLE `delegates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delegates`
--

INSERT INTO `delegates` (`id`, `name`, `image`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 'احمد محمد حامد', '7d521be96abbaf06d8fa5d0a6bc301e9.png', '012487845177', 'active', '2019-09-14 20:18:50', '2019-09-14 20:18:50'),
(3, 'محمود علي حسن', 'd6438cc835e46a10b59a8153a300dcba.jpg', '5787484524', 'active', '2019-09-14 20:21:13', '2019-09-14 20:21:13'),
(4, 'عز الدين', '183db003b3fc9a621835877fcf07a568.jpg', '66600012', 'active', '2019-12-31 19:16:22', '2019-12-31 19:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `delegate_locations`
--

CREATE TABLE `delegate_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` int(10) UNSIGNED DEFAULT NULL,
  `delegate_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delegate_locations`
--

INSERT INTO `delegate_locations` (`id`, `location_id`, `delegate_id`, `created_at`, `updated_at`) VALUES
(12, 7, 4, '2020-01-03 20:42:35', '2020-01-03 20:42:35');

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
(1, NULL, 'معلومات عنا', 'information about us', '<p>&nbsp;عنا معلومات عنا معلومات عنا معلومات عنا معلومات عنا معلومات &nbsp;</p>\r\n\r\n<p>&nbsp;عنا معلومات عنا معلومات عنا معلومات عنا معلومات عنا معلومات &nbsp;</p>', '<p>information about us&nbsp;information about us&nbsp;information about us&nbsp;</p>\r\n\r\n<p>information about us&nbsp;information about us&nbsp;information about us&nbsp;</p>', 'about', 'active', NULL, '2019-09-16 22:01:23'),
(4, NULL, 'شروط واحكام استخدام  تبيع T-be3', 'Terms and conditions of use T-be3', '<h2>شروط وأحكام استخدام ( تبيع T-be3)</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>مرحبا بكم في (&nbsp;تبيع T-be3) فضلا قراءة الشروط والأحكام بعناية قبل استخدام الموقع الإلكتروني أو التطبيق، تصفحك أو إضافة أي إعلان لدينا يعتبر إقرار منك بقراءة الشروط والأحكام والموافقة عليها.</p>\r\n\r\n<p>تمتلك شركة AAP LIFE تطبيق و موقع (&nbsp;تبيع T-be3) و هي منصة توفر مساحة للإعلانات لمستخدميها (البائعين والمشترين)، ويقتصر دور (&nbsp;تبيع T-be3) على توفير مساحة لالتقاء البائع والمشتري بصورة ميسرة، ولا تتحمل (&nbsp;تبيع T-be3) أي مسئولية ولا توفر أي ضمان اتجاه المستخدمين بما يتعلق بعمليات البيع والشراء وجودة المنتجات، ولا يتم الرجوع عليها للمطالبة بالتعويض عن أي خسائر.&nbsp;</p>\r\n\r\n<h2>تعليمات وقواعد نشر الإعلان:</h2>\r\n\r\n<ul>\r\n	<li>يتم إدراج الإعلانات بعد التسجيل برقم الهاتف المحمول والبريد الإلكتروني.</li>\r\n	<li>يجب على المعلن تصنيف الإعلان ونشره تحت القسم الصحيح.</li>\r\n	<li>يجب كتابة عنوان للإعلان ووصف المنتج والسعر وإضافة الصور بشكل صحيح ويجب أن تكون السلعة حقيقة وموجودة.</li>\r\n	<li>يجب أن يكون المعلن هو صاحب السلعة أو الخدمة.</li>\r\n	<li>يحظر نشر إعلانات تحتوي على ألفاظ أو صور مخالفة للآداب العامة أو غير قانونية.</li>\r\n	<li>يحظر نشر إعلانات بيع الأسلحة بجميع أنواعها سواء كانت مرخصة أو غير مرخصة.</li>\r\n	<li>يكون كل إعلان لسلعة واحدة فقط، وبحال تعدد السلع فيتم إنشاء إعلان مستقل لكل سلعة.</li>\r\n	<li>الإعلانات تكون بصفة شخصية ويمنع نشر إعلانات بصفة تجارية أو نيابة عن الغير، ويمنع نشر الإعلانات الخاصة بالشركات أو المتاجر.</li>\r\n	<li>يمنع نشر الإعلانات الخاصة بالمحامين والتي تهدف لإعلان المحامي عن نفسه أو العمل على جلب الموكلين.</li>\r\n	<li>يحظر نشر الإعلانات المخالفة للقوانين في دولة منشئ الإعلان، وكذلك يحظر نشر الإعلانات المخالفة للقوانين في دولة الكويت وخاصة للقانون رقم 63 لسنة 2015 بشأن مكافحة الجرائم الإلكترونية، والقانون رقم 38 لسنة 2002 بشأن تنظيم إعلان المواد المتعلقة بالصحة، ويحظر نشر إعلانات الأدوية والمنشطات الجنسية.</li>\r\n	<li>يحظر عرض وبيع أجهزة التنصت و وسائل التحريض على إساءة استعمال أجهزة الهاتف، وذلك بحسب القانون رقم 9 لسنة 2001 بشأن إساءة استعمال أجهزة الاتصالات الهاتفية وأجهزة التنصت.</li>\r\n	<li>يحظر الإعلان عن سداد القروض والتكييش، وكذلك يحظر الإعلان عن الشقق المفروشة بالساعات أو الإيجار اليومي لغير الشركات المرخص لها بذلك، وتحظر جميع إعلانات جلب الاستثمار والدعوة للاستثمار والمشاركة التجارية ، وكذلك يمنع نشر إعلانات العمالة الوهمية أو تأجير العمالة للمنازل في الساعات.</li>\r\n	<li>تحتفظ إدارة ( &nbsp;تبيع T-be3) بحق حظر أي رقم هاتف يستخدم التطبيق في الإساءة أو الأضرار بالغير أو بحال استخدام التطبيق لأغراض غير قانونية.</li>\r\n	<li>يراعي المستخدم احترام المتصفحين والمستخدمين الآخرين.</li>\r\n	<li>يمنع حجز الإعلانات أو حجز التثبيت بغرض بيعها لطرف آخر.</li>\r\n	<li>يتحمل المستخدم ناشر الإعلان أي مسائلة قانونية أو أي تعويض دون ادني مسئولية على (&nbsp;تبيع T-be3).</li>\r\n	<li>لإدارة ( &nbsp;تبيع T-be3) الحق بمنع أي مستخدم لا يتوافق مع شروط التطبيق.</li>\r\n</ul>\r\n\r\n<h2>إزالة الإعلانات والتعليقات المخالفة - انتهاء مدة الإعلان:</h2>\r\n\r\n<ul>\r\n	<li>مدة الإعلانات المجانية &ndash; إن وجدت-خمسة أيام.</li>\r\n	<li>يتم إزالة الإعلان تلقائيا من التطبيق بعد انتهاء الفترة الزمنية المحددة من قبل إدارة (&nbsp;تبيع T-be3)</li>\r\n	<li>يتم إزالة الإعلانات المخالفة دون إبلاغ المستخدم المخالف ودون تعويضه، ويحق لإدارة التطبيق منع المستخدم المسيء والمخالف من استرداد قيمة الرصيد المتبقي.</li>\r\n	<li>عند إلغاء الإعلان لن تستطيع مشاهدته بصفحة (قائمتي).</li>\r\n	<li>يحق لإدارة ( &nbsp;تبيع T-be3 ) منع أي مستخدم ينشر إعلان مخالف أو يضيف تعليقات مسيئة للغير في الرسائل الخاصة أو عن طريق (اللايف شات)، ويحق لإدارة التطبيق منع المخالف من استخدام التطبيق بشكل مؤقت أو نهائي.</li>\r\n</ul>\r\n\r\n<h2>الحقوق المالية:</h2>\r\n\r\n<ul>\r\n	<li>قيمة الإعلان المدفوع (1.500) دينار وخمسمائة فلس كويتي لمدة (10) أيام.</li>\r\n	<li>تضاف قيمة أي مميزات أخرى على قيمة الإعلان.</li>\r\n	<li>- عند استخدام الكي نت لدفع قيمة الإعلان يجب الاحتفاظ بسجل للدفع، وبحالة عدم إضافة الرصيد تلتزم إدارة ( &nbsp;تبيع T-be3) بتعويض المستخدم بحال وجود دليل على إتمام عملية السداد وخصم المبلغ من الحساب المصرفي للمستخدم.</li>\r\n	<li>بإمكان المستخدم الدفع نقداً عن طريق المندوبين الخاصين بتطبيق (&nbsp;تبيع T-be3) الذين يغطون كافة مناطق دولة الكويت، علماً بأن إرسال المندوب يكون عند طلب شراء رصيد إعلانات يتجاوز خمسة دنانير كويتي كحد أدنى.</li>\r\n	<li>استرجاع قيمة الإعلان لا يتم إلا بحال ثبت وجود خلل في النظام تم بعد السداد.</li>\r\n	<li>لا يتم استرداد قيمة الإعلانات المخالفة.</li>\r\n	<li>بعد شراء الرصيد لا يحق للمستخدم استراد قيمة الرصيد المتوفر.</li>\r\n</ul>\r\n\r\n<h2>خدمة الحرفي:</h2>\r\n\r\n<p>بالنسبة للباحثين عن الخدمة:</p>\r\n\r\n<p>بالنسبة للحرفيين المعتمدين :</p>\r\n\r\n<ul>\r\n	<li>\r\n	<ul>\r\n		<li>الحرفي المعتمد هو مجرد مستخدم قدم لنا بياناته الشخصية وتوقيعه لذلك إدارة &nbsp;تبيع T-be3ليست مسئولة عن نقص ودقة وصلاحية تلك المعلومات المقدمة أو أي شكوى على الملف الشخصي للحرفي ، كما أننا لسنا مسئولين عن مستوى جودة الخدمة المقدمة من الحرفي المعتمد فهو مسئول مسئولية كاملة عن ذلك</li>\r\n		<li>علاوة على ذلك إدارة &nbsp;تبيع T-be3ليست مسئولة عن أي خسارة أو ضرر لأي مواد أو أشخاص نتيجة للاتفاق مع الحرفي المعتمد . يجب على الباحثين عن الحرفيين المعتمدين الحذر والانتباه الدائم عند التعامل مع أي الحرفيين المعتمدين.</li>\r\n		<li>لتوفير ثقة أكبر بخدمة الحرفي المعتمد يتم الاحتفاظ بصورة عن البطاقة المدنية للحرفي المعتمد لدينا مع توقيعه على الموافقة على جميع القواعد والشروط ، في حال وجود طلب رسمي من الجهات الحكومية فقط يتم تزويدها بهذه البيانات حسب القانون الكويتي.</li>\r\n	</ul>\r\n\r\n	<ul>\r\n		<li>الحرفي المعتمد فقط هو المسئول عن صلاحية ودقة المعلومات التي تم إدخالها بالملف الشخصي. إدارة &nbsp;تبيع T-be3لديها الحق بحظر بأي حرفي معتمد بدون إعادة أي أموال له في حال تقديمه بيانات خاطئة أو غير دقيقة</li>\r\n		<li>إدارة &nbsp;تبيع T-be3لديها الحق بحظر حساب أي حرفي معتمد بدون إعادة أي أموال له في حال استمرار تقييمه بصورة سيئة أو استمرار تقديم شكاوي ضده</li>\r\n		<li>إدارة &nbsp;تبيع T-be3ملتزمة تماما بالقانون الكويتي بما في ذلك تسليم المعلومات المتوفرة للحرفي المعتمد إذا طلبت السلطات ذلك.</li>\r\n		<li>تخضع شروط الاستخدام هذه للتغيير في أي وقت دون إشعار مسبق</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<h2>الخصوصية ومشاركة بيانات المستخدمين:</h2>\r\n\r\n<p>يحرص (&nbsp;تبيع T-be3) على سرية بيانات المستخدمين، ولا يتم مشاركة البيانات إلا في حدود المسموح به من قبل البائعين عند نشر كل إعلان على حده، ويكون ذلك عبر كتابة البيانات المطلوبة في الحقول الخاصة بالتواصل مثل رقم الهاتف والبريد الإلكتروني، ويراعى عدم نشر أي إعلانات تخالف قوانين دولة الكويت، ويوافق المستخدم عند نشر إعلان مخالف للقوانين المعمول بها في دولة الكويت أو إضافة تعليقات عن طريق الرسائل الداخلية أو (اللايف شات) على تزويد بياناته للجهات الحكومية المختصة بحال تم طلبها من ( &nbsp;تبيع T-be3)، وبموجب التعاون الجيد والمستمر بين إدارة مكافحة الجرائم الإلكترونية بدولة الكويت وبين إدارة ( &nbsp;تبيع T-be3) فسيتم إبلاغهم بأي إعلان مخالف لقوانين دولة الكويت، ويراعي المستخدمين عدم الاعتداء على حقوق الملكية الفكرية والعلامات التجارية الخاصة بالآخرين، وعدم الإساءة لهم عبر المشاركات في الرسائل الداخلية والتعليقات أو عبر نشر إعلانات مسيئة أو عن طريق )اللايف شات(، وبحال ثبت لـ( &nbsp;تبيع T-be3) ذلك فيحق لنا تزويد الأطراف المتضررة ببيانات المستخدم المخالف بحال تم طلب بياناته.</p>\r\n\r\n<h2>حقوق الملكية الفكرية:</h2>\r\n\r\n<ul>\r\n	<li>تمتلك ( &nbsp;تبيع T-be3) وشركة APP LIFEكافة حقوق الملكية الفكرية المتعلقة بالتطبيق وكذلك كافة محتويات التطبيق بما في ذلك البيانات والصور والمحتويات الفكرية بكافة أشكالها الموجودة على التطبيق وعلى الموقع الإلكتروني.</li>\r\n	<li>لا يجوز باي حال من الأحوال محاولة اقتباس محتوى التطبيق اقتباسا كاملا أو بطريقة آلية أو جزء جوهري منه. كما يحظر استخدام محتوى هذا التطبيق ضمن أي عمل فكرى أخر أو تضمينه في قاعدة بيانات إلكترونية. كما يحظر تماما أيضا إعادة بيع محتويات هذا التطبيق أو توزيعه أو التعديل علية أو ترجمته أو إعادة هندسته بأي صورة. كما تحتفظ ( &nbsp;تبيع T-be3) وشركة APP LIFEبكامل الحق في أن تضع من القيود ما يلزم لمنع أي شخص أو موقع إلكتروني آخر من ربط أو اقتباس محتوى هذا التطبيق.</li>\r\n	<li>كما يحظر إعادة هندسة أو تفكيك البرنامج المستخدم في التطبيق بهدف الوصول إلى برنامج المصدر أو الشفرة الأصلية لهذا البرنامج أو الوصول إلى البنية الأصلية لهذا التطبيق.</li>\r\n</ul>\r\n\r\n<h2>التنازل عن الإعلانات والصور المنشورة:</h2>\r\n\r\n<ul>\r\n	<li>يعتبر المستخدم متنازلاً عن الإعلان والصور المرفقة به فور رفعه على التطبيق.</li>\r\n	<li>تحتفظ إدارة ( &nbsp;تبيع T-be3) بحقها في إعادة استخدام الصور المنشورة في الإعلانات بالشكل الذي تراه مناسب.</li>\r\n</ul>\r\n\r\n<h2>التعديل على الشروط والأحكام:</h2>\r\n\r\n<p>يحق لـ( &nbsp;تبيع T-be3) تعديل شروط وأحكام الاستخدام الخاصة بها في أي وقت، وتصبح مثل هذه التعديلات نافذة بمجرد نشرها على تطبيق. وعلى المستخدمين الاطلاع على شروط وأحكام الاستخدام هذه دورياً لغايات مراجعة أي تعديلات تطرأ عليها. ويعتبر استمرار المستخدم باستخدام التطبيق بعد إجراء التعديلات على الشروط والأحكام يعتبر موافقة صريحة منه على تلك التعديلات.</p>', '<p>شروط واحكام استخدام تبيع&nbsp;شروط واحكام استخدام تبيع&nbsp;شروط واحكام استخدام تبيع&nbsp;شروط واحكام استخدام تبيع&nbsp;شروط واحكام استخدام تبيع&nbsp;شروط واحكام استخدام تبيع&nbsp;</p>', 'terms', 'active', '2019-09-16 21:31:18', '2019-12-23 21:01:03'),
(5, NULL, 'اعلانك سيكون في اعلي الاعلانات لمدة 24 ساعة', 'Your ad will be on top of the ads for 24 hours', '1.5', NULL, 'install', 'active', '2019-09-18 21:44:18', '2019-12-31 19:37:50'),
(6, NULL, 'اعرض اعلانك بطريقة الصور المتحركة', 'Display your ad in an animated way', '1.5', NULL, 'star', 'active', '2019-09-18 21:47:44', '2019-09-18 21:47:44'),
(7, NULL, 'طريقة عرض افضل لاعلانك', 'A better way to display your ad', '0.5', NULL, 'uploade_video', 'active', '2019-09-18 21:50:15', '2019-09-18 22:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `ad_id`, `created_at`, `updated_at`) VALUES
(13, 5, 8, '2019-12-18 23:11:44', '2019-12-18 23:11:44'),
(14, 5, 7, '2019-12-18 23:24:00', '2019-12-18 23:24:00'),
(16, 5, 21, '2020-01-01 01:38:25', '2020-01-01 01:38:25'),
(17, 11, 21, '2020-01-01 02:12:15', '2020-01-01 02:12:15'),
(19, 8, 20, '2020-01-01 13:08:53', '2020-01-01 13:08:53'),
(20, 8, 19, '2020-01-02 12:56:40', '2020-01-02 12:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title_ar`, `title_en`, `image`, `status`, `country_id`, `created_at`, `updated_at`) VALUES
(7, 'مدينة الكويت', 'kuwait', NULL, 'active', 2, '2020-01-01 19:08:39', '2020-01-01 19:08:39'),
(8, 'الجهراء', 'jahra', NULL, 'active', 2, '2020-01-01 19:09:08', '2020-01-01 19:09:08'),
(9, 'الفروانية', 'farwaniya', NULL, 'active', 2, '2020-01-01 19:11:08', '2020-01-01 19:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `sender_id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 5, 'اهلا بكم ا', '2019-12-27 01:48:12', '2019-12-27 01:48:12'),
(2, 1, 9, 5, 'السلام عليكم و رحمة  الله', '2019-12-27 03:22:04', '2019-12-27 03:22:04'),
(3, 1, 9, 5, 'اهلا بكم ا', '2019-12-29 01:00:02', '2019-12-29 01:00:02'),
(4, 1, 5, 9, 'اهلا بحضرتك\nاتفضل معك ؟', '2019-12-29 01:07:41', '2019-12-29 01:07:41'),
(5, 1, 5, 9, 'الجهاز متاح الان', '2019-12-29 01:22:02', '2019-12-29 01:22:02'),
(6, 1, 5, 9, 'ممكن حضرتك تبعت تاني لو عايز تجرب', '2019-12-29 01:26:07', '2019-12-29 01:26:07'),
(7, 1, 5, 9, 'ازيك يا امير', '2019-12-29 01:29:35', '2019-12-29 01:29:35'),
(8, 1, 9, 5, 'بكم ا', '2019-12-29 01:36:26', '2019-12-29 01:36:26'),
(9, 1, 9, 5, 'معك امير', '2019-12-29 01:45:38', '2019-12-29 01:45:38'),
(10, 1, 9, 5, 'ممكن اخر سعر ؟', '2019-12-29 01:49:25', '2019-12-29 01:49:25'),
(11, 1, 9, 5, 'و العدد المتاح كام ؟', '2019-12-29 01:49:53', '2019-12-29 01:49:53'),
(12, 1, 9, 5, 'حضرتك لسه معايا', '2019-12-29 01:52:03', '2019-12-29 01:52:03'),
(13, 1, 5, 9, 'ايوا ٦ عدد', '2019-12-29 01:52:56', '2019-12-29 01:52:56'),
(14, 1, 9, 5, 'كويس جدا', '2019-12-29 01:56:50', '2019-12-29 01:56:50'),
(15, 1, 9, 5, 'نعم', '2019-12-29 03:09:32', '2019-12-29 03:09:32'),
(16, 2, 10, 3, 'السلام عليكم ورحمة الله وبركاته', '2019-12-29 05:40:16', '2019-12-29 05:40:16'),
(17, 1, 9, 5, 'طب الحمدلله', '2019-12-29 06:54:00', '2019-12-29 06:54:00'),
(18, 1, 5, 9, 'الحمدلله', '2019-12-29 06:54:55', '2019-12-29 06:54:55'),
(19, 3, 11, 3, 'Hi', '2019-12-29 13:45:52', '2019-12-29 13:45:52'),
(20, 4, 5, 3, 'هاي', '2019-12-29 15:27:17', '2019-12-29 15:27:17'),
(21, 5, 5, 6, 'سلام عليكم ورحمة الله وبركاته', '2019-12-29 15:28:09', '2019-12-29 15:28:09'),
(22, 1, 5, 9, 'صباح الفل', '2019-12-29 15:29:17', '2019-12-29 15:29:17'),
(23, 6, 11, 5, 'السلام عليكم', '2019-12-29 22:02:36', '2019-12-29 22:02:36'),
(24, 6, 5, 11, 'مين صبري', '2019-12-29 22:03:27', '2019-12-29 22:03:27'),
(25, 6, 5, 11, 'اهلا بحضرتك يا افندم', '2019-12-29 22:06:42', '2019-12-29 22:06:42'),
(26, 6, 11, 5, 'هلا والله بالحبيب', '2019-12-29 22:38:54', '2019-12-29 22:38:54'),
(27, 6, 5, 11, 'السلآم عليكم ورحمة الله وبركاته لقد قرات طلبك و ان شاء الله قادر علي تنفيذه بكل دقة', '2020-01-01 02:18:53', '2020-01-01 02:18:53'),
(28, 5, 5, 6, 'مساء الخير', '2020-01-01 03:04:46', '2020-01-01 03:04:46');

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
(29, '2014_05_28_123026_create_categories_table', 1),
(30, '2014_05_28_123027_create_sub_categories_table', 1),
(31, '2014_05_28_123028_create_countries_table', 1),
(32, '2014_05_28_123029_create_cities_table', 1),
(33, '2014_05_28_123030_create_areas_table', 1),
(34, '2014_10_12_000001_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2015_10_12_000001_create_payments_table', 1),
(37, '2018_09_02_085138_create_notifications_table', 1),
(38, '2018_12_11_214501_create_docs_table', 1),
(39, '2018_12_25_192915_create_advertisements_table', 1),
(40, '2019_01_27_201810_create_permission_tables', 1),
(41, '2019_05_24_171050_create_contacts_table', 1),
(42, '2019_05_28_123026_create_delegates_table', 1),
(43, '2020_10_12_162016_create_contact_us_table', 1),
(46, '2019_09_16_220945_create_locations_table', 2),
(47, '2019_09_16_221706_create_delegate_locations_table', 2),
(48, '2019_09_16_234147_add_votes_to_advertisements_table', 3),
(49, '2019_09_18_173139_add_votes_to_users_table', 3),
(50, '2019_09_18_210032_add_votes_to_advertisements_table', 4),
(52, '2019_09_19_234140_add_votes_to_advertisements_table', 5),
(53, '2019_09_22_204845_create_favourites_table', 6),
(54, '2019_09_22_205030_create_views_table', 6);

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
('00a7f968-671a-44f1-8d7f-9d769a3d1f7f', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648 \\u0631\\u062d\\u0645\\u0629  \\u0627\\u0644\\u0644\\u0647\",\"ar\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648 \\u0631\\u062d\\u0645\\u0629  \\u0627\\u0644\\u0644\\u0647\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-27 03:22:04', '2019-12-27 03:22:04'),
('0427169f-75c6-4cf8-b06d-c8cd05eca00a', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('057d3f61-ef3a-4e27-8291-1f5d1f1c7815', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0628\\u0643\\u0645 \\u0627\",\"ar\":\"\\u0628\\u0643\\u0645 \\u0627\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:36:26', '2019-12-29 01:36:26'),
('065c07d1-9bc9-41ba-a24a-144d8e38f6cf', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0635\\u0628\\u0627\\u062d \\u0627\\u0644\\u0641\\u0644\",\"ar\":\"\\u0635\\u0628\\u0627\\u062d \\u0627\\u0644\\u0641\\u0644\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 15:29:17', '2019-12-29 15:29:17'),
('08709af4-3e70-4c0a-bf35-e26814301329', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:05', '2019-12-30 22:56:05'),
('0a0d0638-a085-4fa7-a514-6bc5cc471635', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-20 19:20:02', '2019-12-20 21:14:55', '2019-12-20 19:20:02'),
('0a1bffb6-5a9d-44f0-a96c-c6c0907d0089', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"fdfsd\",\"ar\":\"fdfsd\"},\"type\":\"message\"}', NULL, '2019-12-29 04:06:43', '2019-12-29 04:06:43'),
('0ddbdabd-9995-4c17-8a61-d9f8b1b1a8fc', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-18 18:57:37', '2019-12-16 23:46:07', '2019-12-18 18:57:37'),
('0fc977e8-ed2b-4b6e-8cee-82cb90de4111', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"ahmed aboali He has purchased an extra credit. Transaction number 3\",\"ar\":\"ahmed aboali  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 3\"},\"type\":\"charge\"}', '2019-12-18 18:57:37', '2019-12-18 16:42:20', '2019-12-18 18:57:37'),
('106d2d97-1c00-4c62-b8d3-a3d080545194', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11'),
('11834d32-23e5-4d00-a87d-b4ec1728e97e', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0627\\u0644\\u062c\\u0647\\u0627\\u0632 \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646\",\"ar\":\"\\u0627\\u0644\\u062c\\u0647\\u0627\\u0632 \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:22:02', '2019-12-29 01:22:02'),
('118cacd9-9a8f-4ee1-8d69-292c7c84eb50', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-23 21:23:06', '2019-12-23 21:23:06'),
('14c20799-0c3f-4f88-8cbf-1464120ccf4b', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11'),
('157f55d8-9e08-48e2-a014-f94e01b7cee5', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:06', '2019-12-30 22:56:06'),
('1bb8b453-9742-4f1f-aaca-7910e1803c5e', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:26:50', '2019-12-29 04:26:50'),
('1cb2b2ed-1b6c-4f63-b73e-2670b6fa1e55', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"Hi\",\"ar\":\"Hi\",\"chat_id\":3},\"type\":\"chat\"}', NULL, '2019-12-29 13:45:52', '2019-12-29 13:45:52'),
('2201dfb8-45b0-4162-ad72-fd0fcdbd2559', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:57', '2019-12-30 22:54:57'),
('26195c2c-3490-4a87-80b8-30d64fc89364', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:35', '2020-01-03 21:31:35'),
('28a87ef5-1fb9-49f6-8cf2-d50fac913a5a', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"ragab ragab He has purchased an extra credit. Transaction number 3\",\"ar\":\"ragab ragab  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 3\"},\"type\":\"charge\"}', '2019-10-02 19:21:15', '2019-09-22 18:23:29', '2019-10-02 19:21:15'),
('28b1cdb5-d171-4338-84b8-17c9c57a519b', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:57', '2019-12-30 22:54:57'),
('29bda880-1a66-4842-936e-d9c78cb9f0ac', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ragab ragab Ad number 4\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ragab ragab  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 4\"},\"type\":\"ads\"}', '2019-09-22 15:15:35', '2019-09-22 18:04:58', '2019-09-22 15:15:35'),
('2a14b564-da42-479d-abc2-f77427be886d', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:31:27', '2019-12-29 04:31:27'),
('2aacf1d7-8aa2-43a8-b2e7-b5127c80c820', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0627\\u064a\\u0648\\u0627 \\u0666 \\u0639\\u062f\\u062f\",\"ar\":\"\\u0627\\u064a\\u0648\\u0627 \\u0666 \\u0639\\u062f\\u062f\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:52:56', '2019-12-29 01:52:56'),
('2c547d98-4377-4456-baa1-724d016359dd', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\",\"ar\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-29 04:32:35', '2019-12-29 04:32:35'),
('2cf44d75-bd5a-4c0a-aa76-869c8c142fcb', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u0645\\u064a\\u0646 \\u0635\\u0628\\u0631\\u064a\",\"ar\":\"\\u0645\\u064a\\u0646 \\u0635\\u0628\\u0631\\u064a\",\"chat_id\":6},\"type\":\"chat\"}', NULL, '2019-12-29 22:03:27', '2019-12-29 22:03:27'),
('2d3f658d-b623-4bf8-82c2-b4395111583b', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:56', '2019-12-30 22:54:56'),
('37303c1b-c10a-482b-b2a9-38f5cdd9778f', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:33', '2019-12-31 19:21:33'),
('37f73862-6998-47a7-a32e-4c46e4821eaa', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:36:59', '2019-12-29 19:36:59'),
('38f2aaa1-248e-453f-af36-830f0ec6b8c8', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:29:10', '2019-12-29 04:29:10'),
('395a43dd-40a9-468a-a139-be57378c8ab3', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:56', '2019-12-30 22:54:56'),
('3d288e40-49df-4a2f-b68f-564123421b17', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\",\"ar\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-29 04:33:35', '2019-12-29 04:33:35'),
('3e4f7818-55d1-4b42-a2b9-00732739c6d9', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 13\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 13\"},\"type\":\"charge\"}', '2020-01-02 09:58:06', '2020-01-02 08:22:53', '2020-01-02 09:58:06'),
('3e5b4981-9c6a-4b90-a331-fcb59184c532', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"Mansour Saad He has purchased an extra credit. Transaction number 14\",\"ar\":\"Mansour Saad  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 14\"},\"type\":\"charge\"}', '2020-01-02 10:30:30', '2020-01-02 13:23:36', '2020-01-02 10:30:30'),
('3f105f34-5e42-4f0a-aa01-c38db1805337', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:33', '2019-12-31 19:21:33'),
('4008dcd1-b249-4b40-a752-c3ea65d49914', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0645\\u0645\\u0643\\u0646 \\u0627\\u062e\\u0631 \\u0633\\u0639\\u0631 \\u061f\",\"ar\":\"\\u0645\\u0645\\u0643\\u0646 \\u0627\\u062e\\u0631 \\u0633\\u0639\\u0631 \\u061f\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:49:25', '2019-12-29 01:49:25'),
('41caf97f-fc82-4ed3-8699-a772022134c4', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-29 16:55:00', '2019-12-29 05:36:15', '2019-12-29 16:55:00'),
('4313b0c6-4d87-4acd-8880-b970cf5083df', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-18 18:57:37', '2019-12-16 23:13:54', '2019-12-18 18:57:37'),
('471ea804-589f-40e3-804d-289641815036', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11'),
('47a6008f-c16c-4da3-805f-a787d1cf1117', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:36', '2020-01-03 21:31:36'),
('4d9939df-fb7f-4d8f-8579-5e0d0395ff87', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u0627\\u0644\\u0633\\u0644\\u0622\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647 \\u0644\\u0642\\u062f \\u0642\\u0631\\u0627\\u062a \\u0637\\u0644\\u0628\\u0643 \\u0648 \\u0627\\u0646 \\u0634\\u0627\\u0621 \\u0627\\u0644\\u0644\\u0647 \\u0642\\u0627\\u062f\\u0631 \\u0639\\u0644\\u064a \\u062a\\u0646\\u0641\\u064a\\u0630\\u0647 \\u0628\\u0643\\u0644 \\u062f\\u0642\\u0629\",\"ar\":\"\\u0627\\u0644\\u0633\\u0644\\u0622\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647 \\u0644\\u0642\\u062f \\u0642\\u0631\\u0627\\u062a \\u0637\\u0644\\u0628\\u0643 \\u0648 \\u0627\\u0646 \\u0634\\u0627\\u0621 \\u0627\\u0644\\u0644\\u0647 \\u0642\\u0627\\u062f\\u0631 \\u0639\\u0644\\u064a \\u062a\\u0646\\u0641\\u064a\\u0630\\u0647 \\u0628\\u0643\\u0644 \\u062f\\u0642\\u0629\",\"chat_id\":6},\"type\":\"chat\"}', NULL, '2020-01-01 02:18:53', '2020-01-01 02:18:53'),
('4ddd8e6b-b136-401b-932d-1f0ab1f838b7', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u062d\\u0636\\u0631\\u062a\\u0643\\n\\u0627\\u062a\\u0641\\u0636\\u0644 \\u0645\\u0639\\u0643 \\u061f\",\"ar\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u062d\\u0636\\u0631\\u062a\\u0643\\n\\u0627\\u062a\\u0641\\u0636\\u0644 \\u0645\\u0639\\u0643 \\u061f\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:07:41', '2019-12-29 01:07:41'),
('4fa4f30a-35a0-41c4-8688-1894293ae4a9', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"raheem He has purchased an extra credit. Transaction number 11\",\"ar\":\"raheem  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 11\"},\"type\":\"charge\"}', '2019-12-29 16:55:00', '2019-12-29 05:45:59', '2019-12-29 16:55:00'),
('5084a803-848d-4a48-ab57-e497d9b3efbd', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11'),
('5234f7fb-e2b9-4f75-99eb-d537fbc9f060', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ragab ragab Ad number 2\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ragab ragab  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 2\"},\"type\":\"ads\"}', '2019-09-22 15:15:35', '2019-09-19 01:31:44', '2019-09-22 15:15:35'),
('5547419c-21a6-4e24-8da1-7c65bbfd8cba', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:35', '2020-01-03 21:31:35'),
('5559c29c-806a-4e6f-8811-33d40352aadb', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('573c83fa-b869-4fa7-aba8-3526da3d37f6', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:10', '2019-12-29 03:37:10'),
('57fd23db-84cf-4eaa-9114-cd101861b76f', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0627\\u0644\\u062d\\u0645\\u062f\\u0644\\u0644\\u0647\",\"ar\":\"\\u0627\\u0644\\u062d\\u0645\\u062f\\u0644\\u0644\\u0647\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 06:54:55', '2019-12-29 06:54:55'),
('5a51e76e-14ab-4555-87d5-fa3035519b1e', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:06', '2019-12-30 22:56:06'),
('5a678a86-1adb-458f-996a-5131db4c2f8c', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:07', '2019-12-30 22:56:07'),
('5ad725f5-1cd8-498f-93df-5e7d7c2aff5a', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:28:50', '2019-12-29 04:28:50'),
('5bd785ea-4b0c-4973-9ef8-986a9ce5d5ac', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ahmed aboali Ad number 8\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ahmed aboali  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 8\"},\"type\":\"ads\"}', '2019-12-18 18:57:37', '2019-12-18 16:44:31', '2019-12-18 18:57:37'),
('5f7487ce-c864-4c86-8443-9df630ba6d39', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:28:36', '2019-12-29 04:28:36'),
('5fc87ef0-0e5b-46ad-884b-286940235c0b', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:25:45', '2019-12-29 04:25:45'),
('61d237e2-e7a7-459d-92f7-4227a34d2145', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"Mansour Saad He has purchased an extra credit. Transaction number 9\",\"ar\":\"Mansour Saad  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 9\"},\"type\":\"charge\"}', '2019-12-23 20:58:39', '2019-12-23 23:55:23', '2019-12-23 20:58:39'),
('627954dc-adc9-4f19-b02d-e0d9029c325c', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('6297f6b4-607f-4c29-9496-f0d0b2eb1073', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"fdfsd\",\"ar\":\"fdfsd\"},\"type\":\"message\"}', NULL, '2019-12-29 04:06:41', '2019-12-29 04:06:41'),
('63a92eb3-cba9-446d-a3d8-e4b4c252049c', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:28:43', '2019-12-29 04:28:43'),
('6565ac1d-d448-4d36-a1eb-84ef64954cfd', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"asfasf\",\"ar\":\"asfasf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:03:37', '2019-12-29 04:03:37'),
('668b019b-9b95-4563-9c99-c3fed0e29e71', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:37:00', '2019-12-29 19:37:00'),
('670b2eef-2edb-4447-93fd-1b3f7f4a48c2', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:25:25', '2019-12-29 03:25:25'),
('69686650-f8d6-4e8b-bd55-598d18820123', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('6e173bfc-8774-4dd1-a984-8fde02eb317e', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('7393e6c7-6da6-4b74-8c8a-db974d98da9a', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647\",\"ar\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647\",\"chat_id\":2},\"type\":\"chat\"}', NULL, '2019-12-29 05:40:16', '2019-12-29 05:40:16'),
('73b850ec-6b6b-4012-b291-d9b8fe1057a2', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2020-01-01 06:12:38', '2020-01-01 07:38:36', '2020-01-01 06:12:38'),
('775e1403-2ac4-461f-9fe3-8e89585d0921', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:36', '2020-01-03 21:31:36'),
('782d13fd-4b4f-4eca-a33a-34459ef34a81', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-09-18 16:52:30', '2019-09-18 19:18:47', '2019-09-18 16:52:30'),
('78465801-ea34-4e6a-8468-1c387a779b24', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ahmed aboali Ad number 7\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ahmed aboali  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 7\"},\"type\":\"ads\"}', '2019-12-18 18:57:37', '2019-12-18 07:58:18', '2019-12-18 18:57:37'),
('7b0d8691-486a-4ac7-be77-bc6396e7199c', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('7cc3147a-6e9b-4c4b-acc1-388816afbc2b', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:56', '2019-12-30 22:54:56'),
('7d1f1622-a763-40c1-8dc1-067cb2e1daa7', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\",\"ar\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-29 04:32:34', '2019-12-29 04:32:34'),
('7f634b84-0c47-4593-83e7-af10d3acfa7e', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0627\",\"ar\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0627\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:00:02', '2019-12-29 01:00:02'),
('814224c8-59ef-4976-8d97-46005f1621a0', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:05', '2019-12-30 22:56:05'),
('85da179a-3b1f-4d8d-9e27-7945419f4c87', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"you have new message from \\u0645\\u0634\\u0639\\u0644\",\"ar\":\"  \\u0644\\u062f\\u064a\\u0643 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0645\\u0646 \\u0645\\u0634\\u0639\\u0644\"},\"type\":\"contact\"}', '2019-12-23 19:44:44', '2019-12-21 05:05:58', '2019-12-23 19:44:44'),
('85f4af50-1a84-4e74-ade6-32a75a33801c', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0645\\u0639\\u0643 \\u0627\\u0645\\u064a\\u0631\",\"ar\":\"\\u0645\\u0639\\u0643 \\u0627\\u0645\\u064a\\u0631\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:45:38', '2019-12-29 01:45:38'),
('87db7178-5714-43ff-bd5b-285b1aa3162c', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0643\\u0648\\u064a\\u0633 \\u062c\\u062f\\u0627\",\"ar\":\"\\u0643\\u0648\\u064a\\u0633 \\u062c\\u062f\\u0627\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:56:50', '2019-12-29 01:56:50'),
('8ad39dae-1dcd-4436-906a-a28833c5cc55', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"ahmed aboali He has purchased an extra credit. Transaction number 4\",\"ar\":\"ahmed aboali  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 4\"},\"type\":\"charge\"}', '2019-12-20 19:20:02', '2019-12-19 00:26:29', '2019-12-20 19:20:02'),
('8b220c5c-22fb-4445-baf1-731fbfe111a0', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:06', '2019-12-30 22:56:06'),
('8c4e155a-e07c-49ec-b4e5-9c96b38eb0f1', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:36:59', '2019-12-29 19:36:59'),
('8e2d915f-16a7-40cb-aef9-4bd120655096', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:36:59', '2019-12-29 19:36:59'),
('910c8fcd-5fe9-426b-8d72-91151cdfaf16', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:35', '2020-01-03 21:31:35'),
('91517df9-ce9d-44cb-8b11-4dc0dfe1ebdc', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-09-18 16:52:30', '2019-09-18 19:26:10', '2019-09-18 16:52:30'),
('9342915e-0396-42bf-a921-ec824c279ca9', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ragab ragab Ad number 5\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ragab ragab  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 5\"},\"type\":\"ads\"}', '2019-10-02 19:21:15', '2019-09-22 18:59:33', '2019-10-02 19:21:15'),
('9494bd80-dea4-4810-b3bd-e48ecb4abf33', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0647\\u0644\\u0627 \\u0648\\u0627\\u0644\\u0644\\u0647 \\u0628\\u0627\\u0644\\u062d\\u0628\\u064a\\u0628\",\"ar\":\"\\u0647\\u0644\\u0627 \\u0648\\u0627\\u0644\\u0644\\u0647 \\u0628\\u0627\\u0644\\u062d\\u0628\\u064a\\u0628\",\"chat_id\":6},\"type\":\"chat\"}', NULL, '2019-12-29 22:38:54', '2019-12-29 22:38:54'),
('96207b71-604c-46d4-9a67-274d8008a00a', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-29 16:55:00', '2019-12-29 13:45:16', '2019-12-29 16:55:00'),
('98346365-e949-4788-890d-2400aa4937d3', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:56', '2019-12-30 22:54:56'),
('99ea882a-7bb1-4900-9ec6-ffba024a90f4', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('99f04ca8-131c-4c9b-a5be-c5d0e92088ec', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"ragab ragab He has purchased an extra credit. Transaction number 1\",\"ar\":\"ragab ragab  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 1\"},\"type\":\"charge\"}', '2019-09-22 15:15:35', '2019-09-22 18:14:49', '2019-09-22 15:15:35'),
('9b85bc95-8b16-48a1-9c5b-d1b144192321', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 8\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 8\"},\"type\":\"charge\"}', '2019-12-23 19:44:44', '2019-12-21 05:07:05', '2019-12-23 19:44:44'),
('9c79a34f-b9d3-449c-8c1c-663ad6233d2c', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ragab ragab Ad number 3\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ragab ragab  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 3\"},\"type\":\"ads\"}', '2019-09-22 15:15:35', '2019-09-19 01:33:36', '2019-09-22 15:15:35'),
('9cac8b4b-feaf-4a98-b5b3-bbdf1601605a', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"\\u0647\\u0627\\u064a\",\"ar\":\"\\u0647\\u0627\\u064a\",\"chat_id\":4},\"type\":\"chat\"}', NULL, '2019-12-29 15:27:18', '2019-12-29 15:27:18'),
('a0bd896d-4c69-4b3e-ab3f-436c438a6e49', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:28', '2019-12-30 16:14:28'),
('a18084ac-7db1-499c-9a08-4bb16aba976f', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-23 19:44:44', '2019-12-23 21:11:34', '2019-12-23 19:44:44'),
('aa76225a-1ef6-46a4-b7c7-38f35f339a4a', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 15\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 15\"},\"type\":\"charge\"}', '2020-01-04 14:00:32', '2020-01-04 10:58:19', '2020-01-04 14:00:32'),
('ad4b3c04-88ee-4c45-a777-5472d10ea711', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:37:00', '2019-12-29 19:37:00'),
('aea60b2b-0365-4a25-836d-95c310f5eef6', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 6\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 6\"},\"type\":\"charge\"}', '2019-12-20 19:20:02', '2019-12-20 21:15:18', '2019-12-20 19:20:02'),
('af01f3e7-ef31-40d1-9277-a78b69c27b05', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('af926ee9-9af6-4466-aef8-862aac1ca0a1', 'App\\Notifications\\Notifications', 'App\\User', 12, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:36', '2020-01-03 21:31:36'),
('b3c02eea-0b7d-4d34-b2f4-a5a41a0f24d1', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0639\\u062a\\u0635\\u0645 He has purchased an extra credit. Transaction number 5\",\"ar\":\"\\u0645\\u0639\\u062a\\u0635\\u0645  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 5\"},\"type\":\"charge\"}', '2019-12-20 19:20:02', '2019-12-19 19:16:55', '2019-12-20 19:20:02'),
('b517911a-8c08-4462-9678-1768f70f1215', 'App\\Notifications\\Notifications', 'App\\User', 11, '{\"data\":{\"en\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u062d\\u0636\\u0631\\u062a\\u0643 \\u064a\\u0627 \\u0627\\u0641\\u0646\\u062f\\u0645\",\"ar\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u062d\\u0636\\u0631\\u062a\\u0643 \\u064a\\u0627 \\u0627\\u0641\\u0646\\u062f\\u0645\",\"chat_id\":6},\"type\":\"chat\"}', NULL, '2019-12-29 22:06:42', '2019-12-29 22:06:42'),
('b5df433e-245b-49a9-959f-4da26d071da0', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"\\u062a\\u0639\\u0627\\u0644\",\"ar\":\"\\u062a\\u0639\\u0627\\u0644\"},\"type\":\"message\"}', NULL, '2019-12-31 19:08:05', '2019-12-31 19:08:05'),
('bae40354-f4bb-495e-ba38-92ab6210395c', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:57', '2019-12-30 22:54:57'),
('bb44c0b4-8cd7-4475-93df-be304502c559', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"\\u0645\\u0633\\u0627\\u0621 \\u0627\\u0644\\u062e\\u064a\\u0631\",\"ar\":\"\\u0645\\u0633\\u0627\\u0621 \\u0627\\u0644\\u062e\\u064a\\u0631\",\"chat_id\":5},\"type\":\"chat\"}', NULL, '2020-01-01 03:04:46', '2020-01-01 03:04:46'),
('bc5ba9c6-920c-45d9-945f-8d82bdba7219', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:56', '2019-12-30 22:54:56'),
('bcb28da6-5181-492d-9a28-e87316d5f7c9', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:06', '2019-12-30 22:56:06'),
('bcef5668-cc1b-4926-82d9-93f0d337e8c4', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:12', '2019-12-29 03:37:12'),
('befa00ad-43f7-4d14-b734-626e1c3828ff', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 7\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 7\"},\"type\":\"charge\"}', '2019-12-23 19:44:44', '2019-12-21 05:06:17', '2019-12-23 19:44:44'),
('c05337ce-aeb0-418b-844a-ce568da07892', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"you have new message from \\u0641\\u0647\\u062f\",\"ar\":\"  \\u0644\\u062f\\u064a\\u0643 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0645\\u0646 \\u0641\\u0647\\u062f\"},\"type\":\"contact\"}', '2020-01-04 14:00:32', '2020-01-04 10:57:55', '2020-01-04 14:00:32'),
('c220422b-3fe3-4561-bd62-c7514990fc54', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0646\\u0639\\u0645\",\"ar\":\"\\u0646\\u0639\\u0645\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 03:09:32', '2019-12-29 03:09:32'),
('c226c6f9-b237-4ece-9fe9-512e3b8a1352', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:33', '2019-12-31 19:21:33'),
('c3e82f97-13da-433f-9af5-4ab12e9df139', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:28:58', '2019-12-29 04:28:58'),
('c5cbbf75-6f31-412a-8bd4-434c9c4a409e', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:37:00', '2019-12-29 19:37:00'),
('c6aa69d1-c9c6-43dc-a28b-18341b3ec5c9', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\",\"ar\":\"\\u062d\\u0628\\u064a\\u0628\\u064a \\u064a\\u0627\\u0627 \\u0627\\u0633\\u0637\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-29 04:33:34', '2019-12-29 04:33:34'),
('c75282ad-b621-475d-936c-bfb045811724', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0637\\u0628 \\u0627\\u0644\\u062d\\u0645\\u062f\\u0644\\u0644\\u0647\",\"ar\":\"\\u0637\\u0628 \\u0627\\u0644\\u062d\\u0645\\u062f\\u0644\\u0644\\u0647\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 06:54:00', '2019-12-29 06:54:00'),
('c781064b-5544-4432-ad2b-2b4ba5fc24b4', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11'),
('c856bfb8-a319-47c8-b373-fcb8dad79b77', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645\",\"ar\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645\",\"chat_id\":6},\"type\":\"chat\"}', NULL, '2019-12-29 22:02:37', '2019-12-29 22:02:37'),
('c8d9928a-4dd1-424a-b71e-cce11f26eaee', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-27 06:46:41', '2019-12-27 01:43:50', '2019-12-27 06:46:41'),
('cbf8bac1-ca66-4345-ac74-77d2371d4cd1', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"New user registered\",\"ar\":\"  \\u0645\\u0633\\u062a\\u062e\\u062f\\u0645 \\u062c\\u062f\\u064a\\u062f \\u0642\\u0627\\u0645 \\u0628\\u0627\\u0644\\u062a\\u0633\\u062c\\u064a\\u0644\"},\"type\":\"user\"}', '2019-12-20 19:20:02', '2019-12-19 18:55:47', '2019-12-20 19:20:02'),
('cdc259e4-a1e5-4477-a63d-f3aad6b09871', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:05', '2019-12-30 22:56:05'),
('ce3f9384-8206-4415-a529-60cb04c8b981', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"you have new message from Ahmed\",\"ar\":\"  \\u0644\\u062f\\u064a\\u0643 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \\u0645\\u0646 Ahmed\"},\"type\":\"contact\"}', '2019-12-20 19:20:02', '2019-12-19 01:42:11', '2019-12-20 19:20:02'),
('cf15010e-3978-4b6e-9611-b73fa4e513a8', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:36:59', '2019-12-29 19:36:59'),
('d0dd7c9c-0b5c-4c80-b765-7c53e16f67e6', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0648 \\u0627\\u0644\\u0639\\u062f\\u062f \\u0627\\u0644\\u0645\\u062a\\u0627\\u062d \\u0643\\u0627\\u0645 \\u061f\",\"ar\":\"\\u0648 \\u0627\\u0644\\u0639\\u062f\\u062f \\u0627\\u0644\\u0645\\u062a\\u0627\\u062d \\u0643\\u0627\\u0645 \\u061f\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:49:53', '2019-12-29 01:49:53'),
('d35cac08-d24d-4326-8c4c-0b45ec745483', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:37:00', '2019-12-29 19:37:00'),
('d71c6a59-8353-4852-9a97-4e7c1030ba32', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('dcec9674-c73b-400d-9756-862e6a7946b8', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0644\\u064a\\u0628\\u0644\",\"ar\":\"\\u0644\\u064a\\u0628\\u0644\"},\"type\":\"message\"}', NULL, '2019-12-29 04:33:50', '2019-12-29 04:33:50'),
('e0754e44-fbbf-4a8a-8e12-8791a97baccd', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('e1bc75e2-fbf9-449b-a400-aa15c9e83ade', 'App\\Notifications\\Notifications', 'App\\User', 7, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2019-12-31 19:21:34', '2019-12-31 19:21:34'),
('e3a078ee-dda2-4ee1-9d58-1c5987ec62f0', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:28', '2019-12-30 16:14:28'),
('e6374bbd-1237-4a40-804b-fa0cd885a1f9', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 12\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 12\"},\"type\":\"charge\"}', '2019-12-31 19:19:38', '2019-12-31 04:11:39', '2019-12-31 19:19:38'),
('e821d17b-a5c3-4257-9e9e-20f60c097669', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"\\u0645\\u0634\\u0639\\u0644 He has purchased an extra credit. Transaction number 10\",\"ar\":\"\\u0645\\u0634\\u0639\\u0644  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 10\"},\"type\":\"charge\"}', '2019-12-28 21:57:15', '2019-12-28 09:41:13', '2019-12-28 21:57:15'),
('e85dffc8-bdbc-4bec-a390-ad00c05ee51d', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\",\"ar\":\"\\u062a\\u064a\\u0633\\u062a \\u0661\"},\"type\":\"message\"}', NULL, '2019-12-30 22:56:06', '2019-12-30 22:56:06'),
('e92ecc33-7db4-44da-8563-f499229b58cb', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u062d\\u0636\\u0631\\u062a\\u0643 \\u0644\\u0633\\u0647 \\u0645\\u0639\\u0627\\u064a\\u0627\",\"ar\":\"\\u062d\\u0636\\u0631\\u062a\\u0643 \\u0644\\u0633\\u0647 \\u0645\\u0639\\u0627\\u064a\\u0627\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:52:03', '2019-12-29 01:52:03'),
('ea706e1b-8f79-4f7c-ad77-32c531fe15f7', 'App\\Notifications\\Notifications', 'App\\User', 3, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:35', '2020-01-03 21:31:35'),
('eb549867-e47f-43c3-8284-53621848033d', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:35', '2020-01-03 21:31:35'),
('ecc0472e-abb8-4e00-b706-7c53068d0672', 'App\\Notifications\\Notifications', 'App\\User', 4, '{\"data\":{\"en\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\",\"ar\":\"\\u0645\\u0646\\u0635\\u0648\\u0631\"},\"type\":\"message\"}', NULL, '2019-12-29 19:36:59', '2019-12-29 19:36:59'),
('eeb04a52-a8e4-41a0-9d41-b22d1a782bdb', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"ragab ragab He has purchased an extra credit. Transaction number 2\",\"ar\":\"ragab ragab  \\u0644\\u0642\\u062f \\u0627\\u0634\\u062a\\u0631\\u0649 \\u0631\\u0635\\u064a\\u062f\\u064b\\u0627 \\u0625\\u0636\\u0627\\u0641\\u064a\\u064b\\u0627. \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0645\\u0639\\u0627\\u0645\\u0644\\u0629 2\"},\"type\":\"charge\"}', '2019-09-22 15:15:34', '2019-09-22 18:15:25', '2019-09-22 15:15:34'),
('ef946ead-8269-49c3-8d1c-79b727ee2ce0', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('f01825a2-2bb8-4758-be7d-b504864baaa7', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-29 03:37:11', '2019-12-29 03:37:11');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('f09e9fad-ce69-439d-aeb7-c96c42847a9d', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0645\\u0645\\u0643\\u0646 \\u062d\\u0636\\u0631\\u062a\\u0643 \\u062a\\u0628\\u0639\\u062a \\u062a\\u0627\\u0646\\u064a \\u0644\\u0648 \\u0639\\u0627\\u064a\\u0632 \\u062a\\u062c\\u0631\\u0628\",\"ar\":\"\\u0645\\u0645\\u0643\\u0646 \\u062d\\u0636\\u0631\\u062a\\u0643 \\u062a\\u0628\\u0639\\u062a \\u062a\\u0627\\u0646\\u064a \\u0644\\u0648 \\u0639\\u0627\\u064a\\u0632 \\u062a\\u062c\\u0631\\u0628\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:26:07', '2019-12-29 01:26:07'),
('f0cdb055-d0f6-42ed-97ad-18c4ee2df90e', 'App\\Notifications\\Notifications', 'App\\User', 6, '{\"data\":{\"en\":\"\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647\",\"ar\":\"\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u0648\\u0631\\u062d\\u0645\\u0629 \\u0627\\u0644\\u0644\\u0647 \\u0648\\u0628\\u0631\\u0643\\u0627\\u062a\\u0647\",\"chat_id\":5},\"type\":\"chat\"}', NULL, '2019-12-29 15:28:09', '2019-12-29 15:28:09'),
('f2e2fd25-e616-4449-90c2-24ce8fb0c501', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"2020\",\"ar\":\"2020\"},\"type\":\"message\"}', NULL, '2020-01-03 21:31:36', '2020-01-03 21:31:36'),
('f50c417b-7b84-464a-9e4a-9502c553a44d', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"test\",\"ar\":\"test\"},\"type\":\"message\"}', NULL, '2019-12-23 21:23:10', '2019-12-23 21:23:10'),
('f5726bc2-f8f2-4511-9f2c-e9e541484785', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from \\u0645\\u0639\\u062a\\u0635\\u0645 Ad number 13\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 \\u0645\\u0639\\u062a\\u0635\\u0645  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 13\"},\"type\":\"ads\"}', '2019-12-20 19:20:02', '2019-12-19 19:18:20', '2019-12-20 19:20:02'),
('f6c8275f-78db-4be1-a196-d2f99ec69917', 'App\\Notifications\\Notifications', 'App\\User', 9, '{\"data\":{\"en\":\"\\u0627\\u0632\\u064a\\u0643 \\u064a\\u0627 \\u0627\\u0645\\u064a\\u0631\",\"ar\":\"\\u0627\\u0632\\u064a\\u0643 \\u064a\\u0627 \\u0627\\u0645\\u064a\\u0631\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-29 01:29:35', '2019-12-29 01:29:35'),
('f9096cc7-2e32-471e-80c4-944b6b568394', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"data\":{\"en\":\"    new Ad from ragab ragab Ad number 6\",\"ar\":\"  \\u0627\\u0639\\u0644\\u0627\\u0646 \\u062c\\u062f\\u064a\\u062f  \\u0645\\u0646 ragab ragab  \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u0639\\u0644\\u0627\\u0646 6\"},\"type\":\"ads\"}', '2019-10-02 19:21:15', '2019-09-22 19:21:40', '2019-10-02 19:21:15'),
('f9893ecf-9ec8-43eb-911b-0dc23692c3da', 'App\\Notifications\\Notifications', 'App\\User', 10, '{\"data\":{\"en\":\"Test 1\",\"ar\":\"Test 1\"},\"type\":\"message\"}', NULL, '2019-12-30 22:54:57', '2019-12-30 22:54:57'),
('fab9cf95-a39e-48c7-9eda-eccb6bea31ab', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0627\",\"ar\":\"\\u0627\\u0647\\u0644\\u0627 \\u0628\\u0643\\u0645 \\u0627\",\"chat_id\":1},\"type\":\"chat\"}', NULL, '2019-12-27 01:48:12', '2019-12-27 01:48:12'),
('fcd077b6-d2b7-4ca9-b4a6-c62eb4c9aa34', 'App\\Notifications\\Notifications', 'App\\User', 8, '{\"data\":{\"en\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"ar\":\"\\u062a\\u0627\\u0628\\u0639\\u0648\\u0646\\u0627 \\u0628\\u0627\\u0642\\u0648\\u064a \\u062a\\u0637\\u0628\\u064a\\u0642 \\u0644\\u0644\\u0628\\u064a\\u0639 \\u0648\\u0627\\u0644\\u0634\\u0631\\u0627\\u0621 \\u0628\\u0627\\u0644\\u0648\\u0637\\u0646 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\"},\"type\":\"message\"}', NULL, '2019-12-30 16:14:27', '2019-12-30 16:14:27'),
('fef6b7d6-98db-435c-a265-cb0c0841aef6', 'App\\Notifications\\Notifications', 'App\\User', 5, '{\"data\":{\"en\":\"sdf\",\"ar\":\"sdf\"},\"type\":\"message\"}', NULL, '2019-12-29 04:31:38', '2019-12-29 04:31:38');

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
(3, '012012012', '615601', '2019-09-18 19:33:54', '2019-12-16 22:45:02'),
(4, '01207908327', '920757', '2019-11-06 21:03:21', '2019-11-06 21:13:20'),
(5, '012015012', '963223', '2019-12-16 22:15:04', '2019-12-16 22:15:04'),
(9, '1030025255', '486908', '2019-12-17 00:10:53', '2019-12-17 00:10:53'),
(10, '1030025254', '363242', '2019-12-17 00:11:08', '2019-12-27 01:40:32'),
(18, '98936254', '141393', '2019-12-24 04:55:16', '2019-12-31 01:08:34'),
(19, 'mansour.saad10@gmail.com', '$2y$10$AtxNtM3T3nKmVceVL.nKfOeBpSnT2AOgh5AlL/ki8cjxFXEWrUzDa', '2019-12-24 04:38:02', NULL),
(20, '55201718', '479483', '2019-12-29 05:29:01', '2019-12-29 05:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title`, `method`, `amount`, `date`, `status`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'knet', '10', NULL, 'paid', 3, NULL, '2019-09-22 18:14:48', '2019-09-22 18:14:48'),
(2, NULL, 'knet', '20', NULL, 'paid', 3, NULL, '2019-09-22 18:15:25', '2019-09-22 18:15:25'),
(3, NULL, 'knet', '5', NULL, 'paid', 5, NULL, '2019-12-18 16:42:20', '2019-12-18 16:42:20'),
(4, NULL, 'knet', '10', NULL, 'paid', 5, NULL, '2019-12-19 00:26:28', '2019-12-19 00:26:28'),
(5, NULL, 'knet', '3', NULL, 'paid', 6, NULL, '2019-12-19 19:16:55', '2019-12-19 19:16:55'),
(9, NULL, 'knet', '1', NULL, 'paid', 8, NULL, '2019-12-23 23:55:22', '2019-12-23 23:55:22'),
(11, NULL, 'knet', '7', NULL, 'paid', 10, NULL, '2019-12-29 05:45:59', '2019-12-29 05:45:59'),
(13, NULL, 'knet', '500', NULL, 'paid', 12, NULL, '2020-01-02 08:22:53', '2020-01-02 08:22:53'),
(14, NULL, 'knet', '100', NULL, 'paid', 8, NULL, '2020-01-02 13:23:36', '2020-01-02 13:23:36'),
(15, NULL, 'knet', '1000000', NULL, 'paid', 12, NULL, '2020-01-04 10:58:19', '2020-01-04 10:58:19');

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
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','not_active') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `title_ar`, `title_en`, `image`, `status`, `category_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(36, 'الاحدث', 'الاحدث', '3413ac1fc62abd88cd88b6fcb9ffd00e.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 18:15:36'),
(37, 'اعلانات مميزة', 'Featured ads', '69069ca63e8694f31483f58e8f60611e.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 18:14:45'),
(38, 'سيارات', 'Cars', '5df249ce95b6b02b97aff2f868ccad24.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-04 19:20:29'),
(39, 'قوراب وجت سكي', 'Boats and jet ski', '1a5b50413a1e5aac8d982f6ac7095866.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 18:12:51'),
(40, 'دراجات نارية', 'Motorcycles', 'a484ecca19062ac9fc64e76255c50c59.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 18:11:48'),
(41, 'قطع غيار واكسسوارات', 'Parts and accessories', 'fd665f96bda1b4761dfb139799f15784.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 18:10:36'),
(42, 'تجاري', 'commercial', '0f841272a36e9e4fd50b5db5a09b1ad6.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 17:40:52'),
(43, 'تأجير', 'Leasing', '15c4e24c76eba27f77e7e54a4fae1726.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 17:39:24'),
(44, 'خدمات المحركات', 'Engine services', '4f6de522d31149dd8dbeaf25a00992ee.png', 'active', 2, NULL, '2019-12-25 23:56:54', '2020-01-01 17:37:37'),
(45, 'عقار للبيع', 'Property for sale', '52c8403e4fdc56f084619601574a65ba.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:36:14'),
(46, 'عقارات للإيجار', 'Real estate for rent', 'd490c5a652b129574eea8896d75e3b74.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:33:42'),
(47, 'عقارات دولية', 'International Real Estate', '7d7e5f903c993aad37ad2d08ed798054.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:33:05'),
(48, 'عقارات للبدل', 'Real estate allowance', '691779b82674b2bd7ab53dc017fc0d51.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:31:47'),
(49, 'مشاركة سكن', 'Shared housing', 'a3d93690f6443b02ba630b22d8083e8e.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:30:39'),
(50, 'خدمات عقاري', 'Real estate services', '1b508cb55a84d9f84b51967a888250af.png', 'active', 3, NULL, '2019-12-25 23:56:54', '2020-01-01 17:29:24'),
(51, 'نقل أثاث', 'Moving furniture', '991a669953006fb9eaf51d8a227e2e7a.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:28:36'),
(52, 'مقاولات عامة', 'General Contracting', 'd4f742369a6ebb66c4a02f4048fda22b.jpg', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-04 14:10:17'),
(53, 'ستلايت', 'Satellite', '0410ff768044692ba733a56b33e2206c.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:27:22'),
(54, 'صحة و أسلوب حياة', 'Health and lifestyle', 'ec970eb7f2bffabcf36cf423b3b16e87.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:26:09'),
(55, 'طعام و تجهيز حفلات', 'Food and party preparation', '49f515d10112530ad5234a317bc6130f.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:11:05'),
(56, 'المصابغ', 'Dyes', '3eff34ac43f389601f6bbd7e8b3d4f31.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:10:09'),
(57, 'تدريس و تدريب', 'Teaching and training', '102e6bf0df4883ef7df8be7eccb063e1.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:08:44'),
(58, 'حفلات', 'Parties', '821a7db7e29855b6b0e5f5bb9295242c.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:07:50'),
(59, 'سياحة وسفر', 'Travel and Tourism', '4e09fa9fbe52ad2e838d8b497608f350.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:04:41'),
(60, 'وظائف خدمات', 'Service jobs', '365377f32c5e90a88db6215f0f05b88c.png', 'active', 4, NULL, '2019-12-25 23:56:54', '2020-01-01 17:03:55'),
(61, 'الإلكترونيات', 'Electronics', '85103baba0f5627b686b83029ea52fe1.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 17:02:04'),
(62, 'مستلزمات المخيمات', 'Camp Supplies', '1be21461200a19d2e37f70cc57f9cf85.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 16:59:45'),
(63, 'أزياء و موضة', 'Fashion and style', '2dd5f7ca3de22940f926378a173332c7.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 16:58:45'),
(64, 'أثاث', 'furniture', 'e80099fe73377686c1a2ead73d37cb36.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 16:56:50'),
(65, 'فن و مقتنيات', 'Art and collectibles', '38ea43714450d22455c17496e1b4de62.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 16:54:56'),
(66, 'أغراض متنوعة', 'Various purposes', 'e2e0fecb9fc4e4c3df486ae4291ae3b2.png', 'active', 1, NULL, '2019-12-25 23:56:54', '2020-01-01 16:54:18'),
(67, 'حيوانات', 'Animals', '235117e6654036f0a19f588e942c1304.jpg', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-04 14:06:03'),
(68, 'حيوانات أليفة', 'Pets', 'fe272a80de398070831a20fe29cb9ed6.png', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-01 16:52:36'),
(69, 'طيور', 'Birds', 'd4e701aea57eae2fb60addc1e2736ae3.png', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-01 17:06:27'),
(70, 'معدات الحيوانات', 'Animal equipment', '8ee6480dce9cac14a93d601fac3ee8ef.png', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-01 16:47:29'),
(71, 'أعلاف', 'Forage', 'bd0679d4f0dbda03f05566405a2f1ff9.png', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-01 16:45:26'),
(72, 'خدمات الحيوانات', 'Animal services', 'cb38bf8c70b96090b8b017c4119e699d.png', 'active', 6, NULL, '2019-12-25 23:56:54', '2020-01-01 17:05:49'),
(73, 'وظائف شاغرة', 'vacancies', 'f37687a572ad3e1be58183db93a02745.png', 'active', 8, NULL, '2019-12-25 23:56:54', '2020-01-01 16:42:41'),
(74, 'يطلب عمل', 'Work is required', '93c4e584323d0d5c308da64eb72a3a0d.png', 'active', 8, NULL, '2019-12-25 23:56:54', '2020-01-01 17:02:43'),
(81, 'سيارات', 'Cars', '15ab2e8bd52edb425470ec1ed2e453e0.png', 'active', NULL, 36, '2019-12-25 23:56:54', '2020-01-05 20:58:09'),
(82, 'دراجات', 'Bikes', '6e28c78236b2c869d213fe6480a67fff.png', 'active', NULL, 36, '2019-12-25 23:56:54', '2020-01-05 20:57:06'),
(83, 'قوارب', 'Boats', '189cfbc8bd6f654221135cc77e1caf0a.png', 'active', NULL, 36, '2019-12-25 23:56:54', '2020-01-05 20:41:47'),
(84, 'اخري', 'Another', 'b1b332b6f1a965609dada90bdb50d61c.png', 'active', NULL, 36, '2019-12-25 23:56:54', '2020-01-05 20:40:29'),
(85, 'سيارات', 'Cars', '5f2d3ede578a895c455b9b2babc86066.png', 'active', NULL, 37, '2019-12-25 23:56:54', '2020-01-05 20:39:56'),
(86, 'دراجات', 'Bikes', '912e67df2df2e6c4ae2136834a404ae6.png', 'active', NULL, 37, '2019-12-25 23:56:54', '2020-01-05 20:37:33'),
(87, 'قوارب', 'Boats', 'e7b91ccb9d913fb00cb2ef842dea3460.png', 'active', NULL, 37, '2019-12-25 23:56:54', '2020-01-05 20:36:52'),
(88, 'اخري ', 'Another', NULL, 'active', NULL, 37, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(89, 'سيارات اسيوية  ', 'Asian cars', NULL, 'active', NULL, 38, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(90, 'سيارات أمريكية', 'American cars', 'e1ffa31502a380531830e5f4f07bb96a.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:03:14'),
(91, 'سيارات اوروبية', 'European cars', '745039693c9249001ef71f7a10978280.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:02:53'),
(92, 'سيارات كلاسيكية', 'Classic cars', '37f326447888a9f03d9c3feb849fb2a2.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:05:29'),
(93, 'باصات', 'Buses', '941645f555326898b10b4969f15f0e7c.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:04:57'),
(94, 'سيارات سكراب ', 'Scrap cars', '75b202be8bcb9fec796b8dcfeec656d5.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:02:29'),
(95, 'معدات ثقيلة', 'Heavy Equipment', '16bb48f1344ef80cc0e8e97930fba4a2.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 21:01:03'),
(96, 'مطلوب شراء سيارات', 'Purchase of cars is required', '74fb4170c86b862f3c948f6de47ec656.png', 'active', NULL, 38, '2019-12-25 23:56:54', '2020-01-05 20:59:50'),
(97, 'قوارب', 'Boats', 'f74832f24b68458c4d9336043c2cde49.png', 'active', NULL, 39, '2019-12-25 23:56:54', '2020-01-05 20:58:41'),
(98, 'جت سكي ', 'Jet ski', NULL, 'active', NULL, 39, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(99, 'مطلوب قوراب وجت سكي ', 'Boat and jet ski is required', NULL, 'active', NULL, 39, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(100, 'دراجات نارية رياضية ', 'Sports motorcycles', NULL, 'active', NULL, 40, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(101, 'الدراجات الرباعية ', 'Quad bikes', NULL, 'active', NULL, 40, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(102, 'دراجات هوائية ', 'bicycles', NULL, 'active', NULL, 40, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(103, 'مطلوب دراجات ', 'Bicycles required', NULL, 'active', NULL, 40, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(104, 'اكسسوارات سيارات ', 'Automotive Accessories', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(105, 'قطع غيار سيارات ', 'car parts', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(106, 'معدات السيارات ', 'Automotive equipment', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(107, 'محركات و جيرات  ', 'Engines and gear', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(108, 'قطع غيار و اكسسوارت قوارب ', 'Parts and accessories of boats', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(109, 'قطع غيار و اكسسوارات دراجات ', 'Bicycle parts and accessories', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(110, 'رنجات سيارات ', 'Alloy wheels', NULL, 'active', NULL, 41, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(111, 'مكاتب سيارات ', 'Cars offices', NULL, 'active', NULL, 42, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(112, 'وكالات ', 'Agencies', NULL, 'active', NULL, 42, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(113, 'تأجير سيارات ', 'renting cars', NULL, 'active', NULL, 42, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(114, 'تاجير باصات ', 'Bus rental', NULL, 'active', NULL, 43, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(115, 'معدات للايجار ', 'Equipment for rent', NULL, 'active', NULL, 43, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(116, 'تاكسي ', 'taxi', NULL, 'active', NULL, 43, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(117, 'خدمات سيارات ', 'Car services', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(118, 'خدمات القوارب ', 'Boat services', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(119, 'برمجة ريموت ', 'Remote programming', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(120, 'تلميع ', 'polishing', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(121, 'سطحات ', 'Facades', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(122, 'تأمين ', 'insurance', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(123, 'شحن خارجي ', 'External shipping', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(124, 'تعليم قيادة ', 'Driving instruction', NULL, 'active', NULL, 44, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(125, 'عقار سكني  ', 'Residential property ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(126, 'محلات تجارية   ', 'Shops ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(127, 'شركات للبيع   ', 'Companies for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(128, 'مكاتب للبيع   ', 'Offices for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(129, 'مزارع للبيع   ', 'Farms for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(130, 'اراضي للبيع   ', 'Lands for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(131, 'منتزهات واستراحات للبيع   ', 'Recreation and rest houses for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(132, 'عقارات مطلوبه للبيع  ', 'Required real estate for sale ', NULL, 'active', NULL, 45, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(133, 'عقار سكني   ', 'Residential property ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(134, 'منتزهات واستراحات للايجار   ', 'Recreation and rest houses for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(135, 'مزارع للإيجار   ', 'Farms for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(136, 'أراضي للإيجار   ', 'Land for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(137, 'مخيمات للإيجار   ', 'Camps for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(138, 'مكاتب للإيجار   ', 'Offices for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(139, 'محلات تجارية للإيجار   ', 'Shops for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(140, 'مطلوب عقارات للإيجار   ', 'Real estate required for rent ', NULL, 'active', NULL, 46, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(141, 'السعودية   ', 'Saudi ', NULL, 'active', NULL, 47, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(142, 'تركيا   ', 'Turkey ', NULL, 'active', NULL, 47, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(143, 'الإمارات العربية المتحدة   ', 'The United Arab Emirates ', NULL, 'active', NULL, 47, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(144, 'مصر   ', 'Egypt ', NULL, 'active', NULL, 47, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(145, 'دول اخري   ', 'other countries ', NULL, 'active', NULL, 47, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(146, 'قسائم   ', 'Coupons ', NULL, 'active', NULL, 48, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(147, 'طلبات إسكانية   ', 'Housing requests ', NULL, 'active', NULL, 48, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(148, 'منزل   ', ' house ', NULL, 'active', NULL, 48, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(149, 'مقاول صحي   ', 'Health contractor ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(150, 'فنى أقفال   ', 'Locksmith technician ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(151, 'مقاولات بناء   ', 'constructing contractors ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(152, 'تسليك مجاري   ', 'Wiring sewer ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(153, 'خدمات التكييف   ', 'HVAC services ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(154, 'اصباغ   ', 'Pigments ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(155, 'أعمال ديكور   ', 'Decorative work ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(156, 'أعمال مشاتل وحدائق   ', 'Nursery and garden work ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(157, 'حدادة   ', 'Blacksmith ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(158, 'الومنيوم   ', 'Aluminum ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(159, 'مكافحة حشرات   ', 'Anti Bugs ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(160, 'كاشي و سراميك   ', 'Cashy and ceramic ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(161, 'فني زجاج   ', 'Glass technician ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(162, 'عازل أسطح   ', 'Surface insulator ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(163, 'خزانات مياه   ', 'water tanks ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(164, 'نجار   ', 'Carpenter ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(165, 'فنى كهرباء   ', 'Electricity technician ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(166, 'خدمات تنظيف   ', 'Cleaning services ', NULL, 'active', NULL, 52, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(167, 'خدمات طبية   ', 'medical services ', NULL, 'active', NULL, 54, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(168, 'صالات رياضة و منتجعات صحية   ', 'Gyms and health resorts ', NULL, 'active', NULL, 54, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(169, '  صالونات شعر   ', 'Hair salons ', NULL, 'active', NULL, 54, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(170, 'خياطة   ', 'sewing ', NULL, 'active', NULL, 54, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(171, 'المطبخ الكويتي   ', 'Kuwaiti cuisine ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(172, 'المطبخ العربي   ', 'Arab cuisine ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(173, 'القهوة   ', 'Coffee ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(174, 'الحلويات   ', 'sweets ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(175, 'العسل   ', 'Honey ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(176, 'التمور   ', 'Dates ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(177, 'مأكولات بحرية   ', 'Seafood ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(178, 'لحوم و دجاج   ', 'Meat and chicken ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(179, 'بقالة   ', 'grocery ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(180, 'أخرى   ', 'Other ', NULL, 'active', NULL, 55, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(181, 'لغات   ', 'Languages ', NULL, 'active', NULL, 57, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(182, 'رياضيات   ', 'Mathematics ', NULL, 'active', NULL, 57, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(183, 'كل العلوم   ', 'All science ', NULL, 'active', NULL, 57, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(184, 'جامعة   ', 'University ', NULL, 'active', NULL, 57, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(185, 'مواد أخرى   ', 'Other materials ', NULL, 'active', NULL, 57, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(186, 'دي جي   ', 'DJ ', NULL, 'active', NULL, 58, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(187, 'تصوير   ', 'take photo ', NULL, 'active', NULL, 58, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(188, 'تأجير   ', 'Leasing ', NULL, 'active', NULL, 58, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(189, 'استقبال مواليد    ', 'Baby boomers reception ', NULL, 'active', NULL, 58, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(190, 'رخص تجارية   ', 'Commercial licenses ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(191, 'خدمات إعلانية   ', 'Advertising services ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(192, 'تعقيب معاملات   ', 'Tracking transactions ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(193, 'خدمات إلكترونية   ', 'Electronic services ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(194, 'خياط   ', 'tailor ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(195, 'خدمات توصيل   ', 'Delivery services ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(196, 'خدمات مختلفة   ', 'Various services ', NULL, 'active', NULL, 60, '2019-12-25 23:56:54', '2019-12-25 23:56:54'),
(197, 'موبايلات وتابلت', 'Mobiles and Tablets', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(201, 'كمبيوترات وشبكات', 'Computers and networks ', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(202, 'صوتيات ', 'Acoustics ', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(203, ' 	أجهزة تلفاز ذكية ', ' Smart TVs', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(204, '	ساعات ذكية ', 'Smart watches ', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(205, 'كاميرات ', ' Cameras', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(206, ' أجهزة منزلية/مكتبية ', 'Home / office appliances ', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(207, ' ألعاب إلكترونية ', 'Video Games ', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(208, ' سجائر إلكترونية', ' Electronic cigarettes', NULL, 'active', NULL, 61, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(213, 'خيام ', 'Tents ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(214, '	فحم ', 'coal ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(215, '	 	معدات الصيد ', 'Fishing equipment ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(216, 'مولدات كهرباء ', ' Generators', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(217, '	نطاطيات ', ' Bouncy', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(218, '	 كبائن متنقلة ', 'Mobile cabins ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(219, 'طاقة الشمسية ', 'Solar Energy ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(220, '	أخرى ', ' Other', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(221, 'خيام ', 'Tents ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(222, '	فحم ', 'coal ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(223, '	 	معدات الصيد ', 'Fishing equipment ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(224, 'مولدات كهرباء ', ' Generators', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(225, '	نطاطيات ', ' Bouncy', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(226, '	 كبائن متنقلة ', 'Mobile cabins ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(227, 'طاقة الشمسية ', 'Solar Energy ', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(228, '	أخرى ', ' Other', NULL, 'active', NULL, 62, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(229, ' 	سيدات', 'Ladies ', NULL, 'active', NULL, 63, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(230, 'رجال ', 'Men ', NULL, 'active', NULL, 63, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(231, 'أطفال ', ' Children', NULL, 'active', NULL, 63, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(232, ' 	نشتري الأثاث ', ' We buy furniture', NULL, 'active', NULL, 64, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(233, ' 	اثاث منزلي ', ' Home furnishings', NULL, 'active', NULL, 64, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(234, ' 	أثاث مكتبي ', ' Office Furniture', NULL, 'active', NULL, 64, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(235, 'تنجيد ', ' upholstery', NULL, 'active', NULL, 64, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(236, 'المفروشات ', ' Upholstery', NULL, 'active', NULL, 64, '2019-09-07 05:00:00', '2019-09-07 05:00:00'),
(237, 'تحف', 'Antiques', '02b8ec3440ce1645e71927d33f54659c.png', 'active', NULL, 65, '2019-09-07 05:00:00', '2020-01-11 17:44:11'),
(238, 'لوحات فنية', 'Paint Art', 'af72ac85391b2929804f6c805e97c9f9.png', 'active', NULL, 65, '2019-09-07 05:00:00', '2020-01-11 17:44:07'),
(239, 'تذاكر', 'Tickets', 'afa258f6455057c5b957495adfea7e1c.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 17:43:58'),
(240, 'موسيقى و صوتيات', 'Music and Audio', 'dfb6a944650f2215582221b74e11068f.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 17:44:03'),
(241, 'أغراض طبية', 'Medical purposes', '23d6119188636134d73a0ef767ac7caf.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 15:59:39'),
(242, 'احتياجات أطفال', 'The needs of children', '550677ab460cbdd3f99978d3f79dd929.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 16:00:09'),
(243, 'هدايا', 'Gifts', 'ffda32bae805450218eb09b6f61a4aef.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 15:59:28'),
(244, 'معدات رياضية', 'Sports equipment', 'e3ce37eb4af365a7b0d16abd25c9e1e3.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-11 15:59:33'),
(245, 'بخور', 'incense', '07f9a38ca98bfa4692bb14f4aa4f7423.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:27:07'),
(246, 'منتجات زراعية', 'Agricultural products', 'b8d3fff4500d109dc7986ef1a34eb75c.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:27:12'),
(247, 'مواد بناء', 'Building materials', 'e44aed65b01bef62696708bf01aec623.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:21:27'),
(248, 'الكتب', 'Books', 'bfb375d0195a66ad09d8db8064d7a715.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:19:50'),
(249, 'مبيعات الجملة', 'Wholesale sales', '26a14cfdfc6c5498c6cce4c3f59bd19c.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:17:52'),
(250, 'ملصقات', 'Posters', '5fb2d07ec88e1f37df34610c5735439c.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:16:06'),
(251, 'مفقودات', 'Missing', '016a90685b339a9dfba24104985162d0.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:14:52'),
(252, 'أغراض متنوعة أخرى', 'Various other purposes', '3dac7781b62760c4a48cc8ccd9f4ca10.png', 'active', NULL, 66, '2019-09-07 05:00:00', '2020-01-09 12:25:11'),
(253, 'الماشية', 'Cattle', '29dc2ea0ab7fe971529ec0a165982944.png', 'active', NULL, 67, '2019-09-07 05:00:00', '2020-01-07 18:41:44'),
(254, 'الخيل', 'The horse', 'dc2860ad185c25ded9d7386cf911e99e.png', 'active', NULL, 67, '2019-09-07 05:00:00', '2020-01-07 18:41:48'),
(255, 'الإبل', 'The Camels', '80a5edce0ab344ba08d39d24dece3e5a.png', 'active', NULL, 67, '2019-09-07 05:00:00', '2020-01-07 18:29:17'),
(256, 'أخرى', 'Other', '107c7a44e9118cd12eb9028b32fe9192.png', 'active', NULL, 67, '2019-09-07 05:00:00', '2020-01-07 18:43:57'),
(257, 'الكلاب', 'Dogs', 'a4617ef5358138f2448beabb4b7ecacd.png', 'active', NULL, 68, '2019-09-07 05:00:00', '2020-01-07 18:29:19'),
(258, 'القطط', 'the cats', '1717270f918e76329bf58418c955e44c.png', 'active', NULL, 68, '2019-09-07 05:00:00', '2020-01-07 18:29:24'),
(259, 'أخرى', 'Other', '1c5d083b00b6d9f9d10ae0f966b08558.png', 'active', NULL, 68, '2019-09-07 05:00:00', '2020-01-07 18:31:53'),
(260, 'الدواجن', 'Poultry', '0b954d50268a0fcb9bf8f21d63b3c75c.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:38:30'),
(261, 'الطيور الجارحة', 'wild birds', '69dbecb4ec5e9778520430bc7e47329b.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:38:31'),
(262, 'الحمام', 'pigeons', 'e8c8b32beeb129c918bb72c86ebf719f.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:39:09'),
(263, 'طيور ناطقة', 'Talking birds', '7ccaffea986cb916eafb1add7a6c8b19.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:39:15'),
(264, 'طيور مغردة', 'Songbirds', 'b58379c76c97717543dfe3800307c7fc.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:39:20'),
(265, 'أخرى', 'Other', 'cdb77272655be09e676f07a62ba1231b.png', 'active', NULL, 69, '2019-09-07 05:00:00', '2020-01-07 18:42:55'),
(266, 'الماشية', 'Cattle', 'c58481e5a6faa81de168fc82bb28d45c.png', 'active', NULL, 72, '2019-09-07 05:00:00', '2020-01-07 18:47:09'),
(267, 'الخيل', 'The horse', 'b63bd8272ef76284746cac7d60befc05.png', 'active', NULL, 72, '2019-09-07 05:00:00', '2020-01-07 18:47:13'),
(268, 'أخرى', 'Other', '7a4d4617bc6ae04ca735b8642ead2a4f.png', 'active', NULL, 72, '2019-09-07 05:00:00', '2020-01-07 18:48:17'),
(269, 'محاسبة و إدارة', 'Accounting and Management', 'ddf6cae00ed2f1fb41a959c7351cefc1.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:03:09'),
(270, 'تكنولوجيا', 'technology', 'd81fda4cdd8d6d49deff9e7f10b433a8.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:03:01'),
(271, 'هندسة', 'engineering', '7afb5736ddfd41920efb0f513050e960.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:02:46'),
(272, 'تسويق', 'marketing', 'c5fe14c89d2be376cba5bd285261c446.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:02:33'),
(273, 'طب', 'medicine', 'a8f24b39371cc17dd0e0b6546e898ef8.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:02:18'),
(274, 'الضيافة و السياحة', 'Hospitality and tourism', 'e083c809ffec99093c1885cc993d00d3.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:02:04'),
(275, 'نقل وخدمات لوجستية', 'Transport and logistic services', 'b1854c6e40f44355e77b9f68a6c79eed.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:01:46'),
(276, 'تعليم', 'education', '5089b052a0775ba9633e1187243c4156.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:01:33'),
(277, 'قانون', 'Law', 'c4112d110822861e0d959ec0a0c37f48.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:01:21'),
(278, 'عمارة وتصنيع', 'Architecture and manufacturing', 'd3dd1e7eb68073b477217acaaa459ba6.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:01:09'),
(279, 'وظائف خدمية', 'Service jobs', '6b1222848fd4aa270548f77a478b34b5.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:00:50'),
(280, 'وظائف أخرى', 'Other functions', '4fdd8511ea5666db00e62d3625de82bc.png', 'active', NULL, 73, '2019-09-07 05:00:00', '2020-01-07 15:00:34'),
(281, 'محاسبة و إدارة', 'Accounting and Management', '307f9f9875d2bd5a329e515d6dc84b5e.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:59:46'),
(282, 'تكنولوجيا', 'technology', '2e2978c7eb6e3c5819e4f5090f95c3f3.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:58:46'),
(283, 'هندسة', 'engineering', '806f816aed09b0609d450e26110cf457.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:56:53'),
(284, 'تسويق', 'marketing', '6c7876b26a76bee30fd618ebe84b1adc.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:55:35'),
(285, 'طب', 'medicine', 'ee3103ee699af655e8c89ba279c3ac57.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:47:40'),
(286, 'الضيافة و السياحة', 'Hospitality and tourism', 'f228cd989abbad1f637e026e3d42e7b8.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:51:38'),
(287, 'نقل وخدمات لوجستية', 'Transport and logistic services', '06ab18c7d256493da4120abe113778e8.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:45:29'),
(288, 'تعليم', 'education', 'dfa09039b7c8c4629324e8a0f1df8b74.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:44:38'),
(289, 'تطبيق القانون', 'law enforcement', '12debed366b359c19c5c8d25fa875325.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:42:50'),
(290, 'عمارة وتصنيع', 'Architecture and manufacturing', '2d1ee0f125306b07974ba166318482bf.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:40:32'),
(291, 'وظائف خدمية', 'Service jobs', '999283f70ad76fd48dae2c3eccb10ba7.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 14:38:40'),
(292, 'وظائف أخرى', 'Other functions', 'f9faa7af9caa6ef22f7870874be8ccc9.png', 'active', NULL, 74, '2019-09-07 05:00:00', '2020-01-07 13:41:50'),
(293, 'آسيوية', 'Asian', 'be091749ec89b06c7bc5d72c1ebfedac.png', 'active', NULL, 96, '2019-09-07 05:00:00', '2020-01-07 13:39:09'),
(294, 'أمريكية', 'American', '7c6517380a9844d78d53450839c51911.png', 'active', NULL, 96, '2019-09-07 05:00:00', '2020-01-07 13:36:50'),
(295, 'أوروبية', 'European', '0de8fd40148aedfa7d7ed78887e076ef.png', 'active', NULL, 96, '2019-09-07 05:00:00', '2020-01-05 20:34:35'),
(296, 'أمريكية', 'American', '92ef647495936ce8113cb0949c06f2b0.png', 'active', NULL, 105, '2019-09-07 05:00:00', '2020-01-05 20:35:14'),
(297, 'يابانية', 'Japanese', 'e4362444c5b3a1912fac76868a658435.png', 'active', NULL, 105, '2019-09-07 05:00:00', '2020-01-05 20:31:54'),
(298, 'أوروبية', 'European', '144acc0d71092155462efaa2702cad41.png', 'active', NULL, 105, '2019-09-07 05:00:00', '2020-01-05 20:33:01'),
(299, 'أطباء', 'Doctors', '1ade9f09b70715923aa8de52db965bb2.png', 'active', NULL, 167, '2019-09-07 05:00:00', '2020-01-05 20:29:34'),
(300, 'تمريض', 'nursing', '36bef4b914fc4ce9a45d04c2a4e0216d.png', 'active', NULL, 167, '2019-09-07 05:00:00', '2020-01-05 20:28:31'),
(301, 'صيدليات', 'Pharmacies', 'cfdb8d82ab01f81be90818c4598762bc.png', 'active', NULL, 167, '2019-09-07 05:00:00', '2020-01-05 20:27:42'),
(302, 'خدمات لذوي الإحتياجات الخاصة', 'Services for people with special needs', '21863489a881c5468773cad436696a89.png', 'active', NULL, 167, '2019-09-07 05:00:00', '2020-01-05 20:26:28'),
(303, 'رجال', 'Men', 'a64d7a3095e83f9196fac84731e432f0.png', 'active', NULL, 168, '2019-09-07 05:00:00', '2020-01-05 20:24:02'),
(304, 'سيدات', 'Ladies', '0b16ac42ae8f8abe48652fe4dac2df6b.png', 'active', NULL, 168, '2019-09-07 05:00:00', '2020-01-05 20:23:34'),
(305, 'رجال', 'Men', 'c9627e17bbd8677bfb9411850d3891cc.png', 'active', NULL, 169, '2019-09-07 05:00:00', '2020-01-05 20:21:00'),
(306, 'سيدات', 'Ladies', 'cd63382d30639442829525efbaa4fc69.png', 'active', NULL, 169, '2019-09-07 05:00:00', '2020-01-05 20:20:16'),
(307, 'اطفال', 'Children', '488e39e32b195451db1cbfbbc6ff82d6.png', 'active', NULL, 169, '2019-09-07 05:00:00', '2020-01-05 20:22:00'),
(308, 'رجال', 'Men', '9a472911f326cec1adbdabd864c994c9.png', 'active', NULL, 170, '2019-09-07 05:00:00', '2020-01-05 20:18:14'),
(309, 'سيدات', 'Ladies', '0ab2e48f5794298b253eab4ef084fd75.png', 'active', NULL, 170, '2019-09-07 05:00:00', '2020-01-05 20:16:23'),
(310, 'عربية', 'Arabic', '8ed5e0d11af91b3e52171c17748ed4b3.png', 'active', NULL, 181, '2019-09-07 05:00:00', '2020-01-05 20:13:58'),
(311, 'انجليزية', 'English', '80808dbf33bf3a8f27cb139a25872a82.png', 'active', NULL, 181, '2019-09-07 05:00:00', '2020-01-05 20:13:24'),
(312, 'فرنسية', 'French', 'a49978be5d333ec99317699311a9cb26.png', 'active', NULL, 181, '2019-09-07 05:00:00', '2020-01-05 20:12:09'),
(313, 'علوم', 'Sciences', 'a16fe522f6c2ab141fd525a12c48b7e9.png', 'active', NULL, 183, '2019-09-07 05:00:00', '2020-01-05 20:11:15'),
(314, 'فيزياء', 'physics', 'd7b1cd4b96295ef4df631dcf7c71dc18.png', 'active', NULL, 183, '2019-09-07 05:00:00', '2020-01-05 20:10:46'),
(315, 'كيمياء', 'chemistry', '600bddc1b048b499a3bea976168930e9.png', 'active', NULL, 183, '2019-09-07 05:00:00', '2020-01-05 20:12:59'),
(316, 'هواتف محمولة', 'Cell Phones', '20fbe2eadef786fdf2968e6aa787bc8c.png', 'active', NULL, 197, '2019-09-07 05:00:00', '2020-01-05 18:34:20'),
(317, 'أجهزة لوحية', 'Tablets', '9b713ef8fb061310fd6b7f7696a4fe3d.png', 'active', NULL, 197, '2019-09-07 05:00:00', '2020-01-05 18:33:07'),
(318, 'ارقام موبايلات', 'Mobile numbers', '0b498a3a811dc2a7522d8d83cc243687.png', 'active', NULL, 197, '2019-09-07 05:00:00', '2020-01-05 18:32:15'),
(319, 'اكسسوارات موبايلات', 'Mobile Accessories', 'd17ff5c5390c2998b647dc1c2e4864ad.png', 'active', NULL, 197, '2019-09-07 05:00:00', '2020-01-05 18:31:28'),
(320, 'خدمات الموبايلات', 'Mobile services', '606febd35d36ce19bb9278aaec3739f1.png', 'active', NULL, 197, '2019-09-07 05:00:00', '2020-01-05 18:29:44'),
(321, 'لابتوبات', 'Laptops', '905cfdb277654a24658b38bf1369660e.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 20:06:54'),
(322, 'كمبيوترات و شاشات', 'Computers and monitors', '77ef9840860c840294495109dae0610f.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 20:05:47'),
(323, 'طابعات', 'Printers', '305fb036a947b78fe9fb576b0b2d96af.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 20:04:22'),
(324, 'مستلزمات طابعات', 'Printer accessories', '6817b6531b20edef877e8b4714f2117e.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 20:04:05'),
(325, 'شبكات', 'Networks', 'e5a199d392289e7210b9bec05bca779a.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:31:25'),
(326, 'برامج و تطبيقات', 'Programs and applications', 'e0c54c8b7f57f9c7475f3ca94530d491.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:29:46'),
(327, 'أجهزة تحديد مواقع', 'GPS devices', '732fb9b6ae767064e3ddb2eaada957a9.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:28:14'),
(328, 'اكسسوارات الكمبيوتر', 'Computer accessories', 'dd0640f2af9ed298c658d8d59c233a6b.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:27:10'),
(329, 'خدمات الكمبيوترات والشبكات', 'Computer and network services', 'cd7f9ab261185bc5874f8816a867fde0.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:24:17'),
(330, 'أخرى', 'Other', '50c1122ec3bb52ae1aeeaa5a125bdee7.png', 'active', NULL, 201, '2019-09-07 05:00:00', '2020-01-04 19:22:40'),
(331, 'مراقبه', 'control', '596003637add1552c6b2be0b57b7a5a5.png', 'active', NULL, 205, '2019-09-07 05:00:00', '2020-01-04 15:40:08'),
(332, 'رقمية', 'Digital', 'd8103d109c8ca93beb349c74b43321cf.png', 'active', NULL, 205, '2019-09-07 05:00:00', '2020-01-04 15:38:44'),
(333, 'إحترافية', 'Professionalism', '5b36867c03535fb36c2c9ab96f182c0f.png', 'active', NULL, 205, '2019-09-07 05:00:00', '2020-01-04 15:37:38'),
(334, 'تلفزيونات', 'Televisions', 'cf261631295befe0152b7f193dfe60bb.jpg', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 14:59:59'),
(335, 'أجهزة تكييف ودفايات', 'Air conditioners and heaters', 'f98aaf60154a898e9f73f76eb567b86f.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:04:17'),
(336, 'ثلاجات', 'Refrigerators', '1a727e16cfae492864ac2c894e21a23a.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:05:55'),
(337, 'أفران', 'Ovens', '3c7e1f235edafe2ce8b8b77156f4c68b.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:11:58'),
(338, 'غسالات', 'Washers', 'fd8062a4db5053b820d11fe714ec32bf.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:35:05'),
(339, 'برادات مياه', 'Water coolers', 'a957743d0fba8690018030c04ab43afd.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:34:04'),
(340, 'أجهزة أخرى', 'Other devices', '29f56b5cece99a26cbbd09c99e43735a.png', 'active', NULL, 206, '2019-09-07 05:00:00', '2020-01-04 15:32:22'),
(341, 'ألعاب فيديو', 'video games', '095d2102e38d2f2dace371e728bb2b76.png', 'active', NULL, 207, '2019-09-07 05:00:00', '2020-01-04 14:56:37'),
(342, 'بلاي ستيشن', 'Play Station', 'b2015d4b7064d2ffde18a474285e533d.png', 'active', NULL, 207, '2019-09-07 05:00:00', '2020-01-04 14:18:30'),
(343, 'إكس بوكس', 'X-Box', 'dec5b29aee85a9152a38071b5f4dd521.jpg', 'active', NULL, 207, '2019-09-07 05:00:00', '2020-01-04 14:17:47'),
(344, 'ألعاب لاسلكية', 'Wireless games', 'df6abf626cefd2da4bd04ac27cef804e.jpg', 'active', NULL, 207, '2019-09-07 05:00:00', '2020-01-04 14:16:55'),
(350, 'مستحضرات تجميل', 'Beauty products', 'e33fdbf0b44fa30a17ee8851657feff1.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:43:29'),
(351, 'اكسسوارات نسائية', 'womens accessories', 'ee1ed91bf0f8ad5ae879f74ae143f4ad.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:43:04'),
(352, 'ملابس', 'Clothes', '3e43211069cd6884a26501e4a026a61a.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-04 15:29:32'),
(353, 'مستحضرات تجميل', 'Beauty products', 'be6aad6f63aef755d9f5b9aac852123a.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:40:46'),
(354, 'اكسسوارات نسائية', 'womens accessories', 'e6789a110db94340afc8c0e1d8ac507a.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:39:28'),
(355, 'أقمشة نسائية', 'Womens fabric', 'f80f5c7d8aea3c9e7f438c9105371591.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:37:56'),
(356, 'حقائب وأحذية', 'Bags and shoes', 'bebc966e553136ac6517f5bf1fb9e367.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:37:01'),
(357, 'عطور نسائية', 'Women Perfumes', 'a6aa938a1208a64e768947dace65e678.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:35:44'),
(358, 'منتجات عناية', 'Care products', '90d5b0e679abaad11948fde667f3a10c.png', 'active', NULL, 229, '2019-09-07 05:00:00', '2020-01-02 18:33:23'),
(359, 'ملابس', 'clothes', '88ee51fed840ca32b879ef3993eec7af.png', 'active', NULL, 230, '2019-09-07 05:00:00', '2020-01-04 15:27:49'),
(360, 'حقائب وأحذية', 'Bags and shoes', '052839b280fb1ffe6c9ab218b180ab93.png', 'active', NULL, 230, '2019-09-07 05:00:00', '2020-01-02 18:31:18'),
(361, 'اكسسوارات', 'Accessories', '4f03fc845b1eda192f7e5808579ee6f7.png', 'active', NULL, 230, '2019-09-07 05:00:00', '2020-01-02 18:30:20'),
(362, 'أقمشة', 'Fabrics', 'd4ccf44240aacf21bc9be6a55567844c.png', 'active', NULL, 230, '2019-09-07 05:00:00', '2020-01-02 18:29:05'),
(363, 'عطور', 'Perfumes', '90f8a5d3ccf82bfa51b67cec1a4032c3.png', 'active', NULL, 230, '2019-09-07 05:00:00', '2020-01-02 18:28:07'),
(364, 'غرف نوم', 'bed room', '3435cf7aa09548aa9dffd7614ba73e33.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-04 15:25:36'),
(365, 'غرف معيشة', 'living rooms', 'edd34e6817912f41a4a0a9bfdfc62ee1.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-02 16:52:31'),
(366, 'طاولات', 'Tables', '2152a37c206dcadb1e9d265e71515b4d.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-02 16:34:53'),
(367, 'ديوانيات', 'Diwaniyas', '9b49ce0135b98ff04de1e32539d816ed.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-04 15:21:55'),
(368, 'مطابخ', 'Kitchens', '22ac6f4c09f8c434322b822236092055.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-04 15:24:14'),
(369, 'ديكور', 'Scenery', '267b99a63e2d41513453b877b78f7492.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-02 16:28:27'),
(370, 'مستلزمات منزليه', 'Household items', '731b031a287d5465ce7e1968f03c923e.png', 'active', NULL, 233, '2019-09-07 05:00:00', '2020-01-02 16:27:35'),
(371, 'ستائر', 'Curtains', 'ca64e6bb9647b3ccf065a485ce6436b6.png', 'active', NULL, 236, '2019-09-07 05:00:00', '2020-01-02 16:25:41'),
(372, 'سجاد', 'Carpets', '777a7c6010b64e75f01f958c20fb9259.png', 'active', NULL, 236, '2019-09-07 05:00:00', '2020-01-02 16:24:47'),
(373, 'فرش طبي', 'Medical brushes', '38cca129d2d8609e2a5eb41df529ac05.png', 'active', NULL, 236, '2019-09-07 05:00:00', '2020-01-02 16:24:23'),
(374, 'أغطية سرير', 'bed covers', '57d438ea07da2ce32940377f56503c44.png', 'active', NULL, 236, '2019-09-07 05:00:00', '2020-01-02 16:23:40'),
(375, 'ايفون', 'Iphone', '81bd864e8466e301558cf3a22b17283a.png', 'active', NULL, 316, '2019-09-07 05:00:00', '2020-01-02 16:21:06'),
(376, 'سامسونج', 'Samsung', 'c5dae117919a7bcce8f6071c18dc913e.png', 'active', NULL, 316, '2019-09-07 05:00:00', '2020-01-02 16:18:00'),
(377, 'هواوي', 'Huawei', '9db62df1f071dccdb4895b1d3164cf0a.png', 'active', NULL, 316, '2019-09-07 05:00:00', '2020-01-02 16:19:58'),
(378, 'أخرى', 'Other', '841442a7fa39f59de1ebb83529032107.png', 'active', NULL, 316, '2019-09-07 05:00:00', '2020-01-01 21:01:35'),
(379, 'ابل', 'Apple', '3a64b2b3dca7bcefe28f5b8e9efbe2ce.png', 'active', NULL, 321, '2019-09-07 05:00:00', '2020-01-01 21:00:07'),
(380, 'ايسر', 'Acer', '32a44a75a0926506b913b6eea525f05f.png', 'active', NULL, 321, '2019-09-07 05:00:00', '2020-01-01 20:58:34'),
(381, 'ديل', 'Dell', '4cd04a8aa4ac7af0a36356f9be99d3e0.jpg', 'active', NULL, 321, '2019-09-07 05:00:00', '2020-01-01 20:56:42'),
(382, 'اتش بي', 'HP', 'c99e045b8c7bdb66e93403397920d79c.png', 'active', NULL, 321, '2019-09-07 05:00:00', '2020-01-01 20:47:57'),
(383, 'أخرى', 'Other', '15f467bf63bf98586123110fd0e4e97b.png', 'active', NULL, 321, '2019-09-07 05:00:00', '2020-01-01 20:47:03'),
(384, 'محافظ', 'governor', '0dd38c34bfde15eb15ac3f4ead081ae2.png', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-01 20:42:54'),
(385, 'أحجار كريمة', 'Gemstones', '8bcc6fe34cd76223330391a505648d7d.png', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-01 20:41:38'),
(386, 'مسابيح', 'Repairs', 'b874777bf24c07ffef84ea7469b61157.jpg', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-01 20:27:16'),
(387, 'ساعات', 'Hours', '60da05524f7ddd3ea4a711b75f020dfb.png', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-01 20:22:46'),
(388, 'نظارات شمسية', 'sunglasses', '7123bf8283ecc6d3b5ac45ecce35b392.png', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-01 18:48:14'),
(389, 'أقلام', 'Pens', 'ef0c74e896e55d65625e4df0dd126242.png', 'active', NULL, 361, '2019-09-07 05:00:00', '2020-01-04 15:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `address`, `desc`, `gender`, `lat`, `lng`, `image`, `wallet`, `device_token`, `role`, `status`, `available`, `type`, `lang`, `country_id`, `remember_token`, `created_at`, `updated_at`, `mobile_code`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$AjUBtdsHnpzpHEv5acwDjeGQXfWP.vUSAsaskcu1dOHMuNqTSQILK', '0120120353', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL, NULL, 'fwlkO72u56Tm4QDD42T7YlmphZcUKSgXdfqaFNZifsa3zoFAnfVwCRKhcPdY', '2019-09-07 22:00:00', '2020-01-24 15:49:26', NULL),
(3, 'ragab ragab', 'ragab@gmail.com', '$2y$10$x1fkQHoKmY24Ct21AzCG1eZwz2T1TwLU5hjNc1UKtGQVBvQe/iUjq', '012012012', 'elmaadi-cairo', 'dgsgerreteyre', 'male', '29.36556124644', '31.210236144455', NULL, '31', NULL, 'user', 'active', 1, 1, NULL, 2, 'R0XGuRtHufrgTQ143Q8mvMFpWPY73tuwnxSG2HZsO00VcxFErM7UTeBwBBhF', '2019-09-18 19:26:10', '2019-10-09 18:36:39', '02'),
(4, 'ragfdab ragab', 'rag4dabd@gmail.com', '$2y$10$REUS1UBBpsIDXtXkLv3iTOFEerbaD9tBgO5gJrsTLcCyfHLWn9xuu', '0120155012', 'elmaadi-cairo', 'dgsgerreteyre', 'male', '29.36556124644', '31.210236144455', NULL, '3', NULL, 'user', 'active', 1, NULL, NULL, 2, 'xWPJxPZZ0VAN9oIJ5lvtabEL50inxZPzYMh4xnGrw6HP8JOOTxiMcWiYLWJm', '2019-12-16 23:13:53', '2019-12-16 23:13:53', '02'),
(5, 'ahmed sayed', 'eng.aboali712@gmail.com', '$2y$10$c/23hHx.b4Mxn/VT2vqjxuKAJGQJZa4/SGvMfQ7Tnnye/HKfmPqEG', '1030025254', 'Unnamed Road, هورين، مركز بركة السبع، المنوفية، مصر', 'cZYDrssmQcQ:APA91bHWB0esM9_wun1FT2fsc9Tq_wTwgqRF9OnsEvncXGoavOePg2zRva5PlB8e2UcGvuzTr_kLmoM5cGmQPjdJpkG1WnMM7cX78FT0nUnWp8C0axveOlLcOL8B3IrG9hkIeAzrNJIP', 'male', '30.6507499', '31.1326592', '6996e6bc987d73eed2ba0d850a537f44.png', '4', 'cZYDrssmQcQ:APA91bHWB0esM9_wun1FT2fsc9Tq_wTwgqRF9OnsEvncXGoavOePg2zRva5PlB8e2UcGvuzTr_kLmoM5cGmQPjdJpkG1WnMM7cX78FT0nUnWp8C0axveOlLcOL8B3IrG9hkIeAzrNJIP', 'user', 'active', 1, 0, NULL, 2, 'ka4aph2uGG85NVmBJNbmf9Pa77O53UbinkQ4MSEb3tkd2RC6jYFViZoRwRSJ', '2019-12-16 23:46:07', '2020-01-01 05:26:43', '+20'),
(6, 'معتصم', 'Motassem2010@gmail.com', '$2y$10$CG6A9Om6YXgok/izlV8RA.KZ7g9uc8PfMOcGjcD/IcBhD1YnWSC9W', '55201718', 'مقابل سما مول شارع 22، الكويت‎', 'fkl8fXMBbSE:APA91bE3vcyWWuUeez5urPCxZZ_3OaNk3Mfdf10IyedtODJipM2RhHP8B4jZSJQxfmXBXxtSLgxpsyhe3WobHSQoS2sfZI32t5dnknoxJYJylodyUFlselH07-6ArWDz_MuPFcPWcurO', 'male', '29.2949081', '47.9665456', NULL, '4', 'fkl8fXMBbSE:APA91bE3vcyWWuUeez5urPCxZZ_3OaNk3Mfdf10IyedtODJipM2RhHP8B4jZSJQxfmXBXxtSLgxpsyhe3WobHSQoS2sfZI32t5dnknoxJYJylodyUFlselH07-6ArWDz_MuPFcPWcurO', 'user', 'active', 1, NULL, NULL, 2, 'A5SmlGTic7WGPACnadoJBXGRkduHfcOw5PFofFL8LXlQk4d8hgSkFk7uEe5S', '2019-12-19 18:55:46', '2019-12-19 19:18:19', '+965'),
(8, 'Mansour Saad', 'mansour.saad10@gmail.com', '$2y$10$KcyDLDzhmi8xtrW2WRSgOOFaxrtuOTM2eiegj4oCLQ0dH4XReQ/Ve', '98936254', 'شارع 86، الفروانية، الكويت‎', 'cb3B3aHPp0s:APA91bHb2v0Cz5az6OzhOZDJSPVJF1Vyt9A04qtIX9ic1EFiPGmJteOOI4cxGxIPE4pafNmToVBwlDJyWyspdaDDmdoH0_Ia2RHOEOfpgbM6kEUGRMGCPF-JgiZzGzcOK8nf5tA2fhDj', 'male', '29.2865868', '47.9580631', 'd7f3ef3305df02c1012224c6559d150f.png', '101', 'fZR5qqdAy9w:APA91bF69p1zN-sJBeCDW4Ry4nhp3ZXrtSlcRpa2wbrrgIYLzpdf9_BAIkuhH2iMKeQmSK3vWEf4EmUtdtBvVxDiIqF4LJ2wTrIHMj80lU2yYMdTE9oJIcOZH0kuhuCMReLD0ziRX0BG', 'user', 'active', 1, 0, NULL, 2, 'yrY9fyvFX1UbvW0NyeFuijTCC6HAlTWzUFyHCxKk8XRPmTTluNOUhLIXAvFb', '2019-12-23 21:11:34', '2020-01-03 02:42:38', '+965'),
(9, 'ameer', 'ameer@gmaip.com', '$2y$10$NdhtjSObWJuRMlfqu01W1OZxVt9VAQecMC3GMg0/iSxFlDpRwvSmC', '1030023255', 'هورين، بركة السبع،، هورين، مركز بركة السبع، المنوفية، مصر', 'c_s7SrVuMZk:APA91bEHPgSLXxJat43xNOTC1atBzueYlSDOmN2TyEa8oHpwDnY81oDBVRQn28Wu3unosqnNQ_hlTMB9hOpT79a1NFAnxl0CRrpkiWXBNE-ZIcDAAfRdnd1xB-oMy_MetmeDWLMEnPUj', 'male', '30.652187', '31.1309754', NULL, '3', 'c_s7SrVuMZk:APA91bEHPgSLXxJat43xNOTC1atBzueYlSDOmN2TyEa8oHpwDnY81oDBVRQn28Wu3unosqnNQ_hlTMB9hOpT79a1NFAnxl0CRrpkiWXBNE-ZIcDAAfRdnd1xB-oMy_MetmeDWLMEnPUj', 'user', 'active', 1, NULL, NULL, 2, 'KG9vu14KwdfC6apvlexSV4TKXgutqGgX1upg3f8C0IxTwtZm7dcowx1Ame8C', '2019-12-27 01:43:50', '2020-01-03 21:33:26', '+20'),
(10, 'raheem', 'raheem@gmail.com', '$2y$10$2SDVBnPrWuXiEwNESczWFOmucYSZTsD81VtDYcywi7fTQbUFRvb3y', '50857109', 'شارع 36، خيطان،، الكويت‎', 'e8SUl4mwbSw:APA91bFAkjcP4C-0wUnD2pr7Pj1BVXH_xjNRC1tuVibEt48HhodiC5_r4OgFpvNwnsWDKcRaoGyZ4TksdDCFjUU5QX_PXLGyMpJx1GUgxJZb7IgHe3Ax_xXkaBb4uzHZSFwF2hoXYTjQ', 'male', '29.2942782', '47.9770169', NULL, '10', 'e8SUl4mwbSw:APA91bFAkjcP4C-0wUnD2pr7Pj1BVXH_xjNRC1tuVibEt48HhodiC5_r4OgFpvNwnsWDKcRaoGyZ4TksdDCFjUU5QX_PXLGyMpJx1GUgxJZb7IgHe3Ax_xXkaBb4uzHZSFwF2hoXYTjQ', 'user', 'active', 1, NULL, NULL, 2, 'FKXsaCwZq69yTP6Gjc5079FxQ7EUD9oYSFFEUo1Xyfw9zcYoq2fbBu3HYJHJ', '2019-12-29 05:36:15', '2019-12-29 05:45:59', '+965'),
(11, 'sabry', 'sabry@gmail.com', '$2y$10$WHfawBAU4wNjf8KTfOZ/U.4FycU4bReoI4T8f0.RHh6rx.APHGM5i', '60708090', 'شارع محمد حبيب البدر، الكويت‎', 'cjuTpIPd-Ak:APA91bEuoEHvZGlHpFPcA2gTwDjmW0YMC_tFIFQ1vmI3NwWUJHEsHNbqH63k7omBPnZLTMYcNXf4mWIMPed2Mg1Y6f5f12W1F3TLtnaxLamuAx1-wlWnGIe30Fy8hEir30ZCF5SqJJMu', 'male', '29.3485105', '48.0008909', NULL, '3', 'cjuTpIPd-Ak:APA91bEuoEHvZGlHpFPcA2gTwDjmW0YMC_tFIFQ1vmI3NwWUJHEsHNbqH63k7omBPnZLTMYcNXf4mWIMPed2Mg1Y6f5f12W1F3TLtnaxLamuAx1-wlWnGIe30Fy8hEir30ZCF5SqJJMu', 'user', 'active', 1, NULL, NULL, 2, 'Puq7unnqiEsyHAjudja7hbArgdNXdeU4EBzHbIdVGjgMpPotTVT5wV7Z2tOg', '2019-12-29 13:45:14', '2019-12-29 13:45:14', '+965'),
(12, 'مشعل', 'Fncr79@gmail.com', '$2y$10$dF09zJRFMFCf3NRHygeSvOc8GHNqzkKQZuEaNUYTn5.DwvIWg.HbO', '66600342', '43 شارع 3، الجهراء، الكويت‎', NULL, 'male', '29.3437577', '47.6920617', '5c3ddeca2a6658c3078ccb4ca693ea02.png', '1000503', 'f8gzpjVwAPA:APA91bEiW-U0csVb34kjwoltRQR9uqK07K0S5wBXBfoPjoniwiYu0o6R6qhRwgsekByU5sxEUS2ijChMIsf2Hs2BR4QP-jm5NnHnpYvpSEuXyWj5nEpZuPE_Ey_S067Vd8c7_dgCnDaH', 'user', 'active', 1, NULL, NULL, 2, 'S494J6LONhmbKarZKqEGBSnr5ZrGfdKEh0ng1PnWMQJmYqi24D0wEv6rZkPW', '2020-01-01 07:38:35', '2020-01-04 10:58:19', '+965'),
(13, 'sfsaf', 'sf@gmail.com', NULL, '+201207908327', 'dfasdf', 'dgs sgs gsdg', NULL, NULL, NULL, '2fa35a3c445b9f72fd053207616ee935.png', NULL, NULL, 'user', 'active', NULL, NULL, NULL, 2, NULL, '2020-01-24 18:12:49', '2020-01-24 18:15:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_category_id_foreign` (`category_id`),
  ADD KEY `advertisements_sub_id_foreign` (`sub_id`),
  ADD KEY `advertisements_user_id_foreign` (`user_id`),
  ADD KEY `advertisements_country_id_foreign` (`country_id`),
  ADD KEY `advertisements_city_id_foreign` (`city_id`),
  ADD KEY `advertisements_area_id_foreign` (`area_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_country_d_foreign` (`country_d`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_d_foreign` (`country_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `delegates`
--
ALTER TABLE `delegates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delegate_locations`
--
ALTER TABLE `delegate_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delegate_locations_location_id_foreign` (`location_id`),
  ADD KEY `delegate_locations_delegate_id_foreign` (`delegate_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`),
  ADD KEY `favourites_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_country_id_foreign` (`country_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

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
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_user_id_foreign` (`user_id`),
  ADD KEY `views_ad_id_foreign` (`ad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delegates`
--
ALTER TABLE `delegates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delegate_locations`
--
ALTER TABLE `delegate_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `advertisements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `advertisements_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `advertisements_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `advertisements_sub_id_foreign` FOREIGN KEY (`sub_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `advertisements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `areas_country_d_foreign` FOREIGN KEY (`country_d`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_d_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `delegate_locations`
--
ALTER TABLE `delegate_locations`
  ADD CONSTRAINT `delegate_locations_delegate_id_foreign` FOREIGN KEY (`delegate_id`) REFERENCES `delegates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `delegate_locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sub_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
