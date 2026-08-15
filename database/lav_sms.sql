-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2026 at 05:45 AM
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
-- Database: `lav_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `my_class_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `att_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `my_class_id`, `section_id`, `att_date`, `status`, `year`, `created_at`, `updated_at`) VALUES
(1, 46, 8, NULL, '2026-04-29', 'A', '2026', '2026-04-29 04:31:16', '2026-04-29 04:31:16'),
(2, 47, 8, NULL, '2026-04-29', 'P', '2026', '2026-04-29 04:31:16', '2026-04-29 04:31:16'),
(3, 48, 8, NULL, '2026-04-29', 'P', '2026', '2026-04-29 04:31:17', '2026-04-29 04:40:15'),
(4, 56, 8, NULL, '2026-04-29', 'P', '2026', '2026-04-29 04:31:17', '2026-04-29 04:31:17'),
(5, 40, 6, NULL, '2026-04-29', 'A', '2026', '2026-04-29 04:32:43', '2026-04-29 04:32:43'),
(6, 41, 6, NULL, '2026-04-29', 'A', '2026', '2026-04-29 04:32:43', '2026-04-29 05:02:23'),
(7, 42, 6, NULL, '2026-04-29', 'P', '2026', '2026-04-29 04:32:43', '2026-04-29 05:02:23'),
(8, 55, 6, NULL, '2026-04-29', 'A', '2026', '2026-04-29 04:32:43', '2026-04-29 05:02:23'),
(9, 46, 8, NULL, '2026-05-01', 'A', '2026', '2026-04-30 22:33:13', '2026-04-30 22:33:13'),
(10, 47, 8, NULL, '2026-05-01', 'P', '2026', '2026-04-30 22:33:15', '2026-04-30 22:33:15'),
(11, 48, 8, NULL, '2026-05-01', 'A', '2026', '2026-04-30 22:33:16', '2026-04-30 22:33:16'),
(12, 56, 8, NULL, '2026-05-01', 'P', '2026', '2026-04-30 22:33:18', '2026-04-30 22:33:18'),
(13, 58, 25, NULL, '2026-05-12', 'P', '2026', '2026-05-12 05:06:33', '2026-05-12 05:06:33'),
(14, 58, 25, NULL, '2026-05-13', 'P', '2026', '2026-05-13 04:53:08', '2026-05-13 04:53:08'),
(15, 60, 23, NULL, '2026-06-01', 'P', '2026', '2026-05-31 23:34:21', '2026-05-31 23:34:21'),
(16, 58, 25, NULL, '2026-06-01', 'P', '2026', '2026-05-31 23:35:24', '2026-05-31 23:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'O-', '2026-04-22 06:14:37', '2026-04-22 06:14:37'),
(2, 'O+', '2026-04-22 06:14:37', '2026-04-22 06:14:37'),
(3, 'A+', '2026-04-22 06:14:37', '2026-04-22 06:14:37'),
(4, 'A-', '2026-04-22 06:14:38', '2026-04-22 06:14:38'),
(5, 'B+', '2026-04-22 06:14:38', '2026-04-22 06:14:38'),
(6, 'B-', '2026-04-22 06:14:38', '2026-04-22 06:14:38'),
(7, 'AB+', '2026-04-22 06:14:38', '2026-04-22 06:14:38'),
(8, 'AB-', '2026-04-22 06:14:38', '2026-04-22 06:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `my_class_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `book_type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `total_copies` int(11) DEFAULT NULL,
  `issued_copies` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `my_class_id`, `description`, `author`, `book_type`, `url`, `location`, `total_copies`, `issued_copies`, `created_at`, `updated_at`) VALUES
(4, 'Laravel', NULL, 'demobook', 'j.k.', NULL, NULL, 'Rack-A1', 20, NULL, '2026-05-13 04:57:30', '2026-05-13 04:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `returned` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'L.K.G.', 'L', NULL, NULL),
(2, 'U.K.G', 'U', NULL, NULL),
(3, 'Nursery', 'N', NULL, NULL),
(4, 'Primary', 'P', NULL, NULL),
(5, 'Junior Secondary', 'J', NULL, NULL),
(6, 'Senior Secondary', 'S', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dorms`
--

CREATE TABLE `dorms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dorms`
--

INSERT INTO `dorms` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Faith Hostel', NULL, NULL, NULL),
(2, 'Peace Hostel', NULL, NULL, NULL),
(3, 'Grace Hostel', NULL, NULL, NULL),
(4, 'Success Hostel', NULL, NULL, NULL),
(5, 'Trust Hostel', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `term` tinyint(4) NOT NULL,
  `year` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `term`, `year`, `created_at`, `updated_at`) VALUES
(1, 'yearly', 1, '2026-2027', '2026-04-26 05:50:23', '2026-04-26 05:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `exam_records`
--

CREATE TABLE `exam_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `ave` varchar(255) DEFAULT NULL,
  `class_ave` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `af` varchar(255) DEFAULT NULL,
  `ps` varchar(255) DEFAULT NULL,
  `p_comment` varchar(255) DEFAULT NULL,
  `t_comment` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_records`
--

INSERT INTO `exam_records` (`id`, `exam_id`, `student_id`, `my_class_id`, `section_id`, `total`, `ave`, `class_ave`, `pos`, `af`, `ps`, `p_comment`, `t_comment`, `year`, `created_at`, `updated_at`) VALUES
(5, 1, 60, 23, 27, 90, '90', '90', 1, NULL, NULL, NULL, NULL, '2026-2027', '2026-05-12 05:06:51', '2026-05-12 05:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `class_type_id` int(10) UNSIGNED DEFAULT NULL,
  `mark_from` tinyint(4) NOT NULL,
  `mark_to` tinyint(4) NOT NULL,
  `remark` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `class_type_id`, `mark_from`, `mark_to`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'A', NULL, 70, 100, 'Excellent', NULL, NULL),
(2, 'B', NULL, 60, 69, 'Very Good', NULL, NULL),
(3, 'C', NULL, 50, 59, 'Good', NULL, NULL),
(4, 'D', NULL, 45, 49, 'Pass', NULL, NULL),
(5, 'E', NULL, 40, 44, 'Poor', NULL, NULL),
(6, 'F', NULL, 0, 39, 'Fail', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lgas`
--

CREATE TABLE `lgas` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lgas`
--

INSERT INTO `lgas` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(808, 44, 'Ahmedabad', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(809, 44, 'Surat', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(810, 44, 'Vadodara', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(811, 44, 'Rajkot', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(812, 44, 'Bhavnagar', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(813, 44, 'Jamnagar', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(814, 44, 'Junagadh', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(815, 44, 'Gandhinagar', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(816, 44, 'Anand', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(817, 44, 'Mehsana', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(818, 44, 'Morbi', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(819, 44, 'Bharuch', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(820, 44, 'Navsari', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(821, 44, 'Kutch', '2026-04-26 11:00:21', '2026-04-26 11:00:21'),
(822, 44, 'Surendranagar', '2026-04-26 11:00:21', '2026-04-26 11:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `t1` int(11) DEFAULT NULL,
  `t2` int(11) DEFAULT NULL,
  `t3` int(11) DEFAULT NULL,
  `t4` int(11) DEFAULT NULL,
  `tca` int(11) DEFAULT NULL,
  `exm` int(11) DEFAULT NULL,
  `tex1` int(11) DEFAULT NULL,
  `tex2` int(11) DEFAULT NULL,
  `tex3` int(11) DEFAULT NULL,
  `sub_pos` tinyint(4) DEFAULT NULL,
  `cum` int(11) DEFAULT NULL,
  `cum_ave` varchar(255) DEFAULT NULL,
  `grade_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `subject_id`, `my_class_id`, `section_id`, `exam_id`, `t1`, `t2`, `t3`, `t4`, `tca`, `exm`, `tex1`, `tex2`, `tex3`, `sub_pos`, `cum`, `cum_ave`, `grade_id`, `year`, `created_at`, `updated_at`) VALUES
(6, 60, 23, 23, 27, 1, 20, 20, NULL, NULL, 40, 50, 90, NULL, NULL, 1, NULL, NULL, 1, '2026-2027', '2026-05-12 05:06:51', '2026-05-12 05:07:08'),
(7, 60, 22, 23, 27, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-2027', '2026-05-13 04:52:47', '2026-05-13 04:52:47');

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
(1, '2013_09_20_121733_create_blood_groups_table', 1),
(2, '2013_09_22_124750_create_states_table', 1),
(3, '2013_09_22_124806_create_lgas_table', 1),
(4, '2013_09_26_121148_create_nationalities_table', 1),
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_09_20_100249_create_user_types_table', 1),
(8, '2018_09_20_150906_create_class_types_table', 1),
(9, '2018_09_22_073005_create_my_classes_table', 1),
(10, '2018_09_22_073526_create_sections_table', 1),
(11, '2018_09_22_080555_create_settings_table', 1),
(12, '2018_09_22_081302_create_subjects_table', 1),
(13, '2018_09_22_151514_create_student_records_table', 1),
(14, '2018_09_26_124241_create_dorms_table', 1),
(15, '2018_10_04_224910_create_exams_table', 1),
(16, '2018_10_06_224846_create_marks_table', 1),
(17, '2018_10_06_224944_create_grades_table', 1),
(18, '2018_10_06_225007_create_pins_table', 1),
(19, '2018_10_18_205550_create_skills_table', 1),
(20, '2018_10_18_205842_create_exam_records_table', 1),
(21, '2018_10_31_191358_create_books_table', 1),
(22, '2018_10_31_192540_create_book_requests_table', 1),
(23, '2018_11_01_132115_create_staff_records_table', 1),
(24, '2018_11_03_210758_create_payments_table', 1),
(25, '2018_11_03_210817_create_payment_records_table', 1),
(26, '2018_11_06_083707_create_receipts_table', 1),
(27, '2018_11_27_180401_create_time_tables_table', 1),
(28, '2019_09_22_142514_create_fks', 1),
(29, '2019_09_26_132227_create_promotions_table', 1),
(30, '2026_04_29_063436_create_attendances_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `my_classes`
--

CREATE TABLE `my_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_classes`
--

INSERT INTO `my_classes` (`id`, `name`, `class_type_id`, `created_at`, `updated_at`) VALUES
(11, 'L.K.G.', 1, '2026-05-01 23:49:39', '2026-05-01 23:49:39'),
(12, 'U.K.G.', 2, '2026-05-01 23:49:51', '2026-05-01 23:49:51'),
(13, 'Nursery', 3, '2026-05-01 23:50:27', '2026-05-01 23:50:27'),
(14, '1st', 4, '2026-05-01 23:52:47', '2026-05-01 23:52:47'),
(15, '2nd', 4, '2026-05-01 23:52:56', '2026-05-01 23:52:56'),
(16, '3rd', 4, '2026-05-01 23:53:08', '2026-05-01 23:53:08'),
(17, '4th', 4, '2026-05-01 23:53:21', '2026-05-01 23:53:21'),
(18, '5th', 4, '2026-05-01 23:53:30', '2026-05-01 23:53:30'),
(19, '6th', 4, '2026-05-01 23:53:49', '2026-05-01 23:53:49'),
(20, '7th', 4, '2026-05-01 23:53:57', '2026-05-01 23:53:57'),
(21, '8th', 4, '2026-05-01 23:54:04', '2026-05-01 23:54:04'),
(22, '9th', 5, '2026-05-01 23:54:12', '2026-05-01 23:54:12'),
(23, '10th', 5, '2026-05-01 23:54:57', '2026-05-01 23:54:57'),
(24, '11th', 6, '2026-05-01 23:55:05', '2026-05-01 23:55:05'),
(25, '12th', 6, '2026-05-01 23:55:14', '2026-05-01 23:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'India', NULL, NULL),
(2, 'United States', NULL, NULL),
(3, 'Canada', NULL, NULL),
(4, 'United Kingdom', NULL, NULL),
(5, 'Australia', NULL, NULL),
(6, 'Germany', NULL, NULL),
(7, 'France', NULL, NULL),
(8, 'United Arab Emirates', NULL, NULL),
(9, 'Japan', NULL, NULL),
(10, 'Singapore', NULL, NULL),
(11, 'New Zealand', NULL, NULL),
(12, 'Brazil', NULL, NULL),
(13, 'Russia', NULL, NULL),
(14, 'South Africa', NULL, NULL),
(15, 'China', NULL, NULL),
(16, 'Italy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `body` text DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `importance` varchar(20) DEFAULT 'green',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `body`, `file`, `importance`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'demo', 'demo', NULL, 'yellow', 2, '2026-05-13 05:46:24', '2026-05-13 05:46:24'),
(2, 'demo', 'demo', NULL, 'yellow', 2, '2026-05-13 05:46:31', '2026-05-13 05:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dh@gmail.com', '$2y$10$Tmh4p/ms8McWlqWlYt/2aem4G37MZ06sBJtOU5/2XfgA49rY1rtV.', '2026-04-22 06:53:56'),
('admin@admin.com', '$2y$10$9FnNmIxGCMC0C2UjXDuACe.wnErWeSREp8sALhy9pBcSijWABt7Ny', '2026-05-18 05:56:03'),
('teacher@teacher.com', '$2y$10$ABbMLDU3EdumieJd1DMw2utMv2rwaw2LgYnXbrb7jwpGKQ43nNeeG', '2026-06-04 00:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL DEFAULT 'cash',
  `my_class_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `title`, `amount`, `ref_no`, `method`, `my_class_id`, `description`, `year`, `created_at`, `updated_at`) VALUES
(10, 'compuert fees', 500, '2026/822194', 'cash', NULL, '500 pay to accountent of out school within a 3 days.', '2026-2027', '2026-05-13 00:13:07', '2026-05-13 00:13:07'),
(11, 'exam fees', 500, '2026/372623', 'cash', 25, 'board exam fees', '2026-2027', '2026-05-14 23:21:44', '2026-05-14 23:21:44'),
(12, 'computer fees', 300, '2026/843606', 'cash', NULL, 'demo', '2026-2027', '2026-05-14 23:34:37', '2026-05-14 23:34:37'),
(13, '700', 700, '2026/514784', 'cash', 25, 'exam fees', '2026-2027', '2026-05-14 23:35:14', '2026-05-14 23:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `amt_paid` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT 0,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_records`
--

INSERT INTO `payment_records` (`id`, `payment_id`, `student_id`, `ref_no`, `amt_paid`, `balance`, `paid`, `year`, `created_at`, `updated_at`) VALUES
(59, 10, 58, '72523207', 500, 0, 1, '2026-2027', '2026-05-13 00:13:30', '2026-05-13 00:19:05'),
(60, 10, 60, '33551924', 500, 0, 1, '2026-2027', '2026-05-13 00:17:31', '2026-05-13 00:18:24'),
(61, 11, 58, '32177723', 500, 0, 1, '2026-2027', '2026-05-14 23:55:19', '2026-05-14 23:55:32'),
(62, 13, 58, '21626847', NULL, NULL, 0, '2026-2027', '2026-05-14 23:55:20', '2026-05-14 23:55:20'),
(63, 12, 58, '77065023', 300, 0, 1, '2026-2027', '2026-05-14 23:55:20', '2026-05-31 05:13:39'),
(64, 12, 60, '37054839', NULL, NULL, 0, '2026-2027', '2026-05-14 23:57:32', '2026-05-14 23:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `pins`
--

CREATE TABLE `pins` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(40) NOT NULL,
  `used` varchar(255) NOT NULL DEFAULT '0',
  `times_used` varchar(255) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pins`
--

INSERT INTO `pins` (`id`, `code`, `used`, `times_used`, `user_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'TEST-1234', '0', '1', 1, NULL, '2026-04-26 11:03:58', '2026-04-26 11:03:58'),
(2, '523A4979', '0', '1', 1, NULL, '2026-04-26 05:43:04', '2026-04-26 05:43:04'),
(3, '8FF36563', '0', '1', 1, NULL, '2026-04-26 05:43:04', '2026-04-26 05:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `from_class` int(10) UNSIGNED NOT NULL,
  `from_section` int(10) UNSIGNED NOT NULL,
  `to_class` int(10) UNSIGNED NOT NULL,
  `to_section` int(10) UNSIGNED NOT NULL,
  `grad` tinyint(4) NOT NULL,
  `from_session` varchar(255) NOT NULL,
  `to_session` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `pr_id` int(10) UNSIGNED NOT NULL,
  `amt_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `pr_id`, `amt_paid`, `balance`, `year`, `created_at`, `updated_at`) VALUES
(13, 60, 300, 200, '2026-2027', '2026-05-13 00:17:51', '2026-05-13 00:17:51'),
(14, 60, 200, 0, '2026-2027', '2026-05-13 00:18:24', '2026-05-13 00:18:24'),
(15, 59, 500, 0, '2026-2027', '2026-05-13 00:19:05', '2026-05-13 00:19:05'),
(16, 61, 500, 0, '2026-2027', '2026-05-14 23:55:32', '2026-05-14 23:55:32'),
(17, 63, 300, 0, '2026-2027', '2026-05-31 05:13:39', '2026-05-31 05:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `my_class_id`, `teacher_id`, `active`, `created_at`, `updated_at`) VALUES
(15, 'A', 11, NULL, 1, '2026-05-01 23:49:39', '2026-05-01 23:49:39'),
(16, 'A', 12, NULL, 1, '2026-05-01 23:49:51', '2026-05-01 23:49:51'),
(17, 'A', 13, NULL, 1, '2026-05-01 23:50:27', '2026-05-01 23:50:27'),
(18, 'A', 14, NULL, 1, '2026-05-01 23:52:47', '2026-05-01 23:52:47'),
(19, 'A', 15, NULL, 1, '2026-05-01 23:52:57', '2026-05-01 23:52:57'),
(20, 'A', 16, NULL, 1, '2026-05-01 23:53:09', '2026-05-01 23:53:09'),
(21, 'A', 17, NULL, 1, '2026-05-01 23:53:21', '2026-05-01 23:53:21'),
(22, 'A', 18, NULL, 1, '2026-05-01 23:53:30', '2026-05-01 23:53:30'),
(23, 'A', 19, NULL, 1, '2026-05-01 23:53:49', '2026-05-01 23:53:49'),
(24, 'A', 20, NULL, 1, '2026-05-01 23:53:57', '2026-05-01 23:53:57'),
(25, 'A', 21, NULL, 1, '2026-05-01 23:54:04', '2026-05-01 23:54:04'),
(26, 'A', 22, NULL, 1, '2026-05-01 23:54:12', '2026-05-01 23:54:12'),
(27, 'A', 23, 3, 1, '2026-05-01 23:54:57', '2026-05-12 05:05:08'),
(28, 'A', 24, NULL, 1, '2026-05-01 23:55:05', '2026-05-01 23:55:05'),
(29, 'A', 25, 3, 1, '2026-05-01 23:55:14', '2026-05-12 05:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'current_session', '2026-2027', NULL, '2026-07-05 22:43:07'),
(2, 'system_title', 'Tremurti', NULL, '2026-07-05 22:43:06'),
(3, 'system_name', 'Tremurti Education Trust', NULL, '2026-07-05 22:43:06'),
(4, 'term_ends', '7/10/2027', NULL, '2026-07-05 22:43:07'),
(5, 'term_begins', '7/10/2026', NULL, '2026-07-05 22:43:07'),
(6, 'phone', '0123456789', NULL, '2026-07-05 22:43:07'),
(7, 'address', '18B North Central Park, Behind Central Square Tourist Center', NULL, '2026-07-05 22:43:07'),
(8, 'system_email', 'cjacademy@cj.com', NULL, '2026-07-05 22:43:07'),
(9, 'alt_email', '', NULL, NULL),
(10, 'email_host', '', NULL, NULL),
(11, 'email_pass', '', NULL, NULL),
(12, 'lock_exam', '1', NULL, '2026-07-05 22:43:07'),
(13, 'logo', 'http://127.0.0.1:8000/storage/uploads//logo.png', NULL, '2026-07-05 22:43:07'),
(14, 'next_term_fees_j', '20000', NULL, '2026-04-26 07:15:16'),
(15, 'next_term_fees_pn', '25000', NULL, '2026-04-26 07:15:17'),
(16, 'next_term_fees_p', '25000', NULL, '2026-04-26 07:15:17'),
(17, 'next_term_fees_n', '25600', NULL, '2026-04-26 07:15:17'),
(18, 'next_term_fees_s', '15600', NULL, '2026-04-26 07:15:17'),
(19, 'next_term_fees_c', '1600', NULL, '2026-04-26 07:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `skill_type` varchar(255) NOT NULL,
  `class_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `skill_type`, `class_type`, `created_at`, `updated_at`) VALUES
(1, 'PUNCTUALITY', 'AF', NULL, NULL, NULL),
(2, 'NEATNESS', 'AF', NULL, NULL, NULL),
(3, 'HONESTY', 'AF', NULL, NULL, NULL),
(4, 'RELIABILITY', 'AF', NULL, NULL, NULL),
(5, 'RELATIONSHIP WITH OTHERS', 'AF', NULL, NULL, NULL),
(6, 'POLITENESS', 'AF', NULL, NULL, NULL),
(7, 'ALERTNESS', 'AF', NULL, NULL, NULL),
(8, 'HANDWRITING', 'PS', NULL, NULL, NULL),
(9, 'GAMES & SPORTS', 'PS', NULL, NULL, NULL),
(10, 'DRAWING & ARTS', 'PS', NULL, NULL, NULL),
(11, 'PAINTING', 'PS', NULL, NULL, NULL),
(12, 'CONSTRUCTION', 'PS', NULL, NULL, NULL),
(13, 'MUSICAL SKILLS', 'PS', NULL, NULL, NULL),
(14, 'FLEXIBILITY', 'PS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_records`
--

CREATE TABLE `staff_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `emp_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_records`
--

INSERT INTO `staff_records` (`id`, `user_id`, `code`, `emp_date`, `created_at`, `updated_at`) VALUES
(1, 57, 'MY SCHOOL/STAFF/2026/04/2570', '04/01/2026', '2026-04-25 23:35:48', '2026-04-26 05:01:43'),
(2, 61, 'Tremurti/STAFF/2006/05/9251', '05/19/2006', '2026-05-12 00:18:58', '2026-05-12 00:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(38, 'Andhra Pradesh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(39, 'Arunachal Pradesh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(40, 'Assam', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(41, 'Bihar', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(42, 'Chhattisgarh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(43, 'Goa', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(44, 'Gujarat', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(45, 'Haryana', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(46, 'Himachal Pradesh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(47, 'Jharkhand', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(48, 'Karnataka', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(49, 'Kerala', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(50, 'Madhya Pradesh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(51, 'Maharashtra', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(52, 'Manipur', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(53, 'Meghalaya', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(54, 'Mizoram', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(55, 'Nagaland', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(56, 'Odisha', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(57, 'Punjab', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(58, 'Rajasthan', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(59, 'Sikkim', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(60, 'Tamil Nadu', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(61, 'Telangana', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(62, 'Tripura', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(63, 'Uttar Pradesh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(64, 'Uttarakhand', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(65, 'West Bengal', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(66, 'Andaman and Nicobar Islands', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(67, 'Chandigarh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(68, 'Dadra and Nagar Haveli and Daman and Diu', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(69, 'Lakshadweep', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(70, 'Delhi', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(71, 'Puducherry', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(72, 'Ladakh', '2026-04-26 10:50:23', '2026-04-26 10:50:23'),
(73, 'Jammu and Kashmir', '2026-04-26 10:50:23', '2026-04-26 10:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `adm_no` varchar(30) DEFAULT NULL,
  `my_parent_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_room_no` varchar(255) DEFAULT NULL,
  `session` varchar(255) NOT NULL,
  `house` varchar(255) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `year_admitted` varchar(255) DEFAULT NULL,
  `grad` tinyint(4) NOT NULL DEFAULT 0,
  `grad_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`id`, `user_id`, `my_class_id`, `section_id`, `adm_no`, `my_parent_id`, `dorm_id`, `dorm_room_no`, `session`, `house`, `age`, `year_admitted`, `grad`, `grad_date`, `created_at`, `updated_at`) VALUES
(40, 58, 25, 29, 'TREMURTI/S/2026/01123', 59, 1, '20', '2026-2027', '20', NULL, '2026', 0, NULL, '2026-05-02 00:10:31', '2026-05-04 08:22:35'),
(41, 60, 23, 27, 'TREMURTI/J/2026/001987', 59, 1, '20', '2026-2027', '20', NULL, '2026', 0, NULL, '2026-05-04 07:28:45', '2026-05-04 07:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `slug`, `my_class_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(22, 'gujrati', 'guj', 23, 3, '2026-05-12 04:59:06', '2026-05-12 04:59:06'),
(23, 'English Language', 'eng', 23, 3, '2026-05-12 04:59:21', '2026-05-12 04:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(10) UNSIGNED NOT NULL,
  `ttr_id` int(10) UNSIGNED NOT NULL,
  `hour_from` tinyint(4) NOT NULL,
  `min_from` varchar(2) NOT NULL,
  `meridian_from` varchar(2) NOT NULL,
  `hour_to` tinyint(4) NOT NULL,
  `min_to` varchar(2) NOT NULL,
  `meridian_to` varchar(2) NOT NULL,
  `time_from` varchar(100) NOT NULL,
  `time_to` varchar(100) NOT NULL,
  `timestamp_from` varchar(50) NOT NULL,
  `timestamp_to` varchar(50) NOT NULL,
  `full` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slots`
--

INSERT INTO `time_slots` (`id`, `ttr_id`, `hour_from`, `min_from`, `meridian_from`, `hour_to`, `min_to`, `meridian_to`, `time_from`, `time_to`, `timestamp_from`, `timestamp_to`, `full`, `created_at`, `updated_at`) VALUES
(4, 3, 1, '00', 'PM', 2, '00', 'PM', '1:00 PM', '2:00 PM', '1778677200', '1778680800', '1:00 PM - 2:00 PM', '2026-05-12 23:54:25', '2026-05-12 23:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `ttr_id` int(10) UNSIGNED NOT NULL,
  `ts_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_date` varchar(50) DEFAULT NULL,
  `timestamp_from` varchar(100) NOT NULL,
  `timestamp_to` varchar(100) NOT NULL,
  `day` varchar(50) DEFAULT NULL,
  `day_num` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tables`
--

INSERT INTO `time_tables` (`id`, `ttr_id`, `ts_id`, `subject_id`, `exam_date`, `timestamp_from`, `timestamp_to`, `day`, `day_num`, `created_at`, `updated_at`) VALUES
(8, 3, 4, 22, NULL, '1779109200', '1779112800', 'Monday', NULL, '2026-05-12 23:55:02', '2026-05-12 23:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `time_table_records`
--

CREATE TABLE `time_table_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `my_class_id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_table_records`
--

INSERT INTO `time_table_records` (`id`, `name`, `my_class_id`, `exam_id`, `year`, `created_at`, `updated_at`) VALUES
(3, 'monthly', 23, NULL, '2026-2027', '2026-05-11 23:44:45', '2026-05-11 23:44:45'),
(4, 'demo', 23, NULL, '2026-2027', '2026-05-12 04:56:40', '2026-05-12 04:56:40'),
(5, 'demod3emo', 23, NULL, '2026-2027', '2026-07-08 22:56:16', '2026-07-08 22:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'http://localhost/global_assets/images/user.png',
  `phone` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `bg_id` int(10) UNSIGNED DEFAULT NULL,
  `state_id` int(10) UNSIGNED DEFAULT NULL,
  `lga_id` int(10) UNSIGNED DEFAULT NULL,
  `nal_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `code`, `username`, `user_type`, `dob`, `gender`, `photo`, `phone`, `phone2`, `bg_id`, `state_id`, `lga_id`, `nal_id`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'CJ Inspired', 'cj@cj.com', 'KY3U7R12EZ', 'cj', 'super_admin', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LaA6Ws3XJrsp5Zb8c8mirOiPQe2BEQAhvHaAQU69tamZtLp4WrBUy', 'uureijX86I4Q13MTdWOigJdWmMR0IQ0bQ6825RGWCqNICJKQBbkXkIjOdRS9', NULL, NULL),
(2, 'Admin KORA', 'admin@admin.com', '5J7PBCVMRX', 'admin', 'admin', NULL, NULL, 'http://127.0.0.1:8000/storage/uploads/admin/5J7PBCVMRX/photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LaA6Ws3XJrsp5Zb8c8mirOiPQe2BEQAhvHaAQU69tamZtLp4WrBUy', 'D8uUgRauJI2fm7mJufChgTY0VHevif0prqWrrr7ViqyrETPuVP3XRL5IqYsG', NULL, '2026-04-22 07:51:55'),
(3, 'Teacher Chike', 'teacher@teacher.com', 'GGLUJVBAHY', 'Tremurti/STAFF/2026/04/7962', 'teacher', NULL, 'Male', 'http://127.0.0.1:8000/storage/uploads/teacher/GGLUJVBAHY/photo.jfif', '3216549871', '3216549871', 5, 44, 813, 1, 'jamnagarjamnagar', NULL, '$2y$10$Zicq1.SWuoHwjgG0BI5Yz.pV8/yMF1TUfV4iR6ltBrCbau0Iv477e', 'zruBxd6OSeE56tdtz3nwpC4ma3UFdoTEc2XLkCYeBcZka2ms8UWUR2BNVwia', NULL, '2026-05-12 00:26:27'),
(4, 'Parent Kaba', 'parent@parent.com', 'LAA5YDYPXS', 'parent', 'parent', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LaA6Ws3XJrsp5Zb8c8mirOiPQe2BEQAhvHaAQU69tamZtLp4WrBUy', 'V0wTjAhVRUE5PveBE1GC9a28uU7a55ErtDCB05gQRA5N9DKmDGCbdbltTHV8', NULL, NULL),
(5, 'Accountant Jeff', 'accountant@accountant.com', 'H97D7DV0R1', 'accountant', 'accountant', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LaA6Ws3XJrsp5Zb8c8mirOiPQe2BEQAhvHaAQU69tamZtLp4WrBUy', 'wyFIfd7rQCwkAP7C0VlTtBbuLKQoFIU0cfFQdm3h8g2CexOxB8cyPsPxxp3F', NULL, NULL),
(7, 'Teacher 1', 'teacher1@teacher.com', 'PIUAAZR3WM', 'teacher1', 'teacher', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$0hd.CTKjHUJROmeB3JwCVuBWUJGQVBFp6u2Bw6niaSzII5hqffocS', 'QnU0PfQJ11wy1GfQBN7VsTN7msQVuhegZcyVe4ifu4P9Wi67RjRtQT7t9LLq', NULL, NULL),
(9, 'Parent 1', 'parent1@parent.com', '8OQZANVWNZ', 'parent1', 'parent', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$EZhc6u0dA1m1.zUyKQ5bW.NeqA4HoI2rQtsDraHxWWrclDpxDjHwS', 'VVmiYGX8Te', NULL, NULL),
(11, 'Teacher 2', 'teacher2@teacher.com', 'QXZQH7AUUJ', 'teacher2', 'teacher', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tGhTJLmMmLsJHKmDsUn7Au0eSRIAhtMEgPQ0Tsso9L2rhi4cWHHq2', 'VAFnFgcejk', NULL, NULL),
(13, 'Parent 2', 'parent2@parent.com', 'N9DZGOFV5Y', 'parent2', 'parent', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$YKf235fRlssDWX2gzgjCSOwJ6OjIlM3zFlGTxcEAiOn3WZicD49Iu', 'q5LALVPmO8', NULL, NULL),
(15, 'Teacher 3', 'teacher3@teacher.com', 'APSAFETJOI', 'teacher3', 'teacher', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/GmpTiOeFuKLOuxtwmBdiekzz1olHZopB2q5VStNK/UedhW/2z7B2', 'g225zKU6ew', NULL, NULL),
(17, 'Parent 3', 'parent3@parent.com', 'BKGVFAWZAK', 'parent3', 'parent', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$jkE7Cx0MgQlDbCBOmidEwucJy7Z8IS7emgKpGt5qe.beUZ/hJRLuW', '1MoorKOvqh', NULL, NULL),
(18, 'Student CJ', 'student@student.com', 'SW5NNV51M6', 'student', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$FQ3DkcMXLqzwkLYuhzKj3.j482J5mhpJKMgmw8QuLGzWzkkckYIRu', 'OqwujBjchwjoIXRO78aRQUb479Cbik9jwV8vwuoRmkw29A6Sb8DVLb7UstZr', '2026-04-22 06:18:13', '2026-04-22 06:18:13'),
(19, 'Junius Dibbert', 'nat01@example.com', '7EVVJ7CC6E', 'colton.wisozk', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Pm8M6gJ9MGgFVsj7UAVt6eT1jOGTa9TVc2kChGC9Aga87aS7rBrOq', 'FyZZcTW3PX', '2026-04-22 06:18:14', '2026-04-22 06:18:14'),
(20, 'Florian Weber', 'rohan.tyrique@example.com', 'QWHCPB5NYL', 'lloyd30', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Pm8M6gJ9MGgFVsj7UAVt6eT1jOGTa9TVc2kChGC9Aga87aS7rBrOq', 'gxBVXywbiI', '2026-04-22 06:18:14', '2026-04-22 06:18:14'),
(21, 'Bertrand Conn', 'gkshlerin@example.org', 'G1BSLGWFFN', 'kailyn.jakubowski', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Pm8M6gJ9MGgFVsj7UAVt6eT1jOGTa9TVc2kChGC9Aga87aS7rBrOq', 'YZn28QNiKa', '2026-04-22 06:18:15', '2026-04-22 06:18:15'),
(22, 'Jameson Jakubowski', 'connelly.cassandra@example.org', 'E25FFJPBZ0', 'akovacek', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JsHW3phZ16wzsUUA2ZSM4uBQObpt/oFKtK72QnZVbVucPxeJZvBFy', 'kHjMongp6f', '2026-04-22 06:18:16', '2026-04-22 06:18:16'),
(23, 'Abbie Prosacco', 'eldora.pollich@example.com', 'BIMVA7MBEG', 'chris.schimmel', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JsHW3phZ16wzsUUA2ZSM4uBQObpt/oFKtK72QnZVbVucPxeJZvBFy', 'EwFDxaykSi', '2026-04-22 06:18:16', '2026-04-22 06:18:16'),
(24, 'Willy Keebler', 'cbarrows@example.net', 'JHIWGJPA1E', 'dare.harmony', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JsHW3phZ16wzsUUA2ZSM4uBQObpt/oFKtK72QnZVbVucPxeJZvBFy', 'ZvJKaGJPrz', '2026-04-22 06:18:17', '2026-04-22 06:18:17'),
(25, 'Miss Alda Little V', 'adurgan@example.com', '5RWFXPM3YT', 'twunsch', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$eY2LIsmGeQOp0JQiWS4KE.C4jq9YqYy7l5MyEKEI.rzuB/O44vXmS', '16xkjmDCfm', '2026-04-22 06:18:18', '2026-04-22 06:18:18'),
(26, 'Katlynn Mann', 'stehr.chanel@example.org', '1ANHBIK1FV', 'dlabadie', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$eY2LIsmGeQOp0JQiWS4KE.C4jq9YqYy7l5MyEKEI.rzuB/O44vXmS', 'U9aG57l3Ui', '2026-04-22 06:18:18', '2026-04-22 06:18:18'),
(27, 'Hermina Yost', 'kiarra.mcclure@example.org', 'WPASYLHJVJ', 'wturcotte', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$eY2LIsmGeQOp0JQiWS4KE.C4jq9YqYy7l5MyEKEI.rzuB/O44vXmS', 'd5qmFzZWDa', '2026-04-22 06:18:19', '2026-04-22 06:18:19'),
(28, 'Ms. Loyce Grady', 'lorenza78@example.com', '773I7FPL7K', 'fay.alfonso', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$R24lt8TbwGgJYjTnjhOeaeHEd48nORsYzhyH1KAv.Zxv7dufmy.ay', 'c4S1JqDOa1', '2026-04-22 06:18:20', '2026-04-22 06:18:20'),
(29, 'Monique Hammes', 'jeanette13@example.net', '89WWVMSXAA', 'satterfield.lorena', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$R24lt8TbwGgJYjTnjhOeaeHEd48nORsYzhyH1KAv.Zxv7dufmy.ay', 'cHEVhQGCzu', '2026-04-22 06:18:21', '2026-04-22 06:18:21'),
(30, 'Prof. Chanelle Hyatt MD', 'elyse28@example.net', 'DX0V1VNDCZ', 'rey.metz', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$R24lt8TbwGgJYjTnjhOeaeHEd48nORsYzhyH1KAv.Zxv7dufmy.ay', 'efSYjLUJxb', '2026-04-22 06:18:21', '2026-04-22 06:18:21'),
(31, 'Cristian Bernhard', 'mckenzie.jarvis@example.org', 'QISTQ3OFPT', 'qwuckert', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$u7fumh17cSdDj8Y2FSGNcunSR0yD./kHwS1y53eRWCH3ia0SGtMuW', 'k6nAtXyb5P', '2026-04-22 06:18:22', '2026-04-22 06:18:22'),
(32, 'Jevon Welch', 'valentina25@example.com', 'ZQEIAUBHZL', 'feil.myriam', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$u7fumh17cSdDj8Y2FSGNcunSR0yD./kHwS1y53eRWCH3ia0SGtMuW', 'atEiJvzmSr', '2026-04-22 06:18:23', '2026-04-22 06:18:23'),
(33, 'Jessie O\'Hara', 'dibbert.virgie@example.net', 'CR7JWE15OC', 'fanny01', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$u7fumh17cSdDj8Y2FSGNcunSR0yD./kHwS1y53eRWCH3ia0SGtMuW', 'MIs3CIVNPC', '2026-04-22 06:18:23', '2026-04-22 06:18:23'),
(34, 'Dr. Francisco Denesik PhD', 'dkub@example.net', 'D6U1CEOMPH', 'silas.gibson', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lQz04NFW9EklRX0S4K1A1.AnazX80NyXOjAiYa5rS8uYqYUbeWQq6', 'XsP8S6geAc', '2026-04-22 06:18:24', '2026-04-22 06:18:24'),
(35, 'Anya Cummerata Sr.', 'mhagenes@example.com', 'QYZD2FQ33T', 'king.zola', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lQz04NFW9EklRX0S4K1A1.AnazX80NyXOjAiYa5rS8uYqYUbeWQq6', 'L043OujQpM', '2026-04-22 06:18:24', '2026-04-22 06:18:24'),
(36, 'Ottilie Schiller', 'ana.armstrong@example.com', 'Z7V8ZRLG6B', 'aconroy', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lQz04NFW9EklRX0S4K1A1.AnazX80NyXOjAiYa5rS8uYqYUbeWQq6', '73ycCk9Q0Y', '2026-04-22 06:18:25', '2026-04-22 06:18:25'),
(37, 'Arnaldo Borer', 'xkeebler@example.com', 'O7H1VBRFY3', 'kayla.marks', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$45PuCngQ2tCjb1wT54s3gu73HwLN6bqNF41LIX84TfmtQSP//iNO6', 'IUXm05YJNT', '2026-04-22 06:18:26', '2026-04-22 06:18:26'),
(38, 'Rosetta Cremin', 'ollie.cremin@example.net', 'G9FMHQFA93', 'tmonahan', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$45PuCngQ2tCjb1wT54s3gu73HwLN6bqNF41LIX84TfmtQSP//iNO6', 'nqP9PhuZdf', '2026-04-22 06:18:27', '2026-04-22 06:18:27'),
(39, 'Tyra Okuneva Jr.', 'smuller@example.org', 'EMMTUH0QOU', 'nschultz', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$45PuCngQ2tCjb1wT54s3gu73HwLN6bqNF41LIX84TfmtQSP//iNO6', 'rGZ5IKxpuZ', '2026-04-22 06:18:28', '2026-04-22 06:18:28'),
(40, 'Heloise VonRueden', 'jermain32@example.net', 'C6BHUPCCJO', 'von.jalen', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$aNAt19bq.7b9P6Jtrx4SHOFd5u5CqNPceuTeTCwubA.MhezOfJPcC', '2Q2pNZ0c2F', '2026-04-22 06:18:28', '2026-04-22 06:18:28'),
(41, 'Elwin Kunde', 'emard.jacklyn@example.org', 'BHGLWMJUAI', 'larissa17', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$aNAt19bq.7b9P6Jtrx4SHOFd5u5CqNPceuTeTCwubA.MhezOfJPcC', '40H2pI3eU7', '2026-04-22 06:18:29', '2026-04-22 06:18:29'),
(42, 'Carlo Weimann', 'horacio.reichert@example.net', 'OXFG7KAUKG', 'bbergstrom', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$aNAt19bq.7b9P6Jtrx4SHOFd5u5CqNPceuTeTCwubA.MhezOfJPcC', 'j3V6YVWB2W', '2026-04-22 06:18:30', '2026-04-22 06:18:30'),
(43, 'Arnold Kuvalis', 'viola56@example.org', 'QQ6RD4G7DT', 'karlee.breitenberg', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$1iqCcYnqdLDCLeIx9Fy7XePClhRKHD3ZkAk.ys1NCp7jP24vf3fhC', 'eR4a5Cgn7o', '2026-04-22 06:18:31', '2026-04-22 06:18:31'),
(44, 'Bert Sauer', 'roosevelt.ohara@example.net', 'YFYZFRXQTT', 'langworth.joshuah', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$1iqCcYnqdLDCLeIx9Fy7XePClhRKHD3ZkAk.ys1NCp7jP24vf3fhC', 'Q587hdQZ33', '2026-04-22 06:18:32', '2026-04-22 06:18:32'),
(45, 'Dr. Gennaro Haley V', 'reinger.emilio@example.com', 'JBZNB2WL7X', 'owillms', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$1iqCcYnqdLDCLeIx9Fy7XePClhRKHD3ZkAk.ys1NCp7jP24vf3fhC', '6x4y6PpLIT', '2026-04-22 06:18:33', '2026-04-22 06:18:33'),
(46, 'Prof. Marian Dickinson III', 'qroob@example.net', 'BXPGBELXYA', 'feil.lesley', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HgwK9SLWvR1Kka4OX.QgQOOotpE1IYC8sOfbNmndhfJQy.MgWpNc.', 'w6YcRiO3SV', '2026-04-22 06:18:33', '2026-04-22 06:18:33'),
(47, 'Javier Witting', 'nwunsch@example.org', 'Z7KHFBDDZ4', 'lhane', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HgwK9SLWvR1Kka4OX.QgQOOotpE1IYC8sOfbNmndhfJQy.MgWpNc.', 'emZANwStPp', '2026-04-22 06:18:34', '2026-04-22 06:18:34'),
(48, 'Andrew Lowe', 'xgusikowski@example.net', '5LXNDPTX0P', 'carroll.olen', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$HgwK9SLWvR1Kka4OX.QgQOOotpE1IYC8sOfbNmndhfJQy.MgWpNc.', 'R1C5VrxYpa', '2026-04-22 06:18:35', '2026-04-22 06:18:35'),
(49, 'Amalia Bosco', 'brenda77@example.com', 'QFPIZILTWO', 'okuneva.laron', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SuUO2xy3qqHYi.GN7id0/OMF72s.lh9jd0pGg4gTMGSpzX5tLHieu', 'clYTVqPBDp', '2026-04-22 06:18:35', '2026-04-22 06:18:35'),
(50, 'Prof. Kirsten Quitzon Sr.', 'cara72@example.org', 'CVLOTEZKHD', 'jerrold11', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SuUO2xy3qqHYi.GN7id0/OMF72s.lh9jd0pGg4gTMGSpzX5tLHieu', 'whA7r9w38l', '2026-04-22 06:18:36', '2026-04-22 06:18:36'),
(51, 'Shane Kshlerin', 'pfeffer.johan@example.net', 'EGZQGJ1C0Q', 'otis93', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SuUO2xy3qqHYi.GN7id0/OMF72s.lh9jd0pGg4gTMGSpzX5tLHieu', 'mBFFHD1cro', '2026-04-22 06:18:36', '2026-04-22 06:18:36'),
(52, 'Adam Lind', 'kilback.linwood@example.com', 'NWRSSIKU3C', 'kswift', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$oGc6w9sNHZF1uK4IZ8xY1uYP7RYf/Nwu0rMRxptGxl785qvBsqUIG', '4VCpJLgO1X', '2026-04-22 06:18:38', '2026-04-22 06:18:38'),
(53, 'Monroe Corwin', 'rose.cruickshank@example.com', '3N1RGW3I3F', 'elfrieda62', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$oGc6w9sNHZF1uK4IZ8xY1uYP7RYf/Nwu0rMRxptGxl785qvBsqUIG', 'ZCIZFSyN1V', '2026-04-22 06:18:38', '2026-04-22 06:18:38'),
(54, 'Winona Jast', 'aylin.osinski@example.org', 'Y57BVQT0DQ', 'dhills', 'student', NULL, NULL, 'http://localhost/global_assets/images/user.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$oGc6w9sNHZF1uK4IZ8xY1uYP7RYf/Nwu0rMRxptGxl785qvBsqUIG', 'ekc25Iyrdy', '2026-04-22 06:18:39', '2026-04-22 06:18:39'),
(55, 'Dhruvraj', 'dh@gmail.com', 'ZMZLXZGZU3', 'CJIA/J/2026/01111', 'student', '04/01/2008', 'Male', 'http://127.0.0.1:8000/storage/uploads/student/ZMZLXZGZU3/photo.jpg', '1234567891', '9986543211', 6, NULL, NULL, NULL, 'jamnagar', NULL, '$2y$10$DmarwaHIZwnetd6KdlXQEusvcWSH8BDp.aZ0tRqycjl3ZUS12UUKK', NULL, '2026-04-22 06:48:37', '2026-04-22 06:53:14'),
(56, 'Khushal', 'learning@gmail.com', 'W7SN89PDQ8', 'CJIA/S/2026/321', 'student', '04/01/2026', 'Male', 'http://10.183.30.202:8000/storage/uploads/student/W7SN89PDQ8/photo.jpg', '9876543211', '3216549871', 4, 44, 813, 1, 'jamnagar', NULL, '$2y$10$/q0ZcU7YKBY0X6lC3Ib4oOEbDp5c8s0CKx72zvvgr7ggPzvaSSl5K', NULL, '2026-04-25 07:01:50', '2026-04-26 06:05:35'),
(57, 'Librarian', 'librarian@gmail.com', '0PIAE6CC37', 'MY SCHOOL/STAFF/2026/04/2570', 'librarian', NULL, 'Male', 'http://10.183.30.202:8000/storage/uploads/librarian/0PIAE6CC37/photo.jpg', '9876543211', '9876543211', 5, NULL, NULL, NULL, 'jamnagar', NULL, '$2y$10$xP1iICThR74WPL06nr/rK.6As5n5Z2fYZ0MjbCID9G08nS8yVWvNu', NULL, '2026-04-25 23:35:48', '2026-04-26 05:01:42'),
(58, 'Parmar Khushal P.', 'parmar@gmail.com', 'SDMLEYNYMZ', 'TREMURTI/S/2026/01123', 'student', '05/19/2006', 'Male', 'http://127.0.0.1:8000/storage/uploads/student/SDMLEYNYMZ/photo.jpg', '9876543211', '3216549871', 6, 44, 813, 1, 'jamnagar', NULL, '$2y$10$Ci7uvOl9gZ933J5j9RAEne/8DnCYiHD3G3rUZGqt.fJjDeuEU5Yzu', NULL, '2026-05-02 00:10:31', '2026-07-04 23:19:20'),
(59, 'Parmar Paresh Bhai', 'paresh@gmail.com', '50QJG0VDVU', 'paresh@gmail.com', 'parent', NULL, NULL, 'http://127.0.0.1:8000/global_assets/images/user.png', '6546546544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$dGMQLgBvC0gpntW6Mb8r/.1C/TwThOpOG7OijGXLRUHsq1/H90VIG', NULL, '2026-05-04 07:28:45', '2026-05-04 07:28:45'),
(60, 'Parmar Ansh P.', 'ansh@gmail.com', 'JCXZNTW7FL', 'TREMURTI/J/2026/001987', 'student', '04/22/2012', 'Male', 'http://127.0.0.1:8000/global_assets/images/user.png', '9876543211', '987654321', 7, 44, 813, 1, 'jamnagar', NULL, '$2y$10$TnRs3suRQIH6AcA8AnNFYus5elSXy6cExL8S6snhTwnlAc6.3M1ki', NULL, '2026-05-04 07:28:45', '2026-05-04 07:28:45'),
(61, 'Khushal Parmar', 'super@gmail.com', 'NYTT2YMJDS', 'Parmar_Khushal', 'super_admin', NULL, 'Male', 'http://127.0.0.1:8000/storage/uploads/super_admin/NYTT2YMJDS/photo.jfif', '987654321', '98753211', 6, 44, 813, 1, 'Jamnagarcity,jamnagar', NULL, '$2y$10$kCN5DnMmmwS2GHtytqPciOVsJsTyfp9WIjQKPInTtSS..1qsKELGK', NULL, '2026-05-12 00:18:58', '2026-05-12 00:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `title`, `name`, `level`, `created_at`, `updated_at`) VALUES
(1, 'accountant', 'Accountant', '5', NULL, NULL),
(2, 'parent', 'Parent', '4', NULL, NULL),
(3, 'teacher', 'Teacher', '3', NULL, NULL),
(4, 'admin', 'Admin', '2', NULL, NULL),
(5, 'super_admin', 'Super Admin', '1', NULL, NULL),
(6, 'librarian', 'Librarian', '3', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_my_class_id_foreign` (`my_class_id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_requests_book_id_foreign` (`book_id`),
  ADD KEY `book_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorms`
--
ALTER TABLE `dorms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dorms_name_unique` (`name`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exams_term_year_unique` (`term`,`year`);

--
-- Indexes for table `exam_records`
--
ALTER TABLE `exam_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_records_exam_id_foreign` (`exam_id`),
  ADD KEY `exam_records_my_class_id_foreign` (`my_class_id`),
  ADD KEY `exam_records_student_id_foreign` (`student_id`),
  ADD KEY `exam_records_section_id_foreign` (`section_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_name_class_type_id_remark_unique` (`name`,`class_type_id`,`remark`),
  ADD KEY `grades_class_type_id_foreign` (`class_type_id`);

--
-- Indexes for table `lgas`
--
ALTER TABLE `lgas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lgas_state_id_foreign` (`state_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_student_id_foreign` (`student_id`),
  ADD KEY `marks_my_class_id_foreign` (`my_class_id`),
  ADD KEY `marks_section_id_foreign` (`section_id`),
  ADD KEY `marks_subject_id_foreign` (`subject_id`),
  ADD KEY `marks_exam_id_foreign` (`exam_id`),
  ADD KEY `marks_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_classes`
--
ALTER TABLE `my_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `my_classes_class_type_id_name_unique` (`class_type_id`,`name`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_ref_no_unique` (`ref_no`),
  ADD KEY `payments_my_class_id_foreign` (`my_class_id`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_records_ref_no_unique` (`ref_no`),
  ADD KEY `payment_records_payment_id_foreign` (`payment_id`),
  ADD KEY `payment_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `pins`
--
ALTER TABLE `pins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pins_code_unique` (`code`),
  ADD KEY `pins_user_id_foreign` (`user_id`),
  ADD KEY `pins_student_id_foreign` (`student_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_student_id_foreign` (`student_id`),
  ADD KEY `promotions_from_class_foreign` (`from_class`),
  ADD KEY `promotions_from_section_foreign` (`from_section`),
  ADD KEY `promotions_to_section_foreign` (`to_section`),
  ADD KEY `promotions_to_class_foreign` (`to_class`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_pr_id_foreign` (`pr_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_name_my_class_id_unique` (`name`,`my_class_id`),
  ADD KEY `sections_my_class_id_foreign` (`my_class_id`),
  ADD KEY `sections_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_records`
--
ALTER TABLE `staff_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_records_code_unique` (`code`),
  ADD KEY `staff_records_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_records_adm_no_unique` (`adm_no`),
  ADD KEY `student_records_user_id_foreign` (`user_id`),
  ADD KEY `student_records_my_class_id_foreign` (`my_class_id`),
  ADD KEY `student_records_section_id_foreign` (`section_id`),
  ADD KEY `student_records_my_parent_id_foreign` (`my_parent_id`),
  ADD KEY `student_records_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_my_class_id_name_unique` (`my_class_id`,`name`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_slots_timestamp_from_timestamp_to_ttr_id_unique` (`timestamp_from`,`timestamp_to`,`ttr_id`),
  ADD KEY `time_slots_ttr_id_foreign` (`ttr_id`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_tables_ttr_id_ts_id_day_unique` (`ttr_id`,`ts_id`,`day`),
  ADD UNIQUE KEY `time_tables_ttr_id_ts_id_exam_date_unique` (`ttr_id`,`ts_id`,`exam_date`),
  ADD KEY `time_tables_ts_id_foreign` (`ts_id`),
  ADD KEY `time_tables_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `time_table_records`
--
ALTER TABLE `time_table_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_table_records_name_unique` (`name`),
  ADD UNIQUE KEY `time_table_records_my_class_id_exam_id_year_unique` (`my_class_id`,`exam_id`,`year`),
  ADD KEY `time_table_records_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_code_unique` (`code`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_state_id_foreign` (`state_id`),
  ADD KEY `users_lga_id_foreign` (`lga_id`),
  ADD KEY `users_bg_id_foreign` (`bg_id`),
  ADD KEY `users_nal_id_foreign` (`nal_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dorms`
--
ALTER TABLE `dorms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_records`
--
ALTER TABLE `exam_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lgas`
--
ALTER TABLE `lgas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=823;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `my_classes`
--
ALTER TABLE `my_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pins`
--
ALTER TABLE `pins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff_records`
--
ALTER TABLE `staff_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `time_table_records`
--
ALTER TABLE `time_table_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD CONSTRAINT `book_requests_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_records`
--
ALTER TABLE `exam_records`
  ADD CONSTRAINT `exam_records_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_class_type_id_foreign` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lgas`
--
ALTER TABLE `lgas`
  ADD CONSTRAINT `lgas_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `marks_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_classes`
--
ALTER TABLE `my_classes`
  ADD CONSTRAINT `my_classes_class_type_id_foreign` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD CONSTRAINT `payment_records_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pins`
--
ALTER TABLE `pins`
  ADD CONSTRAINT `pins_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_from_class_foreign` FOREIGN KEY (`from_class`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_section_foreign` FOREIGN KEY (`from_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_class_foreign` FOREIGN KEY (`to_class`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_section_foreign` FOREIGN KEY (`to_section`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_pr_id_foreign` FOREIGN KEY (`pr_id`) REFERENCES `payment_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `staff_records`
--
ALTER TABLE `staff_records`
  ADD CONSTRAINT `staff_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_records`
--
ALTER TABLE `student_records`
  ADD CONSTRAINT `student_records_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_my_parent_id_foreign` FOREIGN KEY (`my_parent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `time_slots`
--
ALTER TABLE `time_slots`
  ADD CONSTRAINT `time_slots_ttr_id_foreign` FOREIGN KEY (`ttr_id`) REFERENCES `time_table_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD CONSTRAINT `time_tables_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_tables_ts_id_foreign` FOREIGN KEY (`ts_id`) REFERENCES `time_slots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_tables_ttr_id_foreign` FOREIGN KEY (`ttr_id`) REFERENCES `time_table_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_table_records`
--
ALTER TABLE `time_table_records`
  ADD CONSTRAINT `time_table_records_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_table_records_my_class_id_foreign` FOREIGN KEY (`my_class_id`) REFERENCES `my_classes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_bg_id_foreign` FOREIGN KEY (`bg_id`) REFERENCES `blood_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_lga_id_foreign` FOREIGN KEY (`lga_id`) REFERENCES `lgas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_nal_id_foreign` FOREIGN KEY (`nal_id`) REFERENCES `nationalities` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
