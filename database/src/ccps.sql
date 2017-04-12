-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 07:34 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccps`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_payments`
--

CREATE TABLE `client_payments` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `payment_serial` int(11) DEFAULT NULL,
  `amount_paid` int(11) NOT NULL,
  `date` date NOT NULL,
  `approved_by_manager` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_payments`
--

INSERT INTO `client_payments` (`id`, `contract_id`, `payment_serial`, `amount_paid`, `date`, `approved_by_manager`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 133441, 3000, '2017-10-05', 1, NULL, '2017-04-03 21:02:16', '2017-04-03 23:33:32'),
(2, 1, 8797, 2000, '2017-10-05', 1, NULL, '2017-04-03 23:43:32', '2017-04-03 23:44:37'),
(3, 2, 9332434, 3434, '2017-10-05', 0, NULL, '2017-04-04 06:33:35', '2017-04-04 06:33:35'),
(4, 3, NULL, 5000, '2017-09-04', 1, NULL, '2017-04-09 09:59:14', '2017-04-09 09:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `contract_details`
--

CREATE TABLE `contract_details` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `monthly_workingday` int(11) NOT NULL,
  `payment_from_client_monthly` double NOT NULL,
  `payment_for_staff_monthly` double DEFAULT NULL,
  `month_limit` int(11) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_details`
--

INSERT INTO `contract_details` (`id`, `client_id`, `staff_id`, `start_date`, `monthly_workingday`, `payment_from_client_monthly`, `payment_for_staff_monthly`, `month_limit`, `Active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2017-12-04', 7, 30000, 2500, 3, 1, NULL, '2017-04-03 20:58:47', '2017-04-03 21:00:40'),
(2, 3, 2, '2017-05-09', 11, 4000, 2500, 5, 1, NULL, '2017-04-03 20:59:13', '2017-04-03 21:00:42'),
(3, 8, 5, '2017-01-01', 7, 5000, 5000, 5, 1, NULL, '2017-04-12 06:39:38', '2017-04-12 06:41:48'),
(4, 8, NULL, '2017-04-01', 8, 6000, NULL, 7, 0, NULL, '2017-04-12 06:40:19', '2017-04-12 06:40:19'),
(5, 3, NULL, '2016-05-29', 5, 2100, NULL, 5, 0, NULL, '2017-04-12 06:56:47', '2017-04-12 06:56:47'),
(6, 3, NULL, '2017-03-06', 18, 8000, NULL, 3, 0, NULL, '2017-04-12 06:58:01', '2017-04-12 06:58:01'),
(7, 3, NULL, '2017-08-01', 6, 7000, NULL, 9, 0, NULL, '2017-04-12 06:58:45', '2017-04-12 06:58:45'),
(8, 8, NULL, '2017-09-03', 15, 5500, NULL, 7, 0, NULL, '2017-04-12 06:59:43', '2017-04-12 06:59:43'),
(9, 8, NULL, '2017-01-23', 16, 6000, NULL, 11, 0, NULL, '2017-04-12 07:00:14', '2017-04-12 07:00:14'),
(10, 9, NULL, '2017-02-28', 8, 4300, NULL, 5, 0, NULL, '2017-04-12 07:01:25', '2017-04-12 07:01:25'),
(11, 9, NULL, '2017-03-01', 20, 1000, NULL, 9, 0, NULL, '2017-04-12 07:01:54', '2017-04-12 07:01:54'),
(12, 3, NULL, '2017-07-01', 9, 8000, NULL, 5, 0, NULL, '2017-04-12 07:06:05', '2017-04-12 07:06:05'),
(13, 3, NULL, '2017-05-12', 5, 5000, NULL, 5, 0, NULL, '2017-04-12 07:09:15', '2017-04-12 07:09:15'),
(14, 3, NULL, '2017-12-04', 12, 4000, NULL, 5, 0, NULL, '2017-04-12 07:09:35', '2017-04-12 07:09:35'),
(15, 3, NULL, '2017-12-04', 7, 6000, NULL, 9, 0, NULL, '2017-04-12 07:11:30', '2017-04-12 07:11:30'),
(16, 3, NULL, '2017-01-01', 12, 6000, NULL, 9, 0, NULL, '2017-04-12 07:11:53', '2017-04-12 07:11:53'),
(17, 3, NULL, '2017-04-27', 12, 6000, NULL, 3, 0, NULL, '2017-04-12 07:17:11', '2017-04-12 07:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `staff_duty`
--

CREATE TABLE `staff_duty` (
  `id` int(11) NOT NULL,
  `contract_id` int(11) NOT NULL,
  `duty_date` date DEFAULT NULL,
  `next_date` date DEFAULT NULL,
  `approved_by_client` int(1) NOT NULL DEFAULT '0',
  `paid` int(1) NOT NULL DEFAULT '0',
  `payment_appove_by_staff` int(1) DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_duty`
--

INSERT INTO `staff_duty` (`id`, `contract_id`, `duty_date`, `next_date`, `approved_by_client`, `paid`, `payment_appove_by_staff`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-04-04', '2017-05-04', 1, 1, 1, NULL, NULL, NULL),
(2, 2, '2017-04-04', '2017-05-04', 1, 1, 0, NULL, NULL, NULL),
(3, 1, '2017-04-05', '2017-04-06', 1, 1, 0, NULL, NULL, NULL),
(4, 1, '2017-04-06', '2017-04-07', 1, 0, 0, NULL, NULL, NULL),
(5, 1, '2017-04-07', '2017-04-08', 0, 0, 0, NULL, NULL, NULL),
(6, 1, '2017-04-09', '2016-04-10', 0, 0, 0, NULL, NULL, NULL),
(7, 1, '2017-04-10', '2017-04-11', 0, 0, 0, NULL, NULL, NULL),
(8, 1, '2017-04-11', '2017-04-12', 0, 0, 0, NULL, NULL, NULL),
(9, 2, '2017-04-11', '1970-01-01', 0, 0, 0, NULL, NULL, NULL),
(10, 2, '2017-04-11', '2017-04-12', 1, 0, 0, NULL, NULL, NULL),
(11, 3, '2017-04-12', '2017-04-14', 1, 1, 0, NULL, NULL, NULL),
(12, 5, '2017-05-04', '2017-04-06', 0, 0, 0, NULL, NULL, NULL),
(13, 1, '2017-04-12', '2017-04-13', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `rolename` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `approve` int(1) DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `contact_no`, `rolename`, `address`, `password`, `approve`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ryhan Ahmed Tamim', 'kucse160230', 'tcse007@gmail.com', '01778506265', 'Admin', 'Gopalganj', '$2y$10$rrNyO6mUbI5dz.D.MXyuAeYtOBsWB9jAc4.L7XPXRtdentFw7UdSG', 1, '7KMYtAlK8wvc9flSHgGTtILwMIzW0PitZNtsGHaKhlbCqPEXM0Apb0l1grgo', NULL, NULL),
(2, 'Ryata', 'kucse1602304', 'Ryata@gmail.com', '01293584094', 'Staff', 'khulna', '$2y$10$1N9h3bodn9neAyzEtVq.s.z3HDC5fC7/oTQVq7CKIJtwM1Ll0RMAK', 1, 'XkE3FC2uGF6v9Sxx6oXhcvpImLLLMYJ0IncOsOxnQquBmxeqmuu0XwGVNVis', NULL, NULL),
(3, 'Alister', 'kucse1602301', 'alister@gmail.com', '01778588888', 'Client', 'khulna', '$2y$10$zA7eOUc7hHXMV6sN2zC0WOi7s3NXNWWvNp92nhh/UhBJAkXdA1JxS', 1, 'e0G7aW0nHh1zV262FyfnTGJHkKXDN4P01IGkzOsbO0oeGbHOh9j9lrti4yto', NULL, NULL),
(4, 'Anna', 'kucse1602302', 'anna@gmail.com', '017785999999', 'Staff', 'Khulna', '$2y$10$CHBsgvaZguWvcfx8VCuJb.gniVBdfhovyOF/prv8m3vBoRLkp38YC', 1, NULL, NULL, NULL),
(5, 'Arin', 'kucse1602303', 'arin@gmail.com', '01799999999', 'Staff', 'Khulna', '$2y$10$jvMqDWLfmN/Lkid15zKRKe3u7OFsRMRh0/dEZE/C98GOsIQvpUrJi', 1, 'h7mdmg0SGm53Nkfr9MZ0cD384ez5ZFbZ1g4P9bnhZidN2ufZmkL3ildxoe52', NULL, NULL),
(6, 'Elsha', 'kucse1602305', 'elsha@yahoo.com', '01778588888', 'Staff', 'khulna', '$2y$10$96EtOKA5DF/2IIK12MCWVe9QbCldagufEFmL1ZDOaFUG5MlPFtA4S', 0, NULL, NULL, NULL),
(7, 'Anam Anam', 'kucse1602306', 'anam@gmail.com', '01628888888', 'Staff', 'Khulna', '$2y$10$K050NkJ1.WMzkoAcOyRiuOmXbDAyeMK3ZU.selpXxyzJu2YlecWm.', 1, NULL, NULL, NULL),
(8, 'Furgus', 'kucse1602308', 'furgus@gmail.com', '01799999999', 'Client', 'Khulna', '$2y$10$X5XE8AXOqHO6z9SySfbzlOMJdAbiE/P5vJkXiJhCRDju6Fvbr/pFS', 1, 'QVUFI1GEfqVimwmOAYgDeybXykKpSa51JMOsFfY8CFPYzPQIt03cMzLbGIbO', NULL, NULL),
(9, 'Falisha', 'kucse1602309', 'falisha@gamil.com', '01788866666', 'Client', 'Khulna', '$2y$10$ff1tN3CVbgrn1z5jcn5QIel08QxKhyVAzlggxwdUU80KEGkOUKF3S', 1, 'UUTXmEYuN8AxcFqCUy8drr1Pm6DdssQwCZDalbNHydomR7jRIJlwSvHSbpV3', NULL, NULL),
(10, 'Aditi', 'kucse1602321', 'aditi@gmail.com', '017639637', 'Client', 'Khulna', '$2y$10$Vbh/z2jJYsfOYAYOVPHcuO82Qmm/VbJpzRMB0IZh65L1ShWpAjHD6', 0, NULL, NULL, NULL),
(11, 'pritam', 'kucse1602322', 'pritam@gmail.com', '01768348828', 'Client', 'Khulna', '$2y$10$NB0Tkii6I/1KGeyMRtRWN.ElcLIiiAyzfYINNzozGEgnTMy0Iz9f6', 0, NULL, NULL, NULL),
(12, 'sumit', 'kucse1602325', 'sumi@gmail.com', '016733949329', 'Staff', 'Khulna', '$2y$10$APGOZH/ZgrIqWKVTpdORJOU4mnyncXVg4MNt70.t/Sp45UHviryPO', 0, NULL, NULL, NULL),
(13, 'rahul', 'kucse1602327', 'rahul@gmail.com', '015552347375', 'Staff', 'Khulna', '$2y$10$xMcUZC.QS0ymisqv0G3kkeKv6NMR//wVBW46.618DBmV7Q8ggjT9S', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `contract_details`
--
ALTER TABLE `contract_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_duty`
--
ALTER TABLE `staff_duty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_payments`
--
ALTER TABLE `client_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contract_details`
--
ALTER TABLE `contract_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `staff_duty`
--
ALTER TABLE `staff_duty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD CONSTRAINT `client_payments_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract_details`
--
ALTER TABLE `contract_details`
  ADD CONSTRAINT `contract_details_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_details_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_duty`
--
ALTER TABLE `staff_duty`
  ADD CONSTRAINT `staff_duty_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
