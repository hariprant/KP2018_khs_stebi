-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2018 at 07:09 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stebi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `passwd`) VALUES
(1, 'admin', 'admin', '7ac60358d4f56501575fa9def6cc3bc3');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(25) NOT NULL,
  `nama_dsn` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('islam') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dsn`, `gender`, `tgl_lahir`, `agama`, `alamat`, `foto`, `passwd`, `no_telp`, `email`) VALUES
('195607011987101001', 'Agung', 'L', '1997-10-06', 'islam', 'Yogyakarta', 'user.jpg', '513106c051f94528f1d386926aa65e1a', '085870052142', 'hpranata14@gmail.com'),
('195912131985031002', 'Sugeng', 'L', '1997-10-06', 'islam', 'Klaten', 'user2.jpg', '513106c051f94528f1d386926aa65e1a', '085870052142', 'hpranata14@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakul` int(11) NOT NULL,
  `fakul` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakul`, `fakul`) VALUES
(1, 'FITE');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('islam') NOT NULL,
  `angkatan` char(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `semester` int(2) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `gender`, `tgl_lahir`, `agama`, `angkatan`, `alamat`, `no_telp`, `email`, `semester`, `foto`, `id_prodi`, `id_kelas`, `passwd`) VALUES
('5150411219', 'Hari Pranata', 'L', '1996-09-05', 'islam', '2015', 'Magelang', '085870052142', 'hpranata14@gmail.com', 7, '5150411219.jpg', 1, 2, '3fc0a7acf087f549ac2b266baf94b8b1'),
('5150411222', 'Andika Maulana', 'L', '1997-09-07', 'islam', '2015', 'Temanggung', '085870052142', 'hpranata14@gmail.com', 7, '5150411222.jpg', 1, 2, '3fc0a7acf087f549ac2b266baf94b8b1'),
('5150411230', 'Jihan Mustofa', 'L', '1997-09-07', 'islam', '2015', 'Bojong', '085870052142', 'hpranata14@gmail.com', 7, '', 1, 2, '3fc0a7acf087f549ac2b266baf94b8b1');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kd_mk` varchar(11) NOT NULL,
  `matkul` varchar(25) NOT NULL,
  `sks` int(2) NOT NULL,
  `semester` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kd_mk`, `matkul`, `sks`, `semester`) VALUES
('MK001', 'Matematika', 3, 2),
('MK002', 'Java', 2, 6),
('MK003', 'Bahasa Inggris', 2, 3),
('MK004', 'Bahasa Indonesia', 2, 4),
('MK005', 'Algoritma 1', 2, 4),
('MK006', 'Algoritma 2', 3, 5),
('MK007', 'Pendidikan Agama', 2, 5),
('MK008', 'Komputer Masyarakat', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mengambil`
--

CREATE TABLE `mengambil` (
  `id_ambil` int(11) NOT NULL,
  `nim` char(15) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kd_mk` varchar(11) NOT NULL,
  `hari` varchar(11) NOT NULL,
  `pre` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengambil`
--

INSERT INTO `mengambil` (`id_ambil`, `nim`, `nip`, `kd_mk`, `hari`, `pre`) VALUES
(1, '5150411219', '195607011987101001', 'MK001', 'Senin', 14),
(2, '5150411219', '195607011987101001', 'MK002', 'Senin', 12),
(3, '5150411219', '195607011987101001', 'MK004', 'Senin', 13),
(4, '5150411219', '195912131985031002', 'MK005', 'Senin', 11),
(5, '5150411219', '195912131985031002', 'MK006', 'Senin', 10),
(6, '5150411222', '195607011987101001', 'MK001', 'Senin', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mengampu`
--

CREATE TABLE `mengampu` (
  `id_ampu` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kd_mk` varchar(11) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengampu`
--

INSERT INTO `mengampu` (`id_ampu`, `nip`, `kd_mk`, `thn_ajaran`) VALUES
(1, '195607011987101001', 'MK001', '2015-2016'),
(2, '195607011987101001', 'MK002', '2016-2017'),
(3, '195607011987101001', 'MK003', '2016-2017'),
(4, '195912131985031002', 'MK004', '2016-2017'),
(5, '195912131985031002', 'MK005', '2016-2017'),
(6, '195912131985031002', 'MK006', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim` char(15) NOT NULL,
  `id_ampu` int(11) NOT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `id_ampu`, `uts`, `uas`, `nilai`) VALUES
(1, '5150411219', 1, 70, 88, 'A'),
(2, '5150411219', 2, 60, 60, 'C'),
(3, '5150411222', 1, 60, 85, 'A'),
(4, '5150411219', 4, 100, 70, 'B'),
(5, '5150411219', 5, 89, 95, 'A'),
(6, '5150411219', 3, 10, 10, 'C'),
(7, '5150411230', 1, 67, 90, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakul` int(11) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `jenjang` enum('D3','S1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakul`, `prodi`, `jenjang`) VALUES
(1, 1, 'Informatika', 'S1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakul`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kd_mk`);

--
-- Indexes for table `mengambil`
--
ALTER TABLE `mengambil`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `mengampu`
--
ALTER TABLE `mengampu`
  ADD PRIMARY KEY (`id_ampu`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_ampu` (`id_ampu`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakul` (`id_fakul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mengambil`
--
ALTER TABLE `mengambil`
  MODIFY `id_ambil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mengampu`
--
ALTER TABLE `mengampu`
  MODIFY `id_ampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `mengambil`
--
ALTER TABLE `mengambil`
  ADD CONSTRAINT `mengambil_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `mengambil_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `matkul` (`kd_mk`),
  ADD CONSTRAINT `mengambil_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `mengampu`
--
ALTER TABLE `mengampu`
  ADD CONSTRAINT `mengampu_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `matkul` (`kd_mk`),
  ADD CONSTRAINT `mengampu_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`id_ampu`) REFERENCES `mengampu` (`id_ampu`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakul`) REFERENCES `fakultas` (`id_fakul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
