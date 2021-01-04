-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 11:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE `calon` (
  `id` int(11) NOT NULL,
  `nama_ketua` varchar(100) NOT NULL,
  `nama_wakil` varchar(100) DEFAULT NULL,
  `no_urut` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`id`, `nama_ketua`, `nama_wakil`, `no_urut`, `id_unit`, `id_tingkatan`, `images`) VALUES
(1, 'Fachrizal', 'Dodi', 1, 46, 1, ''),
(2, 'bharaka', 'Koko', 3, 46, 1, ''),
(3, 'Amara', 'Adit', 2, 46, 1, ''),
(4, 'Ghamal', 'Gilang', 2, 4, 2, ''),
(5, 'Sigit', 'Surya', 1, 4, 2, ''),
(6, 'Angga', 'Diki', 3, 4, 2, ''),
(7, 'Sukim', 'Fadil', 1, 1, 3, ''),
(8, 'Toro', 'Raka', 2, 1, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL,
  `kode_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`, `kode_fakultas`) VALUES
(1, 'FMIPA', 4),
(8, 'FIS', 3),
(9, 'FIP', 1),
(10, 'FBS', 2),
(12, 'FIK', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kode_fakultas` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `kode_fakultas`, `kode_jurusan`) VALUES
(1, 'Ilmu Komputer', 4, 46),
(2, 'Matematika', 4, 41),
(4, 'Kimia', 4, 43),
(5, 'Sejarah', 3, 35),
(9, 'Fisika', 4, 44),
(10, 'Biologi', 4, 45),
(11, 'Pend IPA', 4, 42),
(12, 'Geografi', 3, 33),
(14, 'Sosiologi', 3, 32),
(15, 'Pendidikan Guru SD', 1, 12),
(16, 'Pendidikan Guru PAUD', 1, 13),
(17, 'Bimbingan dan Konseling', 1, 14),
(18, 'Teknologi Pendidikan', 1, 15),
(19, 'Sastra Inggris', 2, 24),
(20, 'Pendidikan Bahasa Inggris', 2, 23),
(21, 'Pendidikan Bahasa Jepang', 2, 28),
(22, 'Pendidikan Bahasa Indonesia', 2, 26),
(23, 'Ilmu Politik', 3, 34),
(24, 'Pendidikan Jasmani, Kesehatan dan Rekreasi', 6, 63),
(25, 'Ilmu Keolahragaan', 6, 62),
(26, 'Kesehatan Masyarakat', 6, 65),
(27, 'Pendidikan Kepelatihan Olah Raga', 6, 61);

-- --------------------------------------------------------

--
-- Table structure for table `konfig`
--

CREATE TABLE `konfig` (
  `id` int(11) NOT NULL,
  `nama_pemilu` varchar(150) NOT NULL,
  `waktu_buka` datetime NOT NULL,
  `waktu_tutup` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfig`
--

INSERT INTO `konfig` (`id`, `nama_pemilu`, `waktu_buka`, `waktu_tutup`) VALUES
(4, 'Pemira 2020', '2021-01-04 16:53:00', '2021-01-05 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `id` int(11) NOT NULL,
  `nama_tingkatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`id`, `nama_tingkatan`) VALUES
(1, 'jurusan'),
(2, 'fakultas'),
(3, 'universitas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(10) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `nim`, `kode_jurusan`, `is_admin`) VALUES
(1, 'admin', '$2y$10$BGm8/s2bSJ0C.YgUIUhzuenspJsaqSPmAT8/oBOHtDqNRhc.hxtBu', 'Administrator', 0, 0, 1),
(13, 'ghamal', '$2y$10$zWqfW//X1OxgoCXm9ul31ep623lS/ORIoui.WnDpkrfatp7ShBJqm', 'Ghamal Febriyanto', 0, 46, 0),
(15, 'amara', '$2y$10$wC4LL5Ev9CkPiNCUX6FoOe08tw/WZV0kFTJV6UlScFE8A3k9Q/jCW', 'Amara Nur Ali', 0, 46, 0),
(16, 'fachrizal', '$2y$10$YAZfG4JmyjoNa/6PF0SxcOweQBjdSQ0qz4y67pmC7P9KeaS1K1pJa', 'Fachrizal Zulfi Hendra', 0, 46, 0),
(18, 'bharaka', '$2y$10$A/sASlDyH7rhfCgUKLQGb.M3QJ2Sk..WCeHGiq6lhk0szpeABq.Ay', 'Bharaka Zulfa Maraghi', 0, 46, 0),
(26, 'yoga', '$2y$10$ODXg8qr/n8xf8VLsVRQz4usfnrUAaR5epOtZNN5l8TRq1a3igEaei', 'Yoga Pratama', 0, 46, 0),
(27, 'dito', '$2y$10$U83r.2rI32L0K679SnYzg.61CmpyAXsNJIbaNih.d7S01RUcDkgv.', 'Dito Aulia', 0, 46, 0),
(28, 'desi', '$2y$10$L6HQ7xN6Walpcdg8z0uVjusXhRq/Y6VSbQt2k7zEfUc3u7fbp06qi', 'Desi Niagara', 0, 46, 0),
(29, 'zulfi', '$2y$10$U7KPUurmNDS24zx1IeMEuOWo6VJT7EfNqpRsk7b76oPSRo4KL3ZJ6', 'Zulfi Mahendra', 0, 46, 0),
(30, 'safira', '$2y$10$OHWYgtTu1IwhHuZgnuTv.uF8LmXymPqFvWwUbS.WK3.pXqiZ.2Gj2', 'Safira Seviana', 0, 46, 0),
(31, 'risma', '$2y$10$fWgIEehw10028lj3q7Kr0eLyq1YUKtD9tpsiKFvqVkhvqtEXkBAwi', 'Risma Evida', 0, 43, 0),
(32, 'damayanti', '$2y$10$Z.lupbpxIktUFyjWUOe7kugQz7t4eUkFwsPGTXwUSIdbcFkAD30MS', 'Damayanti', 0, 43, 0),
(33, 'dela', '$2y$10$ZKoDdWnPlPJi5.WRWe2GKOJjAfRWKIERmNueWLWLM7dLlNEId3pbS', 'Dela Ayu F', 0, 43, 0),
(34, 'ayuni', '$2y$10$xFL74ZW0jA5uuYdpH19COeTlE1WExxouYgMXm5yIK3DhN9sSIbr7y', 'Anna Ayuni', 0, 43, 0),
(35, 'sasha', '$2y$10$XBYpvHHGA/A6y3egEMH8H.tH7CIqtVMVUEVvli0dgKGV8g.ILtlAW', 'Sasha Anggita', 0, 43, 0),
(36, 'gita', '$2y$10$5.lwi723OJSOOX.mIvlA3e8Og9SqsQypWsiqXuWNAucUTtPZ5N1f.', 'Gita Febriyanti', 0, 43, 0),
(37, 'silvio', '$2y$10$hje95HyO6JKrNRLy4kijk.cPNj9N/NrIhNYuofJB6X4O3UJw6IEiK', 'Silvia Maharani', 0, 43, 0),
(38, 'kiki', '$2y$10$zvsCSRnlyqwnaNtd6rGWX.3Uh0BSwgIhsbbgFeBh0Jty7UBsVp8b2', 'Kiki Dwi Yulianto', 0, 43, 0),
(39, 'kodir', '$2y$10$3JkD8m51ykUgebB9dFggMOAvlsjxOhf8U9TXLuSLsKtQzpqmDiykC', 'Kodir Jaelani', 0, 46, 0),
(40, 'zulfa', '$2y$10$zpfkJ7BMsqKNZxpPjTdH6eAljT4Twbk0kJdp4hIRs2gClzi0nfXmW', 'Zulfa Prasetya', 0, 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_calon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `id_user`, `id_calon`) VALUES
(1, 15, 1),
(2, 15, 4),
(3, 15, 7),
(4, 16, 1),
(5, 16, 4),
(6, 16, 8),
(7, 13, 3),
(8, 13, 6),
(9, 13, 7),
(10, 18, 2),
(11, 18, 5),
(12, 18, 7),
(13, 20, 1),
(14, 20, 5),
(15, 20, 7),
(16, 26, 1),
(19, 29, 3),
(20, 29, 4),
(21, 29, 8),
(22, 27, 1),
(23, 27, 5),
(24, 27, 7),
(25, 28, 1),
(26, 28, 5),
(27, 28, 7),
(28, 30, 1),
(29, 30, 5),
(30, 30, 7),
(31, 40, 1),
(32, 40, 4),
(33, 40, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_fakultas` (`kode_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `konfig`
--
ALTER TABLE `konfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon`
--
ALTER TABLE `calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `konfig`
--
ALTER TABLE `konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
