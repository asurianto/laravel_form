-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2018 at 09:27 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '2018-06-19 04:05:02', '2018-06-19 03:28:06'),
(2, '2.jpg', '2018-06-19 04:05:12', '2018-06-19 03:28:06'),
(3, '3.jpg', '2018-06-19 04:05:18', '2018-06-19 03:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `form_dana`
--

CREATE TABLE `form_dana` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `area` varchar(65) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `bank` varchar(65) NOT NULL,
  `dana` int(11) NOT NULL,
  `terbilang` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `cicilan` int(11) NOT NULL,
  `tanggal_dana` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_dana`
--

INSERT INTO `form_dana` (`id`, `user_id`, `name`, `nip`, `area`, `rekening`, `bank`, `dana`, `terbilang`, `keperluan`, `cicilan`, `tanggal_dana`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Form 1', '123456789', 'XAXAXAXAXA', '5271246578', 'BCA', 10000000, 'Sepuluh Juta Rupiah', 'Dana kebutuhan', 6, '2018-04-11', 1, '2018-04-27 07:15:38', '0000-00-00 00:00:00'),
(2, 1, 'Form 121212', '132456789', 'qheuuiqheuiqhewui', '132456789', 'BCA', 132456789, 'Uang somtehing', 'keprluan dadakan', 6, '2018-03-20', 1, '2018-06-16 16:48:02', '2018-04-23 18:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `form_pengunduran_diri`
--

CREATE TABLE `form_pengunduran_diri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `alasan` varchar(99) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pengunduran_diri`
--

INSERT INTO `form_pengunduran_diri` (`id`, `user_id`, `name`, `alamat`, `alasan`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASDFGGGGG', 'ALAMAT SAYA', 'iwqopeiqpeipqwe', '2018-06-01 06:03:19', '2018-06-01 06:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(300) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `receiver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sudah di transfer sebesar XXXXX', '2018-05-08 08:43:22', '2018-05-08 08:43:22'),
(5, 1, 'ASDASDASDAS', '2018-05-09 02:21:00', '2018-05-09 02:21:00'),
(8, 1, 'XAXAXAXAAXAAAAAAA', '2018-05-09 02:47:19', '2018-05-09 02:47:19'),
(10, 1, 'DDDDDDD', '2018-05-09 02:49:32', '2018-05-09 02:49:32'),
(11, 1, 'AFAFAFAFAAFA', '2018-05-09 02:49:36', '2018-05-09 02:49:36'),
(12, 1, 'Pengajuan peminjaman ada sudah di setujui, dana akan di trf pada tgl: 2018-08-16', '2018-06-16 16:48:02', '2018-06-16 16:48:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_10_030110_create_roles_table', 1),
(4, '2018_04_10_061749_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2018-05-09 00:00:00', '2018-05-09 09:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'An User', '2018-04-09 23:35:32', '2018-04-09 23:35:32'),
(2, 'admin', 'An admin user', '2018-04-09 23:35:32', '2018-04-09 23:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dop` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_home` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `area`, `rekening`, `bank`, `campus`, `dop`, `dob`, `address`, `post_code`, `phone_home`, `phone`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User Name', '1601217123', '', '', '', '', '', '0000-00-00', '', '', '', '', 'user@mail.com', '$2y$10$TOxZnCjtPzJa/kRxEZkDbOCfHMqTcbg3.6oviKWe50aW8j1ScrrZC', 1, 'CXtfaoiwY9CkBTQhnBBjK3P5kd6ijHDgipc1gUDZZtDROWUIwaIfd82aySm0', '2018-04-09 23:35:32', '2018-04-09 23:35:32'),
(2, 'Admin Name', '123123123', '', '', '', '', '', '0000-00-00', '', '', '', '', 'admin@mail.com', '$2y$10$FBnHZkW9oFRnZeWevYV7neeDj80qUn.oB.QhN0CGUhugws5YcBd2W', 1, 'FGzZRiIPwCVdlq3p1YdbwJ3r5shuoYBmnTLmHw1vft0A0A6dzINGGEi8Clyw', '2018-04-09 23:35:32', '2018-04-09 23:35:32'),
(4, 'username2', '1234567890', 'Jakartawqeowqeuo', '23127918721', 'BCAAA', 'KAMPUS BUNGA', 'Jakarta', '1990-09-16', 'ASNDKLJADJLAD', '1200', '021 890182801', '08123732737', 'user2@mail.com', '$2y$10$0KB.pWVHw5w.i8vX8nGyyu/GcaSPIelL7eLMw9iXctY0gDED5GLKO', 1, 'fEXhbohx0Vv8TeC1i3Z5d9FRJ2VVsKk5QF07rNG06c43GodioHiFidP0NvAJ', '2018-05-06 00:19:54', '2018-05-06 00:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_dana`
--
ALTER TABLE `form_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_pengunduran_diri`
--
ALTER TABLE `form_pengunduran_diri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form_dana`
--
ALTER TABLE `form_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `form_pengunduran_diri`
--
ALTER TABLE `form_pengunduran_diri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_pengunduran_diri`
--
ALTER TABLE `form_pengunduran_diri`
  ADD CONSTRAINT `form_pengunduran_diri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
