-- MariaDB dump 10.19  Distrib 10.11.3-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: slkapp
-- ------------------------------------------------------
-- Server version	10.11.3-MariaDB-1:10.11.3+maria~ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_bulan`
--

DROP TABLE IF EXISTS `app_bulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bulan` (
  `index` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bulan`
--

LOCK TABLES `app_bulan` WRITE;
/*!40000 ALTER TABLE `app_bulan` DISABLE KEYS */;
INSERT INTO `app_bulan` VALUES
('01','Januari',NULL,NULL),
('02','Febuari',NULL,NULL),
('03','Maret',NULL,NULL),
('04','April',NULL,NULL),
('05','Mei',NULL,NULL),
('06','Juni',NULL,NULL),
('07','Juli',NULL,NULL),
('08','Agustus',NULL,NULL),
('09','September',NULL,NULL),
('10','Oktober',NULL,NULL),
('11','November',NULL,NULL),
('12','Desember',NULL,NULL);
/*!40000 ALTER TABLE `app_bulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_konfigurasi`
--

DROP TABLE IF EXISTS `app_konfigurasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_konfigurasi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_konfigurasi`
--

LOCK TABLES `app_konfigurasi` WRITE;
/*!40000 ALTER TABLE `app_konfigurasi` DISABLE KEYS */;
INSERT INTO `app_konfigurasi` VALUES
(1,'minimal_pembelian_grosir','5','2020-10-10 14:08:07','2020-10-10 07:33:23'),
(2,'logo_kwitansi','1603554320.png',NULL,'2020-10-24 08:45:20'),
(3,'alamat_kwitansi','Patokan prapatan asko, Rt.001/Rw 004 Mustikasari kec.mustika jaya,<br />\r\n RT.001/RW.004, Mustikasari, Bantargebang, <br />\r\nKota Bks, Jawa Barat 17151',NULL,'2020-10-24 08:45:55');
/*!40000 ALTER TABLE `app_konfigurasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_master_barang`
--

DROP TABLE IF EXISTS `app_master_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_master_barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `master_barang_kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_jual_grosir` int(11) NOT NULL,
  `min_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_master_barang`
--

LOCK TABLES `app_master_barang` WRITE;
/*!40000 ALTER TABLE `app_master_barang` DISABLE KEYS */;
INSERT INTO `app_master_barang` VALUES
(4,27,'Belajar Pemograman PHP Dasar','Unit',45000,65000,62000,10,'2020-10-07 10:03:02','2023-09-15 12:49:57');
/*!40000 ALTER TABLE `app_master_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_master_barang_kategori`
--

DROP TABLE IF EXISTS `app_master_barang_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_master_barang_kategori` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_master_barang_kategori`
--

LOCK TABLES `app_master_barang_kategori` WRITE;
/*!40000 ALTER TABLE `app_master_barang_kategori` DISABLE KEYS */;
INSERT INTO `app_master_barang_kategori` VALUES
(27,'Buku','2020-10-07 09:18:52','2023-09-15 12:48:54'),
(28,'Alat Tulis','2020-10-07 09:18:56','2023-09-15 12:49:06');
/*!40000 ALTER TABLE `app_master_barang_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_pembelian`
--

DROP TABLE IF EXISTS `app_pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_pembelian` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `master_barang_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_pembelian`
--

LOCK TABLES `app_pembelian` WRITE;
/*!40000 ALTER TABLE `app_pembelian` DISABLE KEYS */;
INSERT INTO `app_pembelian` VALUES
(10,4,1,1000,45000,'2023-09-15','2023-09-15 12:59:56','2023-09-15 12:59:56');
/*!40000 ALTER TABLE `app_pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_penjualan`
--

DROP TABLE IF EXISTS `app_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_invoice` int(11) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `tanggal_penjualan` date NOT NULL,
  `tunai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_penjualan`
--

LOCK TABLES `app_penjualan` WRITE;
/*!40000 ALTER TABLE `app_penjualan` DISABLE KEYS */;
INSERT INTO `app_penjualan` VALUES
(3,230915001,'Tiara Canda Alea','2023-09-15',650000,'2023-09-15 13:00:27','2023-09-15 13:00:27'),
(4,230915002,'Silviana','2023-09-15',350000,'2023-09-15 13:02:22','2023-09-15 13:02:22');
/*!40000 ALTER TABLE `app_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_penjualan_item`
--

DROP TABLE IF EXISTS `app_penjualan_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_penjualan_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_penjualan_item`
--

LOCK TABLES `app_penjualan_item` WRITE;
/*!40000 ALTER TABLE `app_penjualan_item` DISABLE KEYS */;
INSERT INTO `app_penjualan_item` VALUES
(4,3,10,10,62000,0,'2023-09-15 13:00:27','2023-09-15 13:00:27'),
(5,4,10,5,62000,0,'2023-09-15 13:02:22','2023-09-15 13:02:22');
/*!40000 ALTER TABLE `app_penjualan_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_supplier`
--

DROP TABLE IF EXISTS `app_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_supplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_supplier`
--

LOCK TABLES `app_supplier` WRITE;
/*!40000 ALTER TABLE `app_supplier` DISABLE KEYS */;
INSERT INTO `app_supplier` VALUES
(1,'Supplier A','088219900980','Kota Bogor','2020-10-07 10:44:33','2023-09-15 12:51:19');
/*!40000 ALTER TABLE `app_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2020_10_05_143318_create_app_master_barang_kategori_table',2),
(5,'2020_10_05_143423_create_app_master_barang_table',2),
(6,'2020_10_05_143619_create_app_supplier_table',2),
(7,'2020_10_05_143841_create_app_pembelian_table',2),
(8,'2020_10_05_144201_create_app_konfigurasi_table',2),
(9,'2020_10_05_144349_create_app_penjualan_table',2),
(10,'2020_10_05_144433_create_app_penjualan_item_table',2),
(11,'2014_10_12_200000_add_two_factor_columns_to_users_table',3),
(12,'2019_12_14_000001_create_personal_access_tokens_table',3),
(13,'2020_10_07_175154_create_sessions_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES
('xENFQ7Ba9GdnMDH6G9Kq2ioJqhHtD1Y6PlYIcqlE',1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTTBNNDlWbFdGSDlRVVB5dVlLc2pndHBuTVBUWWJXeFJlbXM4aHpsdiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vbG9jYWxob3N0LzIwMjAvc2xrYXBwL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkSUNOWnBrYXBMVTl3U2htbnpaMU9qLjZiOVZ0U3c2TFlXSFJyNDZ2RHZ1M1FsM3NxNmg2LlMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJElDTlpwa2FwTFU5d1NobW56WjFPai42YjlWdFN3NkxZV0hScjQ2dkR2dTNRbDNzcTZoNi5TIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1603612412);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_jual_grosir` double NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `qty` double NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ket` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier` (`supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES
(1,'Tes Barang 1',200,300,350,'1',200,'Sparepart','Pcs','2020-10-07 07:21:16',1,'2020-10-07 07:21:16',1,1,'');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `kontak` text NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES
(1,'yamaha','123123','dasdqwdasd','2020-10-07 04:04:34','2020-10-07 04:04:34',1),
(2,'IPONE','123214','Japan','2020-10-07 04:04:34','2020-10-07 04:04:34',1);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Andi Aditya','admin','freelancer.andi@gmail.com',NULL,'$2y$12$ICNZpkapLU9wShmnzZ1Oj.6b9VtSw6LYWHRr46vDvu3Ql3sq6h6.S',NULL,NULL,NULL,'2020-10-07 11:00:44','2020-10-07 11:00:44');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_barang_terjual`
--

DROP TABLE IF EXISTS `v_barang_terjual`;
/*!50001 DROP VIEW IF EXISTS `v_barang_terjual`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_barang_terjual` AS SELECT
 1 AS `pembelian_id`,
  1 AS `terjual`,
  1 AS `master_barang_id` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_notif`
--

DROP TABLE IF EXISTS `v_notif`;
/*!50001 DROP VIEW IF EXISTS `v_notif`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_notif` AS SELECT
 1 AS `master_barang_id` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_rekap_laba`
--

DROP TABLE IF EXISTS `v_rekap_laba`;
/*!50001 DROP VIEW IF EXISTS `v_rekap_laba`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_rekap_laba` AS SELECT
 1 AS `penjualan_id`,
  1 AS `laba`,
  1 AS `tanggal_penjualan` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_rekap_laba_barang`
--

DROP TABLE IF EXISTS `v_rekap_laba_barang`;
/*!50001 DROP VIEW IF EXISTS `v_rekap_laba_barang`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_rekap_laba_barang` AS SELECT
 1 AS `laba`,
  1 AS `master_barang_id` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_rekap_penjualan`
--

DROP TABLE IF EXISTS `v_rekap_penjualan`;
/*!50001 DROP VIEW IF EXISTS `v_rekap_penjualan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_rekap_penjualan` AS SELECT
 1 AS `penjualan_id`,
  1 AS `harga_total_jual`,
  1 AS `modal`,
  1 AS `tanggal_penjualan` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_rekap_penjualan_item`
--

DROP TABLE IF EXISTS `v_rekap_penjualan_item`;
/*!50001 DROP VIEW IF EXISTS `v_rekap_penjualan_item`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_rekap_penjualan_item` AS SELECT
 1 AS `penjualan_id`,
  1 AS `harga_total_jual`,
  1 AS `modal`,
  1 AS `tanggal_penjualan`,
  1 AS `master_barang_id` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_stok_barang`
--

DROP TABLE IF EXISTS `v_stok_barang`;
/*!50001 DROP VIEW IF EXISTS `v_stok_barang`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_stok_barang` AS SELECT
 1 AS `master_barang_id`,
  1 AS `min_stok`,
  1 AS `stok` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_stok_penjualan`
--

DROP TABLE IF EXISTS `v_stok_penjualan`;
/*!50001 DROP VIEW IF EXISTS `v_stok_penjualan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_stok_penjualan` AS SELECT
 1 AS `id`,
  1 AS `master_barang_id`,
  1 AS `pembelian_id`,
  1 AS `stok` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_barang_terjual`
--

/*!50001 DROP VIEW IF EXISTS `v_barang_terjual`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_barang_terjual` AS select if(`app_penjualan_item`.`pembelian_id` is null,`app_pembelian`.`id`,`app_penjualan_item`.`pembelian_id`) AS `pembelian_id`,if(`app_penjualan_item`.`qty` is null,0,sum(`app_penjualan_item`.`qty`)) AS `terjual`,`app_pembelian`.`master_barang_id` AS `master_barang_id` from (`app_pembelian` left join `app_penjualan_item` on(`app_penjualan_item`.`pembelian_id` = `app_pembelian`.`id`)) group by `app_pembelian`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_notif`
--

/*!50001 DROP VIEW IF EXISTS `v_notif`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_notif` AS select `v_stok_barang`.`master_barang_id` AS `master_barang_id` from `v_stok_barang` where `v_stok_barang`.`stok` < `v_stok_barang`.`min_stok` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rekap_laba`
--

/*!50001 DROP VIEW IF EXISTS `v_rekap_laba`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rekap_laba` AS select `v_rekap_penjualan`.`penjualan_id` AS `penjualan_id`,`v_rekap_penjualan`.`harga_total_jual` - `v_rekap_penjualan`.`modal` AS `laba`,`v_rekap_penjualan`.`tanggal_penjualan` AS `tanggal_penjualan` from `v_rekap_penjualan` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rekap_laba_barang`
--

/*!50001 DROP VIEW IF EXISTS `v_rekap_laba_barang`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rekap_laba_barang` AS select sum(`v_rekap_penjualan_item`.`harga_total_jual` - `v_rekap_penjualan_item`.`modal`) AS `laba`,`v_rekap_penjualan_item`.`master_barang_id` AS `master_barang_id` from `v_rekap_penjualan_item` group by `v_rekap_penjualan_item`.`master_barang_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rekap_penjualan`
--

/*!50001 DROP VIEW IF EXISTS `v_rekap_penjualan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rekap_penjualan` AS select `app_penjualan_item`.`penjualan_id` AS `penjualan_id`,sum(`app_penjualan_item`.`harga_jual` * `app_penjualan_item`.`qty` - `app_penjualan_item`.`diskon`) AS `harga_total_jual`,sum(`app_penjualan_item`.`qty`) * `app_pembelian`.`harga_beli` AS `modal`,`app_penjualan`.`tanggal_penjualan` AS `tanggal_penjualan` from ((`app_penjualan_item` join `app_pembelian` on(`app_penjualan_item`.`pembelian_id` = `app_pembelian`.`id`)) join `app_penjualan` on(`app_penjualan`.`id` = `app_penjualan_item`.`penjualan_id`)) group by `app_penjualan_item`.`penjualan_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_rekap_penjualan_item`
--

/*!50001 DROP VIEW IF EXISTS `v_rekap_penjualan_item`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_rekap_penjualan_item` AS select `app_penjualan_item`.`penjualan_id` AS `penjualan_id`,sum(`app_penjualan_item`.`harga_jual` * `app_penjualan_item`.`qty` - `app_penjualan_item`.`diskon`) AS `harga_total_jual`,sum(`app_penjualan_item`.`qty`) * `app_pembelian`.`harga_beli` AS `modal`,`app_penjualan`.`tanggal_penjualan` AS `tanggal_penjualan`,`app_pembelian`.`master_barang_id` AS `master_barang_id` from ((`app_penjualan_item` join `app_pembelian` on(`app_penjualan_item`.`pembelian_id` = `app_pembelian`.`id`)) join `app_penjualan` on(`app_penjualan`.`id` = `app_penjualan_item`.`penjualan_id`)) group by `app_penjualan_item`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_stok_barang`
--

/*!50001 DROP VIEW IF EXISTS `v_stok_barang`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_stok_barang` AS select `app_master_barang`.`id` AS `master_barang_id`,`app_master_barang`.`min_stok` AS `min_stok`,sum(`v_stok_penjualan`.`stok`) AS `stok` from (`app_master_barang` left join `v_stok_penjualan` on(`v_stok_penjualan`.`master_barang_id` = `app_master_barang`.`id`)) group by `v_stok_penjualan`.`master_barang_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_stok_penjualan`
--

/*!50001 DROP VIEW IF EXISTS `v_stok_penjualan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_stok_penjualan` AS select `app_pembelian`.`id` AS `id`,`app_pembelian`.`master_barang_id` AS `master_barang_id`,`app_pembelian`.`id` AS `pembelian_id`,`app_pembelian`.`qty` - `v_barang_terjual`.`terjual` AS `stok` from (`app_pembelian` join `v_barang_terjual` on(`v_barang_terjual`.`pembelian_id` = `app_pembelian`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-15 13:05:55
