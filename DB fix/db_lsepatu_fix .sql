-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 08:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lsepatu_fix`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dapat_paket_id` (IN `paket_id` VARCHAR(4))  NO SQL
BEGIN 

	SELECT * FROM tbl_detail_transaksi_masuk

    WHERE paket_id=tbl_detail_transaksi_masuk.dtm_paket_id;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_sepatu_transaksi_keluar` (`total` INT(11)) RETURNS INT(11) NO SQL
RETURN (SELECT SUM(tbl_transaksi_keluar.tk_total_sepatu) FROM tbl_transaksi_keluar )$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `list_pegawai` (
`users_id` varchar(111)
,`users_nama` varchar(150)
,`users_email` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi_masuk`
--

CREATE TABLE `tbl_detail_transaksi_masuk` (
  `dtm_id` int(11) NOT NULL,
  `dtm_nofak` varchar(15) DEFAULT NULL,
  `dtm_paket_id` varchar(15) DEFAULT NULL,
  `dtm_paket_nama` varchar(15) DEFAULT NULL,
  `dtm_satuan` varchar(15) DEFAULT NULL,
  `dtm_harga` double DEFAULT NULL,
  `dtm_qty` int(11) DEFAULT NULL,
  `dtm_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_transaksi_masuk`
--

INSERT INTO `tbl_detail_transaksi_masuk` (`dtm_id`, `dtm_nofak`, `dtm_paket_id`, `dtm_paket_nama`, `dtm_satuan`, `dtm_harga`, `dtm_qty`, `dtm_total`) VALUES
(29, 'TM1905290003', 'PK01', 'deep clean', 'satu pasang', 20000, 1, 20000),
(30, 'TM1906210001', 'PK01', 'deep clean', 'satu pasang', 20000, 2, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `level_id` int(2) NOT NULL,
  `level_role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`level_id`, `level_role`) VALUES
(1, 'owner'),
(2, 'pegawai'),
(3, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(2) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_title`, `menu_icon`, `menu_url`) VALUES
(1, 'Transaksi Masuk', '<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i>', 'admin/Transaksi_masuk'),
(2, 'Transaksi Keluar', '<i class=\"fa fa-cart-arrow-down\"></i>', 'admin/Transaksi_keluar'),
(3, 'Data Paket', '<i class=\"fa fa-list\" aria-hidden=\"true\"></i>', 'admin/data_paket'),
(4, 'Data Pegawai', '<i class=\"fa fa-user\" aria-hidden=\"true\"></i>', 'owner/dataPegawai'),
(5, 'Data Customer', '<i class=\"fa fa-users\" aria-hidden=\"true\"></i>', 'pegawai/dataCustomer'),
(6, 'Data Pengeluaran', '<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>', 'admin/data_pengeluaran'),
(7, 'Laporan', '<i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i>', 'admin/laporan'),
(8, 'Registrasi Pegawai', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>', 'owner/registPegawai'),
(9, 'Registrasi Customer', '<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>', 'pegawai/registCustomer'),
(10, 'Profil', '<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>', 'pegawai/profil'),
(11, 'Profil', '<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>', 'customer/profil'),
(13, 'Profil', '<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>', 'owner/Profil'),
(14, 'Data Paket', '<i class=\"fa fa-list\" aria-hidden=\"true\"></i>', 'admin/data_paket/listPaket'),
(15, 'kosong', 'kosong', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_akses`
--

CREATE TABLE `tbl_menu_akses` (
  `akses_id` int(2) NOT NULL,
  `akses_level_id` int(2) NOT NULL,
  `akses_menu_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_akses`
--

INSERT INTO `tbl_menu_akses` (`akses_id`, `akses_level_id`, `akses_menu_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 5),
(4, 1, 6),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 2, 1),
(9, 2, 2),
(10, 2, 6),
(11, 2, 9),
(12, 2, 10),
(13, 2, 5),
(14, 2, 7),
(15, 3, 1),
(16, 3, 2),
(17, 1, 15),
(18, 3, 11),
(19, 2, 14),
(20, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `paket_id` varchar(15) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_satuan` varchar(100) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`paket_id`, `paket_nama`, `paket_satuan`, `paket_harga`) VALUES
('PK01', 'deep clean', 'satu pasang', 20000),
('PK02', 'unyellowing', 'satu pasang', 25000),
('PK03', 'recolour', 'satu pasang', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL,
  `pengeluaran_users_id` varchar(111) NOT NULL,
  `pengeluaran_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengeluaran_nama` varchar(100) DEFAULT NULL,
  `pengeluaran_harga` double DEFAULT NULL,
  `pengeluaran_keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`pengeluaran_id`, `pengeluaran_users_id`, `pengeluaran_tanggal`, `pengeluaran_nama`, `pengeluaran_harga`, `pengeluaran_keterangan`) VALUES
(1, 'OW0001', '2019-04-27 23:35:01', 'sabun cuci merk apa', 90000, 'untuk satu bulan'),
(7, 'PG0062', '2019-06-19 16:16:41', 'Sikat Sepatu', 7000, 'untuk membersihkan sepatu'),
(9, 'CS0051', '2019-06-19 16:28:05', 'Cat sepatu', 150000, 'pewarna sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `tk_id` int(1) NOT NULL,
  `tk_email` varchar(128) NOT NULL,
  `tk_token` varchar(128) NOT NULL,
  `tk_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`tk_id`, `tk_email`, `tk_token`, `tk_time`) VALUES
(23, 'slenderyman1@gmail.com', 'Y1bQO8kRolsS8+8rXt0ABRwSfCR7PVd7WjLMMpnLP/w=', 1557805558),
(24, 'korewamovie01@gmail.com', 'Z0MMP+qdGLM5PHTAOWPtX11fxOLZ9Fb0G/9+JMTWFDI=', 1557805581),
(32, 'yadribl@gmail.com', 'CsetmzMBnPLcyQtR06TEzkCIftcltmmZiUICd7+DRq0=', 1557893458),
(33, 'yadribl@gmail.com', 'VOUlS1MiJAuE4Xyp0dbjEiy/M6No7caO3KlO7n2eSZw=', 1558194818),
(34, 'yadribl@gmail.com', 'BEFIVd4kLsS+aFcjh7jFR0PzBDKdm5Fl42ABK+Wl4Hw=', 1558194905),
(35, 'yadribl@gmail.com', '7rV+7eh8Pz8iA6+8jS1/CmTmZkJHVqPbJjhotjumS/U=', 1558194959),
(36, 'yadribl@gmail.com', 'aotq+P0lD+2EyUWxEehVZmG+36tFMmH9rZh7sICiDJg=', 1558194979),
(37, 'yadribl@gmail.com', '4CE74P/KnUNo/dhE7sAOweyuVrM9/a3qGAFzcLEsWW8=', 1558194989),
(39, 'korewamovie01@gmail.com', 'asl7l0D9GVy49YaXefw6UBFEI92td6/qJoVzfDhoo68=', 1558538436),
(40, 'yadri.amz@gmail.com', 'Uq37uuiyl1aUBt5r7+5XGGdy921iDuQWzGuipVv/7QM=', 1558539217),
(45, 'mochnurcholes@gmail.com', 'pp36RN11GxeUeJurJ87v2aG97XRZNUocE3t7wyPKN40=', 1558636316),
(46, 'korewamovie01@gmail.com', 'WbHYX8x2w2ScsU94SsklgqbVTiPOwxM+MxRwcuND3Mo=', 1558636347),
(47, 'farhan7rizal@gmail.com', '4wuLpeyD+f2/JBbfM9Is0thYJKrzeLcSHQ5SUstqj+s=', 1558636717),
(48, 'mochnurcholes@gmail.com', 'iMFN4oE8Ak377CxSHo5lagdzeEJpiltMlnNTCv/KFvA=', 1558651303),
(49, 'slenderyman1@gmail.com', 'qzhvi4pfvUkoZl5zI//ubnS2Z0rMJm00JV1aSPwKnlk=', 1558652580),
(50, 'tester@gmail.com', '6EpqH+Z9Vi6qp9MlxVG4P1soqYFeMQXAIudtKith1Qg=', 1560064890),
(51, 'test@gmail.com', 'WgC9x90DJWg5zQni0VkD+aoWaMLtwgzpMKhCUe3hi8Y=', 1560064931),
(52, 'test@gmail.com', '4ZZtKM2K4OUkpiSnQm1PBFzG7sgVQEXMXv0+bSi2Pes=', 1560066479),
(53, 'test@gmail.com', 'R15VU9C4AwDcLkAWNhCOp9IQfGaZEo6Ei9w4yqHH4mY=', 1560079677),
(54, 'test@gmail.com', '1RFyCYJcB5gBH4p57zFbtkjl0Ab1b4ZCJ07oCeCmBiY=', 1560092440),
(55, 'test@gmail.com', 'BwmAcyVk3ngOsoN/3IpTKD+peDXCSeftR9Ix/ze9Vgw=', 1560092496),
(56, 'tester@gmail.com', 'oyqa/L6mtx2emaD1GNNWdYEYwnGQOrNkJSyWZhoEOeo=', 1560092531),
(57, 'tester@gmail.com', 'b5QZBV98GQeFyc28IEXHZ06zkBQKBG3Dx4v4hOrHL5U=', 1560092908),
(58, 'tester123@gmail.com', 'YQB3k9enrF8DPfCSFd3EeRMj1NUSzjMxBXaz3W7vTqA=', 1560094655),
(59, 'kita@gmail.com', 'VO+rXH9x6m02RxJBtqPvjFQPBSs9vdUl5x4fN+MjboQ=', 1560094755),
(60, 'kita@gmail.com', 'WOWLOE6K24ELXm32tELTmKscRQdcZp7PT2Fa2RSdvYE=', 1560094808),
(61, 'kita@gmail.com', 'VwhD55ASj7n/B3LDbH/Pi16fuo6VPvNxXrASac+zLPw=', 1560094992),
(62, 'kita@gmail.com', 'G9jehx9k51Cfqas9KrnEGsxN/T6VZMcCIUoJO9U0pk0=', 1560096295),
(63, 'kalian@gmail.com', 'o4QR81h5zr5Pe/sx4/sBYwsXTZNp45gNiKnuUSY7ZAM=', 1560097341),
(64, 'slenderyman1@gmail.com', '7XLekNtBtGmvwVVMZCFMxmeRAmXE1Tdnnb81QAmSAY8=', 1561050473),
(65, 'akbar@gmail.com', 'Wass+hXfGLs81c11msrseHQFHlKRwrDvESoviG9PhbA=', 1561052174),
(66, 'hiroshima@gmail.com', 'bBaB5h6/pYsZ/QYa2+TWW2KSSI3VJQygVHaEdOrfSBw=', 1561097489),
(67, 'korewamovie01@gmail.com', 'kfBJWcsA3YX4RBlF4Hn8ZT8GK3INktWfbEdvnQU87pg=', 1561651418);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_keluar`
--

CREATE TABLE `tbl_transaksi_keluar` (
  `tk_nofak` varchar(15) NOT NULL,
  `tk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tk_tm_nofak` varchar(15) DEFAULT NULL,
  `tk_total_sepatu` double NOT NULL,
  `tk_total` double DEFAULT NULL,
  `tk_jml_uang` double DEFAULT NULL,
  `tk_kembalian` double DEFAULT NULL,
  `tk_users_id_peg` varchar(11) DEFAULT NULL,
  `tk_users_id_cus` varchar(11) DEFAULT NULL,
  `tk_nama` varchar(150) DEFAULT NULL,
  `tk_alamat` varchar(150) DEFAULT NULL,
  `tk_no_telp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_keluar`
--

INSERT INTO `tbl_transaksi_keluar` (`tk_nofak`, `tk_tanggal`, `tk_tm_nofak`, `tk_total_sepatu`, `tk_total`, `tk_jml_uang`, `tk_kembalian`, `tk_users_id_peg`, `tk_users_id_cus`, `tk_nama`, `tk_alamat`, `tk_no_telp`) VALUES
('TK1905290001', '2019-05-29 07:29:27', 'TM1905290003', 1, 20000, 1, -19999, '2', '200', 'farhan rizal', 'perum mastirp, jln mastrip 6', '081234841360');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_masuk`
--

CREATE TABLE `tbl_transaksi_masuk` (
  `tm_nofak` varchar(15) NOT NULL,
  `tm_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tm_total_sepatu` int(11) NOT NULL,
  `tm_total` double DEFAULT NULL,
  `tm_keterangan` varchar(150) DEFAULT NULL,
  `tm_users_id_cus` varchar(111) DEFAULT '0',
  `tm_nama` varchar(150) DEFAULT NULL,
  `tm_alamat` varchar(150) DEFAULT NULL,
  `tm_no_telp` varchar(12) DEFAULT NULL,
  `tm_status` enum('belum','cuci','jemur','kering') NOT NULL DEFAULT 'belum',
  `tm_status_bayar` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  `tm_users_id_peg` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_masuk`
--

INSERT INTO `tbl_transaksi_masuk` (`tm_nofak`, `tm_tanggal`, `tm_total_sepatu`, `tm_total`, `tm_keterangan`, `tm_users_id_cus`, `tm_nama`, `tm_alamat`, `tm_no_telp`, `tm_status`, `tm_status_bayar`, `tm_users_id_peg`) VALUES
('TM1905290001', '2019-05-29 06:32:13', 0, 0, '', 'OW0001', 'a', 'a', '', 'belum', 'belum', '2'),
('TM1905290002', '2019-05-29 06:57:49', 0, 0, '', 'OW0001', 'q', 'a', '', 'belum', 'belum', '2'),
('TM1905290003', '2019-05-29 07:28:25', 1, 20000, 'gsgf', 'OW0001', 'w', 'w', '', 'belum', 'sudah', '2'),
('TM1906210001', '2019-06-21 13:57:19', 2, 40000, 'no', 'CS0053', 'yamzal', 'kaliurang', '', 'belum', 'belum', 'CS0052');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` varchar(111) NOT NULL,
  `users_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `users_nama` varchar(150) DEFAULT NULL,
  `users_password` varchar(150) DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_level_id` int(2) DEFAULT NULL,
  `users_status` varchar(2) DEFAULT '1',
  `users_image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_tanggal`, `users_nama`, `users_password`, `users_email`, `users_level_id`, `users_status`, `users_image`) VALUES
('', '2019-06-20 17:07:53', 'saya', '$2y$10$lJCEdniu7FySrxTZpy9sL.7djfBAtjtTznphRRBRnNn0/SYDkkc2C', 'slenderyman1@gmail.com', 2, '0', ''),
('CS0051', '2019-05-14 21:10:58', 'yadri', '81dc9bdb52d04dc20036dbd8313ed055', 'yadribl@gmail.com', 1, '1', ''),
('CS0053', '2019-05-22 08:33:37', 'yamzal', '81dc9bdb52d04dc20036dbd8313ed055', 'yadri.amz@gmail.com', 1, '1', ''),
('CS0054', '2019-05-23 11:38:37', 'Farhan Rizal', '$2y$10$hGVLxyJQtDqo3H8.WV1ukOn4UrgaXcJgQy/toX6e.pfFw3pygOmim', 'farhan7rizal@gmail.com', 2, '0', ''),
('CS0055', '2019-05-23 15:41:43', 'irfan siddiq', '$2y$10$XU.1L38H4J2o3DcN9ZIg1uPxLEFjpAmeBqJJzyuwNVOkNyOhqVWhi', 'mochnurcholes@gmail.com', 2, '0', ''),
('CS0056', '2019-06-09 15:08:28', 'kami', '$2y$10$yNWgdIFnbt7O12fC7qObD.HE7pYzH2uZ9hQ3T.KruHncAwd9MnF0i', 'tester@gmail.com', 2, '0', ''),
('CS0057', '2019-06-09 15:01:36', 'saya', '8b1a9953c4611296a827abf8c47804d7', 'test@gmail.com', 2, '1', ''),
('OW0001', '2019-04-27 23:34:59', 'kosong', 'kosong', '', 2, '1', ''),
('PG0061', '2019-06-21 06:11:29', 'hiroshima', '$2y$10$q6laNM74kQLFrR3TqmaY6.ZwceSiPodf4EVCpR67a9TID.pYQnI32', 'hiroshima@gmail.com', 2, '0', ''),
('PG0062', '2019-05-22 08:20:36', 'farhan rizal', '827ccb0eea8a706c4c34a16891f84e7b', 'korewamovie01@gmail.com', 2, '1', 'person22.jpg'),
('TS0060', '2019-06-20 17:36:14', 'akbbar', '81dc9bdb52d04dc20036dbd8313ed055', 'akbar@gmail.com', 3, '1', 'default.png');

-- --------------------------------------------------------

--
-- Structure for view `list_pegawai`
--
DROP TABLE IF EXISTS `list_pegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_pegawai`  AS  select `tbl_users`.`users_id` AS `users_id`,`tbl_users`.`users_nama` AS `users_nama`,`tbl_users`.`users_email` AS `users_email` from `tbl_users` where (`tbl_users`.`users_level_id` = 2) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD PRIMARY KEY (`dtm_id`),
  ADD KEY `dtm_nofak` (`dtm_nofak`),
  ADD KEY `dtm_paket_id` (`dtm_paket_id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_menu_akses`
--
ALTER TABLE `tbl_menu_akses`
  ADD PRIMARY KEY (`akses_id`),
  ADD KEY `tbl_menu_akses_ibfk_1` (`akses_level_id`),
  ADD KEY `tbl_menu_akses_ibfk_2` (`akses_menu_id`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`),
  ADD KEY `pengeluaran_users_id` (`pengeluaran_users_id`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`tk_id`);

--
-- Indexes for table `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD PRIMARY KEY (`tk_nofak`),
  ADD KEY `tk_tm_nofak` (`tk_tm_nofak`);

--
-- Indexes for table `tbl_transaksi_masuk`
--
ALTER TABLE `tbl_transaksi_masuk`
  ADD PRIMARY KEY (`tm_nofak`),
  ADD KEY `tm_users_id_cus` (`tm_users_id_cus`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `admin_level` (`users_level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  MODIFY `dtm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `level_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `tk_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_transaksi_masuk`
--
ALTER TABLE `tbl_detail_transaksi_masuk`
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_1` FOREIGN KEY (`dtm_paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_2` FOREIGN KEY (`dtm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu_akses`
--
ALTER TABLE `tbl_menu_akses`
  ADD CONSTRAINT `tbl_menu_akses_ibfk_1` FOREIGN KEY (`akses_level_id`) REFERENCES `tbl_level` (`level_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_menu_akses_ibfk_2` FOREIGN KEY (`akses_menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD CONSTRAINT `tbl_pengeluaran_ibfk_1` FOREIGN KEY (`pengeluaran_users_id`) REFERENCES `tbl_users` (`users_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi_keluar`
--
ALTER TABLE `tbl_transaksi_keluar`
  ADD CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`tk_tm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`);

--
-- Constraints for table `tbl_transaksi_masuk`
--
ALTER TABLE `tbl_transaksi_masuk`
  ADD CONSTRAINT `tbl_transaksi_masuk_ibfk_2` FOREIGN KEY (`tm_users_id_cus`) REFERENCES `tbl_users` (`users_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`users_level_id`) REFERENCES `tbl_menu_akses` (`akses_level_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
