-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2019 at 05:31 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clickpay_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `total_clicked` int(11) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `Name`, `link`, `image`, `click`, `total_clicked`, `user_id`, `created_at`) VALUES
(2, 'Second company', 'https://www.facebook.com', '/uploads/18519754_524358311288210_2605788100714528157_n.jpg', NULL, 3, 2, '2019-07-12 12:23:24'),
(3, 'ad dekho', 'tttt', NULL, 1, 3, 2, '2019-07-12 12:24:07'),
(7, 'ad1', 'www.twitter.com', NULL, 1, 3, 2, '2019-07-12 12:24:59'),
(8, 'ad2', 'www.twitter.com', NULL, 2, 2, 2, '2019-07-12 12:25:39'),
(9, 'ad4', 'www.twitter.com', NULL, 2, 2, 2, '2019-07-12 12:26:30'),
(10, 'ad3', 'www.twitter.com', NULL, 1, 1, 2, '2019-07-12 06:37:13'),
(11, 'ad5', 'www.twitter.com', NULL, 1, 1, 2, '2019-07-12 06:37:49'),
(12, 'testad 1 12 july', 'www.twitter.com', NULL, 1, 1, 2, '2019-07-12 06:51:00'),
(13, 'testad 2 12 july', 'www.twitter.com', NULL, 1, 1, 2, '2019-07-12 06:52:24'),
(14, 'testad 3 12 july', 'www.twitter.com', NULL, 1, 1, 2, '2019-07-12 06:53:13'),
(15, 'ad 3 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:40:28'),
(16, 'testad 4 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:41:00'),
(17, 'testad 6 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:41:47'),
(18, 'testad 5 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:41:55'),
(19, 'testad 4 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:42:07'),
(20, 'testad 7 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:44:13'),
(21, 'test ad 8 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:44:35'),
(22, 'test ad 9 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:44:55'),
(23, 'test ad 10 12 july', 'www.twitter.com', NULL, 1, 0, 2, '2019-07-12 06:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `main_name` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_name`, `sort`, `icon`, `url`, `user_id`) VALUES
(2, 'Dashboard', 'dashboard', 1, 'home', 'home', 4),
(3, 'Modules', 'modules', 4, 'home', 'modules', 4),
(5, 'Role/Permission', 'role', 2, 'home', 'role', 4),
(7, 'Users', 'user', 3, 'home', 'users', 2),
(20, 'Pricing Plan', 'pricing_plan', 5, 'home', 'pricing_plan', 2),
(21, 'Ads', 'ads', 6, 'home', 'ads', 2),
(22, 'Withdraw', 'withdraw', 7, 'home', 'withdraw', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules_fileds`
--

CREATE TABLE `modules_fileds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filed_type` varchar(100) NOT NULL,
  `options` varchar(255) NOT NULL,
  `length` int(11) NOT NULL,
  `required` int(11) NOT NULL DEFAULT 0,
  `module_id` int(11) NOT NULL,
  `is_relation` int(11) NOT NULL,
  `relation_column` varchar(100) DEFAULT NULL,
  `relation_table` varchar(100) DEFAULT NULL,
  `value_column` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules_fileds`
--

INSERT INTO `modules_fileds` (`id`, `name`, `type`, `filed_type`, `options`, `length`, `required`, `module_id`, `is_relation`, `relation_column`, `relation_table`, `value_column`) VALUES
(1, 'name', 'VARCHAR', 'input', '', 100, 1, 15, 0, NULL, NULL, NULL),
(2, 'gender', 'VARCHAR', 'radio', 'male,female', 100, 1, 15, 0, NULL, NULL, NULL),
(3, 'relationship_status', 'VARCHAR', 'select', 'single,married,divorced,widowed', 100, 1, 15, 0, NULL, NULL, NULL),
(4, 'image', 'VARCHAR', 'file', 'jpg,png,jpeg,gif', 100, 1, 15, 0, NULL, NULL, NULL),
(5, 'education', 'VARCHAR', 'checkbox', 'matric,inter,bachlor', 255, 1, 15, 0, NULL, NULL, NULL),
(6, 'message', 'TEXT', 'textarea', '', 255, 1, 15, 0, NULL, NULL, NULL),
(7, 'Name', 'VARCHAR', 'input', '', 100, 1, 16, 0, NULL, NULL, NULL),
(8, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 16, 0, NULL, NULL, NULL),
(9, 'Name', 'VARCHAR', 'input', '', 100, 1, 17, 0, NULL, NULL, NULL),
(10, 'Icon', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 17, 0, NULL, NULL, NULL),
(11, 'Title', 'VARCHAR', 'input', '', 255, 1, 18, 0, NULL, NULL, NULL),
(12, 'Description', 'TEXT', 'textarea', '', 500, 1, 18, 0, NULL, NULL, NULL),
(13, 'category', 'INT', 'input', '', 11, 1, 18, 1, 'id', 'blog_category', 'Name'),
(14, 'image', 'VARCHAR', 'file', 'png,jpg,jpeg,gif', 255, 1, 18, 0, NULL, NULL, NULL),
(15, 'Name', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(16, 'Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(17, 'Refer_Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(18, 'Daily_Ads', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(19, 'Amount', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(20, 'Months', 'VARCHAR', 'input', '', 10, 1, 19, 0, NULL, NULL, NULL),
(21, 'Name', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(22, 'Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(23, 'Refer_Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(24, 'Daily_Ads', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(25, 'Amount', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(26, 'Months', 'VARCHAR', 'input', '', 10, 1, 19, 0, NULL, NULL, NULL),
(27, 'Name', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(28, 'Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(29, 'Refer_Click_Price', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(30, 'Daily_Ads', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(31, 'Amount', 'VARCHAR', 'input', '', 100, 1, 19, 0, NULL, NULL, NULL),
(32, 'Months', 'VARCHAR', 'input', '', 10, 1, 19, 0, NULL, NULL, NULL),
(33, 'Name', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(34, 'Click_Price', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(35, 'Refer_Click_Price', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(36, 'Daily_Ads', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(37, 'Amount', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(38, 'Duration', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(39, 'Name', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(40, 'Click_Price', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(41, 'Refer_Click_Price', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(42, 'Daily_Ads', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(43, 'Amount', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(44, 'Duration', 'VARCHAR', 'input', '', 100, 1, 20, 0, NULL, NULL, NULL),
(45, 'Name', 'VARCHAR', 'input', '', 255, 1, 21, 0, NULL, NULL, NULL),
(46, 'link', 'VARCHAR', 'input', '', 255, 1, 21, 0, NULL, NULL, NULL),
(47, 'image', 'VARCHAR', 'file', 'file', 255, 0, 21, 0, NULL, NULL, NULL),
(48, 'User', 'INT', 'input', '', 11, 1, 22, 1, 'id', 'users', 'first_name,last_name,jazz_no'),
(49, 'Amount', 'VARCHAR', 'input', '', 100, 1, 22, 0, NULL, NULL, NULL),
(50, 'Status', 'VARCHAR', 'select', 'Pending,Accept,Reject', 100, 1, 22, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `view_all` int(11) NOT NULL DEFAULT 0,
  `created` int(11) DEFAULT 0,
  `edit` int(11) NOT NULL DEFAULT 0,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `disable` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `module_id`, `user_id`, `user_type_id`, `view`, `view_all`, `created`, `edit`, `deleted`, `disable`) VALUES
(199, 2, 2, 2, 0, 0, 0, 0, 0, 0),
(200, 3, 2, 2, 0, 0, 0, 0, 0, 0),
(201, 5, 2, 2, 0, 0, 0, 0, 0, 0),
(202, 7, 2, 2, 0, 0, 0, 0, 0, 0),
(203, 20, 2, 2, 0, 0, 0, 0, 0, 0),
(210, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(211, 3, 2, 1, 1, 1, 1, 1, 1, 1),
(212, 5, 2, 1, 1, 1, 1, 1, 1, 1),
(213, 7, 2, 1, 1, 1, 1, 1, 1, 1),
(214, 20, 2, 1, 1, 1, 1, 1, 1, 1),
(215, 21, 2, 1, 1, 1, 1, 1, 1, 1),
(216, 22, 2, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_user`
--

CREATE TABLE `plan_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_user`
--

INSERT INTO `plan_user` (`id`, `user_id`, `pricing_plan_id`, `created_at`) VALUES
(1, 10, 1, '2019-07-09 20:36:29'),
(2, 11, 1, '2019-07-10 09:01:54'),
(3, 0, 1, '2019-07-10 09:02:00'),
(4, 0, 1, '2019-07-10 09:03:16'),
(5, 14, 0, '2019-07-10 09:27:48'),
(6, 0, 0, '2019-07-10 09:28:03'),
(7, 16, 0, '2019-07-10 09:29:39'),
(8, 0, 3, '2019-07-10 09:30:59'),
(9, 0, 1, '2019-07-10 09:36:13'),
(10, 0, 1, '2019-07-10 09:43:47'),
(11, 20, 1, '2019-07-10 10:08:13'),
(12, 0, 0, '2019-07-11 18:41:35'),
(13, 22, 1, '2019-07-11 18:43:58'),
(14, 23, 3, '2019-07-11 19:28:29'),
(15, 24, 2, '2019-07-11 19:51:24'),
(16, 25, 1, '2019-07-12 12:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_plan`
--

CREATE TABLE `pricing_plan` (
  `id` int(11) UNSIGNED NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Click_Price` varchar(100) NOT NULL,
  `Refer_Click_Price` varchar(100) NOT NULL,
  `Daily_Ads` varchar(100) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing_plan`
--

INSERT INTO `pricing_plan` (`id`, `Name`, `Click_Price`, `Refer_Click_Price`, `Daily_Ads`, `Amount`, `Duration`, `user_id`, `created_at`) VALUES
(1, 'Silver', '200', '0.20', '3', '2000', '6', 2, '2019-07-12 06:48:52'),
(2, 'Standard', '1.50', '0.30', '130', '3000', '6', 2, '2019-07-02 18:22:45'),
(3, 'Platinum ', '1.70', '2', '5', '5000', '6', 2, '2019-07-11 19:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `cnic` varchar(16) DEFAULT NULL,
  `jazz_no` varchar(16) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `referrer` varchar(100) DEFAULT NULL,
  `amount` decimal(10,3) DEFAULT 0.000,
  `status` enum('Inactive','Pending','Approved') DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `role`, `cnic`, `jazz_no`, `city_id`, `referrer`, `amount`, `status`, `created_at`, `updated_at`, `updated_by`) VALUES
(2, 'admin', '', '', '', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 1, '', '', 0, NULL, NULL, 'Approved', '2019-07-05 22:32:45', '2019-07-06 21:45:38', NULL),
(10, 'Abdul', 'Moiz', 'm0zee', '1231231123', 'moiz.hanif786@gmail.com', '4297f44b13955235245b2497399d7a93', 2, '234543234323', '09875432', 0, '', '0.000', 'Approved', '2019-07-09 20:36:29', '2019-07-09 22:12:29', NULL),
(11, 'test', 'test', 'test123', '', 'muzammil.yahya6@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, '4220115523393', '', 0, '', '0.000', 'Pending', '2019-07-10 09:01:54', NULL, NULL),
(14, '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2, '', '', 0, '', '0.000', 'Pending', '2019-07-10 09:27:48', NULL, NULL),
(22, 'user', 'test1', 'aduser1', '12345678909', 'aduser@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, '43000-12345678', '5678901234', 0, '', '817.600', 'Approved', '2019-07-11 18:43:58', '2019-07-12 06:53:13', NULL),
(23, 'aduser', 'two', 'user2', '123456789098', 'aduser2@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, '1234567890987', '123456789098', 0, '', '8.500', 'Approved', '2019-07-11 19:28:29', '2019-07-11 19:36:37', NULL),
(24, 'test', 'uu', 'uuu', '12345678909', 'test@yopmail.com', '098f6bcd4621d373cade4e832627b4f6', 2, '1234567890987', '12345678909', 0, '', '13.500', 'Approved', '2019-07-11 19:51:24', '2019-07-12 12:26:30', NULL),
(25, 'linta', 'shahid', 'linta', '123456789009', 'aduser3@yopmail.com', '826990bc0af28681bde1dcd66a336763', 2, '1234567890098', '123456789009', 0, '', '0.000', 'Approved', '2019-07-12 12:12:17', '2019-07-12 12:12:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_ads_view`
--

CREATE TABLE `user_ads_view` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `amount` decimal(10,3) NOT NULL,
  `referrer_amount` decimal(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ads_view`
--

INSERT INTO `user_ads_view` (`id`, `user_id`, `ad_id`, `amount`, `referrer_amount`, `created_at`) VALUES
(1, 22, 2, '1.200', '0.200', '2019-07-11 18:46:15'),
(2, 22, 3, '1.200', '0.200', '2019-07-11 19:00:48'),
(3, 22, 0, '1.200', '0.200', '2019-07-11 19:00:48'),
(4, 22, 6, '1.200', '0.200', '2019-07-11 19:04:48'),
(5, 22, 5, '1.200', '0.200', '2019-07-11 19:07:51'),
(6, 22, 0, '1.200', '0.200', '2019-07-11 19:07:51'),
(7, 22, 0, '1.200', '0.200', '2019-07-11 19:10:10'),
(8, 22, 4, '1.200', '0.200', '2019-07-11 19:10:10'),
(9, 23, 3, '1.700', '2.000', '2019-07-11 19:32:24'),
(10, 23, 0, '1.700', '2.000', '2019-07-11 19:32:24'),
(11, 23, 2, '1.700', '2.000', '2019-07-11 19:35:27'),
(12, 23, 7, '1.700', '2.000', '2019-07-11 19:36:37'),
(13, 23, 0, '1.700', '2.000', '2019-07-11 19:36:37'),
(14, 22, 7, '1.000', '0.200', '2019-07-12 06:33:12'),
(15, 22, 9, '1.000', '0.200', '2019-07-12 06:34:17'),
(16, 22, 0, '1.000', '0.200', '2019-07-12 06:34:18'),
(17, 22, 8, '1.000', '0.200', '2019-07-12 06:35:30'),
(18, 22, 10, '1.000', '0.200', '2019-07-12 06:37:13'),
(19, 22, 0, '1.000', '0.200', '2019-07-12 06:37:13'),
(20, 22, 11, '1.000', '0.200', '2019-07-12 06:37:49'),
(21, 22, 0, '1.000', '0.200', '2019-07-12 06:37:50'),
(22, 22, 12, '200.000', '0.200', '2019-07-12 06:51:00'),
(23, 22, 0, '200.000', '0.200', '2019-07-12 06:51:00'),
(24, 22, 13, '200.000', '0.200', '2019-07-12 06:52:24'),
(25, 22, 14, '200.000', '0.200', '2019-07-12 06:53:13'),
(26, 24, 2, '1.500', '0.300', '2019-07-12 12:23:24'),
(27, 24, 3, '1.500', '0.300', '2019-07-12 12:24:07'),
(28, 24, 0, '1.500', '0.300', '2019-07-12 12:24:07'),
(29, 24, 7, '1.500', '0.300', '2019-07-12 12:24:59'),
(30, 24, 0, '1.500', '0.300', '2019-07-12 12:24:59'),
(31, 24, 8, '1.500', '0.300', '2019-07-12 12:25:39'),
(32, 24, 0, '1.500', '0.300', '2019-07-12 12:25:39'),
(33, 24, 9, '1.500', '0.300', '2019-07-12 12:26:30'),
(34, 24, 0, '1.500', '0.300', '2019-07-12 12:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `user_id`) VALUES
(1, 'Admin', 2),
(2, 'User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) UNSIGNED NOT NULL,
  `User` int(11) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `approval_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `User`, `Amount`, `Status`, `approval_date`, `user_id`, `created_at`) VALUES
(1, 10, '1000', 'Approve', '0000-00-00 00:00:00', 0, '2019-07-09 22:21:50'),
(2, 23, '1000', 'Accept', '0000-00-00 00:00:00', 2, '2019-07-11 19:47:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_user`
--
ALTER TABLE `plan_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_plan`
--
ALTER TABLE `pricing_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_ads_view`
--
ALTER TABLE `user_ads_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `modules_fileds`
--
ALTER TABLE `modules_fileds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `plan_user`
--
ALTER TABLE `plan_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pricing_plan`
--
ALTER TABLE `pricing_plan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_ads_view`
--
ALTER TABLE `user_ads_view`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
