-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Apr 2021 pada 08.33
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasikpdk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `kdKeranjang` int(50) NOT NULL,
  `idAkun` int(50) NOT NULL,
  `kdProduk` int(50) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `jml_produk` int(50) NOT NULL,
  `berat` float NOT NULL,
  `subtotal` int(50) NOT NULL,
  `totalBayar` int(200) NOT NULL,
  `gambar` text NOT NULL,
  `kurir` varchar(200) NOT NULL,
  `biayaKirim` varchar(200) NOT NULL,
  `kdPembayaran` varchar(200) NOT NULL,
  `kodeUnik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `idAkun` int(35) NOT NULL,
  `namaLengkap` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `noTelepon` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `alamatLengkap` varchar(150) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `tglLahir` varchar(35) NOT NULL,
  `kota_kabupaten` varchar(35) NOT NULL,
  `kodePos` int(35) NOT NULL,
  `kelurahan` varchar(35) NOT NULL,
  `kecamatan` varchar(35) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`idAkun`, `namaLengkap`, `username`, `password`, `noTelepon`, `email`, `alamatLengkap`, `provinsi`, `tglLahir`, `kota_kabupaten`, `kodePos`, `kelurahan`, `kecamatan`, `foto`) VALUES
(37, 'farhan sutrisno', 'farhansutrisno', 'farhan', '081298374183', 'farhansutrisno98@gmail.com', 'kp. jujuluk rt/rw 002/004', 'Banten', '2018-10-31', 'lebak', 42316, 'Cijoropasir', 'Rangkasbitung', 'shirt_bp1.jpg'),
(38, 'dafa firdaus', 'dafa', '123', '081298374183', 'dafafirdaus@gmail.com', 'jujuluk', 'Aceh', '2018-11-02', 'lebak', 42316, 'cijoropasir', 'Rangkasbitung', 'Trend_model_rambut_pria_ala_K-Pop_Korea_terbaru6.jpg'),
(40, 'rafael alzaky', 'rafaelalzaky', '123', '081298374183', 'rafaelalzaky@gmail.com', 'kampung jujuluk', 'Banten', '2018-11-09', 'lebak', 42316, 'cijoropasir', 'Rangkasbitung', 'bts-tear-600x7505.jpg'),
(42, 'dhea dwijayanti', 'admin', '123', '081298374183', 'dheadwijayanti.dd@gmail.com', 'pasir sukarayat', 'Banten', '2019-03-21', 'Lebak', 42316, 'Cijoropasir1', 'Rangkasbitung', 'blackpink211.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `kdOperator` int(35) NOT NULL,
  `namaLengkap` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `tglLahir` varchar(35) NOT NULL,
  `jenisKelamin` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `noTelepon` varchar(35) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(35) NOT NULL,
  `kota_kab` varchar(35) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `alamatLengkap` varchar(100) NOT NULL,
  `kodePos` int(35) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`kdOperator`, `namaLengkap`, `username`, `password`, `tglLahir`, `jenisKelamin`, `email`, `noTelepon`, `kelurahan`, `kecamatan`, `kota_kab`, `provinsi`, `alamatLengkap`, `kodePos`, `foto`) VALUES
(1, 'farhan', 'farhan', 'farhan', '1998-01-30', 'Laki-Laki', 'farhansutrisno98@gmail.com', '081298374182', 'cijoropasir', 'rangkasbitung', 'lebak', 'banten', 'kampung jujuluk', 42316, 'Trend_model_rambut_pria_ala_K-Pop_Korea_terbaru71.jpg'),
(2, 'dhea dwijayanti', 'dheadj', 'dheadj', '2018-12-01', 'Perempuan', 'dheadwijayanti@gmail.com', '081298374183', 'cijoropasir', 'Rangkasbitung', 'lebak', 'Banten', 'pasir sukarayat', 42316, 'dhea.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kdPembelian` int(35) NOT NULL,
  `idAkun` int(35) NOT NULL,
  `kurir` varchar(150) NOT NULL,
  `biayaKirim` int(25) NOT NULL,
  `totalBayar` int(35) NOT NULL,
  `kdProduk` int(35) NOT NULL,
  `berat` float NOT NULL,
  `jml_produk` int(200) NOT NULL,
  `subtotal` int(200) NOT NULL,
  `kdPembayaran` varchar(200) NOT NULL,
  `tglTransaksi` varchar(35) NOT NULL,
  `tglPembayaran` varchar(35) NOT NULL,
  `noResi` varchar(35) NOT NULL,
  `statusPembayaran` varchar(35) NOT NULL,
  `kodeUnik` int(35) NOT NULL,
  `strukPembayaran` varchar(35) NOT NULL,
  `catatan` text NOT NULL,
  `kdOperator` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kdPembelian`, `idAkun`, `kurir`, `biayaKirim`, `totalBayar`, `kdProduk`, `berat`, `jml_produk`, `subtotal`, `kdPembayaran`, `tglTransaksi`, `tglPembayaran`, `noResi`, `statusPembayaran`, `kodeUnik`, `strukPembayaran`, `catatan`, `kdOperator`) VALUES
(78, 38, 'tiki', 18000, 218569, 13, 0, 1, 100000, 'KPoKAeNKPDK', '2019-01-26', '2019-01-26', '444444', 'sudah diterima', 569, 'blackpink27.jpg', '', 2),
(79, 38, 'tiki', 18000, 218569, 8, 0, 1, 100000, 'KPoKAeNKPDK', '2019-01-26', '2019-01-26', '444444', 'sudah diterima', 569, 'blackpink27.jpg', '', 2),
(80, 37, 'jne', 15000, 132348, 8, 0, 1, 100000, 'KPAFTymKPDK', '2019-02-26', '2019-02-26', '9499499', 'sudah diterima', 748, 'kpop4.jpg', '', 2),
(81, 37, 'jne', 15000, 132348, 7, 0, 1, 1600, 'KPAFTymKPDK', '2019-02-26', '2019-02-26', '9499499', 'sudah diterima', 748, 'kpop4.jpg', '', 2),
(82, 37, 'jne', 15000, 132348, 12, 0, 1, 15000, 'KPAFTymKPDK', '2019-02-26', '2019-02-26', '9499499', 'sudah diterima', 748, 'kpop4.jpg', '', 2),
(83, 37, 'jne', 15000, 199687, 12, 0, 1, 15000, 'KPSsyNdKPDK', '2019-03-26', '2019-03-26', '444444', 'sudah diterima', 87, 'Logo_21.png', '', 2),
(84, 37, 'jne', 15000, 199687, 9, 0, 1, 20000, 'KPSsyNdKPDK', '2019-03-26', '2019-03-26', '444444', 'sudah diterima', 87, 'Logo_21.png', '', 2),
(85, 37, 'jne', 15000, 199687, 7, 0, 1, 1600, 'KPSsyNdKPDK', '2019-03-26', '2019-03-26', '444444', 'sudah diterima', 87, 'Logo_21.png', '', 2),
(86, 37, 'jne', 15000, 199687, 8, 0, 1, 100000, 'KPSsyNdKPDK', '2019-03-26', '2019-03-26', '444444', 'sudah diterima', 87, 'Logo_21.png', '', 2),
(87, 37, 'jne', 15000, 199687, 10, 0, 1, 48000, 'KPSsyNdKPDK', '2019-03-26', '2019-03-26', '444444', 'sudah diterima', 87, 'Logo_21.png', '', 2),
(88, 38, 'jne', 18000, 288331, 13, 0, 1, 100000, 'KPqMVgdKPDK', '2019-04-26', '2019-04-26', '33333', 'sudah diterima', 731, 'BLACKPINK11.jpg', '', 1),
(89, 38, 'jne', 18000, 288331, 9, 0, 1, 20000, 'KPqMVgdKPDK', '2019-04-26', '2019-04-26', '33333', 'sudah diterima', 731, 'BLACKPINK11.jpg', '', 1),
(90, 38, 'jne', 18000, 288331, 7, 0, 1, 1600, 'KPqMVgdKPDK', '2019-04-26', '2019-04-26', '33333', 'sudah diterima', 731, 'BLACKPINK11.jpg', '', 1),
(91, 38, 'jne', 18000, 288331, 8, 0, 1, 100000, 'KPqMVgdKPDK', '2019-04-26', '2019-04-26', '33333', 'sudah diterima', 731, 'BLACKPINK11.jpg', '', 1),
(92, 38, 'jne', 18000, 288331, 10, 0, 1, 48000, 'KPqMVgdKPDK', '2019-04-26', '2019-04-26', '33333', 'sudah diterima', 731, 'BLACKPINK11.jpg', '', 1),
(93, 38, 'pos', 14000, 1014521, 13, 0, 10, 1000000, 'KPZzdNeKPDK', '2019-05-26', '2019-05-26', '444444', 'sudah diterima', 521, 'blackpink28.jpg', '', 1),
(97, 42, 'tiki', 18000, 254793, 8, 0, 1, 100000, 'KPWwYpxKPDK', '2019-07-28', '2019-07-28', '444444', 'sudah diterima', 193, 'paypal2.png', '', 1),
(98, 42, 'tiki', 18000, 254793, 9, 0, 1, 20000, 'KPWwYpxKPDK', '2019-07-28', '2019-07-28', '444444', 'sudah diterima', 193, 'paypal2.png', '', 1),
(99, 42, 'tiki', 18000, 254793, 7, 0, 1, 1600, 'KPWwYpxKPDK', '2019-07-28', '2019-07-28', '444444', 'sudah diterima', 193, 'paypal2.png', '', 1),
(100, 42, 'tiki', 18000, 254793, 12, 0, 1, 15000, 'KPWwYpxKPDK', '2019-07-28', '2019-07-28', '444444', 'sudah diterima', 193, 'paypal2.png', '', 1),
(101, 42, 'tiki', 18000, 254793, 13, 0, 1, 100000, 'KPWwYpxKPDK', '2019-07-28', '2019-07-28', '444444', 'sudah diterima', 193, 'paypal2.png', '', 1),
(104, 42, 'tiki', 18000, 1518718, 13, 0, 10, 1000000, 'KPWIMXkKPDK', '2019-08-28', '2019-08-28', '65565', 'sudah diterima', 718, 'visa1.png', '', 1),
(105, 42, 'tiki', 18000, 1518718, 8, 0, 5, 500000, 'KPWIMXkKPDK', '2019-08-28', '2019-08-28', '65565', 'sudah diterima', 718, 'visa1.png', '', 1),
(106, 42, 'jne', 18000, 232982, 14, 0, 13, 14300, 'KPNnPglKPDK', '2019-09-28', '2019-09-28', '9499499', 'sudah diterima', 682, 'img_20170317_202457.jpg', '', 1),
(107, 42, 'jne', 18000, 232982, 9, 0, 10, 200000, 'KPNnPglKPDK', '2019-09-28', '2019-09-28', '9499499', 'sudah diterima', 682, 'img_20170317_202457.jpg', '', 1),
(108, 42, 'tiki', 13000, 1173398, 15, 0, 10, 160000, 'KPjxkPsKPDK', '2019-10-28', '2019-10-28', '1231231231', 'sudah diterima', 398, 'bni.jpg', '', 1),
(109, 42, 'tiki', 13000, 1173398, 13, 0, 10, 1000000, 'KPjxkPsKPDK', '2019-10-28', '2019-10-28', '1231231231', 'sudah diterima', 398, 'bni.jpg', '', 1),
(110, 42, 'pos', 14000, 122194, 16, 0, 5, 22500, 'KPafXBUKPDK', '2019-11-28', '2019-11-28', '1231231231', 'sudah diterima', 194, 'images.jpg', '', 1),
(111, 42, 'pos', 14000, 122194, 14, 0, 5, 5500, 'KPafXBUKPDK', '2019-11-28', '2019-11-28', '1231231231', 'sudah diterima', 194, 'images.jpg', '', 1),
(112, 42, 'pos', 14000, 122194, 15, 0, 5, 80000, 'KPafXBUKPDK', '2019-11-28', '2019-11-28', '1231231231', 'sudah diterima', 194, 'images.jpg', '', 1),
(113, 42, 'tiki', 18000, 218478, 17, 0, 10, 200000, 'KPOlEZjKPDK', '2019-12-28', '2019-12-28', '4343434343', 'sudah dikirim', 478, 'struk-atm-mandiri-asli.jpg', '', 1),
(114, 37, 'jne-18000', 18000, 118405, 13, 0, 1, 100000, 'KPbNKOxKPDK', '2019-04-02', '2019-05-26', '1231231231', 'sudah diterima', 405, 'images6.jpg', 'maaf total bayar pada bukti pembayaran tidak sesuai, harap cek kembali bukti pembayaran anda serta total bayar harus sesuai sampai digit terakhir', 1),
(116, 37, 'TIKI - REG - Regular Service - Rp.13000 (3 hari kerja)', 13000, 35314, 16, 0, 1, 4500, 'KPgeIVlKPDK', '2019-04-02', '2019-04-09', '', 'sudah dibayar', 714, 'bni2.jpg', '', 0),
(117, 37, 'TIKI - REG - Regular Service - Rp.13000 (3 hari kerja)', 13000, 35314, 14, 0, 1, 1100, 'KPgeIVlKPDK', '2019-04-02', '2019-04-09', '', 'sudah dibayar', 714, 'bni2.jpg', '', 0),
(118, 37, 'TIKI - REG - Regular Service - Rp.13000 (3 hari kerja)', 13000, 35314, 15, 0, 1, 16000, 'KPgeIVlKPDK', '2019-04-02', '2019-04-09', '', 'sudah dibayar', 714, 'bni2.jpg', '', 0),
(121, 37, 'JNE - REG - Layanan Reguler - Rp.108000 (2-3 hari kerja)', 108000, 568948, 13, 0, 3, 300000, 'KPIuGBEKPDK', '2019-04-09', '2019-04-10', '', 'sudah dibayar', 948, 'struk-atm-mandiri-asli1.jpg', '', 0),
(122, 37, 'JNE - REG - Layanan Reguler - Rp.108000 (2-3 hari kerja)', 108000, 568948, 15, 0, 4, 64000, 'KPIuGBEKPDK', '2019-04-09', '2019-04-10', '', 'sudah dibayar', 948, 'struk-atm-mandiri-asli1.jpg', '', 0),
(123, 37, 'JNE - REG - Layanan Reguler - Rp.108000 (2-3 hari kerja)', 108000, 568948, 10, 0, 2, 96000, 'KPIuGBEKPDK', '2019-04-09', '2019-04-10', '', 'sudah dibayar', 948, 'struk-atm-mandiri-asli1.jpg', '', 0),
(124, 37, 'JNE - OKE - Ongkos Kirim Ekonomis - Rp.15000 (3-6 hari kerja)', 15000, 34908, 16, 0.5, 1, 4500, 'KPcOSXMKPDK', '2019-04-09', '2019-04-10', '457546765', 'sudah diterima', 408, 'img_20170317_2024573.jpg', '', 1),
(125, 37, 'JNE - OKE - Ongkos Kirim Ekonomis - Rp.15000 (3-6 hari kerja)', 15000, 34908, 12, 0.5, 1, 15000, 'KPcOSXMKPDK', '2019-04-09', '2019-04-10', '457546765', 'sudah diterima', 408, 'img_20170317_2024573.jpg', '', 1),
(130, 37, 'TIKI - ECO - Economy Service - Rp.12000 (5 hari kerja)', 12000, 212940, 13, 1, 2, 200000, 'KPkbIqJKPDK', '2019-05-16', '2019-05-17', '6464664646464646', 'sudah diterima', 940, 'bni511.jpg', '', 1),
(141, 37, 'JNE - REG - Layanan Reguler - Rp.414000 (2-3 hari kerja)', 414000, 854316, 8, 1, 2, 200000, 'KPkPJsQKPDK', '2019-06-04', '2019-06-04', '123455678', 'sudah diterima', 316, 'bni7.jpg', '', 1),
(142, 37, 'JNE - REG - Layanan Reguler - Rp.414000 (2-3 hari kerja)', 414000, 854316, 13, 1, 2, 200000, 'KPkPJsQKPDK', '2019-06-04', '2019-06-04', '123455678', 'sudah diterima', 316, 'bni7.jpg', '', 1),
(143, 37, 'JNE - REG - Layanan Reguler - Rp.414000 (2-3 hari kerja)', 414000, 854316, 9, 20, 1, 20000, 'KPkPJsQKPDK', '2019-06-04', '2019-06-04', '123455678', 'sudah diterima', 316, 'bni7.jpg', '', 1),
(144, 37, 'JNE - REG - Layanan Reguler - Rp.414000 (2-3 hari kerja)', 414000, 854316, 18, 0.5, 1, 20000, 'KPkPJsQKPDK', '2019-06-04', '2019-06-04', '123455678', 'sudah diterima', 316, 'bni7.jpg', '', 1),
(145, 37, 'TIKI - REG - Regular Service - Rp.26000 (3 hari kerja)', 26000, 326683, 13, 1.5, 3, 300000, 'KPXPxhwKPDK', '2019-06-25', '2019-06-25', '1231231231', 'sudah diterima', 683, 'mandiri5.jpg', '', 1),
(146, 37, 'JNE - REG - Layanan Reguler - Rp.288000 (2-3 hari kerja)', 288000, 688438, 13, 0.5, 1, 100000, 'KPstGmaKPDK', '2019-06-26', '2019-06-26', '', 'sudah dibayar', 438, 'bni12.jpg', '', 0),
(147, 37, 'JNE - REG - Layanan Reguler - Rp.288000 (2-3 hari kerja)', 288000, 688438, 9, 15, 3, 300000, 'KPstGmaKPDK', '2019-06-26', '2019-06-26', '', 'sudah dibayar', 438, 'bni12.jpg', '', 0),
(148, 37, 'TIKI - REG - Regular Service - Rp.26000 (3 hari kerja)', 26000, 326246, 13, 1.5, 3, 300000, 'KPxYjGPKPDK', '2019-06-26', '2019-09-11', '456456457', 'sudah diterima', 246, 'bni13.jpg', '', 1),
(149, 37, 'JNE - OKE - Ongkos Kirim Ekonomis - Rp.15000 (3-6 hari kerja)', 15000, 115769, 13, 0.5, 1, 100000, 'KPQLxmVKPDK', '2021-03-02', '', '', 'belum dibayar', 769, '', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanmasuk`
--

CREATE TABLE `pesanmasuk` (
  `kdPesanMasuk` int(35) NOT NULL,
  `namaLengkap` varchar(35) NOT NULL,
  `noTelepon` varchar(25) NOT NULL,
  `judulPesan` varchar(35) NOT NULL,
  `isiPesan` text NOT NULL,
  `tglPesan` varchar(35) NOT NULL,
  `idAkun` int(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanmasuk`
--

INSERT INTO `pesanmasuk` (`kdPesanMasuk`, `namaLengkap`, `noTelepon`, `judulPesan`, `isiPesan`, `tglPesan`, `idAkun`) VALUES
(9, 'farhan sutrisno', '081298374183', 'sangat bagus dan menarik semoga nil', 'sangat bermanfaat untuk memajukan perkoperasian di indonesia ', '2019-05-10', 0),
(10, 'farhan sutrisno', '081298374183', 'aplikasi ini sangat bagus', 'aplikasi ini sangat cocok digunakan oleh masyarakat yang ingin membeli produk', '2019-06-17', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kdProduk` int(35) NOT NULL,
  `namaSuplier` varchar(35) NOT NULL,
  `namaProduk` varchar(35) NOT NULL,
  `berat` float NOT NULL,
  `hargaPenjualan` int(35) NOT NULL,
  `hargaPokokPembelian` int(35) NOT NULL,
  `stok` int(35) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tglPembelian` varchar(35) NOT NULL,
  `expired` varchar(35) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `gambar2` varchar(200) DEFAULT NULL,
  `gambar3` varchar(200) DEFAULT NULL,
  `kdOperator` int(35) NOT NULL,
  `gambar_pendukung` text,
  `catatan_pendukung` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kdProduk`, `namaSuplier`, `namaProduk`, `berat`, `hargaPenjualan`, `hargaPokokPembelian`, `stok`, `deskripsi`, `kategori`, `tglPembelian`, `expired`, `gambar`, `gambar2`, `gambar3`, `kdOperator`, `gambar_pendukung`, `catatan_pendukung`) VALUES
(7, 'dafa firdaus', 'yakult', 0.065, 1600, 1500, 44, 'minuman berkhasiat untuk kesehatan tubuh', 'Minuman', '2018-12-08', '2019-03-02', 'yakult1.jpeg', 'yakult6.jpg', 'yakult32.jpg', 1, 'sertifikat_halal.jpg', 'ini merupakan produk halal yang sudah bersertifikat'),
(8, 'farhan', 'kemeja koperasi', 0.5, 100000, 80000, 25, 'kemeja koperasi terkini ', 'Lainnya', '2018-12-08', '2018-12-08', 'kemeja.jpg', NULL, NULL, 1, NULL, NULL),
(9, 'farhan', 'beras ori vena', 5, 100000, 90000, 27, 'beras dari ukm yang berkualitas', 'Barang_UKM', '2018-12-14', '2019-05-26', 'beras_ori_vena31.jpg', '', '', 1, NULL, NULL),
(10, 'farhan sutrisno', 'madu klengkeng', 0.025, 48000, 45000, 46, 'madu terbaik yang berkhasiat tinggi untuk kesehatan tubuh', 'Minuman', '2018-11-28', '2019-03-09', 'madu_kelengkeng2.jpg', 'madu.jpg', 'madu2.jpg', 1, NULL, NULL),
(12, 'farhan', 'kacang gumiwang', 0.5, 15000, 10000, 49, 'kacang yang enak', 'Makanan_Ringan', '2018-11-07', '2018-12-13', 'kacang_gumiwang4.jpg', '', '', 0, NULL, NULL),
(13, 'farhan', 'baju korea', 0.5, 100000, 90000, 13, 'baju korea keren banget', 'Lainnya', '2019-03-25', '2019-03-25', 'exo1.jpg', 'exo2.jpg', 'exo3.jpg', 1, NULL, NULL),
(14, 'farhan sutrisno', 'energen cokelat', 0.031, 1100, 1000, 34, 'makanan berkhasiat tinggi dan sangat cocok di makan disela sela laper', 'Makanan', '2019-03-13', '2019-03-21', 'energen5.jpg', 'energen1.png', 'energen2.jpeg', 1, NULL, NULL),
(15, 'farhan sutrisno', 'Lifebuoy Cair', 0.045, 16000, 15000, 8, 'sabun mandi cair isi ulang membersihkan badan dari kotoran setelah seharian berkeringat dan wangi sekali harum', 'Alat_Kebersihan', '2019-03-13', '2019-10-05', 'lifbuoy4.jpg', 'lifbuoy11.jpg', 'lifebuoy.jpg', 1, NULL, NULL),
(16, 'farhan sutrisno', 'kwitansi', 0.5, 4200, 4000, 43, 'kwitansi yang cocok digunakan untuk bukti pembayaran', 'Alat_Tulis', '2019-03-29', '', 'download2.jpg', '', '', 1, NULL, NULL),
(17, 'farhan sutrisno', 'buku saldo pinjaman', 0.5, 20000, 19000, 29, 'buku saldo pinjaman', 'Buku', '2019-03-13', '', 'Buku_kas.jpg', '', '', 1, NULL, NULL),
(18, 'farhan sutrisno', 'tiga roda', 0.5, 20000, 19000, 49, 'obat nyamuk terhits pada zaman nya', 'Lainnya', '2019-03-04', '2019-03-30', 'download_(1).jpg', 'download_(2).jpg', 'images_(1).jpg', 1, NULL, 'produk ini dari hasil kerjasama bersama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`kdKeranjang`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`idAkun`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`kdOperator`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kdPembelian`);

--
-- Indexes for table `pesanmasuk`
--
ALTER TABLE `pesanmasuk`
  ADD PRIMARY KEY (`kdPesanMasuk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kdProduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `kdKeranjang` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `idAkun` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `kdOperator` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `kdPembelian` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `pesanmasuk`
--
ALTER TABLE `pesanmasuk`
  MODIFY `kdPesanMasuk` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kdProduk` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
