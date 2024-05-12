-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 10:24 PM
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
-- Database: `pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `user_admin` varchar(15) NOT NULL,
  `pass_admin` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `user_admin`, `pass_admin`) VALUES
(5, 'Divo Tahta Imannulloh', 'divoadmin', '5834c1c4ecd0f5ce0b4dd8d379c79a7c'),
(6, 'divo', 'divo', '73616d1209544982fd17e2f74f71baf8');

-- --------------------------------------------------------

--
-- Table structure for table `akun_pemerintah`
--

CREATE TABLE `akun_pemerintah` (
  `id_pemerintah` int(11) NOT NULL,
  `user_pemerintah` varchar(255) NOT NULL,
  `pass_pemerintah` varchar(255) NOT NULL,
  `nama_pemerintah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_pemerintah`
--

INSERT INTO `akun_pemerintah` (`id_pemerintah`, `user_pemerintah`, `pass_pemerintah`, `nama_pemerintah`) VALUES
(2, 'pemerintah', '$2y$10$JlusvJnmYE9tqA8PGPqZleNAJeiS6eqcpw6SnLvMPWRKBYrF1.VqW', 'pemerintah'),
(3, 'pemerintah1', '$2y$10$iae1NKa.DRYsT6zWkHgU7OsIAr5JkYJJyGO5kil/Ip7bTE3Dskije', 'pemerintah');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `gambar_artikel` varchar(150) NOT NULL,
  `tanggal_artikel` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `id_kategori`, `gambar_artikel`, `tanggal_artikel`) VALUES
(37, 'Ini Cara Desa Jatimulyo di Jember Maksimalkan RTH', '<h1><strong>Ada Lapangan Voli hingga Alat Gym Outdoor</strong></h1>\r\n\r\n<p>Desa Jatimulyo menjadi desa peduli tentang kebugaran warganya. Lapangan desa pun disulap jadi ruang terbuka hijau (RTH) yang dilengkapi fasilitas olahraga. Ada lapangan voli hingga alat&nbsp;<em>gym outdoor</em>.</p>\r\n\r\n<p><strong><em>M ADHI SURYA, Jatimulyo</em></strong></p>\r\n\r\n<p><strong>MENGUNJUNGI</strong>&nbsp;lapangan di Desa Jatimulyo, Kecamatan Jenggawah, rasanya tidak seperti di RTH milik desa. Bahkan, lebih mirip pusat kebugaran.</p>\r\n\r\n<p>Di sana ada berbagai perlengkapan yang memanjakan pehobi olahraga&nbsp;<em>gym</em>.</p>\r\n\r\n<p>Pantauan&nbsp;<em>Jawa Pos Radar Jember,&nbsp;</em>kemarin pagi (1/3), terdapat pemuda yang melatih otot kakinya dengan alat&nbsp;<em>gym outdoor</em>&nbsp;yang ada di RTH Desa Jatimulyo itu.</p>\r\n\r\n<p>&ldquo;Biasanya saya olahraga setiap Selasa dan Rabu di sini (RTH Jatimulyo, Red). Karena di hari&nbsp;<em>weekend</em>&nbsp;selalu ramai pengunjung,&quot; ujar Zainul Anam.</p>\r\n\r\n<p>Dia pun merasa bangga lapangan di desanya itu disulap sedemikian rupa seperti taman di kota-kota besar. Sebab, dilengkapi fasilitas olahraga.</p>\r\n\r\n<p>Kepala Desa Jatimulyo Buhari mengatakan, fasilitas olahraga di RTH desa itu dibangun sejak awal tahun 2023.</p>\r\n\r\n<p>RTH desa itu pun terdapat lapangan sepak bola, voli, lompat jauh, dan&nbsp;<em>gym</em>. &quot;Selain itu, tempat bermain khusus anak-anak,&quot; jelasnya.</p>\r\n\r\n<p>Menurutnya, dengan fasilitas yang lengkap, tentu bisa menarik perhatian pengunjung dan meningkatkan kesadaran warga untuk hidup sehat dengan berolahraga.</p>\r\n\r\n<p>Karena lokasinya di perdesaan dan ada fasilitas perlengkapan&nbsp;<em>gym outdoor</em>, harapannya juga dikunjungi warga di luar Desa Jatimulyo.</p>\r\n\r\n<p>&quot;Pengunjung juga dari berbagai desa tetangga. Ini sangat bermanfaat bagi pelaku usaha mikro, kecil, dan menengah (UMKM, Red),&quot; sebutnya.</p>\r\n', 13, 'S12JALAN.jpg', '2024-05-12 17:41:39'),
(38, 'Ini Cara Desa Jatimulyo di Jember Maksimalkan RTH', '<h1><strong>Divo Tahta Imannulloh</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 'cropped-Logo-Baku-UNEJ-2020-Square (1).png', '2024-05-12 17:14:48'),
(39, 'dr. Divo Tahta Berhasil Menemukan Gejala Terbaru Penyakit pada Sapi', '<p>fsaffffffffffffffffffffffffffffff</p>\r\n', 13, 'cropped-Logo-Baku-UNEJ-2020-Square (1).png', '2024-05-12 09:25:07'),
(40, 'dasfasfas', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet urna eu nibh posuere rhoncus iaculis non ipsum. Fusce bibendum nisl libero, vitae vehicula dolor dictum non. Aenean lorem magna, ullamcorper ut imperdiet nec, blandit vitae ipsum. Mauris efficitur tristique nibh ultricies volutpat. Phasellus diam risus, tempus quis lacinia a, blandit non lorem. In vel sapien vehicula, feugiat sem vitae, suscipit tellus. Quisque in metus nec risus accumsan bibendum id mollis nisi. Nullam et sollicitudin lectus. Nullam malesuada ipsum vel risus mollis, vitae lacinia nunc varius. Aliquam ut purus quis lorem pretium viverra. Nulla facilisi.</p>\r\n\r\n<p>Nam mollis erat in maximus dictum. Mauris malesuada ligula sed aliquam dignissim. Nam luctus commodo tempus. Aliquam quis lacus fringilla urna consectetur finibus eget id magna. Proin volutpat orci turpis, ac feugiat quam sagittis id. In libero elit, condimentum ac maximus non, vestibulum et quam. Etiam venenatis sagittis mollis. Sed non velit dictum, finibus magna ac, rutrum turpis. Sed et neque in lectus sodales consequat. Fusce tincidunt purus eget tempus pharetra.</p>\r\n\r\n<p>Curabitur posuere sed ligula in porta. Aenean dictum iaculis tincidunt. Pellentesque suscipit leo vitae aliquam elementum. Nunc nec sollicitudin mauris, a molestie eros. Nullam dictum dolor massa, nec mollis nibh luctus vitae. Maecenas diam dui, malesuada sed ex sed, vestibulum mollis velit. Ut mattis felis purus, at tincidunt nibh accumsan a. Sed porttitor convallis tempor. Integer in est tellus.</p>\r\n\r\n<p>Pellentesque vehicula commodo vehicula. Integer sit amet congue velit. Mauris vel nulla augue. Morbi vulputate, tortor nec condimentum aliquet, ipsum dolor finibus ipsum, non scelerisque diam nisi eu lacus. Proin dictum velit vel nisl lobortis, ac porta massa luctus. Nunc vitae maximus purus. Cras elementum ornare tortor, nec consequat magna venenatis vel. Proin ac magna semper, congue felis a, maximus tellus. Sed semper sagittis quam. Vivamus a ornare tellus.</p>\r\n\r\n<p>Nullam convallis nec nisl vel scelerisque. Maecenas dictum enim sit amet leo tincidunt rhoncus. Donec mattis erat non placerat scelerisque. Vestibulum nec vestibulum orci. Nunc odio urna, egestas ac scelerisque non, tempus molestie diam. Aliquam pellentesque dui vel nulla tempor condimentum. Nullam convallis nunc id risus bibendum finibus. Curabitur eu mi risus.</p>\r\n', 13, 'LOGO MACO.png', '2024-05-12 17:56:34'),
(41, 'Penanganan Kasus Scabies pada Kucing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet urna eu nibh posuere rhoncus iaculis non ipsum. Fusce bibendum nisl libero, vitae vehicula dolor dictum non. Aenean lorem magna, ullamcorper ut imperdiet nec, blandit vitae ipsum. Mauris efficitur tristique nibh ultricies volutpat. Phasellus diam risus, tempus quis lacinia a, blandit non lorem. In vel sapien vehicula, feugiat sem vitae, suscipit tellus. Quisque in metus nec risus accumsan bibendum id mollis nisi. Nullam et sollicitudin lectus. Nullam malesuada ipsum vel risus mollis, vitae lacinia nunc varius. Aliquam ut purus quis lorem pretium viverra. Nulla facilisi.</p>\r\n\r\n<p>Nam mollis erat in maximus dictum. Mauris malesuada ligula sed aliquam dignissim. Nam luctus commodo tempus. Aliquam quis lacus fringilla urna consectetur finibus eget id magna. Proin volutpat orci turpis, ac feugiat quam sagittis id. In libero elit, condimentum ac maximus non, vestibulum et quam. Etiam venenatis sagittis mollis. Sed non velit dictum, finibus magna ac, rutrum turpis. Sed et neque in lectus sodales consequat. Fusce tincidunt purus eget tempus pharetra.</p>\r\n\r\n<p>Curabitur posuere sed ligula in porta. Aenean dictum iaculis tincidunt. Pellentesque suscipit leo vitae aliquam elementum. Nunc nec sollicitudin mauris, a molestie eros. Nullam dictum dolor massa, nec mollis nibh luctus vitae. Maecenas diam dui, malesuada sed ex sed, vestibulum mollis velit. Ut mattis felis purus, at tincidunt nibh accumsan a. Sed porttitor convallis tempor. Integer in est tellus.</p>\r\n\r\n<p>Pellentesque vehicula commodo vehicula. Integer sit amet congue velit. Mauris vel nulla augue. Morbi vulputate, tortor nec condimentum aliquet, ipsum dolor finibus ipsum, non scelerisque diam nisi eu lacus. Proin dictum velit vel nisl lobortis, ac porta massa luctus. Nunc vitae maximus purus. Cras elementum ornare tortor, nec consequat magna venenatis vel. Proin ac magna semper, congue felis a, maximus tellus. Sed semper sagittis quam. Vivamus a ornare tellus.</p>\r\n\r\n<p>Nullam convallis nec nisl vel scelerisque. Maecenas dictum enim sit amet leo tincidunt rhoncus. Donec mattis erat non placerat scelerisque. Vestibulum nec vestibulum orci. Nunc odio urna, egestas ac scelerisque non, tempus molestie diam. Aliquam pellentesque dui vel nulla tempor condimentum. Nullam convallis nunc id risus bibendum finibus. Curabitur eu mi risus.</p>\r\n', 13, 'Mts.png', '2024-05-12 17:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(10, 'Kuliner'),
(11, 'Hobi'),
(12, 'Tutorial'),
(13, 'Berita');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `user_masyarakat` varchar(255) NOT NULL,
  `pass_masyarakat` varchar(255) NOT NULL,
  `nama_masyarakat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `user_masyarakat`, `pass_masyarakat`, `nama_masyarakat`) VALUES
(6, 'divo', '$2y$10$0s317sv.mz3qXnGBDxl/J.Vmi.Dn.S3Andjd79i9E46dZQkdUeWd2', 'Divo Tahta Imannulloh'),
(8, 'divotahta', '$2y$10$lLTPeCTWe9WvcL3XNZ3ktecew2.m3E0RpYu5DXsxuF6qXvFX0DLEK', 'Divo Tahta Imannulloh');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  `id_masyarakat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `judul`, `deskripsi`, `file_path`, `tanggal_pengajuan`, `id_masyarakat`) VALUES
(1, 'Lomba Sepakbola', 'sepakbola', 'uploads/Poster Sistem Enterprise.pdf', '2024-05-13 02:30:55', 8),
(2, 'Lomba Sepakbola', 'adas', 'uploads/Poster Sistem Enterprise.pdf', '2024-05-13 02:31:06', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `akun_pemerintah`
--
ALTER TABLE `akun_pemerintah`
  ADD PRIMARY KEY (`id_pemerintah`),
  ADD UNIQUE KEY `username` (`user_pemerintah`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD UNIQUE KEY `user_masyarakat` (`user_masyarakat`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akun_pemerintah`
--
ALTER TABLE `akun_pemerintah`
  MODIFY `id_pemerintah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
