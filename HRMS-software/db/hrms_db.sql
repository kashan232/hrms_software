-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 09:47 AM
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
-- Table structure for table `c_r_m_experiences`
--

CREATE TABLE `c_r_m_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `employee_name` text DEFAULT NULL,
  `emp_department` text DEFAULT NULL,
  `emp_designation` text DEFAULT NULL,
  `Organization` text DEFAULT NULL,
  `Designation` text DEFAULT NULL,
  `Start_Date` text DEFAULT NULL,
  `End_Date` text DEFAULT NULL,
  `Total_Experience` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_r_m_insurances`
--

CREATE TABLE `c_r_m_insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Insurance` text DEFAULT NULL,
  `Coverage` text DEFAULT NULL,
  `Start_Date` text DEFAULT NULL,
  `End_Date` text DEFAULT NULL,
  `Amount` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_r_m_salaires`
--

CREATE TABLE `c_r_m_salaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Month` text DEFAULT NULL,
  `Salaries` text DEFAULT NULL,
  `Other_Income` text DEFAULT NULL,
  `Fines` text DEFAULT NULL,
  `Total_Salaries` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_r_m_skills`
--

CREATE TABLE `c_r_m_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Skills` text DEFAULT NULL,
  `Level` text DEFAULT NULL,
  `Experience` text DEFAULT NULL,
  `Certification` text DEFAULT NULL,
  `Institution` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_r_m_suggestions`
--

CREATE TABLE `c_r_m_suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Subject` text DEFAULT NULL,
  `Complains` text DEFAULT NULL,
  `Reference` text DEFAULT NULL,
  `Status` text DEFAULT NULL,
  `Solution` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_r_m_traininges`
--

CREATE TABLE `c_r_m_traininges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `Training` text DEFAULT NULL,
  `Purpose` text DEFAULT NULL,
  `Start_Date` text DEFAULT NULL,
  `End_Date` text DEFAULT NULL,
  `Results` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '1', 'Web Development', '2024-05-25 23:38:28', '2024-05-25 23:38:28', NULL),
(2, '1', 'Graphic Desginer', '2024-05-25 23:39:16', '2024-05-25 23:39:16', NULL);

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
(1, '1', 'Web Development', 'Laravel Developer', '2024-05-25 23:38:42', '2024-05-25 23:38:42', NULL),
(2, '1', 'Web Development', 'Frontend Developer', '2024-05-25 23:38:55', '2024-05-25 23:38:55', NULL),
(3, '1', 'Graphic Desginer', 'UI UX designer', '2024-05-25 23:39:39', '2024-05-25 23:39:39', NULL),
(4, '1', 'Graphic Desginer', 'Logo designer', '2024-05-25 23:39:51', '2024-05-25 23:39:51', NULL);

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
  `decided_salary` text DEFAULT NULL,
  `reporting_manager` text DEFAULT NULL,
  `employee_status` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `employee_gender` text DEFAULT NULL,
  `number_of_leaves` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `create_by` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `admin_or_user_id`, `first_name`, `last_name`, `email`, `joining_date`, `phone`, `department`, `designation`, `decided_salary`, `reporting_manager`, `employee_status`, `address`, `employee_gender`, `number_of_leaves`, `username`, `password`, `create_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Kashan', 'Shaikh', 'shaikhkashan670@gmail.com', '2024-05-26', '03173859647', 'Web Development', 'Laravel Developer', NULL, NULL, NULL, NULL, NULL, NULL, 'Kashan Shaikh', 'testing123', 'admin', '2024-05-25 23:42:59', '2024-06-06 16:13:59', NULL),
(2, 1, 'Aiman', 'Shaikh', 'aiman12@gmail.com', '2024-05-26', '03173839003', 'Web Development', 'Laravel Developer', NULL, NULL, NULL, NULL, NULL, NULL, 'Aiman Shaikh', '12345678', 'admin', '2024-05-25 23:43:42', '2024-05-25 23:43:42', NULL),
(3, 1, 'Muzammil', 'Shaikh', 'muzammil12@gmail.com', '2024-05-26', '03112328922', 'Graphic Desginer', 'Logo designer', NULL, NULL, NULL, NULL, NULL, NULL, 'Muzammil', '12345678', 'admin', '2024-05-25 23:44:33', '2024-05-31 15:27:28', NULL),
(4, 1, 'Zain', 'Shaikh', 'zain12@gmail.com', '2024-05-30', '03112328922', 'Web Development', 'Laravel Developer', '30000', '1', 'Onsite', 'hyderabad', 'Male', '5', 'zain12', '12345678', 'admin', '2024-05-31 13:26:56', '2024-05-31 13:26:56', NULL),
(5, 1, 'test', 'test', 'test133@gmail.com', '2024-06-02', '03112328922', 'Web Development', 'Frontend Developer', '20000', '1', 'Onsite', 'test', 'Male', '2', 'test', '12345678', 'admin', '2024-06-01 15:01:52', '2024-06-01 15:01:52', NULL),
(6, 2, 'testhr', 'testhr', 'testhr122@gmail.com', '2024-06-02', '03173859444', 'Web Development', 'Frontend Developer', '15000', '1', 'Onsite', 'testhr', 'Male', '2', 'testhr', '12345678', 'hr', '2024-06-01 15:03:06', '2024-06-01 15:03:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `emp_id` text DEFAULT NULL,
  `emp_name` text DEFAULT NULL,
  `employee_attendance_date` text DEFAULT NULL,
  `employee_attendance` text DEFAULT NULL,
  `start_time` text DEFAULT NULL,
  `end_time` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `job_designation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_remote_works`
--

CREATE TABLE `employee_remote_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `job_type` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `task` text DEFAULT NULL,
  `approval` text DEFAULT NULL,
  `employee` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `vendor` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `tax` text DEFAULT NULL,
  `total_paid` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `admin_or_user_id`, `usertype`, `date`, `description`, `vendor`, `amount`, `tax`, `total_paid`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 'hr', '2024-06-11', 'Trip plan', 'fahad', '10000', '2000', '12000', 'done', '2024-06-10 14:26:53', '2024-06-10 14:26:53', NULL),
(2, '2', 'hr', '2024-06-11', 'Bill Paid Gas', 'SuiGas', '1500', '0', '1500', 'done', '2024-06-10 15:15:39', '2024-06-10 15:15:39', NULL);

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
-- Table structure for table `hirings`
--

CREATE TABLE `hirings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hirings`
--

INSERT INTO `hirings` (`id`, `admin_or_user_id`, `usertype`, `date`, `designation`, `job_description`, `education`, `skills`, `experience`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 'hr', '2024-06-12', 'Laravel Developer', 'Full-Stack-Developer', 'BSC', 'Laravel Expert', '4+', 'done', '2024-06-10 16:32:46', '2024-06-10 16:32:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hrs`
--

CREATE TABLE `hrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `hr_gender` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrs`
--

INSERT INTO `hrs` (`id`, `admin_or_user_id`, `designation`, `first_name`, `last_name`, `phone`, `email`, `address`, `hr_gender`, `user_name`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'HR', 'Iqra', 'Shaikh', '03112328921', 'iqra12@gmail.com', NULL, NULL, 'Iqra shaikh', 'admin123', '2024-05-25 23:40:46', '2024-06-06 15:45:25', NULL),
(2, '1', 'hr', 'Shahroz', 'Shaikh', '03173859644', 'shehroz12@gmail.com', 'hyderabad', 'Male', 'shehroz12', '12345678', '2024-05-31 15:53:58', '2024-05-31 15:53:58', NULL),
(3, '1', 'hr', 'Shahroz', 'Shaikh', '03173859644', 'shehroz12@gmail.com', 'hyderabad', 'Male', 'shehroz12', '12345678', '2024-05-31 15:53:58', '2024-05-31 15:53:58', NULL),
(4, '1', 'hr', 'Shahroz', 'Shaikh', '03173859644', 'shehroz1332@gmail.com', 'hyderabad', 'Male', 'shehroz12', '12345678', '2024-05-31 15:54:24', '2024-05-31 15:54:24', NULL);

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
  `star_time` text DEFAULT NULL,
  `end_time` text DEFAULT NULL,
  `leave_reason` text DEFAULT NULL,
  `leave_approve` text DEFAULT NULL,
  `approved_by` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `admin_or_user_id`, `department`, `designation`, `Employee`, `leave_type`, `leave_from_date`, `leave_to_date`, `star_time`, `end_time`, `leave_reason`, `leave_approve`, `approved_by`, `user_name`, `usertype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'HR', 'Iqra Shaikh', 'Casual Leave', '2024-05-27', '2024-05-30', NULL, NULL, 'Am not feeling Well', 'Approve', 'admin', 'admin', 'hr', '2024-05-25 23:47:32', '2024-05-25 23:49:14', NULL),
(2, 3, NULL, 'Manager', 'Nadia Shaikh', 'Casual Leave', '2024-05-29', '2024-05-30', NULL, NULL, 'Suffering From Fever', 'Approve', 'admin', 'admin', 'manager', '2024-05-25 23:52:33', '2024-05-25 23:53:50', NULL),
(3, 3, NULL, 'Manager', 'Nadia Shaikh', 'Medical Leave', '2024-06-01', '2024-05-06', NULL, NULL, 'testing leave', 'Approve', 'hr', 'Iqra Shaikh', 'manager', '2024-05-25 23:56:47', '2024-05-25 23:57:05', NULL),
(4, 3, NULL, 'Manager', 'Nadia Shaikh', 'Casual Leave', '2024-06-12', '2024-06-14', '01:56', '02:56', 'Testing the time changes', 'Pending', NULL, NULL, 'manager', '2024-06-10 15:56:48', '2024-06-10 15:56:48', NULL),
(5, 2, NULL, 'HR', 'Iqra Shaikh', 'Medical Leave', '2024-06-12', '2024-06-13', '02:18', '04:18', 'Testing the leave time by hr', 'Pending', NULL, NULL, 'hr', '2024-06-10 16:18:50', '2024-06-10 16:18:50', NULL),
(6, 4, 'Web Development', 'Laravel Developer', 'Kashan Shaikh', 'Medical Leave', '2024-06-01', '2024-06-12', '02:23', '04:23', 'Testing time by employee', 'Pending', NULL, NULL, 'employee', '2024-06-10 16:23:25', '2024-06-10 16:23:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` int(11) DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `leave_type` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `admin_or_user_id`, `usertype`, `leave_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'hr', 'Casual Leave', '2024-05-25 23:46:15', '2024-05-25 23:46:15', NULL),
(2, 2, 'hr', 'Medical Leave', '2024-05-25 23:46:21', '2024-05-25 23:46:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `manager_gender` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `admin_or_user_id`, `designation`, `first_name`, `last_name`, `phone`, `email`, `address`, `manager_gender`, `user_name`, `password`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Manager', 'Nadia', 'Shaikh', '03112323459', 'nadia12@gmail.com', NULL, NULL, 'Nadia Shaikh', 'manager123', 'admin', '2024-05-25 23:41:46', '2024-06-06 15:55:54', NULL),
(2, '1', 'Manager', 'Osama', 'Ali', '03112328922', 'osama12@gmail.com', 'Hyderabad', 'Male', 'osama12', '12345678', 'admin', '2024-05-31 15:45:48', '2024-05-31 15:45:48', NULL),
(3, '1', 'hr', 'Testing', 'Hr', '03112328922', 'testing22@gmail.com', 'hyd', 'Male', 'testing', '12345678', 'admin', '2024-06-01 15:34:01', '2024-06-01 15:34:01', NULL),
(4, '2', 'hr', 'Kashan', 'Shaikh', '03173859643', 'shaikhkashan620@gmail.com', 'Hyderabad', 'Male', 'kashiii', '12345678', 'hr', '2024-06-01 15:35:41', '2024-06-01 15:35:41', NULL);

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
(9, '2024_05_04_212238_create_leave_requests_table', 5),
(10, '2024_05_06_153621_create_employee_attendances_table', 6),
(11, '2024_05_06_194929_create_projects_table', 7),
(12, '2024_05_06_210437_create_tasks_table', 7),
(13, '2024_05_08_212749_create_hrs_table', 8),
(14, '2024_05_09_223711_create_expenses_table', 8),
(15, '2024_05_09_225607_create_hirings_table', 9),
(16, '2024_05_13_180514_create_revenues_table', 10),
(17, '2024_05_09_225116_create_c_r_m_skills_table', 11),
(18, '2024_05_09_225142_create_c_r_m_insurances_table', 11),
(19, '2024_05_09_225219_create_c_r_m_traininges_table', 11),
(20, '2024_05_09_225239_create_c_r_m_experiences_table', 11),
(21, '2024_05_09_225303_create_c_r_m_salaires_table', 11),
(22, '2024_05_09_225326_create_c_r_m_suggestions_table', 11),
(23, '2024_05_14_192816_create_employee_remote_works_table', 11),
(24, '2024_05_17_182002_create_managers_table', 12),
(25, '2024_05_19_074302_create_payrol_salaries_table', 13);

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
-- Table structure for table `payrol_salaries`
--

CREATE TABLE `payrol_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `employee_name` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `salary_month` text DEFAULT NULL,
  `salary_paid_date` text DEFAULT NULL,
  `basic_salary` text DEFAULT NULL,
  `allowances` text DEFAULT NULL,
  `total_allowances` text DEFAULT NULL,
  `deductions` text DEFAULT NULL,
  `total_deductions` text DEFAULT NULL,
  `net_salary` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` text DEFAULT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `project_name` text DEFAULT NULL,
  `project_deadline` text DEFAULT NULL,
  `project_category` text DEFAULT NULL,
  `project_start_date` text DEFAULT NULL,
  `project_end_date` text DEFAULT NULL,
  `budget` text DEFAULT NULL,
  `priority` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `status`, `admin_or_user_id`, `usertype`, `user_name`, `project_name`, `project_deadline`, `project_category`, `project_start_date`, `project_end_date`, `budget`, `priority`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pending', '1', 'admin', 'admin', 'Toyota Point', NULL, 'Service Management System', '2024-05-28', '2024-06-05', '50000', 'Highest', 'They want only frontend', '2024-05-25 23:59:06', '2024-05-25 23:59:06', NULL),
(2, 'Pending', '1', 'admin', 'admin', 'Sehwan Project', '2024-06-23', 'Service Management System', '2024-06-01', '2024-06-22', '10000', 'Highest', 'Have to fix it', '2024-05-31 15:24:30', '2024-05-31 15:24:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `Customer` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `tax` text DEFAULT NULL,
  `total_paid` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `admin_or_user_id`, `usertype`, `date`, `description`, `Customer`, `amount`, `tax`, `total_paid`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'admin', '2024-06-12', 'Trip plan', 'Kashan Shaikh', '5000', '1000', '6000', 'paid', '2024-06-11 15:53:13', '2024-06-11 15:53:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_or_user_id` text DEFAULT NULL,
  `usertype` text DEFAULT NULL,
  `user_name` text DEFAULT NULL,
  `emp_id` text DEFAULT NULL,
  `project_name` text DEFAULT NULL,
  `task_category` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `task_assign_person` text DEFAULT NULL,
  `task_priority` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `employee_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `admin_or_user_id`, `usertype`, `user_name`, `emp_id`, `project_name`, `task_category`, `start_date`, `end_date`, `department`, `designation`, `task_assign_person`, `task_priority`, `description`, `status`, `employee_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3', 'manager', 'Nadia Shaikh', '1', 'Toyota Point', 'Service Management System', '2024-05-29', '2024-05-31', 'Web Development', 'Laravel Developer', 'Kashan Shaikh', 'Highest', 'Complete as soon as possible', 'Complete', NULL, '2024-05-26 00:01:38', '2024-05-26 00:04:18', NULL),
(2, '3', 'manager', 'Nadia Shaikh', '1', 'Toyota Point', 'Service Management System', '2024-06-01', '2024-06-05', 'Web Development', 'Laravel Developer', 'Kashan Shaikh', 'Highest', 'Create next module', 'Complete', NULL, '2024-05-27 02:16:05', '2024-05-27 02:16:58', NULL),
(3, '3', 'manager', 'Nadia Shaikh', '1', 'Toyota Point', 'Service Management System', '2024-06-01', '2024-06-30', 'Web Development', 'Laravel Developer', 'Kashan Shaikh', 'Highest', 'read the docs and fix the issue', 'Complete', 'Done', '2024-06-08 18:49:23', '2024-06-08 18:53:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `emp_id`, `email`, `email_verified_at`, `usertype`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@gmail.com', NULL, 'admin', '$2y$12$WYsniFniWT8Jh4oUKz5KqujZbP7EJsHK0Zdw4wnS3bnCFr3E7RUYC', NULL, NULL, '2024-06-05 17:45:02'),
(2, 'Iqra Shaikh', 1, 'iqra12@gmail.com', NULL, 'hr', '$2y$12$WadraU0.PWHjNmR33FPpSecKPwV3KmF.HmKUtcsUr7d1Bfr9QrwgG', NULL, '2024-05-25 23:40:47', '2024-06-06 15:45:25'),
(3, 'Nadia Shaikh', 1, 'nadia12@gmail.com', NULL, 'manager', '$2y$12$C/MdiZys9eDUwK84ZZ0ySeGgLdNKCCYiBbsNCi51LisA9jwsdazcy', NULL, '2024-05-25 23:41:47', '2024-06-06 15:55:54'),
(4, 'Kashan Shaikh', 1, 'shaikhkashan670@gmail.com', NULL, 'employee', '$2y$12$r7VckbNJA4kWdowfRKYmAO/gsN.sj0ZbMrmZ1YHvRZOjRYVRukA2W', NULL, '2024-05-25 23:42:59', '2024-06-06 16:13:59'),
(5, 'Aiman Shaikh', 2, 'aiman12@gmail.com', NULL, 'employee', '$2y$12$ZYbxIhlTvC895rAO8dTT2.ioa7jKgA9CBCW0XBgy9mTjA5kFHCax.', NULL, '2024-05-25 23:43:43', '2024-05-25 23:43:43'),
(6, 'Muzammil Shaikh', 3, 'muzammil12@gmail.com', NULL, 'employee', '$2y$12$VCBw5./CrfBVlWnPSjZ.Z.wGC42XRZIC/ihOisKy2VOrD3Q6Zk86m', NULL, '2024-05-25 23:44:34', '2024-05-25 23:44:34'),
(7, 'Zain Shaikh', 4, 'zain12@gmail.com', NULL, 'employee', '$2y$12$/fLyFUrjevdHUV/F90yuNOJPswCcF2vDK1dm/r3oT6pRNueTQAs1G', NULL, '2024-05-31 13:26:57', '2024-05-31 13:26:57'),
(8, 'Osama Ali', 2, 'osama12@gmail.com', NULL, 'manager', '$2y$12$XENpFXE6C1MlVhHAqYWBPOHbRQj5f.3aERsdzVgl4jFsl7PfztYdC', NULL, '2024-05-31 15:45:48', '2024-05-31 15:45:48'),
(9, 'Shahroz Shaikh', 2, 'shehroz12@gmail.com', NULL, 'hr', '$2y$12$hFEchO7Diw0W7e6EviriV.Mb2Gy7c0UiSCs6Y1YChWkjuik6zzzvi', NULL, '2024-05-31 15:53:58', '2024-05-31 15:53:58'),
(11, 'Shahroz Shaikh', 4, 'shehroz1332@gmail.com', NULL, 'hr', '$2y$12$6OLKbQip2fnvXgV2KMBJF.FiJHFkfxbgWscIz5tISBaWTdHRtxbXO', NULL, '2024-05-31 15:54:24', '2024-05-31 15:54:24'),
(12, 'test test', 5, 'test133@gmail.com', NULL, 'employee', '$2y$12$4JXoVm5q77azGvPn8TnrPOsYJ/EhD3EELo9lXyiNUJo5XR.kEDIgy', NULL, '2024-06-01 15:01:53', '2024-06-01 15:01:53'),
(13, 'testhr testhr', 6, 'testhr122@gmail.com', NULL, 'employee', '$2y$12$fu2XidiaK5kDtgNRyeg51OC59JmyyZoquw/dnDLIbgaymRVpnVT4a', NULL, '2024-06-01 15:03:06', '2024-06-01 15:03:06'),
(14, 'Testing Hr', 3, 'testing22@gmail.com', NULL, 'manager', '$2y$12$zGAfIp1R3TTLr.8Bji.VP.4EyZ6zxjK7IWQVI2IeYBgfvQ6i/poNq', NULL, '2024-06-01 15:34:02', '2024-06-01 15:34:02'),
(15, 'Kashan Shaikh', 4, 'shaikhkashan620@gmail.com', NULL, 'manager', '$2y$12$9wgsIxVwBBLaRM/Ji83yB.eUq7DLGF22ruB06t4Hs8dSNduTMIelq', NULL, '2024-06-01 15:35:42', '2024-06-01 15:35:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_r_m_experiences`
--
ALTER TABLE `c_r_m_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_r_m_insurances`
--
ALTER TABLE `c_r_m_insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_r_m_salaires`
--
ALTER TABLE `c_r_m_salaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_r_m_skills`
--
ALTER TABLE `c_r_m_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_r_m_suggestions`
--
ALTER TABLE `c_r_m_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_r_m_traininges`
--
ALTER TABLE `c_r_m_traininges`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_remote_works`
--
ALTER TABLE `employee_remote_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hirings`
--
ALTER TABLE `hirings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrs`
--
ALTER TABLE `hrs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `managers`
--
ALTER TABLE `managers`
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
-- Indexes for table `payrol_salaries`
--
ALTER TABLE `payrol_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `c_r_m_experiences`
--
ALTER TABLE `c_r_m_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_r_m_insurances`
--
ALTER TABLE `c_r_m_insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_r_m_salaires`
--
ALTER TABLE `c_r_m_salaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_r_m_skills`
--
ALTER TABLE `c_r_m_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_r_m_suggestions`
--
ALTER TABLE `c_r_m_suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_r_m_traininges`
--
ALTER TABLE `c_r_m_traininges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_remote_works`
--
ALTER TABLE `employee_remote_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hirings`
--
ALTER TABLE `hirings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hrs`
--
ALTER TABLE `hrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payrol_salaries`
--
ALTER TABLE `payrol_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
