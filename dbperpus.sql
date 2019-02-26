-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbperpus
CREATE DATABASE IF NOT EXISTS `dbperpus` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbperpus`;

-- Dumping structure for table dbperpus.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '0',
  `email` varchar(255) DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.admins: ~0 rows (approximately)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Lvh0fIwRiEaefiI9GIAP.ehvbQGvpGd807RIZCwgP9KHAm0bqNR0m', NULL, '2019-02-06 16:24:01', '2019-02-06 16:24:01');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table dbperpus.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbperpus.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` int(11) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `foto` text,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`),
  UNIQUE KEY `no_anggota` (`no_anggota`),
  KEY `jk` (`jk`)
) ENGINE=InnoDB AUTO_INCREMENT=1217 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_anggota: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_anggota` DISABLE KEYS */;
INSERT INTO `tb_anggota` (`kd_anggota`, `no_anggota`, `nama`, `tempat`, `tgl_lahir`, `jk`, `alamat`, `kota`, `pekerjaan`, `telp`, `email`, `user_name`, `user_password`, `foto`, `status`) VALUES
	(1214, 'A1214012019', 'Abdul Rofiq', 'Sragen', '2018-12-30', 1, 'Gondang', 'Sragen', 'Mahasiswa', '081328864074', 'abdulrafiqyusufa84@gmail.com', 'ASYIO', '6dd9234c0eb46ea42d02a966dc8e228e', '02-2019-avatar04.png', '1'),
	(1215, 'A1215022019', 'ARY', 'Sragen', '2019-01-14', 1, 'Gondang', 'Sragen', 'Mahasiswa', '081328864074', 'abdulrafiqyusufa02@gmail.com', 'iniusername', '6dd9234c0eb46ea42d02a966dc8e228e', NULL, '1'),
	(1216, 'A1216022019', 'iyi', 'sdr', '2019-01-30', 1, 'hkjkj', 'hkjkj', 'Mahasiswa', '081328864074', 'abdulrafiqyusufa84@gmail.com', 'ASYIO', '202cb962ac59075b964b07152d234b70', NULL, '1');
/*!40000 ALTER TABLE `tb_anggota` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `kd_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `kd_pengarang` int(11) DEFAULT NULL,
  `kd_penerbit` int(11) DEFAULT NULL,
  `tempat_terbit` varchar(50) DEFAULT NULL,
  `tahun_terbit` varchar(50) DEFAULT NULL,
  `kd_kategori` int(11) DEFAULT NULL,
  `halaman` varchar(50) DEFAULT NULL,
  `edisi` varchar(50) DEFAULT NULL,
  `ISBN` int(18) DEFAULT NULL,
  `cover` longtext,
  PRIMARY KEY (`kd_buku`),
  KEY `kd_pengarang` (`kd_pengarang`),
  KEY `kd_penerbit` (`kd_penerbit`),
  KEY `kd_kategori` (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_buku: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
INSERT INTO `tb_buku` (`kd_buku`, `judul`, `kd_pengarang`, `kd_penerbit`, `tempat_terbit`, `tahun_terbit`, `kd_kategori`, `halaman`, `edisi`, `ISBN`, `cover`) VALUES
	(4, 'Belajar', 102, 104, 'Surakarta', '2019', 3, '69', '1', 1264789891, '01-2019-g8.jpg'),
	(5, 'INi', 102, 104, 'Surakarta', '2019', 8, '69', '1', 1234567891, '02-2019-g3.jpg'),
	(6, 'Buku Coding', 103, 105, 'Surakarta', '2019', 11, '20', '1', 123990483, '02-2019-g2.jpg'),
	(7, 'Baru', 102, 105, 'Surakarta', '2019', 3, '69', '1', 12345678, '02-2019-01-2019-g8.jpg'),
	(8, 'JUDUL', 104, 104, 'Sarta', '2019', 8, '69', '1', 123456789, '02-2019-02-2019-02-2019-avatar04.png');
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `singkatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_kategori: ~8 rows (approximately)
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` (`kd_kategori`, `nama_kategori`, `singkatan`) VALUES
	(3, 'Komputer', 'KOM'),
	(8, 'Hewan', 'HWNN'),
	(10, 'Tumbuhan', 'TMBH'),
	(11, 'Ilmuan', 'ILM'),
	(13, 'Hewani', 'HWN'),
	(14, 'Kompre', 'KPR'),
	(15, 'Kore', 'KRE'),
	(16, 'Hewana', 'HWNA'),
	(17, 'ininin', 'inin'),
	(18, 'Kompre', NULL),
	(19, 'Kore', NULL),
	(20, 'Kompre', NULL),
	(21, 'Kore', NULL),
	(22, 'Kompre', NULL),
	(23, 'Kore', NULL),
	(24, 'Kompre', NULL),
	(25, 'Kore', NULL);
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_koleksi_buku
CREATE TABLE IF NOT EXISTS `tb_koleksi_buku` (
  `no_induk_buku` varchar(50) NOT NULL,
  `kd_buku` int(11) DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  `tanggal_pengadaan` date DEFAULT NULL,
  `akses` varchar(50) DEFAULT NULL,
  `kd_rak` int(11) DEFAULT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_koleksi` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kd_koleksi`),
  UNIQUE KEY `no_induk_buku` (`no_induk_buku`),
  KEY `kd_buku` (`kd_buku`),
  KEY `kd_user` (`kd_user`),
  KEY `kd_rak` (`kd_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_koleksi_buku: ~17 rows (approximately)
/*!40000 ALTER TABLE `tb_koleksi_buku` DISABLE KEYS */;
INSERT INTO `tb_koleksi_buku` (`no_induk_buku`, `kd_buku`, `kd_user`, `tanggal_pengadaan`, `akses`, `kd_rak`, `sumber`, `status`, `kd_koleksi`) VALUES
	('B-0001--000001', 1, 1, '2019-01-07', 'Boleh Dipinjam', NULL, 'Kompas', 1, 1),
	('B-0001--000002', 1, 1, '2019-01-07', 'Boleh Dipinjam', NULL, 'Kompas', 1, 2),
	('B-0001--000003', 1, 1, '2019-01-23', 'Boleh Dipinjam', NULL, 'Kompas', 1, 3),
	('B-0001--000004', 1, 1, '2019-01-23', 'Boleh Dipinjam', NULL, 'Kompas', 1, 4),
	('B-0001-Kom-000007', 1, 1, '2019-01-07', 'Boleh Dipinjam', 1, 'Kompas', 1, 7),
	('B-0002-PMR-000008', 2, 1, '2019-01-21', 'Boleh Dipinjam', 3, 'Perpus', 1, 8),
	('B-0002-PMR-000009', 2, 1, '2019-01-21', 'Boleh Dipinjam', 3, 'Perpus', 1, 9),
	('B-0004-KOM-000010', 4, 1, '2019-01-23', 'Boleh Dipinjam', 4, 'Kompas', 1, 10),
	('B-0004-KOM-000011', 4, 1, '2019-01-23', 'Boleh Dipinjam', 4, 'Kompas', 1, 11),
	('B-0004-KOM-000012', 4, 1, '2019-01-23', 'Boleh Dipinjam', 4, 'Kompas', 1, 12),
	('B-0004-KOM-000013', 4, 1, '2019-01-23', 'Boleh Dipinjam', 4, 'Kompas', 1, 13),
	('B-0004-KOM-000014', 4, 1, '2019-01-23', 'Boleh Dipinjam', 4, 'Kompas', 0, 14),
	('B-0006-ILM-000015', 6, 1, '2019-02-08', 'Boleh Dipinjam', 5, 'Dikasih', 0, 15),
	('B-0006-ILM-000016', 6, 1, '2019-02-08', 'Boleh Dipinjam', 5, 'Dikasih', 0, 16),
	('B-0004-KOM-000017', 4, 1, '2019-02-15', 'Boleh Dipinjam', 4, 'Kompas', 1, 17),
	('B-0004-KOM-000018', 4, 1, '2019-02-15', 'Boleh Dipinjam', 4, 'Kompas', 2, 18),
	('B-0004-KOM-000020', 4, 1, '2019-02-08', 'Boleh Dipinjam', 4, 'Kompas', 3, 20),
	('B-0007-KOM-000021', 7, 1, '2019-02-08', 'Boleh Dipinjam', 4, 'Kompas', 0, 21),
	('B-0004-KOM-000022', 4, 1, '2019-02-08', 'Boleh Dipinjam', 4, 'Kompas', 0, 22),
	('B-0004-KOM-000023', 4, 1, '2019-02-08', 'Boleh Dipinjam', 4, 'Kompas', 0, 23),
	('B-0008-HWNN-000024', 8, 1, '2019-01-07', 'Boleh Dipinjam', 4, 'Kompas', 0, 24),
	('B-0008-HWNN-000025', 8, 1, '2019-01-07', 'Boleh Dipinjam', 4, 'Kompas', 0, 25);
/*!40000 ALTER TABLE `tb_koleksi_buku` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_peminjaman
CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
  `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `no_pinjam` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `no_induk_buku` varchar(50) DEFAULT NULL,
  `no_anggota` varchar(50) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_pinjam`),
  UNIQUE KEY `no_pinjam` (`no_pinjam`),
  KEY `no_induk_buku` (`no_induk_buku`),
  KEY `kd_anggota` (`no_anggota`),
  KEY `denda` (`denda`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_peminjaman: ~18 rows (approximately)
/*!40000 ALTER TABLE `tb_peminjaman` DISABLE KEYS */;
INSERT INTO `tb_peminjaman` (`kd_pinjam`, `no_pinjam`, `tgl_pinjam`, `tgl_kembali`, `no_induk_buku`, `no_anggota`, `denda`, `status`) VALUES
	(1, 'P000001', '2019-01-28', '2019-01-31', 'B-0001--000001', 'A0001200078', NULL, 0),
	(2, 'P000002', '2019-01-28', '2019-01-31', 'B-0001--000004', 'A0001200078', NULL, 0),
	(3, 'P000003', '2019-01-28', '2019-01-31', 'B-0001--000004', 'A0001200078', NULL, 0),
	(4, 'P000004', '2019-01-28', '2019-01-31', 'B-0001--000002', 'A0001200078', NULL, 0),
	(5, 'P000005', '2019-01-28', '2019-01-31', 'B-0001--000002', 'A0001200078', NULL, 0),
	(6, 'P000006', '2019-01-28', '2019-01-31', 'B-0001--000003', 'A0001200078', NULL, 0),
	(7, 'P000007', '2019-01-28', '2019-01-31', 'B-0001-Kom-000007', 'A0001200078', NULL, 0),
	(8, 'P000008', '2019-01-28', '2019-01-31', 'B-0002-PMR-000008', 'A0001200078', NULL, 0),
	(9, 'P000009', '2019-01-28', '2019-01-31', 'B-0002-PMR-000008', 'A0001200078', NULL, 0),
	(10, 'P000010', '2019-01-28', '2019-01-31', 'B-0002-PMR-000008', 'A0001200078', NULL, 0),
	(11, 'P000011', '2019-01-30', '2019-02-02', 'B-0002-PMR-000009', 'A0001200078', NULL, 0),
	(12, 'P000012', '2019-01-31', '2019-02-03', 'B-0004-KOM-000010', 'A1214012019', NULL, 0),
	(13, 'P000013', '2019-01-31', '2019-02-03', 'B-0004-KOM-000010', 'A1214012019', NULL, 0),
	(14, 'P000014', '2019-02-01', '2019-02-04', 'B-0004-KOM-000011', 'A1214012019', NULL, 0),
	(15, 'P000015', '2019-02-01', '2019-02-04', 'B-0004-KOM-000011', 'A1214012019', NULL, 0),
	(16, 'P000016', '2019-02-01', '2019-02-04', 'B-0004-KOM-000011', 'A1214012019', NULL, 0),
	(17, 'P000017', '2019-02-04', '2019-02-07', 'B-0004-KOM-000012', 'A1214012019', NULL, 0),
	(18, 'P000018', '2019-02-04', '2019-02-07', 'B-0004-KOM-000012', 'A1214012019', 0, 1),
	(19, 'P000019', '2019-02-05', '2019-02-08', 'B-0004-KOM-000012', 'A1214012019', 0, 1),
	(20, 'P000020', '2019-02-15', '2019-02-18', 'B-0004-KOM-000012', 'A1215022019', NULL, 0),
	(21, 'P000021', '2019-02-18', '2019-02-21', 'B-0004-KOM-000013', 'A1214012019', NULL, 0),
	(22, 'P000022', '2019-02-19', '2019-02-22', 'B-0004-KOM-000014', 'A1216022019', NULL, 0),
	(23, 'P000023', '2019-02-19', '2019-02-22', 'B-0004-KOM-000014', 'A1216022019', 0, 1);
/*!40000 ALTER TABLE `tb_peminjaman` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_penerbit
CREATE TABLE IF NOT EXISTS `tb_penerbit` (
  `kd_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_penerbit: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_penerbit` DISABLE KEYS */;
INSERT INTO `tb_penerbit` (`kd_penerbit`, `nama_penerbit`) VALUES
	(104, 'PT. Suka Maju'),
	(105, 'PT. SOSUKA');
/*!40000 ALTER TABLE `tb_penerbit` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_pengarang
CREATE TABLE IF NOT EXISTS `tb_pengarang` (
  `kd_pengarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengarang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_pengarang`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_pengarang: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_pengarang` DISABLE KEYS */;
INSERT INTO `tb_pengarang` (`kd_pengarang`, `nama_pengarang`) VALUES
	(102, 'Rofiq'),
	(103, 'Abdul'),
	(104, 'ARYU');
/*!40000 ALTER TABLE `tb_pengarang` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_rak
CREATE TABLE IF NOT EXISTS `tb_rak` (
  `kd_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_rak: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_rak` DISABLE KEYS */;
INSERT INTO `tb_rak` (`kd_rak`, `nama_rak`) VALUES
	(4, 'Rak 1'),
	(5, 'Rak 2');
/*!40000 ALTER TABLE `tb_rak` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `avatar` longtext,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_user`),
  KEY `level` (`level`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for table dbperpus.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dbperpus.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `alamat`, `telp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `avatar`) VALUES
	(1, 'Rofiq', 'Sragen', '081328864074', 'abdulrafiqyusufa84@gmail.com', NULL, '$2y$10$P8P9tpocuLD4KOwR.MqKh.GEct.VcSoKIaP6wLCzcsUP6JkNgtzfi', '7Z8lM5zmKkSRVbgzeT95YTFJxFwI6e2J7iVGpzNlNipF9LxGVPBHHdSejWcB', '2019-01-28 07:26:42', '2019-02-19 13:46:12', '1', '02-2019-avatar5.png'),
	(28, 'Dua', 'd', '08967875567', 'operator@gmail.com', NULL, '$2y$10$6pTQpPxyFqZOijXcAoXvZuRu6MpcB03UKiUv2Y.ey8wGlQ8GW7tsO', 'EGSQvTIOB2VClaMwbsjebeEjU9ULeMBHjgriBKiQ9it2bwnjNUw0XHoSKew5', '2019-02-11 04:21:54', '2019-02-11 04:21:54', '2', '02-2019-g3.jpg'),
	(29, 'Yusufa', 'maxlms', '088899', 'yusufa@gmail.com', NULL, '$2y$10$6U3lbPhxV/NuyiiHJAQhXuFUV6mtSHQzn0kFJxRQmmwSwppF.HdCi', 'MUfc1jUHVduQkr2RegZ7F12sHIakPUvemfPAYjYGsQXSJStKCd86eZYgj91I', '2019-02-11 14:40:10', '2019-02-19 13:45:41', '2', '02-2019-01-2019-g4.jpg'),
	(30, 'as', 'dfg', '081328864078', 'admin56@gmail.com', NULL, '$2y$10$aLHDUvs4NRafuNGaYHewwO0klmtdqu3aaWQ/TvppJseWpKSMn3nza', NULL, '2019-02-19 05:20:37', '2019-02-19 05:20:37', '1', '02-2019-01-2019-g8.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
