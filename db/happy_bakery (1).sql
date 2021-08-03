-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2021 pada 11.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happy_bakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `coba`
--

CREATE TABLE `coba` (
  `id_dk` int(11) NOT NULL,
  `id_ds` int(20) NOT NULL,
  `jumlah_kembali` int(20) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `coba`
--

INSERT INTO `coba` (`id_dk`, `id_ds`, `jumlah_kembali`, `tanggal_kembali`, `status`) VALUES
(1, 3, 10, '2021-03-02', 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `draf`
--

CREATE TABLE `draf` (
  `id` int(11) NOT NULL,
  `id_rasa` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `draf_keluar`
--

CREATE TABLE `draf_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_rasa` int(10) NOT NULL,
  `id_sales` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `draf_kembali`
--

CREATE TABLE `draf_kembali` (
  `id_dk` int(11) NOT NULL,
  `id_ds` int(30) NOT NULL,
  `id_rasa` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_toko` int(20) NOT NULL,
  `jumlah_kembali` int(30) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_roti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `draf_sales`
--

CREATE TABLE `draf_sales` (
  `id_ds` int(11) NOT NULL,
  `id_rasa` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_toko` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat_karyawan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `username`, `alamat_karyawan`) VALUES
(1, 'karyawan', 'karyawan', 'Lubuk Buaya, Koto Tangah Padang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roti_keluar`
--

CREATE TABLE `roti_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_rasa` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roti_keluar`
--

INSERT INTO `roti_keluar` (`id_keluar`, `id_rasa`, `id_sales`, `jumlah`, `tanggal`) VALUES
(1, 4, 2, 50, '2021-02-28'),
(2, 5, 1, 50, '2021-03-01'),
(3, 5, 1, 10, '2021-03-01'),
(4, 3, 2, 20, '2021-03-03'),
(5, 3, 1, 100, '2021-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roti_kembali`
--

CREATE TABLE `roti_kembali` (
  `id_dk` int(11) NOT NULL,
  `id_ds` int(20) NOT NULL,
  `id_rasa` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_toko` int(20) NOT NULL,
  `jumlah_kembali` int(20) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_roti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roti_kembali`
--

INSERT INTO `roti_kembali` (`id_dk`, `id_ds`, `id_rasa`, `id_user`, `id_toko`, `jumlah_kembali`, `tanggal_kembali`, `status_roti`) VALUES
(1, 4, 5, 2, 1, 5, '2021-03-02', 'Rusak'),
(2, 1, 4, 2, 5, 10, '2021-03-02', 'Rusak'),
(3, 3, 4, 2, 4, 4, '2021-03-02', 'Rusak'),
(4, 4, 5, 2, 1, 2, '2021-03-02', 'Kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roti_masuk`
--

CREATE TABLE `roti_masuk` (
  `id` int(11) NOT NULL,
  `id_rasa` int(10) NOT NULL,
  `id_user` int(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roti_masuk`
--

INSERT INTO `roti_masuk` (`id`, `id_rasa`, `id_user`, `jumlah`, `tanggal`) VALUES
(1, 3, 3, 50, '2021-03-01'),
(2, 4, 3, 50, '2021-02-28'),
(3, 5, 3, 50, '2021-03-01'),
(4, 3, 3, 100, '2021-03-02'),
(5, 3, 3, 100, '2021-03-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roti_sampai`
--

CREATE TABLE `roti_sampai` (
  `id_ds` int(11) NOT NULL,
  `id_rasa` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_toko` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roti_sampai`
--

INSERT INTO `roti_sampai` (`id_ds`, `id_rasa`, `id_user`, `id_toko`, `jumlah`, `tanggal`) VALUES
(1, 4, 2, 5, 50, '2021-02-28'),
(2, 4, 2, 5, 20, '2021-03-02'),
(3, 4, 2, 4, 24, '2021-03-03'),
(4, 5, 2, 1, 5, '2021-03-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `username`, `alamat`) VALUES
(1, 'Sales', 'sales', 'Lubuk Buaya, koto tangah padang'),
(2, 'Rudi', 'Rudi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`) VALUES
(1, 'Toko Sebelah', 'Jalan Patimura nomor 4'),
(3, 'Toko Bunda', 'Jalan aceh darussalam nomor 5 padang utara'),
(4, 'Toko Keluarga', 'Jalan adinegoro, Lubuk Buaya'),
(5, 'BalaiBaru', 'Kuranjai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `status`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'sales', 'sales', 'sales'),
(3, 'karyawan', 'karyawan', 'karyawan'),
(4, 'Admin1', 'admin', 'admin'),
(5, 'Rudi', 'Rudi', 'sales'),
(6, 'pimpinan', 'pimpinan', 'pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `varian_rasa`
--

CREATE TABLE `varian_rasa` (
  `id_rasa` int(11) NOT NULL,
  `varian_rasa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `varian_rasa`
--

INSERT INTO `varian_rasa` (`id_rasa`, `varian_rasa`) VALUES
(3, 'Strawberry'),
(4, 'coklat'),
(5, 'banana');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `coba`
--
ALTER TABLE `coba`
  ADD PRIMARY KEY (`id_dk`);

--
-- Indeks untuk tabel `draf`
--
ALTER TABLE `draf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `draf_keluar`
--
ALTER TABLE `draf_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `draf_kembali`
--
ALTER TABLE `draf_kembali`
  ADD PRIMARY KEY (`id_dk`);

--
-- Indeks untuk tabel `draf_sales`
--
ALTER TABLE `draf_sales`
  ADD PRIMARY KEY (`id_ds`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `roti_keluar`
--
ALTER TABLE `roti_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `roti_kembali`
--
ALTER TABLE `roti_kembali`
  ADD PRIMARY KEY (`id_dk`);

--
-- Indeks untuk tabel `roti_masuk`
--
ALTER TABLE `roti_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roti_sampai`
--
ALTER TABLE `roti_sampai`
  ADD PRIMARY KEY (`id_ds`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `varian_rasa`
--
ALTER TABLE `varian_rasa`
  ADD PRIMARY KEY (`id_rasa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coba`
--
ALTER TABLE `coba`
  MODIFY `id_dk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `draf`
--
ALTER TABLE `draf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `draf_keluar`
--
ALTER TABLE `draf_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `draf_kembali`
--
ALTER TABLE `draf_kembali`
  MODIFY `id_dk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `draf_sales`
--
ALTER TABLE `draf_sales`
  MODIFY `id_ds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `roti_keluar`
--
ALTER TABLE `roti_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roti_kembali`
--
ALTER TABLE `roti_kembali`
  MODIFY `id_dk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roti_masuk`
--
ALTER TABLE `roti_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roti_sampai`
--
ALTER TABLE `roti_sampai`
  MODIFY `id_ds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `varian_rasa`
--
ALTER TABLE `varian_rasa`
  MODIFY `id_rasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
