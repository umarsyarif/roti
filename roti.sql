-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Feb 2020 pada 11.44
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(6) NOT NULL,
  `nama_foto` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `nama_foto`, `foto`) VALUES
(8, 'kjspq', 'fileupload/galeri/kjspq.png'),
(9, 'asd', 'fileupload/galeri/asd.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `no_hp` varchar(40) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `no_hp`, `alamat`, `status`) VALUES
(1, '03232', 'jl. indah', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `isi_layanan_konsumen` text NOT NULL,
  `isi_pemesanan` text NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `isi_layanan_konsumen`, `isi_pemesanan`, `status`) VALUES
(4, 'Jika kamu memiliki pertanyaan, keluhan, atau saran mengenai Air Mineral Sikumbang.<br />\r\nSilakan hubungi pusat pelayanan di nomor 0812-6666-3483 / 0823-8549-6809.', 'Untuk pemesanan produk Air Mineral Sikumbang.<br />\r\nSilakan hubungi pusat pelayanan di nomor 0812-6666-3483 / 0823-8549-6809', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `email`, `kategori`) VALUES
(1, 'pt.tirta abadi', 'jl.kebayoran', '', 'murti@gmail.com', 'Perusahaan'),
(3, 'fajar', 'jl. parin indah', '08767676767', 'fajar@gmail.com', 'Perorangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_penjualan`, `waktu_pembayaran`, `bukti`, `status`) VALUES
(2, 4, '2020-02-18 04:20:35', 'fileupload/galeri/asd.png', 'Lunas'),
(3, 7, '2020-02-18 11:28:41', 'fileupload/produk/.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl_jual` date NOT NULL,
  `wkt_jual` time NOT NULL,
  `kode_beli` varchar(10) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_produk` varchar(15) NOT NULL,
  `harga_satuan` decimal(65,0) NOT NULL,
  `jumlah_produk` varchar(10) NOT NULL,
  `harga_jual` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl_jual`, `wkt_jual`, `kode_beli`, `id_pelanggan`, `kode_produk`, `harga_satuan`, `jumlah_produk`, `harga_jual`) VALUES
(4, '2020-01-01', '07:12:00', '12', 3, 'n', '30000', '2', '60000'),
(7, '2020-02-18', '11:24:01', '15', 3, 'n', '120000', '3', '360000'),
(8, '2020-02-18', '11:36:55', '16', 3, 'jk', '90000', '1', '90000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `kode_alat` varchar(10) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `ukuran` varchar(6) NOT NULL,
  `bahan` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`kode_alat`, `nama_alat`, `merek`, `ukuran`, `bahan`, `status`, `jumlah`) VALUES
('kl008', 'lampu', 'senter', '30', 'plastik', 'Baik', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `keterangan`, `gambar`, `harga`) VALUES
(10, 'n', 'mj', 'hvyf', 'fileupload/produk/mj.png', '120000'),
(11, 'jk', 'asd', 'asd', 'fileupload/produk/asd.jpg', '90000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `isi_teks_profil` text NOT NULL,
  `isi_teks_visi` text NOT NULL,
  `status` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `isi_teks_profil`, `isi_teks_visi`, `status`) VALUES
(5, 'maadkasj, amsdhkad.<br />\r\nasdkasjhd.<br />\r\nasdhkashdk, as,djhkw.', 'asdjkh,  asdhjm. amshjdwk.<br />\r\nasdbmansdbk.', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `an` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id`, `nm_bank`, `no_rek`, `an`) VALUES
(1, 'Bank Mandiri', '0771623763812', 'Air Sikumbang'),
(2, 'Bank BRI', '12129623213781', 'Air Sikumbang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(10) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `logo` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `judul`, `logo`, `keterangan`) VALUES
(10, 'SNI', 'fileupload/sertifikat/sni.png', 'SNI'),
(11, 'Halal', 'fileupload/sertifikat/halal.png', 'Halal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'murti@gmail.com', '4db2afd96ecb90d49744c5a2460de4b4', 1),
(4, 'fajar@gmail.com', '24bc50d85ad8fa9cda686145cf1f8aca', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`kode_alat`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
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
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
