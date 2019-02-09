-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2019 pada 17.32
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virginia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'b63d204bf086017e34d8bd27ab969f28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori`, `kategori_slug`) VALUES
(1, 'Bracelets', 'bracelets'),
(2, 'Necklaces', 'necklaces'),
(3, 'Dream Cather', 'dream-cather'),
(4, 'Anklet', 'anklet'),
(5, 'Key RIngs', 'key-rings'),
(6, 'Earrings', 'earrings'),
(7, 'Sarong', 'sarong'),
(8, 'Clothing', 'clothing'),
(9, 'Magnet', 'magnet'),
(10, 'Display', 'display'),
(11, 'Headband', 'headband'),
(12, 'Macrame', 'macrame'),
(13, 'Handycraft', 'handycraft');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `total_transfer` varchar(50) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `kode_transaksi`, `total_transfer`, `id_rekening`, `nama_pengirim`, `tanggal_transfer`, `bukti_transfer`, `waktu_konfirmasi`) VALUES
(1, 'trx-1549554852', 'Rp. 35,000', 1, 'Ilham Surya Pratama', '0000-00-00', '66818a57e4728188375f015b86eb47e0.jpg', '2019-02-07 22:55:34'),
(2, 'trx-1549638530', 'Rp. 15,000', 2, 'Ilham Surya Pratama', '0000-00-00', '08d689205bbb225775c86de150e3c63d.jpg', '2019-02-08 22:10:51'),
(3, 'trx-1549640785', 'Rp. 27,500', 1, 'Hais Batara', '0000-00-00', 'ccce803e1bdfbdf1b8ed705a02da646f.jpg', '2019-02-08 22:47:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `id_order_temp` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `etd` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `waktu_order_temp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_temp`
--

INSERT INTO `order_temp` (`id_order_temp`, `id_session`, `id_produk`, `jumlah`, `harga_jual`, `diskon`, `kurir`, `service`, `etd`, `ongkir`, `total`, `status`, `waktu_order_temp`) VALUES
(14, '699129488c562837ddab52186d9136a1', 11, 1, 60000, 0, '', '', '', 0, 60000, 'N', '2019-02-08 23:28:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `waktu_pengajuan` datetime NOT NULL,
  `status_pengembalian` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `id_transaksi_detail`, `kode_transaksi`, `id_session`, `no_rek`, `total`, `waktu_pengajuan`, `status_pengembalian`) VALUES
(1, 14, 'trx-1545873365', '4fded1464736e77865df232cbcb4cd19', '55421854897461', 118000, '2018-12-30 21:28:42', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `produk_slug` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_reseller` int(11) NOT NULL,
  `harga_konsumen` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori_produk`, `nama_produk`, `produk_slug`, `stok`, `satuan`, `harga_modal`, `harga_reseller`, `harga_konsumen`, `berat`, `diskon`, `gambar`, `keterangan`, `username`, `waktu_input`) VALUES
(1, 1, 'Bracelets (1)', 'bracelets-1', 9, '', 0, 0, 25000, 0, 0, 'a86177b89928e921d2f1f84e3743e435.jpg', 'Bracelets (1)', '', '2019-02-07 21:22:56'),
(2, 1, 'Bracelets (2)', 'bracelets-2', 8, '', 0, 0, 10000, 0, 0, '2ab199df9d4b73432946aa63e695fe0b.jpg', 'Bracelets (2)', '', '2019-02-07 21:24:18'),
(3, 2, 'Necklaces (1)', 'necklaces-1', 10, '', 0, 0, 50000, 0, 0, '6196ddd959ca2af0c2e06f36531f725e.jpg', 'Necklaces (2)', '', '2019-02-07 22:52:57'),
(4, 2, 'Necklaces (2)', 'necklaces-2', 8, '', 0, 0, 10000, 0, 0, '5b277401d9e67ccaeef7e423c68fe31a.jpg', 'Necklaces (2)', '', '2019-02-07 21:26:48'),
(5, 13, 'Necklaces (3)', 'necklaces-3', 8, '', 0, 0, 50000, 0, 0, 'b22a954a63ad260b1745b75a757e08f8.jpg', 'Necklaces (3)', '', '2019-02-07 21:28:21'),
(6, 5, 'Key Rings (1)', 'key-rings-1', 9, '', 0, 0, 7500, 0, 0, 'da7aef9c820d829f1fd2160f091debf6.jpg', 'Key Rings (1)', '', '2019-02-07 21:29:03'),
(7, 2, 'Necklaces (4)', 'necklaces-4', 10, '', 0, 0, 60000, 0, 0, '348d471466993684dce64a8d4ab6b9f5.jpg', 'Necklaces (4)', '', '2019-02-07 21:30:06'),
(8, 5, 'Key Rings (2)', 'key-rings-2', 7, '', 0, 0, 10000, 0, 0, 'a03108d2ca53ac5c71cd08bff8b4d882.jpg', 'Key Rings (2)', '', '2019-02-07 21:31:40'),
(9, 3, 'Dream Cather (1)', 'dream-cather-1', 6, '', 0, 0, 5000, 0, 0, 'bd6a673c649ba49347a00352c146dfbf.jpg', 'Dream Cather (1)', '', '2019-02-07 21:32:31'),
(10, 3, 'Dream Cather (2)', 'dream-cather-2', 10, '', 0, 0, 70000, 0, 0, 'c9829124b5cc4c39664c7c1b721c1b25.png', 'Dream Cather (2)', '', '2019-02-07 21:33:29'),
(11, 3, 'Dream Cather (3)', 'dream-cather-3', 10, '', 0, 0, 60000, 0, 0, 'e02f047697381858c501c0bfcbe1c9a4.png', 'Dream Cather (3)', '', '2019-02-07 21:34:21'),
(12, 6, 'Earring (1)', 'earring-1', 0, '', 0, 0, 10000, 0, 10, '6a3baaa744a546ba710c1f993891e920.jpg', 'Earring (1)', '', '2019-02-08 00:20:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`) VALUES
(1, 'Mandiri', '547601016142539', 'M. Ilham Surya Pratama'),
(2, 'BRI', '6782287635', 'M. Ilham Surya Pratama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seller`
--

CREATE TABLE `seller` (
  `id_seller` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `seller_slug` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_session_seller` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seller`
--

INSERT INTO `seller` (`id_seller`, `username`, `password`, `nama`, `nama_lengkap`, `seller_slug`, `email`, `alamat`, `provinsi_id`, `kota_id`, `foto`, `deskripsi`, `id_session_seller`) VALUES
(1, 'ukmmakmur', 'd5ab0df0553ecb4531157849cfe63346', 'UKM MAKMUR', '', 'ukm-makmur', '', 'Maron', 11, 369, '', '', 'd5ab0df0553ecb4531157849cfe63346'),
(2, 'ikmjaya', 'b1e9967c99444c90b2fc2c1154567904', 'IKM JAYA', 'Tatang', 'ikm-jaya', 'ilhamsurya26@gmail.com', 'Dusun Krajan RT 11 RW 03 Desa Wonorejo Kecamatan Maron', 11, 369, '', '', 'b1e9967c99444c90b2fc2c1154567904'),
(3, 'tokoa', 'caf4d37a0e309da2ca43e6c0c4cd1103', 'TOKO A', '', 'toko-a', '', '', 11, 369, '', '', 'caf4d37a0e309da2ca43e6c0c4cd1103'),
(4, 'tokob', '326a7a5babd6ea0001cb98659cce6b92', 'TOKO B', '', 'toko-b', '', '', 11, 369, '', '', '326a7a5babd6ea0001cb98659cce6b92'),
(5, 'tokoc', '111f8a6e4141cfad7149a0a9d72f3ea8', 'TOKO C', '', 'toko-c', '', '', 11, 369, '', '', '111f8a6e4141cfad7149a0a9d72f3ea8'),
(6, 'tokod', '2377b21234a5654c6a94706a464b2225', 'TOKO D', '', 'toko-d', '', '', 11, 369, '', '', '2377b21234a5654c6a94706a464b2225'),
(7, 'tokoe', '8c2a86ea1b80f953cb002d758bb79f1d', 'TOKO E', '', 'toko-e', '', '', 11, 369, '', '', '8c2a86ea1b80f953cb002d758bb79f1d'),
(10, 'ilham', 'b63d204bf086017e34d8bd27ab969f28', 'Toko Admin', '', 'toko-admin', '', '', 11, 369, '', '', 'b63d204bf086017e34d8bd27ab969f28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`id`, `harga_jual`, `jumlah`, `file`) VALUES
(1, 225000, 2, ''),
(2, 35000, 1, ''),
(3, 65000, 1, ''),
(4, 65000, 4, ''),
(5, 35000, 8, ''),
(6, 65000, 4, ''),
(7, 35000, 8, ''),
(8, 225000, 2, ''),
(9, 35000, 1, ''),
(10, 65000, 1, ''),
(11, 225000, 2, ''),
(12, 35000, 1, ''),
(13, 65000, 1, ''),
(14, 225000, 2, ''),
(15, 35000, 1, ''),
(16, 65000, 1, ''),
(17, 65000, 4, ''),
(18, 35000, 8, ''),
(19, 240, 2, '49709a6866f2f05ce98959e46b335d36.jpg'),
(20, 240, 2, '7504ce95bb595332346d59f8a02a12b1.jpg'),
(21, 240, 2, 'f1a635ead2b54ac6172ca67688b524fc.png'),
(22, 240, 2, '68e577669c75b436b029a9af090664b4.png'),
(23, 240, 2, '8defa7d66fc1a7495cc7a51772006025.png'),
(24, 240, 2, 'dfdb8627898e9c7cc5c328c5f525d24a.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_pembeli` varchar(50) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `deadline_bayar` datetime NOT NULL,
  `konfirmasi` enum('0','1') NOT NULL,
  `status_transaksi` enum('0','1') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `no_hp` char(12) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_pembeli`, `nama_pembeli`, `waktu_transaksi`, `deadline_bayar`, `konfirmasi`, `status_transaksi`, `email`, `alamat`, `kode_pos`, `no_hp`, `pesan`) VALUES
(1, 'trx-1549554417', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:46:57', '2019-02-08 22:46:57', '0', '0', 'ilham@gmail.com', 'Dusun Paleran Desa Maron Wetan RT 11 RW 03', 67276, '085330150827', 'Segera dikirim ya gan'),
(2, 'trx-1549554545', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:49:05', '2019-02-08 22:49:05', '0', '0', 'ilham@gmail.com', 'Dusun Paleran Desan Maron Wetan RT 11 RW 03', 67276, '085330150827', 'Dikirim ya'),
(3, 'trx-1549554616', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:50:16', '2019-02-08 22:50:16', '0', '0', 'ilham@gmail.com', 'Dusun Paleran Desan Maron Wetan RT 11 RW 03', 67276, '085330150827', 'Dikirim ya'),
(4, 'trx-1549554662', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:51:02', '2019-02-08 22:51:02', '0', '0', 'ilham@gmail.com', 'gthyth', 67276, '085330150827', 'tyty'),
(5, 'trx-1549554695', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:51:35', '2019-02-08 22:51:35', '0', '0', 'ilham@gmail.com', 'gthyth', 67276, '085330150827', 'tyty'),
(6, 'trx-1549554720', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:52:00', '2019-02-08 22:52:00', '0', '0', 'ilham@gmail.com', 'gfhrtyt', 67276, '085330150827', 'ryrty'),
(7, 'trx-1549554757', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:52:37', '2019-02-08 22:52:37', '0', '0', 'ilham@gmail.com', 'gfhrtyt', 67276, '085330150827', 'ryrty'),
(8, 'trx-1549554852', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-07 22:54:12', '2019-02-08 22:54:12', '1', '1', 'ilham@gmail.com', 'fgfgf fgh', 67276, '085330150827', 'fgjhtj gjh'),
(9, 'trx-1549637500', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 21:51:40', '2019-02-09 21:51:40', '0', '0', 'ilham@gmail.com', 'Dusun Paleran Desa Maron Wetan RT 011 RW 003 Kecamatan Maron Kabupaten Probolinggo', 67276, '085330150827', 'Mohon Segera Dikirm ya gan'),
(10, 'trx-1549637562', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 21:52:42', '2019-02-09 21:52:42', '0', '0', 'ilham@gmail.com', 'Dusun Paleran Desa Maron Wetan RT 011 RW 003 Kecamatan Maron Kabupaten Probolinggo', 67276, '085330150827', 'Mohon Segera Dikirm ya gan'),
(11, 'trx-1549638126', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 22:02:06', '2019-02-09 22:02:06', '0', '0', 'ilham@gmail.com', 'gthgth', 67276, '085330150827', 'rft'),
(12, 'trx-1549638265', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 22:04:25', '2019-02-09 22:04:25', '0', '0', 'ilham@gmail.com', 'fgrtg', 67276, '085330150827', 'tyyjun tyh'),
(13, 'trx-1549638395', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 22:06:35', '2019-02-09 22:06:35', '0', '0', 'ilham@gmail.com', 'tyu ty', 67276, '085330150827', 'tyht hgbt'),
(14, 'trx-1549638530', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', '2019-02-08 22:08:50', '2019-02-09 22:08:50', '1', '1', 'ilham@gmail.com', 'fg rh', 67276, '085330150827', 'rty th'),
(15, 'trx-1549640785', '699129488c562837ddab52186d9136a1', 'Hais Batara', '2019-02-08 22:46:25', '2019-02-09 22:46:25', '1', '1', 'blogsayailham@gmail.com', 'Dusun Paleran Desa Maron Wetan RT 011 RW 003 Kecamatan Maron Kabupaten Probolinggo', 67276, '085330150827', 'Segera dikirm ya gan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `penjual` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `etd` varchar(50) NOT NULL,
  `deadline_pengiriman` datetime NOT NULL,
  `status` enum('0','1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `kode_transaksi`, `id_produk`, `id_ukuran`, `penjual`, `jumlah`, `harga_jual`, `diskon`, `total`, `satuan`, `kurir`, `service`, `ongkir`, `etd`, `deadline_pengiriman`, `status`) VALUES
(1, 'trx-1549554852', 1, 0, '', 1, 25000, 0, 25000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(2, 'trx-1549554852', 2, 0, '', 1, 10000, 0, 10000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(3, 'trx-1549637500', 5, 0, '', 2, 50000, 0, 100000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(4, 'trx-1549637500', 8, 0, '', 1, 10000, 0, 10000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(5, 'trx-1549638126', 2, 0, '', 1, 10000, 0, 10000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(6, 'trx-1549638265', 8, 0, '', 2, 10000, 0, 20000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(7, 'trx-1549638395', 9, 0, '', 1, 5000, 0, 5000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(8, 'trx-1549638530', 9, 0, '', 3, 5000, 0, 15000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(9, 'trx-1549640785', 4, 0, '', 2, 10000, 0, 20000, '', '', '', 0, '', '0000-00-00 00:00:00', '0'),
(10, 'trx-1549640785', 6, 0, '', 1, 7500, 0, 7500, '', '', '', 0, '', '0000-00-00 00:00:00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stok_ukuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id`, `id_produk`, `ukuran`, `stok_ukuran`) VALUES
(1, 1, 'S', 5),
(2, 1, 'M', 10),
(3, 1, 'XL', 10),
(4, 1, 'XXL', 10),
(5, 3, 'M', 20),
(6, 3, 'L', 15),
(7, 3, 'XL', 15),
(8, 4, 'L', 20),
(9, 4, 'XL', 10),
(10, 5, 'M', 9),
(11, 5, 'L', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `id_session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `alamat_lengkap`, `provinsi_id`, `kota_id`, `no_hp`, `foto`, `waktu_daftar`, `id_session`) VALUES
(1, 'yolo', '4fded1464736e77865df232cbcb4cd19', 'Yolo Juni', 'blogsayailham@gmail.com', 'Laki-laki', '0000-00-00', '', '<p>Dusun Paleran R 11 RW 03 Desa Maron Wetan Kecamatan Maron</p>', 11, 369, '085330150827', '', '2019-01-06 00:48:05', '4fded1464736e77865df232cbcb4cd19'),
(3, 'welek', '4d9f8c3d127adb42e286a3ccab5fb70d', 'Welek Jojo', 'myolshop.confirm@gmail.com', 'Laki-laki', '0000-00-00', '', '<p>Dusun Paleran RT 11 RW 03 Desa Maron Wetan Kecamatan Maron</p>', 11, 370, '085233441557', '', '2019-01-07 00:28:24', '4d9f8c3d127adb42e286a3ccab5fb70d'),
(6, 'ilham', 'b63d204bf086017e34d8bd27ab969f28', 'Ilham Surya Pratama', 'ilham@gmail.com', 'Laki-laki', '0000-00-00', '', '', 0, 0, '', '', '2019-02-05 02:57:30', 'b63d204bf086017e34d8bd27ab969f28'),
(7, 'hais', '699129488c562837ddab52186d9136a1', 'Hais Batara', 'hais', 'Laki-laki', '0000-00-00', '', '', 0, 0, '', '', '2019-02-08 22:34:35', '699129488c562837ddab52186d9136a1'),
(8, 'welek', '4d9f8c3d127adb42e286a3ccab5fb70d', 'Welek Jojo', 'welek', 'Laki-laki', '0000-00-00', '', '', 0, 0, '', '', '2019-02-08 22:39:25', '4d9f8c3d127adb42e286a3ccab5fb70d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`id_order_temp`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `id_order_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
