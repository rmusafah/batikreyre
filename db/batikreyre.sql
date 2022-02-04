-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 11:48 AM
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
  `ukuran` varchar(5) NOT NULL,
  `harga` int(100) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_akhir` int(100) NOT NULL,
  `stok` int(100) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`no_brg`, `nm_brg`, `tgl_msk`, `ktgri_brg`, `ukuran`, `harga`, `diskon`, `harga_akhir`, `stok`, `deskripsi`, `gambar`) VALUES
('BRG001', 'Tunik Aurelia', '2020-05-01', 'Batik Wanita', 'XL', 599000, 0, 599000, 10, '- Blouse batik print bernuansa elegan untuk formal look\r\n- Warna hitam\r\n- Kerah mandarin\r\n- Lined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Aurelia.jpg'),
('BRG002', 'Tunik Wila', '2020-05-05', 'Batik Wanita', 'XL', 599000, 20, 479200, 2, '- Tunik batik print desain hem simetris dengan detail slit\r\n- Warna coklat\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Wila.jpg'),
('BRG003', 'Blouse Arasya', '2020-05-01', 'Batik Wanita', 'XL', 425000, 0, 425000, 10, '- Blouse batik print bernuansa dark tone untuk formal look\r\n- Warna navy\r\n- Kerah tinggi\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 172cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Arasya.jpg'),
('BRG004', 'Tunik Detha', '2020-05-02', 'Batik Wanita', 'XL', 599000, 0, 599000, 10, '- Tunik batik print desain lengan panjang untuk formal look\r\n- Warna coklat muda\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Detha.jpg'),
('BRG005', 'Tunik Morgana', '2020-05-07', 'Batik Wanita', 'XL', 599000, 0, 599000, 10, '- Tunik batik print desain hem simetris untuk modern look\r\n- Warna hitam\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Morgana.jpg'),
('BRG006', 'Blouse Leora', '2020-05-06', 'Batik Wanita', 'XL', 425000, 0, 425000, 10, '- Blouse desain clean cut dengan aksen batik print yang elegan\r\n- Warna biru tua\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Leora.jpg'),
('BRG007', 'Blouse Denia', '2020-05-11', 'Batik Wanita', 'XL', 425000, 10, 382500, 10, '- Blouse batik print desain hem asimetris bergaya formal\r\n- Warna hitam\r\n- Kerah V\r\n- Unlined\r\n- Regular fit\r\n- Resleting belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Blouse Denia.jpg'),
('BRG008', 'Tunik Brigita', '2020-05-05', 'Batik Wanita', 'XL', 599000, 0, 599000, 10, '- Tunik batik print dengan desain A line cut- Warna hitam\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Brigita.jpg'),
('BRG009', 'Tunik Samantha', '2020-05-04', 'Batik Wanita', 'XL', 599000, 0, 599000, 10, '- Tunik batik print bergaya elegan dengan detail frill\r\n- Warna biru tua\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Samantha.jpg'),
('BRG010', 'Tunik Sareva', '2020-05-06', 'Batik Wanita', 'XL', 599000, 20, 479200, 10, '- Tunik batik print desain klasik untuk formal look\r\n- Warna navy\r\n- Kerah bulat\r\n- Unlined\r\n- Regular fit\r\n- Resleting bagian belakang\r\n- Material katun tidak transparan, ringan, dan tidak stretch\r\n- Tinggi model 175cm, lingkar dada 84cm, mengenakan ukuran S', 'aset/file/Batik Wanita/Tunik Sareva.jpg');

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
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brg_rusak`
--

INSERT INTO `tbl_brg_rusak` (`no_brg_rusak`, `no_brg`, `no_supplier`, `tgl_rusak`, `jumlah`, `keterangan`) VALUES
('RSK001', 'BRG001', 'SPL001', '2020-06-03', 23, 'Rusak di bagian lengan dan kantong'),
('RSK002', 'BRG007', 'SPL001', '2020-06-19', 5, 'Warna Pudar');

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
('MBR002', 'Chika', 'Nuraini', '2020-05-02', 'Perempuan', 'Kalimantan Selatan', 'Kota Banjarmasin', 'Jl. Belitung barat no.02', 70235, '085277261124', 'chika112@yahoo.com', 'chika112');

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
  `provinsi_ord` varchar(250) NOT NULL,
  `kota_ord` varchar(250) NOT NULL,
  `alamat_ord` text NOT NULL,
  `kode_pos_ord` int(11) NOT NULL,
  `transfer` varchar(250) NOT NULL,
  `invoice` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`no_order`, `tgl_order`, `jatuh_tempo`, `tgl_terbayar`, `no_member`, `list_belanja`, `total_harga`, `provinsi_ord`, `kota_ord`, `alamat_ord`, `kode_pos_ord`, `transfer`, `invoice`, `status`) VALUES
('ORD001', '2020-05-28', '2020-05-31', '2020-05-30', 'MBR001', 'Tunik Wila (1)', 479200, 'Sulawesi Selatan', 'Makassar', 'jl. a. yani ', 78865, 'product-2.jpg', 'man-1.jpg', 'Di Proses'),
('ORD002', '2020-06-02', '2020-06-05', '0000-00-00', 'MBR001', 'Tunik Aurelia (1),Blouse Denia (3)', 1746500, 'Sulawesi Selatan', 'Makassar', 'jl. a. yani ', 78865, '', '', ''),
('ORD003', '2020-06-04', '2020-06-07', '0000-00-00', 'MBR001', 'Tunik Aurelia (2)', 1198000, 'Sulawesi Selatan', 'Makassar', 'jl. a. yani ', 78865, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `no_brg` varchar(50) NOT NULL,
  `nm_brg` varchar(250) NOT NULL,
  `harga` int(100) NOT NULL,
  `jml_order` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `no_order`, `no_brg`, `nm_brg`, `harga`, `jml_order`, `diskon`, `jumlah_harga`) VALUES
(37, 'ORD001', 'BRG002', 'Tunik Wila', 479200, 1, 20, 479200),
(38, 'ORD002', 'BRG001', 'Tunik Aurelia', 599000, 1, 0, 599000),
(39, 'ORD002', 'BRG007', 'Blouse Denia', 382500, 3, 10, 1147500),
(40, 'ORD003', 'BRG001', 'Tunik Aurelia', 599000, 2, 0, 1198000);

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
  `alasan` text NOT NULL,
  `status_ajuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_return`
--

INSERT INTO `tbl_return` (`no_return`, `no_order`, `no_member`, `tgl_ajuan`, `tgl_return`, `alasan`, `status_ajuan`) VALUES
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
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`no_supplier`, `nm_supplier`, `alamat`, `telp`, `email`) VALUES
('SPL001', 'Rianty Batik Store', 'Jln. Malioboro 79, Yogyakarta, Indonesia', '+62-896-3363-0671', 'riantybatik.web@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supply`
--

CREATE TABLE `tbl_supply` (
  `no_supply` int(11) NOT NULL,
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
(1, 'SPL001', '2020-06-11', '2020-06-11', 'BRG001', 12, 11, '11', 'Dalam Pengiriman'),
(2, 'SPL001', '2020-06-07', '2020-06-03', 'BRG001', 12, 1000, '12000', 'Di Proses');

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
(1, 'admin', 'admin', 'Musyaffa', 1),
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
-- Indexes for table `tbl_brg_rusak`
--
ALTER TABLE `tbl_brg_rusak`
  ADD PRIMARY KEY (`no_brg_rusak`);

--
-- Indexes for table `tbl_cs`
--
ALTER TABLE `tbl_cs`
  ADD PRIMARY KEY (`no_pesan`);

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
  ADD PRIMARY KEY (`no_return`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`no_supplier`);

--
-- Indexes for table `tbl_supply`
--
ALTER TABLE `tbl_supply`
  ADD PRIMARY KEY (`no_supply`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_supply`
--
ALTER TABLE `tbl_supply`
  MODIFY `no_supply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`no_member`) REFERENCES `tbl_member` (`no_member`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`no_order`) REFERENCES `tbl_order` (`no_order`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`no_brg`) REFERENCES `tbl_barang` (`no_brg`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
