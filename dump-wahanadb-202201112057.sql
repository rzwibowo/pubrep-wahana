-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: wahanadb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

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
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nik_customer` varchar(16) DEFAULT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `telepon_customer` varchar(20) DEFAULT NULL,
  `alamat_customer` text,
  `jenis_kelamin_customer` enum('L','P') NOT NULL,
  `id_propinsi` int(11) DEFAULT NULL,
  `id_kabupaten` int(11) DEFAULT NULL,
  `status_customer` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_galeri`
--

DROP TABLE IF EXISTS `tbl_galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `nama_galeri` varchar(100) DEFAULT NULL,
  `judul_galeri` varchar(100) DEFAULT NULL,
  `teks_galeri` text,
  `tipe_galeri` enum('BNR','KTN') NOT NULL DEFAULT 'KTN',
  `status_galeri` char(1) DEFAULT 'Y',
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_investor`
--

DROP TABLE IF EXISTS `tbl_investor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_investor` (
  `id_investor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_investor` varchar(100) DEFAULT NULL,
  `persen_bagi_hasil` float DEFAULT NULL,
  `status_investor` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_investor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_jabatan`
--

DROP TABLE IF EXISTS `tbl_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  `status_jabatan` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_kabupaten`
--

DROP TABLE IF EXISTS `tbl_kabupaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kabupaten` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `id_propinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `status_kabupaten` char(1) DEFAULT 'Y',
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_kabupaten`),
  KEY `fk_city_state` (`id_propinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=2024 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_karyawan`
--

DROP TABLE IF EXISTS `tbl_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nik_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat_karyawan` text,
  `telepon_karyawan` varchar(100) DEFAULT NULL,
  `username_karyawan` varchar(20) NOT NULL,
  `password_karyawan` varchar(32) NOT NULL,
  `status_karyawan` char(1) NOT NULL DEFAULT 'Y',
  `id_jabatan` int(11) NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  KEY `tbl_karyawan_FK` (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_kategori_biaya`
--

DROP TABLE IF EXISTS `tbl_kategori_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori_biaya` (
  `id_kategori_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_biaya` varchar(100) DEFAULT NULL,
  `status_kategori_biaya` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_kategori_kendaraan`
--

DROP TABLE IF EXISTS `tbl_kategori_kendaraan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori_kendaraan` (
  `id_kategori_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori_kendaraan` varchar(5) NOT NULL,
  `nama_kategori_kendaraan` varchar(100) NOT NULL,
  `tarif_kategori_kendaraan` int(11) NOT NULL,
  `jenis_tarif_kategori_kendaraan` varchar(100) NOT NULL,
  `status_kategori_kendaraan` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kategori_kendaraan`),
  UNIQUE KEY `tbl_kategori_kendaraan_UN` (`kode_kategori_kendaraan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_penunjang`
--

DROP TABLE IF EXISTS `tbl_penunjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_penunjang` (
  `id_penunjang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penunjang` varchar(100) NOT NULL,
  `status_penunjang` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penunjang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_propinsi`
--

DROP TABLE IF EXISTS `tbl_propinsi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_propinsi` (
  `id_propinsi` int(11) NOT NULL AUTO_INCREMENT,
  `id_negara` int(11) NOT NULL DEFAULT '1',
  `nama_propinsi` varchar(100) NOT NULL,
  `status_propinsi` char(1) DEFAULT 'Y',
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_propinsi`),
  KEY `fk_state_country` (`id_negara`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_transaksi_biaya`
--

DROP TABLE IF EXISTS `tbl_transaksi_biaya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_biaya` (
  `id_transaksi_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(50) NOT NULL,
  `tanggal_transaksi_biaya` date DEFAULT NULL,
  `id_kategori_biaya` int(11) DEFAULT NULL,
  `nilai_transaksi_biaya` int(11) DEFAULT NULL,
  `jenis_transaksi_biaya` enum('harian','bulanan','tahunan') DEFAULT NULL,
  `status_transaksi_biaya` char(1) DEFAULT 'Y',
  PRIMARY KEY (`id_transaksi_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_transaksi_parkir`
--

DROP TABLE IF EXISTS `tbl_transaksi_parkir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_parkir` (
  `id_transaksi_parkir` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_transaksi_parkir` datetime NOT NULL,
  `tgl_transaksi_parkir_keluar` datetime DEFAULT NULL,
  `id_kategori_kendaraan` int(11) NOT NULL,
  `no_kendaraan` varchar(12) NOT NULL,
  `nilai_transaksi_parkir` int(11) NOT NULL,
  `in_transaksi_parkir` int(11) DEFAULT NULL,
  `out_transaksi_parkir` int(11) DEFAULT NULL,
  `status_transaksi_parkir` char(1) NOT NULL DEFAULT 'Y',
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_parkir`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_transaksi_penunjang`
--

DROP TABLE IF EXISTS `tbl_transaksi_penunjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_penunjang` (
  `id_transaksi_penunjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_tiket` int(11) NOT NULL,
  `id_penunjang` int(11) NOT NULL,
  `jumlah_penunjang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_penunjang`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_transaksi_tiket`
--

DROP TABLE IF EXISTS `tbl_transaksi_tiket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_tiket` (
  `id_transaksi_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi_tiket` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tanggal_transaksi_tiket` datetime DEFAULT NULL,
  `grand_total_transaksi_tiket` int(11) DEFAULT NULL,
  `status_transaksi_tiket` char(1) NOT NULL DEFAULT 'Y',
  `keterangan_transaksi_tiket` text,
  PRIMARY KEY (`id_transaksi_tiket`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_transaksi_tiket_detail`
--

DROP TABLE IF EXISTS `tbl_transaksi_tiket_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_transaksi_tiket_detail` (
  `id_transaksi_tiket_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_tiket` int(11) NOT NULL,
  `nik_rombongan` varchar(16) DEFAULT NULL,
  `nama_rombongan` varchar(100) NOT NULL,
  `telepon_rombongan` varchar(20) DEFAULT NULL,
  `alamat_rombongan` text,
  `jenis_kelamin_rombongan` enum('L','P') NOT NULL,
  `biaya_personel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_tiket_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_versi`
--

DROP TABLE IF EXISTS `tbl_versi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_versi` (
  `versi` varchar(10) NOT NULL,
  `keterangan_versi` varchar(500) DEFAULT NULL,
  `download_url` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`versi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'wahanadb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-11 20:57:15
