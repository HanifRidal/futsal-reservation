-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 12:01 PM
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
  `jadwalid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nama_tim` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL DEFAULT 1,
  `total_pembayaran` varchar(100) NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `jadwalid`, `userid`, `nama_tim`, `durasi`, `total_pembayaran`, `tanggal_pesan`, `telepon`, `alamat`, `status_pembayaran`) VALUES
(22, 1, 7, 'Cilegon FC', 1, '30000', '2023-02-11 11:59:04', '02838246', 'Bandung', 'NO'),
(23, 85, 7, 'Manchester City', 1, '30000', '2023-04-26 10:00:08', '00000000', 'Bandung', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email_pesan` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idcontact`, `nama_lengkap`, `email_pesan`, `no_telpon`, `pesan`) VALUES
(1, 'Bima Rizki', 'bima@gmail.com', '09876555', 'p'),
(2, 'Bima Rizki', 'bima@gmail.com', '089736712', 'Mantap'),
(3, 'Hanif', 'hanifridalw@gmail.com', '0897362712', 'P');

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
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `hariid` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`hariid`, `nama`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwalid` int(11) NOT NULL,
  `hariid` int(1) NOT NULL,
  `lapangid` int(11) NOT NULL,
  `jamid` int(11) NOT NULL,
  `pakai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwalid`, `hariid`, `lapangid`, `jamid`, `pakai`) VALUES
(1, 1, 4, 1, 1),
(2, 1, 4, 2, 0),
(3, 1, 4, 3, 0),
(4, 1, 4, 4, 0),
(5, 1, 4, 5, 0),
(6, 1, 4, 6, 0),
(7, 1, 4, 7, 0),
(8, 1, 6, 1, 0),
(9, 1, 6, 2, 0),
(10, 1, 6, 3, 0),
(11, 1, 6, 4, 0),
(12, 1, 6, 5, 0),
(13, 1, 6, 6, 0),
(14, 1, 6, 7, 0),
(15, 1, 7, 1, 0),
(16, 1, 7, 2, 0),
(17, 1, 7, 3, 0),
(18, 1, 7, 4, 0),
(19, 1, 7, 5, 0),
(20, 1, 7, 6, 0),
(21, 1, 7, 7, 0),
(22, 2, 4, 1, 1),
(23, 2, 4, 2, 0),
(24, 2, 4, 3, 0),
(25, 2, 4, 4, 0),
(26, 2, 4, 5, 0),
(27, 2, 4, 6, 0),
(28, 2, 4, 7, 0),
(29, 2, 6, 1, 0),
(30, 2, 6, 2, 0),
(31, 2, 6, 3, 0),
(32, 2, 6, 4, 0),
(33, 2, 6, 5, 0),
(34, 2, 6, 6, 0),
(35, 2, 6, 7, 0),
(36, 2, 7, 1, 0),
(37, 2, 7, 2, 0),
(38, 2, 7, 3, 0),
(39, 2, 7, 4, 0),
(40, 2, 7, 5, 0),
(41, 2, 7, 6, 0),
(42, 2, 7, 7, 0),
(43, 3, 4, 1, 0),
(44, 3, 4, 2, 0),
(45, 3, 4, 3, 0),
(46, 3, 4, 4, 0),
(47, 3, 4, 5, 0),
(48, 3, 4, 6, 0),
(49, 3, 4, 7, 0),
(50, 3, 6, 1, 0),
(51, 3, 6, 2, 0),
(52, 3, 6, 3, 0),
(53, 3, 6, 4, 0),
(54, 3, 6, 5, 0),
(55, 3, 6, 6, 0),
(56, 3, 6, 7, 0),
(57, 3, 7, 1, 0),
(58, 3, 7, 2, 0),
(59, 3, 7, 3, 0),
(60, 3, 7, 4, 0),
(61, 3, 7, 5, 0),
(62, 3, 7, 6, 0),
(63, 3, 7, 7, 0),
(64, 4, 4, 1, 0),
(65, 4, 4, 2, 0),
(66, 4, 4, 3, 0),
(67, 4, 4, 4, 0),
(68, 4, 4, 5, 0),
(69, 4, 4, 6, 0),
(70, 4, 4, 7, 0),
(71, 4, 6, 1, 0),
(72, 4, 6, 2, 0),
(73, 4, 6, 3, 0),
(74, 4, 6, 4, 0),
(75, 4, 6, 5, 0),
(76, 4, 6, 6, 0),
(77, 4, 6, 7, 0),
(78, 4, 7, 1, 0),
(79, 4, 7, 2, 0),
(80, 4, 7, 3, 0),
(81, 4, 7, 4, 0),
(82, 4, 7, 5, 0),
(83, 4, 7, 6, 0),
(84, 4, 7, 7, 0),
(85, 5, 4, 1, 1),
(86, 5, 4, 2, 0),
(87, 5, 4, 3, 0),
(88, 5, 4, 4, 0),
(89, 5, 4, 5, 0),
(90, 5, 4, 6, 0),
(91, 5, 4, 7, 0),
(92, 5, 6, 1, 0),
(93, 5, 6, 2, 0),
(94, 5, 6, 3, 0),
(95, 5, 6, 4, 0),
(96, 5, 6, 5, 0),
(97, 5, 6, 6, 0),
(98, 5, 6, 7, 0),
(99, 5, 7, 1, 0),
(100, 5, 7, 2, 0),
(101, 5, 7, 3, 0),
(102, 5, 7, 4, 0),
(103, 5, 7, 5, 0),
(104, 5, 7, 6, 0),
(105, 5, 7, 7, 0),
(106, 6, 4, 1, 0),
(107, 6, 4, 2, 0),
(108, 6, 4, 3, 0),
(109, 6, 4, 4, 0),
(110, 6, 4, 5, 0),
(111, 6, 4, 6, 0),
(112, 6, 4, 7, 0),
(113, 6, 6, 1, 0),
(114, 6, 6, 2, 0),
(115, 6, 6, 3, 0),
(116, 6, 6, 4, 0),
(117, 6, 6, 5, 0),
(118, 6, 6, 6, 0),
(119, 6, 6, 7, 0),
(120, 6, 7, 1, 0),
(121, 6, 7, 2, 0),
(122, 6, 7, 3, 0),
(123, 6, 7, 4, 0),
(124, 6, 7, 5, 0),
(125, 6, 7, 6, 0),
(126, 6, 7, 7, 0),
(127, 7, 4, 1, 0),
(128, 7, 4, 2, 0),
(129, 7, 4, 3, 0),
(130, 7, 4, 4, 0),
(131, 7, 4, 5, 0),
(132, 7, 4, 6, 0),
(133, 7, 4, 7, 0),
(134, 7, 6, 1, 0),
(135, 7, 6, 2, 0),
(136, 7, 6, 3, 0),
(137, 7, 6, 4, 0),
(138, 7, 6, 5, 0),
(139, 7, 6, 6, 0),
(140, 7, 6, 7, 0),
(141, 7, 7, 1, 0),
(142, 7, 7, 2, 0),
(143, 7, 7, 3, 0),
(144, 7, 7, 4, 0),
(145, 7, 7, 5, 0),
(146, 7, 7, 6, 0),
(147, 7, 7, 7, 0);

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
  `nama_lapang` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapang`
--

INSERT INTO `lapang` (`lapangid`, `nama_lapang`, `kategori`, `harga`, `deskripsi`, `photo`) VALUES
(4, 'Kiswara', 'Sintetis', '30000', 'Murah meriah yang penting keluar keringat', '2.jpg'),
(6, 'Toha', 'Vinyl', '45000', 'Lengket anti jatuh', '3.jpg'),
(7, 'Juara', 'Sintetis', '50000', 'Lapang sintentis dengan fasilitas No. 1 di Indonesia', 'sintetis.jpeg');

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
(4, 'Naufal', '$2y$10$TWEBbasksvOypKjSADBJE.J14Mn2oJPUvYv52FhX2A8GPcPy.2rSO', 'Costumer', 'Naufal H', 'default.png'),
(7, 'enjoy', '$2y$10$f5UARpBJaX8fQmgZfASJS.RHbfUW9B02EuMHJXxdv8Dl80AOu225K', 'Admin', 'Hanif Ridal Warits', '1610459742872.jpg'),
(8, 'Afif', '$2y$10$6ncyPUvMldHvd4QM6rLuwOc9Iz0iGGfS4Ws/TodbruZa192xyBT66', 'Admin', 'Afif Naufal Hafidz', 'default.png'),
(12, 'Asep', '$2y$10$DTbp4x5eoJ63.ZhMxpg1rukfVWez3C8IcQws20E758fd0lvS9YO4G', 'Costumer', 'Asep Bedog', 'assistance.png'),
(13, 'hanif17', '$2y$10$xEakvgqu6z.0ShZOUTio/eFXlFrhT/qtYW4Y9ZgV0REva.beUx3xS', 'Costumer', 'Hanif Ridal Warits', 'default.png'),
(14, 'Ujang', '$2y$10$yvrvDZJKqZE34sdI.CTkqupvIpU8iMdDCDMT4tdULMom7j6AxppSu', 'Costumer', 'Rouf hardiansyah', 'default.png'),
(15, 'Manto', '$2y$10$AXl0PyCIIkVzgZufdZVJ6OkGCKjMwdUGCc78aG2OtrGMx8Hqt.wAC', 'Costumer', 'Manto aja', 'default.png'),
(16, 'Mahmud', '$2y$10$8ZFmEH77TvfOFgRdUh3t5e8k5MTJMy/hDRKOVr1.GZIQbbv.dcsvW', 'Costumer', 'Mahmud md', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `jadwalid` (`jadwalid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Indexes for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`hariid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwalid`),
  ADD KEY `jamid` (`jamid`),
  ADD KEY `lapangid` (`lapangid`),
  ADD KEY `hariid` (`hariid`);

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
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`jadwalid`) REFERENCES `jadwal` (`jadwalid`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`jamid`) REFERENCES `jam_main` (`jamid`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`lapangid`) REFERENCES `lapang` (`lapangid`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`hariid`) REFERENCES `hari` (`hariid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
