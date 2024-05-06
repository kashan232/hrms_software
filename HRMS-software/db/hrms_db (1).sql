-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 02:29 PM
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
-- Database: `hrms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `admin_or_user_id`, `department`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1', 'Web development', '2024-05-03 05:46:30', '2024-05-03 15:09:38', NULL),
(3, '1', 'Application Development', '2024-05-03 05:46:37', '2024-05-03 05:46:37', NULL),
(4, '1', 'Support Management', '2024-05-03 05:46:45', '2024-05-03 05:46:45', NULL),
(5, '1', 'Marketing', '2024-05-03 05:46:52', '2024-05-03 05:46:52', NULL),
(6, '1', 'IT Management', '2024-05-03 05:47:06', '2024-05-03 05:47:06', NULL),
(7, '1', 'Accounts Management', '2024-05-03 05:47:15', '2024-05-03 05:47:15', NULL),
(8, '1', 'Testing', '2024-05-03 14:56:26', '2024-05-03 14:56:26', NULL),
(9, '1', 'Testing 2', '2024-05-03 15:24:40', '2024-05-03 15:24:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `admin_or_user_id`, `department`, `designation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '1', 'Web Development', 'Web Designer', '2024-05-03 12:23:24', '2024-05-03 12:23:24', NULL),
(4, '1', 'Application Development', 'IOS Developer', '2024-05-03 12:23:37', '2024-05-03 12:23:37', NULL),
(5, '1', 'Application Development', 'SEO Analyst', '2024-05-03 12:23:52', '2024-05-03 12:23:52', NULL),
(6, '1', 'Testing', 'Testing designation', '2024-05-03 14:56:47', '2024-05-03 14:56:47', NULL),
(7, '1', 'Web development', 'web designer', '2024-05-03 15:25:44', '2024-05-03 15:25:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `joining_date` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `admin_or_user_id`, `first_name`, `last_name`, `email`, `joining_date`, `phone`, `department`, `designation`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kashan', 'Shaikh', 'shaikhkashan670@gmail.com', '2024-02-01', '03173859647', 'Web Development', 'Web Designer', '2024-05-03 12:37:35', '2024-05-03 15:21:46', NULL),
(2, 1, 'huhu', 'feref', 'ali12@gmail.com', '2024-05-14', '03173839002', 'Web Development', 'Web Developer', '2024-05-03 14:01:07', '2024-05-04 16:25:02', '2024-05-04 16:25:02'),
(3, 1, 'Zachery', 'Vazquez', 'admin@gmail.com', '2024-05-15', '03173839002', 'Web Development', 'Web Designer', '2024-05-03 14:06:06', '2024-05-03 14:06:15', NULL),
(4, 1, 'Zachery', 'Vazquez', 'admin@gmail.com', '2024-05-15', '03173839002', 'Web Development', 'Web Developer', '2024-05-03 14:12:03', '2024-05-03 14:12:13', NULL),
(5, 1, 'Zachery', 'Vazquez', 'admin@gmail.com', '2024-05-21', '03173839002', 'Web Development', 'Web Developer', '2024-05-03 14:13:12', '2024-05-05 07:24:33', '2024-05-05 07:24:33');

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
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) NOT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Employee` text DEFAULT NULL,
  `leave_type` text DEFAULT NULL,
  `leave_from_date` text DEFAULT NULL,
  `leave_to_date` text DEFAULT NULL,
  `leave_reason` text DEFAULT NULL,
  `leave_approve` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `admin_or_user_id`, `department`, `designation`, `Employee`, `leave_type`, `leave_from_date`, `leave_to_date`, `leave_reason`, `leave_approve`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Web Development', 'Web Designer', 'Kashan', 'Sick Leave', '2024-05-05', '2024-05-07', 'Sick Leave', 'Approve', '2024-05-05 07:06:09', '2024-05-05 07:06:09', NULL),
(2, 1, 'Web Development', 'Web Designer', 'Zachery', 'Casual Leave', '2024-05-07', '2024-05-09', 'testing leave', 'Reject', '2024-05-05 07:20:04', '2024-05-05 07:20:04', NULL),
(3, 1, 'Web Development', 'Web Designer', 'Zachery', 'Medical Leave', '2024-05-13', '2024-05-15', 'testing leave request', 'Approve', '2024-05-05 07:26:07', '2024-05-05 07:26:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `leave_type` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `admin_or_user_id`, `leave_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Casual Leave', '2024-05-04 15:57:53', '2024-05-04 15:57:53', NULL),
(2, 1, 'Medical Leave', '2024-05-04 16:07:26', '2024-05-04 16:12:45', NULL),
(3, 1, 'Sick Leave', '2024-05-04 16:12:54', '2024-05-04 16:12:54', NULL),
(4, 1, 'Testing leave', '2024-05-05 07:25:04', '2024-05-05 07:25:04', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_03_103420_create_departments_table', 2),
(6, '2024_05_03_170349_create_designations_table', 3),
(7, '2024_05_03_171602_create_employees_table', 4),
(8, '2024_05_04_203316_create_leave_types_table', 4),
(9, '2024_05_04_212238_create_leave_requests_table', 5);

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
  `usertype` varchar(255) NOT NULL DEFAULT 'Admin',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `usertype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aiman', 'admin@gmail.com', NULL, 'admin', '$2y$12$iJus7euG4fISRiRt0ltJO.Ku82MaE97GEhuEFrbOYCF6eR1Sa1wLa', NULL, '2024-05-03 03:24:40', '2024-05-03 03:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
