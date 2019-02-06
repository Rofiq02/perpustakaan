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

-- Dumping structure for table dbperpus.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `foto` text,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`),
  UNIQUE KEY `no_anggota` (`no_anggota`),
  KEY `jk` (`jk`)
) ENGINE=InnoDB AUTO_INCREMENT=1202 DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_anggota: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_anggota` DISABLE KEYS */;
INSERT INTO `tb_anggota` (`kd_anggota`, `no_anggota`, `nama`, `tempat`, `tgl_lahir`, `jk`, `alamat`, `kota`, `telp`, `email`, `user_name`, `user_password`, `foto`, `status`) VALUES
	(1, 'A0001200078', 'Abdul', 'Sragen', '2000-07-30', 0, 'Sragen,Jawa Tengah', 'Sragen', '081328864074', 'abdulrafiqyusufa84@gmail.com', 'Rofiq02', '', NULL, NULL);
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
  `ISBN` varchar(50) DEFAULT NULL,
  `cover` longtext,
  PRIMARY KEY (`kd_buku`),
  KEY `kd_pengarang` (`kd_pengarang`),
  KEY `kd_penerbit` (`kd_penerbit`),
  KEY `kd_kategori` (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kd_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_kategori: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
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
  PRIMARY KEY (`no_induk_buku`),
  KEY `kd_buku` (`kd_buku`),
  KEY `kd_user` (`kd_user`),
  KEY `kd_rak` (`kd_rak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_koleksi_buku: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_koleksi_buku` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_koleksi_buku` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_peminjaman
CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
  `kd_pinjam` int(11) NOT NULL,
  `no_pinjam` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `no_induk_buku` varchar(50) DEFAULT NULL,
  `kd_anggota` varchar(50) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_pinjam`),
  UNIQUE KEY `no_pinjam` (`no_pinjam`),
  KEY `no_induk_buku` (`no_induk_buku`),
  KEY `kd_anggota` (`kd_anggota`),
  KEY `denda` (`denda`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_peminjaman: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_peminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_peminjaman` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_penerbit
CREATE TABLE IF NOT EXISTS `tb_penerbit` (
  `kd_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_penerbit: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_penerbit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_penerbit` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_pengarang
CREATE TABLE IF NOT EXISTS `tb_pengarang` (
  `kd_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_pengarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_pengarang: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_pengarang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_pengarang` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_rak
CREATE TABLE IF NOT EXISTS `tb_rak` (
  `kd_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_rak`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dbperpus.tb_rak: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_rak` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_rak` ENABLE KEYS */;

-- Dumping structure for table dbperpus.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `kd_user` int(11) NOT NULL,
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
