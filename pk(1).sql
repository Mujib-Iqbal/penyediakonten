-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2016 at 11:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(5) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_nama` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_nama`) VALUES
(1, 'mujib', '21232f297a57a5a743894a0e4a801fc3', 'mujibiqbal@gmail.com', 'M Mujib Iqbal'),
(2, 'iqbal', 'eedae20fc3c7a6e9c5b1102098771c70', 'iqbal@gmail.com', 'Mas Iqbal'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Muhammad Mujib Iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(5) NOT NULL,
  `customer_nama` varchar(25) NOT NULL,
  `customer_telefon` varchar(15) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_username` varchar(25) NOT NULL,
  `customer_password` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_telefon`, `customer_alamat`, `customer_email`, `customer_username`, `customer_password`) VALUES
(1, 'customer', '000087764368', 'Yogyakarta', 'customer@gmail.com', 'customer', '91ec1f9324753048c0096d036a694f86'),
(2, 'rasid', '085787577117', 'magelang jawa tengah', 'rasid@gmail.com', 'rasid', '5e2c36e90cd1cc01e3adeafbaef778a3'),
(3, 'kholiq', '081112344321', 'jepara jawa tengah', 'kholiq@gmail.com', 'kholiq', '9690c3a67bfe90bc7948ad8b9cea38ea'),
(4, 'Andi', '027432322228', 'Bantul', 'andi@gmail.com', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
`gaji_id` int(11) NOT NULL,
  `kreator_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `gaji_jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`gaji_id`, `kreator_id`, `job_id`, `gaji_jumlah`) VALUES
(2, 7, 12, 20000),
(3, 4, 8, 150000),
(4, 8, 13, 48000),
(5, 7, 15, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
`job_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `kreator_id` int(5) NOT NULL,
  `job_keuntungan` int(3) NOT NULL,
  `job_progress` int(3) NOT NULL,
  `job_status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `order_id`, `kreator_id`, `job_keuntungan`, `job_progress`, `job_status`) VALUES
(8, 12, 4, 75, 100, 'selesai'),
(12, 12, 7, 10, 100, 'selesai'),
(13, 15, 8, 10, 100, 'selesai'),
(15, 16, 7, 80, 100, 'selesai'),
(16, 17, 2, 90, 100, 'diterima'),
(17, 18, 2, 75, 0, 'belum diverifikasi'),
(18, 19, 7, 85, 100, 'diterima');

--
-- Triggers `jobs`
--
DELIMITER //
CREATE TRIGGER `jobselesaidikerjakan` AFTER UPDATE ON `jobs`
 FOR EACH ROW BEGIN
IF NEW.`job_status` = 'selesai' THEN
UPDATE `order` SET `order`.`order_status` = 'selesai' WHERE `order`.`order_id` = NEW.`order_id`;
INSERT INTO `gaji` VALUES(NULL, NEW.`kreator_id`, NEW.`job_id`, (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)* (NEW.`job_keuntungan`/100));
INSERT INTO `pendapatan` VALUES('',NEW.`job_id`, NOW(), (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)-(SELECT `gaji_jumlah` FROM `gaji` WHERE `gaji`.`job_id`=NEW.`job_id`));
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE IF NOT EXISTS `konten` (
`konten_id` int(5) NOT NULL,
  `konten_nama` varchar(25) NOT NULL,
  `konten_jenis` varchar(20) NOT NULL,
  `konten_deskripsi` text NOT NULL,
  `konten_file` varchar(50) NOT NULL,
  `konten_status` varchar(20) NOT NULL,
  `konten_keterangan` text NOT NULL,
  `konten_komentar` text NOT NULL,
  `job_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`konten_id`, `konten_nama`, `konten_jenis`, `konten_deskripsi`, `konten_file`, `konten_status`, `konten_keterangan`, `konten_komentar`, `job_id`) VALUES
(4, 'babababbaa', '', '', 'tatataa.txt', 'diterima', 'aaaaaaaaaaaaaa', 'ok', 8),
(5, 'jjjjjll', '', 'ok', '455.txt', 'diterima', 'sssss', '', 12),
(6, 'kalalala', '', '', '999.txt', 'diterima', 'bahaahahaha', 'aaaaaaaaaaaaaaaa', 13),
(7, 'konten 15', '', '', '9992.txt', 'diterima', 'mohon dicek', 'ok', 15),
(9, 'go', '', '', 'indigo.jpg', 'belum diverifikasi', 'iki', '', 16),
(10, 'iki', '', '', '00000999.txt', 'belum diverifikasi', 'kulo', '', 18);

--
-- Triggers `konten`
--
DELIMITER //
CREATE TRIGGER `kontenditerimaadmin` AFTER UPDATE ON `konten`
 FOR EACH ROW BEGIN
IF NEW.`konten_status` = 'diterima' THEN
UPDATE `jobs` SET `jobs`.`job_status` = 'selesai' WHERE `jobs`.`job_id` = NEW.`job_id`;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kreator`
--

CREATE TABLE IF NOT EXISTS `kreator` (
`kreator_id` int(5) NOT NULL,
  `kreator_nama` varchar(25) NOT NULL,
  `kreator_alamat` text NOT NULL,
  `kreator_telefon` varchar(15) NOT NULL,
  `kreator_konten` varchar(25) NOT NULL,
  `kreator_email` varchar(40) NOT NULL,
  `kreator_username` varchar(25) NOT NULL,
  `kreator_password` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kreator`
--

INSERT INTO `kreator` (`kreator_id`, `kreator_nama`, `kreator_alamat`, `kreator_telefon`, `kreator_konten`, `kreator_email`, `kreator_username`, `kreator_password`) VALUES
(1, 'm m iqbal killoo', 'Sewon Timbulharjo sewon Bantul', '0834576777', 'audio', 'iqbaluuuuu@gmail.com', 'iqbal', '1e03415333c2b6a791dbeb25d51350d5'),
(2, 'kreator', 'Bantul Bantul Bantul yogyakarta', '088881818181', 'teks', 'kreator@gmail.com', 'kreator', '23f5e1973b5a048ffaaa0bd0183b5f87'),
(3, 'apri', 'jogja', '08654678990', 'video', 'april@gmail.com', 'apri', '3c866e2b36c91e8a451d543043a8a5bf'),
(4, 'Rangga', 'bandung', '09765327865', 'audio', 'rangga@gmail.com', 'rangga', '863c2a4b6bff5e22294081e376fc1f51'),
(7, 'mazda', 'manding', '099998888', 'gambar', 'mazda@gmail.com', 'mazda', '3ab3d571a3ec6845d7838582da396208'),
(8, 'honda', 'bantul', '0657899178', 'video', 'honda@gmail.com', 'honda', '2ab3343875e56dc0a15cbb6a98570cf2');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`order_id` int(5) NOT NULL,
  `pemesan_id` int(5) NOT NULL,
  `paket_id` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_jumlah` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_keterangan` text NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_terhapus` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `pemesan_id`, `paket_id`, `order_date`, `order_jumlah`, `order_total`, `order_keterangan`, `order_status`, `order_terhapus`) VALUES
(12, 1, 11, '2015-12-26 00:00:00', 2, 200000, 'makanan, gadget terbaru', 'selesai', 0),
(15, 4, 5, '2015-12-28 17:31:12', 2, 480000, 'aaaaaaaaaaaaaaaa', 'selesai', 0),
(16, 1, 11, '2016-01-08 21:01:16', 1, 100000, 'lagu terbaru di 2016', 'selesai', 0),
(17, 1, 6, '2016-01-10 22:10:46', 1, 300000, 'cek', 'pengerjaan', 0),
(18, 1, 6, '2016-01-11 10:36:27', 3, 900000, 'qwqeafa avava', 'pengerjaan', 0),
(19, 1, 11, '2016-01-12 09:26:19', 2, 200000, 'yuhuuuu', 'pengerjaan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
`paket_id` int(5) NOT NULL,
  `paket_nama` varchar(25) NOT NULL,
  `konten_jenis` varchar(20) NOT NULL,
  `paket_deskripsi` text NOT NULL,
  `paket_jangkawaktu` varchar(20) NOT NULL,
  `paket_jumlah` varchar(20) NOT NULL,
  `paket_harga` int(11) NOT NULL,
  `paket_terhapus` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nama`, `konten_jenis`, `paket_deskripsi`, `paket_jangkawaktu`, `paket_jumlah`, `paket_harga`, `paket_terhapus`) VALUES
(5, 'Paket 1', 'video', 'Ini adalah deskripsi Paket 1 kakakaka', '1 Minggu', 'duapuluh', 240000, 0),
(6, 'Paket 2', 'teks', 'Isi deskripsi paket 2', '1 Minggu', '10', 300000, 0),
(7, 'Paket 3', 'audio', 'Isi deskripsi paket 3', '2 minggu', '20', 300000, 1),
(8, 'Paket 4', 'audio', 'Isi deskripsi paket 3', '2 minggu', '20', 354000, 0),
(9, 'Paket 7', 'video', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '1 minggu', '10', 300000, 1),
(10, 'paket a', 'audio', 'aaaaaaaaaaaaaaaa', '3 minggu', '20', 100000, 1),
(11, 'paket gold', 'gambar', '10konten', '3 minggu', '200', 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL DEFAULT '0',
  `payment_date` datetime NOT NULL,
  `payment_total` int(11) NOT NULL,
  `payment_keterangan` text NOT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_date`, `payment_total`, `payment_keterangan`, `payment_status`) VALUES
(3, 12, '2015-12-26 00:00:00', 200000, 'lunas ya ke rek bca', 'lunas'),
(4, 15, '2015-12-28 00:00:00', 480000, 'kakaakkaka', 'lunas'),
(5, 16, '2016-01-08 21:01:44', 100000, 'bca', 'lunas'),
(6, 17, '2016-01-10 22:11:06', 300000, 'ulalaaaaaaa', 'lunas'),
(7, 18, '2016-01-11 10:38:10', 9000000, 'lalalalalaa', 'lunas'),
(8, 19, '2016-01-12 09:29:49', 200000, 'ke bni', 'lunas');

--
-- Triggers `payment`
--
DELIMITER //
CREATE TRIGGER `customerkonfirmasipembayaran` AFTER UPDATE ON `payment`
 FOR EACH ROW BEGIN
IF NEW.`payment_status` = 'lunas' THEN
UPDATE `order` SET `order`.`order_status` = 'pengerjaan' WHERE `order`.`order_id` = NEW.`order_id`;
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE IF NOT EXISTS `pendapatan` (
`pendapatan_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `pendapatan_tanggal` date NOT NULL,
  `pendapatan_jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`pendapatan_id`, `job_id`, `pendapatan_tanggal`, `pendapatan_jumlah`) VALUES
(0, 15, '2016-01-08', 20000),
(1, 12, '2015-12-28', 180000),
(2, 8, '2015-12-28', 50000),
(3, 13, '2015-12-28', 432000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
 ADD PRIMARY KEY (`gaji_id`), ADD KEY `kreator_id` (`kreator_id`), ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`job_id`), ADD KEY `order_id` (`order_id`), ADD KEY `kreator_id` (`kreator_id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
 ADD PRIMARY KEY (`konten_id`), ADD KEY `order_id` (`job_id`);

--
-- Indexes for table `kreator`
--
ALTER TABLE `kreator`
 ADD PRIMARY KEY (`kreator_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`), ADD KEY `pemesan_id` (`pemesan_id`), ADD KEY `pemesan_id_2` (`pemesan_id`), ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
 ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
 ADD PRIMARY KEY (`pendapatan_id`), ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
MODIFY `konten_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kreator`
--
ALTER TABLE `kreator`
MODIFY `kreator_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
MODIFY `paket_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`kreator_id`) REFERENCES `kreator` (`kreator_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`kreator_id`) REFERENCES `kreator` (`kreator_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`pemesan_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`paket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendapatan`
--
ALTER TABLE `pendapatan`
ADD CONSTRAINT `pendapatan_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
