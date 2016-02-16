-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2014 at 05:53 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bioskop`
--
CREATE DATABASE `bioskop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bioskop`;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL,
  `judul_film` varchar(64) NOT NULL,
  `rating` float NOT NULL,
  `kode_genre` int(11) NOT NULL,
  `kode_klasifikasi_film` int(11) NOT NULL,
  `tahun_produksi` year(4) NOT NULL,
  `studio_produksi` varchar(32) NOT NULL,
  `durasi` time NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `image` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `klasifikasi_film_film_fk` (`kode_klasifikasi_film`),
  KEY `genre_film_fk` (`kode_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `rating`, `kode_genre`, `kode_klasifikasi_film`, `tahun_produksi`, `studio_produksi`, `durasi`, `tanggal_mulai`, `tanggal_selesai`, `image`, `harga`) VALUES
(1, 'Man of Steel', 6, 12, 22, 2011, 'dedwdqwdq', '01:01:01', '2014-11-02', '2015-01-01', 'image/2-d fucking jump.jpg', 12000),
(2, 'the Lord of the Rings', 6, 11, 23, 2013, 'rgergggg', '02:02:02', '2014-03-07', '2015-01-01', 'image/040_FP0993.jpg', 10000),
(3, 'Harry Potter 3 and the Prisoner of Azkaban', 7.2, 15, 23, 2009, 'herhhehh', '02:30:03', '2014-06-05', '2014-06-06', 'image/912129.jpg', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `kode_genre` int(11) NOT NULL,
  `nama_genre` varchar(32) NOT NULL,
  PRIMARY KEY (`kode_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`kode_genre`, `nama_genre`) VALUES
(11, 'Action'),
(12, 'Romance'),
(13, 'Horror'),
(14, 'Comedy'),
(15, 'Drama'),
(17, 'Anime');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `kode_teater` int(11) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `id_shift` int(10) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `film_jadwal_fk` (`id_film`),
  KEY `ruangan_jadwal_fk` (`kode_teater`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `kode_teater`, `tanggal_tayang`, `id_shift`) VALUES
(1, 1, 31, '2014-01-01', 51),
(2, 1, 32, '2014-01-02', 52);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_film`
--

CREATE TABLE IF NOT EXISTS `klasifikasi_film` (
  `kode_klasifikasi_film` int(11) NOT NULL,
  `nama_klasifikasi` varchar(32) NOT NULL,
  `Inisial_klasifikasi` varchar(32) NOT NULL,
  PRIMARY KEY (`kode_klasifikasi_film`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi_film`
--

INSERT INTO `klasifikasi_film` (`kode_klasifikasi_film`, `nama_klasifikasi`, `Inisial_klasifikasi`) VALUES
(21, 'Dewasa', 'D'),
(22, 'Semua Umur', 'SU'),
(23, 'Bimbingan Orangtua', 'BO'),
(24, 'Anak-Anak', 'A'),
(25, 'Remaja', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userid` varchar(400) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `level` int(11) NOT NULL,
  `balance` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userid`, `pass`, `level`, `balance`, `nama`) VALUES
('1310961000', '1310961000', 2, 2005, '1310961000'),
('1310961001', '12345', 2, 18000, 'Ryan'),
('admin', 'admin', 1, 0, 'admin'),
('user', 'user', 2, 488000, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `shift_jam`
--

CREATE TABLE IF NOT EXISTS `shift_jam` (
  `id_shift` int(11) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `jam_mulai` varchar(10) NOT NULL,
  PRIMARY KEY (`id_shift`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift_jam`
--

INSERT INTO `shift_jam` (`id_shift`, `shift`, `jam_mulai`) VALUES
(51, 'Shift 1', '08.00'),
(52, 'Shift 2', '11.00'),
(53, 'Shift 3', '14.00'),
(54, 'Shift 4', '19.00'),
(55, 'Shift 5', '22.00');

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE IF NOT EXISTS `teater` (
  `kode_teater` int(11) NOT NULL,
  `nama_teater` varchar(32) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  PRIMARY KEY (`kode_teater`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teater`
--

INSERT INTO `teater` (`kode_teater`, `nama_teater`, `jumlah_kursi`) VALUES
(31, 'teater 1', 50),
(32, 'teater 2', 50),
(33, 'teater 3', 50),
(34, 'teater 4', 50),
(35, 'teater 5', 60),
(36, 'teater 6', 60),
(37, 'teater 7', 60),
(38, 'teater 8', 60),
(39, 'teater 9', 60);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `tempno` int(11) NOT NULL,
  `tempnext` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`tempno`, `tempnext`) VALUES
(1, 1310961001);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id` int(255) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `judul` int(11) NOT NULL,
  `teater` int(11) NOT NULL,
  `tglm` date NOT NULL,
  `jam` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `pemilik` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `id_jadwal`, `judul`, `teater`, `tglm`, `jam`, `seat`, `pemilik`) VALUES
(1, 1, 1, 31, '2014-01-01', 51, 1, 'user'),
(2, 1, 1, 31, '2014-01-01', 51, 2, ''),
(3, 1, 1, 31, '2014-01-01', 51, 3, ''),
(4, 1, 1, 31, '2014-01-01', 51, 4, ''),
(5, 1, 1, 31, '2014-01-01', 51, 5, ''),
(6, 1, 1, 31, '2014-01-01', 51, 6, ''),
(7, 1, 1, 31, '2014-01-01', 51, 7, '1310961000'),
(8, 1, 1, 31, '2014-01-01', 51, 8, ''),
(9, 1, 1, 31, '2014-01-01', 51, 9, ''),
(10, 1, 1, 31, '2014-01-01', 51, 10, ''),
(11, 1, 1, 31, '2014-01-01', 51, 11, ''),
(12, 1, 1, 31, '2014-01-01', 51, 12, ''),
(13, 1, 1, 31, '2014-01-01', 51, 13, ''),
(14, 1, 1, 31, '2014-01-01', 51, 14, ''),
(15, 1, 1, 31, '2014-01-01', 51, 15, ''),
(16, 1, 1, 31, '2014-01-01', 51, 16, ''),
(17, 1, 1, 31, '2014-01-01', 51, 17, ''),
(18, 1, 1, 31, '2014-01-01', 51, 18, ''),
(19, 1, 1, 31, '2014-01-01', 51, 19, ''),
(20, 1, 1, 31, '2014-01-01', 51, 20, ''),
(21, 1, 1, 31, '2014-01-01', 51, 21, ''),
(22, 1, 1, 31, '2014-01-01', 51, 22, ''),
(23, 1, 1, 31, '2014-01-01', 51, 23, ''),
(24, 1, 1, 31, '2014-01-01', 51, 24, ''),
(25, 1, 1, 31, '2014-01-01', 51, 25, ''),
(26, 1, 1, 31, '2014-01-01', 51, 26, ''),
(27, 1, 1, 31, '2014-01-01', 51, 27, ''),
(28, 1, 1, 31, '2014-01-01', 51, 28, ''),
(29, 1, 1, 31, '2014-01-01', 51, 29, ''),
(30, 1, 1, 31, '2014-01-01', 51, 30, ''),
(31, 1, 1, 31, '2014-01-01', 51, 31, ''),
(32, 1, 1, 31, '2014-01-01', 51, 32, ''),
(33, 1, 1, 31, '2014-01-01', 51, 33, ''),
(34, 1, 1, 31, '2014-01-01', 51, 34, ''),
(35, 1, 1, 31, '2014-01-01', 51, 35, ''),
(36, 1, 1, 31, '2014-01-01', 51, 36, ''),
(37, 1, 1, 31, '2014-01-01', 51, 37, ''),
(38, 1, 1, 31, '2014-01-01', 51, 38, ''),
(39, 1, 1, 31, '2014-01-01', 51, 39, ''),
(40, 1, 1, 31, '2014-01-01', 51, 40, ''),
(41, 1, 1, 31, '2014-01-01', 51, 41, ''),
(42, 1, 1, 31, '2014-01-01', 51, 42, ''),
(43, 1, 1, 31, '2014-01-01', 51, 43, ''),
(44, 1, 1, 31, '2014-01-01', 51, 44, ''),
(45, 1, 1, 31, '2014-01-01', 51, 45, ''),
(46, 1, 1, 31, '2014-01-01', 51, 46, ''),
(47, 1, 1, 31, '2014-01-01', 51, 47, ''),
(48, 1, 1, 31, '2014-01-01', 51, 48, ''),
(49, 1, 1, 31, '2014-01-01', 51, 49, ''),
(50, 1, 1, 31, '2014-01-01', 51, 50, ''),
(51, 2, 1, 32, '2014-01-02', 52, 1, '1310961001'),
(52, 2, 1, 32, '2014-01-02', 52, 2, ''),
(53, 2, 1, 32, '2014-01-02', 52, 3, ''),
(54, 2, 1, 32, '2014-01-02', 52, 4, ''),
(55, 2, 1, 32, '2014-01-02', 52, 5, ''),
(56, 2, 1, 32, '2014-01-02', 52, 6, ''),
(57, 2, 1, 32, '2014-01-02', 52, 7, ''),
(58, 2, 1, 32, '2014-01-02', 52, 8, ''),
(59, 2, 1, 32, '2014-01-02', 52, 9, ''),
(60, 2, 1, 32, '2014-01-02', 52, 10, ''),
(61, 2, 1, 32, '2014-01-02', 52, 11, ''),
(62, 2, 1, 32, '2014-01-02', 52, 12, ''),
(63, 2, 1, 32, '2014-01-02', 52, 13, ''),
(64, 2, 1, 32, '2014-01-02', 52, 14, ''),
(65, 2, 1, 32, '2014-01-02', 52, 15, ''),
(66, 2, 1, 32, '2014-01-02', 52, 16, ''),
(67, 2, 1, 32, '2014-01-02', 52, 17, ''),
(68, 2, 1, 32, '2014-01-02', 52, 18, ''),
(69, 2, 1, 32, '2014-01-02', 52, 19, ''),
(70, 2, 1, 32, '2014-01-02', 52, 20, ''),
(71, 2, 1, 32, '2014-01-02', 52, 21, ''),
(72, 2, 1, 32, '2014-01-02', 52, 22, ''),
(73, 2, 1, 32, '2014-01-02', 52, 23, ''),
(74, 2, 1, 32, '2014-01-02', 52, 24, ''),
(75, 2, 1, 32, '2014-01-02', 52, 25, ''),
(76, 2, 1, 32, '2014-01-02', 52, 26, ''),
(77, 2, 1, 32, '2014-01-02', 52, 27, ''),
(78, 2, 1, 32, '2014-01-02', 52, 28, ''),
(79, 2, 1, 32, '2014-01-02', 52, 29, ''),
(80, 2, 1, 32, '2014-01-02', 52, 30, ''),
(81, 2, 1, 32, '2014-01-02', 52, 31, ''),
(82, 2, 1, 32, '2014-01-02', 52, 32, ''),
(83, 2, 1, 32, '2014-01-02', 52, 33, ''),
(84, 2, 1, 32, '2014-01-02', 52, 34, ''),
(85, 2, 1, 32, '2014-01-02', 52, 35, ''),
(86, 2, 1, 32, '2014-01-02', 52, 36, ''),
(87, 2, 1, 32, '2014-01-02', 52, 37, ''),
(88, 2, 1, 32, '2014-01-02', 52, 38, ''),
(89, 2, 1, 32, '2014-01-02', 52, 39, ''),
(90, 2, 1, 32, '2014-01-02', 52, 40, ''),
(91, 2, 1, 32, '2014-01-02', 52, 41, ''),
(92, 2, 1, 32, '2014-01-02', 52, 42, ''),
(93, 2, 1, 32, '2014-01-02', 52, 43, ''),
(94, 2, 1, 32, '2014-01-02', 52, 44, ''),
(95, 2, 1, 32, '2014-01-02', 52, 45, ''),
(96, 2, 1, 32, '2014-01-02', 52, 46, ''),
(97, 2, 1, 32, '2014-01-02', 52, 47, ''),
(98, 2, 1, 32, '2014-01-02', 52, 48, ''),
(99, 2, 1, 32, '2014-01-02', 52, 49, ''),
(100, 2, 1, 32, '2014-01-02', 52, 50, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `genre_film_fk` FOREIGN KEY (`kode_genre`) REFERENCES `genre` (`kode_genre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `klasifikasi_film_film_fk` FOREIGN KEY (`kode_klasifikasi_film`) REFERENCES `klasifikasi_film` (`kode_klasifikasi_film`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `film_jadwal_fk` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ruangan_jadwal_fk` FOREIGN KEY (`kode_teater`) REFERENCES `teater` (`kode_teater`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
