-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 01:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kd_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `password_guru` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kd_guru`, `nama_guru`, `id_mapel`, `password_guru`, `id_level`) VALUES
('KD001', 'Dinda Arista', 1, '123', 1),
('KD002', 'Yanuar Eko Ardiansyah', 3, '123', 2),
('KD004', 'Santi', 4, '123', 3),
('KD005', 'Lolita', 2, '123', 2),
('KD006', 'Venus', 3, '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kd_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kd_guru`) VALUES
(1, '7A', 'KD005'),
(2, '7B', 'KD002'),
(3, '8C', 'KD006');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Walas'),
(3, 'Guru'),
(4, 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Ilmu Pengetahuan Alam'),
(2, 'Bahasa Inggris'),
(3, 'Bahasa Jawa'),
(4, 'Fisika');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `uploaded_at` date NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `kd_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `filename`, `uploaded_at`, `kelas`, `kd_guru`) VALUES
(2, 'Belajar JOWO', '682ae75a4edaf_CV.pdf', '2025-05-19', '7', 'KD002'),
(3, 'Basic English', '682aee8a5147a_CV.pdf', '2025-05-19', '7', 'KD003');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `guru` varchar(50) NOT NULL,
  `saran` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nis`, `guru`, `saran`, `waktu`) VALUES
(2, '223344', 'Pak Bayu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2025-05-18 09:52:30'),
(3, '223344', 'Pak Muharyo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2025-05-18 14:54:08'),
(4, '223344', 'Bu Raida', 'lorem ipsum', '2025-05-18 14:58:50'),
(5, '223344', 'www', 'asd', '2025-05-18 15:01:13'),
(6, '223344', 'jjj', 'hahaha', '2025-05-18 15:02:36'),
(7, '223344', 'tes', 'ppp', '2025-05-18 15:03:50'),
(8, '112233', 'Bu vivi', 'halo bu', '2025-05-18 15:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `password_siswa` varchar(100) NOT NULL,
  `tentang_siswa` text DEFAULT NULL,
  `masalah_siswa` text DEFAULT NULL,
  `target_siswa` text DEFAULT NULL,
  `metode_siswa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `id_kelas`, `password_siswa`, `tentang_siswa`, `masalah_siswa`, `target_siswa`, `metode_siswa`) VALUES
('112233', 'Yultarizal', 1, '123', 'Halo', 'Guys', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Auditory'),
('223344', 'Agus Suryadi', 2, '123', NULL, NULL, NULL, 'Kinesthetic'),
('445566', 'Aria Huda', 2, '123', NULL, NULL, NULL, 'Reading'),
('778899', 'Baehaqi', 3, '123', NULL, NULL, NULL, 'Visual'),
('909090', 'Bambang', 3, '123', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul_video` varchar(100) NOT NULL,
  `link_video` text NOT NULL,
  `upload_at` date NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `kd_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `judul_video`, `link_video`, `upload_at`, `kelas`, `kd_guru`) VALUES
(2, 'GTA 6 Trailer 2', 'https://youtu.be/VQRLujxTm3c?si=j_SW4vrv5l2r5lhA', '2025-05-20', '7', 'KD004'),
(3, 'GTA 6 Trailer 1', 'https://youtu.be/QdBZY2fkU-0?si=_mO4jHgQpnpZfR35', '2025-05-20', '8', 'KD004'),
(4, 'SENYAP', 'https://youtu.be/RcvH2hvvGh4?si=hCqwmKdtR4XopRW4', '2025-05-20', '8', 'KD006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kd_guru` (`kd_guru`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
