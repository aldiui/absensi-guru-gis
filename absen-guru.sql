-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2023 at 05:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen-guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int UNSIGNED NOT NULL,
  `from_email` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `recipients` text NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `protocol` varchar(255) NOT NULL,
  `mail_path` varchar(255) NOT NULL,
  `smtp_host` varchar(255) NOT NULL,
  `smtp_user` varchar(255) NOT NULL,
  `smtp_pass` varchar(255) NOT NULL,
  `smtp_port` int UNSIGNED NOT NULL,
  `smtp_timeout` int UNSIGNED NOT NULL,
  `smtp_keep_alive` tinyint(1) NOT NULL,
  `smtp_crypto` varchar(255) NOT NULL,
  `word_wrap` tinyint(1) NOT NULL,
  `wrap_chars` int UNSIGNED NOT NULL,
  `mail_type` varchar(255) NOT NULL,
  `charset` varchar(255) NOT NULL,
  `validate` tinyint(1) NOT NULL,
  `priority` int UNSIGNED NOT NULL,
  `crlf` varchar(255) NOT NULL,
  `newline` varchar(255) NOT NULL,
  `bcc_batch_mode` tinyint(1) NOT NULL,
  `bcc_batch_size` int UNSIGNED NOT NULL,
  `dsn` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `from_email`, `from_name`, `recipients`, `user_agent`, `protocol`, `mail_path`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_timeout`, `smtp_keep_alive`, `smtp_crypto`, `word_wrap`, `wrap_chars`, `mail_type`, `charset`, `validate`, `priority`, `crlf`, `newline`, `bcc_batch_mode`, `bcc_batch_size`, `dsn`, `created_at`, `updated_at`) VALUES
(1, 'admin@digichainlabs.com', 'digichainlabs', '', 'CodeIgniter', 'smtp', '/usr/sbin/sendmail', 'smtp.googlemail.com', 'bismikaaldi@gmail.com', 'ldldnypaaiqwoqiw', 465, 5, 0, 'ssl', 1, 76, 'html', 'UTF-8', 0, 3, '', '', 0, 200, 0, '2023-06-23 23:22:51', '2023-06-23 23:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int UNSIGNED NOT NULL,
  `akronim` varchar(255) NOT NULL,
  `name_jabatan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `akronim`, `name_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'GTY', 'Guru Tetap Yayasan', '2023-03-30 00:58:10', '2023-04-17 09:13:36'),
(2, 'GTTY', 'Guru Tidak Tetap Yayasan', '2023-03-30 01:04:55', '2023-03-30 01:11:01'),
(3, 'OS', 'Operator Sekolah', '2023-03-30 02:38:52', '2023-04-09 20:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `jam_mengajar` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `status_backup` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `user_id`, `hari`, `jam_masuk`, `jam_keluar`, `jam_mengajar`, `status`, `status_backup`, `created_at`, `updated_at`) VALUES
(25, 2, 'Sun', '22:05:00', '22:05:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(26, 2, 'Mon', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(27, 2, 'Tue', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(28, 2, 'Wed', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(29, 2, 'Thu', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(30, 2, 'Fri', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(31, 2, 'Sat', '00:00:00', '00:00:00', 2, 1, 1, '2023-04-17 18:18:11', '2023-07-17 22:05:40'),
(32, 3, 'Sun', '22:05:00', '22:05:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(33, 3, 'Mon', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(34, 3, 'Tue', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(35, 3, 'Wed', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(36, 3, 'Thu', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(37, 3, 'Fri', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40'),
(38, 3, 'Sat', '00:00:00', '00:00:00', 2, 1, 1, '2023-07-17 22:05:22', '2023-07-17 22:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(55, '2023-07-15-103234', 'App\\Database\\Migrations\\Users', 'default', 'App', 1689553333, 1),
(56, '2023-07-15-105137', 'App\\Database\\Migrations\\Jabatan', 'default', 'App', 1689553333, 1),
(57, '2023-07-15-105619', 'App\\Database\\Migrations\\Jadwal', 'default', 'App', 1689553333, 1),
(58, '2023-07-15-111303', 'App\\Database\\Migrations\\Presents', 'default', 'App', 1689553333, 1),
(59, '2023-07-15-111939', 'App\\Database\\Migrations\\Tokens', 'default', 'App', 1689553333, 1),
(60, '2023-07-15-111949', 'App\\Database\\Migrations\\Unables', 'default', 'App', 1689553333, 1),
(61, '2023-07-15-111958', 'App\\Database\\Migrations\\Settings', 'default', 'App', 1689553333, 1),
(62, '2023-07-15-112010', 'App\\Database\\Migrations\\Penggajian', 'default', 'App', 1689553333, 1),
(63, '2023-07-15-120036', 'App\\Database\\Migrations\\Email', 'default', 'App', 1689553333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `bulan` int NOT NULL,
  `tahun` int NOT NULL,
  `total_jam` int NOT NULL,
  `total_absensi` int NOT NULL,
  `gaji` int NOT NULL,
  `gaji_pokok` int NOT NULL,
  `tunjangan` int NOT NULL,
  `lain_lain` int NOT NULL,
  `total` int NOT NULL,
  `admin_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `user_id`, `bulan`, `tahun`, `total_jam`, `total_absensi`, `gaji`, `gaji_pokok`, `tunjangan`, `lain_lain`, `total`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 2, 7, 2023, 0, 0, 15000, 12000, 2000000, 1000, 2013000, 1, '2023-07-17 17:23:45', '2023-07-17 22:15:07'),
(4, 3, 7, 2023, 0, 0, 15000, 100000, 200000, 100000, 400000, 1, '2023-07-17 22:06:05', '2023-07-17 22:11:02'),
(5, 2, 4, 2023, 10, 5, 15000, 150000, 2000, 100000, 252000, 1, '2023-07-17 23:56:19', '2023-07-17 23:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `presents`
--

CREATE TABLE `presents` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `hour_in` time NOT NULL,
  `hour_out` time NOT NULL,
  `image_in` varchar(255) NOT NULL,
  `image_out` varchar(255) NOT NULL,
  `location_in` varchar(255) NOT NULL,
  `location_out` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `presents`
--

INSERT INTO `presents` (`id`, `user_id`, `date`, `hour_in`, `hour_out`, `image_in`, `image_out`, `location_in`, `location_out`, `created_at`, `updated_at`) VALUES
(11, 2, '2023-04-03', '11:39:07', '11:39:39', '642a586bc879b.jpeg', '642a588b58e1c.jpeg', '-6.9173248, 107.610112', '-6.9173248, 107.610112', '2023-04-03 11:39:07', '2023-04-03 11:39:39'),
(12, 2, '2023-04-04', '08:36:08', '15:36:33', '642b46c81392a.jpeg', '642b46e1a5ab1.jpeg', '-6.9173248, 107.610112', '-6.9173248, 107.610112', '2023-04-04 04:36:08', '2023-04-04 04:36:33'),
(13, 2, '2023-04-08', '22:15:03', '22:15:29', '643033770aa8b.jpeg', '643033910647d.jpeg', '-6.9173248, 107.610112', '-6.9173248, 107.610112', '2023-04-07 22:15:03', '2023-04-07 22:15:29'),
(19, 2, '2023-04-17', '07:00:00', '00:00:00', '6433ded35c402.jpeg', '643033910647d.jpeg', '-6.9173248, 107.610112', '', '2023-04-10 17:02:59', '2023-04-10 17:03:30'),
(23, 2, '2023-04-18', '15:08:03', '15:08:36', '643033910647d.jpeg', '643e500444cb1.jpeg', '-7.328047, 108.226943', '-7.328047, 108.226943', '2023-04-18 15:08:03', '2023-04-18 15:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int UNSIGNED NOT NULL,
  `name_kantor` varchar(255) NOT NULL,
  `name_aplikasi` varchar(255) NOT NULL,
  `logo_kantor` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `radius` varchar(255) NOT NULL,
  `sebelum_masuk` int NOT NULL,
  `sebelum_pulang` int NOT NULL,
  `setelah_pulang` int NOT NULL,
  `gaji` int NOT NULL,
  `name_ttd` varchar(255) NOT NULL,
  `jabatan_ttd` varchar(255) NOT NULL,
  `image_ttd` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name_kantor`, `name_aplikasi`, `logo_kantor`, `address`, `long`, `lat`, `radius`, `sebelum_masuk`, `sebelum_pulang`, `setelah_pulang`, `gaji`, `name_ttd`, `jabatan_ttd`, `image_ttd`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Pondok Pesantren Darul Muta\'allimin', 'E-Staff Daarul', 'logo.jpg', 'Jln. Bantarsari, Desa Lewosari, Kec. Bungursari, Kota Tasikmalaya, Jawa Barat 46151', '106.8345', '-6.2329', '70', 15, 15, 15, 15000, 'Pak Unknown', 'Kepala Pondok Pesantren', 'ttd.jpg', 'file:///C://Users/User/Desktop/portofolio/absensi-guru/public/assets/img/', '2023-04-01 00:00:00', '2023-05-11 17:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `unables`
--

CREATE TABLE `unables` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `status` enum('Izin','Sakit') NOT NULL,
  `image` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `persetujuan` tinyint(1) NOT NULL DEFAULT '0',
  `admin_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `unables`
--

INSERT INTO `unables` (`id`, `user_id`, `date`, `status`, `image`, `keterangan`, `persetujuan`, `admin_id`, `created_at`, `updated_at`) VALUES
(6, 2, '2023-04-21', 'Sakit', '1682094100_3fe87119dba6483e58be.jpg', 'kasakasjkasjd', 1, 0, '2023-04-19 13:10:45', '2023-04-25 10:03:45'),
(7, 2, '2023-05-02', 'Izin', '1683012438_07bbf59555d627178723.png', 'Lagi main main', 1, 1, '2023-05-02 14:27:06', '2023-05-10 18:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan_id` int NOT NULL,
  `role` enum('Guru','Operator') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `alamat`, `jabatan_id`, `role`, `is_active`, `password`, `salt`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Aldi Jaya Mulyana', 'aldikakabow28@gmail.com', '087826753532', 'Kp Singabarong RT 01 RW 02 Desa Bojonggaok', 3, 'Operator', 1, 'd52234ed5118a1e24e64cf22e6b667951933c5079ebe32ebd2503820e9b90898', 'tM3Z98U0ujFtjjtaR9GP5g==', '1681782832_7fc77fc2df8784f44196.jpg', '2023-04-01 09:15:35', '2023-07-17 23:27:08'),
(2, 'Aldiui', 'aldijaya280902@gmail.com', '087826753532', 'Kp Singabarong RT 01 RW 02 Desa Bojonggaok Kecamatan Jamanis', 1, 'Guru', 1, '376d929d12dcd75a14d3b5c19dc090bb287299eff61df5d963112e11885a5a9d', 'PhvalNsH6QetcownGsx+IQ==', '1681786176_dc4310e3764ffdb82c4c.jpeg', '2023-04-11 09:51:43', '2023-04-20 21:21:17'),
(3, 'maman', 'ucup@gmail.com', '087826753532', 'werfwrwr', 1, 'Guru', 1, 'e0dd16c1c131883404ef2ec243de36b55d7ff8d62d91249c04793e3c825c89ac', 'db7QLvh26S/oxNubMAXOug==', 'default.jpg', '2023-07-17 22:04:39', '2023-07-17 22:05:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unables`
--
ALTER TABLE `unables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `presents`
--
ALTER TABLE `presents`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unables`
--
ALTER TABLE `unables`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
