-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 08:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasbg`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `jenis`, `nama`, `geom`) VALUES
(1, 'Mall', 'Tunjungan Plaza', 'POINT (112.7392338 -7.262471)'),
(2, 'Mall', 'Mall Kaza', 'POINT(112.75872463291788 -7.247900045064824)'),
(3, 'Sekolah', 'SMA Negeri 13 Surabaya', 'POINT(112.66257546192953 -7.307842786275572)'),
(4, 'Sekolah', 'SMP Negeri 28 Surabaya', 'POINT(112.66486970045825 -7.308571224937467)'),
(5, 'Tempat Wisata', 'Kebun Binatang Surabaya', 'POINT(112.73593219797714 -7.295235599660202)'),
(6, 'Sekolah', 'SMA Negeri 19 Surabaya', 'POINT(112.75975710088572 -7.309962616485635)'),
(7, 'Sekolah', 'Smp Iplems', 'POINT(112.76425629363338 -7.286102966926336)'),
(8, 'Tempat Wisata', 'Kebun Bibit Wonorejo', 'POINT(112.78901893948449 -7.312278903059351)'),
(9, 'Mall', ' Rungkut Makmur Square', 'POINT(112.7713405231142 -7.321262386428771)'),
(10, 'Mall', ' Rungkut Makmur Square', 'POINT(112.7713405231142 -7.321262386428771)'),
(11, 'Pasar', 'Pasar Pahing', 'POINT(112.77092656482493 -7.330679624010074)'),
(12, 'Pasar', 'Pasar Pahing', 'POINT(112.77092656482493 -7.330679624010074)'),
(13, 'Sekolah', 'SD Negri Klampis Ngasem 1', 'POINT(112.77855678273248 -7.28855981972724)'),
(14, 'Sekolah', 'SD Negri Klampis Ngasem 1', 'POINT(112.77855678273248 -7.28855981972724)'),
(15, 'Mall', 'HI Tech Mall', 'POINT(112.75070093349007 -7.2524088400445805)'),
(16, 'Sekolah', 'Akademi Kebidanan Girya Husada', 'POINT(112.70475330848733 -7.292480749481783)'),
(17, 'Pasar', 'Hokkey', 'POINT(112.68996030585615 -7.271798335087027)'),
(18, 'Sekolah', 'Kampus Universitas Airlangga', 'POINT(112.78685512209118 -7.266327864243124)'),
(19, 'Pasar', 'Supermarket Giant', 'POINT(112.73502023670918 -7.267789285963687)'),
(20, 'Pasar', 'Supermarket Giant', 'POINT(112.73502023670918 -7.267789285963687)'),
(21, 'Restoran', 'Kedai Tua Baru', 'POINT(112.73890282988869 -7.265905747043703)'),
(22, 'Restoran', 'A Cafe', 'POINT(112.7404805157462 -7.263346418099758)'),
(23, 'Sekolah', 'Institut Teknologi sepuluh nopember', 'POINT(112.79554481447538 -7.282846889388608)'),
(24, 'Sekolah', 'Institut Teknologi sepuluh nopember', 'POINT(112.79554481447538 -7.282846889388608)'),
(25, 'Tempat Wisata', 'Chicco Swalayan', 'POINT(112.75495640908429 -7.32050032669305)'),
(26, 'Restoran', 'Kantin FIB', 'POINT(112.76007207034318 -7.2731510314866625)'),
(27, 'Pasar', 'Pasar Wiyung', 'POINT(112.69410151746182 -7.314217462477302)'),
(28, 'Pasar', 'Pasar Wiyung', 'POINT(112.69410151746182 -7.314217462477302)'),
(29, 'Restoran', 'Pak Rudy', 'POINT(112.71002307438695 -7.28890973459778)'),
(30, 'Pasar', 'Superindo', 'POINT(112.77154398634222 -7.267562341363458)'),
(31, 'Tempat Wisata', 'Pura Candi Cemara Agung', 'POINT(112.65993340432068 -7.264575051635262)'),
(32, 'Tempat Wisata', 'Pasar induk Oso Wilangon', 'POINT(112.65936472751258 -7.2105906707278535)');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_11_29_163243_create_lokasis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id` bigint(20) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `alamat` varchar(10000) NOT NULL,
  `lt` int(11) NOT NULL,
  `lb` int(11) NOT NULL,
  `foto` blob NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `geom` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id`, `kategori`, `jenis`, `harga`, `alamat`, `lt`, `lb`, `foto`, `keterangan`, `geom`) VALUES
(1, 'Jual', 'Rumah', 2147483647, 'Royal Residence', 120, 200, '', 'Rumah Royal Residence cluster Addington', 'POLYGON((112.674734647083 -7.315447898294025,112.67677544299417 -7.315868928457093,112.67664483218041 -7.316330441827418,112.67466934167611 -7.315917508704288,112.674734647083 -7.315447898294025))');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
