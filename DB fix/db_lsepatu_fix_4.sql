-- MySQL dump 10.16  Distrib 10.1.35-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: db_lsepatu3
-- ------------------------------------------------------
-- Server version	10.1.35-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `db_lsepatu3`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_lsepatu_fix` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_lsepatu_fix`;

--
-- Table structure for table `tbl_detail_transaksi_masuk`
--

DROP TABLE IF EXISTS `tbl_detail_transaksi_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_detail_transaksi_masuk` (
  `dtm_id` int(11) NOT NULL AUTO_INCREMENT,
  `dtm_nofak` varchar(15) DEFAULT NULL,
  `dtm_paket_id` varchar(15) DEFAULT NULL,
  `dtm_paket_nama` varchar(15) DEFAULT NULL,
  `dtm_satuan` varchar(15) DEFAULT NULL,
  `dtm_harga` double DEFAULT NULL,
  `dtm_qty` int(11) DEFAULT NULL,
  `dtm_total` double DEFAULT NULL,
  PRIMARY KEY (`dtm_id`),
  KEY `dtm_nofak` (`dtm_nofak`),
  KEY `dtm_paket_id` (`dtm_paket_id`),
  CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_1` FOREIGN KEY (`dtm_paket_id`) REFERENCES `tbl_paket` (`paket_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_detail_transaksi_masuk_ibfk_2` FOREIGN KEY (`dtm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_detail_transaksi_masuk`
--

LOCK TABLES `tbl_detail_transaksi_masuk` WRITE;
/*!40000 ALTER TABLE `tbl_detail_transaksi_masuk` DISABLE KEYS */;
INSERT INTO `tbl_detail_transaksi_masuk` VALUES (29,'TM1905290003','PK01','deep clean','satu pasang',20000,1,20000);
/*!40000 ALTER TABLE `tbl_detail_transaksi_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_level`
--

DROP TABLE IF EXISTS `tbl_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_level` (
  `level_id` int(2) NOT NULL AUTO_INCREMENT,
  `level_role` varchar(15) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_level`
--

LOCK TABLES `tbl_level` WRITE;
/*!40000 ALTER TABLE `tbl_level` DISABLE KEYS */;
INSERT INTO `tbl_level` VALUES (1,'owner'),(2,'pegawai'),(3,'customer');
/*!40000 ALTER TABLE `tbl_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu` (
  `menu_id` int(1) NOT NULL,
  `menu_title` varchar(20) NOT NULL,
  `menu_icon` varchar(100) NOT NULL,
  `menu_url` varchar(128) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu`
--

LOCK TABLES `tbl_menu` WRITE;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` VALUES (1,'Transaksi Masuk','<i class=\"fa fa-cart-plus\" aria-hidden=\"true\"></i>',''),(2,'Transaksi Keluar','<i class=\"fa fa-cart-arrow-down\"></i>',''),(3,'Data Paket','<i class=\"fa fa-list\" aria-hidden=\"true\"></i>',''),(4,'Data Admin','<i class=\"fa fa-user\" aria-hidden=\"true\"></i>',''),(5,'Data User','<i class=\"fa fa-users\" aria-hidden=\"true\"></i>',''),(6,'Data Pengeluaran','<i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i>',''),(7,'Laporan','<i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i>',''),(8,'Registrasi Pegawai','<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>',''),(9,'Registrasi Customer','<i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>',''),(10,'Profil','<i class=\"fa fa-street-view\" aria-hidden=\"true\"></i>','');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_menu_akses`
--

DROP TABLE IF EXISTS `tbl_menu_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_menu_akses` (
  `akses_id` int(2) NOT NULL,
  `akses_level_id` int(2) NOT NULL,
  `akses_menu_id` int(2) NOT NULL,
  PRIMARY KEY (`akses_id`),
  KEY `tbl_menu_akses_ibfk_1` (`akses_level_id`),
  KEY `tbl_menu_akses_ibfk_2` (`akses_menu_id`),
  CONSTRAINT `tbl_menu_akses_ibfk_1` FOREIGN KEY (`akses_level_id`) REFERENCES `tbl_level` (`level_id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_menu_akses_ibfk_2` FOREIGN KEY (`akses_menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_menu_akses`
--

LOCK TABLES `tbl_menu_akses` WRITE;
/*!40000 ALTER TABLE `tbl_menu_akses` DISABLE KEYS */;
INSERT INTO `tbl_menu_akses` VALUES (1,1,3),(2,1,4),(3,1,5),(4,1,6),(5,1,7),(6,1,8),(7,1,9),(8,2,1),(9,2,2),(10,2,6),(11,2,9),(12,2,10),(13,2,5),(14,2,7),(15,3,1),(16,3,2),(17,3,3);
/*!40000 ALTER TABLE `tbl_menu_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paket`
--

DROP TABLE IF EXISTS `tbl_paket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paket` (
  `paket_id` varchar(15) NOT NULL,
  `paket_nama` varchar(100) DEFAULT NULL,
  `paket_satuan` varchar(100) DEFAULT NULL,
  `paket_harga` double DEFAULT NULL,
  PRIMARY KEY (`paket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paket`
--

LOCK TABLES `tbl_paket` WRITE;
/*!40000 ALTER TABLE `tbl_paket` DISABLE KEYS */;
INSERT INTO `tbl_paket` VALUES ('PK01','deep clean','satu pasang',20000),('PK02','unyellowing','satu pasang',25000),('PK03','recolour','satu pasang',80000);
/*!40000 ALTER TABLE `tbl_paket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pengeluaran`
--

DROP TABLE IF EXISTS `tbl_pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pengeluaran` (
  `pengeluaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `pengeluaran_users_id` varchar(111) NOT NULL,
  `pengeluaran_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengeluaran_nama` varchar(100) DEFAULT NULL,
  `pengeluaran_harga` double DEFAULT NULL,
  `pengeluaran_keterangan` text,
  PRIMARY KEY (`pengeluaran_id`),
  KEY `pengeluaran_users_id` (`pengeluaran_users_id`),
  CONSTRAINT `tbl_pengeluaran_ibfk_1` FOREIGN KEY (`pengeluaran_users_id`) REFERENCES `tbl_users` (`users_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pengeluaran`
--

LOCK TABLES `tbl_pengeluaran` WRITE;
/*!40000 ALTER TABLE `tbl_pengeluaran` DISABLE KEYS */;
INSERT INTO `tbl_pengeluaran` VALUES (1,'0','2019-04-27 23:35:01','sabun cuci merk apa',90000,'untuk satu bulan');
/*!40000 ALTER TABLE `tbl_pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_token`
--

DROP TABLE IF EXISTS `tbl_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_token` (
  `tk_id` int(1) NOT NULL AUTO_INCREMENT,
  `tk_email` varchar(128) NOT NULL,
  `tk_token` varchar(128) NOT NULL,
  `tk_time` int(11) NOT NULL,
  PRIMARY KEY (`tk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_token`
--

LOCK TABLES `tbl_token` WRITE;
/*!40000 ALTER TABLE `tbl_token` DISABLE KEYS */;
INSERT INTO `tbl_token` VALUES (23,'slenderyman1@gmail.com','Y1bQO8kRolsS8+8rXt0ABRwSfCR7PVd7WjLMMpnLP/w=',1557805558),(24,'korewamovie01@gmail.com','Z0MMP+qdGLM5PHTAOWPtX11fxOLZ9Fb0G/9+JMTWFDI=',1557805581),(32,'yadribl@gmail.com','CsetmzMBnPLcyQtR06TEzkCIftcltmmZiUICd7+DRq0=',1557893458),(33,'yadribl@gmail.com','VOUlS1MiJAuE4Xyp0dbjEiy/M6No7caO3KlO7n2eSZw=',1558194818),(34,'yadribl@gmail.com','BEFIVd4kLsS+aFcjh7jFR0PzBDKdm5Fl42ABK+Wl4Hw=',1558194905),(35,'yadribl@gmail.com','7rV+7eh8Pz8iA6+8jS1/CmTmZkJHVqPbJjhotjumS/U=',1558194959),(36,'yadribl@gmail.com','aotq+P0lD+2EyUWxEehVZmG+36tFMmH9rZh7sICiDJg=',1558194979),(37,'yadribl@gmail.com','4CE74P/KnUNo/dhE7sAOweyuVrM9/a3qGAFzcLEsWW8=',1558194989),(39,'korewamovie01@gmail.com','asl7l0D9GVy49YaXefw6UBFEI92td6/qJoVzfDhoo68=',1558538436),(40,'yadri.amz@gmail.com','Uq37uuiyl1aUBt5r7+5XGGdy921iDuQWzGuipVv/7QM=',1558539217),(45,'mochnurcholes@gmail.com','pp36RN11GxeUeJurJ87v2aG97XRZNUocE3t7wyPKN40=',1558636316),(46,'korewamovie01@gmail.com','WbHYX8x2w2ScsU94SsklgqbVTiPOwxM+MxRwcuND3Mo=',1558636347),(47,'farhan7rizal@gmail.com','4wuLpeyD+f2/JBbfM9Is0thYJKrzeLcSHQ5SUstqj+s=',1558636717),(48,'mochnurcholes@gmail.com','iMFN4oE8Ak377CxSHo5lagdzeEJpiltMlnNTCv/KFvA=',1558651303),(49,'slenderyman1@gmail.com','qzhvi4pfvUkoZl5zI//ubnS2Z0rMJm00JV1aSPwKnlk=',1558652580);
/*!40000 ALTER TABLE `tbl_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaksi_keluar`
--

DROP TABLE IF EXISTS `tbl_transaksi_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_keluar` (
  `tk_nofak` varchar(15) NOT NULL,
  `tk_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tk_tm_nofak` varchar(15) DEFAULT NULL,
  `tk_total_sepatu` double NOT NULL,
  `tk_total` double DEFAULT NULL,
  `tk_jml_uang` double DEFAULT NULL,
  `tk_kembalian` double DEFAULT NULL,
  `tk_admin_id` int(11) DEFAULT NULL,
  `tk_user_id` int(11) DEFAULT NULL,
  `tk_nama` varchar(150) DEFAULT NULL,
  `tk_alamat` varchar(150) DEFAULT NULL,
  `tk_no_telp` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`tk_nofak`),
  KEY `tk_tm_nofak` (`tk_tm_nofak`),
  CONSTRAINT `tbl_transaksi_keluar_ibfk_1` FOREIGN KEY (`tk_tm_nofak`) REFERENCES `tbl_transaksi_masuk` (`tm_nofak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi_keluar`
--

LOCK TABLES `tbl_transaksi_keluar` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi_keluar` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_keluar` VALUES ('TK1905290001','2019-05-29 07:29:27','TM1905290003',1,20000,1,-19999,2,20000,'w','no','no');
/*!40000 ALTER TABLE `tbl_transaksi_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_transaksi_masuk`
--

DROP TABLE IF EXISTS `tbl_transaksi_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `tm_users_id_peg` int(11) NOT NULL,
  PRIMARY KEY (`tm_nofak`),
  KEY `tm_users_id_cus` (`tm_users_id_cus`),
  CONSTRAINT `tbl_transaksi_masuk_ibfk_2` FOREIGN KEY (`tm_users_id_cus`) REFERENCES `tbl_users` (`users_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_transaksi_masuk`
--

LOCK TABLES `tbl_transaksi_masuk` WRITE;
/*!40000 ALTER TABLE `tbl_transaksi_masuk` DISABLE KEYS */;
INSERT INTO `tbl_transaksi_masuk` VALUES ('TM1905290001','2019-05-29 06:32:13',0,0,'','0','a','a','','belum','belum',2),('TM1905290002','2019-05-29 06:57:49',0,0,'','0','q','a','','belum','belum',2),('TM1905290003','2019-05-29 07:28:25',1,20000,'gsgf','0','w','w','','belum','sudah',2);
/*!40000 ALTER TABLE `tbl_transaksi_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `users_id` varchar(111) NOT NULL,
  `users_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `users_nama` varchar(150) DEFAULT NULL,
  `users_password` varchar(150) DEFAULT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_level_id` int(2) DEFAULT NULL,
  `users_status` varchar(2) DEFAULT '1',
  PRIMARY KEY (`users_id`),
  KEY `admin_level` (`users_level_id`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`users_level_id`) REFERENCES `tbl_menu_akses` (`akses_level_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES ('0','2019-04-27 23:34:59','kosong','kosong','',3,'1'),('51','2019-05-14 21:10:58','yadri','$2y$10$BkuERaA./Yek5fqIbRGXq.hZJLapq71lHMKgLgxZ8U7hbXRzguJT.','yadribl@gmail.com',1,'1'),('53','2019-05-22 08:20:36','farhanrizal','$2y$10$50sTywXt5BjL9hGmKvT3G.tUaknHVII3ZzD.RMUI9ZkOreJ3KGLcG','korewamovie01@gmail.com',2,'1'),('54','2019-05-22 08:33:37','yamzal','$2y$10$6rpxopB5zClHeD8Qy3w/e.M9OfD/FjIQjNs2fheAzMjUlKjHzgXYe','yadri.amz@gmail.com',3,'1'),('60','2019-05-23 11:38:37','Farhan Rizal','$2y$10$hGVLxyJQtDqo3H8.WV1ukOn4UrgaXcJgQy/toX6e.pfFw3pygOmim','farhan7rizal@gmail.com',2,'0'),('61','2019-05-23 15:41:43','irfan siddiq','$2y$10$XU.1L38H4J2o3DcN9ZIg1uPxLEFjpAmeBqJJzyuwNVOkNyOhqVWhi','mochnurcholes@gmail.com',2,'0'),('62','2019-05-23 16:03:00','test','$2y$10$NzHmesIlZjrH570hlkcT0.S4b3aDJRMT0/4LizST1EzkfP8tt8Cu2','slenderyman1@gmail.com',2,'0');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-29 14:31:46
