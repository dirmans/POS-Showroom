-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 10:41 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `id_detail_pbl` int(10) NOT NULL,
  `kd_trx_pbl` varchar(10) NOT NULL,
  `kd_mobil` varchar(10) NOT NULL,
  `merk_mobil` varchar(20) NOT NULL,
  `harga_beli` double NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `no_rka` varchar(30) NOT NULL,
  `no_msn` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `atas_nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1 = Terjual , 0 = Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`id_detail_pbl`, `kd_trx_pbl`, `kd_mobil`, `merk_mobil`, `harga_beli`, `no_pol`, `no_rka`, `no_msn`, `tahun`, `warna`, `atas_nama`, `alamat`, `status`) VALUES
(7, 'TPBL-001', 'MBL-001', 'Toyota Agya TRD', 150000000, 'B1566GHZ', 'NHDESY416VJ106243', 'G16BID606243', 1997, 'Silver', 'Saiful', 'Bekasi Timur', '1'),
(8, 'TPBL-002', 'MBL-002', 'TOYOTA KONTOL', 130000000, 'B8808KUY', 'NHDESY416VJ106243', '9834JF93KF93KF93KF93TJ', 2010, 'HITAM', 'MALMSTEEN', 'JALAN BANGSAT NO.10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `id_detail_pjl` int(10) NOT NULL,
  `kd_trx_pjl` varchar(10) NOT NULL,
  `kd_mobil` varchar(10) NOT NULL,
  `merk_mobil` varchar(20) NOT NULL,
  `harga_jual` double NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `no_rka` varchar(30) NOT NULL,
  `no_msn` varchar(30) NOT NULL,
  `tahun` int(5) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `atas_nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT '1 = Terjual , 0 = Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`id_detail_pjl`, `kd_trx_pjl`, `kd_mobil`, `merk_mobil`, `harga_jual`, `no_pol`, `no_rka`, `no_msn`, `tahun`, `warna`, `atas_nama`, `alamat`, `status`) VALUES
(9, 'TPJL-001', 'MBL-001', 'Toyota Agya TRD', 170000000, 'B1566GHZ', 'NHDESY416VJ106243', 'G16BID606243', 1997, 'Silver', 'Saiful', 'Bekasi Timur', '1'),
(10, 'TPJL-002', 'MBL-002', 'TOYOTA KONTOL', 150000000, 'B8808KUY', 'NHDESY416VJ106243', '9834JF93KF93KF93KF93TJ', 2010, 'HITAM', 'MALMSTEEN', 'JALAN BANGSAT NO.10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `kd_mobil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `merk_mobil` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `no_pol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `no_rka` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `no_msn` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` int(5) NOT NULL,
  `warna` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `atas_nama` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`kd_mobil`, `merk_mobil`, `harga_beli`, `harga_jual`, `no_pol`, `no_rka`, `no_msn`, `tahun`, `warna`, `atas_nama`, `alamat`, `status`) VALUES
('MBL-001', 'Toyota Agya TRD', 150000000, 170000000, 'B1566GHZ', 'NHDESY416VJ106243', 'G16BID606243', 1997, 'Silver', 'Saiful', 'Bekasi Timur', 'Terjual'),
('MBL-002', 'TOYOTA KONTOL', 130000000, 150000000, 'B8808KUY', 'NHDESY416VJ106243', '9834JF93KF93KF93KF93TJ', 2010, 'HITAM', 'MALMSTEEN', 'JALAN BANGSAT NO.10', 'Terjual');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `kd_pembeli` varchar(10) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `alamat_pembeli` varchar(50) NOT NULL,
  `notelp_pembeli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`kd_pembeli`, `nama_pembeli`, `alamat_pembeli`, `notelp_pembeli`) VALUES
('PB-001', 'Bejo', 'Bekasi', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kd_trx_pbl` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_trx_pbl` date NOT NULL,
  `kd_penyuplai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `kd_pengguna` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_mobil` int(11) NOT NULL,
  `total_transaksi` double NOT NULL,
  `keterangan` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_trx_pbl`, `tgl_trx_pbl`, `kd_penyuplai`, `kd_pengguna`, `jumlah_mobil`, `total_transaksi`, `keterangan`) VALUES
('TPBL-001', '2018-05-09', 'PP-001', 'PG-004', 1, 150000000, 'Lunas'),
('TPBL-002', '2018-05-09', 'PP-001', 'PG-004', 1, 130000000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `kd_pengguna` varchar(10) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`kd_pengguna`, `nama_pengguna`, `username`, `password`, `last_login`) VALUES
('PG-004', 'Dirman', 'admin', 'admin', '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `kd_trx_pjl` varchar(10) NOT NULL,
  `tgl_trx_pjl` date NOT NULL,
  `kd_pembeli` varchar(10) NOT NULL,
  `kd_pengguna` varchar(10) NOT NULL,
  `jumlah_mobil` int(3) NOT NULL,
  `total_transaksi` double NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jumlah_dp` double NOT NULL,
  `last_update` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`kd_trx_pjl`, `tgl_trx_pjl`, `kd_pembeli`, `kd_pengguna`, `jumlah_mobil`, `total_transaksi`, `keterangan`, `jumlah_dp`, `last_update`) VALUES
('TPJL-001', '2018-05-09', 'PB-001', 'PG-004', 1, 170000000, 'Lunas', 0, '-'),
('TPJL-002', '2018-05-09', 'PB-001', 'PG-004', 1, 150000000, 'Lunas', 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyuplai`
--

CREATE TABLE `tbl_penyuplai` (
  `kd_penyuplai` varchar(10) NOT NULL,
  `nama_penyuplai` varchar(30) NOT NULL,
  `alamat_penyuplai` varchar(50) NOT NULL,
  `notelp_penyuplai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyuplai`
--

INSERT INTO `tbl_penyuplai` (`kd_penyuplai`, `nama_penyuplai`, `alamat_penyuplai`, `notelp_penyuplai`) VALUES
('PP-001', 'Jono', 'Poncol', '087894523243');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pbl`);

--
-- Indexes for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_pjl`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`kd_mobil`);

--
-- Indexes for table `tbl_pembeli`
--
ALTER TABLE `tbl_pembeli`
  ADD PRIMARY KEY (`kd_pembeli`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kd_trx_pbl`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`kd_trx_pjl`);

--
-- Indexes for table `tbl_penyuplai`
--
ALTER TABLE `tbl_penyuplai`
  ADD PRIMARY KEY (`kd_penyuplai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `id_detail_pbl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `id_detail_pjl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
