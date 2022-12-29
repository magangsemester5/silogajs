-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2022 at 03:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistikptajs`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kabel_keluar`
--

CREATE TABLE `detail_kabel_keluar` (
  `id_detail_kabel_keluar` int(12) UNSIGNED NOT NULL,
  `id_kabel_keluar` int(12) UNSIGNED NOT NULL,
  `no_drum` varchar(50) NOT NULL,
  `core` int(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `panjang` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_material_keluar`
--

CREATE TABLE `detail_material_keluar` (
  `id_detail_material_keluar` int(12) UNSIGNED NOT NULL,
  `id_material_keluar` int(12) UNSIGNED NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `jumlah` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_kabel`
--

CREATE TABLE `detail_permintaan_kabel` (
  `id_detail_permintaan_kabel` int(12) UNSIGNED NOT NULL,
  `id_permintaan_kabel` int(12) UNSIGNED NOT NULL,
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `panjang` int(12) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_material`
--

CREATE TABLE `detail_permintaan_material` (
  `id_detail_permintaan_material` int(12) UNSIGNED NOT NULL,
  `id_permintaan_material` int(12) UNSIGNED NOT NULL,
  `id_material` int(12) UNSIGNED NOT NULL,
  `jumlah` int(12) NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history_permintaan_kabel`
--

CREATE TABLE `history_permintaan_kabel` (
  `id_history_permintaan_kabel` int(12) UNSIGNED NOT NULL,
  `req_id` int(12) NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `no_drum` varchar(50) NOT NULL,
  `core` varchar(50) NOT NULL,
  `panjang` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history_permintaan_material`
--

CREATE TABLE `history_permintaan_material` (
  `id_history_permintaan_material` int(12) UNSIGNED NOT NULL,
  `req_id` int(12) NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kabel`
--

CREATE TABLE `kabel` (
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `id_satuan` int(12) UNSIGNED NOT NULL,
  `no_drum` varchar(50) NOT NULL,
  `core` int(50) NOT NULL,
  `panjang` int(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `foto_serial_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kabel_keluar`
--

CREATE TABLE `kabel_keluar` (
  `id_kabel_keluar` int(12) UNSIGNED NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kabel_masuk`
--

CREATE TABLE `kabel_masuk` (
  `id_kabel_masuk` int(12) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL,
  `no_hasbell` varchar(50) NOT NULL,
  `core` int(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `panjang_masuk` int(50) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(12) UNSIGNED NOT NULL,
  `id_satuan` int(12) UNSIGNED NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `foto_serial_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_keluar`
--

CREATE TABLE `material_keluar` (
  `id_material_keluar` int(12) UNSIGNED NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_masuk`
--

CREATE TABLE `material_masuk` (
  `id_material_masuk` int(12) UNSIGNED NOT NULL,
  `nama_material` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL,
  `jumlah_masuk` int(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(326, '2022-08-24-095332', 'App\\Database\\Migrations\\Satuan', 'default', 'App', 1670575902, 1),
(327, '2022-09-06-022817', 'App\\Database\\Migrations\\User', 'default', 'App', 1670575902, 1),
(328, '2022-09-30-024748', 'App\\Database\\Migrations\\Material', 'default', 'App', 1670575902, 1),
(329, '2022-09-30-025259', 'App\\Database\\Migrations\\Kabel', 'default', 'App', 1670575902, 1),
(330, '2022-09-30-030853', 'App\\Database\\Migrations\\KabelMasuk', 'default', 'App', 1670575902, 1),
(331, '2022-09-30-073325', 'App\\Database\\Migrations\\MaterialMasuk', 'default', 'App', 1670575902, 1),
(332, '2022-10-03-114206', 'App\\Database\\Migrations\\PermintaanMaterial', 'default', 'App', 1670575902, 1),
(333, '2022-10-03-115524', 'App\\Database\\Migrations\\Permintaankabel', 'default', 'App', 1670575902, 1),
(334, '2022-10-03-120619', 'App\\Database\\Migrations\\DetailPermintaanMaterial', 'default', 'App', 1670575902, 1),
(335, '2022-10-03-120726', 'App\\Database\\Migrations\\DetailPermintaanKabel', 'default', 'App', 1670575902, 1),
(336, '2022-10-09-105536', 'App\\Database\\Migrations\\MaterialKeluar', 'default', 'App', 1670575902, 1),
(337, '2022-10-09-110006', 'App\\Database\\Migrations\\KabelKeluar', 'default', 'App', 1670575902, 1),
(338, '2022-10-28-093343', 'App\\Database\\Migrations\\DetailMaterialKeluar', 'default', 'App', 1670575902, 1),
(339, '2022-10-28-093351', 'App\\Database\\Migrations\\DetailKabelKeluar', 'default', 'App', 1670575902, 1),
(340, '2022-11-11-004531', 'App\\Database\\Migrations\\HistoryPermintaanKabel', 'default', 'App', 1670575902, 1),
(341, '2022-11-15-115643', 'App\\Database\\Migrations\\HistoryPermintaanMaterial', 'default', 'App', 1670575902, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_kabel`
--

CREATE TABLE `permintaan_kabel` (
  `id_permintaan_kabel` int(12) UNSIGNED NOT NULL,
  `id` int(12) UNSIGNED NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_material`
--

CREATE TABLE `permintaan_material` (
  `id_permintaan_material` int(12) UNSIGNED NOT NULL,
  `id` int(12) UNSIGNED NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(12) UNSIGNED NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `no_telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `jabatan`, `id_user`, `kriteria`, `foto_user`, `wilayah`, `no_telepon`) VALUES
(1, 'Nur Muhammad Yahya', 'yahya@gmail.com', '$2y$10$gi64AgQjNl/OvPU6UmYPJOgfWPOjmlCcjoy2QmwJXQqWJKOj6sGhm', 'Admin Wilayah', 'AWM001', 'Admin Wilayah', '1.jpeg', 'Medan', '082123298461'),
(2, 'Ahmad Kholis Rahman', 'ahmad@gmail.com', '$2y$10$7R7wgziP0rfpoMcEzdQo..lW5p16bvuV3y0ahG/rXy.DsfWks7rpe', 'Admin Wilayah', 'AWPG001', 'Admin Wilayah', '2.jpeg', 'Padang', '082123298462'),
(3, 'Rahmat Setiawan', 'rahmat@gmail.com', '$2y$10$KBClDKuonj93ZfhFa9dwgunkp1plLc21e5PKV8S8xVCSCz1rBQuLW', 'Admin Wilayah', 'AWJ001', 'Admin Wilayah', '3.jpeg', 'Jawa Barat', '082123298463'),
(4, 'Rizka Rahmani', 'rizka@gmail.com', '$2y$10$ezT8tfE9VGLEstUtPJaf4.24kp8KQOHwmq0KZRBryVAcm6kOCsrQq', 'Admin Wilayah', 'AWY001', 'Admin Wilayah', '4.jpeg', 'Yogyakarta', '082123298464'),
(5, 'Siska Julia Sari', 'siska@gmail.com', '$2y$10$09pplTwClk1UIecpiPCL7exp3L6GrcGRWPXAfbONpENQci95H16YG', 'Admin Wilayah', 'AWPN001', 'Admin Wilayah', '5.jpeg', 'Pasuruan', '082123298465'),
(6, 'Abdul Rahman', 'abdul@gmail.com', '$2y$10$ZcY8wP/FUkkLr8QEd0ut3OBXJ9M8CeDcaU/wmIjkPaFdwOALp8kn.', 'Rpm', 'RPMM001', 'Rpm', '6.jpeg', 'Medan', '082123298466'),
(7, 'Abdul Rifai Natanegara', 'abdul@gmail.com', '$2y$10$CI7FqhJBdgZntjvSz0jpXeHeexWSC4IKdlW09Cvj/nTSaEiAvRqPy', 'Rpm', 'RPMPG001', 'Rpm', '7.jpeg', 'Padang', '082123298467'),
(9, 'Ade Tjakralaksana', 'ade@gmail.com', '$2y$10$LjvYHF/siv/Q8zulxfeKEerFAzyQELl3Ui/Hx0YqcSglaEprmF2nO', 'Rpm', 'RPMJBG001', 'Rpm', '8.jpeg', 'Jawa Barat', '082123298468'),
(10, 'Adi Sumito', 'adi@gmail.com', '$2y$10$eCfivs5JXa3wV/VbvPQHWuw406AWsAA1mS3LwuL09Z6KJHe31C9li', 'Rpm', 'RPMY001', 'Rpm', '9.jpeg', 'Yogyakarta', '082123298469'),
(11, 'Adriana Maya Politon', 'adriana@gmail.com', '$2y$10$c43JNMDb90kQ1u4FJjBtIOs4lRNT408Di2chcVpYNs9laRfh39t7y', 'Rpm', 'RPMPN001', 'Rpm', '10.jpeg', 'Pasuruan', '0821232984610'),
(12, 'Akbar Yoso Trisedia', 'akbar@gmail.com', '$2y$10$PSy5qUPzQV2tfLGixy9R5.8YJnR/fngi/x4o0gVoY0J7OyMn8WWAK', 'Admin Wilayah', 'AWS001', 'Admin Wilayah', '11.jpeg', 'Sulawesi', '0821232984611'),
(13, 'Alexandra Miksar', 'alexandra@gmail.com', '$2y$10$D5U5WOR8KXREynnHj/VCTud5i1qmaHAXg4sRnbiWOs9tgM8Z22pXe', 'Rpm', 'RPMS001', 'Rpm', '12.jpeg', 'Sulawesi', '0821232984612'),
(15, 'Lisa Aviana Sulistyanto', 'lisa@gmail.com', '$2y$10$TmOnOt6R6bo4bOT2phleH.EGZR7luiW61ndSwEAHC1JK3JXrr2Mfq', 'PM', 'PM001', 'PM', '13.jpeg', 'Jakarta', '0821232984613'),
(16, 'Roro Widya Adi Kusuma', 'roro@gmail.com', '$2y$10$n4poZmrQfzL0MZl/yOv3dOeJWP2sKS2M2vatin8s1ddQ2UG/h1T3S', 'Direktur', 'D001', 'Direktur', '14.jpeg', 'Jakarta', '0821232984614'),
(17, 'Alexandro Gabriel Pratama Pangaribuan', 'alex@gmail.com', '$2y$10$CcJN.H771OhAREtfP0HxWOGqXXM73sNeY4pqvC2IuHrsYMwvAdNRu', 'Management', 'M001', 'Management', '15.jpeg', 'Jakarta', '0821232984615'),
(23, 'Muhammad Hanif Arafi', 'hanifarafi7@gmail.com', '$2y$10$kkvaabkXYcyvEdRce5xBuOaX3XRO1g3pjQxwLJT18tB9HQq/ChsqG', 'Admin Pusat', 'AP001', 'Admin Pusat', '1670579842_ba6ce808d6910d573098.jpg', 'Jakarta', '082123298461');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kabel_keluar`
--
ALTER TABLE `detail_kabel_keluar`
  ADD PRIMARY KEY (`id_detail_kabel_keluar`),
  ADD KEY `detail_kabel_keluar_id_kabel_keluar_foreign` (`id_kabel_keluar`);

--
-- Indexes for table `detail_material_keluar`
--
ALTER TABLE `detail_material_keluar`
  ADD PRIMARY KEY (`id_detail_material_keluar`),
  ADD KEY `detail_material_keluar_id_material_keluar_foreign` (`id_material_keluar`);

--
-- Indexes for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  ADD PRIMARY KEY (`id_detail_permintaan_kabel`),
  ADD KEY `detail_permintaan_kabel_id_permintaan_kabel_foreign` (`id_permintaan_kabel`),
  ADD KEY `detail_permintaan_kabel_id_kabel_foreign` (`id_kabel`);

--
-- Indexes for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD PRIMARY KEY (`id_detail_permintaan_material`),
  ADD KEY `detail_permintaan_material_id_permintaan_material_foreign` (`id_permintaan_material`),
  ADD KEY `detail_permintaan_material_id_material_foreign` (`id_material`);

--
-- Indexes for table `history_permintaan_kabel`
--
ALTER TABLE `history_permintaan_kabel`
  ADD PRIMARY KEY (`id_history_permintaan_kabel`);

--
-- Indexes for table `history_permintaan_material`
--
ALTER TABLE `history_permintaan_material`
  ADD PRIMARY KEY (`id_history_permintaan_material`);

--
-- Indexes for table `kabel`
--
ALTER TABLE `kabel`
  ADD PRIMARY KEY (`id_kabel`),
  ADD KEY `kabel_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `kabel_keluar`
--
ALTER TABLE `kabel_keluar`
  ADD PRIMARY KEY (`id_kabel_keluar`);

--
-- Indexes for table `kabel_masuk`
--
ALTER TABLE `kabel_masuk`
  ADD PRIMARY KEY (`id_kabel_masuk`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `material_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`id_material_keluar`);

--
-- Indexes for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD PRIMARY KEY (`id_material_masuk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan_kabel`
--
ALTER TABLE `permintaan_kabel`
  ADD PRIMARY KEY (`id_permintaan_kabel`),
  ADD KEY `permintaan_kabel_id_foreign` (`id`);

--
-- Indexes for table `permintaan_material`
--
ALTER TABLE `permintaan_material`
  ADD PRIMARY KEY (`id_permintaan_material`),
  ADD KEY `permintaan_material_id_foreign` (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kabel_keluar`
--
ALTER TABLE `detail_kabel_keluar`
  MODIFY `id_detail_kabel_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_material_keluar`
--
ALTER TABLE `detail_material_keluar`
  MODIFY `id_detail_material_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  MODIFY `id_detail_permintaan_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  MODIFY `id_detail_permintaan_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_permintaan_kabel`
--
ALTER TABLE `history_permintaan_kabel`
  MODIFY `id_history_permintaan_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `history_permintaan_material`
--
ALTER TABLE `history_permintaan_material`
  MODIFY `id_history_permintaan_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kabel`
--
ALTER TABLE `kabel`
  MODIFY `id_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabel_keluar`
--
ALTER TABLE `kabel_keluar`
  MODIFY `id_kabel_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabel_masuk`
--
ALTER TABLE `kabel_masuk`
  MODIFY `id_kabel_masuk` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `id_material_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material_masuk`
--
ALTER TABLE `material_masuk`
  MODIFY `id_material_masuk` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `permintaan_kabel`
--
ALTER TABLE `permintaan_kabel`
  MODIFY `id_permintaan_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permintaan_material`
--
ALTER TABLE `permintaan_material`
  MODIFY `id_permintaan_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kabel_keluar`
--
ALTER TABLE `detail_kabel_keluar`
  ADD CONSTRAINT `detail_kabel_keluar_id_kabel_keluar_foreign` FOREIGN KEY (`id_kabel_keluar`) REFERENCES `kabel_keluar` (`id_kabel_keluar`);

--
-- Constraints for table `detail_material_keluar`
--
ALTER TABLE `detail_material_keluar`
  ADD CONSTRAINT `detail_material_keluar_id_material_keluar_foreign` FOREIGN KEY (`id_material_keluar`) REFERENCES `material_keluar` (`id_material_keluar`);

--
-- Constraints for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  ADD CONSTRAINT `detail_permintaan_kabel_id_kabel_foreign` FOREIGN KEY (`id_kabel`) REFERENCES `kabel` (`id_kabel`),
  ADD CONSTRAINT `detail_permintaan_kabel_id_permintaan_kabel_foreign` FOREIGN KEY (`id_permintaan_kabel`) REFERENCES `permintaan_kabel` (`id_permintaan_kabel`);

--
-- Constraints for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD CONSTRAINT `detail_permintaan_material_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `detail_permintaan_material_id_permintaan_material_foreign` FOREIGN KEY (`id_permintaan_material`) REFERENCES `permintaan_material` (`id_permintaan_material`);

--
-- Constraints for table `kabel`
--
ALTER TABLE `kabel`
  ADD CONSTRAINT `kabel_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `permintaan_kabel`
--
ALTER TABLE `permintaan_kabel`
  ADD CONSTRAINT `permintaan_kabel_id_foreign` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `permintaan_material`
--
ALTER TABLE `permintaan_material`
  ADD CONSTRAINT `permintaan_material_id_foreign` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
