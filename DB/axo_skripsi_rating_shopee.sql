-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Jul 2022 pada 09.57
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axo_skripsi_rating_shopee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_akun`
--

CREATE TABLE `tm_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `is_active` enum('0','1') DEFAULT '1',
  `user_dir` text,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_akun`
--

INSERT INTO `tm_akun` (`id_akun`, `nama`, `role`, `email`, `password`, `is_active`, `user_dir`, `tgl_create`, `tgl_update`) VALUES
(1, 'SuperAdmin', 1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_78852fa8789de7e', NULL, NULL),
(3, 'Mochammad Faisal', 3, 'faisal@salz.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_326e77575ec3573', '2022-06-07 09:28:23', NULL),
(4, 'Aulia', 3, 'aulia@operator.com', '21232f297a57a5a743894a0e4a801fc3', '1', '1', NULL, '2022-06-30 12:23:10'),
(5, 'Wahyu', 2, 'wahyu@kepsek.com', '8cbbdc3fff847eee79abadc7b693b60e', '1', NULL, '2022-06-30 12:07:46', NULL),
(6, 'Putra', 3, 'setyap77@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_32591b3b0325353', '2022-07-20 17:50:44', '2022-07-20 10:50:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_menu`
--

CREATE TABLE `tm_menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `slider` enum('0','1') DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `sort_no` int(11) DEFAULT NULL,
  `keterangan` text,
  `is_active` enum('0','1') DEFAULT '1' COMMENT '0=tidak aktif, 1=aktif',
  `date_create` datetime DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tm_menu`
--

INSERT INTO `tm_menu` (`id`, `parent_id`, `name`, `icon`, `slider`, `url`, `sort_no`, `keterangan`, `is_active`, `date_create`, `user_create`, `date_update`, `user_update`) VALUES
(1, 0, 'Dashboard', 'fas fa-th', '0', 'backend/home', 0, 'Dashboard', '1', NULL, NULL, '2022-06-29 08:51:50', NULL),
(2, 0, 'Dokumen', 'fas fa-file-alt', '1', NULL, 1, 'Dokumen Surat', '1', NULL, NULL, '2022-06-29 08:51:50', 1),
(3, 1, 'Import Data', 'empty', '0', 'tpl_file', 1, NULL, '0', NULL, NULL, '2022-06-23 15:08:20', NULL),
(4, 2, 'Surat Masuk', 'fas fa-inbox', '0', 'backend/dokumen/masuk', 0, 'Surat Masuk', '1', NULL, NULL, '2022-06-29 08:51:50', NULL),
(5, 2, 'Surat Keluar', 'fas fa-sign-out-alt', '0', 'backend/dokumen/keluar', 1, 'Surat Keluar', '1', NULL, NULL, '2022-06-29 08:51:50', NULL),
(6, 0, 'User Management', 'fas fa-user-cog', '1', NULL, 3, 'User Management', '1', NULL, NULL, '2022-06-29 08:51:50', NULL),
(7, 6, 'Privilage User', 'fas fa-user-friends', '0', 'backend/user/privilage', 0, 'Privilage User', '1', NULL, NULL, '2022-06-29 08:51:50', NULL),
(9, 0, 'Dokumen Penting', 'fas fa-exclamation-triangle', '0', 'dokumen/penting', 2, 'Dokumen Penting', '1', '2022-06-27 06:28:23', NULL, '2022-06-29 08:51:50', NULL),
(10, 0, 'Master Data', 'fas fa-wrench', '1', '', 4, 'Master Data', '1', '2022-06-27 06:33:18', NULL, '2022-06-29 08:51:50', NULL),
(11, 10, 'Menu', 'fas fa-list', '0', 'backend/master/menu', 0, 'Menu', '1', '2022-06-27 06:33:31', NULL, '2022-06-29 08:51:50', NULL),
(12, 6, 'Data User', 'fas fa-user-friends', '0', 'backend/user/datauser', 1, 'Data User', '1', '2022-06-28 10:45:50', NULL, '2022-06-29 08:51:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_pertanyaan`
--

CREATE TABLE `tm_pertanyaan` (
  `id_pertanyaan` int(10) NOT NULL,
  `id_dimensi` int(10) DEFAULT NULL COMMENT 'Reff tm_dimensi',
  `pertanyaan` varchar(500) NOT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_pertanyaan`
--

INSERT INTO `tm_pertanyaan` (`id_pertanyaan`, `id_dimensi`, `pertanyaan`, `tgl_create`, `tgl_update`, `is_active`) VALUES
(1, NULL, 'Apa pendapat anda tentang shopee express pancoran sejak 2019?', '2022-07-01 14:29:45', '2022-07-20 14:28:08', 1),
(2, NULL, 'Bagaimana pelayanan staff kami dalam melayani dan membantu anda?', '2022-07-01 14:38:49', '2022-07-20 14:28:10', 1),
(3, NULL, 'Bagaimana Tentang Kebersihan Hub Kami?', '2022-07-01 14:38:49', NULL, 1),
(4, NULL, 'Bagaimana Tentang kerapihan Hub kami?', '2022-07-01 14:38:49', NULL, 1),
(5, NULL, 'Bagaimana Pelayanan Kurir Kami Terhadap pelanggan?', '2022-07-01 14:38:49', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_role`
--

CREATE TABLE `tm_role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_role`
--

INSERT INTO `tm_role` (`id_role`, `nama`, `tgl_create`, `tgl_update`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Manager', NULL, NULL),
(3, 'Operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_settings`
--

CREATE TABLE `tm_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `desc` text,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_settings`
--

INSERT INTO `tm_settings` (`id`, `name`, `value`, `desc`, `tgl_create`, `tgl_update`) VALUES
(1, 'about_school_title', 'Selamat Datang di PPDB MTS Al-Qur\'aniyah Ulujami', NULL, NULL, '2022-06-09 08:43:26'),
(2, 'about_school_desc', 'Madrasah Tsanawiyah Al Quraniyah Ulujami memiliki staf pengajar guru yang kompeten pada bidang pelajarannya sehingga berkualitas dan menjadi salah satu yang terbaik di Kota Jakarta Selatan.\r\n<br>\r\nMerupakan sekolah yang melayani pengajaran jenjang pendidikan Sekolah Menengah Pertama (SMP) di Kota Jakarta Selatan. Adapun pelajaran yang diberikan meliputi semua mata pelajaran wajib sesuai kurikulum nasional dengan tambahan nilai-nilai agama Islam.', NULL, NULL, '2022-06-09 08:43:26'),
(3, 'contact_address', 'Jl. H. Ridi Jl. Swadarma Raya No.49, RT.15/RW.3, Ulujami, Kec. Pesanggrahan, Kota Jakarta Selatan', NULL, NULL, '2022-06-09 08:51:59'),
(4, 'contact_phone', '(021) 5868268', NULL, NULL, '2022-06-09 08:51:59'),
(5, 'contact_email', 'mtsalquraniyah@gmail.com', NULL, NULL, '2022-06-09 08:51:59'),
(6, 'app_name', 'Pengarsipan Surat PKBM', NULL, NULL, '2022-06-20 04:51:42'),
(7, 'school_desc', 'Merupakan sekolah yang melayani pengajaran jenjang pendidikan Sekolah Menengah Pertama (SMP) di Kota Jakarta Selatan. Adapun pelajaran yang diberikan meliputi semua mata pelajaran wajib sesuai kurikulum nasional dengan tambahan nilai-nilai agama Islam. Madrasah Tsanawiyah Al Quraniyah Ulujami memiliki staf pengajar guru yang kompeten pada bidang pelajarannya sehingga berkualitas dan menjadi salah satu yang terbaik di Kota Jakarta Selatan.', NULL, NULL, '2022-06-20 04:51:42'),
(8, 'berkas_status_review', 'Berkas sedang di verifikasi', NULL, NULL, '2022-06-14 04:45:59'),
(9, 'berkas_status_approved', 'Berkas sudah di verifikasi', NULL, NULL, '2022-06-14 04:45:59'),
(10, 'app_logo', 'logo.png', NULL, NULL, '2022-06-09 09:12:19'),
(11, 'about_school_image', 'guru.jpg', NULL, NULL, '2022-06-09 08:35:43'),
(12, 'berkas_status_rejected', 'Berkas tidak lolos diseleksi', NULL, NULL, '2022-06-14 04:45:59'),
(13, 'berkas_file_register', 'FORMULIR.pdf', NULL, NULL, '2022-06-14 04:45:59'),
(14, 'is_register_login_open', 'false', 'disable regiser & login button & link(except login)\r\nset true untuk buka pendaftaran\r\nset false untuk tutup pendaftaran', NULL, '2022-06-20 04:51:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_jawaban`
--

CREATE TABLE `tr_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_responden` int(11) NOT NULL COMMENT 'referen tr_responden',
  `id_other` int(11) NOT NULL,
  `jawaban` text NOT NULL COMMENT 'id_pertanyaan, nilai',
  `avg` double NOT NULL,
  `kesimpulan` varchar(25) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_jawaban`
--

INSERT INTO `tr_jawaban` (`id_jawaban`, `id_responden`, `id_other`, `jawaban`, `avg`, `kesimpulan`, `create_date`) VALUES
(1, 1, 1, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"1\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"1\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"1\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"1\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"1\";}}', 1, 'Sangat Tidak Puas', '2022-07-19 12:33:20'),
(2, 2, 2, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"1\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"1\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"2\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"2\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"2\";}}', 1.6, 'Tidak Puas', '2022-06-18 12:33:53'),
(3, 3, 3, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"2\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"2\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"2\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"2\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"2\";}}', 2, 'Tidak Puas', '2022-05-17 12:34:20'),
(4, 4, 4, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"2\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"1\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"1\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"2\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"1\";}}', 1.4, 'Sangat Tidak Puas', '2022-04-16 12:34:44'),
(5, 5, 5, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"3\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"3\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"3\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"4\";}}', 3.4, 'Cukup Puas', '2022-03-15 12:35:18'),
(6, 6, 6, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"4\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"4\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"3\";}}', 3.8, 'Puas', '2022-02-14 12:36:01'),
(7, 7, 7, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"4\";}}', 4.4, 'Puas', '2022-01-13 12:36:29'),
(8, 9, 8, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"5\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"4\";}}', 4.6, 'Sangat Puas', '2021-12-12 12:37:17'),
(9, 11, 9, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"5\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"5\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"5\";}}', 5, 'Sangat Puas', '2021-11-11 12:41:48'),
(10, 20, 10, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"3\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"4\";}}', 4.2, 'Puas', '2021-10-22 12:47:14'),
(11, 21, 11, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"5\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"5\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"5\";}}', 5, 'Sangat Puas', '2021-09-09 15:01:29'),
(12, 22, 12, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"1\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"2\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"3\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"3\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"2\";}}', 2.2, 'Tidak Puas', '2022-07-21 10:49:18'),
(13, 23, 13, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"2\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"1\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"3\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"3\";}}', 2.6, 'Cukup Puas', '2022-07-21 10:49:40'),
(14, 24, 14, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"2\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"4\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"3\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"1\";}}', 2.8, 'Cukup Puas', '2022-07-21 10:50:11'),
(15, 25, 15, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"5\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"5\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"5\";}}', 4.6, 'Sangat Puas', '2022-07-21 10:50:44'),
(16, 26, 16, 'a:5:{i:0;a:2:{s:8:\"id_aspek\";i:1;s:5:\"nilai\";s:1:\"4\";}i:1;a:2:{s:8:\"id_aspek\";i:2;s:5:\"nilai\";s:1:\"4\";}i:2;a:2:{s:8:\"id_aspek\";i:3;s:5:\"nilai\";s:1:\"4\";}i:3;a:2:{s:8:\"id_aspek\";i:4;s:5:\"nilai\";s:1:\"4\";}i:4;a:2:{s:8:\"id_aspek\";i:5;s:5:\"nilai\";s:1:\"3\";}}', 3.8, 'Puas', '2022-07-21 10:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_other`
--

CREATE TABLE `tr_other` (
  `id_other` int(11) NOT NULL,
  `kerusakan` int(11) NOT NULL COMMENT '1=tidak, 0=ya',
  `feedback` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_other`
--

INSERT INTO `tr_other` (`id_other`, `kerusakan`, `feedback`, `create_date`) VALUES
(1, 0, '11111', '2022-07-19 12:33:20'),
(2, 0, '11222', '2022-07-19 12:33:53'),
(3, 0, '22222', '2022-07-19 12:34:20'),
(4, 1, '21121', '2022-07-19 12:34:44'),
(5, 0, '33344', '2022-07-19 12:35:18'),
(6, 0, '444443', '2022-07-19 12:36:01'),
(7, 0, '55444', '2022-07-19 12:36:29'),
(8, 0, '55544', '2022-07-19 12:37:17'),
(9, 0, '55555', '2022-07-19 12:41:48'),
(10, 0, 'asd', '2022-07-19 12:47:14'),
(11, 0, 'feedback shopee', '2022-07-19 15:01:29'),
(12, 0, '1234', '2022-07-21 10:49:18'),
(13, 0, '2345', '2022-07-21 10:49:40'),
(14, 1, '3456', '2022-07-21 10:50:11'),
(15, 0, '34567', '2022-07-21 10:50:44'),
(16, 0, '1234', '2022-07-21 10:51:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_responden`
--

CREATE TABLE `tr_responden` (
  `id_responden` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `usia` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_responden`
--

INSERT INTO `tr_responden` (`id_responden`, `nama`, `usia`, `email`, `create_date`) VALUES
(1, 'Sintia', 23, 'sintia@sintia.com', '2022-07-19 12:33:20'),
(2, 'Faisal', 25, 'faisal@faisal.com', '2022-07-19 12:33:53'),
(3, 'rifky', 43, 'rifky@rifky.com', '2022-07-19 12:34:20'),
(4, 'Aldha', 21, 'aldha@aldha.com', '2022-07-19 12:34:44'),
(5, 'Putra', 24, 'putra@putra.com', '2022-07-19 12:35:18'),
(6, 'Sintia', 34, 'sintia@sintia.com', '2022-07-19 12:36:01'),
(7, 'Faisal', 22, 'faisal@faisal.com', '2022-07-19 12:36:29'),
(8, 'RIfky', 44, 'rifky@rifky.com', '2022-07-19 12:37:09'),
(9, 'RIfky', 44, 'rifky@rifky.com', '2022-07-19 12:37:17'),
(10, 'Aldha', 23, 'aldha@aldha.com', '2022-07-19 12:37:47'),
(11, 'Aldha', 23, 'aldha@aldha.com', '2022-07-19 12:41:48'),
(12, 'Sintia', 33, 'sintia@sintia.com', '2022-07-19 12:42:27'),
(13, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:43:28'),
(14, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:43:29'),
(15, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:08'),
(16, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:10'),
(17, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:10'),
(18, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:10'),
(19, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:11'),
(20, 'RIfky', 23, 'rifky@rifky.com', '2022-07-19 12:47:14'),
(21, 'Sintia', 53, 'sintia@sintia.com', '2022-07-19 15:01:29'),
(22, 'Sintia', 24, 'sintia@sintia.com', '2022-07-21 10:49:18'),
(23, 'Faisal', 21, 'faisal@faisal.com', '2022-07-21 10:49:40'),
(24, 'rifky', 34, 'rifky@rifky.com', '2022-07-21 10:50:11'),
(25, 'Aldha', 23, 'aldha@aldha.com', '2022-07-21 10:50:44'),
(26, 'Putra', 21, 'setyap77@gmail.com', '2022-07-21 10:51:34');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_responden`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_responden` (
`id_jawaban` int(11)
,`id_responden` int(11)
,`id_other` int(11)
,`nm_responden` varchar(50)
,`usia_responden` int(2)
,`email_responden` varchar(50)
,`jawaban` text
,`score` double
,`summary` varchar(25)
,`kerusakan` varchar(5)
,`feedback` text
,`create_date` datetime
,`format_date` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_responden`
--
DROP TABLE IF EXISTS `v_responden`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_responden`  AS SELECT `a`.`id_jawaban` AS `id_jawaban`, `b`.`id_responden` AS `id_responden`, `c`.`id_other` AS `id_other`, `b`.`nama` AS `nm_responden`, `b`.`usia` AS `usia_responden`, `b`.`email` AS `email_responden`, `a`.`jawaban` AS `jawaban`, `a`.`avg` AS `score`, `a`.`kesimpulan` AS `summary`, if((`c`.`kerusakan` = 1),'Iya','Tidak') AS `kerusakan`, `c`.`feedback` AS `feedback`, `a`.`create_date` AS `create_date`, date_format(`a`.`create_date`,'%d-%m-%Y') AS `format_date` FROM ((`tr_jawaban` `a` left join `tr_responden` `b` on((`b`.`id_responden` = `a`.`id_responden`))) left join `tr_other` `c` on((`c`.`id_other` = `a`.`id_other`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tm_akun`
--
ALTER TABLE `tm_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tm_menu`
--
ALTER TABLE `tm_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`,`parent_id`);

--
-- Indeks untuk tabel `tm_pertanyaan`
--
ALTER TABLE `tm_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `tm_role`
--
ALTER TABLE `tm_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tm_settings`
--
ALTER TABLE `tm_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `tr_jawaban`
--
ALTER TABLE `tr_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tr_other`
--
ALTER TABLE `tr_other`
  ADD PRIMARY KEY (`id_other`);

--
-- Indeks untuk tabel `tr_responden`
--
ALTER TABLE `tr_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tm_akun`
--
ALTER TABLE `tm_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tm_menu`
--
ALTER TABLE `tm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tm_pertanyaan`
--
ALTER TABLE `tm_pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tm_role`
--
ALTER TABLE `tm_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tm_settings`
--
ALTER TABLE `tm_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tr_jawaban`
--
ALTER TABLE `tr_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tr_other`
--
ALTER TABLE `tr_other`
  MODIFY `id_other` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tr_responden`
--
ALTER TABLE `tr_responden`
  MODIFY `id_responden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
