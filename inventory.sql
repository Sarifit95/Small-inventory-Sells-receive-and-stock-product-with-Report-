-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 10:10 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easca`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'sarif', '01781275612', 'Nagmud', NULL, NULL),
(2, 'Redoyan hossain', '01781275611', 'Nagmud', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2021_07_25_155117_create__products_table', 1),
(5, '2021_07_25_161604_create_customers_table', 1),
(6, '2021_07_26_043812_create_sells_table', 1),
(7, '2021_07_26_044051_create_sells_details_table', 1),
(8, '2021_07_26_044257_create_receive_table', 1),
(9, '2021_07_26_044338_create_receive_details_table', 1),
(10, '2021_07_26_051813_create_vendors_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(8,2) UNSIGNED NOT NULL,
  `purchase_price` double(8,2) UNSIGNED NOT NULL,
  `sales_price` double(8,2) UNSIGNED NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `purchase_price`, `sales_price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Teer Soyabean Oil [5lt]', 'Teer Soyabean Oil [5lt]', 1.00, 500.00, 600.00, 'teer-soyabean-oil-5lt_1628941176.jpg', NULL, NULL),
(2, 'Teer Soyabean Oil [2lt]', 'Teer Soyabean Oil [2lt]', 1.00, 200.00, 250.00, '', NULL, NULL),
(3, 'Teer Atta 2K', 'Teer Atta 2K', 1.00, 75.00, 88.00, '', NULL, NULL),
(4, 'Teer Atta 1Kg', 'Teer Atta 1Kg', 1.00, 40.00, 55.00, '', NULL, NULL),
(5, 'ACE(mdcn) 500mg', 'ACE(mdcn) 500mg', 10.00, 7.00, 8.00, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receive`
--

CREATE TABLE `receive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receive`
--

INSERT INTO `receive` (`id`, `invoice_no`, `vendor_id`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(3, '3', 1, 1900.00, '2021-07-26', NULL, NULL),
(4, '4', 2, 5400.00, '2021-07-06', NULL, NULL),
(5, '5', 1, 3250.00, '2021-07-29', NULL, NULL),
(6, '6', 3, 2000.00, '2021-07-20', NULL, NULL),
(7, '7', 3, 1070.00, '2021-08-01', NULL, NULL),
(8, '8', 3, 5000.00, '2021-09-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receive_details`
--

CREATE TABLE `receive_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` double(8,2) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `discount` double(8,2) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receive_details`
--

INSERT INTO `receive_details` (`id`, `invoice_no`, `product_id`, `qty`, `price`, `discount`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(5, '3', 1, 3.00, 500.00, 0.00, 1500.00, '2021-07-26', NULL, NULL),
(6, '3', 4, 10.00, 40.00, 0.00, 400.00, '2021-07-26', NULL, NULL),
(7, '4', 1, 10.00, 500.00, 0.00, 5000.00, '2021-07-06', NULL, NULL),
(8, '4', 4, 10.00, 40.00, 0.00, 400.00, '2021-07-06', NULL, NULL),
(9, '5', 1, 5.00, 500.00, 0.00, 2500.00, '2021-07-29', NULL, NULL),
(10, '5', 3, 10.00, 75.00, 0.00, 750.00, '2021-07-29', NULL, NULL),
(11, '6', 2, 10.00, 200.00, 0.00, 2000.00, '2021-07-20', NULL, NULL),
(12, '7', 5, 100.00, 0.70, 0.00, 70.00, '2021-08-01', NULL, NULL),
(13, '7', 1, 2.00, 500.00, 0.00, 1000.00, '2021-08-01', NULL, NULL),
(14, '8', 1, 10.00, 500.00, 0.00, 5000.00, '2021-09-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `invoice_no`, `customer_id`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(2, '1', 2, 2400.00, '2021-07-28', NULL, NULL),
(3, '2', 1, 275.00, '2021-07-14', NULL, NULL),
(4, '3', 1, 2940.00, '2021-08-14', NULL, NULL),
(5, '4', 2, 600.00, '2021-09-12', NULL, NULL),
(6, '5', 1, 9000.00, '2021-09-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sells_details`
--

CREATE TABLE `sells_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` double(8,2) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `discount` double(8,2) UNSIGNED NOT NULL,
  `total_price` double(8,2) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells_details`
--

INSERT INTO `sells_details` (`id`, `invoice_no`, `product_id`, `qty`, `price`, `discount`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(3, '1', 1, 4.00, 600.00, 0.00, 2400.00, '2021-07-28', NULL, NULL),
(4, '2', 4, 5.00, 55.00, 0.00, 275.00, '2021-07-14', NULL, NULL),
(5, '3', 2, 10.00, 250.00, 0.00, 2500.00, '2021-08-14', NULL, NULL),
(6, '3', 3, 5.00, 88.00, 0.00, 440.00, '2021-08-14', NULL, NULL),
(7, '4', 1, 1.00, 600.00, 0.00, 600.00, '2021-09-12', NULL, NULL),
(8, '5', 1, 15.00, 600.00, 0.00, 9000.00, '2021-09-12', NULL, NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$BO5cWPQvlxld.KZbnly.beHIBWwZF3sU4UOtTf4dGAIJe3DRC4hmG', NULL, '2021-07-28 00:30:32', '2021-07-28 00:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'sarif', '01781275612', 'Nagmud', NULL, NULL),
(2, 'Redoyan hossain', '01781275615', 'nagmud', NULL, NULL),
(3, 'Kader', '01781275655', 'Ramgonj', NULL, NULL),
(4, 'Hanif', '01781275699', 'Ramgonj', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive`
--
ALTER TABLE `receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_details`
--
ALTER TABLE `receive_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sells_details`
--
ALTER TABLE `sells_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receive`
--
ALTER TABLE `receive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receive_details`
--
ALTER TABLE `receive_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sells_details`
--
ALTER TABLE `sells_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
