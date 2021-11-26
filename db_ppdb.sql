-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2021 at 05:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(4) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X TJKT 1'),
(2, 'X TJKT 2'),
(3, 'X ANIMASI 1'),
(4, 'X ANIMASI 2'),
(5, 'X ANIMASI 3'),
(6, 'X ANIMASI 4'),
(7, 'X PPLG 1'),
(8, 'X PPLG 2'),
(9, 'X TE'),
(10, 'X BRF'),
(11, 'XI TKJ 1'),
(12, 'XI TKJ 2'),
(13, 'XI TKJ 3'),
(14, 'XI TKJ 4'),
(15, 'XI MM 1'),
(16, 'XI MM 2'),
(17, 'XI MM 3'),
(18, 'XI RPL 1'),
(19, 'XI RPL 2'),
(20, 'XI TEI'),
(21, 'XI BRC 1'),
(22, 'XI BRC 2'),
(23, 'XII TKJ 1'),
(24, 'XII TKJ 2'),
(25, 'XII TKJ 3'),
(26, 'XII TKJ 4'),
(27, 'XII TKJ 5'),
(28, 'XII MM 1'),
(29, 'XII MM 2'),
(30, 'XII MM 3'),
(31, 'XII RPL 1'),
(32, 'XII RPL 2'),
(33, 'XII RPL 3'),
(34, 'XII TEI'),
(35, 'XII BRC 1'),
(36, 'XII BRC 2'),
(37, 'XII BRC 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_reference`
--

CREATE TABLE `tbl_user_reference` (
  `id_user_ref` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipe_ref` varchar(100) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `sekolah` varchar(100) NOT NULL,
  `ref_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_reference`
--

INSERT INTO `tbl_user_reference` (`id_user_ref`, `nama`, `no_hp`, `email`, `tipe_ref`, `kelas`, `sekolah`, `ref_code`) VALUES
(1, 'Nina Herlina', '082112700584', 'nina@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', '0WW21K5'),
(2, 'Mutoharotun', '081932197305', 'mutoharotun@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', 'J2W9L3S'),
(3, 'Elly Fenny', '081311433720', 'elly@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', 'TEVIJ42'),
(4, 'Hendri Ariyani', '081315022343', 'hendry@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', '8A2T3KH'),
(5, 'Arnis Dwi Irianti', '081514224998', 'arnis@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', 'ISXWB2E'),
(6, 'Rini Nuraini H', '085779502535', 'rini@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', 'G8UEFHA'),
(7, 'Dina', '0878862085662', 'dina@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 5', '8S70GOM'),
(8, 'Ida Sulihati', '085782897108', 'ida@gmail.com', 'Wali Kelas', NULL, 'SMP TUGU IBU 1', 'X0UJCCO'),
(9, 'Wulan Sari R', '082122615913', 'wulan@gmail.com', 'Wali Kelas', NULL, 'SMP TUGU IBU 1', 'K3M8LB5'),
(10, 'Endang Wahidah', '082122449989', 'endang@gmail.com', 'Wali Kelas', NULL, 'SMP TUGU IBU 1', '2KEUE33'),
(11, 'Ratna N', '081388982710', 'ratna@gmail.com', 'Wali Kelas', NULL, 'SMP TUGU IBU 1', 'HB7CAG4'),
(12, 'Ngatiman', '081514455735', 'ngatiman@gmail.com', 'Wali Kelas', NULL, 'SMP TUGU IBU 1', 'ZKG9BJM'),
(13, 'Eko Apriyanto', '085714825544', 'eko@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 2', 'DMWKJSR'),
(14, 'Sri Margawati', '085883620545', 'sri@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', 'F5EGZ3T'),
(15, 'Hastian', '085776948449', 'hastian@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', 'O0WV8I9'),
(16, 'Talfiani', '087875091552', 'talfiani@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', '012H12Y'),
(17, 'Nunung Suryani', '085693427399', 'nunung@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', 'MYTULJ2'),
(18, 'Titi Mayanti', '081932111502', 'titi@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', 'GC9F47P'),
(19, 'Yenni', '081281316333', 'yenni@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', '4NCDAPF'),
(20, 'Khodijah', '081806476711', 'khodijah@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', '0I7Z7K5'),
(21, 'Mega Murdia Santi', '081584258855', 'mega@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', 'PJ7FA5K'),
(22, 'Nida Hamidah S', '082213164363', 'Nida@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', 'EE0TUTS'),
(23, 'Satriawati', '081398093329', 'satriawati@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', '1W4UHS4'),
(24, 'Masuddin', '082113790290', 'masuddin@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', 'GYYQUU0'),
(25, 'Ajad Sudrajat', '081388913190', 'ajat@gmail.com', 'Wali Kelas', NULL, 'SMPN 4 DEPOK', 'WXBC7BI'),
(26, 'Khairunnisa K', '081224911941', 'nissa@gmail.com', 'Wali Kelas', NULL, 'SMPIT ARRAFAH', 'DNYELTZ'),
(27, 'Siti Haifah', '08973267510', 'siti@gmail.com', 'Wali Kelas', NULL, 'SMPIT ARRAFAH', '11MJ8Z1'),
(28, 'Hikni Solihin', '087882275539', 'hikni@gmail.com', 'Wali Kelas', NULL, 'SMPIT ARRAFAH', 'EGC3H7F'),
(29, 'Dian Hardika Sari', '087878925084', 'Dian@gmail.com', 'Wali Kelas', NULL, 'SMPIT ARRAFAH', 'K4NSDLC'),
(30, 'Pipih Hernawati', '08561943229', 'pipih@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', 'OTCEB03'),
(31, 'Aminah', '085312450877', 'aminah@gmail.com', 'Wali Kelas', NULL, 'SMPN 5 DEPOK', 'BB8OMNF'),
(32, 'H. Ismail Iba', '081310251743', 'Ismail@gmail.com', 'Wali Kelas', NULL, 'SMP AL ISLAMI', 'VXYGV2J'),
(33, 'Ita Nuraita K', '082298233917', 'ita@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'AKFLQDS'),
(34, 'Reyno I', '081390845599', 'retno@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'BAYUF1Y'),
(35, 'Indri Dian P', '08159511324', 'indri@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'G2F05IH'),
(36, 'Murbandini', '085692188384', 'murbandini@gmail.com', 'Wali Kelas', NULL, 'SMP PGRI DEPOK 2', 'NGLZ9Z9'),
(37, 'Melania Rajagukguk', '089690009930', 'melania@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'XSQJKDZ'),
(38, 'Endang Hidayat', '085756901970', 'endanghidayat@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'AGR85MJ'),
(39, 'Engkim Sukiman', '08128882528', 'engkim@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', '70SEL5Y'),
(40, 'Putra', '085777605217', 'putra@gmail.com', 'Wali Kelas', NULL, 'SMP ATTASIYAH', '3HFPZ3Y'),
(41, 'Titi Nurdiatin', '082226389424', 'titinur@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', 'T0CSQVQ'),
(42, 'Dian Rahman', '081219395148', 'dianrahman@gmail.com', 'Wali Kelas', NULL, 'SMP TARUNA BHAKTI', '3OTL4IM'),
(43, 'Novi Mulafaturrochimah', '081908809515', 'novi@gmail.com', 'Wali Kelas', NULL, 'SMPIT PONDOK DUTA', 'JR1LZJF'),
(44, 'Ari Rahman', '085719883914', 'ari@gmail.com', 'Wali Kelas', NULL, 'SMPIT PONDOK DUTA', '1ARAJ9P'),
(45, 'Sartika', '081319441257', 'sartika@gmail.com', 'Wali Kelas', NULL, 'SMP 20 MEI RAUDLATUSSAAH', 'GJ7AB4W'),
(46, 'Yuliana P', '08129370066', 'yuliana@gmail.com', 'Wali Kelas', NULL, 'SMPIT AT-TAUFIQ', 'TTELQAB'),
(47, 'Damayanti', '085781822776', 'damayanti@gmail.com', 'Wali Kelas', NULL, 'SMPIT AT-TAUFIQ', '4ALMTZA'),
(48, 'Suratno', '081310895709', 'suratno@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', '7C23SCM'),
(49, 'Deliana Hastuti C', '08128122971', 'deliana@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', '2M2TM5A'),
(50, 'Sulistiati SW', '082110974650', 'sulistiati@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', '4C7Y3X1'),
(51, 'Nurhikmah Hidayati', '08159663397', 'nurhikmah@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', 'XFKDUSW'),
(52, 'Elah Julaeha', '081380722584', 'elah@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', 'M7SFQS2'),
(53, 'Ida Farida', '089506501077', 'farida@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', 'LFAZ9S1'),
(54, 'Siti Kholilah', '081807041120', 'skholilah@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', '3320ZUJ'),
(55, 'H. Jarwoto', '081290427982', 'jarwoto@gmail.com', 'Wali Kelas', NULL, 'MTSN KOTA DEPOK', 'MZT71HQ'),
(56, 'Yustina Sri Mulyani', '082311375585', 'yustina@gmail.com', 'Wali Kelas', NULL, 'SMPN 11 DEPOK', 'KIMOES4'),
(57, 'Endang Agustina', '085719244787', 'endangagustina@gmail.com', 'Wali Kelas', NULL, 'SMPN 11 DEPOK', 'UPBFXQ4'),
(58, 'Titin Trisnawati', '085693337989', 'titin@hmail.com', 'Wali Kelas', NULL, 'SMPN 11 DEPOK', '90K0TCM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `kode_rfid` varchar(100) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `saldo_tunai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('A','K') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Admin', 'admin@gmail.com', NULL, '$2y$10$oxgI7yiV0T85OTi9MKYljus5ApRi.MDGLI.PqmX8v.Om0IA8QZw3S', 'A', NULL, '2020-03-26 06:10:07', '2020-03-26 06:10:22'),
(19, 'Shinta', 'shinta@kasir.com', NULL, '$2y$10$sJ.qCa4O8PLytoG5Hp9Apeurss3piA20GoXrcaBY8o4QsV5e.qp2u', 'K', NULL, NULL, NULL),
(21, 'Erraldo DS', 'erraldodaniels@gmail.com', NULL, '$2y$10$QMOw2ysbnEfGSWvvietg3eeQgC4qBUkdQRTEDu36DoI0ygXJNkMGu', 'K', NULL, NULL, NULL),
(22, 'Siswa', 'admin@admin.com', NULL, '$2y$10$roiLRNEhPU.VxXTdp2qcyuyk0xR0P21e6A.srnepuV/JOpYBWC.iK', 'K', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_user_reference`
--
ALTER TABLE `tbl_user_reference`
  ADD PRIMARY KEY (`id_user_ref`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_user_reference`
--
ALTER TABLE `tbl_user_reference`
  MODIFY `id_user_ref` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
