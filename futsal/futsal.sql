-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 06:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `lapangid` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jam_mulai` varchar(50) NOT NULL,
  `jam_selesai` varchar(50) NOT NULL,
  `total_pembayaran` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `userid`, `lapangid`, `durasi`, `jam_mulai`, `jam_selesai`, `total_pembayaran`, `tanggal`, `telepon`, `alamat`, `status_pembayaran`) VALUES
(6, 0, 6, 1, '08:00', '09:00', '30000', '2022-12-28', '081572831102', 'Kp. Seni, Bandung', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `id_info` int(11) NOT NULL,
  `alamat_kami` varchar(255) NOT NULL,
  `email_kami` varchar(100) NOT NULL,
  `telp_kami` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactusinfo`
--

INSERT INTO `contactusinfo` (`id_info`, `alamat_kami`, `email_kami`, `telp_kami`) VALUES
(1, 'Zona Futsal\r\nJl.Raya Laswi No.200, Rt03/Rw02 Desa Biru, Kec.Majalaya, Kab.Bandung 40382', 'zonafutsal@gmail.com', '083820860012');

-- --------------------------------------------------------

--
-- Table structure for table `jam_main`
--

CREATE TABLE `jam_main` (
  `jamid` int(11) NOT NULL,
  `jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam_main`
--

INSERT INTO `jam_main` (`jamid`, `jam`) VALUES
(1, '09:00-10:00'),
(2, '10:00-11:00'),
(3, '11:00-12:00'),
(4, '12:00-13:00'),
(5, '13:00-14:00'),
(6, '14:00-15:00'),
(7, '15:00-16:00');

-- --------------------------------------------------------

--
-- Table structure for table `lapang`
--

CREATE TABLE `lapang` (
  `lapangid` int(11) NOT NULL,
  `jamid` int(11) NOT NULL,
  `nama_lapang` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapang`
--

INSERT INTO `lapang` (`lapangid`, `jamid`, `nama_lapang`, `kategori`, `harga`, `deskripsi`, `photo`) VALUES
(4, 0, 'Kiswara', 'Sintetis', '30000', 'Murah meriah yang penting keluar keringat', '2.jpg'),
(6, 0, 'Toha', 'Vinyl', '45000', 'Lengket anti jatuh', '3.jpg'),
(7, 0, 'Juara', 'Sintetis', '50000', 'Lapang sintentis dengan fasilitas No. 1 di Indonesia', 'sintetis.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `photo` varchar(225) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `usertype`, `fullname`, `photo`) VALUES
(4, 'Naufal', '$2y$10$z2HDazjvbgrwOghyCl7gh.jkj3ljZioDRV6c5ND6GctgTJehPnq/.', 'Costumer', 'Naufal H', 'default.png'),
(7, 'enjoy', '$2y$10$X5QO/jWUoh90.LS7QuSlru.0CWuSQEJLbtLTHei5fzayKn6JFkFbS', 'Admin', 'Hanif Ridal Warits', '1610459742872.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jam_main`
--
ALTER TABLE `jam_main`
  ADD PRIMARY KEY (`jamid`);

--
-- Indexes for table `lapang`
--
ALTER TABLE `lapang`
  ADD PRIMARY KEY (`lapangid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_main`
--
ALTER TABLE `jam_main`
  MODIFY `jamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lapang`
--
ALTER TABLE `lapang`
  MODIFY `lapangid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
