-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 01:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opg_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `visitor_email`, `created_at`, `updated_at`) VALUES
(47, 'marin@gmail', '2020-09-29 15:13:57', '2020-09-29 15:13:57'),
(48, 'asda@d2da', '2020-09-29 15:15:58', '2020-09-29 15:15:58'),
(49, 'marin@gmail', '2020-09-29 15:16:13', '2020-09-29 15:16:13'),
(50, 'asda@d2da', '2020-09-29 15:17:17', '2020-09-29 15:17:17'),
(51, '1marin.sabljo@gmail.com', '2020-09-29 19:57:24', '2020-09-29 19:57:24'),
(52, '1marin.sabljo@gmail.com', '2020-09-30 13:10:51', '2020-09-30 13:10:51'),
(53, 'marin.sabljo@gmail.com', '2020-09-30 16:42:38', '2020-09-30 16:42:38'),
(54, '1marin.sabljo@gmail.com', '2020-09-30 16:54:23', '2020-09-30 16:54:23'),
(55, 'asda@d2da', '2020-09-30 16:56:03', '2020-09-30 16:56:03'),
(56, 'marin@gmail', '2020-09-30 16:57:06', '2020-09-30 16:57:06'),
(57, 'marin@gmail', '2020-09-30 16:57:46', '2020-09-30 16:57:46'),
(58, 'marin.sabljo@gmail.com', '2020-09-30 16:58:18', '2020-09-30 16:58:18'),
(59, '1marin.sabljo@gmail.com', '2020-09-30 16:59:17', '2020-09-30 16:59:17'),
(60, '1marin.sabljo@gmail.com', '2020-09-30 17:02:03', '2020-09-30 17:02:03'),
(61, 'marin.sabljo@gmail.com', '2020-09-30 17:02:14', '2020-09-30 17:02:14'),
(62, 'marin@gmail', '2020-09-30 17:03:18', '2020-09-30 17:03:18'),
(63, 'marin@gmail', '2020-09-30 17:03:59', '2020-09-30 17:03:59'),
(64, 'marin.sabljo@gmail.com', '2020-09-30 17:04:07', '2020-09-30 17:04:07'),
(65, '1marin.sabljo@gmail.com', '2020-09-30 17:04:47', '2020-09-30 17:04:47'),
(66, 'marin@gmail', '2020-09-30 17:05:27', '2020-09-30 17:05:27'),
(67, 'marin@gmail', '2020-09-30 17:05:41', '2020-09-30 17:05:41'),
(68, 'asda@d2da', '2020-09-30 17:05:52', '2020-09-30 17:05:52'),
(69, 'asda@d2da', '2020-09-30 17:06:26', '2020-09-30 17:06:26'),
(70, '1marin.sabljo@gmail.com', '2020-09-30 17:06:34', '2020-09-30 17:06:34'),
(71, '1marin.sabljo@gmail.com', '2020-09-30 17:06:57', '2020-09-30 17:06:57'),
(72, 'marin@gmail', '2020-09-30 17:07:19', '2020-09-30 17:07:19'),
(73, 'marin@gmail', '2020-09-30 17:07:33', '2020-09-30 17:07:33'),
(74, 'marin.sabljo@gmail.com', '2020-09-30 17:07:51', '2020-09-30 17:07:51'),
(75, 'marin.sabljo@gmail.com', '2020-09-30 17:07:59', '2020-09-30 17:07:59'),
(76, 'marin.sabljo@gmail.com', '2020-09-30 17:08:21', '2020-09-30 17:08:21'),
(77, 'marin.sabljo@gmail.com', '2020-09-30 17:08:51', '2020-09-30 17:08:51'),
(78, 'asda@d2da', '2020-09-30 17:09:16', '2020-09-30 17:09:16'),
(79, 'marin.sabljo@gmail.com', '2020-09-30 17:09:24', '2020-09-30 17:09:24'),
(80, '1marin.sabljo@gmail.com', '2020-09-30 17:10:09', '2020-09-30 17:10:09'),
(81, 'marin@gmail', '2020-09-30 17:10:49', '2020-09-30 17:10:49'),
(82, 'marin@gmail', '2020-09-30 17:10:56', '2020-09-30 17:10:56'),
(83, 'marin@gmail', '2020-09-30 17:11:16', '2020-09-30 17:11:16'),
(84, 'marin.sabljo@gmail.com', '2020-09-30 17:14:03', '2020-09-30 17:14:03'),
(85, 'asda@d2da', '2020-09-30 17:26:00', '2020-09-30 17:26:00'),
(86, '1marin.sabljo@gmail.com', '2020-09-30 17:34:36', '2020-09-30 17:34:36'),
(87, '1marin.sabljo@gmail.com', '2020-09-30 17:35:50', '2020-09-30 17:35:50'),
(88, 'marin@gmail', '2020-09-30 17:36:07', '2020-09-30 17:36:07'),
(89, '1marin.sabljo@gmail.com', '2020-09-30 17:38:39', '2020-09-30 17:38:39'),
(90, '1marin.sabljo@gmail.com', '2020-09-30 17:39:32', '2020-09-30 17:39:32'),
(91, '1marin.sabljo@gmail.com', '2020-09-30 17:40:30', '2020-09-30 17:40:30'),
(92, 'asda@d2da', '2020-09-30 17:40:51', '2020-09-30 17:40:51'),
(93, 'marin@gmail', '2020-09-30 17:41:46', '2020-09-30 17:41:46'),
(94, 'marin@gmail', '2020-09-30 17:42:07', '2020-09-30 17:42:07'),
(95, 'marin@gmail', '2020-09-30 17:42:27', '2020-09-30 17:42:27'),
(96, '1marin.sabljo@gmail.com', '2020-09-30 17:42:49', '2020-09-30 17:42:49'),
(97, 'marin@gmail', '2020-09-30 17:42:57', '2020-09-30 17:42:57'),
(98, 'marin.sabljo@gmail.com', '2020-09-30 17:43:09', '2020-09-30 17:43:09'),
(99, 'marin.sabljo@gmail.com', '2020-09-30 17:46:12', '2020-09-30 17:46:12'),
(100, 'marin@gmail', '2020-09-30 17:46:29', '2020-09-30 17:46:29'),
(101, 'marin@gmail', '2020-09-30 17:46:38', '2020-09-30 17:46:38'),
(102, 'marin.sabljo@gmail.com', '2020-09-30 17:46:49', '2020-09-30 17:46:49'),
(103, 'marin.sabljo@gmail.com', '2020-09-30 17:47:01', '2020-09-30 17:47:01'),
(104, 'marin.sabljo@gmail.com', '2020-09-30 17:47:28', '2020-09-30 17:47:28'),
(105, 'marin@gmail', '2020-09-30 17:47:36', '2020-09-30 17:47:36'),
(106, 'marin@gmail', '2020-09-30 17:47:42', '2020-09-30 17:47:42'),
(107, 'marin.sabljo@gmail.com', '2020-09-30 17:47:53', '2020-09-30 17:47:53'),
(108, 'marin.sabljo@gmail.com', '2020-09-30 17:48:33', '2020-09-30 17:48:33'),
(109, '1marin.sabljo@gmail.com', '2020-09-30 17:49:10', '2020-09-30 17:49:10'),
(110, '1marin.sabljo@gmail.com', '2020-09-30 17:49:36', '2020-09-30 17:49:36'),
(111, '1marin.sabljo@gmail.com', '2020-09-30 17:49:56', '2020-09-30 17:49:56'),
(112, '1marin.sabljo@gmail.com', '2020-09-30 17:50:20', '2020-09-30 17:50:20'),
(113, 'marin.sabljo@gmail.com', '2020-09-30 17:50:32', '2020-09-30 17:50:32'),
(114, '1marin.sabljo@gmail.com', '2020-09-30 17:50:43', '2020-09-30 17:50:43'),
(115, 'asda@d2da', '2020-09-30 17:50:52', '2020-09-30 17:50:52'),
(116, 'marin@gmail', '2020-09-30 17:51:07', '2020-09-30 17:51:07'),
(117, 'marin.sabljo@gmail.com', '2020-09-30 17:51:18', '2020-09-30 17:51:18'),
(118, 'marin.sabljo@gmail.com', '2020-09-30 17:51:27', '2020-09-30 17:51:27'),
(119, 'asda@d2da', '2020-09-30 17:51:36', '2020-09-30 17:51:36'),
(120, 'asda@d2da', '2020-09-30 17:51:40', '2020-09-30 17:51:40'),
(121, 'asda@d2da', '2020-09-30 17:51:51', '2020-09-30 17:51:51'),
(122, 'marin.sabljo@gmail.com', '2020-09-30 17:52:45', '2020-09-30 17:52:45'),
(123, '1marin.sabljo@gmail.com', '2020-09-30 17:52:59', '2020-09-30 17:52:59'),
(124, 'marin.sabljo@gmail.com', '2020-09-30 17:53:26', '2020-09-30 17:53:26'),
(125, 'marin@gmail', '2020-09-30 17:53:33', '2020-09-30 17:53:33'),
(126, 'marin.sabljo@gmail.com', '2020-09-30 17:53:47', '2020-09-30 17:53:47'),
(127, 'marin@gmail', '2020-09-30 17:53:56', '2020-09-30 17:53:56'),
(128, '1marin.sabljo@gmail.com', '2020-09-30 17:57:13', '2020-09-30 17:57:13'),
(129, 'marin@gmail', '2020-09-30 18:03:36', '2020-09-30 18:03:36'),
(130, 'marin@gmail', '2020-09-30 18:03:52', '2020-09-30 18:03:52'),
(131, 'marin@gmail', '2020-09-30 18:05:48', '2020-09-30 18:05:48'),
(132, 'marin.sabljo@gmail.com', '2020-09-30 18:06:58', '2020-09-30 18:06:58'),
(133, 'asda@d2da', '2020-09-30 18:10:34', '2020-09-30 18:10:34'),
(134, 'marin@gmail', '2020-09-30 18:11:23', '2020-09-30 18:11:23'),
(135, '1marin.sabljo@gmail.com', '2020-09-30 18:11:31', '2020-09-30 18:11:31'),
(136, 'marin@gmail', '2020-09-30 18:11:41', '2020-09-30 18:11:41'),
(137, 'asda@d2da', '2020-09-30 18:11:51', '2020-09-30 18:11:51'),
(138, 'marin@gmail', '2020-09-30 18:12:17', '2020-09-30 18:12:17'),
(139, 'marin.sabljo@gmail.com', '2020-09-30 18:12:23', '2020-09-30 18:12:23'),
(140, 'marin@gmail', '2020-09-30 18:12:46', '2020-09-30 18:12:46'),
(141, '1marin.sabljo@gmail.com', '2020-09-30 18:12:51', '2020-09-30 18:12:51'),
(142, 'marin@gmail', '2020-09-30 18:13:51', '2020-09-30 18:13:51'),
(143, 'marin@gmail', '2020-09-30 18:14:18', '2020-09-30 18:14:18'),
(144, '1marin.sabljo@gmail.com', '2020-09-30 18:14:26', '2020-09-30 18:14:26'),
(145, 'marin@gmail', '2020-09-30 18:18:38', '2020-09-30 18:18:38'),
(146, 'marin@gmail', '2020-09-30 18:21:24', '2020-09-30 18:21:24'),
(147, 'marin.sabljo@gmail.com', '2020-09-30 18:25:32', '2020-09-30 18:25:32'),
(148, '1marin.sabljo@gmail.com', '2020-09-30 18:25:38', '2020-09-30 18:25:38'),
(149, 'marin@gmail', '2020-09-30 18:25:44', '2020-09-30 18:25:44'),
(150, 'marin.sabljo@gmail.com', '2020-09-30 18:26:10', '2020-09-30 18:26:10'),
(151, 'marin@gmail', '2020-09-30 18:26:16', '2020-09-30 18:26:16'),
(152, 'marin@gmail', '2020-09-30 18:26:20', '2020-09-30 18:26:20'),
(153, 'marin.sabljo@gmail.com', '2020-09-30 18:26:28', '2020-09-30 18:26:28'),
(154, 'marin@gmail', '2020-09-30 18:26:50', '2020-09-30 18:26:50'),
(155, 'asda@d2da', '2020-09-30 18:26:56', '2020-09-30 18:26:56'),
(156, '1marin.sabljo@gmail.com', '2020-09-30 18:27:54', '2020-09-30 18:27:54'),
(157, '1marin.sabljo@gmail.com', '2020-09-30 18:28:07', '2020-09-30 18:28:07'),
(158, 'marin@gmail', '2020-09-30 18:28:32', '2020-09-30 18:28:32'),
(159, 'marin.sabljo@gmail.com', '2020-09-30 18:28:36', '2020-09-30 18:28:36'),
(160, 'marin@gmail', '2020-09-30 18:28:42', '2020-09-30 18:28:42'),
(161, 'marin@gmail', '2020-09-30 18:29:03', '2020-09-30 18:29:03'),
(162, '1marin.sabljo@gmail.com', '2020-09-30 18:29:08', '2020-09-30 18:29:08'),
(163, 'marin.sabljo@gmail.com', '2020-09-30 18:29:12', '2020-09-30 18:29:12'),
(164, 'marin.sabljo@gmail.com', '2020-09-30 18:29:23', '2020-09-30 18:29:23'),
(165, '1marin.sabljo@gmail.com', '2020-09-30 18:29:36', '2020-09-30 18:29:36'),
(166, '1marin.sabljo@gmail.com', '2020-09-30 18:29:41', '2020-09-30 18:29:41'),
(167, 'marin@gmail', '2020-09-30 18:29:59', '2020-09-30 18:29:59'),
(168, 'marin@gmail', '2020-09-30 18:31:09', '2020-09-30 18:31:09'),
(169, 'marin.sabljo@gmail.com', '2020-09-30 18:31:12', '2020-09-30 18:31:12'),
(170, 'marin.sabljo@gmail.com', '2020-09-30 18:31:17', '2020-09-30 18:31:17'),
(171, 'marin.sabljo@gmail.com', '2020-09-30 18:31:26', '2020-09-30 18:31:26'),
(172, 'marin@gmail', '2020-09-30 18:31:29', '2020-09-30 18:31:29'),
(173, 'asda@d2da', '2020-09-30 18:32:02', '2020-09-30 18:32:02'),
(174, 'marin@gmail', '2020-09-30 18:32:06', '2020-09-30 18:32:06'),
(175, '1marin.sabljo@gmail.com', '2020-09-30 18:32:13', '2020-09-30 18:32:13'),
(176, '1marin.sabljo@gmail.com', '2020-09-30 18:33:18', '2020-09-30 18:33:18'),
(177, '1marin.sabljo@gmail.com', '2020-09-30 18:33:28', '2020-09-30 18:33:28'),
(178, 'marin@gmail', '2020-09-30 18:33:33', '2020-09-30 18:33:33'),
(179, 'asda@d2da', '2020-09-30 18:33:45', '2020-09-30 18:33:45'),
(180, '1marin.sabljo@gmail.com', '2020-09-30 18:34:55', '2020-09-30 18:34:55'),
(181, 'asda@d2da', '2020-09-30 18:35:03', '2020-09-30 18:35:03'),
(182, 'marin@gmail', '2020-09-30 18:35:09', '2020-09-30 18:35:09'),
(183, '1marin.sabljo@gmail.com', '2020-09-30 18:36:41', '2020-09-30 18:36:41'),
(184, '1marin.sabljo@gmail.com', '2020-09-30 18:36:44', '2020-09-30 18:36:44'),
(185, 'marin@gmail', '2020-09-30 18:36:51', '2020-09-30 18:36:51'),
(186, '1marin.sabljo@gmail.com', '2020-09-30 18:36:57', '2020-09-30 18:36:57'),
(187, '1marin.sabljo@gmail.com', '2020-09-30 18:37:03', '2020-09-30 18:37:03'),
(188, '1marin.sabljo@gmail.com', '2020-09-30 18:39:30', '2020-09-30 18:39:30'),
(189, 'marin.sabljo@gmail.com', '2020-09-30 18:40:47', '2020-09-30 18:40:47'),
(190, 'marin@gmail', '2020-09-30 18:41:03', '2020-09-30 18:41:03'),
(191, 'marin@gmail', '2020-09-30 18:42:19', '2020-09-30 18:42:19'),
(192, 'marin.sabljo@gmail.com', '2020-09-30 18:42:25', '2020-09-30 18:42:25'),
(193, '1marin.sabljo@gmail.com', '2020-09-30 18:43:11', '2020-09-30 18:43:11'),
(194, 'marin@gmail', '2020-09-30 18:47:39', '2020-09-30 18:47:39'),
(195, '1marin.sabljo@gmail.com', '2020-09-30 18:47:55', '2020-09-30 18:47:55'),
(196, 'marin@gmail', '2020-09-30 18:48:09', '2020-09-30 18:48:09'),
(197, 'marin@gmail', '2020-09-30 18:48:33', '2020-09-30 18:48:33'),
(198, '1marin.sabljo@gmail.com', '2020-09-30 18:48:43', '2020-09-30 18:48:43'),
(199, '1marin.sabljo@gmail.com', '2020-09-30 18:48:51', '2020-09-30 18:48:51'),
(200, 'marin@gmail', '2020-09-30 18:55:08', '2020-09-30 18:55:08'),
(201, 'marin.sabljo@gmail.com', '2020-10-01 12:15:32', '2020-10-01 12:15:32'),
(202, '1marin.sabljo@gmail.com', '2020-10-01 12:16:04', '2020-10-01 12:16:04'),
(203, 'marin@gmail', '2020-10-01 12:16:19', '2020-10-01 12:16:19'),
(204, 'marin.sabljo@gmail.com', '2020-10-01 12:16:42', '2020-10-01 12:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_17_212854_create_emails_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
