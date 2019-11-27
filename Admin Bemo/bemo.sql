-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2019 at 04:37 AM
-- Server version: 10.1.43-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dene4871_bemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `akses`) VALUES
(1, 'admin', 'ad@min.com', 'a887d838e74d78f563ffc98c4894dc84', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_servis`
--

CREATE TABLE `daftar_servis` (
  `id` int(11) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `kode_servis` varchar(10) NOT NULL,
  `nama_servis` varchar(50) NOT NULL,
  `waktu_pengerjaan` varchar(20) NOT NULL,
  `harga` float NOT NULL,
  `saran_setiap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_servis`
--

INSERT INTO `daftar_servis` (`id`, `bagian`, `kode_servis`, `nama_servis`, `waktu_pengerjaan`, `harga`, `saran_setiap`) VALUES
(1, 'Chassis/Body/Interior', 'CBS01', 'Spooring', '30', 150000, '10000 KM'),
(2, 'Chassis/Body/Interior', 'CBB01', 'Balancing', '60', 30000, '10000 KM'),
(3, 'Chassis/Body/Interior', 'CBR01', 'Rotasi Ban', '25', 100000, '5000 KM'),
(4, 'Chassis/Body/Interior', 'CBC01', 'Cek Kondisi Ban & Tekanan Angin', '5', 20000, '2 Minggu'),
(5, 'Chassis/Body/Interior', 'CBC02', 'Cek Angin Nitrogen ', '5', 20000, '1 Bulan'),
(6, 'Chassis/Body/Interior', 'CBP01', 'Penggantian Ban', '40', 500000, '35000 KM'),
(7, 'Chassis/Body/Interior', 'CBS02', 'Servis Rem & Cek Piringan/Kanvas', '30', 200000, '20000 KM'),
(8, 'Chassis/Body/Interior', 'CBM01', 'Minyak Rem', '20', 60000, '20000 KM'),
(9, 'Chassis/Body/Interior', 'CBM02', 'Minyak Kopling', '20', 30000, '20000 KM'),
(10, 'Chassis/Body/Interior', 'CBM03', 'Minyak Power Steering', '20', 50000, '20000 KM'),
(11, 'Chassis/Body/Interior', 'CBF01', 'Fogging AC', '20', 200000, '10000 KM'),
(12, 'Chassis/Body/Interior', 'CBF02', 'Flushing AC System', '60', 250000, '20000 KM'),
(13, 'Mesin', 'MT01', 'Tune Up Ringan', '100', 250000, '10000 KM'),
(14, 'Mesin', 'MT02', 'Tune Up Berat', '300', 1000000, '10000 KM'),
(15, 'Mesin', 'MC01', 'Carbon Clean', '25', 35000, '20000 KM'),
(16, 'Mesin', 'MO01', 'Oli Mesin', '25', 125000, '5000 KM'),
(17, 'Mesin', 'MO02', 'Oli Transmisi Manual (Perseneling)', '25', 40000, '10000 KM'),
(18, 'Mesin', 'MO03', 'Oli Gardan', '25', 35000, '10000 KM'),
(19, 'Mesin', 'MO04', 'Oli Transmisi Automatic', '25', 40000, '30000 KM'),
(20, 'Mesin', 'MR01', 'Radiator Coolant', '25', 40000, '20000 KM'),
(21, 'Mesin', 'MF01', 'Filter Oli', '5', 50000, '10000 KM'),
(22, 'Mesin', 'MF02', 'Filter Udara', '5', 85000, '20000 KM'),
(23, 'Mesin', 'MF03', 'Filter Bahan Bakar', '15', 200000, '20000 KM'),
(24, 'Mesin', 'MC02', 'Cek Battery ', '15', 25000, '5000 KM');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `bagian` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `bagian`, `title`, `body`, `perubahan`) VALUES
(1, 'konten', 'Layanan Ahli oleh Teknisi Terbaik', '<ul><li>Semua servis ditangani tenaga ahli yang sudah berpengalaman puluhan tahun</li>   <li>Pendaftaran bisa lebih awal minimal 7 hari melalui antrian online untuk mendapatkan konfirmasi jadwal oleh Admin paling lambat 1 x 24 jam setelah pendaftaran</li>   <li>Bebas antrian dengan toleransi keterlambatan 30 menit dari jadwal</li></ul>  ', '2019-04-05 11:22:36'),
(2, 'konten', 'Standar Tertinggi  Perbaikan Mobil', 'Seluruh konsumen Bemo berhak untuk mendapatkan kendaraan dalam kondisi standar keselamatan dan kualitas yang tertinggi. Karena itu, program ini merupakan bagian dari evaluasi berkesinambungan yang kami lakukan terhadap seluruh produk, demi mencapai kepuasan pelanggan yang tertinggi', '2019-03-25 12:51:02'),
(3, 'konten', 'Cara Penggunaan Aplikasi', '1. Mendaftar Akun<br>2. Melakukan verifikasi email<br>3. Masuk ke dalam aplikasi<br>4. Mengisi data diri dan data kendaraan<br>5. Mendaftar antrian<br>6. Menunggu konfirmasi dari montir/admin <br>7. Selesai, bertambah riwayat<br>', '2019-03-25 12:43:24'),
(4, 'footer', 'wa', '+62 818 1994 28', '2019-03-25 12:43:24'),
(5, 'footer', 'hp', '+62 851 0071 4202', '2019-03-25 12:43:24'),
(6, 'footer', 'email', 'martonomotor25@gmail.com', '2019-03-25 12:43:24'),
(7, 'footer', 'alamat', 'Perumahan Alam Indah, Poris Plawad Indah, Cipondoh, Kota Tangerang, Banten 15122', '2019-03-25 12:43:24'),
(8, 'header', 'header', 'Memenuhi semua kebutuhan perbaikan otomatis dalam waktu pada anggaran anda', '2019-04-05 11:24:09'),
(9, 'logo', 'logo.png', '<br>113 KB<br>image/png', '2019-04-07 11:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `merk_mobil`
--

CREATE TABLE `merk_mobil` (
  `id` int(11) NOT NULL,
  `nama_merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk_mobil`
--

INSERT INTO `merk_mobil` (`id`, `nama_merk`) VALUES
(1, 'Honda'),
(2, 'Toyota'),
(3, 'Nissan'),
(4, 'Suzuki'),
(5, 'Daihatsu'),
(6, 'Mazda');

-- --------------------------------------------------------

--
-- Table structure for table `model_mobil`
--

CREATE TABLE `model_mobil` (
  `id` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `nama_model` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_mobil`
--

INSERT INTO `model_mobil` (`id`, `id_merk`, `nama_model`) VALUES
(1, 1, 'Brio'),
(2, 1, 'Jazz'),
(3, 1, 'Freed'),
(4, 1, 'Mobilio'),
(5, 1, 'HR-V'),
(6, 1, 'CR-Z'),
(7, 1, 'Civic'),
(8, 1, 'CR-V'),
(9, 1, 'BR-Z'),
(10, 1, 'City'),
(11, 1, 'Stream'),
(12, 1, 'Odyssey'),
(13, 1, 'Accord'),
(14, 2, 'Agya'),
(15, 2, 'Avanza'),
(16, 2, 'Rush'),
(17, 2, 'Kijang Innova'),
(18, 2, 'Vios'),
(19, 2, 'Yaris'),
(20, 2, 'Kijang'),
(21, 2, 'Fortuner'),
(22, 2, 'Alphard'),
(23, 2, 'Corolla'),
(24, 3, 'Grand Livina'),
(25, 3, 'Juke'),
(26, 3, 'X-Trail'),
(27, 3, 'Serena'),
(28, 3, 'Sentra'),
(29, 4, 'Swift'),
(30, 4, 'Carry'),
(31, 4, 'Karimun'),
(32, 4, 'Estilo'),
(33, 4, 'APV'),
(34, 4, 'Splash'),
(35, 4, 'Baleno'),
(36, 4, 'Ertiga'),
(37, 5, 'Ayla'),
(38, 5, 'Gran Max'),
(39, 5, 'Xenia'),
(40, 5, 'Terios'),
(41, 5, 'Luxio'),
(42, 6, 'CX-3'),
(43, 6, 'CX-5'),
(44, 6, 'CX-7'),
(45, 6, 'Mazda 5'),
(46, 6, 'Mazda 6'),
(47, 6, 'Mazda 8');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `aktif` int(1) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `merk_mobil` varchar(20) DEFAULT NULL,
  `model_mobil` varchar(20) DEFAULT NULL,
  `no_kendaraan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `akses`, `aktif`, `alamat`, `no_hp`, `merk_mobil`, `model_mobil`, `no_kendaraan`) VALUES
(1, 'Ipin', 'montirbemo1@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'montir', 1, 'Alam Indah', '08567579441', '', '', ''),
(2, 'Budi', 'montirbemo2@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'montir', 1, 'Madiun', '08456123723', NULL, NULL, NULL),
(3, 'Prayogo', 'us@er.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Alam Indah', '085691388200', 'Honda', 'City', 'B3213VEO'),
(4, 'Nizariansyah', 'nizariansyah221@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Jakarta', '0861231251', 'Toyota', 'Atlis', 'B2133FED'),
(5, 'Gilang N', 'gilnus22@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Bogor', '0821335232', 'Mazda', 'Mazda 8', 'F3121GED'),
(6, 'Didi', 'montirbemo3@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'montir', 1, 'Tegal', '086545345634', NULL, NULL, NULL),
(7, 'Denny', 'dennyfebry.p@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Ciseke', '081223857722', 'Honda', 'Civic', 'D3333VDD'),
(69, 'Multahadi Qisman', 'qismanmultahadi@gmail.com', '227dc446f924038056872b3eb7a8f744', 'user', 1, 'surya', '081224840976', 'Mazda', 'CX-5', 'E9123ABE'),
(70, 'Hilmi Aziz', 'Hilmi.aziz07@gmail.com', 'ff40461ad9a75fd10acb44cf4f39d6b3', 'user', 1, 'Jatinangor', '082219114097', 'Suzuki', 'APV', 'D2000MII'),
(71, 'Pandji Saeful', 'pandjisaeful@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 1, 'ujungberung, Bandung', '082240690867', 'Mazda', 'Mazda 8', 'D3746WEA'),
(72, 'Azmi', 'Farras.muhadzdzib25@gmail.com', '654ef9712bbeb91f2cc8d46dc5687f2b', 'user', 1, 'Pasir impun', '089686931837', 'Toyota', 'Kijang', 'D1208ASL'),
(73, 'Malik', 'malikzulfikar4@gmail.com', 'c910cdba03095b7e37e34ac95c7cec8a', 'user', 1, 'Permata Hijau, Rancaekek', '081221471298', 'Toyota', 'Agya', 'D1757VBA'),
(74, 'M Gilang Akbar', 'akbargilang98@gmail.com', 'e36c941d7e4894f703267e712618dfd7', 'user', 1, 'Cangklek', '082126251869', 'Mazda', 'CX-7', 'F4651XCA'),
(75, 'Hafizh Arkan', 'hafizhkhan13@gmail.com', 'e9995af3043dcd0f6166e47a073d043f', 'user', 1, 'Jatinangor', '082213108255', 'Mazda', 'Mazda 8', 'B6969VEX'),
(76, 'Andy Anggara', 'andy_anggar@yahoo.co.id', 'e807f1fcf82d132f9bb018ca6738a19f', 'user', 1, 'Hegarmanah', '085224069698', 'Mazda', 'Mazda 8', 'E2125RWD'),
(77, 'Agak Binguang', 'agakbinguang@gmail.com', '16fee214eb95b3234f347b070904afe6', 'user', 1, 'apartemen puri bunda', '081122334455', 'Honda', 'CR-Z', 'D1111BUF'),
(78, 'Muhammad Fawwaz Izzuddin', 'muhammadfawwaz1311@gmail.com', '7cc2cf8a95f80a8ea500ff997f9623e4', 'user', 1, 'Bandung', '081395508982', 'Honda', 'Jazz', 'D6276VDD'),
(79, 'Muhamad Ihsan Kamil', 'ihsan.kamil58@gmail.com', '55d40f08213ce85dee03a771520e0a03', 'user', 1, 'Jalan Perintis Kemerdekaan Nomor 53 Banj', '081321060058', 'Honda', 'Jazz', 'Z1234VEC'),
(81, 'yoshe', 'yoshezaneta@gmail.com', '7ed8e40369b899f5f54603a80d6ca4e6', 'user', 1, 'denayu', '08989311711', 'Mazda', 'CX-3', 'B1070UYA'),
(82, 'Dicky', 'dickyab21@gmail.com', '96e79218965eb72c92a549dd5a330112', 'user', 1, 'tes', '0819182838', 'Nissan', 'Serena', 'D28488DIK'),
(83, 'Arie', 'lightflame0@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, 'Jatinangor', '0888888888', 'Honda', 'Brio', 'A1111BBB'),
(84, 'Zharfan Nugraha Permadi', 'zharfannp@gmail.com', 'f2da3ee19bec36fa8d806fa0929c138e', 'user', 1, 'komplek permata biru blok u-93, cibiru', '087743579538', 'Mazda', 'Mazda 8', 'D6969NGT'),
(85, 'Gilang', 'Gnusantara221@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(86, 'Bayu Roma Subektj', 'bayuroma34@gmail.com', '07d48e7f04d803c8ec7b8874b2adfa37', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(87, 'Yuda', 'yuda.aprimulyana1@gmail.com', '95c9e5f681a70dc201042f8f255e8142', 'user', 1, 'Cibabat', '089662252696', 'Toyota', 'Fortuner', 'D2431Sav'),
(88, 'Muhamad Rizki', 'muamadrizki382@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(89, 'Muriz', 'muhamadrizki_x3@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'user', 1, NULL, NULL, NULL, NULL, NULL),
(90, 'unyil', 'unyil@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Bandung', '081234567899', 'Honda', 'Civic', 'D2345VDD'),
(95, 'Fawwaz Izzuddin', 'papawfawwaz1@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 1, 'Taman Sari', '085691388200', 'Honda', 'Jazz', 'B1111VEO'),
(96, 'test', 'papawfawwaz2@gmail.com', 'a887d838e74d78f563ffc98c4894dc84', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(97, 'Hasna', 'Dhasnasb@gmail.com', 'd8e3e28224d9c0202759dcca8d735f66', 'user', 1, 'Pci 1', '087737433243', 'Honda', 'Mobilio', 'B2222VEO'),
(98, 'Diah hasna', 'dhasnasalsabila@gmail.com', 'd8e3e28224d9c0202759dcca8d735f66', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(99, 'bhaskara ikhsan', 'bhaskara@sharingvision.biz', '0428f4ad562bc1261dc245bff3119f97', 'user', 1, 'haji akbar', '08123123', 'Suzuki', 'APV', 'b2222veo'),
(100, 'Yudi', 'sf.1206@gmail.com', '4adcaa03a219960a7cd1c6cd7e00e3a2', 'user', 0, NULL, NULL, NULL, NULL, NULL),
(101, 'Anto', 'sf05.1206@gmail.com', '4adcaa03a219960a7cd1c6cd7e00e3a2', 'user', 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `montir_id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tgl_masuk` varchar(50) NOT NULL,
  `tgl_keluar` varchar(50) DEFAULT NULL,
  `wkt_mulai` varchar(20) DEFAULT NULL,
  `wkt_selesai` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `montir_id`, `kode`, `tgl_masuk`, `tgl_keluar`, `wkt_mulai`, `wkt_selesai`, `keterangan`, `status`) VALUES
(1, 3, 1, 'iwx00', '2019-02-08', '2019-02-08', '12:50', '13:00', 'Cek kondisi ban', 3),
(5, 3, 1, 'mtfei', '2019-02-10', '2019-02-10', '14:30', '14:50', 'Rem kurang pakem', 3),
(6, 4, 2, 'm15pl', '2019-02-13', '2019-02-13', '12:50', '15:25', 'Tune Up', 3),
(7, 5, 2, '8x39j', '2019-02-14', '2019-02-14', '12:50', '14:10', 'AC', 3),
(11, 3, 2, 'lcxde', '2019-02-25', '2019-02-25', '12:50', '14:30', 'Tune Up', 3),
(36, 4, 1, 'mz15g', '2019-03-13', '2019-03-13', '15:30', '17:10', 'Tune Up', 3),
(41, 5, 1, 'qkctk', '2019-03-22', '2019-03-22', '12:00', '12:25', 'Ganti oli', 3),
(42, 3, 2, 'lv1vn', '2019-03-22', '2019-03-22', '13:05', '14:30', 'Kaki', 3),
(43, 70, 1, 'todo2', '2019-03-22', '2019-03-22', '12:50', '14:30', 'Tune up', 3),
(44, 72, 2, '5g12r', '2019-03-23', '2019-03-23', '10:20', '16:00', 'Mogok', 3),
(45, 69, 6, 't1wux', '2019-03-23', '2019-03-23', '10:00', '10:50', 'rem kurang baik', 3),
(46, 71, 1, 'cpd0e', '2019-03-23', '2019-03-23', '11:00', '13:05', 'mobil turun mesin', 3),
(47, 74, 1, 'lae7c', '2019-03-23', '2019-03-23', '13:30', '15:00', 'servis rutin', 3),
(48, 73, 6, '5p3yf', '2019-03-23', '2019-03-23', '11:30', '12:25', 'Ganti Oli', 3),
(49, 75, 2, '423iu', '2019-03-24', '2019-03-24', '10:25', '11:15', 'Ganti Oli', 3),
(50, 76, 1, '08yt0', '2019-03-24', '2019-03-24', '10:10', '10:50', 'Ban bocor', 3),
(51, 77, 6, 'a2x14', '2019-03-24', '2019-03-24', '11:40', '12:20', 'bensin abis', 3),
(159, 79, 2, 'kkgjr', '2019-03-24', '2019-03-24', '10:20', '12:45', 'Service rutin', 3),
(160, 81, 1, 'mdbg4', '2019-03-25', '2019-03-25', '13:20', '18:20', 'mati total', 3),
(162, 82, 2, '4la2y', '2019-03-25', '2019-03-25', '10:30', '10:35', 'cek angin', 3),
(186, 84, 2, 'nqooi', '2019-03-25', '2019-03-25', '10:30', '11:00', 'ganti mobil', 3),
(189, 83, 1, '9zeeg', '2019-03-25', '2019-03-25', '14:34', '16:34', 'ban', 3),
(208, 87, 2, 'wyx5f', '2019-04-03', '2019-04-03', '13:12', '15:47', 'Mesin kurang bertenaga', 3),
(209, 3, 1, '74hb8', '2019-04-01', '2019-04-01', '10:00', '12:50', 'Servis', 3),
(210, 7, 2, 'auddx', '2019-04-05', '2019-04-05', '12:00', '12:10', 'Ganti Oli', 3),
(211, 90, 1, 'udxct', '2019-04-11', '2019-04-11', '10:00', '11:51', 'ganti oli', 3),
(212, 3, 2, 'dlh78', '2019-04-14', '2019-04-14', '10:30', '12:25', 'Servis', 3),
(213, 95, 1, 'rzfi9', '2019-04-14', '2019-04-14', '10:30', '13:20', 'Servis Rutin', 3),
(216, 7, 6, '3h5uu', '2019-05-26', '2019-05-26', '11:00', '13:25', 'Servis rutin', 3),
(217, 95, 1, 'w5h0g', '2019-05-27', '2019-05-27', '10:00', '10:30', 'Servis', 3),
(218, 99, 1, 'fil20', '2019-06-21', '2019-06-21', '', '', 'ganti oli', 3),
(219, 97, 1, 'i8iqh', '2019-06-21', '2019-06-21', '', '', 'Ganti oli', 3),
(220, 95, 1, 'oypwd', '2019-06-21', '2019-06-21', '', '', 'ganti oli', 1),
(221, 99, 2, 'cucyk', '2019-06-21', '2019-06-21', '', '', 'isi oli', 3);

-- --------------------------------------------------------

--
-- Table structure for table `plat_nomor`
--

CREATE TABLE `plat_nomor` (
  `id` int(11) NOT NULL,
  `kode_wilayah` varchar(3) NOT NULL,
  `nomor_polisi` int(5) NOT NULL,
  `huruf_seri` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plat_nomor`
--

INSERT INTO `plat_nomor` (`id`, `kode_wilayah`, `nomor_polisi`, `huruf_seri`) VALUES
(1, 'A', 1111, 'BEC'),
(2, 'B', 2222, 'VEO'),
(3, 'D', 3333, 'VDD'),
(4, 'E', 4444, 'NAR'),
(5, 'F', 5555, 'FYI'),
(6, 'Z', 6666, 'EGD');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `kode_servis` varchar(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`id`, `pesanan_id`, `kode_servis`, `tanggal`) VALUES
(20, 1, 'CBC01', '2019-02-08'),
(21, 1, 'CBC02', '2019-02-08'),
(22, 5, 'CBM01', '2019-02-10'),
(23, 6, 'MT01', '2019-02-13'),
(25, 7, 'CBF01', '2019-02-14'),
(26, 7, 'CBF02', '2019-02-14'),
(27, 11, 'MT01', '2019-02-25'),
(34, 36, 'MT01', '2019-03-21'),
(35, 41, 'MO01', '2019-03-22'),
(36, 42, 'CBB01', '2019-03-22'),
(37, 42, 'CBR01', '2019-03-22'),
(40, 43, 'MT01', '2019-03-22'),
(43, 44, 'MT02', '2019-03-23'),
(44, 44, 'MC01', '2019-03-23'),
(45, 44, 'MF03', '2019-03-23'),
(46, 45, 'CBS02', '2019-03-23'),
(47, 45, 'CBM01', '2019-03-23'),
(48, 46, 'MT01', '2019-03-23'),
(49, 46, 'MC01', '2019-03-23'),
(50, 47, 'MO01', '2019-03-23'),
(51, 47, 'CBC01', '2019-03-23'),
(52, 47, 'MO03', '2019-03-23'),
(53, 47, 'MC02', '2019-03-23'),
(54, 47, 'CBM02', '2019-03-23'),
(55, 48, 'MO03', '2019-03-23'),
(56, 48, 'MF01', '2019-03-23'),
(57, 48, 'MO01', '2019-03-23'),
(58, 50, 'CBP01', '2019-03-24'),
(59, 49, 'MO01', '2019-03-24'),
(60, 49, 'MO03', '2019-03-24'),
(61, 51, 'MF03', '2019-03-24'),
(62, 51, 'MR01', '2019-03-24'),
(63, 159, 'MO01', '2019-03-25'),
(64, 159, 'MT01', '2019-03-25'),
(65, 159, 'CBM02', '2019-03-25'),
(66, 160, 'MT02', '2019-03-25'),
(67, 162, 'CBC02', '2019-03-25'),
(68, 186, 'CBS01', '2019-03-25'),
(69, 189, 'CBR01', '2019-03-25'),
(73, 208, 'CBS01', '2019-04-03'),
(74, 208, 'CBR01', '2019-04-03'),
(75, 208, 'MT01', '2019-04-03'),
(76, 209, 'MT01', '2019-04-01'),
(77, 209, 'MO01', '2019-04-01'),
(78, 209, 'MO03', '2019-04-01'),
(79, 211, 'MO01', '2019-04-11'),
(80, 211, 'CBM01', '2019-04-11'),
(81, 209, 'CBF01', '2019-04-12'),
(83, 213, 'MT01', '2019-04-14'),
(85, 213, 'MO01', '2019-04-14'),
(86, 213, 'CBM01', '2019-04-14'),
(87, 213, 'MO04', '2019-04-14'),
(88, 212, 'CBS01', '2019-05-26'),
(89, 212, 'CBB01', '2019-05-26'),
(90, 212, 'CBR01', '2019-05-26'),
(91, 210, 'CBC02', '2019-05-26'),
(92, 210, 'CBC01', '2019-05-26'),
(93, 216, 'MO01', '2019-05-26'),
(94, 216, 'MT01', '2019-05-26'),
(95, 216, 'CBM01', '2019-05-26'),
(96, 217, 'CBR01', '2019-05-27'),
(97, 217, 'CBC02', '2019-05-27'),
(98, 218, 'MO01', '2019-06-21'),
(99, 219, 'MO01', '2019-06-21'),
(100, 221, 'MO01', '2019-06-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_servis`
--
ALTER TABLE `daftar_servis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_servis` (`kode_servis`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk_mobil`
--
ALTER TABLE `merk_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_mobil`
--
ALTER TABLE `model_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merk_mobil` (`id_merk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `pengguna_montir_id` (`montir_id`) USING BTREE,
  ADD KEY `pengguna_user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `plat_nomor`
--
ALTER TABLE `plat_nomor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_ids` (`pesanan_id`),
  ADD KEY `daftar_servis_kode` (`kode_servis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_servis`
--
ALTER TABLE `daftar_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `merk_mobil`
--
ALTER TABLE `merk_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `model_mobil`
--
ALTER TABLE `model_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `plat_nomor`
--
ALTER TABLE `plat_nomor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_mobil`
--
ALTER TABLE `model_mobil`
  ADD CONSTRAINT `merk_mobil` FOREIGN KEY (`id_merk`) REFERENCES `merk_mobil` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `user_montir_id` FOREIGN KEY (`montir_id`) REFERENCES `pengguna` (`id`),
  ADD CONSTRAINT `user_user_id` FOREIGN KEY (`user_id`) REFERENCES `pengguna` (`id`);

--
-- Constraints for table `servis`
--
ALTER TABLE `servis`
  ADD CONSTRAINT `daftar_servis_kode` FOREIGN KEY (`kode_servis`) REFERENCES `daftar_servis` (`kode_servis`),
  ADD CONSTRAINT `pesanan_ids` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
