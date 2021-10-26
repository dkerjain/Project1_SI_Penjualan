-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 06:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_optik2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `id_kategori` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(20) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `foto_barang` varchar(50) DEFAULT NULL,
  `deskripsi_barang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_barang`, `stok_barang`, `foto_barang`, `deskripsi_barang`) VALUES
('B001', 'K001', 'Kacamata 1', 10000, 7, '/Foto_Barang/1634976162-logo_himasi.png', 'adwd'),
('B002', 'K002', 'Lensa 1', 150000, 14, '/Foto_Barang/1634974765-logo unair.png', 'ssvcs');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_barang` varchar(10) NOT NULL,
  `id_pemesanan` varchar(13) NOT NULL,
  `ukuran_lensa` varchar(10) DEFAULT NULL,
  `jenis_lensa` varchar(10) DEFAULT NULL,
  `merek_kacamata` varchar(20) DEFAULT NULL,
  `harga_kacamata` int(11) DEFAULT NULL,
  `jumlah_pemesanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_barang`, `id_pemesanan`, `ukuran_lensa`, `jenis_lensa`, `merek_kacamata`, `harga_kacamata`, `jumlah_pemesanan`) VALUES
('B001', 'PMN211026001', NULL, NULL, NULL, 10000, 1),
('B002', 'PMN211026001', '1', 'qwerty', NULL, 150000, 1);

--
-- Triggers `detail_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `update_stok_pemesanan` AFTER INSERT ON `detail_pemesanan` FOR EACH ROW UPDATE barang
SET stok_barang = stok_barang - NEW.jumlah_pemesanan
WHERE NEW.id_barang = id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_penjualan` varchar(8) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `sub_total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_barang`, `jumlah_pembelian`, `sub_total_harga`) VALUES
('21102601', 'B001', 2, 20000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `detail_penjualan` FOR EACH ROW UPDATE barang
SET stok_barang = stok_barang - NEW.jumlah_pembelian
WHERE NEW.id_barang = id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(12) NOT NULL,
  `nama_jabatan` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('J001', 'Admin'),
('J002', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `jenis_kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `jenis_kategori`) VALUES
('K001', 'Kacamata'),
('K002', 'Lensa');

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
(1, '2021_10_25_142511_create_barang_table', 0),
(2, '2021_10_25_142511_create_detail_pemesanan_table', 0),
(3, '2021_10_25_142511_create_detail_penjualan_table', 0),
(4, '2021_10_25_142511_create_jabatan_table', 0),
(5, '2021_10_25_142511_create_kategori_table', 0),
(6, '2021_10_25_142511_create_pegawai_table', 0),
(7, '2021_10_25_142511_create_pembayaran_table', 0),
(8, '2021_10_25_142511_create_pemeriksaan_table', 0),
(9, '2021_10_25_142511_create_pemesanan_table', 0),
(10, '2021_10_25_142511_create_penjualan_table', 0),
(11, '2021_10_25_142512_add_foreign_keys_to_barang_table', 0),
(12, '2021_10_25_142512_add_foreign_keys_to_detail_pemesanan_table', 0),
(13, '2021_10_25_142512_add_foreign_keys_to_detail_penjualan_table', 0),
(14, '2021_10_25_142512_add_foreign_keys_to_pegawai_table', 0),
(15, '2021_10_25_142512_add_foreign_keys_to_pembayaran_table', 0),
(16, '2021_10_25_142512_add_foreign_keys_to_pemesanan_table', 0),
(17, '2021_10_25_142512_add_foreign_keys_to_penjualan_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(8) NOT NULL,
  `id_jabatan` varchar(12) DEFAULT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat_pegawai` varchar(30) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) DEFAULT NULL,
  `no_tlp` varchar(13) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pasword` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `nama_pegawai`, `alamat_pegawai`, `jenis_kelamin`, `no_tlp`, `username`, `pasword`) VALUES
('P001', 'J001', 'Teguh', 'Gresik', 0, '082778412', 'teguh123', '123'),
('P002', 'J002', 'Adit', 'Sidoarjo', 0, '083876667902', 'adit123', '123'),
('P003', 'J001', 'Rista', 'Surabaya', 1, '086787142562', 'rista', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(13) NOT NULL,
  `id_pegawai` varchar(8) DEFAULT NULL,
  `id_pemesanan` varchar(13) DEFAULT NULL,
  `id_penjualan` varchar(8) DEFAULT NULL,
  `tanggal_pembayaran` datetime DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pegawai`, `id_pemesanan`, `id_penjualan`, `tanggal_pembayaran`, `total_bayar`, `jumlah_bayar`, `sisa`, `created_at`) VALUES
('PMR211026001', 'P003', 'PMN211026001', NULL, '2021-10-26 11:39:34', 160000, 80000, 80000, '2021-10-26'),
('PMR211026002', 'P003', NULL, '21102601', '2021-10-26 11:41:45', 20000, 20000, NULL, '2021-10-26'),
('PMR211026003', 'P003', 'PMN211026001', NULL, '2021-10-26 11:42:04', 160000, 80000, 0, '2021-10-26');

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `ID_PEMBAYARAN` BEFORE INSERT ON `pembayaran` FOR EACH ROW BEGIN
    declare nr integer default 0;
    set nr=(SELECT COUNT(id_pembayaran) from pembayaran where DAY(created_at) = DAY(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP) AND YEAR(created_at) = YEAR(CURRENT_TIMESTAMP)) + 1;
    set new.id_pembayaran= concat("PMR",RIGHT(YEAR(CURRENT_TIMESTAMP), 2),
    LPAD(MONTH(CURRENT_TIMESTAMP),2,'0'),
    LPAD(DAY(CURRENT_TIMESTAMP),2,'0'), LPAD((select nr), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id_pemeriksaan` varchar(10) NOT NULL,
  `tanggal_pemeriksaan` datetime DEFAULT NULL,
  `hasil_pemeriksaan` varchar(25) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `tanggal_pemeriksaan`, `hasil_pemeriksaan`, `created_at`) VALUES
('PMR2110250', '2021-10-25 00:00:00', 'kiri', '2021-10-25'),
('PMR2110260', '2021-10-26 00:00:00', 'Kiri : -1 ; Kanan : 0', '2021-10-26');

--
-- Triggers `pemeriksaan`
--
DELIMITER $$
CREATE TRIGGER `ID_PEMERIKSAAN` BEFORE INSERT ON `pemeriksaan` FOR EACH ROW BEGIN
    declare nr integer default 0;
    set nr=(SELECT COUNT(id_pemeriksaan) from pemeriksaan where DAY(created_at) = DAY(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP) AND YEAR(created_at) = YEAR(CURRENT_TIMESTAMP)) + 1;
    set new.id_pemeriksaan= concat("PMR",RIGHT(YEAR(CURRENT_TIMESTAMP), 2),
    LPAD(MONTH(CURRENT_TIMESTAMP),2,'0'),
    LPAD(DAY(CURRENT_TIMESTAMP),2,'0'), LPAD((select nr), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(13) NOT NULL,
  `id_pegawai` varchar(8) DEFAULT NULL,
  `id_pemeriksaan` varchar(10) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `tanggal_selesai_pemesanan` date DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `status_pemesanan` varchar(10) DEFAULT '1' COMMENT '0 = selesai\r\n1 = proses pemesanan',
  `status_pembayaran` varchar(10) DEFAULT '1' COMMENT '0 = lunas\r\n1 = DP',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pegawai`, `id_pemeriksaan`, `tanggal_pemesanan`, `tanggal_selesai_pemesanan`, `total_biaya`, `status_pemesanan`, `status_pembayaran`, `created_at`) VALUES
('PMN211026001', 'P003', 'PMR2110250', '2021-10-26', NULL, 160000, '0', '0', '2021-10-26');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `ID_PEMESANAN` BEFORE INSERT ON `pemesanan` FOR EACH ROW BEGIN
    declare nr integer default 0;
    set nr=(SELECT COUNT(id_pemesanan) from pemesanan where DAY(created_at) = DAY(CURRENT_TIMESTAMP) AND MONTH(created_at) = MONTH(CURRENT_TIMESTAMP) AND YEAR(created_at) = YEAR(CURRENT_TIMESTAMP)) + 1;
    set new.id_pemesanan= concat("PMN",RIGHT(YEAR(CURRENT_TIMESTAMP), 2),
    LPAD(MONTH(CURRENT_TIMESTAMP),2,'0'),
    LPAD(DAY(CURRENT_TIMESTAMP),2,'0'), LPAD((select nr), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(8) NOT NULL,
  `id_pegawai` varchar(8) DEFAULT NULL,
  `tanggal_penjualan` datetime DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pegawai`, `tanggal_penjualan`, `total_harga`) VALUES
('21102601', 'P003', '2021-10-26 11:41:45', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_barang`,`id_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_penjualan`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_pemeriksaan` (`id_pemeriksaan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_pemeriksaan`) REFERENCES `pemeriksaan` (`id_pemeriksaan`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
