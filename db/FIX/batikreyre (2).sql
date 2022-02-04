-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 03:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batikreyre`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `no_brg` varchar(50) NOT NULL,
  `nm_brg` varchar(250) NOT NULL,
  `tgl_msk` date NOT NULL,
  `ktgri_brg` varchar(50) NOT NULL,
  `ketersediaan` varchar(20) NOT NULL,
  `harga` int(100) NOT NULL,
  `hpp_barang` int(100) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_akhir` int(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`no_brg`, `nm_brg`, `tgl_msk`, `ktgri_brg`, `ketersediaan`, `harga`, `hpp_barang`, `diskon`, `harga_akhir`, `deskripsi`, `gambar`) VALUES
('BRG001', 'Tunik Aurelia', '2020-05-01', 'Batik Wanita', 'Ada', 599000, 299000, 30, 419300, '- Blouse batik print bernuansa elegan untuk formal look\r\n- Warna hitam\r\n- Kerah mandarin\r\n- Lined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Aurelia.jpg'),
('BRG002', 'Tunik Wila', '2020-05-05', 'Batik Wanita', 'Ada', 599000, 299000, 0, 599000, '- Tunik batik print desain hem simetris dengan detail slit\r\n- Warna coklat\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Wila.jpg'),
('BRG003', 'Blouse Arasya', '2020-05-01', 'Batik Wanita', 'Ada', 425000, 225000, 20, 340000, '- Blouse batik print bernuansa dark tone untuk formal look\r\n- Warna navy\r\n- Kerah tinggi\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 172cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Arasya.jpg'),
('BRG004', 'Tunik Detha', '2020-05-02', 'Batik Wanita', 'Ada', 599000, 299000, 0, 599000, '- Tunik batik print desain lengan panjang untuk formal look\r\n- Warna coklat muda\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Detha.jpg'),
('BRG005', 'Tunik Morgana', '2020-05-07', 'Batik Wanita', 'Ada', 599000, 299000, 0, 599000, '- Tunik batik print desain hem simetris untuk modern look\r\n- Warna hitam\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Morgana.jpg'),
('BRG006', 'Blouse Leora', '2020-05-06', 'Batik Wanita', 'Ada', 425000, 225000, 0, 425000, '- Blouse desain clean cut dengan aksen batik print yang elegan\r\n- Warna biru tua\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Leora.jpg'),
('BRG007', 'Blouse Denia', '2020-05-11', 'Batik Wanita', 'Ada', 425000, 225000, 0, 425000, '- Blouse batik print desain hem asimetris bergaya formal\r\n- Warna hitam\r\n- Kerah V\r\n- Unlined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Denia.jpg'),
('BRG008', 'Tunik Brigita', '2020-05-05', 'Batik Wanita', 'Ada', 599000, 299000, 25, 449250, '- Tunik batik print dengan desain A line cut- Warna hitam\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Brigita.jpg'),
('BRG009', 'Tunik Samantha', '2020-05-04', 'Batik Wanita', 'Ada', 599000, 299000, 0, 599000, '- Tunik batik print bergaya elegan dengan detail frill\r\n- Warna biru tua\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Samantha.jpg'),
('BRG010', 'Tunik Sareva', '2020-05-06', 'Batik Wanita', 'Ada', 599000, 299000, 0, 599000, '- Tunik batik print desain klasik untuk formal look\r\n- Warna navy\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Sareva.jpg'),
('BRG011', 'Kemeja Slimfit Asterio', '2020-06-18', 'Batik Pria', 'Ada', 425000, 225000, 20, 340000, '- Kemeja formal dengan detail motif batik print bernuansa klasik\r\n- Warna abu-abu\r\n- Detail kerah\r\n- Unlined\r\n- Slim fit\r\n- Kancing depan\r\n- 1 kantong depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 187cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Kemeja Slimfit Asterio.jpg'),
('BRG012', 'Hem Vanello', '2020-06-18', 'Batik Pria', 'Ada', 375000, 175000, 0, 375000, '- Kemeja formal dengan detail motif batik print bernuansa cerah\r\n- Multiwarna\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- 1 kantong depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 185cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Vanello.jpg'),
('BRG013', 'Hem Zeano', '2020-06-18', 'Batik Pria', 'Ada', 375000, 175000, 0, 375000, '- Kemeja detail all over batik print bergaya formal\r\n- Warna hitam\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 185cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Zeano.jpg'),
('BRG014', 'Hem Viron', '2020-06-25', 'Batik Pria', 'Ada', 375000, 175000, 25, 281250, '- Kemeja hem formal desain lengan pendek detail motif batik print kombinasi\r\n- Warna hitam\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- 1 kantong depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 187cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Viron.jpg'),
('BRG015', 'Hem Octano', '2020-06-23', 'Batik Pria', 'Ada', 375000, 175000, 30, 262500, '- Kemeja hem batik print bernuansa klasik untuk simple formal look\r\n- Warna hitam\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- 1 kantong depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 187cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Octano.jpg'),
('BRG016', 'Hem Aquino', '2020-06-19', 'Batik Pria', 'Ada', 425000, 225000, 0, 425000, '- Kemeja hem batik print motif kawung kombinasi untuk kesan klasik\r\n- Warna biru tua\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- 1 kantong depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 187cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Aquino.jpg'),
('BRG017', 'Kemeja Dava', '2020-06-10', 'Batik Pria', 'Ada', 425000, 225000, 0, 425000, '- Kemeja batik print desain slim fit bernuansa monokrom\r\n- Warna hitam\r\n- Detail kerah\r\n- Unlined\r\n- Slim fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 183cm, lingkar dada 97cm, mengenakan ukuran L', 'aset/file/Batik Pria/Kemeja Dava.jpg'),
('BRG018', 'Kemeja Slimfit Sanders', '2020-06-25', 'Batik Pria', 'Ada', 425000, 225000, 0, 425000, '- Kemeja batik print bernuansa etnik untuk formal look\r\n- Kombinasi warna biru dan putih\r\n- Detail kerah\r\n- Unlined\r\n- Slim fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 187cm, lingkar dada 98cm, mengenakan ukuran L', 'aset/file/Batik Pria/Kemeja Slimfit Sanders.jpg'),
('BRG019', 'Hem Anjello', '2020-06-27', 'Batik Pria', 'Ada', 375000, 175000, 0, 375000, '- Kemeja hem batik print bernuansa etnik untuk formal look\r\n- Warna coklat\r\n- Detail kerah\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 183cm, lingkar dada 97cm, mengenakan ukuran L', 'aset/file/Batik Pria/Hem Anjello.jpg'),
('BRG020', 'Kemeja Slimfit Gesra Sogan', '2020-06-30', 'Batik Pria', 'Ada', 425000, 225000, 25, 318750, '- Kemeja untuk tampilan formal yang elegan bermotif batik print\r\n- Warna cokelat\r\n- Detail kerah\r\n- Lined, dengan furing\r\n- Slim fit\r\n- Kancing depan\r\n- Material katun tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 184cm, lingkar dada 96cm, mengenakan ukuran L', 'aset/file/Batik Pria/Kemeja Slimfit Gesra Sogan.jpg'),
('BRG021', 'Kemeja Slimfit Asterio', '2021-02-02', 'Batik Pria', 'Ada', 425000, 299000, 0, 425000, '- Tunik batik print desain hem simetris dengan detail slit\r\n- Warna coklat\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Pria/photo-1516205651411-aef33a44f7c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_detail`
--

CREATE TABLE `tbl_barang_detail` (
  `no_brg_detail` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang_detail`
--

INSERT INTO `tbl_barang_detail` (`no_brg_detail`, `no_brg`, `ukuran`, `stok`) VALUES
('BDL001', 'BRG001', 'XL', 10),
('BDL002', 'BRG001', 'L', 5),
('BDL003', 'BRG001', 'M', 6),
('BDL004', 'BRG001', 'S', 4),
('BDL005', 'BRG002', 'XL', 2),
('BDL006', 'BRG002', 'L', 6),
('BDL007', 'BRG002', 'M', 5),
('BDL008', 'BRG002', 'S', 10),
('BDL009', 'BRG003', 'XL', 10),
('BDL010', 'BRG003', 'L', 7),
('BDL011', 'BRG003', 'M', 4),
('BDL012', 'BRG003', 'S', 2),
('BDL013', 'BRG004', 'XL', 10),
('BDL014', 'BRG004', 'L', 6),
('BDL015', 'BRG004', 'M', 5),
('BDL016', 'BRG004', 'S', 4),
('BDL017', 'BRG005', 'XL', 10),
('BDL018', 'BRG005', 'L', 6),
('BDL019', 'BRG005', 'M', 6),
('BDL020', 'BRG005', 'S', 7),
('BDL021', 'BRG006', 'XL', 10),
('BDL022', 'BRG006', 'L', 10),
('BDL023', 'BRG006', 'M', 6),
('BDL024', 'BRG006', 'S', 6),
('BDL025', 'BRG007', 'XL', 6),
('BDL026', 'BRG007', 'L', 10),
('BDL027', 'BRG007', 'M', 4),
('BDL028', 'BRG007', 'S', 2),
('BDL029', 'BRG008', 'XL', 6),
('BDL030', 'BRG008', 'L', 4),
('BDL031', 'BRG008', 'M', 5),
('BDL032', 'BRG008', 'S', 6),
('BDL033', 'BRG009', 'XL', 10),
('BDL034', 'BRG009', 'L', 4),
('BDL035', 'BRG009', 'M', 2),
('BDL036', 'BRG009', 'S', 4),
('BDL037', 'BRG010', 'XL', 10),
('BDL038', 'BRG010', 'L', 5),
('BDL039', 'BRG010', 'M', 5),
('BDL040', 'BRG010', 'S', 7),
('BDL041', 'BRG011', 'XL', 10),
('BDL042', 'BRG011', 'L', 6),
('BDL043', 'BRG011', 'M', 4),
('BDL044', 'BRG011', 'S', 7),
('BDL045', 'BRG012', 'XL', 6),
('BDL046', 'BRG012', 'L', 5),
('BDL047', 'BRG012', 'M', 4),
('BDL048', 'BRG012', 'S', 2),
('BDL049', 'BRG013', 'XL', 6),
('BDL050', 'BRG013', 'L', 5),
('BDL051', 'BRG013', 'M', 7),
('BDL052', 'BRG013', 'S', 10),
('BDL053', 'BRG014', 'XL', 10),
('BDL054', 'BRG014', 'L', 6),
('BDL055', 'BRG014', 'M', 4),
('BDL056', 'BRG014', 'S', 7),
('BDL057', 'BRG015', 'XL', 6),
('BDL058', 'BRG015', 'L', 4),
('BDL059', 'BRG015', 'M', 10),
('BDL060', 'BRG015', 'S', 2),
('BDL061', 'BRG016', 'XL', 5),
('BDL062', 'BRG016', 'L', 10),
('BDL063', 'BRG016', 'M', 10),
('BDL064', 'BRG016', 'S', 7),
('BDL065', 'BRG017', 'XL', 10),
('BDL066', 'BRG017', 'L', 7),
('BDL067', 'BRG017', 'M', 6),
('BDL068', 'BRG017', 'S', 10),
('BDL069', 'BRG018', 'XL', 10),
('BDL070', 'BRG018', 'L', 5),
('BDL071', 'BRG018', 'M', 6),
('BDL072', 'BRG018', 'S', 7),
('BDL073', 'BRG019', 'XL', 5),
('BDL074', 'BRG019', 'L', 4),
('BDL075', 'BRG019', 'M', 2),
('BDL076', 'BRG019', 'S', 10),
('BDL077', 'BRG020', 'XL', 10),
('BDL078', 'BRG020', 'L', 10),
('BDL079', 'BRG020', 'M', 5),
('BDL080', 'BRG020', 'S', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brg_rusak`
--

CREATE TABLE `tbl_brg_rusak` (
  `no_brg_rusak` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `no_supplier` varchar(50) NOT NULL,
  `tgl_rusak` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brg_rusak`
--

INSERT INTO `tbl_brg_rusak` (`no_brg_rusak`, `no_brg`, `no_supplier`, `tgl_rusak`, `jumlah`, `keterangan`, `status`) VALUES
('RSK001', 'BRG001', 'SPL001', '2020-06-03', 23, 'Rusak di bagian lengan dan kantong', 'Selesai'),
('RSK002', 'BRG007', 'SPL001', '2020-06-19', 5, 'Warna Pudar', 'Di Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cs`
--

CREATE TABLE `tbl_cs` (
  `no_pesan` varchar(50) NOT NULL,
  `no_member` varchar(250) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cs`
--

INSERT INTO `tbl_cs` (`no_pesan`, `no_member`, `tgl_pesan`, `isi_pesan`) VALUES
('PSN001', 'MBR001', '2020-06-22', 'sadadsadads'),
('PSN002', 'MBR001', '2020-06-25', 'adadadaw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom`
--

CREATE TABLE `tbl_custom` (
  `no_custom` int(11) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `nm_brg` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `lebar_bahu` int(11) NOT NULL,
  `lingkar_dada` int(11) NOT NULL,
  `pjg_tgn` int(11) NOT NULL,
  `lingkar_lengan` int(11) NOT NULL,
  `lingkar_pinggang` int(11) NOT NULL,
  `lingkar_pinggul` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_cart`
--

CREATE TABLE `tbl_custom_cart` (
  `no_custom_cart` int(11) NOT NULL,
  `no_member` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `lebar_bahu` int(11) NOT NULL,
  `lingkar_dada` int(11) NOT NULL,
  `pjg_tgn` int(11) NOT NULL,
  `lingkar_lengan` int(11) NOT NULL,
  `lingkar_pinggang` int(11) NOT NULL,
  `lingkar_pinggul` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `no_diskon` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `jml_diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diskon`
--

INSERT INTO `tbl_diskon` (`no_diskon`, `no_brg`, `jml_diskon`) VALUES
('DSK001', 'BRG001', 30),
('DSK002', 'BRG003', 20),
('DSK003', 'BRG008', 25),
('DSK004', 'BRG011', 20),
('DSK005', 'BRG014', 25),
('DSK006', 'BRG015', 30),
('DSK007', 'BRG020', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskon_detail`
--

CREATE TABLE `tbl_diskon_detail` (
  `no_diskon` varchar(50) NOT NULL,
  `nm_diskon` varchar(250) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `tgl_diskon` date NOT NULL,
  `tgl_diskon_akhir` date NOT NULL,
  `jml_diskon` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diskon_detail`
--

INSERT INTO `tbl_diskon_detail` (`no_diskon`, `nm_diskon`, `no_brg`, `tgl_diskon`, `tgl_diskon_akhir`, `jml_diskon`, `ket`) VALUES
('DSK001', 'Big Sale', 'BRG001', '2020-06-02', '2020-06-16', 30, 'Diskon Big Sale'),
('DSK002', 'Big Sale', 'BRG003', '2020-06-09', '2020-06-23', 20, 'Diskon Big Sale'),
('DSK003', 'Big Sale', 'BRG008', '2020-06-20', '2020-07-04', 25, 'Diskon Big Sale'),
('DSK004', 'Hot Sale', 'BRG011', '2020-06-11', '2020-06-21', 20, 'Diskon Hot Sale'),
('DSK005', 'Hot Sale', 'BRG014', '2020-06-10', '2020-06-30', 25, 'Diskon Hot Sale'),
('DSK006', 'Hot Sale', 'BRG015', '2020-06-05', '2020-06-18', 30, 'Diskon Hot Sale'),
('DSK007', 'Hot Sale', 'BRG020', '2020-06-10', '2020-06-25', 25, 'Diskon Hot Sale');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `no_keranjang` int(11) NOT NULL,
  `no_member` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `no_brg_detail` varchar(50) NOT NULL,
  `jml_beli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `no_member` varchar(250) NOT NULL,
  `nm_dpn` varchar(250) NOT NULL,
  `nm_blkg` varchar(250) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `provinsi` varchar(250) NOT NULL,
  `kota` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`no_member`, `nm_dpn`, `nm_blkg`, `tgl_daftar`, `jk`, `provinsi`, `kota`, `alamat`, `kode_pos`, `telp`, `email`, `password`) VALUES
('MBR001', 'Ahmad', 'Fahruzi', '2020-05-01', 'Laki-laki', 'Kalimantan Selatan', 'Banjarmasin', 'Jl. Banjar Indah No.11', 70199, '085277261124', 'amadruzi11@gmail.com', 'amadruzi11'),
('MBR002', 'Chika', 'Nuraini', '2020-05-06', 'Perempuan', 'Kalimantan Selatan', 'Kota Banjarmasin', 'Jl. Belitung barat no.02', 70235, '085277261124', 'chika112@yahoo.com', 'chika112');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `no_order` varchar(50) NOT NULL,
  `tgl_order` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_terbayar` date NOT NULL,
  `no_member` varchar(250) NOT NULL,
  `list_belanja` varchar(250) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `hpp_order` int(11) NOT NULL,
  `total_order` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `provinsi_ord` varchar(250) NOT NULL,
  `kota_ord` varchar(250) NOT NULL,
  `alamat_ord` text NOT NULL,
  `kode_pos_ord` int(11) NOT NULL,
  `transfer` varchar(250) NOT NULL,
  `invoice` varchar(250) NOT NULL,
  `kwitansi` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`no_order`, `tgl_order`, `jatuh_tempo`, `tgl_terbayar`, `no_member`, `list_belanja`, `total_harga`, `hpp_order`, `total_order`, `pajak`, `ongkir`, `total`, `provinsi_ord`, `kota_ord`, `alamat_ord`, `kode_pos_ord`, `transfer`, `invoice`, `kwitansi`, `status`, `no_resi`, `kurir`) VALUES
('ORD001-20200921061206', '2020-09-21', '2020-09-24', '2020-09-21', 'MBR002', 'Tunik Wila - L (1), ', 599000, 299000, 1, 10, 20000, 678900, 'Kalimantan Selatan', 'Banjarmasin', 'jl. a. yani km.4', 71134, 'WhatsApp Image 2020-09-08 at 08.56.19.jpeg', 'aset/file/Invoice/ORD001-20200921061206.pdf', 'aset/file/Kwitansi/kwitansi-640x480.jpg', 'Selesai', '120040042107018', 'JNE'),
('ORD002-20200921064536', '2020-09-21', '2020-09-24', '2020-09-22', 'MBR001', 'Kemeja Slimfit Asterio - XL (1), Hem Viron - L (1), ', 621250, 400000, 2, 10, 20000, 703375, 'Sulawesi Selatan', 'Makassar', 'jl. pattimura', 78865, 'WhatsApp Image 2020-09-08 at 08.56.19.jpeg', 'aset/file/Invoice/ORD002-20200921064536.pdf', 'aset/file/Kwitansi/kwitansi-640x480.jpg', 'Dalam Pengiriman', '120040042546678', 'JNE'),
('ORD003-20210208110604', '2021-02-08', '2021-02-11', '0000-00-00', 'MBR001', 'Blouse Arasya - L (5), ', 1700000, 1125000, 5, 0, 0, 0, 'Kalimantan Selatan', 'Banjarmasin', 'jl. a. yani km.4', 71134, '', '', '', 'Di Proses', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `nm_brg` varchar(250) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(100) NOT NULL,
  `jml_order` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_akhir` int(100) NOT NULL,
  `hpp_ord_detail` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `no_order`, `no_brg`, `nm_brg`, `ukuran`, `harga`, `jml_order`, `diskon`, `harga_akhir`, `hpp_ord_detail`, `jumlah_harga`) VALUES
(95, 'ORD001-20200921061206', 'BRG002', 'Tunik Wila', 'L', 599000, 1, 0, 599000, 299000, 599000),
(96, 'ORD002-20200921064536', 'BRG011', 'Kemeja Slimfit Asterio', 'XL', 425000, 1, 20, 340000, 225000, 340000),
(97, 'ORD002-20200921064536', 'BRG014', 'Hem Viron', 'L', 375000, 1, 25, 281250, 175000, 281250),
(99, 'ORD003-20210208110604', 'BRG003', 'Blouse Arasya', 'L', 425000, 5, 20, 340000, 1125000, 1700000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `no_return` varchar(250) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `no_member` varchar(250) NOT NULL,
  `tgl_ajuan` date NOT NULL,
  `tgl_return` date NOT NULL,
  `ket_return` text NOT NULL,
  `status_ajuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_return`
--

INSERT INTO `tbl_return` (`no_return`, `no_order`, `no_member`, `tgl_ajuan`, `tgl_return`, `ket_return`, `status_ajuan`) VALUES
('RTN001', 'ORD001', 'MBR001', '2020-06-02', '2020-06-04', 'errrr', 'Selesai'),
('RTN002', 'ORD002', 'MBR001', '2020-06-02', '2020-07-11', 'asafads', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `no_supplier` varchar(50) NOT NULL,
  `nm_supplier` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`no_supplier`, `nm_supplier`, `alamat`, `telp`, `email`, `website`) VALUES
('SPL001', 'Rianty Batik Store', 'Jln. Malioboro 79, Yogyakarta, Indonesia', '+62-896-3363-0671', 'riantybatik.web@gmail.com', 'https://riantybatik.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supply`
--

CREATE TABLE `tbl_supply` (
  `no_supply` varchar(50) NOT NULL,
  `no_supplier` varchar(50) NOT NULL,
  `tgl_supply` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `jml_supply` int(11) NOT NULL,
  `harga_supply` int(11) NOT NULL,
  `total_supply` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supply`
--

INSERT INTO `tbl_supply` (`no_supply`, `no_supplier`, `tgl_supply`, `tgl_terima`, `no_brg`, `jml_supply`, `harga_supply`, `total_supply`, `status`) VALUES
('BRGMSK001', 'SPL001', '2020-06-10', '2020-06-17', 'BRG007', 4, 425000, '1700000', 'Selesai'),
('BRGMSK002', 'SPL001', '2020-06-01', '2020-06-08', 'BRG019', 3, 375000, '1125000', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nm_admin` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_admin`, `level`) VALUES
(1, 'admin', 'admin', 'SuperAdmin', 1),
(2, 'ihsan', 'ihsan', 'Ihsan', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`no_brg`);

--
-- Indexes for table `tbl_barang_detail`
--
ALTER TABLE `tbl_barang_detail`
  ADD PRIMARY KEY (`no_brg_detail`),
  ADD KEY `no_brg` (`no_brg`);

--
-- Indexes for table `tbl_brg_rusak`
--
ALTER TABLE `tbl_brg_rusak`
  ADD PRIMARY KEY (`no_brg_rusak`),
  ADD KEY `no_brg` (`no_brg`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indexes for table `tbl_cs`
--
ALTER TABLE `tbl_cs`
  ADD PRIMARY KEY (`no_pesan`),
  ADD KEY `no_member` (`no_member`);

--
-- Indexes for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  ADD PRIMARY KEY (`no_custom`),
  ADD KEY `no_order` (`no_order`),
  ADD KEY `no_brg` (`no_brg`);

--
-- Indexes for table `tbl_custom_cart`
--
ALTER TABLE `tbl_custom_cart`
  ADD PRIMARY KEY (`no_custom_cart`),
  ADD KEY `no_member` (`no_member`),
  ADD KEY `no_brg` (`no_brg`);

--
-- Indexes for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD KEY `tbl_diskon_ibfk_2` (`no_diskon`),
  ADD KEY `no_brg` (`no_brg`) USING BTREE;

--
-- Indexes for table `tbl_diskon_detail`
--
ALTER TABLE `tbl_diskon_detail`
  ADD PRIMARY KEY (`no_diskon`),
  ADD KEY `tbl_diskon_detail_ibfk_1` (`no_brg`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`no_keranjang`),
  ADD KEY `no_member` (`no_member`),
  ADD KEY `no_brg` (`no_brg`),
  ADD KEY `no_brg_detail` (`no_brg_detail`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`no_member`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`no_order`),
  ADD KEY `no_member` (`no_member`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `no_order` (`no_order`),
  ADD KEY `no_brg` (`no_brg`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`no_return`),
  ADD KEY `tbl_return_ibfk_1` (`no_order`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`no_supplier`);

--
-- Indexes for table `tbl_supply`
--
ALTER TABLE `tbl_supply`
  ADD PRIMARY KEY (`no_supply`),
  ADD KEY `no_supplier` (`no_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  MODIFY `no_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_custom_cart`
--
ALTER TABLE `tbl_custom_cart`
  MODIFY `no_custom_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `no_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang_detail`
--
ALTER TABLE `tbl_barang_detail`
  ADD CONSTRAINT `tbl_barang_detail_ibfk_1` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_brg_rusak`
--
ALTER TABLE `tbl_brg_rusak`
  ADD CONSTRAINT `tbl_brg_rusak_ibfk_1` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_brg_rusak_ibfk_2` FOREIGN KEY (`no_supplier`) REFERENCES `tbl_supplier` (`no_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cs`
--
ALTER TABLE `tbl_cs`
  ADD CONSTRAINT `tbl_cs_ibfk_1` FOREIGN KEY (`no_member`) REFERENCES `tbl_member` (`no_member`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_custom`
--
ALTER TABLE `tbl_custom`
  ADD CONSTRAINT `tbl_custom_ibfk_1` FOREIGN KEY (`no_order`) REFERENCES `tbl_order` (`no_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_custom_ibfk_2` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_custom_cart`
--
ALTER TABLE `tbl_custom_cart`
  ADD CONSTRAINT `tbl_custom_cart_ibfk_1` FOREIGN KEY (`no_member`) REFERENCES `tbl_member` (`no_member`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_custom_cart_ibfk_2` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD CONSTRAINT `tbl_diskon_ibfk_1` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_diskon_ibfk_2` FOREIGN KEY (`no_diskon`) REFERENCES `tbl_diskon_detail` (`no_diskon`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_diskon_detail`
--
ALTER TABLE `tbl_diskon_detail`
  ADD CONSTRAINT `tbl_diskon_detail_ibfk_1` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `tbl_keranjang_ibfk_1` FOREIGN KEY (`no_member`) REFERENCES `tbl_member` (`no_member`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_keranjang_ibfk_2` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_keranjang_ibfk_3` FOREIGN KEY (`no_brg_detail`) REFERENCES `tbl_barang_detail` (`no_brg_detail`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`no_member`) REFERENCES `tbl_member` (`no_member`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
