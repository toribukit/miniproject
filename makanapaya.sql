-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2015 at 10:27 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `makanapaya`
--
CREATE DATABASE IF NOT EXISTS `makanapaya` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `makanapaya`;

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE IF NOT EXISTS `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `lahir_bln` varchar(2) DEFAULT NULL,
  `lahir_tgl` varchar(2) DEFAULT NULL,
  `lahir_thn` varchar(4) DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `email`, `gender`, `lahir_bln`, `lahir_tgl`, `lahir_thn`, `telp`, `alamat`, `user`) VALUES
(2, 'tori', 'trkrenz@yahoo.com', 'm', '04', '2', '1887', '', NULL, 6),
(3, 'dame', 'ddmpet@gmail.com', 'f', '11', '23', '1994', '', NULL, 8),
(4, 'domi', 'domi@gmail.com', 'm', '10', '7', '1994', '', NULL, 9),
(12, 'Ayam Goreng', 'ayamgoreng@gmail.com', NULL, NULL, NULL, NULL, '0897767', 'Jl. Sim2', 14),
(13, 'nasi goreng', 'nasigor@gmail.com', NULL, NULL, NULL, NULL, '0897767', 'Jl. Sim2', 15);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_kategori`
--

CREATE TABLE IF NOT EXISTS `daftar_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daftar_kategori` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `daftar_kategori`
--

INSERT INTO `daftar_kategori` (`id`, `daftar_kategori`) VALUES
(1, 'Cafe'),
(2, 'Fast food restaurant'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lokasi`
--

CREATE TABLE IF NOT EXISTS `jenis_lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_lokasi` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jenis_lokasi`
--

INSERT INTO `jenis_lokasi` (`id`, `jenis_lokasi`) VALUES
(1, 'Basuki Rahmat'),
(2, 'Mayjen Sungkono'),
(3, 'Bubutan'),
(4, 'Genteng'),
(5, 'Simokerto'),
(6, 'Tegalsari'),
(7, 'Asemrowo'),
(8, 'Benowo'),
(9, 'Lakar Santri'),
(10, 'gebang');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_makanan`
--

CREATE TABLE IF NOT EXISTS `jenis_makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_makanan` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis_makanan`
--

INSERT INTO `jenis_makanan` (`id`, `jenis_makanan`) VALUES
(2, 'Bakmi / Kwetiau'),
(3, 'Bakso'),
(4, 'Burger');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_makanan`
--

CREATE TABLE IF NOT EXISTS `kategori_makanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori_makanan`
--

INSERT INTO `kategori_makanan` (`id`, `nama`) VALUES
(1, 'Food'),
(2, 'Drink');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kontak` varchar(20) NOT NULL,
  `kontak` int(2) NOT NULL,
  `user` int(11) NOT NULL,
  `tempat_makan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `makanan` varchar(20) NOT NULL,
  `jenis_makanan` int(11) NOT NULL,
  `harga` float NOT NULL,
  `tempat_makan` int(11) NOT NULL,
  `kategori_makanan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `makanan`, `jenis_makanan`, `harga`, `tempat_makan`, `kategori_makanan`) VALUES
(1, 'coba', 1, 35, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `tempat_makan` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user`, `tempat_makan`, `rating`) VALUES
(2, 8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tempat_makan`
--

CREATE TABLE IF NOT EXISTS `tempat_makan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jenis_lokasi` int(11) NOT NULL,
  `klien` int(11) NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `tanggal_berdiri` date DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `images` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempat_makan`
--

INSERT INTO `tempat_makan` (`id`, `nama`, `lokasi`, `jenis_lokasi`, `klien`, `kategori`, `deskripsi`, `tanggal_berdiri`, `rating`, `images`) VALUES
(2, 'coba', 'coba', 1, 1, 1, 'coba', '2015-03-01', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `tempat_makan` int(11) NOT NULL,
  `testimoni` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `user`, `tempat_makan`, `testimoni`, `date`) VALUES
(11, 8, 2, 'ngedate sini yuk @tori\r\n', '2015-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0),
(7, 'dm', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2),
(8, 'ella', '18c16b100f9939085a79b6e25961f6b37441bee0', 2),
(9, 'domi', '43c5ea34d00c829f601d7f891ad1788f09f49b5b', 2),
(14, 'ayamgoreng', 'e39820722da4b4ef2f4015bbec431a1af23496ab', 1),
(15, 'nasigoreng', '70b790e53b9a5d642d73fc7fc15e5d2481d397b7', 1),
(16, 'fefer', '34ce9dfa80ceba1ba71b8f1e95b181080d49bb57', 2),
(17, 'gerod', 'cb4fc37552031728cfd380f1eab71fa6a37fc27c', 2),
(18, 'coba3', '89b7e0564c8974cb0a19c7b4ef60397b4f56f4c3', 2),
(19, 'coba4', 'bd6f1b028552076c4be39d446b0cf8a457a619fa', 2),
(20, 'coba5', '1570090d8e3d1de3541808be65b1b8da2b5b6b7a', 2),
(21, 'coba6', '00ecf62320e113f09d6aaa599920c09be85cdb0e', 2),
(23, 'coba8', '897a211b78cb52d108bc5aae5abe1274a7104eb8', 2),
(24, 'coba9', 'fb6bfd44a9453d945cd74f6ca62fa5633ca274ef', 2),
(25, 'coba10', 'aec27454ee213693c2a95f81ef93cf962f589c9b', 2),
(26, 'coba11', '46215d94d23636625fb42a0d4ce3bf48d0540da4', 2),
(27, 'coba11', '46215d94d23636625fb42a0d4ce3bf48d0540da4', 2),
(28, 'coba12', '407303113e49c9cec883986132d2872a27b12924', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
