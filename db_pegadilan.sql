-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2022 pada 18.40
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegadilan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'Admin', 'admin', 'b521caa6e1db82e5a01c924a419870cb72b81635', 'admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `nip` varchar(225) NOT NULL,
  `golongan` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `nip`, `golongan`, `alamat`, `no_hp_bagian`, `gambar`) VALUES
(21, 'PPNPN', 'sinta', '3298521c3d2eee349b805dca88e47902407eb4c3', 'Sinta Kartika', '2000-12-07', 'SSSSSS', 'Tidak Ada', 'Jl. Menteng No 21 Pulang Pisau', '085347576930', 'sinta.jpg'),
(23, 'KETUA', 'nenny', '9d0136ad88888b5d0efa98ab3c4115ef3d15da7b', 'Dr. Nenny Ekawaty Barus, S.H., M.H', '1977-12-01', '197701122001122001', 'IV/a', '-', '085347576930', 'nenny.jpg'),
(24, 'WAKIL KETUA', 'dian', '06dbf79c9eb722f43ab495cd5f6dc7fcea841e5d', 'Dian Nur Pratiwi, S.H., M.H. Li', '1981-01-08', '198101082003122001', 'IV/a', '-', '085347576930', 'dian.jpg'),
(25, 'HAKIM', 'ismaya', 'b3c5bad2c9f988f9effbd722d6629fbc1a89ab26', 'Ismaya Salindri, S.H.', '1991-05-01', '199105012017122002', 'III/a', '-', '085347576930', 'ismaya.jpg'),
(26, 'HAKIM', 'ishmatul', '565a9623c95aaefa1ebfec244a8fec839f8eabb2', 'Ishmatul Lu`Lu, S.H.', '1993-12-13', '199312132017122001', 'III/a', '-', '085347576930', 'ishmatul.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangbaru`
--

CREATE TABLE `tb_barangbaru` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `type_barang` varchar(225) NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `penanggung_jawab` varchar(225) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangbaru`
--

INSERT INTO `tb_barangbaru` (`id_barang`, `nama_barang`, `type_barang`, `ruangan`, `penanggung_jawab`, `jumlah`, `tahun_anggaran`, `gambar`) VALUES
(5, 'kecap', 'manis', 'Ketua', 'Sinta Kartika', '2', 2022, 'kecap.jpg'),
(6, 'Garam', 'Dus', 'Ketua', 'Sinta Kartika', '5', 2022, 'Garam.jpg'),
(7, 'Piring', 'Dus', 'Aula', 'Ishmatul Lu`Lu, S.H.', '12', 2022, 'Piring.jpg'),
(8, 'kecap', 'manis', 'Ketua', 'Dr. Nenny Ekawaty Barus, S.H., M.H', '2', 2021, 'kecap.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangrusak`
--

CREATE TABLE `tb_barangrusak` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `type_barang` varchar(225) NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `penanggung_jawab` varchar(225) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `tahun_anggaran` year(4) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barangrusak`
--

INSERT INTO `tb_barangrusak` (`id_barang`, `nama_barang`, `type_barang`, `ruangan`, `penanggung_jawab`, `jumlah`, `tahun_anggaran`, `gambar`, `keterangan`) VALUES
(7, 'Maspion JF-2101', 'Kipas Angin', 'Aula', 'Lutfi Karim', '2', 2022, 'Maspion JF-2101.jpg', 'Digudangkan'),
(8, 'Arashi ', 'Kipas Angin', 'Aula', 'Lutfi Karim', '2', 2022, 'Arashi .jpg', 'Digudangkan'),
(9, 'kecap', 'manis', 'kasi', 'Ismaya Salindri, S.H.', '1', 2022, 'kecap.jpg', 'Dimusnahkan'),
(10, 'kecap', '21', '324', 'Sinta Kartika', '2342', 2022, 'kecap.jpg', 'Dimusnahkan'),
(11, 'kecap', 'manis', '324', 'Sinta Kartika', '1', 2021, 'kecap.jpg', 'Digudangkan'),
(12, 'Garam', 'Q2', 'Ketua', 'Dr. Nenny Ekawaty Barus, S.H., M.H', '2', 2020, 'Garam.jpg', 'Dimusnahkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dalamdaerah`
--

CREATE TABLE `tb_dalamdaerah` (
  `id_dalamdaerah` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `nomor_spt` varchar(200) NOT NULL,
  `tgl_spt` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` text NOT NULL,
  `maksud` text NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dalamdaerah`
--

INSERT INTO `tb_dalamdaerah` (`id_dalamdaerah`, `kode`, `nama_lengkap`, `nip`, `nomor_spt`, `tgl_spt`, `tgl_berangkat`, `tgl_kembali`, `tujuan`, `maksud`, `gambar`) VALUES
(39, 'D001', 'saipul, imur, ijum', '4534534534534', '2342342', '2022-01-21', '2022-01-21', '2022-01-21', '22', '22', 'D001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_bagian` int(11) NOT NULL,
  `golongan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_bagian`, `golongan`) VALUES
(1, 'Golongan I/a'),
(2, 'Golongan I/b'),
(3, 'Golongan I/c'),
(4, 'Golongan I/d'),
(5, 'Golongan II/a'),
(6, 'Golongan II/b'),
(7, 'Golongan II/c'),
(8, 'Golongan II/d'),
(9, 'Golongan III/a'),
(10, 'Golongan III/b'),
(11, 'Golongan III/c'),
(12, 'Golongan III/d'),
(13, 'Golongan IV/a'),
(14, 'Golongan IV/b'),
(15, 'Golongan IV/c'),
(16, 'Golongan IV/d'),
(17, 'Golongan IV/e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_barang`
--

CREATE TABLE `tb_jenis_barang` (
  `id_jenis` varchar(50) NOT NULL,
  `jenis_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_barang`
--

INSERT INTO `tb_jenis_barang` (`id_jenis`, `jenis_brg`) VALUES
('1', 'ATK'),
('2', 'ALAT KEBERSIHAN'),
('3', 'PERLENGKAPAN LAINNYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kabupaten`, `nama_kabupaten`) VALUES
(1, 'Kabupaten Barito Selatan'),
(2, 'Kabupaten Barito Timur'),
(3, 'Kabupaten Barito Utara'),
(4, 'Kabupaten Gunung Mas'),
(5, 'Kabupaten Kapuas'),
(6, 'Kabupaten Katingan'),
(7, 'Kabupaten Kotawaringin Barat'),
(8, 'Kabupaten Kotawaringin Timur'),
(9, 'Kabupaten Lamandau'),
(10, 'Kabupaten Murung Raya'),
(11, 'Kabupaten Pulang Pisau'),
(12, 'Kabupaten Sukamara'),
(13, 'Kabupaten Seruyan'),
(14, 'Kota Palangka Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_luardaerah`
--

CREATE TABLE `tb_luardaerah` (
  `id_luardaerah` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `nomor_spt` varchar(200) NOT NULL,
  `tgl_spt` date NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` text NOT NULL,
  `maksud` text NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_luardaerah`
--

INSERT INTO `tb_luardaerah` (`id_luardaerah`, `kode`, `nama_lengkap`, `nip`, `nomor_spt`, `tgl_spt`, `tgl_berangkat`, `tgl_kembali`, `tujuan`, `maksud`, `gambar`) VALUES
(27, 'L001', 'saipul, imur, ijum', '4534534534534', '1', '2022-01-21', '2022-01-21', '2022-01-21', '1', '6', 'L001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nama_bagian`
--

CREATE TABLE `tb_nama_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nama_bagian`
--

INSERT INTO `tb_nama_bagian` (`id_bagian`, `nama_bagian`) VALUES
(5, 'Ketua'),
(6, 'Kepala Seksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `type_barang` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `nama_pegawai` varchar(225) NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `tanggal_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `nama_barang`, `type_barang`, `jumlah`, `satuan`, `nama_pegawai`, `ruangan`, `tanggal_pengajuan`) VALUES
(4, 'kecap', 'manis', 5, 'PACK', 'Sinta Kartika', 'Ketua', '2022-01-20'),
(5, 'Garam', 'Dus', 7, 'PACK', 'Sinta Kartika', 'Ketua', '2021-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `ruangan`) VALUES
(1, 'Ketua'),
(2, 'Aula');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokbarang`
--

CREATE TABLE `tb_stokbarang` (
  `id_kode_brg` int(2) NOT NULL,
  `kode_brg` varchar(7) CHARACTER SET latin1 NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `nama_brg` varchar(50) CHARACTER SET latin1 NOT NULL,
  `hargabarang` varchar(50) CHARACTER SET latin1 NOT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `stok` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_stokbarang`
--

INSERT INTO `tb_stokbarang` (`id_kode_brg`, `kode_brg`, `id_jenis`, `nama_brg`, `hargabarang`, `satuan`, `stok`, `keluar`, `sisa`, `keterangan`) VALUES
(23, '111.001', 1, 'BALLPOINT', '25000', 'PACK', 132, 16, 116, ''),
(24, '111.002', 1, 'PENSIL', '15000', 'PACK', 110, 0, 120, ''),
(25, '111.003', 1, 'KERTAS F4', '45000', 'RIM', 110, 10, 100, ''),
(26, '111.004', 1, 'PENGHAPUS KARET', '5500', 'SET', 0, 0, 0, ''),
(27, '111.005', 1, 'PENGHAPUS CAIR', '14000', 'LUSIN', 0, 0, 0, ''),
(28, '111.006', 1, 'BUKU TULIS FOLIO', '15500', 'PACK', 0, 0, 0, ''),
(29, '111.007', 1, 'ODNER KARTON', '10000', 'BUAH', 0, 0, 0, 'STOK ABIS'),
(30, '111.008', 1, 'ISI CUTTOR', '5000', 'BUAH', 0, 0, 0, ''),
(31, '111.009', 1, 'LAKBAN BENING GOLD TAPE', '12000', 'BUAH', 0, 0, 0, ''),
(32, '111.010', 1, 'DOUBLE TAPE', '15000', 'PACK', 0, 0, 0, ''),
(33, '111.011', 1, 'SELOTIP', '8000', 'PACK', 0, 0, 0, ''),
(34, '111.012', 1, 'LEM KERTAS', '2500', 'SATUAN', 0, 0, 0, ''),
(35, '111.013', 1, 'REMOVER STAPLER', '9000', 'SATUAN', 0, 0, 0, ''),
(36, '112.001', 2, 'LAP PEL', '15000', 'BUAH', 100, 9, 91, ''),
(37, '112.002', 2, 'EMBER', '15000', 'BUAH', 10, 0, 10, ''),
(40, '112.004', 2, 'KANEBO', '10000', 'SATUAN', 0, 0, 0, ''),
(41, '112.005', 2, 'PEMBERSIH KACA', '15000', 'SATUAN', 0, 0, 0, ''),
(42, '112.006', 2, 'SABUN CUCI TANGAN', '24000', 'SATUAN', 0, 0, 0, ''),
(43, '112.007', 2, 'PEWANGI LANTAI', '5000', 'SATUAN', 0, 0, 0, ''),
(44, '112.008', 2, 'TISSUE', '10000', 'SATUAN', 0, 0, 0, ''),
(45, '112.009', 2, 'PROSTEX', '15000', 'SATUAN', 0, 5, 0, ''),
(46, '112.010', 2, 'SABUN CUCI PIRING', '10000', 'SATUAN', 0, 0, 0, ''),
(47, '112.011', 2, 'SAPU LIDI', '12500', 'UNIT', 0, 0, 0, ''),
(52, '113.001', 3, 'LAMPU HEMAT ENERGI', '45000', 'SATUAN', 100, 0, 0, ''),
(53, '113.002', 3, 'LAMPU TEMBAK', '85000', 'SATUAN', 0, 0, 0, 'STOK ABIS'),
(54, '113.003', 3, 'BATTERAI', '15000', 'PACK', 0, 0, 0, ''),
(55, '111.014', 1, 'TES', '25000', 'DUS', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tanggal`
--

CREATE TABLE `tb_tanggal` (
  `nama` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indeks untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indeks untuk tabel `tb_barangbaru`
--
ALTER TABLE `tb_barangbaru`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barangrusak`
--
ALTER TABLE `tb_barangrusak`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_dalamdaerah`
--
ALTER TABLE `tb_dalamdaerah`
  ADD PRIMARY KEY (`id_dalamdaerah`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `nama_lengkap` (`nama_lengkap`);

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_jenis_barang`
--
ALTER TABLE `tb_jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `tb_luardaerah`
--
ALTER TABLE `tb_luardaerah`
  ADD PRIMARY KEY (`id_luardaerah`),
  ADD KEY `nama_lengkap` (`nama_lengkap`);

--
-- Indeks untuk tabel `tb_nama_bagian`
--
ALTER TABLE `tb_nama_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  ADD PRIMARY KEY (`id_kode_brg`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_barangbaru`
--
ALTER TABLE `tb_barangbaru`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_barangrusak`
--
ALTER TABLE `tb_barangrusak`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_dalamdaerah`
--
ALTER TABLE `tb_dalamdaerah`
  MODIFY `id_dalamdaerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_luardaerah`
--
ALTER TABLE `tb_luardaerah`
  MODIFY `id_luardaerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_nama_bagian`
--
ALTER TABLE `tb_nama_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_stokbarang`
--
ALTER TABLE `tb_stokbarang`
  MODIFY `id_kode_brg` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
