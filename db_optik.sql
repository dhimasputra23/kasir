-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 05:35 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_optik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_karyawan`
--

CREATE TABLE `hutang_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nominal` int(20) NOT NULL,
  `jumlah_bayar` int(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang_karyawan`
--

INSERT INTO `hutang_karyawan` (`id`, `id_karyawan`, `nominal`, `jumlah_bayar`, `keterangan`, `status`, `tanggal`) VALUES
(3, 1, 1000000, 0, 'untuk beli obat', 'BelumLunas', '0000-00-00'),
(5, 2, 2000000, 100000, 'untuk berobat', 'BelumLunas', '0000-00-00'),
(7, 1, 1000000, 1000000, 'untuk beli obat', 'Lunas', '2019-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tanggal_masuk`) VALUES
(1, 'Fajar Hidayat', 'Indramayu', '2017-09-06', 'Haurgeulis , Indramayu Jawa Barat', '2019-08-31'),
(2, 'dimas', 'pati', '2017-09-06', 'sukolilomuma', '2019-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_barang`
--

CREATE TABLE `peminjaman_barang` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman_barang`
--

INSERT INTO `peminjaman_barang` (`id`, `id_karyawan`, `id_barang`, `tanggal`, `jumlah`, `keterangan`, `tanggal_kembali`) VALUES
(1, 1, 'BR000001', '2019-08-23', 2, 'awaawa', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `jenis_pengeluaran` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `penerima` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `jenis_pengeluaran`, `nominal`, `tanggal`, `keterangan`, `penerima`) VALUES
(2, 'Lain-Lain', 1000000, '2019-08-18', 'hmmm', '2'),
(3, 'Gaji Karyawan', 2000000, '2019-08-24', 'gaji', '1'),
(4, 'Uang Makan', 10000, '2019-08-24', 'untuk makan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`) VALUES
(1, 10556940);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `barang_id` varchar(15) NOT NULL,
  `barang_nama` varchar(150) DEFAULT NULL,
  `barang_satuan` enum('buah') DEFAULT NULL,
  `barang_harpok` double DEFAULT NULL,
  `barang_harjul` double DEFAULT NULL,
  `barang_stok` int(11) DEFAULT '0',
  `barang_min_stok` int(11) DEFAULT '0',
  `barang_tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_tgl_last_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `barang_kategori_id` int(11) DEFAULT NULL,
  `serial_number` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `barang_id`, `barang_nama`, `barang_satuan`, `barang_harpok`, `barang_harjul`, `barang_stok`, `barang_min_stok`, `barang_tgl_input`, `barang_tgl_last_update`, `barang_kategori_id`, `serial_number`, `image`) VALUES
(3, 'BR000001', 'Kacamata 1 ', 'buah', 100000, 200000, 19, 1, '2019-09-22 03:02:03', '2019-09-22 10:02:03', 47, '42424', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_beli`
--

CREATE TABLE `tbl_beli` (
  `beli_nofak` varchar(15) NOT NULL,
  `beli_tanggal` date DEFAULT NULL,
  `beli_suplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_beli`
--

INSERT INTO `tbl_beli` (`beli_nofak`, `beli_tanggal`, `beli_suplier_id`) VALUES
('Bl-000001', '2019-09-26', 6),
('Bl-000002', '2019-09-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `kd_customer` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `kd_customer`, `nama`, `no_hp`, `alamat`) VALUES
(11, 'C-000001', 'Fajar Hidayati', '082257683933', 'Haurgeulis, Indramayu Jawa Barat'),
(12, 'C-000002', 'Ramadhan Dwi Saputra', '0822576839111', 'Haurgeulis, Indramayu Jawa Barat'),
(13, 'C-000003', 'Ramadhan Dwi Saputra', '082257683911', 'Haurgeulis, Indramayu Jawa Barat'),
(14, 'C-000004', 'dimas', '0879877990098', 'putra'),
(15, 'C-000005', 'budi', '0898979797879', 'dasdaf'),
(16, 'C-000006', 'pokopoi', '0832826328736', 'dasafag'),
(20, 'C-000007', 'popo', '08765435678', 'aiku'),
(21, 'C-000008', 'dimas', '087733988295', 'dada'),
(22, 'C-000009', 'wedos', '0876789765478', 'smg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_beli`
--

CREATE TABLE `tbl_detail_beli` (
  `d_beli_id` int(11) NOT NULL,
  `d_beli_nofak` varchar(15) DEFAULT NULL,
  `d_beli_barang_id` varchar(15) DEFAULT NULL,
  `d_beli_harga` double DEFAULT NULL,
  `d_beli_jumlah` int(11) DEFAULT NULL,
  `d_beli_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_beli`
--

INSERT INTO `tbl_detail_beli` (`d_beli_id`, `d_beli_nofak`, `d_beli_barang_id`, `d_beli_harga`, `d_beli_jumlah`, `d_beli_total`) VALUES
(9, 'Bl-000001', 'BR000001', 100000, 1, 100000),
(10, 'Bl-000002', 'BR000001', 100000, 3, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual`
--

CREATE TABLE `tbl_detail_jual` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_kat_id` int(11) NOT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual`
--

INSERT INTO `tbl_detail_jual` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_kat_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, '260919000001', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(2, '260919000002', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(3, '260919000003', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 2, 0, 400000),
(4, '260919000004', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(5, '260919000005', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(6, 'Kd-000006', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(7, 'Kd-000007', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(8, 'Kd-000008', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_jual_dp`
--

CREATE TABLE `tbl_detail_jual_dp` (
  `d_jual_id` int(11) NOT NULL,
  `d_jual_nofak` varchar(15) DEFAULT NULL,
  `d_jual_barang_id` varchar(15) DEFAULT NULL,
  `d_jual_barang_kat_id` int(11) NOT NULL,
  `d_jual_barang_nama` varchar(150) DEFAULT NULL,
  `d_jual_barang_satuan` varchar(30) DEFAULT NULL,
  `d_jual_barang_harpok` double DEFAULT NULL,
  `d_jual_barang_harjul` double DEFAULT NULL,
  `d_jual_qty` int(11) DEFAULT NULL,
  `d_jual_diskon` double DEFAULT NULL,
  `d_jual_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_jual_dp`
--

INSERT INTO `tbl_detail_jual_dp` (`d_jual_id`, `d_jual_nofak`, `d_jual_barang_id`, `d_jual_barang_kat_id`, `d_jual_barang_nama`, `d_jual_barang_satuan`, `d_jual_barang_harpok`, `d_jual_barang_harjul`, `d_jual_qty`, `d_jual_diskon`, `d_jual_total`) VALUES
(1, 'DP-000001', 'BR000001', 47, 'popokulo', 'buah', 50, 60, 1, 0, 60),
(2, 'DP-000002', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(3, 'DP-000003', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 2, 0, 400000),
(4, 'DP-000004', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000),
(5, 'DP-000005', 'BR000001', 47, 'Kacamata 1 ', 'buah', 100000, 200000, 1, 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual`
--

CREATE TABLE `tbl_jual` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double NOT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` enum('Debit','Kredit','Lunas','OVO','Transfer') DEFAULT NULL,
  `diskon` double NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual`
--

INSERT INTO `tbl_jual` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`, `diskon`, `no_hp`) VALUES
('260919000001', '2019-09-26 13:58:54', 200000, 2000000, 1800000, 0, 'Transfer', 0, '082257683933 '),
('260919000002', '2019-09-26 13:59:35', 200000, 700000, 500000, 0, 'Debit', 0, '087733988295'),
('260919000003', '2019-09-26 14:00:22', 400000, 400000, 0, 0, 'Lunas', 0, '0822576839111 '),
('260919000004', '2019-09-26 14:01:56', 200000, 1000000, 800000, 0, 'Lunas', 0, '0898979797879 '),
('260919000005', '2019-09-26 14:02:14', 200000, 200000, 0, 0, 'Lunas', 0, '08765435678 '),
('Kd-000006', '2019-09-26 14:21:33', 200000, 300000, 100000, 0, 'Lunas', 0, '0898979797879 '),
('Kd-000007', '2019-09-26 15:04:34', 200000, 200000, 0, 0, 'Lunas', 0, '0832826328736 '),
('Kd-000008', '2019-09-26 15:11:34', 200000, 1000000, 800000, 0, 'Kredit', 0, '08765435678 ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jual_dp`
--

CREATE TABLE `tbl_jual_dp` (
  `jual_nofak` varchar(15) NOT NULL,
  `jual_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `jual_total` double DEFAULT NULL,
  `jual_jml_uang` double DEFAULT NULL,
  `jual_kembalian` double DEFAULT NULL,
  `jual_user_id` int(11) DEFAULT NULL,
  `jual_keterangan` varchar(20) DEFAULT NULL,
  `diskon` double NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `uang_muka` varchar(50) NOT NULL,
  `is_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jual_dp`
--

INSERT INTO `tbl_jual_dp` (`jual_nofak`, `jual_tanggal`, `jual_total`, `jual_jml_uang`, `jual_kembalian`, `jual_user_id`, `jual_keterangan`, `diskon`, `no_hp`, `uang_muka`, `is_status`) VALUES
('DP-000001', '2019-09-22 02:36:34', 60, 7000, -6940, 0, 'buah', 0, '082257683933', 'Uang Muka', 1),
('DP-000002', '2019-09-22 12:04:01', 100000, 50000, 50000, 0, 'buah', 100000, '082257683933', 'Uang Muka', 1),
('DP-000003', '2019-09-26 14:00:22', 400000, 200000, 200000, 0, 'buah', 0, '0822576839111 ', 'Uang Muka', 1),
('DP-000004', '2019-09-26 14:02:14', 200000, 100000, 100000, 0, 'buah', 0, '08765435678 ', 'Uang Muka', 1),
('DP-000005', '2019-09-26 15:04:34', 200000, 100000, 100000, 0, 'buah', 0, '0832826328736 ', 'Uang Muka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(47, 'Frame Kacamata Oakley'),
(48, ' Frame Kacamata Calvin Klein'),
(49, 'Frame Kacamata Chanel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `fitur` varchar(300) NOT NULL,
  `cek_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama`, `fitur`, `cek_gambar`) VALUES
(1, 'Footer Copyright (Backend)', 'AXOLO TEKNOLOGI INDONESIA 2019', 0),
(2, 'Nama Toko (Backend)', 'TOKO OPTIK', 0),
(3, 'Alamat Toko', 'Jl. Besar Ring Road No.14, Kota Medan', 0),
(4, 'Kontak', '(WA) 081264440269', 0),
(5, 'Gambar Logo (Print Struk)', 'logo.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_nama` varchar(35) DEFAULT NULL,
  `suplier_alamat` varchar(60) DEFAULT NULL,
  `suplier_notelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_suplier`
--

INSERT INTO `tbl_suplier` (`suplier_id`, `suplier_nama`, `suplier_alamat`, `suplier_notelp`) VALUES
(3, 'PT. Kamera Indonesia', 'Pati', '085658989894'),
(6, 'PT. OPTIK', 'pati', '78979027826923');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','kasir') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `status`) VALUES
(3, 'admin', '$2y$10$yPHYnUgK3iytDr1XNvPVqeOSIPSLJ4W3kQ3tGcCmWq247JRscDM/W', 'admin', 1),
(4, 'kasir', '$2y$10$rv0synsxBBuA/Egqvrb2OOxqEGElDLz2eNAZf9GMnp9QRCU8EOPzO', 'kasir', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `hutang_karyawan`
--
ALTER TABLE `hutang_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `barang_kategori_id` (`barang_kategori_id`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`beli_nofak`),
  ADD KEY `beli_suplier_id` (`beli_suplier_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  ADD PRIMARY KEY (`d_beli_id`),
  ADD KEY `d_beli_barang_id` (`d_beli_barang_id`),
  ADD KEY `d_beli_nofak` (`d_beli_nofak`);

--
-- Indexes for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_detail_jual_dp`
--
ALTER TABLE `tbl_detail_jual_dp`
  ADD PRIMARY KEY (`d_jual_id`),
  ADD KEY `d_jual_barang_id` (`d_jual_barang_id`),
  ADD KEY `d_jual_nofak` (`d_jual_nofak`);

--
-- Indexes for table `tbl_jual`
--
ALTER TABLE `tbl_jual`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_jual_dp`
--
ALTER TABLE `tbl_jual_dp`
  ADD PRIMARY KEY (`jual_nofak`),
  ADD KEY `jual_user_id` (`jual_user_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang_karyawan`
--
ALTER TABLE `hutang_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman_barang`
--
ALTER TABLE `peminjaman_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_detail_beli`
--
ALTER TABLE `tbl_detail_beli`
  MODIFY `d_beli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_detail_jual`
--
ALTER TABLE `tbl_detail_jual`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_detail_jual_dp`
--
ALTER TABLE `tbl_detail_jual_dp`
  MODIFY `d_jual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
