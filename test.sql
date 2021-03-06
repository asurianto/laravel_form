-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 01:56 AM
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
(3, '9JNjxgFr6QXeDCnnZN5PXIUp5pf40EqTW4uR3JlB.jpeg', '2018-08-19 04:36:39', '2018-08-18 21:36:39'),
(5, 'SX9vrVE9G0KEAJIR6apsqskkKQuUr738BL9vRTJo.jpeg', '2018-08-18 20:36:44', '2018-08-18 20:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `form_dana`
--

CREATE TABLE `form_dana` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_peminjaman_id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `area` varchar(65) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `bank` varchar(65) NOT NULL,
  `dana` int(11) NOT NULL,
  `dana_potongan` int(11) NOT NULL,
  `terbilang` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `cicilan` int(11) NOT NULL,
  `cicilan_potongan` int(11) NOT NULL,
  `tanggal_dana` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_dana`
--

INSERT INTO `form_dana` (`id`, `user_id`, `type_peminjaman_id`, `name`, `nip`, `area`, `rekening`, `bank`, `dana`, `dana_potongan`, `terbilang`, `keperluan`, `cicilan`, `cicilan_potongan`, `tanggal_dana`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Form 1', '123456789', 'XAXAXAXAXA', '5271246578', 'BCA', 10000000, 0, 'Sepuluh Juta Rupiah', 'Dana kebutuhan', 12, 0, '2018-04-11', 1, '2018-08-09 07:57:00', '0000-00-00 00:00:00'),
(2, 1, 1, 'Form 121212', '132456789', 'qheuuiqheuiqhewui', '132456789', 'BCA', 10000000, 10000000, 'Uang somtehing', 'keprluan dadakan', 9, 9, '2018-03-20', 0, '2018-08-09 07:57:02', '2018-04-23 18:20:55'),
(4, 1, 2, 'ASDJKHDKJ', '165465464', 'wqehiuqhewuiqweu', '45645645646', 'qwewqeq', 120000, 120000, 'ASDJIUADHIDHA', 'qweqnuwiehqbiewbiu', 12, 12, '2018-09-30', 1, '2018-08-09 08:57:12', '2018-08-09 01:41:16');

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
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_pengunduran_diri`
--

INSERT INTO `form_pengunduran_diri` (`id`, `user_id`, `name`, `alamat`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ASDFGGGGG', 'ALAMAT SAYA', 'iwqopeiqpeipqwe', 1, '2018-07-02 06:06:09', '2018-06-01 06:03:19');

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
(12, 1, 'Pengajuan peminjaman ada sudah di setujui, dana akan di trf pada tgl: 2018-08-16', '2018-06-16 16:48:02', '2018-06-16 16:48:02'),
(13, 1, 'Pengajuan pengunduran diri sudah di setujui', '2018-07-02 05:48:08', '2018-07-02 05:48:08'),
(14, 1, 'Pengajuan pengunduran diri sudah di setujui', '2018-07-02 06:01:30', '2018-07-02 06:01:30'),
(15, 1, 'Pengajuan pengunduran diri sudah di setujui', '2018-07-02 06:06:09', '2018-07-02 06:06:09'),
(16, 1, 'Pengajuan peminjaman dana sudah di setujui, dana akan di trf pada tgl: 1994-03-20', '2018-08-02 13:58:45', '2018-08-02 13:58:45');

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
(3, 1, 4),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dana` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id`, `user_id`, `dana`, `created_at`, `updated_at`) VALUES
(1, 1, 300000, '2018-08-14 00:55:23', '2018-08-14 05:58:13'),
(2, 4, 100000, '2018-08-14 04:03:27', '2018-08-14 05:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `type_peminjaman`
--

CREATE TABLE `type_peminjaman` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `limit_peminjaman` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_peminjaman`
--

INSERT INTO `type_peminjaman` (`id`, `name`, `limit_peminjaman`, `created_at`, `updated_at`) VALUES
(1, 'regular', 5000000, '2018-07-28 08:19:02', '2018-07-28 08:19:02'),
(2, 'barang', 3000000, '2018-07-28 08:19:02', '2018-07-28 08:19:02'),
(3, 'sembako', 5000000, '2018-07-28 08:19:12', '2018-07-28 08:19:12');

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
(1, 'User Name', '2001617123', '', '', '', '', '', '0000-00-00', '', '', '', '', 'user@mail.com', '$2y$10$TOxZnCjtPzJa/kRxEZkDbOCfHMqTcbg3.6oviKWe50aW8j1ScrrZC', 1, 'e7d3IQS9gyQKX6wtJYkunTcnWansJitElfTEkMOctcCG1ZglaPXAyiTCfTPs', '2018-04-09 23:35:32', '2018-04-09 23:35:32'),
(2, 'Admin Name', '123123123', '', '', '', '', '', '0000-00-00', '', '', '', '', 'admin@mail.com', '$2y$10$FBnHZkW9oFRnZeWevYV7neeDj80qUn.oB.QhN0CGUhugws5YcBd2W', 1, 's9wC6vtAlfUer2NYowybDwU1h5fikWeQSoKsyGd5KC5koq70byGFKAH0kYSg', '2018-04-09 23:35:32', '2018-04-09 23:35:32'),
(4, 'username2', '1234567890', 'Jakartawqeowqeuo', '23127918721', 'BCAAA', 'KAMPUS BUNGA', 'Jakarta', '1990-09-16', 'ASNDKLJADJLAD', '1200', '021 890182801', '08123732737', 'user2@mail.com', '$2y$10$0KB.pWVHw5w.i8vX8nGyyu/GcaSPIelL7eLMw9iXctY0gDED5GLKO', 1, 'PF80etns4bWEETqJvsOzBfDRlkMHZCzuezH7qGWxdsvtaY85d9CwKjtdZLa8', '2018-05-06 00:19:54', '2018-05-06 00:19:54'),
(5, 'Anthony', '1601217146', 'Haji Yahya no 9', 'Anthony Surianto', 'BCA', 'Jakarta', '13340', '1994-08-16', 'Haji Yahya no 9', '13340', '81385508933', '081385508933', 'anthony.surianto@gmail.com', '$2y$10$VT64pUiLdQbAjTbHBblMT.zcpTDEMLfUdB2rB3stYKGXixicc//Cu', 1, NULL, '2018-07-03 20:25:55', '2018-07-03 20:25:55');

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
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_peminjaman`
--
ALTER TABLE `type_peminjaman`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `form_dana`
--
ALTER TABLE `form_dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `form_pengunduran_diri`
--
ALTER TABLE `form_pengunduran_diri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `type_peminjaman`
--
ALTER TABLE `type_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
