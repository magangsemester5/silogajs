-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2022 at 01:54 PM
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
-- Table structure for table `detail_permintaan_kabel`
--

CREATE TABLE `detail_permintaan_kabel` (
  `id_detail_permintaan_kabel` int(12) UNSIGNED NOT NULL,
  `id_permintaan` int(12) UNSIGNED NOT NULL,
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_permintaan_material`
--

CREATE TABLE `detail_permintaan_material` (
  `id_detail_permintaan_material` int(12) UNSIGNED NOT NULL,
  `id_permintaan` int(12) UNSIGNED NOT NULL,
  `id_material` int(12) UNSIGNED NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kabel`
--

CREATE TABLE `kabel` (
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `id_kategori` int(12) UNSIGNED NOT NULL,
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
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `id_satuan` int(12) UNSIGNED NOT NULL,
  `id` int(12) UNSIGNED NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `panjang` varchar(50) NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kabel_masuk`
--

CREATE TABLE `kabel_masuk` (
  `id_kabel_masuk` int(12) UNSIGNED NOT NULL,
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_delivery_order` varchar(50) NOT NULL,
  `no_hasbell` int(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `panjang` int(50) NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(12) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(12) UNSIGNED NOT NULL,
  `id_kategori` int(12) UNSIGNED NOT NULL,
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
  `id_material` int(12) UNSIGNED NOT NULL,
  `id_satuan` int(12) UNSIGNED NOT NULL,
  `id` int(12) UNSIGNED NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_keluar` int(50) NOT NULL,
  `foto_penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material_masuk`
--

CREATE TABLE `material_masuk` (
  `id_material_masuk` int(12) UNSIGNED NOT NULL,
  `id_material` int(12) UNSIGNED NOT NULL,
  `id_satuan` int(12) UNSIGNED NOT NULL,
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
(438, '2022-08-24-091640', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1664524350, 1),
(439, '2022-08-24-095332', 'App\\Database\\Migrations\\Satuan', 'default', 'App', 1664524350, 1),
(440, '2022-09-06-022817', 'App\\Database\\Migrations\\User', 'default', 'App', 1664524350, 1),
(441, '2022-09-30-024748', 'App\\Database\\Migrations\\Material', 'default', 'App', 1664524350, 1),
(442, '2022-09-30-025259', 'App\\Database\\Migrations\\Kabel', 'default', 'App', 1664524350, 1),
(443, '2022-09-30-030853', 'App\\Database\\Migrations\\KabelMasuk', 'default', 'App', 1664524350, 1),
(444, '2022-09-30-031451', 'App\\Database\\Migrations\\KabelKeluar', 'default', 'App', 1664524350, 1),
(445, '2022-09-30-073133', 'App\\Database\\Migrations\\Permintaan', 'default', 'App', 1664524351, 1),
(446, '2022-09-30-073325', 'App\\Database\\Migrations\\MaterialMasuk', 'default', 'App', 1664524351, 1),
(447, '2022-09-30-073614', 'App\\Database\\Migrations\\MaterialKeluar', 'default', 'App', 1664524351, 1),
(448, '2022-09-30-074402', 'App\\Database\\Migrations\\DetailPermintaanKabel', 'default', 'App', 1664524351, 1),
(449, '2022-09-30-074637', 'App\\Database\\Migrations\\DetailPermintaanMaterial', 'default', 'App', 1664524351, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(12) UNSIGNED NOT NULL,
  `id_material` int(12) UNSIGNED NOT NULL,
  `id_kabel` int(12) UNSIGNED NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `jumlah_permintaan` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
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
  `password` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `jabatan`, `id_user`, `kriteria`, `foto_user`, `wilayah`) VALUES
(1, 'Nur Muhammad Yahya', '123', ' Admin Wilayah', 'AWM001', 'Admin Wilayah', 'Nur.jpg', 'Medan'),
(2, 'Ahmad Kholis Rahman', '123', 'Admin Wilayah', 'AWPG001', 'Admin Wilayah', 'ahmad.jpg', 'Padang'),
(3, 'Rahmat Setiawan', '123', 'Admin Wilayah', 'AWJ001', 'Admin Wilayah', 'rahmat.jpg', 'Jawa Barat'),
(4, 'Rizka Rahmani', '123', 'Admin Wilayah', 'AWY001', 'Admin Wilayah', 'rizka.jpg', 'Yogyakarta'),
(5, 'Siska Julia Sari', '123', 'Admin Wilayah', 'AWPN001', 'Admin Wilayah', 'siska.jpg', 'Pasuruan'),
(6, 'Abdul Rahman', '123', 'RPM ', 'RPMM001', 'RPM', 'abdul.jpg', 'Medan'),
(7, 'Abdul Rifai Natanegara', '123', 'RPM ', 'RPMPG001', 'RPM', 'rifai.jpg', 'Padang'),
(8, 'Achmad Kalla', '123', 'RPM', 'RPMJ001', 'RPM', 'achmad.jpg', 'Jakarta'),
(9, 'Ade Tjakralaksana', '123', 'RPM ', 'RPMJBG001', 'RPM', 'ade.jpg', 'Jawa Barat'),
(10, 'Adi Sumito', '123', 'RPM', 'RPMY001', '123', 'adi.jpg', 'Yogyakarta'),
(11, 'Adriana Maya Politon', '123', 'RPM', 'RPMPN001', 'RPM', 'adriana.jpg', 'Pasuruan'),
(12, 'Akbar Yoso Trisedia', '123', 'Admin Wilayah', 'AWS001', 'Admin Wilayah', 'akbar.jpg', 'Sulawesi'),
(13, 'Alexandra Miksar', '123', 'RPM ', 'RPMS001', 'RPM', 'alexandra.jpg', 'Sulawesi'),
(14, 'Muhammad Hanif Arafi', '123', 'Admin Pusat', 'AP001', 'Admin Pusat', 'hanif.jpg', 'Jakarta'),
(15, 'Lisa Aviana Sulistyanto', '123', 'PM', 'PM001', 'PM', 'lisa.jpg', 'Jakarta'),
(16, 'Roro Widya Adi Kusuma', '123', 'Direktur', 'D001', 'Direktur', 'roro.jpg', 'Jakarta'),
(17, 'Alexandro Gabriel Pratama Pangaribuan', '123', 'Management', 'M001', 'Management', 'alexandro.jpg', 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  ADD PRIMARY KEY (`id_detail_permintaan_kabel`),
  ADD KEY `detail_permintaan_kabel_id_permintaan_foreign` (`id_permintaan`),
  ADD KEY `detail_permintaan_kabel_id_kabel_foreign` (`id_kabel`);

--
-- Indexes for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD PRIMARY KEY (`id_detail_permintaan_material`),
  ADD KEY `detail_permintaan_material_id_permintaan_foreign` (`id_permintaan`),
  ADD KEY `detail_permintaan_material_id_material_foreign` (`id_material`);

--
-- Indexes for table `kabel`
--
ALTER TABLE `kabel`
  ADD PRIMARY KEY (`id_kabel`),
  ADD KEY `kabel_id_kategori_foreign` (`id_kategori`),
  ADD KEY `kabel_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `kabel_keluar`
--
ALTER TABLE `kabel_keluar`
  ADD PRIMARY KEY (`id_kabel_keluar`),
  ADD KEY `kabel_keluar_id_kabel_foreign` (`id_kabel`),
  ADD KEY `kabel_keluar_id_satuan_foreign` (`id_satuan`),
  ADD KEY `kabel_keluar_id_foreign` (`id`);

--
-- Indexes for table `kabel_masuk`
--
ALTER TABLE `kabel_masuk`
  ADD PRIMARY KEY (`id_kabel_masuk`),
  ADD KEY `kabel_masuk_id_kabel_foreign` (`id_kabel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `material_id_kategori_foreign` (`id_kategori`),
  ADD KEY `material_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD PRIMARY KEY (`id_material_keluar`),
  ADD KEY `material_keluar_id_material_foreign` (`id_material`),
  ADD KEY `material_keluar_id_satuan_foreign` (`id_satuan`),
  ADD KEY `material_keluar_id_foreign` (`id`);

--
-- Indexes for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD PRIMARY KEY (`id_material_masuk`),
  ADD KEY `material_masuk_id_material_foreign` (`id_material`),
  ADD KEY `material_masuk_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `permintaan_id_material_foreign` (`id_material`),
  ADD KEY `permintaan_id_kabel_foreign` (`id_kabel`);

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
-- AUTO_INCREMENT for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  MODIFY `id_detail_permintaan_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  MODIFY `id_detail_permintaan_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabel`
--
ALTER TABLE `kabel`
  MODIFY `id_kabel` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabel_keluar`
--
ALTER TABLE `kabel_keluar`
  MODIFY `id_kabel_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabel_masuk`
--
ALTER TABLE `kabel_masuk`
  MODIFY `id_kabel_masuk` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_keluar`
--
ALTER TABLE `material_keluar`
  MODIFY `id_material_keluar` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_masuk`
--
ALTER TABLE `material_masuk`
  MODIFY `id_material_masuk` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_permintaan_kabel`
--
ALTER TABLE `detail_permintaan_kabel`
  ADD CONSTRAINT `detail_permintaan_kabel_id_kabel_foreign` FOREIGN KEY (`id_kabel`) REFERENCES `kabel` (`id_kabel`),
  ADD CONSTRAINT `detail_permintaan_kabel_id_permintaan_foreign` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id_permintaan`);

--
-- Constraints for table `detail_permintaan_material`
--
ALTER TABLE `detail_permintaan_material`
  ADD CONSTRAINT `detail_permintaan_material_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `detail_permintaan_material_id_permintaan_foreign` FOREIGN KEY (`id_permintaan`) REFERENCES `permintaan` (`id_permintaan`);

--
-- Constraints for table `kabel`
--
ALTER TABLE `kabel`
  ADD CONSTRAINT `kabel_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `kabel_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `kabel_keluar`
--
ALTER TABLE `kabel_keluar`
  ADD CONSTRAINT `kabel_keluar_id_foreign` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kabel_keluar_id_kabel_foreign` FOREIGN KEY (`id_kabel`) REFERENCES `kabel` (`id_kabel`),
  ADD CONSTRAINT `kabel_keluar_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `kabel_masuk`
--
ALTER TABLE `kabel_masuk`
  ADD CONSTRAINT `kabel_masuk_id_kabel_foreign` FOREIGN KEY (`id_kabel`) REFERENCES `kabel` (`id_kabel`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `material_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `material_keluar`
--
ALTER TABLE `material_keluar`
  ADD CONSTRAINT `material_keluar_id_foreign` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `material_keluar_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `material_keluar_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `material_masuk`
--
ALTER TABLE `material_masuk`
  ADD CONSTRAINT `material_masuk_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`),
  ADD CONSTRAINT `material_masuk_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_id_kabel_foreign` FOREIGN KEY (`id_kabel`) REFERENCES `kabel` (`id_kabel`),
  ADD CONSTRAINT `permintaan_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
