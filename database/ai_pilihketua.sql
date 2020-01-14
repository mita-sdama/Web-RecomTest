-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2018 pada 13.04
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ai_pilihketua`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL,
  `kehadiran` enum('rajin','cukup','kurang') NOT NULL,
  `lingkungan` enum('kurang_peduli','peduli') NOT NULL,
  `kerjasama` enum('mampu','tidak_mampu') NOT NULL,
  `prakarsa` enum('kurang_inisiatif','inisiatif','tidak_inisiatif') NOT NULL,
  `rekomendasi` enum('iya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `kehadiran`, `lingkungan`, `kerjasama`, `prakarsa`, `rekomendasi`) VALUES
(1, 'rajin', 'kurang_peduli', 'mampu', 'tidak_inisiatif', 'tidak'),
(2, 'cukup', 'peduli', 'tidak_mampu', 'inisiatif', 'iya'),
(3, 'rajin', 'kurang_peduli', 'tidak_mampu', 'kurang_inisiatif', 'tidak'),
(4, 'rajin', 'peduli', 'mampu', 'inisiatif', 'iya'),
(5, 'rajin', 'peduli', 'mampu', 'inisiatif', 'iya'),
(6, 'cukup', 'peduli', 'tidak_mampu', 'inisiatif', 'iya'),
(7, 'kurang', 'peduli', 'tidak_mampu', 'kurang_inisiatif', 'tidak'),
(8, 'rajin', 'peduli', 'tidak_mampu', 'kurang_inisiatif', 'iya'),
(9, 'rajin', 'peduli', 'mampu', 'inisiatif', 'iya'),
(10, 'kurang', 'kurang_peduli', 'tidak_mampu', 'kurang_inisiatif', 'tidak'),
(11, 'cukup', 'peduli', 'mampu', 'kurang_inisiatif', 'tidak'),
(12, 'rajin', 'peduli', 'mampu', 'tidak_inisiatif', 'iya'),
(13, 'cukup', 'peduli', 'mampu', 'inisiatif', 'iya'),
(14, 'rajin', 'peduli', 'mampu', 'inisiatif', 'iya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
