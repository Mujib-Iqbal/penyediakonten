-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 03:43 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_telefon`, `customer_alamat`, `customer_email`, `customer_username`, `customer_password`) VALUES
(1, 'customer', '08885556778899', 'Yogyakarta', 'customer@gmail.com', 'customer', '91ec1f9324753048c0096d036a694f86'),
(2, 'rasid', '085787577117', 'magelang jawa tengah', 'rasid@gmail.com', 'rasid', '5e2c36e90cd1cc01e3adeafbaef778a3'),
(3, 'kholiq', '081112344321', 'jepara jawa tengah', 'kholiq@gmail.com', 'kholiq', '9690c3a67bfe90bc7948ad8b9cea38ea'),
(4, 'Andi', '027432322228', 'Bantul', 'andi@gmail.com', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46'),
(5, 'aku', '', '', 'aku@gmail.com', 'aku', '89ccfac87d8d06db06bf3211cb2d69ed'),
(6, 'zada', '', '', 'zada@gmail.com', 'zada', 'fcd8840ffdf271580fdcfd9abe691dd8'),
(7, 'jaya', '', '', 'jaya@gmail.com', 'jaya', 'cecbba5ce071e7aac9e213c975316ec4');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
`gaji_id` int(11) NOT NULL,
  `kreator_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `gaji_jumlah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Triggers `jobs`
--
DELIMITER //
CREATE TRIGGER `jobselesaidikerjakan` AFTER UPDATE ON `jobs`
 FOR EACH ROW BEGIN
IF NEW.`job_status` = 'selesai' THEN
UPDATE `order` SET `order`.`order_status` = 'selesai' WHERE `order`.`order_id` = NEW.`order_id`;
INSERT INTO `gaji` VALUES(NULL, NEW.`kreator_id`, NEW.`job_id`, (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)* (NEW.`job_keuntungan`/100));
INSERT INTO `pendapatan` VALUES(NULL, NEW.`job_id`, NOW(), (SELECT `order_total` FROM `order` WHERE `order`.`order_id`=NEW.`order_id`)-(SELECT `gaji_jumlah` FROM `gaji` WHERE `gaji`.`job_id`=NEW.`job_id`));
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kreator`
--

INSERT INTO `kreator` (`kreator_id`, `kreator_nama`, `kreator_alamat`, `kreator_telefon`, `kreator_konten`, `kreator_email`, `kreator_username`, `kreator_password`) VALUES
(1, 'm iqbal', 'Sewon Timbulharjo sewon Bantul', '0834576777', 'audio', 'iqbaluuuuu@gmail.com', 'iqbal', '1e03415333c2b6a791dbeb25d51350d5'),
(2, 'kreator', 'Bantul Bantul Bantul yogyakarta', '08654358899', 'teks', 'kreator@gmail.com', 'kreator', '23f5e1973b5a048ffaaa0bd0183b5f87'),
(3, 'apri', 'jogja', '08654678990', 'video', 'april@gmail.com', 'apri', '3c866e2b36c91e8a451d543043a8a5bf'),
(4, 'Rangga', 'bandung', '09765327865', 'audio', 'rangga@gmail.com', 'rangga', '863c2a4b6bff5e22294081e376fc1f51'),
(7, 'mazda', 'manding', '099998888', 'gambar', 'mazda@gmail.com', 'mazda', 'b7d0308621091afe8588693966373120'),
(8, 'honda', 'bantul', '0657899178', 'video', 'honda@gmail.com', 'honda', '2ab3343875e56dc0a15cbb6a98570cf2'),
(9, 'dada', '', '', '', 'dada@gmail.com', 'dada', 'b01abf84324066bdb4eed4d5bf20f887');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `pemesan_id`, `paket_id`, `order_date`, `order_jumlah`, `order_total`, `order_keterangan`, `order_status`, `order_terhapus`) VALUES
(30, 1, 19, '2016-03-24 13:45:44', 1, 100000, 'mmmm', 'pengerjaan', 0),
(31, 1, 19, '2016-03-24 13:59:31', 2, 200000, 'etyyuu', 'proses pembayaran', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paket_id`, `paket_nama`, `konten_jenis`, `paket_deskripsi`, `paket_jangkawaktu`, `paket_jumlah`, `paket_harga`, `paket_terhapus`) VALUES
(5, 'Paket 1', 'video', 'Ini adalah deskripsi Paket 1 kakakaka', '2 Minggu', '5', 240000, 1),
(6, 'Paket 2', 'teks', 'Paket konten teks', '1 Minggu', '5', 50000, 1),
(7, 'Paket 3', 'audio', 'Isi deskripsi paket 3', '2 minggu', '20', 300000, 1),
(8, 'Paket 4', 'audio', 'Paket konten audio', '2 minggu', '25', 200000, 1),
(9, 'Paket 7', 'video', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '1 minggu', '10', 300000, 1),
(10, 'paket a', 'audio', 'aaaaaaaaaaaaaaaa', '3 minggu', '20', 100000, 1),
(11, 'paket gold', 'gambar', 'Paket konten gambar', '2 Minggu', '10', 150000, 1),
(12, 'Paket Ultra', 'teks', 'deskripsi bababa kammaai akalalala ananana', '2 minggu', '15', 200000, 1),
(13, 'Paket Ultra', 'teks', 'paket ultra adalah', '2 minggu', '50', 30000, 1),
(14, 'Paket Emas', 'gambar', 'mamamam', '2 minggu', '1', 100000, 1),
(15, 'Paket aha', 'teks', 'mamkamka', '1 minggu', '3', 50000, 1),
(16, 'paket 88', 'teks', 'moiaoal', '1 minggu', '50', 300000, 1),
(17, 'paket 98', 'video', 'yjkl', '1 bulan', '1', 500000, 1),
(18, 'paket 32', 'gambar', 'mhtaak', '1 bulan', '5', 250000, 1),
(19, 'Paket Teks', 'teks', 'Paket Teks ini adalah', '1 Minggu', '5', 100000, 0),
(20, 'Paket Gambar', 'gambar', 'Paket gambar adalah', '1 Minggu', '3', 150000, 0),
(21, 'Paket Video', 'video', 'Paket Video adalah', '1 Minggu', '1', 100000, 0),
(22, 'Paket Audio', 'audio', 'Paket Audio Adalaha', '1 Minggu', '2', 100000, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_date`, `payment_total`, `payment_keterangan`, `payment_status`) VALUES
(16, 30, '2016-03-24 13:45:58', 100000, 'qetyuu', 'lunas');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `gaji_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
MODIFY `konten_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kreator`
--
ALTER TABLE `kreator`
MODIFY `kreator_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
MODIFY `paket_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
MODIFY `pendapatan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
