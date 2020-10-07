-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2020 at 11:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi-gis-covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_desa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `id_desa`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_jenis_bantuan` int(11) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `kk` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL,
  `lat_bantuan` varchar(225) NOT NULL,
  `lng_bantuan` varchar(225) NOT NULL,
  `foto_tampak_depan` varchar(225) NOT NULL,
  `foto_tampak_samping` varchar(225) NOT NULL,
  `foto_tampak_ruang_tamu` varchar(225) NOT NULL,
  `nominal_bantuan` int(11) NOT NULL,
  `tanggal_terima_bantuan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `id_desa`, `id_jenis_bantuan`, `nik`, `kk`, `nama`, `jk`, `alamat`, `keterangan`, `lat_bantuan`, `lng_bantuan`, `foto_tampak_depan`, `foto_tampak_samping`, `foto_tampak_ruang_tamu`, `nominal_bantuan`, `tanggal_terima_bantuan`) VALUES
(14, 1, 2, '1701040051200000', '', 'AMINAH', 'P', 'DESA MELAO', '', '-4.466528460343346', '102.93861258897229', '', '', '', 0, '0000-00-00 00:00:00'),
(15, 1, 2, '1701046012720000', '', 'ELMAN', 'L', 'DESA MELAO', '', '-4.466619712742398', '102.93836079660102', '', '', '', 0, '0000-00-00 00:00:00'),
(21, 1, 2, '1701042208690002', '', 'SUSMAN', 'L', 'DESA MELAO', '', '-4.466605339654653', '102.93846640858098', '', '', '', 0, '0000-00-00 00:00:00'),
(22, 1, 2, '1701020405940002', '', 'LENDA NOPITA SARI', 'P', 'DESA MELAO', '', '-4.46663141176709', '102.93857671442672', '', '', '', 0, '0000-00-00 00:00:00'),
(24, 1, 2, '1701021103900003', '', 'WIWING MARZON', 'L', 'DESA MELAO', '', '-4.466565228710628', '102.93862968805476', '', '', '', 0, '0000-00-00 00:00:00'),
(26, 1, 2, '1701041708810003', '', 'DEKA RAHMADDANI', 'L', 'DESA MELAO', '', '-4.466587289730114', '102.93853681656762', '', '', '', 0, '0000-00-00 00:00:00'),
(27, 1, 2, '1701044107330020', '', 'AWALIA', 'P', 'DESA MELAO', '', '-4.46652678905388', '102.93844260397597', '', '', '', 0, '0000-00-00 00:00:00'),
(28, 1, 2, '1701640707820001', '', 'AZIZ RAHMAD', 'L', 'DESA MELAO', '', '-4.466578599025549', '102.93844930949851', '', '', '', 0, '0000-00-00 00:00:00'),
(29, 1, 2, '1701043103910001', '', 'EFAN ADE PUTRA ', 'L', 'DESA MELAO', '', '-4.46652043815387', '102.93836113187714', '', '', '', 0, '0000-00-00 00:00:00'),
(30, 1, 2, '1701045706860001', '', 'HELI SRI WAHYU NINGSI', 'P', 'DESA MELAO', '', '-4.466554866716407', '102.93839197728082', '', '', '', 0, '0000-00-00 00:00:00'),
(31, 1, 2, '1701041073600012', '', 'SARUL', 'L', 'DESA MELAO', '', '-4.466551189879702', '102.93842852237864', '', '', '', 0, '0000-00-00 00:00:00'),
(32, 1, 2, '1701041011670002', '', 'SUHIN', 'L', 'DESA MELAO', '', '-4.46658896101944', '102.93842282268449', '', '', '', 0, '0000-00-00 00:00:00'),
(33, 1, 2, '1701041402500001', '', 'TASLIM', 'L', 'DESA MELAO', '', '-4.466600660044628', '102.93845635029717', '', '', '', 0, '0000-00-00 00:00:00'),
(34, 1, 2, '1701041504700001', '', 'UJANG SURATMAN', 'L', 'DESA MELAO', '', '-4.466629740477867', '102.93842818710252', '', '', '', 0, '0000-00-00 00:00:00'),
(35, 1, 2, '1701040608850002', '', 'EDI', 'L', 'DESA MELAO', '', '-4.466635088603388', '102.93849256011887', '', '', '', 0, '0000-00-00 00:00:00'),
(36, 1, 2, '1701040107620021', '', 'WARNI', 'L', 'DESA MELAO', '', '-4.466583612893576', '102.93853983405276', '', '', '', 0, '0000-00-00 00:00:00'),
(37, 1, 2, '1701042202890001', '', 'MEGI PUTRA', 'L', 'DESA MELAO', '', '-4.466500382679815', '102.93861560645743', '', '', '', 0, '0000-00-00 00:00:00'),
(38, 1, 2, '1701010405770002', '', 'NUAN NARWAWAN', 'L', 'DESA MELAO', '', '-4.466521106669671', '102.93860286596461', '', '', '', 0, '0000-00-00 00:00:00'),
(39, 1, 2, '1701044107530073', '', 'RENAS', 'P', 'DESA MELAO', '', '-4.466521775185459', '102.93825417879268', '', '', '', 0, '0000-00-00 00:00:00'),
(40, 1, 2, '1701020405940002', '', 'MIKI SYAHPUTRA', 'L', 'DESA MELAO', '', '-4.466576593478323', '102.93822433921738', '', '', '', 0, '0000-00-00 00:00:00'),
(41, 1, 2, '1701042805860002', '', 'HENDRO SANTOSO', 'L', 'DESA MELAO', '', '-4.466604671138941', '102.93826088431521', '', '', '', 0, '0000-00-00 00:00:00'),
(42, 1, 2, '1701020701870000', '', 'RENTO', 'L', 'DESA MELAO', '', '-4.4665812730885', '102.93828535947247', '', '', '', 0, '0000-00-00 00:00:00'),
(43, 1, 2, '1701046106880001', '', 'ANITA FITRIANI', 'P', 'DESA MELAO', '', '-4.466539825111613', '102.93832894536897', '', '', '', 0, '0000-00-00 00:00:00'),
(44, 1, 2, '1701026102840001', '', 'ANITA KARUNIA', 'P', 'DESA MELAO', '', '-4.466573250899608', '102.93832089874192', '', '', '', 0, '0000-00-00 00:00:00'),
(45, 1, 2, '1704030806890003', '', 'BAYU LESTARI', 'P', 'DESA MELAO', '', '-4.466547847300873', '102.938358114392', '', '', '', 0, '0000-00-00 00:00:00'),
(46, 1, 2, '1701044103700001', '', 'MARYANA', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(50, 1, 2, '1701043009880001', '', 'EFWIN WARDONO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(51, 1, 2, '1701040707770003', '', 'FERY', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(52, 1, 2, '1701042108690001', '', 'SEKRAN YULNADI', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(53, 1, 2, '1701101505850002', '', 'RESKANNAIDI', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(55, 1, 2, '1701041603860001', '', 'HERIANTO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(56, 1, 2, '1701045902940001', '', 'FEKRIANI MUTIARA S', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(57, 1, 2, '1701040701730003', '', 'TUSMAN MAJID', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(58, 1, 2, '1701040909830002', '', 'FATHAN MUBINA', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(59, 1, 2, '1701061709870000', '', 'GUMI SUSANTO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(60, 1, 2, '1701045805720002', '', 'HAMSIAR TIANA', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(61, 1, 2, '1701061306820000', '', 'IKON SEKSI', '', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(62, 1, 2, '1701040505870001', '', 'INDRO PRASETYO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(63, 1, 2, '1701041111940001', '', 'ZARMON ABADI', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(64, 1, 2, '1701111090890001', '', 'ANOM TRIYOGO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(65, 1, 2, '1701041111580002', '', 'HARMEN T', '', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(66, 1, 2, '1701041004200001', '', 'EDWIN', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(67, 1, 2, '1701046510800001', '', 'ISTIANA	P', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(68, 1, 2, '1701032903910001', '', 'MAROMIKA SYAFIRI', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(69, 1, 2, '1701041608520001', '', 'SUPNI ALWI', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(70, 1, 2, '1701042303730001', '', 'SURSI SALIM', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(71, 1, 2, '1701102503890001', '', 'MARADIAN', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(72, 1, 2, '1701041112840004', '', 'HERI ANTO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(73, 1, 2, '1791041310660001', '', 'OKTOMI HARYANA', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(74, 1, 2, '1701054107910071', '', 'VETI YONETA SARI', 'P', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(75, 1, 2, '1701044710650001', '', 'SUKARMAN', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(76, 1, 2, '1701041207830001', '', 'TONTRI JULIANTO', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00'),
(77, 1, 2, '1701041504420001', '', 'BUYUNG RINUL', 'L', 'DESA MELAO', '', '-4.4665669', '102.9385167', '', '', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `kabupaten` varchar(225) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `nama_desa` varchar(225) NOT NULL,
  `lat_desa` varchar(225) NOT NULL,
  `lng_desa` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `kecamatan`, `kabupaten`, `provinsi`, `nama_desa`, `lat_desa`, `lng_desa`) VALUES
(1, 'Manna', 'Bengkulu Selatan', 'Bengkulu', 'Mela\'o', '-4.4665669', '102.9385167');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bantuan`
--

CREATE TABLE `detail_bantuan` (
  `id_detail_bantuan` int(11) NOT NULL,
  `id_bantuan` int(11) NOT NULL,
  `id_jenis_bantuan` int(11) NOT NULL,
  `tgl_peroleh` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_bantuan`
--

INSERT INTO `detail_bantuan` (`id_detail_bantuan`, `id_bantuan`, `id_jenis_bantuan`, `tgl_peroleh`, `nominal`) VALUES
(1, 77, 2, '2020-09-25', 600000),
(2, 77, 2, '2020-08-25', 600000),
(3, 77, 0, '2020-09-11', 20000),
(4, 77, 0, '2020-09-11', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_kegiatan`
--

CREATE TABLE `detail_kegiatan` (
  `id_detail_kegiatan` int(11) NOT NULL,
  `id_bantuan` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(225) NOT NULL,
  `tgl_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_kegiatan`
--

INSERT INTO `detail_kegiatan` (`id_detail_kegiatan`, `id_bantuan`, `id_jenis_kegiatan`, `nama_kegiatan`, `tgl_kegiatan`) VALUES
(1, 77, 4, 'cjkljclks', '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bantuan`
--

CREATE TABLE `jenis_bantuan` (
  `id_jenis_bantuan` int(11) NOT NULL,
  `nama_jenis_bantuan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`id_jenis_bantuan`, `nama_jenis_bantuan`) VALUES
(2, 'BLT DD COVID-19 TAHUN 2020');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id_jenis_kegiatan` int(11) NOT NULL,
  `nama_jenis_kegiatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id_jenis_kegiatan`, `nama_jenis_kegiatan`) VALUES
(4, 'dhajkshdjk');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) DEFAULT NULL,
  `id_jenis_bantuan` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `judul_kegiatan` varchar(225) NOT NULL,
  `tanggal_kegiatan` datetime NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `lat_kegiatan` varchar(225) NOT NULL,
  `lng_kegiatan` varchar(225) NOT NULL,
  `nominal_bantuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id_superadmin` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id_superadmin`, `nama`, `username`, `password`) VALUES
(1, 'Superadmin', 'superadmin', '889a3a791b3875cfae413574b53da4bb8a90d53e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`),
  ADD KEY `id_jenis_bantuan` (`id_jenis_bantuan`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `detail_bantuan`
--
ALTER TABLE `detail_bantuan`
  ADD PRIMARY KEY (`id_detail_bantuan`);

--
-- Indexes for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD PRIMARY KEY (`id_detail_kegiatan`);

--
-- Indexes for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`id_jenis_bantuan`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id_jenis_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`) USING BTREE;

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id_superadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_bantuan`
--
ALTER TABLE `detail_bantuan`
  MODIFY `id_detail_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id_detail_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `id_jenis_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id_jenis_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id_superadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD CONSTRAINT `bantuan_ibfk_1` FOREIGN KEY (`id_jenis_bantuan`) REFERENCES `jenis_bantuan` (`id_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bantuan_ibfk_2` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id_jenis_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
