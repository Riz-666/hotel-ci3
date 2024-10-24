-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2024 at 02:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int NOT NULL,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `image` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `nama_fasilitas`, `keterangan`, `image`) VALUES
(1, 'Cafe', 'Tempat Untuk Makan', 'fas3.jpg'),
(2, 'Kolam Berenang', 'untuk private', 'fas2.jpg'),
(4, 'Billiard', 'bermain billiard bersaama kawan', 'fas1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int NOT NULL,
  `tipe_kamar` varchar(50) NOT NULL,
  `jumlah_kamar` int NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `harga_sewa` float(15,2) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `tipe_kamar`, `jumlah_kamar`, `fasilitas_kamar`, `harga_sewa`, `image`) VALUES
(1, 'reguler', 5, '', 150000.00, 'kam1.jpg'),
(44, 'premium', 5, '', 90000.00, 'kam2.jpg'),
(49, 'super', 4, '', 1000000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int NOT NULL,
  `tgl_check_in` date DEFAULT NULL,
  `total_hari` int DEFAULT NULL,
  `tgl_check_out` date DEFAULT NULL,
  `jumlah_kamar` int DEFAULT NULL,
  `nama_pemesan` varchar(30) DEFAULT NULL,
  `nama_tamu` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tipe_kamar` enum('Reguler','Premium') NOT NULL,
  `id_kamar` int DEFAULT NULL,
  `harga_sewa` float(15,2) DEFAULT NULL,
  `estimasi_biaya` float(17,2) DEFAULT NULL,
  `tgl_pemesanan` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `tgl_check_in`, `total_hari`, `tgl_check_out`, `jumlah_kamar`, `nama_pemesan`, `nama_tamu`, `email`, `no_hp`, `tipe_kamar`, `id_kamar`, `harga_sewa`, `estimasi_biaya`, `tgl_pemesanan`, `status`) VALUES
(31, '2024-10-25', NULL, '2024-10-30', 3, 'dina', 'dani', 'admin@admin.com', '0987676768', 'Reguler', 49, NULL, NULL, '2024-10-24 09:28:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','receptionist','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_pemesanan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_pemesanan` (
`email` varchar(60)
,`estimasi_biaya` float(17,2)
,`harga_pemesanan` float(15,2)
,`harga_sekarang` float(15,2)
,`id_kamar` int
,`id_pemesanan` int
,`jumlah_kamar` int
,`keterangan` varchar(9)
,`nama_pemesan` varchar(30)
,`nama_tamu` varchar(50)
,`no_hp` varchar(15)
,`status` int
,`tgl_check_in` date
,`tgl_check_out` date
,`tgl_pemesanan` datetime
,`tipe_kamar` varchar(50)
,`total_hari` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kamar`
-- (See below for the actual view)
--
CREATE TABLE `v_kamar` (
`fasilitas_kamar` text
,`harga_sewa` float(15,2)
,`id_kamar` int
,`image` varchar(30)
,`jumlah_kamar` int
,`tipe_kamar` varchar(50)
,`total_pemesanan` bigint
);

-- --------------------------------------------------------

--
-- Structure for view `v_detail_pemesanan`
--
DROP TABLE IF EXISTS `v_detail_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_pemesanan`  AS SELECT `t1`.`id_pemesanan` AS `id_pemesanan`, `t1`.`tgl_check_in` AS `tgl_check_in`, `t1`.`total_hari` AS `total_hari`, `t1`.`tgl_check_out` AS `tgl_check_out`, `t1`.`jumlah_kamar` AS `jumlah_kamar`, `t1`.`nama_pemesan` AS `nama_pemesan`, `t1`.`nama_tamu` AS `nama_tamu`, `t1`.`email` AS `email`, `t1`.`no_hp` AS `no_hp`, `t1`.`id_kamar` AS `id_kamar`, `t2`.`tipe_kamar` AS `tipe_kamar`, `t2`.`harga_sewa` AS `harga_sekarang`, `t1`.`harga_sewa` AS `harga_pemesanan`, `t1`.`estimasi_biaya` AS `estimasi_biaya`, `t1`.`tgl_pemesanan` AS `tgl_pemesanan`, `t1`.`status` AS `status`, (case `t1`.`status` when 1 then 'Booked' when 2 then 'Check In' when 3 then 'Check Out' when 4 then 'Cancelled' end) AS `keterangan` FROM (`tb_pemesanan` `t1` join `tb_kamar` `t2` on((`t1`.`id_kamar` = `t2`.`id_kamar`))) ORDER BY `t1`.`status` ASC, `t1`.`tgl_check_in` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_kamar`
--
DROP TABLE IF EXISTS `v_kamar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kamar`  AS SELECT `t1`.`id_kamar` AS `id_kamar`, `t1`.`tipe_kamar` AS `tipe_kamar`, `t1`.`jumlah_kamar` AS `jumlah_kamar`, `t1`.`fasilitas_kamar` AS `fasilitas_kamar`, `t1`.`harga_sewa` AS `harga_sewa`, `t1`.`image` AS `image`, count(`t2`.`id_pemesanan`) AS `total_pemesanan` FROM (`tb_kamar` `t1` left join `tb_pemesanan` `t2` on(((`t1`.`id_kamar` = `t2`.`id_kamar`) and (`t2`.`status` <> 4)))) GROUP BY `t1`.`id_kamar` ORDER BY `t1`.`id_kamar` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD UNIQUE KEY `tipe_kamar` (`tipe_kamar`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `tb_kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
